<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapping extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        self::bindskins();
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }
        $hlp = [
            'form',
            'date',
            'file'
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation',
            'html2pdf'
        ];
        $this->load->library($lib);
        $this->load->model('Spb_model', 'spbmd');
        $this->load->model('Order_model', 'ordermd');
        $this->load->model('Track_model', 'trkmd');
        $this->load->model('Mapping_model', 'mpgmd');
        $this->load->model('Dropdown_model', 'drdmd');
        $this->load->model('Report_model', 'repmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
        );
        $js_head = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
        );
        $js_content  = array(
            array($this->config->item('skins_uri').'js/app.min.js'),
            array($this->config->item('skins_uri').'js/app.init.js'),
            array($this->config->item('skins_uri').'libs/bootstrap/dist/js/bootstrap.bundle.min.js'),
            array($this->config->item('skins_uri').'libs/simplebar/dist/simplebar.min.js'),
            array($this->config->item('skins_uri').'js/sidebarmenu.js'),
            array($this->config->item('skins_uri').'js/theme.js'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/owl.carousel.min.js'),
            array($this->config->item('skins_uri').'libs/datatables.net/js/jquery.dataTables.min.js'),
            array($this->config->item('skins_uri').'js/datatable/datatable-basic.init.js'),
            array($this->config->item('skins_uri').'libs/select2/dist/js/select2.full.min.js'),
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    // main page
    public function index(){
        
        $data = [
			'years' => $this->mpgmd->get_years(),
            'title' => 'Mapping',
            'brand' => 'Mapping Invoice to SPB',
            'tnk' => $this->repmd->countnopeskomet(),
            'tpk' => $this->repmd->countprpokomet(),
            'tsk' => $this->repmd->countspbkomet(),
            'tnm' => $this->repmd->countnopesmesra(),
            'tpm' => $this->repmd->countprpomesra(),
            'tsm' => $this->repmd->countspbmesra(),
            'tnp' => $this->repmd->countnopespadi(),
            'tpp' => $this->repmd->countprpopadi(),
            'tsp' => $this->repmd->countspbpadi(),
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/mapping/mapping_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    // endpoint for DataTables AJAX
    // endpoint for DataTables AJAX
    public function ajax_list()
    {
        header('Content-Type: application/json'); // penting biar JSON valid

        $post = $this->input->post();

        $start  = isset($post['start']) ? (int)$post['start'] : 0;
        $length = isset($post['length']) ? (int)$post['length'] : 10;
        $search = isset($post['search']['value']) ? $post['search']['value'] : null;

        $order = null;
        if (isset($post['order'][0])) {
            $order = [
                'column' => $post['order'][0]['column'],
                'dir'    => $post['order'][0]['dir']
            ];
        }

        $filter_year       = $this->input->post('filter_year');
        $filter_order_type = $this->input->post('filter_order_type');

        // ambil data utama
        $data = $this->mpgmd->get_invoices_with_count(
            $filter_year,
            $filter_order_type,
            $start,
            $length,
            $search,
            $order
        );

        // count data filtered
        $recordsFiltered = $this->mpgmd->count_invoices_filtered(
            $filter_year,
            $filter_order_type,
            $search
        );

        // count total semua data (jangan pakai "order", reserved word)
        $recordsTotal = $this->db->count_all('tb_order'); 

        // siapkan rows untuk DataTables
        $rows = [];
        foreach ($data as $r) {
            $rows[] = [
                'id'           => $r['orderid'],
                'invoice_no'   => '<a target="_blank" href="' . site_url('mapping/details/' . $r['orderid']) . '">' . htmlspecialchars($r['code']) . '</a>',
                'project_name' => htmlspecialchars($r['projectname']),
                'spb_count'    => (int)$r['spb_count'],
                'amount'       => number_format($r['basevalue'], 2, ',', '.'),
                'invoice_date' => $r['invdate'] ? date('Y-m-d', strtotime($r['invdate'])) : ''
            ];
        }

        // output sesuai format DataTables
        echo json_encode([
            'draw'            => isset($post['draw']) ? (int)$post['draw'] : 1,
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $rows
        ], JSON_UNESCAPED_UNICODE);

        exit;
    }

    // return SPB list for a given invoice (for expand)
    public function ajax_spb_by_invoice($invoice_id){
        $spbs = $this->mpgmd->get_spb_by_invoice($invoice_id);
        // create HTML table fragment or JSON - we'll return JSON array to JS
        foreach($spbs as &$s){
        $s['spb_no_link'] = '<a target="_blank" href="'.site_url('kspb/details/'.$s['spbid']).'">'.htmlspecialchars($s['code']).'</a>';
        $s['spb_amount_fmt'] = number_format($s['value'],2,',','.');
        }
        echo json_encode($spbs);
    }

    public function detail($id){
        // simple invoice detail page
        $data['invoice'] = $this->mpgmd->get_invoice($id);
        $data['spbs'] = $this->mpgmd->get_spb_by_invoice($id);
        $this->load->view('mapping/detail',$data);
    }

    // export excel
    public function export_excel(){
        $filter_year = $this->input->get('filter_year');
        $filter_order_type = $this->input->get('filter_order_type');
        $data['invoices'] = $this->mpgmd->get_invoices_with_spbs($filter_year, $filter_order_type);
        $data['year'] = $filter_year;
        $data['order_type'] = $filter_order_type;
        $this->load->view('invoice/export_excel',$data);
    }





	
    // public function index() {
	// 	$year = '2024';
	// 	 $flat = $this->mpgmd->get_invoices_with_spbs($year);

	// 	  $grouped = [];
	// 	  foreach ($flat as $row) {
	// 		$invId = $row['invoice_id'];
	// 		if (! isset($grouped[$invId])) {
	// 		  $grouped[$invId] = [
    //             'inv_id' => $row['invoice_id'],
	// 			'inv_number' => $row['inv_number'],
    //             'inv_project'  => $row['inv_project'],
    //             'inv_division'  => $row['inv_division'],
    //             'inv_segment'  => $row['inv_segment'],
    //             'inv_value'  => $row['inv_value'],
    //             'inv_date'  => $row['inv_date'],
    //             'inv_status'  => $row['inv_status'],
	// 			'spbs' 		 => []
	// 		  ];
	// 		}
	// 		// Kalau ada SPB, tambahkan ke list
	// 		if ($row['spb_id']) {
	// 		  $grouped[$invId]['spbs'][] = [
	// 			'spb_id'  => $row['spb_id'],
	// 			'spb_number'  => $row['spb_number'],
	// 			'amount'      => $row['spb_value'],
    //             'customer'    => $row['customer'],
    //             'spb_status'  => $row['spb_status'],
	// 			'spb_date'=> $row['spbdat']
	// 		  ];
	// 		}
	// 	  }
		  
    //     $data = [
	// 		'invoices' => $grouped,
	// 		'year' => $year ?? date('Y'),
    //         'title' => 'Mapping',
    //         'brand' => 'Mapping Invoice to SPB',
    //         'tnk' => $this->repmd->countnopeskomet(),
    //         'tpk' => $this->repmd->countprpokomet(),
    //         'tsk' => $this->repmd->countspbkomet(),
    //         'tnm' => $this->repmd->countnopesmesra(),
    //         'tpm' => $this->repmd->countprpomesra(),
    //         'tsm' => $this->repmd->countspbmesra(),
    //         'tnp' => $this->repmd->countnopespadi(),
    //         'tpp' => $this->repmd->countprpopadi(),
    //         'tsp' => $this->repmd->countspbpadi(),
    //         'userid' => $this->session->userdata('userid'),
    //         'role' => $this->session->userdata('role'),
    //         'group' => $this->session->userdata('group'),
    //         'fullname' => $this->session->userdata('userfullname'),
    //         'photo' => $this->session->userdata('photo'),
    //         'position' => $this->session->userdata('position'),
    //         'joindate' => $this->session->userdata('joindate')
    //     ];

    //     $data['content'] = $this->load->view('modules/mapping/mapping_view', $data, TRUE);
    //     $this->load->view('templates/base', $data, FALSE);
    // }

    // public function ajax_invoice_spb_data()
    // {
    // $year       = $this->input->get('year');
    // $order_type = $this->input->get('order_type');

    // $flat = $this->mpgmd->get_invoice_spb_filtered($year, $order_type);

    // $grouped = [];
    // foreach ($flat as $row) {
    //     $inv = $row['inv_number'];
    //     if (!isset($grouped[$inv])) {
    //     $grouped[$inv] = [];
    //     }
    //     $grouped[$inv][] = $row;
    // }

    // echo json_encode(['grouped' => $grouped]);
    // }

    // // Controller: Reports.php
    // public function export_invoice_spb_excel()
    // {
    // $year       = $this->input->post('year');
    // $order_type = $this->input->post('order_type');

    // //$drd = $this->mpgmd->get_invoice_spb_filtered($year, $order_type);
    // $strftitle = 'mapping-'.$year.'-'.$order_type;

    // $data = [
    //         'drd' => $this->mpgmd->get_invoice_spb_filtered($year, $order_type),
    //         'title' => $strftitle,
    //     ];

    //     $this->load->view('modules/mapping/export_view',$data);

    // }


    // public function data() {
    //     $unit = 'PADI';
    //     $invnum = $this->input->post('txtInv');
    //     $segmen = $this->input->post('optSegment');
    //     $invmonth = $this->input->post('optMonth');
    //     $invyear = $this->input->post('optYear');

    //     $data = [
    //         'drd' => $this->trkmd->getsearchtrackorder($unit,$invnum,$segmen,$invmonth,$invyear),
    //         'title' => 'PADI',
    //         'brand' => 'Tracking',
    //         'tnk' => $this->repmd->countnopeskomet(),
    //         'tpk' => $this->repmd->countprpokomet(),
    //         'tsk' => $this->repmd->countspbkomet(),
    //         'tnm' => $this->repmd->countnopesmesra(),
    //         'tpm' => $this->repmd->countprpomesra(),
    //         'tsm' => $this->repmd->countspbmesra(),
    //         'tnp' => $this->repmd->countnopespadi(),
    //         'tpp' => $this->repmd->countprpopadi(),
    //         'tsp' => $this->repmd->countspbpadi(),
    //         'userid' => $this->session->userdata('userid'),
    //         'role' => $this->session->userdata('role'),
    //         'group' => $this->session->userdata('group'),
    //         'fullname' => $this->session->userdata('userfullname'),
    //         'photo' => $this->session->userdata('photo'),
    //         'position' => $this->session->userdata('position'),
    //         'joindate' => $this->session->userdata('joindate')
    //     ];

    //     $data['content'] = $this->load->view('modules/ptrack/search_ptrack_view', $data, TRUE);
    //     $this->load->view('templates/base', $data, FALSE);
    // }



}