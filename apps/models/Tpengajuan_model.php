<?php defined('BASEPATH') or exit('No direct script access allowed');

/* TIPE PENGAJUAN
 * 1. anggota baru
 * 2. penarikan simpanan
 * 3. perubahan simpanan
 * 4. perubaha data
 * 5. pinjaman insidentil
 * 6. pinjaman koptel
 * 7. pinjaman Bank
 * */

/* NOMOR PENGAJUAN
 * 0001/PA/PB/01/24 (untuk anggota baru)
 * 0001/PA/PS/01/24 (untuk penarikan simpanan)
 * 0001/PA/US/01/24 (untuk perubahan simpanan)
 * 0001/PA/PD/01/24 (untuk perubahan data kaya bank, nomor rekening dan yg dibutuhkan)
 * 0001/PA/PI/01/24 (untuk pinjaman insidentil)
 * 0001/PA/PK/01/24 (untuk pinjaman KOPTEL)
 * */

/* TIPE PENARIKAN
 * 1. Saldo Tahun Lalu
 * 2. Pensiun
 * 3. Keluar
 * */


class Tpengajuan_model extends CI_Model {

    public $intpengajuanid;
    public $strnomor_pengajuan;
    public $inttipe_pengajuan;
    public $strnik;
    public $strsimpanan_pokok;
    public $intbandid;
    public $strsimpanan_sukarela;
    public $strnama;
    public $stremail;
    public $strdivision;
    public $strsegment;
    public $strlocation;
    public $inttelp;
    public $strbank;
    public $intnorek;
    public $stratas_nama;
    public $strfile_anggota_baru;
    public $inttipe_penarikan;
    public $strnominal_penarikan;
    public $strnominal_pinjaman_insidentil;
    public $strpencairan_insidentil;
    public $strtopupid_insidentil;
    public $intjangka_waktu_insidentil;
    public $strfile_pinjaman_insidentil;
    public $strnominal_pinjaman_koptel;
    public $strjangka_waktu_koptel;
    public $strfile_pinjaman_koptel;
    public $strstatus;
    public $strnotes;
    public $intplatform;
    public $strtanggal_pengajuan;
    public $cruser;
    public $crdat;
    public $chuser;
    public $chdat;


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('tpengajuan');
    }
	
	function getallpengajuan($param) {
        $where = 'WHERE 1=1';
        if(isset($param['txtNomorpengajuan']) && $param['txtNomorpengajuan'] != ''){
            $where .= " AND a.nomor_pengajuan = '".$param['txtNomorpengajuan']."' ";
        }

        if(isset($param['txtNik']) && $param['txtNik'] != ''){
            $where .= " AND a.nik = '".$param['txtNik']."' ";
        }

        if(isset($param['txtNama']) && $param['txtNama'] != ''){
            $where .= " AND a.nama LIKE '%".$param['txtNama']."%' ";
        }

        if(isset($param['optPlatform']) && $param['optPlatform'] != 'all'){
            $where .= " AND a.platform = '".$param['optPlatform']."' ";
        }

        if(isset($param['optTipepengajuan']) && $param['optTipepengajuan'] != 'all'){
            $where .= " AND a.tipe_pengajuan = '".$param['optTipepengajuan']."' ";
        }

        if(isset($param['optStatus']) && $param['optStatus'] != 'all'){
            $where .= " AND a.status = '".$param['optStatus']."' ";
        }

        if(isset($param['optBulan']) && $param['optBulan'] != 'all'){
            $where .= " AND YEAR(a.tanggal_pengajuan) = '".$param['optBulan']."' ";
        }

        if($param['optTahun'] != '0'){
            $where .= " AND YEAR(a.tanggal_pengajuan) = '".$param['optTahun']."' ";
        }

        $sql = "SELECT 
                    a.*, b.band_value 
                FROM tb_tpengajuan a
                LEFT JOIN tb_tband b ON b.bandid = a.bandid
                ". $where ." 
                ORDER BY a.pengajuanid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getsinglepengajuan($id) {
        $sql = "SELECT a.*, b.name FROM $this->tbname a LEFT JOIN tb_tanggota b ON a.nik = b.nik WHERE a.pengajuanid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getanggotabaru($nik) {
        $sql = "SELECT *  FROM tb_tpengajuan AS a 
                WHERE 
                    tipe_pengajuan = '1'
                    AND status = '1' 
                    AND nik = '". $nik ."'
                ORDER BY pengajuanid DESC LIMIT 0,1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getperubahansimpanan($id) {
        $sql = "SELECT 
                    a.pengajuanid, a.nomor_pengajuan, a.tipe_pengajuan, a.platform, 
                    a.nik, a.nama, a.bandid AS pengajuanbandid, a.simpanan_sukarela AS pengajuansimpanan_sukarela,
                    b.band_value AS pengajuanband_value,
                    c.bandid, c.name, c.simpanan_sukarela, d.band_value 
                FROM tb_tpengajuan AS a 
                LEFT JOIN tb_tband AS b ON b.bandid = a.bandid
                LEFT JOIN tb_tanggota AS c ON c.nik = a.nik
                LEFT JOIN tb_tband AS d ON c.bandid = d.bandid
                WHERE 
                    a.pengajuanid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getperubahandata($id) {
        $sql = "SELECT 
                    a.pengajuanid, a.nomor_pengajuan, a.tipe_pengajuan, a.nik, 
                    a.nama AS pnama, a.simpanan_pokok AS psimpanan_pokok, a.email AS pemail, a.division AS pdivision, a.segment AS psegment,
                    a.location AS plocation, a.telp AS ptelp, a.bank AS pbank, a.norek AS pnorek, a.atas_nama AS patas_nama,
                    b.name, b.simpanan_pokok, b.email, b.division, b.segment, b.location, b.telp, b.bank, b.norek, b.namarek
                FROM tb_tpengajuan AS a 
                LEFT JOIN tb_tanggota AS b ON b.nik = a.nik
                WHERE 
                    a.pengajuanid = '". $id ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	function getbotbyid($id) {
        $sql = "SELECT * FROM $this->tbname WHERE botid = '". $id ."' ORDER BY name ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	function getallnikaktif() {
        $sql = "SELECT nik, name FROM tb_tanggota WHERE nik != '123456' AND status = '1' ORDER BY nik ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	 
	function getallnik() { 
        $sql = "SELECT nik, name FROM tb_tanggota WHERE nik != '123456' ORDER BY nik ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	function getallband() {
        $sql = "SELECT * FROM tb_tband ORDER BY band_name ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addpengajuan() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES 
            ('%u','%u','%s','%s','%s','%u','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%u','%s','%s','%s','%s','%u','%s','%s','%s','%s','%s','%s','%u','%s','%u','%s','%u','%s')",
                '',
                $this->inttipe_pengajuan,
                $this->strnomor_pengajuan,
                $this->strnik,
                $this->strsimpanan_pokok,
                $this->intbandid,
                $this->strsimpanan_sukarela,
                $this->strnama,
                $this->stremail,
                $this->strdivision,
                $this->strsegment,
                $this->strlocation,
                $this->inttelp,
                $this->strbank,
                $this->intnorek,
                $this->stratas_nama,
                $this->strfile_anggota_baru,
                $this->inttipe_penarikan,
                $this->strnominal_penarikan,
                $this->strnominal_pinjaman_insidentil,
                $this->strpencairan_insidentil,
                $this->strtopupid_insidentil,
                $this->intjangka_waktu_insidentil,
                $this->strfile_pinjaman_insidentil,
                $this->strnominal_pinjaman_koptel,
                $this->strjangka_waktu_koptel,
                $this->strfile_pinjaman_koptel,
                $this->strstatus,
                $this->strnotes,
                $this->intplatform,
                $this->strtanggal_pengajuan,
                $this->cruser,
                $this->crdat,
                $this->chuser,
                $this->chdat
            );
        $this->db->query($sql);
    }

	public function editanggotabaru() {
        $sql= sprintf("UPDATE $this->tbname SET
            nomor_pengajuan='%s', 
            nik='%s', 
            nama='%s', 
            simpanan_pokok='%s', 
            bandid='%u', 
            simpanan_sukarela='%s',
            email='%s', 
            division='%s', 
            segment='%s', 
            location='%s', 
            telp='%s', 
            bank='%s', 
            norek='%s', 
            atas_nama='%s', 
            tanggal_pengajuan='%s', 
            chuser='%u', 
            chdat='%s' 
             WHERE `pengajuanid`='%u'",
                $this->strnomor_pengajuan,
                $this->strnik,
                $this->strnama,
                $this->strsimpanan_pokok,
                $this->intbandid,
                $this->strsimpanan_sukarela,
                $this->stremail,
                $this->strdivision,
                $this->strsegment,
                $this->strlocation,
                $this->inttelp,
                $this->strbank,
                $this->intnorek,
                $this->stratas_nama,
                $this->strtanggal_pengajuan,
                $this->chuser,
                $this->chdat,
                $this->intpengajuanid
            );
        $this->db->query($sql);
    }

	public function editpenarikan() {
        $sql= sprintf("UPDATE $this->tbname SET
            nomor_pengajuan='%s', 
            nik='%s',  
            nama='%s',  
            bank='%s', 
            norek='%s', 
            atas_nama='%s', 
            tipe_penarikan='%s', 
            nominal_penarikan='%s', 
            tanggal_pengajuan='%s', 
            chuser='%u', 
            chdat='%s' 
             WHERE `pengajuanid`='%u'",
                $this->strnomor_pengajuan,
                $this->strnik,
                $this->strnama,
                $this->strbank,
                $this->intnorek,
                $this->stratas_nama,
                $this->inttipe_penarikan,
                $this->strnominal_penarikan,
                $this->strtanggal_pengajuan,
                $this->chuser,
                $this->chdat,
                $this->intpengajuanid
            );
        $this->db->query($sql);
    }

    public function editsimpanan() {
        $sql= sprintf("UPDATE $this->tbname SET
            nomor_pengajuan='%s', 
            nik='%s',  
            nama='%s',  
            bandid='%u', 
            simpanan_sukarela='%s',
            tanggal_pengajuan='%s', 
            chuser='%u', 
            chdat='%s' 
             WHERE `pengajuanid`='%u'",
            $this->strnomor_pengajuan,
            $this->strnik,
            $this->strnama,
            $this->intbandid,
            $this->strsimpanan_sukarela,
            $this->strtanggal_pengajuan,
            $this->chuser,
            $this->chdat,
            $this->intpengajuanid
        );
        $this->db->query($sql);
    }

    public function editdataanggota() {
        $sql= sprintf("UPDATE $this->tbname SET
            nomor_pengajuan='%s', 
            nik='%s',  
            nama='%s', 
            simpanan_pokok='%s',
            email='%s', 
            division='%s', 
            segment='%s', 
            location='%s', 
            telp='%s', 
            bank='%s', 
            norek='%s', 
            atas_nama='%s', 
            tanggal_pengajuan='%s', 
            chuser='%u', 
            chdat='%s' 
             WHERE `pengajuanid`='%u'",
            $this->strnomor_pengajuan,
            $this->strnik,
            $this->strnama,
            $this->strsimpanan_pokok,
            $this->stremail,
            $this->strdivision,
            $this->strsegment,
            $this->strlocation,
            $this->inttelp,
            $this->strbank,
            $this->intnorek,
            $this->stratas_nama,
            $this->strtanggal_pengajuan,
            $this->chuser,
            $this->chdat,
            $this->intpengajuanid
        );
        $this->db->query($sql);
    }

    public function editinsidentil() {
        $sql= sprintf("UPDATE $this->tbname SET
            nomor_pengajuan='%s', 
            nik='%s', 
            nama='%s', 
            bank='%s', 
            norek='%s', 
            atas_nama='%s', 
            nominal_pinjaman_insidentil='%s', 
            jangka_waktu_insidentil='%s', 
            file_pinjaman_insidentil='%s', 
            tanggal_pengajuan='%s', 
            chuser='%u', 
            chdat='%s' 
             WHERE `pengajuanid`='%u'",
            $this->strnomor_pengajuan,
            $this->strnik,
            $this->strnama,
            $this->strbank,
            $this->intnorek,
            $this->stratas_nama,
            $this->strnominal_pinjaman_insidentil,
            $this->intjangka_waktu_insidentil,
            $this->strfile_pinjaman_insidentil,
            $this->strtanggal_pengajuan,
            $this->chuser,
            $this->chdat,
            $this->intpengajuanid
        );
        $this->db->query($sql);
    }

    public function editkoptel() {
        $sql= sprintf("UPDATE $this->tbname SET
            nomor_pengajuan='%s', 
            nik='%s', 
            nama='%s', 
            bank='%s', 
            norek='%s', 
            atas_nama='%s', 
            nominal_pinjaman_koptel='%s', 
            jangka_waktu_koptel='%s', 
            file_pinjaman_koptel='%s', 
            tanggal_pengajuan='%s', 
            chuser='%u', 
            chdat='%s' 
             WHERE `pengajuanid`='%u'",
            $this->strnomor_pengajuan,
            $this->strnik,
            $this->strnama,
            $this->strbank,
            $this->intnorek,
            $this->stratas_nama,
            $this->strnominal_pinjaman_koptel,
            $this->strjangka_waktu_koptel,
            $this->strfile_pinjaman_koptel,
            $this->strtanggal_pengajuan,
            $this->chuser,
            $this->chdat,
            $this->intpengajuanid
        );
        $this->db->query($sql);
    }

    public function editstatus() {
        $sql= sprintf("UPDATE $this->tbname SET
            status='%s',  
            chuser='%u', 
            chdat='%s' 
             WHERE `pengajuanid`='%u'",
            $this->strstatus,
            $this->chuser,
            $this->chdat,
            $this->intpengajuanid
        );
        $this->db->query($sql);
    }

    public function editstatusperubahansimpanan() {
        $sql= sprintf("UPDATE $this->tbname SET
            status='%s',  
            notes='%s',  
            chuser='%u', 
            chdat='%s' 
             WHERE `pengajuanid`='%u'",
            $this->strstatus,
            $this->strnotes,
            $this->chuser,
            $this->chdat,
            $this->intpengajuanid
        );
        $this->db->query($sql);
    }

    public function delete($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE pengajuanid = '". $id ."'");
    }

    function getlastpengajuan(){
        $sql = "SELECT 
                    pengajuanid, nomor_pengajuan,
                    SUBSTRING_INDEX(nomor_pengajuan, '/',1) AS lastnum 
                FROM tb_tpengajuan 
                WHERE 
                    YEAR(tanggal_pengajuan) = YEAR(CURDATE()) 
                ORDER BY pengajuanid DESC
                LIMIT 1";
        $res = $this->db->query($sql);
        $data = $res->result_array();
        $this->db->close();

        return $data;
    }
}