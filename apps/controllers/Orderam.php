<?php defined('BASEPATH') or exit('No direct script access allowed');

class Orderam extends CI_Controller {

	/*kode arsip*/
    public $intorderid;
    public $intorderinv;
	public $strstatorder;
	public $strcode;
	public $intnvnum;
	public $intfaknum;
	
	public $strinvdat;
	public $strsentdat;

	/*informasi pelanggan*/
    public $strunit;
	public $strjobtype;
    public $strdivision;
	public $strsegment;
	public $stramuser;
	public $stramkomet;
	public $strprojectname;

	/*spk*/
	public $strspknum;
	public $strspkindat;
	public $strspkdat;

	/*harga*/
	public $intbasevalue;
	public $intppnvalue;
	public $intnetvalue;
	public $intjstvalue;
	public $intnegovalue;
	public $intmarginvalue;
	
	public $strfiles;

    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;

    function __construct()
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

		$this->load->model('Orderam_model', 'oammd');
        $this->load->model('Dropdown_model', 'drdmd');
    }
 
	function bindskins(){
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
	
    function index() {
        $userfullname = $this->session->userdata("userfullname");

        if(in_array($userfullname, listam())){
            $drd = $this->oammd->getallorderambyam($userfullname);
        }else{
            $drd = $this->oammd->getallorderam();
        }

		$data = [ 
			'drd' => $drd,
			'segment' => $this->drdmd->getallseg(),
			'title' => 'Order AM',
			'brand' => 'Daftar Order AM',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/orderam/oam_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function addoam() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:white;"> %s still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
            $this->form_validation->set_rules('optOrderinv', 'Inv Order', 'required', $error);
            $this->form_validation->set_rules('optOrderstatus', 'Tipe Order', 'required', $error);
            $this->form_validation->set_rules('txtNopesnomor', 'Nomor Tel/SPK/', 'required', $error);
            $this->form_validation->set_rules('txtAmuser', 'AM User', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();

                $this->oammd->intorderinv = $this->input->post('optOrderinv');
                $this->oammd->strstatorder = $this->input->post('optOrderstatus');

                $inspk = $this->input->post('txtTglmsknopes');
                $this->oammd->strspkindat = date('Y-m-d', strtotime($inspk));

                $datespk = $this->input->post('txtTglnopes');
                $this->oammd->strspkdat = date('Y-m-d', strtotime($datespk));

                $this->oammd->strspknum = $this->input->post('txtNopesnomor');

                $nd = $this->input->post('txtNilaidasar');
                $this->oammd->intbasevalue =  str_replace(".", "", $nd);

                $np = $this->input->post('txtNilaippn');
                $this->oammd->intppnvalue = str_replace(".", "", $np);

                $nn = $this->input->post('txtNilainet');
                $this->oammd->intnetvalue = str_replace(".", "", $nn);

                $this->oammd->strunit = $this->input->post('optUnit');

                $this->oammd->strjobtype = $this->input->post('optJobtype');
                $this->oammd->stramuser = $this->input->post('txtAmuser');
                $this->oammd->strdivision = $this->input->post('optDivision');
                $this->oammd->strsegment = $this->input->post('optSegment');
                $this->oammd->stramkomet = $this->input->post('txtAmkomet');
                $this->oammd->strprojectname = trim(addslashes($this->input->post('txtProject')));

                $this->oammd->intstatinv = '0';

                $this->oammd->strcruser = $this->session->userdata('userid');
                $this->oammd->strcrdat = mdate($datestring, $time);

                $this->oammd->addoam();
                redirect(base_url($this->router->fetch_class()));

            }
        }

        $userfullname = $this->session->userdata("userfullname");

        $data = [
            'title' => 'KOMET',
            'brand' => 'Tambah Request Order',
            'division' => $this->drdmd->getalldiv(),
            'segment' => $this->drdmd->getallseg(),
            'marketing' => $this->drdmd->getalluseram(),
            'fakturpajak' => $this->drdmd->getfakturpajak('KOMET'),
            'amkomet' => $userfullname,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/orderam/add_oam_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function editoam() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('optOrderinv', 'Inv Order', 'required', $error);
            $this->form_validation->set_rules('optOrderstatus', 'Tipe Order', 'required', $error);
            $this->form_validation->set_rules('txtNopesnomor', 'Nomor Tel/SPK/', 'required', $error);
            $this->form_validation->set_rules('txtAmuser', 'AM User', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->oammd->intorderamid = $this->input->post('hdnOrderamid');
                $this->oammd->intstatinv = $this->input->post('optStatinv');
                $this->oammd->intorderid = $this->input->post('hdnOrderid');
                $this->oammd->strstatorder = $this->input->post('optOrderstatus');

                $dateinv = $this->input->post('txtTglinv');
                $this->oammd->strinvdat = date('Y-m-d', strtotime($dateinv));

                $sentdat = $this->input->post('txtTglkirim');
                $this->oammd->strsentdat = date('Y-m-d', strtotime($sentdat));

                $this->oammd->strunit = 'KOMET';
                $this->oammd->strjobtype = $this->input->post('optJobtype');
                $this->oammd->strdivision = $this->input->post('optDivision');
                $this->oammd->strsegment = $this->input->post('optSegment');
                $this->oammd->stramuser = $this->input->post('txtAmuser');
                $this->oammd->stramkomet = $this->input->post('txtAmkomet');
                $this->oammd->strprojectname = addslashes($this->input->post('txtProject'));

                $this->oammd->strspknum = $this->input->post('txtNopesnomor');
                $inspk = $this->input->post('txtTglmsknopes');

                $this->oammd->strspkindat = date('Y-m-d', strtotime($inspk));
                $datespk = $this->input->post('txtTglnopes');

                $this->oammd->strspkdat = date('Y-m-d', strtotime($datespk));

                $nd = $this->input->post('txtNilaidasar');
                $this->oammd->intbasevalue =  str_replace(".", "", $nd);
                $np = $this->input->post('txtNilaippn');
                $this->oammd->intppnvalue = str_replace(".", "", $np);
                $nn = $this->input->post('txtNilainet');
                $this->oammd->intnetvalue = str_replace(".", "", $nn);

                $this->oammd->strchuser = $this->session->userdata('userid');
                $this->oammd->strchdat = mdate($datestring, $time);

                $this->oammd->editoam();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $drd = $this->oammd->getsingleditorder($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderamid = $row['orderamid'];
                $this->intorderid = $row['orderid'];
                $this->intorderinv = $row['orderinv'];
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
                $this->intnetvalue = $row['netvalue'];
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

        $data = [
            'orderamid' => $this->intorderamid,
            'orderid' => $this->intorderid,
            'orderinv' => $this->intorderinv,
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

            'inv' => $this->intnvnum,
            'fak' => $this->intfaknum,
            'tglinv' => $this->strinvdat,
            'tglkrm' => $this->strsentdat,
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
            'brand' => 'Ubah Request Order',

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/orderam/edit_oam_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function addnopes() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:white;"> %s still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
            $this->form_validation->set_rules('optOrderstatus', 'Tipe Order', 'required', $error);
            $this->form_validation->set_rules('txtNopesnomor', 'Nomor Tel/SPK/', 'required', $error);
            $this->form_validation->set_rules('txtAmuser', 'AM User', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();

                $this->oammd->intorderamid = $this->input->post('hdnOrderamid');
                $this->oammd->intorderinv = $this->input->post('optOrderinv');
                $this->oammd->strstatorder = $this->input->post('optOrderstatus');

                $this->oammd->intspbid = '';

                $this->oammd->strspknum = $this->input->post('txtNopesnomor');
                $inspk = $this->input->post('txtTglmsknopes');
                $this->oammd->strspkindat = date('Y-m-d', strtotime($inspk));
                $datespk = $this->input->post('txtTglnopes');
                $this->oammd->strspkdat = date('Y-m-d', strtotime($datespk));

                $nd = $this->input->post('txtNilaidasar');
                $this->oammd->intbasevalue =  str_replace(".", "", $nd);

                $np = $this->input->post('txtNilaippn');
                $this->oammd->intppnvalue = str_replace(".", "", $np);

                $nn = $this->input->post('txtNilainet');
                $this->oammd->intnetvalue = str_replace(".", "", $nn);

                $this->oammd->intnvnum = $this->input->post('txtInvnum');
                $fp = $this->oammd->getFakturPajak('KOMET');
                $this->oammd->intfaknum = $fp[0]['code'].$this->input->post('txtFaknum');

                $dateinv = $this->input->post('txtTglinv');
                $this->oammd->strinvdat = date('Y-m-d', strtotime($dateinv));

                $sentdat = $this->input->post('txtTglkirim');
                $this->oammd->strsentdat = date('Y-m-d', strtotime($sentdat));

                $this->oammd->strunit = 'KOMET';

                $this->oammd->strjobtype = $this->input->post('optJobtype');
                $this->oammd->stramuser = $this->input->post('txtAmuser');
                $this->oammd->strdivision = $this->input->post('optDivision');
                $this->oammd->strsegment = $this->input->post('optSegment');
                $this->oammd->stramkomet = $this->input->post('txtAmkomet');
                $this->oammd->strprojectname = addslashes($this->input->post('txtProject'));

                $this->oammd->intstatinvorder = '0'; /* status table order */
                $this->oammd->intstatinv = '1'; /* status table order AM */

                $this->oammd->strcruser = $this->session->userdata('userid');
                $this->oammd->strcrdat = mdate($datestring, $time);

                $intnomor = $this->input->post('txtKodenomor');
                $strordertype = $this->input->post('optOrderstatus');
                if($strordertype == 'IBL'){
                    $strordertype = 'IBL';
                } elseif($strordertype == 'OBL'){
                    $strordertype = 'OBL';
                } else {
                    $strordertype = 'ODR';
                }

                //$strunit = $this->input->post('optUnit');
                $strjobtype = $this->input->post('optJobtype');
                $month = date('m', strtotime($dateinv));
                $year = date('y', strtotime($dateinv));
                $strformat = $intnomor ."/".$strordertype."/K". /* $strunit[0]. */$strjobtype . "/". $month . "/" . $year;
                $this->oammd->strcode = $strformat;

                $this->oammd->addnopes();

                $getorder = $this->oammd->getorderidbyinvnum($this->input->post('txtInvnum'));
                $this->oammd->intorderid = $getorder[0]['orderid'];
                $this->oammd->accorder();

                redirect(base_url($this->router->fetch_class()));
            }
        }

        $drd = $this->oammd->getsingleorderam($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intorderamid = $row['orderamid'];
                $this->intorderid = $row['orderid'];
                $this->intorderinv = $row['orderinv'];
                $this->strstatorder = $row['orderstatus'];
                $this->strcode = $row['code'];
                $this->intnvnum = $row['invnum'];
                $this->intfaknum = $row['faknum'];

                if($row['invdate'] == '0000-00-00'){
                    $this->strinvdat = '';
                }else{
                    $this->strinvdat = date('Y-m-d', strtotime($row['invdate']));
                }

                if($row['sentdate'] == '0000-00-00'){
                    $this->strsentdat = '';
                }else{
                    $this->strsentdat = date('Y-m-d', strtotime($row['sentdate']));
                }

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

        $data = [
            'orderamid' => $this->intorderamid,
            'orderid' => $this->intorderid,
            'orderinv' => $this->intorderinv,
            'statusorder' => $this->strstatorder,
            'kodenomor' => $this->strcode,
            'unit' =>   $this->strunit,
            'jp' => $this->strjobtype,
            'divisi' =>   $this->strdivision,
            'segmen' =>  $this->strsegment,
            'amuser' => $this->stramuser,
            'amkomet' => $this->stramkomet,
            'namaproyek' => $this->strprojectname,

            'nomorspk' => $this->strspknum,
            'tglmskspk' => date('Y-m-d', strtotime($this->strspkindat)),
            'tglspk' => $this->strspkdat,
            'fakturpajak' => $this->drdmd->getfakturpajak('KOMET'),

            'nilaidasar' =>	strrev(implode('.',str_split(strrev(strval($this->intbasevalue)),3))),
            'nilaippn' =>	strrev(implode('.',str_split(strrev(strval($this->intppnvalue)),3))),
            'nilainet' => strrev(implode('.',str_split(strrev(strval($this->intnetvalue)),3))),

            'inv' => $this->intnvnum,
            'fak' => $this->intfaknum,
            'tglinv' => $this->strinvdat,
            'tglkrm' => $this->strsentdat,
            'statinv' => $this->intstatinv,
            'buat' =>   $this->strcruser,
            'tglbuat' =>  $this->strcrdat,
            'edit' =>  $this->strchuser,
            'tgledit' =>  $this->strchdat,
            'division' => $this->drdmd->getalldiv(),
            'segment' => $this->drdmd->getallseg(),
            'marketing' => $this->drdmd->getalluseram(),
            'title' => 'KOMET',
            'brand' => 'ADD Nopes',

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/orderam/add_nopes_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function delete(){
        if ($this->input->post()) {
            $this->oammd->deleteoam($_POST['orderamid']);
            echo 'success';
        }
    }


    /* OLD */
	
	/*function search() {
		
		$unit = 'KOMET';
		$segmen = $this->input->post('optSegment');
		$invmonth = $this->input->post('optMonth');
		$invyear = $this->input->post('optYear');
		$invnum = $this->input->post('txtInv');
        $tipeodr = $this->input->post('optTipeodr');
		$spk = '';
        $spb = $this->input->post('optSPB');
		
		$data = [ 
			'drd' => $this->oammd->getsearchnopes($unit,$segmen,$invmonth,$invyear,$invnum,$tipeodr,$spk,$spb),
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
    }*/
	
	public function details() {
		$drd = $this->oammd->getsinglenopes($this->uri->segment(3));
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
		$drd = $this->oammd->getsinglenopes($this->uri->segment(3));
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
                $lpdb = '';
                if(isset($_POST['chklpdb'])){
                    $lpdb = 'L';
                }
				$strformat = $intnomor ."/SPB". $lpdb ."/". $strdivisi . "/". $intmonth . "/" . $intyear;
				/* var_dump($strformat); exit; */
                $this->spbmd->strcode = $strformat;
				
                $this->spbmd->addspb();
				
				$this->oammd->intorderid = $this->spbmd->intorderid; 
				$valspb = $this->input->post('hdnSpbid');
				if ($valspb == '0') {
					$this->oammd->intspbid = '1';
				} else {
					$this->oammd->intspbid = $valspb + '1';
				}
				$this->oammd->updatetotalspb();
				// onclick="swal('Good job!', ' Success insert data', 'success', {buttons: false,timer: 3000,})"
                redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$drd = $this->oammd->getsinglenopes($this->uri->segment(3));
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
	
	public function ajax_details() {
		if ($this->input->post()) {
        $data = $this->oammd->getsinglenopes($_POST['orderid']);
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
		// $results = $this->oammd->checkinvoice($inv);
		//var_dump($results); exit;
		// if ($results === TRUE) {
				// echo '<span class="help-block" style="color:red;">Nomor invoice sudah terpakai</span>';
			// } else {
				// echo '<span class="help-block" style="color:green;">Nomor invoice tersedia</span>';
			// }
		if (isset($_POST['txtInvnum'])) {
			$inv = $_POST['txtInvnum'];
			$results = $this->oammd->checkinvoicekp($inv);
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
		// $results = $this->oammd->checkinvoice($inv);
		//var_dump($results); exit;
		// if ($results === TRUE) {
				// echo '<span class="help-block" style="color:red;">Nomor invoice sudah terpakai</span>';
			// } else {
				// echo '<span class="help-block" style="color:green;">Nomor invoice tersedia</span>';
			// }
		if (isset($_POST['txtKodenomor'])) {
			$spb = $_POST['txtKodenomor'];
			$results = $this->oammd->checkspb($spb);
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
		$h = $this->oammd->getmaxcode();
		var_dump($h);
	} */
	
	
	

}