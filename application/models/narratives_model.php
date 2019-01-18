<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narratives_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     *  Note: This function was taken from accomplishment model. 
     **/
    public function getNarrativesForShift($event_id, $start, $end) {
        $this->db->where_in('event_id', $event_id);
        $this->db->where('timestamp >=', $start);
        if( $end != '' )$this->db->where('timestamp <=', $end);
        $this->db->order_by("timestamp", "asc");
        $query = $this->db->get('narratives');
        $result = $query->result_array();
        return $result;
    }

    public function getNarratives ($event_id, $site_id = null) {
        $this->db->select("narratives.*, sites.site_code");
        $this->db->from("narratives");
        $this->db->join("sites", "narratives.site_id = sites.site_id");
        $this->db->where_in('narratives.event_id', $event_id);

        if (!is_null($site_id)) {
            $this->db->or_where_in("narratives.site_id", $site_id);
            $this->db->where("narratives.event_id", NULL);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
}

?>