<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewakendaraan extends CI_Controller
{
    public $intsewakendaraanid;
    public $strpic;
    public $strsegmen;
    public $strnopolisi;
    public $stralamat;
    public $strnokontrak;
    public $strkendaraan;
    public $strtahun;
    public $strjangkawaktu;
    public $strstartkontrak;
    public $strendkontrak;
    public $strbiaya;
    public $strketerangan;
    public $strdraftkontrak;
    public $strbastkontrak;
    public $strcrdat;

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
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation'
        ];
        $this->load->library($lib);

		$this->load->model('User_model', 'usermd');
		$this->load->model('sewakendaraan_model', 'sknmd');
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
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
	public function index() {

		$data = [
            'drd' => $this->sknmd->getallsewakendaraan(),
            'title' => 'Sewa Kendaraan',
			'brand' => '',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate'),
			'location' => $this->session->userdata('location')
        ];
		
		$data['content'] = $this->load->view('modules/sewakendaraan/sewakendaraan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function addsewakendaraan() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtKendaraan', 'Kendaraan', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->sknmd->strpic = $this->input->post('txtPic');
                $this->sknmd->strsegmen = $this->input->post('txtSegmen');
                $this->sknmd->strnopolisi= $this->input->post('txtNopolisi');
                $this->sknmd->stralamat= $this->input->post('txtAlamat');
                $this->sknmd->strtahun= $this->input->post('txtTahun');
                $this->sknmd->strkendaraan= $this->input->post('txtKendaraan');
                $this->sknmd->strbiaya=  str_replace(".", "", $this->input->post('txtBiaya'));
                $this->sknmd->strjangkawaktu= $this->input->post('txtJangkawaktu');
                $this->sknmd->strnokontrak= $this->input->post('txtNokontrak');
                $this->sknmd->strstartkontrak= $this->input->post('txtStartkontrak');
                $this->sknmd->strendkontrak= $this->input->post('txtEndkontrak');
                $this->sknmd->strketerangan= $this->input->post('txtKeterangan');

				$startkontrak = $this->input->post('txtStartkontrak');
                $this->sknmd->strstartkontrak = date('Y-m-d', strtotime($startkontrak));

                $endkontrak = $this->input->post('txtEndkontrak');
                $this->sknmd->strendkontrak = date('Y-m-d', strtotime($endkontrak));

                $this->sknmd->strcrdat = date('Y-m-d');

				$this->sknmd->addsewakendaraan();
                redirect(base_url($this->router->fetch_class()));
            }
        }

		$data = [ 
			'title' => 'KOMET',
			'brand' => 'Sewa Kendaraan',

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];

		$data['content'] = $this->load->view('modules/sewakendaraan/add_sewakendaraan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

	public function editsewakendaraan() {
		if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtKendaraan', 'Nama Produk', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->sknmd->intsewakendaraanid = $this->input->post('txtSewakendaraanid');
                $this->sknmd->strpic = $this->input->post('txtPic');
                $this->sknmd->strsegmen = $this->input->post('txtSegmen');
                $this->sknmd->strnopolisi= $this->input->post('txtNopolisi');
                $this->sknmd->stralamat= $this->input->post('txtAlamat');
                $this->sknmd->strtahun= $this->input->post('txtTahun');
                $this->sknmd->strkendaraan= $this->input->post('txtKendaraan');
                $this->sknmd->strbiaya=  str_replace(".", "", $this->input->post('txtBiaya'));
                $this->sknmd->strjangkawaktu= $this->input->post('txtJangkawaktu');
                $this->sknmd->strnokontrak= $this->input->post('txtNokontrak');
                $this->sknmd->strstartkontrak= $this->input->post('txtStartkontrak');
                $this->sknmd->strendkontrak= $this->input->post('txtEndkontrak');
                $this->sknmd->strketerangan= $this->input->post('txtKeterangan');

                $startkontrak = $this->input->post('txtStartkontrak');
                $this->sknmd->strstartkontrak = date('Y-m-d', strtotime($startkontrak));

                $endkontrak = $this->input->post('txtEndkontrak');
                $this->sknmd->strendkontrak = date('Y-m-d', strtotime($endkontrak));

				$this->sknmd->editsewakendaraan();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $drd = $this->sknmd->getsinglesewakendaraan($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intsewakendaraanid = $row['sewakendaraanid'];
                $this->strpic = $row['pic'];
                $this->strsegmen = $row['segmen'];
                $this->strnopolisi= $row['no_polisi'];
                $this->stralamat= $row['alamat'];
                $this->strnokontrak= $row['no_kontrak'];
                $this->strkendaraan= $row['kendaraan'];
                $this->strtahun= $row['tahun'];
                $this->strjangkawaktu= $row['jangka_waktu'];
                $this->strstartkontrak= date('d-m-Y', strtotime($row['start_kontrak']));
                $this->strendkontrak= date('d-m-Y', strtotime($row['end_kontrak']));
                $this->strbiaya= $row['biaya'];
                $this->strketerangan= $row['keterangan'];
            }
        }

		$data = [
            'sewakendaraanid' => $this->intsewakendaraanid,
            'pic' => $this->strpic,
            'segmen' => $this->strsegmen,
            'nopolisi' => $this->strnopolisi,
            'alamat' => $this->stralamat,
            'nokontrak' => $this->strnokontrak,
            'kendaraan' => $this->strkendaraan,
            'tahun' => $this->strtahun,
            'jangkawaktu' => $this->strjangkawaktu,
            'startkontrak' => $this->strstartkontrak,
            'endkontrak' => $this->strendkontrak,
            'biaya' => $this->strbiaya,
            'keterangan' => $this->strketerangan,

			'title' => 'KOMET',
			'brand' => 'Sewa Kendaraan',
            'user' => $this->usermd->getalluseractive(),

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];

		$data['content'] = $this->load->view('modules/sewakendaraan/edit_sewakendaraan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}

    function details(){
        $id = $this->uri->segment(3);
        $details = $this->sknmd->getsinglesewakendaraan($id);
        if(empty($details)){
            redirect(base_url().$this->router->fetch_class());
        }

        $inv = str_replace(";","','",$details[0]['inv']);
        $invterkait = $this->sknmd->getinvterkait("'".$inv."'");

        $data = [
            'drd' => $details,
            'invterkait' => $invterkait,
            'title' => 'KOMET',
            'brand' => $details[0]['kendaraan'],

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location')
        ];

        $data['content'] = $this->load->view('modules/sewakendaraan/detail_sewakendaraan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function addtermininv(){
        $id = $this->uri->segment(3);
        $details = $this->sknmd->getsinglesewakendaraan($id);
        if(empty($details)){
            redirect(base_url().$this->router->fetch_class());
        }

        $data = [
            'drd' => $this->sknmd->getalltermininvkomet(),
            'details' => $details,
            'title' => 'KOMET',
            'brand' => $details[0]['kendaraan'],

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location')
        ];

        $data['content'] = $this->load->view('modules/sewakendaraan/termin_sewakendaraan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function createtermin(){
        if ($this->input->post()) {
            $id = $_POST['hdnsewaid'];

            $datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
            $invoiceid = $this->input->post('termin[]');
            if($invoiceid == NULL){
                $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
														Invoice belum dipilih.
													</div>');
                redirect(base_url().$this->router->fetch_class().'/addtermininv/'.$id);
            } else {
                $sewaid = $this->input->post('hdnsewaid');
                $this->sknmd->intsewakendaraanid = $sewaid;
                $this->sknmd->intinvoiceid = implode(';',$invoiceid);
                $this->sknmd->updatetermin();
                redirect(base_url().$this->router->fetch_class().'/details/'.$sewaid);
            }
        }
    }

    function uploaddraft(){
        if ($this->input->post()){
            /* UPLOAD FAKTUR */
            if (!empty($_FILES['txtFile']['name'])) {
                $photo_path = $this->config->item('uploads_dir') . 'sewakendaraan/draftktk/' .  $this->input->post('idsewa');
                if (!file_exists($photo_path)) {
                    mkdir($photo_path, 0777, true);
                }
                $title = str_replace(' ','',$this->input->post('nopol'));

                $config['upload_path'] = $photo_path . '/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '20000';
                $config['file_name'] = $title;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('txtFile')) {
                    $upload_data = $this->upload->data();
                    $this->sknmd->intsewakendaraanid = $this->input->post('idsewa');
                    $this->sknmd->strdraftkontrak = $upload_data['file_name'];
                    $this->sknmd->updatedraftktk();
                    return 'sukses';
                }
            }
            /* END UPLOAD FAKTUR */
        }
    }

    function uploadbast(){
        if ($this->input->post()){
            /* UPLOAD FAKTUR */
            if (!empty($_FILES['txtFile']['name'])) {
                $photo_path = $this->config->item('uploads_dir') . 'sewakendaraan/bastktk/' .  $this->input->post('idsewa');
                if (!file_exists($photo_path)) {
                    mkdir($photo_path, 0777, true);
                }
                $title = str_replace(' ','',$this->input->post('nopol'));

                $config['upload_path'] = $photo_path . '/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '20000';
                $config['file_name'] = $title;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('txtFile')) {
                    $upload_data = $this->upload->data();
                    $this->sknmd->intsewakendaraanid = $this->input->post('idsewa');
                    $this->sknmd->strbastkontrak = $upload_data['file_name'];
                    $this->sknmd->updatebastktk();
                    return 'sukses';
                }
            }
            /* END UPLOAD FAKTUR */
        }
    }

    function delete(){
        if ($this->input->post()) {
            $this->sknmd->deletesewakendaraan($_POST['sewakendaraanid']);
            echo "success";
        }
    }

}	