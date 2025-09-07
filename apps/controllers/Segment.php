<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Segment extends CI_Controller
{
	public $intsegmentid;
	public $intdivisionid;
	public $intuseramid;
	public $strcode;
	public $strname;
	public $intpriority;
	public $intstatus;
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;

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
            'form_validation'
        ];
        $this->load->library($lib);
		$this->load->model('Segment_model', 'sgmd');
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
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
	public function index() {
		$data = [ 
			'drd' => $this->sgmd->getallsegment(),
			'title' => 'Segmen',
			'brand' => 'Daftar Pelanggan',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/segment/segment_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function detail(){
		$drd = $this->sgmd->getsinglesegment($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intsegmentid = $row['segmentid'];
				$this->intdivisionid = $row['divisionid'];
				$this->intuseramid = $row['marketingid'];
				$this->strcode = $row['code'];
                $this->strname = $row['name'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$data = [
            'id' => $this->intsegmentid,
			'kode' => $this->strcode,
             'nama' =>   $this->strname,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Detail Segment',
			'brand' => 'Segment',
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
        ];
		$data['content'] = $this->load->view('modules/segment/detail_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function add() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtName', 'Nama Segmen', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->sgmd->intdivisionid = $this->input->post('optDivision');
                $this->sgmd->intuseramid = $this->input->post('optUseram');
				$this->sgmd->strcode = $this->input->post('txtCode');
                $this->sgmd->strname = $this->input->post('txtName');
				$this->sgmd->intpriority = $this->input->post('optPriority');
				$this->sgmd->intstatus = $this->input->post('optStatus');

                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->sgmd->strcruser = $this->session->userdata('userid');
                $this->sgmd->strcrdat = mdate($datestring, $time);
				
                $this->sgmd->addsegment();
                redirect(base_url($this->router->fetch_class()));
            }
        }
		$data = [ 
			'division' => $this->drdmd->getalldiv(),
			'useram' => $this->drdmd->getalluseram(),
			'title' => 'Tambah Pelanggan',
			'brand' => 'Baru',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		$data['content'] = $this->load->view('modules/segment/add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function edit() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtName', 'Nama Segmen', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

				$this->sgmd->intsegmentid = $this->input->post('hdnId');
				$this->sgmd->intdivisionid = $this->input->post('optDivision');
                $this->sgmd->intuseramid = $this->input->post('optUseram');
				$this->sgmd->strcode = $this->input->post('txtCode');
                $this->sgmd->strname = $this->input->post('txtName');
				$this->sgmd->intpriority = $this->input->post('optPriority');
                $this->sgmd->intstatus = $this->input->post('optStatus');
				
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->sgmd->strcruser = $this->session->userdata('userid');
                $this->sgmd->strcrdat = mdate($datestring, $time);
				
                $this->sgmd->editsegment();
                redirect(base_url($this->router->fetch_class()));
            }
        }
		$drd = $this->sgmd->getsinglesegment($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intsegmentid = $row['segmentid'];
				$this->intdivisionid = $row['divisionid'];
				$this->intuseramid = $row['marketingid'];
				$this->strcode = $row['code'];
                $this->strname = $row['name'];
                $this->intpriority = $row['priority'];
                $this->intstatus = $row['status'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$data = [
            'id' => $this->intsegmentid,
			'divisi' => $this->intdivisionid,
			'useramid' => $this->intuseramid,
			'kode' => $this->strcode,
             'nama' =>   $this->strname,
             'prioritas' =>   $this->intpriority,
             'status' =>   $this->intstatus,
             'buat' =>   $this->strcruser,
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
			  'division' => $this->drdmd->getalldiv(),
			'useram' => $this->drdmd->getalluseram(),
            'title' => 'Ubah Pelanggan',
			'brand' => 'Lama',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        ];
		$data['content'] = $this->load->view('modules/segment/edit_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function delete(){
        if ($this->input->post()) {
            $this->sgmd->deletesegment($_POST['segmentid']);
            echo "success"; /* mengembalikan kata 'success' untuk dikenali diview */
        }
    }
	
		
	

}	