<?php
class ControllerCommonHeader extends Controller {
	public function index() {
		$data['title'] = $this->document->getTitle();

		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts();
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		$this->load->language('common/header');

		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->user->getUserName());

		if (!isset($this->request->get['user_token']) || !isset($this->session->data['user_token']) || ($this->request->get['user_token'] != $this->session->data['user_token'])) {
			$data['logged'] = '';

			$data['home'] = $this->url->link('common/login', '', true);
		} else {
			$data['logged'] = true;
// Extended Reviews

      $data['reviews_count'] = 0;

      if(isset($this->config->get('extended_reviews_settings')['status']) && $this->config->get('extended_reviews_settings')['status']){

      try{

			$this->load->model('catalog/extended_reviews');

			$data['answer_total'] = $this->model_catalog_extended_reviews->getTotalReviewAnswers(array('filter_status' => 0));

      $data['review_total'] = $this->model_catalog_extended_reviews->getTotalReviews(array('filter_status' => 0));

			$data['all_answer_total'] = $this->model_catalog_extended_reviews->getTotalReviewAnswers();

			$data['all_review_total'] = $this->model_catalog_extended_reviews->getTotalReviews();

      $data['reviews_count'] += $data['review_total'] + $data['answer_total'];

			$data['extended_review'] = $this->url->link('catalog/extended_reviews', 'user_token=' . $this->session->data['user_token'], true);

			$data['extended_review_off'] = $this->url->link('catalog/extended_reviews', 'user_token=' . $this->session->data['user_token'] . '&filter_status=0', true);

			$data['extended_review_answer'] = $this->url->link('catalog/extended_reviews/getAnswerList', 'user_token=' . $this->session->data['user_token'], true);

			$data['extended_review_answer_off'] = $this->url->link('catalog/extended_reviews/getAnswerList', 'user_token=' . $this->session->data['user_token'] . '&filter_status=0', true);

			$data['extended_review_settings'] = $this->url->link('extension/module/extended_reviews', 'user_token=' . $this->session->data['user_token'], true);
      }catch(Exception $e){}
      }

      if(isset($this->config->get('ex_store_reviews_settings')['status']) && $this->config->get('ex_store_reviews_settings')['status']){
			try{

			$this->load->model('catalog/ex_store_reviews');

			$data['review_store_total'] = $this->model_catalog_ex_store_reviews->getTotalReviews();

			$data['review_store'] = $this->model_catalog_ex_store_reviews->getTotalReviews(array('filter_status' => 0));

      $data['reviews_count'] += $data['review_store'];

			$data['extended_review_store'] = $this->url->link('catalog/ex_store_reviews', 'user_token=' . $this->session->data['user_token'], true);

			$data['extended_review_store_off'] = $this->url->link('catalog/ex_store_reviews', 'user_token=' . $this->session->data['user_token'] . '&filter_status=0', true);

			$data['extended_review_store_settings'] = $this->url->link('extension/module/ex_store_reviews', 'user_token=' . $this->session->data['user_token'], true);
			}
			catch(Exception $e){}
      }
			$data['user_token'] = $this->session->data['user_token'];

			$data['home'] = $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true);
			$data['logout'] = $this->url->link('common/logout', 'user_token=' . $this->session->data['user_token'], true);
			$data['profile'] = $this->url->link('common/profile', 'user_token=' . $this->session->data['user_token'], true);

			$this->load->model('user/user');

			$this->load->model('tool/image');

			$user_info = $this->model_user_user->getUser($this->user->getId());

			if ($user_info) {
				$data['firstname'] = $user_info['firstname'];
				$data['lastname'] = $user_info['lastname'];
				$data['username']  = $user_info['username'];
				$data['user_group'] = $user_info['user_group'];

				if (is_file(DIR_IMAGE . $user_info['image'])) {
					$data['image'] = $this->model_tool_image->resize($user_info['image'], 45, 45);
				} else {
					$data['image'] = $this->model_tool_image->resize('profile.png', 45, 45);
				}
			} else {
				$data['firstname'] = '';
				$data['lastname'] = '';
				$data['user_group'] = '';
				$data['image'] = '';
			}

			// Online Stores
			$data['stores'] = array();

			$data['stores'][] = array(
				'name' => $this->config->get('config_name'),
				'href' => HTTP_CATALOG
			);

			$this->load->model('setting/store');

			$results = $this->model_setting_store->getStores();

			foreach ($results as $result) {
				$data['stores'][] = array(
					'name' => $result['name'],
					'href' => $result['url']
				);
			}
		}
		$data['is_demo_data_removed'] = $this->config->get('demo_data_is_removed');

		return $this->load->view('common/header', $data);
	}
}
