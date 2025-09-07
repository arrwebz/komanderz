<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Track_model extends CI_Model {
    
    public $inttrackid;
	public $intorderid;
	public $strposition;
	
	public $strrecipient;
	public $strtrackdate;
	public $strtracknote;
	public $inttrackstatus;
	
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('trackorder');
    } 
	
	public function getallinvoicebyam($amname,$unit) {
        $sql = "SELECT *, DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order` WHERE `amkomet` = '$amname' AND `unit` = '$unit' ORDER BY `orderid` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallinvoice($unit) {
        $sql = "SELECT *, DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order` WHERE `unit` = '$unit' ORDER BY `orderid` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getpositionbyinvoice($orderid) {  
        $sql = "SELECT * FROM $this->tbname WHERE `orderid` = '$orderid' ORDER BY `trackdate` DESC"; 
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function addtrackorder() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s','%s','%u',
		'%u','%s','%u','%s')",
            '',$this->intorderid, $this->strposition, $this->strrecipient, $this->strtrackdate, $this->strtracknote, $this->inttrackstatus,
			$this->strcruser,$this->strcrdat,'','' );
		// echo '<pre>';
		// print_r($sql); exit;
        $this->db->query($sql);
    }
	
	public function getsearchtrackorder($unit="",$invnum="",$segmen="",$invmonth="",$invyear="") {
		$sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`,
		`a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `countspb`,
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat`
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1'";
		if ($unit != "") {
			$sql .= " AND `a`.`unit`='$unit'";
		}
		if ($invnum != "") {
			$sql .= " AND `a`.`invnum` = '$invnum'";
		}
		if ($segmen != "") {
			$sql .= " AND `a`.`segment`='$segmen'";
		}
		if ($invmonth != "") {
			$sql .= " AND MONTH(`a`.`invdate`) = '$invmonth'";
		}
		if ($invyear != "") {
			$sql .= " AND YEAR(`a`.`invdate`) = '$invyear'";
		}
		$sql .=" ORDER BY `a`.`code` DESC "; 
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	
	///////////////////
	
    
}