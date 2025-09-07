<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kreportspb extends CI_Controller
{
	

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
            'form_validation'
        ];
        $this->load->library($lib);
		$this->load->model('Report_model', 'repmd');
		$this->load->model('Dropdown_model', 'drdmd'); 
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
        );
        
        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	//belom ambil data per unit
    public function index() {
		$data = [ 
			'drdnday' => json_encode($this->repmd->getreportspbperday('KOMET')),
			'drdnmonth' => json_encode($this->repmd->getreportspbpermonth('KOMET')),
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'title' => 'KOMET',
			'brand' => 'Laporan SPB',
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
		
		//echo json_encode($this->repmd->getreportkspbpermonth()); exit;
		
		$data['content'] = $this->load->view('modules/kreport/kreport_spb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function reportfilter() {
			$unit = 'KOMET';
			$division = $this->input->post('optDivision');
			$segment = $this->input->post('optSegment');
			$statspb = $this->input->post('optSPB');
			$payment = $this->input->post('optPayment');
			
			
			$month = $this->input->post('optMonth');
			$year = $this->input->post('optYear');
			//var_dump($strdate); exit;	
			/*$sql = $this->repmd->getreportkomet($strorderstat,$strmonth);
			echo '<pre>';
			print_r($sql); exit; */
			
			$data = [ 
			'division' => $division,
			'segment' => $segment,
			'spb' => $statspb,
			'payment' => $payment,
			'month' => $month,
			'year' => $year,
			'drd' => $this->repmd->getreportspb($unit,$division,$segment,$statspb,$payment,$month,$year),
			'title' => 'KOMET',
			'brand' => 'Laporan SPB',
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
		
		$data['content'] = $this->load->view('modules/kreport/kfilter_spb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
        
		
    }
	
	public function exportfilter(){
		$unit = 'KOMET';
		$division = $this->input->post('hdnDivision');
		$segment = $this->input->post('hdnSegment');
		$statspb = $this->input->post('hdnSPB');
		$payment = $this->input->post('hdnPayment');
		$month = $this->input->post('hdnMonth');
		$year = $this->input->post('hdnYear');
		$strftitle = $segment.'/'.$fdate.'/'.$edate.'/KOMET';
		$data = array( 'title' => 'Laporan SPB Komet : '.$strftitle,
                'drd' => $this->repmd->getreportspbnew()); 
		/* $data = $this->repmd->getreportkomet();
		echo '<pre>';  
		print_r($data); exit; */
           $this->load->view('modules/kreport/kexport_spb_view',$data);
	}	 
	

}