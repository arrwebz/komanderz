<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empreport extends CI_Controller{

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
        $this->load->model('Report_model', 'repmd');
        $this->load->model('Dropdown_model', 'drdmd');
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
        $param['month'] = date('m');
        $param['year'] = date('Y');
        $getdata = $this->repmd->getempreport($param);
        $getdate = $this->indodate(date('Y-m-d'), true);

        $data = [
            'drd' => $getdata,
            'month' => $param['month'],
            'year' => $param['year'],
            'datenow' => $getdate,
            'totalday' => cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y')),
            'title' => 'Daftar Hadir',
            'brand' => 'Laporan',
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

        $data['content'] = $this->load->view('modules/empreport/empreport_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function search() {
        $param['month'] = $_GET['optMonth'];
        $param['year'] = $_GET['optYear'];
        $getdata = $this->repmd->getempreport($param);

        $data = [
            'drd' => $getdata,
            'month' => $param['month'],
            'year' => $param['year'],
            'totalday' => cal_days_in_month(CAL_GREGORIAN, $param['month'], $param['year']),
            'title' => 'Absensi',
            'brand' => 'Laporan Absen',

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/empreport/search_empreport_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function export(){
        $param['month'] = $this->input->post('hdnMonth');
        $param['year'] = $this->input->post('hdnYear');
        $getdata = $this->repmd->getempreport($param);

        $data = array(
            'drd' => $getdata,
            'month' => $param['month'],
            'year' => $param['year'],
            'totalday' => cal_days_in_month(CAL_GREGORIAN, $param['month'], $param['year']),

            'title' => 'Laporan Kehadiran '. getIndMonth($param['month']) .' '. $param['year'],
        );
        $this->load->view('modules/empreport/export_empreport_view',$data);
    }

    public function exportactionplan(){
        $param['month'] = $this->input->post('hdnMonth');
        $param['year'] = $this->input->post('hdnYear');
        $getdata = $this->repmd->getempreport($param);

        $data = array(
            'drd' => $getdata,
            'month' => $param['month'],
            'year' => $param['year'],
            'totalday' => cal_days_in_month(CAL_GREGORIAN, $param['month'], $param['year']),

            'title' => 'Laporan Rencana Kegiatan '. getIndMonth($param['month']) .' '. $param['year'],
        );
        $this->load->view('modules/empreport/export_actionplan_view',$data);
    }

    private function indodate($tanggal, $cetak_hari = false){
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
}