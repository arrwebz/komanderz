<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Targetam_model extends CI_Model {

    public $inttargetsegementid;
    public $intamid;
    public $strtarget;
    public $intbulan;
    public $inttahun;
    private $tbname;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('targetam');
    }

	public function getalltargetam() {
        $sql = "SELECT 
                    a.targetamid, a.amid, a.target, a.bulan, a.tahun,
                    c.fullname 
                FROM tb_targetam AS a 
                LEFT JOIN tb_user AS c ON c.userid = a.amid
                ORDER BY a.`targetamid` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getsingletargetam($id) {
        $sql = "SELECT * FROM $this->tbname WHERE targetamid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addtargetam() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s')",
            '',$this->intamid, $this->strtarget, $this->intbulan, $this->inttahun);
		/* echo '<pre>';print_r($sql); exit;	 */
		$this->db->query($sql);
    }

	public function edittargetam() {
        $sql = sprintf("UPDATE $this->tbname SET `amid`='%u', `target`='%s',`bulan`='%s', `tahun`='%s' WHERE targetamid='%u'",
            $this->intamid, $this->strtarget, $this->intbulan, $this->inttahun, $this->inttargetsegementid);
        $this->db->query($sql);
    }

    public function deletetargetam($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE targetamid = '". $id ."'");
    }

    function getambymarketingid($mid){
        $sql = "SELECT * FROM tb_am AS a
                LEFT JOIN tb_user AS b ON a.marketingid = b.userid 
                WHERE a.amid = '$mid'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }


}