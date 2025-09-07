<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kbudget extends CI_Controller
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
	public $strstatorder;
	public $strinvnum;
	public $strinvdat;
	public $strunit;
	
	//budget
	public $intbudgetid;
	public $strbudgetdate;
	public $strchknum;
	public $intstatusbudget;

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
		$this->load->model('Report_model', 'repmd');
    }

	private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
            array($this->config->item('skins_uri').'libs/iCheck/all.css'),
        );
        $js_head = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'js/jquery-ui.min.js'),
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
            array($this->config->item('skins_uri').'libs/iCheck/icheck.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
		$data = [ 
			'drd' => $this->spbmd->getallbudget('KOMET'),
			//'drd' => $this->spbmd->getallspbkomet(),
			'title' => 'KOMET',
			'brand' => 'Daftar Anggaran SPB',
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
		
		/* $tr = $this->spbmd->getallspboptoday();
		echo '<pre>';print_r($tr); exit; */
		
		$data['content'] = $this->load->view('modules/kbudget/kbudget_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function addnewbudget() {
		
		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Buat Anggaran SPB',
			'drd' => $this->spbmd->getallspbbyinvoicetoday('KOMET'),
            'code_lpdb' => $this->spbmd->getlastcodelpdb(),

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/kbudget/kbudget_add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function createbudget()
    {
		if ($this->input->post()) {
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			$spbid = $this->input->post('budget[]');
			if($spbid == NULL){			
			$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
														SPB belum dipilih.
													</div>');
			redirect(base_url().$this->router->fetch_class());
			} else {
			$this->spbmd->intspbid = implode(';',$spbid);
			$this->spbmd->strunit = 'KOMET';
			$this->spbmd->strbudgetdate = date('Y-m-d');

            $lpdb = '';
            if(isset($_POST['chklpdb'])){
                $lpdb = 'LPDB';
            }

			$this->spbmd->strchknum = $lpdb."".$this->input->post('txtCek');
			$this->spbmd->intstatusbudget = '2';
			$this->spbmd->strcruser = $this->session->userdata('userid');
            $this->spbmd->strcrdat = mdate($datestring, $time);
			$budgetid = $this->spbmd->addgetbudgetid();
			redirect(base_url().'kbudget/todaybudget/'.$budgetid);
			}
		}
    }
	
	public function todaybudget() {
		$drd = $this->spbmd->gettodaybudgetbyid($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->intbudgetid = $row['budgetid'];
                $this->intspbid = $row['spbid'];
				$this->strunit = $row['unit'];
				$this->strbudgetdate = date('d F Y', strtotime($row['budgetdate']));
				$this->strchknum = $row['checknum'];
				$this->intstatusbudget = $row['status'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		$arrspbid = explode(';',$this->intspbid);
		$arrlength = count($arrspbid);
		/* $arrlength = count($arrspbid);
		for($x = 0; $x < $arrlength; $x++) {
			echo $this->spbmd->getsinglespbinv($arrspbid[$x]);
			echo "<br>";
		} */
		foreach ($arrspbid as $spb){
			$rowspb[] = $this->spbmd->getsinglespbinvbudget($spb);
		}
		/* echo '<pre>';
		print_r($rowspb); exit; */
		
		
		$data = [
            'budgetid' => $this->intbudgetid,
			'spbid' => $this->intspbid,
			'unit' => $this->strunit,
			'rowcount' => $arrlength,
			'rowtable' => $rowspb, 
			'tglbudget' => $this->strbudgetdate,
			'nomorcek' => $this->strchknum,
			'statusbudget' => $this->intstatusbudget, 
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'KOMET',
			'brand' => 'Konfirmasi Anggaran SPB',
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
		$data['content'] = $this->load->view('modules/kbudget/kbudget_today_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function ajaxconfirmbudget() {
		if ($this->input->post()) {
			$budgetid = $_POST['hdnBudgetid'];	
			$drd = $this->spbmd->gettodaybudgetbyid($budgetid);
				if (count($drd) > 0) {
					foreach ($drd as $row) {
						$this->intbudgetid = $row['budgetid'];
						$this->intspbid = $row['spbid'];
						$this->strunit = $row['unit'];
						$this->strbudgetdate = date('d F Y', strtotime($row['budgetdate']));
						$this->intstatusbudget = $row['status'];
					}
				}
				
			$this->spbmd->intbudgetid = $this->intbudgetid;	
			$this->spbmd->strchknum = $this->input->post('txtCek');
			$this->spbmd->updatebudgetcheck();	
			
			$arrspbid = explode(';',$this->intspbid);
			$arrlength = count($arrspbid);
			
			/* $arrlength = count($arrspbid);
			for($x = 0; $x < $arrlength; $x++) {
				echo $this->spbmd->getsinglespbinv($arrspbid[$x]);
				echo "<br>";
			} */				
				
				for ($row = 0; $row < $arrlength; $row++) {
					$this->spbmd->intspbid = $arrspbid[$row];
					$this->spbmd->intstatus = '2';
					$confirm = $this->spbmd->confirmstatspbid();
				}
				echo 'success';
				
		}
    }
	
	public function ajaxupdatebudget() {
		if ($this->input->post()) {
			
			$datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
			
			$budgetid = $_POST['hdnBudgetid'];	
			$drd = $this->spbmd->gettodaybudgetbyid($budgetid);
				if (count($drd) > 0) {
					foreach ($drd as $row) {
						$this->intbudgetid = $row['budgetid'];
						$this->intspbid = $row['spbid'];
						$this->strunit = $row['unit'];
						$this->strbudgetdate = date('d F Y', strtotime($row['budgetdate']));
						$this->intstatusbudget = $row['status'];
					}
				}
				
				$arrspbid = explode(';',$this->intspbid);
				$arrlength = count($arrspbid);
			
				for ($row = 0; $row < $arrlength; $row++) {
					$this->spbmd->intspbid = $arrspbid[$row];
					$this->spbmd->intstatus = '0';
					$reset = $this->spbmd->resetstatspbid();
				}
				$this->spbmd->intbudgetid = $budgetid;
				$spbid = $this->input->post('budget[]');
				$this->spbmd->intspbid = implode(';',$spbid);
				$this->spbmd->strchuser = $this->session->userdata('userid');
				$this->spbmd->strchdat = mdate($datestring, $time);
				$update = $this->spbmd->updatebudgetspb();
				echo 'success';
				
		}
    }
	
	public function preview() {
		$drd = $this->spbmd->gettodaybudgetbyid($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->intbudgetid = $row['budgetid'];
                $this->intspbid = $row['spbid'];
				$this->strunit = $row['unit'];
				$this->strbudgetdate = $row['budgetdate'];
				$this->strchknum = $row['checknum'];
				$this->intstatusbudget = $row['status'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$arrspbid = explode(';',$this->intspbid);
		$arrlength = count($arrspbid);
		/* $arrlength = count($arrspbid);
		for($x = 0; $x < $arrlength; $x++) {
			echo $this->spbmd->getsinglespbinv($arrspbid[$x]);
			echo "<br>";
		} */
		foreach ($arrspbid as $spb){
			$rowspb[] = $this->spbmd->getsinglespbinvbudget($spb);
		}
		$fdatename = date('d F Y', strtotime($this->strbudgetdate));
				
		$this->html2pdf->folder('./public/files/pdfs/');
		$name = 'Budget-KOMET-'.$fdatename.'.pdf';
		//Set the filename to save/download as
	    //$this->html2pdf->filename($name);
	    
	    //Set the paper defaults
	    //$this->html2pdf->paper('a4', 'landscape');
		 
		$data = [
            'budgetid' => $this->intbudgetid,
			'spbid' => $this->intspbid,
			'orderid' => $this->intorderid,
			'unit' => $this->strunit,
			'rowcount' => $arrlength,
			'rowtable' => $rowspb, 
			'tglbudget' => date('F d, Y', strtotime($this->strbudgetdate)),
			'nomorcek' => $this->strchknum,
			'statusbudget' => $this->intstatusbudget, 
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Cetak Anggaran',
			'brand' => 'SPB KOMET',
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
	    // $this->html2pdf->html($this->load->view('modules/kbudget/kbudget_print_view', $data, true));
	     
	    // if($this->html2pdf->create('download')) {
	    	//PDF was successfully saved or downloaded
	    	// echo 'PDF saved';
	    // }
		
		
		
		// Get output html
        $html = $this->load->view('modules/kbudget/kbudget_print_view', $data, true);
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream($name, array("Attachment"=>0));
	}

    function previewspb(){
        $budgetid = $this->uri->segment(3);
        $drd = $this->spbmd->gettodaybudgetbyid($budgetid);
        if(count($drd) < 1){
            echo 'direct';exit;
        }

        $arrspbid = explode(';',$drd[0]['spbid']);
        $spbid = "";
        foreach ($arrspbid as $key => $row){
            $spbid .= "'".$arrspbid[$key]."',";
        }
        $spbid = substr($spbid, 0, -1);
        $rowspb = $this->spbmd->getmultispbinvbudget($spbid);

        $this->html2pdf->folder('./assets/pdfs/');
        $name = $this->strcode.'.pdf';

        $data = array(
            'kodenomor' => str_replace("'",'',$spbid),
            'drd' => $rowspb
        );

        $html = $this->load->view('modules/kbudget/kbudget_printspb_view', $data, true);

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

    function previewinvoice() {
        $budgetid = $this->uri->segment(3);
        $budget = $this->spbmd->gettodaybudgetbyid($budgetid);
        if(count($budget) < 1){
            redirect($this->router->fetch_class());
        }

        $spb = $this->spbmd->getspbinbudget(str_replace(';',',',$budget[0]['spbid']));
        if(count($spb) < 1){
            redirect($this->router->fetch_class());
        }
        $odrid = '';
        foreach($spb as $row){
            $odrid .= $row['orderid'].',';
        }
        if($odrid != ''){
            $odrid = substr($odrid,0,-1);
        }

        $drd = $this->ordermd->getmultinopes($odrid);
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
            'drd' => $drd,
            'spb' => $spb,
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
        $html = $this->load->view('modules/kbudget/kbudget_printinv_view', $data, true);

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
	
	public function export() {
		$drd = $this->spbmd->gettodaybudgetbyid($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->intbudgetid = $row['budgetid'];
                $this->intspbid = $row['spbid'];
				$this->strunit = $row['unit'];
				$this->strbudgetdate = $row['budgetdate'];
				$this->strchknum = $row['checknum'];
				$this->intstatusbudget = $row['status'];
				
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$arrspbid = explode(';',$this->intspbid);
		$arrlength = count($arrspbid);
		/* $arrlength = count($arrspbid);
		for($x = 0; $x < $arrlength; $x++) {
			echo $this->spbmd->getsinglespbinv($arrspbid[$x]);
			echo "<br>";
		} */
		foreach ($arrspbid as $spb){
			$rowspb[] = $this->spbmd->getsinglespbinvbudget($spb);
		}
		/* echo '<pre>';
		print_r($rowspb); exit; */
		$fdate = date('dMy', strtotime($this->strbudgetdate));
		$islpdb = '';
		if(substr($this->strchknum, 0, 4) == 'LPDB'){
            $islpdb = '-'.$this->strchknum;
        }
		$fname = 'Anggaran-KOMET-'.$fdate.$islpdb;
	    
		$data = [
            'budgetid' => $this->intbudgetid,
			'spbid' => $this->intspbid,
			'orderid' => $this->intorderid,
			'unit' => $this->strunit,
			'rowcount' => $arrlength,
			'rowtable' => $rowspb, 
			'tglbudget' => date('F d, Y', strtotime($this->strbudgetdate)),
			'nomorcek' => $this->strchknum,
			'statusbudget' => $this->intstatusbudget, 
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => $fname,
			'brand' => 'SPB KOMET'
        ];
		/* echo '<pre>';  
		print_r($data); exit; */
        $this->load->view('modules/kbudget/kbudget_export_view',$data);
	    
	}
	
}