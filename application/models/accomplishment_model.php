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
	
	public function getReleasesByStaff($staff_id, $start, $end) {
        // Convert strtime to datetime
        $final_start = urldecode($start);
        $final_end = urldecode($end);

		$sql = "
			SELECT
				data_timestamp, site_code, event_id, 
			    release_id, internal_alert_level, validity, 
			    status, reporter_id_mt, reporter_id_ct
			from 
				(select * from public_alert_release
				where release_id in
					(select max(release_id)
					from 
						public_alert_event
					inner join
						(select *, TIMESTAMP(DATE(SUBTIME(data_timestamp, TIME_FORMAT('8:00', '%T'))), 
						SEC_TO_TIME(((TIME(data_timestamp) NOT BETWEEN TIME_FORMAT('8:00', '%T') and TIME_FORMAT('19:59', '%T'))*12+8)*60*60)) as shift_timestamp
						from public_alert_release
						where data_timestamp between '$final_start' and '$final_end'
						and (reporter_id_mt = $staff_id or reporter_id_ct = $staff_id)
						) as par
					using (event_id)
					group by event_id, shift_timestamp)
				) as recent_release
			inner join
			public_alert_event
			using (event_id)
			inner join
				sites
			using (site_id)
			where (status != 'extended' or status != 'routine')
		";

        $result = $this->db->query($sql);
        return $result->result();
	}
}

?>
