<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
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
	
	public function index()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    function maintain(){
        echo 'Maintanance';exit;
    }
	

}