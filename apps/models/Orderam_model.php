<?php defined('BASEPATH') or exit('No direct script access allowed');

class Orderam_model extends CI_Model {

    /* STATUS ORDER
     * 0. dibuat
     * 1. approved
     * */
    
    //kode arsip
    public $intorderamid;
    public $intorderid;
	public $intorderinv;
	public $strstatorder;
	public $strcode;
	public $intnvnum;
	public $intfaknum;
	
	public $strinvdat;
	public $strsentdat;

	/*informasi pelanggan*/
    public $strunit;
	public $strjobtype;
    public $strdivision;
	public $strsegment;
	public $stramuser;
	public $stramkomet;
	public $strprojectname;

	/*spk*/
	public $strspknum;
	public $strspkindat;
	public $strspkdat;

	/*harga*/
	public $intbasevalue;
	public $intppnvalue;
	public $intnetvalue;
	
	public $strfiles;

    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('orderam');
    }

    /* NEW */
    function getallorderam() {
        $sql = "SELECT 
                    a.*,
                    (SELECT z.code FROM tb_division z WHERE z.divisionid = a.division LIMIT 0,1) AS division, 
		            (SELECT z.code FROM tb_segment z WHERE z.segmentid = a.segment LIMIT 0,1) AS segment, 
                    (SELECT COUNT(z.spbid) FROM tb_spb z WHERE z.orderid = a.orderid AND z.status != '9' LIMIT 0,1) AS countspb
                FROM $this->tbname a 
                ORDER BY `orderamid` DESC LIMIT 0,50";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getallorderambyam($fullname) {
        $sql = "SELECT 
                    a.*, 
                    (SELECT z.code FROM tb_division z WHERE z.divisionid = a.division LIMIT 0,1) AS division, 
		            (SELECT z.code FROM tb_segment z WHERE z.segmentid = a.segment LIMIT 0,1) AS segment,
                    (SELECT COUNT(z.spbid) FROM tb_spb z WHERE z.orderid = a.orderid AND z.status != '9' LIMIT 0,1) AS countspb
                FROM $this->tbname a 
                LEFT JOIN tb_user b ON b.fullname = a.amkomet
                WHERE 
                    a.amkomet = '". $fullname ."' 
                ORDER BY a.`orderamid` DESC LIMIT 0,50";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getsingleorderam($id) {
        $sql = "SELECT * FROM $this->tbname WHERE orderamid = '$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getsingleditorder($id) {
        $sql = "SELECT `orderamid`, `orderid`, `orderinv`, `orderstatus`, `code`, `invnum`, `faknum`, `invdate`, `unit`, `jobtype`, `division`, `segment`, `amuser`, `amkomet`, `projectname`, `sentdate`, `spknum`, `spkindat`, `spkdat`, `basevalue`, `ppnvalue`, `netvalue`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE orderamid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getorderidbyinvnum($num) {
        $sql = "SELECT orderid FROM tb_order WHERE invnum = '$num' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function addoam(){
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
        '%s','%s','%s','%s','%s','%s','%s','%s','%s', 
		'%u','%s','%u','%s')",
            '','',$this->intorderinv,$this->strstatorder,$this->strcode,$this->intnvnum,$this->intfaknum, $this->strinvdat,
            $this->strunit, $this->strjobtype, $this->strdivision, $this->strsegment, $this->stramuser,
            $this->stramkomet, $this->strprojectname, $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
            $this->intbasevalue, $this->intppnvalue,$this->intnetvalue, $this->intstatinv,
            $this->strcruser,$this->strcrdat,'','');
        $this->db->query($sql);
    }

    function editoam(){
        if($_POST['optStatinv'] == 'Pilih'){
            if(!empty($_FILES['txtFile']['name'])) {
                $sql = sprintf("UPDATE $this->tbname SET  
                `orderinv`='%u',  `unit`='%s', `jobtype`='%s',
                `division`='%s', `segment`='%s', `amuser`='%s', `amkomet`='%s', `projectname`='%s',
                `spknum`='%s', `spkindat`='%s', `spkdat`='%s',
                `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s', 
                `chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
                    $this->intorderinv, $this->strcode, $this->strunit, $this->strjobtype,
                    $this->strdivision, $this->strsegment, $this->stramuser, $this->stramkomet, $this->strprojectname,
                    $this->strspknum, $this->strspkindat, $this->strspkdat,
                    $this->intbasevalue, $this->intppnvalue, $this->intnetvalue,
                    $this->strchuser,$this->strchdat,$this->intorderamid);
            }else{
                $sql = sprintf("UPDATE $this->tbname SET 
                `orderinv`='%u', `orderstatus`='%s', `unit`='%s', `jobtype`='%s',
                `division`='%s', `segment`='%s', `amuser`='%s', `amkomet`='%s', `projectname`='%s',
                `spknum`='%s', `spkindat`='%s', `spkdat`='%s',
                `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s',
                `chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
                    $this->intorderinv, $this->strstatorder, $this->strunit, $this->strjobtype,
                    $this->strdivision, $this->strsegment, $this->stramuser, $this->stramkomet, $this->strprojectname,
                    $this->strspknum, $this->strspkindat, $this->strspkdat,
                    $this->intbasevalue, $this->intppnvalue, $this->intnetvalue,
                    $this->strchuser,$this->strchdat,$this->intorderamid);
            }
        }else{
            if(!empty($_FILES['txtFile']['name'])) {
                $sql = sprintf("UPDATE $this->tbname SET 
                `orderinv`='%u', `unit`='%s', `jobtype`='%s',
                `division`='%s', `segment`='%s', `amuser`='%s', `amkomet`='%s', `projectname`='%s',
                `spknum`='%s', `spkindat`='%s', `spkdat`='%s',
                `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s', `status`='%u',
                `chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
                    $this->orderinv, $this->strunit, $this->strjobtype,
                    $this->strdivision, $this->strsegment, $this->stramuser, $this->stramkomet, $this->strprojectname,
                    $this->strspknum, $this->strspkindat, $this->strspkdat,
                    $this->intbasevalue, $this->intppnvalue, $this->intnetvalue,  $this->intstatinv, $this->strfiles,
                    $this->strchuser,$this->strchdat,$this->intorderamid);
            }else{
                $sql = sprintf("UPDATE $this->tbname SET 
                `orderinv`='%u', `orderstatus`='%s', `unit`='%s', `jobtype`='%s',
                `division`='%s', `segment`='%s', `amuser`='%s', `amkomet`='%s', `projectname`='%s',
                `spknum`='%s', `spkindat`='%s', `spkdat`='%s',
                `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s', `status`='%u',
                `chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
                    $this->intorderinv, $this->strstatorder, $this->strunit, $this->strjobtype,
                    $this->strdivision, $this->strsegment, $this->stramuser, $this->stramkomet, $this->strprojectname,
                    $this->strspknum, $this->strspkindat, $this->strspkdat,
                    $this->intbasevalue, $this->intppnvalue, $this->intnetvalue, $this->intstatinv,
                    $this->strchuser,$this->strchdat,$this->intorderamid);
            }
        }
        $this->db->query($sql);
    }

    function addnopes(){
        $sql= sprintf("INSERT INTO tb_order VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s',
            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
            '%u','%s','%s','%s','%s', 
            '%u','%s','%u','%s')",
            '',$this->intspbid,$this->intorderinv,$this->strstatorder,$this->strcode,$this->intnvnum,$this->intfaknum, $this->strinvdat,
            $this->strunit, $this->strjobtype, $this->strdivision, $this->strsegment, $this->stramuser,
            $this->stramkomet, $this->strprojectname, $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
            $this->intbasevalue, $this->intppnvalue, '', $this->intnetvalue, '', '', '',
            $this->intstatinvorder, '', '', '', '',
            $this->strcruser,$this->strcrdat,'','' );
        $this->db->query($sql);
    }

    function accorder(){
        $sql = sprintf("UPDATE $this->tbname SET 
                `orderid`='%u', `code`='%s', `invnum`='%s', `faknum`='%s',
                `sentdate`='%s', `invdate`='%s', `status`='%u',
                `chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
            $this->intorderid, $this->strcode, $this->intnvnum, $this->intfaknum,
            $this->strsentdat, $this->strinvdat, $this->intstatinv,
            $this->strchuser,$this->strchdat,$this->intorderamid);
        $this->db->query($sql);
    }

    function deleteoam($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE orderamid = '". $id ."'");
    }


    /* OLD */

	//cek ajax inv
	public function checkinvoice($inv,$unit) {
		$sql = "SELECT * FROM `vw_order` WHERE `invnum` = '$inv' AND `unit` = '$unit' AND YEAR(`invdate`) = YEAR(CURDATE()) LIMIT 0,1";
		$stmt = $this->db->query($sql);
		if ($stmt->num_rows() == 1) {
			return TRUE;
		}
        return FALSE;
	}

	public function checkinvoicekp($inv) {
		$sql = "SELECT * FROM `vw_order` WHERE `invnum` = '$inv' AND `unit` != 'MESRA' AND YEAR(`invdate`) = YEAR(CURDATE()) LIMIT 0,1";
		$stmt = $this->db->query($sql);
		if ($stmt->num_rows() == 1) {
			return TRUE;
		}
        return FALSE;
	}

	public function checkspb($spb) {
		$sql = "SELECT a.code
                FROM tb_spb AS a
                LEFT JOIN tb_order AS b ON b.orderamid = a.orderamid
                WHERE 
                b.unit != 'MESRA'
                AND a.code LIKE '%". $spb ."%'
                AND YEAR(a.spbdat) = YEAR(CURDATE())
                ORDER BY a.spbid DESC";
		$spb = $this->db->query($sql);
		$this->db->close();
		if ($spb->num_rows() >= 1) {
			return TRUE;
		}
        return FALSE;
	}

	//new table order nopes
	//AND crdat = '2019'
	public function getallnopes() {
		$sql = "SELECT * FROM `vw_order` WHERE `orderinv`='1' ORDER BY `code` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getallnopesbyam($username) {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderinv`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`, 
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`amkomet` = '$username'
            AND `a`.`procdat` = '0000-00-00' AND  `a`.`status` != '9'
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` ASC LIMIT 0,50 ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	 
	public function getallprpobyam($username) {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderinv`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`, 
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb`
			FROM $this->tbname `a` WHERE `a`.`orderstatus`='PRPO' AND `a`.`amkomet` = '$username'
            AND `a`.`procdat` = '0000-00-00' AND  `a`.`status` != '9' ORDER BY `a`.`code` ASC LIMIT 0,50 "; 
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
		
	public function getallnopeskomet() {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb`, `a`.`status`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`unit`='KOMET' 
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` DESC LIMIT 0,50 ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
		
	public function getallnopesmesra() {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb`, `a`.`status`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`unit`='MESRA' 
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}

	public function getallnopespadi() {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`, `a`.`file`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb`, `a`.`status`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`unit`='PADI' 
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` DESC LIMIT 0,50";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getsearchnopes($unit="",$segmen="",$invmonth="",$invyear="",$invnum="",$tipeodr="",$spk="",$spb="") {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`,
		`a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb`,
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat`
		FROM $this->tbname `a` WHERE `a`.`orderinv`='1'";
		if ($unit != "") {
			$sql .= " AND `a`.`unit`='$unit'";
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
		if ($invnum != "") {
			$sql .= " AND `a`.`invnum` = '$invnum'";
		}
		if ($tipeodr != "") {
			$sql .= " AND `a`.`orderstatus` = '$tipeodr'";
		}
		if ($spk!= "") {
			$sql .= " AND `a`.`spknum` = '$spk'";
		}
		if ($spb!= "") {
			$sql .= " AND `a`.`spbid` = '$spb'";
		}
		$sql .=" ORDER BY `a`.`code` DESC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getsingleditnopes($id) {
        $sql = "SELECT `orderamid`, `spbid`, `orderstatus`, `code`, `invnum`, `faknum`, `invdate`, `unit`, `jobtype`, `division`, `segment`, `amuser`, `amkomet`, `projectname`, `sentdate`, `spknum`, `spkindat`, `spkdat`, `basevalue`, `ppnvalue`, `netvalue`, `negovalue`, `file`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE orderamid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsinglenopes($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderamid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getmultinopes($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderamid` IN ($id) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function updatetotalspb(){
		$sql = sprintf("UPDATE $this->tbname SET 
		 `spbid`='%u' WHERE orderamid='%u'",
		$this->intspbid,$this->intorderamid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
	}
	
	
	
	//new table PRPO
	public function getallprpo() {
		$sql = "SELECT `orderamid`, `spbid`, `orderstatus`, `code`, `invnum`, `faknum`, `invdate`, `unit`, `jobtype`, `division`, `segment`, `amuser`, `amkomet`, `projectname`, `sentdate`, `spknum`, `spkindat`, `spkdat`, `basevalue`, `ppnvalue`, `netvalue`, `jstvalue`, `negovalue`, `file` 
			FROM $this->tbname WHERE `orderstatus`= 'PRPO' ORDER BY `orderamid` ASC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getallprpokomet() {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`, 
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`file`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb` 
			FROM $this->tbname `a` WHERE `a`.`orderstatus`= 'PRPO' AND `a`.`unit`='KOMET' ORDER BY `a`.`code` DESC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getallprpomesra() {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`file`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
			(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb`
		FROM $this->tbname `a` WHERE `a`.`orderstatus`= 'PRPO' AND `a`.`unit`='MESRA' ORDER BY `a`.`code` DESC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}

	public function getallprpopadi() {
		$sql = "SELECT `a`.`orderamid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`file`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
			(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderamid` = `a`.`orderamid` and `z`.`status` != '9' limit 0,1) AS `countspb`
		FROM $this->tbname `a` WHERE `a`.`orderstatus`= 'PRPO' AND `a`.`unit`='PADI' ORDER BY `a`.`code` DESC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}

	public function getsingleditprpo($id) {
        $sql = "SELECT `orderamid`, `spbid`, `orderstatus`, `code`, `unit`, `jobtype`, `division`, `segment`, `amuser`, `amkomet`, `projectname`, `jstvalue`, `negovalue`, `file`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE orderamid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsingleprpo($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderamid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function addprpo() {
			
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s',
		'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
		'%u','%s','%s','%s','%s', 
		'%u','%s','%u','%s')",
            '',$this->intspbid,$this->intorderinv,$this->strstatorder,$this->strcode,$this->intnvnum,$this->intfaknum, $this->strinvdat,
				$this->strunit, $this->strjobtype, $this->strdivision, $this->strsegment, $this->stramuser,
				$this->stramkomet, $this->strprojectname, $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
				$this->intbasevalue, $this->intppnvalue,$this->intpphvalue, $this->intnetvalue, $this->intjstvalue, $this->intnegovalue, $this->strfiles,
				$this->intstatinv, $this->strvrecnum, $this->strfrom, $this->strprocdat,$this->intvrecvalue,
			$this->strcruser,$this->strcrdat,'','' );
		/* echo '<pre>';
		print_r($sql); exit; */
		$this->db->query($sql);
    }
	
	public function editprpo(){
		$sql = sprintf("UPDATE $this->tbname SET 
		`code`='%s', `unit`='%s', `jobtype`='%s', `division`='%s', `segment`='%s', 
		`amuser`='%s', `amkomet`='%s', `projectname`='%s',
		`jstvalue`='%s', `negovalue`='%s', `file`='%s',
		`chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
        $this->strcode, $this->strunit, $this->strjobtype, $this->strdivision, $this->strsegment, 
		$this->stramuser, $this->stramkomet, $this->strprojectname,
		$this->intjstvalue, $this->intnegovalue, $this->strfiles,
        $this->strchuser,$this->strchdat,$this->intorderamid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
	}
	
	public function updatetonopes() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`orderinv`='%u',`orderstatus`='%s', `code`='%s', `invnum`='%s', `faknum`='%s', `invdate`='%s', `spknum`='%s', `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s',
		`chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
           '1', $this->strstatorder, $this->strcode, $this->intnvnum, $this->intfaknum, $this->strinvdat,
		   $this->strspknum, $this->intbasevalue, $this->intppnvalue, $this->intnetvalue,
            $this->strchuser,$this->strchdat,$this->intorderamid);
        /* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	
	//new table BILLCO
	public function updatecolstatinv() {
	$sql = sprintf("UPDATE $this->tbname SET `status`='%u', `chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
		$this->intstatinv,$this->strchuser,$this->strchdat,$this->intorderamid);
	// echo '<pre>';
	// print_r($sql); exit;
	$this->db->query($sql);
    }
	
	public function updatestatinv() {
	$sql = sprintf("UPDATE $this->tbname SET `pphvalue`='%s',
	`status`='%u', `vrecnum`='%s', `receivefrom`='%s',`procdat`='%s', `vrecvalue`='%s',
	`chuser`='%u', `chdat`='%s' WHERE orderamid='%u'",
		$this->intpphvalue, $this->intstatinv, $this->strvrecnum, $this->strfrom, $this->strprocdat, $this->intvrecvalue,
		$this->strchuser,$this->strchdat,$this->intorderamid);
	/* echo '<pre>';
		print_r($sql); exit; */
	$this->db->query($sql);
    }
	
	public function getallinvoicepaid() {
        $sql = "SELECT * FROM `vw_order` WHERE `status`='1' ORDER BY `code` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsingleinvoicepaid($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderamid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallinvoicepaidbydate($date) {
        $sql = "SELECT * FROM `vw_order` WHERE `procdat`='$date' AND `status`='1' ORDER BY `code` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
		
	public function countinvoice(){
		$sql = "SELECT COUNT(*) AS `totalinvoicetoday` FROM $this->tbname 
		WHERE `orderinv`='1' AND YEAR(`invdate`) = YEAR(CURDATE()) AND `invdate` >= CURDATE()";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	//GROUP BY `status` ORDER BY `status`
	public function countallinvoice(){
		$sql = "SELECT COUNT(`orderamid`) AS `totalinvoice` FROM `tb_order` 
		WHERE `orderinv`='1' AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function countinvkomet(){
		$sql = "SELECT COUNT(*) AS `totalinvoice` FROM $this->tbname WHERE `orderinv`='1' AND `unit` = 'KOMET' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function countinvmesra(){
		$sql = "SELECT COUNT(*) AS `totalinvoice` FROM $this->tbname WHERE `orderinv`='1' AND `unit` = 'MESRA' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function countrevenue(){
		$sql = "SELECT SUM(`basevalue` - `netvalue`) AS `totalrev` FROM $this->tbname WHERE YEAR(`invdate`) = YEAR(CURDATE())";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
		
	public function getmaxcode(){
		$sql = "SELECT MAX(`orderamid`) AS `lastid` FROM $this->tbname";
		$stmt = $this->db->query($sql);
		return $stmt->result_array();
	}
	
	//////////////// TERMIN //////////////
	
	
	public function getalltermininvkomet($division, $segmen) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderinv`='1' AND `division`='$division' AND `segment` = '$segmen' ORDER BY `invdate` DESC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
		
	public function getalltermininvmesra($division, $segmen) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderinv`='1' AND `unit` = 'MESRA' AND `division`='$division' AND `segment` = '$segmen' ORDER BY `invdate` DESC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}

	public function getalltermininvpadi($division, $segmen) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderinv`='1' AND `division`='$division' AND `segment` = '$segmen' ORDER BY `invdate` DESC ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}

	public function getprpotermin($prpoid) { 
        $sql = "SELECT * FROM `tb_termin` WHERE `prpoid`='$prpoid'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getprposingletermin($invid) { 
        $sql = "SELECT `a`.`terminid`,`a`.`prpoid`,`b`.*
		FROM `tb_termin` `a` JOIN `vw_order` `b` WHERE `b`.`orderamid`='$invid'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
    }
	
	public function addtermin() {
	
        $sql= sprintf("INSERT INTO `tb_termin` VALUES ('%u','%u','%s','%s','%s','%s',
		'%u','%s','%u','%s')",
            '',$this->intprpoid,$this->intinvoiceid,$this->strunit,$this->intjstvalue,$this->intnegovalue,
			$this->strcruser,$this->strcrdat,'','' );
        // echo '<pre>';
		// print_r($sql); exit; 
		$this->db->query($sql);
    }
	
    function getFakturPajak($unit){
        $query = "SELECT * FROM tb_fakturpajak WHERE unit = '". $unit ."'";
        $sql = $this->db->query($query);
        $data = $sql->result_array();

        $this->db->close();
        return $data;
    }
}