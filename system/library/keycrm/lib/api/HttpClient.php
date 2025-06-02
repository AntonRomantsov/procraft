<?php

namespace KeyCRM\Api;

use KeyCRM\Api\Exceptions\CurlException;

class HttpClient
{
    const API_URL = 'https://openapi.keycrm.app/v1';

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    protected $apiKey;

    /**
     * HttpClient constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = trim($apiKey);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array  $parameters
     *
     * @return \KeyCRM\Api\ApiResponse
     */
    public function makeRequest($method, $path, $parameters = [])
    {
        $this->validateMethod($method);

        $url = self::API_URL . $path;
        $url .= $method === self::METHOD_GET && count($parameters) ?
            '?' . http_build_query($parameters) : null;

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curlHandler, CURL_SSLVERSION_SSLv2, false);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, [
            'Authorization: ' . 'Bearer ' . $this->apiKey,
            'Content-Type: application/json',
            'Accept: application/json',
        ]);

        if (self::METHOD_POST === $method) {
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $parameters);
        }

        $responseBody = curl_exec($curlHandler);
        $statusCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);
        $errno = curl_errno($curlHandler);
        $error = curl_error($curlHandler);

        curl_close($curlHandler);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        return new ApiResponse($statusCode, $responseBody);
    }

    /**
     * @param string $method
     *
     * @return void
     */
    protected function validateMethod($method)
    {
        $allowedMethods = array(self::METHOD_GET, self::METHOD_POST);

        if (!in_array($method, $allowedMethods, false)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Method "%s" is not valid. Allowed methods are %s',
                    $method,
                    implode(', ', $allowedMethods)
                )
            );
        }
    }
}