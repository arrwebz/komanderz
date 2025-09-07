<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Offday extends CI_Controller
{
	public $intoffdayid;
	public $strname;
	public $strdate;

    public function __construct()
    {
        parent::__construct();
		self::bindskins();
		if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }
		$hlp = [
            'form',
            'date'
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation'
        ];
        $this->load->library($lib);
        $this->load->model('offday_model', 'offdmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
            array($this->config->item('skins_uri').'libs/fullcalendar/fullcalendar.css'),
        );
        $js_head = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
            array('https://kms.kopegtel-metropolitan.co.id/public/assets/bower_components/jquery-ui/jquery-ui.min.js'),
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
            array($this->config->item('skins_uri').'libs/moment-js/moments.js'),
            array($this->config->item('skins_uri').'libs/fullcalendar/fullcalendar.js'),
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
	public function index() {
        $offday = $this->offdmd->getalloffday();
        $offdayyear = $this->offdmd->getalloffdayyear(date('Y'));

        $drd = array();
        if(count($offday) > 0){
            foreach ($offday as $key => $row){
                $name = str_replace("'","",$row['name']);
                $drd[$key]['id'] = $row['offdayid'];
                $drd[$key]['title'] = $name;
                $drd[$key]['description'] = $name;
                $drd[$key]['start'] = $row['date'];
                $drd[$key]['end'] = $row['date'];
                $drd[$key]['color'] = '#DD4B39';
            }
        }

		$data = [  
			'drd' => $drd,
			'offdayyear' => $offdayyear,
			'title' => 'Hari Libur',
			'brand' => 'Data Hari Libur',
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate'),
			'location' => $this->session->userdata('location')
		];

		$data['content'] = $this->load->view('modules/offday/offday_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function ajaxaddevent(){
        $post = $this->input->post();

        if($post){
            $this->offdmd->strname = trim(addslashes($post['name']));
            $this->offdmd->strdate = $post['date'];

            $this->offdmd->addoffday();

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
            $detail = $this->offdmd->getsingleoffday($id);

            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['detail'] = $detail[0];
                $view = $this->load->view('modules/offday/editoffday_view', $data, TRUE);

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

    function ajaxeditevent(){
        $post = $this->input->post();

        if($post){
            $this->offdmd->intoffdayid = $post['offdayid'];
            $this->offdmd->strname = trim(addslashes($post['name']));
            $this->offdmd->strdate = $post['date'];

            $this->offdmd->editoffday();

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
            $this->offdmd->intoffdayid = $id;

            $this->offdmd->delete();

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
}	