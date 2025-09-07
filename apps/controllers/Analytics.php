<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytics extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		self::bindskins();
		if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }$hlp = [
            'date'
        ];
        $this->load->helper($hlp);
		$this->load->model('Order_model', 'ordermd');
		$this->load->model('Spb_model', 'spbmd');
		$this->load->model('Member_model', 'mbrmd');
		$this->load->model('Billco_model', 'billcomd');
		$this->load->model('Report_model', 'repmd');
		$this->load->model('Treport_model', 'trpmd');
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
            array($this->config->item('skins_uri').'libs/amcharts4/core.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/charts.js'),
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
        $blnmesra = array();
        $invmesra = array();
		if(count($drdm) > 0){
            for ($y = 0; $y < count($drdm); $y++) {
                $mm[] = json_encode($drdm[$y]['month']);
                $mi[] = json_encode($drdm[$y]['volinv']);
            }
            $blnmesra = implode(',',$mm);
            $invmesra = implode(',',$mi);
        }
		
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

        $invtipeorder = $this->repmd->getanalyticstotaltipeorder();
		
		//$tjsonspbinv = json_encode($this->repmd->getprospectcm());
		
		//echo '<pre>'; print_r(count($this->repmd->getsumq()) - 1); exit;
		
		//echo json_encode($this->repmd->getprospectcm()); exit;

        $get_realisasi = $this->repmd->getsumq();
        $realisasiq = '';
        if(count($get_realisasi) > 0){
            $realisasiq = $get_realisasi[1]['value'];
        }

        $ampvol = $this->repmd->getdashboardampvol();
        $prpvol = $this->repmd->getdashboardprpvol();
        $arrprvol = array(
            'orderid' => $prpvol[0]['orderid'],
            'amkomet' => 'Project',
            'amphoto' => $this->config->item('uploads_uri').'user/ai/agung.jpg',
        );
        array_push($ampvol, $arrprvol);

        $ampval = $this->repmd->getdashboardampval();
        $prpval = $this->repmd->getdashboardprpval();
        $arrprval = array(
            'basevalue' => $prpval[0]['basevalue'],
            'amkomet' => 'Project',
            'amphoto' => $this->config->item('uploads_uri').'user/ai/agung.jpg',
        );
        array_push($ampval, $arrprval);

        $revvol = $this->repmd->getvolrevhiswithcancel('');

		$data = [ 
			'title' => 'Analytics', 
			'month' => $blnkomet,
			'drdinvk' => $invkomet,
			'drdinvm' => $invmesra,
            'divisionyoy' => json_encode($this->repmd->getvalnopesyoydivision('')),  
            'divisionyoysm2' => json_encode($this->repmd->getvalnopesyoydivisionsm2('')),
            'drdamvol' => json_encode($ampvol),
            'drdamval' => json_encode($ampval),
            'drdamcollvol' => json_encode($this->repmd->getdashboardampcollvol()),
            'drdamcollval' => json_encode($this->repmd->getdashboardampcollval()),
			'drdvolyoy' => json_encode($this->repmd->getvolnopesyoy('')),
			'drdvalyoy' => json_encode($this->repmd->getvalnopesyoy('')),
			'drdinvol' => json_encode($this->repmd->getvolnopesbymonth('')),
			'drdrevhis' => json_encode($revvol),
			'drdinval' => json_encode($this->repmd->getvalnopesbymonth('')),
			'lastdate' => $this->repmd->getdashboardlastdate(),
			'invdist' => json_encode($this->repmd->getdashboarddistval()), 
			'invdistsm2' => json_encode($this->repmd->getdashboarddistvalsm2()),
			'allspb' => json_encode($tjsonspbinv),
            'invtipeorder' => json_encode($invtipeorder),
			'allinv' => json_encode($this->repmd->getdashboardallinv()),
			'prospectdiv' => json_encode($this->repmd->getvalprospectbydiv()),
			'totalprospect' => $this->repmd->gettotalprospect(),
			'totaltarget' => $this->totalformatrev(),  
			'totalrev' => $this->repmd->getdashboardtotrev(),
			'totalcost' => $this->repmd->getdashboardtotcost(),
			'totalprofit' => $this->repmd->getdashboardtotprof(),
			'totalspb' => $this->spbmd->countspb(),
			'totalinvtd' => $this->ordermd->countinvoice(),
			'totalinv' => $this->ordermd->countallinvoice(),
			'totalpaid' => $this->billcomd->countpaid(),
			'estimasiprofit' => $this->repmd->getdashboardestprofit(),
			'newestimasiprofit' => $this->repmd->getnewdashboardestprofit(),
			'getsumq' => $this->repmd->getsumq(), 
			'drdvalpadi' => json_encode($this->repmd->getvalpadi()),
			'collectionpaid' => json_encode($this->repmd->getnewcollectionpaid()), 
			'collectionunpaid' => json_encode($this->repmd->getnewcollectionunpaid()),
			'collectionpaidunpaid' => json_encode($this->repmd->getnewcollectionpaidunpaid()),
            'collectionreceivepaidunpaid' => json_encode($this->repmd->getnewcollectionreceivepaidunpaid()),
            'getarbyday' => json_encode($this->repmd->getarbyday()),
            'collectionpostingforecasting' => json_encode($this->repmd->getnewcollectionpostingforecasting()),
            'prospectcm' => json_encode($this->repmd->getprospectcm()),
            'prospectcmsm2' => json_encode($this->repmd->getprospectcmsm2()),
			'totalpadi' => $this->repmd->gettotalpadi(),
            'realisasiq' => $realisasiq,
            'memberactive' => $this->trpmd->totalactivemember(),

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/dashboard/analytics_view',$data, TRUE);
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

    function tabungan_segment(){
        if($_POST){
            $post = $_POST;
            $data['drdrepseg'] = $this->repmd->getreportsegmen($post);
            $data['param'] = $post;
            if($post['optTahunSegment'] == 'all'){
                $data['tahun'] = '2019 s/d '.date('Y');
            }else{
                $data['tahun'] = $post['optTahunSegment'];
            }

            $this->load->view('modules/dashboard/ajax_tabungan_segment', $data, FALSE);
        }else{
            echo 'Are you need something.?';
        }

    }


}