<?php defined('BASEPATH') or exit('No direct script access allowed');

class Fakturpajak_model extends CI_Model {
    
    public $intfakturpajakid;
	public $strcode;
	public $strunit;
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
    public $intstatus;
    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('fakturpajak');
    }
	
	public function getallfakturpajak() {
        $sql = "SELECT * FROM `tb_fakturpajak` ORDER BY `fakturpajakid` ASC ";
        $stmt = $this->db->query($sql);
        $this->db->close();

        return $stmt->result_array();
    }
	
	public function getsinglefakturpajak($id) {
        $sql = "SELECT `fakturpajakid`, unit, `code`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE fakturpajakid='$id' ";
        $stmt = $this->db->query($sql);
        $this->db->close();

        return $stmt->result_array();
    }
	
	public function addfakturpajak() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%u','%s','%u','%s','%u','%s')",
            '', $this->strunit, $this->strcode, $this->intstatus, $this->strcruser, $this->strcrdat, '', '');
		$this->db->query($sql);
        $this->db->close();
    }
	
	public function editfakturpajak() {
        $sql = sprintf("UPDATE $this->tbname SET unit = '%s', `code`='%s', `status`='%u', `chuser`='%u', `chdat`='%s' WHERE fakturpajakid='%u'",
            $this->strunit, $this->strcode, $this->intstatus, $this->strchuser, $this->strchdat, $this->intfakturpajakid);
        $this->db->query($sql);
        $this->db->close();
    } 
	
    public function deletefakturpajak($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE fakturpajakid = '". $id ."'");
        $this->db->close();
    }

    public function checkcode($code,$unit) {
        $sql = "SELECT * FROM `tb_fakturpajak` WHERE `code` = '$code' AND `unit` = '$unit' LIMIT 0,1";
        $stmt = $this->db->query($sql);
        $this->db->close();

        if ($stmt->num_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
}