<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Includes the User_Model class as well as the required sub-classes
 * @package codeigniter.application.models
 */

/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */

class Earthquake_model extends CI_Model {

	public function getRecentEarthquakeEvent() {
		$query = "SELECT  upper(sites.site_code) as site_code, earthquake_events.ts, earthquake_events.magnitude, 
		loggers.latitude, loggers.longitude, earthquake_events.critical_distance,
		earthquake_events.latitude as eq_lat, earthquake_events.longitude as eq_lon 
		FROM earthquake_alerts INNER JOIN earthquake_events ON earthquake_alerts.eq_id = earthquake_events.eq_id 
		INNER JOIN loggers ON earthquake_alerts.site_id = loggers.site_id INNER JOIN 
		sites ON loggers.site_id = sites.site_id ORDER BY earthquake_alerts.eq_id desc";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function getSiteLocations() {
		$query = "SELECT * FROM loggers";
		$res = $this->db->query($query);
		return $res->result();
	}

}
