<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sppd_model extends CI_Model {


    public $intsppdid;
    public $intuserid;
    public $strdestination;
    public $strstart;
    public $strend;
    public $strvalue;
    public $strnotes;
    public $strstatus;
    public $strcrdat;
    public $intcruser;
    public $strchdat;
    public $intchuser;

    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('sppd');
    }

	public function getallsppd() {
        $sql = "SELECT a.*, b.fullname 
                FROM $this->tbname a
                LEFT JOIN tb_user b ON b.userid = a.userid 
                ORDER BY a.sppdid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getsearchsppd($param) {
        $where = 'WHERE 1=1';

        if(isset($param['optUser']) && !empty($param['optUser'])){
            $where .= " AND userid = '".$param['userid']."' ";
        }

        $sql = "SELECT * FROM $this->tbname
                ".$where."
                ORDER BY sppdid DESC";
        $query = $this->db->query($sql);

        $data = $query->result_array();
        $this->db->close();

        return $data;
    }

	public function getsinglesppd($intsppdid) {
        $sql = "SELECT * FROM $this->tbname WHERE sppdid = '$intsppdid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }


	public function addsppd() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s','%s','%s','%s','%s','%s','%u','%s')",
            '', $this->intuserid,$this->strdestination, $this->strstart, $this->strend, $this->strvalue,
            $this->strnotes, $this->strstatus, $this->strcrdat, $this->intcruser, $this->strchdat, $this->intchuser);
        $this->db->query($sql);
    }

    public function editsppd() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`destination`='%s', 
		`start`='%s', 
		`end`='%s',
		`value`='%s',
		`notes`='%s'
		WHERE 
		sppdid='%u'",
            $this->strdestination, $this->strstart, $this->strend, $this->strvalue,
            $this->strnotes,$this->intsppdid
        );
        $this->db->query($sql);
    }

    public function delete($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE sppdid = '". $id ."'");
    }
}