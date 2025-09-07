<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tpayroll_model extends CI_Model {

    /* tipe payrol
     * 1. koptel, 2. anggota istimewa, 3. pindah loker
    */

    public $intpayrollid;
    public $strnik;
    public $striuran_simpanan;
    public $striuran_bank;
    public $striuran_insidentil;
    public $strbulan;
    public $strtahun;
    public $strnote_payroll;
    public $strtipe_payroll;
    public $strbukti_transfer_simpanan;
    public $strbukti_transfer_bank;
    public $strbukti_transfer_insidentil;
    public $intstatus;
    public $cruser;
    public $crdat;
    public $chuser;
    public $chdat;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = 'tb_tpayroll';
    }
	
	function getallpayroll($param) {
        $where = 'WHERE 1=1';
        if(isset($param['txtNik']) && $param['txtNik'] != ''){
            $where .= " AND a.nik = '".$param['txtNik']."'";
        }

        if(isset($param['txtName']) && $param['txtName'] != ''){
            $where .= " AND b.name LIKE '%".$param['txtName']."%'";
        }

        if(isset($param['optBulan'])){
            $where .= " AND a.bulan = '".$param['optBulan']."' ";
        }

        if(isset($param['optTahun'])){
            $where .= " AND a.tahun = '".$param['optTahun']."' ";
        }

        $sql = "SELECT a.*, 
                    b.name, b.status AS status_anggota, b.tipe_anggota 
                FROM $this->tbname AS a
                LEFT JOIN tb_tanggota AS b ON b.nik = a.nik     
                ".$where." 
                ORDER BY a.tahun DESC, a.bulan DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function addpayroll() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES 
            ('%u','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%u','%u','%s','%u','%s')",
            '',
            $this->strnik,
            $this->striuran_simpanan,
            $this->striuran_bank,
            $this->striuran_insidentil,
            $this->strbulan,
            $this->strtahun,
            $this->strnote_payroll,
            $this->strtipe_payroll,
            $this->strbukti_transfer_simpanan,
            $this->strbukti_transfer_bank,
            $this->strbukti_transfer_insidentil,
            $this->intstatus,
            $this->cruser,
            $this->crdat,
            $this->chuser,
            $this->chdat
        );
        $this->db->query($sql);
    }

    function getiuraninsidentilbynik($nik, $mulai, $berakhir) {
        $bulan_mulai = date('m', strtotime($mulai));
        $tahun_mulai = date('Y', strtotime($mulai));
        $bulan_berakhir = date('m', strtotime($berakhir));
        $tahun_berakhir = date('Y', strtotime($berakhir));

        if($tahun_mulai != $tahun_berakhir){
            $penghubung = ' OR ';
        }else{
            $penghubung = ' AND ';
        }

        $sql = "SELECT * FROM 
                tb_tpayroll 
                WHERE 
                    (nik = '". $nik ."' AND bulan >= '". $bulan_mulai ."' AND tahun = '". $tahun_mulai ."') 
                    ". $penghubung ." (nik = '". $nik ."' AND bulan <= '". $bulan_berakhir ."' AND tahun = '". $tahun_berakhir ."')";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        $this->db->close();

        return $res;
    }

    function cekpayrolexist($bulan, $tahun){
        $sql = "SELECT COUNT(payrollid) as totalpayrol FROM tb_tpayroll 
                WHERE 
                tipe_payroll = 1 
                AND bulan = '". $bulan ."' 
                AND tahun = '". $tahun ."'";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        $this->db->close();

        return $res;
    }
}