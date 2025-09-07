<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Spb_model extends CI_Model {
    
    public $intspbid;
	public $intorderid;
	public $intarcoid;
	public $strcode;
    public $strjobtype;
    public $strapplicant;
	public $intvalue;
    public $strcustomer;
    public $strinfo;
	public $strspbdat;
	public $strtypeofpayment;
	public $straccnumber;
	public $straccname;
	public $strbank;
	public $strbankother;
	public $strprocessdate;
	public $strfiles;
	public $intstatus;
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
	
	//budget
	public $intbudgetid;
	public $strunit;
	public $strbudgetdate;
	public $strchknum;
	public $intstatusbudget;
	
	//filing approval
	public $intfilingid;
	public $strfilingdate;
	public $stramname;
	
	//pengurus approval
	public $intspbaprvid;
	public $strcodeaprv;
	public $strspbval;
	public $straprvdate;
	public $intaprvstat;
	
	public $intaprvsek;
	public $intstaprvsek;
	public $straprvdatsek;
	
	public $intaprvben;
	public $intstaprvben;
	public $straprvdatben;
	
	public $intaprvket;
	public $intstaprvket;
	public $straprvdatket;
	
	public $intuserid;
	public $strnotes;
	
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('spb');
    }
	
	//baru
	public function getallspbkomet() {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`,`a`.`code`,`a`.`jobtype`, 
		`a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, 
        (select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`, `b`.`invdate`, `b`.`crdat`
		FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = 'KOMET' AND YEAR (`a`.`spbdat`) = YEAR(CURDATE()) AND `a`.`status`!='9'
		ORDER BY `a`.`code` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallspbkometfinco() {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`,`a`.`code`,`a`.`jobtype`, 
		`a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, 
        (select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`, `b`.`invdate`, `b`.`crdat`
		FROM `tb_spb` `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = 'KOMET' AND `a`.`spbdat` >= DATE_SUB(CURDATE(),INTERVAL 1 YEAR) AND `a`.`status`!='9'
		ORDER BY `a`.`spbid` DESC"; //YEAR (`a`.`spbdat`) = YEAR(CURDATE()) AND
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallspbmesra() {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`,`a`.`code`,`a`.`jobtype`, 
		`a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, 
        (select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`, `b`.`invdate`, `b`.`crdat`
		FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = 'MESRA' AND YEAR (`a`.`spbdat`) = YEAR(CURDATE()) AND `a`.`status`!='9'
		ORDER BY `a`.`code` DESC";
        $stmt = $this->db->query($sql); 
        return $stmt->result_array();
    }
	
	public function getallspbmesrafinco() {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`,`a`.`code`,`a`.`jobtype`, 
		`a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, 
        (select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`, `b`.`invdate`, `b`.`crdat`
		FROM `tb_spb` `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = 'MESRA' AND `a`.`spbdat` >= DATE_SUB(CURDATE(),INTERVAL 1 YEAR) AND `a`.`status`!='9'
		ORDER BY `a`.`spbid` DESC"; //YEAR (`a`.`spbdat`) = YEAR(CURDATE()) AND 
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getallspbpadi() {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`spknum`, `b`.`unit`,`a`.`code`,`a`.`jobtype`, 
		`a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, 
        (select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`, `b`.`invdate`, `b`.`crdat`
		FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`orderstatus` = 'PADI' AND YEAR (`a`.`spbdat`) = YEAR(CURDATE()) AND `a`.`status`!='9'
		ORDER BY `a`.`code` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	//baru
	
	public function getallspb() {
        $sql = "SELECT `spbid`, `code`, `jobtype`, `applicant`, `value`, `customer`, `info`, `spbdat`, `typeofpayment`, `accnumber`, `accname`, `bank`, `bankother`, `processdate`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname ORDER BY `spbid` WHERE `crdat` = '2020' AND `status`!='9' ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	//dashboardam 
	public function getallspbam($username) {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`,`a`.`code`,`a`.`jobtype`, 
		`a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, 
        (select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`
		FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`amkomet` = '$username' AND YEAR (`a`.`spbdat`) = YEAR(CURDATE()) AND `a`.`status`!='9'
		AND `a`.`status`!='1'
		ORDER BY `a`.`code` DESC "; 
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
	}
	
	public function getsinglespb($id) {
        $sql = "SELECT `spbid`, orderid, `code`,`jobtype`, `applicant`, `value`, `customer`, `info`, `spbdat`, `typeofpayment`, `accnumber`, `accname`, `bank`, `bankother`, `processdate`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE spbid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getspbinbudget($id) {
        $sql = "SELECT `spbid`, orderid, `code`,`jobtype`, `applicant`, `value`, `customer`, `info`, `spbdat`, `typeofpayment`, `accnumber`, `accname`, `bank`, `bankother`, `processdate`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE spbid IN ($id) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getsinglespbinv($id) {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderinv`, `b`.`orderstatus`, `b`.`spknum`, `b`.`code` AS `codeinv`,`b`.`invnum`,`b`.`invdate`,
		`b`.`unit`, `b`.`basevalue`, `b`.`netvalue`, `b`.`jstvalue`, `b`.`negovalue`,
		(select `z`.`name` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segmentname`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `totalspb`,
		`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `b`.`negovalue`, `a`.`customer`,
		`a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`file`, `a`.`status`,
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`cruser`) limit 0,1) AS `cruser`,
		`a`.`crdat`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`chuser`) limit 0,1) AS `chuser`, 
		`a`.`chdat`
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`spbid`='$id' AND `a`.`orderid` = `b`.`orderid` AND `a`.`status`!='9' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsinglespbbyinvoice($orderid,$spbid) {
        $sql = "SELECT `spbid`, `orderid`, `code`,`jobtype`, `applicant`, `value`, `customer`, `info`, `spbdat`, `typeofpayment`, `accnumber`, `accname`, `bank`, `bankother`, `processdate`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE orderid='$orderid' AND `status`='1' AND `spbid` < '$spbid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getspbbyinvoice($id) {
        $sql = "SELECT `spbid`, `orderid`, `code`,`jobtype`, `applicant`, `value`, `customer`, `info`, `spbdat`, `typeofpayment`, `accnumber`, `accname`, `bank`, `bankother`, `processdate`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE orderid='$id' AND `status`!='9' ORDER BY spbid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function gettotalspbbyinvoice($id){
		$sql = "SELECT SUM(`value`) as `totalvalue` FROM $this->tbname WHERE `orderid`='$id' AND `status`='1'";
		$stmt = $this->db->query($sql);
		return $stmt->result_array();
	}
	
	public function getallspbbyinvoice() {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`,`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` 
		AND YEAR(`a`.`spbdat`) = '2020' AND YEAR(`b`.`invdate`) = '2020' AND `a`.`status`!='9'
		ORDER BY `a`.`code` DESC LIMIT 0,50";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();   
    }
	
	public function getallspbbyarcinvoice() {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`invdate`, `b`.`unit`, 
		`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, 
		`a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, 
		`a`.`status` FROM $this->tbname `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND YEAR(`a`.`spbdat`) = '2019' AND YEAR(`b`.`invdate`) != '2019' 
		ORDER BY `a`.`code` DESC LIMIT 0,100";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function addspb() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%u',
		'%u','%s','%u','%s')",
            '', $this->intorderid, $this->intarcoid,$this->strcode,$this->strjobtype, $this->strapplicant, $this->intvalue, $this->strcustomer,  $this->strinfo, $this->strspbdat, $this->strtypeofpayment,
			$this->straccnumber, $this->straccname, $this->strbank, $this->strbankother, $this->strprocessdate, $this->strfiles, $this->intstatus,
			$this->strcruser,$this->strcrdat,'','' );
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	public function editspb() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`code`='%s',`jobtype`='%s', `applicant`='%s', `value`='%s', `customer`='%s', `info`='%s', `spbdat`='%s', `typeofpayment`='%s', `accnumber`='%s', `accname`='%s', `bank`='%s', `bankother`='%s', 
		`chuser`='%u', `chdat`='%s' WHERE spbid='%u'",
            $this->strcode,$this->strjobtype, $this->strapplicant, $this->intvalue, $this->strcustomer,  $this->strinfo, $this->strspbdat, $this->strtypeofpayment,
			$this->straccnumber, $this->straccname, $this->strbank, $this->strbankother, 
            $this->strchuser,$this->strchdat,$this->intspbid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }

    public function deletespb($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE spbid = '". $id ."'");
    }
	
	public function deletespbworder($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE orderid = '". $id ."'");
    }
		
	public function updatestatspb() {
        $sql = sprintf("UPDATE $this->tbname SET `processdate`='%s', `file`='%s' ,`status`='%u', `chuser`='%u', `chdat`='%s' WHERE spbid='%u'",
            $this->strprocessdate, $this->strfiles, $this->intstatus,$this->strchuser,$this->strchdat,$this->intspbid);
        $this->db->query($sql);
    }
	
	public function getallnospb($search) {
        $sql = "SELECT `spbid`, `code`
        FROM $this->tbname WHERE `code` LIKE '%$search%' ORDER BY `spbid` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	
	public function getallspbinvdat($unit,$date) {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`code`,`b`.`invnum`, `b`.`unit`,`a`.`code`,
		`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, 
		`a`.`typeofpayment`,`a`.`accnumber`,`a`.`accname`,`a`.`bank`,`a`.`bankother`,`a`.`processdate`,`a`.`status`
        FROM $this->tbname a JOIN `tb_order` b WHERE `b`.`unit` = '$unit' AND `a`.`processdate`='$date' AND `a`.`orderid` = `b`.`orderid` AND `a`.`status`!='9' ORDER BY `a`.`code` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsearchspb($unit="",$segment="",$spbyear="",$spbmonth="",$spbnum="",$tipeodr="") {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`,`b`.`invdate`, `b`.`unit`, `b`.`segment`, `b`.`projectname`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segmentname`,
		`a`.`code`, `a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `b`.`negovalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, 
		`a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`, `a`.`crdat`
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` ";
		if ($unit != "") {
			$sql .= " AND `b`.`unit`='$unit' "; 
		}
		if ($segment != "") {
			$sql .= " AND `b`.`segment`='$segment' ";
		}
		if ($spbyear != "") {
			$sql .= " AND YEAR(`a`.`spbdat`) = '$spbyear' ";
		}
		if ($spbmonth != "") {
			$sql .= " AND MONTH(`a`.`spbdat`) = '$spbmonth' ";
		}
		if ($spbnum != "") {
			$sql .= " AND LEFT(`a`.`code`,4) = '$spbnum' ";
		}
        if ($tipeodr != "") {
            $sql .= " AND `b`.`orderstatus` = '$tipeodr'";
        }
		$sql .=" AND `a`.`status`!='9' ORDER BY `a`.`code` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getreqspb($orderstatus="") {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`spknum`, `b`.`invdate`, `b`.`unit`, `b`.`segment`, `b`.`projectname`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segmentname`,
		`a`.`code`, `a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `b`.`negovalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, 
		`a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`
        FROM $this->tbname `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` ";
		if ($orderstatus != "") {
			$sql .= " AND `b`.`orderstatus`='$orderstatus' "; 
		}
		$sql .=" AND `a`.`spbdat` = CURDATE() ";
		$sql .=" AND `a`.`status`!='9' ORDER BY `a`.`code` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function countspb(){
		$sql = "SELECT COUNT(*) AS `totalspb` FROM $this->tbname WHERE YEAR(`spbdat`) = YEAR(CURDATE()) AND `spbdat` >= CURDATE() AND `status`!='9' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
/* 
|--------------------------------------------------------------------------
| Budget SPB
|--------------------------------------------------------------------------
|
| Pembuatan budgeting SPB
|  
*/

//tabel budget
	public function getallbudget($unit) {
		$sql = "SELECT * FROM `tb_budget` WHERE `unit` = '$unit' AND `status`!='9' ORDER BY `budgetdate` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function addbudgetspb() {
        $sql= sprintf("INSERT INTO `tb_budget` VALUES ('%u','%s','%s','%s','%u',
		'%u','%s','%u','%s')",
            '', $this->intspbid,$this->strunit,$this->strbudgetdate, $this->intstatusbudget,
			$this->strcruser,$this->strcrdat,'','' );
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	public function gettodaybudgetbyid($id) {
        $sql = "SELECT `a`.`budgetid`, `a`.`spbid`, `a`.`unit`, `a`.`budgetdate`, `a`.`checknum`, `a`.`status`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`cruser`) limit 0,1) AS `cruser` , `crdat`,
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`chuser`) limit 0,1) AS `chuser`, `chdat` 
		FROM `tb_budget` a WHERE `a`.`budgetid`='$id'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsinglespbinvbudget($id) {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderinv`, `b`.`orderstatus`, `b`.`code` AS `codeinv`,`b`.`invnum`,`b`.`invdate`,
		`b`.`unit`,`b`.`projectname`,`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `b`.`negovalue`,
		(select sum(`z`.`value`) as `totalvalue` from `tb_spb` z where `z`.`orderid` = `a`.`orderid` AND `z`.`status` = '1') AS `totalvalue`,
		((select sum(`z`.`value`) as `totalvalue` from `tb_spb` z where `z`.`orderid` = `a`.`orderid` AND `z`.`status` = '1') - `a`.`value`) AS `saldovalue`,
		`a`.`customer`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`,
		`a`.`file`, `a`.`status`, `b`.`status` AS `invstatus`, `b`.`vrecnum`,
		(select `z`.`notes` from `tb_billco` `z` where `z`.`orderid` = `b`.`orderid` limit 0,1) AS `invnotes`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`cruser`) limit 0,1) AS `cruser`,
		`a`.`crdat`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`chuser`) limit 0,1) AS `chuser`, 
		`a`.`chdat`
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`spbid`='$id' AND `a`.`orderid` = `b`.`orderid` ORDER BY `a`.`code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmultispbinvbudget($id) {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`code` AS `codeinv`,`b`.`invnum`,`b`.`invdate`,
		`b`.`unit`,`b`.`projectname`,`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `b`.`negovalue`,
		(select sum(`z`.`value`) as `totalvalue` from `tb_spb` z where `z`.`orderid` = `a`.`orderid` AND `z`.`status` = '1') AS `totalvalue`,
		((select sum(`z`.`value`) as `totalvalue` from `tb_spb` z where `z`.`orderid` = `a`.`orderid` AND `z`.`status` = '1') - `a`.`value`) AS `saldovalue`,
		`a`.`customer`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`,
		`a`.`file`, `a`.`status`, `b`.`status` AS `invstatus`, `b`.`vrecnum`,
		(select `z`.`notes` from `tb_billco` `z` where `z`.`orderid` = `b`.`orderid` limit 0,1) AS `invnotes`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`cruser`) limit 0,1) AS `cruser`,
		`a`.`crdat`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`chuser`) limit 0,1) AS `chuser`, 
		`a`.`chdat`
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`spbid` IN ($id) AND `a`.`orderid` = `b`.`orderid` ORDER BY `a`.`code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallspbbyinvoicetoday($unit) {
		//AND `a`.`spbdat` >= CURDATE()
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		(select `z`.`priority` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `priority`,
		`a`.`code`,`b`.`code` AS codeinv,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, 
		`a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`, `b`.`status` AS `invstatus`,
		b.invdate, b.crdat
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = '$unit' AND `a`.`status` != '9' AND `a`.`status` != '1' AND `a`.`status` != '2'
		AND `b`.`orderstatus` != 'PADI'
		ORDER BY `a`.`spbdat` DESC "; //LIMIT 0,250
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallspbpaditoday($unit) {
		//AND `a`.`spbdat` >= CURDATE()
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		(select `z`.`priority` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `priority`,
		`a`.`code`,`b`.`code` AS codeinv,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, 
		`a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`, `b`.`status` AS `invstatus`,
		b.invdate, b.crdat
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = '$unit' AND `a`.`status` != '9' AND `a`.`status` != '1' AND `a`.`status` != '2'
		AND `b`.`orderstatus` = 'PADI'
		ORDER BY `a`.`spbdat` DESC "; //LIMIT 0,250
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function addgetbudgetid() {
        $sql= sprintf("INSERT INTO `tb_budget` VALUES ('%u','%s','%s','%s','%s','%u',
		'%u','%s','%u','%s')",
            '', $this->intspbid,$this->strunit,$this->strbudgetdate, $this->strchknum, $this->intstatusbudget,
			$this->strcruser,$this->strcrdat,'','' );
        $this->db->query($sql);
		$budgetid = $this->db->insert_id();
		return $budgetid;
    }
	
	//update nomor cek
	public function updatebudgetcheck() {
        $sql = sprintf("UPDATE `tb_budget` SET 
				`checknum`='%s' WHERE budgetid='%u'",
					$this->strchknum, $this->intbudgetid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	//update status spb menjadi confirm = 2
	public function confirmstatspbid() {
	$sql = sprintf("UPDATE $this->tbname SET 
	`status`='%u' WHERE spbid='%u'",
		$this->intstatus,$this->intspbid);
	/* echo '<pre>';
	print_r($sql); exit; */
	$this->db->query($sql); 
    }
	
	//reset status spb menjadi pending = 0
	public function resetstatspbid() {
	$sql = sprintf("UPDATE $this->tbname SET 
	`status`='%u' WHERE `status`='2'",
		$this->intstatus,$this->intspbid);
	/* echo '<pre>';
	print_r($sql); exit; */
	$this->db->query($sql);
    }
	
	//update isi array spbid di tabel budget
	public function updatebudgetspb() {
        $sql = sprintf("UPDATE `tb_budget` SET 
				`spbid`='%s', `chuser`='%u', `chdat`='%s' WHERE budgetid='%u'",
					$this->intspbid, $this->strchuser,$this->strchdat,$this->intbudgetid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
		
	//update db tmpfile
	public function addtmpfile() {
	$sql= sprintf("INSERT INTO `tb_tmp` VALUES ('%u','%s','%u','%u','%u','%s','%s')",
            '',$this->strunit ,$this->intorderid, $this->intspbid,$this->intuserid,$this->strnotes,$this->strcrdat);
		/* echo '<pre>';
		print_r($sql); exit;  */
        $this->db->query($sql);
    }
	
	//update status 9 = delete/batal
	public function updatestatdelete() {
	$sql = sprintf("UPDATE $this->tbname SET  
	`status`='%u',`chuser`='%u',`chdat`='%s' WHERE spbid='%u'",
		$this->intstatus,$this->strchuser,$this->strchdat,$this->intspbid);
	/* echo '<pre>';
	print_r($sql); exit; */
	$this->db->query($sql);
    }
	

/* 
|--------------------------------------------------------------------------
| Request Approval SPB
|--------------------------------------------------------------------------
|
| Pembuatan approval SPB
|  
*/

	// public function getmyfiling($userid,$unit) {
		// $sql = "SELECT * FROM `tb_spbfiling` WHERE `unit` = '$unit'";
		// if ($userid == "1") {
			// $sql .= " "; 
		// } else {
			// $sql .= " AND `userid` = '$userid' ";
		// }
		// $sql .=" ORDER BY `filingdate` DESC ";
        // $stmt = $this->db->query($sql);
        // return $stmt->result_array();
	// }
	//AND `filingdate` = CURDATE()
	// public function getpfiling($unit) { 
		// $sql = "SELECT * FROM `tb_spbfiling` WHERE `unit` = '$unit' ORDER BY `filingdate` DESC ";
        // $stmt = $this->db->query($sql);
        // return $stmt->result_array();
	// }
	
	public function gettodayapprovalbyid($id) {
        $sql = "SELECT `a`.`spbfilingid`, `a`.`spbid`, `a`.`unit`, `a`.`filingdate`, `a`.`amname`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`cruser`) limit 0,1) AS `cruser` , `crdat`,
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`chuser`) limit 0,1) AS `chuser`, `chdat` 
		FROM `tb_spbfiling` a WHERE `a`.`spbfilingid`='$id'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	  
	public function getmyspbbyinvoicetoday($unit) {
		
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`invnum`, `b`.`unit`, `b`.`amkomet`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		(select `z`.`priority` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `priority`,
		`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `a`.`customer`, `a`.`info`, `a`.`spbdat`, 
		`a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = '$unit' AND `a`.`status` = '0'
		
		ORDER BY `a`.`code` ASC "; //LIMIT 0,250
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsinglespbinvapproval($id) {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`code` AS `codeinv`,`b`.`invnum`,`b`.`invdate`,
		`b`.`unit`,`b`.`projectname`,`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `b`.`negovalue`,
		(select sum(`z`.`value`) as `totalvalue` from `tb_spb` z where `z`.`orderid` = `a`.`orderid` AND `z`.`status` = '1') AS `totalvalue`,
		((select sum(`z`.`value`) as `totalvalue` from `tb_spb` z where `z`.`orderid` = `a`.`orderid` AND `z`.`status` = '1') - `a`.`value`) AS `saldovalue`,
		`a`.`customer`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`,
		`a`.`file`, `a`.`status`, `b`.`status` AS `invstatus`, `b`.`vrecnum`,
		(select `z`.`notes` from `tb_billco` `z` where `z`.`orderid` = `b`.`orderid` limit 0,1) AS `invnotes`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`cruser`) limit 0,1) AS `cruser`,
		`a`.`crdat`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`chuser`) limit 0,1) AS `chuser`, 
		`a`.`chdat`
        FROM $this->tbname a JOIN `tb_order` b WHERE `a`.`spbid`='$id' AND `a`.`orderid` = `b`.`orderid` ORDER BY `a`.`code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	// public function addfilingspb() { 
        // $sql= sprintf("INSERT INTO `tb_spbfiling` VALUES ('%u','%u','%s','%s','%s','%s',
		// '%u','%s','%u','%s')",
            // '',$this->intuserid, $this->intspbid,$this->strunit,$this->strfilingdate, $this->stramname,
			// $this->strcruser,$this->strcrdat,'','' );
		/* echo '<pre>';
		print_r($sql); exit; */
        // $this->db->query($sql);
    // }
	
	public function updateapproveam() {
        $sql = sprintf("UPDATE `tb_spbfiling` SET 
				`amname`='%s', `chuser`='%u', `chdat`='%s' WHERE `spbfilingid`='%u'",
					$this->stramname, $this->strchuser,$this->strchdat,$this->intfilingid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	
/* 
|--------------------------------------------------------------------------
| *NEW Request Approval SPB
|--------------------------------------------------------------------------
|
| Pengajuan approval SPB coding baru
|  tb_spbaprv
*/	
	public function getmyfiling($userid,$unit) {
		$sql = "SELECT *, COUNT(`spbaprvid`) AS `volspb`, SUM(`spbval`) AS `valspb` FROM `tb_spbaprv`  WHERE `unit` = '$unit'";
		if ($userid == "1") {
			$sql .= " "; 
		} else {
			$sql .= " AND `userid` = '$userid' ";
		}
		$sql .=" GROUP BY `codeaprv` ORDER BY `codeaprv` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}

	public function addfilingspb() { 
        $sql= sprintf("INSERT INTO `tb_spbaprv` VALUES ('%u','%s','%u','%u','%u','%s',
		'%s','%s','%s','%u',
		'%u','%u','%s',
		'%u','%u','%s',
		'%u','%u','%s'
		)",
            '', $this->strcodeaprv, $this->intuserid, $this->intspbid, $this->intorderid, $this->strspbval,
			$this->strunit, $this->straprvdate, $this->stramname, $this->intaprvstat,
			$this->intaprvsek,$this->intstaprvsek, $this->straprvdatsek,
			$this->intaprvben,$this->intstaprvben, $this->straprvdatben,
			$this->intaprvket,$this->intstaprvket, $this->straprvdatket,
			);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	public function gettodayapprovalbycode($code) {
        $sql = "SELECT `a`.*, `b`.*,
		(SELECT `z`.`invnum` FROM `vw_order` `z` WHERE (`z`.`orderid` = `b`.`orderid`) LIMIT 0,1) AS `invnum`,
		(SELECT `z`.`status` FROM `vw_order` `z` WHERE (`z`.`orderid` = `b`.`orderid`) LIMIT 0,1) AS `invstatus`, 
		(SELECT `z`.`segment` FROM `vw_order` `z` WHERE (`z`.`orderid` = `b`.`orderid`) LIMIT 0,1) AS `segment`
		FROM `tb_spbaprv` `a` JOIN `tb_spb` `b`
		WHERE `a`.`spbid` = `b`.`spbid`  
		AND `a`.`codeaprv` = '$code'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
/*---------------------------------------------------------------------------*/	
	
/*  
|--------------------------------------------------------------------------
| Approval SPB
|--------------------------------------------------------------------------
|
| Pengurus approve SPB
|  
*/

	//AND `filingdate` = CURDATE()
	public function getpfiling($unit) { 
		$sql = "SELECT *, COUNT(`spbaprvid`) AS `volspb`, SUM(`spbval`) AS `valspb` FROM `tb_spbaprv`  WHERE `unit` = '$unit' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function updateaprvsek() {
        $sql = sprintf("UPDATE `tb_spbaprv` SET 
				`aprvsek`='%u', `staprvsek`='%u', `aprvdatsek`='%s', `status`='%u' WHERE `spbid`='%u'",
					$this->intaprvsek, $this->intstaprvsek, $this->straprvdatsek, $this->intaprvstat,$this->intspbid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	public function updateaprvben() {
        $sql = sprintf("UPDATE `tb_spbaprv` SET 
				`aprvben`='%u', `staprvben`='%u', `aprvdatben`='%s', `status`='%u' WHERE `spbid`='%u'",
					$this->intaprvben, $this->intstaprvben, $this->straprvdatben, $this->intaprvstat,$this->intspbid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	public function updateaprvket() {
        $sql = sprintf("UPDATE `tb_spbaprv` SET 
				`aprvket`='%u', `staprvket`='%u', `aprvdatket`='%s', `status`='%u' WHERE `spbid`='%u'",
					$this->intaprvket, $this->intstaprvket, $this->straprvdatket, $this->intaprvstat,$this->intspbid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }
	
	public function updateaprvadmin() {
        $sql = sprintf("UPDATE `tb_spbaprv` SET 
				`aprvsek`='%u', `staprvsek`='%u', `aprvdatsek`='%s',
				`aprvben`='%u', `staprvben`='%u', `aprvdatben`='%s',
				`aprvket`='%u', `staprvket`='%u', `aprvdatket`='%s', 
				`status`='%u' WHERE `spbid`='%u'",
					$this->intaprvsek, $this->intstaprvsek, $this->straprvdatsek,
					$this->intaprvben, $this->intstaprvben, $this->straprvdatben,
					$this->intaprvket, $this->intstaprvket, $this->straprvdatket, 
					$this->intaprvstat,$this->intspbid);
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }

    function getlastcodespb(){
        $q = "SELECT SUBSTRING_INDEX(a.code, '/',1) AS last_code_spb
            FROM tb_spb AS a
                LEFT JOIN tb_order AS b ON b.orderid = a.orderid
            WHERE b.unit != 'MESRA' AND YEAR(a.crdat) = YEAR(CURDATE()) 
            ORDER BY a.spbid DESC 
            LIMIT 0,1";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getlastcodelpdb(){
        $q = "SELECT SUBSTRING(checknum, 5) AS last_code_lpdb
                FROM tb_budget
                WHERE checknum != \"\"
                ORDER BY budgetid DESC 
                LIMIT 0,1";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getlastcodespbmesra(){
        $q = "SELECT SUBSTRING_INDEX(a.code, '/',1) AS last_code_spb
            FROM tb_spb AS a
                LEFT JOIN tb_order AS b ON b.orderid = a.orderid
            WHERE b.unit = 'MESRA'
            ORDER BY a.spbid DESC 
            LIMIT 0,1";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }
}