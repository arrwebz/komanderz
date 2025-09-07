<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Allreport extends CI_Controller {

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
        $this->load->model('Spb_model', 'spbmd');
        $this->load->model('Dropdown_model', 'drdmd');
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
            array($this->config->item('skins_uri').'libs/amcharts4/core.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/charts.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/frozen.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/animated.js'),
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
            array($this->config->item('skins_uri').'libs/jspdf/jspdf.js'),
            array($this->config->item('skins_uri').'libs/dom-to-image/dom-to-image.min.js'),
            array($this->config->item('skins_uri').'libs/sweetalert2/dist/sweetalert2.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
        $get_report = array();

		$data = [
			'title' => 'All Report', 
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
		
		$data['content'] = $this->load->view('modules/dashboard/allreport_view',$data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    public function search(){
        if($_POST){
            $post = $_POST;
            $t['drd'] = $this->repmd->getallreport($post);
            $this->load->view('modules/dashboard/ajax_allreport_view', $t, FALSE);
        }else{
            echo 'Are You Need Something.?';
        }
    }

    public function exportfilter(){
        $txtStartInvdate = $_GET['txtStartInvdate'];
        $txtEndInvdate = $_GET['txtEndInvdate'];
        $strftitle = 'all-report/'.$txtStartInvdate.'-'.$txtEndInvdate;

        $get = $_GET;
        $drd = $this->repmd->prinallreport($get);
        $t['drd'] = $drd;
        for($i=0; $i<count($drd); $i++){ 
            $spb = $this->spbmd->getspbbyinvoice($drd[$i]['orderid']);

            if(trim($drd[$i]['procdat']) != NULL){
                $t['drd'][$i]['tanggalcair'] = 'ada';
                $tgl_cair_now = $drd[$i]['procdat'];
            }else{
                $t['drd'][$i]['tanggalcair'] = 'kosong';
                $tgl_cair_now = date('Y-m-d');
            }

            $tgl1 = date_create("".$tgl_cair_now);

            $t['drd'][$i]['profitshare'] = 0;
            for($j=0; $j<count($spb); $j++){
                $tgl_spb = $spb[$j]['spbdat'];

                $tgl2 = date_create("".$tgl_spb);

                $diff  = date_diff( $tgl2, $tgl1);

                $spb[$j]['now'] = $tgl1;
                $spb[$j]['spbdate'] = $tgl2;
                $spb[$j]['jarak'] = $diff->d;
                $jarak[$j] = $diff->d;
                $spb[$j]['nilaiA'] = ceil($jarak[$j]/30);

                $nilaiA = ceil($jarak[$j]/30);
                $spb[$j]['nilaiB'] = $nilaiA*$spb[$j]['value']*(1.25/100);

                if(count($spb) > 1){
                    $t['drd'][$i]['profitshare'] += floor($spb[$j]['nilaiB']);
                }else{
                    $t['drd'][$i]['profitshare'] = floor($spb[$j]['nilaiB']);
                }
            }

            $t['drd'][$i]['totalvalspb2'] = $spb;
        }
        $t['title'] = $strftitle;

        $this->load->view('modules/dashboard/excel_allreport_view',$t);
    }

    function chartsegmen(){
        $result = array(
            'status' => 'failed',
            'msg' => 'are u missing something?'
        );

        if($_POST){
            $post = $_POST;
            $get_data = $this->repmd->getallreportyear($post);
            if(count($get_data) > 0){
                $t['drd'] = $get_data;
                $t['drd_chart'] = json_encode($get_data);
                $t['segmen'] = $get_data[0]['name_segment'].' '.date('d-m-Y', strtotime($post['txtStartInvdate'])).' s/d '.date('d-m-Y', strtotime($post['txtEndInvdate']));
                $view = $this->load->view('modules/dashboard/chart_allreport_view', $t, TRUE);

                $result = array(
                    'view' => $view,
                    'status' => 'success',
                    'msg' => 'Generated AmChart',
                );
            }else{
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak tersedia'
                );
            }
        }

        echo json_encode($result);
    }

    function chartsegmencair(){
        $result = array(
            'status' => 'failed',
            'msg' => 'are u missing something?'
        );

        if($_POST){
            $post = $_POST;
            $post['optStatinv'] = '1';
            $get_data = $this->repmd->getallreportyear($post);
            if(count($get_data) > 0){
                $t['drd'] = $get_data;
                $t['drd_chart'] = json_encode($get_data);
                $t['segmen'] = $get_data[0]['name_segment'].' '.date('d-m-Y', strtotime($post['txtStartInvdate'])).' s/d '.date('d-m-Y', strtotime($post['txtEndInvdate']));
                $view = $this->load->view('modules/dashboard/chart_segmencair_view', $t, TRUE);

                $result = array(
                    'view' => $view,
                    'status' => 'success',
                    'msg' => 'Generated AmChart',
                );
            }else{
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak tersedia'
                );
            }
        }

        echo json_encode($result);
    }

    function chartsegmenbelumcair(){
        $result = array(
            'status' => 'failed',
            'msg' => 'are u missing something?'
        );

        if($_POST){
            $post = $_POST;
            $post['optStatinv'] = '0';
            $get_data = $this->repmd->getallreportyear($post);
            if(count($get_data) > 0){
                $t['drd'] = $get_data;
                $t['drd_chart'] = json_encode($get_data);
                $t['segmen'] = $get_data[0]['name_segment'].' '.date('d-m-Y', strtotime($post['txtStartInvdate'])).' s/d '.date('d-m-Y', strtotime($post['txtEndInvdate']));
                $view = $this->load->view('modules/dashboard/chart_segmenbelumcair_view', $t, TRUE);

                $result = array(
                    'view' => $view,
                    'status' => 'success',
                    'msg' => 'Generated AmChart',
                );
            }else{
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak tersedia'
                );
            }
        }

        echo json_encode($result);
    }

    function chartsegmenforecast(){
        $result = array(
            'status' => 'failed',
            'msg' => 'are u missing something?'
        );

        if($_POST){
            $post = $_POST;
            $post['optStatinv'] = '10';
            $get_data = $this->repmd->getallreportyear($post);
            if(count($get_data) > 0){
                $t['drd'] = $get_data;
                $t['drd_chart'] = json_encode($get_data);
                $t['segmen'] = $get_data[0]['name_segment'].' '.date('d-m-Y', strtotime($post['txtStartInvdate'])).' s/d '.date('d-m-Y', strtotime($post['txtEndInvdate']));
                $view = $this->load->view('modules/dashboard/chart_segmenforecast_view', $t, TRUE);

                $result = array(
                    'view' => $view,
                    'status' => 'success',
                    'msg' => 'Generated AmChart',
                );
            }else{
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak tersedia'
                );
            }
        }

        echo json_encode($result);
    }

    function chartsegmenkeuangan(){
        $result = array(
            'status' => 'failed',
            'msg' => 'are u missing something?'
        );

        if($_POST){
            $post = $_POST;
            $post['optStatinv'] = '18';
            $get_data = $this->repmd->getallreportyear($post);
            if(count($get_data) > 0){
                $t['drd'] = $get_data;
                $t['drd_chart'] = json_encode($get_data);
                $t['segmen'] = $get_data[0]['name_segment'].' '.date('d-m-Y', strtotime($post['txtStartInvdate'])).' s/d '.date('d-m-Y', strtotime($post['txtEndInvdate']));
                $view = $this->load->view('modules/dashboard/chart_segmenkeuangan_view', $t, TRUE);

                $result = array(
                    'view' => $view,
                    'status' => 'success',
                    'msg' => 'Generated AmChart',
                );
            }else{
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak tersedia'
                );
            }
        }

        echo json_encode($result);
    }

    function chartsegmenposting(){
        $result = array(
            'status' => 'failed',
            'msg' => 'are u missing something?'
        );

        if($_POST){
            $post = $_POST;
            $post['optStatinv'] = '8';
            $get_data = $this->repmd->getallreportyear($post);
            if(count($get_data) > 0){
                $t['drd'] = $get_data;
                $t['drd_chart'] = json_encode($get_data);
                $t['segmen'] = $get_data[0]['name_segment'].' '.date('d-m-Y', strtotime($post['txtStartInvdate'])).' s/d '.date('d-m-Y', strtotime($post['txtEndInvdate']));
                $view = $this->load->view('modules/dashboard/chart_segmenposting_view', $t, TRUE);

                $result = array(
                    'view' => $view,
                    'status' => 'success',
                    'msg' => 'Generated AmChart',
                );
            }else{
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak tersedia'
                );
            }
        }

        echo json_encode($result);
    }

    function chartsegmencoll(){
        $result = array(
            'status' => 'failed',
            'msg' => 'are u missing something?'
        );

        if($_POST){
            $post = $_POST;
            $get_data = $this->repmd->getallreportcoll($post);
            if(count($get_data) > 0){
                $t['drd'] = $get_data;
                $t['drd_chart'] = json_encode($get_data);
                $t['segmen'] = $get_data[0]['name_segment'].' '.date('d-m-Y', strtotime($post['txtStartInvdate'])).' s/d '.date('d-m-Y', strtotime($post['txtEndInvdate']));
                $view = $this->load->view('modules/dashboard/chart_segmencollection_view', $t, TRUE);

                $result = array(
                    'view' => $view,
                    'status' => 'success',
                    'msg' => 'Generated AmChart',
                );
            }else{
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak tersedia'
                );
            }
        }

        echo json_encode($result);
    }

    function alertcoll(){
        $data = array(
            'nopes' => $this->repmd->getallalertnopes(),
            'prpo' => $this->repmd->getallalertprpo(),

			'title' => 'Tracking Komet, Mesra',
			'brand' => 'Tracking Invoice',
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'alertnopes' => $this->repmd->getalertnopes(),
			'alertprpo' => $this->repmd->getalertprpo(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        );

        $data['content'] = $this->load->view('modules/dashboard/alertcoll_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
}