<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        self::bindskins();
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'bower_components/bootstrap/dist/css/bootstrap.min.css'),
            array($this->config->item('skins_uri').'bower_components/font-awesome/css/font-awesome.min.css'),
            array($this->config->item('skins_uri').'bower_components/Ionicons/css/ionicons.min.css'),
            array($this->config->item('skins_uri').'dist/css/AdminLTE.min.css'),
            array($this->config->item('skins_uri').'plugins/iCheck/square/blue.css'),
            array('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')

        );
        $js_head = array(
            array($this->config->item('skins_uri').'bower_components/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'bower_components/bootstrap/dist/js/bootstrap.min.js')        );
        $js_content  = array(
            array($this->config->item('skins_uri').'plugins/iCheck/icheck.min.js')
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    public function index(){
        $data = array(
            'title' => '404 Not Found'
        );
        $this->load->view('templates/notfound', $data);

    }

}