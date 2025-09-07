<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Assets_model extends CI_Model {
     
	public $intassetid;
	public $intcategoryid;
	public $intastypeid;
	public $intastbrandid;
	
	public $strassetname;
	public $strseries;
	public $strspec;
	public $strserialnumber;
	public $strcolor;
	public $strassetcondition;
	public $strprice;
	public $strassetdate;
	public $strpurchasedate;
	public $strwarranty;
	public $stramount;
	public $strnotes;
	public $struser;	
	public $strlocation;
	public $strphoto;
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
        $this->tbname = $this->db->dbprefix('assets');
    }
	
	public function getallassets() {
        $sql = "SELECT `a`.`assetid`, `a`.`astypeid`, `a`.`astbrandid`, `a`.`assetname`, `a`.`series`,`a`.`spec`, `a`.`serialnumber`,
		`a`.`color`, `a`.`assetcondition`, `a`.`price`, `a`.`assetdate`, `a`.`purchasedate`, `a`.`warranty`, 
		`a`.`amount`, `a`.`notes`, `a`.`user`, `a`.`location`, `a`.`photo`, `a`.`status`,
		(select `z`.`typename` from `tb_astype` `z` where `z`.`astypeid` = `a`.`astypeid` limit 0,1) AS `typename`
		FROM $this->tbname `a` ORDER BY `a`.`assetid` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsingleassets($id) {
        $sql = "SELECT `a`.*, 
		(select `x`.`categoryname` from `tb_astype` `z` join `tb_astcategory` `x` where `z`.`astcategoryid` = `x`.`astcategoryid` and `z`.`astypeid` = `a`.`astypeid` limit 0,1) AS `categoryname`,
		(select `z`.`typename` from `tb_astype` `z` where `z`.`astypeid` = `a`.`astypeid` limit 0,1) AS `typename`,
		(select `z`.`brandname` from `tb_astbrand` `z` where `z`.`astbrandid` = `a`.`astbrandid` limit 0,1) AS `brandname` 
		FROM $this->tbname `a` WHERE `assetid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
		
	public function addassets() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s',
		'%s','%s','%s','%s','%s','%s','%s','%s','%s','%u',
		'%u','%s','%u','%s')",
            '',$this->intastypeid, $this->intastbrandid, $this->strassetname, $this->strseries, $this->strspec, $this->strserialnumber,
			$this->strcolor, $this->strassetcondition, $this->strprice, $this->strassetdate, $this->strpurchasedate, $this->strwarranty, 
			$this->stramount, $this->strnotes, $this->struser, $this->strlocation, $this->strphoto, $this->intstatus,
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
		/* echo '<pre>';
		print_r($sql); exit; */	
        $this->db->query($sql);
    } 
	
    public function deleteassets($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE assetid = '". $id ."'");
    }
	 
    
}