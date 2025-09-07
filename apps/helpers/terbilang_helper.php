<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Terbilang Helper
 *
 * @package CodeIgniter
 * @subpackage  Helpers
 * @category    Helpers
 * @author  Gede Lumbung
 * @link    https://arrwebz.id
 */
if ( ! function_exists('number_to_words'))
{
    function number_to_words($number)
    {
        $before_comma = trim(to_word($number));
        //$after_comma = trim(comma($number));
        return ucwords($results = $before_comma.' rupiah ');
    }

    function to_word($number)
    {
        $words = "";
        $arr_number = array(
        "",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan",
        "sepuluh",
        "sebelas");

        if($number<12)
        {
            $words = " ".$arr_number[$number];
        }
        else if($number<20)
        {
            $words = to_word($number-10)." belas ";
        }
        else if($number<100)
        {
            $words = to_word($number/10)." puluh ".to_word($number%10);
        }
        else if($number<200)
        {
            $words = "seratus ".to_word($number-100);
        }
        else if($number<1000)
        {
            $words = to_word($number/100)." ratus ".to_word($number%100);
        }
        else if($number<2000)
        {
            $words = "seribu ".to_word($number-1000);
        }
        else if($number<1000000)
        {
            $words = to_word($number/1000)." ribu ".to_word($number%1000);
        }
        else if($number<1000000000)
        {
            $words = to_word($number/1000000)." juta ".to_word($number%1000000);
        }
        else if($number<1000000000000)
        {
            $words = to_word($number/1000000000)." miliar ".to_word($number%1000000000);
        }
        else
        {
            $words = "undefined";
        }
        return $words;
    }

    function comma($number)
    {
        $after_comma = stristr($number,',');
        $arr_number = array(
        "nol",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan");
        $results = "";
        $length = strlen($after_comma);
        $i = 1;
        while($i<$length)
        {
            $get = substr($after_comma,$i,1);
            $results .= " ".$arr_number[$get];
            $i++;
        }
        return $results;
    }

    function convert_huruf($angka){
        $angka = strtolower($angka);
        if($angka == "1"){
            $huruf = "Satu";
        }else if($angka == "2"){
            $huruf = "Dua";
        }else if($angka == "3"){
            $huruf = "Tiga";
        }else if($angka == "4"){
            $huruf = "Empat";
        }else if($angka == "5"){
            $huruf = "Lima";
        }else if($angka == "6"){
            $huruf = "Enam";
        }else if($angka == "7"){
            $huruf = "Tujuh";
        }else if($angka == "8"){
            $huruf = "Delapan";
        }else if($angka == "9"){
            $huruf = "Sembilan";
        }else if($angka == "10"){
            $huruf = "Sepuluh";
        }else if($angka == "11"){
            $huruf = "Sebelas";
        }else if($angka == "12"){
            $huruf = "Dua Belas";
        }else{
            $huruf = "Undenfined";
        }

        return $huruf;
    }

    function formatrev($n){
        if(!is_numeric($n)) return false;

        // now filter it;
        if($n>1000000000000) return round(($n/1000000000000),1).' T';
        else if($n>1000000000) return round(($n/1000000000),1).' M';
        else if($n>1000000) return round(($n/1000000),1).' JT';
        else if($n>1000) return round(($n/1000),1).' K';

        /*if($n>1000000000000) return sprintf("%0.2f", ($n/1000000000000)).' T';
        else if($n>1000000000) return sprintf("%0.2f", ($n/1000000000)).' M';
        else if($n>1000000) return sprintf("%0.2f", ($n/1000000)).' JT';
        else if($n>1000) return sprintf("%0.2f", ($n/1000)).' K';*/

        return number_format($n);
    }
}
