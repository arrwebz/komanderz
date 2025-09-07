<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widget extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        self::bindskins();

        $this->load->model('Order_model', 'ordermd');
        $this->load->model('Spb_model', 'spbmd');
        $this->load->model('Member_model', 'mbrmd');
        $this->load->model('Billco_model', 'billcomd');
        $this->load->model('Report_model', 'repmd');
        $this->load->model('Track_model', 'trkmd');
        $this->load->model('Dropdown_model', 'drdmd');
        $this->load->model('Segment_model', 'sgmmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'bower_components/bootstrap/dist/css/bootstrap.min.css'),
            array($this->config->item('skins_uri').'bower_components/font-awesome/css/font-awesome.min.css'),
            array($this->config->item('skins_uri').'bower_components/Ionicons/css/ionicons.min.css'),
            array($this->config->item('skins_uri').'bower_components/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'),
            array($this->config->item('skins_uri').'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'),
            array($this->config->item('skins_uri').'dist/css/AdminLTE.min.css'),
            array($this->config->item('skins_uri').'dist/css/skins/_all-skins.min.css'),
            array($this->config->item('skins_uri').'plugins/pace/pace-theme.css'),
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
            array($this->config->item('skins_uri').'bower_components/select2/dist/js/select2.full.min.js'),
            array($this->config->item('skins_uri').'bower_components/fastclick/lib/fastclick.js'),
            array('https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js')
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    public function index() {
        $getdata = $this->repmd->getattquickreport();
        $getdate = $this->indodate(date('Y-m-d'), true);

        $getstatus = array_count_values(array_column($getdata, 'status'));
        $gethealth = array_count_values(array_column($getdata, 'health'));
        $countdata = count($getdata);
        //echo '<pre>'; print_r($gethealth); exit;
        $data = [
            'drd' => $getdata,
            'datenow' => $getdate,
            'status' => $getstatus,
            'health' => $gethealth,
            'totalabsen' => $countdata,
            'title' => 'Daftar Hadir',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/qreport_view', $data, FALSE);
    }

    function spbtime(){
        $data = [
            'drd' => array(),
            'datenow' => $this->indodate(date('Y-m-d'), true).' '.date('H:i'),
            'title' => 'SPB Timeline',
            'brand' => 'SPB'
        ];

        $this->load->view('modules/widget/spbtimewidget_view', $data, FALSE);
    }

    function ajaxspbtime(){
        $drd = $this->repmd->get_spb_cm();
        $komet = $this->repmd->get_spb_cm_unit('KOMET');
        $mesra = $this->repmd->get_spb_cm_unit('MESRA');
        $padi = $this->repmd->get_spb_cm_unit('PADI');
        $data = [
            'komet' => $komet,
            'mesra' => $mesra,
            'padi' => $padi,
            'drd' => $drd,
        ];

        $this->load->view('modules/widget/ajxspbtimewidget_view', $data, FALSE);
    }

    function analytic(){

        //echo '<pre>'; print_r($this->repmd->getvalpadiyoy()); exit;
        $drdk = $this->repmd->getvolnopesbymonth('KOMET');
        for ($x = 0; $x < count($drdk); $x++) {
            $km[] = json_encode($drdk[$x]['month']);
            $ki[] = json_encode($drdk[$x]['volinv']);
        }
        $blnkomet = implode(',',$km);
        $invkomet = implode(',',$ki);

        //echo $invkomet; exit;

        $drdm = $this->repmd->getvolnopesbymonth('MESRA');
        for ($y = 0; $y < count($drdm); $y++) {
            $mm[] = json_encode($drdm[$y]['month']);
            $mi[] = json_encode($drdm[$y]['volinv']);
        }
        $blnmesra = implode(',',$mm);
        $invmesra = implode(',',$mi);

        $drdvol = $this->repmd->getvolnopesbymonth('');
        for ($z = 0; $z < count($drdvol); $z++) {
            $vol[] = json_encode($drdvol[$z]['volinv']);
        }
        $invol = implode(',',$vol);

        $drdval = $this->repmd->getvalnopesbymonth('');
        for ($w = 0; $w < count($drdval); $w++) {
            $val[] = json_encode($drdval[$w]['valinv']);
        }
        $inval = implode(',',$val);

        $tinv = $this->repmd->getanalyticstotalorder();
        $tinvj = $tinv[0]['totalinvoice'];

        $tspb = $this->repmd->getanalyticstotalspb();
        $tspbj = $tspb[0]['totalspb'];

        $tjsonspbinv = [
            '0' => [
                'orderstatus' => 'Invoice',
                'valspb' => $tinvj
            ],
            '1' => [
                'orderstatus' => 'Panjar',
                'valspb' => $tspbj
            ]
        ];

        //$tjsonspbinv = json_encode($this->repmd->getdashboardampvol());

        //echo '<pre>'; print_r($tjsonspbinv); exit;

        //echo json_encode($this->repmd->getarbyday()); exit;
        $data = [
            'title' => 'Analytics',
            'month' => $blnkomet,
            'drdinvk' => $invkomet,
            'drdinvm' => $invmesra,
            'drdamvol' => json_encode($this->repmd->getdashboardampvol()),
            'drdamval' => json_encode($this->repmd->getdashboardampval()),
            'drdamcollvol' => json_encode($this->repmd->getdashboardampcollvol()),
            'drdamcollval' => json_encode($this->repmd->getdashboardampcollval()),
            'drdvolyoy' => json_encode($this->repmd->getvolnopesyoy('')),
            'drdvalyoy' => json_encode($this->repmd->getvalnopesyoy('')),
            'drdinvol' => json_encode($this->repmd->getvolnopesbymonth('')),
            'drdinval' => json_encode($this->repmd->getvalnopesbymonth('')),
            'lastdate' => $this->repmd->getdashboardlastdate(),
            'invdist' => json_encode($this->repmd->getdashboarddistval()),
            'allspb' => json_encode($tjsonspbinv),
            'allinv' => json_encode($this->repmd->getdashboardallinv()),
            'prospectdiv' => json_encode($this->repmd->getvalprospectbydiv()),
            'totalprospect' => $this->repmd->gettotalprospect(),
            'totaltarget' => $this->totalformatrev(),
            'totalrev' => $this->repmd->getdashboardtotrev(),
            'totalcost' => $this->repmd->getdashboardtotcost(),
            'totalprofit' => $this->repmd->getdashboardtotprof(),
            'totalmember' => $this->mbrmd->countmember(),
            'totalspb' => $this->spbmd->countspb(),
            'totalinvtd' => $this->ordermd->countinvoice(),
            'totalinv' => $this->ordermd->countallinvoice(),
            'totalpaid' => $this->billcomd->countpaid(),
            'estimasiprofit' => $this->repmd->getdashboardestprofit(),
            'newestimasiprofit' => $this->repmd->getnewdashboardestprofit(),
            'drdvalpadi' => json_encode($this->repmd->getvalpadi()),
            'collectionpaid' => json_encode($this->repmd->getnewcollectionpaid()),
            'collectionunpaid' => json_encode($this->repmd->getnewcollectionunpaid()),
            'collectionpaidunpaid' => json_encode($this->repmd->getnewcollectionpaidunpaid()),
            'collectionreceivepaidunpaid' => json_encode($this->repmd->getnewcollectionreceivepaidunpaid()),
            'getarbyday' => json_encode($this->repmd->getarbyday()),
            'collectionpostingforecasting' => json_encode($this->repmd->getnewcollectionpostingforecasting()),
            'totalpadi' => $this->repmd->gettotalpadi(),
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

        $this->load->view('modules/widget/analytics_view', $data, FALSE);
    }

    function performance() {
        $q1lastyear = $this->repmd->getvalnopesq12022();
        $q1thisyear = $this->repmd->getvalnopesq12023();
        $arrayq1 = $this->array_merge_recursive_ex($q1lastyear,$q1thisyear);

        $q2lastyear = $this->repmd->getvalnopesq22022();
        $q2thisyear = $this->repmd->getvalnopesq22023();
        $arrayq2 = $this->array_merge_recursive_ex($q2lastyear, $q2thisyear);

        $q3lastyear = $this->repmd->getvalnopesq32022();
        $q3thisyear = $this->repmd->getvalnopesq32023();
        $arrayq3 = $this->array_merge_recursive_ex($q3lastyear, $q3thisyear);

        $q4lastyear = $this->repmd->getvalnopesq42022();
        $q4thisyear = $this->repmd->getvalnopesq42023();
        $arrayq4 = $this->array_merge_recursive_ex($q4lastyear, $q4thisyear);

        $order_des = array();
        $des_id = 1;
        $total_order_des =  $this->repmd->get_total_order_segment($des_id);
        foreach($total_order_des as $key=>$row) {
            $order_des[$key]['code'] = $row['code'];
            $order_des[$key]['komet'] = $this->repmd->get_total_order_unit($des_id, $row['segment'], 'KOMET');
            $order_des[$key]['mesra'] = $this->repmd->get_total_order_unit($des_id, $row['segment'], 'MESRA');
            $order_des[$key]['padi'] = $this->repmd->get_total_order_unit($des_id, $row['segment'], 'PADI');
        }

        $order_dgs = array();
        $dgs_id = 2;
        $total_order_dgs =  $this->repmd->get_total_order_segment($dgs_id);
        foreach($total_order_dgs as $key=>$row) {
            $order_dgs[$key]['code'] = $row['code'];
            $order_dgs[$key]['komet'] = $this->repmd->get_total_order_unit($dgs_id, $row['segment'], 'KOMET');
            $order_dgs[$key]['mesra'] = $this->repmd->get_total_order_unit($dgs_id, $row['segment'], 'MESRA');
            $order_dgs[$key]['padi'] = $this->repmd->get_total_order_unit($dgs_id, $row['segment'], 'PADI');
        }

        $order_sda = array();
        $sda_id = 5;
        $total_order_sda =  $this->repmd->get_total_order_segment($sda_id);
        foreach($total_order_sda as $key=>$row) {
            $order_sda[$key]['code'] = $row['code'];
            $order_sda[$key]['komet'] = $this->repmd->get_total_order_unit($sda_id, $row['segment'], 'KOMET');
            $order_sda[$key]['mesra'] = $this->repmd->get_total_order_unit($sda_id, $row['segment'], 'MESRA');
            $order_sda[$key]['padi'] = $this->repmd->get_total_order_unit($sda_id, $row['segment'], 'PADI');
        }

        $data = [
            'title' => 'Performance',
            'valq1yoy' => json_encode($arrayq1),
            'valq2yoy' => json_encode($arrayq2),
            'valq3yoy' => json_encode($arrayq3),
            'valq4yoy' => json_encode($arrayq4),
            'divisionyoy' => json_encode($this->repmd->getvalnopesyoydivision('')),
            'targetamnz' => json_encode($this->repmd->gettargetam('21')),
            'targetamev' => json_encode($this->repmd->gettargetam('37')),
            'targetamvn' => json_encode($this->repmd->gettargetam('36')),
            'targetamsg' => json_encode($this->repmd->gettargetam('30')),
            'targetsegmentnz' => json_encode($this->repmd->gettargetsegment('21')),
            'targetsegmentev' => json_encode($this->repmd->gettargetsegment('37')),
            'targetsegmentvn' => json_encode($this->repmd->gettargetsegment('36')),
            'targetsegmentsg' => json_encode($this->repmd->gettargetsegment('30')),
            'collpostfor' => $this->repmd->getnewcollectionpostingforecasting(),
            'order_des' => json_encode($order_des),
            'order_dgs' => json_encode($order_dgs),
            'order_sda' => json_encode($order_sda),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $this->load->view('modules/widget/performance_view', $data, FALSE);
    }

    function trackingorder() {
        $drd = $this->trkmd->getallinvoice('KOMET');

        $data = [
            'drd' => $drd,
            'segment' => $this->drdmd->getallseg(),
            'title' => 'KOMET',
            'brand' => 'Tracking Invoice',
            'tnk' => $this->repmd->countnopeskomet(),
            'tpk' => $this->repmd->countprpokomet(),
            'tsk' => $this->repmd->countspbkomet(),
            'tnm' => $this->repmd->countnopesmesra(),
            'tpm' => $this->repmd->countprpomesra(),
            'tsm' => $this->repmd->countspbmesra(),
            'alertnopes' => $this->repmd->getalertnopes(),
            'alertprpo' => $this->repmd->getalertprpo(),
            'alertnopesprpoprevyear' => $this->repmd->getalertnopesprpoprevyear(),
        ];

        $this->load->view('modules/widget/ktrack_view', $data, FALSE);
    }

    function array_merge_recursive_ex(array $array1, array $array2)
    {
        $merged = $array1;

        foreach ($array2 as $key => & $value) {
            if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
                $merged[$key] = $this->array_merge_recursive_ex($merged[$key], $value);
            } else if (is_numeric($key)) {
                if (!in_array($value, $merged)) {
                    $merged[] = $value;
                }
            } else {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }

    public function totalformatrev() {

        $cn = $this->repmd->getdashboardtotrev();
        $n = $cn[0]['totalrev'];
        /* echo '<pre>';
        print_r($n); exit; */

        // is this a number?
        if(!is_numeric($n)) return false;

        // now filter it;
        if($n>1000000000000) return round(($n/1000000000000),1).' T';
        else if($n>1000000000) return round(($n/1000000000),1).' M';
        else if($n>1000000) return round(($n/1000000),1).' J';
        else if($n>1000) return round(($n/1000),1).' K';

        return number_format($n);
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
}