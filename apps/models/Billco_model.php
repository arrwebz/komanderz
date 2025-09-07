<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Billco_model extends CI_Model {
    
    public $intbillcoid;
	public $intorderid;
	public $strposition;
	
	public $strrecipient;
	public $strcolldate;
	public $strnotes;
	public $intstatus;
	
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('billco');
    }
	
	public function getallinvkomet() {
        $sql = "SELECT *, DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order` WHERE `orderinv`='1' AND unit = 'KOMET' ORDER BY `orderid` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallinvmesra() {
        $sql = "SELECT *, DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order` WHERE `orderinv`='1' AND unit = 'MESRA' ORDER BY `orderid` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getallinvpadi() {
        $sql = "SELECT *, DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order` WHERE `orderinv`='1' AND unit = 'PADI' ORDER BY `orderid` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallinvunpaid() {  
        $sql = "SELECT *, DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order`
		WHERE `orderinv`='1' AND `procdat` = '0000-00-00' AND `status` != '9' 
		AND `status` != '1' AND `status` != '6'
		AND YEAR(`invdate`) = YEAR(CURDATE()) AND DATEDIFF(CURDATE(),`invdate`) >= '28'
		ORDER BY `code` ASC";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallinvatfin() {  
        $sql = "SELECT `a`.*, `b`.`collectdate`, DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat` FROM `vw_order` `a` JOIN `tb_billco` `b`
		WHERE `a`.`orderid` = `b`.`orderid` 
		AND `a`.`orderinv`='1' 
		AND `a`.`procdat` = '0000-00-00' AND `a`.`status` != '9' 
        AND `a`.`status` != '1' AND `a`.`status` = '6'
		AND YEAR(`a`.`invdate`) = YEAR(CURDATE())
		ORDER BY `a`.`code` ASC";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	//(MAX(`b`.`collectdate`) + INTERVAL 5 DAY) AS `estdate`,
	public function getallinvpostfin() {  
        $sql = "SELECT `a`.*, MAX(`b`.`collectdate`) AS `collectdate`,
		DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat` FROM `vw_order` `a` JOIN `tb_billco` `b`
		WHERE `a`.`orderid` = `b`.`orderid` 
		AND `a`.`orderinv`='1'  
		AND `a`.`procdat` = '0000-00-00' AND `a`.`status` != '9' 
        AND `a`.`status` != '1' AND `a`.`status` = '8'
		AND YEAR(`a`.`invdate`) = YEAR(CURDATE())
		GROUP BY `b`.`orderid`
		ORDER BY `a`.`code` ASC";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsearchnopesbillco($unit="",$invnum="",$spk="",$segmen="",$invmonth="",$invyear="",$status="") {
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
		if ($spk != "") {
			$sql .= " AND `a`.`spknum` LIKE '%$spk%'";
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
		if ($status != "") {
		    if($status == 6){
                $sql .= " AND `a`.`status` IN(6,18) ";
            }else{
                $sql .= " AND `a`.`status` = '$status'";
            }
		}
		$sql .=" ORDER BY `a`.`code` DESC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getsinglebillco($id) {
        $sql = "SELECT * FROM `tb_billco` WHERE `billcoid` = '$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
    }
	
	public function getbillcobyinv($id) {
        $sql = "SELECT * FROM $this->tbname WHERE orderid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function updatepos() { 
        $sql = sprintf("UPDATE `tb_billco` SET 
		`recipient`='%s', `collectdate`='%s', `notes`='%s',
		`chuser`='%u', `chdat`='%s' WHERE `billcoid`='%u'",
            $this->strrecipient, $this->strcolldate, $this->strnotes, 
            $this->strchuser,$this->strchdat,$this->intbillcoid);
		//echo '<pre>'; 
		//print_r($sql); exit;
        $this->db->query($sql);
    }
	
	public function addbillco() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s','%s','%u',
		'%u','%s','%u','%s')",
            '',$this->intorderid, $this->strposition, $this->strrecipient, $this->strcolldate, $this->strnotes, $this->intstatus,
			$this->strcruser,$this->strcrdat,'','' );
		// echo '<pre>';
		// print_r($sql); exit;
        $this->db->query($sql);
    }
	
	public function editbilling() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`orderid`='%u', `receivefrom`='%s', `maker`='%s', `processdate`='%s',
		`chuser`='%u', `chdat`='%s' WHERE billcoid='%u'",
            $this->intorderid, $this->strtaxinv, $this->strmaker, $this->strprodat, 
            $this->strchuser,$this->strchdat,$this->intbillcoid);
        $this->db->query($sql);
    }
	

    public function deletebillco($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE billcoid = '". $id ."'");
    }
	
	public function countpaid(){
		$sql = "SELECT ROUND( ( SELECT COUNT(`status`) FROM `tb_order` WHERE `status` = '1' 
		AND `orderinv`='1' AND YEAR(`invdate`) = YEAR(CURDATE()) ) / ( SELECT COUNT(`status`) 
		FROM `tb_order` WHERE `orderinv`='1' AND YEAR(`invdate`) = YEAR(CURDATE()) ) * 100 , 0) AS `totalcair`";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
    
}