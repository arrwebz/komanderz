<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mealallowance extends CI_Controller{

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

        echo 'sedang dalam perbaikan';exit; /* jika absen 2x kehitung 2 */
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
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    public function index() {
        $first = date('d-m-Y', strtotime('this week'));
        $last = date('d-m-Y', strtotime('friday'));

        $param['sdate'] = $first;
        $param['edate'] = $last;
        $getdata = $this->repmd->getmealallowance($param);
        $getdate = $this->indodate(date('Y-m-d'), true);

        $data = [
            'drd' => $getdata,
            'filter' => $param,
            'datenow' => $getdate,
            'title' => 'Laporan Uang Makan',
            'brand' => 'KOMET',

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location')
        ];

        $data['content'] = $this->load->view('modules/mealallowance/mealallowance_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function search() {
        $param['sdate'] = $_GET['txtStartdate'];
        $param['edate'] = $_GET['txtEnddate'];
        $getdata = $this->repmd->getmealallowance($param);

        $data = [
            'drd' => $getdata,
            'title' => 'Laporan',
            'brand' => 'Uang Makan',
            'filter' => $param,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/mealallowance/search_mealallowance_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function export(){
        $param['sdate'] = $this->input->post('hdnSdate');
        $param['edate'] = $this->input->post('hdnEdate');
        $ldate = date($param['edate'], strtotime('+1 day'));
        $getdata = $this->repmd->getmeal($param);

        $period = new DatePeriod(
            new DateTime($param['sdate']),
            new DateInterval('P1D'),
            new DateTime($ldate)
        );

        /* extract date */
        foreach ($period as $key => $value) {
            $date[]  = $value->format('Y-m-d');
        }
        $date = array_merge($date, array(date('Y-m-d', strtotime($ldate))));
        $total_day = count($date)-1;

        $data = array(
            'drd' => $getdata,
            'sdate' => $param['sdate'],
            'edate' => $param['edate'],
            'totalday' => $total_day,
            'extdate' => $date,

            'title' => 'Meal Allowance Komet per '.$param['sdate'].' sd '.$param['edate'],
        );
        $this->load->view('modules/mealallowance/export_mealallowance_view',$data);
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