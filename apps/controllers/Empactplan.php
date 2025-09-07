<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empactplan extends CI_Controller{

    public function __construct(){
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

        $this->load->model('Empreport_model', 'emprepmd');
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
            array($this->config->item('skins_uri').'bower_components/amcharts4/core.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/charts.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/themes/kelly.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/themes/animated.js'),
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
        $getdata = $this->emprepmd->actionplan();


        $date = date('Y-m-d');
        $dayofweek = date('w', strtotime($date));
        $senin = date('d-m-Y', strtotime((1 - $dayofweek).' day', strtotime($date)));
        $selasa = date('d-m-Y', strtotime((2 - $dayofweek).' day', strtotime($date)));
        $rabu = date('d-m-Y', strtotime((3 - $dayofweek).' day', strtotime($date)));
        $kamis = date('d-m-Y', strtotime((4 - $dayofweek).' day', strtotime($date)));
        $jumat = date('d-m-Y', strtotime((5 - $dayofweek).' day', strtotime($date)));

        $data = [
            'drd' => $getdata,
            'title' => 'Daftar Hadir & Kegiatan',
            'brand' => 'Laporan',
            'senin' => $senin,
            'selasa' => $selasa,
            'rabu' => $rabu,
            'kamis' => $kamis,
            'jumat' => $jumat,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location')
        ];

        $data['content'] = $this->load->view('modules/empactplan/empactplan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
}