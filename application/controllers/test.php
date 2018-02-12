<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		echo "Test Index";
	}

	public function releaseFormTest() {
		$data['title'] = 'Release Form Test';
		$this->load->view('templates/header', $data);
		$this->load->view('test/release_form', $data);
	}

	public function rainfallPlotterTest() {
		$data['title'] = 'Rainfall Plotter Test';
		$this->load->view('templates/header', $data);
		$this->load->view('test/data_analysis/rainfall_plotter', $data);
	}

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */

































