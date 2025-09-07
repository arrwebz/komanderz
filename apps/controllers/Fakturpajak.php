<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakturpajak extends CI_Controller
{
    public $intfakturpajakid;
    public $strcode;
    public $strunit;
    public $intstatus;
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
            'form_validation'
        ];
        $this->load->library($lib);
        $this->load->model('Fakturpajak_model', 'fkmd');
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
            'drd' => $this->fkmd->getallfakturpajak(),
            'title' => 'Faktur Pajak',
            'brand' => 'Daftar Faktur Pajak',
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/fakturpajak/fakturpajak_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function add() {
        if (isset($_POST['cmdsave'])) {

            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtCode', 'Kode Faktur Pajak', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->fkmd->strcode = $this->input->post('txtCode');
                $this->fkmd->strunit = $this->input->post('optUnit');
                $this->fkmd->intstatus = $this->input->post('optStatus');

                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->fkmd->strcruser = $this->session->userdata('userid');
                $this->fkmd->strcrdat = mdate($datestring, $time);

                $this->fkmd->addfakturpajak();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $data = [
            'title' => 'Tambah Faktur Pajak',
            'brand' => 'Baru',
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/fakturpajak/add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function edit() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtCode', 'Kode Faktur Pajak', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->fkmd->intfakturpajakid = $this->input->post('fpId');
                $this->fkmd->strunit = $this->input->post('optUnit');
                $this->fkmd->strcode = $this->input->post('txtCode');
                $this->fkmd->intstatus = $this->input->post('optStatus');

                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $this->fkmd->strcruser = $this->session->userdata('userid');
                $this->fkmd->strcrdat = mdate($datestring, $time);

                $this->fkmd->editfakturpajak();
                redirect(base_url($this->router->fetch_class()));
            }
        }
        $drd = $this->fkmd->getsinglefakturpajak($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intfakturpajakid = $row['fakturpajakid'];
                $this->strunit = $row['unit'];
                $this->strcode = $row['code'];
                $this->intstatus = $row['status'];
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }

        $data = [
            'id' => $this->intfakturpajakid,
            'unit' => $this->strunit,
            'kode' => $this->strcode,
            'buat' =>   $this->strcruser,
            'tglbuat' =>  $this->strcrdat,
            'edit' =>  $this->strchuser,
            'tgledit' =>  $this->strchdat,
            'status' =>  $this->intstatus,
            'title' => 'Ubah Faktur Pajak',
            'brand' => 'Lama',
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/fakturpajak/edit_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function delete(){
        if ($this->input->post()) {
            $this->fkmd->deletefakturpajak($_POST['fakturpajakid']);
            echo "success"; /* mengembalikan kata 'success' untuk dikenali diview */
        }
    }

    public function ajaxcheckcode() {
        if (isset($_POST['txtCode'])) {
            $kf = $_POST['txtCode'];
            $unit = $_POST['optUnit'];
            $results = $this->fkmd->checkcode($kf,$unit);
            if ($results === TRUE) {
                echo 'FALSE';
            } else {
                echo 'TRUE';
            }
        } else {
            echo '<span class="help-block" style="color: #f39c12;"><i class="fa fa-bell-o"></i> Nomor invoice tidak boleh kosong.</span>';
        }

    }
}