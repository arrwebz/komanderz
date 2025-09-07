<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quickreport extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        self::bindskins();
        /* if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        } */
        $hlp = [
            'form',
            'date',
            'terbilang',
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation'
        ];
        $this->load->library($lib);
        $this->load->model('Report_model', 'repmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
            array($this->config->item('skins_uri').'libs/pace/pace-theme.css'),
        );
        $js_head = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/core.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/charts.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/dark.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/frozen.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/animated.js'),
            array($this->config->item('skins_uri').'libs/pace/pace.min.js'),
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
            array($this->config->item('skins_uri').'js/widget/ui-card-init.js'),
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
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

    public function atdnce() {
        $getdata = $this->repmd->getattquickreport();
        $getdate = $this->indodate(date('Y-m-d'), true);

        $getstatus = array_count_values(array_column($getdata, 'status'));
        $gethealth = array_count_values(array_column($getdata, 'health'));
        $totalkaryawan = $this->repmd->gettotalkary('komet');
        $cuti = $this->repmd->getcutitoday();
        $totalcuti = $this->repmd->gettotalcutitoday();
        $totalabsen = $this->repmd->gettotalabsen();
        $tanpaket = $this->repmd->gettotaltanpaketerangan();
        $totalba = $totalkaryawan[0]['totaluser']-$totalabsen-$totalcuti[0]['total']-$tanpaket;
       // echo "<pre>"; print_r($totalkaryawan[0]['totaluser']); echo "</pre>";
       // echo '<hr>';
       // echo "<pre>"; print_r($totalabsen); echo "</pre>";
       // echo '<hr>';
       // echo "<pre>"; print_r($totalcuti[0]['total']); echo "</pre>";
       // echo '<hr>';
       // echo "<pre>"; print_r($tanpaket); echo "</pre>";
       // echo '<hr>';
       // echo "<pre>"; print_r($totalba); echo "</pre>";exit;
        // echo '<br>total user '.$totalkaryawan[0]['totaluser'];
        // echo '<br>total absen '.$totalabsen;
        // echo '<br>total cuti '.$totalcuti[0]['total'];
        // echo '<br>tanpa ket '.$tanpaket;exit;
        // echo '<pre>'; print_r($gethealth); exit;
        $data = [
            'drd' => $getdata,
            'cuti' => $cuti,
            'datenow' => $getdate,
            'status' => $getstatus,
            'health' => $gethealth,
            'totalabsen' => $totalabsen,
            'totalba' => $totalba,
            'totalcuti' => $totalcuti[0]['total'],
            'tanpaket' => $tanpaket,
            'title' => 'Daftar Hadir',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/attreport_view', $data, FALSE);
    }

    public function letter() {
        $data = [
            'drd' => array(),
            'datenow' => $this->indodate(date('Y-m-d'), true).' '.date('H:i'),
            'title' => 'Nomor Surat',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/lettreport_view', $data, FALSE);
    }

    function ajaxletter(){
        $get_int = $this->repmd->getlastletter('INT');
        if(count($get_int) > 0){
            $nomor_terakhir['int'] = $get_int[0]['code'];
        }else{
            $nomor_terakhir['int'] = '-';
        }

        $get_ext = $this->repmd->getlastletter('EXT');
        if(count($get_ext) > 0){
            $nomor_terakhir['ext'] = $get_ext[0]['code'];
        }else{
            $nomor_terakhir['ext'] = '-';
        }

        $response = array(
            'data' => $nomor_terakhir,
            'status' => 'success',
            'msg' => 'nomor surat terbaru',
        );
        echo json_encode($response);
    }

    public function fnco() {
        $getdatakomet = $this->repmd->getkometfinco();
        $getdatamesra = $this->repmd->getmesrafinco();
        $getdate = $this->indodate(date('Y-m-d'), true);
        $totalkomet = array_sum(array_column($getdatakomet, 'totalnet'));
        $totalmesra = array_sum(array_column($getdatamesra, 'totalnet'));

        //echo '<pre>'; print_r(array_sum(array_column($getdata, 'totalinv'))); exit;
        $data = [
            'drdk' => $this->repmd->getkometfinco(),
            'drdm' => $this->repmd->getmesrafinco(),
            'totalkomet' => $totalkomet,
            'kometweekly' => $this->repmd->getkometweekly(),
            'mesraweekly' => $this->repmd->getmesraweekly(),
            'allinv30' => $this->repmd->getallinv30days(),
            'totalmesra' => $totalmesra,
            'datenow' => $getdate,
            'title' => 'Plan Pencairan',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/fcreport_view', $data, FALSE);
    }

    public function frcst() {
        $getdatakomet = $this->repmd->getkometforecast();
        $getdatamesra = $this->repmd->getmesraforecast();
        $getdate = $this->indodate(date('Y-m-d'), true);
        $totalkomet = array_sum(array_column($getdatakomet, 'totalnet'));
        $totalmesra = array_sum(array_column($getdatamesra, 'totalnet'));

        //echo '<pre>'; print_r(array_sum(array_column($getdata, 'totalinv'))); exit;
        $data = [
            'drdk' => $this->repmd->getkometforecast(),
            'drdm' => $this->repmd->getmesraforecast(),
            'totalkomet' => $totalkomet,
            'kometmonthly' => $this->repmd->getkometmonthly(),
            'mesramonthly' => $this->repmd->getmesramonthly(),
            'allinv30' => $this->repmd->getallinv30days(),
            'totalmesra' => $totalmesra,
            'datenow' => $getdate,
            'title' => 'Prakiraan Pencairan',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/fsreport_view', $data, FALSE);
    }

    public function frlsi() {
        $getdatakomet = $this->repmd->getkometreal();
        $getdatamesra = $this->repmd->getmesrareal();
        $getdate = $this->indodate(date('Y-m-d'), true);
        //total cair
        $totalkomet = array_sum(array_column($getdatakomet, 'totalcair'));
        $totalmesra = array_sum(array_column($getdatamesra, 'totalcair'));

        //echo '<pre>'; print_r(array_sum(array_column($getdata, 'totalinv'))); exit;
        $data = [
            'drdk' => $this->repmd->getkometreal(),
            'drdm' => $this->repmd->getmesrareal(),
            'totalkomet' => $totalkomet,
            'kometdaily' => $this->repmd->getkometdaily(),
            'mesradaily' => $this->repmd->getmesradaily(),
            'totalmesra' => $totalmesra,
            'datenow' => $getdate,
            'title' => 'Realisasi Pencairan',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/frreport_view', $data, FALSE);
    }
    public function koin() {
        $getdes = $this->repmd->getcountdes();
        $getdgs = $this->repmd->getcountdgs();
        $getnon = $this->repmd->getcountnon();
        $getpen = $this->repmd->getcountpen();
        $top5 = $this->repmd->gettop5investor();
        //$contractend = $this->repmd->getcontractendbymonth();
        $paymentfee = $this->repmd->getcontractstartbymonth();
        $contractend = $this->repmd->getcontractendbyday();

        $getdate = $this->indodate(date('Y-m-d'), true);
        // $totaldes = array_sum(array_column($getdes, 'division'));
        // $totaldgs = array_sum(array_column($getdgs, 'division'));
        // $totalnon = array_sum(array_column($getnon, 'division'));
        // $totalpen = array_sum(array_column($getpen, 'division'));


        //echo '<pre>'; print_r($top5); exit;
        $data = [
            'totaldes' => $getdes,
            'totaldgs' => $getdgs,
            'totalnon' => $getnon,
            'totalpen' => $getpen,
            'totalinvestor' => $this->repmd->gettotalinvestor(),
            'totalcontract' => $this->repmd->gettotalcontract(),
            'suminvest' => $this->repmd->getsuminvest(),
            'datenow' => $getdate,
            'top5' => $top5,
            'contractend' => $contractend,
            'paymentfee' => $paymentfee,
            'title' => 'KOIN',
            'brand' => 'Laporan Investor'
        ];

        $this->load->view('modules/qreport/koinreport_view', $data, FALSE);
    }

    public function mrsl() {
        $getdate = $this->indodate(date('Y-m-d'), true);
        $getdatananza = $this->repmd->getorderbyam('Isnanza Zulkarnaini');
        $getdatasigit = $this->repmd->getorderbyam('Sigit Hidayatullah');
        $getdatavania = $this->repmd->getorderbyam('Vania Miranda Putri');
        $getdataeva = $this->repmd->getorderbyam('Eva Ayu Komala');

        $gettotalnanza = $this->repmd->gettotalorderbyam('Isnanza Zulkarnaini');
        $gettotalsigit = $this->repmd->gettotalorderbyam('Sigit Hidayatullah');
        $gettotalvania = $this->repmd->gettotalorderbyam('Vania Miranda Putri');
        $gettotaleva = $this->repmd->gettotalorderbyam('Eva Ayu Komala');

        //echo '<pre>'; print_r(array_sum(array_column($getdata, 'totalinv'))); exit;
        $data = [
            'drn' => $getdatananza,
            'drs' => $getdatasigit,
            'drv' => $getdatavania,
            'dre' => $getdataeva,
            'dtn' => $gettotalnanza,
            'dts' => $gettotalsigit,
            'dtv' => $gettotalvania,
            'dte' => $gettotaleva,
            'totalorder' => $this->repmd->gettotalorder(),
            'estimasiprofit' => $this->repmd->getdashboardestprofit(),
            'datenow' => $getdate,
            'title' => 'Performansi',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/msreport_view', $data, FALSE);
    }

    public function reqaprv() {
        $getdate = $this->indodate(date('Y-m-d'), true);
        $getaprvdate = $this->repmd->getaprvdate();
        $tmrw = $this->indodate($getaprvdate[0]['aprvdate'], true);
        //$getdata = $this->repmd->gettotalaprvbyam('Isnanza Zulkarnaini','KOMET');
        //echo '<pre>'; print_r($getaprvdate); exit;

        //data Nanza
        $kgetdatananza = $this->repmd->gettotalvolvalam('Isnanza Zulkarnaini','KOMET');
        $mgetdatananza = $this->repmd->gettotalvolvalam('Isnanza Zulkarnaini','MESRA');
        $volkmnanza = $kgetdatananza[0]['volspb'] + $mgetdatananza[0]['volspb'];
        $valkmnanza = $kgetdatananza[0]['valspb'] + $mgetdatananza[0]['valspb'];
        //echo '<pre>'; print_r($totalkmnanza); exit;

        //data Sigit
        $kgetdatasigit = $this->repmd->gettotalvolvalam('Sigit Hidayatullah','KOMET');
        $mgetdatasigit = $this->repmd->gettotalvolvalam('Sigit Hidayatullah','MESRA');
        $volkmsigit = $kgetdatasigit[0]['volspb'] + $mgetdatasigit[0]['volspb'];
        $valkmsigit = $kgetdatasigit[0]['valspb'] + $mgetdatasigit[0]['valspb'];
        //echo '<pre>'; print_r($kgetdatasigit); exit;

        //data Vania
        $kgetdatavania = $this->repmd->gettotalvolvalam('Vania Miranda Putri','KOMET');
        $mgetdatavania = $this->repmd->gettotalvolvalam('Vania Miranda Putri','MESRA');
        $volkmvania = $kgetdatavania[0]['volspb'] + $mgetdatavania[0]['volspb'];
        $valkmvania = $kgetdatavania[0]['valspb'] + $mgetdatavania[0]['valspb'];
        //echo '<pre>'; print_r($mgetdatavania); exit;

        //data Eva
        $kgetdataeva = $this->repmd->gettotalvolvalam('Eva Ayu Komala','KOMET');
        $mgetdataeva = $this->repmd->gettotalvolvalam('Eva Ayu Komala','MESRA');
        $volkmeva = $kgetdataeva[0]['volspb'] + $mgetdataeva[0]['volspb'];
        $valkmeva = $kgetdataeva[0]['valspb'] + $mgetdataeva[0]['valspb'];
        //echo '<pre>'; print_r($mgetdatavania); exit;

        //total spb hari ini
        $grandval = $valkmnanza + $valkmsigit + $valkmvania + $valkmeva;

        $data = [
            'krn' => $this->repmd->gettotalaprvbyam('Isnanza Zulkarnaini','KOMET'),
            'krs' => $this->repmd->gettotalaprvbyam('Sigit Hidayatullah','KOMET'),
            'krv' => $this->repmd->gettotalaprvbyam('Vania Miranda Putri','KOMET'),
            'kre' => $this->repmd->gettotalaprvbyam('Eva Ayu Komala','KOMET'),
            'mrn' => $this->repmd->gettotalaprvbyam('Isnanza Zulkarnaini','MESRA'),
            'mrs' => $this->repmd->gettotalaprvbyam('Sigit Hidayatullah','MESRA'),
            'mrv' => $this->repmd->gettotalaprvbyam('Vania Miranda Putri','MESRA'),
            'mre' => $this->repmd->gettotalaprvbyam('Eva Ayu Komala','MESRA'),

            'tvolnanza' => $volkmnanza,
            'tvalnanza' => $valkmnanza,
            'tvolsigit' => $volkmsigit,
            'tvalsigit' => $valkmsigit,
            'tvolvania' => $volkmvania,
            'tvalvania' => $valkmvania,
            'tvoleva' => $volkmeva,
            'tvaleva' => $valkmeva,

            'grandtotal' => $grandval,
            'tomorrow' => $tmrw,
            'datenow' => $getdate,
            'title' => 'Req Approval SPB',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/reqapreport_view', $data, FALSE);
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


    public function oldaprv() {
        $getdate = $this->indodate(date('Y-m-d'), true);

        $checkdate = $this->repmd->getapprovaldate();

        $tmrw = $this->repmd->getapprovalnextday();
        $tomorrow = $this->indodate($tmrw[0]['nextday'], true);
        //$kgetdatananza = $this->repmd->gettotalapprovalbyam('Eva Ayu Komala','KOMET', $checkdate[0]['lastdate']);
        //echo '<pre>'; print_r($tmrw); exit;

        //KOMET Nanza
        $kgetdatananza = $this->repmd->gettotalapprovalbyam('Isnanza Zulkarnaini','KOMET', $checkdate[0]['lastdate']);
        $ksdnanza = explode(';',$kgetdatananza[0]['spbid']);
        $kcdnanza = count($ksdnanza);

        foreach ($ksdnanza as $kspbn){
            $kgettotalnanza[] = $this->repmd->getsinglespbinvapproval($kspbn);
        }

        $ak = -1;
        for ($krown = 0; $krown < $kcdnanza; $krown++) {
            $ak++;
            $ksumnanza[] = $kgettotalnanza[$ak][0]['value'];
        }
        $ksumspbnanza = array_sum($ksumnanza);

        if (empty($kgetdatananza)) {
            $kcdnanza = 0;
        } else {
            $kcdnanza = count($ksdnanza);
        }

        //echo '<pre>'; print_r($kgettotalnanza); exit;

        //MESRA Nanza
        $mgetdatananza = $this->repmd->gettotalapprovalbyam('Isnanza Zulkarnaini','MESRA', $checkdate[0]['lastdate']);
        $msdnanza = explode(';',$mgetdatananza[0]['spbid']);
        $mcdnanza = count($msdnanza);

        foreach ($msdnanza as $mspbn){
            $mgettotalnanza[] = $this->repmd->getsinglespbinvapproval($mspbn);
        }

        $am = -1;
        for ($mrown = 0; $mrown < $mcdnanza; $mrown++) {
            $am++;
            $msumnanza[] = $mgettotalnanza[$am][0]['value'];
        }
        $msumspbnanza = array_sum($msumnanza);

        if (empty($mgetdatananza)) {
            $mcdnanza = 0;
        } else {
            $mcdnanza = count($msdnanza);
        }

        //echo '<pre>'; print_r($mgettotalnanza); exit;

        $tcdnanza = $kcdnanza + $mcdnanza;
        $tsumspbnanza = $ksumspbnanza + $msumspbnanza;

        //KOMET Sigit
        $kgetdatasigit = $this->repmd->gettotalapprovalbyam('Sigit Hidayatullah', 'KOMET', $checkdate[0]['lastdate']);
        $ksdsigit = explode(';',$kgetdatasigit[0]['spbid']);
        $kcdsigit = count($ksdsigit);

        foreach ($ksdsigit as $kspbs){
            $kgettotalsigit[] = $this->repmd->getsinglespbinvapproval($kspbs);
        }

        $bk = -1;
        for ($krows = 0; $krows < $kcdsigit; $krows++) {
            $bk++;
            $ksumsigit[] = $kgettotalsigit[$bk][0]['value'];
        }
        $ksumspbsigit = array_sum($ksumsigit);

        if (empty($kgetdatasigit)) {
            $kcdsigit = 0;
        } else {
            $kcdsigit = count($ksdsigit);
        }

        //MESRA Sigit
        $mgetdatasigit = $this->repmd->gettotalapprovalbyam('Sigit Hidayatullah', 'MESRA', $checkdate[0]['lastdate']);
        $msdsigit = explode(';',$mgetdatasigit[0]['spbid']);
        $mcdsigit = count($msdsigit);

        foreach ($msdsigit as $mspbs){
            $mgettotalsigit[] = $this->repmd->getsinglespbinvapproval($mspbs);
        }

        $bm = -1;
        for ($mrows = 0; $mrows < $mcdsigit; $mrows++) {
            $bm++;
            $msumsigit[] = $mgettotalsigit[$bm][0]['value'];
        }
        $msumspbsigit = array_sum($msumsigit);

        if (empty($mgetdatasigit)) {
            $mcdsigit = 0;
        } else {
            $mcdsigit = count($msdsigit);
        }

        $tcdsigit = $kcdsigit + $mcdsigit;
        $tsumspbsigit = $ksumspbsigit + $msumspbsigit;

        ////KOMET Vania
        $kgetdatavania = $this->repmd->gettotalapprovalbyam('Vania Miranda Putri', 'KOMET', $checkdate[0]['lastdate']);
        $ksdvania = explode(';',$kgetdatavania[0]['spbid']);
        $kcdvania = count($ksdvania);

        foreach ($ksdvania as $kspbv){
            $kgettotalvania[] = $this->repmd->getsinglespbinvapproval($kspbv);
        }

        $ck = -1;
        for ($krowv = 0; $krowv < $kcdvania; $krowv++) {
            $ck++;
            $ksumvania[] = $kgettotalvania[$ck][0]['value'];
        }
        $ksumspbvania = array_sum($ksumvania);

        if (empty($kgetdatavania)) {
            $kcdvania = 0;
        } else {
            $kcdvania = count($ksdvania);
        }
        //echo '<pre>'; print_r($kcdvania); exit;

        //MESRA Vania
        $mgetdatavania = $this->repmd->gettotalapprovalbyam('Vania Miranda Putri', 'MESRA', $checkdate[0]['lastdate']);
        $msdvania = explode(';',$mgetdatavania[0]['spbid']);
        $mcdvania = count($msdvania);

        foreach ($msdvania as $mspbv){
            $mgettotalvania[] = $this->repmd->getsinglespbinvapproval($mspbv);
        }

        $cm = -1;
        for ($mrowv = 0; $mrowv < $mcdvania; $mrowv++) {
            $cm++;
            $msumvania[] = $mgettotalvania[$cm][0]['value'];
        }
        $msumspbvania = array_sum($msumvania);

        if (empty($mgetdatavania)) {
            $mcdvania = 0;
        } else {
            $mcdvania = count($msdvania);
        }

        $tcdvania = $kcdvania + $mcdvania;
        $tsumspbvania = $ksumspbvania + $msumspbvania;

        ////KOMET Eva
        $kgetdataeva = $this->repmd->gettotalapprovalbyam('Eva Ayu Komala', 'KOMET', $checkdate[0]['lastdate']);
        $ksdeva = explode(';',$kgetdataeva[0]['spbid']);
        $kcdeva = count($ksdeva);

        foreach ($ksdeva as $kspbe){
            $kgettotaleva[] = $this->repmd->getsinglespbinvapproval($kspbe);
        }

        $dk = -1;
        for ($krowe = 0; $krowe < $kcdeva; $krowe++) {
            $dk++;
            $ksumeva[] = $kgettotaleva[$dk][0]['value'];
        }
        $ksumspbeva = array_sum($ksumeva);

        if (empty($kgetdataeva)) {
            $kcdeva = 0;
        } else {
            $kcdeva = count($ksdeva);
        }

        //MESRA Eva
        $mgetdataeva = $this->repmd->gettotalapprovalbyam('Eva Ayu Komala', 'MESRA', $checkdate[0]['lastdate']);
        $msdeva = explode(';',$mgetdataeva[0]['spbid']);
        $mcdeva = count($msdeva);

        foreach ($msdeva as $mspbe){
            $mgettotaleva[] = $this->repmd->getsinglespbinvapproval($mspbe);
        }

        $dm = -1;
        for ($mrowe = 0; $mrowe < $mcdeva; $mrowe++) {
            $dm++;
            $msumeva[] = $mgettotaleva[$dm][0]['value'];
        }
        $msumspbeva = array_sum($msumeva);

        if (empty($mgetdataeva)) {
            $mcdeva = 0;
        } else {
            $mcdeva = count($msdeva);
        }

        $tcdeva = $kcdeva + $mcdeva;
        $tsumspbeva = $ksumspbeva + $msumspbeva;

        $totalspbtoday = $tsumspbnanza + $tsumspbsigit + $tsumspbvania + $tsumspbeva;

        // $getdatasuper = $this->repmd->gettotalapprovalbyam('Super Admin');
        // $separate = explode(';',$getdatasuper[0]['spbid']);
        // $countspb = count($separate);

        // foreach ($separate as $spb){
        // $gettotal[] = $this->repmd->getsinglespbinvapproval($spb);
        // }

        // $i = -1;
        // for ($row = 0; $row < $countspb; $row++) {
        // $i++;
        // $asu[] = $gettotal[$i][0]['value'];
        // }

        // $sumspb = array_sum($asu);

        //echo '<pre>'; print_r($getdatananza); exit;

        //echo '<pre>'; print_r($tsumspbnanza); exit;
        $data = [
            'kcrn' => $kcdnanza,
            'kdrn' => $kgettotalnanza,
            'mcrn' => $mcdnanza,
            'mdrn' => $mgettotalnanza,
            'tcountspbnanza' => $tcdnanza,
            'tsumspbnanza' => $tsumspbnanza,

            'kcrs' => $kcdsigit,
            'kdrs' => $kgettotalsigit,
            'mcrs' => $mcdsigit,
            'mdrs' => $mgettotalsigit,
            'tcountspbsigit' => $tcdsigit,
            'tsumspbsigit' => $tsumspbsigit,

            'kcrv' => $kcdvania,
            'kdrv' => $kgettotalvania,
            'mcrv' => $mcdvania,
            'mdrv' => $mgettotalvania,
            'tcountspbvania' => $tcdvania,
            'tsumspbvania' => $tsumspbvania,

            'kcre' => $kcdeva,
            'kdre' => $kgettotaleva,
            'mcre' => $mcdeva,
            'mdre' => $mgettotaleva,
            'tcountspbeva' => $tcdeva,
            'tsumspbeva' => $tsumspbeva,

            'grandtotal' => $totalspbtoday,
            'datenow' => $getdate,
            'tomorrow' => $tomorrow,
            'title' => 'Approval SPB',
            'brand' => 'Laporan'
        ];

        $this->load->view('modules/qreport/apreport_view', $data, FALSE);
    }

    function ajax_belum_absen(){
        $data = '';

        $cuti = $this->repmd->getcutitoday();
        $im_userid = '';
        if(count($cuti) > 0){
            $im = implode("','", array_map(function ($entry) { return $entry['userid']; }, $cuti));
            $im_userid = "AND userid NOT IN ('". $im ."')";
        }

        $get_data = $this->repmd->belumabsen($im_userid);
        if(count($get_data) > 0){
            $data .= '<div class="belumabsen"><ul>';
            foreach($get_data as $row){
                $data .= '<li style="color: white; list-style:none;">'. $row['username'] .'</li>';
            }
            $data .= '</ul></div>';
        }

        echo $data;
    }

    function spbtime(){
        $data = [
            'drd' => array(),
            'datenow' => $this->indodate(date('Y-m-d'), true).' '.date('H:i'),
            'title' => 'SPB Timeline',
            'brand' => 'SPB'
        ];

        $this->load->view('modules/qreport/spbtimereport_view', $data, FALSE);
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

        $this->load->view('modules/qreport/ajxspbtimereport_view', $data, FALSE);
    }

    function daily(){
        echo redirect(site_url('quickreport/dsales'));exit;

        $curmonth = date('m');
        $targetq = $this->repmd->gettsquarter();
        $dataTargetMonthly = $this->repmd->gettsmonthly($curmonth);
        $dataTargetQTipeOrder = $this->repmd->gettsqtipeorder();

        $curquartersales = curquarter();
        $targetqsales = $targetq[$curquartersales-1]['nilai'];
        $targetcmsales = $dataTargetQTipeOrder[0]['nilai'];

        $datatargetqcoll = $this->repmd->gettcquarter();
        $datatargetcmcoll = $this->repmd->gettcmonthly($curmonth);

        $targetqcoll = $datatargetqcoll[$curquartersales]['nilai'];
        $targetcmcoll = $datatargetcmcoll[0]['nilai'];

        $prosorder['year'] = date('Y');
        $order = $this->repmd->getorder($prosorder);
        $prospect = $this->repmd->getprospect($prosorder);

        $arr_month = parserMonth();
        $new_arr_prosorder = array();
        foreach($arr_month as $row){
            for($i=1; $i<=12; $i++){
                if($i == $row['month']){
                    $new_arr_prosorder[$i]['month'] = $row['monthname'];
                    $new_arr_prosorder[$i]['valprospect'] = 0;
                    $new_arr_prosorder[$i]['valorder'] = 0;

                    foreach ($prospect as $rowpros){
                        if($row['monthname'] == $rowpros['month']){
                            $new_arr_prosorder[$i]['month'] = $row['monthname'];
                            $new_arr_prosorder[$i]['valprospect'] = $rowpros['valprospect'];
                        }
                    }
                    foreach ($order as $roworder){
                        if($row['monthname'] == $roworder['month']){
                            $new_arr_prosorder[$i]['month'] = $row['monthname'];
                            $new_arr_prosorder[$i]['valorder'] = $roworder['valorder'];
                        }
                    }
                }
            }
        }
        $new_arr_prosorder = array_values($new_arr_prosorder);;

        $get_realisasi = $this->repmd->getsumq();
        $realisasiq = $get_realisasi[3]['value'];
        $prosentasereal = $realisasiq/$targetqsales*100;

        $volvalnopesmonthly = $this->repmd->getvolvalnopesbymonth();
        if(empty($volvalnopesmonthly)){
            $volvalnopesmonthly[0]['volinv'] = 0;
            $volvalnopesmonthly[0]['valinv'] = 0;
        }
        $prospectmonthly = $this->repmd->getprospectmonthly();
        $prosentasenopespros = $volvalnopesmonthly[0]['valinv']/$targetcmsales*100;

        $getamval = $this->repmd->getdashboardampval();
        usort($getamval,function ($x,$y){
            return $y['basevalue'] - $x['basevalue'];
        });

        $get_collq = $this->repmd->getsumqcoll();
        $collq = $get_collq[2]['value'];
        $prosentasecollq = $collq/$targetqcoll*100;

        $collcm = $this->repmd->getvolvalcollmonth();
        if(empty($collcm)){
            $collcm[0]['volcoll'] = 0;
            $collcm[0]['valcoll'] = 0;
        }
        $prosentasecollcm = $collcm[0]['valcoll']/$targetcmcoll*100;

        $getarbyday = array();
        $dayend = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')-1);
        for($i=1; $i<=$dayend; $i++){
            $day = date('Y').'-'.date('m').'-'.$i;
            $getarbyday[$i] = $this->repmd->getarbyfullday($day);
        }
        $getarbyday = array_values($getarbyday);

        $collamdgsnanza = $this->repmd->getcollinamodr("'Isnanza Zulkarnaini','Iman Suryana'","2");
        $collamdeseva = $this->repmd->getcollinamodr("'Eva Ayu Komala','Budi Riyanto'","1");
        $collamdesvania = $this->repmd->getcollinamodr("'Vania Miranda Putri','Muhammad Luthfi'","1");
        $collamsdasigit = $this->repmd->getcollinamodr("'Sigit Hidayatullah','Iman Suryana'","'5','6'");

        $collamdgsnanzaobl = $this->repmd->getcollinamobl("'Isnanza Zulkarnaini','Iman Suryana'","2");
        $collamdesevaobl = $this->repmd->getcollinamobl("'Eva Ayu Komala','Budi Riyanto'","1");
        $collamdesvaniaobl = $this->repmd->getcollinamobl("'Vania Miranda Putri','Muhammad Luthfi'","1");
        $collamsdasigitobl = $this->repmd->getcollinamobl("'Sigit Hidayatullah','Iman Suryana'","'5','6'");

        $data = [
            'title' => 'Daily Report '.customDate(date('Y-m-d H:i:s')),
            'description' => 'Daily Report '.customDate(date('Y-m-d H:i:s')).' Komander`s',

            'targetqsales' => $targetqsales,
            'targetcmsales' => $targetcmsales,
            'targetqcoll' => $targetqcoll,
            'targetcmcoll' => $targetcmcoll,

            'drdvalyoy' => json_encode($this->repmd->getvalnopesyoy('')),
            'divisionyoy' => json_encode($this->repmd->getvalnopesyoydivision('')),
            'invdist' => json_encode($this->repmd->getdashboarddistval()),
            'divisionyoysm2' => json_encode($this->repmd->getvalnopesyoydivisionsm2('')),
            'invdistsm2' => json_encode($this->repmd->getdashboarddistvalsm2()),
            'prospectorder' => json_encode($new_arr_prosorder),
            'realisasiq' => $realisasiq,
            'prosentasereal' => $prosentasereal,
            'volvalnopesmonthly' => $volvalnopesmonthly,
            'prospectmonthly' => $prospectmonthly,
            'prosentasenopespros' => $prosentasenopespros,
            'drdamvol' => json_encode($this->repmd->getdashboardampvol()),
            'drdamval' => json_encode($this->repmd->getdashboardampval()),
            'amval' => $getamval,
            'collpaidmonthly' => json_encode($this->repmd->getcollectionpaidmonthly()),
            'getarbyday' => json_encode($getarbyday),
            'collq' => $collq,
            'collcm' => $collcm,
            'prosentasecollq' => $prosentasecollq,
            'prosentasecollcm' => $prosentasecollcm,

            'collamdgsnanza' => $collamdgsnanza,
            'collamdeseva' => $collamdeseva,
            'collamdesvania' => $collamdesvania,
            'collamsdasigit' => $collamsdasigit,

            'collamdgsnanzaobl' => $collamdgsnanzaobl,
            'collamdesevaobl' => $collamdesevaobl,
            'collamdesvaniaobl' => $collamdesvaniaobl,
            'collamsdasigitobl' => $collamsdasigitobl,
        ];

        $this->load->view('modules/qreport/daily_view', $data, FALSE);
    }

    function dsales(){
        $curmonth = date('m');
        $targetq = $this->repmd->gettsquarter();
        $dataTargetMonthly = $this->repmd->gettsmonthly($curmonth);
        $dataTargetQTipeOrder = $this->repmd->gettsqtipeorder();

        $curquartersales = curquarter();
        $targetqsales = 0;
        $targetcmsales = 0;
        if(count($targetq) > 0){
            $targetqsales = $targetq[$curquartersales-1]['nilai'];
            $targetcmsales = $dataTargetMonthly[0]['nilai'];
        }

        $prosorder['year'] = date('Y');
        $order = $this->repmd->getorder($prosorder);
        $prospect = $this->repmd->getprospect($prosorder);

        $arr_month = parserMonth();
        $new_arr_prosorder = array();
        foreach($arr_month as $row){
            for($i=1; $i<=12; $i++){
                if($i == $row['month']){
                    $new_arr_prosorder[$i]['month'] = $row['monthname'];
                    $new_arr_prosorder[$i]['valprospect'] = 0;
                    $new_arr_prosorder[$i]['valorder'] = 0;

                    foreach ($prospect as $rowpros){
                        if($row['monthname'] == $rowpros['month']){
                            $new_arr_prosorder[$i]['month'] = $row['monthname'];
                            $new_arr_prosorder[$i]['valprospect'] = $rowpros['valprospect'];
                        }
                    }
                    foreach ($order as $roworder){
                        if($row['monthname'] == $roworder['month']){
                            $new_arr_prosorder[$i]['month'] = $row['monthname'];
                            $new_arr_prosorder[$i]['valorder'] = $roworder['valorder'];
                        }
                    }
                }
            }
        }
        $new_arr_prosorder = array_values($new_arr_prosorder);;
		
		// get current quarterly
        $get_realisasi = $this->repmd->getsumq();
        //echo '<pre>'; print_r($get_realisasi); exit;
        //Q1 = $get_realisasi[0]['value']; 
        //Q2 - $get_realisasi[1]['value']; 
        //Q3 = $get_realisasi[2]['value']; 
        //Q4 = $get_realisasi[3]['value']; 
        
        $realisasiq = 0;
        $prosentasereal = 0;
        if(count($get_realisasi) > 0){
            $realisasiq = $get_realisasi[2]['value']; 
            $prosentasereal = $realisasiq/$targetqsales*100;
        }

        $volvalnopesmonthly = $this->repmd->getvolvalnopesbymonth();
        if(empty($volvalnopesmonthly)){
            $volvalnopesmonthly[0]['volinv'] = 0;
            $volvalnopesmonthly[0]['valinv'] = 0;
        }

        $prospectmonthly = $this->repmd->getprospectmonthly();
        $prosentasenopespros = 0;
        if($volvalnopesmonthly[0]['valinv'] != 0){
            $prosentasenopespros = $volvalnopesmonthly[0]['valinv']/$targetcmsales*100;
        }
		
		//current month
        $getamval = $this->repmd->getdashboardampvalcm();
		//echo '<pre>'; print_r($getamval); exit; 
        usort($getamval,function ($x,$y){
            return $y['basevalue'] - $x['basevalue'];
        });

        $totalpanjar = $this->repmd->gettotalpanjar();
        $totalpanjarspb = $this->repmd->gettotalpanjarspbinv();

        $data = [
            'title' => 'Daily Report '.customDate(date('Y-m-d H:i:s')),
            'description' => 'Daily Report '.customDate(date('Y-m-d H:i:s')).' Komander`s',

            'targetqsales' => $targetqsales,
            'targetcmsales' => $targetcmsales,

            'drdvalyoy' => json_encode($this->repmd->getvalnopesyoy('')),
            'divisionyoy' => json_encode($this->repmd->getvalnopesyoydivision('')),
            'invdist' => json_encode($this->repmd->getdashboarddistval()),
            'divisionyoysm2' => json_encode($this->repmd->getvalnopesyoydivisionsm2('')),
            'invdistsm2' => json_encode($this->repmd->getdashboarddistvalsm2()),
            'prospectorder' => json_encode($new_arr_prosorder),
            'realisasiq' => $realisasiq,
            'prosentasereal' => $prosentasereal,
            'volvalnopesmonthly' => $volvalnopesmonthly,
            'prospectmonthly' => $prospectmonthly,
            'prosentasenopespros' => $prosentasenopespros,
            'drdamvol' => json_encode($this->repmd->getdashboardampvolcm()),
            'drdamval' => json_encode($this->repmd->getdashboardampvalcm()),
            'amval' => $getamval,
            'totalpanjar' => $totalpanjar,
            'totalpanjarspb' => $totalpanjarspb,
            'totalacr' => $this->repmd->getdashboardtotacr(),
            'totalinv' => $this->repmd->getdashboardtotinv(),
            'totalrev' => $this->repmd->getdashboardtotrev(),
            'totalcost' => $this->repmd->getdashboardtotcost(),
            'totalprofit' => $this->repmd->getdashboardtotprof(),
        ];

        $this->load->view('modules/qreport/dsales_view', $data, FALSE);
    }

    function dcollect(){
        $curmonth = date('m');

        $curquarter = curquarter();

        $datatargetqcoll = $this->repmd->gettcquarter();
        $datatargetcmcoll = $this->repmd->gettcmonthly($curmonth);

        $targetqcoll = 0;
        if(count($datatargetqcoll) > 0){
            $targetqcoll = $datatargetqcoll[$curquarter-1]['nilai'];
        }

        $targetcmcoll = 0;
        if(count($datatargetcmcoll) > 0){
            $targetcmcoll = $datatargetcmcoll[0]['nilai'];
        }

        $unpaid = $this->repmd->collunpaid();
        $finance = $this->repmd->collunpaidfinance();
        $financenontelpro = $this->repmd->collunpaidfinancenontelpro();
        $financetelpro = $this->repmd->collunpaidfinancetelpro();
        $precise = $this->repmd->collunpaidprecise();
        $preciseobl = $this->repmd->collunpaidpreciseobl();
        $logiibl = $this->repmd->collunpaidlogiibl();
        $revisi = $this->repmd->collunpaidrevisi();

		// get current quarterly
        $get_collq = $this->repmd->getsumqcoll();
        //echo '<pre>'; print_r($get_collq); exit;
        //Q1 = $get_collq[0]['value']; 
        //Q2 - $get_collq[1]['value']; 
        //Q3 = $get_collq[2]['value']; 
        //Q4 = $get_collq[3]['value']; 
        $collq = 0;
        if(count($get_collq) > 0){
            $collq = $get_collq[2]['value'];
        }

        $prosentasecollq = 0;
        if($collq != 0){
            //$prosentasecollq = ($collq+7000000000)/$targetqcoll*100;
			$prosentasecollq = $collq/$targetqcoll*100;
        }

        $collcm = $this->repmd->getvolvalcollmonth();
        if(empty($collcm)){
            $collcm[0]['volcoll'] = 0;
            $collcm[0]['valcoll'] = 0;
        }

        $prosentasecollcm = 0;
        if($collcm[0]['valcoll'] != 0){
            //$prosentasecollcm = ($collcm[0]['valcoll']+7000000000)/$targetcmcoll*100;
			$prosentasecollcm = $collcm[0]['valcoll']/$targetcmcoll*100;
        }


        $collorderstatus = $this->repmd->getcollbyorderstatus($curmonth);

        $getarbyday = array();
        $dayend = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')-1);
        for($i=1; $i<=$dayend; $i++){
            $day = date('Y').'-'.date('m').'-'.$i;
            $getarbyday[$i] = $this->repmd->getarbyfullday($day);
        }
        $getarbyday = array_values($getarbyday);

        $coll = $this->repmd->getsisacollectionmonthly($curmonth);
        $collpaid = $this->repmd->getcollectionpaidbymonth($curmonth);
        $collunpaid = $this->repmd->getcollunpaid($curmonth);

        $piecollamsni = $this->repmd->getpiecollsni($curmonth, "'Isnanza Zulkarnaini','Sigit Hidayatullah','Indra Saputra Fardilla'");
        $collamsni = $this->repmd->getcollbyamgroupstatus($curmonth, "'Isnanza Zulkarnaini','Sigit Hidayatullah','Indra Saputra Fardilla'");
        $collamlv = $this->repmd->getcollbyamgroupstatus($curmonth, "'Vania Miranda Putri'");
        $collamie = $this->repmd->getcollbyamgroupstatus($curmonth, "'Eva Ayu Komala'");

        $collsni = $this->repmd->getcollbyam($curmonth,"'Isnanza Zulkarnaini','Sigit Hidayatullah','Indra Saputra Fardilla'");
        $colllv = $this->repmd->getcollbyam($curmonth,"'Vania Miranda Putri'");
        $collie = $this->repmd->getcollbyam($curmonth,"'Eva Ayu Komala'");

        $paidsni = $this->repmd->getpaidbyam($curmonth,"'Isnanza Zulkarnaini','Sigit Hidayatullah','Indra Saputra Fardilla'");
        $paidlv = $this->repmd->getpaidbyam($curmonth,"'Vania Miranda Putri'");
        $paidie = $this->repmd->getpaidbyam($curmonth,"'Eva Ayu Komala'");

        $panjarsni = $this->repmd->getpanjarbyam($curmonth,"'Isnanza Zulkarnaini','Sigit Hidayatullah','Indra Saputra Fardilla'");
        $panjarlv = $this->repmd->getpanjarbyam($curmonth,"'Vania Miranda Putri'");
        $panjarie = $this->repmd->getpanjarbyam($curmonth,"'Eva Ayu Komala'");

        $arlarge = $this->repmd->getarlarge($curmonth);
        $arlargepaid = $this->repmd->getarlargepaid($curmonth);

        $armedium = $this->repmd->getarmedium($curmonth);
        $armediumpaid = $this->repmd->getarmediumpaid($curmonth);

        $arsmall = $this->repmd->getarsmall($curmonth);
        $arsmallpaid = $this->repmd->getarsmallpaid($curmonth);

        $array_ar = array(
            '0' => array(
                'arname' => 'Iman Suryana',
                'arphoto' => $this->config->item('uploads_uri').'user/ai/iman.jpg',
                'orderstatus' => "'IBL'",
            ),
            '1' => array(
                'arname' => 'Indra Saputra Fardilla',
                'arphoto' => $this->config->item('uploads_uri').'user/ai/indra.jpg',
                'orderstatus' => "'NOPES', 'PADI'",
            ),
            '2' => array(
                'arname' => 'Muhammad Luthfi',
                'arphoto' => $this->config->item('uploads_uri').'user/ai/lutfi.jpg',
                'orderstatus' => "'OBL'",
            ),
        );
        for($i=0; $i<count($array_ar); $i++){
            $getpaidar = $this->repmd->gettotalpaidbyar($array_ar[$i]['orderstatus']);
            $totalpaidar[$i] = $getpaidar[0];
            $totalpaidar[$i]['arname'] = $array_ar[$i]['arname'];
            $totalpaidar[$i]['arphoto'] = $array_ar[$i]['arphoto'];
            $totalpaidar[$i]['orderstatus'] = $array_ar[$i]['orderstatus'];
        }
        usort($totalpaidar,function ($x,$y){
            return $y['valinv'] - $x['valinv'];
        });
        for($i=0; $i<count($array_ar); $i++){
            $getpaidarmonthly = $this->repmd->getpaidarmonthly($array_ar[$i]['orderstatus']);
            $totalpaidarmonthly[$i] = $getpaidarmonthly[0];
            $totalpaidarmonthly[$i]['arname'] = $array_ar[$i]['arname'];
            $totalpaidarmonthly[$i]['arphoto'] = $array_ar[$i]['arphoto'];
            $totalpaidarmonthly[$i]['orderstatus'] = $array_ar[$i]['orderstatus'];
        }
        usort($totalpaidarmonthly,function ($x,$y){
            return $y['valinv'] - $x['valinv'];
        });
        for($i=0; $i<count($array_ar); $i++){
            $getpaidardaily = $this->repmd->getpaidardaily($array_ar[$i]['orderstatus']);
            $totalpaidardaily[$i] = $getpaidardaily[0];
            $totalpaidardaily[$i]['arname'] = $array_ar[$i]['arname'];
            $totalpaidardaily[$i]['arphoto'] = $array_ar[$i]['arphoto'];
            $totalpaidardaily[$i]['orderstatus'] = $array_ar[$i]['orderstatus'];
        }
        usort($totalpaidardaily,function ($x,$y){
            return $y['valinv'] - $x['valinv'];
        });

        $data = [
            'title' => 'Daily Report '.customDate(date('Y-m-d H:i:s')),
            'description' => 'Daily Report '.customDate(date('Y-m-d H:i:s')).' Komander`s',

            'targetqcoll' => $targetqcoll,
            'targetcmcoll' => $targetcmcoll,

            'collpaidmonthly' => json_encode($this->repmd->getcollectionpaidmonthly()),
            'getarbyday' => json_encode($getarbyday),
            'collq' => $collq,
            'collcm' => $collcm,
            'prosentasecollq' => $prosentasecollq,
            'prosentasecollcm' => $prosentasecollcm,

            'collorderstatus' => $collorderstatus,

            'coll' => $coll,
            'collpaid' => $collpaid,
            'collunpaid' => $collunpaid,

            'piecollamsni' => $piecollamsni,
            'collamsni' => $collamsni,
            'collamlv' => $collamlv,
            'collamie' => $collamie,

            'collsni' => $collsni,
            'colllv' => $colllv,
            'collie' => $collie,

            'paidsni' => $paidsni,
            'paidlv' => $paidlv,
            'paidie' => $paidie,

            'panjarsni' => $panjarsni,
            'panjarlv' => $panjarlv,
            'panjarie' => $panjarie,

            'arlarge' => $arlarge,
            'arlargepaid' => $arlargepaid,

            'armedium' => $armedium,
            'armediumpaid' => $armediumpaid,

            'arsmall' => $arsmall,
            'arsmallpaid' => $arsmallpaid,

            'collpaidyear' => $this->repmd->collpaidyear(),
            'collunpaidyear23' => $this->repmd->collunpaidyear('2023'),
            'collunpaidyear22' => $this->repmd->collunpaidyear('2022'),
            'collunpaidyear21' => $this->repmd->collunpaidyear('2021'),

            'unpaid' => $unpaid,
            'finance' => $finance,
            'precise' => $precise,

            'financenontelpro' => $financenontelpro,
            'financetelpro' => $financetelpro,
            'preciseobl' => $preciseobl,
            'logiibl' => $logiibl,
            'revisi' => $revisi,

            'totalpaidar' => $totalpaidar,
            'charttotalpaid' => json_encode($totalpaidar),

            'totalpaidarmonthly' => $totalpaidarmonthly,
            'charttotalpaidarmonthly' => json_encode($totalpaidarmonthly),

            'totalpaidardaily' => $totalpaidardaily,
        ];

        $this->load->view('modules/qreport/dcollect_view', $data, FALSE);
    }

    function dtrack(){
        /* Sales Monthly Order */
        $curmonth = date('m');
        $ismonthly = getIndMonth($curmonth);

        /* Collection Monthly */
        $arrayorderstatus = array('NOPES','PADI','IBL','OBL');
        for($i=0; $i<count($arrayorderstatus); $i++){
            $collmonthly[$i]['orderstatus'] = $arrayorderstatus[$i];
            $collmonthly[$i]['targetcoll'] = $this->repmd->gettcmonthlybyorder($arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaid'] = $this->repmd->getcollmonthlyunpaidbyorderstatus($arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidaccurate'] = $this->repmd->trackingcollmonthlybyorderstatus('0',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidpercepatan'] = $this->repmd->trackingcollmonthlybyorderstatus('6',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidsegmen'] = $this->repmd->trackingcollmonthlybyorderstatus('2',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidnpk'] = $this->repmd->trackingcollmonthlybyorderstatus('11',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidlegal'] = $this->repmd->trackingcollmonthlybyorderstatus('7',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidrevisi'] = $this->repmd->trackingcollmonthlybyorderstatus('5',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaiddokhilang'] = $this->repmd->trackingcollmonthlybyorderstatus('8',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidinvidea'] = $this->repmd->trackingcollmonthlybyorderstatus('3',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidprecise'] = $this->repmd->trackingcollmonthlybyorderstatus('4',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidlogistik'] = $this->repmd->trackingcollmonthlybyorderstatus('16',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidkeuangan'] = $this->repmd->trackingcollmonthlybyorderstatus('18',$arrayorderstatus[$i],$curmonth);
            $collmonthly[$i]['unpaidforecasting'] = $this->repmd->trackingcollmonthlybyorderstatus('10',$arrayorderstatus[$i],$curmonth);

            $tracking[$i]['orderstatus'] = $arrayorderstatus[$i];
            $tracking[$i]['alarmaccurate'] = $this->repmd->trackingalarmcollvalvol('0', $arrayorderstatus[$i], $curmonth, 7);
            $tracking[$i]['alarmpercepatan'] = $this->repmd->trackingalarmcollvalvol('6', $arrayorderstatus[$i], $curmonth, 7);
            $tracking[$i]['alarmsegmen'] = $this->repmd->trackingalarmcollvalvol('2', $arrayorderstatus[$i], $curmonth, 7);
            $tracking[$i]['alarmnpk'] = $this->repmd->trackingalarmcollvalvol('11', $arrayorderstatus[$i], $curmonth, 7);
            $tracking[$i]['alarmlegal'] = $this->repmd->trackingalarmcollvalvol('7', $arrayorderstatus[$i], $curmonth, 7);
            $tracking[$i]['alarmrevisi'] = $this->repmd->trackingalarmcollvalvol('5', $arrayorderstatus[$i], $curmonth, 7);
            $tracking[$i]['alarmdokhilang'] = $this->repmd->trackingalarmcollvalvol('8', $arrayorderstatus[$i], $curmonth, 7);
            $tracking[$i]['alarminvidea'] = $this->repmd->trackingalarmcollvalvol('3', $arrayorderstatus[$i], $curmonth, 7);
            $tracking[$i]['alarmprecise'] = $this->repmd->trackingalarmcollvalvol('4', $arrayorderstatus[$i], $curmonth, 14);
            $tracking[$i]['alarmlogistik'] = $this->repmd->trackingalarmcollvalvol('16', $arrayorderstatus[$i], $curmonth, 14);
            $tracking[$i]['alarmkeuangan'] = $this->repmd->trackingalarmcollvalvol('18', $arrayorderstatus[$i], $curmonth, 14);
            $tracking[$i]['alarmforecasting'] = $this->repmd->trackingalarmcollvalvol('10', $arrayorderstatus[$i], $curmonth, 14);
        }

        $trackpanjarbysegmennontk = $this->repmd->trackpanjarbysegmennontk();
        $trackpanjarbysegmentk = $this->repmd->trackpanjarbysegmentk();
		
		$totalpanjar = $this->repmd->gettotalpanjar();
        $totalpanjarspb = $this->repmd->gettotalpanjarspbinv();

        $data = [
            'title' => 'Daily Report '.customDate(date('Y-m-d H:i:s')),
            'description' => 'Daily Report '.customDate(date('Y-m-d H:i:s')).' Komanders',
            'collmonthly' => $collmonthly,
            'tracking' => $tracking,
            'totalpanjar' => $totalpanjar,
            'totalpanjarspb' => $totalpanjarspb,
            'trackpanjarbysegmennontk' => $trackpanjarbysegmennontk,
            'trackpanjarbysegmentk' => $trackpanjarbysegmentk,
        ];

        $this->load->view('modules/qreport/dtrack_view', $data, FALSE);
    }
    
    function dsaldo(){
        /* Sales Monthly Order */
        $curmonth = date('m');
        $ismonthly = getIndMonth($curmonth);

		$totalsaldoinvcair = $this->repmd->get_all_saldo_inv_cair();
		$totalsaldoinvcairyearly = $this->repmd->get_saldo_inv_cair_yearly();
		
		$totalsaldoinvcairyear2021 = $this->repmd->get_saldo_inv_cair_yearly();
		$totalsaldoinvcairyear2022 = $this->repmd->get_saldo_inv_cair_yearly();
		$totalsaldoinvcairyear2023 = $this->repmd->get_saldo_inv_cair_yearly();
		$totalsaldoinvcairyear2024 = $this->repmd->get_saldo_inv_cair_yearly();
		
		$totalsaldoinv_belumcair = $this->repmd->get_all_saldo_inv_ncair();
		$totalsaldoinv_belumcairyearly = $this->repmd->get_saldo_inv_ncair_yearly();
		
		$totalsaldoinv_ncairyear2021 = $this->repmd->get_saldo_inv_ncair_yearly();
		$totalsaldoinv_ncairyear2022 = $this->repmd->get_saldo_inv_ncair_yearly();
		$totalsaldoinv_ncairyear2023 = $this->repmd->get_saldo_inv_ncair_yearly();
		$totalsaldoinv_ncairyear2024 = $this->repmd->get_saldo_inv_ncair_yearly();
		
		//echo '<pre>'; print_r($totalsaldoinvcairyearly); exit;

        $data = [
            'title' => 'Daily Report '.customDate(date('Y-m-d H:i:s')),
            'description' => 'Daily Report '.customDate(date('Y-m-d H:i:s')).' Komanders',
            'saldototal' => $totalsaldoinvcair,
            'saldoyearly' => $totalsaldoinvcairyearly,
            'saldototalncair' => $totalsaldoinv_belumcair,
            'saldoyearlyncair' => $totalsaldoinv_belumcairyearly,
            'saldo2021' => $totalsaldoinvcairyear2021,
            'saldo2022' => $totalsaldoinvcairyear2022,
            'saldo2023' => $totalsaldoinvcairyear2023,
            'saldo2024' => $totalsaldoinvcairyear2024,
            
            'saldonc2021' => $totalsaldoinv_ncairyear2021,
            'saldonc2022' => $totalsaldoinv_ncairyear2022,
            'saldonc2023' => $totalsaldoinv_ncairyear2023,
            'saldonc2024' => $totalsaldoinv_ncairyear2024,
        ];

        $this->load->view('modules/qreport/dsaldo_view', $data, FALSE);
    }

    function dlop(){
        $data = [
            'drd' => $this->repmd->getlopbysegmen(),
            'title' => 'Daily Report '.customDate(date('Y-m-d H:i:s')),
            'description' => 'Daily Report '.customDate(date('Y-m-d H:i:s')).' Komander`s',
        ];

        $this->load->view('modules/qreport/dlop_view', $data, FALSE);
    }

    function debug(){
        $month = date('Y-m-d',strtotime('2023-08-09'. '-7 month'));
        echo "<pre>"; print_r($month); echo "</pre>";exit;
    }

    function screenshot(){
        $this->load->view('modules/qreport/screenshot_view', '', FALSE);
    }
}