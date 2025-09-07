<?php defined('BASEPATH') or exit('No direct script access allowed');

class Letterk_model extends CI_Model {

	public $intletterkontrakid;
	public $strcode;
	public $strtype;
	public $strdivisi;
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
        $this->tbname = $this->db->dbprefix('letterkontrak');
    }

    function getallletter($param=array()) {
        $where = 'WHERE 1=1';
        if(!empty($param['code'])){
            $where .= " AND code LIKE '%". $param['code'] ."%'";
        }

        if(!empty($param['type'])){
            $where .= " AND type = '". $param['type'] ."'";
        }

        if(!empty($param['divisi'])){
            $where .= " AND divisi LIKE '%". $param['divisi'] ."%'";
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

        $sql = "SELECT * FROM $this->tbname ". $where ." ORDER BY `letterkontrakid` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getcode($type) {
        $sql = "SELECT MAX(letterkontrakid) AS letterkontrakid FROM $this->tbname WHERE type = '". $type ."'";
        echo "<pre>"; print_r($sql); echo "</pre>";exit;
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['letterkontrakid'];
    }

    function getsingleletter($id) {
        $sql = "SELECT * FROM $this->tbname WHERE letterkontrakid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastnumber($type) {
        $sql = "SELECT * FROM $this->tbname WHERE type = '".$type."' ORDER BY letterkontrakid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastnumberbyunit($post) {
        $sql = "SELECT * FROM $this->tbname WHERE type = '".$post['type']."' AND unit = '". $post['unit'] ."'ORDER BY letterkontrakid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function addletter() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s','%s','%s','%u','%s','%s','%s')",
            '', $this->strcode, $this->strtype, $this->strdivisi, $this->strunit, $this->strmonth, $this->stryear, $this->strdivkomet, $this->strcruser, $this->strcrdat, '', '');
        $this->db->query($sql);
    }

    function editletter() {
        $sql = sprintf("UPDATE $this->tbname SET 
				code = '%s', 
				`type` = '%s',
				divisi = '%s',  
				unit = '%s', 
				`month` = '%s', 
				`year` = '%s', 
				divkomet = '%s', 
				chuser = '%s', 
				chdat = '%s' 
				WHERE letterkontrakid = '%u'",
            $this->strcode, $this->strtype, $this->strdivisi, $this->strunit, $this->strmonth, $this->stryear, $this->strdivkomet, $this->strchuser, $this->strchdat, $this->intletterkontrakid);
        $this->db->query($sql);
    }

    function delete() {
        $sql = sprintf("DELETE FROM $this->tbname WHERE `letterkontrakid`='%u'", $this->intletterkontrakid);
        $this->db->query($sql);
    }
}