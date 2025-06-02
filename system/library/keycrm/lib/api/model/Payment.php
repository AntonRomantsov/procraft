<?php

namespace KeyCRM\Api\Model;

class Payment
{
    /** @var int */
    public $payment_method_id;
    /** @var int float */
    public $amount = 0;
    /** @var string */
    public $payment_date;
    /** @var string */
    public $status = 'paid';
}