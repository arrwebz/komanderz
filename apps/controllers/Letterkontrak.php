<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Letterkontrak extends CI_Controller
{
    public $intletterkontrakid;
    public $strcode;
    public $strtype;
    public $strdivisi;
    public $strunit;
    public $strmonth;
    public $stryear;
    public $strdivkomet;
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
            'date',
            'download',
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation'
        ];
        $this->load->library($lib);
        $this->load->model('letterk_model', 'ltmd');
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
            'brand' => 'Daftar Surat',
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location')
        ];

        $data['content'] = $this->load->view('modules/letterk/letterk_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function listdata(){
        $post = $this->input->post();

        if($post){
            $data = [
                'drd' => $this->ltmd->getallletter($post),
            ];
            $view = $this->load->view('modules/letterk/listdata_view', $data, TRUE);

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
            $lastnumber = $this->ltmd->getlastnumberbyunit($post);
            if(count($lastnumber) > 0){
                $ex_code = explode('/',$lastnumber[0]['code']);
                $new_code =  $ex_code[0]+1;
                $number = sprintf("%04s", $new_code);
            }else{
                $number = '0001';
            }


            $this->ltmd->strcode = $number.'/'.$post['type'].'/'.$post['divisi'].'/'.$post['unit'].'/'.month_to_romawi_letter($post['month']).'/'.substr($post['year'], -2);
            //$this->ltmd->strcode = $post['code'];
            $this->ltmd->strtype = $post['type'];
            $this->ltmd->strdivisi = $post['divisi'];
            $this->ltmd->strunit = $post['unit'];
            $this->ltmd->strmonth = $post['month'];
            $this->ltmd->stryear = $post['year'];
            $this->ltmd->strdivkomet = $post['divkomet'];
            $this->ltmd->strcruser = $this->session->userdata('userid');
            $this->ltmd->strcrdat = date('Y-m-d H:i:s');

            /* insert */
            $this->ltmd->addletter();

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
            $detail = $this->ltmd->getsingleletter($id);

            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['detail'] = $detail[0];
                $view = $this->load->view('modules/letterk/editletterk_view', $data, TRUE);

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

            /* atur code kembali */
            $code_old = $post['codeold'];
            $ex_code_old = explode('/',$code_old);

            if(count($ex_code_old) > 0){
                $this->ltmd->intletterid = $post['letterid'];
                $this->ltmd->strcode = $ex_code_old[0].'/'.$post['type'].'/'.$post['divisi'].'/'.$post['unit'].'/'.month_to_romawi_letter($post['month']).'/'.substr($post['year'], -2);
                //$this->ltmd->strcode = $post['code'];
                $this->ltmd->strtype = $post['type'];
                $this->ltmd->strdivisi = $post['divisi'];
                $this->ltmd->strunit = $post['unit'];
                $this->ltmd->strmonth = $post['month'];
                $this->ltmd->stryear = $post['year'];
                $this->ltmd->strdivkomet = $post['divkomet'];
                $this->ltmd->strchuser = $this->session->userdata('userid');
                $this->ltmd->strchdat = date('Y-m-d H:i:s');

                /* update */
                $this->ltmd->editletter();

                $response = array(
                    'status' => 'success',
                    'msg' => 'Successfully saved!',
                );
            }else{
                $response = array(
                    'status' => 'failed',
                    'msg' => 'generate code tidak berhasil!',
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

    function ajaxdelete(){
        $post = $this->input->post();

        if($post){
            $id = $post['id'];
            $this->ltmd->intletterid = $id;

            $this->ltmd->delete();

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
        $detail = $this->ltmd->getsingleletter($id);
        if(count($detail) == 0){
            redirect(site_url('letter'));
        }

        $isi = 'Nomor : '.$detail[0]['code'];
        $isi .= '                                                   Perihal : '.$detail[0]['subject'];
        $nama_file = $detail[0]['code'].'.doc';
        force_download($nama_file, $isi);
    }

    function nomorsurat(){
        $get_pks = $this->ltmd->getlastnumber('PKS');
        if(count($get_pks) > 0){
            $nomor_terakhir['pks'] = $get_pks[0]['code'];
        }else{
            $nomor_terakhir['pks'] = '-';
        }

        $get_po = $this->ltmd->getlastnumber('PO');
        if(count($get_po) > 0){
            $nomor_terakhir['po'] = $get_po[0]['code'];
        }else{
            $nomor_terakhir['po'] = '-';
        }

        $response = array(
            'data' => $nomor_terakhir,
            'status' => 'success',
            'msg' => 'nomor surat terbaru',
        );
        echo json_encode($response);
    }
}