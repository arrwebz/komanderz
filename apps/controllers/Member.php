<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public $intmemberid;
	public $strnik;
	public $strname; 
	public $strdivision;
	public $strsegment;
	public $strband; 
	public $strjoindate;
	public $strbasicfee;
	public $intstatus;
	public $strnote;
	
    public $strtlp;
    public $stremail;
	public $strloc;
    public $strbank; 
    public $straccnumber;
    public $straccname;
	
	public $strbandname;
	public $strbandvalue;
	
	public $strwajib;
	public $strsukarela;
	public $strsaldowajib;
	public $strsaldosukarela;
	public $strtotalsaldo;
	public $strwithdraw;
	public $strwithdrawnote;
	public $strdepositdate;
	
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
		$this->load->model('Member_model', 'mbrmd');
		$this->load->model('Dropdown_model', 'drdmd'); 
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
		/* $data = $this->mbrmd->getallmember();
		echo '<pre>';
		print_r($data); exit; */
		$data = [ 
			'drd' => $this->mbrmd->getallmember(),
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'totalmember' => $this->mbrmd->countmember(),
			'totalaktifdes' => $this->mbrmd->countmemberades(),
			'totalaktifdgs' => $this->mbrmd->countmemberadgs(),
			'totalaktifndegs' => $this->mbrmd->countmemberanondegs(),
			'totalistimewa' => $this->mbrmd->countspecialmember(),
			'title' => 'Keanggotaan',
			'brand' => 'Data Anggota',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/member/member_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function detail() {
		$drd = $this->mbrmd->getsinglemember($this->uri->segment(3));
		if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intmemberid = $row['memberid'];
				$this->strnik = $row['nik'];
                $this->strname = $row['name'];
				$this->strdivision = $row['division'];
				$this->strsegment = $row['segment'];
				$this->strband = $row['band'];
				$this->strtlp = $row['telp'];
				$this->stremail = $row['email1'];
				$this->strloc = $row['location'];
				$this->strbank = $row['bank'];
                $this->straccnumber = $row['norek'];
                $this->straccname = $row['namarek'];
                $this->strjoinmonth = $row['joinmonth'];
                $this->strjoinyear = $row['joinyear'];
                $this->intstatus = $row['status'];
                $this->strcruser = $row['cruser'];
                $this->strchdat = $row['crdat'];
            }
        }
		/* $aaa = $this->mbrmd->gettotaltariksimpanbynik($this->strnik);
		var_dump($aaa); exit; */
		$data = [ 
			'memberid' => $this->intmemberid, 
			'nik' => $this->strnik, 
			'nama' => $this->strname,
			'divisi' => $this->strdivision, 
			'segmen' => $this->strsegment,
			'band' => $this->strband,
            'telp' =>   $this->strtlp, 
            'email' =>  $this->stremail,
            'loker' =>  $this->strloc,
            'bank' =>  $this->strbank,
			'norek' =>  $this->straccnumber,
			'namarek' => $this->straccname,
			'bulanmasuk' => $this->strjoinmonth,
			'tahunmasuk' => $this->strjoinyear,
			'status' => $this->intstatus, 
			'saldoanggota' => $this->mbrmd->getsaldosimpanbynik($this->strnik),
			'payrollsimpanan' => $this->mbrmd->getpayrollsimpanbynik($this->strnik),
			'totalpayroll' => $this->mbrmd->gettotalpayrollbynik($this->strnik),
			'transfersimpanan' => $this->mbrmd->gettransfersimpanbynik($this->strnik),
			'totaltransfer' => $this->mbrmd->gettotaltransferbynik($this->strnik),
			'penarikan' => $this->mbrmd->getpenarikanbynik($this->strnik),
			'totalpenarikan' => $this->mbrmd->gettotalpenarikanbynik($this->strnik),
			'pinjamankoptel' => $this->mbrmd->getpinkoptelbynik($this->strnik),
			//'totaltariksimpan' => $this->mbrmd->gettotaltariksimpanbynik($this->strnik),
			//'totalsimpan' => $this->mbrmd->gettotalsimpanbynik($this->strnik),
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,	
            'title' => 'Detail Anggota',
			'brand' => 'KOMET',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        ];
		$data['content'] = $this->load->view('modules/member/detail_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	} 
	
	public function add() {
		if (isset($_POST['cmdsave'])) { 
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtNIK', 'NIK Anggota', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time(); 
				
				$this->mbrmd->strnik = $this->input->post('txtNIK');
				$this->mbrmd->strname = strtoupper($this->input->post('txtName'));
				$this->mbrmd->strdivision = $this->input->post('optDivision');
				$this->mbrmd->strsegment = $this->input->post('optSegment');
				$this->mbrmd->strband = $this->input->post('optBand');
				$this->mbrmd->strloc = $this->input->post('optLoc');
				
				//tabel simpanan
				$this->mbrmd->strwajib = $this->input->post('optOblvalue');
				$this->mbrmd->strsukarela = $this->input->post('txtVolvalue');
				$this->mbrmd->strsaldowajib = '';
				$this->mbrmd->strsaldosukarela = '';				
				$this->mbrmd->strtotalsaldo = '';				
				$this->mbrmd->strwithdraw = '';				
				$this->mbrmd->strwithdrawnote = '';	
				
				$this->mbrmd->strdepositdate = mdate('Y-m-01', $time);	
				$formatdate = strtotime(date('Y-m-01', strtotime($this->input->post('txtJoindate'))).'+1 month');
				$depositdate = date('Y-m-d',$formatdate);
				echo '<pre>';
				print_r($depositdate); exit;
				
				$joindate = $this->input->post('txtJoindate');
				$this->mbrmd->strjoindate = date('Y-m-d', strtotime($joindate));
				
				$this->mbrmd->strbasicfee = $this->input->post('txtBasicvalue');
				$this->mbrmd->intstatus = $this->input->post('optStatus');
				$this->mbrmd->strnote = $this->input->post('optNote');
				
				$this->mbrmd->strcruser = $this->session->userdata('userid');
                $this->mbrmd->strcrdat = mdate($datestring, $time);
				
				$this->mbrmd->intmemberid = $this->mbrmd->addgetmemberid();
				
				$this->mbrmd->strtlp = $this->input->post('txtTelp');
				$this->mbrmd->stremail = $this->input->post('txtEmail');
				$this->mbrmd->straccnumber = $this->input->post('txtAccnum');
				
				$valbank = $this->input->post('optBank');
				if ($valbank == 'other') {
					$this->mbrmd->strbank = $this->input->post('txtBankother');
				} else {
					$this->mbrmd->strbank = $this->input->post('optBank');
				}				
				
				$this->mbrmd->addmemberinfo();
                redirect(base_url($this->router->fetch_class()));
				
            }
        }
		$data = [ 
			'title' => 'Add New Member',
			'brand' => 'Member',
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'memberband' => $this->drdmd->getallband(),
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
		];
		$data['content'] = $this->load->view('modules/member/add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	

}