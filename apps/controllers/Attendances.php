<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendances extends CI_Controller
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
	public $inthealth;

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
		$getin = $this->attmd->getsingleinbyusernow($this->session->userdata('userid'));
		if (count($getin) > 0) {
            foreach ($getin as $rowin) {
				$this->strclockin = date('H:i',strtotime($rowin['datetime']));
            }
        }

		$getout = $this->attmd->getsingleoutbyusernow($this->session->userdata('userid'));
		if (count($getout) > 0) {
            foreach ($getout as $rowout) {
				$this->strclockout = date('H:i',strtotime($rowout['datetime']));
            }
        }

		$getdata = $this->attmd->getsingleattbyusernow($this->session->userdata('userid'));
        $getdob = $this->attmd->checkdob();
        $getprofile = $this->usermd->getsingleuserprofile($this->session->userdata('userid'));
		$getovertime = $this->attmd->getsingleovertimebyusernow($this->session->userdata('userid'));

        $disabledays = array();
        $getoffday = $this->offdmd->getalloffday();
        foreach ($getoffday as $row){
            $disabledays = array_merge($disabledays, array($row['end']) );
        }

        $getweekend = json_decode($this->weekend());
        $disabledays = array_merge($disabledays, $getweekend);

		$data = [   
			'drp' => $getprofile,
			'drd' => $getdata,
			'dob' => $getdob,
			'clockin' => $this->strclockin,
			'clockout' => $this->strclockout,
			'overtime' => $getovertime,
            'disabledays' => json_encode($disabledays),
			'title' => 'Attendance',
			'brand' => 'Personal',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate'),
			'location' => $this->session->userdata('location')
		];
		
		$data['content'] = $this->load->view('modules/attendances/attendances_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
		
	public function clockin() {
		$getdata = $this->attmd->getsingleinbyusernow($this->session->userdata('userid'));
		$getdate = $this->indodate(date('Y-m-d'), true);
		$data = [ 
			'drd' => $getdata,
			'datenow' => $getdate,
			'title' => 'Kehadiran',
			'brand' => 'Clockin',
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
		$data['content'] = $this->load->view('modules/attendances/clockin_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

    public function ajaxclockin() {
        if ($this->input->post()) {
            $getdata = $this->attmd->getsingleinbyusernow($this->session->userdata('userid'));
            //if(count($getdata) < 1){
                /* absen */
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->attmd->intuserid = $this->session->userdata('userid');

                $this->attmd->strdatetime = mdate($datestring, $time);

                $this->attmd->strgmaps = '';
                $this->attmd->strlat = $this->input->post('txtLat');
                $this->attmd->strlong = $this->input->post('txtLong');

                $this->attmd->strnotes = $this->input->post('txtNotes');
                $this->attmd->intstatus = $this->input->post('optStatus');
                $this->attmd->inthealth = $this->input->post('optHealth');

                $this->attmd->addattendances();
            //}else{
                /* kunjungan */
                // $datestring = '%Y-%m-%d %H:%i:%s';
                // $time = time();
                // $this->attmd->intuserid = $this->session->userdata('userid');
                // $this->attmd->strdatetime = mdate($datestring, $time);
                // $this->attmd->strgmaps = '';
                // $this->attmd->strlat = $this->input->post('txtLat');
                // $this->attmd->strlong = $this->input->post('txtLong');
                // $this->attmd->strnotes = $this->input->post('txtNotes');
                // $this->attmd->intstatus = '6';

                // $this->attmd->addvisit();
            //}
        }
    }
	
	public function clockout() { 
		$getdata = $this->attmd->getsingleoutbyusernow($this->session->userdata('userid'));
		$getdate = $this->indodate(date('Y-m-d'), true);
		$data = [ 
			'drd' => $getdata,
			'datenow' => $getdate,
			'title' => 'Kehadiran',
			'brand' => 'Clockout',
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
		$data['content'] = $this->load->view('modules/attendances/clockout_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function ajaxclockout() {
		if ($this->input->post()) {
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$this->attmd->intuserid = $this->session->userdata('userid');
			
			$this->attmd->strdatetime = mdate($datestring, $time);
			
			$this->attmd->strgmaps = '';
			$this->attmd->strlat = $this->input->post('txtLat');
			$this->attmd->strlong = $this->input->post('txtLong');
			
			$this->attmd->strnotes = $this->input->post('txtNotes');
			$this->attmd->intstatus = '2';
			$this->attmd->inthealth = '0';
			
			$this->attmd->addattendances();
        
		}
    }
	
	public function overtime() {
		$getdata = $this->attmd->getsingleovertimebyusernow($this->session->userdata('userid'));
		$getdate = $this->indodate(date('Y-m-d'), true);
		$data = [ 
			'drd' => $getdata,
			'datenow' => $getdate,
			'title' => 'Kehadiran',
			'brand' => 'Clockin',
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
		$data['content'] = $this->load->view('modules/attendances/overtime_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

    public function ajaxovertime() {
        if ($this->input->post()) {
            $getdata = $this->attmd->getsingleovertimebyusernow($this->session->userdata('userid'));
            
                /* absen */
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->attmd->intuserid = $this->session->userdata('userid');

                $this->attmd->strdatetime = mdate($datestring, $time);

                $this->attmd->strgmaps = '';
                $this->attmd->strlat = $this->input->post('txtLat');
                $this->attmd->strlong = $this->input->post('txtLong');

                $this->attmd->strnotes = $this->input->post('txtNotes');
                $this->attmd->intstatus = '9';
                $this->attmd->inthealth = $this->input->post('optHealth');

                $this->attmd->addattendances();
            
        }
    }

    function dataovertime(){
        $post = $this->input->post();

        if($post){
            $id = $this->session->userdata("userid");
            $optBulan = $post['optBulan'];
            $drd = $this->attmd->getsingleovertimebyusernow($id, $optBulan);

            if(empty($drd)){
                $response = array(
                    'status' => 'emptydata',
                    'msg' => 'Belum ada data lembur',
                );
            }else{
                $data['overtime'] = $drd;
                $view = $this->load->view('modules/attendances/ajax_overtime', $data, TRUE);

                $response = array(
                    'status' => 'success',
                    'data' => $drd,
                    'view' => $view,
                    'msg' => '',
                );
            }

        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'system not responding',
            );
        }

        echo json_encode($response);
    }

    function exportlembur(){
        $id = $this->session->userdata("userid");
        $name = $this->session->userdata("userfullname");
        $group = $this->session->userdata("group");
        $manager = $this->attmd->mymanager($group);
        $optBulan = $_GET['optBulan'];
        $drd = $this->attmd->getsingleovertimebyusernow($id, $optBulan);

        $data = array(
            'overtime' => $drd,
            'nama' => $name,
            'manager' => $manager[0]['fullname'],
            'periode' => getIndMonth($optBulan).' '.date('Y'),

            'title' => 'DAFTAR LEMBUR KARYAWAN-'.$name.'-'.getIndMonth($optBulan).' '.date('Y'),
        );
        $this->load->view('modules/attendances/export_lembur',$data);
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
    
    public function eos() {
		$getin = $this->attmd->getsingleinbyusernow($this->session->userdata('userid'));
		if (count($getin) > 0) {
            foreach ($getin as $rowin) {
				$this->strclockin = date('H:i',strtotime($rowin['datetime']));
            }
        }

		$getout = $this->attmd->getsingleoutbyusernow($this->session->userdata('userid'));
		if (count($getout) > 0) {
            foreach ($getout as $rowout) {
				$this->strclockout = date('H:i',strtotime($rowout['datetime']));
            }
        }

		$getdata = $this->attmd->getsingleattbyusernow($this->session->userdata('userid'));
        $getdob = $this->attmd->checkdob();
        $getprofile = $this->usermd->getsingleuserprofile($this->session->userdata('userid'));
		$getovertime = $this->attmd->getsingleovertimebyusernow($this->session->userdata('userid'));

        $disabledays = array();
        $getoffday = $this->offdmd->getalloffday();
        foreach ($getoffday as $row){
            $disabledays = array_merge($disabledays, array($row['end']) );
        }

        $getweekend = json_decode($this->weekend());
        $disabledays = array_merge($disabledays, $getweekend);

		$data = [   
			'drp' => $getprofile,
			'drd' => $getdata,
			'dob' => $getdob,
			'clockin' => $this->strclockin,
			'clockout' => $this->strclockout,
			'overtime' => $getovertime,
            'disabledays' => json_encode($disabledays),
			'title' => 'Attendance',
			'brand' => 'Personal',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate'),
			'location' => $this->session->userdata('location')
		];
		
		$data['content'] = $this->load->view('modules/attendances/attendances_eos_view', $data, TRUE);
        $this->load->view('templates/eos', $data, FALSE);
    }
    
    public function clockin_eos() {
		$getdata = $this->attmd->getsingleinbyusernow($this->session->userdata('userid'));
		$getdate = $this->indodate(date('Y-m-d'), true);
		$data = [ 
			'drd' => $getdata,
			'datenow' => $getdate,
			'title' => 'Kehadiran',
			'brand' => 'Clockin',
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
		$data['content'] = $this->load->view('modules/attendances/clockin_view', $data, TRUE);
        $this->load->view('templates/eos', $data, FALSE);
	}
	
	public function clockout_eos() { 
		$getdata = $this->attmd->getsingleoutbyusernow($this->session->userdata('userid'));
		$getdate = $this->indodate(date('Y-m-d'), true);
		$data = [ 
			'drd' => $getdata,
			'datenow' => $getdate,
			'title' => 'Kehadiran',
			'brand' => 'Clockout',
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
		$data['content'] = $this->load->view('modules/attendances/clockout_view', $data, TRUE);
        $this->load->view('templates/eos', $data, FALSE);
	}
    
    public function overtime_eos() {
		$getdata = $this->attmd->getsingleovertimebyusernow($this->session->userdata('userid'));
		$getdate = $this->indodate(date('Y-m-d'), true);
		$data = [ 
			'drd' => $getdata,
			'datenow' => $getdate,
			'title' => 'Kehadiran',
			'brand' => 'Clockin',
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
		$data['content'] = $this->load->view('modules/attendances/overtime_view', $data, TRUE);
        $this->load->view('templates/eos', $data, FALSE);
	}
    
}	