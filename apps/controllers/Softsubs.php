<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Softsubs extends CI_Controller
{
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
    public $strstartsubs;
    public $strendsubs;
    public $strtypesubs;
    public $strreminder;
    public $strcrdat;

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
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation'
        ];
        $this->load->library($lib);

		$this->load->model('User_model', 'usermd');
		$this->load->model('softsubs_model', 'sssmd');
		$this->load->model('Dropdown_model', 'drdmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
            array($this->config->item('skins_uri').'libs/bootstrap-tagsinput/css/bootstrap-tagsinput.css'),
        );
        $js_head = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'js/jquery-ui.min.js'),
            array($this->config->item('skins_uri').'libs/bootstrap-tagsinput/js/typeahead.bundle.js'),
            array($this->config->item('skins_uri').'libs/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js'),
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

        $softsub = $this->sssmd->getallsoftsubs();
        foreach($softsub as $key=>$row){
            $softsub[$key]['datauser'] = $this->sssmd->getuser($row['user']);
        }

		$data = [
            'drd' => $softsub,
            'title' => 'Software Subscription',
			'brand' => '',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate'),
			'location' => $this->session->userdata('location')
        ];
		
		$data['content'] = $this->load->view('modules/softsubs/softsubs_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function addsoftsubs() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtProname', 'Nama Produk', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->sssmd->strproductname = $this->input->post('txtProname');
                $this->sssmd->strorderby = $this->input->post('optOrderby');
                $this->sssmd->struser = $this->input->post('txtUser');
                $this->sssmd->stremail = $this->input->post('txtEmail');
                $this->sssmd->strpass = $this->input->post('txtPassword');
                $this->sssmd->strnolis = $this->input->post('txtNolis');
                $this->sssmd->strcur =  $this->input->post('optCurrency');
                $this->sssmd->strval =  $this->input->post('txtSoftsubsval');
                $this->sssmd->inttypeofpay = $this->input->post('optTypeofpay');
                $this->sssmd->strpayname = $this->input->post('txtPayname');
                $this->sssmd->strcardnum = $this->input->post('txtCardnum');
                $this->sssmd->strtypesubs = $this->input->post('optTypesubs');
				
				$startsubs = $this->input->post('txtStartsubs');
                $this->sssmd->strstartsubs = date('Y-m-d', strtotime($startsubs));

                $endsubs = $this->input->post('txtEndsubs');
                $this->sssmd->strendsubs = date('Y-m-d', strtotime($endsubs));

                $this->sssmd->strreminder = $this->input->post('txtReminder');

                $this->sssmd->strcrdat = date('Y-m-d');

				$this->sssmd->addsoftsubs();
                redirect(base_url($this->router->fetch_class()));
            }
        }

		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Software Subscription',
            'user' => $this->usermd->getalluseractive(),

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];

		$data['content'] = $this->load->view('modules/softsubs/add_softsubs_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

	public function editsoftsubs() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtProname', 'Nama Produk', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->sssmd->intsoftsubs = $this->input->post('txtSoftsubsid');
                $this->sssmd->strproductname = $this->input->post('txtProname');
                $this->sssmd->strorderby = $this->input->post('optOrderby');
                $this->sssmd->struser = $this->input->post('txtUser');
                $this->sssmd->stremail = $this->input->post('txtEmail');
                $this->sssmd->strpass = $this->input->post('txtPassword');
                $this->sssmd->strnolis = $this->input->post('txtNolis');
                $this->sssmd->strcur =  $this->input->post('optCurrency');
                $this->sssmd->strval =  $this->input->post('txtSoftsubsval');
                $this->sssmd->inttypeofpay = $this->input->post('optTypeofpay');
                $this->sssmd->strpayname = $this->input->post('txtPayname');
                $this->sssmd->strcardnum = $this->input->post('txtCardnum');
                $this->sssmd->strtypesubs = $this->input->post('optTypesubs');

				$startsubs = $this->input->post('txtStartsubs');
                $this->sssmd->strstartsubs = date('Y-m-d', strtotime($startsubs));

                $endsubs = $this->input->post('txtEndsubs');
                $this->sssmd->strendsubs = date('Y-m-d', strtotime($endsubs));

                $this->sssmd->strreminder = $this->input->post('txtReminder');

                $this->sssmd->strcrdat = date('Y-m-d');

				$this->sssmd->editsoftsubs();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $drd = $this->sssmd->getsinglesoftsubs($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intsoftsubs = $row['softsubsid'];
                $this->strproductname = $row['productname'];
                $this->strorderby = $row['orderby'];
                $this->struser= $row['user'];
                $this->stremail = $row['email'];
                $this->strpass = $row['password'];
                $this->strnolis = $row['nolis'];
                $this->strcur = $row['currency'];
                $this->strval = $row['softsubsvalue'];
                $this->inttypeofpay = $row['typeofpayment'];
                $this->strpayname= $row['paymentname'];
                $this->strcardnum= $row['cardnumber'];
                $this->strtypesubs= $row['typesubs'];
                $this->strreminder= $row['reminder'];

                $this->strstartsubs = date('d-m-Y', strtotime($row['startsubs']));
                $this->strendsubs = date('d-m-Y', strtotime($row['endsubs']));
            }
        }

		$data = [
            'softsubsid' => $this->intsoftsubs,
            'productname' => $this->strproductname,
            'orderby' => $this->strorderby,
            'softsubuser' => $this->struser,
            'email' => $this->stremail,
            'password' => $this->strpass,
            'nolis' => $this->strnolis,
            'currency' => $this->strcur,
            'softsubsvalue' => $this->strval,
            'typeofpayment' => $this->inttypeofpay,
            'paymentname' => $this->strpayname,
            'cardnumber' => $this->strcardnum,
            'typesubs' => $this->strtypesubs,
            'startsubs' => $this->strstartsubs,
            'endsubs' => $this->strendsubs,
            'reminder' => $this->strreminder,
            'listuser' => $this->usermd->getuserin($this->struser),

			'title' => 'KOMET',
			'brand' => 'Software Subscription',
            'user' => $this->usermd->getalluseractive(),

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];

		$data['content'] = $this->load->view('modules/softsubs/edit_softsubs_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

    function detailuser(){
        $keyword = $this->input->get('name');
        $get_data = $this->usermd->getsingleusertags($keyword);
        $data = $get_data;
        echo json_encode($data);
    }

    function delete(){
        if ($this->input->post()) {
            $this->sssmd->deletesoftsubs($_POST['softsubsid']);
            echo "success";
        }
    }
}	