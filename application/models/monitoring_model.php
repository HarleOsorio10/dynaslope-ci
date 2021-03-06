<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitoring_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Gets public releases
	 * 
	 * @author Kevin Dhale dela Cruz
	 **/
	public function getOnGoingAndExtended() {
		$this->db->select('ev.event_id, ev.site_id, ev.event_start, ev.validity, ev.status, sites.*');
		$this->db->from('public_alert_event AS ev');
		$this->db->join('sites', 'ev.site_id = sites.site_id');
		$this->db->where('ev.status', 'on-going');
 		$this->db->or_where('ev.status', 'extended');
		$query = $this->db->get();
		$result = $query->result_array();

		foreach ($result as $index => $event) {
			$event_id = $event["event_id"];

			$this->db->select("re.release_id AS latest_release_id, re.data_timestamp, re.release_time, re.internal_alert_level")
				->from("public_alert_release AS re")
				->where("re.event_id", $event_id)
				->order_by("re.data_timestamp", "desc")
				->limit(1);
			$release = $this->db->get()->row_array();

			$this->db->select("tr.trigger_id AS latest_trigger_id, tr.trigger_type, tr.timestamp AS trigger_timestamp")
				->from("public_alert_trigger AS tr")
				->where("tr.event_id", $event_id)
				->order_by("tr.timestamp", "desc")
				->limit(1);
			$trigger = $this->db->get()->row_array();

			$merged = array_merge($release, $trigger);
			$result[$index] = array_merge($event, $merged);
		}

		return $result;
	}

	public function getAllRoutineEventsGivenDate ($date) {
		$this->db->select("ev.event_id, ev.site_id, ev.event_start, sites.site_code");
		$this->db->from('public_alert_event AS ev');
		$this->db->join("sites", "ev.site_id = sites.site_id");
		$this->db->where("ev.status", "routine");
 		$this->db->where("ev.event_start BETWEEN '$date 11:00:00' AND '$date 12:00:00'");
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;
	}

	public function getOnGoingEvents()
	{
		$this->db->select("sites.*, public_alert_event.*");
		$this->db->from('public_alert_event');
		$this->db->join('sites', 'sites.site_id = public_alert_event.site_id');
		$this->db->where('public_alert_event.status', 'on-going');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getFirstEventRelease($event_id)
	{
		$this->db->select('public_alert_release.release_id, public_alert_release.data_timestamp, public_alert_release.release_time, public_alert_trigger.*, lut_triggers.cause');
		$this->db->from('public_alert_release');
		$this->db->where('public_alert_release.release_id = (SELECT MIN(r.release_id) FROM public_alert_release r WHERE r.event_id = ' . $event_id . ')', NULL, FALSE);
		$this->db->join('public_alert_trigger', 'public_alert_release.release_id = public_alert_trigger.release_id', 'left');
		$this->db->join('lut_triggers', 'lut_triggers.trigger_type = public_alert_trigger.trigger_type COLLATE utf8_bin', 'left');
		$this->db->order_by('public_alert_release.release_id', 'desc');
		$this->db->order_by('public_alert_trigger.timestamp', 'asc');
		$data = $this->db->get();
		return $data->result_array();
	}
	
}
