<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Allreportspb extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		self::bindskins();
		if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }$hlp = [
            'form',
            'date'
        ];
        $this->load->helper($hlp);
        $this->load->model('Report_model', 'repmd');
        $this->load->model('Dropdown_model', 'drdmd');
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
            array($this->config->item('skins_uri').'js/widget/ui-card-init.js'),
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
        $get_report = array();

		$data = [
			'title' => 'All Report SPB',
			'drd' => $get_report,
            'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/allreportspb/allreportspb_view',$data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function search(){
        if($_POST){
            $post = $_POST;
            $t['drd'] = $this->repmd->getallreportspb($post);
            $t['optStatinv'] = $post['optStatinv'];
            $this->load->view('modules/allreportspb/ajax_allreportspb_view', $t, FALSE);
        }else{
            echo 'Are You Need Something.?';
        }
    }

    public function exportfilter(){
        $bulan = $_GET['optBulan'];
        $tahun = $_GET['optTahun'];
        $strftitle = 'all-report-spb-'.$tahun;

        $get = $_GET;
        $t['drd'] = $this->repmd->getallreportspb($get);
        $t['title'] = $strftitle;
        $t['optStatinv'] = $_GET['optStatinv'];

        $this->load->view('modules/allreportspb/excel_allreportspb_view',$t);
    }
}