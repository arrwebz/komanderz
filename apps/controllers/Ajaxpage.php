<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajaxpage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }

		$this->load->model('Report_model', 'repmd');
		$this->load->model('User_model', 'usermd');
    }
	
    public function index() {
        $result = array('success' => 0,'error' => 1,'data' => array('message' => 'are u need something?'));
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    function countlabel(){
        $data = array(
            'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'tnp' => $this->repmd->countnopespadi(),
			'tpp' => $this->repmd->countprpopadi(),
			'tsp' => $this->repmd->countspbpadi(),
        );

        echo json_encode($data);
    }

    function savethememode(){
        $res = array(
            'status' => 'failed',
            'msg' => 'are you need something?',
        );

        if($_POST){
            $userid = $this->session->userdata("userid");
            $mode = $_POST['mode'];

            /* update db */
            $this->usermd->updatethememode($userid, $mode);

            /* update session */
            $this->session->set_userdata('thememode', $mode);

            $res = array(
                'status' => 'success',
                'msg' => 'updated',
            );
        }

        echo json_encode($res);
    }
}