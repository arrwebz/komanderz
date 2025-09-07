<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lop extends CI_Controller
{
    public $intlopid;
    public $intdivid;
    public $intsegmenid;
    public $strunit;
    public $stramkomet;
    public $strstartkl;
    public $strendkl;
    public $strprojectname;
    public $strnilaikl;
    public $strprogress;
    public $strnotes;

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
        $this->load->model('lop_model', 'lopmd');
        $this->load->model('Order_model', 'ordermd');
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
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    function index() {
        $data = [
            'title' => 'KOMET',
            'brand' => 'List Of Project',
            'drd' => $this->lopmd->getalllop(),
            'division' => $this->drdmd->getalldiv(),
            'segment' => $this->drdmd->getallseg(),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location')
        ];

        $data['content'] = $this->load->view('modules/lop/lop_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function addlop() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:white;"> %s still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
            $this->form_validation->set_rules('txtNilaikl', 'Nilai KL', 'required', $error);
            $this->form_validation->set_rules('txtProjectname', 'Nama Projek', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $dateStart = $this->input->post('txtStart');
                $this->lopmd->strstartkl = date('Y-m-d', strtotime($dateStart));

                $dateEnd = $this->input->post('txtEnd');
                $this->lopmd->strendkl = date('Y-m-d', strtotime($dateEnd));

                $nkl = $this->input->post('txtNilaikl');
                $this->lopmd->strnilaikl = str_replace(".", "", $nkl);

                $this->lopmd->intdivid = $this->input->post('optDivision');
                $this->lopmd->intsegmenid = $this->input->post('optSegment');
                $this->lopmd->strunit = $this->input->post('optUnit');
                $this->lopmd->stramkomet = $this->input->post('txtAmkomet');
                $this->lopmd->strspknum = $this->input->post('txtSpknum');
                $this->lopmd->intstatus = $this->input->post('optStatus');
                $this->lopmd->strprojectname = addslashes($this->input->post('txtProjectname'));
                $this->lopmd->strnotes = addslashes($this->input->post('txtNotes'));

                $this->lopmd->addlop();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $data = [
            'title' => 'KOMET',
            'brand' => 'Tambah LOP',
            'division' => $this->drdmd->getalldiv(),
            'segment' => $this->drdmd->getallseg(),
            'marketing' => $this->drdmd->getalluseram(),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/lop/add_lop_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function editlop() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtNilaikl', 'Nilai KL', 'required', $error);
            $this->form_validation->set_rules('txtProjectname', 'Nama Projek', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $dateStart = $this->input->post('txtStart');
                $this->lopmd->strstartkl = date('Y-m-d', strtotime($dateStart));

                $dateEnd = $this->input->post('txtEnd');
                $this->lopmd->strendkl = date('Y-m-d', strtotime($dateEnd));

                $nkl = $this->input->post('txtNilaikl');
                $this->lopmd->strnilaikl = str_replace(".", "", $nkl);

                $this->lopmd->intdivid = $this->input->post('optDivision');
                $this->lopmd->intsegmenid = $this->input->post('optSegment');
                $this->lopmd->strunit = $this->input->post('optUnit');
                $this->lopmd->stramkomet = $this->input->post('txtAmkomet');
                $this->lopmd->strspknum = $this->input->post('txtSpknum');
                $this->lopmd->intstatus = $this->input->post('optStatus');
                $this->lopmd->strprojectname = addslashes($this->input->post('txtProjectname'));
                $this->lopmd->strnotes = addslashes($this->input->post('txtNotes'));

                $this->lopmd->intlopid = $this->input->post('hdnLopid');

                $this->lopmd->editlop();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $drd = $this->lopmd->getsinglelop($this->uri->segment(3));

        $data = [
            'title' => 'KOMET',
            'brand' => 'Ubah NOPES',
            'drd' => $drd,
            'division' => $this->drdmd->getalldiv(),
            'segment' => $this->drdmd->getallseg(),
            'marketing' => $this->drdmd->getalluseram(),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/lop/edit_lop_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function details() {
        $drd = $this->lopmd->getsinglelop($this->uri->segment(3));

        $data = [
            'title' => 'KOMET',
            'brand' => 'Detail LOP',
            'drd' => $drd,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/lop/detail_lop_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function cariinvoice(){
        $post = $this->input->post();

        if($post){

            $post = $this->input->post();
            $detail = $this->lopmd->getsinglnopes($post);

            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['detail'] = $detail[0];

                $response = array(
                    'status' => 'success',
                    'data' => $detail[0],
                    'msg' => '',
                );
            }

        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown data',
            );
        }

        echo json_encode($response);
    }

    function createinvoice(){
        if (isset($_POST['cmdsave'])) {

            $error = [
                'required' => '<div style="color:white;"> %s still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
            $this->form_validation->set_rules('resInvnum', 'Nomor Invoice', 'required', $error);
            $this->form_validation->set_rules('resDate', 'Date', 'required', $error);
            $this->form_validation->set_rules('resValue', 'Value', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $invd = $this->input->post('resDate');
                $_POST['resDate'] = date('Y-m-d', strtotime($invd));

                $net = $this->input->post('resValue');
                $_POST['resValue'] = str_replace(".", "", $net);
                $_POST['resLopid'] = $this->uri->segment(3);

                $this->lopmd->addlopdetail($_POST);
                redirect(base_url($this->router->fetch_class().'/createinvoice/'.$this->uri->segment(3)));
            }
        }

        $drd = $this->lopmd->getsinglelop($this->uri->segment(3));
        $detail = $this->lopmd->getsinglelopdetail($this->uri->segment(3));
        $data = [
            'title' => 'KOMET',
            'brand' => 'Buat Invoice LOP',
            'drd' => $drd,
            'detail' => $detail,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/lop/invoice_lop_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function delete(){
        if ($this->input->post()) {
            $this->lopmd->delete($_POST['lopid']);
            $this->lopmd->deletelopdetail($_POST['lopid']);
            echo "success";
        }
    }
}