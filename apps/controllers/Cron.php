<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cron extends CI_Controller {

    function __construct(){
        parent::__construct();

		$this->load->model('Spb_model', 'spbmd');
    }

    function index(){
        echo 'cron pages';
    }
	
    function wareguler() {
        $userkey = 'e93a2cba10a1';
        $passkey = '5a599db4ace055e5b22f4dcd';
        $telepon = '081311267110';
        $message = 'Hi Komet, layanan software Anda akan berakhir pada Selasa, 17 Mei 2023 sebesar Rp. XXXXX. Mohon segera memberitahukan kepada admin Komanders. Terima kasih.';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);

        echo "<pre>"; print_r($results); echo "</pre>";exit;
    }

    function waofficial(){
        $userkey = 'e93a2cba10a1';
        $passkey = '5a599db4ace055e5b22f4dcd';
        $telepon = '081311267110';
        $my_brand = 'KOMET';
        $otp_code = '123456';
        $url = 'https://console.zenziva.net/waofficial/api/sendWAOfficial/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'brand' => $my_brand,
            'otp' => $otp_code
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);

        echo "<pre>"; print_r($results); echo "</pre>";exit;
    }

}