<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kapproval extends CI_Controller
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
			array('https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js')
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
		
		$data['content'] = $this->load->view('modules/kaprv/kaprv_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	//PENGURUS
	
	public function aprvspb() {
		$getdata = $this->spbmd->gettodayapprovalbycode($this->uri->segment(3));
        if (count($getdata) > 0) {
            foreach ($getdata as $dat) {
				$this->straprvdate = date('d F Y', strtotime($dat['aprvdate']));
            }
        }
		
		
		$data = [
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
		$data['content'] = $this->load->view('modules/kaprv/kaprv_app_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function update()
    {
		if ($this->input->post()) { 
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$spbid = $this->input->post('aprv[]');
			//echo '<pre>';print_r($spbid);exit; 
			
			if($spbid == NULL){			
			$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
														SPB belum dipilih.
													</div>');
			redirect(base_url().$this->router->fetch_class());
			} else {
				if($this->session->userdata('userid') == '40') {
					foreach($_POST['aprv'] as $spbidaprv){
					$ex_spbid = explode(',',$spbidaprv);
					 // echo '<pre>';print_r($spbidaprv);exit; 
					 
					$this->spbmd->intspbid = $ex_spbid[0]; //id spb
					
					$this->spbmd->intaprvsek = $this->session->userdata('userid'); //useridsekre
					$this->spbmd->intstaprvsek = '1';
					$this->spbmd->straprvdatsek = date('Y-m-d');
					
					if($ex_spbid[2] == 0) {
						$this->spbmd->intaprvstat = '0';
					} else {
						$this->spbmd->intaprvstat = '3'; 
						$this->spbmd->intstatus = '3'; 
						$this->spbmd->confirmstatspbid();
					}
					
					$this->spbmd->updateaprvsek(); 					
					
					//confirmstatspbid
					}				
					redirect(base_url($this->router->fetch_class()));
				} elseif($this->session->userdata('userid') == '34') {
					foreach($_POST['aprv'] as $spbidaprv){
					$ex_spbid = explode(',',$spbidaprv);
					 //echo '<pre>';print_r($spbidaprv);exit; 
					
					$this->spbmd->intspbid = $ex_spbid[0]; //id spb
					
					$this->spbmd->intaprvstat = '0';
					
					$this->spbmd->intaprvben = $this->session->userdata('userid'); //useridbendahara
					$this->spbmd->intstaprvben = '1';
					$this->spbmd->straprvdatben = date('Y-m-d'); 
					
					if($ex_spbid[1] == 0) {
						$this->spbmd->intaprvstat = '0';
					} else {
						$this->spbmd->intaprvstat = '3'; 
						$this->spbmd->intstatus = '3'; 
						$this->spbmd->confirmstatspbid();
					}
					
					$this->spbmd->updateaprvben(); 
					}				
					redirect(base_url($this->router->fetch_class()));
				} elseif($this->session->userdata('userid') == '39') {
					foreach($_POST['aprv'] as $spbidaprv){
					$ex_spbid = explode(',',$spbidaprv);
					 //echo '<pre>';print_r($spbidaprv);exit; 
					
					$this->spbmd->intspbid = $ex_spbid[0]; //id spb
					
					$this->spbmd->intaprvstat = '0';
					
					$this->spbmd->intaprvket = $this->session->userdata('userid'); //useridketua 
					$this->spbmd->intstaprvket = '1';
					$this->spbmd->straprvdatket = date('Y-m-d'); 
					
					if($ex_spbid[1] == 1 && $ex_spbid[2] == 1) {
						$this->spbmd->intaprvstat = '3';
						$this->spbmd->intstatus = '3'; 
						$this->spbmd->confirmstatspbid();
					} else { 
						$this->spbmd->intaprvstat = '1'; 
					}
					
					$this->spbmd->updateaprvket(); 
					}				
					redirect(base_url($this->router->fetch_class()));
				} else {
					foreach($_POST['aprv'] as $spbidaprv){
					$ex_spbid = explode(',',$spbidaprv);
					 //echo '<pre>';print_r($spbidaprv);exit; 
					
					$this->spbmd->intspbid = $ex_spbid[0]; //id spb
					
					$this->spbmd->intaprvstat = '3';
					
					$this->spbmd->intaprvsek = $this->session->userdata('userid'); //useridadmin
					$this->spbmd->intstaprvsek = '1';
					$this->spbmd->straprvdatsek = date('Y-m-d');
					
					$this->spbmd->intaprvben = $this->session->userdata('userid'); //useridadmin
					$this->spbmd->intstaprvben = '1';
					$this->spbmd->straprvdatben = date('Y-m-d'); 
					
					$this->spbmd->intaprvket = $this->session->userdata('userid'); //useridadmin
					$this->spbmd->intstaprvket = '1';
					$this->spbmd->straprvdatket = date('Y-m-d'); 
					
					$this->spbmd->updateaprvadmin(); 
					
					$this->spbmd->intstatus = '3'; 
					$this->spbmd->confirmstatspbid();
					}				
					redirect(base_url($this->router->fetch_class()));
				}
			}
		}
    }
	
}