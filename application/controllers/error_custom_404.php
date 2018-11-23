<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Error_custom_404 extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
        $data["title"] = "Oh no! Page not found!";
        $data["first_name"] = "Login";
		$this->load->view('templates/beta/header', $data);

        $is_logged_in = $this->session->userdata('is_logged_in');
        $home_url = $is_logged_in ? "login" : "home";

        $this->output->set_status_header('404');
        $this->load->view('pages/org_head_template');
        $this->load->view('pages/error_custom_404');
        $this->load->view('templates/beta/footer');
	}
}
?>