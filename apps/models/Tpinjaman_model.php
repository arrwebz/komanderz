<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tpinjaman_model extends CI_Model {

    public $intpinjamanid;
    public $intpengajuanid;
    public $inttipepinjaman;
    public $intspbspid;
    public $strnik;
    public $strnominal_pinjaman;
    public $strpencairan;
    public $strjangkawaktu;
    public $strmulai;
    public $strberakhir;
    public $intstatus;
    public $inttopupid;
    public $cruser;
    public $crdat;
    public $chuser;
    public $chdat;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = 'tb_tpinjaman';
    }

    function getallpinjaman($param) {
        $where = 'WHERE 1=1';
        if(isset($param['txtNomorpengajuan']) && $param['txtNomorpengajuan'] != ''){
            $where .= " AND LEFT(c.nomor,4) = '".$param['txtNomorspb']."' ";
        }

        if(isset($param['txtNomorspb']) && $param['txtNomorspb'] != ''){
            $where .= " AND LEFT(b.nomor,4) = '".$param['txtNomorspb']."' ";
        }

        if(isset($param['txtNik']) && $param['txtNik'] != ''){
            $where .= " AND c.nik = '".$param['txtNik']."' ";
        }

        if(isset($param['optBulan'])){
            $where .= " AND MONTH(b.tanggal_proses) = '".$param['optBulan']."' ";
        }

        if(isset($param['optTahun'])){
            if($param['optTahun'] != 'all'){
                $where .= " AND YEAR(b.tanggal_proses) = '".$param['optTahun']."' ";
            }
        }

        $sql = "SELECT 
                    a.*,
                    b.spbspid, b.nomor AS nomor_spb, b.tanggal_spb, b.tanggal_proses, b.bukti_transfer,
                    c.pengajuanid, c.nomor_pengajuan, 
                    IF(c.pengajuanid IS NULL,(SELECT nik FROM tb_tanggota WHERE nik = a.nik),c.nik) as nik,
                    IF(c.pengajuanid IS NULL,(SELECT name FROM tb_tanggota WHERE nik = a.nik),c.nama) as nama, 
                    c.tipe_pengajuan, c.bank, c.norek, c.atas_nama
                FROM tb_tpinjaman AS a
                LEFT JOIN tb_tspbsp AS b ON b.spbspid = a.spbspid 
                LEFT JOIN tb_tpengajuan AS c ON c.pengajuanid = a.pengajuanid 
                    ".$where."
                ORDER BY a.pinjamanid DESC";
        $stmt = $this->db->query($sql);
        $this->db->close();
        return $stmt->result_array();
    }

    function getinsidentilaktif($nik) {
        $sql = "SELECT 
                    a.*, b.name
                FROM tb_tpinjaman a 
                LEFT JOIN tb_tanggota b ON b.nik = a.nik
                WHERE 
                    a.nik = '". $nik ."'
                    AND a.status = '1'
                    AND a.tipe_pinjaman = '5'";
        $stmt = $this->db->query($sql);
        $this->db->close();
        return $stmt->result_array();
    }

    function getsinglepinjaman($pinjamanid) {
        $sql = "SELECT 
                    a.*, b.name
                FROM tb_tpinjaman a 
                LEFT JOIN tb_tanggota b ON b.nik = a.nik
                WHERE 
                    a.pinjamanid = '". $pinjamanid ."'
                    AND a.status = '1'
                    AND a.tipe_pinjaman = '5'";
        $stmt = $this->db->query($sql);
        $this->db->close();
        return $stmt->result_array();
    }

    function getinsidentilberakhir($nik, $bulan, $tahun) {
        $sql = "SELECT
                    * 
                FROM tb_tpinjaman 
                WHERE
                tipe_pinjaman = '5'  
                AND status = '1' 
                AND nik = '". $nik ."'
                AND MONTH(berakhir) = '". $bulan ."'
                AND YEAR(berakhir) = '". $tahun ."'";
        $stmt = $this->db->query($sql);
        $this->db->close();
        return $stmt->result_array();
    }

    public function addpinjaman() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%u','%s','%s','%s','%s','%s','%s','%u','%u','%u','%s','%u','%s')",
            '',$this->intpengajuanid, $this->inttipepinjaman, $this->intspbspid, $this->strnik,
            $this->strnominal_pinjaman, $this->strpencairan, $this->strjangkawaktu, $this->strmulai, $this->strberakhir, $this->intstatus, $this->inttopupid,
            $this->cruser, $this->crdat, $this->chuser, $this->chdat);
        $this->db->query($sql);
        $this->db->close();
    }

    public function updatelunastopup() {
        $sql= sprintf("UPDATE tb_tpinjaman SET
            status='%s',  
            chuser='%u', 
            chdat='%s' 
             WHERE `pinjamanid`='%u'",
            '2',
            $this->chuser,
            $this->chdat,
            $this->intpinjamanid
        );
        $this->db->query($sql);
        $this->db->close();
    }

    public function updatelunaspayroll($pinjamanid) {
        $cruser = $this->session->userdata('userid');
        $crdat = date('Y-m-d H:i:s');

        $sql= sprintf("UPDATE tb_tpinjaman SET
            status='2',  
            chuser='". $cruser ."', 
            chdat='". $crdat ."' 
            WHERE `pinjamanid`='". $pinjamanid ."'"
        );
        $this->db->query($sql);
        $this->db->close();
    }
}