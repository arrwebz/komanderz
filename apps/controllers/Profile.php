<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public $intuserid;
	public $introleid;
	public $intgroupid;
	
	public $strrolecode;
	public $strrolename;
	public $strgroupcode;
	
	public $intusernik;
	public $strusername;
	public $strpassword;
	public $stremail;
	public $strtelp;
	public $strfullname;
	public $strposition;
	public $strjoindate;
	
	public $strphoto;
	public $intstatus;
	
	public $intuserinfoid;
	public $strgender;
	public $straddress;
	public $streducation;
	public $stridcard;
	public $strnpwp;
	public $strpassport;
	public $strstatkerja;
	public $strlocation;
	
	public $intsalaryid;
	public $strunit;
	public $strtypestaff;
	public $strbasicsal;
	public $strstatsal;
	public $strperdsal;
	public $stredsal;
	public $strconsal;
	public $strtransal;
	public $strvsal;
	public $strpostsal;
	public $strstgcsal;
	public $strthp;
	public $strdraftdat;
	public $strcutsal;
	public $strtotalsal;
	
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
            'date',
			'terbilang'
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation',
			'html2pdf'
        ];
        $this->load->library($lib);
		$this->load->model('User_model', 'usermd');
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
			array('https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );
        
        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
	public function index() {
        redirect(site_url('attendances'));
		$drd = $this->usermd->getsingleuserprofile($this->session->userdata('userid'));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intuserinfoid = $row['userinfoid'];
				$this->intuserid = $row['userid'];
				$this->strfullname = $row['fullname'];
				$this->strposition = $row['position'];
				$this->strgender = $row['gender'];
				$this->strmarital = $row['marital'];
				$this->strblood = $row['bloodtype'];
				$this->strbplace = $row['bplace'];
				$this->strdob = $row['dob'];
				$this->strreligion = $row['religion'];
				$this->straddress = $row['address'];
                $this->streducation = $row['education'];
                $this->stridcard = $row['idcard'];
                $this->strnpwp = $row['npwp'];
                $this->strpassport = $row['passport'];
                $this->strpassportexp = $row['passportexp'];
                $this->strstatkerja = $row['userstatus'];
                $this->strlocation = $row['location'];
                $this->intusernik = $row['nik'];
                $this->stremail = $row['email'];
                $this->strtelp = $row['telp'];
                $this->strgroupcode = $row['groupcode'];
                $this->strphoto = $row['photo'];
                $this->strshirt = $row['sizeshirt'];
                $this->strjacket = $row['sizejacket'];
                $this->strpants = $row['sizepants'];
                $this->strshoes = $row['sizeshoes'];
                $this->intleavebalance = $row['leavebalance'];
            }
        }
		
		$data = [
            'staffamily' => $this->usermd->getuserfamily($this->intuserid),
            'staffsalary' => $this->usermd->getusersalary($this->intuserid),
            'allstaffsalary' => $this->usermd->getallusersalary(),
            'staffid' => $this->intuserid,
			'userinfoid' => $this->intuserinfoid,
			'usernik' => $this->intusernik,  
			'staffname' => $this->strfullname,  
			'staffphoto' => $this->strphoto,  
			'staffposition' => $this->strposition,  
			'saldocuti' => $this->intleavebalance,  
			'email' => $this->stremail,  
			'telp' => $this->strtelp, 
			'gender' => $this->strgender,
			'statusnikah' => $this->strmarital,
			'goldarah' => $this->strblood,
			'agama' => $this->strreligion,
			'tlahir' => $this->strbplace,
			'ttl' => $this->strdob,
			'address' => $this->straddress,
			'education' => $this->streducation,
             'ktp' =>   $this->stridcard, 
             'npwp' =>   $this->strnpwp,
			 'paspor' => $this->strpassport, 
			 'pasporex' => $this->strpassportexp, 
             'statuskerja' =>  $this->strstatkerja, 
             'divisi' =>  $this->strgroupcode, 
             'baju' =>  $this->strshirt, 
             'jaket' =>  $this->strjacket, 
             'celana' =>  $this->strpants, 
             'sepatu' =>  $this->strshoes, 
            'title' => 'User Profile',
			'brand' => '',
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
			'joindate' => $this->session->userdata('joindate'),
			'location' => $this->session->userdata('location')
        ];
		
		$data['content'] = $this->load->view('modules/profile/profile_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function detailsalary() {
		$drd = $this->usermd->getsingleusersalary($this->uri->segment(3)); 
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intsalaryid = $row['salaryid'];
				$this->intuserid = $row['userid'];
				$this->intusernik = $row['nik'];
				$this->strlocation = $row['location'];
				$this->strgender = $row['gender'];
				$this->strfullname = $row['fullname'];
				 $this->strunit = $row['unit'];
				 $this->strtypestaff = $row['typestaff'];
				 $this->strbasicsal = $row['basicsalary'];
				 $this->strstatsal = $row['statsalary'];
				 $this->strperdsal = $row['perdsalary'];
				 $this->stredsal = $row['edsalary'];
				 $this->strconsal = $row['consalary'];
				 $this->strtransal = $row['transalary'];
				 $this->strvsal = $row['vsalary'];
				 $this->strpostsal = $row['postsalary'];
				 $this->strstgcsal = $row['strsalary'];
				 $this->strthp = $row['thp'];
				 $this->strdraftdat = $row['draftdate'];
				 $this->strcutsal = $row['cutsalary'];
				 $this->strtotalsal = $row['totalsalary'];
            }
        }
				
		if(empty($this->strcutsal)) {
			$potongan = '0';
			$totalgaji = $this->strthp;
		} else {
			$potongan = $this->strcutsal;
			$totalgaji = $this->strtotalsal;
		}
		
		$data = [
			'salaryid' => $this->intsalaryid,
			'userstaffid' => $this->intuserid,  
			'usernik' => $this->intusernik,  
			'userlocation' => $this->strlocation,  
			'usergender' => $this->strgender,  
			'staffname' => $this->strfullname,  
			'tstaff' => $this->strtypestaff,
			'bscsal' => $this->strbasicsal,
			'statsal' => $this->strstatsal,
			'perdsal' => $this->strperdsal,
			'edsal' => $this->stredsal,
			'consal' => $this->strconsal,
			'transal' => $this->strtransal,
			'vsal' => $this->strvsal, 
			'postsal' => $this->strpostsal,
			'strsal' => $this->strstgcsal,
			'inthp' => $this->strthp,
			'draftdat' => $this->strdraftdat,
			'cutsal' => $potongan,
			'totalsal' => $totalgaji,
			'wordtotal' => ucwords(number_to_words($totalgaji)),
			'unit' => $this->strunit,  
            'title' => 'My Salary',
			'brand' => '',
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
			'joindate' => $this->session->userdata('joindate'),
			'location' => $this->session->userdata('location')
        ];
		
		$data['content'] = $this->load->view('modules/profile/detail_salary_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function printsalary() {
		$drd = $this->usermd->getsingleusersalary($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intsalaryid = $row['salaryid'];
				$this->intuserid = $row['userid'];
				$this->intusernik = $row['nik'];
				$this->strlocation = $row['location'];
				$this->strgender = $row['gender'];
				$this->strfullname = $row['fullname'];
				 $this->strunit = $row['unit'];
				 $this->strtypestaff = $row['typestaff'];
				 $this->strbasicsal = $row['basicsalary'];
				 $this->strstatsal = $row['statsalary'];
				 $this->strperdsal = $row['perdsalary'];
				 $this->stredsal = $row['edsalary'];
				 $this->strconsal = $row['consalary'];
				 $this->strtransal = $row['transalary'];
				 $this->strvsal = $row['vsalary'];
				 $this->strpostsal = $row['postsalary'];
				 $this->strstgcsal = $row['strsalary'];
				 $this->strthp = $row['thp'];
				 $this->strdraftdat = $row['draftdate'];
				 $this->strcutsal = $row['cutsalary'];
				 $this->strtotalsal = $row['totalsalary'];
            }
        }
		
		if(empty($this->strcutsal)) {
			$potongan = '0';
			$totalgaji = $this->strthp;
		} else {
			$potongan = $this->strcutsal;
			$totalgaji = $this->strtotalsal;
		}
		
		$this->html2pdf->folder('./public/files/pdfs/');
		$name = 'Slip-Gaji-'.$this->intusernik.'.pdf';
		
		$data = [
			'salaryid' => $this->intsalaryid,
			'userstaffid' => $this->intuserid,  
			'usernik' => $this->intusernik,  
			'userlocation' => $this->strlocation,  
			'usergender' => $this->strgender,  
			'staffname' => $this->strfullname,  
			'tstaff' => $this->strtypestaff,
			'bscsal' => $this->strbasicsal,
			'statsal' => $this->strstatsal,
			'perdsal' => $this->strperdsal,
			'edsal' => $this->stredsal,
			'consal' => $this->strconsal,
			'transal' => $this->strtransal,
			'vsal' => $this->strvsal, 
			'postsal' => $this->strpostsal,
			'strsal' => $this->strstgcsal,
			'inthp' => $this->strthp,
			'draftdat' => $this->strdraftdat,
			'cutsal' => $potongan,
			'totalsal' => $totalgaji,
			'wordtotal' => ucwords(number_to_words($totalgaji)),
			'unit' => $this->strunit,  
            'title' => 'My Salary',
			'brand' => '',
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
			'joindate' => $this->session->userdata('joindate'),
			'location' => $this->session->userdata('location')
        ];
		
		//$data['content'] = $this->load->view('modules/profile/detail_salary_view', $data, TRUE);
        //$this->load->view('templates/base', $data, FALSE);
		
		// Get output html
        $html = $this->load->view('modules/profile/print_salary_view', $data, true);
        
        // Load pdf library
        $this->load->library('pdf'); 
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream($name, array("Attachment"=>0));
    }
		
	public function add() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtUsername', 'Username', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->usermd->intnik = $this->input->post('txtNik');
                $this->usermd->strusername = $this->input->post('txtUsername');
				$pwd = $this->input->post('txtPassword');
				$opt = ['cost'=>12];
				$pwdcrypt = password_hash($pwd, PASSWORD_BCRYPT, $opt);
				$this->usermd->strpassword = $pwdcrypt;
				$this->usermd->stremail = $this->input->post('txtEmail');
				$this->usermd->strtelp = $this->input->post('txtTelp');
                $this->usermd->strfullname = $this->input->post('txtFullname');
                $this->usermd->strposition = $this->input->post('txtPosition');
				$joindat = $this->input->post('txtJoindate');
				$this->usermd->strjoindate = date('Y-m-d', strtotime($joindat)); 
								
				if (! empty($_FILES['txtPhoto']['name'])) {
                    $this->usermd->strphoto = $this->doupload();
                } else {
					$this->usermd->strphoto = $this->input->post('hdnPhoto');
				}
				$this->usermd->introleid = $this->input->post('optRole');
				$this->usermd->intgroupid = $this->input->post('optGroup');
				$this->usermd->intstatus = $this->input->post('optStatus');
				
                $this->usermd->strcruser = $this->session->userdata('userid');
                $this->usermd->strcrdat = mdate($datestring, $time);
				$this->usermd->strchuser = '';
                $this->usermd->strchdat = '';
				
                $this->usermd->adduser();
                redirect(base_url($this->router->fetch_class()));
            }
        }
		$data = [ 
			'roleid' => '',
			'groupid' => '',
			'userrole' => $this->usermd->getuserole(),
			'usergroup' => $this->usermd->getusergroup(),
			'title' => 'Tambah Akun',
			'brand' => 'Pengguna',
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
		$data['content'] = $this->load->view('modules/user/add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function edit() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtUsername', 'Username', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->usermd->intnik = $this->input->post('txtNik');
				$this->usermd->intuserid = $this->input->post('hdnId');
                $this->usermd->strusername = $this->input->post('txtUsername');
				if ($this->input->post('txtPassword') != '') {
					$pwd = $this->input->post('txtPassword');
					$opt = ['cost'=>12];
					$pwdcrypt = password_hash($pwd, PASSWORD_BCRYPT, $opt);
                    $this->usermd->strpassword = $pwdcrypt;
					} else {
						$this->usermd->strpassword = $this->input->post('hdnOldpassword');
					}
				$this->usermd->stremail = $this->input->post('txtEmail');
				$this->usermd->strtelp = $this->input->post('txtTelp');
                $this->usermd->strfullname = $this->input->post('txtFullname');
                $this->usermd->strposition = $this->input->post('txtPosition');
				$joindat = $this->input->post('txtJoindate');
				$this->usermd->strjoindate = date('Y-m-d', strtotime($joindat)); 
								
				if (! empty($_FILES['txtPhoto']['name'])) {
                    $this->usermd->strphoto = $this->doupload();
                } else {
					$this->usermd->strphoto = $this->input->post('hdnPhoto');
				}
				
				$this->usermd->introleid = $this->input->post('optRole');
				$this->usermd->intgroupid = $this->input->post('optGroup');
				$this->usermd->intstatus = $this->input->post('optStatus');
				
                $this->usermd->strchuser = $this->session->userdata('userid');
                $this->usermd->strchdat = mdate($datestring, $time);
				
                $this->usermd->edituser();
                redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$drd = $this->usermd->getsingleuser($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intuserid = $row['userid'];
				$this->introleid = $row['roleid'];
				$this->intgroupid = $row['groupid'];
				$this->intusernik = $row['nik'];
                $this->strusername = $row['username'];
                $this->strpassword = $row['password'];
                $this->stremail = $row['email'];
                $this->strtelp = $row['telp'];
				$this->strfullname = $row['fullname'];
				$this->strposition = $row['position'];
				$this->strjoindate = $row['joindate']; 
				$this->strphoto = $row['photo'];
				$this->intstatus = $row['status'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		
		$data = [
            'useraccountid' => $this->intuserid,
			'roleid' => $this->introleid,
			'groupid' => $this->intgroupid,
			'userrole' => $this->usermd->getuserole(),
			'usergroup' => $this->usermd->getusergroup(),
			'nik' => $this->intusernik,
			'username' => $this->strusername,
             'password' =>   $this->strpassword,
             'email' =>   $this->stremail,
			 'telp' => $this->strtelp,
             'realname' =>  $this->strfullname,
			 'userposition' => $this->strposition,
			 'userjoindate' => date('d-m-Y', strtotime($this->strjoindate)),
			 'photo' => $this->strphoto,			 
			'status' =>	$this->intstatus,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Ubah Akun',
			'brand' => 'Pengguna',
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
		$data['content'] = $this->load->view('modules/user/edit_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	function delete(){
		
        if ($this->input->post()) {
			$drd = $this->usermd->getsingleuser($_POST['userid']);
			if (count($drd) > 0) {
				foreach ($drd as $row) {
					$this->strphoto = $row['photo'];
				}
			}
		/* $folder = $this->router->fetch_class();
		$filename = $this->config->item('uploads_dir') . $folder . '/' . $this->strphoto;
		if (file_exists($filename)) {
			unlink($filename);
		} */
            //$this->usermd->deleteuser($_POST['userid']);
            echo "success";
        }
    }
	
	public function doupload()
    {
        $folder = $this->router->fetch_class();
        $path = $this->config->item('uploads_dir') . $folder;
		
		
		$search = ['@<script[^>]*?>.*?</script>@si', '@<[\/\!]*?[^<>]*?>@si', '@<style[^>]*?>.*?</style>@siU', '@<![\s\S]*?--[ \t\n\r]*>@' ];
		
		$normal = preg_replace($search,'',$_FILES ['txtPhoto'] ['name']);
        $filename = strtolower( str_replace(" ","-",$normal) );
		
		
        if (! file_exists($path)) {
            if (! mkdir($path, 0777, true)) {
                print_r(error_get_last());
            }
        }

        $config = [
            'upload_path' => $path.'/',
            'allowed_types' => 'jpg|png',
            'max_size' => '2000',
			'file_ext_tolower' => TRUE,
			'remove_spaces' => TRUE,
			'detect_mime' => TRUE,
			'mod_mime_fix' => TRUE,
			'file_name' => $filename
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $txtupload = 'txtPhoto';
        if ($this->upload->do_upload($txtupload)) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error_doupload',$this->upload->display_errors('<div style="color:red;">','</div>'));
            redirect('user/add');
        }
    } 
	

}	