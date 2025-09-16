<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
	//kode arsip
    public $intorderid;
	public $intarcoid;
	public $intspbid;
    public $intorderinv;
	public $strstatorder;
	public $strcode;
	public $intnvnum;
	public $intfaknum;
	
	public $strinvdat;
	public $strsentdat;
	public $strbastdat;
	//informasi pelanggan
    public $strunit;
	public $strjobtype;
    public $strdivision;
	public $strsegment;
	public $strsegmentf;
	public $strsegmentad;
	public $stramuser;
	public $stramkomet;
	public $strprojectname;
	//spk
	public $strspknum;
	public $strspkindat;
	public $strspkdat;
	//harga
	public $intbasevalue;
	public $intppnvalue;
	public $intpphvalue;
	public $intnetvalue;
	public $intjstvalue;
	public $intnegovalue;
	public $intmarginvalue;
	public $intestvalue;
	
	public $strfiles;
	//voucher
	public $intstatinv;
	public $strvrecnum;
	public $strfrom;
	public $strprocdat;
	public $strvrecval;
	
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
            'date',
			'terbilang',
			'tanggal'
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation',
			'html2pdf'
        ];
        $this->load->library($lib);
		$this->load->model('Order_model', 'ordermd');
		$this->load->model('Spb_model', 'spbmd'); 
		$this->load->model('Billco_model', 'billcomd');
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
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
		// $gen = $this->ordermd->generate_invoice_number();
		// echo '<pre>'; print_r($gen); exit;
		$data = [ 
			'drd' => $this->ordermd->getallinvoice(),
			'segment' => $this->drdmd->getallseg(),
			'title' => 'Invoice',
			'brand' => 'Daftar Tagihan',
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/invoice/invoice_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function search() {
		
		$unit = 'KOMET';
		$segmen = $this->input->post('optSegment');
		$invmonth = $this->input->post('optMonth');
		$invyear = $this->input->post('optYear');
		$invnum = $this->input->post('txtInv');
        $tipeodr = $this->input->post('optTipeodr');
		$spk = '';
        $spb = $this->input->post('optSPB');
		//$data = $this->ordermd->getsearchnopes($unit,$invmonth,$invnum,$faknum);
		
		$data = [ 
			'drd' => $this->ordermd->getsearchnopes($unit,$segmen,$invmonth,$invyear,$invnum,$tipeodr,$spk,$spb),
			'title' => 'KOMET',
			'brand' => 'Hasil pencarian',
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
		
		$data['content'] = $this->load->view('modules/knopes/search_knopes_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function details() {
		$drd = $this->ordermd->getsingleinvoice($this->uri->segment(3));
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
				$this->intpphvalue = $row['basevalue'] * 0.98;
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = (int)$row['basevalue'] - (int)$row['netvalue'];
				$this->intestvalue = (int)$row['netvalue'] - (int)$row['pphvalue'];
				//$this->intjstvalue = $row['jstvalue'];
				//$this->intnegovalue = $row['negovalue'];
				
				$this->intstatinv = $row['status'];
				$this->strvrecnum = $row['vrecnum'];
				$this->strfrom = $row['receivefrom'];
				$this->strprocdat = $row['procdat'];
				$this->strvrecval = $row['vrecvalue'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		// echo '<pre>'; print_r($drd); exit;
		
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
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'nilaiestcair' =>strrev(implode('.',str_split(strrev(strval($this->intestvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'iteminvoice' => $this->ordermd->getiteminvoice($this->intorderid), 
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid), 
			'posinvoice' => $this->billcomd->getbillcobyinv($this->intorderid), 
			'statusorder' => $this->strstatorder,
			'statusinv' => $this->intstatinv,
			'novoucher' => $this->strvrecnum,
			'refrom' => $this->strfrom,
			'vprodate' => $this->strprocdat,
			'vamt' => $this->strvrecval,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Invoice',
			'brand' => 'Detail',
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
		$data['content'] = $this->load->view('modules/invoice/detail_invoice_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function printinvoice() {
		$drd = $this->ordermd->getsingleinvoice($this->uri->segment(3));
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
				$this->strsegmentad = $row['segmentaddress'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				
				$this->strspknum = $row['spknum'];
				$this->strspkindat = date('d-m-Y', strtotime($row['spkindat'])); 
				$this->strspkdat = date('d-m-Y', strtotime($row['spkdat'])); 
				
				$this->intbasevalue = $row['basevalue'];
				$this->intppnvalue = $row['ppnvalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['netvalue']*11/100;
				//$this->intjstvalue = $row['jstvalue'];
				//$this->intnegovalue = $row['negovalue'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$this->html2pdf->folder('./assets/pdfs/');
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
             'segmenpt' =>  $this->strsegmentf,
             'segmenalamat' =>  $this->strsegmentad,
			 'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'namaproyek' => $this->strprojectname,
			
			'nomorspk' => $this->strspknum,
			'tglmskspk' => $this->strspkindat,
			'tglspk' => $this->strspkdat,
			
			'nilaidasar' =>	strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'iteminvoice' => $this->ordermd->getiteminvoice($this->intorderid), 
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid),
			'totalspbbyinvoice' => $this->spbmd->gettotalspbbyinvoice($this->intorderid),
			'statusorder' => $this->strstatorder,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Cetak NOPES',
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
        ];
        //Load html view
	    //$this->html2pdf->html($this->load->view('modules/knopes/detail_kprint_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/invoice/print_invoice_view', $data, true);
        
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
	
	public function printreceipt() {
		$drd = $this->ordermd->getsingleinvoice($this->uri->segment(3));
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
				$this->strsegmentad = $row['segmentaddress'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				
				$this->strspknum = $row['spknum'];
				$this->strspkindat = date('d-m-Y', strtotime($row['spkindat'])); 
				$this->strspkdat = date('d-m-Y', strtotime($row['spkdat'])); 
				
				$this->intbasevalue = $row['basevalue'];
				$this->intppnvalue = $row['ppnvalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['netvalue']*11/100;
				//$this->intjstvalue = $row['jstvalue'];
				//$this->intnegovalue = $row['negovalue'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$this->html2pdf->folder('./assets/pdfs/');
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
             'segmenalamat' =>  $this->strsegmentad,
			 'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'namaproyek' => $this->strprojectname,
			
			'nomorspk' => $this->strspknum,
			'tglmskspk' => $this->strspkindat,
			'tglspk' => $this->strspkdat,
			'terbilang' => ucwords(number_to_words($this->intppnvalue)),
			
			'nilaidasar' =>	strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'iteminvoice' => $this->ordermd->getiteminvoice($this->intorderid), 
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid),
			'totalspbbyinvoice' => $this->spbmd->gettotalspbbyinvoice($this->intorderid),
			'statusorder' => $this->strstatorder,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Cetak NOPES',
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
        ];
        //Load html view
	    //$this->html2pdf->html($this->load->view('modules/knopes/detail_kprint_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/invoice/print_receipt_view', $data, true);
        
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
	
	public function printbast() {
		$drd = $this->ordermd->getsingleinvoice($this->uri->segment(3));
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
				$this->strbastdat = $row['invdate']; 
				
				$this->strunit = $row['unit'];
				$this->strjobtype = $row['jobtype'];
				$this->strdivision = $row['division'];
				$this->strsegment = $row['segment'];
				$this->strsegmentf = $row['segmentname'];
				$this->strsegmentad = $row['segmentaddress'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				
				$this->strspknum = $row['spknum'];
				$this->strspkindat = date('d-m-Y', strtotime($row['spkindat'])); 
				$this->strspkdat = date('d-m-Y', strtotime($row['spkdat'])); 
				
				$this->intbasevalue = $row['basevalue'];
				$this->intppnvalue = $row['ppnvalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['netvalue']*11/100;
				//$this->intjstvalue = $row['jstvalue'];
				//$this->intnegovalue = $row['negovalue'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$this->html2pdf->folder('./assets/pdfs/');
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
             'segmenpt' =>  $this->strsegmentf,
             'segmenalamat' =>  $this->strsegmentad,
			 'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'namaproyek' => $this->strprojectname,
			
			'nomorspk' => $this->strspknum,
			'tglmskspk' => $this->strspkindat,
			'tglspk' => $this->strspkdat,
			
			'nilaidasar' =>	strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglbast' => longdate_indo($this->strbastdat),
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'iteminvoice' => $this->ordermd->getiteminvoice($this->intorderid), 
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid),
			'totalspbbyinvoice' => $this->spbmd->gettotalspbbyinvoice($this->intorderid),
			'statusorder' => $this->strstatorder,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Cetak NOPES',
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
        ];
        //Load html view
	    //$this->html2pdf->html($this->load->view('modules/knopes/detail_kprint_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/invoice/print_bast_view', $data, true);
        
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
	
	public function printsp() {
		$drd = $this->ordermd->getsingleinvoice($this->uri->segment(3));
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
				$this->strbastdat = $row['invdate']; 
				
				$this->strunit = $row['unit'];
				$this->strjobtype = $row['jobtype'];
				$this->strdivision = $row['division'];
				$this->strsegment = $row['segment'];
				$this->strsegmentf = $row['segmentname'];
				$this->strsegmentad = $row['segmentaddress'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				
				$this->strspknum = $row['spknum'];
				$this->strspkindat = date('d-m-Y', strtotime($row['spkindat'])); 
				$this->strspkdat = $row['spkdat']; 
				
				$this->intbasevalue = $row['basevalue'];
				$this->intppnvalue = $row['ppnvalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['netvalue']*11/100;
				//$this->intjstvalue = $row['jstvalue'];
				//$this->intnegovalue = $row['negovalue'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$this->html2pdf->folder('./assets/pdfs/');
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
             'segmenpt' =>  $this->strsegmentf,
             'segmenalamat' =>  $this->strsegmentad,
			 'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'namaproyek' => $this->strprojectname,
			
			'nomorspk' => $this->strspknum,
			'tglmskspk' => $this->strspkindat,
			'tglspk' => date_indo($this->strspkdat),
			
			'nilaidasar' =>	strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'terbilang' => ucwords(number_to_words($this->intppnvalue)),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglsp' => date_indo($this->strbastdat),
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'iteminvoice' => $this->ordermd->getiteminvoice($this->intorderid), 
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid),
			'totalspbbyinvoice' => $this->spbmd->gettotalspbbyinvoice($this->intorderid),
			'statusorder' => $this->strstatorder,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Cetak NOPES',
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
        ];
        //Load html view
	    //$this->html2pdf->html($this->load->view('modules/knopes/detail_kprint_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/invoice/print_sp_view', $data, true);
        
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
	
	public function preview() {
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
				$this->intppnvalue = $row['basevalue']*11/100;
				$this->intpphvalue = $row['pphvalue'];
				$this->intnetvalue = $row['netvalue'];

				$this->intmarginvalue = (int)$row['basevalue'] - (int)$row['netvalue'];
				$this->intestvalue = (int)$row['netvalue'] - (int)$row['pphvalue'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }

		// echo '<pre>'; print_r($drd); exit;
		
		$this->html2pdf->folder('./assets/pdfs/');
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
             'segmenpt' =>  $this->strsegmentf,
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
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'nilaiest' =>strrev(implode('.',str_split(strrev(strval($this->intestvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid),
			'totalspbbyinvoice' => $this->spbmd->gettotalspbbyinvoice($this->intorderid),
			'statusorder' => $this->strstatorder,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Cetak NOPES',
			'userid' => $this->session->userdata('userid'),
			'userlogin' => $this->session->userdata('username'),
			'fullname' => $this->session->userdata('userfullname'),
			'userrole' => $this->session->userdata('userrole')
        ];
        //Load html view
	    //$this->html2pdf->html($this->load->view('modules/knopes/detail_kprint_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/invoice/print_order_view', $data, true);
        
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
	
	public function addinvoice() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:white;"> %s still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
            $this->form_validation->set_rules('optOrderstatus', 'Tipe Order', 'required', $error);
            $this->form_validation->set_rules('txtNopesnomor', 'Nomor Tel/SPK/', 'required', $error);
            $this->form_validation->set_rules('txtAmuser', 'User', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->ordermd->intspbid = '';
				$this->ordermd->intorderinv = '1';
                $this->ordermd->strstatorder = $this->input->post('optOrderstatus');
				
				$this->ordermd->strspknum = $this->input->post('txtNopesnomor');
				$inspk = '';
				$this->ordermd->strspkindat = $inspk; 
				$datespk = $this->input->post('txtTglnopes');
                $this->ordermd->strspkdat = date('Y-m-d', strtotime($datespk));
				
				$nd = $this->input->post('txtNilaidasar');
				$this->ordermd->intbasevalue =  str_replace(".", "", $nd);
				
				$np = $this->input->post('txtNilaippn');
				$this->ordermd->intppnvalue = str_replace(".", "", $np);
				
				$nh = $this->input->post('txtNilaipph');
				$this->ordermd->intpphvalue = str_replace(".", "", $nh);
				
				$nn = $this->input->post('txtNilainet');
				$this->ordermd->intnetvalue = str_replace(".", "", $nn);
				
				$this->ordermd->intnvnum = $this->input->post('txtInvnum');
				$fp = $this->ordermd->getFakturPajak('RIO');
				$this->ordermd->intfaknum = $fp[0]['code'].$this->input->post('txtFaknum');
				/* $faknum = $this->input->post('txtFaknum');
				if($this->input->post('optUnit') == 'RIO'){
					$formatfaknum = '1596'.$faknum;
					$this->ordermd->intfaknum = $formatfaknum;
				} elseif($this->input->post('optUnit') == 'MESRA'){
					$formatfaknum = '2880'.$faknum;
					$this->ordermd->intfaknum = $formatfaknum;
				} */
								
				$dateinv = $this->input->post('txtTglinv');
				$this->ordermd->strinvdat = date('Y-m-d', strtotime($dateinv));
				$sentdat = '';
				$this->ordermd->strsentdat = $sentdat;
				
				$this->ordermd->strunit = 'RIO';
			 
				$this->ordermd->strjobtype = $this->input->post('optJobtype');
				$this->ordermd->stramuser = $this->input->post('txtAmuser');
				$this->ordermd->strdivision = $this->input->post('optDivision');
				$this->ordermd->strsegment = $this->input->post('optSegment');
				$this->ordermd->stramkomet = $this->input->post('txtAmkomet');
				$this->ordermd->strprojectname = addslashes($this->input->post('txtProject'));
				
				
                if (! empty($_FILES['txtFile']['name'])) {
                    $this->ordermd->strfiles = $this->doupload();
                }
                
				$this->ordermd->intjstvalue = '';
				$this->ordermd->intnegovalue = '';
				$this->ordermd->intstatinv = '0';
				$this->ordermd->strfrom = '';
				$this->ordermd->strprocdat = '';
                
                $this->ordermd->strcruser = $this->session->userdata('userid');
                $this->ordermd->strcrdat = mdate($datestring, $time);
				
				/* add autonumbers 
				$code = $this->getid();
				$addcode = $code[0]['lastid']+1;
				$formatcode = str_pad($addcode, 4, '0', STR_PAD_LEFT); */
				
				
				
				/* KODE NOMOR ORDER NP202408200836450001*/
                $strordertype = $this->input->post('optOrderstatus');
                if($strordertype == 'IBL'){
                    $strordertype = 'IB';
                } elseif($strordertype == 'OBL'){
                    $strordertype = 'OB';
                } elseif($strordertype == 'PADI'){
                    $strordertype = 'PD';
                } else {
					$strordertype = 'NP';
				}
				//$strunit = $this->input->post('optUnit');
				$strjobtype = $this->input->post('optJobtype');
				$month = date('m', strtotime($dateinv));
				$year = date('y', strtotime($dateinv));
				//$strformat = $intnomor ."/".$strordertype."/K". /* $strunit[0]. */$strjobtype . "/". $month . "/" . $year;
				$strformat = $this->input->post('txtKodenomor');
				$this->ordermd->strcode = $strordertype.$strformat;
                //$this->ordermd->intorderinv = '1';
				
				$orderid = $this->ordermd->addinvoice();

				/* start add orderitem */
                $post = $this->input->post();
                $totalRow = count($post['description']);
                if($totalRow>0){
                    for($i=0; $i<$totalRow; $i++){
                        $this->ordermd->intorderid = $orderid;
                        $this->ordermd->strorderitemdescription = $post['description'][$i];
                        $this->ordermd->strorderitemqty = $post['qty'][$i];
                        $this->ordermd->strorderitemunit = $post['unit'][$i];
                        $this->ordermd->strorderitemprice = $post['price'][$i];
                        $this->ordermd->strorderitemtotal = $post['total'][$i];
                        $this->ordermd->addinvoiceitem();
                    }
                }
				/* end add orderitem */

                redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$data = [ 
			'title' => 'Invoice',
			'brand' => 'Buat Baru',
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'marketing' => $this->drdmd->getalluseram(),
			'fakturpajak' => $this->drdmd->getfakturpajak('RIO'),
			'gencode' => $this->ordermd->generate_invoice_code(),
			'geninv' => $this->ordermd->generate_invoice_number(),
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
		$data['content'] = $this->load->view('modules/invoice/add_invoice_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function editnopes() {
	if (isset($_POST['cmdsave'])) {
		$error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('optOrderstatus', 'Tipe Order', 'required', $error);
            $this->form_validation->set_rules('txtNopesnomor', 'Nomor Tel/SPK/', 'required', $error);
            $this->form_validation->set_rules('txtAmuser', 'AM User', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				$this->ordermd->intorderid = $this->input->post('hdnOrderid');
                $this->ordermd->strstatorder = $this->input->post('optOrderstatus');
				$this->ordermd->strcode = $this->input->post('txtKodenomor');
				$this->ordermd->intnvnum = $this->input->post('txtInvnum');
				$this->ordermd->intfaknum = $this->input->post('txtFaknum');
				
				$dateinv = $this->input->post('txtTglinv');
				$this->ordermd->strinvdat = date('Y-m-d', strtotime($dateinv));
				$sentdat = $this->input->post('txtTglkirim');
				$this->ordermd->strsentdat = date('Y-m-d', strtotime($sentdat));
				
				$this->ordermd->strunit = 'KOMET';
				$this->ordermd->strjobtype = $this->input->post('optJobtype');
				$this->ordermd->strdivision = $this->input->post('optDivision');
				$this->ordermd->strsegment = $this->input->post('optSegment');
				$this->ordermd->stramuser = $this->input->post('txtAmuser');
				$this->ordermd->stramkomet = $this->input->post('txtAmkomet');
				$this->ordermd->strprojectname = addslashes($this->input->post('txtProject'));
				
				$this->ordermd->strspknum = $this->input->post('txtNopesnomor');
				$inspk = $this->input->post('txtTglmsknopes');
				$this->ordermd->strspkindat = date('Y-m-d', strtotime($inspk)); 
				$datespk = $this->input->post('txtTglnopes');
                $this->ordermd->strspkdat = date('Y-m-d', strtotime($datespk));
				
				$nd = $this->input->post('txtNilaidasar');
				$this->ordermd->intbasevalue =  str_replace(".", "", $nd);				
				$np = $this->input->post('txtNilaippn');
				$this->ordermd->intppnvalue = str_replace(".", "", $np);				
				$nn = $this->input->post('txtNilainet');
				$this->ordermd->intnetvalue = str_replace(".", "", $nn);			
				
                if (! empty($_FILES['txtFile']['name'])) {
                    $this->ordermd->strfiles = $this->doupload();
                }
				
				$this->ordermd->intstatinv = $this->input->post('optStatinv');
                
                $this->ordermd->strchuser = $this->session->userdata('userid');
                $this->ordermd->strchdat = mdate($datestring, $time);
				
				/* add autonumbers 
				$code = $this->getid();
				$addcode = $code[0]['lastid']+1;
				$formatcode = str_pad($addcode, 4, '0', STR_PAD_LEFT); */
								
				$this->ordermd->editnopes();
				//add log files
				
                redirect(base_url($this->router->fetch_class()));
				
            }
        }
		
		$drd = $this->ordermd->getsingleditnopes($this->uri->segment(3));
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
				$this->intnetvalue = $row['netvalue'];
				//$this->intjstvalue = $row['jstvalue'];
				//$this->intnegovalue = $row['negovalue'];
				$this->intstatinv = $row['status'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		if($this->strspkindat == '01-01-1970') {
			$this->strspkindat = ' ';
		}
		if($this->strspkdat == '01-01-1970') {
			$this->strspkdat = ' ';
		}
		if($this->strinvdat == '01-01-1970') {
			$this->strinvdat = ' ';
		}
		if($this->strsentdat == '01-01-1970') {
			$this->strsentdat = ' ';
		}
				
		/* echo '<pre>'; print_r($this->strspkindat); exit; */
		
		$data = [
            'orderid' => $this->intorderid,
			'kodenomor' => $this->strcode,
             'unit' =>   $this->strunit,
			 'jp' => $this->strjobtype,
             'divisi' =>   $this->strdivision,
             'segmen' =>  $this->strsegment,
			 'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'namaproyek' => $this->strprojectname,
			
			'nomorspk' => $this->strspknum,
			'tglmskspk' => date('d-m-Y', strtotime($this->strspkindat)),
			'tglspk' => $this->strspkdat,
			
			'nilaidasar' =>	strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
			'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			 
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid), 
			'statusorder' => $this->strstatorder,
			'statinv' => $this->intstatinv,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'marketing' => $this->drdmd->getalluseram(),
            'title' => 'KOMET',
			'brand' => 'Ubah NOPES',
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
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
		$data['content'] = $this->load->view('modules/knopes/edit_knopes_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	
	}
	
	 
	public function addspb() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('optJobtype', 'jobtype', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->spbmd->intorderid = $this->input->post('hdnOrderid');
				$this->spbmd->intarcoid = '';
                $this->spbmd->strjobtype = $this->input->post('optJobtype');
				$this->spbmd->strapplicant = $this->input->post('txtApplicant'); 
				$v = $this->input->post('txtValue');
				$this->spbmd->intvalue =  str_replace(".", "", $v);
				
				$this->spbmd->strcustomer = $this->input->post('txtCustomer');
				$this->spbmd->strinfo = addslashes($this->input->post('txtInfo'));
				$this->spbmd->strtypeofpayment = $this->input->post('optPayment');
				$this->spbmd->straccnumber = $this->input->post('txtAccnum');
				$this->spbmd->straccname = $this->input->post('txtAccname');
				$this->spbmd->strbank = $this->input->post('optBank');
				$this->spbmd->strbankother = $this->input->post('txtBankother');
				
				$spbd = $this->input->post('txtSpbdate');
                $this->spbmd->strspbdat = date('Y-m-d', strtotime($spbd));
				$pd = $this->input->post('txtDate');
                $this->spbmd->strprocessdate = date('Y-m-d', strtotime($pd));
                $this->spbmd->strfiles = '';
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->spbmd->strcruser = $this->session->userdata('userid');
                $this->spbmd->strcrdat = mdate($datestring, $time);
				$this->spbmd->intstatus = "0";
				
				$intnomor = $this->input->post('txtKodenomor');
				$strdivisi = $this->input->post('optJobtype');
				$intmonth = date('m', strtotime($spbd));
				$intyear = date('y', strtotime($spbd));

                // $lpdbbcas = '';
                // if(isset($_POST['optTipecek'])){
                    // if($_POST['optTipecek'] == 'LPDB'){
                        // $lpdbbcas = 'L';
                    // }elseif($_POST['optTipecek'] == 'BCAS'){
                        // $lpdbbcas = 'S';
                    // }else{
                        // $lpdbbcas = '';
                    // }
                // }

				$strformat = "SPB".$intnomor;
				/* var_dump($strformat); exit; */
                $this->spbmd->strcode = $strformat;
				
                $this->spbmd->addspb();
				
				$this->ordermd->intorderid = $this->spbmd->intorderid; 
				$valspb = $this->input->post('hdnSpbid');
				if ($valspb == '0') {
					$this->ordermd->intspbid = '1';
				} else {
					$this->ordermd->intspbid = $valspb + '1';
				}
				$this->ordermd->updatetotalspb();
				// onclick="swal('Good job!', ' Success insert data', 'success', {buttons: false,timer: 3000,})"
                redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$drd = $this->ordermd->getsinglenopes($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderid = $row['orderid'];
				$this->intspbid = $row['spbid'];
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
				$this->intnvnum = $row['invnum'];
				$this->intfaknum = $row['faknum'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strsegment = $row['segment'];
				$this->strsegmentf = $row['segmentname'];
				$this->strprojectname = $row['projectname'];
				$this->intbasevalue = $row['basevalue'];
				$this->intppnvalue = $row['ppnvalue'];
				$this->intnetvalue = $row['netvalue'];				
            }
        }
		
		$data = [
            'orderid' => $this->intorderid,
			'spbid' => $this->intspbid,
            'statusorder' => $this->strstatorder,
			'gencode' => $this->spbmd->generate_spb_code(),
			'genspb' => $this->spbmd->generate_spb_number(),
			'kodenomor' => $this->strcode,
			'invoice' => $this->intnvnum,
			'faktur' => $this->intfaknum,
			'segmen' => $this->strsegment,
			'segmenpt' => $this->strsegmentf,
			'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'namaproyek' => $this->strprojectname,
			'nilaidasar' => $this->intbasevalue,
			'nilaippn' => $this->intppnvalue,
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
            'title' => 'KOMET',
			'brand' => 'Pengajuan SPB',
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
			'code_spb' => $this->spbmd->getlastcodespb(),
        ];
		$data['content'] = $this->load->view('modules/invoice/add_spb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	
	}

	public function delete(){
		
        if ($this->input->post()) {
			$drd = $this->ordermd->getsingleorder($_POST['orderid']);
			if (count($drd) > 0) {
				foreach ($drd as $row) {
					$this->strfiles = $row['file'];
				}
			}
		$folder = $this->router->fetch_class();
		$filename = $this->config->item('uploads_dir') . $folder . '/' . $this->strfiles;
		if (file_exists($filename)) {
			unlink($filename);
		}
            //$this->ordermd->deleteorder($_POST['orderid']);
			//$this->spbmd->deletespbworder($_POST['orderid']);
            echo "success"; /* mengembalikan kata 'success' untuk dikenali diview */
        }
    }
	
	public function ajax_details() {
		if ($this->input->post()) {
        $data = $this->ordermd->getsinglenopes($_POST['orderid']);
		$qdata = array(
			'code' => $data[0]['code'],
			'invnum' => $data[0]['invnum'],
			'faknum' => $data[0]['faknum'],
			'spknum' => $data[0]['spknum'],
			'division' => $data[0]['division'],
			'segment' => $data[0]['segment'],
			'amuser' => $data[0]['amuser'],
			'amkomet' => $data[0]['amkomet'],
			'projectname' => $data[0]['projectname']
		);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($qdata);
		}
    }
	
	public function ajaxcheckinvoice() {
		// $results = $this->ordermd->checkinvoice($inv);
		//var_dump($results); exit;
		// if ($results === TRUE) {
				// echo '<span class="help-block" style="color:red;">Nomor invoice sudah terpakai</span>';
			// } else {
				// echo '<span class="help-block" style="color:green;">Nomor invoice tersedia</span>';
			// }
		if (isset($_POST['txtInvnum'])) {
			$inv = $_POST['txtInvnum'];
			$results = $this->ordermd->checkinvoicekp($inv);
			if ($results === TRUE) {
				echo 'FALSE';
			} else {
				echo 'TRUE';
			}
		} else {
			echo '<span class="help-block" style="color: #f39c12;"><i class="fa fa-bell-o"></i> Nomor invoice tidak boleh kosong.</span>';
		}
			 
    } 	

    public function ajaxcheckspb() {
		// $results = $this->ordermd->checkinvoice($inv);
		//var_dump($results); exit;
		// if ($results === TRUE) {
				// echo '<span class="help-block" style="color:red;">Nomor invoice sudah terpakai</span>';
			// } else {
				// echo '<span class="help-block" style="color:green;">Nomor invoice tersedia</span>';
			// }
		if (isset($_POST['txtKodenomor'])) {
			$spb = $_POST['txtKodenomor'];
			$results = $this->ordermd->checkspb($spb);
			if ($results === TRUE) {
				echo 'FALSE';
			} else {
				echo 'TRUE';
			}
		} else {
			echo '<span class="help-block" style="color: #f39c12;"><i class="fa fa-bell-o"></i> Nomor SPB tidak boleh kosong.</span>';
		}

    }

	//ambil drd segmen
	public function getsegment(){
        $sid=$this->input->post('sid');
        $data=$this->drdmd->getsegmentbydiv($sid);
		/* echo '<pre>';
		print_r($data); exit; */
        echo json_encode($data);
    }
	
	//ambil drd segmen
	public function getsegment2($sid){
        // $sid=$this->input->post('sid');
        // $data['segment'] = $this->drdmd->getsegmentbydiv($sid);
		/*echo '<pre>';print_r($data); exit;*/
		// $this->load->view('modules/nopes/list_division', $data);
		
		echo '<style>
		.optSegment{
			width:216px;
			height: 42px;
			background-color: #999999;
			color: #FFFFFF;
			border-radius: 4px;
		}
		</style>';
		
        $segment = $this->drdmd->getsegmentbydiv($sid);
		$sel = '';
		$sel .= '<select name="optSegment" class="optSegment">';
		if(!empty($segment)){		
			foreach($segment as $row){ 
				$sel .= '<option value="'.$row['segmentid'].'">'.$row['code'].'</option>';
			}	
		}else{
			$sel .= '<option value="">Empty</option>';
		}
		$sel .= '</select>'; 
		echo $sel;
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
            redirect('order/add');
        }
    }
	
	/* public function getid(){
		$h = $this->ordermd->getmaxcode();
		var_dump($h);
	} */
	
	
	

}