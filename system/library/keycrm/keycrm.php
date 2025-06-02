<?php

namespace KeyCRM;

require_once 'bootstrap.php';

use KeyCRM\Api\Proxy;
use KeyCRM\Service\OrderManager;

class Keycrm
{
    protected $registry;

    public function __construct(\Registry $registry)
    {
        $this->registry = $registry;
        $this->load->model('setting/setting');
    }

    public function __get($name) {
        return $this->registry->get($name);
    }

    public function getModuleTitle() {
        if (version_compare(VERSION, '3.0', '<')) {
            $title = 'keycrm';
        } else {
            $title = 'module_keycrm';
        }

        return $title;
    }

    public function getTokenTitle() {
        if (version_compare(VERSION, '3.0', '<')) {
            $token = 'token';
        } else {
            $token = 'user_token';
        }

        return $token;
    }

    /**
     * @param string $apiKey
     *
     * @return null|\KeyCRM\Api\Client
     */
    public function getApiClient($apiKey = null) {
        if (! $this->registry->has('KeyCRMApiClient')) {
            $setting = $this->model_setting_setting->getSetting($this->getModuleTitle());

            if ($apiKey === null) {
                $settingKey = $this->getModuleTitle() . '_api_key';
                $apiKey = isset($setting[$settingKey]) ?
                    $setting[$settingKey] : null;
            }

            if (!$apiKey) {
                return null;
            }

            $this->registry->set(
                'KeyCRMApiClient',
                new Proxy($apiKey)
            );
        }

        return $this->registry->get('KeyCRMApiClient');
    }

    public function getOrderManager()
    {
        return new OrderManager($this->registry);
    }

    public function isAdmin()
    {
        $match = preg_match('/\/catalog\/$/i', DIR_APPLICATION);

        return $match !== 1;
    }

	public function getSettings($value, $settings)
	{
		$prefix = $this->getModuleTitle();

		if (empty($settings[$value]) && empty($settings[$prefix . '_' . $value])) {
			return null;
		}

		if (!empty($settings[$value])) {
			return $settings[$value];
		}

		if (!empty($settings[$prefix . '_' . $value])) {
			if ($settings[$prefix . '_' . $value] == 'on') {
				return true;
			}

			return $settings[$prefix . '_' . $value];
		}

		return null;
	}
}