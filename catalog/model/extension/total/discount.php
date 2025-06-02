<?php
class ModelExtensionTotalDiscount extends Model {
	public function getTotal($total) {
		$this->load->language('extension/total/discount');

		if ($this->customer->isLogged()) {
			$sub_total = $this->cart->getSubTotal();

			$this->load->model('account/customer');

			$customer_order_total = $this->model_account_customer->getOrderTotals($this->customer->getId());

			$customer_order_total += $sub_total;

			$discounts = $this->config->get('config_discount');
			$discounts = explode('|', $discounts);
			$new_discounts = array();
			foreach ($discounts as $discount) {
				$tmp = explode(':', $discount);
				$new_discounts[$tmp[0]] = $tmp[1];
			}

			$new_discounts = array_reverse($new_discounts, true);

			foreach ($new_discounts as $discount_percent => $new_discount) {
				if ((float)$customer_order_total >= $new_discount) {
					$customer_percent = $discount_percent;
					break;
				}
			}

			$products = $this->cart->getProducts();

			$total_value = 0;

			foreach($products as $product){
				$total_price = $product['is_discount'] ? $product['total'] : $product['total'] * (100 - $customer_percent) / 100;
				$total_value += $total_price;
			}
            if($sub_total > 0){
            	$result_percent = ($sub_total - $total_value) / $sub_total * 100;
            }else{
            	$result_percent = 0;
            }
			

			if ($customer_percent) {

				$discount = -1 * ($sub_total / 100) * $result_percent;

				$total['totals'][] = array(
					'code'       => 'discount',
					'title'      => $this->language->get('text_discount') . ' ' . $customer_percent . '%' . '<br/>(' . $this->language->get('text_discount2') . ')',
					'value'      => $discount,
					'sort_order' => $this->config->get('discount_sort_order')
				);

				$total['total'] += $discount;
			}
		}
	}
}