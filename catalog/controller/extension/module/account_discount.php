<?php
class ControllerExtensionModuleAccountDiscount extends Controller
{
    public function index()
    {
        $this->load->language('extension/module/account');

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
                //$data['steps'][$discount_percent] = $this->currency->format($new_discount, $this->session->data['currency']);
                $data['steps'][$discount_percent] = $new_discount / 1000;
            }

            $old_new_discounts = $new_discounts;

            $new_discounts = array_reverse($new_discounts, true);

            $data['background'] = array();

            $data['progresbar'] = 0;

            foreach ($new_discounts as $discount_percent => $new_discount) {
                if ((float)$data['customer_order_total'] >= $new_discount) {
                    $data['customer_percent'] = $discount_percent;
                    $c = 0;
                    foreach ($old_new_discounts as $old_discount_percent => $old_new_discount) {
                        if ($discounts_step > ($c + 1)) {
                            if ((float)$data['customer_order_total'] >= $old_new_discount && (float)$data['customer_order_total'] > $new_values[$c + 1]) {
                                $data['background'][$old_discount_percent] = 100;
                                $data['progresbar'] = 100;
                            } elseif ((float)$data['customer_order_total'] >= $old_new_discount && (float)$data['customer_order_total'] < $new_values[$c + 1]) {
                                $data['background'][$old_discount_percent] = ((($data['customer_order_total'] - $old_new_discount) * 100) / ($new_values[$c + 1] - $old_new_discount));
                                $data['progresbar'] = ((($data['customer_order_total'] - $old_new_discount) * 100) / ($new_values[$c + 1] - $old_new_discount));
                            } else {
                                $data['background'][$old_discount_percent] = 0;
                            }
                        }
                        $c++;
                    }
                    break;
                }
            }

            $data['text_discount'] = $this->language->get('text_discount') . ' - ' . $discount_percent . '%';

            
        }

        return $this->load->view('extension/module/account_discount', $data);
    }
}
