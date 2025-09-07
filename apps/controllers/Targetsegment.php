<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Targetsegment extends CI_Controller
{
    public $inttargetsegementid;
	public $intsegmentid;
	public $strtarget;
	public $intbulan;
	public $inttahun;

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
        $this->load->model('Targetsegment_model', 'tsgmd');
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
			'drd' => $this->tsgmd->getalltargetsegment(),
			'title' => 'KOMET',
			'brand' => 'Daftar Target Segment',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/targetsegment/targetsegment_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function search() {
		
		$unit = 'KOMET';
		$segmen = $this->input->post('optSegment');
		$invmonth = $this->input->post('optMonth');
		$invyear = $this->input->post('optYear');
		$invnum = $this->input->post('txtInv');
		$faknum = $this->input->post('txtFp');
		$spk = '';
        $spb = $this->input->post('optSPB');
		//$data = $this->ordermd->getsearchnopes($unit,$invmonth,$invnum,$faknum);
		
		$data = [ 
			'drd' => $this->ordermd->getsearchnopes($unit,$segmen,$invmonth,$invyear,$invnum,$faknum,$spk,$spb),
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
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['marginvalue'];
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
			'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),
			'nilaimargin' =>strrev(implode('.',str_split(strrev(strval($this->intmarginvalue)),3))),
			'inv' => $this->intnvnum,
			'fak' => $this->intfaknum,
			'tglinv' => $this->strinvdat,
			'tglkrm' => $this->strsentdat,
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
            'title' => 'KOMET',
			'brand' => 'Detail NOPES',
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
		$data['content'] = $this->load->view('modules/knopes/detail_knopes_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
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
				$this->intppnvalue = $row['ppnvalue'];
				$this->intnetvalue = $row['netvalue'];
				$this->intmarginvalue = $row['marginvalue'];
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
        $html = $this->load->view('modules/knopes/detail_kprint_view', $data, true);
        
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
	
	public function add() {
		if (isset($_POST['cmdsave'])) { 
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtTarget', 'Target Kosong', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$this->tsgmd->intsegmentid = $this->input->post('optSegment');
				$this->tsgmd->strtarget = str_replace('.','',$this->input->post('txtTarget'));
				$this->tsgmd->intbulan = $this->input->post('optBulan');
				$this->tsgmd->inttahun = $this->input->post('optTahun');

				$this->tsgmd->addtargetsegment();
                redirect(base_url($this->router->fetch_class()));
				
            }
        }

		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Tambah NOPES',
			'datasegment' => $this->tsgmd->getallsegment(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		$data['content'] = $this->load->view('modules/targetsegment/add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function edit() {
	if (isset($_POST['cmdsave'])) {
		$error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtTarget', 'Target Kosong', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->tsgmd->inttargetsegementid = $this->input->post('targetsegmentid');
                $this->tsgmd->intsegmentid = $this->input->post('optSegment');
                $this->tsgmd->strtarget = str_replace('.','',$this->input->post('txtTarget'));
                $this->tsgmd->intbulan = $this->input->post('optBulan');
                $this->tsgmd->inttahun = $this->input->post('optTahun');
				$this->tsgmd->edittargetsegment();
				
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $tsam = '';
		$drd = $this->tsgmd->getsingletargetsegment($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->inttargetsegementid = $row['targetsegmentid'];
				$this->intsegmentid = $row['segmentid'];
				$this->strtarget = $row['target'];
				$this->strbulan = $row['bulan'];
				$this->strtahun = $row['tahun'];
            }

            $am = $this->tsgmd->getambymarketingid($drd[0]['segmentid']);
            if(count($am) > 0){
                $tsam = $am[0]['fullname'];
            }
        }
		
		$data = [
			'tsid' => $this->inttargetsegementid,
			'tssegmentid' => $this->intsegmentid,
			'tstarget' => $this->strtarget,
			'tsbulan' => $this->strbulan,
			'tstahun' => $this->strtahun,
			'tsam' => $tsam,
            'datasegment' => $this->tsgmd->getallsegment(),
            'title' => 'KOMET',
			'brand' => 'Ubah NOPES',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        ];
		$data['content'] = $this->load->view('modules/targetsegment/edit_view', $data, TRUE);
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
				$strformat = $intnomor ."/SPB/". $strdivisi . "/". $intmonth . "/" . $intyear;
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
				$this->strprojectname = $row['projectname'];
				$this->intbasevalue = $row['basevalue'];
				$this->intppnvalue = $row['ppnvalue'];
				
            }
        }
		
		$data = [
            'orderid' => $this->intorderid,
			'spbid' => $this->intspbid,
            'statusorder' => $this->strstatorder,
			'kodenomor' => $this->strcode,
			'invoice' => $this->intnvnum,
			'faktur' => $this->intfaknum,
			'namaproyek' => $this->strprojectname,
			'nilaidasar' => $this->intbasevalue,
			'nilaippn' => $this->intppnvalue,
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
		$data['content'] = $this->load->view('modules/knopes/add_kspb_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	
	}

	public function delete(){
        if ($this->input->post()) {
			$drd = $this->tsgmd->getsingletargetsegment($_POST['targetsegmentid']);
			if (count($drd) > 0) {
                $this->tsgmd->deletetargetsegment($_POST['targetsegmentid']);
			}
        }
        echo "success";
    }

    function getmarketing(){
        $response = array(
            'msg' => 'data post tidak ada',
            'status' => 'failed'
        );

        $post = $this->input->post();
        if($post){

            $am = $this->tsgmd->getambymarketingid($post['sid']);
            if(count($am) > 0){
                $response = array(
                    'fullname' => $am[0]['fullname'],
                    'msg' => 'berhasil',
                    'status' => 'success'
                );
            }else{
                $response = array(
                    'msg' => 'data tidak ditemukan',
                    'status' => 'failed'
                );
            }
        }

        echo json_encode($response);
    }
}