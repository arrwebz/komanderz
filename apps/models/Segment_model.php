<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Segment_model extends CI_Model {
    
    public $intsegmentid;
	public $intdivisionid;
	public $intuseramid;
	public $strcode;
	public $strname;
    public $straddress;
    public $intstatus;
	public $intpriority;
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('segment');
    }
	
	public function getallsegment() {
        $sql = "SELECT 
                    a.*,
                    b.`code` AS divcode,
                    c.fullname 
                FROM tb_segment AS a 
                LEFT JOIN tb_division AS b ON b.divisionid = a.divisionid 
                LEFT JOIN tb_user AS c ON c.userid = a.marketingid
                ORDER BY a.segmentid ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsinglesegment($id) {
        $sql = "SELECT `segmentid`, `divisionid`, `marketingid`, `code`, `name`, `address`, `priority`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE segmentid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function addsegment() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%u','%u',
		'%u','%s','%u','%s')",
            '',$this->intdivisionid, $this->intuseramid, $this->strcode, $this->strname, $this->straddress, $this->intpriority, $this->intstatus, $this->strcruser,$this->strcrdat,'','' );
		/* echo '<pre>';
		print_r($sql); exit;	 */
		$this->db->query($sql);
    }
	
	public function editsegment() {
        $sql = sprintf("UPDATE $this->tbname SET `divisionid`='%u', `marketingid`='%u',
		`code`='%s', `name`='%s', `address`='%s',`priority`='%u', `status`='%u', `chuser`='%u', `chdat`='%s' WHERE segmentid='%u'",
            $this->intdivisionid, $this->intuseramid, $this->strcode, $this->strname, $this->straddress, $this->intpriority, $this->intstatus, $this->strchuser,$this->strchdat,$this->intsegmentid);
        $this->db->query($sql);
    } 
	
    public function deletesegment($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE segmentid = '". $id ."'");
    }
}