<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Attendances_model extends CI_Model {
     
	public $intattid;
	public $intuserid;
	public $strdatetime;
	
	public $strgmaps;
	public $strlat;
	public $strlong;
	public $strnotes;
	public $intstatus; 
	public $inthealth;
	
	public $intoffworkid; 	
	public $strsdate;
	public $stredate;
	public $strtotalday; 
	public $stroffstatus;
	public $stroffnotes;
	public $intuseridap;
	public $strapdat;
	public $intstatusap;
	public $strcrdat;
	
	public $intsaldocuti;
	
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('attendances');
    }
	
	public function getallatt() {
        $sql = "SELECT * FROM $this->tbname ORDER BY `attid` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsingleattbyusernow($userid) {
        $sql = "SELECT * FROM $this->tbname WHERE `userid`='$userid' AND DATE(`datetime`) = CURDATE() ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsingleinbyusernow($userid) {
        $sql = "SELECT * FROM $this->tbname WHERE `userid`='$userid' AND DATE(`datetime`) = CURDATE() AND `status` != '2' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
    }
	
	public function getsingleoutbyusernow($userid) {
        $sql = "SELECT * FROM $this->tbname WHERE `userid`='$userid' AND DATE(`datetime`) = CURDATE() AND `status` = '2'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } 
	
	public function getsingleovertimebyusernow($userid, $optBulan='') {
        if($optBulan == ''){
            $bulan = 'MONTH(CURDATE())';
        }else{
            $bulan = $optBulan;
        }

        $sql = "SELECT * FROM tb_attendances 
                WHERE 
                MONTH(datetime) = '". $bulan ."' 
                AND YEAR(datetime) = YEAR(CURDATE()) 
                AND status = 9 
                AND TIME(datetime) >= '18:00:00' 
                AND TIME(datetime) <= '22:00:00'
                AND userid = '". $userid ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function mymanager($group) {
        $sql = "SELECT fullname FROM tb_user
                WHERE 
                groupid = '". $group ."'
                AND roleid = '4'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addattendances() { 
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s','%s',
		'%s','%u','%u')",
            '',$this->intuserid, $this->strdatetime, 
			$this->strgmaps, $this->strlat, $this->strlong, $this->strnotes, $this->intstatus, $this->inthealth );
		/* echo '<pre>'; 
		print_r($sql); exit; */	
        $this->db->query($sql);
    }

    public function addvisit() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s','%s','%s','%u','%u')",
            '',$this->intuserid, $this->strdatetime, $this->strgmaps, $this->strlat, $this->strlong, $this->strnotes, $this->intstatus,'');
        $this->db->query($sql);
    }
	 
	public function getalluseroffwork() {
		$sql = "SELECT a.*,(SELECT z.fullname FROM `tb_user` z WHERE a.approveby = z.userid ) AS `userapprove`,
		b.nik, b.fullname FROM `tb_offwork` a JOIN `tb_user` b WHERE `a`.`userid` = `b`.`userid` 
		AND YEAR(a.crdat) = YEAR(CURDATE()) ORDER BY `a`.`crdat` ASC "; 
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
	}
	
	 
	public function getallmyoffwork($id) {
		$sql = "SELECT a.*,(SELECT z.fullname FROM `tb_user` z WHERE a.approveby = z.userid ) AS `userapprove` 
		FROM `tb_offwork` `a` WHERE `a`.`userid`='$id' 
		AND YEAR(a.crdat) = YEAR(CURDATE()) ORDER BY `a`.`crdat` ASC"; 
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
	}
		 
	public function getoffworkbyid($offworkid) {
		$sql = "SELECT a.*,
		(SELECT y.fullname FROM `tb_user` y WHERE a.userid = y.userid ) AS `userfullname`,
		(SELECT z.leavebalance FROM `tb_userinfo` z WHERE a.userid = z.userid ) AS `leavebalance` 
		FROM `tb_offwork` `a` WHERE `a`.`offworkid` = '$offworkid' AND `a`.`status` != '2' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
	}
	
	public function getuserleavebalance($userid) {
		$sql = "SELECT `leavebalance` FROM `tb_userinfo` WHERE `userid` = '$userid' "; 
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
	}
	
	public function addoffwork() { 
        $sql= sprintf("INSERT INTO `tb_offwork` VALUES ('%u','%u','%s','%s','%u',
		'%s','%s','%u','%s','%u','%s')",
            '',$this->intuserid, $this->strsdate, $this->stredate, $this->strtotalday, 
			$this->stroffstatus, $this->stroffnotes, $this->intuseridap, $this->strapdat, $this->intstatusap, 
			$this->strcrdat );
		// echo '<pre>';
		// print_r($sql); exit;	
        $this->db->query($sql);
    }
	
	public function getuseroffwork($userid) {
		$sql = "SELECT `totalday` FROM `tb_offwork` WHERE `userid` = '$userid' AND `status` = '1' "; 
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
	}
	 
	public function approveoffwork() {
        $sql = sprintf("UPDATE `tb_offwork` SET 
				`approveby`='%u', `approvedat`='%s', `status`='%u' WHERE `offworkid`='%u'",
					$this->intuseridap, $this->strapdat, $this->intstatusap, $this->intoffworkid);
        $this->db->query($sql);
    } 
	
	public function updatesaldofw() {
        $sql = sprintf("UPDATE `tb_userinfo` SET 
				`leavebalance`='%u' WHERE `userid`='%u'",
					$this->intsaldocuti, $this->intuserid);
        $this->db->query($sql);
    }
	
	public function checkdob() {
        $add_where = '';
        $day = date('d');
        $month = date('m');

        $min1 = date('d', strtotime("-1 days"));
        $min2 = date('d', strtotime("-2 days"));

        if(date('D') == 'Mon'){
            $add_where = "
                OR (EXTRACT(DAY FROM `a`.`dob`) = '". $min1 ."' AND EXTRACT(MONTH FROM `a`.`dob`) = '". $month ."')
                OR (EXTRACT(DAY FROM `a`.`dob`) = '". $min2 ."' AND EXTRACT(MONTH FROM `a`.`dob`) = '". $month ."') 
                ";
        }

        $offday_min1 = date('Y').'-'.$month.'-'.$min1;
        $offday_min2 = date('Y').'-'.$month.'-'.$min2;
        $check_offday = "SELECT * FROM tb_offday WHERE date IN ('". $offday_min1 ."','". $offday_min2 ."')";
        $offday = $this->db->query($check_offday);
        $dataoffday = $offday->result_array();
        if(count($dataoffday) > 0){
            $add_where = "
                OR (EXTRACT(DAY FROM `a`.`dob`) = '". $min1 ."' AND EXTRACT(MONTH FROM `a`.`dob`) = '". $month ."')
                OR (EXTRACT(DAY FROM `a`.`dob`) = '". $min2 ."' AND EXTRACT(MONTH FROM `a`.`dob`) = '". $month ."') 
                ";
        }

        $sql = "
            SELECT * FROM 
                (
                    SELECT `nik`, `name`, `pob`, `dob`, YEAR(NOW()) - YEAR(`dob`) AS `age` FROM `tb_dob` 
                        UNION 
		            SELECT `nik`, UPPER(`fullname`) as `name`, UPPER(`pob`) as `pob`, `dob`, YEAR(NOW()) - YEAR(`dob`) AS `age` FROM `vw_useraccounts` 
		                WHERE 
                        `status` = 1
                ) AS `a` 
		    WHERE 
		        EXTRACT( DAY FROM `a`.`dob` ) = '". $day ."' 
		        AND EXTRACT( MONTH FROM `a`.`dob` ) = '". $month ."'
		        ". $add_where ."";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
    
}