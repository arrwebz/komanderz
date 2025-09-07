<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kspb extends CI_Controller
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
	public $intorderinv;
	public $strstatorder;
	public $strinvnum;
	public $strinvdat;
	public $strunit;
	
	public $strsegment;
	public $inttotalspb;
	public $intbasevalue;
	public $intjstvalue;

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
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
		if($this->session->userdata('userid') == '3'){
			$drd = $this->spbmd->getallspbkometfinco();
		} else {
			$drd = $this->spbmd->getallspbkomet(); 
		} 
		$data = [ 
			'drd' => $drd,
			'segment' => $this->drdmd->getallseg(),
			'title' => 'SPB | KOMET',
			'brand' => 'Daftar SPB',
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
		
		$data['content'] = $this->load->view('modules/kspb/kspb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function search() {
		$unit = '';
		$segment = $this->input->post('optSegment');
		$spbyear = $this->input->post('optYear');
		$spbmonth = $this->input->post('optMonth');
		$spbnum = $this->input->post('txtSpb');
        $tipeodr = $this->input->post('optOrderstatus');
		$arrsrc = $this->spbmd->getsearchspb($unit,$segment,$spbyear,$spbmonth,$spbnum,$tipeodr);
		
		
		$data = [ 
			'segment' => $segment,
			'spbyear' => $spbyear,
			'spbmonth' => $spbmonth,
			'spbnum' => $spbnum,
			'drd' => $arrsrc,
			'title' => 'KOMET',
			'brand' => 'Hasil Pencarian',
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
		
		$data['content'] = $this->load->view('modules/kspb/search_kspb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function export(){
		$unit = 'KOMET';
		if($_GET){
            $segment = '';
            $spbyear = '';
            $spbmonth = '';
            $spbnum = '';
            if($_GET['optSegment'] != 'Select'){
                $segment = $this->input->get('optSegment');
            }
            if($_GET['hdnSpbmonth'] != 'Pilih'){
                $spbmonth = $this->input->get('hdnSpbmonth');
            }

            $spbyear = $this->input->get('hdnSpbyear');
            $spbnum = $this->input->get('hdnSpbnum');
        }else{
            $segment = $this->input->post('optSegment');
            $spbyear = $this->input->post('hdnSpbyear');
            $spbmonth = $this->input->post('hdnSpbmonth');
            $spbnum = $this->input->post('hdnSpbnum');
        }
		$strftitle = $segment.'/'.$spbmonth.'/'.$spbyear.'/KOMET';
		$data = array( 'title' => 'Hasil Pencarian SPB Komet : '.$strftitle,
                'drd' => $this->spbmd->getsearchspb($unit,$segment,$spbyear,$spbmonth,$spbnum));
		/* $data = $this->repmd->getreportkomet();
		echo '<pre>';  
		print_r($data); exit; */
           $this->load->view('modules/kspb/export_kspb_view',$data);
	}

	public function details() {
		$drd = $this->spbmd->getsinglespbinv($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->intorderid = $row['orderid'];
                $this->intspbid = $row['spbid'];
				$this->strinvnum = $row['codeinv'];
				$this->intorderinv = $row['orderinv'];
				$this->strstatorder = $row['orderstatus'];
				$this->strsegment = $row['segmentname'];
				$this->inttotalspb = $row['totalspb'];
				$this->strcode = $row['code'];
                $this->strjobtype = $row['jobtype'];
				$this->strapplicant = $row['applicant'];
				$this->intvalue = $row['value'];
				$this->intbasevalue = $row['basevalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intjstvalue = $row['jstvalue'];
				$this->intnegovalue = $row['negovalue'];
				$this->strcustomer = $row['customer'];
				$this->strinfo = $row['info'];
				$this->strspbdat = date('d-m-Y', strtotime($row['spbdat']));
				$this->strtypeofpayment = $row['typeofpayment'];
				$this->straccnumber = $row['accnumber'];
				$this->straccname = $row['accname'];
				$this->strbank = $row['bank'];
				$this->strbankother = $row['bankother'];
				$this->strprocessdate = date('d-m-Y', strtotime($row['processdate']));
				$this->strfiles = $row['file'];
				$this->intstatus = $row['status'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = date('H:i, d/m/Y', strtotime($row['crdat']));
                $this->strchuser = $row['chuser'];
                $this->strchdat = date('H:i, d/m/Y', strtotime($row['chdat']));
            }
        }
		
		if($this->strspbdat == '01-01-1970') {
			$this->strspbdat = ' ';
		}
		if($this->strprocessdate == '01-01-1970') {
			$this->strprocessdate = ' ';
		}
		$datacair = $this->spbmd->gettotalspbbyinvoice($this->intorderid);
		//echo json_encode($datacair); exit;
		
		$data = [
            'id' => $this->intspbid,
			'orderid' => $this->intorderid,
			'inv' => $this->strinvnum,
			'segmen' => $this->strsegment,
			'totspb' => $this->inttotalspb,
			'totspbcair' => $datacair,
			'kodenomor' => $this->strcode,
			'jobtype' => $this->strjobtype, 
			'pemohon' => $this->strapplicant,
			'nilai' => strrev(implode('.',str_split(strrev(strval($this->intvalue)),3))),
			'nilaidasar' => strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaijst' => strrev(implode('.',str_split(strrev(strval($this->intjstvalue)),3))),
			'nilainego' => strrev(implode('.',str_split(strrev(strval($this->intnegovalue)),3))),
			'kepada' => $this->strcustomer, 
			'ket' => $this->strinfo, 
			'tglspb' => $this->strspbdat,
			'jenisbayar' => $this->strtypeofpayment,
			'norek' => $this->straccnumber, 
			'anrek' => $this->straccname,
			'bank' => $this->strbank, 
			'banklain' => $this->strbankother, 
			'tglproses' => $this->strprocessdate,
			'img' => $this->strfiles,
			'status' => $this->intstatus,
			'orderinv' => $this->intorderinv,
			'orderstatus' => $this->strstatorder,
             'buat' =>   $this->strcruser,
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => $this->strcode.'| KOMET',
			'brand' => 'Detail SPB',
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
		$data['content'] = $this->load->view('modules/kspb/detail_kspb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	 
	public function preview() {
		$drd = $this->spbmd->getsinglespbinv($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intspbid = $row['spbid'];
				$this->intorderid = $row['orderid'];
				$this->strunit = $row['unit'];
				$this->strinvnum = $row['invnum'];
				$this->strinvdat = date('m/y', strtotime($row['invdate']));
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
                $this->strjobtype = $row['jobtype'];
				$this->strapplicant = $row['applicant'];
				$this->intvalue = $row['value'];
				$this->intnetvalue = $row['netvalue'];
				$this->intnegovalue = $row['negovalue'];
				$this->strcustomer = $row['customer'];
				$this->strinfo = $row['info'];
				$this->strspbdat = date('d M Y', strtotime($row['spbdat']));
				$this->strtypeofpayment = $row['typeofpayment'];
				$this->straccnumber = $row['accnumber'];
				$this->straccname = $row['accname'];
				$this->strbank = $row['bank'];
				$this->strbankother = $row['bankother'];
				$this->strprocessdate = date('d-m-Y', strtotime($row['processdate']));
				$this->intstatus = $row['status'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$saldo  = '';
		if ($this->strinvnum == 0 ) {
			$this->strinvnum = "PRPO";
			$netvalue = $this->intnegovalue;
			$totalvalue = $this->spbmd->gettotalspbbyinvoice($this->intorderid);
			$saldo = $totalvalue[0]['totalvalue'] - $netvalue;
		} else {
			$this->strinvnum = $this->strinvnum.'/'.$this->strjobtype.'/'.$this->strinvdat;
			$netvalue = $this->intnetvalue;
			$totalvalue = $this->spbmd->gettotalspbbyinvoice($this->intorderid);
			$saldo = $totalvalue[0]['totalvalue'] - $netvalue;	 
		}
				
		$this->html2pdf->folder('./assets/pdfs/');
		$name = $this->strcode.'.pdf';
		//Set the filename to save/download as
	    //$this->html2pdf->filename($name);
	    
	    //Set the paper defaults
	    //$this->html2pdf->paper('a4', 'portrait');
		
		$data = [
            'spbid' => $this->intspbid,
			'odrid' => $this->intorderid,
			'inv' => $this->strinvnum,
			'invfdat' => $this->strinvdat,
			'kodenomor' => $this->strcode,
			'unit' => $this->strunit,
			'divisi' => $this->strjobtype, 
			'pemohon' => $this->strapplicant,
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilainego' => strrev(implode('.',str_split(strrev(strval($this->intnegovalue)),3))),
			'nilai' => strrev(implode('.',str_split(strrev(strval($this->intvalue)),3))),
			'kepada' => $this->strcustomer, 
			'ket' => $this->strinfo, 
			'tglspb' => $this->strspbdat,
			'jenisbayar' => $this->strtypeofpayment,
			'norek' => $this->straccnumber, 
			'anrek' => $this->straccname,
			'bank' => $this->strbank, 
			'banklain' => $this->strbankother, 
			'tglproses' => $this->strprocessdate,
			'status' => $this->intstatus,
			'orderstatus' => $this->strstatorder,
			'spbsebelum' => $this->spbmd->getsinglespbbyinvoice($this->intorderid,$this->intspbid),
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Cetak SPB',
			'brand' => 'KOMET',
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
		
		//Load html view
	    //$this->html2pdf->html($this->load->view('modules/kspb/detail_kprint_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/kspb/detail_kprint_view', $data, true);
        
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
	
	public function voucher() {
		$drd = $this->spbmd->getsinglespbinv($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intspbid = $row['spbid'];
				$this->intorderid = $row['orderid'];
				$this->strunit = $row['unit'];
				$this->strinvnum = $row['invnum'];
				$this->strinvdat = date('m/y', strtotime($row['invdate']));
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
                $this->strjobtype = $row['jobtype'];
				$this->strapplicant = $row['applicant'];
				$this->intvalue = $row['value'];
				$this->intnetvalue = $row['netvalue'];
				$this->intnegovalue = $row['negovalue'];
				$this->strcustomer = $row['customer'];
				$this->strinfo = $row['info'];
				$this->strspbdat = date('d M Y', strtotime($row['spbdat']));
				$this->strtypeofpayment = $row['typeofpayment'];
				$this->straccnumber = $row['accnumber'];
				$this->straccname = $row['accname'];
				$this->strbank = $row['bank'];
				$this->strbankother = $row['bankother'];
				$this->strprocessdate = date('d-m-Y', strtotime($row['processdate']));
				$this->intstatus = $row['status'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$saldo  = '';
		if ($this->strinvnum == 0 ) {
			$this->strinvnum = "PRPO";
			$netvalue = $this->intnegovalue;
			$totalvalue = $this->spbmd->gettotalspbbyinvoice($this->intorderid);
			$saldo = $totalvalue[0]['totalvalue'] - $netvalue;
		} else {
			$this->strinvnum = $this->strinvnum.'/'.$this->strjobtype.'/'.$this->strinvdat;
			$netvalue = $this->intnetvalue;
			$totalvalue = $this->spbmd->gettotalspbbyinvoice($this->intorderid);
			$saldo = $totalvalue[0]['totalvalue'] - $netvalue;	 
		}

		
		$this->html2pdf->folder('./assets/pdfs/');
		$name = $this->strcode.'.pdf';
		//Set the filename to save/download as
	    //$this->html2pdf->filename($name);
	    
	    //Set the paper defaults
	    //$this->html2pdf->paper('a4', 'portrait');
		
		$data = [
            'spbid' => $this->intspbid,
			'odrid' => $this->intorderid,
			'inv' => $this->strinvnum,
			'invfdat' => $this->strinvdat,
			'kodenomor' => $this->strcode,
			'unit' => $this->strunit,
			'divisi' => $this->strjobtype, 
			'pemohon' => $this->strapplicant,
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilainego' => strrev(implode('.',str_split(strrev(strval($this->intnegovalue)),3))),
			'nilai' => strrev(implode('.',str_split(strrev(strval($this->intvalue)),3))),
			'nilaisisa' => strrev(implode('.',str_split(strrev(strval($saldo)),3))),
			'kepada' => $this->strcustomer, 
			'ket' => $this->strinfo, 
			'tglspb' => $this->strspbdat,
			'jenisbayar' => $this->strtypeofpayment,
			'norek' => $this->straccnumber, 
			'anrek' => $this->straccname,
			'bank' => $this->strbank, 
			'banklain' => $this->strbankother, 
			'tglproses' => $this->strprocessdate,
			'status' => $this->intstatus,
			'orderstatus' => $this->strstatorder,
			'spbsebelum' => $this->spbmd->getsinglespbbyinvoice($this->intorderid,$this->intspbid),
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Kupon SPB',
			'brand' => 'KOMET',
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
		
		//Load html view
	    //$this->html2pdf->html($this->load->view('modules/kspb/detail_kvoucher_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/kspb/detail_kvoucher_view', $data, true);
        
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
		
	public function editspb() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('optDivisi', 'jobtype', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->spbmd->intspbid = $this->input->post('hdnSpbid');
				$this->spbmd->strcode = $this->input->post('txtKodenomor');
                $this->spbmd->strjobtype = $this->input->post('optDivisi');
				$this->spbmd->strapplicant = $this->input->post('txtApplicant');
				
				$v = $this->input->post('txtValue');
				$this->spbmd->intvalue =  str_replace(".", "", $v);
				$this->spbmd->strcustomer = $this->input->post('txtCustomer');
				$this->spbmd->strinfo = $this->input->post('txtInfo');
				$this->spbmd->strtypeofpayment = $this->input->post('optPayment');
				$this->spbmd->straccnumber = $this->input->post('txtAccnum');
				$this->spbmd->straccname = $this->input->post('txtAccname');
				$this->spbmd->strbank = $this->input->post('optBank');
				$this->spbmd->strbankother = $this->input->post('txtBankother');
				
				$spbd = $this->input->post('txtSpbdate');
                $this->spbmd->strspbdat = date('Y-m-d', strtotime($spbd));
                
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->spbmd->strchuser = $this->session->userdata('userid');
                $this->spbmd->strchdat = mdate($datestring, $time);
				
                $this->spbmd->editspb();
				// onclick="swal('Good job!', ' Success insert data', 'success', {buttons: false,timer: 3000,})"
                redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$drd = $this->spbmd->getsinglespbinv($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intspbid = $row['spbid'];
				$this->strunit = $row['unit'];
				$this->strinvnum = $row['invnum'];
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
                $this->strjobtype = $row['jobtype'];
				$this->strapplicant = $row['applicant'];
				$this->intvalue = $row['value'];
				$this->strcustomer = $row['customer'];
				$this->strinfo = $row['info'];
				$this->strspbdat = date('Y-m-d', strtotime($row['spbdat']));
				$this->strtypeofpayment = $row['typeofpayment'];
				$this->straccnumber = $row['accnumber'];
				$this->straccname = $row['accname'];
				$this->strbank = $row['bank'];
				$this->strbankother = $row['bankother'];
				$this->strprocessdate = date('Y-m-d', strtotime($row['processdate']));
				$this->intstatus = $row['status'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		if ($this->strinvnum == 0 ) {
			$this->strinvnum = "PRPO";
				} else {
					$this->strinvnum; }
		
		$data = [
            'id' => $this->intspbid,
			'inv' => $this->strinvnum,
			'kodenomor' => $this->strcode,
			'divisi' => $this->strjobtype, 
			'pemohon' => $this->strapplicant,
			'nilai' => strrev(implode('.',str_split(strrev(strval($this->intvalue)),3))),
			'kepada' => $this->strcustomer, 
			'ket' => $this->strinfo, 
			'tglspb' => $this->strspbdat,
			'jenisbayar' => $this->strtypeofpayment,
			'norek' => $this->straccnumber, 
			'anrek' => $this->straccname,
			'bank' => $this->strbank, 
			'banklain' => $this->strbankother, 
			'tglproses' => $this->strprocessdate,
			'status' => $this->intstatus,
			'orderstatus' => $this->strstatorder,
			'buat' =>   $this->strcruser, 
			'tglbuat' =>  $this->strcrdat,
			'edit' =>  $this->strchuser,
			'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Ubah SPB',
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
		$data['content'] = $this->load->view('modules/kspb/edit_kspb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	
	}	
	
	public function updatestatus() {
		
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtDate', 'Tanggal Proses', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $time = $_POST['txtTime'];
                $ex_time = explode(':',$_POST['txtTime']);
                $ztime = substr($_POST['txtTime'], -2);
                if($ztime == 'PM'){
                    $hour = $ex_time[0]+12;
                    $minute = substr($ex_time[1], 0, 2);
                    $time = $hour.':'.$minute;
                }else{
                    $length = strlen($time);
                    $time = substr($time, 0, $length-2);
                }

                $this->spbmd->intspbid = $this->input->post('hdnSpbid');
				$this->spbmd->strcode = $this->input->post('txtKodenomor');
				
				$pd = $this->input->post('txtDate');
                $this->spbmd->strprocessdate = date('Y-m-d '.$time, strtotime($pd));
				
				$this->spbmd->intstatus = $this->input->post('optStatus');
                
				if (! empty($_FILES['txtFile']['name'])) {
                    $this->spbmd->strfiles = $this->doupload();
                }
				
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->spbmd->strchuser = $this->session->userdata('userid');
                $this->spbmd->strchdat = mdate($datestring, $time);

                $this->spbmd->strtypeofpayment = $this->input->post('optPayment');
                $this->spbmd->straccnumber = $this->input->post('txtAccnum');
                $this->spbmd->straccname = $this->input->post('txtAccname');
                $this->spbmd->strbank = $this->input->post('optBank');
                $this->spbmd->strbankother = $this->input->post('txtBankother');

                $this->spbmd->updatestatspb();
				// onclick="swal('Good job!', ' Success insert data', 'success', {buttons: false,timer: 3000,})"
                redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$drd = $this->spbmd->getsinglespbinv($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intspbid = $row['spbid'];
				$this->strcode = $row['code'];
				$this->intvalue = $row['value'];
				$this->strspbdat = date('d-m-Y', strtotime($row['spbdat']));
				$this->strprocessdate = date('d-m-Y', strtotime($row['processdate']));
				$this->intstatus = $row['status'];
				$this->strsegment = $row['segmentname'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
                $this->strtypeofpayment = $row['typeofpayment'];
                $this->straccnumber = $row['accnumber'];
                $this->straccname = $row['accname'];
                $this->strbank = $row['bank'];
                $this->strbankother = $row['bankother'];
            }
        }
		
		if($this->strprocessdate == '01-01-1970') {
			$this->strprocessdate = ' ';
		}
		
		$data = [
            'id' => $this->intspbid,
			'kodenomor' => $this->strcode,
			'nilai' => strrev(implode('.',str_split(strrev(strval($this->intvalue)),3))),
			'tglproses' => $this->strprocessdate,
			'segmen' => $this->strsegment,
			'status' => $this->intstatus,
			'buat' =>   $this->strcruser, 
			'tglspb' =>  $this->strspbdat,
			'tglbuat' =>  $this->strcrdat,
            'jenisbayar' => $this->strtypeofpayment,
            'norek' => $this->straccnumber,
            'anrek' => $this->straccname,
            'bank' => $this->strbank,
            'banklain' => $this->strbankother,
			'edit' =>  $this->strchuser,
			'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Status SPB',
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
		$data['content'] = $this->load->view('modules/kspb/update_kstatus_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
		
		
	}
	
	function delete(){
        if ($this->input->post()) {
			$datestring = '%Y-%m-%d %H:%i:%s';
			$time = time();
			
			$this->spbmd->strunit = 'KOMET';
			$this->spbmd->intorderid = '0';
			$this->spbmd->intspbid = $_POST['spbid'];
			$this->spbmd->intuserid = $this->session->userdata('userid');
			$this->spbmd->strcrdat = mdate($datestring, $time);
			$this->spbmd->addtmpfile();
			$this->spbmd->intstatus = '9';
			$this->spbmd->strchuser = $this->session->userdata('userid');
            $this->spbmd->strchdat = mdate($datestring, $time); 
			$this->spbmd->updatestatdelete();
            //$this->spbmd->deletespb($_POST['spbid']);
            echo "success"; /* mengembalikan kata 'success' untuk dikenali diview */
        }
    }

    public function xreqspbtoday(){
        $datestring = '%d%M%Y';
        $time = time();

        $orderstatus = 'PADI';
        $spbdate = mdate($datestring, $time);

        // $spbdate = 39.10 / 42.07;
        // $spbdat = $spbdate * 100;
        // $spbround = ROUND($spbdate * 100,1);

        // echo '<pre>';
        // print_r($spbround); exit;

        $strftitle = 'SPB/PADI/'.$spbdate;
        $data = array( 'title' => 'Pengajuan_'.$strftitle,
            'drd' => $this->spbmd->getreqspb($orderstatus));
        /* $data = $this->repmd->getreportkomet();
        echo '<pre>';
        print_r($data); exit; */
        $this->load->view('modules/pspb/xrtoday_pspb_view',$data);
    }
		
	public function doupload()
    {
        $folder = $this->router->fetch_class();
        $path = $this->config->item('uploads_dir') . $folder;
		
		
		$search = ['@<script[^>]*?>.*?</script>@si', '@<[\/\!]*?[^<>]*?>@si', '@<style[^>]*?>.*?</style>@siU', '@<![\s\S]*?--[ \t\n\r]*>@' ];
		
		$normal = preg_replace($search,'',$_FILES ['txtFile'] ['name']);
        $filename = strtolower( str_replace(" ","-",$normal) );
		
		
        if (! file_exists($path)) {
            if (! mkdir($path, 0777, true)) {
                print_r(error_get_last());
            }
        }

        $config = [
            'upload_path' => $path.'/',
            'allowed_types' => 'jpg|png',
            'max_size' => '2000',
			'file_ext_tolower' => TRUE,
			'remove_spaces' => TRUE,
			'detect_mime' => TRUE,
			'mod_mime_fix' => TRUE,
			'file_name' => $filename
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $txtupload = 'txtFile';
        if ($this->upload->do_upload($txtupload)) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error_doupload',$this->upload->display_errors('<div style="color:red;">','</div>'));
            redirect('gensu/updatestatus');
        }
    }

}