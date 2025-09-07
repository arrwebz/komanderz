<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Datalog_model extends CI_Model {
    
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
	
	public $intuserid;
	public $strnotes;
	
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('tmp');
    }
	
	public function getalldata() {
		$sql = "SELECT `a`.*,
        (select `z`.`code` from `tb_order` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `ordercode`,
        (select `z`.`code` from `tb_spb` `z` where `z`.`spbid` = `a`.`spbid` limit 0,1) AS `spbcode`,
        (select `z`.`value` from `tb_spb` `z` where `z`.`spbid` = `a`.`spbid` limit 0,1) AS `spbvalue`,
        (select `z`.`username` from `tb_user` `z` where `z`.`userid` = `a`.`userid` limit 0,1) AS `userlog` 		
		FROM $this->tbname a ORDER BY `a`.`tmpid` DESC LIMIT 0,50";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
			
	//update db tmpfile
	public function addtmpfile() {
	$sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%u','%u','%u','%s','%s')",
            '', $this->strunit, $this->intorderid, $this->intspbid,$this->intuserid,$this->strnotes,$this->strcrdat);
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
		    
}