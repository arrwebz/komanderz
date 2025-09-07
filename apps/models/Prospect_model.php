<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Prospect_model extends CI_Model {
    
    public $intprospectid;
	public $intuserid;
	public $strorderid;
	
	public $strcode;
	public $strunit;
	public $intdivision;
	public $intsegment; 
	
	public $stramuser; 
	public $stramkomet; 
	
	public $intvalue;
    public $strlat;
    public $strlong;
    public $strnotes;
	public $strreqdate; 
	public $intstatus; 
	
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('prospectorder');
    } 
	
	public function getallprospectbyam($amname,$unit) {
        $sql = "SELECT `a`.*,		
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`
		FROM $this->tbname `a`
		WHERE 
            `a`.`amkomet` = '$amname' 
            AND YEAR(reqdate) = '". date('Y') ."'
		ORDER BY `a`.`prospectid` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	 
	public function getallprospect($unit) {
        $sql = "SELECT `a`.*,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`
		FROM $this->tbname `a` 
		WHERE YEAR(reqdate) = '". date('Y') ."' ORDER BY `a`.`prospectid` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	 
	public function getsingleprospect($prospectid) { 
        $sql = "SELECT * FROM $this->tbname WHERE `prospectid` = '$prospectid' "; 
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function addprospect() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s','%s','%s','%s','%s',
		'%s','%s','%s','%s','%s','%u')",
            '',$this->intuserid, $this->strcode, '', $this->intdivision, $this->intsegment, $this->stramuser, $this->stramkomet, $this->strorderid,
            $this->intvalue,$this->strlat,$this->strlong,$this->strnotes,$this->strreqdate,$this->intstatus );
//		 echo '<pre>';print_r($sql); exit;
        $this->db->query($sql);
    }

    public function editprospect() {
        $sql= sprintf("UPDATE $this->tbname SET 
                `division`='%u', `segment`='%u', `amuser`='%s', `amkomet`='%s', `reqdate`='%s', `value`='%s' WHERE prospectid='%s'",
                    $this->intdivision, $this->intsegment, $this->stramuser, $this->stramkomet, $this->strreqdate, $this->intvalue,
                    $this->intprospectid);
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
	
	public function getmaxcode(){
		$sql = "SELECT MAX(`prospectid`) AS `lastid` FROM $this->tbname";
		$stmt = $this->db->query($sql);
		return $stmt->result_array();
	}
	///////////////////

    public function deletepros($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE prospectid = '". $id ."'");
    }
}