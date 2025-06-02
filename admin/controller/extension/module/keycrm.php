<?php

use KeyCRM\Api\Client;
use KeyCRM\Service\OrderManager;

/**
 * @property \KeyCRM\Keycrm $keycrm
 */
class ControllerExtensionModuleKeycrm extends Controller
{
    protected $moduleTitle;
    protected $tokenTitle;

    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->load->library('keycrm/keycrm');
        $this->moduleTitle = $this->keycrm->getModuleTitle();
        $this->tokenTitle = $this->keycrm->getTokenTitle();
    }

    public function index()
    {
	    $this->load->model('setting/setting');
	    $this->load->language('extension/module/keycrm');
	    $this->document->addStyle('view/stylesheet/keycrm.css');
	    $this->document->setTitle($this->language->get('heading_title'));

        if ($this->request->server['REQUEST_METHOD'] === 'POST' && $this->validate()) {
            $this->model_setting_setting->editSetting($this->moduleTitle, $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $redirect = $this->url->link('extension/module/keycrm', $this->tokenTitle . '=' . $this->session->data[$this->tokenTitle], true);

            $this->response->redirect($redirect);
        }

        $_data = &$data;
        if (is_null($data)) {
            $data = [];
        }

        $_data = array_merge($_data, $this->getTranslations());
        $_data['stores'] = $this->getStores();
        $_data['breadcrumbs'] = $this->getBreadcrumbs();
        $_data['oc_payment_methods'] = $this->getPaymentMethods();
        $_data['saved_settings'] = $this->model_setting_setting->getSetting($this->moduleTitle);
        $_data['module_title'] = $this->moduleTitle;

		// Get Order Statuses
	    $this->load->model('localisation/order_status');
	    $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        if ($apiKey = $this->keycrm->getSettings('api_key', $_data['saved_settings'])) {
            $apiClient = $this->keycrm->getApiClient($apiKey);

            if (!$_data['sources'] = $apiClient->listSources()) {
                $_data['error_warning_keycrm'] = $this->language->get('api_connection_refused');
            }

            $_data['payment_methods'] = $apiClient->listPaymentMethods();
            $_data['shipping_methods'] = $apiClient->listShippingMethods();

	        $saved_settings = array();

	        foreach ($_data['saved_settings'] as $key => $saved_setting) {
	        	$short_key = str_replace($this->keycrm->getModuleTitle() . '_', '', $key);
	        	$value = $this->keycrm->getSettings($key, $_data['saved_settings']);
		        $saved_settings[$short_key] = is_string($value) ? trim($value) : $value;
            }

	        $_data['saved_settings'] = $saved_settings;
        }

        $_data['action'] = $this->url->link(
            'extension/module/keycrm',
            $this->tokenTitle . '=' . $this->session->data[$this->tokenTitle],
            'SSL'
        );
		$_data['cancel'] = $this->url->link(
            version_compare(VERSION, '3.0', '<') ? 'extension/extension' : 'marketplace/extension',
            $this->tokenTitle . '=' . $this->session->data[$this->tokenTitle], 'SSL'
        );

        $this->load->model('design/layout');
        $_data['layouts'] = $this->model_design_layout->getLayouts();
        $_data['header'] = $this->load->controller('common/header');
        $_data['column_left'] = $this->load->controller('common/column_left');
        $_data['footer'] = $this->load->controller('common/footer');

        $keycrmLog = file_exists(DIR_LOGS . '/keycrm.log') ? DIR_LOGS . '/keycrm.log' : false;

        $_data['logs'] = [
            'keycrm_log' => $this->getLogFile($keycrmLog),
        ];
        $_data['text_button_clear'] = $this->language->get('button_clear');
	    $_data['text_select'] = $this->language->get('text_select');
	    $_data['button_ip_add'] = $this->language->get('button_ip_add');
	    $_data['text_loading'] = $this->language->get('text_loading');

        $_data['catalog'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
        $_data['user_token'] = $this->request->get[$this->keycrm->getTokenTitle()];

	    // API login
	    $data['api_key'] = '123'; // TODO: need thinks about this


        $this->response->setOutput(
            $this->load->view('extension/module/keycrm', $_data)
        );
    }

    protected function getTranslations()
    {
        $text_strings = [
            'heading_title',
			'button_save',
			'button_clear',
            'button_cancel',
            'general_tab_text',
            'keycrm_url',
			'keycrm_stores',
            'keycrm_api_key',
            'stores_table_store',
            'stores_table_source',
            'stores_table_enabled',
            'logs_tab_text',
            'set_apikey_and_save',
            'select_source_and_save',
            'keycrm_payment_methods',
            'keycrm_shipping_methods',
            'text_export_help',
            'text_export_help2',
            'text_export_one',
            'text_placeholder_export_one',
            'text_button_export_one',
			'text_button_export',
			'text_abandoned_cart',
			'order_statuses_tab_text',
			'text_heading_order_statuses_settings',
			'button_status_settings',
			'export_tab_text',
			'text_success_export',
            'create_payments_text',
            'create_shippings_text',
            'payments_tab_text',
            'shipping_tab_text',
            'payment_methods_table_oc_method',
            'payment_methods_table_kc_method',
            'shipping_methods_table_oc_method',
            'shipping_methods_table_kc_method',
            'shipping_methods_not_found',
            'entry_status',
            'text_enabled',
            'text_disabled',
        ];

        $result = [];
        foreach ($text_strings as $text) {
            $result[$text] = $this->language->get($text);
        }

        return $result;
    }

    protected function getStores()
    {
        $this->load->model('setting/store');

        $result = [];
        $result[] = [
            'store_id' => 0,
            'name'     => $this->config->get('config_name') . $this->language->get('text_default'),
        ];

        $stores = $this->model_setting_store->getStores();
        foreach ($stores as $store) {
            $result[] = [
                'store_id' => $store['store_id'],
                'name'     => $store['name'],
            ];
        }

        return $result;
    }

    protected function getPaymentMethods()
    {
        $paymentTypes = array();
        $files = glob(DIR_APPLICATION . 'controller/extension/payment/*.php');
        $new_files = glob(DIR_APPLICATION . 'controller/payment/*.php');
        $files = array_merge($files, $new_files);

        if ($files) {
            foreach ($files as $file) {
                $extension = basename($file, '.php');

                $this->load->language('extension/payment/' . $extension);

                if (version_compare(VERSION, '3.0', '<')) {
                    $configStatus = $extension . '_status';
                } else {
                    $configStatus = 'payment_' . $extension . '_status';
                }

                if ($this->config->get($configStatus)) {
                    $paymentTypes[$extension] = strip_tags(
                        $this->language->get('heading_title')
                    );
                }
            }
        }

        return $paymentTypes;
    }

    protected function getBreadcrumbs()
    {
        return [
            [
                'text'      => $this->language->get('text_home'),
                'href'      => $this->url->link(
                    'common/dashboard',
                    $this->tokenTitle . '=' . $this->session->data[$this->tokenTitle], 'SSL'
                ),
                'separator' => false
            ],
            [
                'text'      => $this->language->get('text_module'),
                'href'      => $this->url->link(
                    'extension/extension',
                    $this->tokenTitle . '=' . $this->session->data[$this->tokenTitle], 'SSL'
                ),
                'separator' => ' :: '
            ],
            [
                'text'      => $this->language->get('heading_title'),
                'href'      => $this->url->link(
                    'extension/module/keycrm',
                    $this->tokenTitle . '=' . $this->session->data[$this->tokenTitle], 'SSL'
                ),
                'separator' => ' :: '
            ],
        ];
    }

    private function getLogFile($file)
    {
        $logs = '';

        if ($file === false) {
            return $logs;
        }

        if (filesize($file) < 4194304) {
            $logs .= file_get_contents($file, FILE_USE_INCLUDE_PATH, null);
        } else {
            return false;
        }

        return $logs;
    }

    public function clearKeyCrmLog()
    {
        if ($this->user->hasPermission('modify', 'extension/module/keycrm')) {
            $file = DIR_LOGS . 'keycrm.log';

            $handle = fopen($file, 'w+');

            fclose($handle);
        }

        $this->response->redirect($this->url->link('extension/module/keycrm', $this->tokenTitle . '=' . $this->session->data[$this->tokenTitle], true));
    }

    public function install()
    {
        $this->load->model('setting/setting');

        $this->model_setting_setting->editSetting(
            $this->moduleTitle,
            array(
                'status' => 1,
                $this->moduleTitle . '_status' => 1,
            )
        );

        $this->addEvents();
    }

    public function uninstall()
    {
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting($this->moduleTitle . '_setting');

        if (! empty($settings)) {
            $this->model_setting_setting->editSetting(
                $this->moduleTitle,
                array(
                    'status' => 0,
                    $this->moduleTitle . '_status' => 0
                )
            );
        }

        $this->model_setting_setting->deleteSetting($this->moduleTitle . '_setting');
        $this->deleteEvents();
    }

    protected function validate()
    {
        // todo: implement
        return true;
    }

    private function addEvents()
    {
        $this->loadModels();

        $this->{'model_' . $this->modelEvent}
            ->addEvent(
                $this->moduleTitle,
                'catalog/model/checkout/order/addOrder/after',
                'extension/module/keycrm/order_create'
            );

        $this->{'model_' . $this->modelEvent}
            ->addEvent(
                $this->moduleTitle,
                'catalog/model/checkout/order/addOrderHistory/after',
                'extension/module/keycrm/order_edit'
            );

        $this->{'model_' . $this->modelEvent}
            ->addEvent(
                $this->moduleTitle, 
                'catalog/model/extension/module/bocorder/addBocorder/after',
                'extension/module/keycrm/order_create'
            );
    }

    private function deleteEvents()
    {
        $this->loadModels();

        if (version_compare(VERSION, '3.0', '<')) {
            $this->{'model_' . $this->modelEvent}->deleteEvent($this->moduleTitle);
        } else {
            $this->{'model_' . $this->modelEvent}->deleteEventByCode($this->moduleTitle);
        }
    }

    private function loadModels()
    {
        if (version_compare(VERSION, '3.0', '<')) {
            $this->load->model('extension/event');
            $this->load->model('extension/extension');

            $this->modelEvent = 'extension_event';
            $this->modelExtension = 'extension_extension';
        } else {
            $this->load->model('setting/event');
            $this->load->model('setting/extension');

            $this->modelEvent = 'setting_event';
            $this->modelExtension = 'setting_extension';
        }
    }

    public function exportOrders()
    {

        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting($this->keycrm->getModuleTitle());
        $apiKey = $this->keycrm->getSettings('api_key', $settings);

        /** @var Client $apiClient */
        $apiClient = $this->keycrm->getApiClient($apiKey);
        /** @var OrderManager $orderManager */
        $orderManager = $this->keycrm->getOrderManager();

        $this->load->model('sale/order');

        $logger = new \Log('keycrm.log');

	    $offset = 0;
	    $importSize = 50;

	    $filter_data = [
		    'sort' => 'date_added',
		    'order' => 'DESC',
		    'start' => $offset,
		    'limit' => $importSize,
	    ];

	    if (!empty($this->request->get['order_id'])) {
		    $filter_data['filter_order_id'] = $this->request->get['order_id'];
	    }
        $total = $this->model_sale_order->getTotalOrders($filter_data);

        $logger->write(sprintf("Export started; Orders total: %s", $total));
	    $this->cache->set('keycrm_export', ['progress' => 0]);

        ini_set('max_execution_time', 0);

        do {
            $filter_data['start'] = $offset;
            $orders = $this->model_sale_order->getOrders($filter_data);

            $order_ids = array_column($orders, 'order_id');
            $request = $orderManager->prepareOrderImportRequest($order_ids);
            if (! $request) {
                $logger->write('Unable to prepare order import request');
                continue;
            }

            $apiClient->importOrders($request);

            $processed = $offset + count($orders);
            $logger->write(sprintf('Processing export: %s/%s records', $processed, $total));
	        $this->cache->set('keycrm_export', ['progress' => $processed]);

            $offset += $importSize;
            sleep(3);
        } while (count($orders) === $importSize);

	    if (session_status() === PHP_SESSION_ACTIVE)
		    session_destroy();

        $logger->write("Export finished");
    }

    public function exportProgress()
    {
        $this->load->model('sale/order');
        $total = $this->model_sale_order->getTotalOrders();

        $content = $this->cache->get('keycrm_export');
        $data = $content ?: [];
        $progress = isset($data['progress']) ? (int) $data['progress'] : 0;

        $_data = [
            'value_now' => $progress,
            'value_max' => $total,
            'value_percent' => ceil($progress * 100 / $total)
        ];

        $this->response->setOutput(
            $this->load->view('extension/module/export_progress', $_data)
        );
    }
}
