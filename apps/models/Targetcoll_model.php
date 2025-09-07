<?php defined('BASEPATH') or exit('No direct script access allowed');

class Targetcoll_model extends CI_Model {

    public $intidtargetcoll;
    public $strnama;
    public $strnilai;
    public $strtipe;
    public $strbulan;
    public $strtahun;

    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('targetcoll');
    }

	public function getalltargetcoll() {
        $sql = "SELECT * FROM $this->tbname ORDER BY idtargetcoll DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function getsearchtargetsalses($param) {
        $where = 'WHERE 1=1';

        if(isset($param['txtNama']) && !empty($param['txtNama'])){
            $where .= " AND nama = '".$param['txtNama']."' ";
        }

        if(isset($param['optTipe'])){
            $where .= " AND tipe = '".$param['optTipe']."' ";
        }

        if($param['optTahun'] != '0'){
            $where .= " AND tahun = '".$param['optTahun']."' ";
        }

        $sql = "SELECT * FROM $this->tbname
                ".$where."
                ORDER BY idtargetcoll DESC";
        $query = $this->db->query($sql);

        $data = $query->result_array();
        $this->db->close();

        return $data;
    }

	public function getsingletargetcoll($intidtargetcoll) {
        $sql = "SELECT * FROM $this->tbname WHERE idtargetcoll = '$intidtargetcoll' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addtargetcoll() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s')",
            '', $this->strnama,$this->strnilai, $this->strtipe, $this->strbulan, $this->strtahun);
        $this->db->query($sql);
    }

    public function edittargetcoll() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`nama`='%s', 
		`nilai`='%u', 
		`tipe`='%u', 
		`bulan`='%s',
		`tahun`='%s'
		WHERE 
		idtargetcoll='%u'",
            $this->strnama, $this->strnilai, $this->strtipe, $this->strbulan,
            $this->strtahun,$this->intidtargetcoll
        );
        $this->db->query($sql);
    }

    public function delete($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE idtargetcoll = '". $id ."'");
    }
}