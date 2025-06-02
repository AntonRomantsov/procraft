<?php

namespace KeyCRM\Api;

use KeyCRM\Api\Model\PaymentMethod;
use KeyCRM\Api\Model\ShippingMethod;
use KeyCRM\Api\Model\Source;
use KeyCRM\Api\Exceptions\FailedResponseException;

class Client
{
    protected $httpClient;
    protected $log;

    /**
     * Client constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->httpClient = new HttpClient($apiKey);
        $this->log = new \Log('keycrm.log');
    }

    /**
     * @return Source[]
     */
    public function listSources()
    {
        $result = [];
        $page = 0;

        do {
            ++$page;

            $params = [
                'filter' => ['driver' => 'opencart'],
                'limit' => 50,
                'page' => $page
            ];

            $response = $this->httpClient
                ->makeRequest(HttpClient::METHOD_GET, '/order/source', $params);

            $this->throwOnFail($response);
            foreach ($response->data as $source) {
                $result[] = new Source($source);
            }
        } while ($this->hasMore($response));

        return $result;
    }

    /**
     * @return PaymentMethod[]
     */
    public function listPaymentMethods()
    {
        $result = [];
        $page = 0;

        do {
            ++$page;

            $response = $this->httpClient
                ->makeRequest(HttpClient::METHOD_GET, '/order/payment-method', ['limit' => 50, 'page' => $page]);

            $this->throwOnFail($response);
            foreach ($response->data as $source) {
                $result[] = new PaymentMethod($source);
            }
        } while ($this->hasMore($response));

        return $result;
    }

    /**
     * @return ShippingMethod[]
     */
    public function listShippingMethods()
    {
        $result = [];
        $page = 0;

        do {
            ++$page;

            $response = $this->httpClient
                ->makeRequest(HttpClient::METHOD_GET, '/order/delivery-service', ['limit' => 50, 'page' => $page]);

            $this->throwOnFail($response);
            foreach ($response->data as $source) {
                $result[] = new ShippingMethod($source);
            }
        } while ($this->hasMore($response));

        return $result;
    }

    public function createOrder($data)
    {
        $logger = new \Log('keycrm.log');
        $logger->write(sprintf("[createOrder] Send order: %s", json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)));

        $response = $this->httpClient
            ->makeRequest(HttpClient::METHOD_POST, '/order', $data);

        $this->throwOnFail($response);

        return $response;
    }

    public function importOrders($data)
    {
        $response = $this->httpClient
            ->makeRequest(HttpClient::METHOD_POST, '/order/import', $data);

        $this->throwOnFail($response);

        return $response;
    }

    /**
     * @param \KeyCRM\Api\ApiResponse $response
     *
     * @return bool
     */
    protected function hasMore($response)
    {
        $cur = $response->current_page;
        $last = $response->last_page;

        return $last > $cur;
    }

    /**
     * @param \KeyCRM\Api\ApiResponse $response
     *
     * @throws \KeyCRM\Api\Exceptions\FailedResponseException
     */
    protected function throwOnFail($response)
    {
        if (! $response->isSuccessful()) {
            throw new FailedResponseException($response);
        }
    }
}