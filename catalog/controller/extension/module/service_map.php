<?php
class ControllerExtensionModuleServiceMap extends Controller {
	public function index() {
		$this->load->language('extension/module/service_map');

		$this->load->model('localisation/location');

		$locations = $this->model_localisation_location->getLocations(true);

		foreach ($locations as $location) {
			$data['locations'][$location['city']][] = $location; 
		}

		$data['heading_title'] = $this->language->get('heading_title');
		$data['phone'] = $this->config->get('config_telephone');
		$data['lang'] = $this->session->data['language'];


		return $this->load->view('extension/module/service_map', $data);
		
	}
}