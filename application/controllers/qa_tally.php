<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Qa_tally extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$config_app = switch_db("senslopedb", "localhost");
		$this->db = $this->load->database($config_app, TRUE);
		$this->load->helper(array('form', 'url'));
		$this->load->model('qa_tally_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$this->is_logged_in();
		$page = 'Quality Assurance';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;
		$this->load->view('templates/beta/header', $data);
        $this->load->view('templates/beta/nav');
		$this->load->view('reports/qa_tally_handlebars');
		$this->load->view('reports/qa_tally_page');
		$this->load->view('templates/beta/footer');
	}

	public function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || ($is_logged_in !== TRUE)) {
			echo 'You don\'t have permission to access this page. <a href="../lin">Login</a>';
			die();
		}
		else {
		}
	}

	public function addActualSentEWIforEvent() {
		$result = $this->qa_tally_model->getActualEvent();
	}

	public function addActualSentEWIforExtended() {
		$result = $this->qa_tally_model->getActualExtended();
	}

	public function getDailyRecordForEvent() {
		$this->switchToCommons();
		$table_source = ['qa_tally_event', 'qa_tally_extended'];
		$setting_container = [];
		foreach ($table_source as $table) {
			$result = $this->qa_tally_model->getRecordForToday($table);
			array_push($setting_container, [$result]);
		}
		$this->switchToSenslope();
		print json_encode($setting_container);
	}

	public function getEventDefaultData() {
		$result = $this->qa_tally_model->getDefaultRecordForToday("on-going");
		return $result;
		print json_encode($result);
	}

	public function getExtendedDefaultData() {
		$result = $this->qa_tally_model->getDefaultRecordForToday("extended");
		return $result;
		print json_encode($result);
	}

	public function switchToSenslope() {
		$config_app = switch_db("senslopedb", "localhost");
		$this->db = $this->load->database($config_app, TRUE);
	}

	public function switchToCommons() {
		$config_app = switch_db("commons_db", "localhost");
		$this->db = $this->load->database($config_app, TRUE);
	}

	public function getDefaultRecipients() {
		$site_ids = $_POST['site_ids'];
		$config_app = switch_db("comms_db", "localhost");
		$recipients_container = [];
		$this->db = $this->load->database($config_app, TRUE);
		$result = $this->qa_tally_model->getRecipientsForSite($site_ids);
		array_push($recipients_container, $result);
		print json_encode($recipients_container);
	}

	public function saveSettings() {
		$data = $_POST;
		$this->switchToCommons();
		if ($data['event_category'] == "event") {
			$table_source = "qa_tally_event";
		} else if ($data['event_category'] = "extended") {
			$table_source = "qa_tally_extended";
		}
		$result = $this->qa_tally_model->insertSettingsForTally($table_source,$data);
		$this->switchToSenslope();
		print json_encode($result);
	}

	public function updateTallyCount() {
		$this->switchToCommons();
		$data = $_POST;
		$table_source = ["qa_tally_event","qa_tally_extended"];
		switch ($data['category']) {
			case 'event':
				$previous_data = $this->qa_tally_model->getRecordViaEventID($table_source[0], $data['event_id']);
				$temp = $previous_data[0]->ewi_actual + $data['sent_count'];
				$column = "ewi_actual";
				$update_tally_record = $this->qa_tally_model->updateTallyRecord($table_source[0], $column, $data['event_id'], $temp, $data['data_timestamp']);
				break;
			case 'extended':
				$previous_data = $this->qa_tally_model->getRecordViaEventID($table_source[1], $data['event_id']);
				$temp = $previous_data[0]->ewi_actual + $data['sent_count'];
				$column = "ewi_actual";
				$update_tally_record = $this->qa_tally_model->updateTallyRecord($table_source[1], $column, $data['event_id'], $temp, $data['data_timestamp']);
				break;
			case 'gndmeas_reminder_event':
				$previous_data = $this->qa_tally_model->getRecordViaEventID($table_source[0], $data['event_id']);
				$temp = $previous_data[0]->gndmeas_reminder_actual + $data['sent_count'];
				$column = "gndmeas_reminder_actual";
				$update_tally_record = $this->qa_tally_model->updateTallyRecord($table_source[0], $column, $data['event_id'], $temp, $data['data_timestamp']);
				break;
			case 'gndmeas_reminder_extended':
				$previous_data = $this->qa_tally_model->getRecordViaEventID($table_source[1], $data['event_id']);
				$temp = $previous_data[0]->gndmeas_reminder_actual + $data['sent_count'];
				$column = "gndmeas_reminder_actual";
				$update_tally_record = $this->qa_tally_model->updateTallyRecord($table_source[1], $column, $data['event_id'], $temp, $data['data_timestamp']);
				break;
			default:
				// Nothing to do.
				break;
		}
		$this->switchToSenslope();
	}

	public function updateTallyCountExtended() {
		$this->switchToCommons();
		$data = $_POST['data'];
		$table_source = "qa_tally_extended";
		$previous_data = $this->qa_tally_model->getRecordViaEventID($table_source, $data['site_id']);
		$this->switchToSenslope();
	}

	public function evaluateSite() {
		$this->switchToCommons();
		$data = $_POST['data'];
		switch ($data['category']) {
			case 'event':
				$table_source = "qa_tally_event";
				break;
			case 'extended':
				$table_source = "qa_tally_extended";
				break;
			default:
				// TODO: Routine section
				break;
		}
		$result = $this->qa_tally_model->evaluate($table_source, $data['id']);
		$this->switchToSenslope();
		print $result;
	}
}
?>