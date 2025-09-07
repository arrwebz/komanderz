<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sppd extends CI_Controller{

    public $intsppdid;
    public $intuserid;
    public $strdestination;
    public $strstart;
    public $strend;
    public $strvalue;
    public $strnotes;
    public $strstatus;
    public $strcrdat;
    public $intcruser;
    public $strchdat;
    public $intchuser;

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
            'form_validation',
        ];
        $this->load->library($lib);

        $this->load->model('sppd_model', 'spdmd');
        $this->load->model('User_model', 'usermd');
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
            'drd' => $this->spdmd->getallsppd(),
            'title' => 'Target Sales',
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

        $data['content'] = $this->load->view('modules/sppd/sppd_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function search() {
        if($_POST){
            $post = $this->input->post();
            $data = [
                'drd' => $this->spdmd->getsearchsppd($post),
                'title' => 'KOMET',
                'brand' => 'Hasil pencarian',

                'userid' => $this->session->userdata('userid'),
                'role' => $this->session->userdata('role'),
                'group' => $this->session->userdata('group'),
                'fullname' => $this->session->userdata('userfullname'),
                'photo' => $this->session->userdata('photo'),
                'position' => $this->session->userdata('position'),
                'joindate' => $this->session->userdata('joindate')
            ];

            $data['content'] = $this->load->view('modules/sppd/search_sppd_view', $data, TRUE);
            $this->load->view('templates/base', $data, FALSE);
        }
    }

    public function addsppd() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div> <strong>%s</strong> still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');
            $this->form_validation->set_rules('optUser', 'Nama', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->spdmd->intuserid = $this->input->post('optUser');
                $this->spdmd->strdestination = trim(addslashes($this->input->post('txtDestination')));
                $this->spdmd->strstart = $this->input->post('txtStart');
                $this->spdmd->strend = $this->input->post('txtEnd');
                $this->spdmd->strvalue = str_replace('.','',$this->input->post('txtValue'));
                $this->spdmd->strnotes = trim(addslashes($this->input->post('txtNotes')));
                $this->spdmd->strstatus = 3;
                $this->spdmd->strcruser = $this->session->userdata('userid');
                $this->spdmd->strcrdat = date('Y-m-d H:i:s');
                $this->spdmd->strchdat = '';
                $this->spdmd->intchuser = '';

                $this->spdmd->addsppd();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $data = [
            'title' => 'KOMET',
            'brand' => 'List SPPD',
            'user' => $this->usermd->getalluseractive(),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/sppd/add_sppd_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function editsppd() {
        if (isset($_POST['cmdsave'])) {
            $error = [
                'required' => '<div> <strong>%s</strong> still empty!</div>'
            ];
            $this->form_validation->set_error_delimiters('<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>');
            $this->form_validation->set_rules('txtValue', 'Value', 'required', $error);
            if ($this->form_validation->run() == TRUE) {

                $this->spdmd->intsppdid = $this->input->post('hdnSppdid');
                $this->spdmd->intuserid = $this->input->post('optUser');
                $this->spdmd->strdestination = trim(addslashes($this->input->post('txtDestination')));
                $this->spdmd->strstart = $this->input->post('txtStart');
                $this->spdmd->strend = $this->input->post('txtEnd');
                $this->spdmd->strvalue = str_replace('.','',$this->input->post('txtValue'));
                $this->spdmd->strnotes = trim(addslashes($this->input->post('txtNotes')));
                $this->spdmd->strstatus = $this->input->post('optStatus');
                $this->spdmd->strcruser = $this->session->userdata('userid');
                $this->spdmd->strcrdat = date('Y-m-d H:i:s');
                $this->spdmd->strchdat = '';
                $this->spdmd->intchuser = '';

                $this->spdmd->editsppd();
                redirect(base_url($this->router->fetch_class()));
            }
        }

        $drd = $this->spdmd->getsinglesppd($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
                $this->intsppdid = $row['sppdid'];
                $this->intuserid = $row['userid'];
                $this->strdestination = $row['destination'];
                $this->strstart = $row['start'];
                $this->strend = $row['end'];
                $this->strvalue = $row['value'];
                $this->strnotes = $row['notes'];
                $this->strstatus = $row['status'];
            }
        }

        $data = [
            'sppdid' => $this->intsppdid,
            'spduserid' => $this->intuserid,
            'destination' => $this->strdestination,
            'start' => $this->strstart,
            'end' => $this->strend,
            'value' => $this->strvalue,
            'notes' => $this->strnotes,
            'status' => $this->strstatus,
            'user' => $this->usermd->getalluseractive(),

            'title' => 'KOMET',
            'brand' => 'SPPD',

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/sppd/edit_sppd_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function delete(){
        if ($this->input->post()) {
            $this->spdmd->delete($_POST['idtargetsales']);
            echo "success";
        }
    }
}