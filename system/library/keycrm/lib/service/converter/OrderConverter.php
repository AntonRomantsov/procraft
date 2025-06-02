<?php

namespace KeyCRM\Service\Converter;

use KeyCRM\Api\Model\Buyer;
use KeyCRM\Api\Model\Order;
use KeyCRM\Api\Model\Payment;
use KeyCRM\Api\Model\Product;
use KeyCRM\Api\Model\Shipping;
use KeyCRM\Keycrm;

/**
 * @property Keycrm $keycrm
 */
class OrderConverter
{
	private $keycrm;
	/**
	 * @param Keycrm $keycrm
	 */
	public function __construct(Keycrm $keycrm)
	{
		$this->keycrm = $keycrm;
	}

	/**
     * @param array $settings
     * @param int   $sourceId
     * @param array $ocOrder
     * @param array $ocProducts
     * @param array $totals
     *
     * @returns \KeyCRM\Api\Model\Order
     */
    public function getKeyCRMOrder($settings, $sourceId, $ocOrder, $ocProducts, $totals)
    {
        $order = $this->createOrder($ocOrder, $totals);

        $order->source_id = (int) $sourceId;
        $order->buyer = $this->createBuyer($ocOrder);
        $order->shipping = $this->createShipping($settings, $ocOrder);
        $order->products = $this->createProducts($ocProducts);
        $order->payments = $this->createPayments($settings, $ocOrder, $totals);

        return $order;
    }

    /**
     * @param array $ocOrder
     * @param array $totals
     *
     * @returns \KeyCRM\Api\Model\Order
     */
    protected function createOrder($ocOrder, $totals)
    {
        $order = new Order();
        $order->source_uuid = $ocOrder['order_id'];
        $order->ordered_at = $ocOrder['date_added'];
		$order->promocode = !empty($ocOrder['coupon_info']['code']) ? $ocOrder['coupon_info']['code'] : '';
		$order->discount_percent = $this->getDiscountPercent($ocOrder);
        $order->discount_amount = $this->getDiscount($totals, $ocOrder);
        $order->buyer_comment = mb_substr($ocOrder['comment'], 0, 255);
        $order->shipping_price = $this->getTotal('shipping', $totals);
        $order->taxes = $this->getTotal('tax', $totals);

        return $order;
    }

    /**
     * @param array $ocOrder
     *
     * @returns \KeyCRM\Api\Model\Buyer
     */
    protected function createBuyer($ocOrder)
    {
        $fullName = trim($ocOrder['firstname']) . ' ' . trim($ocOrder['lastname']);
        $fullName = mb_substr($fullName, 0, 255);

        $buyer = new Buyer();
        $buyer->full_name = $fullName ?: '(empty)';
        if (trim($ocOrder['email']) !== 'skip@dummyemail.com' // our user guide skipped email
         && trim($ocOrder['email']) !== 'no_email@noemail.ru' // fast_order default email
         && trim($ocOrder['email']) !== 'no_email@noemail.com') { // fast_order default email
            $buyer->email = trim($ocOrder['email']);
        }
        $buyer->phone = trim(mb_substr($ocOrder['telephone'], 0, 255));

        return $buyer;
    }

	/**
	 * @param array $ocOrder
	 *
	 * @returns \KeyCRM\Api\Model\Shipping
	 */
	protected function createShipping($settings, $ocOrder)
	{
		if (empty($ocOrder['shipping_code'])) {
			return [];
		}

	    $create_shipping = $this->keycrm->getSettings('create_shippings', $settings);

		if (is_null($create_shipping)) {
			$delivery_service_id = null;
		} else {
			$shipping_methods = $this->keycrm->getSettings('shipping_methods', $settings);

			$delivery_service_id = !empty($shipping_methods[$ocOrder['shipping_code']]) ? $shipping_methods[$ocOrder['shipping_code']] : null;
		}

		$shipping = new Shipping();
		$shipping->delivery_service_id = $delivery_service_id;
		$shipping->shipping_address_country = $ocOrder['shipping_country'];
		$shipping->shipping_address_city = $ocOrder['shipping_city'];
		$shipping->shipping_address_region = $ocOrder['shipping_zone'];
		$shipping->shipping_address_zip = $ocOrder['shipping_postcode'];
		$shipping->shipping_receive_point = $ocOrder['shipping_address_1'];
		if (trim($ocOrder['firstname']) !== trim($ocOrder['shipping_firstname']) ||
			trim($ocOrder['lastname'])  !== trim($ocOrder['shipping_lastname'])) {
			$shipping->recipient_full_name = trim($ocOrder['shipping_firstname']) . ' ' . trim($ocOrder['shipping_lastname']);
		}

		if (is_null($shipping->delivery_service_id)) unset($shipping->delivery_service_id);

		return $shipping;
	}

