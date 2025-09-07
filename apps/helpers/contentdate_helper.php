<?php

function month_to_romawi($month){
    $month = strtolower($month);
    if($month == "january"){
        $romawi = "I";
    }else if($month == "february"){
        $romawi = "II";
    }else if($month == "march"){
        $romawi = "III";
    }else if($month == "april"){
        $romawi = "IV";
    }else if($month == "may"){
        $romawi = "V";
    }else if($month == "june"){
        $romawi = "VI";
    }else if($month == "july"){
        $romawi = "VII";
    }else if($month == "august"){
        $romawi = "VIII";
    }else if($month == "september"){
        $romawi = "IX";
    }else if($month == "october"){
        $romawi = "X";
    }else if($month == "november"){
        $romawi = "XI";
    }else if($month == "december"){
        $romawi = "XII";
    }else{
        $romawi = "Undenfined";
    }

    return $romawi;
}

function month_to_romawi_letter($month){
    $month = strtolower($month);
    if($month == "januari"){
        $romawi = "I";
    }else if($month == "februari"){
        $romawi = "II";
    }else if($month == "maret"){
        $romawi = "III";
    }else if($month == "april"){
        $romawi = "IV";
    }else if($month == "mei"){
        $romawi = "V";
    }else if($month == "juni"){
        $romawi = "VI";
    }else if($month == "juli"){
        $romawi = "VII";
    }else if($month == "agustus"){
        $romawi = "VIII";
    }else if($month == "september"){
        $romawi = "IX";
    }else if($month == "oktober"){
        $romawi = "X";
    }else if($month == "november"){
        $romawi = "XI";
    }else if($month == "desember"){
        $romawi = "XII";
    }else{
        $romawi = "Undenfined";
    }

    return $romawi;
}

function romawi_to_month($month){
    if($month == "I"){
        $romawi = "Januari";
    }else if($month == "II"){
        $romawi = "Februari";
    }else if($month == "III"){
        $romawi = "Maret";
    }else if($month == "IV"){
        $romawi = "April";
    }else if($month == "V"){
        $romawi = "Mei";
    }else if($month == "VI"){
        $romawi = "Juni";
    }else if($month == "VII"){
        $romawi = "Juli";
    }else if($month == "VIII"){
        $romawi = "Agustus";
    }else if($month == "IX"){
        $romawi = "September";
    }else if($month == "X"){
        $romawi = "Oktober";
    }else if($month == "XI"){
        $romawi = "November";
    }else if($month == "XII"){
        $romawi = "December";
    }else{
        $romawi = "Undenfined";
    }

    return $romawi;
}

function romawi_to_number($month){
    if($month == "I"){
        $romawi = "01";
    }else if($month == "II"){
        $romawi = "02";
    }else if($month == "III"){
        $romawi = "03";
    }else if($month == "IV"){
        $romawi = "04";
    }else if($month == "V"){
        $romawi = "05";
    }else if($month == "VI"){
        $romawi = "06";
    }else if($month == "VII"){
        $romawi = "07";
    }else if($month == "VIII"){
        $romawi = "08";
    }else if($month == "IX"){
        $romawi = "09";
    }else if($month == "X"){
        $romawi = "10";
    }else if($month == "XI"){
        $romawi = "11";
    }else if($month == "XII"){
        $romawi = "12";
    }else{
        $romawi = "Undenfined";
    }

    return $romawi;
}

function parseDateTime($date){
    $data = array();

    $int = preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/",$date,$match);
    if(!$int){
        return false;
    }

    $data['year'] = $match[1];
    $data['month'] = $match[2];
    $data['day'] = $match[3];
    $data['hour'] = $match[4];
    $data['minute'] = $match[5];
    $data['second'] = $match[6];
    $data['day_of_week'] = date("N",mktime(0,0,0,intval($data['month']),intval($data['day']),intval($data['year'])));
    $data['month_ind_name'] = getIndMonth(intval($data['month']));
    $data['day_ind_name'] = getIndDay($data['day_of_week']);

    return $data;
}

function parseDateTimeEn($date){
    $data = array();

    $int = preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/",$date,$match);
    if(!$int){
        return false;
    }

    $data['year'] = $match[1];
    $data['month'] = $match[2];
    $data['day'] = $match[3];
    $data['hour'] = $match[4];
    $data['minute'] = $match[5];
    $data['second'] = $match[6];
    $data['day_of_week'] = date("N",mktime(0,0,0,intval($data['month']),intval($data['day']),intval($data['year'])));
    $data['month_ind_name'] = getIndMonth(intval($data['month']));
    $data['day_en_name'] = getEnDay($data['day_of_week']);

    return $data;
}

function getIndDay($int = "1"){
    switch($int){
        case "7":
            $strDay = "Minggu";
            break;
        case "6":
            $strDay = "Sabtu";
            break;
        case "5":
            $strDay = "Jum'at";
            break;
        case "4":
            $strDay = "Kamis";
            break;
        case "3":
            $strDay = "Rabu";
            break;
        case "2":
            $strDay = "Selasa";
            break;
        case "1":
        default:
            $strDay = "Senin";
            break;
    }
    return $strDay;
}

