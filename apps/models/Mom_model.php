<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mom_model extends CI_Model {

    public $intmomid;
    public $strtitle;
    public $strmdate;
    public $strmtime;
    public $strlocation;
    public $strcust;
    public $strtom;
    public $strinst;
    public $strfaci;
    public $strattd;
    public $stragenda;
    public $strdaresult;

    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('mom');
    }

	public function getallmom() {
        $sql = "SELECT * FROM $this->tbname ORDER BY momid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getsearchmom($param) {
        $where = 'WHERE 1=1';

        if(isset($param['txtTitle']) && !empty($param['txtTitle'])){
            $where .= " AND title = '".$param['txtTitle']."' ";
        }

        $sql = "SELECT * FROM $this->tbname
                ".$where."
                ORDER BY momid DESC";
        $query = $this->db->query($sql);

        $data = $query->result_array();
        $this->db->close();

        return $data;
    }

	public function getsinglemom($intmomid) {
        $sql = "SELECT * FROM $this->tbname WHERE momid = '$intmomid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addmom() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
            '', $this->strtitle,$this->strmdate, $this->strmtime, $this->strlocation, $this->strcust,
            $this->strinst,$this->strtom, $this->strfaci, $this->strattd, $this->stragenda, $this->strdaresult);
        $this->db->query($sql);
    }

    public function editmom() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`title`='%s', 
		`mdate`='%s', 
		`mtime`='%u', 
		`location`='%s',
		`customer`='%s',
		`instructor`='%s',
		`tom`='%s',
		`facilitator`='%s',
		`attd`='%s',
		`agenda`='%s',
		`daresult`='%s'
		WHERE 
		    momid='%u'",
            $this->strtitle, $this->strmdate, $this->strmtime, $this->strlocation,
            $this->strcust,$this->strinst,$this->strtom,$this->strfaci,$this->strattd,$this->stragenda,$this->strdaresult, $this->intmomid
        );
        $this->db->query($sql);
    }

    public function delete($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE momid = '". $id ."'");
    }
}