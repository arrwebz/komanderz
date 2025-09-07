<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Targetam extends CI_Controller
{
    public $inttargetsegementid;
	public $intamid;
	public $strtarget;
	public $intbulan;
	public $inttahun;

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
        $this->load->model('Targetam_model', 'tamd');
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
			'drd' => $this->tamd->getalltargetam(),
			'title' => 'KOMET',
			'brand' => 'Daftar Target Am',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/targetam/targetam_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function add() {
		if (isset($_POST['cmdsave'])) { 
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtTarget', 'Target Kosong', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$this->tamd->intamid = $this->input->post('optAm');
				$this->tamd->strtarget = str_replace('.','',$this->input->post('txtTarget'));
				$this->tamd->intbulan = $this->input->post('optBulan');
				$this->tamd->inttahun = $this->input->post('optTahun');

				$this->tamd->addtargetam();
                redirect(base_url($this->router->fetch_class()));
				
            }
        }

		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Tambah NOPES',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		$data['content'] = $this->load->view('modules/targetam/add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function edit() {
	if (isset($_POST['cmdsave'])) {
		$error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtTarget', 'Target Kosong', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->tamd->inttargetsegementid = $this->input->post('targetamid');
                $this->tamd->intamid = $this->input->post('optAm');
                $this->tamd->strtarget = str_replace('.','',$this->input->post('txtTarget'));
                $this->tamd->intbulan = $this->input->post('optBulan');
                $this->tamd->inttahun = $this->input->post('optTahun');
				$this->tamd->edittargetam();
				
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $tsam = '';
		$drd = $this->tamd->getsingletargetam($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->inttargetsegementid = $row['targetamid'];
				$this->intamid = $row['amid'];
				$this->strtarget = $row['target'];
				$this->strbulan = $row['bulan'];
				$this->strtahun = $row['tahun'];
            }
        }
		
		$data = [
			'tsid' => $this->inttargetsegementid,
			'tsamid' => $this->intamid,
			'tstarget' => $this->strtarget,
			'tsbulan' => $this->strbulan,
			'tstahun' => $this->strtahun,
			'tsam' => $tsam,
            'title' => 'KOMET',
			'brand' => 'Ubah Target AM',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        ];
		$data['content'] = $this->load->view('modules/targetam/edit_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

	public function delete(){
        if ($this->input->post()) {
			$drd = $this->tamd->getsingletargetam($_POST['targetamid']);
			if (count($drd) > 0) {
                $this->tamd->deletetargetam($_POST['targetamid']);
			}
        }
        echo "success";
    }
}