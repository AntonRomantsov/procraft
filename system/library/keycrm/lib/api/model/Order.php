<?php

namespace KeyCRM\Api\Model;

class Order
{
    /** @var null|int */
    public $id;
    /** @var int */
    public $source_id;
    /** @var string */
    public $source_uuid;
    /** @var string */
    public $ordered_at;
    /** @var string */
    public $buyer_comment;
	/** @var string */
	public $promocode;
    /** @var float */
    public $discount_percent;
    /** @var float */
    public $discount_amount;
    /** @var float */
    public $shipping_price;
    /** @var float */
    public $taxes;
    /** @var \KeyCRM\Api\Model\Buyer */
    public $buyer;
    /** @var \KeyCRM\Api\Model\Shipping */
    public $shipping;
    /** @var \KeyCRM\Api\Model\Product[] */
    public $products;
    /** @var \KeyCRM\Api\Model\Payment[] */
    public $payments;
}