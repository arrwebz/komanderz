<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bank_model extends CI_Model {

	public $intbankid;
	public $strbankname;
	public $straccname;
	public $straccnum;

    private $tbname;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('bank');
    }

    function getallbank($param=array()) {
        $where = 'WHERE 1=1';
        if(!empty($param['bank'])){
            $where .= " AND bankname LIKE '%". $param['bank'] ."%'";
        }
        if(!empty($param['name'])){
            $where .= " AND accname LIKE '%". $param['name'] ."%'";
        }

        $sql = "SELECT * FROM $this->tbname ". $where ." ORDER BY `bankid` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getcode($type) {
        $sql = "SELECT MAX(bankid) AS bankid FROM $this->tbname WHERE type = '". $type ."'";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['bankid'];
    }

    function getsinglebank($id) {
        $sql = "SELECT * FROM $this->tbname WHERE bankid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function addbank() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s')",
            '', $this->strbankname, $this->straccname, $this->straccnum);
        $this->db->query($sql);
    }

    function editbank() {
        $sql = sprintf("UPDATE $this->tbname SET 
				`bankname` = '%s', 
				`accname` = '%s', 
				`accnum` = '%s'
				WHERE bankid = '%u'",
            $this->strbankname, $this->straccname, $this->straccnum, $this->intbankid);
        $this->db->query($sql);
    }

    function delete() {
        $sql = sprintf("DELETE FROM $this->tbname WHERE `bankid`='%u'", $this->intbankid);
        $this->db->query($sql);
    }
}