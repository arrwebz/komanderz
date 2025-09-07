<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kfiling extends CI_Controller
{
	public $intspbid;
	public $intorderid;
	public $strcode;
    public $strjobtype;
    public $strapplicant;
	public $intvalue;
    public $strcustomer;
    public $strinfo;
	public $strspbdat;
	public $strtypeofpayment;
	public $straccnumber;
	public $straccname;
	public $strbank;
	public $strbankother;
	public $strprocessdate;
	public $intstatus;
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;
	
	public $strfiles;
	public $intnetvalue;
	public $intnegovalue;
	public $strstatorder;
	public $strinvnum;
	public $strinvdat;
	public $strunit;
	
	//budget
	public $intbudgetid;
	public $strbudgetdate;
	public $strchknum;
	public $intstatusbudget;
	
	//filing approval
	public $intfilingid;
	public $strfilingdate;
	public $stramname;
	
	//pengurus approval
	public $intspbaprvid;
	public $strcodeaprv;
	public $strspbval;
	public $straprvdate;
	public $intaprvstat;
	
	public $intaprvsek;
	public $intstaprvsek;
	public $straprvdatsek;
	
	public $intaprvben;
	public $intstaprvben;
	public $straprvdatben;
	
	public $intaprvket;
	public $intstaprvket;
	public $straprvdatket;

    public function __construct()
    {
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
            'form_validation',
			'html2pdf'
        ];
        $this->load->library($lib);
		$this->load->model('Spb_model', 'spbmd');
		$this->load->model('Order_model', 'ordermd');
		$this->load->model('Report_model', 'repmd');
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
			array($this->config->item('skins_uri').'plugins/iCheck/all.css'),
			array('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')
			
        );
        $js_head = array(
            array($this->config->item('skins_uri').'bower_components/jquery/dist/jquery.min.js'),
			array($this->config->item('skins_uri').'bower_components/jquery-ui/jquery-ui.min.js'),
			array($this->config->item('skins_uri').'bower_components/bootstrap/dist/js/bootstrap.min.js'),
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
			array($this->config->item('skins_uri').'plugins/iCheck/icheck.min.js'),
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
		
		$data = [ 
			'drd' => $this->spbmd->getmyfiling($this->session->userdata('userid'),'KOMET'),
			'drp' => $this->spbmd->getpfiling('KOMET'),
			//'drd' => $this->spbmd->getallspbkomet(),
			'title' => 'KOMET',
			'brand' => 'Daftar Persetujuan SPB',
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
		
		/* $tr = $this->spbmd->getallspboptoday();
		echo '<pre>';print_r($tr); exit; */
		//echo date('Ymdhis'); exit; 
		
		$data['content'] = $this->load->view('modules/kfiling/kfiling_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function addnew() {
		
		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Buat Persetujuan SPB',
			'drd' => $this->spbmd->getmyspbbyinvoicetoday('KOMET'),
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
		$data['content'] = $this->load->view('modules/kfiling/kfiling_add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function create()
    {
		if ($this->input->post()) { 
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$spbid = $this->input->post('aprv[]');
			
			if($spbid == NULL){			
			$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
														SPB belum dipilih.
													</div>');
			redirect(base_url().$this->router->fetch_class());
			} else {
				foreach($_POST['aprv'] as $spbidaprv){ 
					$ex_spbid = explode(',',$spbidaprv);
					// echo '<pre>';print_r($ex_spbid);exit; 
					
					$this->spbmd->strcodeaprv = 'RAPK'.date('Ymdhis');
					$this->spbmd->intuserid = $this->session->userdata('userid');
					$this->spbmd->intspbid = $ex_spbid[0]; //id spb
					$this->spbmd->intorderid = $ex_spbid[2]; // id invoice
					$this->spbmd->strspbval = $ex_spbid[3]; // nilai spb
					$this->spbmd->strunit = 'KOMET';
					$this->spbmd->straprvdate = date('Y-m-d', strtotime($this->input->post('tglAprv'))); 
					$this->spbmd->stramname = $ex_spbid[1]; //nama marketing
					$this->spbmd->intaprvstat = '0';
					
					$this->spbmd->intaprvsek = '0'; //useridsekre
					$this->spbmd->intstaprvsek = '0';
					$this->spbmd->straprvdatsek = '0000-00-00';
					
					$this->spbmd->intaprvben = '0'; //useridbendahara
					$this->spbmd->intstaprvben = '0';
					$this->spbmd->straprvdatben = '0000-00-00';
					
					$this->spbmd->intaprvket = '0'; //useridketua 
					$this->spbmd->intstaprvket = '0';
					$this->spbmd->straprvdatket = '0000-00-00';
					
					$this->spbmd->addfilingspb(); 
				}				
			redirect(base_url($this->router->fetch_class()));
			}
		}
    }
	
	public function myreqspb() {
		$getdata = $this->spbmd->gettodayapprovalbycode($this->uri->segment(3));
        if (count($getdata) > 0) {
            foreach ($getdata as $dat) {
				$this->straprvdate = date('d F Y', strtotime($dat['aprvdate']));
            }
        }
		// $arrspbid = explode(';',$this->intspbid);
		// $arrlength = count($arrspbid);
		/* $arrlength = count($arrspbid);
		for($x = 0; $x < $arrlength; $x++) {
			echo $this->spbmd->getsinglespbinv($arrspbid[$x]);
			echo "<br>";
		} */
		// foreach ($arrspbid as $spb){
			// $rowspb[] = $this->spbmd->getsinglespbinvapproval($spb);
		// }
		/* echo '<pre>';
		print_r($rowspb); exit; */ 
		
		
		$data = [
            // 'filingid' => $this->intfilingid,
			// 'spbid' => $this->intspbid,
			// 'unit' => $this->strunit,
			// 'rowcount' => $arrlength,
			// 'rowtable' => $rowspb, 
			// 'amname' => $this->stramname,
			'tglapp' => $this->straprvdate,
			'drd' => $this->spbmd->gettodayapprovalbycode($this->uri->segment(3)),
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Approval SPB',
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
		$data['content'] = $this->load->view('modules/kfiling/kfiling_today_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function ajaxupdateam() {
		
		if ($this->input->post()) {
			$this->spbmd->intfilingid = $this->input->post('hdnFilingid');
			$this->spbmd->stramname = $this->input->post('optAmname');
			$this->spbmd->updateapproveam();	
			
			echo 'success';
				
		}
    }
	
	//PENGURUS
	
	public function appspb() {
		$drd = $this->spbmd->gettodayapprovalbyid($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->intfilingid = $row['spbfilingid'];
                $this->intspbid = $row['spbid'];
				$this->strunit = $row['unit'];
				$this->strfilingdate = date('d F Y', strtotime($row['filingdate']));
				$this->stramname = $row['amname'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		$arrspbid = explode(';',$this->intspbid);
		$arrlength = count($arrspbid);
		/* $arrlength = count($arrspbid);
		for($x = 0; $x < $arrlength; $x++) {
			echo $this->spbmd->getsinglespbinv($arrspbid[$x]);
			echo "<br>";
		} */
		foreach ($arrspbid as $spb){
			$rowspb[] = $this->spbmd->getsinglespbinvapproval($spb);
		}
		/* echo '<pre>';
		print_r($rowspb); exit; */
		
		
		$data = [
            'filingid' => $this->intfilingid,
			'spbid' => $this->intspbid,
			'unit' => $this->strunit,
			'rowcount' => $arrlength,
			'rowtable' => $rowspb, 
			'tglapp' => $this->strfilingdate,
			'amname' => $this->stramname,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Approval SPB',
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
		$data['content'] = $this->load->view('modules/kfiling/kfiling_app_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function ajaxapprove() {
		if ($this->input->post()) {
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			
			$filingid = $_POST['hdnFilingid'];
			$drd = $this->spbmd->gettodayapprovalbyid($filingid); 
			if (count($drd) > 0) {
				foreach ($drd as $row) {
					$this->intfilingid = $row['spbfilingid'];
					$this->intspbid = $row['spbid'];
					$this->strunit = $row['unit'];
					$this->strfilingdate = date('d F Y', strtotime($row['filingdate']));
					$this->stramname = $row['amname'];
					$this->strcruser = $row['cruser'];
					$this->strcrdat = $row['crdat'];
					$this->strchuser = $row['chuser'];
					$this->strchdat = $row['chdat'];
				}
			}
			
			$this->spbmd->intfilingid = $this->intfilingid;
			$this->spbmd->stramname = $this->input->post('optAmname');
			$this->spbmd->strchuser = $this->session->userdata('userid');
			$this->spbmd->strchdat = mdate($datestring, $time);
			$this->spbmd->updateapproveam();	
			
			$arrspbid = explode(';',$this->intspbid);
			$arrlength = count($arrspbid);
			
			$spbid = $this->input->post('filing[]');
			//$this->spbmd->intspbid = implode(';',$spbid);
			
			for ($row = 0; $row < $arrlength; $row++) {
					$this->spbmd->intspbid = $spbid; 
					$this->spbmd->intstatus = '3';
					$confirm = $this->spbmd->confirmstatspbid();
				}
			
			echo 'success';
				
		}
    }
	
}