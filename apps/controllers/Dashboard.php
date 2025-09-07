<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

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
		$this->load->model('Order_model', 'ordermd');
		$this->load->model('Spb_model', 'spbmd');
		$this->load->model('Member_model', 'mbrmd');
		$this->load->model('Billco_model', 'billcomd');
		$this->load->model('Report_model', 'repmd');
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
            array($this->config->item('skins_uri').'js/widget/ui-card-init.js'),
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
        /*$role = $this->session->userdata('role');
        if($role == '1' || $role == '3' || $role == '4'){*/

            /* Sales Quearter */
            $targetglobal = $this->repmd->gettsglobal();
            $targetq = $this->repmd->gettsquarter();
            $realisasiq = $this->repmd->getsumq();
            if (!array_key_exists("1",$realisasiq)){
                $realisasiq[1] = array(
                    'Q' => '2',
                    'value' => '0',
                );
            }
            if (!array_key_exists("2",$realisasiq)){
                $realisasiq[2] = array(
                    'Q' => '3',
                    'value' => '0',
                );
            }
            if (!array_key_exists("3",$realisasiq)){
                $realisasiq[3] = array(
                    'Q' => '4',
                    'value' => '0',
                );
            }

            /* Sales Monthly */
            $curquartersales = curquarter();
            $quartermonthsales = monthquearter($curquartersales);
            for($i=0; $i<count($quartermonthsales); $i++){
                $dataTargetMonthly = $this->repmd->gettsmonthly($quartermonthsales[$i]['month']);
                $quartermonthsales[$i]['targetsales'] = $dataTargetMonthly[0]['nilai'];

                $dataQuarter = $this->repmd->getinvoicemonthly($quartermonthsales[$i]['month']);
                if(!empty($dataQuarter)){
                    $quartermonthsales[$i]['valinv'] = $dataQuarter[0]['valinv'];
                }else{
                    $quartermonthsales[$i]['valinv'] = '0';
                }
            }

            /* Sales Monthly Order */
            $curmonth = date('m');
            $ismonthly = getIndMonth($curmonth);

            $tsmonthlynopes = $this->repmd->gettsmonthlybyorder('4',$curmonth);
            $valmonthlynopes = $this->repmd->getinvoicemonthlybyorderstatus('NOPES',$curmonth);
            if(empty($valmonthlynopes)){
                $valmonthlynopes[0]['valinv'] = 0;
            }

            $tsmonthlypadi = $this->repmd->gettsmonthlybyorder('5',$curmonth);
            $valmonthlypadi = $this->repmd->getinvoicemonthlybyorderstatus('PADI',$curmonth);
            if(empty($valmonthlypadi)){
                $valmonthlypadi[0]['valinv'] = 0;
            }

            $tsmonthlyibl = $this->repmd->gettsmonthlybyorder('6',$curmonth);
            $valmonthlyibl = $this->repmd->getinvoicemonthlybyorderstatus('IBL',$curmonth);
            if(empty($valmonthlyibl)){
                $valmonthlyibl[0]['valinv'] = 0;
            }

            $tsmonthlyobl = $this->repmd->gettsmonthlybyorder('7',$curmonth);
            $valmonthlyobl = $this->repmd->getinvoicemonthlybyorderstatus('OBL',$curmonth);
            if(empty($valmonthlyobl)){
                $valmonthlyobl[0]['valinv'] = 0;
            }

            /* Collection Resume AR */
            $resumear = extractmonth();
            for($i=0; $i<count($resumear); $i++){
                if($resumear[$i]['month'] < $curmonth){
                    $resumear[$i]['sisacollection'] = $this->repmd->getsisacollectionmonthly($resumear[$i]['month']);
                    $resumear[$i]['sales'] = $this->repmd->getsalesmonthly($resumear[$i]['month']);
                    $resumear[$i]['collectionpaid'] = $this->repmd->getcollectionpaidbymonth($resumear[$i]['month']);
                    $resumear[$i]['finalcollection'] = $this->repmd->getfinalcollection($resumear[$i]['month']);
                }elseif($resumear[$i]['month'] == $curmonth){
                    if($curmonth == 12 && date('d') >= 20){
                        /* ketika tgl sekarang lebih dari tgl 20 desember keluarin data nya */
                        $resumear[$i]['sisacollection'] = $this->repmd->getsisacollectionmonthly($resumear[$i]['month']);
                        $resumear[$i]['sales'] = '-';
                        $resumear[$i]['collectionpaid'] = '-';
                        $resumear[$i]['finalcollection'] = '-';
                    }else{
                        $resumear[$i]['sisacollection'] = $this->repmd->getsisacollectionmonthly($resumear[$i]['month']);
                        $resumear[$i]['sales'] = '-';
                        $resumear[$i]['collectionpaid'] = '-';
                        $resumear[$i]['finalcollection'] = '-';
                    }
                }else{
                    $resumear[$i]['sisacollection'] = '';
                    $resumear[$i]['sales'] = '';
                    $resumear[$i]['collectionpaid'] = '';
                    $resumear[$i]['finalcollection'] = '';
                }
            }
