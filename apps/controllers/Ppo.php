<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		self::bindskins();
		if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }$hlp = [
            'form',
            'date'
        ];
        $this->load->helper($hlp);
        $this->load->model('Po_model', 'pomd');
        $this->load->model('Dropdown_model', 'drdmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'bower_components/bootstrap/dist/css/bootstrap.min.css'),
            array($this->config->item('skins_uri').'bower_components/font-awesome/css/font-awesome.min.css'),
            array($this->config->item('skins_uri').'bower_components/Ionicons/css/ionicons.min.css'),
            array($this->config->item('skins_uri').'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'),
			array($this->config->item('skins_uri').'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'),
            array($this->config->item('skins_uri').'bower_components/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'dist/css/AdminLTE.min.css'),
            array($this->config->item('skins_uri').'dist/css/skins/_all-skins.min.css'),
            array($this->config->item('skins_uri').'plugins/pace/pace.min.css'),
            array($this->config->item('skins_uri').'plugins/sweetalert2/sweetalert2.css'),
            array('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')

        );
        $js_head = array(
            array($this->config->item('skins_uri').'bower_components/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'bower_components/jquery-ui/jquery-ui.min.js'),
            array($this->config->item('skins_uri').'bower_components/bootstrap/dist/js/bootstrap.min.js'),
            array($this->config->item('skins_uri').'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'),
            array($this->config->item('skins_uri').'bower_components/PACE/pace.min.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/core.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/charts.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/themes/kelly.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/themes/animated.js'),
        );
        $js_content  = array(
            array($this->config->item('skins_uri').'bower_components/datatables.net/js/jquery.dataTables.min.js'),
            array($this->config->item('skins_uri').'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'),
            array($this->config->item('skins_uri').'bower_components/select2/dist/js/select2.full.min.js'),
            array($this->config->item('skins_uri').'bower_components/jquery-slimscroll/jquery.slimscroll.min.js'),
            array($this->config->item('skins_uri').'bower_components/fastclick/lib/fastclick.js'),
            array($this->config->item('skins_uri').'plugins/sweetalert2/sweetalert2.js'),
            array($this->config->item('skins_uri').'plugins/jspdf/jspdf.js'),
            array($this->config->item('skins_uri').'plugins/dom-to-image/dom-to-image.min.js'),
            array($this->config->item('skins_uri').'dist/js/adminlte.min.js'),
            array($this->config->item('skins_uri').'dist/js/demo.js'),
            array($this->config->item('skins_uri').'plugins/tinymce/tinymce/tinymce.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
        $get_report = array();

		$data = [
			'title' => 'PADI',
			'drd' => $get_report,
            'division' => $this->drdmd->getalldiv(),
			'segment' => $this->drdmd->getallseg(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/ppo/ppo_view',$data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function search(){
        if($_POST){
            $post = $_POST;
            $t['drd'] = $this->pomd->getallppopadi($post);
            $this->load->view('modules/ppo/ajax_ppo_view', $t, FALSE);
        }else{
            echo 'Are You Need Something.?';
        }
    }

    function addpo(){
        if (isset($_POST['cmdsave'])) {

            $newid = $this->pomd->getnewid();
            $insert_po = array(
                'id_ppo' => $newid,
                'ponumber' => trim($this->input->post('txtPoNumber')),
                'customer' => trim($this->input->post('txtCustomer')),
                'dari' => trim($this->input->post('txtDari')),
                'kepada' => trim($this->input->post('txtKepada')),
                'notes' => trim($this->input->post('txtNotes')),
                'ongkir' => str_replace('.','',trim($this->input->post('txtOngkir'))),
                'totalpo' => str_replace('.','',trim($this->input->post('txtGrandTotal'))),
                'datepo' => $this->input->post('txtDatepo'),
                'cruser' => $this->session->userdata('userid'),
                'crdat' => date('Y-m-d H:i:s'),
            );
            $this->pomd->insertpadi($insert_po);

            $rowunit = count($this->input->post('unit'));
            if($rowunit > 0){
                for($i=0; $i<$rowunit; $i++){
                    $insert_unit[] = array(
                        'id_ppo' => $newid,
                        'namaunit' => trim($_POST['unit'][$i]),
                        'keterangan' => trim($_POST['keterangan'][$i]),
                        'qty' => trim($_POST['qty'][$i]),
                        'price' => str_replace('.','',trim($_POST['price'][$i])),
                        'total' => str_replace('.','',trim($_POST['total'][$i])),
                    );
                }
                $this->db->insert_batch('tb_ppounit', $insert_unit);
            }
            redirect(base_url($this->router->fetch_class()));
        }

        $datapo = $this->pomd->getponumberpadi();
        $kodepo = '/PO/KPD/'.date('m').'/'.date('y');
        if(empty($datapo)){
            $ponumber = '0023'.$kodepo;
        }else{
            $ex = explode('/',$datapo[0]['ponumber']);
            $lastnumber = $ex[0]+1;
            $newnumber = sprintf("%04s", $lastnumber);
            $ponumber = $newnumber.$kodepo;
        }

        $data = [
            'title' => 'PADI',
            'brand' => 'Tambah PO',
            'ponumber' => $ponumber,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/ppo/add_ppo_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function editpo(){
        if (isset($_POST['cmdsave'])) {
            $update_po = array(
                'ponumber' => trim($this->input->post('txtPoNumber')),
                'customer' => trim($this->input->post('txtCustomer')),
                'dari' => trim($this->input->post('txtDari')),
                'kepada' => trim($this->input->post('txtKepada')),
                'notes' => trim($this->input->post('txtNotes')),
                'ongkir' => str_replace('.','',trim($this->input->post('txtOngkir'))),
                'totalpo' => str_replace('.','',trim($this->input->post('txtGrandTotal'))),
                'datepo' => $this->input->post('txtDatepo'),
                'chuser' => $this->session->userdata('userid'),
                'chdat' => date('Y-m-d H:i:s'),
            );
            $this->pomd->updatepadi($update_po, array('id_ppo' => $this->input->post('id_ppo')));

            $rowunit = count($this->input->post('unit'));
            if($rowunit > 0){
                for($i=0; $i<$rowunit; $i++){
                    $updateunit = array(
                        'namaunit' => trim($_POST['unit'][$i]),
                        'keterangan' => trim($_POST['keterangan'][$i]),
                        'qty' => trim($_POST['qty'][$i]),
                        'price' => str_replace('.','',trim($_POST['price'][$i])),
                        'total' => str_replace('.','',trim($_POST['total'][$i])),
                    );
                    $this->pomd->updatepadiunit($updateunit, array('id_ppounit' => $_POST['id_ppounit'][$i]));
                }
            }
            redirect(base_url($this->router->fetch_class()));
        }

        $id = $this->uri->segment(3);
        $drd = $this->pomd->getsingleditpo($id);
        $drdunit = $this->pomd->getunit($id);

        $data = [
            'title' => 'PADI',
            'brand' => 'EDIT PO ('.$drd[0]['ponumber'].')',
            'drd' => $drd,
            'drdunit' => $drdunit,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/ppo/edit_ppo_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function pdf(){
        $id = $this->uri->segment(3);
        $drd = $this->pomd->getsingleditpo($id);
        $drdunit = $this->pomd->getunit($id);

        $data = [
            'title' => 'PO PADI ('.$drd[0]['ponumber'].')',
            'brand' => 'PO PADI ('.$drd[0]['ponumber'].')',
            'drd' => $drd,
            'drdunit' => $drdunit,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $html = $this->load->view('modules/ppo/pdf_ppo_view', $data, TRUE);

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream('PO_PADI_'. $drd[0]['ponumber'] .'.pdf', array("Attachment"=>0));
    }
}