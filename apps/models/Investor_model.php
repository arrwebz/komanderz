<?php defined('BASEPATH') or exit('No direct script access allowed');

class Investor_model extends CI_Model {
     
	//tb_investor
	public $intinvestorid;
	public $strname;
	public $strlocation;
	public $strktp;
	public $strnpwp;
	public $stradrs;
	public $strcategory;
	public $strband;
	public $strjoindate;
	public $strnotes;

	//tb_investdana
	public $intdanaid;
	public $strcode;
	public $strcontract;
	public $strinvestname;
	public $strstartdate;
	public $strendate;
	public $intperiode;
	public $intinterest;
	public $inttotalinvest;
	public $intfeeinvest;
	public $strdbank;
	public $strdrek;
	public $strdname;
	public $strdnote;
	public $strdstatus;

    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
    private $tbname;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('investor');
    }

	public function getalldanainvestor() {
        $sql = "SELECT * FROM `tb_investdana` ORDER BY `contract` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getsinglecontract($danaid) {
        $sql = "SELECT * FROM `tb_investdana` WHERE `indanaid` = '$danaid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getsingleprofile($investorid) {
        $sql = "SELECT * FROM $this->tbname WHERE `investorid` = '$investorid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function checkinvestorname($name) {
        $sql = "SELECT * FROM $this->tbname WHERE `name` = '$name' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function gettotalinvestorsaldo($investorid) {
        $sql = "SELECT SUM(`totalinvest`) AS `totalinvest` FROM `tb_investdana` WHERE `investorid` = '$investorid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getallcontractinvestor($investorid) {
        $sql = "SELECT * FROM `tb_investdana` WHERE `investorid` = '$investorid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addinvestor() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s','%s',
		'%s','%s','%s', 
		'%u','%s','%u','%s')",
            '',$this->strname, $this->strlocation, $this->strktp, $this->strnpwp, $this->stradrs, $this->strcategory,
            $this->strband, $this->strjoindate, $this->strnotes,
			$this->strcruser,$this->strcrdat,'','' );
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }

	public function addcontract() {
        $sql= sprintf("INSERT INTO `tb_investdana` VALUES ('%u','%u','%s','%s','%s','%s','%s',
		'%u','%s','%u','%u', 
		'%s','%s','%s','%s','%u',
		'%u','%s','%u','%s')",
            '',$this->intinvestorid, $this->strcode, $this->strcontract, $this->strinvestname, $this->strstartdate, $this->strendate,
            $this->intperiode, $this->intinterest, $this->inttotalinvest,$this->intfeeinvest,
			$this->strdbank,$this->strdrek,$this->strdname,$this->strdnote,$this->strdstatus,
			$this->strcruser,$this->strcrdat,'','' );
		/* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }

	public function editassets() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`astypeid`='%u', `astbrandid`='%u', `assetname`='%s', `series`='%s', `spec`='%s', `serialnumber`='%s', 
		`color`='%s', `assetcondition`='%s', `price`='%s', `assetdate`='%s', `purchasedate`='%s', `warranty`='%s',
		`amount`='%s', `notes`='%s', `user`='%s', `location`='%s', `photo`='%s', `status`='%u',
		`chuser`='%u', `chdat`='%s' WHERE `assetid`='%u'",
            $this->intastypeid, $this->intastbrandid, $this->strassetname, $this->strseries, $this->strspec, $this->strserialnumber,
			$this->strcolor, $this->strassetcondition, $this->strprice, $this->strassetdate, $this->strpurchasedate, $this->strwarranty, 
			$this->stramount, $this->strnotes, $this->struser,  $this->strlocation, $this->strphoto, $this->intstatus,
            $this->strchuser,$this->strchdat,$this->intassetid);
        $this->db->query($sql);
    } 
	
    public function deleteassets($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE assetid = '". $id ."'");
    }

    function getlastcodekontrak(){
        $q = "SELECT max(contract) last_kontrak FROM tb_investdana ORDER BY indanaid DESC LIMIT 0,1";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }
}