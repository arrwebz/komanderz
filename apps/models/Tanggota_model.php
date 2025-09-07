<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tanggota_model extends CI_Model {

    public $intanggotaid;
    public $strnik;
    public $strsapaan;
    public $strname;
    public $strdivision;
    public $strsegment;
    public $intbandid;
    public $strsimpanan_pokok;
    public $strsimpanan_sukarela;
    public $stremail_corp;
    public $stremail;
    public $strpassword;
    public $strtelp;
    public $strlocation;
    public $strbank;
    public $strnorek;
    public $strnamarek;
    public $strjoinmonth;
    public $strjoinyear;
    public $inttipe_anggota;
    public $strstatus;
    public $strnotes;
    public $strtoken_firebase;
    public $cruser;
    public $crdat;
    public $chuser;
    public $chdat;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = 'tb_tanggota';
    }
	
	function getallanggota($param) {
        $where = "WHERE 1=1 AND NIK != '123456' ";
        if($param['txtNik'] != ''){
            $where .= " AND nik = '".$param['txtNik']."'";
        }

        if($param['txtName'] != ''){
            $where .= " AND name LIKE '%".$param['txtName']."%'";
        }

        if($param['txtEmail'] != ''){
            $where .= " AND (email = '".$param['txtEmail']."' OR email_corp = '".$param['txtEmail']."')";
        }

        if($param['optStatus'] != 'all'){
            $where .= " AND status = '".$param['optStatus']."'";
        }

        if($param['optTipeanggota'] != 'all'){
            $where .= " AND tipe_anggota = '".$param['optTipeanggota']."'";
        }

        if($param['optBandid'] != 'all'){
            $where .= " AND bandid = '".$param['bandid']."'";
        }

        $sql = "SELECT * FROM vw_anggota ".$where." ORDER BY nik ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getsingleanggota($id) {
        $sql = "SELECT * FROM vw_anggota WHERE nik = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	function getanggotaaktif($id) {
        $sql = "SELECT * FROM vw_anggota WHERE nik = '". $id ."' AND status != '2'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	function gettipeanggotaaktif($id) {
        $sql = "SELECT * FROM vw_anggota WHERE nik = '". $id ."' AND tipe_anggota = '1' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function editsimpanansukarela() {
        $sql= sprintf("UPDATE $this->tbname SET
            bandid='%s',  
            simpanan_sukarela='%s',  
            chuser='%u', 
            chdat='%s' 
             WHERE `nik`='%u'",
            $this->intbandid,
            $this->strsimpanan_sukarela,
            $this->chuser,
            $this->chdat,
            $this->strnik
            );
        $this->db->query($sql);
    }

    public function adddata() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES 
            ('%u','%s','%s','%s','%s','%s','%u','%s','%s','%s','%s','%s','%s','%s','%s', '%s','%s','%s','%s','%u','%u','%s','%s','%s','%s','%u','%s','%u','%u','%s','%u','%s')",
            '',
            $this->strnik,
            $this->strsapaan,
            $this->strname,
            $this->strdivision,
            $this->strsegment,
            $this->intbandid,
            $this->strsimpanan_pokok,
            $this->strsimpanan_sukarela,
            $this->stremail_corp,
            $this->stremail,
            $this->strpassword,
            $this->strtelp,
            $this->strlocation,
            $this->strbank,
            $this->strnorek,
            $this->strnamarek,
            $this->strjoinmonth,
            $this->strjoinyear,
            $this->inttipe_anggota,
            $this->strstatus,
            $this->strnotes,
            $this->strtoken_firebase,
            '',
            '',
            '',
            '',
            '',
            $this->cruser,
            $this->crdat,
            $this->chuser,
            $this->chdat
        );
        $this->db->query($sql);
    }

	public function editdata() {
        $sql= sprintf("UPDATE $this->tbname SET
            `name`='%s',    
            simpanan_pokok='%s',  
            email='%s',
            division='%s',  
            segment='%s', 
            location='%s', 
            telp='%s', 
            bank='%s', 
            norek='%s', 
            namarek='%s', 
            chuser='%u', 
            chdat='%s' 
             WHERE `nik`='%u'",
            $this->strname,
            $this->strsimpanan_pokok,
            $this->stremail,
            $this->strdivision,
            $this->strsegment,
            $this->strlocation,
            $this->strtelp,
            $this->strbank,
            $this->strnorek,
            $this->strnamarek,
            $this->chuser,
            $this->chdat,
            $this->strnik
            );
        $this->db->query($sql);
    }

    public function editstatus() {
        $sql= sprintf("UPDATE $this->tbname SET
            status='%s',  
            notes='%s',  
            chuser='%u', 
            chdat='%s' 
             WHERE `nik`='%u'",
            $this->strstatus,
            $this->strnotes,
            $this->chuser,
            $this->chdat,
            $this->strnik
        );
        $this->db->query($sql);
    }
}