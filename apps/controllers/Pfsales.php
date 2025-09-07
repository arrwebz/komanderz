<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pfsales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        self::bindskins();
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }

        $this->load->model('Report_model', 'repmd');
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
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    public function index() {
        $q1lastyear = $this->repmd->getvalnopesq12023();
        $q1thisyear = $this->repmd->getvalnopesq12024();
        $arrayq1 = $this->array_merge_recursive_ex($q1lastyear,$q1thisyear);
		
		//echo '<pre>'; print_r($arrayq1); exit;

        $q2lastyear = $this->repmd->getvalnopesq22023();
        $q2thisyear = $this->repmd->getvalnopesq22024();
        $arrayq2 = $this->array_merge_recursive_ex($q2lastyear, $q2thisyear);

        $q3lastyear = $this->repmd->getvalnopesq32023();
        $q3thisyear = $this->repmd->getvalnopesq32024();
        $arrayq3 = $this->array_merge_recursive_ex($q3lastyear, $q3thisyear);

        $q4lastyear = $this->repmd->getvalnopesq42023();
        $q4thisyear = $this->repmd->getvalnopesq42024();
        $arrayq4 = $this->array_merge_recursive_ex($q4lastyear, $q4thisyear);

        $order_des = array();
        $des_id = 1;
        $total_order_des =  $this->repmd->get_total_order_segment($des_id);
        foreach($total_order_des as $key=>$row) {
            $order_des[$key]['code'] = $row['code'];
            $order_des[$key]['komet'] = $this->repmd->get_total_order_unit($des_id, $row['segment'], 'KOMET');
            $order_des[$key]['mesra'] = $this->repmd->get_total_order_unit($des_id, $row['segment'], 'MESRA');
            $order_des[$key]['padi'] = $this->repmd->get_total_order_unit($des_id, $row['segment'], 'PADI');
        }
		
		$order_dss = array();
        $dss_id = 7;
        $total_order_dss =  $this->repmd->get_total_order_segment($dss_id);
        foreach($total_order_dss as $key=>$row) { 
            $order_dss[$key]['code'] = $row['code'];
            $order_dss[$key]['komet'] = $this->repmd->get_total_order_unit($dss_id, $row['segment'], 'KOMET');
            $order_dss[$key]['mesra'] = $this->repmd->get_total_order_unit($dss_id, $row['segment'], 'MESRA');
            $order_dss[$key]['padi'] = $this->repmd->get_total_order_unit($dss_id, $row['segment'], 'PADI');
        }
		
		$order_dps = array();
        $dps_id = 8;
        $total_order_dps =  $this->repmd->get_total_order_segment($dps_id);
        foreach($total_order_dps as $key=>$row) {
            $order_dps[$key]['code'] = $row['code'];
            $order_dps[$key]['komet'] = $this->repmd->get_total_order_unit($dps_id, $row['segment'], 'KOMET');
            $order_dps[$key]['mesra'] = $this->repmd->get_total_order_unit($dps_id, $row['segment'], 'MESRA');
            $order_dps[$key]['padi'] = $this->repmd->get_total_order_unit($dps_id, $row['segment'], 'PADI');
        }

        $order_dgs = array();
        $dgs_id = 2;
        $total_order_dgs =  $this->repmd->get_total_order_segment($dgs_id);
        foreach($total_order_dgs as $key=>$row) {
            $order_dgs[$key]['code'] = $row['code'];
            $order_dgs[$key]['komet'] = $this->repmd->get_total_order_unit($dgs_id, $row['segment'], 'KOMET');
            $order_dgs[$key]['mesra'] = $this->repmd->get_total_order_unit($dgs_id, $row['segment'], 'MESRA');
            $order_dgs[$key]['padi'] = $this->repmd->get_total_order_unit($dgs_id, $row['segment'], 'PADI');
        }

        $order_sda = array();
        $sda_id = 5;
        $total_order_sda =  $this->repmd->get_total_order_segment($sda_id);
        foreach($total_order_sda as $key=>$row) {
            $order_sda[$key]['code'] = $row['code'];
            $order_sda[$key]['komet'] = $this->repmd->get_total_order_unit($sda_id, $row['segment'], 'KOMET');
            $order_sda[$key]['mesra'] = $this->repmd->get_total_order_unit($sda_id, $row['segment'], 'MESRA');
            $order_sda[$key]['padi'] = $this->repmd->get_total_order_unit($sda_id, $row['segment'], 'PADI');
        }

        $prosorder['year'] = date('Y');
        $order = $this->repmd->getorder($prosorder);
        $prospect = $this->repmd->getprospect($prosorder);

        $arr_month = parserMonth();
        $new_arr_prosorder = array();
        foreach($arr_month as $row){
            for($i=1; $i<=12; $i++){
                if($i == $row['month']){
                    $new_arr_prosorder[$i]['month'] = $row['monthname'];
                    $new_arr_prosorder[$i]['valprospect'] = 0;
                    $new_arr_prosorder[$i]['valorder'] = 0;

                    foreach ($prospect as $rowpros){
                        if($row['monthname'] == $rowpros['month']){
                            $new_arr_prosorder[$i]['month'] = $row['monthname'];
                            $new_arr_prosorder[$i]['valprospect'] = $rowpros['valprospect'];
                        }
                    }
                    foreach ($order as $roworder){
                        if($row['monthname'] == $roworder['month']){
                            $new_arr_prosorder[$i]['month'] = $row['monthname'];
                            $new_arr_prosorder[$i]['valorder'] = $roworder['valorder'];
                        }
                    }
                }
            }
        }
        $new_arr_prosorder = array_values($new_arr_prosorder);;

        $data = [
            'title' => 'Performance Sales',
            'valq1yoy' => json_encode($arrayq1),
            'valq2yoy' => json_encode($arrayq2),
            'valq3yoy' => json_encode($arrayq3),
            'valq4yoy' => json_encode($arrayq4),
            'targetamnz' => json_encode($this->repmd->gettargetam('21')),
            'targetamev' => json_encode($this->repmd->gettargetam('37')),
            'targetamvn' => json_encode($this->repmd->gettargetam('36')),
            'targetamsg' => json_encode($this->repmd->gettargetam('30')),
            'targetsegmentnz' => json_encode($this->repmd->gettargetsegment('21')),
            'targetsegmentev' => json_encode($this->repmd->gettargetsegment('37')),
            'targetsegmentvn' => json_encode($this->repmd->gettargetsegment('36')),
            'targetsegmentsg' => json_encode($this->repmd->gettargetsegment('30')),
            'prospectorder' => json_encode($new_arr_prosorder),
            'order_des' => json_encode($order_des),
            'order_dss' => json_encode($order_dss),
            'order_dps' => json_encode($order_dps),
            'order_dgs' => json_encode($order_dgs),
            'order_sda' => json_encode($order_sda),

            'podes' => json_encode($this->repmd->getprospectorderdes()),
            'podss' => json_encode($this->repmd->getprospectorderdss()),
            'podps' => json_encode($this->repmd->getprospectorderdps()),
            'podgs' => json_encode($this->repmd->getprospectorderdgs()),
            'posda' => json_encode($this->repmd->getprospectordersda()),
            'poebis' => json_encode($this->repmd->getprospectorderebis()),
            'ponon' => json_encode($this->repmd->getprospectordernon()),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
        ];

        $data['content'] = $this->load->view('modules/performance/pf_sales_view',$data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function array_merge_recursive_ex(array $array1, array $array2)
    {
        $merged = $array1;

        foreach ($array2 as $key => & $value) {
            if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
                $merged[$key] = $this->array_merge_recursive_ex($merged[$key], $value);
            } else if (is_numeric($key)) {
                if (!in_array($value, $merged)) {
                    $merged[] = $value;
                }
            } else {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }
}