<?php defined('BASEPATH') or exit('No direct script access allowed');

class empreport_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function actionplan() {
        $date = date('Y-m-d');
        $dayofweek = date('w', strtotime($date));
        $senin = date('Y-m-d', strtotime((1 - $dayofweek).' day', strtotime($date)));
        $selasa = date('Y-m-d', strtotime((2 - $dayofweek).' day', strtotime($date)));
        $rabu = date('Y-m-d', strtotime((3 - $dayofweek).' day', strtotime($date)));
        $kamis = date('Y-m-d', strtotime((4 - $dayofweek).' day', strtotime($date)));
        $jumat = date('Y-m-d', strtotime((5 - $dayofweek).' day', strtotime($date)));

        $sql = "
            SELECT 
                a.userid, a.fullname,
                CASE WHEN b.datesenin IS NULL THEN CONCAT('CUTI - ', g.onsenin) else b.datesenin end AS datesenin,
                CASE WHEN b.statussenin IS NULL THEN CONCAT('CUTI - ', g.onsenin) else b.statussenin end AS statussenin,
                CASE WHEN b.healthsenin IS NULL THEN CONCAT('CUTI - ', g.onsenin) else b.healthsenin end AS healthsenin,
                CASE WHEN b.notesenin IS NULL THEN CONCAT('CUTI - ', g.onsenin) else b.notesenin end AS notesenin,
                
                CASE WHEN c.dateselasa IS NULL THEN CONCAT('CUTI - ', h.onselasa) else c.dateselasa end AS dateselasa,
                CASE WHEN c.statusselasa IS NULL THEN CONCAT('CUTI - ', h.onselasa) else c.statusselasa end AS statusselasa,
                CASE WHEN c.healthselasa IS NULL THEN CONCAT('CUTI - ', h.onselasa) else c.healthselasa end AS healthselasa,
                CASE WHEN c.noteselasa IS NULL THEN CONCAT('CUTI - ', h.onselasa) else c.noteselasa end AS noteselasa,
                
                CASE WHEN d.daterabu IS NULL THEN CONCAT('CUTI - ', i.onrabu) else d.daterabu end AS daterabu,
                CASE WHEN d.statusrabu IS NULL THEN CONCAT('CUTI - ', i.onrabu) else d.statusrabu end AS statusrabu,
                CASE WHEN d.healthrabu IS NULL THEN CONCAT('CUTI - ', i.onrabu) else d.healthrabu end AS healthrabu,
                CASE WHEN d.noterabu IS NULL THEN CONCAT('CUTI - ', i.onrabu) else d.noterabu end AS noterabu,
                
                CASE WHEN e.datekamis IS NULL THEN CONCAT('CUTI - ', j.onkamis) else e.datekamis end AS datekamis,
                CASE WHEN e.statuskamis IS NULL THEN CONCAT('CUTI - ', j.onkamis) else e.statuskamis end AS statuskamis,
                CASE WHEN e.healthkamis IS NULL THEN CONCAT('CUTI - ', j.onkamis) else e.healthkamis end AS healthkamis,
                CASE WHEN e.notekamis IS NULL THEN CONCAT('CUTI - ', j.onkamis) else e.notekamis end AS notekamis,
                
                CASE WHEN f.datejumat IS NULL THEN CONCAT('CUTI - ', k.onjumat) else f.datejumat end AS datejumat,
                CASE WHEN f.statusjumat IS NULL THEN CONCAT('CUTI - ', k.onjumat) else f.statusjumat end AS statusjumat,
                CASE WHEN f.healthjumat IS NULL THEN CONCAT('CUTI - ', k.onjumat) else f.healthjumat end AS healthjumat,
                CASE WHEN f.notejumat IS NULL THEN CONCAT('CUTI - ', k.onjumat) else f.notejumat end AS notejumat
            FROM 
                tb_user a
                LEFT JOIN (
                    SELECT 
                        userid, time(datetime) AS datesenin, status AS statussenin, health AS healthsenin, notes AS notesenin
                    FROM tb_attendances WHERE DATE(datetime) = '". $senin ."'
                ) b ON b.userid = a.userid
                LEFT JOIN (
                    SELECT 
                        userid, time(datetime) AS dateselasa, status AS statusselasa, health AS healthselasa, notes AS noteselasa
                    FROM tb_attendances WHERE DATE(datetime) = '". $selasa ."'
                ) c ON c.userid = a.userid
                LEFT JOIN (
                    SELECT 
                        userid, time(datetime) AS daterabu, status AS statusrabu, health AS healthrabu, notes AS noterabu
                    FROM tb_attendances WHERE DATE(datetime) = '". $rabu ."'
                ) d ON d.userid = a.userid
                LEFT JOIN (
                    SELECT 
                        userid, time(datetime) AS datekamis, status AS statuskamis, health AS healthkamis, notes AS notekamis
                    FROM tb_attendances WHERE DATE(datetime) = '". $kamis ."'
                ) e ON e.userid = a.userid
                LEFT JOIN (
                    SELECT 
                        userid, time(datetime) AS datejumat, status AS statusjumat, health AS healthjumat, notes AS notejumat
                    FROM tb_attendances WHERE DATE(datetime) = '". $jumat ."'
                ) f ON f.userid = a.userid
                
                LEFT JOIN (
                    SELECT 
                        userid, sdate AS dcsenin, offstatus AS ossenin, offnotes AS onsenin
                    FROM tb_offwork WHERE DATE(sdate) =  '". $senin ."'
                ) g ON g.userid = a.userid
                LEFT JOIN (
                    SELECT 
                        userid, sdate AS dcselasa, offstatus AS osselasa, offnotes AS onselasa
                    FROM tb_offwork WHERE DATE(sdate) =  '". $selasa ."'
                ) h ON h.userid = a.userid
                LEFT JOIN (
                    SELECT 
                        userid, sdate AS dcrabu, offstatus AS osrabu, offnotes AS onrabu
                    FROM tb_offwork WHERE DATE(sdate) =  '". $rabu ."'
                ) i ON i.userid = a.userid
                LEFT JOIN (
                    SELECT 
                        userid, sdate AS dckamis, offstatus AS oskamis, offnotes AS onkamis
                    FROM tb_offwork WHERE DATE(sdate) =  '". $kamis ."'
                ) j ON j.userid = a.userid
                LEFT JOIN (
                    SELECT 
                        userid, sdate AS dcjumat, offstatus AS osjumat, offnotes AS onjumat
                    FROM tb_offwork WHERE DATE(sdate) =  '". $jumat ."'
                ) k ON k.userid = a.userid
            WHERE 
                a.status = '1' 
                AND (a.roleid IN (4,5,6,8) OR a.userid = 8) 
            GROUP BY b.userid
            ORDER BY 
                a.fullname ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
}