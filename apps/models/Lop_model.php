<?php defined('BASEPATH') or exit('No direct script access allowed');

class Lop_model extends CI_Model {

    public $intlopid;
    public $intdivid;
    public $intsegmenid;
    public $strunit;
    public $stramkomet;
    public $strstartkl;
    public $strendkl;
    public $strspknum;
    public $strprojectname;
    public $strnilaikl;
    public $intstatus;
    public $strnotes;

    private $tbname;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('lop');
    }

    function getalllop($param=array()) {
        $where = 'WHERE 1=1';
        if(!empty($param['code'])){
            $where .= " AND code LIKE '%". $param['code'] ."%'";
        }

        $sql = "SELECT 
                    a.*, b.code AS divname, c.code AS segmentname  
                FROM $this->tbname a
                LEFT JOIN tb_division b ON b.divisionid = a.divisi
                LEFT JOIN tb_segment c ON c.segmentid = a.segmen
                ". $where ." 
                ORDER BY a.`lopid` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getcode($type) {
        $sql = "SELECT MAX(letterid) AS letterid FROM $this->tbname WHERE type = '". $type ."'";
        echo "<pre>"; print_r($sql); echo "</pre>";exit;
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['letterid'];
    }

    function getsinglelop($id) {
        $sql = "SELECT
                    a.*, b.code AS divname, c.code AS segmentname  
                FROM $this->tbname a
                LEFT JOIN tb_division b ON b.divisionid = a.divisi
                LEFT JOIN tb_segment c ON c.segmentid = a.segmen
                WHERE a.lopid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getsinglnopes($data) {
        $sql = "SELECT * FROM tb_order WHERE invnum = '". $data['invnum'] ."' AND YEAR(invdate) = '". $data['invtahun'] ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getsinglelopdetail($id) {
        $sql = "SELECT a.*, b.lopdetailid, b.invdate, b.nilai, c.code, c.invnum
                    FROM tb_lop a
                LEFT JOIN tb_lopdetail b ON b.lopid = a.lopid
                LEFT JOIN tb_order c ON c.orderid = b.orderid
                WHERE a.lopid = '". $id ."' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastnumber($type) {
        $sql = "SELECT * FROM $this->tbname WHERE type = '".$type."' ORDER BY letterid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastnumberbyunit($post) {
        $sql = "SELECT * FROM $this->tbname WHERE type = '".$post['type']."' AND unit = '". $post['unit'] ."'ORDER BY letterid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function addlop() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s','%s','%u','%s')",
            '', $this->intdivid, $this->intsegmenid, $this->strunit, $this->stramkomet, $this->strstartkl, $this->strendkl, $this->strspknum, $this->strprojectname, $this->strnilaikl, $this->intstatus, $this->strnotes);
        $this->db->query($sql);
    }

    function addlopdetail($param) {
        $sql= sprintf("INSERT INTO tb_lopdetail (lopid,orderid,invdate,nilai) VALUES ('". $param['resLopid'] ."','". $param['resOrderid'] ."','". $param['resDate'] ."','". $param['resValue'] ."')");
        $this->db->query($sql);
    }

    function editlop() {
        $sql = sprintf("UPDATE $this->tbname SET 
				divisi = '%u', 
				segmen = '%u',
				unit = '%s', 
				amkomet = '%s', 
				startkl = '%s', 
				endkl = '%s', 
				spknum = '%s', 
				projectname = '%s', 
				nilaikl = '%s', 
				status = '%u',
				notes = '%s' 
				WHERE lopid = '%u'",
            $this->intdivid, $this->intsegmenid, $this->strunit, $this->stramkomet, $this->strstartkl, $this->strendkl,
            $this->strspknum, $this->strprojectname, $this->strnilaikl, $this->intstatus, $this->strnotes, $this->intlopid);
        $this->db->query($sql);
    }

    function delete($id) {
        $sql = sprintf("DELETE FROM tb_lop WHERE `lopid`='". $id ."'");
        $this->db->query($sql);
    }

    function deletelopdetail($id) {
        $sql = sprintf("DELETE FROM tb_lopdetail WHERE `lopid`='". $id ."'");
        $this->db->query($sql);
    }
}