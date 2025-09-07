<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Packlaring extends CI_Controller
{
    public $intpacklaringid;
    public $strcode;
    public $strtype;
    public $strinitial;
    public $strsubject;
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
            'form_validation',
            'html2pdf'
        ];
        $this->load->library($lib);
        $this->load->model('packlaring_model', 'pkgmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
            array($this->config->item('skins_uri').'libs/sweetalert2/dist/sweetalert2.min.css'),
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
            array($this->config->item('skins_uri').'libs/sweetalert2/dist/sweetalert2.min.js'),
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
            'brand' => 'Paklaring',
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location'),
            'code_packlaring' => $this->pkgmd->getlastcodepacklaring(),
        ];

        $data['content'] = $this->load->view('modules/packlaring/packlaring_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function listdata(){
        $post = $this->input->post();

        if($post){
            $data = [
                'drd' => $this->pkgmd->getallpacklaring($post),
            ];
            $view = $this->load->view('modules/packlaring/listdata_view', $data, TRUE);

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
//            $lastnumber = $this->pkgmd->getlastnumber($post['pkgnum']);
//            if(count($lastnumber) > 0){
//                $ex_code = explode('/',$lastnumber[0]['code']);
//                $new_code =  $ex_code[0]+1;
//                $number = sprintf("%04s", $new_code);
//            }else{
//                $number = '0001';
//            }

            $this->pkgmd->strcode = $post['pkgnum'].'/EXT/TKBW/KOMET/'.month_to_romawi(date('F')).'/'.date('Y');
            $this->pkgmd->strpkgnum = $post['pkgnum'];
            $this->pkgmd->strname = $post['name'];
            $this->pkgmd->strpob = $post['pob'];
            $this->pkgmd->strdob = date('Y-m-d', strtotime($post['dob']));;
            $this->pkgmd->straddress = $post['address'];
            $this->pkgmd->strstartwork = date('Y-m-d', strtotime($post['start_work']));
            $this->pkgmd->strendwork = date('Y-m-d', strtotime($post['end_work']));
            $this->pkgmd->strnotes = $post['notes'];
            $this->pkgmd->strcrdat = date('Y-m-d');

            /* insert */
            $this->pkgmd->addpacklaring();

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
            $detail = $this->pkgmd->getsinglepacklaring($id);

            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['detail'] = $detail[0];
                $view = $this->load->view('modules/packlaring/editpacklaring_view', $data, TRUE);

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

            $this->pkgmd->intpacklaringid = $post['packlaringid'];
            $this->pkgmd->strpkgnum = $post['pkgnum'];
            $this->pkgmd->strcode = $post['code'];
            $this->pkgmd->strname = $post['name'];
            $this->pkgmd->strpob = $post['pob'];
            $this->pkgmd->strdob = date('Y-m-d', strtotime($post['dob']));;
            $this->pkgmd->straddress = $post['address'];
            $this->pkgmd->strstartwork = date('Y-m-d', strtotime($post['start_work']));
            $this->pkgmd->strendwork = date('Y-m-d', strtotime($post['end_work']));
            $this->pkgmd->strnotes = $post['notes'];

            /* update */
            $this->pkgmd->editpacklaring();

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

    function ajaxdetailupload(){
        $post = $this->input->post();

        if($post){

            $id = $post['id'];
            $detail = $this->pkgmd->getsinglepacklaring($id);

            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['detail'] = $detail[0];
                $view = $this->load->view('modules/packlaring/uploadpacklaring_view', $data, TRUE);

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

    function ajaxupload(){
        $post = $this->input->post();

        if($post){

            if (! empty($_FILES['txtFile']['name'])) {
                $upload_txtFile = $this->doupload($post['pkgnum'], 'packlaring-'.strtolower(str_replace(' ','',$post['name'])), 'txtFile');
                if ($upload_txtFile == FALSE) {
                    $response = array(
                        'status' => 'failed',
                        'msg' => 'Upload file failed, ' . $this->session->flashdata('error_doupload'),
                    );
                    echo json_encode($response);exit;
                } else {
                    $this->pkgmd->intpacklaringid = $post['packlaringid'];
                    $this->pkgmd->strfile = $upload_txtFile;
                }

                $this->pkgmd->update_file();

                $response = array(
                    'status' => 'success',
                    'msg' => 'Successfully saved!',
                );
            }else{
                $response = array(
                    'status' => 'failed',
                    'msg' => 'upload file empty',
                );
            }
        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown data post!',
            );
        }

        echo json_encode($response);
    }

    function ajaxdelete(){
        $post = $this->input->post();

        if($post){
            $id = $post['id'];
            $this->ltmd->intpacklaringid = $id;

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
        $detail = $this->ltmd->getsinglepacklaring($id);
        if(count($detail) == 0){
            redirect(site_url('packlaring'));
        }

        $isi = 'Nomor : '.$detail[0]['code'];
        $isi .= 'Perihal : '.$detail[0]['subject'];
        $nama_file = $detail[0]['code'].'.doc';
        force_download($nama_file, $isi);
    }

    public function ajaxcheckpkgnum() {
        if (isset($_POST['pkgnum'])) {
            $inv = $_POST['pkgnum'];
            $results = $this->pkgmd->checkpkgnum($inv);
            if ($results === TRUE) {
                echo 'FALSE';
            } else {
                echo 'TRUE';
            }
        } else {
            echo '<span class="help-block" style="color: #f39c12;"><i class="fa fa-bell-o"></i> Nomor Paklaring tidak boleh kosong.</span>';
        }
    }

    public function preview() {
        $id = $this->uri->segment(3);
        $drd = $this->pkgmd->getsinglepacklaring($id);

        $this->html2pdf->folder('./assets/pdfs/');
        $name = $this->strcode.'.pdf';

        $drd[0]['nextmonth_endwork'] = date('Y-m-d', strtotime('first day of +1 month', strtotime($drd[0]['end_work'])));
        $ex = explode('/',$drd[0]['code']);
        $drd[0]['lastwork'] = date("Y-m-t", strtotime($drd[0]['end_work']));;
        $drd[0]['endmonth'] = romawi_to_number($ex[4]);
        $drd[0]['nextmonth'] = $ex[5].'-'. $drd[0]['endmonth'] .'-'.date('d');

        $data = [
            'title' => 'Paklaring '.$drd[0]['name'].' - '. $drd[0]['code'],
            'drd' => $drd,
        ];

        // Get output html
        $html = $this->load->view('modules/packlaring/print_packlaring_view', $data, true);

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

    function doupload($pathid, $filename, $txtupload){
        $folder = $this->router->fetch_class();
        $path = $this->config->item('uploads_dir') . $folder .'/'. $pathid;


        $search = ['@<script[^>]*?>.*?</script>@si', '@<[\/\!]*?[^<>]*?>@si', '@<style[^>]*?>.*?</style>@siU', '@<![\s\S]*?--[ \t\n\r]*>@' ];

        $normal = preg_replace($search,'',$filename);
        $filename = str_replace(" ","-",$normal);


        if (! file_exists($path)) {
            if (! mkdir($path, 0777, true)) {
                print_r(error_get_last());
            }
        }

        $config = [
            'upload_path' => $path.'/',
            'allowed_types' => 'pdf|word|docx|doc',
            'max_size' => '2000',
            'file_ext_tolower' => TRUE,
            'remove_spaces' => TRUE,
            'detect_mime' => TRUE,
            'mod_mime_fix' => TRUE,
            'file_name' => $filename
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
}