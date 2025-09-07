<?php defined('BASEPATH') or exit('No direct script access allowed');

class Myboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        self::bindskins();
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }
        $hlp = [
            'text',
            'date',
            'terbilang',
        ];
        $this->load->helper($hlp);
        $this->load->model('Report_model', 'repmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
            array($this->config->item('skins_uri').'libs/datatablesres/dataTables.bootstrap5.css'),
            array($this->config->item('skins_uri').'libs/datatablesres/responsive.bootstrap5.css'),
        );
        $js_head = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/core.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/charts.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/dark.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/frozen.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/animated.js'),
        );
        $js_content  = array(
            array($this->config->item('skins_uri').'js/app.min.js'),
            array($this->config->item('skins_uri').'js/app.init.js'),
            array($this->config->item('skins_uri').'libs/bootstrap/dist/js/bootstrap.bundle.min.js'),
            array($this->config->item('skins_uri').'libs/simplebar/dist/simplebar.min.js'),
            array($this->config->item('skins_uri').'js/sidebarmenu.js'),
            array($this->config->item('skins_uri').'js/theme.js'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/owl.carousel.min.js'),
            array($this->config->item('skins_uri').'libs/datatablesres/dataTables.js'),
            array($this->config->item('skins_uri').'libs/datatablesres/dataTables.bootstrap5.js'),
            array($this->config->item('skins_uri').'libs/datatablesres/dataTables.responsive.js'),
            array($this->config->item('skins_uri').'libs/datatablesres/responsive.bootstrap5.js'),
            array($this->config->item('skins_uri').'js/datatable/datatable-basic.init.js'),
            array($this->config->item('skins_uri').'libs/select2/dist/js/select2.full.min.js'),
            array($this->config->item('skins_uri').'js/widget/ui-card-init.js'),
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/owl.carousel.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    public function index() {
        $userid = $this->session->userdata("userid");
        if($userid == '9' || $userid == '18' || $userid == '49'){
            redirect(site_url('myboard/collboard'));
        }elseif($userid == '21' || $userid == '36' || $userid == '30' || $userid == '37'){
            redirect(site_url('myboard/amboard'));
        }else{
            redirect(site_url('logout'));
        }
    }

    function collboard(){
        if(isset($_GET['preview'])){
            $prev = $_GET['preview'];
            if($prev == 'indra'){
                $userid = '9';
            }elseif($prev == 'iman'){
                $userid = '18';
            }elseif($prev == 'lutfi'){
                $userid = '49';
            }else{
                $userid = $this->session->userdata("userid");
            }
        }else{
            $userid = $this->session->userdata("userid");
        }

        if($userid == '9'){
            $orderstatus = "'NOPES', 'PADI'";
        }elseif($userid == '18'){
            $orderstatus = "'IBL'";
        }elseif($userid == '49'){
            $orderstatus = "'OBL'";
        }else{
            redirect(site_url('attendances'));
        }

        $paidarmonthly = $this->repmd->getpaidarmonthly($orderstatus);

        $curmonth = date('m');
        $datatargetcmcoll = $this->repmd->gettcmonthly($curmonth);
        $targetcmcoll = 0;
        if(count($datatargetcmcoll) > 0){
            $targetcmcoll = $datatargetcmcoll[0]['nilai'];
        }

        $collcm = $this->repmd->getvolvalcollmonth();
        $prosentasecollcm = 0;
        if(empty($collcm)){
            $collcm[0]['volcoll'] = 0;
            $collcm[0]['valcoll'] = 0;
        }else{
            $prosentasecollcm = ($collcm[0]['valcoll']/$targetcmcoll)*100;
        }

        $trackingar['orderstatus'] = $orderstatus;
        $trackingar['alarmaccurate'] = $this->repmd->mytrackingalarmcollvalvol('0', $orderstatus, $curmonth, 7);
        $trackingar['alarmpercepatan'] = $this->repmd->mytrackingalarmcollvalvol('6', $orderstatus, $curmonth, 7);
        $trackingar['alarmsegmen'] = $this->repmd->mytrackingalarmcollvalvol('2', $orderstatus, $curmonth, 7);
        $trackingar['alarmnpk'] = $this->repmd->mytrackingalarmcollvalvol('11', $orderstatus, $curmonth, 7);
        $trackingar['alarmlegal'] = $this->repmd->mytrackingalarmcollvalvol('7', $orderstatus, $curmonth, 7);
        $trackingar['alarmrevisi'] = $this->repmd->mytrackingalarmcollvalvol('5', $orderstatus, $curmonth, 7);
        $trackingar['alarmdokhilang'] = $this->repmd->mytrackingalarmcollvalvol('8', $orderstatus, $curmonth, 7);
        $trackingar['alarminvidea'] = $this->repmd->mytrackingalarmcollvalvol('3', $orderstatus, $curmonth, 7);
        $trackingar['alarmprecise'] = $this->repmd->mytrackingalarmcollvalvol('4', $orderstatus, $curmonth, 14);
        $trackingar['alarmlogistik'] = $this->repmd->mytrackingalarmcollvalvol('16', $orderstatus, $curmonth, 14);
        $trackingar['alarmkeuangan'] = $this->repmd->mytrackingalarmcollvalvol('18', $orderstatus, $curmonth, 14);
        $trackingar['alarmforecasting'] = $this->repmd->mytrackingalarmcollvalvol('10', $orderstatus, $curmonth, 14);

        $getlistalarm['accurate'] = $this->repmd->listtrackalarmbyorderstatus('0',$orderstatus, $curmonth, 7);
        $getlistalarm['percepatan'] = $this->repmd->listtrackalarmbyorderstatus('6',$orderstatus, $curmonth, 7);
        $getlistalarm['segmen'] = $this->repmd->listtrackalarmbyorderstatus('2',$orderstatus, $curmonth, 7);
        $getlistalarm['npk'] = $this->repmd->listtrackalarmbyorderstatus('11',$orderstatus, $curmonth, 7);
        $getlistalarm['legal'] = $this->repmd->listtrackalarmbyorderstatus('7',$orderstatus, $curmonth, 7);
        $getlistalarm['revisi'] = $this->repmd->listtrackalarmbyorderstatus('5',$orderstatus, $curmonth, 7);
        $getlistalarm['dokhilang'] = $this->repmd->listtrackalarmbyorderstatus('8',$orderstatus, $curmonth, 7);
        $getlistalarm['invidea'] = $this->repmd->listtrackalarmbyorderstatus('3',$orderstatus, $curmonth, 7);
        $getlistalarm['precise'] = $this->repmd->listtrackalarmbyorderstatus('4',$orderstatus, $curmonth, 14);
        $getlistalarm['logistik'] = $this->repmd->listtrackalarmbyorderstatus('16',$orderstatus, $curmonth, 14);
        $getlistalarm['keuangan'] = $this->repmd->listtrackalarmbyorderstatus('18',$orderstatus, $curmonth, 14);
        $getlistalarm['forecasting'] = $this->repmd->listtrackalarmbyorderstatus('10',$orderstatus, $curmonth, 14);
        $listtrackalarmar = array_merge(
            $getlistalarm['accurate'],
            $getlistalarm['percepatan'],
            $getlistalarm['segmen'],
            $getlistalarm['npk'],
            $getlistalarm['legal'],
            $getlistalarm['revisi'],
            $getlistalarm['dokhilang'],
            $getlistalarm['invidea'],
            $getlistalarm['precise'],
            $getlistalarm['logistik'],
            $getlistalarm['keuangan'],
            $getlistalarm['forecasting']
        );
        usort($listtrackalarmar,function ($x,$y){
            return $x['status'] - $y['status'];
        });
        $totaltrackingar = count($listtrackalarmar);

        $data = array(
            'title' => 'My Dashboard',
            'paidarmonthly' => $paidarmonthly,
            'collcm' => $collcm,
            'targetcmcoll' => $targetcmcoll,
            'prosentasecollcm' => $prosentasecollcm,
            'trackingar' => $trackingar,
            'totaltrackingar' => $totaltrackingar,
            'listtrackalarmar' => $listtrackalarmar,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        );
        $data['content'] = $this->load->view('modules/mydashboard/collboard_view', $data, TRUE);

        $this->load->view('templates/base', $data, FALSE);
    }

    function amboard(){
        $userid = $this->session->userdata("userid");
        if(isset($_GET['preview'])){
            $prev = $_GET['preview'];
            if($prev == 'nanza'){
                $uname = 'Isnanza Zulkarnaini';
            }elseif($prev == 'vania'){
                $uname = 'Vania Miranda Putri';
            }elseif($prev == 'eva'){
                $uname = 'Eva Ayu Komala';
            }elseif($prev == 'sigit'){
                $uname = 'Sigit Hidayatullah';
            }else{
                $uname = $this->session->userdata("userfullname");
            }
        }else{
            $uname = $this->session->userdata("userfullname");
        }

        $curmonth = date('m');
        $targetq = $this->repmd->gettsquarter();
        $dataTargetMonthly = $this->repmd->gettsmonthly($curmonth);
        $targetcmsales = 0;
        if(count($targetq) > 0){
            $targetcmsales = $dataTargetMonthly[0]['nilai'];
        }

        $volvalnopesmonthly = $this->repmd->getvolvalnopesbymonth();
        if(empty($volvalnopesmonthly)){
            $volvalnopesmonthly[0]['volinv'] = 0;
            $volvalnopesmonthly[0]['valinv'] = 0;
        }

        $prosentasenopespros = 0;
        if($volvalnopesmonthly[0]['valinv'] != 0){
            $prosentasenopespros = $volvalnopesmonthly[0]['valinv']/$targetcmsales*100;
        }

        $myorder = $this->repmd->getorderbyamgroupingsegmentordertype($uname);
        $myordercmvolval = $this->repmd->getvalvolordercmbyam($uname);
        $myordercmbysegment = $this->repmd->getordercmbyamsegement($uname);
        $mysegmentnotorder = $this->repmd->mysegmentnotorder($uname);

        $mypros = $this->repmd->getprospectam($uname);
//        $curmonth = date('m');
//        $mypanjar = $this->repmd->getlistpanjarbyam($curmonth,"'".$this->session->userdata("userfullname")."'");
//        echo "<pre>"; print_r($mypanjar); echo "</pre>";exit;

        $data = array(
            'title' => 'My Dashboard',
            'targetcmsales' => $targetcmsales,
            'volvalnopesmonthly' => $volvalnopesmonthly,
            'prosentasenopespros' => $prosentasenopespros,
            'myordercmvolval' => $myordercmvolval,
            'myordercmbysegment' => $myordercmbysegment,
            'mysegmentnotorder' => $mysegmentnotorder,
            'myorder' => $myorder,
            'mypros' => $mypros,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        );
//        echo "<pre>"; print_r($data); echo "</pre>";exit;
        $data['content'] = $this->load->view('modules/mydashboard/amboard_view', $data, TRUE);

        $this->load->view('templates/base', $data, FALSE);
    }
}