    /**
     * @param array $ocItems
     *
     * @returns \KeyCRM\Api\Model\Product[]
     */
    protected function createProducts($ocItems)
    {
        $products = [];
        foreach ($ocItems as $ocItem) {
            $product = new Product();
            $product->sku = $ocItem['sku'];
            $product->name = $ocItem['name'];
            $product->quantity = (int) $ocItem['quantity'];
            $product->price = (float) $ocItem['price'];

            if (isset($ocItem['offer']) && $ocItem['offer']) {
                $offer = $ocItem['offer'];
                $product->sku = ($offer['sku'] && !$product->sku) ? $product->sku : $ocItem['sku'];

                if ($offer['image']) {
                    $product->picture = $offer['image'];
                }
            }

            if (isset($ocItem['options']) && $ocItem['options']) {
                $product->properties = array_map(static function ($prop) {
                    return [
                        'name'  => $prop['name'],
                        'value' => substr($prop['value'], 0, 250).(strlen($prop['value']) > 250 ? '...' : ''),
                    ];
                }, $ocItem['options']);
            }

            $products[] = $product;
        }

        return $products;
    }

    /**
     * @param array $settings
     * @param array $ocOrder
     * @param array $totals
     *
     * @returns \KeyCRM\Api\Model\Payment[]
     */
    protected function createPayments($settings, $ocOrder, $totals)
    {
	    $create_payment = $this->keycrm->getSettings('create_payments', $settings);

        if (is_null($create_payment) || !$create_payment) {
            return [];
        }

        if (empty($ocOrder['payment_code'])) {
            return [];
        }

	    $payment_methods = $this->keycrm->getSettings('payment_methods', $settings);
        $code = $ocOrder['payment_code'];

        if (empty($payment_methods[$code])) {
            return [];
        }

        $payment = new Payment();
        $payment->payment_method_id = (int)$payment_methods[$code];
        $payment->amount = $ocOrder['total'];
        $payment->status = 'not_paid';

        return [$payment];
    }

    /**
     * @param string $code
     * @param array  $totals
     *
     * @returns float
     */
    protected function getTotal($code, $totals)
    {
        $filtered = array_values(array_filter($totals, static function ($item) use ($code) {
            return $item['code'] === $code;
        }));

        return array_reduce($filtered, static function ($result, $item) {
            return $result + (float) $item['value'];
        }, 0);
    }
	
	/**
     * @param array $totals
     * @param array $ocOrder
     *
     * @returns float
     */
	protected function getDiscount($totals, $ocOrder) {
        $discount = 0;
        $totalCoupon = $this->getTotal('coupon', $totals);
        $totalReward = $this->getTotal('reward', $totals);
        $totalVoucher = $this->getTotal('voucher', $totals);

        if (!empty($totalCoupon) && isset($ocOrder['coupon_info']['type']) && $ocOrder['coupon_info']['type'] == 'F') {
            $discount += abs($totalCoupon);
        }

        if (!empty($totalReward)) {
            $discount += abs($totalReward);
        }

        if (!empty($totalVoucher)) {
            $discount += abs($totalVoucher);
        }

        return $discount;
    }

    /**
     * @param array $ocOrder
     *
     * @returns float
     */
    protected function getDiscountPercent($ocOrder) {
        $discountPercent = 0;

        if (isset($ocOrder['coupon_info'])) {
            $discountPercent = isset($ocOrder['coupon_info']['type']) && $ocOrder['coupon_info']['type'] == 'P' ?
                $ocOrder['coupon_info']['discount'] : 
                0;
        }

        return $discountPercent;
    }
}
