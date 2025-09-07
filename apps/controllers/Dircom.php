<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dircom extends CI_Controller
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
		
		$getdata = $this->usermd->getallusermaps();
 
        // $markers = [];
        // $infowindow = [];
		
		// for ($z = 0; $z < count($getdata); $z++) {
			// $markers[] = json_encode($getdata[$z]['volinv']);
		// }
		// $invol = implode(',',$vol); 
 
        foreach($getdata as $value) {
          $markers[] = [
            $value->fullname, $value->latitude, $value->longitude
          ];
          $infowindow[] = [
           "<div class=info_content><h3>".$value->fullname."</h3></div>"
          ];
        }
        //echo json_encode($markers); exit;
		//echo '<pre>'; print_r($markers); exit;
		$data = [  
			'markers' => json_encode($markers),
			'infowindow' => json_encode($infowindow),
			'drd' => $this->usermd->getalluseractive(),
			'title' => 'Direktori',
			'brand' => 'Data Karyawan',
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
		
		$data['content'] = $this->load->view('modules/dircom/dircom_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function details() {
		$drd = $this->usermd->getsingleuserprofile($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) { 
                $this->intuserinfoid = $row['userinfoid'];
				$this->intuserid = $row['userid'];
				$this->strfullname = $row['fullname'];
				$this->strposition = $row['position'];
				$this->strgender = $row['gender'];
				$this->strmarital = $row['marital'];
				$this->strblood = $row['bloodtype'];
				$this->strbplace = $row['bplace'];
				$this->strdob = $row['dob'];
				$this->strreligion = $row['religion'];
				$this->straddress = $row['address'];
                $this->streducation = $row['education'];
                $this->stridcard = $row['idcard'];
                $this->strnpwp = $row['npwp'];
                $this->strpassport = $row['passport'];
                $this->strpassportexp = $row['passportexp'];
                $this->strstatkerja = $row['userstatus'];
                $this->strlocation = $row['location'];
                $this->intusernik = $row['nik'];
                $this->stremail = $row['email'];
                $this->strtelp = $row['telp'];
                $this->strgroupcode = $row['groupcode'];
                $this->strphoto = $row['photo'];
                $this->strshirt = $row['sizeshirt'];
                $this->strjacket = $row['sizejacket'];
                $this->strpants = $row['sizepants'];
                $this->strshoes = $row['sizeshoes'];
                $this->intleavebalance = $row['leavebalance'];
            }
        }
		
		$data = [
			'staffamily' => $this->usermd->getuserfamily($this->intuserid),
            'staffid' => $this->intuserid,
			'userinfoid' => $this->intuserinfoid,
			'usernik' => $this->intusernik,  
			'staffname' => $this->strfullname,  
			'staffphoto' => $this->strphoto,  
			'staffposition' => $this->strposition,  
			'saldocuti' => $this->intleavebalance,  
			'email' => $this->stremail,  
			'telp' => $this->strtelp, 
			'gender' => $this->strgender,
			'statusnikah' => $this->strmarital,
			'goldarah' => $this->strblood,
			'agama' => $this->strreligion,
			'tlahir' => $this->strbplace,
			'ttl' => $this->strdob,
			'address' => $this->straddress,
			'education' => $this->streducation,
             'ktp' =>   $this->stridcard, 
             'npwp' =>   $this->strnpwp,
			 'paspor' => $this->strpassport, 
			 'pasporex' => $this->strpassportexp, 
             'statuskerja' =>  $this->strstatkerja, 
             'divisi' =>  $this->strgroupcode, 
             'baju' =>  $this->strshirt, 
             'jaket' =>  $this->strjacket, 
             'celana' =>  $this->strpants, 
             'sepatu' =>  $this->strshoes, 
            'title' => 'Staff Profile',
			'brand' => '',
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
		 
		$data['content'] = $this->load->view('modules/dircom/detail_staff_view', $data, TRUE);
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
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$this->attmd->intuserid = $this->session->userdata('userid');
			
			$this->attmd->strdatetime = mdate($datestring, $time);
			
			$this->attmd->strgmaps = '';
			$this->attmd->strlat = $this->input->post('txtLat');
			$this->attmd->strlong = $this->input->post('txtLong');
			
			$this->attmd->strnotes = $this->input->post('txtNotes');
			$this->attmd->intstatus = $this->input->post('optStatus');
			
			$this->attmd->addattendances();
        
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
			
			$this->attmd->addattendances();
        
		}
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

    function download(){
        $t['drd'] = $this->usermd->getalluseractive();
        $t['title'] = 'data-karyawan-komet-'.date('Y');

        $this->load->view('modules/dircom/excel_dircom', $t);
    }
}	