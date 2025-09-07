<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pfcoll extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        self::bindskins();
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }

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
            array($this->config->item('skins_uri').'libs/amcharts4/core.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/charts.js'),
            array($this->config->item('skins_uri').'libs/amcharts4/themes/kelly.js'),
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
        $collamdgsnanza = $this->repmd->getcollinamodr("'Isnanza Zulkarnaini','Iman Suryana'","2");
        $collamdeseva = $this->repmd->getcollinamodr("'Eva Ayu Komala','Budi Riyanto'","1");
        $collamdesvania = $this->repmd->getcollinamodr("'Vania Miranda Putri','Muhammad Luthfi'","1");
        $collamsdasigit = $this->repmd->getcollinamodr("'Sigit Hidayatullah','Iman Suryana'","'5','6'");

        $collamdgsnanzaobl = $this->repmd->getcollinamobl("'Isnanza Zulkarnaini','Iman Suryana'","2");
        $collamdesevaobl = $this->repmd->getcollinamobl("'Eva Ayu Komala','Budi Riyanto'","1");
        $collamdesvaniaobl = $this->repmd->getcollinamobl("'Vania Miranda Putri','Muhammad Luthfi'","1");
        $collamsdasigitobl = $this->repmd->getcollinamobl("'Sigit Hidayatullah','Iman Suryana'","'5','6'");

        $data = [
            'title' => 'Performance Collection',
            'segment' => $this->drdmd->getallseg(),
			'allinv' => json_encode($this->repmd->getdashboardallinv()),
            'collectionpostingforecasting' => json_encode($this->repmd->getnewcollectionpostingforecasting()),
            'collpostfor' => $this->repmd->getnewcollectionpostingforecasting(), 
			'collectionpaidunpaid' => json_encode($this->repmd->getnewcollectionpaidunpaid()),
            'collectionreceivepaidunpaid' => json_encode($this->repmd->getnewcollectionreceivepaidunpaid()),
            'getarbyday' => json_encode($this->repmd->getarbyday()),
            'collyear' => $this->repmd->getcollectionyear(),

            'collamdgsnanza' => $collamdgsnanza,
            'collamdeseva' => $collamdeseva,
            'collamdesvania' => $collamdesvania,
            'collamsdasigit' => $collamsdasigit,

            'collamdgsnanzaobl' => $collamdgsnanzaobl,
            'collamdesevaobl' => $collamdesevaobl,
            'collamdesvaniaobl' => $collamdesvaniaobl,
            'collamsdasigitobl' => $collamsdasigitobl,

            'userid' => $this->session->userdata('userid'), 
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
        ];

        $data['content'] = $this->load->view('modules/performance/pf_coll_view',$data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function searchcoll(){
        if($_POST){
            $post = $_POST;
            $t['drd'] = $this->repmd->getcollectionpaid($post);
            $this->load->view('modules/performance/pf_coll_ajax_view', $t, FALSE);
        }else{
            echo 'Are You Need Something.?';
        }
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