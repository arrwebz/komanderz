<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_model extends CI_Model {

    /* STATUS ORDER
     * 1. Cair/closed
     * 2. Segmen
     * 3. PJM
     * 4. ASD
     * 5. Logistik
     * 6. Keuangan
     * 7. Legal
     * 8. Posting
     * 9. Batal
     * 10. Forecasts
     * 11. Materai
     * 12. Signed
     * 13. Segmen
     * 14. PJM
     * 15. ASD
     * 16. Logistik
     * 17. Legal
     * 18. Keuangan
     * */

    /* NEW STATUS ORDER
     * 0. terkirim/accurate.
     * 1. Cair/closed.
     * 2. segmen.
     * 3. invidea.
     * 4. precise.
     * 5. Revisi.
     * 6. Percepatan.
     * 7. Legal.
     * 8. DOC HILANG
     * 10. Forecasting.
     * 11. NPK
     * 16. pps.
     * 18. keuangan.
     * */

    //kode arsip
    public $intorderid;
    public $intspbid;
    public $intorderinv;
    public $strstatorder;
    public $strcode;
    public $intnvnum;
    public $intfaknum;

    public $strinvdat;
    public $strsentdat;
    //informasi pelanggan
    public $strunit;
    public $strjobtype;
    public $strdivision;
    public $strsegment;
    public $stramuser;
    public $stramkomet;
    public $strprojectname;
    //spk
    public $strspknum;
    public $strspkindat;
    public $strspkdat;
    //harga
    public $intbasevalue;
    public $intppnvalue;
    public $intnetvalue;
    public $intjstvalue;
    public $intnegovalue;

    public $strfiles;
    //voucher
    public $intstatinv;
    public $strfrom;
    public $strprocdat;
    public $strvrecnum;
    public $intpphvalue;
    public $intvrecvalue;

    //termin
    public $intterminid;
    public $intprpoid;
    public $intinvoiceid;

    public $strcruser;
    public $strcrdat;
    public $strchuser;
    public $strchdat;
    private $tbname;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tbname = $this->db->dbprefix('order');
    }

    //cek ajax inv
	public function checkinvoice($inv,$unit) {
		$sql = "SELECT * FROM `vw_order` WHERE `invnum` = '$inv' AND `unit` = '$unit' AND YEAR(`invdate`) = YEAR(CURDATE()) LIMIT 0,1";
		$stmt = $this->db->query($sql);
		if ($stmt->num_rows() == 1) {
			return TRUE;
		}
        return FALSE;
	}

	public function checkinvoicekp($inv) {
		$sql = "SELECT * FROM `vw_order` WHERE `invnum` = '$inv' AND `unit` != 'MESRA' AND YEAR(`invdate`) = YEAR(CURDATE()) LIMIT 0,1";
		$stmt = $this->db->query($sql);
		if ($stmt->num_rows() == 1) {
			return TRUE;
		}
        return FALSE;
	}

	public function checkspb($spb) {
		$sql = "SELECT a.code
                FROM tb_spb AS a
                LEFT JOIN tb_order AS b ON b.orderid = a.orderid
                WHERE 
                b.unit != 'MESRA'
                AND a.code LIKE '%". $spb ."%'
                AND YEAR(a.spbdat) = YEAR(CURDATE())
                ORDER BY a.spbid DESC";
		$spb = $this->db->query($sql);
		$this->db->close();
		if ($spb->num_rows() >= 1) {
			return TRUE;
		}
        return FALSE;
	}
	
	public function getallinvoice() {
		$sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,`a`.`file`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		(select `z`.`name` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segmentname`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`, `a`.`status`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1'
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`invnum` DESC LIMIT 0,50 ";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
	public function getsingleinvoice($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderid`='25293' ";
        $stmt = $this->db->query($sql);
        echo '<pre>'; print_r($stmt); exit;
        return $stmt->result_array();
    }
	
	public function generate_invoice_code() {
        // Format nomor invoice bisa diatur sesuai kebutuhan
        $date = date('ymdhi'); // Gunakan format tanggal (contoh: 20230816)
        
        // Ambil nomor invoice terakhir dari tabel
        $this->db->select('code'); 
        $this->db->order_by('orderid', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_order');
        
        if ($query->num_rows() > 0) {
            $last_code = $query->row();
            $last_code_number = $last_code->code;
            
            // Ambil nomor terakhir dan tambahkan satu
            $last_number = substr($last_code_number, -4); // Misal 0001
            $new_number = (int)$last_number + 1;
            $new_number = str_pad($new_number, 4, '0', STR_PAD_LEFT); // Pastikan panjang tetap 4 digit
        } else {
            // Jika tidak ada invoice sebelumnya, mulai dari 0001
            $new_number = '0001';
        }
        
        // Gabungkan format tanggal dengan nomor baru
        $code_number = $date . $new_number;
        
        return $code_number;
    }
	
	public function generate_invoice_number() {        
        // Ambil nomor invoice terakhir dari tabel
        $this->db->select('invnum');
        $this->db->order_by('orderid', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_order');
        
        if ($query->num_rows() > 0) {
            $last_invoice = $query->row();
            $last_invoice_number = $last_invoice->invnum;
            
            // Ambil nomor terakhir dan tambahkan satu
            $last_number = substr($last_invoice_number, -4); // Misal 0001
            $new_number = (int)$last_number + 1;
            $new_number = str_pad($new_number, 4, '0', STR_PAD_LEFT); // Pastikan panjang tetap 4 digit
        } else {
            // Jika tidak ada invoice sebelumnya, mulai dari 0001
            $new_number = '0001';
        }
        
        // Gabungkan format tanggal dengan nomor baru
        $invoice_number = $new_number;
        
        return $invoice_number;
    }

    public function addinvoice() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s',
		'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
		'%u','%s','%s','%s','%s', 
		'%u','%s','%u','%s')",
            '',$this->intspbid,$this->intorderinv,$this->strstatorder,$this->strcode,$this->intnvnum,$this->intfaknum, $this->strinvdat,
				$this->strunit, $this->strjobtype, $this->strdivision, $this->strsegment, $this->stramuser,
				$this->stramkomet, $this->strprojectname, $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
				$this->intbasevalue, $this->intppnvalue,$this->intpphvalue, $this->intnetvalue, $this->intjstvalue, $this->intnegovalue, $this->strfiles,
				$this->intstatinv, $this->strvrecnum, $this->strfrom, $this->strprocdat,$this->intvrecvalue,
			$this->strcruser,$this->strcrdat,'','' );
		$this->db->query($sql);

        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

	public function addinvoiceitem() {
        $sql= sprintf("INSERT INTO tb_orderitem VALUES ('%u','%u','%s','%u','%s','%s','%s')",
            '',$this->intorderid,$this->strorderitemdescription,$this->strorderitemqty,$this->strorderitemunit,$this->strorderitemprice, $this->strorderitemtotal);
        //echo '<pre>';print_r($sql); exit;
		$this->db->query($sql);
    }
	
	public function getiteminvoice($id) {
        $sql = "SELECT * FROM `tb_orderitem` WHERE `orderid` = '$id'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //new table order nopes
    //AND crdat = '2019'
    public function getallnopes() {
        $sql = "SELECT * FROM `vw_order` WHERE `orderinv`='1' ORDER BY `code` DESC LIMIT 0,50";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallnopesbyam($username) {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderinv`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`, 
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`amkomet` = '$username'
            AND `a`.`procdat` = '0000-00-00' AND  `a`.`status` != '9'
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` ASC LIMIT 0,50 ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallprpobyam($username) {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderinv`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`, 
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`
			FROM $this->tbname `a` WHERE `a`.`orderstatus`='PRPO' AND `a`.`amkomet` = '$username'
            AND `a`.`procdat` = '0000-00-00' AND  `a`.`status` != '9' ORDER BY `a`.`code` ASC LIMIT 0,50 ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallorder() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`, `a`.`file`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`, `a`.`status`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1'
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` DESC LIMIT 0,50 ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallnopeskomet() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`, `a`.`status`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`unit`='KOMET' 
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` DESC LIMIT 0,50 ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallnopesmesra() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`, `a`.`status`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`unit`='MESRA' 
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` DESC LIMIT 0,50";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallnopespadi() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`, `a`.`file`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`, `a`.`status`
			FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`unit`='PADI' 
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`code` DESC LIMIT 0,50";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsearchnopes($unit="",$segmen="",$invmonth="",$invyear="",$invnum="",$tipeodr="",$spk="",$spb="") {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`, `a`.`file`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`,
		`a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`,
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat`
		FROM $this->tbname `a` WHERE `a`.`orderinv`='1'";
        if ($unit != "") {
            $sql .= " AND `a`.`unit`='$unit'";
        }
        if ($segmen != "") {
            $sql .= " AND `a`.`segment`='$segmen'";
        }
        if ($invmonth != "") {
            $sql .= " AND MONTH(`a`.`invdate`) = '$invmonth'";
        }
        if ($invyear != "") {
            $sql .= " AND YEAR(`a`.`invdate`) = '$invyear'";
        }
        if ($invnum != "") {
            $sql .= " AND `a`.`invnum` = '$invnum'";
        }
        if ($tipeodr != "") {
            $sql .= " AND `a`.`orderstatus` = '$tipeodr'";
        }
        if ($spk!= "") {
            $sql .= " AND `a`.`spknum` = '$spk'";
        }
        if ($spb!= "") {
            $sql .= " AND `a`.`spbid` = '$spb'";
        }
        $sql .=" ORDER BY `a`.`code` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsearchpadi($unit="",$segmen="",$invmonth="",$invyear="",$invnum="",$tipeodr="",$spk="",$spb="") {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`, `a`.`file`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`,
		`a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`,
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat` 
		FROM $this->tbname `a` WHERE `a`.`orderinv`='1' AND `a`.`jobtype` != 'TK' AND `a`.`jobtype` != 'SM' AND `a`.`jobtype` != 'HT' AND `a`.`status` != '9'";
        if ($unit != "") {
            $sql .= " AND `a`.`unit`='$unit'";
        }
        if ($segmen != "") {
            $sql .= " AND `a`.`segment`='$segmen'";
        }
        if ($invmonth != "") {
            $sql .= " AND MONTH(`a`.`invdate`) = '$invmonth'";
        }
        if ($invyear != "") {
            $sql .= " AND YEAR(`a`.`invdate`) = '$invyear'";
        }
        if ($invnum != "") {
            $sql .= " AND `a`.`invnum` = '$invnum'";
        }
        if ($tipeodr != "") {
            $sql .= " AND `a`.`orderstatus` = '$tipeodr'";
        }
        if ($spk!= "") {
            $sql .= " AND `a`.`spknum` = '$spk'";
        }
        if ($spb!= "") {
            $sql .= " AND `a`.`spbid` = '$spb'";
        }
        $sql .=" ORDER BY `a`.`code` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsingleditnopes($id) {
        $sql = "SELECT `orderid`, `spbid`, `orderstatus`, `code`, `invnum`, `faknum`, `invdate`, `unit`, `jobtype`, `division`, `segment`, `amuser`, `amkomet`, `projectname`, `sentdate`, `spknum`, `spkindat`, `spkdat`, `basevalue`, `ppnvalue`, `netvalue`, `negovalue`, `file`, `status`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE orderid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsinglenopes($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmultinopes($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderid` IN ($id) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function addnopes() {
        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s',
		'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
		'%u','%s','%s','%s','%s', 
		'%u','%s','%u','%s')",
            '',$this->intspbid,$this->intorderinv,$this->strstatorder,$this->strcode,$this->intnvnum,$this->intfaknum, $this->strinvdat,
            $this->strunit, $this->strjobtype, $this->strdivision, $this->strsegment, $this->stramuser,
            $this->stramkomet, $this->strprojectname, $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
            $this->intbasevalue, $this->intppnvalue,$this->intpphvalue, $this->intnetvalue, $this->intjstvalue, $this->intnegovalue, $this->strfiles,
            $this->intstatinv, $this->strvrecnum, $this->strfrom, $this->strprocdat,$this->intvrecvalue,
            $this->strcruser,$this->strcrdat,'','' );
        $this->db->query($sql);
    }

    public function editnopes(){
        if($_POST['optStatinv'] == 'Pilih'){
            if(!empty($_FILES['txtFile']['name'])) {
                $sql = sprintf("UPDATE $this->tbname SET 
                `code`='%s', `invnum`='%s', `faknum`='%s', `invdate`='%s', `unit`='%s', `jobtype`='%s',
                `division`='%s', `segment`='%s', `amuser`='%s', `amkomet`='%s', `projectname`='%s',
                `sentdate`='%s', `spknum`='%s', `spkindat`='%s', `spkdat`='%s',
                `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s', `file`='%s',
                `chuser`='%u', `chdat`='%s' WHERE orderid='%u'",
                    $this->strcode, $this->intnvnum, $this->intfaknum, $this->strinvdat, $this->strunit, $this->strjobtype,
                    $this->strdivision, $this->strsegment, $this->stramuser, $this->stramkomet, $this->strprojectname,
                    $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
                    $this->intbasevalue, $this->intppnvalue, $this->intnetvalue, $this->strfiles,
                    $this->strchuser,$this->strchdat,$this->intorderid);
            }else{
                $sql = sprintf("UPDATE $this->tbname SET 
                `orderstatus`='%s', `code`='%s', `invnum`='%s', `faknum`='%s', `invdate`='%s', `unit`='%s', `jobtype`='%s',
                `division`='%s', `segment`='%s', `amuser`='%s', `amkomet`='%s', `projectname`='%s',
                `sentdate`='%s', `spknum`='%s', `spkindat`='%s', `spkdat`='%s',
                `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s',
                `chuser`='%u', `chdat`='%s' WHERE orderid='%u'",
                    $this->strstatorder, $this->strcode, $this->intnvnum, $this->intfaknum, $this->strinvdat, $this->strunit, $this->strjobtype,
                    $this->strdivision, $this->strsegment, $this->stramuser, $this->stramkomet, $this->strprojectname,
                    $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
                    $this->intbasevalue, $this->intppnvalue, $this->intnetvalue,
                    $this->strchuser,$this->strchdat,$this->intorderid);
            }
        }else{
            if(!empty($_FILES['txtFile']['name'])) {
                $sql = sprintf("UPDATE $this->tbname SET 
                `code`='%s', `invnum`='%s', `faknum`='%s', `invdate`='%s', `unit`='%s', `jobtype`='%s',
                `division`='%s', `segment`='%s', `amuser`='%s', `amkomet`='%s', `projectname`='%s',
                `sentdate`='%s', `spknum`='%s', `spkindat`='%s', `spkdat`='%s',
                `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s', `status`='%u', `file`='%s',
                `chuser`='%u', `chdat`='%s' WHERE orderid='%u'",
                    $this->strcode, $this->intnvnum, $this->intfaknum, $this->strinvdat, $this->strunit, $this->strjobtype,
                    $this->strdivision, $this->strsegment, $this->stramuser, $this->stramkomet, $this->strprojectname,
                    $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
                    $this->intbasevalue, $this->intppnvalue, $this->intnetvalue,  $this->intstatinv, $this->strfiles,
                    $this->strchuser,$this->strchdat,$this->intorderid);
            }else{
                $sql = sprintf("UPDATE $this->tbname SET 
                `orderstatus`='%s', `code`='%s', `invnum`='%s', `faknum`='%s', `invdate`='%s', `unit`='%s', `jobtype`='%s',
                `division`='%s', `segment`='%s', `amuser`='%s', `amkomet`='%s', `projectname`='%s',
                `sentdate`='%s', `spknum`='%s', `spkindat`='%s', `spkdat`='%s',
                `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s', `status`='%u',
                `chuser`='%u', `chdat`='%s' WHERE orderid='%u'",
                    $this->strstatorder, $this->strcode, $this->intnvnum, $this->intfaknum, $this->strinvdat, $this->strunit, $this->strjobtype,
                    $this->strdivision, $this->strsegment, $this->stramuser, $this->stramkomet, $this->strprojectname,
                    $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
                    $this->intbasevalue, $this->intppnvalue, $this->intnetvalue, $this->intstatinv,
                    $this->strchuser,$this->strchdat,$this->intorderid);
            }
        }
        $this->db->query($sql);
    }

    public function updatetotalspb(){
        $sql = sprintf("UPDATE $this->tbname SET 
		 `spbid`='%u' WHERE orderid='%u'",
            $this->intspbid,$this->intorderid);
        /* echo '<pre>';
        print_r($sql); exit; */
        $this->db->query($sql);
    }



    //new table PRPO
    public function getallprpo() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`, `a`.`division`, `a`.`segment`, `a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`file`, 
        (select COALESCE(`z`.`total_spb`, 0) from `vw_spb_panjar` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `totalspb`
			FROM $this->tbname `a` WHERE `a`.`orderstatus`= 'PRPO' ORDER BY `a`.`orderid` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function downloadprpo() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`, 
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`file`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
		(select COALESCE(`z`.`total_spb`, 0) from `vw_spb_panjar` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `totalspb`
			FROM $this->tbname `a` WHERE `a`.`orderstatus`= 'PRPO' AND `a`.`unit`='KOMET' 
			AND YEAR(`a`.`crdat`) >= '2020'
			ORDER BY `a`.`code` DESC"; 
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
    
   /* public function downloadprpo() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`, 
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`status`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`,
		(select sum(`z`.`value`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `spbvalue`,
		(select `z`.`position` from `tb_billco` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `position`, 
		(select `z`.`collectdate` from `tb_billco` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `collectdate`, 
		(select `z`.`notes` from `tb_billco` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `notes`
			FROM `tb_order` `a` WHERE `a`.`orderstatus`= 'PRPO' AND `a`.`unit`='KOMET' 
			AND YEAR(`a`.`crdat`) BETWEEN '2021' AND '2024' ORDER BY `a`.`code` DESC"; 
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } */

    public function getallprpokomet() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`, 
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`file`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
		(select COALESCE(`z`.`total_spb`, 0) from `vw_spb_panjar` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `totalspb`
			FROM $this->tbname `a` WHERE `a`.`orderstatus`= 'PRPO' AND `a`.`unit`='KOMET' 
			AND YEAR(`a`.`crdat`) >= '2020'
			ORDER BY `a`.`orderid` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallprpomesra() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`file`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
			(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`
		FROM $this->tbname `a` WHERE `a`.`orderstatus`= 'PRPO' AND `a`.`unit`='MESRA' ORDER BY `a`.`code` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallprpopadi() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`jstvalue`, `a`.`negovalue`, `a`.`file`, DATEDIFF(CURDATE(),`a`.`crdat`) AS `intervaldat`,
			(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`
		FROM $this->tbname `a` WHERE `a`.`orderstatus`= 'PRPO' AND `a`.`unit`='PADI' ORDER BY `a`.`code` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsingleditprpo($id) {
        $sql = "SELECT `orderid`, `spbid`, `orderstatus`, `code`, `unit`, `jobtype`, `division`, `segment`, `amuser`, `amkomet`, `projectname`, `jstvalue`, `negovalue`, `file`, `cruser`, `crdat`, `chuser`, `chdat`
        FROM $this->tbname WHERE orderid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsingleprpo($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function addprpo() {

        $sql= sprintf("INSERT INTO $this->tbname VALUES ('%u','%u','%u','%s','%s','%s','%s','%s','%s',
		'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
		'%u','%s','%s','%s','%s', 
		'%u','%s','%u','%s')",
            '',$this->intspbid,$this->intorderinv,$this->strstatorder,$this->strcode,$this->intnvnum,$this->intfaknum, $this->strinvdat,
            $this->strunit, $this->strjobtype, $this->strdivision, $this->strsegment, $this->stramuser,
            $this->stramkomet, $this->strprojectname, $this->strsentdat, $this->strspknum, $this->strspkindat, $this->strspkdat,
            $this->intbasevalue, $this->intppnvalue,$this->intpphvalue, $this->intnetvalue, $this->intjstvalue, $this->intnegovalue, $this->strfiles,
            $this->intstatinv, $this->strvrecnum, $this->strfrom, $this->strprocdat,$this->intvrecvalue,
            $this->strcruser,$this->strcrdat,'','' );
        /* echo '<pre>';
        print_r($sql); exit; */
        $this->db->query($sql);
    }

    public function editprpo(){
        $sql = sprintf("UPDATE $this->tbname SET 
		`code`='%s', `unit`='%s', `jobtype`='%s', `division`='%s', `segment`='%s', 
		`amuser`='%s', `amkomet`='%s', `projectname`='%s',
		`jstvalue`='%s', `negovalue`='%s', `file`='%s',
		`chuser`='%u', `chdat`='%s' WHERE orderid='%u'",
            $this->strcode, $this->strunit, $this->strjobtype, $this->strdivision, $this->strsegment,
            $this->stramuser, $this->stramkomet, $this->strprojectname,
            $this->intjstvalue, $this->intnegovalue, $this->strfiles,
            $this->strchuser,$this->strchdat,$this->intorderid);
        /* echo '<pre>';
        print_r($sql); exit; */
        $this->db->query($sql);
    }

    public function updatetonopes() {
        $sql = sprintf("UPDATE $this->tbname SET 
		`orderinv`='%u',`orderstatus`='%s', `code`='%s', `invnum`='%s', `faknum`='%s', `invdate`='%s', `spknum`='%s', `basevalue`='%s', `ppnvalue`='%s', `netvalue`='%s',
		`chuser`='%u', `chdat`='%s' WHERE orderid='%u'",
            '1', $this->strstatorder, $this->strcode, $this->intnvnum, $this->intfaknum, $this->strinvdat,
            $this->strspknum, $this->intbasevalue, $this->intppnvalue, $this->intnetvalue,
            $this->strchuser,$this->strchdat,$this->intorderid);
        /* echo '<pre>';
		print_r($sql); exit; */
        $this->db->query($sql);
    }

    public function getsingleorder($id) {
        $sql = "SELECT * FROM $this->tbname WHERE orderid='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function deleteorder($id){
        $sql = $this->db->query("DELETE FROM $this->tbname WHERE orderid = '". $id ."'");
    }


    //new table BILLCO
    public function updatecolstatinv() {
        $sql = sprintf("UPDATE $this->tbname SET `status`='%u', `chuser`='%u', `chdat`='%s' WHERE orderid='%u'",
            $this->intstatinv,$this->strchuser,$this->strchdat,$this->intorderid);
        // echo '<pre>';
        // print_r($sql); exit;
        $this->db->query($sql);
    }

    public function updatestatinv() {
        $sql = sprintf("UPDATE $this->tbname SET `pphvalue`='%s',
	`status`='%u', `vrecnum`='%s', `receivefrom`='%s',`procdat`='%s', `vrecvalue`='%s',
	`chuser`='%u', `chdat`='%s' WHERE orderid='%u'",
            $this->intpphvalue, $this->intstatinv, $this->strvrecnum, $this->strfrom, $this->strprocdat, $this->intvrecvalue,
            $this->strchuser,$this->strchdat,$this->intorderid);
        /* echo '<pre>';
            print_r($sql); exit; */
        $this->db->query($sql);
    }

    public function getallinvoicepaid() {
        $sql = "SELECT * FROM `vw_order` WHERE `status`='1' ORDER BY `code` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsingleinvoicepaid($id) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderid`='$id' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallinvoicepaidbydate($date) {
        $sql = "SELECT * FROM `vw_order` WHERE `procdat`='$date' AND `status`='1' ORDER BY `code` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countinvoice(){
        $sql = "SELECT COUNT(*) AS `totalinvoicetoday` FROM $this->tbname 
		WHERE `orderinv`='1' AND YEAR(`invdate`) = YEAR(CURDATE()) AND `invdate` >= CURDATE()";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //GROUP BY `status` ORDER BY `status`
    public function countallinvoice(){
        $sql = "SELECT COUNT(`orderid`) AS `totalinvoice` FROM `tb_order` 
		WHERE `orderinv`='1' AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countinvkomet(){
        $sql = "SELECT COUNT(*) AS `totalinvoice` FROM $this->tbname WHERE `orderinv`='1' AND `unit` = 'KOMET' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countinvmesra(){
        $sql = "SELECT COUNT(*) AS `totalinvoice` FROM $this->tbname WHERE `orderinv`='1' AND `unit` = 'MESRA' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countrevenue(){
        $sql = "SELECT SUM(`basevalue` - `netvalue`) AS `totalrev` FROM $this->tbname WHERE YEAR(`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmaxcode(){
        $sql = "SELECT MAX(`orderid`) AS `lastid` FROM $this->tbname";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //////////////// TERMIN //////////////


    public function getalltermininvkomet($division, $segmen) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderinv`='1' AND `division`='$division' AND `segment` = '$segmen' ORDER BY `invdate` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getalltermininvmesra($division, $segmen) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderinv`='1' AND `unit` = 'MESRA' AND `division`='$division' AND `segment` = '$segmen' ORDER BY `invdate` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getalltermininvpadi($division, $segmen) {
        $sql = "SELECT * FROM `vw_order` WHERE `orderinv`='1' AND `division`='$division' AND `segment` = '$segmen' ORDER BY `invdate` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getprpotermin($prpoid) {
        $sql = "SELECT * FROM `tb_termin` WHERE `prpoid`='$prpoid'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getprposingletermin($invid) {
        $sql = "SELECT `a`.`terminid`,`a`.`prpoid`,`b`.*
		FROM `tb_termin` `a` JOIN `vw_order` `b` WHERE `b`.`orderid`='$invid'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function addtermin() {

        $sql= sprintf("INSERT INTO `tb_termin` VALUES ('%u','%u','%s','%s','%s','%s',
		'%u','%s','%u','%s')",
            '',$this->intprpoid,$this->intinvoiceid,$this->strunit,$this->intjstvalue,$this->intnegovalue,
            $this->strcruser,$this->strcrdat,'','' );
        // echo '<pre>';
        // print_r($sql); exit;
        $this->db->query($sql);
    }

    function getFakturPajak($unit){
        $query = "SELECT * FROM tb_fakturpajak WHERE unit = '". $unit ."'";
        $sql = $this->db->query($query);
        $data = $sql->result_array();

        $this->db->close();
        return $data;
    }
	

    function getlastinvnum(){
        $query = "SELECT MAX(invnum) as lastinvnum FROM tb_order WHERE YEAR(invdate) = YEAR(CURRENT_DATE);";
        $sql = $this->db->query($query);
        $data = $sql->result_array();

        $this->db->close();
        return $data[0]['lastinvnum'];
    }
}