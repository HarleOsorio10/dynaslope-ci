<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author: Kevin Dhale dela Cruz
 * @author/editor: John Louie Nepomuceno
 * This is a compilation model of all functions relating to users table.
 **/

class Users_Model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Gets the dewsl users' (staff) id, first name, and last name.
	 * Note: This was the 3 getStaff() functions w/c came from pubrelease_model.php, 
	 * manifestations_model, and monitoring_model.php all renamed as getDEWSLUsers().
	 **/
	public function getDEWSLUsers() {
		$this->db->select('u.user_id AS id, u.firstname AS first_name, u.lastname AS last_name');
		$this->db->from('comms_db.users AS u');
		$this->db->join('comms_db.membership AS mem', 'mem.user_fk_id = u.user_id');
		$this->db->where('is_active','1');
		$this->db->order_by("u.lastname", "asc");
		$query = $this->db->get();
		return json_encode($query->result_array());
	}

}
