<?php defined('BASEPATH') or exit('No direct script access allowed');

class Prokoptel_model extends CI_Model {
    
    public $intprokopid; 
    public $intcode;
    public $strunit;
    public $intsegment;
    public $strproname;
    public $strprodate;
    public $strpronum; 
    public $strproval; 
    public $strstartop; 
    public $strendop;
    public $strperiode;  
    public $strcrdat;

    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('prokoptel');
    }
	
	//baru
	public function getallproject() {
        $sql = "SELECT  
		`a`.`prokopid`, `a`.`code`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`unit`, `a`.`proname`, `a`.`prodate`, `a`.`pronum`, `a`.`proval`, `a`.`startop`, `a`.`endtop`, `a`.`periode`
		FROM `tb_prokoptel` `a` ORDER BY `a`.`prokopid` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsingleproject($intprokopid) {
        $sql = "SELECT * FROM `tb_prokoptel` WHERE `prokopid` = '$intprokopid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addproject() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%u','%s','%s','%s','%s','%s','%s','%s','%s')",
            '', $this->intcode,$this->strunit, $this->intsegment, $this->strproname, $this->strprodate, $this->strpronum, $this->strproval, $this->strstartop,
			$this->strendop, $this->strperiode, $this->strcrdat);
        $this->db->query($sql);
    }

}