<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tspbsp_model extends CI_Model {

    public $intspbspid;
    public $intpengajuanid;
    public $strnomor;
    public $strnik;
    public $strnominal;
    public $strtanggal_spb;
    public $strtanggal_proses;
    public $intstatus;
    public $strbukti_transfer;
    public $strbudgetdate;
    public $intstatusbudget;
    public $cruser;
    public $crdat;
    public $chuser;
    public $chdat;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = 'tb_tspbsp';
    }

    function getallspbsp($param) {
        $where = 'WHERE 1=1';
        if(isset($param['txtNomorspb']) && $param['txtNomorspb'] != ''){
            $where .= " AND LEFT(a.nomor,4) = '".$param['txtNomorspb']."' ";
        }

        if(isset($param['txtNik']) && $param['txtNik'] != ''){
            $where .= " AND b.nik = '".$param['txtNik']."' ";
        }

        if(isset($param['optBulan'])){
            $where .= " AND MONTH(a.tanggal_spb) = '".$param['optBulan']."' ";
        }

        if(isset($param['optTahun'])){
            $where .= " AND YEAR(a.tanggal_spb) = '".$param['optTahun']."' ";
        }

        if(isset($param['txtSpbspid'])){
            $where .= " AND a.spbspid = '".$param['txtSpbspid']."' ";
        }

        $sql = "SELECT 
                    a.spbspid, a.pengajuanid, a.nomor, a.nominal, a.tanggal_spb, a.status, 
                    a.bukti_transfer, a.cruser, a.crdat, a.chuser,a.chdat,
                    b.tipe_pengajuan, b.nomor_pengajuan, b.tanggal_pengajuan, b.nik, b.nama, b.tipe_penarikan, b.bank, b.norek, b.atas_nama,
                    b.nominal_penarikan, b.nominal_pinjaman_insidentil, b.nominal_pinjaman_koptel,
                    b.platform, c.name
                FROM tb_tspbsp a
                LEFT JOIN tb_tpengajuan b ON b.pengajuanid = a.pengajuanid 
                LEFT JOIN tb_tanggota c ON c.nik = b.nik
                    ".$where."
                ORDER BY a.spbspid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
		
	public function addspb() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s','%s','%s','%u','%s','%u','%s','%u','%s')",
            '',$this->intpengajuanid, $this->strnomor, $this->strnik, $this->strnominal, $this->strtanggal_spb, $this->strtanggal_proses, $this->intstatus,
			$this->strbukti_transfer, $this->cruser, $this->crdat, $this->chuser, $this->chdat);
        $this->db->query($sql);
    }

    public function editspb() {
        $sql= sprintf("UPDATE $this->tbname SET  
            nomor='%s',  
            tanggal_spb='%s',  
            nominal='%s',  
            chuser='%u', 
            chdat='%s' 
             WHERE `spbspid`='%u'",
            $this->strnomor,
            $this->strtanggal_spb,
            $this->strnominal,
            $this->chuser,
            $this->chdat,
            $this->intspbspid
        );
        $this->db->query($sql);
    }

    public function editstatusspb() {
        $sql= sprintf("UPDATE $this->tbname SET
            bukti_transfer='%s',  
            tanggal_proses='%s',  
            status='%s',  
            chuser='%u', 
            chdat='%s' 
             WHERE `spbspid`='%u'",
            $this->strbukti_transfer,
            $this->strtanggal_proses,
            $this->intstatus,
            $this->chuser,
            $this->chdat,
            $this->intspbspid
        );
        $this->db->query($sql);
    }

    function getsinglespb($id) {
        $sql = "SELECT 
                    a.*, 
                    b.nama, b.tipe_pengajuan, b.tipe_penarikan, b.jangka_waktu_insidentil, b.nominal_pinjaman_insidentil, b.topupid_insidentil
                FROM $this->tbname a
                LEFT JOIN tb_tpengajuan b ON b.pengajuanid = a.pengajuanid 
                WHERE a.spbspid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getsinglespbbypengajuan($id) {
        $sql = "SELECT * FROM $this->tbname WHERE pengajuanid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastcodespbsp(){
        $q = "SELECT SUBSTRING_INDEX(nomor, '/',1) AS last_code_spb
            FROM tb_tspbsp ORDER BY spbspid DESC 
            LIMIT 0,1";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function checkspb($spb) {
        $sql = "SELECT nomor
                FROM tb_tspbsp
                WHERE nomor LIKE '%". $spb ."%'
                AND YEAR(tanggal_spb) = YEAR(CURDATE())
                ORDER BY spbspid DESC";
        $spb = $this->db->query($sql);
        $this->db->close();
        if ($spb->num_rows() >= 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE spbspid = '". $id ."'");
    }

    public function getallbudgetsp() {
        $sql = "SELECT * FROM `tb_tbudgetsp` WHERE `status` != '9' ORDER BY `budgetspdate` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getallspbunpaid(){
        $sql = "SELECT 
                    a.*, b.nama, b.bank, b.norek, b.tipe_pengajuan, b.tipe_penarikan
                FROM `tb_tspbsp` a 
                LEFT JOIN tb_tpengajuan b ON b.pengajuanid = a.pengajuanid 
                WHERE a.`status` != '3' ORDER BY a.`spbspid` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function addgetbudgetspid() {
        $sql= sprintf("INSERT INTO `tb_tbudgetsp` VALUES ('%u','%s','%s','%s',
		'%u','%s','%u','%s')",
            '', $this->intspbspid, $this->strbudgetdate, $this->intstatusbudget,
            $this->strcruser,$this->strcrdat,'','' );
        $this->db->query($sql);
        $budgetid = $this->db->insert_id();
        return $budgetid;
    }

    public function gettodaybudgetbyid($id) {
        $sql = "SELECT `a`.`budgetspid`, `a`.`spbspid`, `a`.`budgetspdate`, `a`.`status`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`cruser`) limit 0,1) AS `cruser` , `crdat`,
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`chuser`) limit 0,1) AS `chuser`, `chdat` 
		FROM `tb_tbudgetsp` a WHERE `a`.`budgetspid`='$id'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
}