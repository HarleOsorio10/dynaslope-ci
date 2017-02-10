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
class Gintags_helper_model extends CI_Model {
	public function initialize() {
        //Create a DB Connection
        $host = "localhost";
        $usr = "root";
        $pwd = "senslope";
        $dbname = "senslopedb";

        $this->dbconn = new \mysqli($host, $usr, $pwd);
        $this->connectSenslopeDB();
        $this->createGintagsReferenceTable();
        $this->createGintagsTable();
	}

    //Connect to senslopedb
    public function connectSenslopeDB() {
        //$success = $this->dbconn->mysqli_select_db("senslopedb");
        $success = mysqli_select_db($this->dbconn, "senslopedb");

        if (!$success) {
            $this->createSenslopeDB();
        }
    }

	public function createGintagsTable() {
        $sql = "CREATE TABLE IF NOT EXISTS `gintags` (
				  `gintags_id` int(11) NOT NULL,
				  `tag_id` int(11) NOT NULL,
				  `tagger` int(10) unsigned NOT NULL,
				  `remarks` varchar(200) DEFAULT NULL,
				  `database` varchar(45) DEFAULT NULL,
				  `timestamp` varchar(45) DEFAULT NULL,
				  PRIMARY KEY (`gintags_id`),
				  KEY `tag_id_idx` (`tag_id`),
				  KEY `tagger_idx` (`tagger`),
				  CONSTRAINT `tag_id` FOREIGN KEY (`tag_id`) REFERENCES `gintags_reference` (`tag_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
				  CONSTRAINT `tagger` FOREIGN KEY (`tagger`) REFERENCES `dewslcontacts` (`eid`) ON DELETE NO ACTION ON UPDATE NO ACTION
				) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        if ($this->dbconn->query($sql) === TRUE) {
            echo "Table 'gintags' exists!\n";
        } else {
            die("Error creating table 'gintags': " . $this->dbconn->error);
        }
	}

	public function createGintagsReferenceTable() {
        $sql = "CREATE TABLE IF NOT EXISTS `gintags_reference` (
				  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
				  `tag_name` varchar(200) NOT NULL,
				  `tag_description` longtext,
				  PRIMARY KEY (`tag_id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        if ($this->dbconn->query($sql) === TRUE) {
            echo "Table 'gintags_reference' exists!\n";
        } else {
            die("Error creating table 'gintags_reference': " . $this->dbconn->error);
        }
	}

    public function insertGinTagEntry($data){
        $doExist = $this->checkTagExist($data);
        if(sizeof($doExist) == 0) {
            echo "Tag does not exist";
            $ginRefs = $this->insertIntoGinRef($data);
            $ginTags = $this->insertIntoGintags($data);
            echo $ginRefs;
            echo $ginTags;
        } else {
            echo "Tag does exist";
        }
    }

    public function checkTagExist($data){
        $sql = "SELECT * FROM gintags_reference WHERE tag_name='".$data['tag_name']."'";
        $query_result = $this->db->query($sql);
        return $query_result->result();
    }

    public function insertIntoGinRef($data){
        $sql = "INSERT INTO gintags_reference VALUES(0,'".$data["tag_name"]."','".$data["tag_description"]."')";
        $result = $this->db->query($sql);
        return $result;
    }

    public function insertIntoGintags($data){
        $sql = "SELECT tag_id FROM gintags_reference WHERE tag_name='".$data["tag_name"]."'";
        $result = $this->db->query($sql);
        $tag_id_fk = $result->result();

        $sql = "INSERT INTO gintags VALUES (0,".$tag_id_fk[0]->tag_id.",'".$data["tagger"]."','".$data["remarks"]."','".$data["database"]."','".$data["timestamp"]."')";
        $result = $this->db->query($sql);
        return $result;
    }
}
