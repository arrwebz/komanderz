<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tpenarikan extends CI_Controller {

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

        $this->load->model('tpenarikan_model', 'penarikanmd');
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
            'brand' => 'Data Penarikan Simpanan',
            'drd' => $get_drd,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/tpenarikan/tpenarikan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function search(){
        if($_POST){
            $post = $_POST;
            $drd = $this->penarikanmd->getallpenarikan($post);

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
            $this->load->view('modules/tpenarikan/tpenarikan_data', $data, FALSE);
        }else{
            echo 'Are You Need Something.?';
        }
    }

    function editspbsp() {
        if (isset($_POST['cmdsave'])) {
            $this->spbspmd->strnomor = $this->input->post('txtNomorspb');
            $this->spbspmd->strtanggal_spb = date('Y-m-d', strtotime($this->input->post('txtTanggalspb')));
            $this->spbspmd->strnominal = str_replace('.','',$this->input->post('txtNominalspb'));
            $this->spbspmd->intspbspid = $this->input->post('txtSpbspid');
            $this->spbspmd->chuser = $this->session->userdata('userid');
            $this->spbspmd->chdat = date('Y-m-d H:i:s');

            $this->spbspmd->editspb();
            $this->session->set_flashdata("msg", $this->alert->alertMsg("success", "SPB berhasil diupdate"));
            redirect(base_url($this->router->fetch_class()));
        }

        $id = $this->uri->segment(3);
        $spb = $this->spbspmd->getsinglespb($id);
        $pengajuan = $this->pmd->getsinglepengajuan($spb[0]['pengajuanid']);

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Edit SPB SP',
            'spb' => $spb,
            'pengajuan' => $pengajuan,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/tspbsp/edit_tspbsp_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function updatestatus() {
        if (isset($_POST['cmdsave'])) {
            $post = $this->input->post();

            if(!empty($_FILES['txtBuktitf']['name'])){
                $path = 'spbsp/'.$post['txtSpbspid'].'/';
                $filename = 'spbsp-'.strtolower(str_replace(' ','',trim($this->input->post('txtSpbspid'))));
                $this->spbspmd->strbukti_transfer = $this->doupload($path, $filename, 'txtBuktitf');
                $this->spbspmd->intspbspid = $this->input->post('txtSpbspid');
                $this->spbspmd->strtanggal_proses = date('Y-m-d', strtotime($this->input->post('txtTanggalproses')));
                $this->spbspmd->intstatus = '2';
                $this->spbspmd->chuser = $this->session->userdata('userid');
                $this->spbspmd->chdat = date('Y-m-d H:i:s');

                /* update status spb */
                $this->spbspmd->editstatusspb();

                /* update status pengajuan */
                $this->pmd->strstatus = '3';
                $this->pmd->chuser = $this->session->userdata('userid');
                $this->pmd->chdat = date('Y-m-d H:i:s');
                $this->pmd->intpengajuanid = $this->input->post('txtPengajuanid');
                $this->pmd->editstatus();

                /* insert table penarikan */
                $this->penarikanmd->intpengajuanid = $this->input->post('txtPengajuanid');
                $this->penarikanmd->intspbspid = $this->input->post('txtSpbspid');
                $this->penarikanmd->strnik = $this->input->post('txtNik');
                $this->penarikanmd->strnominal_penarikan = $this->input->post('txtNominalspb');
                $this->penarikanmd->cruser = $this->session->userdata('userid');
                $this->penarikanmd->crdat = date('Y-m-d H:i:s');
                $this->penarikanmd->chuser = '';
                $this->penarikanmd->chdat = '';
                $this->penarikanmd->addpenarikan();


                $this->session->set_flashdata("msg", $this->alert->alertMsg("success", "SPB Selesai"));
                redirect(base_url($this->router->fetch_class()));
            }else{
                $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "Bukti transfer belum diupload"));
                redirect(base_url($this->router->fetch_class().'/updatestatus/'.$post['txtSpbspid']));
            }
        }

        $id = $this->uri->segment(3);

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'SPB SP',
            'spb' => $this->spbspmd->getsinglespb($id),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/tspbsp/update_status_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function detail() {
        $id = $this->uri->segment(3);
        $param['txtSpbspid'] = $id;

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Detail SPB SP',
            'spb' => $this->spbspmd->getallspbsp($param),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
        ];
        $data['content'] = $this->load->view('modules/tspbsp/detail_tspbsp_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function doupload($additionalpath, $filename, $txtupload)
    {
        $folder = $this->router->fetch_class();
        $path = $this->config->item('uploads_dir') . $additionalpath;

        if (! file_exists($path)) {
            if (! mkdir($path, 0777, true)) {
                print_r(error_get_last());
            }
        }

        $config = [
            'upload_path' => $path.'/',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => '50000',
            'file_ext_tolower' => TRUE,
            'remove_spaces' => TRUE,
            'detect_mime' => TRUE,
            'mod_mime_fix' => TRUE,
            'file_name' => strtolower($filename)
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($txtupload)) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error_doupload',$this->upload->display_errors());
            return FALSE;
        }
    }

    function delete(){
        if ($this->input->post()) {
            $this->spbspmd->delete($_POST['id']);
            echo "success";
        }
    }
}
