<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model {
     
	public $intuserid;
	public $introleid;
	public $intgroupid;
	
	public $intnik;
	public $strusername;
	public $strpassword;
	public $stremail;
	public $strtelp;
	public $strfullname;
	public $strposition;
	public $strjoindate;
	
	public $strphoto;
	public $intstatus;
	public $strtoken;
	public $strtheme;

    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('user');
    }
	
	public function getalluser() {
        $sql = "SELECT * FROM `vw_useraccounts` ORDER BY `userid` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getalluseractive() {
        $sql = "SELECT 
                    * 
                FROM `vw_useraccounts` a 
                LEFT JOIN tb_userinfo b ON b.userid = a.userid WHERE a.`userid` != '1' AND a.`userid` != '2' AND a.`groupid` != '6' AND a.`status` = '1' ORDER BY a.`fullname` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getallusermaps() {
        /*$sql = "SELECT `a`.*,
		(select `z`.`fullname` from `vw_useraccounts` `z` where `z`.`userid` = `a`.`userid` limit 0,1) AS `fullname`
		FROM `tb_userinfo` `a` WHERE
            `a`.`userid` != '1'
            AND `a`.`userid` != '2'
            AND `a`.`userid` != '4'
            AND `a`.`userid` != '13'
		ORDER BY `a`.`userid` ASC ";*/

        $sql = "SELECT * FROM tb_user AS a
                LEFT JOIN tb_userinfo AS b ON b.userid = a.userid
                WHERE a.status != 0
                AND a.groupid != 6
                AND a.userid != 1
                AND a.userid != 2";
        $stmt = $this->db->query($sql);  
        return $stmt->result();
    }
	
	public function getsingleuser($id) {
        $sql = "SELECT * FROM `vw_useraccounts` WHERE userid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array(); 
    }

    public function getsingleusertags($id) {
        $sql = "SELECT userid AS value,fullname AS text FROM `vw_useraccounts` WHERE 
                fullname LIKE '%$id%' 
                OR username LIKE  '%$id%'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getuserin($id) {
        $sql = "SELECT userid AS value,fullname AS text FROM `vw_useraccounts` WHERE
                userid IN (". $id .")";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsingleuserprofile($id) {
        $sql = "SELECT a.*, `b`.`rolecode`, `b`.`groupcode`, `b`.`nik`, `b`.`email`, `b`.`telp`, 
		`b`.`fullname`, `b`.`position`, `b`.`joindate`, `b`.`photo` 
		FROM `tb_userinfo` `a` JOIN `vw_useraccounts` `b` WHERE `a`.`userid` = `b`.`userid` AND `a`.`userid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } 
	   
	public function getuserfamily($id) {
        $sql = "SELECT * FROM `tb_userfamily` WHERE `userid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } 
	
	public function getusersalary($id) {
        $sql = "SELECT * FROM `tb_usersalary` WHERE `userid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } 
	
	public function getallusersalary() {
        $sql = "SELECT * FROM `tb_usersalary`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } 
	
	public function getsingleusersalary($id) {
        $sql = "SELECT `a`.*,
		(SELECT `x`.`nik` FROM `vw_useraccounts` `x` WHERE `x`.`userid` = `a`.`userid` LIMIT 0,1) AS `nik`, 
		(SELECT `x`.`location` FROM `vw_useraccounts` `x` WHERE `x`.`userid` = `a`.`userid` LIMIT 0,1) AS `location`, 
		(SELECT `y`.`gender` FROM `tb_userinfo` `y` WHERE `y`.`userid` = `a`.`userid` LIMIT 0,1) AS `gender`,
		(SELECT `z`.`amount` FROM `tb_userloan` `z` WHERE `z`.`userid` = `a`.`userid` LIMIT 0,1) AS `cutsalary`,
		(SELECT `a`.`thp`-`z`.`amount` FROM `tb_userloan` `z` WHERE `z`.`userid` = `a`.`userid` LIMIT 0,1) AS `totalsalary`
		FROM `tb_usersalary` `a` WHERE `a`.`userid`='$id' "; 
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } 
	
	// public function getvalidateuser($username){
        // $sql = "SELECT * FROM `vw_useraccounts` WHERE `username` = '$username' AND `status` = '1' ";
        // $stmt = $this->db->query($sql); 
        // return $stmt->row();
    // }
	
	public function getvalidateuser($username){
		$this->db->set_dbprefix('vw_');
		$this->vwname = $this->db->dbprefix('useraccounts');
        $sql = $this->db->get_where($this->vwname,['username'=>$username,'status'=>'1']);
        return $sql->row();
    }
	
	public function adduser() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%u',
		'%s','%s','%s','%s','%s',
		'%s','%s','%s','%s','%u',
		'%u','%s','%s','%u','%s')",
            '',$this->introleid, $this->intgroupid, $this->intnik,
			$this->strusername, $this->strpassword, $this->stremail, $this->strtelp,
			$this->strfullname,$this->strposition, $this->strjoindate, $this->strphoto, $this->intstatus, $this->strtoken, $this->strtheme,
			$this->strcruser,$this->strcrdat,'','' );
		//echo '<pre>';
		//print_r($sql); exit; 
        $this->db->query($sql);
    }
	
	public function edituser() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`roleid`='%u', `groupid`='%u', `nik`='%u',
		`username`='%s', `password`='%s', `email`='%s', `telp`='%s',
		`fullname`='%s', 
		`position`='%s', `joindate`='%s', `photo`='%s', `status`='%u',
		`chuser`='%u', `chdat`='%s' WHERE userid='%u'",
            $this->introleid, $this->intgroupid, $this->intnik,
			$this->strusername, $this->strpassword, $this->stremail, $this->strtelp, 
			$this->strfullname,
			$this->strposition, $this->strjoindate, $this->strphoto, $this->intstatus,
            $this->strchuser,$this->strchdat,$this->intuserid);
		/* echo '<pre>'; 
		print_r($sql); exit; */	
        $this->db->query($sql);
    } 
	
    public function deleteuser($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE userid = '". $id ."'");
    }
	
	public function getuserole() {
		$sql = "SELECT `roleid`, `code`, `name` FROM `tb_userole` ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getusergroup() {
		$sql = "SELECT `groupid`, `code`, `name` FROM `tb_usergroup` ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	function updatelog($strchdat,$intuserid){
		$this->db->set_dbprefix('tb_');
		$this->tbname = $this->db->dbprefix('user');
		$this->db->set('chdat', $strchdat);
		$this->db->where('userid', $intuserid);
		$this->db->update($this->tbname);
    }

	function updatethememode($userid,$mode){
		$this->db->set_dbprefix('tb_');
		$this->tbname = $this->db->dbprefix('user');
		$this->db->set('thememode', $mode);
		$this->db->where('userid', $userid);
		$this->db->update($this->tbname);
    }

	/* function updatelog(){
		$sql = sprintf("UPDATE $this->tbname SET 
		`chdat`='%s' WHERE userid='%u'", $this->strchdat,$this->intuserid);
		 echo '<pre>'; 
		print_r($sql); exit; 
        $this->db->query($sql);
    } */
   
    
}