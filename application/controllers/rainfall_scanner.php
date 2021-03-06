<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rainfall_scanner extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'account_helper'));
		$this->load->model('pubrelease_model');
		$this->load->model('sites_model');
	}

	public function index () {
		is_logged_in($this->session->userdata('is_logged_in'));
		
		$page = 'Rainfall Summary - Analysis';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;
		
		$sites = $this->sites_model->getSitesWithRegions();

		$regions = [];
		$provinces = [];
		foreach ($sites as $site) {
			array_push($regions, $site->region);
			array_push($provinces, $site->province);
		}
		$data["regions"] = array_unique($regions);
		asort($provinces);
		$data["provinces"] = array_unique($provinces);

		$this->load->view('templates/beta/header', $data);
		$this->load->view('templates/beta/nav');
		$this->load->view('data_analysis/rainfall_scanner', $data);
		$this->load->view('templates/beta/footer');
	}

	public function getRainfallPercentages () {
		try {
            $paths = $this->getOSspecificpath();
        } catch (Exception $e) {
            echo "Caught exception: ",  $e->getMessage(), "\n";
        }

        $exec_file = "getAllSitesRainfallSummary.py";

        $command = "{$paths["python_path"]} {$paths["file_path"]}$exec_file";
        exec($command, $output, $return);
        // output is an array [<timestamp of execution>, <runtime>, <actual data array>]
        $return = $output[sizeof($output)-1];
		echo json_encode($return);
	}

	public function getSitesWithRegions () {
		$sites = $this->sites_model->getSitesWithRegions();
		echo json_encode($sites);
	}

	private function getOSspecificpath () {
        $os = PHP_OS;
        $python_path = "";
        $file_path = "";

        if (strpos($os, "WIN") !== false) {
            $python_path = "C:/Users/Dynaslope/Anaconda2/python.exe";
            $file_path = "C:/xampp/updews-pycodes/web_plots/";
        } elseif (strpos($os, "UBUNTU") !== false || strpos($os, "Linux") !== false) {
            $python_path = "/home/ubuntu/miniconda2/bin/python";
            // $python_path = "/home/ubuntu/anaconda2/bin/python";
            $file_path = "/var/www/updews-pycodes/web_plots/";
        } else {
            throw new Exception("Unknown OS for execution... Script discontinued...");
        }

        return array(
            "python_path" => $python_path, 
            "file_path" => $file_path
        );
    }
}
?>