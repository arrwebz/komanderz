<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kprpo extends CI_Controller
{
	//kode arsip
    public $intorderid;
	public $intarcoid;
    public $intorderinv;
	public $intspbid;
	public $strstatorder;
	public $strcode;
	public $intnvnum;
	public $intfaknum;
	
	public $strinvdat;
	public $strsentdat;
	//informasi pelanggan
    public $strunit;
	public $strjobtype;
    public $strdivision;
	public $strsegment;
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
	public $intnetvalue;
	public $intjstvalue;
	public $intnegovalue;
	
	public $strfiles;
	//voucher
	public $intstatinv;
	public $strfrom;
	public $strprocdat;
	
	//termin
	public $intterminid;
	public $intprpoid;
	public $intinvoiceid;
	
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
		$this->load->model('Order_model', 'ordermd');
		$this->load->model('Spb_model', 'spbmd'); 
		$this->load->model('Billco_model', 'billcomd');
		$this->load->model('Dropdown_model', 'drdmd'); 
		$this->load->model('Report_model', 'repmd');
        $this->load->model('bank_model', 'bankmd');
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
		$data = [ 
			'drd' => $this->ordermd->getallprpokomet(),
			'segment' => $this->drdmd->getallseg(),
			'title' => 'Panjar | KOMET',
			'brand' => 'Daftar PRPO',
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
		
		$data['content'] = $this->load->view('modules/kpanjar/kpanjar_view', $data, TRUE); 
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function details() {
		$drd = $this->ordermd->getsingleprpo($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderid = $row['orderid'];
				$this->intspbid = $row['spbid'];
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
				
				$this->strunit = $row['unit'];
				$this->strjobtype = $row['jobtype'];
				$this->strdivision = $row['division'];
				$this->strsegment = $row['segment'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				$this->intjstvalue = $row['jstvalue'];
				$this->intnegovalue = $row['negovalue'];
				$this->strfiles = $row['file'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$drt = $this->ordermd->getprpotermin($this->intorderid);
		if (count($drt) > 0) {
            foreach ($drt as $rot) {
                $this->intterminid = $rot['terminid'];
                $this->intprpoid = $rot['prpoid'];
                $this->intinvoiceid = $rot['invoiceid'];
            }
        }
		
		$arrinvoiceid = explode(';',$this->intinvoiceid); 
			$arrlength = count($arrinvoiceid); 
		
		foreach ($arrinvoiceid as $invid){
			$rowinv[] = $this->ordermd->getprposingletermin($invid);
		}
		// echo '<pre>';
		// print_r($rowinv); exit;
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
			
			'nilaijst' =>	strrev(implode('.',str_split(strrev(strval($this->intjstvalue)),3))),
			'nilainego' =>	strrev(implode('.',str_split(strrev(strval($this->intnegovalue)),3))), 
			 
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid), 
			'posinvoice' => $this->billcomd->getbillcobyinv($this->intorderid), 
			'statusorder' => $this->strstatorder,
			
			'rowcount' => $arrlength,
			'rowtable' => $rowinv, 
			
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => $this->strcode.'| KOMET',
			'brand' => 'Detail PRPO',
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
		$data['content'] = $this->load->view('modules/kprpo/detail_kprpo_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function preview() {
		$drd = $this->ordermd->getsingleprpo($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderid = $row['orderid'];
				$this->intspbid = $row['spbid'];
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
				
				$this->strunit = $row['unit'];
				$this->strjobtype = $row['jobtype'];
				$this->strdivision = $row['division'];
				$this->strsegment = $row['segment'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				$this->intjstvalue = $row['jstvalue'];
				$this->intnegovalue = $row['negovalue'];
				$this->strfiles = $row['file'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$drt = $this->ordermd->getprpotermin($this->intorderid);
		if (count($drt) > 0) {
            foreach ($drt as $rot) {
                $this->intterminid = $rot['terminid'];
                $this->intprpoid = $rot['prpoid'];
                $this->intinvoiceid = $rot['invoiceid'];
            }
        }
		
		$arrinvoiceid = explode(';',$this->intinvoiceid);
		$arrlength = count($arrinvoiceid);
		foreach ($arrinvoiceid as $invid){
			$rowinv[] = $this->ordermd->getprposingletermin($invid);
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
			 'amuser' => $this->stramuser,
			'amkomet' => $this->stramkomet,
			'namaproyek' => $this->strprojectname, 
			
			'nilaijst' =>	strrev(implode('.',str_split(strrev(strval($this->intjstvalue)),3))),
			'nilainego' =>	strrev(implode('.',str_split(strrev(strval($this->intnegovalue)),3))), 
			 
			'spbbyinvoice' => $this->spbmd->getspbbyinvoice($this->intorderid), 
			'totalspbbyinvoice' => $this->spbmd->gettotalspbbyinvoice($this->intorderid),
			'statusorder' => $this->strstatorder,
			
			'rowcount' => $arrlength,
			'rowtable' => $rowinv, 
			
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Cetak PRPO',
			'brand' => 'PRPO',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        ];
        //Load html view
	    //$this->html2pdf->html($this->load->view('modules/kprpo/detail_kprint_view', $data, true));
	    
	    //if($this->html2pdf->create('preview')) {
	    	//PDF was successfully saved or downloaded
	    	//echo 'PDF saved';
	    //}
		
		// Get output html
        $html = $this->load->view('modules/kprpo/detail_kprint_view', $data, true);
        
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
	
	public function addprpo() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div> <strong>%s</strong> still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');
            $this->form_validation->set_rules('txtKodenomor', 'Panjar Code', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->ordermd->intspbid = '';
				$this->ordermd->strstatorder = 'PRPO';
				$this->ordermd->strunit = 'KOMET';
				$this->ordermd->strjobtype = $this->input->post('optJobtype');
				$this->ordermd->stramuser = $this->input->post('txtAmuser');
				$this->ordermd->strdivision = $this->input->post('optDivision');
				$this->ordermd->strsegment = $this->input->post('optSegment');
				$this->ordermd->stramkomet = $this->input->post('txtAmkomet');
				$this->ordermd->strprojectname = $this->input->post('txtProject');  
				
				$nd = $this->input->post('txtNilaijst');
				$this->ordermd->intjstvalue =  str_replace(".", "", $nd);
				
				$np = $this->input->post('txtNilainego');
				$this->ordermd->intnegovalue = str_replace(".", "", $np);
				 
                
                $this->ordermd->strcruser = $this->session->userdata('userid');
                $this->ordermd->strcrdat = mdate($datestring, $time);
				
				/* add autonumbers 
				$code = $this->getid();
				$addcode = $code[0]['lastid']+1;
				$formatcode = str_pad($addcode, 4, '0', STR_PAD_LEFT); */
				
				/* KODE NOMOR ORDER 1234/PRPO/K/IT/02/18*/
				$intnomor = $this->input->post('txtKodenomor');
				$strordertype = $this->input->post('chkB2B');
				if($strordertype == 'B2B'){
					$strordertype = 'B2BPRPO';
				} else {
					$strordertype = 'PRPO';
				}
				//$strunit = $this->input->post('optUnit');
				$strjobtype = $this->input->post('optJobtype');
				$month = mdate('%m', $time);
				$year = mdate('%y', $time);
				$strformat = $intnomor ."/".$strordertype."/K". /* $strunit[0]. */$strjobtype . "/". $month . "/" . $year;
				$this->ordermd->strcode = $strformat;
				
				if (! empty($_FILES['txtFile']['name'])) {
                    $this->ordermd->strfiles = $this->doupload();
                }
				$this->ordermd->intstatinv = '0';
				$this->ordermd->intorderinv = '0';
				$this->ordermd->strfrom = '';
				$this->ordermd->strprocdat = '';
				$this->ordermd->strprocdat = '';

				$this->ordermd->addprpo();
                redirect(base_url($this->router->fetch_class()));
				
            }
        }
		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Tambah PRPO',
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'marketing' => $this->drdmd->getalluseram(),
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
		$data['content'] = $this->load->view('modules/kprpo/add_kprpo_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function editprpo() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtKodenomor', 'Kode Nomor', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->ordermd->intorderid = $this->input->post('hdnOrderid');
			    $this->ordermd->strcode = $this->input->post('txtKodenomor');
				
				$this->ordermd->strunit = 'KOMET';
				$this->ordermd->strjobtype = $this->input->post('optJobtype');
				$this->ordermd->strdivision = $this->input->post('optDivision');
				$this->ordermd->strsegment = $this->input->post('optSegment');
				$this->ordermd->stramuser = $this->input->post('txtAmuser');
				$this->ordermd->stramkomet = $this->input->post('txtAmkomet');
				$this->ordermd->strprojectname = $this->input->post('txtProject');  
				
				$nd = $this->input->post('txtNilaijst');
				$this->ordermd->intjstvalue =  str_replace(".", "", $nd);
				
				$np = $this->input->post('txtNilainego');
				$this->ordermd->intnegovalue = str_replace(".", "", $np);
				 
                $this->ordermd->strchuser = $this->session->userdata('userid');
                $this->ordermd->strchdat = mdate($datestring, $time);
				
				/* add autonumbers 
				$code = $this->getid();
				$addcode = $code[0]['lastid']+1;
				$formatcode = str_pad($addcode, 4, '0', STR_PAD_LEFT); */
								
				if (! empty($_FILES['txtFile']['name'])) {
                    $this->ordermd->strfiles = $this->doupload();
                } else {
					$this->ordermd->strfiles = $this->input->post('hdnFile');
				}
				
				$this->ordermd->editprpo();
                redirect(base_url($this->router->fetch_class()));
				
            }
        }
		
		$drd = $this->ordermd->getsingleditprpo($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderid = $row['orderid'];
				$this->intspbid = $row['spbid'];
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
				
				$this->strunit = $row['unit'];
				$this->strjobtype = $row['jobtype'];
				$this->strdivision = $row['division'];
				$this->strsegment = $row['segment'];
				$this->stramuser = $row['amuser'];
				$this->stramkomet = $row['amkomet'];
				$this->strprojectname = $row['projectname'];
				$this->intjstvalue = $row['jstvalue'];
				$this->intnegovalue = $row['negovalue'];
				$this->strfiles = $row['file'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
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
			
			'nilaijst' =>	strrev(implode('.',str_split(strrev(strval($this->intjstvalue)),3))),
			'nilainego' =>	strrev(implode('.',str_split(strrev(strval($this->intnegovalue)),3))), 
			 
			'file' => $this->strfiles,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
			'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
            'title' => 'KOMET',
			'brand' => 'Ubah PRPO',
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
		$data['content'] = $this->load->view('modules/kprpo/edit_kprpo_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	
	}
		
	public function createinvoice() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtKodenomor', 'Kode Nomor', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->ordermd->intorderid = $this->input->post('hdnOrderid');
				$this->ordermd->strstatorder = $this->input->post('optOrderstatus');
				$this->ordermd->strstatorder = $this->input->post('optOrderstatus');
				$this->ordermd->strcode = $this->input->post('txtKodenomor');
				$this->ordermd->intnvnum = $this->input->post('txtNomorinv');
				$this->ordermd->intfaknum = '5950'.$this->input->post('txtNomorfak');
				
				$this->ordermd->strspknum = $this->input->post('txtNomorkl');
				$invd = $this->input->post('txtTglinv');
                $this->ordermd->strinvdat = date('Y-m-d', strtotime($invd));
				
				//nilai dasar
				$dsr = $this->input->post('txtNilaidasar');
				$fdsr =  str_replace('.', '', $dsr);
				//nilai ppn 10%
				$ppn = round((10 / 100) * $fdsr);
				//nilai dasar + ppn
				$dsrppn = $fdsr + $ppn;
				//input ke db
				$this->ordermd->intbasevalue = $fdsr;
				$this->ordermd->intppnvalue = $dsrppn;
				
				
				$net = $this->input->post('txtNilainet');
				$this->ordermd->intnetvalue =  str_replace(".", "", $net);
								
				/* $dsr = $this->intnegovalue;
				$ppn = round((10 / 100) * $this->intnegovalue); 
				$dsrppn = $this->intnegovalue + $ppn;
				echo '<pre>';
				print_r(round($dsrppn)); exit; */
                
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->ordermd->strchuser = $this->session->userdata('userid');
                $this->ordermd->strchdat = mdate($datestring, $time);
				
				/* var_dump($strformat); exit; */
				
                $this->ordermd->updatetonopes();
				redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$drd = $this->ordermd->getsingleprpo($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderid = $row['orderid'];
				$this->intspbid = $row['spbid'];
				$this->strstatorder = $row['orderstatus'];
				$this->strcode = $row['code'];
				$this->strunit = $row['unit'];
				$this->intnegovalue = $row['negovalue'];
				
            }
        }
		
		$data = [
            'orderid' => $this->intorderid,
			'spbid' => $this->intspbid,
            'statusorder' => $this->strstatorder,
			'kodenomor' => $this->strcode,
			'unit' => $this->strunit,
			'nilaidasar' => $this->intbasevalue,
			'nilaippn' => (10 / 100) * $this->intnegovalue,
			'nilainego' => strrev(implode('.',str_split(strrev(strval($this->intnegovalue)),3))),
            'title' => 'KOMET',
			'brand' => 'Buat Invoice PRPO',
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
		$data['content'] = $this->load->view('modules/kprpo/invoice_kprpo_view', $data, TRUE);
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
				$this->spbmd->strinfo = $this->input->post('txtInfo');
				$this->spbmd->strtypeofpayment = $this->input->post('optPayment');
				$this->spbmd->straccnumber = $this->input->post('txtAccnum');
                if($_POST['optPayment'] == 'cash'){
                    $this->spbmd->straccname = $this->input->post('txtAccnamecash');
                }else{
                    $this->spbmd->straccname = $this->input->post('txtAccname');
                }
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
				
				$intnomor = $this->input->post('txtKodenomor');
				$strdivisi = $this->input->post('optJobtype');
				$intmonth = date('m', strtotime($spbd));
				$intyear = date('y', strtotime($spbd));

                $lpdbbcas = '';
                if(isset($_POST['optTipecek'])){
                    if($_POST['optTipecek'] == 'LPDB'){
                        $lpdbbcas = 'L';
                    }elseif($_POST['optTipecek'] == 'BCAS'){
                        $lpdbbcas = 'S';
                    }else{
                        $lpdbbcas = '';
                    }
                }

				$strformat = $intnomor ."/SPB". $lpdbbcas ."/". $strdivisi . "/". $intmonth . "/" . $intyear;
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
		
		$drd = $this->ordermd->getsingleprpo($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderid = $row['orderid'];
				$this->intspbid = $row['spbid']; 
				$this->strcode = $row['code']; 
				$this->strprojectname = $row['projectname'];
            }
        }
		
		$data = [
            'orderid' => $this->intorderid,
			'spbid' => $this->intspbid, 
			'kodenomor' => $this->strcode,
			'namaproyek' => $this->strprojectname,
            'title' => 'KOMET',
			'brand' => 'Pengajuan SPB PRPO',
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
			'joindate' => $this->session->userdata('joindate'),
			'code_spb' => $this->spbmd->getlastcodespb(),
            'bank' => $this->drdmd->getbank(),
        ];
		$data['content'] = $this->load->view('modules/kprpo/add_kspb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	
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
            'allowed_types' => 'jpg|png|pdf',
            'max_size' => '25000',
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
            redirect('prpo/addprpo');
        }
    }
	
	/* public function getid(){
		$h = $this->ordermd->getmaxcode();
		var_dump($h);
	} */
	
	public function ajax_details()
    {
		if ($this->input->post()) {
        $data = $this->ordermd->getsingleprpo($_POST['orderid']);
		$qdata = array(
			'code' => $data[0]['code'],
			'jobtype' => $data[0]['jobtype'],
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
	
	public function ajax_check($id)
    {
		 
        $data = $this->ordermd->getsingleprpo($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
		 
    }
	
	function ajaxaddbank(){
        $post = $this->input->post();

        if($post){
            $this->bankmd->strbankname = $post['bankname'];
            $this->bankmd->straccname = $post['accname'];
            $this->bankmd->straccnum = $post['accnum'];

            /* insert */
            $this->bankmd->addbank();

            $response = array(
                'status' => 'success',
                'msg' => 'Successfully saved!',
            );
        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown data',
            );
        }

        echo json_encode($response);
    }
	
	public function xrtdownload(){
		
		// echo '<pre>';
        // print_r($time); exit;
				
		
		// $spbdate = 39.10 / 42.07;
		// $spbdat = $spbdate * 100;
		// $spbround = ROUND($spbdate * 100,1);
		
		// echo '<pre>';
        // print_r($spbround); exit;
		
        $strftitle = 'Panjar 2021-2024/';
        $data = array( 'title' => 'Download_'.$strftitle,
            'drd' => $this->ordermd->downloadprpo()); 
        /* $data = $this->repmd->getreportkomet();
        echo '<pre>';
        print_r($data); exit; */
        $this->load->view('modules/kpanjar/xrt_download',$data); 
    }
	
	public function addtermininv() {
		
		$prpoid = $this->input->post('hdnOrderid');
        $segmen = $this->input->post('hdnSegmen');
		$division = $this->input->post('hdnDivision'); 
			
		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Tambah Invoice Terkait',
			'prpoid' => $prpoid, 
			'drd' => $this->ordermd->getalltermininvkomet($division,$segmen),
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
		$data['content'] = $this->load->view('modules/kprpo/termin_kprpo_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function createtermin()
    {
		if ($this->input->post()) {
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$invoiceid = $this->input->post('termin[]');
			if($invoiceid == NULL){		
				$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible">
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
															<h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
															Invoice belum dipilih.
														</div>');
				redirect(base_url().$this->router->fetch_class());
			
			} else {				
				$prpoid = $this->input->post('hdnPrpoid');
				$this->ordermd->intprpoid = $prpoid; 
				$this->ordermd->intinvoiceid = implode(';',$invoiceid);
				
				$this->ordermd->strunit = 'KOMET';
				
				$nd = $this->input->post('txtJstvalue');
				$this->ordermd->intjstvalue =  str_replace(".", "", $nd);
				
				$np = $this->input->post('txtNegovalue');
				$this->ordermd->intnegovalue = str_replace(".", "", $np);
				
				$this->ordermd->strcruser = $this->session->userdata('userid');
				$this->ordermd->strcrdat = mdate($datestring, $time);
				$this->ordermd->addtermin();
				redirect(base_url().'kprpo/details/'.$prpoid);
			}
		}
    }
	
	function delete(){
		
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
            $this->ordermd->deleteorder($_POST['orderid']);
			$this->spbmd->deletespbworder($_POST['orderid']);
            echo "success"; /* mengembalikan kata 'success' untuk dikenali diview */
        }
    }
	

}