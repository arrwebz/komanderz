<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dropdown_model extends CI_Model {
    //kode arsip
    public $intdivisionid;
	public $intspbid;
	public $strcode;
	public $strname;
	public $strcruser; 
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('division');
    }
	
	//SIMPLE
	//new table order nopes
	public function getalldiv() {
		$sql = "SELECT `divisionid`, `code`, `name`, `cruser`
			FROM $this->tbname ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getallseg() {
		$sql = "SELECT `segmentid`, `divisionid`, `code`, `name`
			FROM `tb_segment` ORDER BY `divisionid` ASC";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getsegmentbydiv($id) {
		$sql = "SELECT `segmentid`, `divisionid`, `code`, `name`
			FROM `tb_segment` WHERE `divisionid`='$id' ORDER BY `segmentid` ASC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getallband() {
		$sql = "SELECT `bandid`, `bandname`, `bandvalue`
			FROM `tb_memberband` ORDER BY `bandid` ASC";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getbandvalue($id) {
		$sql = "SELECT `bandid`, `bandname`, `bandvalue`
			FROM `tb_memberband` WHERE `bandid`='$id' ORDER BY `bandid` ASC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getallcategory() { 
		$sql = "SELECT * FROM `tb_astcategory` ORDER BY `astcategoryid` ASC";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getalltype() {
		$sql = "SELECT * FROM `tb_astype` ORDER BY `astypeid` ASC";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	} 
	 
	public function getallbrand() {
		$sql = "SELECT * FROM `tb_astbrand` ORDER BY `astbrandid` ASC";
		$stmt = $this->db->query($sql); 
        return $stmt->result_array();
	}
	
	public function getallinvestor() {
		$sql = "SELECT * FROM `tb_investor` ORDER BY `investorid` ASC";
		$stmt = $this->db->query($sql); 
        return $stmt->result_array();
	}
	
	//AND `roleid` = '6' 
	//`groupid` = '4' AND
	public function getalluseram() {
		$sql = "SELECT userid, `fullname` FROM `vw_useraccounts` WHERE `status` = '1' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}

    public function getfakturpajak($unit = 'KOMET') {
        $sql = "SELECT code, unit, status
			FROM `tb_fakturpajak` 
			WHERE 
			unit = '". $unit ."'
			AND status = 1
			ORDER BY `fakturpajakid` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getbank(){
        $sql = "SELECT * FROM `tb_bank` ORDER BY `accname` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
}