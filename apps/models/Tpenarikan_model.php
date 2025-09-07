<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tpenarikan_model extends CI_Model {

    public $intpenarikanid;
    public $intpengajuanid;
    public $intspbspid;
    public $strnik;
    public $strnominal_penarikan;
    public $cruser;
    public $crdat;
    public $chuser;
    public $chdat;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = 'tb_tpenarikan';
    }

    function getallpenarikan($param) {
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
            $where .= " AND YEAR(b.tanggal_proses) = '".$param['optTahun']."' ";
        }

        $sql = "SELECT 
                    a.penarikanid, a.nominal_penarikan,
                    b.spbspid, b.nomor AS nomor_spb, b.tanggal_spb, b.tanggal_proses, b.bukti_transfer,
                    c.pengajuanid, c.nomor_pengajuan, c.nik, c.nama, c.tipe_penarikan, c.bank, c.norek, c.atas_nama
                FROM tb_tpenarikan AS a
                LEFT JOIN tb_tspbsp AS b ON b.spbspid = a.spbspid 
                LEFT JOIN tb_tpengajuan AS c ON c.pengajuanid = a.pengajuanid 
                    ".$where."
                ORDER BY a.penarikanid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
		
	public function addpenarikan() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%s','%s','%s','%s','%s','%u','%s')",
            '',$this->intpengajuanid, $this->intspbspid, $this->strnik, $this->strnominal_penarikan, $this->cruser, $this->crdat, $this->chuser, $this->chdat);
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
}