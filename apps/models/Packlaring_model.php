<?php defined('BASEPATH') or exit('No direct script access allowed');

class Packlaring_model extends CI_Model {

	public $intpacklaringid;
	public $strpkgnum;
	public $strcode;
	public $strname;
    public $strpob;
    public $strdob;
	public $straddress;
	public $strstartwork;
	public $strendwork;
	public $strfile;
	public $strnotes;
	public $strcrdat;

    private $tbname;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('packlaring');
    }

    function getallpacklaring($param=array()) {
        $where = 'WHERE 1=1';
        if(!empty($param['code'])){
            $where .= " AND code LIKE '%". $param['code'] ."%'";
        }
        if(!empty($param['name'])){
            $where .= " AND name LIKE '%". $param['name'] ."%'";
        }

        $sql = "SELECT * FROM $this->tbname ". $where ." ORDER BY `packlaringid` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getcode($type) {
        $sql = "SELECT MAX(packlaringid) AS packlaringid FROM $this->tbname WHERE type = '". $type ."'";
        echo "<pre>"; print_r($sql); echo "</pre>";exit;
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['packlaringid'];
    }

    function getsinglepacklaring($id) {
        $sql = "SELECT * FROM $this->tbname WHERE packlaringid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastnumber($type) {
        $sql = "SELECT * FROM $this->tbname WHERE pkgnum = '".$type."' ORDER BY packlaringid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function addpacklaring() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
            '', $this->strpkgnum, $this->strcode, $this->strname, $this->strpob, $this->strdob, $this->straddress, $this->strstartwork, $this->strendwork, '', $this->strnotes,$this->strcrdat);
        $this->db->query($sql);
    }

    function editpacklaring() {
        $sql = sprintf("UPDATE $this->tbname SET 
				`code` = '%s', 
				pkgnum = '%s', 
				`name` = '%s',
				pob = '%s', 
				dob = '%s', 
				address = '%s', 
				start_work = '%s', 
				end_work = '%s', 
				notes = '%s' 
				WHERE packlaringid = '%u'",
            $this->strcode, $this->strpkgnum, $this->strname, $this->strpob, $this->strdob, $this->straddress, $this->strstartwork, $this->strendwork, $this->strnotes, $this->intpacklaringid);
        $this->db->query($sql);
    }

    function update_file() {
        $sql = sprintf("UPDATE $this->tbname SET 
				`file` = '%s'
				WHERE packlaringid = '%u'",
            $this->strfile, $this->intpacklaringid);
        $this->db->query($sql);
    }

    public function checkpkgnum($pkgnum) {
        $sql = "SELECT * FROM `tb_packlaring` WHERE `pkgnum` = '$pkgnum' AND YEAR(crdat) = '". date('Y') ."' LIMIT 0,1";
        $stmt = $this->db->query($sql);
        if ($stmt->num_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
    function getlastcodepacklaring(){
        $q = "SELECT SUBSTRING_INDEX(code, '/',1) AS last_code_packlaring
            FROM tb_packlaring
            WHERE YEAR(crdat) = '". date('Y') ."'
			ORDER BY packlaringid DESC
            LIMIT 0,1";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function delete() {
        $sql = sprintf("DELETE FROM $this->tbname WHERE `packlaringid`='%u'", $this->intpacklaringid);
        $this->db->query($sql);
    }
}