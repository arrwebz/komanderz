<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dbpengurus extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		self::bindskins();
		if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }
		$hlp = [
		    'text',
            'date',
            'terbilang',
        ];
        $this->load->helper($hlp);

        $lib = [
            'form_validation',
            'Mycurl'
        ];
        $this->load->library($lib);
        $this->load->model('Report_model', 'repmd');
		$this->load->model('Treport_model', 'trpmd');
    }

	private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
        );
        $js_head = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
        );
        $js_content  = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
            array($this->config->item('skins_uri').'js/app.min.js'),
            array($this->config->item('skins_uri').'js/app.init.js'),
            array($this->config->item('skins_uri').'libs/bootstrap/dist/js/bootstrap.bundle.min.js'),
            array($this->config->item('skins_uri').'libs/simplebar/dist/simplebar.min.js'),
            array($this->config->item('skins_uri').'libs/datatables.net/js/jquery.dataTables.min.js'),
            array($this->config->item('skins_uri').'js/datatable/datatable-basic.init.js'),
            array($this->config->item('skins_uri').'js/sidebarmenu.js'),
            array($this->config->item('skins_uri').'js/theme.js'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/owl.carousel.min.js'),
            array($this->config->item('skins_uri').'js/widget/ui-card-init.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );
        
        $this->carabiner->group('css_head', array('css'=>$css_head)); 
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
    public function index() {
        $mon = date("Y-m-d", strtotime('monday this week'));
        $tue = date("Y-m-d", strtotime('tuesday this week'));
        $wed = date("Y-m-d", strtotime('wednesday this week'));
        $thu = date("Y-m-d", strtotime('thursday this week'));
        $fri = date("Y-m-d", strtotime('friday this week'));
        $arr_week = array($mon, $tue, $wed, $thu, $fri);
        for($i=0; $i<count($arr_week); $i++){
            $getatt[$i]['tanggal'] = $arr_week[$i];
            $getatt[$i]['absen'] = $this->repmd->getreportattweek($arr_week[$i]);
        }
        $overtimeweekly = $this->repmd->getovertimeweekly();

        /*start panjar, sales, collection by segment*/
        $get_des = $this->repmd->getorderbydivseg('1'); /* DES */
        $get_dgs = $this->repmd->getorderbydivseg('2'); /* DGS */
        $get_non = $this->repmd->getorderbydivseg('3'); /* NON */
        $get_eks = $this->repmd->getorderbydivseg('4'); /* EKS */
        $get_sda = $this->repmd->getorderbydivseg('5'); /* SDA */
        $get_ebis = $this->repmd->getorderbydivseg('6'); /* EBIS */
        $get_dss = $this->repmd->getorderbydivseg('7'); /* DSS */
        $get_dps = $this->repmd->getorderbydivseg('8'); /* DPS */

        $dgs = $get_dgs;
        $dps = $get_dps;
        $dss = $get_dss;
        $sda = $get_sda;
        $non = array_merge($get_non, $get_ebis);
        $eks = $get_eks;
        $des = $get_des;
        /*end panjar, sales, collection by segment*/

        $data = [
            'title' => 'Dashboard Pengurus',
            'brand' => 'KOMET',

            'collpaidyear' => $this->repmd->collpaidyear(),
            'unpaid' => $this->repmd->collunpaid(),
            'totalrev' => $this->repmd->getdashboardtotrev(),
            'totallop' => $this->repmd->gettotalvallop(),
            'valprokop' => $this->repmd->getlastprokop(),
            'attweek' => $getatt,
            'overtimeweekly' => $overtimeweekly,
            'sppdweekly' => $this->repmd->getsppdweekly(),
            'dgs' => $dgs,
            'dps' => $dps,
            'dss' => $dss,
            'sda' => $sda,
            'non' => $non,
            'eks' => $eks,
            'des' => $des,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/dashboard/dbpengurus_view',$data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	function ajaxsaldosegment(){
       $saldoinvcair = $this->repmd->getsaldoinvpanjar('1');
       $saldoinvbelumcair = $this->repmd->getsaldoinvpanjar('!1');
       $totalpanjarspbcair = $this->repmd->gettotalpanjarspb('1');
       $totalpanjarspbbelumcair = $this->repmd->gettotalpanjarspb('!1');
	   
	   $getmember = $this->trpmd->totalactivemember();
	   $getinvestor = $this->repmd->getvalinvestor();
	   
	   $ss = $saldoinvcair[0]['saldoinvpanjar']-$totalpanjarspbcair[0]['totalspbpanjarcair']+$saldoinvbelumcair[0]['saldoinvpanjar']-$totalpanjarspbbelumcair[0]['totalspbpanjarcair'];
	   $memberactive = $getmember[0]['totalsaldo'];
	   $investor = $getinvestor[0]['totalmoney'];
	   
	   $totalhu = $ss+$memberactive+$investor;
	   
	   $res = array(
			'status' => 'success',
			'saldosegment' => strrev(implode('.',str_split(strrev(strval($ss)),3))),
            'memberactive' => strrev(implode('.',str_split(strrev(strval($memberactive)),3))),
            'investor' => strrev(implode('.',str_split(strrev(strval($investor)),3))),
            'totalhu' => strrev(implode('.',str_split(strrev(strval($totalhu)),3))),
	   );
	   echo json_encode($res);
	}

    function checkbot(){
        $post = $this->input->post();
        $url = $this->config->item('api_komet').'kms/bot?apikey=a29tZXQ=';
        $send = $this->mycurl->curlpost($url, '', $post);

        $respon = json_decode($send, true);
        if($respon['status'] == 'success'){
            $data = array(
                'status' => 'success',
                'msg' => 'kms response',
                'data' => $respon['data'],
            );
        }else{
            $data = array(
                'status' => 'failed',
                'msg' => 'kms response',
                'data' => array(),
            );
        }

        echo json_encode($data);
    }

    function chatbot(){
        $post = $this->input->post();
        $url = $this->config->item('api_komet').'kms/chatbot?apikey=a29tZXQ=';
        $post['question'] = str_replace('yg','yang',$post['question']);
        $send = $this->mycurl->curlpost($url, '', $post);

        $respon = json_decode($send, true);
        if($respon['status'] == 'success'){
            $data = array(
                'status' => 'success',
                'msg' => 'kms response',
                'data' => $respon['data'],
            );
        }else{
            $data = array(
                'status' => 'failed',
                'msg' => 'kms response',
                'data' => array(),
            );
        }

        echo json_encode($data);
    }

    function ai(){
        $OPENAI_API_KEY = "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";
        $ch = curl_init();

        $url = 'https://api.openai.com/v1/chat/completions';

        $query = 'saya ingin membuat usaha property, apa saja hal yang perlu saya pelajari';

        $post_fields = array(
            "model" => "gpt-3.5-turbo",
            "messages" => array(
                array(
                    "role" => "user",
                    "content" => $query
                )
            ),
            "max_tokens" => 1000,
            "temperature" => 0.8
        );

        $header  = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $OPENAI_API_KEY
        ];

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_fields));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($result, TRUE);
        echo "<pre>"; print_r($response); echo "</pre>";exit;
    }
}