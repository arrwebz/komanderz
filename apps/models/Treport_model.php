<?php defined('BASEPATH') or exit('No direct script access allowed');

class Treport_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function totalmember(){
        $sql = "SELECT 
                    COUNT(anggotaid) AS totalmember, SUM(total_saldo_simpanan) AS totalsaldo 
                FROM vw_anggota 
                WHERE 
                    nik != '123456'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function totalactivemember(){
        $sql = "SELECT 
                    COUNT(anggotaid) AS totalmember, SUM(total_saldo_simpanan) AS totalsaldo 
                FROM vw_anggota 
                WHERE 
                    nik != '123456'
                    AND status = 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
}