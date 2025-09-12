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

    // For DataTables: fetch invoices with count of spb
    public function get_invoices_with_count($year = null, $order_type = null, $start=0, $length=0, $search=null, $order=null) {
        // base select
        $this->db->select('order.*, COUNT(spb.spbid) AS spb_count');
        $this->db->from('order');
        $this->db->join('spb', 'spb.orderid = order.orderid', 'left');

        if (!empty($year)) {
        $this->db->where('YEAR(order.invdate)', (int)$year);
        }
        if (!empty($order_type)) {
        $this->db->where('order.order_type_id', (int)$order_type);
        }
        if (!empty($search)) {
        $this->db->group_start()
            ->like('order.code', $search)
            ->or_like('order.projectname', $search)
            ->or_like('order.basevalue', $search)
        ->group_end();
        }

        $this->db->group_by('order.orderid');

        // ordering
        if ($order && isset($order['column']) ) {
        // translate datatable column index to db column name as needed
        $cols = ['orderid','code','projectname','spb_count','basevalue','invdate'];
        $col = isset($cols[$order['column']]) ? $cols[$order['column']] : 'invdate';
        $dir = ($order['dir']=='asc') ? 'asc' : 'desc';
        $this->db->order_by($col, $dir);
        } else {
        $this->db->order_by('order.invdate','desc');
        }

        if ($length>0) $this->db->limit((int)$length, (int)$start);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function count_invoices_filtered($year=null, $order_type=null, $search=null) {
        $this->db->select('COUNT(DISTINCT order.orderid) AS cnt');
        $this->db->from('order');
        $this->db->join('spb','spb.orderid = order.orderid','left');
        if (!empty($year)) $this->db->where('YEAR(order.invdate)', (int)$year);
        if (!empty($order_type)) $this->db->where('order.order_type_id', (int)$order_type);
        if (!empty($search)) {
        $this->db->group_start()
            ->like('order.code', $search)
            ->or_like('order.projectname', $search)
        ->group_end();
        }
        $r = $this->db->get()->row();
        return $r ? (int)$r->cnt : 0;
    }

    public function get_spb_by_invoice($invoice_id) {
        return $this->db->where('orderid', (int)$invoice_id)
                        ->order_by('spbdat','asc')
                        ->get('spb')
                        ->result_array();
    }

    public function get_invoice($id) {
        return $this->db->where('orderid',(int)$id)->get('order')->row_array();
    }

    // public function add_spb($data) {
    //     $this->db->insert('spb_payments', $data);
    //     return $this->db->insert_id();
    // }








	
    
}