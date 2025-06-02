<?php

/**
 * @property \KeyCRM\Keycrm $keycrm
 */
class ControllerExtensionModuleKeycrm extends Controller
{
    /**
     * Creates order on event
     *
     * @param      $trigger
     * @param      $data
     * @param null $orderId
     */
    public function order_create($trigger, $data, $order_id = null)
    {
        $this->load->library('keycrm/keycrm');
	    $this->load->model('extension/module/keycrm');

        $settings = $this->model_setting_setting->getSetting($this->keycrm->getModuleTitle());

	    if (!$order_statuses_ids = $this->keycrm->getSettings('order_statuses', $settings)) {
		    return;
	    }

		$confirmOrderStatusId = $this->model_extension_module_keycrm->confirmOrderStatus($order_id, (array)$order_statuses_ids);

		if (!$confirmOrderStatusId) {
			return;
		}

	    $apiKey = $this->keycrm->getSettings('api_key', $settings);

        /** @var \KeyCRM\Service\OrderManager $order_manager */
        $order_manager = $this->keycrm->getOrderManager();
        $request = $order_manager->prepareOrderRequest($order_id);

        if (! $request) {
            return;
        }

        /** @var \KeyCRM\Api\Client $apiClient */
        $apiClient = $this->keycrm->getApiClient($apiKey);
        $apiClient->createOrder($request);
    }
    /**
     * Creates order on event
     *
     * @param      $trigger
     * @param      $data
     * @param null $orderId
     */
    public function order_edit($trigger, $data, $order = null)
    {
		if (!empty($data[0])) {
			$order_id = $data[0];

			$this->load->library('keycrm/keycrm');
			$this->load->model('extension/module/keycrm');

			$settings = $this->model_setting_setting->getSetting($this->keycrm->getModuleTitle());

			if (!$order_statuses_ids = $this->keycrm->getSettings('order_statuses', $settings)) {
				return;
			}

			$confirmOrderStatusId = $this->model_extension_module_keycrm->confirmOrderStatus($order_id, (array)$order_statuses_ids);

			if (!$confirmOrderStatusId) {
				return;
			}

			$apiKey = $this->keycrm->getSettings('api_key', $settings);

			/** @var \KeyCRM\Service\OrderManager $order_manager */
			$order_manager = $this->keycrm->getOrderManager();
			$request = $order_manager->prepareOrderRequest($order_id);

			if (!$request) {
				return;
			}

			/** @var \KeyCRM\Api\Client $apiClient */
			$apiClient = $this->keycrm->getApiClient($apiKey);
			$apiClient->createOrder($request);
		}
    }

    public function cron() {
        $this->load->library('keycrm/keycrm');
        $this->load->model('extension/module/keycrm');

        $settings = $this->model_setting_setting->getSetting($this->keycrm->getModuleTitle());
        $apiKey = $this->keycrm->getSettings('api_key', $settings);

        if ($order_statuses_ids = $this->keycrm->getSettings('order_statuses', $settings)) {
            $order_manager = $this->keycrm->getOrderManager();

            $orders = $this->model_extension_module_keycrm->getOrderIdByRange((array)$order_statuses_ids);

            foreach ($orders as $order) {
                $request = $order_manager->prepareOrderRequest($order['order_id']);

                $apiClient = $this->keycrm->getApiClient($apiKey);
                $apiClient->createOrder($request);
            }
        }
    }

    public function set_status(){
        $order_id = $this->request->get['context']['source_uuid'];
        $keycrm_status_id = $this->request->get['context']['status_id'];
        $order_statuses = array(
            '12' => 5,
            '28' => 2, 
            '11' => 1,
            '21' => 3,
            '25' => 7,
            '19' => 7
        );
        $order_status_id = ($order_statuses[$keycrm_status_id]) ? $order_statuses[$keycrm_status_id] : 0;
        $this->load->model('checkout/order');
        if($order_status_id){ 
            $this->db->query("UPDATE `" . DB_PREFIX . "order` SET order_status_id = " . (int)$order_status_id . " WHERE order_id = " . $order_id . "");
            $this->model_checkout_order->addOrderHistory($order_id, $order_status_id);
        }
    }

}