function getEnDay($int = "1"){
    switch($int){
        case "7":
            $strDay = "Sunday";
            break;
        case "6":
            $strDay = "Saturday";
            break;
        case "5":
            $strDay = "Friday";
            break;
        case "4":
            $strDay = "Thursday";
            break;
        case "3":
            $strDay = "Wednesday";
            break;
        case "2":
            $strDay = "Tuesday";
            break;
        case "1":
        default:
            $strDay = "Monday";
            break;
    }
    return $strDay;
}

function getIndMonth($int = 1){
    $data[1] = "Januari";
    $data[2] = "Februari";
    $data[3] = "Maret";
    $data[4] = "April";
    $data[5] = "Mei";
    $data[6] = "Juni";
    $data[7] = "Juli";
    $data[8] = "Agustus";
    $data[9] = "September";
    $data[10] = "Oktober";
    $data[11] = "November";
    $data[12] = "Desember";
    $intint = intval($int);
    if($intint <= 12 && $intint >= 1) return $data[$intint];
    else return false;
}

function customDate($date = null){
    $parse = parseDateTime($date);
    return $parse['day_ind_name'] . ", " . $parse['day'] . " " . $parse['month_ind_name'] . " " . $parse['year'];
}
function customDateEn($date = null){
    $parse = parseDateTimeEn($date);
    return $parse['day_en_name'] . ", " . $parse['day'] . " " . $parse['month_ind_name'] . " " . $parse['year'];
}
function onlydate($date = null){
    $parse = parseDateTime($date.' 00:00:00');
    return $parse['day'] . " " . $parse['month_ind_name'] . " " . $parse['year'];
}
function monthyear($date = null){
    $parse = parseDateTime($date.' 00:00:00');
    return $parse['month_ind_name'] . " " . $parse['year'];
}

function parserMonth(){
    $arr_month = array(
        array(
            'month' => '1',
            'monthname' => 'January',
        ),
        array(
            'month' => '2',
            'monthname' => 'February',
        ),
        array(
            'month' => '3',
            'monthname' => 'March',
        ),
        array(
            'month' => '4',
            'monthname' => 'April',
        ),
        array(
            'month' => '5',
            'monthname' => 'May',
        ),
        array(
            'month' => '6',
            'monthname' => 'June',
        ),
        array(
            'month' => '7',
            'monthname' => 'July',
        ),
        array(
            'month' => '8',
            'monthname' => 'August',
        ),
        array(
            'month' => '9',
            'monthname' => 'September',
        ),
        array(
            'month' => '10',
            'monthname' => 'October',
        ),
        array(
            'month' => '11',
            'monthname' => 'November',
        ),
        array(
            'month' => '12',
            'monthname' => 'December',
        )
    );
    return $arr_month;
}

function datediff($date1, $date2){
    $tgl1 = new DateTime($date1);
    $tgl2 = new DateTime($date2);
    $jarak = $tgl2->diff($tgl1);

    $date = '';
    if($jarak->y > 0){
        $date .= $jarak->y.' Tahun ';
    }
    if($jarak->m > 0){
        $date .= $jarak->m.' Bulan ';
    }
    if($jarak->d > 0){
        $date .= $jarak->d.' Hari ';
    }

    return $date;
}

function time_difference($date){
    if(!empty($date)){
        $time = strtotime($date);
        $seconds = (int) (time() - $time);
        $how_many = null;
        $of_what = null;

        // less than 1 minute
        if($seconds <= 60){
            $how_many = 1;
            $of_what = "minutes ago";
            // between one minute and one hour
        }elseif($seconds > 60 && $seconds < 3600){
            $how_many = floor($seconds / 60);
            if($how_many == 1){
                $of_what = "minutes ago";
            }else{
                $of_what = "minutes ago";
            }
            // between one hour and 24 hours
        }elseif($seconds > 3600 && $seconds < 86400){
            $how_many = floor($seconds / 3600);
            if($how_many == 1){
                $of_what = "hours ago";
            }else{
                $of_what = "hours ago";
            }
            // between 1 day and 1 week (7 days)
        }elseif($seconds > 86400 && $seconds < 604800){
            $how_many = floor($seconds / 86400);
            if($how_many == 1){
                $of_what = "days ago";
            }else{
                $of_what = "days ago";
            }
            // betwen 1 week and 1 month approximately
            // taking there are 31,556,926 seconds in a year
            // divided by 12 months
        }elseif($seconds > 604800 && $seconds < 2629743){
            $how_many = floor($seconds / 604800);
            if($how_many == 1){
                $of_what = "last week";
            }else{
                $of_what = "last week";
            }
            // betwen 1 month and 1 year (24 months)
        }elseif($seconds > 2629743 && $seconds < 31556926){
            $how_many = floor($seconds / 2629743);
            if($how_many == 1){
                $of_what = "last month";
            }else{
                $of_what = "last month";
            }
            // from 1 year upwards
        }elseif($seconds > 31556926){
            $how_many = floor($seconds / 31556926);
            if($how_many == 1){
                $of_what = "last year";
            }else{
                $of_what = "last year";
            }
        }else{
            $how_many = '';
            $of_what = "some time ago";
        }

        return $how_many . ' ' . $of_what;
    }

    function DateToIndo($date) {
        $BulanIndo = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);

        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] ;
        return($result);
    }
}