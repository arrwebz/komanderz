<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

    function convertcodeorder(){
        $sql = "SELECT orderid, code FROM tb_order WHERE code LIKE '%PPD%'";
        $query = $this->db->query($sql);
        $data_ppd = $query->result_array();


        for($i=0; $i<count($data_ppd); $i++){
            $exp = explode("/",$data_ppd[$i]['code']);
            if(count($exp) > 3){
                $data_ppd[$i]['orderid'] = $data_ppd[$i]['orderid'];
                $data_ppd[$i]['code'] = $data_ppd[$i]['code'];
                $data_ppd[$i]['newcode'] = str_replace('/PPD/','/KPD/',$data_ppd[$i]['code']);

                $update = "UPDATE tb_order SET code = '". $data_ppd[$i]['newcode'] ."' WHERE orderid = '". $data_ppd[$i]['orderid'] ."'";
                $this->db->query($update);
            }
        }

        echo "<pre>"; print_r($data_ppd); echo "</pre>";exit;
    }
}
