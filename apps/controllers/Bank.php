<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{
    public $intbankid;
    public $strbankname;
    public $straccname;
    public $straccnum;

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
            'download',
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation',
            'html2pdf'
        ];
        $this->load->library($lib);
        $this->load->model('bank_model', 'bankmd');
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
            'title' => 'KOMET ',
            'brand' => 'Bank',
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location'),
        ];

        $data['content'] = $this->load->view('modules/bank/bank_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function listdata(){
        $post = $this->input->post();

        if($post){
            $data = [
                'drd' => $this->bankmd->getallbank($post),
            ];
            $view = $this->load->view('modules/bank/listdata_view', $data, TRUE);

            $response = array(
                'status' => 'success',
                'view' => $view,
                'msg' => 'Successfully saved!',
            );
        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown data',
            );
        }

        echo json_encode($response);
    }

    function ajaxadd(){
        $post = $this->input->post();

        if($post){
            $this->bankmd->strbankname = $post['bankname'];
            $this->bankmd->straccname = $post['accname'];
            $this->bankmd->straccnum = $post['accnum'];

            /* insert */
            $this->bankmd->addbank();

            $response = array(
                'status' => 'success',
                'msg' => 'Successfully saved!',
            );
        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown data',
            );
        }

        echo json_encode($response);
    }

    function ajaxdetail(){
        $post = $this->input->post();

        if($post){

            $id = $post['id'];
            $detail = $this->bankmd->getsinglebank($id);

            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['detail'] = $detail[0];
                $view = $this->load->view('modules/bank/editbank_view', $data, TRUE);

                $response = array(
                    'status' => 'success',
                    'data' => $detail[0],
                    'view' => $view,
                    'msg' => 'Successfully saved!',
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

    function ajaxedit(){
        $post = $this->input->post();

        if($post){

            $this->bankmd->intbankid = $post['bankid'];
            $this->bankmd->strbankname = $post['bankname'];
            $this->bankmd->straccname = $post['accname'];
            $this->bankmd->straccnum = $post['accnum'];

            /* update */
            $this->bankmd->editbank();

            $response = array(
                'status' => 'success',
                'msg' => 'Successfully saved!',
            );

        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown data',
            );
        }

        echo json_encode($response);
    }

    function ajaxdelete(){
        $post = $this->input->post();

        if($post){
            $id = $post['id'];
            $this->bankmd->intbankid = $id;

            $this->bankmd->delete();

            $response = array(
                'status' => 'success',
                'msg' => 'Deleted!',
            );
        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Failed!',
            );
        }

        echo json_encode($response);
    }

    function download(){
        $id = $this->uri->segment(3);
        $detail = $this->ltmd->getsinglepacklaring($id);
        if(count($detail) == 0){
            redirect(site_url('packlaring'));
        }

        $isi = 'Nomor : '.$detail[0]['code'];
        $isi .= 'Perihal : '.$detail[0]['subject'];
        $nama_file = $detail[0]['code'].'.doc';
        force_download($nama_file, $isi);
    }
}