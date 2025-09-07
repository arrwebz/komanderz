<?php

function showAlert(){
    $CI = & get_instance();
    if(!empty($CI->session->flashdata('msg'))){
        echo $CI->session->flashdata('msg');
        unset($_SESSION['__ci_vars']);
    }
}

function formatRomawi($num){
    if($num == '1'){
        $data = 'I';
    }elseif($num == '2'){
        $data = 'II';
    }elseif($num == '3'){
        $data = 'III';
    }elseif($num == '4'){
        $data = 'IV';
    }elseif($num == '5'){
        $data = 'V';
    }elseif($num == '6'){
        $data = 'VI';
    }else{
        $data = '';
    }

    return $data;
}

function monthNumber($month){
    $month = trim(strtolower($month));
    if($month == 'januari'){
        $data = '01';
    }elseif($month == 'februari'){
        $data = '02';
    }elseif($month == 'maret'){
        $data = '03';
    }elseif($month == 'april'){
        $data = '04';
    }elseif($month == 'mei'){
        $data = '05';
    }elseif($month == 'juni'){
        $data = '06';
    }elseif($month == 'juli'){
        $data = '07';
    }elseif($month == 'agustus'){
        $data = '08';
    }elseif($month == 'september'){
        $data = '09';
    }elseif($month == 'oktober'){
        $data = '10';
    }elseif($month == 'november'){
        $data = '11';
    }elseif($month == 'desember'){
        $data = '12';
    }else{
        $data = 'failed';
    }

    return $data;
}

function curquarter(){
    $curMonth = date("m", time());
    $curQuarter = ceil($curMonth/3);

    return $curQuarter;
}

function monthquearter($quarter){
    if($quarter == 1){
        $month = array(
            '0' => array(
                'month' => '01',
                'monthname' => 'Januari',
            ),
            '1' => array(
                'month' => '02',
                'monthname' => 'Februari',
            ),
            '2' => array(
                'month' => '03',
                'monthname' => 'Maret',
            ),
        );
    }elseif($quarter == 2){
        $month = array(
            '0' => array(
                'month' => '04',
                'monthname' => 'April',
            ),
            '1' => array(
                'month' => '05',
                'monthname' => 'Mei',
            ),
            '2' => array(
                'month' => '06',
                'monthname' => 'Juni',
            ),
        );
    }elseif($quarter == 3){
        $month = array(
            '0' => array(
                'month' => '07',
                'monthname' => 'Juli',
            ),
            '1' => array(
                'month' => '08',
                'monthname' => 'Agustus',
            ),
            '2' => array(
                'month' => '09',
                'monthname' => 'September',
            ),
        );
    }elseif($quarter == 4){
        $month = array(
            '0' => array(
                'month' => '10',
                'monthname' => 'Oktober',
            ),
            '1' => array(
                'month' => '11',
                'monthname' => 'November',
            ),
            '2' => array(
                'month' => '12',
                'monthname' => 'Desember',
            ),
        );
    }else{
        $month = array(
            '0' => array(
                'month' => '01',
                'monthname' => 'Januari',
            ),
            '1' => array(
                'month' => '02',
                'monthname' => 'Februari',
            ),
            '2' => array(
                'month' => '03',
                'monthname' => 'Maret',
            ),
        );
    }

    return $month;
}

function extractmonth(){
    $month = array(
        '0' => array(
            'month' => '01',
            'monthname' => 'Januari',
        ),
        '1' => array(
            'month' => '02',
            'monthname' => 'Februari',
        ),
        '2' => array(
            'month' => '03',
            'monthname' => 'Maret',
        ),
        '3' => array(
            'month' => '04',
            'monthname' => 'April',
        ),
        '4' => array(
            'month' => '05',
            'monthname' => 'Mei',
        ),
        '5' => array(
            'month' => '06',
            'monthname' => 'Juni',
        ),
        '6' => array(
            'month' => '07',
            'monthname' => 'Juli',
        ),
        '7' => array(
            'month' => '08',
            'monthname' => 'Agustus',
        ),
        '8' => array(
            'month' => '09',
            'monthname' => 'September',
        ),
        '9' => array(
            'month' => '10',
            'monthname' => 'Oktober',
        ),
        '10' => array(
            'month' => '11',
            'monthname' => 'November',
        ),
        '11' => array(
            'month' => '12',
            'monthname' => 'Desember',
        ),
    );
    return $month;
}

function listam(){
    $data = array(
        'Isnanza Zulkarnaini','Sigit Hidayatullah','Vania Miranda Putri','Eva Ayu Komala', 'Muhammad Sihi Bartono Putro', 'Fahrur Rozi', 'Arrie Wicaksono'
    );

    return $data;
}

function listsupportam(){
    $data = array(
        'Muhamad Sihi Bartono Putro','Hunafa Safalina Az-Zahra Sentosa'
    );

    return $data;
}

function listaccorder(){
    $data = array(
        'Muhamad Sihi Bartono Putro','Hunafa Safalina Az-Zahra Sentosa'
    );

    return $data;
}

function amid($name){
    $data = array(
        'Isnanza Zulkarnaini' => '21',
        'Sigit Hidayatullah' => '30',
        'Vania Miranda Putri' => '36',
        'Eva Ayu Komala' => '37',
        'Super Admin' => '1',
    );

    return $data[$name];
}