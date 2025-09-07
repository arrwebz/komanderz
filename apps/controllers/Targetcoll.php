<?php defined('BASEPATH') or exit('No direct script access allowed');

class Targetcoll extends CI_Controller{

    public $intidtargetcoll;
    public $strnama;
    public $strnilai;
    public $strtipe;
    public $strbulan;
    public $strtahun;

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
        ];
        $this->load->library($lib);

		$this->load->model('targetcoll_model', 'tsmd');
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
            'drd' => $this->tsmd->getalltargetcoll(),
            'title' => 'Target Collection',
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
		
		$data['content'] = $this->load->view('modules/targetcoll/targetcoll_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function search() {
        if($_POST){
            $post = $this->input->post();
            $data = [
                'drd' => $this->tsmd->getsearchtargetsalses($post),
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

            $data['content'] = $this->load->view('modules/targetcoll/search_targetcoll_view', $data, TRUE);
            $this->load->view('templates/base', $data, FALSE);
        }
    }
	
	public function addtargetcoll() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtNama', 'Nama', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->tsmd->strnama = $this->input->post('txtNama');
                $this->tsmd->strnilai = $this->input->post('txtNilai');
                $this->tsmd->strtipe = $this->input->post('optTipe');
                $this->tsmd->strbulan = $this->input->post('optBulan');
                $this->tsmd->strtahun = $this->input->post('optTahun');

				$this->tsmd->addtargetcoll();
                redirect(base_url($this->router->fetch_class()));
            }
        }

		$data = [ 
			'title' => 'KOMET',
			'brand' => 'List Target Collection',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];

		$data['content'] = $this->load->view('modules/targetcoll/add_targetcoll_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

	public function edittargetcoll() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtNama', 'Nama', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->tsmd->intidtargetcoll = $this->input->post('txtIdtargetcoll');
                $this->tsmd->strnama = $this->input->post('txtNama');
                $this->tsmd->strnilai = $this->input->post('txtNilai');
                $this->tsmd->strtipe = $this->input->post('optTipe');
                $this->tsmd->strbulan = $this->input->post('optBulan');
                $this->tsmd->strtahun = $this->input->post('optTahun');

				$this->tsmd->edittargetcoll();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $drd = $this->tsmd->getsingletargetcoll($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intidtargetcoll = $row['idtargetcoll'];
                $this->strnama = $row['nama'];
                $this->strnilai = $row['nilai'];
                $this->strtipe= $row['tipe'];
                $this->strbulan = $row['bulan'];
                $this->strtahun = $row['tahun'];
            }
        }

		$data = [
            'idtargetcoll' => $this->intidtargetcoll,
            'nama' => $this->strnama,
            'nilai' => $this->strnilai,
            'tipe' => $this->strtipe,
            'bulan' => $this->strbulan,
            'tahun' => $this->strtahun,

			'title' => 'KOMET',
			'brand' => 'Target Collection',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];

		$data['content'] = $this->load->view('modules/targetcoll/edit_targetcoll_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

    function delete(){
        if ($this->input->post()) {
            $this->tsmd->delete($_POST['idtargetcoll']);
            echo "success";
        }
    }
}	