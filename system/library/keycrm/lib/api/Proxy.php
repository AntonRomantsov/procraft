<?php

namespace KeyCRM\Api;

use KeyCRM\Api\Exceptions\FailedResponseException;
use KeyCRM\Api\Exceptions\InvalidJsonException;

class Proxy
{
    private $api;
    private $log;

    public function __construct($apiKey) {
        $this->api = new Client($apiKey);
        $this->log = new \Log('keycrm.log');
    }

    public function __call($method, $arguments) {
        $loggedArgs = is_array($arguments) ?
            json_encode($arguments, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : $arguments;

        try {
            return call_user_func_array(array($this->api, $method), $arguments);
        } catch (FailedResponseException $e) {

            $response = $e->getResponse();
            if ($response->message) {
                $errors = isset($response->errors) ?
                    json_encode($response->errors, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : [];

                $this->log->write(sprintf("[%s] %s; errors: %s; args: %s", $method, $response->message, $errors, $loggedArgs));
            }
        } catch (\CurlException $e) {
            $this->log->write(sprintf("[%s] %s; args: %s", $method, $e->getMessage(), $loggedArgs));
            return false;
        } catch (InvalidJsonException $e) {
            $this->log->write(sprintf("[%s] %s; args: %s", $method, $e->getMessage(), $loggedArgs));
            return false;
        }

        return null;
    }
}