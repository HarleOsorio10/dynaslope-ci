<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_Alert_Event_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Note: originally from accomplishment_model
	 **/	
	public function getEventDetails($event_id) // CAUTION - already in events_model
	{
		$query = $this->db->get_where('public_alert_event', array("event_id" => $event_id));
		return $query->result_object()[0];
	}

	/**
	 * Note: originally from bulletin and pubrelease model
	 **/
	public function getEventWithSiteDetails($event_id) {
		$this->db->select('public_alert_event.*, sites.*');
		$this->db->from('public_alert_event');
		$this->db->join('sites', 'public_alert_event.site_id = sites.site_id');
		$this->db->where('public_alert_event.event_id', $event_id);
		$query = $this->db->get();
		return $query->result_object();
	}

	/**
	 * Note: originally from Pubrelease_model
	 **/
	public function getEventValidity($event_id)	{
		$this->db->select('validity');
		$query = $this->db->get_where('public_alert_event', array('event_id' => $event_id));
		return $query->result_object();
	}

	/**
	 * Note: originally from Pubrelease_model
	 **/
	public function getLastSiteEvent($site_id) {
		$sql = "SELECT * 
				FROM public_alert_event
				WHERE site_id = '$site_id'
				ORDER BY event_id 
				DESC LIMIT 1";

		$result = $this->db->query($sql);

		return $result->row();
	}

	/**
	 * Note: originally from Pubrelease_model
	 **/
	public function getOnGoingAndExtendedSitesAndStatus()	{
		$this->db->select('site_id, status');
		$this->db->where('status','on-going');
 		$this->db->or_where('status','extended');
		$query = $this->db->get('public_alert_event');
		//$query = $this->db->get_where('public_alert_event', array('status' => 'on-going'));
		return $query->result_array();
	}

	/**
	 * Note: originally from manifestations_model
	 **/
	public function getLastEventStatus($site_id) {
		$this->db->select("status");
		$this->db->from("public_alert_event");
		$this->db->where("site_id", $site_id);
		$this->db->order_by("event_start", "desc");
		$this->db->limit(1);
		$result = $this->db->get();

		return $result->row()->status;
	}	

	/**
	 * 	@author John Louie Nepomuceno
	 **/
	public function getEventsPerAlertLevelHistory($alert_level, $start_time, $end_time) {
		$filter = "";
		if($alert_level != null && $alert_level != "" && $alert_level != "ALL") {
			$filter = $filter . " AND par.internal_alert_level LIKE '" . $alert_level . "%'";
		}
		if($start_time != null && $start_time != "" && $end_time != null && $end_time != "") {
			$filter = $filter . " AND par.data_timestamp >= '" . $start_time . "'";
			$filter = $filter ." AND par.data_timestamp < '" . $end_time . "'";
		}

		$sql = "SELECT 
					sites.site_code, par.*
				FROM 
					public_alert_release AS par
				RIGHT JOIN 
					(SELECT 
							pae.event_id AS event, pae.site_id 
						FROM 
							public_alert_event AS pae 
						WHERE 
							pae.status NOT IN ('invalid', 'routine')
					) AS eventlist
				ON 
					eventlist.event = par.event_id
				RIGHT JOIN 
					sites 
				ON 
					eventlist.site_id = sites.site_id
				WHERE 
					par.data_timestamp = (
						SELECT MAX(par2.data_timestamp)
		                FROM public_alert_release AS par2
		                WHERE par.event_id = par2.event_id AND par2.internal_alert_level NOT IN ('ND','A0')
		            )";
		$final_sql = $sql . $filter;
		$query = $this->db->query($final_sql); 
		return $query->result();
	}

	/**
	 *	@author John Louie Nepomuceno
	 **/
	public function getEventsBasedOnDate($start_time, $end_time) {
		$filter = "";
		if($start_time != null && $start_time != "" && $end_time != null && $end_time != "") {
			$filter = $filter . " AND par.data_timestamp >= '" . $start_time . "'";
			$filter = $filter ." AND par.data_timestamp < '" . $end_time . "'";
		}

		$sql = "SELECT 
					sites.site_code, par.*, LEFT(par.internal_alert_level, 2) AS public_alert_level
				FROM 
					public_alert_release AS par
				RIGHT JOIN 
					(SELECT 
							pae.event_id AS event, pae.site_id 
						FROM 
							public_alert_event AS pae 
						WHERE 
							pae.status NOT IN ('invalid', 'routine')
					) AS eventlist
				ON 
					eventlist.event = par.event_id
				RIGHT JOIN 
					sites 
				ON 
					eventlist.site_id = sites.site_id
				WHERE 
					par.data_timestamp = (
						SELECT MAX(par2.data_timestamp)
		                FROM public_alert_release AS par2
		                WHERE par.event_id = par2.event_id AND par2.internal_alert_level NOT IN ('ND','A0')
		            )";
		$final_sql = $sql . $filter;
		$query = $this->db->query($final_sql); 
		return $query->result();	
	}
}
