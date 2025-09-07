<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sewakendaraan_model extends CI_Model {

    public $intsewakendaraanid;
    public $strpic;
    public $strsegmen;
    public $strnopolisi;
    public $stralamat;
    public $strnokontrak;
    public $strkendaraan;
    public $strtahun;
    public $strjangkawaktu;
    public $strstartkontrak;
    public $strendkontrak;
    public $strbiaya;
    public $strketerangan;
    public $intinvoiceid;
    public $strdraftkontrak;
    public $strbastkontrak;
    public $strcrdat;

    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('sewakendaraan');
    }

	public function getallsewakendaraan() {
        $sql = "SELECT * FROM $this->tbname ORDER BY sewakendaraanid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsinglesewakendaraan($intsewakendaraanid) {
        $sql = "SELECT * FROM $this->tbname WHERE sewakendaraanid = '$intsewakendaraanid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addsewakendaraan() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
            '', $this->strpic,$this->strsegmen, $this->strnopolisi, $this->stralamat, $this->strnokontrak,
            $this->strkendaraan, $this->strtahun, $this->strjangkawaktu, $this->strstartkontrak, $this->strendkontrak,
            $this->strbiaya, $this->strketerangan,'','','', $this->strcrdat);
        $this->db->query($sql);
    }

    public function editsewakendaraan() {
        $sql = sprintf("UPDATE $this->tbname SET 
            `pic`='%s', 
            `segmen`='%s', 
            `no_polisi`='%s', 
            `alamat`='%s',
            `no_kontrak`='%s', 
            `kendaraan`='%s',
            `tahun`='%s',
            `jangka_waktu`='%s',
            `start_kontrak`='%s', 
            `end_kontrak`='%s',
            `biaya`='%s', 
            `keterangan`='%s'
		WHERE 
		sewakendaraanid='%u'",
            $this->strpic, $this->strsegmen, $this->strnopolisi, $this->stralamat,
            $this->strnokontrak,$this->strkendaraan,$this->strtahun,$this->strjangkawaktu,
            $this->strstartkontrak,$this->strendkontrak,$this->strbiaya,
            $this->strketerangan,$this->intsewakendaraanid
        );
        $this->db->query($sql);
    }

    public function updatedraftktk() {
        $sql = sprintf("UPDATE $this->tbname SET 
            `draftkontrak`='%s'
		WHERE 
		sewakendaraanid='%u'",
            $this->strdraftkontrak,$this->intsewakendaraanid
        );
        $this->db->query($sql);
    }

    public function updatebastktk() {
        $sql = sprintf("UPDATE $this->tbname SET 
            `bastkontrak`='%s'
		WHERE 
		sewakendaraanid='%u'",
            $this->strbastkontrak,$this->intsewakendaraanid
        );
        $this->db->query($sql);
    }

    public function deletesewakendaraan($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE sewakendaraanid = '". $id ."'");
    }

    function getinvterkait($inv){
        $sql = "SELECT a.*, b.name AS segment FROM tb_order a 
                LEFT JOIN tb_segment b ON b.segmentid = a.segment 
                WHERE orderid IN (". $inv .")";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getalltermininvkomet() {
        $sql = "SELECT * FROM `vw_order` WHERE jobtype = 'SM' ORDER BY `invdate` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function updatetermin() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`inv`='%s'
		WHERE 
		sewakendaraanid='%u'",
            $this->intinvoiceid,$this->intsewakendaraanid
        );
        $this->db->query($sql);
    }
}