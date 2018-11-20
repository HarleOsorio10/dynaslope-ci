<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Qa_Tally_Model extends CI_Model {

		public function getRecordForToday($table) {
			$query = "SELECT * FROM commons_db.".$table." WHERE status = '1';";
			$result = $this->db->query($query);
			if ($result->num_rows != 0) {
				$sites = $result->result();
			} else {
				$sites = [];
			}
			return $sites;
		}

		public function getDefaultRecordForToday($status) {
			$query = "SELECT * FROM senslopedb.public_alert_event INNER JOIN sites ON public_alert_event.site_id = sites.site_id where status = '".$status."';";
			$result = $this->db->query($query);
			if ($result->num_rows != 0) {
				$sites = $result->result();
			} else {
				$sites = [];
			}
			return $sites;
		}

		public function getRecipientsForSite($site_id) {
			$query = "SELECT DISTINCT users.user_id, users.firstname, users.lastname, user_organization.org_name, sites.site_code, user_mobile.sim_num, sites.purok, sites.sitio, sites.barangay, sites.municipality, sites.province FROM comms_db.users INNER JOIN user_organization ON users.user_id = user_organization.user_id INNER JOIN sites ON user_organization.fk_site_id = sites.site_id INNER JOIN user_mobile ON users.user_id = user_mobile.user_id INNER JOIN user_ewi_status ON users.user_id = user_ewi_status.users_id WHERE sites.site_id = '".$site_id."' AND user_ewi_status.status = '1' AND users.status = '1' AND user_mobile.mobile_status = '1'";
			$result = $this->db->query($query);
			if ($result->num_rows != 0) {
				$recipients = $result->result();
			} else {
				$recipients = [];
			}
			return $recipients;
		}

		public function insertSettingsForTally($table_source, $tally) {
			$query = "INSERT INTO ".$table_source." VALUES (0,'".$tally['event_id']."','".$tally['ewi_expected']."','".$tally['ewi_actual']."','".$tally['status']."','".$tally['ts']."',".$tally['site_id'].")";
			$result = $this->db->query($query);
			return $result;
		}
	}
?>