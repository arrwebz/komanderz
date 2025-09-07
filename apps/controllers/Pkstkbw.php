<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pkstkbw extends CI_Controller
{
    public $intpkstkbwid;
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
            'terbilang',
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation',
            'html2pdf'
        ];
        $this->load->library($lib);
        $this->load->model('pkstkbw_model', 'pkstkmd');
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
        $lastnumber = $this->pkstkmd->getlastcodepkstkbw();
        if(count($lastnumber) > 0){
            $ex_code = explode('/',$lastnumber[0]['last_code_pkstkbw']);
            $new_code =  $ex_code[0]+1;
            $code_number = sprintf("%04s", $new_code);
        }else{
            $code_number = '0001';
        }

        $data = [
            'title' => 'KOMET ',
            'brand' => 'Draft PKS TKBW',
            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
            'location' => $this->session->userdata('location'),
            'code_pkstkbw' => $code_number,
        ];

        $data['content'] = $this->load->view('modules/pkstkbw/pkstkbw_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function listdata(){
        $post = $this->input->post();

        if($post){
            $data = [
                'drd' => $this->pkstkmd->getallpkstkbw($post),
            ];
            $view = $this->load->view('modules/pkstkbw/listdata_view', $data, TRUE);

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
            $datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();

            $this->pkstkmd->strcode = $post['code'];
            $this->pkstkmd->strname = $post['name'];
            $this->pkstkmd->strposition = $post['position'];
            $this->pkstkmd->strpob = $post['pob'];
            $this->pkstkmd->strdob = date('Y-m-d', strtotime($post['dob']));;
            $this->pkstkmd->straddress = $post['address'];
            $this->pkstkmd->strstartwork = date('Y-m-d', strtotime($post['start_work']));
            $this->pkstkmd->strendwork = date('Y-m-d', strtotime($post['end_work']));
            $this->pkstkmd->strsegmen = $post['segmen'];
            $this->pkstkmd->strbasicsallary = $post['basic_sallary'];
            $this->pkstkmd->strworkcomplexity = $post['work_complexity'];
            $this->pkstkmd->strovertime = $post['overtime'];
            $this->pkstkmd->strmealallowance = $post['meal_allowance'];
            $this->pkstkmd->strcruser = $this->session->userdata('userid');
            $this->pkstkmd->strcrdat = mdate($datestring, $time);

            /* insert */
            $this->pkstkmd->addpkstkbw();

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
            $detail = $this->pkstkmd->getsinglepkstkbw($id);

            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['detail'] = $detail[0];
                $view = $this->load->view('modules/pkstkbw/editpkstkbw_view', $data, TRUE);

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
            $datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();

            $this->pkstkmd->intpkstkbwid = $post['pkstkbwid'];
            $this->pkstkmd->strcode = $post['code'];
            $this->pkstkmd->strname = $post['name'];
            $this->pkstkmd->strposition = $post['position'];
            $this->pkstkmd->strpob = $post['pob'];
            $this->pkstkmd->strdob = date('Y-m-d', strtotime($post['dob']));;
            $this->pkstkmd->straddress = $post['address'];
            $this->pkstkmd->strstartwork = date('Y-m-d', strtotime($post['start_work']));
            $this->pkstkmd->strendwork = date('Y-m-d', strtotime($post['end_work']));
            $this->pkstkmd->strsegmen = $post['segmen'];
            $this->pkstkmd->strbasicsallary = $post['basic_sallary'];
            $this->pkstkmd->strworkcomplexity = $post['work_complexity'];
            $this->pkstkmd->strovertime = $post['overtime'];
            $this->pkstkmd->strmealallowance = $post['meal_allowance'];
            $this->pkstkmd->strchuser = $this->session->userdata('userid');
            $this->pkstkmd->strchdat = mdate($datestring, $time);

            /* update */
            $this->pkstkmd->editpkstkbw();

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
            $detail = $this->pkstkmd->getsinglepkstkbw($id);

            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['detail'] = $detail[0];
                $view = $this->load->view('modules/pkstkbw/uploadpkstkbw_view', $data, TRUE);

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
                $upload_txtFile = $this->doupload($post['pkgnum'], 'pkstkbw-'.strtolower(str_replace(' ','',$post['name'])), 'txtFile');
                if ($upload_txtFile == FALSE) {
                    $response = array(
                        'status' => 'failed',
                        'msg' => 'Upload file failed, ' . $this->session->flashdata('error_doupload'),
                    );
                    echo json_encode($response);exit;
                } else {
                    $this->pkstkmd->intpkstkbwid = $post['pkstkbwid'];
                    $this->pkstkmd->strfile = $upload_txtFile;
                }

                $this->pkstkmd->update_file();

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
            $this->ltmd->intpkstkbwid = $id;

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
        $detail = $this->ltmd->getsinglepkstkbw($id);
        if(count($detail) == 0){
            redirect(site_url('pkstkbw'));
        }

        $isi = 'Nomor : '.$detail[0]['code'];
        $isi .= 'Perihal : '.$detail[0]['subject'];
        $nama_file = $detail[0]['code'].'.doc';
        force_download($nama_file, $isi);
    }

    public function ajaxcheckpkgnum() {
        if (isset($_POST['pkgnum'])) {
            $inv = $_POST['pkgnum'];
            $results = $this->pkstkmd->checkpkgnum($inv);
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
        $drd = $this->pkstkmd->getsinglepkstkbw($id);

        $this->html2pdf->folder('./assets/pdfs/');
        $name = $this->strcode.'.pdf';

        $drd[0]['total'] = $drd[0]['basic_sallary']+$drd[0]['work_complexity']+$drd[0]['overtime']+$drd[0]['meal_allowance'];
        $drd[0]['terbilang'] = number_to_words($drd[0]['total']);

        $data = [
            'title' => 'Paklaring '.$drd[0]['name'].' - '. $drd[0]['code'],
            'drd' => $drd,
        ];

        // Get output html
        $html = $this->load->view('modules/pkstkbw/print_pkstkbw_view', $data, true);

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->dompdf->loadHtml($html);

        $this->dompdf->set_option("isPhpEnabled", true);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream($name, array("Attachment"=>0));
    }

    function toword(){
        $id = $this->uri->segment(3);
        $drd = $this->pkstkmd->getsinglepkstkbw($id);

        $drd[0]['total'] = $drd[0]['basic_sallary']+$drd[0]['work_complexity']+$drd[0]['overtime']+$drd[0]['meal_allowance'];
        $drd[0]['terbilang'] = number_to_words($drd[0]['total']);

        $data = [
            'title' => 'Paklaring '.$drd[0]['name'].' - '. $drd[0]['code'],
            'drd' => $drd,
            'file_name' => 'Draft PKS TKBW - '.$drd[0]['name'],
        ];

        $this->load->view('modules/pkstkbw/print_pkstkbw_view', $data);
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