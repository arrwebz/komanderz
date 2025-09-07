<?php defined('BASEPATH') or exit('No direct script access allowed');

class Offwork extends CI_Controller
{
	public $intattid;
	public $intuserid;
	public $strdatetime;
	
	public $strclockin;
	public $strclockout;
	
	public $strgmaps;
	public $strlat;
	public $strlong;
	public $strnotes;
	public $intstatus;
	
	public $intoffworkid;	
	public $struserfullname;
	public $strsdate;
	public $stredate;
	public $strtotalday; 
	public $stroffstatus;
	public $stroffnotes;
	public $intuseridap;
	public $strapdat;
	public $intstatusap;
	public $strcrdat;
	

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
		$this->load->model('Attendances_model', 'attmd');
		$this->load->model('User_model', 'usermd');
		$this->load->model('Report_model', 'repmd');
		$this->load->model('Offday_model', 'offdmd');
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
        $disabledays = array();

        $getoffday = $this->offdmd->getalloffday();
        foreach ($getoffday as $row){
            $disabledays = array_merge($disabledays, array($row['end']) );
        }

        $getweekend = json_decode($this->weekend());
        $disabledays = array_merge($disabledays, $getweekend);
        
		$data = [  
			'drd' => $this->attmd->getalluseroffwork(),
			'disabledays' => json_encode($disabledays),
			'drc' => $this->attmd->getallmyoffwork($this->session->userdata('userid')),
			'saldocuti' => $this->attmd->getuserleavebalance($this->session->userdata('userid')),
			'ambilcuti' => $this->attmd->getuseroffwork($this->session->userdata('userid')),
			'title' => 'Pengajuan Cuti',
			'brand' => 'Data Cuti Karyawan',
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
		//echo json_encode($getdata); exit;
		//echo '<pre>'; print_r($data); exit;
		$data['content'] = $this->load->view('modules/offwork/offwork_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
		 
	public function ajaxoffwork(){
			
		if ($this->input->post()){
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			
			$this->attmd->intuserid = $this->session->userdata('userid');			
			$this->attmd->strsdate = $this->input->post('txtSdat');
			$this->attmd->stredate = $this->input->post('txtEdat');			
			$this->attmd->strtotalday = $this->input->post('txtTdat');
			
			$this->attmd->stroffstatus = $this->input->post('txtCuti');
			$this->attmd->stroffnotes = $this->input->post('txtNotes');
			
			$this->attmd->intuseridap = '0';
			$this->attmd->strapdat = '0000-00-00 00:00:00';
			$this->attmd->intstatusap = '0';
			
			$this->attmd->strcrdat = mdate($datestring, $time);
			
			$this->attmd->addoffwork();
        
		}
    }
	
	public function approval() {
		
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('optApprove', 'Persetujuan', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				
				$this->attmd->intoffworkid = $this->input->post('hdnOffworkid'); //tblcuti
                $this->attmd->intuseridap = $this->session->userdata('userid');	 //tblcuti 
				$this->attmd->intstatusap = $this->input->post('optApprove');
				
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->attmd->strapdat = mdate($datestring, $time);				
				
				$this->attmd->intuserid = $this->input->post('hdnStaffid'); //tbluserinfo
				$this->attmd->intsaldocuti = $this->input->post('hdnSaldocuti') - $this->input->post('hdnTdat'); 				
				
                $this->attmd->approveoffwork();
				
                $this->attmd->updatesaldofw();
				// onclick="swal('Good job!', ' Success insert data', 'success', {buttons: false,timer: 3000,})"
                redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$drd = $this->attmd->getoffworkbyid($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intoffworkid = $row['offworkid'];
                $this->intuserid = $row['userid'];
                $this->struserfullname = $row['userfullname'];
				$this->strsdate = $row['sdate'];
				$this->stredate = $row['edate'];
				$this->strtotalday = $row['totalday']; 
				$this->stroffstatus = $row['offstatus'];
				$this->stroffnotes = $row['offnotes'];
				$this->intuseridap = $row['approveby'];
				$this->strapdat = $row['approvedat'];
				$this->intstatusap = $row['status'];
				$this->strcrdat = $row['crdat'];
				$this->intsaldocuti = $row['leavebalance'];
            }
        }
		
		// echo '<pre>';
		// print_r($drd);
		// exit;
		
		$data = [
            'offworkid' => $this->intoffworkid,
            'staffid' => $this->intuserid,
            'useroffwork' => $this->struserfullname,
            'awalcuti' => $this->strsdate,
            'akhircuti' => $this->stredate,
            'totalcuti' => $this->strtotalday,
            'jeniscuti' => $this->stroffstatus,
            'alasancuti' => $this->stroffnotes,
            'saldocuti' => $this->intsaldocuti,
            'statuscuti' => $this->intstatusap,
			
            'title' => 'Direktori',
			'brand' => 'Pengesahan Cuti',
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
		$data['content'] = $this->load->view('modules/offwork/offwork_approve_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
		
		
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


	function weekend(){
        $date = '01-01-'.date('Y');
        $date2 = '31-12-'.(date('Y')+2);

        $period = new DatePeriod(
            new DateTime($date),
            new DateInterval('P1D'),
            new DateTime($date2)
        );

        $weekends = [];
        foreach ($period as $key => $value) {
            if ($value->format('N') >= 6) {
                $weekends[] = $value->format('Y-m-d');
            }
        }

        return json_encode($weekends);
    }
}	