<?php

class Mycurl {

    function curlpost($url, $headers, $data_post) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        if ($headers != '') {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    function curlget($url, $headers='') {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($headers != '') {
            $headers = [
                'X-Apple-Tz: 0',
                'X-Apple-Store-Front: 143444,12',
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Encoding: gzip, deflate',
                'Accept-Language: en-US,en;q=0.5',
                'Cache-Control: no-cache',
                'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
                'Host: www.example.com',
                'Referer: '. base_url() .'',
                'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
                'X-MicrosoftAjax: Delta=true'
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

}