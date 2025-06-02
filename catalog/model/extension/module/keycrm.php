<?php
class ModelExtensionModuleKeycrm extends Model {
	/**
     * @param int $order_id
     *
     * @return array
     */
	public function getCouponHistoryInfo($order_id) {
		$coupon_info = [];

		$sql = "SELECT ch.amount, c.code, c.discount, c.type 
			FROM " . DB_PREFIX . "coupon_history ch 
			LEFT JOIN " . DB_PREFIX . "coupon c ON (c.coupon_id = ch.coupon_id) 
			WHERE order_id = '" . (int)$order_id . "'";

		$query = $this->db->query($sql);

		if ($query->num_rows) {
			$coupon_info = $query->row;
		} elseif (isset($this->session->data['coupon'])) {
			$sql = "SELECT c.code, c.discount, c.type 
				FROM " . DB_PREFIX . "coupon c WHERE code = '" . $this->session->data['coupon'] . "'";	
			
			$query = $this->db->query($sql);
					
			if ($query->num_rows) {
				$coupon_info = $query->row;
			}			
		}

		return $coupon_info;
	}

	public function confirmOrderStatus($order_id, $statuses) {
		if ($order_id && !empty($statuses) && is_array($statuses)) {
			return (bool)count($this->getOrderIdByRange($statuses, [
				'order_id' => $order_id
			]));
		}

		return false;
	}

	public function getOrderIdByRange($statuses, $data = []) {
		if (!empty($statuses) && is_array($statuses)) {
			// Check Abandoned cart
			$pos = array_search('abandoned_cart', $statuses);
			$abandoned_cart = false;
			if ($pos !== false) {
				$abandoned_cart = true;
				unset($statuses[$pos]);
			}

			$sql = "SELECT order_id FROM " . DB_PREFIX . "order WHERE order_status_id IN (" . implode(',', $statuses) . ")";

			if (!empty($data['order_id'])) {
				$sql .= " AND order_id = " . (int)$data['order_id'];
			}

			if ($abandoned_cart) {
				$sql .= " UNION SELECT order_id FROM " . DB_PREFIX . "order WHERE date_added < DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND order_status_id IN (0)";

				if (!empty($data['order_id'])) {
					$sql .= " AND order_id = " . (int)$data['order_id'];
				}
			}

			$query = $this->db->query($sql);

			return $query->rows;
		}

		return [];
	}

}