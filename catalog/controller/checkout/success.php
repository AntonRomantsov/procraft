<?php
class ControllerCheckoutSuccess extends Controller {
	public function index() {
		$this->load->language('checkout/success');

		if (isset($this->session->data['order_id'])) {
			$this->cart->clear();

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['guest']);
			unset($this->session->data['comment']);
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);
			unset($this->session->data['voucher']);
			unset($this->session->data['vouchers']);
			unset($this->session->data['totals']);

			$order_id = $this->session->data['order_id'];

			$this->load->model('checkout/order');

			$order_info = $this->model_checkout_order->getOrder($order_id);

			// $get_order_tax = $this->model_checkout_order->getOrderTax($order_id);

			// if ($get_order_tax) {
			// 		$order_tax = $get_order_tax['value'];
			// } else {
			// 		$order_tax = '';
			// }

			// $get_order_shipping = $this->model_checkout_order->getOrderShipping($order_id);

			// if ($get_order_shipping) {
			// 		$order_shipping = $get_order_shipping['value'];
			// } else {
			// 		$order_shipping = 0;
			// }

			$get_order_products = $this->model_checkout_order->getOrderProducts($order_id);

			$order_products = array();

			foreach ($get_order_products as $prod) {				
					$order_products[] = array(
							'product_id' => $prod['product_id'],
							'name'      => $prod['name'],
							'category'  => $this->getPathByProduct($prod['product_id']),
							'price'     => number_format($prod['price'], 2, '.', ''),
							'quantity'  => $prod['quantity']
					);
			}

			$order_tracker = array(
				'order_id'    => $order_id,
				'store_name'  => $order_info['store_name'],
				'total'       => $order_info['total'],
				//'tax'         => $order_tax,
				//'shipping'    => $order_shipping,
				'city'        => $order_info['payment_city'],
				'state'       => $order_info['payment_zone'],
				'country'     => $order_info['payment_country'],
				'currency'    => $order_info['currency_code'],
				'products'    => $order_products
			);

			$data['order_tracker'] = $order_tracker;
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_basket'),
			'href' => $this->url->link('checkout/cart')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_checkout'),
			'href' => $this->url->link('checkout/checkout', '', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_success'),
			'href' => $this->url->link('checkout/success')
		);

		if ($this->customer->isLogged()) {
			$data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', '', true), $this->url->link('account/order', '', true), $this->url->link('account/download', '', true), $this->url->link('information/contact'));
		} else {
			$data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact'));
		}

		unset($this->session->data['order_id']);

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/success', $data));
	}

	private function getPathByProduct($product_id) {
		$product_id = (int)$product_id;
		if ($product_id < 1) return false;

		static $path = null;
		if (!isset($path)) {
			$path = $this->cache->get('product.product_path');
			if (!isset($path)) $path = array();
		}

		if (!isset($path[$product_id])) {
			$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . $product_id . "' ORDER BY main_category DESC LIMIT 1");

			$path[$product_id] = $this->getPathByCategory($query->num_rows ? (int)$query->row['category_id'] : 0);

			$this->cache->set('product.product_path', $path);
		}

		return $path[$product_id];
	}

	private function getPathByCategory($category_id) {
		$category_id = (int)$category_id;
		if ($category_id < 1) return false;

		static $path = null;
		if (!isset($path)) {
			$path = $this->cache->get('category.category_path');
			if (!isset($path)) $path = array();
		}

		if (!isset($path[$category_id])) {
			$max_level = 10;

			$sql = "SELECT CONCAT_WS('/'";
			for ($i = $max_level-1; $i >= 0; --$i) {
				$sql .= ",td$i.name";
			}
			$sql .= ") AS path FROM " . DB_PREFIX . "category t0 LEFT JOIN " . DB_PREFIX . "category_description td0 ON (td0.category_id = t0.category_id)";
			for ($i = 1; $i < $max_level; ++$i) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "category t$i ON (t$i.category_id = t" . ($i-1) . ".parent_id) LEFT JOIN " . DB_PREFIX . "category_description td$i ON (td$i.category_id = t$i.category_id)";
			}
			$sql .= " WHERE t0.category_id = '" . $category_id . "'";

			$query = $this->db->query($sql);

			$path[$category_id] = $query->num_rows ? $query->row['path'] : false;

			$this->cache->set('category.category_path', $path);
		}

		return $path[$category_id];
	}
}