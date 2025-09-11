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

	
    
}