<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Targetsegment_model extends CI_Model {

    public $inttargetsegementid;
    public $intsegmentid;
    public $strtarget;
    public $intbulan;
    public $inttahun;
    private $tbname;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('targetsegment');
    }

	public function getalltargetsegment() {
        $sql = "SELECT 
                    a.targetsegmentid, a.segmentid, b.`code`, a.target, a.bulan, a.tahun,
                    c.fullname 
                FROM tb_targetsegment AS a
                LEFT JOIN tb_segment AS b ON b.segmentid = a.segmentid 
                LEFT JOIN tb_user AS c ON c.userid = b.marketingid
                ORDER BY a.`targetsegmentid` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getallsegment(){
        $sql = "SELECT * FROM tb_segment";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getsingletargetsegment($id) {
        $sql = "SELECT * FROM $this->tbname WHERE targetsegmentid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addtargetsegment() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s')",
            '',$this->intsegmentid, $this->strtarget, $this->intbulan, $this->inttahun);
		/* echo '<pre>';print_r($sql); exit;	 */
		$this->db->query($sql);
    }

	public function edittargetsegment() {
        $sql = sprintf("UPDATE $this->tbname SET `segmentid`='%u', `target`='%s',`bulan`='%s', `tahun`='%s' WHERE targetsegmentid='%u'",
            $this->intsegmentid, $this->strtarget, $this->intbulan, $this->inttahun, $this->inttargetsegementid);
        $this->db->query($sql);
    }

    public function deletetargetsegment($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE targetsegmentid = '". $id ."'");
    }

    function getambymarketingid($mid){
        $sql = "SELECT * FROM tb_segment AS a
                LEFT JOIN tb_user AS b ON a.marketingid = b.userid 
                WHERE a.segmentid = '$mid'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }


}