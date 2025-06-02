<?php

namespace KeyCRM\Api\Exceptions;

class FailedResponseException extends \DomainException
{
    /** @var \KeyCRM\Api\ApiResponse */
    protected $response;

    /**
     * FailedResponseException constructor.
     *
     * @param \KeyCRM\Api\ApiResponse $response
     */
    public function __construct($response)
    {
        parent::__construct();
        $this->response = $response;
    }

    /**
     * @return \KeyCRM\Api\ApiResponse
     */
    public function getResponse()
    {
        return $this->response;
    }
}
