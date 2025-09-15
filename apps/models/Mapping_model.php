<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mapping_model extends CI_Model {
        
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    } 
	
	public function get_invoices_with_spbs($year = null) {
	  // Tentukan rentang tahun seperti sebelumnya
	  $year  = $year ?? date('Y');
	  $start = "$year-01-01";
	  $end   = ($year + 1) . "-01-01";
	  
	  //$this->db->set_dbprefix('vw_');

	  return $this->db
		->select("
		  inv.orderid AS invoice_id,
		  inv.division AS inv_division,
		  inv.segment AS inv_segment,
		  inv.projectname AS inv_project,
		  inv.code AS inv_number,
		  inv.basevalue AS inv_value,
		  inv.invdate AS inv_date,
		  inv.status AS inv_status,
		  spb.spbid AS spb_id,
		  spb.code AS spb_number,
		  spb.value AS spb_value,
		  spb.customer,
		  spb.spbdat,
		  spb.status AS spb_status 
		")
		->from('order AS inv')
		->join('spb AS spb',
			   'spb.orderid = inv.orderid', 'left')
		->where('inv.invdate >=', $start)
		->where('inv.invdate <',  $end)
		->order_by('inv.code', 'ASC')
		->order_by('spb.spbid','ASC')
		->get()
		->result_array();
	}

    // Model: Invoice_model.php
    public function get_invoice_spb_filtered($year = null, $order_type = null) {
    $start = "$year-01-01";
    $end   = ($year + 1) . "-01-01";

    $this->db
        ->select("
		  inv.orderid AS invoice_id,
		  inv.division AS inv_division,
		  inv.segment AS inv_segment,
		  inv.projectname AS inv_project,
		  inv.code AS inv_number,
		  inv.basevalue AS inv_value,
		  inv.invdate AS inv_date,
		  inv.status AS inv_status,
		  spb.spbid AS spb_id,
		  spb.code AS spb_number,
		  spb.value AS spb_value,
		  spb.customer,
		  spb.spbdat,
		  spb.status AS spb_status 
		")
        ->from('order AS inv')
        ->join('spb AS spb', 'spb.orderid = inv.orderid', 'left')
        ->where('inv.invdate >=', $start)
        ->where('inv.invdate <',  $end);

    if ($order_type) {
        $this->db->where('inv.orderstatus', $order_type);
    }

    return $this->db->get()->result_array();
    }

    //////////GPT

    public function get_years() {
        return $this->db->select('DISTINCT YEAR(invdate) AS y')
        ->from('order')
        ->where('status !=', '9')
        ->order_by('y','desc')
        ->get()->result_array();
    }

    public function get_order_types() {
        $this->db->select('orderstatus')
        ->from('order')
        ->where('orderstatus =', 'PRPO')
        ->or_where('orderstatus =', 'OBL')
        ->group_by('orderstatus')
        ->order_by('orderstatus','asc');
        return $this->db->get()->result_array();
    }

    // Untuk DataTables: fetch invoices with count of spb
    public function get_invoices_with_count($year = null, $order_type = null, $start=0, $length=0, $search=null, $order=null) {
        // default tahun berjalan
        if ($year === null) {
            $year = date('Y');
        }

        // default order_type
        if ($order_type === null) {
            $order_type = 'PRPO';
        }

        $this->db->select('o.orderid, o.code, o.projectname, o.basevalue, o.invdate AS invoice_date, o.orderstatus, COUNT(s.spbid) AS spb_count');
        $this->db->from('tb_order o');
        $this->db->join('tb_spb s', 's.orderid = o.orderid', 'left');

        // filter tahun invoice
        if (!empty($year)) {
            $this->db->where('YEAR(o.invdate)', (int)$year);
        }

        // filter tipe order (varchar, jangan di-casting!)
        if (!empty($order_type)) {
            $this->db->where('o.orderstatus', $order_type);
        }

        // exclude status 9
        $this->db->where('o.status !=', 9);

        // search
        if (!empty($search)) {
            $this->db->group_start()
                ->like('o.code', $search)
                ->or_like('o.projectname', $search)
                ->or_like('o.basevalue', $search)
            ->group_end();
        }

        $this->db->group_by('o.orderid');

        // ordering
        if ($order && isset($order['column'])) {
            $cols = ['o.orderid','o.code','o.projectname','spb_count','o.basevalue','o.invdate'];
            $col = isset($cols[$order['column']]) ? $cols[$order['column']] : 'o.invdate';
            $dir = ($order['dir']=='asc') ? 'asc' : 'desc';
            $this->db->order_by($col, $dir);
        } else {
            $this->db->order_by('o.invdate','desc');
        }

        // limit (pagination DataTables)
        if ($length > 0) {
            $this->db->limit((int)$length, (int)$start);
        }

        $q = $this->db->get();
        return $q->result_array();
    }

    public function count_invoices_filtered($year=null, $order_type=null, $search=null) {
        if ($year === null) {
            $year = date('Y');
        }

        if ($order_type === null) {
            $order_type = 'PRPO';
        }

        $this->db->select('COUNT(DISTINCT o.orderid) AS cnt');
        $this->db->from('tb_order o');
        $this->db->join('tb_spb s','s.orderid = o.orderid','left');

        if (!empty($year)) {
            $this->db->where('YEAR(o.invdate)', (int)$year);
        }

        if (!empty($order_type)) {
            $this->db->where('o.orderstatus', $order_type);
        }

        $this->db->where('o.status !=', 9);

        if (!empty($search)) {
            $this->db->group_start()
                ->like('o.code', $search)
                ->or_like('o.projectname', $search)
            ->group_end();
        }

        $r = $this->db->get()->row();
        return $r ? (int)$r->cnt : 0;
    }

    public function get_spb_by_invoice($invoice_id) {
        return $this->db->where('orderid', (int)$invoice_id)
                        ->order_by('spbdat','asc')
                        ->get('tb_spb')
                        ->result_array();
    }


    public function get_invoice($id) {
        return $this->db->where('orderid',(int)$id)->get('order')->row_array();
    }

    
    /**
     * Ambil orders + concat SPB per order (untuk export)
     * $year = tahun filter (numeric) atau null => default date('Y')
     * $order_type = orderstatus filter (PRPO/OBL) atau null => semua
     */
    public function get_orders_with_spb($year = null, $order_type = null)
    {
        // query
        $sql = "
            SELECT 
                o.orderid,
                o.code AS invoice_no,
                o.projectname,
                o.basevalue,
                o.orderstatus,
                GROUP_CONCAT(
                    CONCAT(s.code, ' (', DATE_FORMAT(s.spbdat, '%d-%m-%Y'), ')')
                    SEPARATOR ', '
                ) AS spb_list
            FROM tb_order o
            LEFT JOIN tb_spb s ON s.orderid = o.orderid
            WHERE o.status != 9 ";

        if ($order_type == "PRPO") {
            $sql .= " AND YEAR(o.crdat) >= '2021' AND o.orderstatus = 'PRPO' ";
        } else
        {
            $sql .= " AND YEAR(o.invdate) >= '$year' AND o.orderstatus = 'OBL'";
        }

        $sql .=" GROUP BY o.orderid
                ORDER BY o.orderid DESC";
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

	
    
}