<?php defined('BASEPATH') or exit('No direct script access allowed');

class Softsubs_model extends CI_Model {

    public $intsoftsubs;
    public $strproductname;
    public $strorderby;
    public $struser;
    public $stremail;
    public $strpass;
    public $strnolis;
    public $strcur;
    public $strval;
    public $inttypeofpay;
    public $strpayname;
    public $strcardnum;
    public $strtypesubs;
    public $strstartsubs;
    public $strendsubs;
    public $strreminder;
    public $strcrdat;

    private $tbname;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('softsubs');
    }

	public function getallsoftsubs() {
        $sql = "SELECT a.*, b.fullname
                FROM $this->tbname AS a 
                LEFT JOIN tb_user AS b ON b.userid = a.orderby
                ORDER BY a.softsubsid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsinglesoftsubs($intsoftsubs) {
        $sql = "SELECT * FROM $this->tbname WHERE softsubsid = '$intsoftsubs' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

	public function addsoftsubs() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%s','%u','%s','%s','%s','%s','%s','%s','%u','%s','%s','%s','%s','%u','%s','%s')",
            '', $this->strproductname,$this->strorderby, $this->struser, $this->stremail, $this->strpass,
            $this->strnolis, $this->strcur, $this->strval, $this->inttypeofpay, $this->strpayname, $this->strcardnum,
            $this->strstartsubs, $this->strendsubs, $this->strtypesubs, $this->strreminder, $this->strcrdat);
        $this->db->query($sql);
    }

    public function editsoftsubs() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`productname`='%s', 
		`orderby`='%u', 
		`user`='%s', 
		`email`='%s',
		`password`='%s', 
		`nolis`='%s',
		`currency`='%s',
		`softsubsvalue`='%s',
		`typeofpayment`='%s', 
		`paymentname`='%s',
		`cardnumber`='%s', 
		`typesubs`='%s', 
		`reminder`='%s', 
		`startsubs`='%s',
		`endsubs`='%s'
		WHERE 
		softsubsid='%u'",
            $this->strproductname, $this->strorderby, $this->struser, $this->stremail,
            $this->strpass,$this->strnolis,$this->strcur,$this->strval,
            $this->inttypeofpay,$this->strpayname,$this->strcardnum,
            $this->strtypesubs,$this->strreminder,$this->strstartsubs,$this->strendsubs,$this->intsoftsubs
            );
        $this->db->query($sql);
    }

    public function deletesoftsubs($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE softsubsid = '". $id ."'");
    }

    public function getuser($userid){
        $sql = "SELECT * FROM tb_user WHERE userid IN($userid)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
}