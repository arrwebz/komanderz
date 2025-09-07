<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        self::bindskins();
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }

        $hlp = ['form', 'date'];
        $this->load->helper($hlp);

        $lib = ['form_validation'];
        $this->load->library($lib);

        $this->load->model('tanggota_model', 'amd');
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

    function index(){
        $get_drd = array();

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Anggota',
            'drd' => $get_drd,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/tanggota/tanggota_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function search(){
        if($_POST){
            $post = $_POST;
            $drd = $this->amd->getallanggota($post);
            $data = array(
                'drd' => $drd,

                'userid' => $this->session->userdata('userid'),
                'role' => $this->session->userdata('role'),
                'group' => $this->session->userdata('group'),
                'fullname' => $this->session->userdata('userfullname'),
                'photo' => $this->session->userdata('photo'),
                'position' => $this->session->userdata('position'),
                'joindate' => $this->session->userdata('joindate')
            );
            $this->load->view('modules/tanggota/tanggota_data', $data, FALSE);
        }else{
            echo 'Are You Need Something.?';
        }
    }

    function editbot() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtName', 'Nama Bot', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $this->botmd->strname = $this->input->post('txtName');
                $this->botmd->strfullname = $this->input->post('txtFullname');
                $this->botmd->intstatus = $this->input->post('optStatus');
                $this->botmd->intspeakchat = $this->input->post('optSpeakchat');
                $this->botmd->strnoteonline = $this->input->post('txtNoteonline');
                $this->botmd->strnoteoffline = $this->input->post('txtNoteoffline');
                $this->botmd->strnotemaintain = $this->input->post('txtNotemaintanance');
                $this->botmd->strtextinterupt = $this->input->post('txtTextinterupt');
                $this->botmd->straboutme = $this->input->post('txtAboutme');
                $this->botmd->intbotid = $this->input->post('txtBotid');

                $this->botmd->editbot();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $id = $this->uri->segment(3);
        $drd = $this->botmd->getbotbyid($id);

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Ubah BOT',
            'drd' => $drd,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/tbot/edit_tbot_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
}