//            echo "<pre>"; print_r($resumear); echo "</pre>";exit;

            /* Collection Monthly */
            $arrayorderstatus = array('NOPES','PADI','IBL','OBL');
            for($i=0; $i<count($arrayorderstatus); $i++){
                $collmonthly[$i]['orderstatus'] = $arrayorderstatus[$i];
                $collmonthly[$i]['targetcoll'] = $this->repmd->gettcmonthlybyorder($arrayorderstatus[$i],$curmonth);
                $collmonthly[$i]['paid'] = $this->repmd->getcollmonthlypaidbyorderstatus($arrayorderstatus[$i],$curmonth);
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
            }

            $data = [
                'title' => 'Dashboard',
                'brand' => 'KOMET',

                'targetglobal' => $targetglobal,
                'targetq' => $targetq,
                'realisasiq' => $realisasiq,
                'curquartersales' => $curquartersales,
                'quartermonthsales' => $quartermonthsales,
                'ismonthly' => $ismonthly,
                'tsmonthlynopes' => $tsmonthlynopes,
                'valmonthlynopes' => $valmonthlynopes,
                'tsmonthlypadi' => $tsmonthlypadi,
                'valmonthlypadi' => $valmonthlypadi,
                'tsmonthlyibl' => $tsmonthlyibl,
                'valmonthlyibl' => $valmonthlyibl,
                'tsmonthlyobl' => $tsmonthlyobl,
                'valmonthlyobl' => $valmonthlyobl,
                'resumear' => $resumear,
                'collmonthly' => $collmonthly,

                'userid' => $this->session->userdata('userid'),
                'role' => $this->session->userdata('role'),
                'group' => $this->session->userdata('group'),
                'fullname' => $this->session->userdata('userfullname'),
                'photo' => $this->session->userdata('photo'),
                'position' => $this->session->userdata('position'),
                'joindate' => $this->session->userdata('joindate')
            ];
            $data['content'] = $this->load->view('modules/dashboard/pboard_view',$data, TRUE);
        /*/*}else {
            $drdk = $this->repmd->getvolnopesbymonth('KOMET');
            for ($x = 0; $x < count($drdk); $x++) {
                $km[] = json_encode($drdk[$x]['month']);
                $ki[] = json_encode($drdk[$x]['volinv']);
            }
            $blnkomet = implode(',', $km);
            $invkomet = implode(',', $ki);

            //echo $invkomet; exit;

            $drdm = $this->repmd->getvolnopesbymonth('MESRA');
            for ($y = 0; $y < count($drdm); $y++) {
                $mm[] = json_encode($drdm[$y]['month']);
                $mi[] = json_encode($drdm[$y]['volinv']);
            }
            $blnmesra = implode(',', $mm);
            $invmesra = implode(',', $mi);

            $drdvol = $this->repmd->getvolnopesbymonth('');
            for ($z = 0; $z < count($drdvol); $z++) {
                $vol[] = json_encode($drdvol[$z]['volinv']);
            }
            $invol = implode(',', $vol);

            $drdval = $this->repmd->getvalnopesbymonth('');
            for ($w = 0; $w < count($drdval); $w++) {
                $val[] = json_encode($drdval[$w]['valinv']);
            }
            $inval = implode(',', $val);

            //echo json_encode($this->repmd->getmyorderspb()); exit;

            $q1lastyear = $this->repmd->getvalnopesq12022();
            $q1thisyear = $this->repmd->getvalnopesq12023();
            $arrayq1 = array_merge_recursive($q1lastyear, $q1thisyear);

            $q2lastyear = $this->repmd->getvalnopesq22022();
            $q2thisyear = $this->repmd->getvalnopesq22023();
            $arrayq2 = array_merge_recursive($q2lastyear, $q2thisyear);

            $q3lastyear = $this->repmd->getvalnopesq32022();
            $q3thisyear = $this->repmd->getvalnopesq32023();
            $arrayq3 = array_merge_recursive($q3lastyear, $q3thisyear);

            $q4lastyear = $this->repmd->getvalnopesq42022();
            $q4thisyear = $this->repmd->getvalnopesq42023();
            $arrayq4 = array_merge_recursive($q4lastyear, $q4thisyear);

            //echo json_encode(array_merge_recursive($arraylastyear, $arraythisyear)); exit;
            //echo json_encode($this->repmd->getvalnopesbymonth('')); exit;

            $tmrw = $this->repmd->getapprovalnextday();
            $tomorrow = $this->indodate($tmrw[0]['nextday'], true);

            $data = [
                'title' => 'My Dashboard',
                'gettotalsegment' => json_encode($this->repmd->getmytotalsegment($this->session->userdata('userfullname'))),
                'getallnopesbyam' => $this->ordermd->getallnopesbyam($this->session->userdata('userfullname')),
                'getallprpobyam' => $this->ordermd->getallprpobyam($this->session->userdata('userfullname')),
                'getallspbbyam' => $this->spbmd->getallspbam($this->session->userdata('userfullname')),
                'onhand' => json_encode($this->repmd->getdashboardcolonhand()),
                'totalonhand' => $this->repmd->getdashboardcolonhandtotal(),
                'progress' => json_encode($this->repmd->getdashboardcolprogress()),
                'totalprogress' => $this->repmd->getdashboardcolprogresstotal(),
                'prospect' => json_encode($this->repmd->getdashboardcolprospect()),
                'totalprospect' => $this->repmd->getdashboardcolprospecttotal(),
                'getcolunpaid' => $this->billcomd->getallinvunpaid(),
                'getcolatfin' => $this->billcomd->getallinvatfin(),
                'getcolpostfin' => $this->billcomd->getallinvpostfin(),
                'getlastorder' => $this->repmd->getmylastorder($this->session->userdata('userfullname')),
                'getnopes' => $this->repmd->getmynopes($this->session->userdata('userfullname')),
                'getprpo' => $this->repmd->getmyprpo($this->session->userdata('userfullname')),
                'getrevenue' => $this->repmd->getmyrevenue($this->session->userdata('userfullname')),
                'getsegment' => $this->repmd->getmysegment($this->session->userdata('userid')),
                'getspb' => json_encode($this->repmd->getmyorderspb($this->session->userdata('userfullname'))),
                'estimasiprofit' => $this->repmd->getdashboardestprofit(),
                'valq1yoy' => json_encode($arrayq1),
                'valq2yoy' => json_encode($arrayq2),
                'valq3yoy' => json_encode($arrayq3),
                'valq4yoy' => json_encode($arrayq4),
                'divisionyoy' => json_encode($this->repmd->getvalnopesyoydivision('')),
                'desyoy' => json_encode($this->repmd->getvalnopesyoydes('')),
                'dgsyoy' => json_encode($this->repmd->getvalnopesyoydgs('')),
                'nonyoy' => json_encode($this->repmd->getvalnopesyoynon('')),
                'eksyoy' => json_encode($this->repmd->getvalnopesyoyeks('')),
                'sdayoy' => json_encode($this->repmd->getvalnopesyoysda('')),
                'ebisyoy' => json_encode($this->repmd->getvalnopesyoyebis('')),
                'allorder' => $this->repmd->getallorderbyspb(),
                'lastdate' => $this->repmd->getdashboardlastdate(),
                'tomorrow' => $tomorrow,
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

            $data['content'] = $this->load->view('modules/dashboard/myboard_view', $data, TRUE);
            $this->load->view('templates/base', $data, FALSE);
        }*/

        $this->load->view('templates/base', $data, FALSE);
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

	function ajaxviewunpaid(){
        $post = $this->input->post();

        if($post){

            $code = $post['unpaid'];
            $excode = explode('-',$code);
            if(count($excode) > 0 && count($excode) < 3){
                $param['orderstatus'] = $excode[0];
                $param['status'] = $excode[1];
                $detail = $this->repmd->detailunpaid($param);

                if(!empty($detail)){
                    if($param['status'] == '0'){
                        $status = 'Accurate';
                    }elseif($param['status'] == '6'){
                        $status = 'Percepatan';
                    }elseif($param['status'] == '2'){
                        $status = 'Segmen';
                    }elseif($param['status'] == '11'){
                        $status = 'NPK';
                    }elseif($param['status'] == '7'){
                        $status = 'Legal';
                    }elseif($param['status'] == '5'){
                        $status = 'Revisi';
                    }elseif($param['status'] == '8'){
                        $status = 'Doc Hilang';
                    }elseif($param['status'] == '3'){
                        $status = 'Invidea';
                    }elseif($param['status'] == '4'){
                        $status = 'Precise';
                    }elseif($param['status'] == '16'){
                        $status = 'Logistik';
                    }elseif($param['status'] == '18'){
                        $status = 'Keuangan';
                    }else{
                        $status = '';
                    }

                    $title = $param['orderstatus'].' - '.$status;

                    $data['drd'] = $detail;
                    $data['title'] = $title;
                    $view = $this->load->view('modules/dashboard/ajax_detail_unpaid', $data, TRUE);

                    $response = array(
                        'status' => 'success',
                        'title' => $title,
                        'view' => $view,
                        'titlestatus' => $param['orderstatus'].'-'.$param['status'],
                    );
                }else{
                    $response = array(
                        'status' => 'failed',
                        'msg' => 'Data not found in database',
                    );
                }

            }else{
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Unknown Post Param',
                );
            }
        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown Post Param',
            );
        }

        echo json_encode($response);
    }

    function download(){
        $get = $_GET;

        if($get){
            $code = $get['unpaid'];
            $excode = explode('-',$code);

            if(count($excode) > 0 && count($excode) < 3){
                $param['orderstatus'] = $excode[0];
                $param['status'] = $excode[1];
                $detail = $this->repmd->detailunpaid($param);

                if($param['status'] == '0'){
                    $status = 'Accurate';
                }elseif($param['status'] == '2'){
                    $status = 'Segmen';
                }elseif($param['status'] == '3'){
                    $status = 'Invidea';
                }elseif($param['status'] == '4'){
                    $status = 'Precise';
                }elseif($param['status'] == '16'){
                    $status = 'Logistik';
                }elseif($param['status'] == '18'){
                    $status = 'Keuangan';
                }else{
                    $status = '';
                }

                $strftitle = 'unpaid-'.$param['orderstatus'].'-'.$status;

                $t['drd'] = $detail;
                $t['title'] = $strftitle;

                $this->load->view('modules/dashboard/excel_unpaid_position',$t);

            }else{
                redirect(site_url('dashboard'));
            }
        }else{
            redirect(site_url('dashboard'));
        }
    }

}