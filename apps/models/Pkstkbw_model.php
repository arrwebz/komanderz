<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pkstkbw_model extends CI_Model {

	public $intpkstkbwid;
	public $strcode;
	public $strname;
	public $strposition;
    public $strpob;
    public $strdob;
	public $straddress;
	public $strstartwork;
	public $strendwork;
	public $strsegmen;
	public $strbasicsallary;
	public $strworkcomplexity;
	public $strovertime;
	public $strmealallowance;
	public $strcrdat;
	public $strcruser;
	public $strchdat;
	public $strchuser;

    private $tbname;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('pkstkbw');
    }

    function getallpkstkbw($param=array()) {
        $where = 'WHERE 1=1';
        if(!empty($param['code'])){
            $where .= " AND code LIKE '%". $param['code'] ."%'";
        }
        if(!empty($param['name'])){
            $where .= " AND name LIKE '%". $param['name'] ."%'";
        }

        $sql = "SELECT * FROM $this->tbname ". $where ." ORDER BY `pkstkbwid` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getcode($type) {
        $sql = "SELECT MAX(pkstkbwid) AS pkstkbwid FROM $this->tbname WHERE type = '". $type ."'";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['pkstkbwid'];
    }

    function getsinglepkstkbw($id) {
        $sql = "SELECT * FROM $this->tbname WHERE pkstkbwid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastnumber($type) {
        $sql = "SELECT * FROM $this->tbname WHERE pkgnum = '".$type."' ORDER BY pkstkbwid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function addpkstkbw() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%u','%s','%u')",
            '', $this->strcode, $this->strname, $this->strposition, $this->strpob, $this->strdob, $this->straddress, $this->strsegmen, $this->strstartwork, $this->strendwork,
            $this->strbasicsallary, $this->strworkcomplexity, $this->strovertime, $this->strmealallowance, $this->strcrdat, $this->strcruser, '', '');
        $this->db->query($sql);
    }

    function editpkstkbw() {
        $sql = sprintf("UPDATE $this->tbname SET 
				`code` = '%s',  
				`name` = '%s',
				`position` = '%s',
				pob = '%s', 
				dob = '%s', 
				address = '%s', 
				segmen = '%s', 
				start_work = '%s', 
				end_work = '%s', 
				basic_sallary = '%s', 
				work_complexity = '%s', 
				overtime = '%s',
				meal_allowance = '%s', 
				chdat = '%s',
				chuser = '%u'
				WHERE pkstkbwid = '%u'",
            $this->strcode, $this->strname, $this->strposition, $this->strpob, $this->strdob,
            $this->straddress, $this->strsegmen, $this->strstartwork, $this->strendwork,
            $this->strbasicsallary, $this->strworkcomplexity, $this->strovertime, $this->strmealallowance,
            $this->strchdat, $this->strchuser, $this->intpkstkbwid);
        $this->db->query($sql);
    }

    function update_file() {
        $sql = sprintf("UPDATE $this->tbname SET 
				`file` = '%s'
				WHERE pkstkbwid = '%u'",
            $this->strfile, $this->intpkstkbwid);
        $this->db->query($sql);
    }

    public function checkpkgnum($pkgnum) {
        $sql = "SELECT * FROM `tb_pkstkbw` WHERE `pkgnum` = '$pkgnum' LIMIT 0,1";
        $stmt = $this->db->query($sql);
        if ($stmt->num_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
    function getlastcodepkstkbw(){
        $q = "SELECT SUBSTRING_INDEX(code, '/',1) AS last_code_pkstkbw
            FROM tb_pkstkbw
            WHERE YEAR(crdat) = '". date('Y') ."'
            LIMIT 0,1";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function delete() {
        $sql = sprintf("DELETE FROM $this->tbname WHERE `pkstkbwid`='%u'", $this->intpkstkbwid);
        $this->db->query($sql);
    }
}