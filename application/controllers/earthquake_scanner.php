<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Earthquake_scanner extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'account_helper'));
		$this->load->model('earthquake_model');
	}

	public function index () {
		is_logged_in($this->session->userdata('is_logged_in'));
		
		$page = 'Earthquake Summary - Analysis';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;

		$this->load->view('templates/beta/header', $data);
		$this->load->view('templates/beta/nav');
		$this->load->view('data_analysis/earthquake_scanner', $data);
		$this->load->view('templates/beta/footer');
	}

	public function getRecentEarthquakeEvent()
	{
		$data = $this->earthquake_model->getRecentEarthquakeEvent();
		echo json_encode($data);
	}

	public function getSiteLocations()
	{
		$data = $this->earthquake_model->getSiteLocations();
		echo json_encode($data);
	}
	
}
?>