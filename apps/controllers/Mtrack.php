<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtrack extends CI_Controller
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
            'form_validation',
			'html2pdf'
        ];
        $this->load->library($lib);
		$this->load->model('Spb_model', 'spbmd');
		$this->load->model('Order_model', 'ordermd');
		$this->load->model('Track_model', 'trkmd');
		$this->load->model('Dropdown_model', 'drdmd'); 
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
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
		
		$amname = $this->session->userdata('userfullname');
		if($this->session->userdata('userid') == '21' || $this->session->userdata('userid') == '30' || $this->session->userdata('userid') == '36' || $this->session->userdata('userid') == '37' ) {
			$drd = $this->trkmd->getallinvoicebyam($amname,'MESRA');
		} else {
			$drd = $this->trkmd->getallinvoice('MESRA');
		}
		
		$data = [ 
			'drd' => $drd,
			'segment' => $this->drdmd->getallseg(),
			'title' => 'MESRA',
			'brand' => 'Tracking Invoice', 
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
            'alertnopesprpoprevyear' => $this->repmd->getalertnopesprpoprevyear(),
			'alertnopes' => $this->repmd->getalertnopes(), 
			'alertprpo' => $this->repmd->getalertprpo(), 
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
		
		$data['content'] = $this->load->view('modules/mtrack/mtrack_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function search() {
		
		$unit = 'MESRA';
		$invnum = $this->input->post('txtInv');
		$segmen = $this->input->post('optSegment');
		$invmonth = $this->input->post('optMonth');
		$invyear = $this->input->post('optYear');
		
		$data = [ 
			'drd' => $this->trkmd->getsearchtrackorder($unit,$invnum,$segmen,$invmonth,$invyear),
			'title' => 'MESRA',
			'brand' => 'Tracking',
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
		
		$data['content'] = $this->load->view('modules/mtrack/search_mtrack_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function details() {
		$drd = $this->ordermd->getsinglenopes($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderid = $row['orderid'];
				$this->intspbid = $row['spbid'];
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
				$this->intnvnum = $row['invnum'];
				$this->intfaknum = $row['faknum'];
				
				$this->strinvdat = date('d-m-Y', strtotime($row['invdate'])); 
				$this->strsentdat = date('d-m-Y', strtotime($row['sentdate'])); 
				
				$this->strunit = $row['unit'];
				$this->strjobtype = $row['jobtype'];
				$this->strdivision = $row['division'];
				$this->strsegment = $row['segment'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				
				$this->strspknum = $row['spknum'];
				$this->strspkindat = date('d-m-Y', strtotime($row['spkindat'])); 
				$this->strspkdat = date('d-m-Y', strtotime($row['spkdat'])); 
				
				$this->intbasevalue = $row['basevalue'];
				$this->intjstvalue = $row['jstvalue'];
				$this->intppnvalue = $row['ppnvalue'];
				$this->intpphvalue = $row['pphvalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['marginvalue'];
				
				$this->strvrecnum = $row['vrecnum'];
				$this->intstatinv = $row['status'];
				$this->strfrom = $row['receivefrom'];
				$this->strprocdat = date('d-m-Y', strtotime($row['procdat']));
				$this->intvrecvalue = $row['vrecvalue'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		 
			if($this->strdivision == "EKS"){
				$strreceive = $this->strsegment;
			} else {
				$strreceive = "TELKOM";
			} 
		 
		if($this->strprocdat == '01-01-1970' || $this->strprocdat == '30-11--0001') {
			$this->strprocdat = ' ';
		}
				
		$data = [
            'id' => $this->intorderid,
			'kodenomor' => $this->strcode,
             'unit' =>   $this->strunit,
			 'jp' => $this->strjobtype,
             'divisi' =>   $this->strdivision,
             'segmen' =>  $this->strsegment,
			 'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'namaproyek' => $this->strprojectname,
			'receive' => $strreceive,
			'nomorspk' => $this->strspknum,
			'tglmskspk' => $this->strspkindat,
			'tglspk' => $this->strspkdat,
			
			'nilaidasar' =>	strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
			'nilaijusti' =>	strrev(implode('.',str_split(strrev(strval($this->intjstvalue)),3))),
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilaipph' =>	strrev(implode('.',str_split(strrev(strval($this->intpphvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid), 
			'positioninvoice' => $this->trkmd->getpositionbyinvoice($this->intorderid), 
			'statusorder' => $this->strstatorder,
			'statusinvoice' => $this->intstatinv,
			'nomorvoucher' => $this->strvrecnum,
			'tglcair' => $this->strprocdat,
			'nilaivoucher' => strrev(implode('.',str_split(strrev(strval($this->intvrecvalue)),3))),
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'MESRA',
			'brand' => 'Detail Invoice',
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
		$data['content'] = $this->load->view('modules/mtrack/detail_mtrack_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function ajaxposition()
    {
		if ($this->input->post()) {
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$this->trkmd->intorderid = $this->input->post('hdnOrderid');
			
			$position = $this->input->post('optPosition');
			/*if($position == 'closed'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '1';
				$this->ordermd->intstatinv = '1';
			} elseif($position == 'materai'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '11';
				$this->ordermd->intstatinv = '11';
			} elseif($position == 'signed'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '12';
				$this->ordermd->intstatinv = '12';
			} elseif($position == 'segmen'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '13';
				$this->ordermd->intstatinv = '13';
			} elseif($position == 'PJM'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '14';
				$this->ordermd->intstatinv = '14';
			} elseif($position == 'ASD'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '15';
				$this->ordermd->intstatinv = '15';
			} elseif($position == 'logistik'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '16'; 
				$this->ordermd->intstatinv = '16';
			} elseif($position == 'legal'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '17'; 
				$this->ordermd->intstatinv = '17';
			} elseif($position == 'keuangan'){
				$this->trkmd->strposition = $this->input->post('optPosition');
				$this->trkmd->inttrackstatus = '18'; 
				$this->ordermd->intstatinv = '18'; 
			}*/

            if($position == 'accurate'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '0';
                $this->ordermd->intstatinv = '0';
            }elseif($position == 'segmen'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '2';
                $this->ordermd->intstatinv = '2';
            }elseif($position == 'invidea'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '3';
                $this->ordermd->intstatinv = '3';
            }elseif($position == 'precise'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '4';
                $this->ordermd->intstatinv = '4';
            }elseif($position == 'pps'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '16';
                $this->ordermd->intstatinv = '16';
            }elseif($position == 'keuangan'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '18';
                $this->ordermd->intstatinv = '18';
            }elseif($position == 'legal'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '7';
                $this->ordermd->intstatinv = '7';
            }elseif($position == 'forecasting'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '10';
                $this->ordermd->intstatinv = '10';
            }elseif($position == 'revisi'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '5';
                $this->ordermd->intstatinv = '5';
            }elseif($position == 'percepatan'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '6';
                $this->ordermd->intstatinv = '6';
            }elseif($position == 'npk'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '11';
                $this->ordermd->intstatinv = '11';
            }elseif($position == 'dokhilang'){
                $this->trkmd->strposition = $this->input->post('optPosition');
                $this->trkmd->inttrackstatus = '8';
                $this->ordermd->intstatinv = '8';
            }
			
			$this->trkmd->strrecipient = $this->input->post('txtRecipient');
			
			//$trd = $this->input->post('txtTrkdate');
			$this->trkmd->strtrackdate = date('Y-m-d');
			
			$this->trkmd->strtracknote = $this->input->post('txtNotes');
			
			$this->trkmd->strcruser = $this->session->userdata('userid');
            $this->trkmd->strcrdat = mdate($datestring, $time);
			$this->trkmd->addtrackorder(); 
			
			$this->ordermd->intorderid = $this->input->post('hdnOrderid');
			$this->ordermd->strchuser = $this->session->userdata('userid');
            $this->ordermd->strchdat = mdate($datestring, $time);
			$this->ordermd->updatecolstatinv(); 
        
		}
    }
	
}