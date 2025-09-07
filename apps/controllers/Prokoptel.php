<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prokoptel extends CI_Controller
{
	public $intprokopid; 
    public $intcode; 
    public $strunit; 
    public $intsegment; 
    public $strproname; 
    public $strprodate; 
    public $strpronum; 
    public $strproval; 
    public $strstartop; 
    public $strendtop; 
    public $strperiode; 

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
			'terbilang'
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation',
			'html2pdf'
        ];
        $this->load->library($lib);
		$this->load->model('User_model', 'usermd');
		$this->load->model('Report_model', 'repmd');
		$this->load->model('Prokoptel_model', 'prkmd');
		$this->load->model('letter_model', 'ltmd');
		$this->load->model('Dropdown_model', 'drdmd');
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
		$data = [
            'drd' => $this->prkmd->getallproject(),
            'title' => 'Projek KOPTEL',
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
		
		$data['content'] = $this->load->view('modules/prokoptel/prokoptel_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function addproject() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtProname', 'Judul Projek', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
				$datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();

                $lastnumber = $this->ltmd->getlastnumber('EXT');
                if(count($lastnumber) > 0){
                    $ex_code = explode('/',$lastnumber[0]['code']);
                    $new_code =  $ex_code[0]+1;
                    $number = sprintf("%04s", $new_code);
                }else{
                    $number = '0001';
                }

                $periode = $this->input->post('txtPeriode');
                $month = getIndMonth(date('m', strtotime($periode)));
                $mromawi = month_to_romawi_letter($month);
                $code = $number.'/EXT/PPM/'. $this->input->post('optUnit') .'/'.$mromawi.'/'.date('Y', strtotime($periode));

                $this->ltmd->strcode = $code;
                $this->ltmd->strtype = 'EXT';
                $this->ltmd->strinitial = 'PPM';
                $this->ltmd->strsubject = 'Pengajuan Pembiayaan Modal Kerja	';
                $this->ltmd->strunit = $this->input->post('optUnit');
                $this->ltmd->strmonth = $month;
                $this->ltmd->stryear = date('Y', strtotime($periode));
                $this->ltmd->strdivkomet = 'CORSEC';
                $this->ltmd->strcruser = $this->session->userdata('userid');
                $this->ltmd->strcrdat = date('Y-m-d H:i:s');
                $this->ltmd->addletter();

				$this->prkmd->intcode = $code;
				$this->prkmd->strunit = $this->input->post('optUnit');
				$this->prkmd->intsegment = $this->input->post('optSegment');
				$this->prkmd->strproname = $this->input->post('txtProname');
				
				$prodate = $this->input->post('txtProdate');
                $this->prkmd->strprodate = date('Y-m-d', strtotime($prodate));

				$this->prkmd->strpronum = $this->input->post('txtPronum');
				
				$nd = $this->input->post('txtProval');
				$this->prkmd->strproval =  str_replace(".", "", $nd);
				
				$startop = $this->input->post('txtStartop');
                $this->prkmd->strstartop = date('Y-m-d', strtotime($startop));

                $endop = $this->input->post('txtEndop');
                $this->prkmd->strendop = date('Y-m-d', strtotime($endop));
				
				$per = $this->input->post('txtPeriode');
                $this->prkmd->strperiode = date('Y-m-d', strtotime($per));
                $this->prkmd->strcrdat = date('Y-m-d');

				$this->prkmd->addproject();
                redirect(base_url($this->router->fetch_class()));
            }
        }
		$data = [ 
			'title' => 'Projek KOPTEL',
			'brand' => 'Tambah Projek',
			'segment' => $this->drdmd->getallseg(),
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
            'tnp' => $this->repmd->countnopespadi(),
            'tpp' => $this->repmd->countprpopadi(),
            'tsp' => $this->repmd->countspbpadi(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		$data['content'] = $this->load->view('modules/prokoptel/add_prokoptel_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function previewsp() {
		$drd = $this->prkmd->getsingleproject($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
	
                $this->intprokopid = $row['prokopid'];
				$this->intcode = $row['code'];
				
				$this->strunit = $row['unit'];
				
				$this->intsegment = $row['segment'];
				$this->strproname = $row['proname'];
				$this->strpronum = $row['pronum'];
				
				$this->strprodate = date('d-m-Y', strtotime($row['prodate'])); 
				$this->strproval = $row['proval'];
				
				
				$this->strstartop = date('d-m-Y', strtotime($row['startop'])); 
				$this->strendtop = date('d-m-Y', strtotime($row['endtop'])); 
				$this->strperiode = date('d-m-Y', strtotime($row['periode']));
                $this->strcrdat = onlydate($row['crdat']);
            }
        }
		
		$this->html2pdf->folder('./assets/pdfs/');
		$name = $this->intcode.'.pdf';
		//Set the filename to save/download as
	    //$this->html2pdf->filename($name);
	    
	    //Set the paper defaults
	    //$this->html2pdf->paper('a4', 'portrait');
		$strdate = date_create($this->strstartop);
		$endate = date_create($this->strendtop);
		$diff = date_diff($strdate,$endate);

        $valkontrak = $this->strproval;
        $kebutuhanmodal = round($valkontrak*80/100);
		 
		$data = [
            'id' => $this->intprokopid,
			'kodesurat' => $this->intcode,
             'segmen' =>   $this->intsegment,
             'unit' =>   $this->strunit,
			 'namaprojek' => $this->strproname,
             'nokontrak' =>   $this->strpronum,
             'tglkontrak' =>  $this->strprodate,
            'crdat' =>  $this->strcrdat,
			
			'nilaikontrak' =>	strrev(implode('.',str_split(strrev(strval($kebutuhanmodal)),3))),
			'terbilang' => ucwords(number_to_words($kebutuhanmodal)),
			
              'tglmulai' =>  $this->strstartop,
              'tglakhir' =>  $this->strendtop,
              'periode' =>  $this->strperiode,
			  'jangkawaktu' => $diff->format('%m'), 
			  'jangkahuruf' => convert_huruf($diff->format('%m')),
			  
            'title' => 'Surat Pengajuan Pembiayaan Modal Kerja',
			'brand' => 'PPM',
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
        $html = $this->load->view('modules/prokoptel/sp_view', $data, true);
        
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

	public function previewaki() {
		$drd = $this->prkmd->getsingleproject($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intprokopid = $row['prokopid'];
				$this->intcode = $row['code'];

				$this->strunit = $row['unit'];

				$this->intsegment = $row['segment'];
				$this->strproname = $row['proname'];
				$this->strpronum = $row['pronum'];

				$this->strprodate = date('d-m-Y', strtotime($row['prodate']));
				$this->strproval = $row['proval'];


				$this->strstartop = date('d-m-Y', strtotime($row['startop']));
				$this->strendtop = date('d-m-Y', strtotime($row['endtop']));
				$this->strperiode = date('d-m-Y', strtotime($row['periode']));
				$this->strcrdat = onlydate($row['crdat']);
            }
        }

		$this->html2pdf->folder('./assets/pdfs/');
		$name = $this->intcode.'.pdf';
		//Set the filename to save/download as
	    //$this->html2pdf->filename($name);

	    //Set the paper defaults
	    //$this->html2pdf->paper('a4', 'portrait');
		$strdate = date_create($this->strstartop);
		$endate = date_create($this->strendtop);
		$diff = date_diff($strdate,$endate);

		$valkontrak = $this->strproval;
		$jangkawaktu = $diff->format('%m');
        $subtotal1 = round($valkontrak*85/100);
        $jumlahmurni = $valkontrak;
        $materialprojek = round($subtotal1*70/100);
        $ongkosprojek = round($subtotal1*20/100);
        $oprprojek = round($subtotal1*10/100);
        $subtotal2 = 0;
        $totalbiayaprojek = $subtotal1+$subtotal2;
        $keuntungan = $jumlahmurni-$totalbiayaprojek;
        $kebutuhanmodal = round($jumlahmurni*80/100);
        $or = sprintf("%0.2f", $totalbiayaprojek/$jumlahmurni)*100;
        $koptel = round(0.0125*$jangkawaktu*$kebutuhanmodal);
        $komet = $keuntungan-$koptel;

        $persen_koptel = round(sprintf($koptel/$keuntungan)*100, 2);
        $persen_komet = (1-$persen_koptel/100)*100;

		$data = [
            'id' => $this->intprokopid,
			'kodesurat' => $this->intcode,
             'segmen' =>   $this->intsegment,
             'unit' =>   $this->strunit,
			 'namaprojek' => $this->strproname,
             'nokontrak' =>   $this->strpronum,
             'tglkontrak' =>  $this->strprodate,
             'crdat' =>  $this->strcrdat,

			'nilaikontrak' =>	strrev(implode('.',str_split(strrev(strval($this->strproval)),3))),

            'valkontrak' =>	$valkontrak,
			'subtotal1' =>	$subtotal1,
			'jumlahmurni' => $jumlahmurni,
			'materialprojek' =>	$materialprojek,
			'ongkosprojek' => $ongkosprojek,
			'oprprojek' => $oprprojek,
			'subtotal2' => $subtotal2,
			'totalbiayaprojek' => $totalbiayaprojek,
			'keuntungan' => $keuntungan,
			'kebutuhanmodal' => $kebutuhanmodal,
			'or' => $or,
			'koptel' => $koptel,
			'persen_koptel' => $persen_koptel,
			'komet' => $komet,
            'persen_komet' => $persen_komet,

			'terbilang' => ucwords(number_to_words($this->strproval)),
            'tglmulai' =>  $this->strstartop,
            'tglakhir' =>  $this->strendtop,
            'periode' =>  $this->strperiode,
            'jangkawaktu' => $jangkawaktu,
            'jangkahuruf' => convert_huruf($diff->format('%m')),

            'title' => 'Surat Pengajuan Pembiayaan Modal Kerja',
			'brand' => 'PPM',
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
        $html = $this->load->view('modules/prokoptel/aki_view', $data, true);

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

}	