<?php
class ControllerExtensionModuleStoreMap extends Controller {
	public function index() {
		$this->load->language('extension/module/store_map');

		$this->load->model('localisation/location');

		$locations = $this->model_localisation_location->getLocations();

		$data['lang'] = substr($this->session->data['language'], 0, 2);

		foreach ($locations as $location) {
			$data['locations'][$location['city']][] = $location; 
		}

		$data['heading_title'] = $this->language->get('heading_title');


		return $this->load->view('extension/module/store_map', $data);
		
	}
}