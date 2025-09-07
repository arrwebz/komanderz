<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mom extends CI_Controller{

    public $intmomid;
    public $strtitle;
    public $strmdate;
    public $strmtime;
    public $strlocation;
    public $strcust;
    public $strtom;
    public $strinst;
    public $strfaci;
    public $strattd;
    public $stragenda;
    public $strdaresult;

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
            'form_validation',
            'html2pdf'
        ];
        $this->load->library($lib);

		$this->load->model('mom_model', 'mommd');
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
            array($this->config->item('skins_uri').'libs/tinymce/tinymce/tinymce.min.js'),
            array($this->config->item('skins_uri').'libs/tinymce/filemanager/plugin.min.js'),
            array($this->config->item('skins_uri').'libs/tinymce/editors.js'),
        );
        
        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
	public function index() {

		$data = [
            'drd' => $this->mommd->getallmom(),
            'title' => 'MoM',
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
		
		$data['content'] = $this->load->view('modules/mom/mom_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function search() {
        if($_POST){
            $post = $this->input->post();
            $data = [
                'drd' => $this->mommd->getsearchmom($post),
                'title' => 'KOMET',
                'brand' => 'Hasil pencarian',

                'userid' => $this->session->userdata('userid'),
                'role' => $this->session->userdata('role'),
                'group' => $this->session->userdata('group'),
                'fullname' => $this->session->userdata('userfullname'),
                'photo' => $this->session->userdata('photo'),
                'position' => $this->session->userdata('position'),
                'joindate' => $this->session->userdata('joindate')
            ];

            $data['content'] = $this->load->view('modules/mom/search_mom_view', $data, TRUE);
            $this->load->view('templates/base', $data, FALSE);
        }
    }
	
	public function addmom() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div> <strong>%s</strong> still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');
            $this->form_validation->set_rules('txtTitle', 'Title', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->mommd->strtitle = $this->input->post('txtTitle');
                $this->mommd->strmdate = date('Y-m-d', strtotime($this->input->post('txtMdate')));
                $this->mommd->strmtime = $this->input->post('txtMtime');
                $this->mommd->strlocation = $this->input->post('txtLocation');
                $this->mommd->strcust = $this->input->post('txtCustomer');
                $this->mommd->strtom = $this->input->post('txtTom');
                $this->mommd->strinst = $this->input->post('txtInstructor');
                $this->mommd->strfaci = $this->input->post('txtFacilitator');
                $this->mommd->strattd = $this->input->post('txtAttd');
                $this->mommd->stragenda = $this->input->post('txtAgenda');
                $this->mommd->strdaresult = $this->input->post('txtDaresult');

				$this->mommd->addmom();
                redirect(base_url($this->router->fetch_class()));
            }
        }

		$data = [ 
			'title' => 'KOMET',
			'brand' => 'List MoM',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];

		$data['content'] = $this->load->view('modules/mom/add_mom_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

	public function editmom() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div> <strong>%s</strong> still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');
            $this->form_validation->set_rules('txtTitle', 'Title', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->mommd->intmomid = $this->input->post('hdnMomid');
                $this->mommd->strtitle = $this->input->post('txtTitle');
                $this->mommd->strmdate = date('Y-m-d', strtotime($this->input->post('txtMdate')));
                $this->mommd->strmtime = $this->input->post('txtMtime');
                $this->mommd->strlocation = $this->input->post('txtLocation');
                $this->mommd->strcust = $this->input->post('txtCustomer');
                $this->mommd->strtom = $this->input->post('txtTom');
                $this->mommd->strinst = $this->input->post('txtInstructor');
                $this->mommd->strfaci = $this->input->post('txtFacilitator');
                $this->mommd->strattd = $this->input->post('txtAttd');
                $this->mommd->stragenda = $this->input->post('txtAgenda');
                $this->mommd->strdaresult = $this->input->post('txtDaresult');

				$this->mommd->editmom();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $drd = $this->mommd->getsinglemom($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intmomid = $row['momid'];
                $this->strtitle = $row['title'];
                $this->strmdate = $row['mdate'];
                $this->strmtime = $row['mtime'];
                $this->strlocation = $row['location'];
                $this->strcust = $row['customer'];
                $this->strtom = $row['tom'];
                $this->strinst = $row['instructor'];
                $this->strfaci = $row['facilitator'];
                $this->strattd = $row['attd'];
                $this->stragenda = $row['agenda'];
                $this->strdaresult = $row['daresult'];
            }
        }

		$data = [
            'momid' => $this->intmomid,
            'mtitle' => $this->strtitle,
            'mdate' => $this->strmdate,
            'mtime' => $this->strmtime,
            'location' => $this->strlocation,
            'customer' => $this->strcust,
            'tom' => $this->strtom,
            'inst' => $this->strinst,
            'faci' => $this->strfaci,
            'attd' => $this->strattd,
            'agenda' => $this->stragenda,
            'daresult' => $this->strdaresult,

			'title' => 'KOMET',
			'brand' => 'MoM',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];

		$data['content'] = $this->load->view('modules/mom/edit_mom_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function pdfmom() {
		$drd = $this->mommd->getsinglemom($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intmomid = $row['momid'];
                $this->strtitle = $row['title'];
                $this->strmdate = $row['mdate'];
                $this->strmtime = $row['mtime'];
                $this->strlocation = $row['location'];
                $this->strcust = $row['customer'];
                $this->strtom = $row['tom'];
                $this->strinst = $row['instructor'];
                $this->strfaci = $row['facilitator'];
                $this->strattd = $row['attd'];
                $this->stragenda = $row['agenda'];
                $this->strdaresult = $row['daresult'];
            }
        }
		
		$this->html2pdf->folder('./assets/pdfs/');
        $name = 'Mom - '.$this->strtitle.'.pdf';

		$data = [
            'momid' => $this->intmomid,
            'mtitle' => $this->strtitle,
            'mdate' => $this->strmdate,
            'mtime' => $this->strmtime,
            'location' => $this->strlocation,
            'customer' => $this->strcust,
            'tom' => $this->strtom,
            'inst' => $this->strinst,
            'faci' => $this->strfaci,
            'attd' => $this->strattd,
            'agenda' => $this->stragenda,
            'daresult' => $this->strdaresult,

			'title' => 'KOMET',
			'brand' => 'MoM',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		// $data['content'] = $this->load->view('modules/mom/pdf_mom_view', $data, TRUE);
        // $this->load->view('templates/base', $data, FALSE);

        $html = $this->load->view('modules/mom/pdf_mom_view', $data, true);
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream($name, array("Attachment"=>0));
	}

    function delete(){
        if ($this->input->post()) {
            $this->mommd->delete($_POST['momid']);
            echo "success";
        }
    }
}	