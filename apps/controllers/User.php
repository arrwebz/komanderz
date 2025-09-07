<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public $intuserid;
	public $introleid;
	public $intgroupid;
	
	public $strrolecode;
	public $strrolename;
	
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
		$this->load->model('User_model', 'usermd');
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
			'drd' => $this->usermd->getalluser(),
			'title' => 'Daftar Akun',
			'brand' => 'Pengguna',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/user/user_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function detail() {
		$drd = $this->usermd->getsingleuser($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intuserid = $row['userid'];
				$this->introleid = $row['roleid'];
				$this->strrolename = $row['rolename'];
				$this->intusernik = $row['nik'];
                $this->strusername = $row['username'];
                $this->strpassword = $row['password'];
                $this->stremail = $row['email'];
                $this->strtelp = $row['telp'];
				$this->strfullname = $row['fullname'];
				$this->strphoto = $row['photo'];
				$this->intstatus = $row['status'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$data = [
            'userid' => $this->intuserid,
			'roleid' => $this->introleid,
			'rolename' => $this->strrolename,
			'nik' => $this->intusernik,
			'username' => $this->strusername,
             'password' =>   $this->strpassword,
             'email' =>   $this->stremail,
			 'telp' => $this->strtelp,
             'realname' =>  $this->strfullname,
			 'photo' => $this->strphoto,			 
			'status' =>	$this->intstatus,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Detail User',
			'brand' => 'User Accounts',
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
        ];
		$data['content'] = $this->load->view('modules/user/detail_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
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
                $this->usermd->strtoken = '';
                $this->usermd->strtheme = '';

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
			 'userphoto' => $this->strphoto,			 
			'status' =>	$this->intstatus,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Ubah Akun',
			'brand' => 'Pengguna',
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
    
    function download(){
        $t['drd'] = $this->usermd->getalluseractive();
        $t['title'] = 'data-karyawan-komet-'.date('Y');

        $this->load->view('modules/user/excel_user', $t);
    }
}	