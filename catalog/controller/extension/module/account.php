<?php
class ControllerExtensionModuleAccount extends Controller {
	public function index() {
		$this->load->language('extension/module/account');
		$this->load->language('account/logout');

		$data['logged'] = $this->customer->isLogged();
		$data['register'] = $this->url->link('account/register', '', true);
		$data['login'] = $this->url->link('account/login', '', true);
		$data['logout'] = $this->url->link('account/logout', '', true);
		$data['forgotten'] = $this->url->link('account/forgotten', '', true);
		$data['account'] = $this->url->link('account/account', '', true);
		$data['edit'] = $this->url->link('account/edit', '', true);
		$data['password'] = $this->url->link('account/password', '', true);
		$data['address'] = $this->url->link('account/address', '', true);
		$data['wishlist'] = $this->url->link('account/wishlist');
		$data['order'] = $this->url->link('account/order', '', true);
		$data['download'] = $this->url->link('account/download', '', true);
		$data['reward'] = $this->url->link('account/reward', '', true);
		$data['return'] = $this->url->link('account/return', '', true);
		$data['transaction'] = $this->url->link('account/transaction', '', true);
		$data['newsletter'] = $this->url->link('account/newsletter', '', true);
		$data['recurring'] = $this->url->link('account/recurring', '', true);
		$data['instrument'] = $this->url->link('account/instrument', '', true);

		$this->load->model('account/customer');

		if ($this->customer->isLogged() && $this->config->get('total_discount_status')) {
			$data['customer_order_total'] = $this->model_account_customer->getOrderTotals($this->customer->getId());

			$discounts = $this->config->get('config_discount');
			$discounts = explode('|', $discounts);
			$discounts_step = count($discounts);

			$new_discounts = array();
			foreach ($discounts as $discount) {
				$tmp = explode(':', $discount);
				$new_discounts[$tmp[0]] = $tmp[1];
				$new_percents[] = $tmp[0];
        $new_values[] = $tmp[1];
			}

			$data['steps'] = array();

			foreach ($new_discounts as $discount_percent => $new_discount) {
				$data['steps'][$discount_percent] = $this->currency->format($new_discount, $this->session->data['currency']);
			}

			$old_new_discounts = $new_discounts;

			$new_discounts = array_reverse($new_discounts, true);

			$data['background'] = array();

			foreach ($new_discounts as $discount_percent => $new_discount) {
				if ((float)$data['customer_order_total'] >= $new_discount) {
					$data['customer_percent'] = $discount_percent;
					$c = 0;
					foreach ($old_new_discounts as $old_discount_percent => $old_new_discount) {
						if($discounts_step > ($c + 1)) {
							if ((float)$data['customer_order_total'] >= $old_new_discount && (float)$data['customer_order_total'] > $new_values[$c + 1]) {
								$data['background'][$old_discount_percent] = 100;
							} elseif ((float)$data['customer_order_total'] >= $old_new_discount && (float)$data['customer_order_total'] < $new_values[$c + 1]) {
								$data['background'][$old_discount_percent] = ((($data['customer_order_total'] - $old_new_discount) * 100) / ($new_values[$c + 1] - $old_new_discount));
							} else {
								$data['background'][$old_discount_percent] = 0;
							}
						}
						$c++;
					}
					break;
				}
			}
		}

    $data['user_name'] = false;
		if ($this->customer->isLogged()) {
			$this->load->model('account/customer');
			$this->load->model('tool/image');

			$customer_info = $this->model_account_customer->getCustomer($this->customer->getId());

			if($customer_info){
        $data['user_name'] = $customer_info['firstname'] .' '. $customer_info['lastname'];
      }

			if ($customer_info['manager_id']) {
				$data['manager'] = $this->model_account_customer->getManager($customer_info['manager_id']);
				$data['text_manager'] = $this->language->get('text_manager');
				if ($data['manager']['image']) {
					$data['manager']['image'] = $this->model_tool_image->resize($data['manager']['image'], 150, 150);
				} else {
					$data['manager']['image'] = false;
				}
			} else {
				$data['manager'] = false;
			}
		}

		$data['route'] = $this->request->get['route'];

		return $this->load->view('extension/module/account', $data);
	}
}