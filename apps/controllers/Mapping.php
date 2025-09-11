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
            'date'
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
	
    public function index() {
		$year = '2024';
		 $flat = $this->mpgmd->get_invoices_with_spbs($year);

		  $grouped = [];
		  foreach ($flat as $row) {
			$invId = $row['invoice_id'];
			if (! isset($grouped[$invId])) {
			  $grouped[$invId] = [
				'inv_number' => $row['inv_number'],
				'spbs' 		 => []
			  ];
			}
			// Kalau ada SPB, tambahkan ke list
			if ($row['spb_id']) {
			  $grouped[$invId]['spbs'][] = [
				'spb_number'  => $row['spb_number'],
				'amount'      => $row['spb_value'],
				'spb_date'=> $row['spbdat']
			  ];
			}
		  }
		  
        $data = [
			'invoices' => $grouped,
			'year' => $year ?? date('Y'),
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

    public function search() {
        $unit = 'PADI';
        $invnum = $this->input->post('txtInv');
        $segmen = $this->input->post('optSegment');
        $invmonth = $this->input->post('optMonth');
        $invyear = $this->input->post('optYear');

        $data = [
            'drd' => $this->trkmd->getsearchtrackorder($unit,$invnum,$segmen,$invmonth,$invyear),
            'title' => 'PADI',
            'brand' => 'Tracking',
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

        $data['content'] = $this->load->view('modules/ptrack/search_ptrack_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }



}