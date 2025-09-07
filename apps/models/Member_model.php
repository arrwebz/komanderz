<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member_model extends CI_Model {
    
    public $intmemberid;
	public $strnik;
	public $strname; 
	public $strdivision;
	public $strsegment;
	public $strband; 
	public $strjoindate;
	public $strbasicfee;
	public $intstatus;
	public $strnote;
	
    public $strtlp;
    public $stremail;
	public $strloc;
    public $strbank; 
    public $straccnumber;
	
	public $strbandname;
	public $strbandvalue;
	
	public $strwajib;
	public $strsukarela;
	public $strsaldowajib;
	public $strsaldosukarela;
	public $strtotalsaldo;
	public $strwithdraw;
	public $strwithdrawnote;
	public $strdepositdate;
	
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('member');
    }
	
	public function getallmember() {
        $sql = "SELECT * FROM $this->tbname ORDER BY `nik` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsinglemember($id) {
        $sql = "SELECT * FROM $this->tbname WHERE `memberid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function addgetmemberid() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s','%s','%s','%u','%s',
		'%u','%s','%u','%s')",
            '', $this->strnik, $this->strname,$this->strdivision,$this->strsegment, $this->strband, $this->strjoindate,
			$this->strbasicfee, $this->intstatus, $this->strnote,			
			$this->strcruser,$this->strcrdat,'','' );
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
		$memberid = $this->db->insert_id();
		return $memberid;
    }
	
	//info anggota
	public function addmemberinfo() {
        $sql= sprintf("INSERT INTO `tb_memberinfo` VALUES ('%u','%u','%s','%s','%s','%s','%s','%s')",
        '',$this->intmemberid,$this->strnik,$this->strtlp,$this->stremail,$this->strloc,$this->strbank,$this->straccnumber);
        /* echo '<pre>';
		print_r($sql); exit; */
		$this->db->query($sql);
    }
	
	//simpanan
	
	public function getsimpananbymember($id) {
		$sql = "SELECT * FROM `vw_membersimpan` WHERE `memberid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getsimpanbynik($nik) {
		$sql = "SELECT * FROM `tb_mpayrollsimpan` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getsaldosimpanbynik($nik) { 
		$sql = "SELECT * FROM `tb_msaldosimpan` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}	
	
	//dari payroll 
	public function getpayrollsimpanbynik($nik) {
		$sql = "SELECT * FROM `tb_mpayrollsimpan` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	//total simpanan payroll 
	public function gettotalpayrollbynik($nik) {
		$sql = "SELECT SUM(`payroll`) AS `totalpayroll` FROM `tb_mpayrollsimpan` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	//dari transfer istimewa 
	public function gettransfersimpanbynik($nik) { 
		$sql = "SELECT * FROM `tb_mistimewasimpan` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	//total simpanan transfer istimewa 
	public function gettotaltransferbynik($nik) { 
		$sql = "SELECT SUM(`transfer`) AS `totaltransfer` FROM `tb_mistimewasimpan` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	//penarikan simpanan 
	public function getpenarikanbynik($nik) { 
		$sql = "SELECT * FROM `tb_mtariksimpan` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	//total penarikan simpanan
	public function gettotalpenarikanbynik($nik) { 
		$sql = "SELECT SUM(`penarikan`) AS `totaltarik` FROM `tb_mtariksimpan` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	//pinjaman koptel 
	public function getpinkoptelbynik($nik) { 
		$sql = "SELECT * FROM `tb_mpayrollpinkop` WHERE `nik`='$nik' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	
	// public function gettotaltariksimpanbynik($nik) {
		// $sql = " SELECT ( SELECT SUM(`nominalsaldo`) AS `totalsaldo` FROM `tb_msaldosimpan` WHERE `nik` = '$nik' ) 
		// - ( SELECT SUM(`nominaldraw`) AS `totaldraw` FROM `tb_mdrawsimpan` WHERE `nik` = '$nik' ) AS `totalvalue` ";
        // $stmt = $this->db->query($sql);
        // return $stmt->result_array();
	// }
	
	// public function gettotalsimpanbynik($nik) {
		// $sql = "SELECT SUM(`nominalsaldo`) AS `totalsaldo` FROM `tb_msaldosimpan` WHERE `nik`='$nik' ";
        // $stmt = $this->db->query($sql);
        // return $stmt->result_array();
	// }	
	
	// public function gettotalsaldosimpanbynik($nik) {
		// $sql = "SELECT * FROM (SELECT * FROM `tb_msaldosimpan` WHERE `nik` = '$nik' 
		// UNION
		// SELECT * FROM `tb_mdrawsimpan` WHERE `nik` = '$nik') AS `pinjaman` ORDER BY `crdat`";
        // $stmt = $this->db->query($sql);
        // return $stmt->result_array();
	// }
		
	public function addsimpanan() {
        $sql= sprintf("INSERT INTO `tb_memberdeposit` VALUES ('%u','%u','%s','%s','%s','%s','%s','%s')",
        '',$this->strband,$this->strnik,$this->strwajib,$this->strsukarela,$this->strsaldowajib,$this->strsaldosukarela,
		$this->strtotalsaldo,$this->strwithdraw,$this->strwithdrawnote,$this->strdepositdate);
        /* echo '<pre>';
		print_r($sql); exit; */
		$this->db->query($sql);
    }
	
	public function getbankbymember($id) {
		$sql = "SELECT `memberid`, `nik`, `name`, `division`, `segment`, `joindate`, `basicfee`, `amount`, TIMESTAMPDIFF(MONTH, `startdat`, `endat`) AS `rangedat`, `installment`, `startdat`, `endat`, `source`, `remains`, `bankstatus`, `loandate`, `status`, `notes`, `cruser`, `crdat`, `chuser`, `chdat`
		FROM `vw_memberbankloan` WHERE `memberid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getincbymember($id) {
		$sql = "SELECT `memberid`, `nik`, `name`, `division`, `segment`, `joindate`, `basicfee`, `amount`, TIMESTAMPDIFF(MONTH, `startdat`, `endat`) AS `rangedat`, `installment`, `startdat`, `endat`, `source`, `remains`, `incstatus`, `loandate`, `status`, `notes`, `cruser`, `crdat`, `chuser`, `chdat`
		FROM `vw_memberincloan` WHERE `memberid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function countmember(){
		$sql = "SELECT COUNT(*) AS `totalmember` FROM $this->tbname WHERE `status` = '1' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function countmemberades(){ 
		$sql = "SELECT COUNT(*) AS `desaktif` FROM $this->tbname WHERE `division` = 'DES' AND `status` = '1' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	} 
	
	public function countmemberadgs(){ 
		$sql = "SELECT COUNT(*) AS `dgsaktif` FROM $this->tbname WHERE `division` = 'DGS' AND `status` = '1' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	} 
	
	public function countmemberanondegs(){ 
		$sql = "SELECT COUNT(*) AS `nondegsaktif` FROM $this->tbname WHERE `division` = 'NON DES & DGS' AND `status` = '1' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function countspecialmember(){ 
		$sql = "SELECT COUNT(*) AS `istimewa` FROM $this->tbname WHERE `division` = 'ANGGOTA ISTIMEWA' AND `status` = '1' ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}  
	//SELECT `nik`, `name`, TIMESTAMPDIFF(MONTH, `joindate`, CURDATE()) AS `saldodate` FROM `vw_memberdeposit`
    
}