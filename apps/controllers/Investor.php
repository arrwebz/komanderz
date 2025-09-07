<?php defined('BASEPATH') or exit('No direct script access allowed');

class Investor extends CI_Controller
{ 
	//tb_investor
	public $intinvestorid;
	public $strname;
	public $strlocation;
	public $strktp;
	public $strnpwp;
	public $stradrs;
	public $strcategory;
	public $strband;
	public $strjoindate;
	public $strnotes;	
	
	//tb_investdana
	public $intdanaid;
	public $strcode;
	public $strcontract;
	public $strinvestname;
	public $strstartdate;
	public $strendate;
	public $intperiode;
	public $intinterest;
	public $inttotalinvest;
	public $intfeeinvest;
	public $strdbank;
	public $strdrek;
	public $strdname;
	public $strdnote;
	public $strdstatus;	
	
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
            'form_validation',
			'html2pdf'
        ];
        $this->load->library($lib);
		$this->load->model('Investor_model', 'invsmd'); 
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
			array($this->config->item('skins_uri').'dist/js/adminlte.min.js'),
			array($this->config->item('skins_uri').'dist/js/demo.js'),
			array('https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js')
        );
        
        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
		$contractend = $this->repmd->getsumcontractendbymonth(); 
		//echo '<pre>'; print_r($contractend); exit;
		$data = [ 
			'drd' => $this->invsmd->getalldanainvestor(),
			'invname' => $this->drdmd->getallinvestor(),
			'contractend' => $contractend,
			'title' => 'Investor',
			'brand' => 'List Investor',
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
		
		$data['content'] = $this->load->view('modules/investor/investor_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function details() {
		$drd = $this->invsmd->getsinglecontract($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				
				$this->intdanaid = $row['indanaid'];
				$this->strcode = $row['code'];
				$this->strcontract = $row['contract'];
				$this->strinvestname = $row['investname'];
				$this->strstartdate = $row['startdate'];
				$this->strendate = $row['endate'];
				$this->intperiode = $row['periode'];
				$this->intinterest = $row['interest'];
				$this->inttotalinvest = $row['totalinvest'];
				$this->intfeeinvest = $row['feeinvest'];
				$this->strdbank = $row['danabank'];
				$this->strdrek = $row['danarek'];
				$this->strdname = $row['daname'];
				$this->strdnote = $row['dananote'];
				$this->strdstatus = $row['status'];	
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$data = [
            'danaid' => $this->intdanaid,
			'kodekontrak' => $this->strcode,
             'kontrak' =>   $this->strcontract,
			 'invname' => $this->strinvestname,
             'startdate' =>   $this->strstartdate,
             'endate' =>  $this->strendate,
			 'periode' => $this->intperiode,
			'interest' => $this->intinterest,
			'totalinvest' =>	strrev(implode('.',str_split(strrev(strval($this->inttotalinvest)),3))),
			'feeinvest' =>	strrev(implode('.',str_split(strrev(strval($this->intfeeinvest)),3))),
			'dbank' => $this->strdbank,
			'drek' => $this->strdrek,
			'dname' => $this->strdname,
			'dnote' => $this->strdnote,
			'status' => $this->strdstatus,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Investor',
			'brand' => 'Detail Kontrak',
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
		$data['content'] = $this->load->view('modules/investor/detail_contract_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function profiles() {
		$drd = $this->invsmd->getsingleprofile($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				
				$this->intinvestorid = $row['investorid'];
				$this->strname = $row['name'];
				$this->strlocation = $row['location'];
				$this->strktp = $row['ktp'];
				$this->strnpwp = $row['npwp'];
				$this->stradrs = $row['address'];
				$this->strcategory = $row['category'];
				$this->strband = $row['band'];
				$this->strjoindate = $row['joindate'];
				$this->strnotes = $row['notes'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		$t = $this->invsmd->gettotalinvestorsaldo($this->intinvestorid);
		$data = [
            'investorid' => $this->intinvestorid,
			 'invname' => $this->strname,
             'location' =>   $this->strlocation,
             'ktp' =>  $this->strktp,
			 'npwp' => $this->strnpwp,
			'adrs' => $this->stradrs,
			'totalinvest' =>	strrev(implode('.',str_split(strrev(strval($t[0]['totalinvest'])),3))),
			'category' => $this->strcategory,
			'band' => $this->strband, 
			'investdate' => $this->strjoindate,
			'notes' => $this->strnotes,
			'drc' => $this->invsmd->getallcontractinvestor($this->intinvestorid), 
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Investor',
			'brand' => 'Detail Kontrak',
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
		$data['content'] = $this->load->view('modules/investor/profile_investor_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function addinvestor() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
            $this->form_validation->set_rules('txtName', 'Nama Investor', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->invsmd->strname = $this->input->post('txtName');
				$this->invsmd->strlocation = $this->input->post('txtLoc');
				$this->invsmd->strcategory = $this->input->post('txtCat');
				$this->invsmd->strband = $this->input->post('txtBand');
				$this->invsmd->strktp = $this->input->post('txtKtp');
				$this->invsmd->strnpwp = $this->input->post('txtNpwp');
				$this->invsmd->stradrs = $this->input->post('txtAdrs');
				
				$jdate = $this->input->post('optJoindate');
				$this->invsmd->strjoindate = date('Y-m-d', strtotime($jdate)); 
				$this->invsmd->strnotes = $this->input->post('txtNotes');
				
				$this->invsmd->strcruser = $this->session->userdata('userid');
                $this->invsmd->strcrdat = mdate($datestring, $time);
				
				$this->invsmd->addinvestor();
				
                redirect(base_url($this->router->fetch_class()));
				
            }
        }

		$data = [ 
			'title' => 'Investor',
			'brand' => 'Tambah Investor Baru',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'), 
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		$data['content'] = $this->load->view('modules/investor/add_investor_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}	
	
	function addcontract() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:white;"> %s still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
            $this->form_validation->set_rules('txtKodenomor', 'Kode Nomor', 'required', $error);
            $this->form_validation->set_rules('txtBank', 'Bank', 'required', $error);
            $this->form_validation->set_rules('txtRek', 'Nomor Rekening', 'required', $error);
            $this->form_validation->set_rules('txtRekname', 'atas nama bank', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->invsmd->intinvestorid = $this->input->post('optInvestor');
				
				$this->invsmd->strcontract = $this->input->post('txtKontrak');
				$this->invsmd->strinvestname = '';
				
				$sdate = $this->input->post('optSdate');
				$this->invsmd->strstartdate = date('Y-m-d', strtotime($sdate)); 
				
				$edate = $this->input->post('optEdate');
				$this->invsmd->strendate = date('Y-m-d', strtotime($edate)); 
				
				$this->invsmd->intperiode = $this->input->post('txtPeriode');
				$this->invsmd->intinterest = $this->input->post('txtBunga');
				
				$td = $this->input->post('txtTotalinvest');
				$this->invsmd->inttotalinvest =  str_replace(".", "", $td);
				
				$fd = $this->input->post('txtFeeinvest');
				$this->invsmd->intfeeinvest =  str_replace(".", "", $fd);
				
				$this->invsmd->strdbank = $this->input->post('txtBank');
				$this->invsmd->strdrek = $this->input->post('txtRek');
				$this->invsmd->strdname = $this->input->post('txtRekname');
				
				$this->invsmd->strdnote = $this->input->post('txtNotes');
				$this->invsmd->strdstatus = '1';
				
				/* KODE NOMOR ORDER 1234/KOMET/PKS/2020*/
			    $intnomor = $this->input->post('txtKodenomor');
				$year = date('y', strtotime($sdate));
				$strformat = $intnomor ."/KOMET/PKS/" . $year;
				$this->invsmd->strcode = $strformat;
				
				$this->invsmd->strcruser = $this->session->userdata('userid');
                $this->invsmd->strcrdat = mdate($datestring, $time); 
				
				$this->invsmd->addcontract();
                redirect(base_url($this->router->fetch_class()));
				
            }
        }

		$data = [ 
			'title' => 'Investor',
			'brand' => 'Tambah Investor Baru',
			'invname' => $this->drdmd->getallinvestor(),

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'), 
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate'),
			'code_kontrak' => $this->invsmd->getlastcodekontrak(),
		];

		$data['content'] = $this->load->view('modules/investor/add_contract_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

	function checkname(){
        $post = $this->input->post();
        if($post){
            $check = $this->invsmd->checkinvestorname(trim($post['txtName']));

            if(count($check) > 0){
                $res = array(
                    'status' => 'failed',
                    'msg' => 'Nama Sudah Ada',
                );
            }else{
                $res = array(
                    'status' => 'success',
                    'msg' => '',
                );
            }

            echo  json_encode($res);
        }
    }
	
	function indodate($tanggal, $cetak_hari = false){
		$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
				
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}

	function print(){
        $id = $this->uri->segment(3);
        $drd = $this->invsmd->getsinglecontract($id);
        if(empty($drd)){
            redirect(base_url().$this->router->fetch_class());
        }

        $name = trim($drd[0]['investname']).' Kontrak Tgl '. onlydate($drd[0]['startdate']) .'.pdf';

        $data = [
            'drd' => $drd,
            'name' => $name,

            'title' => $name,
            'brand' => 'Cetak Kontrak',
            'userid' => $this->session->userdata('userid'),
            'userlogin' => $this->session->userdata('username'),
            'fullname' => $this->session->userdata('userfullname'),
            'userrole' => $this->session->userdata('userrole')
        ];

        $html = $this->load->view('modules/investor/print_contract_view', $data, true);
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream($name, array("Attachment"=>0));
    }
}