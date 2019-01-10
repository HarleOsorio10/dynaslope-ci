<?php  

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accomplishment_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getShiftReleases($start, $end) {
		$this->db->select('public_alert_release.*, public_alert_event.*, sites.site_code, u1.firstname AS mt_first, u1.lastname AS mt_last, u2.firstname AS ct_first, u2.lastname AS ct_last');
		$this->db->from('public_alert_release');
		$this->db->join('public_alert_event', 'public_alert_event.event_id = public_alert_release.event_id');
		$this->db->join('sites', 'public_alert_event.site_id = sites.site_id');
		$this->db->join('comms_db.users AS u1', "u1.user_id = public_alert_release.reporter_id_mt");
		$this->db->join('comms_db.users AS u2', "u2.user_id = public_alert_release.reporter_id_ct");
		$this->db->where('public_alert_release.data_timestamp >', $start);
		$this->db->where('public_alert_release.data_timestamp <=', $end);
		$this->db->where('public_alert_event.status !=', 'routine ');
		$this->db->where('public_alert_event.status !=', 'invalid ');
		$this->db->order_by("data_timestamp", "desc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function getSitesWithAlerts() {
		$this->db->select('public_alert_event.*, sites.*, sites.site_code AS name');
		$this->db->from('public_alert_event');
		$this->db->join('sites', 'public_alert_event.site_id = sites.site_id');
		$this->db->where('status', 'on-going');
		$this->db->or_where('status', 'extended');
		$query = $this->db->get();
		return $query->result_object();
	}

	public function getNarratives($event_id) {
		$this->db->select("narratives.*, sites.site_code AS name");
		$this->db->from("narratives");
		$this->db->join("public_alert_event", "public_alert_event.event_id = narratives.event_id" );
		$this->db->join("sites", "public_alert_event.site_id = sites.site_id");
		$this->db->where_in('narratives.event_id', $event_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function getReleasesByStaff($staff_id, $start = null, $end = null) {
        $sql = "SELECT 
                    *, 
                    MAX(data_timestamp) as last_release_data_timestamp,
                    MAX(release_id) as last_release_id  
                FROM 
                (
                    SELECT
                        par.event_id, par.release_id,
                        par.data_timestamp, par.internal_alert_level,
                        par.reporter_id_mt, par.reporter_id_ct,
                        pae.status, sites.site_code
                    FROM
                        public_alert_release AS par
                    INNER JOIN 
                        public_alert_event AS pae
                        ON pae.event_id = par.event_id
                    INNER JOIN
                        sites
                        ON pae.site_id = sites.site_id
                    WHERE pae.status != 'invalid'
                    AND reporter_id_mt = '$staff_id' OR reporter_id_ct = '$staff_id'
                ) AS table1
                WHERE data_timestamp > '$start'
                AND data_timestamp < '$end'
                GROUP BY event_id, site_code, reporter_id_mt, reporter_id_ct 
                ";

        $result = $this->db->query($sql);
        return $result->result();
	}
}

?>
