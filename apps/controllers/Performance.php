<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Performance extends CI_Controller
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
            array($this->config->item('skins_uri').'bower_components/bootstrap/dist/css/bootstrap.min.css'),
            array($this->config->item('skins_uri').'bower_components/font-awesome/css/font-awesome.min.css'),
            array($this->config->item('skins_uri').'bower_components/Ionicons/css/ionicons.min.css'),
            array($this->config->item('skins_uri').'bower_components/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'dist/css/AdminLTE.min.css'),
            array($this->config->item('skins_uri').'dist/css/skins/_all-skins.min.css'),
            array($this->config->item('skins_uri').'bower_components/morris.js/morris.css'),
            array($this->config->item('skins_uri').'bower_components/jvectormap/jquery-jvectormap.css'),
            array($this->config->item('skins_uri').'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'),
            array($this->config->item('skins_uri').'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'),
            array($this->config->item('skins_uri').'bower_components/bootstrap-daterangepicker/daterangepicker.css'),
            array($this->config->item('skins_uri').'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'),
            array($this->config->item('skins_uri').'plugins/pace/pace.min.css'),
            array('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')

        );
        $js_head = array(
            array($this->config->item('skins_uri').'bower_components/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'bower_components/jquery-ui/jquery-ui.min.js'),
            array($this->config->item('skins_uri').'bower_components/bootstrap/dist/js/bootstrap.min.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/core.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/charts.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/themes/kelly.js'),
            array($this->config->item('skins_uri').'bower_components/amcharts4/themes/animated.js'),
            array($this->config->item('skins_uri').'bower_components/PACE/pace.min.js')
        );
        $js_content  = array(
            array($this->config->item('skins_uri').'bower_components/datatables.net/js/jquery.dataTables.min.js'),
            array($this->config->item('skins_uri').'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'),
            array($this->config->item('skins_uri').'bower_components/select2/dist/js/select2.full.min.js'),
            array($this->config->item('skins_uri').'bower_components/raphael/raphael.min.js'),
            array($this->config->item('skins_uri').'bower_components/morris.js/morris.min.js'),
            array($this->config->item('skins_uri').'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'),
            array($this->config->item('skins_uri').'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'),
            array($this->config->item('skins_uri').'plugins/jvectormap/jquery-jvectormap-world-mill-en.js'),
            array($this->config->item('skins_uri').'bower_components/jquery-knob/dist/jquery.knob.min.js'),
            array($this->config->item('skins_uri').'bower_components/moment/min/moment.min.js'),
            array($this->config->item('skins_uri').'bower_components/bootstrap-daterangepicker/daterangepicker.js'),
            array($this->config->item('skins_uri').'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'),
            array($this->config->item('skins_uri').'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'),
            array($this->config->item('skins_uri').'bower_components/jquery-slimscroll/jquery.slimscroll.min.js'),
            array($this->config->item('skins_uri').'bower_components/chart.js/Chart.js'),
            array($this->config->item('skins_uri').'bower_components/fastclick/lib/fastclick.js'),
            array($this->config->item('skins_uri').'dist/js/adminlte.min.js'),
            array($this->config->item('skins_uri').'dist/js/demo.js'),
            array('https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    public function index() {
        $q1lastyear = $this->repmd->getvalnopesq12021();
        $q1thisyear = $this->repmd->getvalnopesq12022();
        $arrayq1 = $this->array_merge_recursive_ex($q1lastyear,$q1thisyear);

        $q2lastyear = $this->repmd->getvalnopesq22021();
        $q2thisyear = $this->repmd->getvalnopesq22022();
        $arrayq2 = $this->array_merge_recursive_ex($q2lastyear, $q2thisyear);

        $q3lastyear = $this->repmd->getvalnopesq32021();
        $q3thisyear = $this->repmd->getvalnopesq32022();
        $arrayq3 = $this->array_merge_recursive_ex($q3lastyear, $q3thisyear);

        $q4lastyear = $this->repmd->getvalnopesq42021();
        $q4thisyear = $this->repmd->getvalnopesq42022();
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

        $data = [
            'title' => 'Performance',
            'valq1yoy' => json_encode($arrayq1),
            'valq2yoy' => json_encode($arrayq2),
            'valq3yoy' => json_encode($arrayq3),
            'valq4yoy' => json_encode($arrayq4),
            'divisionyoy' => json_encode($this->repmd->getvalnopesyoydivision('')),
            'targetamnz' => json_encode($this->repmd->gettargetam('21')),
            'targetamev' => json_encode($this->repmd->gettargetam('37')),
            'targetamvn' => json_encode($this->repmd->gettargetam('36')),
            'targetamsg' => json_encode($this->repmd->gettargetam('30')),
            'targetsegmentnz' => json_encode($this->repmd->gettargetsegment('21')),
            'targetsegmentev' => json_encode($this->repmd->gettargetsegment('37')),
            'targetsegmentvn' => json_encode($this->repmd->gettargetsegment('36')),
            'targetsegmentsg' => json_encode($this->repmd->gettargetsegment('30')),
            'collpostfor' => $this->repmd->getnewcollectionpostingforecasting(),
            'order_des' => json_encode($order_des),
            'order_dgs' => json_encode($order_dgs),
            'order_sda' => json_encode($order_sda),

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/performance/performance_view',$data, TRUE);
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