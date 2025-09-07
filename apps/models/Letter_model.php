<?php defined('BASEPATH') or exit('No direct script access allowed');

class Letter_model extends CI_Model {

	public $intletterid;
	public $strcode;
	public $strtype;
	public $strinitial;
	public $strsubject;
	public $strunit;
	public $strmonth;
	public $stryear;
	public $strdivkomet;
    public $strcruser;
    public $strcrdat;
    public $strchuser;
    public $strchdat;

    private $tbname;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('letter');
    }

    function getallletter($param=array()) {
        $where = 'WHERE 1=1';
        if(!empty($param['code'])){
            $where .= " AND code LIKE '%". $param['code'] ."%'";
        }
        if(!empty($param['type'])){
            $where .= " AND type = '". $param['type'] ."'";
        }
        if(!empty($param['subject'])){
            $where .= " AND subject LIKE '%". $param['subject'] ."%'";
        }
        if(!empty($param['initial'])){
            $where .= " AND initial LIKE '%". $param['initial'] ."%'";
        }
        if(!empty($param['unit'])){
            $where .= " AND unit = '". $param['unit'] ."'";
        }
        if(!empty($param['divkomet'])){
            $where .= " AND divkomet = '". $param['divkomet'] ."'";
        }
        if(!empty($param['month'])){
            $where .= " AND month = '". $param['month'] ."'";
        }
        if(!empty($param['year'])){
            $where .= " AND year = '". $param['year'] ."'";
        }

        $sql = "SELECT * FROM $this->tbname ". $where ." ORDER BY `letterid` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getcode($type) {
        $sql = "SELECT MAX(letterid) AS letterid FROM $this->tbname WHERE type = '". $type ."'";
        echo "<pre>"; print_r($sql); echo "</pre>";exit;
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['letterid'];
    }

    function getsingleletter($id) {
        $sql = "SELECT * FROM $this->tbname WHERE letterid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastnumber($type) {
        $sql = "SELECT * FROM $this->tbname WHERE type = '".$type."' ORDER BY letterid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastnumberbyunit($post) {
        $sql = "SELECT * FROM $this->tbname WHERE type = '".$post['type']."' AND unit = '". $post['unit'] ."'ORDER BY letterid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function addletter() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s','%s','%s','%s','%u','%s','%s','%s')",
            '', $this->strcode, $this->strtype, $this->strinitial, $this->strsubject , $this->strunit, $this->strmonth, $this->stryear, $this->strdivkomet, $this->strcruser, $this->strcrdat, '', '');
        $this->db->query($sql);
    }

    function editletter() {
        $sql = sprintf("UPDATE $this->tbname SET 
				code = '%s', 
				`type` = '%s',
				initial = '%s', 
				subject = '%s', 
				unit = '%s', 
				`month` = '%s', 
				`year` = '%s', 
				divkomet = '%s', 
				chuser = '%s', 
				chdat = '%s' 
				WHERE letterid = '%u'",
            $this->strcode, $this->strtype, $this->strinitial, $this->strsubject, $this->strunit, $this->strmonth, $this->stryear, $this->strdivkomet, $this->strchuser, $this->strchdat, $this->intletterid);
        $this->db->query($sql);
    }

    function delete() {
        $sql = sprintf("DELETE FROM $this->tbname WHERE `letterid`='%u'", $this->intletterid);
        $this->db->query($sql);
    }
}