<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpros extends CI_Controller
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
		$this->load->model('Prospect_model', 'prosmd'); 
		$this->load->model('Dropdown_model', 'drdmd'); 
		$this->load->model('Report_model', 'repmd');
    }

	private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'bower_components/bootstrap/dist/css/bootstrap.min.css'),
			array($this->config->item('skins_uri').'bower_components/font-awesome/css/font-awesome.min.css'),
			array($this->config->item('skins_uri').'bower_components/Ionicons/css/ionicons.min.css'),
			array($this->config->item('skins_uri').'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'),
			array($this->config->item('skins_uri').'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'),
			array($this->config->item('skins_uri').'bower_components/select2/dist/css/select2.min.css'),
			array($this->config->item('skins_uri').'dist/css/AdminLTE.min.css'),
			array($this->config->item('skins_uri').'dist/css/skins/_all-skins.min.css'),
			array($this->config->item('skins_uri').'plugins/pace/pace.min.css'),
			array($this->config->item('skins_uri').'plugins/iCheck/all.css'),
			array('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')
			
        );
        $js_head = array(
            array($this->config->item('skins_uri').'bower_components/jquery/dist/jquery.min.js'),
			array($this->config->item('skins_uri').'bower_components/jquery-ui/jquery-ui.min.js'),
			array($this->config->item('skins_uri').'bower_components/bootstrap/dist/js/bootstrap.min.js'),
			array($this->config->item('skins_uri').'bower_components/PACE/pace.min.js')
        );
        $js_content  = array(
            array($this->config->item('skins_uri').'bower_components/datatables.net/js/jquery.dataTables.min.js'),
            array($this->config->item('skins_uri').'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'),
            array($this->config->item('skins_uri').'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'),
            array($this->config->item('skins_uri').'bower_components/select2/dist/js/select2.full.min.js'),
			array($this->config->item('skins_uri').'bower_components/jquery-slimscroll/jquery.slimscroll.min.js'),
			array($this->config->item('skins_uri').'bower_components/fastclick/lib/fastclick.js'),
			array($this->config->item('skins_uri').'plugins/sweetalert/sweetalert.min.js'),
			array($this->config->item('skins_uri').'plugins/iCheck/icheck.min.js'),
			array($this->config->item('skins_uri').'dist/js/adminlte.min.js'),
			array($this->config->item('skins_uri').'dist/js/demo.js'),
			array('https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js')
        );
        
        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
		
		$amname = $this->session->userdata('userfullname');
		if($this->session->userdata('userid') == '21' || $this->session->userdata('userid') == '30' || $this->session->userdata('userid') == '36' || $this->session->userdata('userid') == '37' ) {
			$drd = $this->prosmd->getallprospectbyam($amname,'MESRA');
		} else {
			$drd = $this->prosmd->getallprospect('MESRA');
		}
		
		$data = [ 
			'drd' => $drd,
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'title' => 'MESRA',
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
		
		/* $tr = $this->spbmd->getallspboptoday();
		echo '<pre>';print_r($tr); exit; */
		
		$data['content'] = $this->load->view('modules/mpros/mpros_view', $data, TRUE);
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
            'title' => 'MESRA',
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
		$data['content'] = $this->load->view('modules/mpros/detail_mpros_view', $data, TRUE);
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
            'title' => 'MESRA',
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
        $data['content'] = $this->load->view('modules/mpros/add_mpros_view', $data, TRUE);
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

            'title' => 'MESRA',
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
        $data['content'] = $this->load->view('modules/mpros/edit_mpros_view', $data, TRUE);
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