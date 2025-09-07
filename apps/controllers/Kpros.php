<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kpros extends CI_Controller
{
	public $intprospectid;
	public $intuserid;
	public $strorderid;
	
	public $strcode;
	public $strunit;
	public $intdivision;
	public $intsegment; 
	
	public $stramuser; 
	public $stramkomet; 
	
	public $intvalue; 
    public $strlat;
    public $strlong;
    public $strnotes;
	public $strreqdate; 
	public $intstatus; 

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
		$this->load->model('Prospect_model', 'prosmd');
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
            array($this->config->item('skins_uri').'js/widget/ui-card-init.js'),
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
		
		$amname = $this->session->userdata('userfullname');
		if($this->session->userdata('userid') == '21' || $this->session->userdata('userid') == '30' || $this->session->userdata('userid') == '36' || $this->session->userdata('userid') == '37' ) {
			$drd = $this->prosmd->getallprospectbyam($amname,'KOMET');
		} else {
			$drd = $this->prosmd->getallprospect('KOMET');
		}
		
		$data = [ 
			'drd' => $drd,
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'title' => 'KOMET',
			'brand' => 'Prospect Sales', 
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		]; 
		
		/* $timestamp = mt_rand(1, time());
		echo '<pre>';print_r($timestamp); exit;  */
		
		$data['content'] = $this->load->view('modules/kpros/kpros_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    } 
	
	public function details() {
		$drd = $this->prosmd->getsingleprospect($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intprospectid = $row['prospectid'];
				$this->intuserid = $row['userid'];
				
				$this->strcode = $row['code'];
				$this->strunit = $row['unit'];
				$this->intdivision = $row['division'];
				$this->intsegment = $row['segment'];
				
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				
				$this->intvalue = $row['value'];
				$this->strlat = $row['latitude'];
				$this->strlong = $row['longtitude'];
				$this->strnotes = $row['notes'];
				
				$this->strreqdate = date('d-m-Y', strtotime($row['reqdate'])); 
				$this->intstatus = $row['status'];
            }
        } 
		
		$data = [
			'prospectid' => $this->intprospectid,
			'code' => $this->strcode,
			'unit' => $this->strunit,
			'divisi' => $this->intdivision,
			'segmen' => $this->intsegment,
			'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'value' => strrev(implode('.',str_split(strrev(strval($this->intvalue)),3))), 
			'reqdate' => $this->strreqdate,
			'statpros' => $this->intstatus,
			'notes' => $this->strnotes,
            'title' => 'KOMET',
			'brand' => 'Prospect Sales', 
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        ];
		$data['content'] = $this->load->view('modules/kpros/detail_kpros_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function addnew() {
		if (isset($_POST['cmdsave'])) { 
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtValue', 'Nilai', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
                $this->prosmd->intuserid = $this->session->userdata('userid');
				$this->prosmd->strorderid = '';

				$this->prosmd->intdivision = $this->input->post('optDivision');
				$this->prosmd->intsegment = $this->input->post('optSegment');
				
				$this->prosmd->stramuser = $this->input->post('txtAmuser');
				$this->prosmd->stramkomet = $this->input->post('txtAmkomet');
				
				$val = $this->input->post('txtValue');
				$this->prosmd->intvalue =  str_replace(".", "", $val);
				
				$reqdat = $this->input->post('txtReqdate');
				$this->prosmd->strreqdate = date('Y-m-d', strtotime($reqdat)); 
				
				$this->prosmd->intstatus = '0';
                $this->prosmd->strlat = $this->input->post('txtLat');
                $this->prosmd->strlong = $this->input->post('txtLong');
                $this->prosmd->strnotes = $this->input->post('txtNotes');
				
				/* add autonumbers */
				// $code = $this->getid();
				// $addcode = $code[0]['lastid']+1;
				// $formatcode = str_pad($addcode, 4, '0', STR_PAD_LEFT); 
				
				$this->prosmd->strcode = $this->input->post('txtCode');
				
				$this->prosmd->addprospect();
                redirect(base_url($this->router->fetch_class()));
				
            }
        }
		$code = $this->getid();
		if($code == null) {
			$formatcode = '0001';
		} else {
			$addcode = $code[0]['lastid']+1;
			$formatcode = str_pad($addcode, 4, '0', STR_PAD_LEFT);
		}
		
		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Buat baru prospect order',
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'code' => $formatcode,
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		$data['content'] = $this->load->view('modules/kpros/add_kpros_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function editdata() {
		if (isset($_POST['cmdsave'])) { 
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtValue', 'Nilai', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
                $this->prosmd->intuserid = $this->session->userdata('userid');
				$this->prosmd->strorderid = '';

				$this->prosmd->intprospectid = $this->input->post('txtProspectid');
				$this->prosmd->intdivision = $this->input->post('optDivision');
				$this->prosmd->intsegment = $this->input->post('optSegment');
				
				$this->prosmd->stramuser = $this->input->post('txtAmuser');
				$this->prosmd->stramkomet = $this->input->post('txtAmkomet');
				
				$val = $this->input->post('txtValue');
				$this->prosmd->intvalue =  str_replace(".", "", $val);
				
				$reqdat = date('Y-m-d', strtotime($this->input->post('txtReqdate')));
				$this->prosmd->strreqdate = $reqdat;
				
				$this->prosmd->intstatus = $this->input->post('optStatus');
				
				/* add autonumbers */
				// $code = $this->getid();
				// $addcode = $code[0]['lastid']+1;
				// $formatcode = str_pad($addcode, 4, '0', STR_PAD_LEFT); 
				
				$this->prosmd->strcode = $this->input->post('txtCode');

				$this->prosmd->editprospect();
                redirect(base_url($this->router->fetch_class()));
				
            }
        }
		
		$drd = $this->prosmd->getsingleprospect($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intprospectid = $row['prospectid'];
				$this->intuserid = $row['userid'];
				
				$this->strcode = $row['code'];
				$this->strunit = $row['unit'];
				$this->intdivision = $row['division'];
				$this->intsegment = $row['segment'];
				
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				
				$this->intvalue = $row['value'];
				$this->strreqdate = date('d-m-Y', strtotime($row['reqdate'])); 
				$this->intstatus = $row['status'];
            }
        }
		// $ddd = $this->ordermd->getallnopeskomet();
		// echo '<pre>'; print_r($ddd); exit;
		$data = [ 
			'prospectid' => $this->intprospectid,
			'code' => $this->strcode,
			'unit' => $this->strunit,
			'divisi' => $this->intdivision,
			'segmen' => $this->intsegment,
			'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'value' => strrev(implode('.',str_split(strrev(strval($this->intvalue)),3))), 
			'reqdate' => $this->strreqdate,
			'statpros' => $this->intstatus, 
			
			'title' => 'KOMET',
			'brand' => 'Buat baru prospect order',
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'datainv' => $this->ordermd->getallnopeskomet(),
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		$data['content'] = $this->load->view('modules/kpros/edit_kpros_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function getid(){
		$id = $this->prosmd->getmaxcode();
		return $id;
	}

    public function delete(){
        if ($this->input->post()) {
            $this->prosmd->deletepros($_POST['prospectid']);
            echo "success"; /* mengembalikan kata 'success' untuk dikenali diview */
        }
    }
	
}