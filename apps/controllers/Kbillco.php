<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kbillco extends CI_Controller
{
	public $intbillcoid;
	public $intorderid;
	public $strposition;
	
	public $strrecipient;
	public $strcolldate;
	public $strnotes;
	public $intstatus;
	
	//voucher
	public $intstatinv;
	public $strfrom;
	public $strprocdat;
	
	public $strvrecnum;
	public $intpphvalue;
	public $intvrecvalue;
	
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;

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
		$this->load->model('Billco_model', 'billcomd');
		$this->load->model('Order_model', 'ordermd');
		$this->load->model('Spb_model', 'spbmd');
		$this->load->model('Dropdown_model', 'drdmd'); 
		$this->load->model('Track_model', 'trkmd');
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
		$data = [ 
			'drd' => $this->billcomd->getallinvkomet(),
			'segment' => $this->drdmd->getallseg(),
			'title' => 'KOMET',
			'brand' => 'Daftar Penagihan',
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'alertnopes' => $this->repmd->getalertnopes(), 
			'alertprpo' => $this->repmd->getalertprpo(),
            'alertnopesprpoprevyear' => $this->repmd->getalertnopesprpoprevyear(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/kbillco/kbillco_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function search() {
		
		$unit = '';
		$invnum = $this->input->post('txtInv');
        $spk = $this->input->post('txSpk');
		$segmen = $this->input->post('optSegment');
		$invmonth = $this->input->post('optMonth');
		$invyear = $this->input->post('optYear');
        $status = $this->input->post('optStatus');

		$data = [ 
			'drd' => $this->billcomd->getsearchnopesbillco($unit,$invnum,$spk,$segmen,$invmonth,$invyear,$status),
			'title' => 'KOMET',
			'brand' => 'Collection',
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
		
		$data['content'] = $this->load->view('modules/kbillco/search_kbillco_view', $data, TRUE);
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
				
				$this->strinvdat = date('Y-m-d', strtotime($row['invdate'])); 
				$this->strsentdat = date('Y-m-d', strtotime($row['sentdate'])); 
				
				$this->strunit = $row['unit'];
				$this->strjobtype = $row['jobtype'];
				$this->strdivision = $row['division'];
				$this->strsegment = $row['segment'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				
				$this->strspknum = $row['spknum'];
				$this->strspkindat = date('Y-m-d', strtotime($row['spkindat'])); 
				$this->strspkdat = date('Y-m-d', strtotime($row['spkdat'])); 
				
				$this->intbasevalue = $row['basevalue'];
				$this->intppnvalue = $row['ppnvalue'];
				$this->intpphvalue = $row['pphvalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['marginvalue'];
				
				$this->strvrecnum = $row['vrecnum'];
				$this->intstatinv = $row['status'];
				$this->strfrom = $row['receivefrom'];
				$this->strprocdat = date('Y-m-d', strtotime($row['procdat']));
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
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilaipph' =>	strrev(implode('.',str_split(strrev(strval($this->intpphvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid), 
			'collectinvoice' => $this->billcomd->getbillcobyinv($this->intorderid), 
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
            'title' => $this->strcode.'| KOMET',
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
		$data['content'] = $this->load->view('modules/kbillco/detail_kbillco_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function voucher() {
		$drd = $this->ordermd->getsingleinvoicepaid($this->uri->segment(3));
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
				$this->intppnvalue = $row['ppnvalue'];
				$this->intpphvalue = $row['pphvalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['marginvalue'];
				
				$this->strvrecnum = $row['vrecnum'];
				$this->intstatinv = $row['status'];
				$this->strfrom = $row['receivefrom'];
				$this->strprocdat = date('d M Y', strtotime($row['procdat']));
				$this->intvrecvalue = $row['vrecvalue'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		$dsr = $this->intbasevalue;
		//nilai ppn 10%
		$ppn = round((10 / 100) * $dsr);
		
		$this->html2pdf->folder('./public/files/pdfs/');
		$name = $this->strcode.'.pdf';
		//Set the filename to save/download as
	    //$this->html2pdf->filename($name);
	    
	    //Set the paper defaults
	    //$this->html2pdf->paper('a4', 'portrait');
		
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
			
			'nomorspk' => $this->strspknum,
			'tglmskspk' => $this->strspkindat,
			'tglspk' => $this->strspkdat,
			
			'nilaidasar' =>	strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilaipph' =>	strrev(implode('.',str_split(strrev(strval($this->intpphvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' => strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'nilaipajak' => strrev(implode('.',str_split(strrev(strval($ppn)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid),
			'totalspbbyinvoice' => $this->spbmd->gettotalspbbyinvoice($this->intorderid),
			'statusorder' => $this->strstatorder,
			'statusinvoice' => $this->intstatinv,
			'nomorvoucher' => $this->strvrecnum,
			'dari' => $this->strfrom,
			'tglcair' => $this->strprocdat,
			'nilaivoucher' => strrev(implode('.',str_split(strrev(strval($this->intvrecvalue)),3))),
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Receipt Voucher',
			'brand' => 'Voucher',
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
        ];
        //Load html view
	    //$this->html2pdf->html($this->load->view('modules/kbillco/voucher_kbillco_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/kbillco/voucher_kbillco_view', $data, true);
        
        // Load pdf library
        $this->load->library('pdf'); 
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream($name, array("Attachment"=>0));
	}
		
	public function ajax_voucher()
    {
		if ($this->input->post()) {
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$this->ordermd->intorderid = $this->input->post('hdnOrderid');
			$this->ordermd->intstatinv = $this->input->post('optStatus');
			$this->ordermd->strvrecnum = $this->input->post('txtNovoc');
			$this->ordermd->strfrom = $this->input->post('txtRec');
			$pdt = $this->input->post('txtDateproc');
			$this->ordermd->strprocdat = date('Y-m-d', strtotime($pdt));
			$ndasar = $this->input->post('hdnBaseval');
			$ntotal = $this->input->post('txtNilai');
			$this->ordermd->intvrecvalue = str_replace(".", "", $ntotal);
			$this->ordermd->intpphvalue = str_replace(".", "", $ndasar) - str_replace(".", "", $ntotal);
			$this->ordermd->strchuser = $this->session->userdata('userid');
            $this->ordermd->strchdat = mdate($datestring, $time);
			$this->ordermd->updatestatinv();
		}
    }
	
	public function updatestatus() {
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
		 
		if($this->strprocdat == '01-01-1970') {
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
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilaipph' =>	strrev(implode('.',str_split(strrev(strval($this->intpphvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid), 
			'statusorder' => $this->strstatorder,
			'statusinvoice' => $this->intstatinv,
			'nomorvoucher' => $this->strvrecnum,
			'tglcair' => $this->strprocdat,
			'nilaivoucher' => strrev(implode('.',str_split(strrev(strval($this->intvrecvalue)),3))),
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Update Status Invoice',
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
		$data['content'] = $this->load->view('modules/kbillco/status_kbillco_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function ajax_updatestatus() {
		if ($this->input->post()) {
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$this->billcomd->intorderid = $this->input->post('hdnOrderid');
			$position = $this->input->post('optPosition');
			if($position == 'closed'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '1';
				$this->ordermd->intstatinv = '1';
			} elseif($position == 'segmen'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '2';
				$this->ordermd->intstatinv = '2';
			} elseif($position == 'PJM'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '3';
				$this->ordermd->intstatinv = '3';
			} elseif($position == 'ASD'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '4';
				$this->ordermd->intstatinv = '4';
			} elseif($position == 'logistik'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '5';
				$this->ordermd->intstatinv = '5';
			} elseif($position == 'keuangan'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '6';
				$this->ordermd->intstatinv = '6';
			} elseif($position == 'legal'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '7'; 
				$this->ordermd->intstatinv = '7';
			} elseif($position == 'posting'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '8'; 
				$this->ordermd->intstatinv = '8';
			} elseif($position == 'forecasting'){
				$this->billcomd->strposition = $this->input->post('optPosition');
				$this->billcomd->intstatus = '10'; 
				$this->ordermd->intstatinv = '10';
			}
			//$this->billcomd->strposition = $this->input->post('optPosition');
			$this->billcomd->strrecipient = $this->input->post('txtRecipient');
			
			$cdt = $this->input->post('txtColdate');
			$this->billcomd->strcolldate = date('Y-m-d', strtotime($cdt));
			$this->billcomd->strnotes = $this->input->post('txtNotes');
			
			$this->billcomd->strcruser = $this->session->userdata('userid');
            $this->billcomd->strcrdat = mdate($datestring, $time);
			$this->billcomd->addbillco(); 
			
			$this->ordermd->intorderid = $this->input->post('hdnOrderid');
			$this->ordermd->strchuser = $this->session->userdata('userid');
            $this->ordermd->strchdat = mdate($datestring, $time);
			$this->ordermd->updatecolstatinv();
        
		}
    }
	
	public function updateposting() {
	if (isset($_POST['cmdsave'])) {
		$error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtRec', 'Penerima', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$invoiceid = $this->input->post('hdnOrderid');
				$this->billcomd->intorderid = $invoiceid;
				
				$this->billcomd->intbillcoid = $this->input->post('hdnBillcoid');
				
				$this->billcomd->strrecipient = $this->input->post('txtRec');
				
				$datepos = $this->input->post('txtPosdate');
                $this->billcomd->strcolldate = date('Y-m-d', strtotime($datepos));
				
				$this->billcomd->strnotes = $this->input->post('txtNotes');		
				
                $this->billcomd->strchuser = $this->session->userdata('userid');
                $this->billcomd->strchdat = mdate($datestring, $time);
				
				$this->billcomd->updatepos();
				
                redirect(base_url() . 'kbillco/details/' . $invoiceid);
				
            }
        }
		
		$drd = $this->billcomd->getsinglebillco($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intbillcoid = $row['billcoid'];
                $this->intorderid = $row['orderid'];
				
				$this->strrecipient = $row['recipient'];
				$this->strcolldate = date('d-m-Y', strtotime($row['collectdate'])); 
				$this->strnotes = $row['notes'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		//echo '<pre>'; print_r($drd); exit;
		
		
		$data = [
            'idinvoice' => $this->intorderid,
            'idbillco' => $this->intbillcoid,
            'penerima' => $this->strrecipient,
            'tglposting' => $this->strcolldate,
            'catatan' => $this->strnotes,
			
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Update Tanggal Posting',
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
		$data['content'] = $this->load->view('modules/kbillco/updatepost_kbillco_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	
	
	

}	