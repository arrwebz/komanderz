<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saldosegment extends CI_Controller {

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
        $this->load->model('Report_model', 'repmd');
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
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
        $saldoinvcair = $this->repmd->getsaldoinvpanjar('1');
        $saldoinvbelumcair = $this->repmd->getsaldoinvpanjar('!1');
        $totalpanjarspbcair = $this->repmd->gettotalpanjarspb('1');
        $totalpanjarspbbelumcair = $this->repmd->gettotalpanjarspb('!1');

        $saldoinvcair21 = $this->repmd->getsaldoinvpanjaryear('1','2021');
        $saldoinvbelumcair21 = $this->repmd->getsaldoinvpanjaryear('!1','2021');
        $totalpanjarspbcair21 = $this->repmd->gettotalpanjarspbyear('1','2021');
        $totalpanjarspbbelumcair21 = $this->repmd->gettotalpanjarspbyear('!1','2021');

        $saldoinvcair22 = $this->repmd->getsaldoinvpanjaryear('1','2022');
        $saldoinvbelumcair22 = $this->repmd->getsaldoinvpanjaryear('!1','2022');
        $totalpanjarspbcair22 = $this->repmd->gettotalpanjarspbyear('1','2022');
        $totalpanjarspbbelumcair22 = $this->repmd->gettotalpanjarspbyear('!1','2022');

        $saldoinvcair23 = $this->repmd->getsaldoinvpanjaryear('1','2023');
        $saldoinvbelumcair23 = $this->repmd->getsaldoinvpanjaryear('!1','2023');
        $totalpanjarspbcair23 = $this->repmd->gettotalpanjarspbyear('1','2023');
        $totalpanjarspbbelumcair23 = $this->repmd->gettotalpanjarspbyear('!1','2023');
        
		$data = [
			'title' => 'Saldo Segment',
            'saldoinvcair' => $saldoinvcair,
            'saldoinvbelumcair' => $saldoinvbelumcair,
            'totalpanjarspbcair' => $totalpanjarspbcair,
            'totalpanjarspbbelumcair' => $totalpanjarspbbelumcair,

            'saldoinvcair21' => $saldoinvcair21,
            'saldoinvbelumcair21' => $saldoinvbelumcair21,
            'totalpanjarspbcair21' => $totalpanjarspbcair21,
            'totalpanjarspbbelumcair21' => $totalpanjarspbbelumcair21,
            'saldoinvcair22' => $saldoinvcair22,
            'saldoinvbelumcair22' => $saldoinvbelumcair22,
            'totalpanjarspbcair22' => $totalpanjarspbcair22,
            'totalpanjarspbbelumcair22' => $totalpanjarspbbelumcair22,
            'saldoinvcair23' => $saldoinvcair23,
            'saldoinvbelumcair23' => $saldoinvbelumcair23,
            'totalpanjarspbcair23' => $totalpanjarspbcair23,
            'totalpanjarspbbelumcair23' => $totalpanjarspbbelumcair23,

			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/saldosegment/saldosegment_view',$data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function tabungan_segment(){
        if($_POST){
            $post = $_POST;
            $data['drdrepseg'] = $this->repmd->getreportsegmen($post);
            $data['param'] = $post;
            if($post['optTahunSegment'] == 'all'){
                $data['tahun'] = '2019 s/d '.date('Y');
            }else{
                $data['tahun'] = $post['optTahunSegment'];
            }

            $this->load->view('modules/dashboard/ajax_tabungan_segment', $data, FALSE);
        }else{
            echo 'Are you need something.?';
        }

    }
}