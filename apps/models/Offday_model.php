<?php defined('BASEPATH') or exit('No direct script access allowed');

class Offday_model extends CI_Model {

	public $intoffdayid;
	public $strname;
	public $strdate;

    private $tbname;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('offday');
    }

    function getalloffday() {
        $sql = "SELECT 
                *, offdayid AS id, name AS title, name AS description, date AS start, date AS end, CONCAT('#DD4B39') AS color 
                FROM $this->tbname 
                ORDER BY `date` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getalloffdayyear($year) {
        $sql = "SELECT 
                *, offdayid AS id, name AS title, name AS description, date AS start, date AS end, CONCAT('#DD4B39') AS color 
                FROM $this->tbname 
                WHERE YEAR(date) = '". $year ."'
                ORDER BY `date` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getsingleoffday($id) {
        $sql = "SELECT 
                *, offdayid AS id, name AS title, name AS description, date AS start, date AS end, CONCAT('#DD4B39') AS color 
                FROM $this->tbname
                WHERE offdayid = '". $id ."' 
                ORDER BY `date` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function addoffday() {
        $sql= sprintf("INSERT INTO `tb_offday` VALUES ('%u','%s','%s')",
            '',$this->strname, $this->strdate);
        $this->db->query($sql);
    }

    function editoffday() {
        $sql = sprintf("UPDATE `tb_offday` SET 
				`name`='%s', 
				`date`='%s' 
				WHERE `offdayid`='%u'",
            $this->strname, $this->strdate, $this->intoffdayid);
        $this->db->query($sql);
    }

    function delete() {
        $sql = sprintf("DELETE FROM `tb_offday` WHERE `offdayid`='%u'", $this->intoffdayid);
        $this->db->query($sql);
    }
}