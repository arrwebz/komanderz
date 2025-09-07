<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		self::bindskins();
		$hlp = [
            'form',
            'security',
            'date'
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation'
			//'recaptcha'
        ];
        $this->load->library($lib);
		$this->load->model('User_model', 'usermd');  
    }

	private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
			
        );
        $js_head = array(
			array('')
        ); 
        $js_content  = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'js/app.min.js'),
            array($this->config->item('skins_uri').'js/app.init.js'),
            array($this->config->item('skins_uri').'libs/bootstrap/dist/js/bootstrap.bundle.min.js'),
            array($this->config->item('skins_uri').'libs/simplebar/dist/simplebar.min.js'),
            array($this->config->item('skins_uri').'js/sidebarmenu.js'),
            array($this->config->item('skins_uri').'js/theme.js')
        );
        
        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    function index() {
		$data = [ 
			'title' => 'Komet Management Dashboard and Performance Reports'
            // 'captcha' => $this->recaptcha->getWidget(),
            // 'script_captcha' => $this->recaptcha->getScriptTag()
		];
        $this->load->view('templates/login', $data, FALSE);
    }
	
	//function loginv2() {
	//	$data = [ 
	//		'title' => 'Komet Management Dashboard Performance Report'
            // 'captcha' => $this->recaptcha->getWidget(),
            // 'script_captcha' => $this->recaptcha->getScriptTag()
	//	];
    //    $this->load->view('templates/loginv2', $data, FALSE);
    //}
	
	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
	
	public function validate()
    {
        if (isset($_POST['btnSubmit'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtUsername', 'Username', 'required', $error);
            $this->form_validation->set_rules('txtPassword', 'Password', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $username = htmlentities($this->input->post('txtUsername'), ENT_QUOTES, 'UTF-8');
                $password = htmlentities($this->input->post('txtPassword'), ENT_QUOTES, 'UTF-8');
				/*$recaptcha = $this->input->post('g-recaptcha-response');

				$url = 'https://www.google.com/recaptcha/api/siteverify';
				$data = [
					'secret' => '6LdbldIZAAAAAMnlRlMwPgyQTu7rSoKPtGkxt5o7',
					'response' => $this->input->post('token')
				];
				$options = array(
					'http' => array(
						'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
						'method' => 'POST',
						'content' => http_build_query($data)
					)
				);
				$context = stream_context_create($options);
				$response = file_get_contents($url, false, $context);
				
                $resv3 = json_decode($response, true);
				
                if (!empty($recaptcha)) {
					$response = $this->recaptcha->verifyResponse($recaptcha);
					if (isset($resv3['success']) and $resv3['success'] === true) {*/
						$usermatch = $this->usermd->getvalidateuser($username);
						if (isset($usermatch)) {
							if (password_verify($password, $usermatch->password)) {
								$datestring = '%Y-%m-%d %H:%i:%s';
								$time = time();
								
								$strchdat = mdate($datestring, $time);
								$intuserid = $usermatch->userid;
								$this->usermd->updatelog($strchdat,$intuserid);
								
								$this->session->set_userdata('userid', $usermatch->userid);
								$this->session->set_userdata('role', $usermatch->roleid);
								$this->session->set_userdata('group', $usermatch->groupid);
								$this->session->set_userdata('username', $usermatch->username);
								$this->session->set_userdata('userfullname', $usermatch->fullname);
								$this->session->set_userdata('photo', $usermatch->photo);
								$this->session->set_userdata('position', $usermatch->position); 
								$this->session->set_userdata('joindate', $usermatch->joindate);
								$this->session->set_userdata('location', $usermatch->location);
								$this->session->set_userdata('thememode', $usermatch->thememode);
								$this->session->set_userdata('logged_in', TRUE);
								if($usermatch->roleid == '3') {
									redirect('dashboard', 'refresh');	
								} elseif($usermatch->roleid == '8') {
								    redirect('eos', 'refresh');	
								}  else  {
									redirect('attendances', 'refresh');									
								}
							} else {
								$message = 'Try again password!';
								$this->session->set_flashdata('error_login', $message);
								redirect('login');
							}
						} else {
							$message = 'Username not found!';
							$this->session->set_flashdata('error_login', $message);
							redirect('login');
						}
					/*} else {
						$message = 'Silahkan refresh browser!';
						$this->session->set_flashdata('error_login', $message);
						redirect('login');
					}
                } else {
					 $message = 'Mohon centang reCAPTCHA!';
					 $this->session->set_flashdata('error_login', $message);
					 redirect('login');
                }*/
            } else {
                $message = 'Username or Password is empty!';
                $this->session->set_flashdata('error_login', $message);
                redirect('login');
            }
        }
    }

    function maintain(){
        echo 'Maintanance';exit;
    }
	

}