<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //get all spb with invoice number
    public function getallspbbyinvoice() {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`code`,`b`.`invnum`, `b`.`unit`,`b`.`invdate`,`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`
        FROM `tb_spb` `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` AND `a`.`status`!='9' ORDER BY `a`.`code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    ////////////////////////////////NOPES/////////////////////////////////////////

    public function getreportnopesperday($unit){
        $sql = "SELECT `invdate`, COUNT(*) AS `totalinvoice` FROM `vw_order`
		WHERE `orderinv`='1' AND `unit` = '$unit'  AND MONTH (`invdate`) = MONTH (NOW())
		AND YEAR (`invdate`) = YEAR (NOW())
		GROUP BY DAY (`invdate`) ORDER BY DAY (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getreportnopespermonth($unit){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, COUNT(*) AS `totalinvoice` FROM `vw_order`
		WHERE `orderinv`='1' AND `unit` = '$unit' AND YEAR (`invdate`) = YEAR (NOW())
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getreportnopes($strunit="",$strdivision="",$strsegment="",$strstatspb="",$strstatinv="",$strfdate="",$stredate="") {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`,
		`a`.`invdate`, `a`.`unit`, `a`.`jobtype`, `a`.`division`, `a`.`segment`, `a`.`amuser`, `a`.`amkomet`,
		`a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`,
		`a`.`basevalue`, `a`.`ppnvalue`, `a`.`pphvalue`, `a`.`netvalue`, `a`.`marginvalue`, `a`.`jstvalue`,
		`a`.`negovalue`, `a`.`status`,
		(SELECT SUM(`b`.`value`) as `totalvalue` FROM `tb_spb` `b` WHERE `a`.`orderid` = `b`.`orderid` AND `b`.`status`='1') AS `totalspb`
		FROM `vw_order` `a` WHERE `a`.`unit` = '$strunit' AND `a`.`orderinv`='1' ";

        if ($strdivision != "") {
            $sql .= " AND `a`.`division`='$strdivision' ";
        }
        if ($strsegment != "") {
            $sql .= " AND `a`.`segment`='$strsegment' ";
        }
        if ($strstatspb != "") {
            $sql .= " AND `a`.`spbid`='$strstatspb' ";
        }
        if ($strstatinv != "") {
            $sql .= " AND `a`.`status`='$strstatinv' ";
        }

        if ($strfdate != "" && $stredate != "") {
            $sql .= " AND `a`.`invdate` BETWEEN  '$strfdate 00:00:00' AND '$stredate 23:59:59' ";
        }
        $sql .=" ORDER BY `a`.`code` DESC ";
        // var_dump($sql); exit;
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    ////////////////////////////////PRPO/////////////////////////////////////////

    public function getreportprpoperday($unit){
        $sql = "SELECT `invdate`, COUNT(*) AS `totalinvoice` FROM `vw_order`
		WHERE `orderstatus` = 'PRPO' AND `unit` = '$unit'  AND MONTH (`invdate`) = MONTH (NOW())
		AND YEAR (`invdate`) = YEAR (NOW())
		GROUP BY DAY (`invdate`) ORDER BY DAY (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getreportprpopermonth($unit){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, COUNT(*) AS `totalinvoice` FROM `vw_order`
		WHERE `orderstatus` = 'PRPO' AND `unit` = '$unit' AND YEAR (`invdate`) = YEAR (NOW())
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getreportprpo($strunit="",$strdivision="",$strsegment="",$strstatspb="",$strstatinv="",$strfdate="",$stredate="") {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`,
		`a`.`invdate`, `a`.`unit`, `a`.`jobtype`, `a`.`division`, `a`.`segment`, `a`.`amuser`, `a`.`amkomet`,
		`a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`,
		`a`.`basevalue`, `a`.`ppnvalue`, `a`.`pphvalue`, `a`.`netvalue`, `a`.`marginvalue`, `a`.`jstvalue`,
		`a`.`negovalue`, `a`.`status`,
		(SELECT SUM(`b`.`value`) as `totalvalue` FROM `tb_spb` `b` WHERE `a`.`orderid` = `b`.`orderid` AND `b`.`status`='1') AS `totalspb`
		FROM `vw_order` `a` WHERE `a`.`unit` = '$strunit' AND `a`.`orderstatus` = 'PRPO' ";

        if ($strdivision != "") {
            $sql .= " AND `a`.`division`='$strdivision' ";
        }
        if ($strsegment != "") {
            $sql .= " AND `a`.`segment`='$strsegment' ";
        }
        if ($strstatspb != "") {
            $sql .= " AND `a`.`spbid`='$strstatspb' ";
        }
        if ($strstatinv != "") {
            $sql .= " AND `a`.`status`='$strstatinv' ";
        }

        if ($strfdate != "" && $stredate != "") {
            $sql .= " AND `a`.`invdate` BETWEEN  '$strfdate 00:00:00' AND '$stredate 23:59:59' ";
        }
        $sql .=" ORDER BY `a`.`code` DESC ";
        //var_dump($sql); exit;
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    ////////////////////////////////SPB/////////////////////////////////////////

    public function getreportspbperday($unit){
        /* $sql = "SELECT `spbdat`, COUNT(*) AS `totalspb`
        FROM `tb_spb` WHERE MONTH (`spbdat`) = MONTH ('2019-05-01')
        AND YEAR (`spbdat`) = YEAR (NOW())
        GROUP BY DAY (`spbdat`) ORDER BY DAY (`spbdat`)"; */
        $sql = "SELECT `a`.`spbdat`, COUNT(`a`.`spbid`) AS `totalspb`, `b`.`unit` 
		FROM `tb_spb` `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit`='$unit' AND MONTH (`a`.`spbdat`) = MONTH (NOW()) 
		AND YEAR (`a`.`spbdat`) = YEAR (NOW()) 
		AND `a`.`status`!='9'
		GROUP BY DAY (`a`.`spbdat`) 
		ORDER BY DAY (`a`.`spbdat`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getreportspbpermonth($unit){
        /* $sql = "SELECT MONTHNAME (`spbdat`) AS `month`, COUNT(*) AS `totalspb`
        FROM `tb_spb` WHERE YEAR (`spbdat`) = YEAR (NOW())
        GROUP BY MONTH (`spbdat`) ORDER BY MONTH (`spbdat`)"; */
        $sql = "SELECT MONTHNAME (`a`.`spbdat`) AS `month`, COUNT(`a`.`spbid`) AS `volspb`, 
		SUM(`a`.`value`) AS `valspb`, `b`.`unit` FROM `tb_spb` `a` 
		JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` AND `b`.`unit`='$unit' 
		AND YEAR (`a`.`spbdat`) = YEAR (NOW()) 
		AND `a`.`status`!='9'
		GROUP BY MONTH (`a`.`spbdat`) 
		ORDER BY MONTH (`a`.`spbdat`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    // public function getreportspb($strunit="",$strdivision="",$strsegment="",$strstatspb="",$strpayment="",$strmonth="",$stryear="") {
    // $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`code` AS `codeinv`,`b`.`invnum`, `b`.`unit`,`b`.`invdate`,`b`.`projectname`,
    // `a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `b`.`negovalue`,
    // (SELECT SUM(`a`.`value`) as `totalvalue` FROM `tb_spb` `a` WHERE `a`.`orderid` = `b`.`orderid` AND `a`.`status`='1') AS `totalspb`,
    // (select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
    // `a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`,
    // `a`.`processdate`, `a`.`status`, `b`.`status` AS `statinv`
    // FROM `tb_spb` `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` AND `b`.`unit`='$strunit'";
    // if ($strdivision != "") {
    // $sql .= " AND `b`.`division`='$strdivision' ";
    // }
    // if ($strsegment != "") {
    // $sql .= " AND `b`.`segment`='$strsegment' ";
    // }
    // if ($strstatspb != "") {
    // $sql .= " AND `b`.`orderstatus`='$strstatspb' ";
    // }
    // if ($strpayment != "") {
    // $sql .= " AND `a`.`typeofpayment`='$strpayment' ";
    // }
    // if ($strfdate != "" && $stredate != "") {
    // $sql .= " AND `a`.`spbdat` BETWEEN  '$strfdate 00:00:00' AND '$stredate 23:59:59' ";
    // }
    // if ($strmonth != "") {
    // $sql .= " AND MONTH(`a`.`spbdat`)='$strmonth' ";
    // }
    // if ($stryear != "") {
    // $sql .= " AND YEAR(`a`.`spbdat`)='$stryear' ";
    // }
    // $sql .=" AND `a`.`status`!='9' GROUP BY `a`.`orderid` ORDER BY `a`.`code` DESC ";
    // $stmt = $this->db->query($sql);
    // return $stmt->result_array();
    // }


    public function getreportspbnew() {
        $sql = " SELECT `a`.`spbid`, `a`.`orderid`, 
		`a`.`code`,`a`.`applicant`, `a`.`value`, 
		`a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, 
		`a`.`processdate`, `a`.`status`, 
(select `b`.`jobtype` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `jobtype`, 
(select `b`.`orderstatus` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `orderstatus`, 
(select `b`.`status` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `statinv`,
(select `b`.`unit` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `unit`,
(select `b`.`code` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `codeinv`,
(select `b`.`invnum` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `invnum`,
(select `b`.`invdate` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `invdate`,
(select `b`.`projectname` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `projectname`,
(select `b`.`basevalue` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `basevalue`,
(select `b`.`negovalue` from `tb_order` `b` where `a`.`orderid` = `b`.`orderid` limit 0,1) AS `negovalue`,
		(select `z`.`segment` from `vw_order` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `segment`
        FROM `tb_spb` `a`
        WHERE YEAR(`a`.`spbdat`) = '". date('Y') ."' AND `a`.`status`!='9' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function filterspbbymonth($month) {
        $sql = "SELECT 
		`a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`code`,`b`.`invnum`, `b`.`unit`,`b`.`invdate`,`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`customer`, `a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`, `a`.`status`
        FROM `tb_spb` `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` AND
		MONTH(`a`.`spbdat`) = MONTH('$month') AND `a`.`status`!='9' ORDER BY `a`.`code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function filterinvkometbymonth($month) {
        $sql = "SELECT * FROM `vw_order` WHERE `unit` = 'KOMET' AND
		MONTH(`invdate`) = MONTH('$month') AND YEAR(`invdate`) = YEAR('$month') ORDER BY `code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function filterinvmesrabymonth($month) {
        $sql = "SELECT * FROM `vw_order` WHERE `unit` = 'MESRA' AND
		MONTH(`invdate`) = MONTH('$month') AND YEAR(`invdate`) = YEAR('$month') ORDER BY `code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    ////////////////////////////////BILLCO/////////////////////////////////////////

    public function getreportbillcoperday($unit){
        $sql = "SELECT `invdate`, COUNT(*) AS `totalinvoice` FROM `vw_order`
		WHERE `orderinv`='1' AND `unit` = '$unit'  AND MONTH (`invdate`) = MONTH (NOW())
		AND YEAR (`invdate`) = YEAR (NOW()) AND `status` = '1'
		GROUP BY DAY (`invdate`) ORDER BY DAY (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getreportbillcopermonth($unit){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`,
				SUM(CASE WHEN `status` = '1' THEN 1 ELSE 0 END) AS `paid`,
				SUM(CASE WHEN `status` = '0' THEN 1 ELSE 0 END) AS `unpaid` 
				FROM `vw_order`
				WHERE `orderinv`='1' AND `unit` = '$unit' 
				AND YEAR (`invdate`) = YEAR (NOW())
				GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getreportbillco($strunit="",$strmonth="") {

        $sql = "SELECT * FROM `vw_order`
				WHERE `unit` = '$strunit' AND `orderinv`='1' AND `status` = 0 ";

        if ($strmonth != "") {
            $sql .= " AND MONTH (`invdate`) = '$strmonth' ";
        }

        $sql .=" AND YEAR (`invdate`) = YEAR (NOW()) ORDER BY `code` DESC ";
        //var_dump($sql); exit;
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    ////////////////////////////////DASHBOARD/////////////////////////////////////////

    // -----------------------
    // - Chart Js -
    // -----------------------

    public function getdashboardlastdate(){
        $sql = "SELECT `crdat` FROM `tb_order` ORDER BY `orderid` DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvolnopesbymonth($unit){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, COUNT(*) AS `volinv` FROM `vw_order`
		WHERE `orderinv`='1' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())
				GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvolrevhis(){
        $sql = "SELECT YEAR(invdate) AS year, SUM(basevalue) AS volinv FROM tb_order WHERE YEAR(invdate) BETWEEN '2021' AND '2022' GROUP BY YEAR(invdate)";
        $stmt = $this->db->query($sql);
        $this->db->close();

        return $stmt->result_array();
    }

    public function getvolrevhiswithcancel(){
        $sql = "SELECT YEAR(invdate) AS year, SUM(basevalue) AS volinv FROM tb_order WHERE YEAR(invdate) >= '2021' AND status != 9 GROUP BY YEAR(invdate)";
        $stmt = $this->db->query($sql);
        $this->db->close();

        return $stmt->result_array();
    }

    public function getvalnopesbymonth($unit){
        $sql = "SELECT LAST_DAY (`invdate`) AS `month`, SUM(`basevalue`) AS `valinv` FROM `vw_order`
		WHERE `orderinv`='1' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())
				GROUP BY LAST_DAY (`invdate`) ORDER BY LAST_DAY (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
    public function getvolvalnopesbymonth($unit=''){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, COUNT(*) AS `volinv`, SUM(`basevalue`) AS `valinv`  FROM `vw_order`
		WHERE `orderinv`='1' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE()) AND MONTH(`invdate`) = MONTH(CURDATE())
				GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
    //YEAR(CURDATE()) - 1
    public function getvolnopesyoy($unit){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`,
				SUM(CASE WHEN YEAR (`invdate`) = YEAR(CURDATE()) - 1 THEN 1 ELSE 0 END) AS `lastyear`,
				SUM(CASE WHEN YEAR (`invdate`) = YEAR(CURDATE()) THEN 1 ELSE 0 END) AS `thisyear`
				FROM `vw_order` 
				WHERE `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoy($unit){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, 
				SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`,
				SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear`
				FROM `vw_order`  
				WHERE `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboarddist(){
        $sql = "SELECT (select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		COUNT(`a`.`orderid`) AS `volinv` FROM `tb_order` `a` 
		WHERE YEAR (`a`.`invdate`) = YEAR(CURDATE()) GROUP BY `a`.`division` 
		ORDER BY `a`.`division`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboarddistval(){
        $sql = "SELECT b.code AS division, SUM(a.netvalue) AS valinv FROM tb_order a
                LEFT JOIN tb_division b ON b.divisionid = a.division
                WHERE b.divisionid IN(1,2,3,4,5,6)
                AND YEAR (`a`.`invdate`) = YEAR(CURDATE())
                GROUP BY b.divisionid;";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboarddistvalsm2(){
        $sql = "SELECT b.code AS division, SUM(a.netvalue) AS valinv FROM tb_order a
                LEFT JOIN tb_division b ON b.divisionid = a.division
                WHERE b.divisionid IN(2,3,4,5,6,7,8)
                AND YEAR (`a`.`invdate`) = YEAR(CURDATE())
                GROUP BY b.divisionid;";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardallspb(){
        $sql = "SELECT `b`.`orderstatus`, SUM(`a`.`value`) AS `valspb` 
		FROM `tb_spb` `a` JOIN `tb_order` `b` WHERE `a`.`orderid` = `b`.`orderid` AND `b`.`status` != '9'
		AND YEAR (`a`.`spbdat`) = YEAR(CURDATE()) AND `a`.`status`!='9' GROUP BY `b`.`orderstatus` 
		ORDER BY `b`.`orderstatus`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getanalyticstotalorder(){
        $sql = "SELECT SUM(`basevalue`) AS `totalinvoice` 
		FROM `tb_order` WHERE `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getanalyticstotalspb(){
        $sql = "SELECT SUM(`value`) AS `totalspb` 
		FROM `tb_spb` WHERE `status` = '1' AND YEAR (`spbdat`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getanalyticstotaltipeorder(){
        $sql = "SELECT orderstatus, SUM(`basevalue`) AS `totalinvoice` 
		FROM `tb_order` WHERE `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE()) GROUP BY orderstatus";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardallinv(){
        $sql = "SELECT
				REPLACE( 
					REPLACE(
						REPLACE(
							REPLACE(
								REPLACE(
									REPLACE(
										REPLACE(
											REPLACE(
												REPLACE(`status`,0,'Terkirim')
                ,2,'Segmen')
                    ,3, 'PJM')
                        ,4,'ASD')
                            ,16,'Logistik')
                                ,17,'Legal')
                                    ,18,'Verifikasi Keuangan')
                                        ,8,'Posting Telkom')
                                            ,10,'Forecasting Cair') AS `status`, 
				SUM(`basevalue`) AS `volinv` 
				FROM `tb_order` WHERE `orderinv`='1' 
				AND `status` != '9' AND `status` != '1'
				AND YEAR (`invdate`) = YEAR (CURDATE()) 
				GROUP BY `status` ORDER BY `status`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getdashboardtotinv(){
        $sql ="SELECT SUM(`basevalue`) AS `totalinv` FROM `tb_order` WHERE `faknum` != ' ' AND `orderstatus` != 'OBL' AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql); 
        return $stmt->result_array();
    }
	
	public function getdashboardtotacr(){
        $sql ="SELECT SUM(`basevalue`) AS `totalacr` FROM `tb_order` WHERE `faknum` = ' ' AND `orderstatus` = 'OBL' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardtotrev(){
        $sql ="SELECT SUM(`basevalue`) AS `totalrev` FROM `tb_order` WHERE `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE()) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardtotcost(){
        $sql ="SELECT SUM(`value`) AS `totalcost` FROM `tb_spb` WHERE YEAR (`spbdat`) = YEAR(CURDATE()) AND `status`!='9' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardtotprof(){
        $sql ="SELECT SUM(`marginvalue`) AS `totalprofit` FROM `vw_order` WHERE `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE()) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } 

    public function getdashboardampvol(){
        $sql = "SELECT COUNT(`a`.`orderid`) AS `orderid`, `a`.`amkomet`, 
		CONCAT('https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/',
		(select `z`.`photo` from `vw_useraccounts` `z` where `z`.`fullname` = `a`.`amkomet` limit 0,1)) AS `amphoto`
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1' AND `a`.`status` != '9' AND a.`orderstatus` != 'OBL'
		AND YEAR (`a`.`invdate`) = YEAR(CURDATE()) GROUP BY `a`.`amkomet`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	//CM
	public function getdashboardampvolcm(){
        $sql = "SELECT COUNT(`a`.`orderid`) AS `orderid`, `a`.`amkomet`, 
		CONCAT('https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/',
		(select `z`.`photo` from `vw_useraccounts` `z` where `z`.`fullname` = `a`.`amkomet` limit 0,1)) AS `amphoto`
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1' AND `a`.`status` != '9' AND a.`orderstatus` != 'OBL'
		AND YEAR (`a`.`invdate`) = YEAR(CURDATE()) AND MONTH(`a`.`invdate`) = MONTH(CURDATE()) GROUP BY `a`.`amkomet`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardprpvol(){
        $sql = "SELECT COUNT(`a`.`orderid`) AS `orderid`, `a`.`amkomet`, 
		CONCAT('https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/',
		(select `z`.`photo` from `vw_useraccounts` `z` where `z`.`fullname` = `a`.`amkomet` limit 0,1)) AS `amphoto`
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1' AND `a`.`status` != '9' AND a.`orderstatus` = 'OBL' 
		AND YEAR (`a`.`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardampval(){
        $sql = "SELECT SUM(`a`.`basevalue`) AS `basevalue`, `a`.`amkomet`, 
		CONCAT('https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/', 
		(select `z`.`photo` from `vw_useraccounts` `z` where `z`.`fullname` = `a`.`amkomet` limit 0,1)) AS `amphoto` 
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1' AND `a`.`status` != '9' AND a.`orderstatus` != 'OBL'
		AND YEAR (`a`.`invdate`) = YEAR(CURDATE()) GROUP BY `a`.`amkomet`";
        $stmt = $this->db->query($sql); 
        return $stmt->result_array();
    }
	
	//CM
	public function getdashboardampvalcm(){
        $sql = "SELECT SUM(`a`.`basevalue`) AS `basevalue`, `a`.`amkomet`, 
		CONCAT('https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/', 
		(select `z`.`photo` from `vw_useraccounts` `z` where `z`.`fullname` = `a`.`amkomet` limit 0,1)) AS `amphoto` 
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1' AND `a`.`status` != '9' AND a.`orderstatus` != 'OBL'
		AND YEAR (`a`.`invdate`) = YEAR(CURDATE()) AND MONTH(`a`.`invdate`) = MONTH(CURDATE()) GROUP BY `a`.`amkomet`";
        $stmt = $this->db->query($sql); 
        return $stmt->result_array();
    }

    public function getdashboardprpval(){
        $sql = "SELECT SUM(`a`.`basevalue`) AS `basevalue`, `a`.`amkomet`, 
		CONCAT('https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/', 
		(select `z`.`photo` from `vw_useraccounts` `z` where `z`.`fullname` = `a`.`amkomet` limit 0,1)) AS `amphoto` 
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1' AND `a`.`status` != '9' AND a.`orderstatus` != 'OBL'
		AND YEAR (`a`.`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardampcollvol(){
        $sql = "SELECT COUNT(`a`.`orderid`) AS `orderid`, `a`.`amkomet`, 
		CONCAT('https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/',
		(select `z`.`photo` from `vw_useraccounts` `z` where `z`.`fullname` = `a`.`amkomet` limit 0,1)) AS `amphoto`
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1' AND `a`.`status` != '9' AND a.status != 1 
		AND YEAR (`a`.`invdate`) = YEAR(CURDATE()) GROUP BY `a`.`amkomet`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardampcollval(){
        $sql = "SELECT SUM(`a`.`basevalue`) AS `basevalue`, `a`.`amkomet`, 
		CONCAT('https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/', 
		(select `z`.`photo` from `vw_useraccounts` `z` where `z`.`fullname` = `a`.`amkomet` limit 0,1)) AS `amphoto` 
		FROM `tb_order` `a` WHERE `a`.`orderinv`='1' AND `a`.`status` != '9' AND a.status != 1
		AND YEAR (`a`.`invdate`) = YEAR(CURDATE()) GROUP BY `a`.`amkomet`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardestprofit(){
        $sql = "SELECT FLOOR(SUM(`estimasiprofit`)) AS `estprofit` FROM `vw_estprofit`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //NEW radian 2021
    public function getnewdashboardestprofit(){
        $sql = "SELECT FLOOR(SUM(`marginvalue`) * 100/98 - (1116000000 * MONTH(CURDATE()))) AS `estprofit` FROM `vw_order` 
		WHERE `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //based on voucher paid value
    public function getnewcollectionpaid(){
        $sql = "SELECT SUM(`vrecvalue`) AS `totalpaid`, MONTHNAME (`invdate`) AS `month` FROM `vw_order` 
				WHERE `status` = '1' AND YEAR (`invdate`) = YEAR(CURDATE()) GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }


    public function getnewcollectionunpaid(){
        $sql = "SELECT FLOOR(SUM(`basevalue`) * 100/98) AS `totalunpaid`, MONTHNAME (`invdate`) AS `month` FROM `vw_order` 
				WHERE `status` != '1' AND YEAR (`invdate`) = YEAR(CURDATE()) GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getnewcollectionpaidunpaid(){
        $sql = "SELECT SUM(`vrecvalue`) AS `totalpaid`, FLOOR(SUM(`basevalue`) * 98/100) AS `totalunpaid`, MONTHNAME (`invdate`) AS `month` FROM `tb_order` 
				WHERE YEAR (`invdate`) = YEAR(CURDATE()) GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getnewcollectionreceivepaidunpaid(){
        $sql = "SELECT SUM(`vrecvalue`) AS `totalpaid`, DATE_FORMAT(procdat,'%b') AS `month` FROM `tb_order` 
				WHERE YEAR (`procdat`) = YEAR(CURDATE()) GROUP BY MONTH (`procdat`) ORDER BY MONTH (`procdat`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getnewcollectionpostingforecasting(){
        $month = date('m');
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }

        $sql = "SELECT 
                    MONTHNAME(invdate) AS month,
                    SUM(CASE WHEN status IN(6,18) AND invdate BETWEEN '2021-01-01' AND '". $currentend ."' THEN basevalue ELSE '0' END) AS keuangan,
                    SUM(CASE WHEN status = 8 AND invdate BETWEEN '2021-01-01' AND '". $currentend ."' THEN basevalue ELSE '0' END) AS posting,
                    SUM(CASE WHEN status = 10 AND invdate BETWEEN '2021-01-01' AND '". $currentend ."' THEN basevalue ELSE '0' END) AS forecasting
                FROM tb_order
                GROUP BY MONTH(invdate)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcollectionpaidmonthly(){
        $sql = "SELECT DATE_FORMAT(procdat,'%b') AS `month`, 
                    SUM(IF( YEAR(`procdat`) = YEAR(CURDATE()) - 1, `vrecvalue`, 0)) AS `lastyear`,
                    SUM(IF( YEAR(`procdat`) = YEAR(CURDATE()), `vrecvalue`, 0)) AS `thisyear`
                FROM `vw_order`  
                WHERE 
                    `status` = '1' AND 
                    (YEAR (`procdat`) = YEAR(CURDATE()) OR YEAR (`procdat`) = YEAR(CURDATE())-1)
                GROUP BY MONTH (`procdat`) ORDER BY MONTH (`procdat`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getarbyday(){
        $sql = "SELECT FORMAT(SUM(`vrecvalue`),0) AS `totalpaid`, `procdat` FROM `vw_order` 
		WHERE YEAR (`procdat`) = YEAR(CURDATE()) AND MONTH (`procdat`) = MONTH(CURDATE())
		GROUP BY DAY (`procdat`) ORDER BY DAY (`procdat`) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getarbyfullday($date){
        $sql = "SELECT FORMAT(SUM(`vrecvalue`),0) AS `totalpaid`, `procdat` FROM `vw_order` 
		WHERE procdat = '". $date ."' ";

        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();

        if(!empty($data[0]['totalpaid']) > 0){
            return $data[0];
        }else{
            $data = array(
                'totalpaid' => '0',
                'procdat' => $date
            );
            return $data;
        }
    }

    public function getsumqcoll(){
        $sql = "SELECT QUARTER(`procdat`) AS `Q`, FLOOR(SUM(`vrecvalue`)) AS `value`
                FROM `vw_order`  
                WHERE 
                    `status` = '1' AND 
                    (YEAR (`procdat`) = YEAR(CURDATE()))
                GROUP BY QUARTER(`procdat`) ORDER BY QUARTER(`procdat`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcollectioncm(){
        $sql = "SELECT DATE_FORMAT(procdat,'%b') AS `month`, 
                SUM(`vrecvalue`) AS val
                FROM `vw_order`  
                WHERE 
                    `status` = '1' 
                    AND YEAR(`procdat`) = YEAR(CURDATE()) 
                    AND MONTH(`procdat`) = MONTH(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvolvalcollmonth(){
        $sql = "SELECT 
                    DATE_FORMAT(procdat,'%b') AS `month`, 
                    COUNT(*) AS `volcoll`, 
                    SUM(`vrecvalue`) AS `valcoll`  
                FROM `vw_order`
		        WHERE `status` = '1' 
		        AND YEAR (`procdat`) = YEAR(CURDATE()) 
		        AND MONTH(`procdat`) = MONTH(CURDATE())
				GROUP BY MONTH (`procdat`) ORDER BY MONTH (`procdat`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcollectionpaid($param){
        $where = "WHERE `status` = '1'";

        if(isset($param['optUnit']) && $param['optUnit'] != 'all'){
            $where .= " AND unit = '".$param['optUnit']."' ";
        }

        if(isset($param['optDivision']) && $param['optDivision'] != 'all'){
            $where .= " AND division = '".$param['optDivision']."' ";
        }

        if(isset($param['optSegment']) && $param['optSegment'] != 'all'){
            $where .= " AND segment = '".$param['optSegment']."' ";
        }

        if($param['optBulan'] != 'all'){
            $where .= " AND MONTH(procdat) = '". $param['optBulan'] ."'";
        }

        if($param['optTahun'] != 'all'){
            $where .= " AND YEAR(procdat) = '". $param['optTahun'] ."'";
        }

        $sql = "SELECT 
                    *  
                FROM `vw_order`
		        ". $where ."
		        ORDER BY DAY(`procdat`) ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    ///
    public function getdashboardcolonhand(){
        $sql ="SELECT FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7)) AS `week`, 
		FORMAT(SUM(`b`.`netvalue`),0) AS `totalnet`, COUNT(*) AS `totalinv` 
		FROM `tb_billco` `a` JOIN `vw_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`orderinv`='1' AND `a`.`status` = '6' AND `b`.`status` != '1' 
		AND MONTH (`a`.`collectdate`) = MONTH (NOW()) AND YEAR (`a`.`collectdate`) = YEAR (NOW()) 
		GROUP BY FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7)) 
		ORDER BY FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7))";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardcolonhandtotal(){
        $sql ="SELECT FORMAT(SUM(`b`.`netvalue`),0) AS `totalnet`, COUNT(*) AS `totalinv` 
		FROM `tb_billco` `a` JOIN `vw_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`orderinv`='1' AND `a`.`status` = '6' AND `b`.`status` != '1' 
		AND MONTH (`a`.`collectdate`) = MONTH (NOW()) AND YEAR (`a`.`collectdate`) = YEAR (NOW()) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardcolprogress(){
        $sql ="SELECT FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7)) AS `week`, 
		FORMAT(SUM(`b`.`netvalue`),0) AS `totalnet`, COUNT(*) AS `totalinv` 
		FROM `tb_billco` `a` JOIN `vw_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`orderinv`='1' AND `a`.`status` = '2' AND `b`.`status` != '1' 
		AND MONTH (`a`.`collectdate`) = MONTH (NOW()) AND YEAR (`a`.`collectdate`) = YEAR (NOW()) 
		GROUP BY FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7)) 
		ORDER BY FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7))";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardcolprogresstotal(){
        $sql ="SELECT FORMAT(SUM(`b`.`netvalue`),0) AS `totalnet`, COUNT(*) AS `totalinv` 
		FROM `tb_billco` `a` JOIN `vw_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`orderinv`='1' AND `a`.`status` = '2' AND `b`.`status` != '1' 
		AND MONTH (`a`.`collectdate`) = MONTH (NOW()) AND YEAR (`a`.`collectdate`) = YEAR (NOW())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardcolprospect(){
        $sql ="SELECT FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7)) AS `week`, 
		FORMAT(SUM(`b`.`jstvalue`),0) AS `totalnet`, COUNT(*) AS `totalinv` 
		FROM `tb_billco` `a` JOIN `vw_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`orderstatus` = 'PRPO' AND `a`.`status` = '7' AND `b`.`status` != '1' 
		AND YEAR (`a`.`collectdate`) = YEAR (NOW()) 
		GROUP BY FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7)) 
		ORDER BY FROM_DAYS(TO_DAYS(`a`.`collectdate`) -MOD(TO_DAYS(`a`.`collectdate`) -2, 7))";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getdashboardcolprospecttotal(){
        $sql ="SELECT FORMAT(SUM(`b`.`jstvalue`),0) AS `totalnet`, COUNT(*) AS `totalinv` 
		FROM `tb_billco` `a` JOIN `vw_order` `b` WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`orderstatus` = 'PRPO' AND `a`.`status` = '7' AND `b`.`status` != '1' 
		AND YEAR (`a`.`collectdate`) = YEAR (NOW())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalprospectbydiv(){
        $sql = "SELECT `a`.`division`, 
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `divname`,
		SUM(`a`.`value`) AS `totalvalue` 
		FROM `tb_prospectorder` `a` WHERE `a`.`status` = '0' GROUP BY `a`.`division` ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettotalprospect(){
        $sql = "SELECT SUM(`value`) AS `totalvalue` FROM `tb_prospectorder` WHERE `status` = '0' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //Dashboard Quaartal
    public function getvalnopesq12023(){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`
		FROM `vw_order` WHERE `orderinv`='1' AND `status` != '9' 
		AND `invdate` >= '2023-01-01' AND `invdate` <= '2023-03-31' 
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesq12024(){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear`
		FROM `vw_order` WHERE `orderinv`='1' AND `status` != '9' 
		AND `invdate` >= '2024-01-01' AND `invdate` <= '2024-03-31' 
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesq22023(){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`
		FROM `vw_order` WHERE `orderinv`='1' AND `status` != '9' 
		AND `invdate` >= '2023-04-01' AND `invdate` <= '2023-06-30' 
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesq22024(){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear`
		FROM `vw_order` WHERE `orderinv`='1' AND `status` != '9' 
		AND `invdate` >= '2024-04-01' AND `invdate` <= '2024-06-30' 
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesq32023(){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`
		FROM `vw_order` WHERE `orderinv`='1' AND `status` != '9' 
		AND `invdate` >= '2023-07-01' AND `invdate` <= '2023-09-30' 
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesq32024(){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear`
		FROM `vw_order` WHERE `orderinv`='1' AND `status` != '9' 
		AND `invdate` >= '2024-07-01' AND `invdate` <= '2024-09-30' 
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesq42023(){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`
		FROM `vw_order` WHERE `orderinv`='1' AND `status` != '9' 
		AND `invdate` >= '2023-10-01' AND `invdate` <= '2023-12-31' 
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesq42024(){
        $sql = "SELECT MONTHNAME (`invdate`) AS `month`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear`
		FROM `vw_order` WHERE `orderinv`='1' AND `status` != '9' 
		AND `invdate` >= '2024-10-01' AND `invdate` <= '2024-12-31' 
		GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoydivision($unit){
        $sql = "SELECT `division`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`, 
		SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear` 
		FROM `vw_order` WHERE `division` IN ('DES','DGS','NON','EKS','SDA','EBIS') AND `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY `division` ORDER BY `division`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoydivisionsm2($unit){
        $sql = "SELECT `division`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`, 
		SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear` 
		FROM `vw_order` WHERE `division` IN ('DGS','DSS','DPS','SDA','EBIS','NON','EKS') AND `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY `division` ORDER BY `division`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoydes($unit){
        $sql = "SELECT `segment`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`, 
		SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear` 
		FROM `vw_order` WHERE `division` = 'DES' AND `segment` != '' AND `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY `segment` ORDER BY `segment`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoydgs($unit){
        $sql = "SELECT `segment`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`, 
		SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear` 
		FROM `vw_order` WHERE `division` = 'DGS' AND `segment` != '' AND `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY `segment` ORDER BY `segment`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoynon($unit){
        $sql = "SELECT `segment`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`, 
		SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear` 
		FROM `vw_order` WHERE `division` = 'NON' AND `segment` != '' AND `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY `segment` ORDER BY `segment`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoyeks($unit){
        $sql = "SELECT `segment`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`, 
		SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear` 
		FROM `vw_order` WHERE `division` = 'EKS' AND `segment` != '' AND `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY `segment` ORDER BY `segment`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoysda($unit){
        $sql = "SELECT `segment`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`, 
		SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear` 
		FROM `vw_order` WHERE `division` = 'SDA' AND `segment` != '' AND `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY `segment` ORDER BY `segment`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalnopesyoyebis($unit){
        $sql = "SELECT `segment`, SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()) - 1, `basevalue`, 0)) AS `lastyear`, 
		SUM(IF( YEAR(`invdate`) = YEAR(CURDATE()), `basevalue`, 0)) AS `thisyear` 
		FROM `vw_order` WHERE `division` = 'EBIS' AND `segment` != '' AND `orderinv`='1' AND `status` != '9' ";
        if ($unit != "") {
            $sql .= " AND `unit` = '$unit' ";
        }
        $sql .= "GROUP BY `segment` ORDER BY `segment`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallorderbyspb() {
        $sql = "SELECT `a`.`orderid`, `a`.`spbid`, `a`.`orderinv`, `a`.`orderstatus`, `a`.`code`, `a`.`invnum`, `a`.`faknum`, `a`.`invdate`, `a`.`unit`, `a`.`jobtype`,
		(select `z`.`code` from `tb_division` `z` where `z`.`divisionid` = `a`.`division` limit 0,1) AS `division`, 
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		`a`.`amuser`, `a`.`amkomet`, `a`.`projectname`, `a`.`sentdate`, `a`.`spknum`, `a`.`spkindat`, `a`.`spkdat`, `a`.`basevalue`, `a`.`ppnvalue`, `a`.`netvalue`, `a`.`jstvalue`, `a`.`negovalue`,
		`a`.`status`,`a`.`procdat`, DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat`,
		(select count(`z`.`spbid`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` and `z`.`status` != '9' limit 0,1) AS `countspb`
			FROM `tb_order` `a` WHERE `a`.`status` != '9'
            AND `a`.`procdat` = '0000-00-00' 
			AND YEAR(`a`.`invdate`) = YEAR(CURDATE()) ORDER BY `a`.`invdate` DESC LIMIT 0,50";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    // count invoice by amkomet`
    // SELECT COUNT(`a`.`orderid`) AS `inv`, `b`.`marketingid`
    // FROM `tb_order` `a` JOIN `tb_segment` `b` WHERE `a`.`segment` = `b`.`segmentid`
    // AND YEAR(`a`.`invdate`) = YEAR(NOW()) GROUP BY `b`.`marketingid`

    // public function getreportbillcopermonth($unit){
    // $sql = "SELECT MONTHNAME (`invdate`) AS `month`, COUNT(*) AS `totalinvoice` FROM `vw_order`
    // WHERE `orderinv`='1' AND `unit` = '$unit' AND YEAR (`invdate`) = YEAR (NOW()) AND `status` = '1'
    // GROUP BY MONTH (`invdate`) ORDER BY MONTH (`invdate`)";
    // $stmt = $this->db->query($sql);
    // return $stmt->result_array();
    // }

    ////////////////////////////////EMPLOYEE/ABSENSI/////////////////////////////////////////

    public function getreportatt($strdatetime="") {
        $sql = " SELECT MAX(`b`.`attid`) AS `attid`, `a`.`userid`,`a`.`fullname`, `b`.`datetime`, `b`.`notes`,
		MAX(`b`.`status`) AS `status`, MAX(`b`.`health`) AS `health`
		FROM `vw_useraccounts` `a` JOIN `tb_attendances` `b` 
		WHERE `a`.`userid` = `b`.`userid` ";

        if ($strdatetime != "") {
            $sql .= " AND DATE (`b`.`datetime`) = '$strdatetime' ";
        } else {
            $sql .= " AND DATE(`b`.`datetime`) = CURDATE() ";
        }

        $sql .= " GROUP BY `b`.`userid` ORDER BY `b`.`attid` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getreportattmonthly($strmonth="", $stryear="", $intstatus="") {
        $sql = " SELECT `b`.`attid`, `a`.`userid`,`a`.`fullname`, `b`.`datetime`, `b`.`notes`, 
		`b`.`status` FROM `vw_useraccounts` `a` JOIN `tb_attendances` `b` 
		WHERE `a`.`userid` = `b`.`userid` ";

        if ($strmonth != "") {
            $sql .= " AND MONTH(`b`.`datetime`) = '$strmonth' ";
        }
        if ($stryear != "") {
            $sql .= " AND YEAR(`b`.`datetime`) = '$stryear' ";
        }
        if ($intstatus != "") {
            $sql .= " AND `b`.`status` = '$intstatus' ";
        }

        $sql .= "   ORDER BY `b`.`attid` DESC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //mencari status WFO WFH
    public function getwfowfh($fullname){
        $sql ="SELECT DISTINCT `userid`, `status`, COUNT(DISTINCT `status`) AS `totalstatus`
		FROM `tb_attendances` WHERE `status` != 2
		AND DATE(`datetime`) = DATE(CURDATE())
         GROUP BY `userid`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //mencari status kesehatan
    public function gethealth($fullname){
        $sql ="SELECT `health`, COUNT(`health`) AS `totalhealth`
		FROM `tb_attendances` WHERE `status` != 2
		AND DATE(`datetime`) = DATE(CURDATE()) GROUP BY `health`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //mencari jumlah karyawan
    public function gettotalkary($fullname){
        $sql ="SELECT COUNT(`userid`) AS `totaluser` FROM `tb_user` 
		WHERE `status` = 1 AND `roleid` != 2 AND `roleid` != 3 AND (`roleid` != 1 OR username = 'arrie' OR username = 'rian')";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
    public function tes(){
        $sql ="SELECT COUNT(*) FROM `tb_user` 
		WHERE `status` = 1 AND `roleid` != 1 AND `roleid` != 2 AND `roleid` != 3";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getattquickreport($strdatetime="") {
        $sql = "SELECT 
                    a.*, b.nik, b.fullname 
                FROM tb_attendances a
                LEFT JOIN tb_user b ON b.userid = a.userid
                WHERE 1=1";

        if ($strdatetime != "") {
            $sql .= " AND DATE (a.datetime) = '$strdatetime' ";
        } else {
            $sql .= " AND DATE(a.datetime) = CURDATE() ";
        }

        $sql .= " GROUP BY a.userid ORDER BY a.attid ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getreportattweek($strdatetime="") {
        $sql = "SELECT 
                    a.*, a.datetime as clockin, b.nik, b.fullname, c.clockout 
                FROM tb_attendances a
                LEFT JOIN tb_user b ON b.userid = a.userid
                LEFT JOIN (SELECT userid, datetime as clockout FROM tb_attendances WHERE DATE (datetime) = '". $strdatetime ."' AND status = '2' GROUP BY userid) c ON c.userid = a.userid
                WHERE 1=1";

        if ($strdatetime != "") {
            $sql .= " AND DATE (a.datetime) = '$strdatetime' ";
        } else {
            $sql .= " AND DATE(a.datetime) = CURDATE() ";
        }

        $sql .= " GROUP BY a.userid ORDER BY a.attid ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getkometfinco() {
        $sql = " SELECT MAX(`a`.`billcoid`) AS `billcoid`, `a`.`collectdate`, 
					SUM(`b`.`netvalue`) AS `totalnet`, 
					COUNT(*) AS `totalinv` 
					FROM `tb_billco` `a` JOIN `vw_order` `b` 
					WHERE `a`.`orderid` = `b`.`orderid` 
					AND `b`.`orderinv`='1' 
					AND `a`.`status` = '8' 
					AND `b`.`status` != '1'
					AND `b`.`unit` = 'KOMET'
					AND MONTH (`a`.`collectdate`) = MONTH (NOW()) 
					AND YEAR (`a`.`collectdate`) = YEAR (NOW()) 
					GROUP BY `a`.`collectdate` 
					ORDER BY `a`.`collectdate` ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getkometweekly() {
        $sql = " SELECT `a`.*, MAX(`b`.`collectdate`) AS `collectdate`,
					DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat` 
					FROM `vw_order` `a` JOIN `tb_billco` `b`
					WHERE `a`.`orderid` = `b`.`orderid` 
					AND `a`.`orderinv`='1'
					AND `a`.`unit` = 'KOMET'
					AND `a`.`procdat` = '0000-00-00' AND `a`.`status` != '9' 
					AND `a`.`status` != '1' AND `a`.`status` = '8'
					AND YEAR(`a`.`invdate`) = YEAR(CURDATE())
					GROUP BY `b`.`orderid`
					ORDER BY `b`.`collectdate` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getkometforecast() {
        //AND YEAR (`a`.`collectdate`) = YEAR (NOW())
        $sql = " SELECT MAX(`a`.`billcoid`) AS `billcoid`, `a`.`collectdate`, 
					SUM(`b`.`netvalue`) AS `totalnet`, 
					COUNT(*) AS `totalinv` 
					FROM `tb_billco` `a` JOIN `vw_order` `b` 
					WHERE `a`.`orderid` = `b`.`orderid` 
					AND `b`.`orderinv`='1' 
					AND `a`.`status` = '10' 
					AND `b`.`status` != '1'
					AND `b`.`unit` = 'KOMET'
					GROUP BY `a`.`collectdate` 
					ORDER BY `a`.`collectdate` ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getkometmonthly() {
        //AND YEAR(`a`.`invdate`) = YEAR(CURDATE())
        $sql = " SELECT `a`.*, MAX(`b`.`collectdate`) AS `collectdate`,
					DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat` 
					FROM `vw_order` `a` JOIN `tb_billco` `b`
					WHERE `a`.`orderid` = `b`.`orderid` 
					AND `a`.`orderinv`='1'
					AND `a`.`unit` = 'KOMET'
					AND `a`.`procdat` = '0000-00-00' AND `a`.`status` != '9' 
					AND `a`.`status` != '1' AND `a`.`status` = '10'
					GROUP BY `b`.`orderid`
					ORDER BY `b`.`collectdate` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmesrafinco() {
        $sql = " SELECT MAX(`a`.`billcoid`) AS `billcoid`, `a`.`collectdate`, 
					SUM(`b`.`netvalue`) AS `totalnet`, 
					COUNT(*) AS `totalinv` 
					FROM `tb_billco` `a` JOIN `vw_order` `b` 
					WHERE `a`.`orderid` = `b`.`orderid` 
					AND `b`.`orderinv`='1' 
					AND `a`.`status` = '8' 
					AND `b`.`status` != '1'
					AND `b`.`unit` = 'MESRA'
					AND MONTH (`a`.`collectdate`) = MONTH (NOW()) 
					AND YEAR (`a`.`collectdate`) = YEAR (NOW()) 
					GROUP BY `a`.`collectdate` 
					ORDER BY `a`.`collectdate` ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmesraweekly() {
        $sql = " SELECT `a`.*, MAX(`b`.`collectdate`) AS `collectdate`,
					DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat` 
					FROM `vw_order` `a` JOIN `tb_billco` `b`
					WHERE `a`.`orderid` = `b`.`orderid` 
					AND `a`.`orderinv`='1'
					AND `a`.`unit` = 'MESRA'
					AND `a`.`procdat` = '0000-00-00' AND `a`.`status` != '9' 
					AND `a`.`status` != '1' AND `a`.`status` = '8'
					AND YEAR(`a`.`invdate`) = YEAR(CURDATE())
					GROUP BY `b`.`orderid`
					ORDER BY `b`.`collectdate` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmesraforecast() {
        //AND MONTH (`a`.`collectdate`) = MONTH (NOW())
        //AND YEAR (`a`.`collectdate`) = YEAR (NOW())
        $sql = " SELECT MAX(`a`.`billcoid`) AS `billcoid`, `a`.`collectdate`, 
					SUM(`b`.`netvalue`) AS `totalnet`, 
					COUNT(*) AS `totalinv` 
					FROM `tb_billco` `a` JOIN `vw_order` `b` 
					WHERE `a`.`orderid` = `b`.`orderid` 
					AND `b`.`orderinv`='1' 
					AND `a`.`status` = '10' 
					AND `b`.`status` != '1'
					AND `b`.`unit` = 'MESRA'
					GROUP BY `a`.`collectdate` 
					ORDER BY `a`.`collectdate` ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmesramonthly() {
        //AND YEAR(`a`.`invdate`) = YEAR(CURDATE())
        $sql = " SELECT `a`.*, MAX(`b`.`collectdate`) AS `collectdate`, 
					DATEDIFF(CURDATE(),`a`.`invdate`) AS `intervaldat` 
					FROM `vw_order` `a` JOIN `tb_billco` `b`
					WHERE `a`.`orderid` = `b`.`orderid` 
					AND `a`.`orderinv`='1'
					AND `a`.`unit` = 'MESRA'
					AND `a`.`procdat` = '0000-00-00' AND `a`.`status` != '9' 
					AND `a`.`status` != '1' AND `a`.`status` = '10'
					GROUP BY `b`.`orderid`
					ORDER BY `b`.`collectdate` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallinv30days() {
        $sql = "SELECT *, DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order`
		WHERE `orderinv`='1' AND `procdat` = '0000-00-00' AND `status` != '9' 
		AND `status` != '1' AND `status` != '6'
		AND YEAR(`invdate`) = YEAR(CURDATE()) AND DATEDIFF(CURDATE(),`invdate`) >= '28'
		ORDER BY `code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getkometreal() {
        $sql = " SELECT SUBDATE(`procdat`,1) AS `relsidat`, 
					SUM(`vrecvalue`) AS `totalcair`, 
					COUNT(*) AS `totalinv` 
					FROM `vw_order`
					WHERE `status` = '1'
					AND `unit` = 'KOMET'
                    AND SUBDATE(`procdat`,1) = SUBDATE(CURDATE(),1)
					GROUP BY `relsidat` 
					ORDER BY `relsidat` ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getkometdaily() {
        $sql = " SELECT *
					FROM `vw_order`
					WHERE `status` = '1'
					AND `unit` = 'KOMET'
					AND SUBDATE(`procdat`,1) = SUBDATE(CURDATE(),1)
					GROUP BY `orderid` 
					ORDER BY `procdat` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmesrareal() {
        $sql = " SELECT SUBDATE(`procdat`,1) AS `relsidat`, 
					SUM(`vrecvalue`) AS `totalcair`, 
					COUNT(*) AS `totalinv` 
					FROM `vw_order`
					WHERE `status` = '1'
					AND `unit` = 'MESRA'
                    AND SUBDATE(`procdat`,1) = SUBDATE(CURDATE(),1)
					GROUP BY `relsidat` 
					ORDER BY `relsidat` ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmesradaily() {
        $sql = " SELECT *
					FROM `vw_order`
					WHERE `status` = '1'
					AND `unit` = 'MESRA'
					AND SUBDATE(`procdat`,1) = SUBDATE(CURDATE(),1)
					GROUP BY `orderid` 
					ORDER BY `procdat` ASC ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    ///////////////////////////////////////MAPPING////////////////////////////////////////////
    // SELECT COUNT(`a`.`orderid`) AS `orderid`, `b`.`marketingid`,
    // (select `z`.`fullname` from `vw_useraccounts` `z` where `z`.`userid` = `b`.`marketingid` limit 0,1) AS `amkomet`
    // FROM `tb_order` `a` JOIN `tb_segment` `b` WHERE `a`.`segment` = `b`.`segmentid`
    // AND `a`.`orderinv`='1' AND `a`.`status` != '9'
    // AND YEAR (`a`.`invdate`) = YEAR(CURDATE()) GROUP BY `b`.`marketingid`


    ////////////////////////////////MARKETING DASHBOARD/////////////////////////////////////////

    public function getmynopes($fullname){
        $sql ="SELECT COUNT(`orderid`) AS `mynopes` FROM `tb_order` 
		WHERE `amkomet` LIKE '$fullname' AND `orderinv`='1' 
		AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmyprpo($fullname){
        $sql ="SELECT COUNT(`orderid`) AS `myprpo` FROM `tb_order` 
		WHERE `amkomet` LIKE '$fullname' AND `orderstatus` = 'PRPO' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmyrevenue($fullname){
        $sql ="SELECT SUM(`netvalue`) AS `myrevenue` FROM `tb_order` 
		WHERE `amkomet` LIKE '$fullname' AND `orderinv`='1'
		AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmysegment($userid){
        $sql ="SELECT COUNT(`segmentid`) AS `mysegment` FROM `tb_segment` 
		WHERE `marketingid` = '$userid' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmyorderspb($fullname){
        $sql ="SELECT (select `code` from `tb_segment` where `segmentid` = `segment` limit 0,1) AS `segment`,
		SUM(`spbid`) AS `spb` FROM `tb_order` WHERE `amkomet` LIKE '$fullname' 
		AND `orderinv`='1' AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE()) 
		GROUP BY `segment` ORDER BY `segment`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmytotalsegment($fullname){
        $sql ="SELECT (select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `a`.`segment` limit 0,1) AS `segment`,
		SUM(`a`.`netvalue`) AS `totalorder`, (select sum(`z`.`value`) from `tb_spb` `z` where `z`.`orderid` = `a`.`orderid` limit 0,1) AS `totalspb` 
		FROM `tb_order` `a` WHERE `a`.`amkomet` LIKE '$fullname' AND `a`.`orderinv`='1' 
		AND `a`.`status` != '9' AND YEAR (`a`.`invdate`) = YEAR(CURDATE()) 
		GROUP BY `a`.`segment` ORDER BY `a`.`segment`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getmylastorder($fullname){
        $sql ="SELECT * FROM `vw_order` WHERE `amkomet` LIKE '$fullname' AND `status` != '9' 
		AND YEAR (`invdate`) = YEAR(CURDATE()) LIMIT 0,5";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }




    ////////////////////////////////QUICK REPORT/////////////////////////////////////////

    public function gettotalinvestor(){
        $sql ="SELECT COUNT(`investorid`) AS `totalinvestor` FROM `tb_investor`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettotalcontract(){
        $sql ="SELECT COUNT(`indanaid`) AS `totalcontract` FROM `tb_investdana` WHERE `status` = '1'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsuminvest(){
        $sql ="SELECT SUM(`totalinvest`) AS `suminvest` FROM `tb_investdana` WHERE `status` = '1'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcountdes(){
        $sql ="SELECT COUNT(`investorid`) AS `division` FROM `tb_investor` WHERE `location` = 'DES' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcountdgs(){
        $sql ="SELECT COUNT(`investorid`) AS `division` FROM `tb_investor` WHERE `location` = 'DGS'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcountnon(){
        $sql ="SELECT COUNT(`investorid`) AS `division` FROM `tb_investor` WHERE `location` = 'NON'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcountpen(){
        $sql ="SELECT COUNT(`investorid`) AS `division` FROM `tb_investor` WHERE `location` = 'PENSIUN'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettop5investor(){
        $sql ="SELECT `investorid`, `investname`, SUM(`totalinvest`) AS `suminvest` 
		FROM `tb_investdana` WHERE `status` = '1' GROUP BY `investorid` ORDER BY `suminvest` DESC LIMIT 0,5";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcontractstartbymonth(){
        $sql ="SELECT * FROM `tb_investdana` WHERE DAY(DATE_ADD(NOW(), INTERVAL 1 DAY)) = DAY(`startdate`) AND `status` = '1' ORDER BY `startdate` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcontractendbymonth(){
        $sql ="SELECT * FROM `tb_investdana` WHERE MONTH(`endate`) = MONTH(NOW()) AND `status` = '1' ORDER BY `endate` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getcontractendbyday(){
        $sql ="SELECT * FROM `tb_investdana` WHERE MONTH(`endate`) = MONTH(NOW()) AND DAY(DATE_ADD(NOW(), INTERVAL 1 DAY)) = DAY(`endate`) AND `status` = '1' ORDER BY `endate` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsumcontractendbymonth(){
        $sql ="SELECT COUNT(`indanaid`) AS `totalendcontract` FROM `tb_investdana` WHERE MONTH(`endate`) = MONTH(NOW()) AND `status` = '1' ORDER BY `endate` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getorderbyam($username){
        $sql ="SELECT `orderid`,`orderstatus`,`code`,`invdate`,`unit`,`jobtype`,`segment`,`amuser`,`amkomet`,`basevalue`, 
		COUNT(`orderid`) AS `volinv`, 
		SUM(`basevalue`) AS `valinv` 
		FROM `vw_order`
		WHERE `amkomet` = '$username' AND MONTH(`invdate`) = MONTH(NOW())
		AND YEAR(`invdate`) = YEAR(NOW()) 
		GROUP BY `segment` 
		ORDER BY `invdate` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getordercmbyamsegement($username){
        $sql = "SELECT 
                    a.division, a.segment, a.amkomet, COUNT(a.orderid) AS volinv, SUM(a.basevalue) AS valinv,
                    b.name as divisionname,
                    c.name as segmentname
                FROM tb_order a 
                LEFT JOIN tb_division b ON b.divisionid = a.division
                LEFT JOIN tb_segment c ON c.segmentid = a.segment
                WHERE 
                    a.status != 9
                    AND a.amkomet = '". $username ."'
                    AND MONTH(a.invdate) = MONTH(NOW()) 
                    AND YEAR(a.invdate) = YEAR(NOW()) 
                GROUP BY a.segment
                ORDER BY valinv DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function mysegmentnotorder($username){
        $sql = "SELECT 
                    a.division, a.segment, a.amkomet, COUNT(a.orderid) AS volinv, SUM(a.basevalue) AS valinv,
                    b.name as divisionname,
                    c.name as segmentname
                FROM tb_order a 
                LEFT JOIN tb_division b ON b.divisionid = a.division
                LEFT JOIN tb_segment c ON c.segmentid = a.segment
                WHERE 
                    a.status != 9
                    AND a.amkomet = '". $username ."'
                    AND a.invdate BETWEEN '2021-01-01' AND CURDATE() 
                GROUP BY a.segment
                ORDER BY valinv DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getordercmbyam($username){
        $sql = "SELECT 
                    *
                FROM vw_order
                WHERE 
                status != 9
                AND amkomet = '". $username ."'
                AND MONTH(invdate) = MONTH(NOW()) 
                AND YEAR(invdate) = YEAR(NOW()) 
                ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getvalvolordercmbyam($username){
        $sql = "SELECT 
                    COUNT(orderid) as volinv, SUM(basevalue) AS valinv, amkomet
                FROM tb_order
                WHERE 
                status != 9
                AND amkomet = '". $username ."'
                AND MONTH(invdate) = MONTH(NOW()) 
                AND YEAR(invdate) = YEAR(NOW()) 
                ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettotalorderbyam($username){
        $sql ="SELECT `orderid`,`orderstatus`,`code`,`invdate`,`unit`,`jobtype`,`segment`,`amuser`,`amkomet`,`basevalue`, `status`,
		COUNT(`orderid`) AS `volinv`, 
		SUM(`basevalue`) AS `valinv` 
		FROM `vw_order`
		WHERE `status` != '9' 
		AND `amkomet` = '$username' AND MONTH(`invdate`) = MONTH(NOW())
		AND YEAR(`invdate`) = YEAR(NOW()) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettotalorder(){
        $sql ="SELECT `orderid`,`orderstatus`,`code`,`invdate`,`unit`,`jobtype`,`segment`,`amuser`,`amkomet`,`basevalue`, `status`,
		COUNT(`orderid`) AS `volinv`, 
		SUM(`basevalue`) AS `valinv` 
		FROM `vw_order`
		WHERE `status` != '9'  AND MONTH(`invdate`) = MONTH(NOW())
		AND YEAR(`invdate`) = YEAR(NOW()) ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    //approval
    /* public function gettotalapprovalbyam($username){
        $sql ="SELECT * FROM `tb_spbfiling` WHERE `amname` = '$username'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    } */

    public function getapprovaldate(){
        $sql ="SELECT MAX(`filingdate`) as `lastdate` FROM `tb_spbfiling`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getapprovalnextday(){
        $sql ="SELECT DATE_ADD(MAX(`filingdate`), INTERVAL 1 DAY) as `nextday` FROM `tb_spbfiling`";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettotalapprovalbyam($username,$unit,$checkdate){
        $sql ="SELECT * FROM `tb_spbfiling` WHERE `amname` = '$username' AND `unit` = '$unit'";
        if ( date('Y-m-d') == $checkdate) {
            $sql .= " AND `filingdate` = CURDATE() ";
        } else {
            $sql .= " AND `filingdate` = DATE_ADD(CURDATE(), INTERVAL -1 DAY) ";
        }
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getsinglespbinvapproval($id) {
        $sql = "SELECT `a`.`spbid`, `a`.`orderid`, `b`.`orderstatus`, `b`.`code` AS `codeinv`,`b`.`invnum`,`b`.`invdate`,
		`b`.`unit`,`b`.`projectname`,`a`.`code`,`a`.`jobtype`, `a`.`applicant`, `a`.`value`, `b`.`netvalue`, `b`.`negovalue`,
		(select sum(`z`.`value`) as `totalvalue` from `tb_spb` z where `z`.`orderid` = `a`.`orderid` AND `z`.`status` = '1') AS `totalvalue`,
		((select sum(`z`.`value`) as `totalvalue` from `tb_spb` z where `z`.`orderid` = `a`.`orderid` AND `z`.`status` = '1') - `a`.`value`) AS `saldovalue`,
		`a`.`customer`,
		(select `z`.`code` from `tb_segment` `z` where `z`.`segmentid` = `b`.`segment` limit 0,1) AS `segment`,
		`a`.`info`, `a`.`spbdat`, `a`.`typeofpayment`, `a`.`accnumber`, `a`.`accname`, `a`.`bank`, `a`.`bankother`, `a`.`processdate`,
		`a`.`file`, `a`.`status`, `b`.`status` AS `invstatus`, `b`.`vrecnum`,
		(select `z`.`notes` from `tb_billco` `z` where `z`.`orderid` = `b`.`orderid` limit 0,1) AS `invnotes`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`cruser`) limit 0,1) AS `cruser`,
		`a`.`crdat`, 
		(select `z`.`fullname` from `vw_useraccounts` `z` where (`z`.`userid` = `a`.`chuser`) limit 0,1) AS `chuser`, 
		`a`.`chdat`
        FROM `tb_spb` a JOIN `tb_order` b WHERE `a`.`spbid`='$id' AND `a`.`orderid` = `b`.`orderid` ORDER BY `a`.`code` ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }



    /// NEW APPROVAL
    public function gettotalaprvbyam($username,$unit){
        $sql ="SELECT `a`.*, `b`.*,
		(SELECT `z`.`invnum` FROM `vw_order` `z` WHERE (`z`.`orderid` = `b`.`orderid`) LIMIT 0,1) AS `invnum`,
		(SELECT `z`.`status` FROM `vw_order` `z` WHERE (`z`.`orderid` = `b`.`orderid`) LIMIT 0,1) AS `invstatus`, 
		(SELECT `z`.`segment` FROM `vw_order` `z` WHERE (`z`.`orderid` = `b`.`orderid`) LIMIT 0,1) AS `segment`
		FROM `tb_spbaprv` `a` JOIN `tb_spb` `b`
		WHERE `a`.`spbid` = `b`.`spbid`  
		AND `a`.`amname` = '$username' AND `a`.`unit` = '$unit' AND `a`.`aprvdate` > CURDATE() ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getaprvdate(){
        $sql ="SELECT `aprvdate` FROM `tb_spbaprv` WHERE `aprvdate` > CURDATE() LIMIT 1 ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettotalvolvalam($amname,$unit){
        $sql ="SELECT `spbaprvid`,`unit`,`aprvdate`,`amname`, COUNT(`spbaprvid`) AS `volspb`, 
		SUM(`spbval`) AS `valspb` 
		FROM `tb_spbaprv` 
		WHERE `amname` = '$amname' AND `unit` = '$unit' AND `aprvdate` > CURDATE()";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    /////COUNT INVOICE on MENU//////

    public function countnopeskomet(){
        $sql = "SELECT COUNT(`orderid`) AS `tnopesk` 
		FROM `vw_order` WHERE `orderinv`='1' 
		AND `unit` = 'KOMET' AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countnopesmesra(){
        $sql = "SELECT COUNT(`orderid`) AS `tnopesm` 
		FROM `vw_order` WHERE `orderinv`='1' 
		AND `unit` = 'MESRA' AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countnopespadi(){
        $sql = "SELECT COUNT(`orderid`) AS `tnopesp` 
		FROM `vw_order` WHERE `orderinv`='1' 
		AND `unit` = 'PADI' AND `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countprpokomet(){
        $sql = "SELECT COUNT(`orderid`) AS `tprpok` 
		FROM `vw_order` WHERE `orderstatus` = 'PRPO' 
		AND `unit` = 'KOMET'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countprpomesra(){
        $sql = "SELECT COUNT(`orderid`) AS `tprpom` 
		FROM `vw_order` WHERE `orderstatus` = 'PRPO' 
		AND `unit` = 'MESRA'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countprpopadi(){
        $sql = "SELECT COUNT(`orderid`) AS `tprpop` 
		FROM `vw_order` WHERE `orderstatus` = 'PRPO' 
		AND `unit` = 'PADI'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countspbkomet(){
        $sql = "SELECT COUNT(`a`.`spbid`) AS `tspbk` 
		FROM `tb_spb` `a`
        JOIN `tb_order` `b`
        WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = 'KOMET' AND `a`.`status` != '9' AND YEAR (`a`.`spbdat`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countspbmesra(){
        $sql = "SELECT COUNT(`a`.`spbid`) AS `tspbm` 
		FROM `tb_spb` `a`
        JOIN `tb_order` `b`
        WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = 'MESRA' AND `a`.`status` != '9' AND YEAR (`a`.`spbdat`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function countspbpadi(){
        $sql = "SELECT COUNT(`a`.`spbid`) AS `tspbp` 
		FROM `tb_spb` `a`
        JOIN `tb_order` `b`
        WHERE `a`.`orderid` = `b`.`orderid` 
		AND `b`.`unit` = 'PADI' AND `a`.`status` != '9' AND YEAR (`a`.`spbdat`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getcutitoday(){
        $q = "
			SELECT * FROM tb_offwork AS a
			LEFT JOIN tb_user AS b ON b.userid = a.userid
			WHERE CURDATE() BETWEEN a.sdate AND a.edate ORDER BY a.offworkid DESC
		";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function gettotalcutitoday(){
        $q = "SELECT COUNT(offworkid) AS total FROM tb_offwork WHERE CURDATE() BETWEEN sdate AND edate ORDER BY offworkid DESC";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function gettotalabsen(){
        $q = "SELECT userid FROM tb_attendances WHERE DATE(datetime) = CURDATE() AND status IN(1,3) GROUP BY userid";
        $sql = $this->db->query($q);
        $total = $sql->result_array();
        $data = count($total);
        $this->db->close();

        return $data;
    }

    function gettotaltanpaketerangan(){
        $q = "SELECT COUNT(*) AS total FROM tb_attendances WHERE DATE(datetime) = CURDATE() AND status = 0";
        $sql = $this->db->query($q);
        $total = $sql->result_array();
        $data = $total[0]['total'];
        $this->db->close();

        return $data;
    }

    function gettotalvisit(){
        $q = "SELECT COUNT(*) AS total FROM tb_attendances WHERE DATE(datetime) = CURDATE() AND status = 6";
        $sql = $this->db->query($q);
        $total = $sql->result_array();
        $data = $total[0]['total'];
        $this->db->close();

        return $data;
    }

    function getamvisit(){
        $q = "SELECT a.*, b.fullname FROM tb_attendances a LEFT JOIN tb_user b ON b.userid = a.userid 
                WHERE DATE(a.datetime) = CURDATE() AND a.status = 6";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getreportsegmen($param){
        $where = ' 1=1 ';

        if($param['optTipe'] == 'nopes'){
            $where .= " AND a.`orderinv`='1' ";

            /* JIKA NOPES FILTER STATUS DIGUNAKAN */
            if($param['optStatus'] == '1'){
                $where .= " AND a.status = '1' ";
            }else{
                $where .= " AND a.status != 9 AND a.status != 1 ";
            }
        }else{
            $where .= " AND a.orderstatus = 'PRPO' ";
        }

        if($param['optTahunSegment'] == 'all'){
            $where .= " AND YEAR(a.invdate) != '2018' ";
        }else{
            $where .= " AND YEAR(a.invdate) = '". $param['optTahunSegment'] ."' ";
        }

        $q = "
            SELECT 
                SUM(a.netvalue) AS total_tabungan,
                c.code as code_division,
                b.name AS name_segmen,
                a.segment
            FROM tb_order a 
                LEFT JOIN tb_segment b ON b.segmentid = a.segment
                LEFT JOIN tb_division c ON c.divisionid = a.division
            WHERE 
                ". $where ."
                AND a.segment != ''
            GROUP BY a.segment
            ORDER BY c.divisionid
            ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getTotalSpb($segment,$param){
        $where = ' 1=1 ';

        if($param['optTipe'] == 'nopes'){
            $where .= " AND a.`orderinv`='1' ";

            /* JIKA NOPES FILTER STATUS DIGUNAKAN */
            if($param['optStatus'] == '1'){
                $where .= " AND a.status = '1' ";
            }else{
                $where .= " AND a.status != 9 AND a.status != 1";
            }
        }else{
            $where .= " AND a.orderstatus = 'PRPO' ";
        }

        if($param['optTahunSegment'] == 'all'){
            $where .= " AND YEAR(a.invdate) != '2018' ";
        }else{
            $where .= " AND YEAR(a.invdate) = '". $param['optTahunSegment'] ."' ";
        }

        $q = "
            SELECT SUM(value) AS totalspb FROM tb_spb WHERE
            orderid IN(
                SELECT orderid FROM tb_order a WHERE
                ". $where ."
                AND a.segment = '". $segment ."'
            )
            ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    ////////////////////PADI////////////////

    public function getvalpadi(){
        $sql = "SELECT LAST_DAY (`invdate`) AS `month`, SUM(`basevalue`) AS `valinv` FROM `vw_order`
				WHERE `orderinv`='1' 
				AND `jobtype` = 'PD' AND YEAR (`invdate`) = YEAR(CURDATE())
				GROUP BY LAST_DAY (`invdate`) ORDER BY LAST_DAY (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettotalpadi(){
        $sql = "SELECT SUM(`basevalue`) AS `totalvalue` FROM `vw_order` WHERE `jobtype` = 'PD' AND YEAR (`invdate`) = YEAR(CURDATE())";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function belumabsen($cuti){
        $query = "SELECT username FROM tb_user WHERE  
                `status` = 1
                AND `roleid` != 1
                AND `roleid` != 2
                AND `roleid` != 3
                AND userid NOT IN (SELECT userid FROM tb_attendances where DATE(`datetime`) = CURDATE())
				".$cuti;
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    function getallreport($param){
        $where = 'WHERE 1=1';
        $sorting = '';
        $add_select = '';
        $add_join = '';

        if($param['optUnit'] != 'all'){
            $where .= " AND a.unit = '".$param['optUnit']."' ";
        }

        if($param['optDivision'] != 'all'){
            $where .= " AND b.code = '".$param['optDivision']."' ";
        }

        if($param['optSegment'] != 'all'){
            $where .= " AND c.code = '".$param['optSegment']."' ";
        }

        if($param['optTipe'] != 'all'){
            if($param['optTipe'] == 'invoice'){
                $where .= " AND a.orderstatus IN ('NOPES','PADI','IBL','OBL')";
            }else{
                $where .= " AND a.orderstatus = '".$param['optTipe']."' ";
            }
        }
        
        if($param['optJob'] != 'all'){
            if($param['optJob'] == 'invoice'){
                $where .= " AND a.jobtype NOT IN ('TK','SM','HT','NA')";
            }else{
                $where .= " AND a.jobtype = '".$param['optJob']."' ";
            }
        }

        if($param['optSPB'] != 'all'){
            $where .= " AND a.spbid = '".$param['optSPB']."' ";
        }

        if($param['optSPB'] == '1'){
            $add_select .= ", d.totalspb";
            $add_join .= " LEFT JOIN (SELECT orderid, SUM(value) AS totalspb FROM tb_spb WHERE status = 1 GROUP BY orderid) d ON d.orderid = a.orderid";
        }

        if($param['optStatinv'] != 'all'){
            if($param['optStatinv'] == 'belumcair'){
                $where .= " AND a.status != 1 AND a.status != 9 ";   /* belum cair */
            }elseif($param['optStatinv'] == 1){
                $where .= " AND a.status = 1 ";   /* cair */
            }else{
                $where .= " AND a.status = '".$param['optStatinv']."' "; /* forecastin/verifikasi belom ke grab */
            }
        }else{
            $where .= " AND a.status != 9 ";
        }

        if(isset($param['optBulan']) && $param['optBulan'] != 'all'){
            $where .= " AND MONTH(a.invdate) = '". $param['optBulan'] ."'";
        }

        if(isset($param['optTahun']) && $param['optTahun'] != 'all'){
            $where .= " AND YEAR(a.invdate) = '". $param['optTahun'] ."'";
        }

        if(!empty($param['txtStartInvdate']) && !empty($param['txtEndInvdate'])){
            $where .= " AND a.invdate BETWEEN '". $param['txtStartInvdate'] ."' AND '". $param['txtEndInvdate'] ."'";
        }

        if(!empty($param['optSorting']) && !empty($param['optSorting'])){
            if($param['optSorting'] == 'sort_tglinv_asc'){
                $sorting .= " ORDER BY a.invdate ASC";
            }elseif($param['optSorting'] == 'sort_tglinv_desc'){
                $sorting .= " ORDER BY a.invdate DESC";
            }elseif($param['optSorting'] == 'sort_basevalue_asc'){
                $sorting .= " ORDER BY ABS(a.basevalue) ASC";
            }elseif($param['optSorting'] == 'sort_basevalue_desc'){
                $sorting .= " ORDER BY ABS(a.basevalue) DESC";
            }else{
                $sorting .= " ORDER BY a.code DESC";
            }
        }

        $sql = "
                SELECT 
                    a.orderid, a.unit, a.orderstatus, a.status, a.spbid, a.invdate, a.basevalue, a.netvalue, a.jstvalue, a.negovalue, a.vrecvalue, a.invnum,
                    a.faknum,a.spknum, a.code, a.amkomet, a.amuser, a.projectname, a.procdat,
                    b.code AS code_division, b.name AS name_division,
                    c.code AS code_segment, c.name AS name_segment
					". $add_select ."
                FROM tb_order a
                LEFT JOIN tb_division b ON b.divisionid = a.division
                LEFT JOIN tb_segment c ON a.segment = c.segmentid 
                ". $add_join ." 
                ".$where."
                ".$sorting;
        $query = $this->db->query($sql);

        $data = $query->result_array();
        $this->db->close();

        return $data;
    }

    function prinallreport($param){
        $where = 'WHERE 1=1';
        $sorting = '';
        $add_select = '';
        $add_join = '';

        if($param['optUnit'] != 'all'){
            $where .= " AND a.unit = '".$param['optUnit']."' ";
        }

        if($param['optDivision'] != 'all'){
            $where .= " AND b.code = '".$param['optDivision']."' ";
        }

        if($param['optSegment'] != 'all'){
            $where .= " AND c.code = '".$param['optSegment']."' ";
        }

        if($param['optTipe'] != 'all'){
            if($param['optTipe'] == 'invoice'){
                $where .= " AND a.orderstatus IN ('NOPES','PADI','IBL','OBL')";
            }else{
                $where .= " AND a.orderstatus = '".$param['optTipe']."' ";
            }
        }

        if($param['optSPB'] != 'all'){
            $where .= " AND a.spbid = '".$param['optSPB']."' ";
        }

        if($param['optSPB'] == '1'){
            $add_select .= ", d2.totalspb";
            $add_join .= " LEFT JOIN (SELECT orderid, SUM(value) AS totalspb FROM tb_spb WHERE status = 1 GROUP BY orderid) d2 ON d2.orderid = a.orderid";
        }

        if($param['optStatinv'] != 'all'){
            if($param['optStatinv'] == 'belumcair'){
                $where .= " AND a.status != 1 AND a.status != 9 ";   /* belum cair */
            }elseif($param['optStatinv'] == 1){
                $where .= " AND a.status = 1 ";   /* cair */
            }else{
                $where .= " AND a.status = '".$param['optStatinv']."' "; /* forecastin/verifikasi belom ke grab */
            }
        }else{
            $where .= " AND a.status != 9 ";
        }

        if(isset($param['optBulan']) && $param['optBulan'] != 'all'){
            $where .= " AND MONTH(a.invdate) = '". $param['optBulan'] ."'";
        }

        if(isset($param['optTahun']) && $param['optTahun'] != 'all'){
            $where .= " AND YEAR(a.invdate) = '". $param['optTahun'] ."'";
        }

        if(!empty($param['txtStartInvdate']) && !empty($param['txtEndInvdate'])){
            $where .= " AND a.invdate BETWEEN '". $param['txtStartInvdate'] ."' AND '". $param['txtEndInvdate'] ."'";
        }

        if(!empty($param['optSorting']) && !empty($param['optSorting'])){
            if($param['optSorting'] == 'sort_tglinv_asc'){
                $sorting .= " ORDER BY a.invdate ASC";
            }elseif($param['optSorting'] == 'sort_tglinv_desc'){
                $sorting .= " ORDER BY a.invdate DESC";
            }elseif($param['optSorting'] == 'sort_basevalue_asc'){
                $sorting .= " ORDER BY ABS(a.basevalue) ASC";
            }elseif($param['optSorting'] == 'sort_basevalue_desc'){
                $sorting .= " ORDER BY ABS(a.basevalue) DESC";
            }else{
                $sorting .= " ORDER BY a.code DESC";
            }
        }

        $sql = "
                SELECT 
                    a.orderid, a.unit, a.orderstatus, a.status, a.spbid, a.invdate, a.basevalue, a.netvalue, a.jstvalue, a.negovalue, a.vrecvalue, a.invnum,
                    a.faknum,a.spknum, a.code, a.amkomet, a.amuser, a.projectname, a.procdat, a.chdat, a.chuser,
                    b.code AS code_division, b.name AS name_division, 
                    c.code AS code_segment, c.name AS name_segment,
                    d1.totalvalspb,
                    e.crdat AS tgltrack, e.chdat AS bytrack,
                    f.crdat AS tglbillco, f.chdat AS bybillco
					". $add_select ."
                FROM tb_order a
                LEFT JOIN tb_division b ON b.divisionid = a.division
                LEFT JOIN tb_segment c ON a.segment = c.segmentid
                LEFT JOIN (SELECT orderid, SUM(`value`) AS totalvalspb FROM tb_spb WHERE status != '9' GROUP BY orderid) d1 ON d1.orderid = a.orderid 
                LEFT JOIN tb_trackorder e ON a.orderid = e.orderid
                LEFT JOIN tb_billco f ON a.orderid = f.orderid
                ". $add_join ." 
                ".$where."
                GROUP BY a.orderid
                ".$sorting;
        $query = $this->db->query($sql);

        $data = $query->result_array();
        $this->db->close();

        return $data;
    }

    function getallreportspb($param){
        $where = 'WHERE 1=1';

        if($param['optStatinv'] != 'all'){
            if($param['optStatinv'] == 0){
                $where .= " AND b.status != 1 AND a.status != 9 ";   /* belum cair */
            }elseif($param['optStatinv'] == 1){
                $where .= " AND b.status = 1 ";   /* cair */
            }else{
                $where .= " AND b.status = '".$param['optStatinv']."' "; /* forecastin/verifikasi belom ke grab */
            }

            $additionalselect = 'SUM(a.value) AS value,'; /* ditotalin jumlah valspb berdasarkan orderid inv yg sama */
            $groupby = ' GROUP BY a.orderid';
        }else{
            $where .= " AND b.status != 9 ";

            $additionalselect = 'a.value,';
            $groupby = '';
        }

        if($param['optTipe'] != 'all'){
            $where .= " AND b.orderstatus = '".$param['optTipe']."' ";
        }

        if($param['optBulan'] != 'all'){
            $where .= " AND MONTH(a.spbdat) = '". $param['optBulan'] ."'";
        }

        if($param['optTahun'] != 'all'){
//            $where .= " AND a.spbdat BETWEEN '2024-01-01' AND '2024-02-13' ";
            $where .= " AND YEAR(a.spbdat) = '". $param['optTahun'] ."'";
        }

        $sql = "
                SELECT 
                    a.spbid, a.orderid, 
                    a.code,a.applicant,
                    ". $additionalselect ."
                    a.customer, a.info, a.spbdat, a.typeofpayment, a.accnumber, a.accname, a.bank, a.bankother, 
                    a.processdate, a.status,
                    b.jobtype, b.orderstatus, b.status AS statinv, b.unit, b.code AS codeinv, b.invnum, b.spknum, b.spkdat, 
                    b.invdate, b.projectname, b.basevalue, b.negovalue, 
                    b.procdat,
                    c.name AS segment  
                FROM tb_spb a
                LEFT JOIN tb_order b  ON b.orderid = a.orderid
                LEFT JOIN tb_segment c ON b.segment = c.segmentid 
                    ".$where." 
                    ".$groupby." 
                ORDER BY a.spbid DESC";
        $query = $this->db->query($sql);

        $data = $query->result_array();
        $this->db->close();

        return $data;
    }

    function getallreportcoll($param){
        $where = 'WHERE 1=1';
        if($param['optUnit'] != 'all'){
            $where .= " AND a.unit = '".$param['optUnit']."' ";
        }

        if($param['optDivision'] != 'all'){
            $where .= " AND b.code = '".$param['optDivision']."' ";
        }

        if($param['optSegment'] != 'all'){
            $where .= " AND c.code = '".$param['optSegment']."' ";
        }

        if($param['optTipe'] != 'all'){
            $where .= " AND a.orderstatus = '".$param['optTipe']."' ";
        }

        if($param['optSPB'] != 'all'){
            $where .= " AND a.spbid = '".$param['optSPB']."' ";
        }

        if($param['optStatinv'] != 'all'){
            if($param['optStatinv'] == 0){
                $where .= " AND a.status != 1 AND a.status != 9 ";   /* belum cair */
            }elseif($param['optStatinv'] == 1){
                $where .= " AND a.status = 1 ";   /* cair */
            }else{
                $where .= " AND a.status = '".$param['optStatinv']."' "; /* forecastin/verifikasi belom ke grab */
            }
        }else {
            $where .= " AND a.status IN(10,18,8) ";
        }

//        if($param['optBulan'] != 'all'){
//            $where .= " AND MONTH(a.invdate) = '". $param['optBulan'] ."'";
//        }
//
//        if($param['optTahun'] != 'all'){
//            $where .= " AND YEAR(a.invdate) = '". $param['optTahun'] ."'";
//        }

        if(!empty($param['txtStartInvdate']) && !empty($param['txtEndInvdate'])){
            $where .= " AND a.invdate BETWEEN '". $param['txtStartInvdate'] ."' AND '". $param['txtEndInvdate'] ."'";
        }

        $sql = "
                SELECT
                CASE a.status
                    WHEN '10' THEN FORMAT(SUM(a.basevalue), 0)
                    WHEN '18' THEN FORMAT(SUM(a.basevalue), 0)
                    WHEN '8' THEN FORMAT(SUM(a.basevalue), 0)
                    ELSE NULL
                END AS volinv,
                CASE a.status
                    WHEN '10' THEN 'Forecast Pencairan'
                    WHEN '18' THEN 'Verifikasi Keuangan'
                    WHEN '8' THEN 'Posting Keuangan'
                    ELSE NULL
                END AS status,
                CASE a.status
                    WHEN '10' THEN COUNT(a.orderid)
                    WHEN '18' THEN COUNT(a.orderid)
                    WHEN '8' THEN COUNT(a.orderid)
                    ELSE NULL
                END AS total_inv,
                c.code AS code_segment, c.name AS name_segment,
                a.status AS statinv
                FROM tb_order a
                LEFT JOIN tb_division b ON b.divisionid = a.division
                LEFT JOIN tb_segment c ON a.segment = c.segmentid ".$where."
                GROUP BY a.status 
                ORDER BY a.code DESC";
        $query = $this->db->query($sql);

        $data = $query->result_array();
        $this->db->close();

        return $data;
    }

    function getallreportyear($param){
        $where = 'WHERE 1=1';
        if($param['optUnit'] != 'all'){
            $where .= " AND a.unit = '".$param['optUnit']."' ";
        }

        if($param['optDivision'] != 'all'){
            $where .= " AND b.code = '".$param['optDivision']."' ";
        }

        if($param['optSegment'] != 'all'){
            $where .= " AND c.code = '".$param['optSegment']."' ";
        }

        if($param['optTipe'] != 'all'){
            $where .= " AND a.orderstatus = '".$param['optTipe']."' ";
        }

        if($param['optSPB'] != 'all'){
            $where .= " AND a.spbid = '".$param['optSPB']."' ";
        }

        if($param['optStatinv'] != 'all'){
            if($param['optStatinv'] == 0){
                $where .= " AND a.status != 1 AND a.status != 9 ";   /* belum cair */
            }elseif($param['optStatinv'] == 1){
                $where .= " AND a.status = 1 ";   /* cair */
            }else{
                $where .= " AND a.status = '".$param['optStatinv']."' "; /* forecastin/verifikasi belom ke grab */
            }
        }else{
            $where .= " AND a.status != 9 ";
        }

//        if($param['optBulan'] != 'all'){
//            $where .= " AND MONTH(a.invdate) = '". $param['optBulan'] ."'";
//        }
//
//        if($param['optTahun'] != 'all'){
//            $where .= " AND YEAR(a.invdate) = '". $param['optTahun'] ."'";
//        }

        if(!empty($param['txtStartInvdate']) && !empty($param['txtEndInvdate'])){
            $where .= " AND a.invdate BETWEEN '". $param['txtStartInvdate'] ."' AND '". $param['txtEndInvdate'] ."'";
        }

        /* ada case jika invnum 0 ambil negovalue else basevalue. belum dhitung ini */
        $sql = "
                SELECT 
                    invdate, name_segment, COUNT(*) AS total_inv, invnum, 
                    SUM(negovalue) AS total_negovalue, SUM(basevalue) AS total_basevalue,
                    FORMAT(SUM(negovalue), 0) AS total_negovalue_format, FORMAT(SUM(basevalue),0) AS total_basevalue_format,
                    CASE MONTH(invdate)
                    WHEN '01' THEN 'Jan'
                    WHEN '02' THEN 'Feb'
                    WHEN '03' THEN 'Mar'
                    WHEN '04' THEN 'Apr'
                    WHEN '05' THEN 'Mei'
                    WHEN '06' THEN 'Jun'
                    WHEN '07' THEN 'Jul'
                    WHEN '08' THEN 'Agu'
                    WHEN '09' THEN 'Sep'
                    WHEN '10' THEN 'Okt'
                    WHEN '11' THEN 'Nov'
                    WHEN '12' THEN 'Des'
                    ELSE NULL
                    END AS bulan
                FROM 
                (
                    SELECT 
                        a.orderid, a.unit, a.orderstatus, a.status, a.spbid, a.invdate, a.basevalue, a.netvalue, a.jstvalue, a.negovalue, a.vrecvalue, a.invnum,
                        a.faknum, a.code, a.amkomet,
                        b.code AS code_division, b.name AS name_division,
                        c.code AS code_segment, c.name AS name_segment
                    FROM tb_order a
                    LEFT JOIN tb_division b ON b.divisionid = a.division
                    LEFT JOIN tb_segment c ON a.segment = c.segmentid " . $where . " 
                    ORDER BY a.code DESC
                ) cr
                GROUP BY MONTH(cr.invdate), cr.name_segment
                ORDER BY cr.invdate ASC";
        $query = $this->db->query($sql);

        $data = $query->result_array();
        $this->db->close();

        return $data;
    }

    ///////////////POP UP ALERT COLLECTION///////////////////////
    public function getalertnopes(){
        $sql = "SELECT COUNT(`orderid`) AS `totalnopes` 
		FROM `vw_order` WHERE `status` != 9 AND `status` != 1 
		AND YEAR(`invdate`) = YEAR(CURDATE()) 
		AND `basevalue` <= 50000000 AND DATEDIFF(CURDATE(),`invdate`) >= 60";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getsumq(){
        $sql = "SELECT QUARTER(`invdate`) AS `Q`, FLOOR(SUM(`basevalue`)) AS `value` 
		FROM `vw_order` WHERE `status` != '9' AND YEAR (`invdate`) = YEAR(CURDATE()) 
		AND `orderstatus` != 'PRPO' GROUP BY QUARTER (`invdate`) ORDER BY QUARTER (`invdate`)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getalertnopesprpoprevyear(){
        $sql = "SELECT 
                    YEAR(invdate) AS tahun, 
                    COUNT(CASE WHEN basevalue < 50000000 THEN orderid END) AS nopes,
                    COUNT(CASE WHEN basevalue >= 50000000 THEN orderid END) AS prpo  
                FROM tb_order
                WHERE 
                    status != 9 AND status != 1
                    AND YEAR(invdate) != YEAR(CURDATE())
                    AND YEAR(invdate) >= 2021
                GROUP BY YEAR(invdate) 
                ORDER BY invdate DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getcollectionyear() {
		$sql = "SELECT YEAR(invdate) AS tahun, SUM(basevalue) AS totalvalue 
		FROM vw_order WHERE status != 9 AND status != 1 AND `orderinv`='1' 
		AND YEAR(invdate) >= 2021 GROUP BY YEAR(invdate) ORDER BY invdate ASC";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}

    public function getalertprpo(){
        $sql = "SELECT COUNT(`orderid`) AS `totalprpo` 
		FROM `vw_order` WHERE `status` != 9 AND `status` != 1 
		AND YEAR(`invdate`) = YEAR(CURDATE()) 
		AND `basevalue` >= 50000000 AND DATEDIFF(CURDATE(),`invdate`) >= 120";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallalertnopes(){
        $sql = "SELECT *,DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order` WHERE `status` != 9 AND `status` != 1 
		-- AND YEAR(`invdate`) = YEAR(CURDATE()) 
        AND YEAR(invdate) >= 2021
		AND `basevalue` <= 50000000 AND DATEDIFF(CURDATE(),`invdate`) >= 60
		ORDER BY invdate ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getallalertprpo(){
        $sql = "SELECT *,DATEDIFF(CURDATE(),`invdate`) AS `intervaldat` FROM `vw_order` WHERE `status` != 9 AND `status` != 1 
		-- AND YEAR(`invdate`) = YEAR(CURDATE()) 
        AND YEAR(invdate) >= 2021
		AND `basevalue` >= 50000000 AND DATEDIFF(CURDATE(),`invdate`) >= 120
		ORDER BY invdate ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getlastletter($type) {
        $sql = "SELECT * FROM tb_letter WHERE type = '".$type."' ORDER BY letterid DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function gettargetam($marketing_id){
        $whereclause = '';
        $groupby = '';
        $sql = "SELECT 
                    MONTH(a.invdate), MONTHNAME(a.invdate) AS month, SUM(a.basevalue) AS realisasi, b.target
                FROM tb_order AS a
                LEFT JOIN (
                    SELECT * FROM
                    tb_targetam
                    WHERE tahun = YEAR(CURRENT_DATE)
                    AND amid = '". $marketing_id ."'
                    GROUP BY amid,bulan
                ) AS b ON b.bulan = MONTH(invdate)
                WHERE 
                a.segment IN( (SELECT segmentid FROM tb_segment WHERE marketingid = '". $marketing_id ."' AND status = 1) )
                AND YEAR(a.invdate) = YEAR(CURRENT_DATE) 
                AND a.status != 9
                GROUP BY MONTH(a.invdate);";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function gettargetsegment($marketingid){
        $whereclause = '';
        $groupby = '';
        $sql = "SELECT 
                    a.segmentid, a.code AS segmentcode, a.name AS segmentname, 
                    kms.am, kms.target, kms.realisasi, kms.status
                FROM tb_segment AS a
                LEFT JOIN (
                    SELECT 
                        d.orderid,
                        a.segmentid, a.code AS segmentcode, a.name AS segmentname,
                        b.fullname AS am, 
                        c.target, SUM(d.basevalue) AS realisasi, d.status
                    FROM tb_segment AS a
                    LEFT JOIN tb_user AS b ON b.userid = a.marketingid
                    LEFT JOIN tb_targetsegment AS c ON c.segmentid = a.segmentid
                    LEFT JOIN tb_order AS d ON d.segment = a.segmentid
                    WHERE
                        YEAR(d.invdate) = YEAR(CURRENT_DATE) 
                        AND d.status != 9
                        AND a.status = 1
                    GROUP BY a.segmentid
                ) AS kms ON kms.segmentid = a.segmentid
                WHERE 
                a.marketingid = '". $marketingid ."'
                AND a.status = 1";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function get_spb_cm(){
        $sql = "SELECT 
                    a.spbid, a.code, a.crdat AS tanggal_spb, a.status, a.processdate AS tanggal_cair,
                    b.unit 
                FROM tb_spb a 
                LEFT JOIN tb_order b ON b.orderid = a.orderid
                WHERE 
                    YEAR(a.crdat) = '". date('Y') ."' 
                    AND MONTH(a.crdat) = '". date('m') ."'
                ORDER BY a.spbid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function get_spb_cm_unit($unit){
        $sql = "SELECT 
                    COUNT(a.spbid) as total_spb
                FROM tb_spb a 
                LEFT JOIN tb_order b ON b.orderid = a.orderid
                WHERE 
                    YEAR(a.crdat) = '". date('Y') ."' 
                    AND MONTH(a.crdat) = '". date('m') ."'
                    AND b.unit = '". $unit ."'";
        $stmt = $this->db->query($sql);
        $total = $stmt->result_array();
        return $total[0]['total_spb'];
    }

    function get_budget_byspb($spbid){
        $sql = "SELECT 
                    budgetid, spbid, unit, crdat AS tanggal_budget 
                FROM tb_budget  
                WHERE 
                    spbid LIKE '%". $spbid ."%' ";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function get_total_order_segment($divisionid){
        $sql = "SELECT 
                    a.segment, b.code, b.name, COUNT(a.orderid) AS total_order, a.unit, c.code as divname
                FROM tb_order a
                LEFT JOIN tb_segment b ON b.segmentid = a.segment
                LEFT JOIN tb_division c ON c.divisionid = b.divisionid
                WHERE 
                    a.segment IN(8,13,20,237,138,207,212,5,6,7,9,12,14,43,196,204,206,23,24,28,29,30,210,214,199,200,201,
					202,203,208,209,211,217,219,228,260,261,262,263,264,265,266,267,268,283,269,270,271,272,273,274,275,
					276,277,256,258,278,279,280,282,285,287,289,290) 
                    AND c.divisionid = '". $divisionid ."' 
                    AND YEAR(a.invdate) = YEAR(CURDATE())
                    AND MONTH(a.invdate) = MONTH(CURDATE())
                GROUP BY a.segment
                ORDER BY total_order ASC;";
        $stmt = $this->db->query($sql); 
        return $stmt->result_array();
    }

    function get_total_order_unit($division, $segment, $unit){
        $sql = "SELECT 
                    COUNT(*) as total, unit 
                FROM tb_order
                WHERE 
                    segment = '". $segment ."'
                    AND division = '". $division ."'
                    AND YEAR(invdate) = YEAR(CURDATE())
                    AND MONTH(invdate) = MONTH(CURDATE())
                    AND unit = '". $unit ."'";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['total'];
    }
	
	public function getprospectcm(){
		$sql = "SELECT b.code AS division, SUM(a.value) AS totalvalue FROM tb_prospectorder a
                LEFT JOIN tb_division b ON b.divisionid = a.division
                WHERE b.divisionid IN(1,2,3,4,5,6)
                GROUP BY b.divisionid;";
		$stmt = $this->db->query($sql);
        return $stmt->result_array(); 
	}

	public function getprospectcmsm2(){
		$sql = "SELECT b.code AS division, SUM(a.value) AS totalvalue FROM tb_prospectorder a
                LEFT JOIN tb_division b ON b.divisionid = a.division
                WHERE b.divisionid IN(2,3,4,5,6,7,8)
                GROUP BY b.divisionid;";
		$stmt = $this->db->query($sql);
        return $stmt->result_array();
	}
	
    function getempreport($data){
        $month = $data['month'];
        $year = $data['year'];
        $total_day = cal_days_in_month(CAL_GREGORIAN,$month,$year);

        $add_case = '';
        if($total_day > 0){
            for($i=1; $i<=$total_day; $i++){
                $ymd = $year.'-'. $month .'-'. $i;
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $ymd ."' AND (status = '1' OR status = '3') THEN datetime END) '". $i ."_in',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $ymd ."' AND (status = '1' OR status = '3') THEN notes END) '". $i ."_in_notes',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $ymd ."' AND (status = '1' OR status = '3') THEN latitude END) '". $i ."_in_latitude',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $ymd ."' AND (status = '1' OR status = '3') THEN longitude END) '". $i ."_in_longitude',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $ymd ."' AND status = '2' THEN datetime END) '". $i ."_out',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $ymd ."' THEN status END) '". $i ."_statuswork',";
            }
            $add_case = substr($add_case, 0, -1);
        }

        $sql = "
            SELECT a.userid, a.fullname, a.username, b.*
            FROM tb_user a 
            LEFT JOIN (
                SELECT
                    userid AS uid,
                    ". $add_case ."
                FROM
                    tb_attendances
                WHERE
                    YEAR(datetime) = '". $year ."'
                    AND MONTH(datetime) = '". $month ."'
                GROUP BY userid
            ) b ON b.uid = a.userid 
            WHERE 
                a.status = 1 
                AND (a.roleid IN (4,5,6,7,8) OR a.userid = 8 OR a.userid = 43 OR a.userid = 54)
            ORDER BY userid ASC";
        $stmt = $this->db->query($sql);

        return $stmt->result_array();
    }

    function getempreportweekly(){
        $mon = date("Y-m-d", strtotime('monday this week'));
        $tue = date("Y-m-d", strtotime('tuesday this week'));
        $wed = date("Y-m-d", strtotime('wednesday this week'));
        $thu = date("Y-m-d", strtotime('thursday this week'));
        $fri = date("Y-m-d", strtotime('friday this week'));

        $add_case = '';
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $mon ."' AND (status = '1' OR status = '3') THEN datetime END) '". date('d', strtotime($mon)) ."_in',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $mon ."' AND (status = '1' OR status = '3') THEN notes END) '". date('d', strtotime($mon)) ."_in_notes',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $mon ."' AND (status = '1' OR status = '3') THEN latitude END) '". date('d', strtotime($mon)) ."_in_latitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $mon ."' AND (status = '1' OR status = '3') THEN longitude END) '". date('d', strtotime($mon)) ."_in_longitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $mon ."' AND status = '2' THEN datetime END) '". date('d', strtotime($mon)) ."_out',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $mon ."' THEN status END) '". date('d', strtotime($mon)) ."_statuswork',";

        $add_case .= "MIN(CASE WHEN date(datetime) = '". $tue ."' AND (status = '1' OR status = '3') THEN datetime END) '". date('d', strtotime($tue)) ."_in',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $tue ."' AND (status = '1' OR status = '3') THEN notes END) '". date('d', strtotime($tue)) ."_in_notes',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $tue ."' AND (status = '1' OR status = '3') THEN latitude END) '". date('d', strtotime($tue)) ."_in_latitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $tue ."' AND (status = '1' OR status = '3') THEN longitude END) '". date('d', strtotime($tue)) ."_in_longitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $tue ."' AND status = '2' THEN datetime END) '". date('d', strtotime($tue)) ."_out',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $tue ."' THEN status END) '". date('d', strtotime($tue)) ."_statuswork',";

        $add_case .= "MIN(CASE WHEN date(datetime) = '". $wed ."' AND (status = '1' OR status = '3') THEN datetime END) '". date('d', strtotime($wed)) ."_in',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $wed ."' AND (status = '1' OR status = '3') THEN notes END) '". date('d', strtotime($wed)) ."_in_notes',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $wed ."' AND (status = '1' OR status = '3') THEN latitude END) '". date('d', strtotime($wed)) ."_in_latitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $wed ."' AND (status = '1' OR status = '3') THEN longitude END) '". date('d', strtotime($wed)) ."_in_longitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $wed ."' AND status = '2' THEN datetime END) '". date('d', strtotime($wed)) ."_out',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $wed ."' THEN status END) '". date('d', strtotime($wed)) ."_statuswork',";

        $add_case .= "MIN(CASE WHEN date(datetime) = '". $thu ."' AND (status = '1' OR status = '3') THEN datetime END) '". date('d', strtotime($thu)) ."_in',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $thu ."' AND (status = '1' OR status = '3') THEN notes END) '". date('d', strtotime($thu)) ."_in_notes',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $thu ."' AND (status = '1' OR status = '3') THEN latitude END) '". date('d', strtotime($thu)) ."_in_latitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $thu ."' AND (status = '1' OR status = '3') THEN longitude END) '". date('d', strtotime($thu)) ."_in_longitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $thu ."' AND status = '2' THEN datetime END) '". date('d', strtotime($thu)) ."_out',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $thu ."' THEN status END) '". date('d', strtotime($thu)) ."_statuswork',";

        $add_case .= "MIN(CASE WHEN date(datetime) = '". $fri ."' AND (status = '1' OR status = '3') THEN datetime END) '". date('d', strtotime($fri)) ."_in',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $fri ."' AND (status = '1' OR status = '3') THEN notes END) '". date('d', strtotime($fri)) ."_in_notes',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $fri ."' AND (status = '1' OR status = '3') THEN latitude END) '". date('d', strtotime($fri)) ."_in_latitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $fri ."' AND (status = '1' OR status = '3') THEN longitude END) '". date('d', strtotime($fri)) ."_in_longitude',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $fri ."' AND status = '2' THEN datetime END) '". date('d', strtotime($fri)) ."_out',";
        $add_case .= "MIN(CASE WHEN date(datetime) = '". $fri ."' THEN status END) '". date('d', strtotime($fri)) ."_statuswork'";

        $sql = "
            SELECT a.userid, a.fullname, a.username, b.*
            FROM tb_user a 
            LEFT JOIN (
                SELECT
                    userid AS uid,
                    ". $add_case ."
                FROM
                    tb_attendances
                GROUP BY userid
            ) b ON b.uid = a.userid 
            WHERE 
                a.status = 1 
                AND (a.roleid IN (4,5,6,7) OR a.userid = 8 OR a.userid = 43 OR a.userid = 54)
            ORDER BY userid ASC";
        $stmt = $this->db->query($sql);

        return $stmt->result_array();
    }

    function getovertimeweekly(){
        $sql = "SELECT b.fullname, a.datetime, a.notes 
                FROM tb_attendances a 
                LEFT JOIN tb_user b ON b.userid = a.userid
                WHERE 
                a.status = 9
                AND MONTH(a.datetime) = MONTH(CURDATE())";
        $stmt = $this->db->query($sql);

        return $stmt->result_array();
    }

    function getmeal($data){
        $sdate = $data['sdate'];
        $edate = $data['edate'];
        $ldate = date($edate, strtotime('+1 day'));

        $period = new DatePeriod(
            new DateTime($sdate),
            new DateInterval('P1D'),
            new DateTime($ldate)
        );

        /* extract date */
        foreach ($period as $key => $value) {
            $date[]  = $value->format('Y-m-d');
        }
        $total_day = count($date)-1;

        $add_case = '';
        if($total_day > 0){
            for($i=0; $i<=$total_day; $i++){
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $date[$i] ."' AND (status = '1' OR status = '3') THEN datetime END) '". date('d',strtotime($date[$i])) ."_in',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $date[$i] ."' AND (status = '1' OR status = '3') THEN notes END) '". date('d',strtotime($date[$i])) ."_in_notes',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $date[$i] ."' AND (status = '1' OR status = '3') THEN latitude END) '". date('d',strtotime($date[$i])) ."_in_latitude',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $date[$i] ."' AND (status = '1' OR status = '3') THEN longitude END) '". date('d',strtotime($date[$i])) ."_in_longitude',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $date[$i] ."' AND status = '2' THEN datetime END) '". date('d',strtotime($date[$i])) ."_out',";
                $add_case .= "MIN(CASE WHEN date(datetime) = '". $date[$i] ."' THEN status END) '". date('d',strtotime($date[$i])) ."_statuswork',";
            }

            $add_case .= "MIN(CASE WHEN date(datetime) = '". date('Y-m-d', strtotime($edate)) ."' AND (status = '1' OR status = '3') THEN datetime END) '". date('d',strtotime($edate)) ."_in',";
            $add_case .= "MIN(CASE WHEN date(datetime) = '". date('Y-m-d', strtotime($edate)) ."' AND (status = '1' OR status = '3') THEN notes END) '". date('d',strtotime($edate)) ."_in_notes',";
            $add_case .= "MIN(CASE WHEN date(datetime) = '". date('Y-m-d', strtotime($edate)) ."' AND (status = '1' OR status = '3') THEN latitude END) '". date('d',strtotime($edate)) ."_in_latitude',";
            $add_case .= "MIN(CASE WHEN date(datetime) = '". date('Y-m-d', strtotime($edate)) ."' AND (status = '1' OR status = '3') THEN longitude END) '". date('d',strtotime($edate)) ."_in_longitude',";
            $add_case .= "MIN(CASE WHEN date(datetime) = '". date('Y-m-d', strtotime($edate)) ."' AND status = '2' THEN datetime END) '". date('d',strtotime($edate)) ."_out',";
            $add_case .= "MIN(CASE WHEN date(datetime) = '". date('Y-m-d', strtotime($edate)) ."' THEN status END) '". date('d',strtotime($edate)) ."_statuswork',";

            $add_case = substr($add_case, 0, -1);
        }

        $sql = "
            SELECT a.userid, a.fullname, a.username, b.*, c.wfo, c.wfh
            FROM tb_user a 
            LEFT JOIN (
                SELECT
                    userid AS uid,
                    ". $add_case ."
                FROM
                    tb_attendances
                WHERE
                    datetime BETWEEN '". date('Y-m-d', strtotime($sdate)) ."' AND '". date('Y-m-d', strtotime($ldate)) ." 23:59:59'
                GROUP BY userid
            ) b ON b.uid = a.userid
            LEFT JOIN (
                SELECT
                    userid AS uid,
                    COUNT(CASE WHEN status = '1' THEN 'wfo' END) AS wfo,
                    COUNT(CASE WHEN status = '3' THEN 'wfh' END) AS wfh
                FROM
                    tb_attendances
                WHERE
                    datetime BETWEEN '". date('Y-m-d', strtotime($sdate)) ." 00:00:00' AND '". date('Y-m-d', strtotime($edate)) ." 23:59:00'
                GROUP BY userid
            ) c ON c.uid = a.userid
            WHERE 
                a.status = 1 
                AND (a.roleid IN (4,5,6,7) OR a.userid = 8 OR a.userid = 43)
            ORDER BY userid ASC";
        $stmt = $this->db->query($sql);

        return $stmt->result_array();
    }

    function offworkuser($id, $date){
        $sql = "SELECT 
                    userid, offstatus, offnotes 
                FROM tb_offwork 
                WHERE 
                    userid = '". $id ."' 
                    AND sdate <= '". $date ."'
                    AND edate >= '". $date ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function offday($date){
        $sql = "SELECT 
                    `name`, `date` 
                FROM tb_offday
                WHERE  
                    `date` = '". $date ."'";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getorder($data){
        $sql = "SELECT 
                    -- COUNT(orderid) AS vol, YEAR(invdate) AS tahun,  
                    SUM(basevalue) AS valorder, MONTHNAME(invdate) AS month
                FROM tb_order 
                WHERE 
                    YEAR(invdate) = '". $data['year'] ."'
                    AND basevalue < 50000000
                    AND status != '9'
                GROUP BY MONTH(invdate)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getprospect($data){
        $sql = "SELECT 
                    -- COUNT(prospectid) AS vol, YEAR(reqdate) AS tahun,
                    SUM(value) AS valprospect, MONTHNAME(reqdate) AS month
                FROM tb_prospectorder 
                WHERE 
                    YEAR(reqdate) = '". $data['year'] ."'
                GROUP BY MONTH(reqdate)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getprospectmonthly($month=''){
        $sql = "SELECT 
                    -- COUNT(prospectid) AS vol, YEAR(reqdate) AS tahun,
                    SUM(value) AS valprospect, MONTHNAME(reqdate) AS month
                FROM tb_prospectorder 
                WHERE 
                    MONTH(reqdate) = MONTH(CURDATE())
                GROUP BY MONTH(reqdate)";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getprospectorderdes(){
        $sql = "SELECT DISTINCT
					(SELECT `z`.`code` FROM `tb_segment` `z` WHERE (`z`.`segmentid` = `a`.`segment`) LIMIT 0,1) AS `segment`, COALESCE(a.valprospect,0) AS valprospect, COALESCE(c.valinvoice,0) AS valinvoice
				FROM 
					(
						SELECT 
							segment, 
							SUM(value) AS valprospect 
						FROM tb_prospectorder 
						WHERE YEAR(reqdate) = YEAR(CURDATE()) AND MONTH(reqdate) = MONTH(CURDATE()) AND division = '1'
						GROUP BY segment
					) AS a LEFT JOIN (
						SELECT 
							segment, 
							SUM(basevalue) AS valinvoice 
						FROM tb_order 
						WHERE YEAR(invdate) = YEAR(CURDATE()) AND MONTH(invdate) = MONTH(CURDATE()) AND status != 9 AND division = '1'
						GROUP BY segment
					) c ON a.segment = c.segment";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getprospectorderdss(){
        $sql = "SELECT DISTINCT
					(SELECT `z`.`code` FROM `tb_segment` `z` WHERE (`z`.`segmentid` = `a`.`segment`) LIMIT 0,1) AS `segment`, COALESCE(a.valprospect,0) AS valprospect, COALESCE(c.valinvoice,0) AS valinvoice
				FROM 
					(
						SELECT 
							segment, 
							SUM(value) AS valprospect 
						FROM tb_prospectorder 
						WHERE YEAR(reqdate) = YEAR(CURDATE()) AND MONTH(reqdate) = MONTH(CURDATE()) AND division = '7'
						GROUP BY segment
					) AS a LEFT JOIN (
						SELECT 
							segment, 
							SUM(basevalue) AS valinvoice 
						FROM tb_order 
						WHERE YEAR(invdate) = YEAR(CURDATE()) AND MONTH(invdate) = MONTH(CURDATE()) AND status != 9 AND division = '7'
						GROUP BY segment
					) c ON a.segment = c.segment";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getprospectorderdps(){
        $sql = "SELECT DISTINCT
					(SELECT `z`.`code` FROM `tb_segment` `z` WHERE (`z`.`segmentid` = `a`.`segment`) LIMIT 0,1) AS `segment`, COALESCE(a.valprospect,0) AS valprospect, COALESCE(c.valinvoice,0) AS valinvoice
				FROM 
					(
						SELECT 
							segment, 
							SUM(value) AS valprospect 
						FROM tb_prospectorder 
						WHERE YEAR(reqdate) = YEAR(CURDATE()) AND MONTH(reqdate) = MONTH(CURDATE()) AND division = '8'
						GROUP BY segment
					) AS a LEFT JOIN (
						SELECT 
							segment, 
							SUM(basevalue) AS valinvoice 
						FROM tb_order 
						WHERE YEAR(invdate) = YEAR(CURDATE()) AND MONTH(invdate) = MONTH(CURDATE()) AND status != 9 AND division = '8'
						GROUP BY segment
					) c ON a.segment = c.segment";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getprospectorderdgs(){
        $sql = "SELECT DISTINCT
					(SELECT `z`.`code` FROM `tb_segment` `z` WHERE (`z`.`segmentid` = `a`.`segment`) LIMIT 0,1) AS `segment`, COALESCE(a.valprospect,0) AS valprospect, COALESCE(c.valinvoice,0) AS valinvoice
				FROM 
					(
						SELECT 
							segment, 
							SUM(value) AS valprospect 
						FROM tb_prospectorder 
						WHERE YEAR(reqdate) = YEAR(CURDATE()) AND MONTH(reqdate) = MONTH(CURDATE()) AND division = '2'
						GROUP BY segment
					) AS a LEFT JOIN (
						SELECT 
							segment, 
							SUM(basevalue) AS valinvoice 
						FROM tb_order 
						WHERE YEAR(invdate) = YEAR(CURDATE()) AND MONTH(invdate) = MONTH(CURDATE()) AND status != 9 AND division = '2'
						GROUP BY segment
					) c ON a.segment = c.segment";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getprospectordersda(){
        $sql = "SELECT DISTINCT
					(SELECT `z`.`code` FROM `tb_segment` `z` WHERE (`z`.`segmentid` = `a`.`segment`) LIMIT 0,1) AS `segment`, COALESCE(a.valprospect,0) AS valprospect, COALESCE(c.valinvoice,0) AS valinvoice
				FROM 
					(
						SELECT 
							segment, 
							SUM(value) AS valprospect 
						FROM tb_prospectorder 
						WHERE YEAR(reqdate) = YEAR(CURDATE()) AND MONTH(reqdate) = MONTH(CURDATE()) AND division = '5'
						GROUP BY segment
					) AS a LEFT JOIN (
						SELECT 
							segment, 
							SUM(basevalue) AS valinvoice 
						FROM tb_order 
						WHERE YEAR(invdate) = YEAR(CURDATE()) AND MONTH(invdate) = MONTH(CURDATE()) AND status != 9 AND division = '5'
						GROUP BY segment
					) c ON a.segment = c.segment";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function getprospectorderebis(){
        $sql = "SELECT DISTINCT
					(SELECT `z`.`code` FROM `tb_segment` `z` WHERE (`z`.`segmentid` = `a`.`segment`) LIMIT 0,1) AS `segment`, COALESCE(a.valprospect,0) AS valprospect, COALESCE(c.valinvoice,0) AS valinvoice
				FROM 
					(
						SELECT 
							segment, 
							SUM(value) AS valprospect 
						FROM tb_prospectorder 
						WHERE YEAR(reqdate) = YEAR(CURDATE()) AND MONTH(reqdate) = MONTH(CURDATE()) AND division = '6'
						GROUP BY segment
					) AS a LEFT JOIN (
						SELECT 
							segment, 
							SUM(basevalue) AS valinvoice 
						FROM tb_order 
						WHERE YEAR(invdate) = YEAR(CURDATE()) AND MONTH(invdate) = MONTH(CURDATE()) AND status != 9 AND division = '6'
						GROUP BY segment
					) c ON a.segment = c.segment";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
	public function getprospectordernon(){
        $sql = "SELECT DISTINCT
					(SELECT `z`.`code` FROM `tb_segment` `z` WHERE (`z`.`segmentid` = `a`.`segment`) LIMIT 0,1) AS `segment`, COALESCE(a.valprospect,0) AS valprospect, COALESCE(c.valinvoice,0) AS valinvoice
				FROM 
					(
						SELECT 
							segment, 
							SUM(value) AS valprospect 
						FROM tb_prospectorder 
						WHERE YEAR(reqdate) = YEAR(CURDATE()) AND MONTH(reqdate) = MONTH(CURDATE()) AND division = '3'
						GROUP BY segment
					) AS a LEFT JOIN (
						SELECT 
							segment, 
							SUM(basevalue) AS valinvoice 
						FROM tb_order 
						WHERE YEAR(invdate) = YEAR(CURDATE()) AND MONTH(invdate) = MONTH(CURDATE()) AND status != 9 AND division = '3'
						GROUP BY segment
					) c ON a.segment = c.segment";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getmealallowance($param){
        $startdate = date('Y-m-d', strtotime($param['sdate']));
        $enddate = date('Y-m-d', strtotime($param['edate']));

        $sql = "
            SELECT a.userid, a.fullname, a.username, b.*
            FROM tb_user a 
            LEFT JOIN (
                SELECT
                    userid AS uid,
                    COUNT(CASE WHEN status = '1' THEN 'wfo' END) AS wfo,
                    COUNT(CASE WHEN status = '3' THEN 'wfh' END) AS wfh
                FROM
                    tb_attendances
                WHERE
                    datetime BETWEEN '". $startdate ." 00:00:00' AND '". $enddate ." 23:59:00'
                GROUP BY userid
            ) b ON b.uid = a.userid
            WHERE 
                a.status = 1 
                AND (a.roleid IN (4,5,6,7) OR a.userid = 8 OR a.userid = 43)
            ORDER BY userid ASC";

        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    public function gettsglobal(){
        $q = "SELECT nilai FROM tb_targetsales WHERE tipe = '1' AND tahun = '". date('Y') ."' ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function gettsquarter(){
        $q = "SELECT nilai FROM tb_targetsales WHERE tipe = '2' AND tahun = '". date('Y') ."' ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function gettsmonthly($month){
        $q = "SELECT nama,nilai FROM tb_targetsales WHERE tipe = '3' AND bulan = '". $month ."' AND tahun = '". date('Y') ."' ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function gettcquarter(){
        $q = "SELECT nilai FROM tb_targetcoll WHERE tipe = '2' AND tahun = '". date('Y') ."' ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function gettcmonthly($month){
        $q = "SELECT nama,nilai FROM tb_targetcoll WHERE tipe = '3' AND bulan = '". $month ."' AND tahun = '". date('Y') ."' ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function gettsmonthlybyorder($tipe, $month){
        $q = "SELECT nama,nilai FROM tb_targetsales WHERE tipe = '". $tipe ."' AND bulan = '". $month ."' AND tahun = '". date('Y') ."' ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function getinvoicemonthly($month){
        $q = "
            SELECT 
                MONTHNAME (`invdate`) AS `month`, 
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` != '9' 
		        AND YEAR (`invdate`) = YEAR(CURDATE()) 
		        AND MONTH(`invdate`) = '". $month ."'
            GROUP BY MONTH (`invdate`) 
            ORDER BY MONTH (`invdate`) ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function getinvoicemonthlybyorderstatus($orderstatus, $month){
        $q = "
            SELECT 
                MONTHNAME (`invdate`) AS `month`, 
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `orderstatus` = '". $orderstatus ."'
		        AND `status` != '9' 
		        AND YEAR (`invdate`) = YEAR(CURDATE()) 
		        AND MONTH(`invdate`) = '". $month ."'
            GROUP BY MONTH (`invdate`) 
            ORDER BY MONTH (`invdate`) ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function getsisacollectionmonthly($month){
        $firstdateinv = '2021-01-01';
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
            $addwhere = "`status` != '1'  AND `status` != '9'";
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
            /* ada case dimana invoice sudah cair dibulan berjalan */
            $addwhere = "
                        (
                            `status` != '1' OR 
                            (procdat BETWEEN '". $current ."' AND '". $currentlastday ."' OR procdat > '". $currentlastday ."')
                        )
                        AND `status` != '9'";
        }

        $sql = "SELECT 
                    COUNT( orderid ) AS volinv, SUM( basevalue ) AS valinv 
                FROM tb_order 
                WHERE 
                    ". $addwhere ."
	                AND invdate BETWEEN '". $firstdateinv ."' AND '".$currentend."'";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['valinv'];
    }

    public function getsalesmonthly($month){
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        $sql = "SELECT COUNT(orderid) AS volinv, SUM(basevalue) AS valinv FROM tb_order WHERE status != '9' AND invdate BETWEEN '". $current ."' AND '". $currentlastday ."'";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['valinv'];
    }

    public function getcollectionpaidbymonth($month){
        $firstdateinv = '2021-01-01';
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));

        $sql = "SELECT COUNT( orderid ) AS volinv, SUM( vrecvalue ) AS totalpaid 
                FROM
                    tb_order 
                WHERE
                    `status` = '1' AND `status` != '9' 
                    AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentlastday ."' 
                    AND procdat BETWEEN '". $current ."' AND '". $currentlastday ."'";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['totalpaid'];
    }

    public function getfinalcollection($month){
        $firstdateinv = '2021-01-01';
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));

        /* ada case dimana status invoice sudah cair namun procdat nya setelah tgl sekarang */
        $sql = "SELECT 
                    a.id, a.volinv + b.volinv AS volinv, a.valinv + b.valinv AS valinv 
                FROM
                    (
                    SELECT
                        '1' AS id, COUNT( orderid ) AS volinv, IFNULL(SUM( basevalue ), 0) AS valinv 
                    FROM
                        tb_order 
                    WHERE
                        `status` != '1' AND `status` != '9' AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentlastday ."' 
                    ) a
                LEFT JOIN (
                    SELECT
                        '1' AS id, COUNT( orderid ) AS volinv, IFNULL(SUM( basevalue ), 0) AS valinv 
                    FROM
                        tb_order 
                    WHERE
                        ( `status` = '1' AND `status` != '9' AND procdat > '". $currentlastday ."' ) AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentlastday ."' 
                ) b ON b.id = a.id";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data[0]['valinv'];
    }

    public function gettcmonthlybyorder($tipe, $month){
        if($tipe == 'NOPES'){
            $tipeorder = '4';
        }elseif($tipe == 'PADI'){
            $tipeorder = '5';
        }elseif($tipe == 'IBL'){
            $tipeorder = '6';
        }elseif($tipe == 'OBL'){
            $tipeorder = '7';
        }else{
            $tipeorder = '0';
        }

        $q = "SELECT nama, nilai FROM tb_targetcoll WHERE tipe = '". $tipeorder ."' AND bulan = '". $month ."' AND tahun = '". date('Y') ."' ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['nilai'];
        }else{
            return FALSE;
        }
    }

    public function getcollmonthlypaidbyorderstatus($orderstatus, $month){
        $q = "
            SELECT 
                DATE_FORMAT(procdat,'%b') AS `month`, 
                COUNT(*) AS `volcoll`, 
                SUM(`vrecvalue`) AS `valcoll` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `orderstatus` = '". $orderstatus ."'
		        AND `status` = '1' 
		        AND YEAR (`procdat`) = YEAR(CURDATE()) 
		        AND MONTH(`procdat`) = '". $month ."'
            GROUP BY MONTH (`procdat`)";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valcoll'];
        }else{
            return FALSE;
        }
    }

    public function getcollmonthlyunpaidbyorderstatus($orderstatus, $month){
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `orderstatus` = '". $orderstatus ."'
		        AND `status` != '1' AND `status` != '9'
		        AND invdate BETWEEN '2021-01-01' AND '". $currentend ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valinv'];
        }else{
            return FALSE;
        }
    }

    public function trackingcollmonthlybyorderstatus($status,$orderstatus, $month){
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }
        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv`,
                `status`
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `orderstatus` = '". $orderstatus ."'
		        AND `status` = '". $status ."'
		        AND invdate BETWEEN '2021-01-01' AND '". $currentend ."'";

        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valinv'];
        }else{
            return FALSE;
        }
    }

    function trackingalarmcollvalvol($status,$orderstatus, $month, $waktualarm){
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }
        $date = date('Y-m-d', strtotime('-'. $waktualarm .' days'));

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(a.`basevalue`) AS `valinv`,
                a.`status`
            FROM `vw_order` a 
            LEFT JOIN (SELECT MAX(trackid) AS trackid, orderid FROM tb_trackorder GROUP BY orderid) b ON b.orderid = a.orderid
            LEFT JOIN tb_trackorder c ON c.trackid = b.trackid
		    WHERE 
		        a.`orderinv` = '1'
		        AND a.`orderstatus` = '". $orderstatus ."'
		        AND a.`status` = '". $status ."'
		        AND a.invdate BETWEEN '2021-01-01' AND '". $currentend ."'
	            AND c.trackdate < '". $date ."'";

        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['volinv'];
        }else{
            return FALSE;
        }
    }

    function mytrackingalarmcollvalvol($status,$orderstatus, $month, $waktualarm){
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }
        $date = date('Y-m-d', strtotime('-'. $waktualarm .' days'));

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(a.`basevalue`) AS `valinv`,
                a.`status`
            FROM `vw_order` a 
            LEFT JOIN (SELECT MAX(trackid) AS trackid, orderid FROM tb_trackorder GROUP BY orderid) b ON b.orderid = a.orderid
            LEFT JOIN tb_trackorder c ON c.trackid = b.trackid
		    WHERE 
		        a.`orderinv` = '1'
		        AND a.`orderstatus` IN (". $orderstatus .")
		        AND a.`status` = '". $status ."'
		        AND a.invdate BETWEEN '2021-01-01' AND '". $currentend ."'
	            AND c.trackdate < '". $date ."'";

        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['volinv'];
        }else{
            return FALSE;
        }
    }

    function listtrackalarmbyorderstatus($status, $orderstatus, $month, $waktualarm){
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }
        $date = date('Y-m-d', strtotime('-'. $waktualarm .' days'));

        $q = "
            SELECT  
                a.orderid, a.orderstatus, a.code, a.invnum, a.invdate, a.division, a.segment, 
                a.basevalue, a.status, a.projectname,
                DATEDIFF(CURDATE(),a.`invdate`) AS `intervaldat`,
                b.trackid, c.recipient, c.trackdate, c.tracknote
            FROM `vw_order` a 
            LEFT JOIN (SELECT MAX(trackid) AS trackid, orderid FROM tb_trackorder GROUP BY orderid) b ON b.orderid = a.orderid
            LEFT JOIN tb_trackorder c ON c.trackid = b.trackid
		    WHERE 
		        a.`orderinv` = '1'
		        AND a.`status` = '". $status ."'
		        AND a.`orderstatus` IN (". $orderstatus .")
		        AND a.invdate BETWEEN '2021-01-01' AND '". $currentend ."'
	            AND c.trackdate < '". $date ."'";

        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    public function detailunpaid($param){
        $month = date('m');
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }

        $q = "
            SELECT 
                a.*,
                b.recipient, b.tracknote, b.trackdate
            FROM `vw_order` a
            LEFT JOIN (
                SELECT MAX(trackid), orderid, MAX(recipient) AS recipient, MAX(tracknote) AS tracknote, MAX(trackdate) AS trackdate FROM tb_trackorder WHERE orderid = 13724 GROUP BY orderid LIMIT 1
            ) b ON b.orderid = a.orderid
		    WHERE 
		        a.`orderinv` = '1'
		        AND a.`orderstatus` = '". $param['orderstatus'] ."'
		        AND a.`status` = '". $param['status'] ."'
		        AND a.invdate BETWEEN '2021-01-01' AND '". $currentend ."'
            GROUP BY a.orderid";

        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function gettsqtipeorder(){
        $month = date('m');
        $year = date('Y');

        $q = "
            SELECT SUM(nilai) AS nilai FROM `tb_targetsales`
		    WHERE 
		        `tipe` IN(4,5,6,7)
		        AND `bulan` = '". $month ."'
		        AND `tahun` = '". $year ."'";

        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data;
        }else{
            return FALSE;
        }
    }

    function getcollinamodr($am, $division){
        $q = "SELECT a.*, 
                b.name AS divisionname, c.name AS segmenname,
                d.recipient, d.tracknote, d.trackdate
              FROM tb_order a
              LEFT JOIN tb_division b ON b.divisionid = a.division
              LEFT JOIN tb_segment c ON c.segmentid = a.segment
              LEFT JOIN tb_trackorder d ON d.orderid = a.orderid
              WHERE 
                a.amkomet IN (". $am .") 
                AND a.division IN (". $division .")
                AND a.orderstatus IN('NOPES','PADI','IBL') 
                AND a.status != 1 AND a.status != 9
                AND YEAR(a.invdate) >= '2020'
               GROUP BY a.orderid";

        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getcollinamobl($am, $division){
        $q = "SELECT 
                a.*, b.name AS divisionname, c.name AS segmenname,
                d.recipient, d.tracknote, d.trackdate 
              FROM tb_order a
              LEFT JOIN tb_division b ON b.divisionid = a.division
              LEFT JOIN tb_segment c ON c.segmentid = a.segment
              LEFT JOIN tb_trackorder d ON d.orderid = a.orderid
              WHERE 
                a.amkomet IN (". $am .") 
                AND a.division IN (". $division .")
                AND a.orderstatus IN('OBL') 
                AND a.status != 1 AND a.status != 9
                AND YEAR(a.invdate) >= '2020'
                GROUP BY a.orderid";

        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getpiecollsni($month, $am){
        $firstdateinv = '2021-01-01';
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
            $addwhere = "a.`status` != '1'  AND a.`status` != '9'";
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
            /* ada case dimana invoice sudah cair dibulan berjalan */
            $addwhere = "
                        (
                            a.`status` != '1' OR 
                            (a.procdat BETWEEN '". $current ."' AND '". $currentlastday ."' OR a.procdat > '". $currentlastday ."')
                        )
                        AND a.`status` != '9'";
        }

        $sql = "SELECT 
                    a.amkomet, a.status, COUNT(a.orderid) AS volinv, SUM(a.basevalue) AS valinv,
                    b.status AS statusname
                FROM tb_order a
                LEFT JOIN tb_statco b ON b.statorder = a.status 
                WHERE 
                    ". $addwhere ."
                    AND a.orderinv = '1'
	                AND a.invdate BETWEEN '". $firstdateinv ."' AND '".$currentend."'
	                AND a.amkomet IN (". $am .")
                GROUP BY a.status";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data;
    }

    function getcollbyamgroupstatus($month, $am){
        $firstdateinv = '2021-01-01';
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
            $addwhere = "a.`status` != '1'  AND a.`status` != '9'";
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
            /* ada case dimana invoice sudah cair dibulan berjalan */
            $addwhere = "
                        (
                            a.`status` != '1' OR 
                            (a.procdat BETWEEN '". $current ."' AND '". $currentlastday ."' OR a.procdat > '". $currentlastday ."')
                        )
                        AND a.`status` != '9'";
        }

        $sql = "SELECT 
                    a.amkomet, a.status, COUNT(a.orderid) AS volinv, SUM(a.basevalue) AS valinv,
                    b.status AS statusname
                FROM tb_order a
                LEFT JOIN tb_statco b ON b.statorder = a.status 
                WHERE 
                    ". $addwhere ."
                    AND a.orderinv = '1'
	                AND a.invdate BETWEEN '". $firstdateinv ."' AND '".$currentend."'
	                AND a.amkomet IN (". $am .")  
                GROUP BY a.status, a.amkomet
                ORDER BY a.amkomet";
        $stmt = $this->db->query($sql);
        $data = $stmt->result_array();
        return $data;
    }

    function getcollunpaid($month){
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` != '1' AND `status` != '9'
		        AND invdate BETWEEN '2021-01-01' AND '". $currentend ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valinv'];
        }else{
            return FALSE;
        }
    }

    function getcollbyorderstatus($month){
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
        }

        $q = "
            SELECT orderstatus, COUNT(orderid) AS volinv, SUM(basevalue) AS valinv FROM tb_order 
            WHERE 
                orderinv = 1
                AND status != 1
                AND status != 9
                AND invdate BETWEEN '2021-01-01' AND '". $currentend ."'
            GROUP BY orderstatus";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getcollbyam($month, $am){
        $firstdateinv = '2021-01-01';
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);
            $addwhere = "`status` != '1'  AND `status` != '9'";
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
            /* ada case dimana invoice sudah cair dibulan berjalan */
            $addwhere = "
                        (
                            `status` != '1' OR 
                            (procdat BETWEEN '". $current ."' AND '". $currentlastday ."' OR procdat > '". $currentlastday ."')
                        )
                        AND `status` != '9'";
        }

        $q = "
            SELECT amkomet, COUNT(orderid) AS volinv, SUM(basevalue) AS valinv FROM tb_order 
            WHERE 
                ". $addwhere ."
                AND orderinv = 1
                AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'
	            AND amkomet IN (". $am .")";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getpaidbyam($month, $am){
        $firstdateinv = '2021-01-01';
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
            $addwhere = "`status` != '1'  AND `status` != '9'";
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
            /* ada case dimana invoice sudah cair dibulan berjalan */
            $addwhere = "
                        (
                            `status` != '1' OR 
                            (procdat BETWEEN '". $current ."' AND '". $currentlastday ."' OR procdat > '". $currentlastday ."')
                        )
                        AND `status` != '9'";
        }

        $q = "
            SELECT amkomet, COUNT(orderid) AS volinv, SUM(vrecvalue) AS valinv FROM tb_order 
            WHERE 
                orderinv = 1 
                AND status = 1 AND YEAR(procdat) = '". date('Y') ."' AND MONTH(procdat) = '". date('m') ."'
                AND status != 9
                AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'
                AND amkomet IN (". $am .")";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getpanjarbyam($month, $am){
        $firstdateinv = '2021-01-01';
        $current = date('Y').'-'.$month.'-01';
        $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        if($month == '01'){
            $currentend = (date('Y')-1).'-12-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y')-1);;
            $addwhere = "a.`status` != '1'  AND a.`status` != '9'";
        }else{
            $currentend = date('Y').'-'.($month-1).'-'.cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));;
            /* ada case dimana invoice sudah cair dibulan berjalan */
            $addwhere = "
                        (
                            a.`status` != '1' OR 
                            (a.procdat BETWEEN '". $current ."' AND '". $currentlastday ."' OR a.procdat > '". $currentlastday ."')
                        )
                        AND a.`status` != '9'";
        }

        $q = "
            SELECT a.amkomet, COUNT(a.orderid) AS volinv, SUM(b.totalvalspb) AS valspb FROM tb_order a
            LEFT JOIN (SELECT orderid, SUM(`value`) AS totalvalspb FROM tb_spb WHERE status != '9' GROUP BY orderid) b ON b.orderid = a.orderid
            WHERE 
                ". $addwhere ."
                AND a.orderinv = 1 
                AND a.invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'
	            AND amkomet IN (". $am .")";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getarlarge($month){
        $date = date('Y-m-d');
        $firstdateinv = '2021-01-01';
        $current = date('Y-m-',strtotime($date. '-12 month')).'01';
        $currentlastday = date('Y-m-',strtotime($date. '-12 month')).cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        if($month == '01'){
            $currentend = date('Y-m-',strtotime($date. '-13 month')).cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        }else{
            $currentend = date('Y-m-',strtotime($date. '-13 month')).cal_days_in_month(CAL_GREGORIAN, $month-1, date('Y'));
        }

        $q = "
            SELECT COUNT(orderid) AS volinv, SUM(basevalue) AS valinv FROM tb_order 
            WHERE 
                orderinv = 1
                AND status != '1'
                AND status != 9
                AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getarlargepaid($month){
        $date = date('Y-m-d');
        $firstdateinv = '2021-01-01';
        $current = date('Y-m-01');
        $currentlastday = date('Y-m-').cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        if($month == '01') {
            $currentend = date('Y', strtotime($date . '-12 month')) . '-' . ($month - 1) . '-' . cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));;
        }else{
            $currentend = date('Y', strtotime($date . '-12 month')) . '-' . ($month - 1) . '-' . cal_days_in_month(CAL_GREGORIAN, $month - 1, date('Y'));;
        }

        $q = "
            SELECT 
                COUNT(orderid) AS volinv, SUM(vrecvalue) AS valinv 
            FROM tb_order 
            WHERE 
                orderinv = 1 
                AND status = '1' 
                AND procdat BETWEEN '". $current ."' AND '". $currentlastday ."'
                AND status != 9
                AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getarmedium($month){
        $date = date('Y-m-d');
        $firstdateinv = date('Y-m-',strtotime($date. '-12 month')).'01';
        $current = date('Y-m-',strtotime($date. '-6 month')).'01';
        $currentlastday = date('Y-m-',strtotime($date. '-6 month')).cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        $currentend = date('Y-m-',strtotime($date. '-7 month')).cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));

        $q = "
            SELECT COUNT(orderid) AS volinv, SUM(basevalue) AS valinv FROM tb_order 
            WHERE 
                orderinv = 1
                AND status != '1' 
                AND status != 9
                AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getarmediumpaid($month){
        $date = date('Y-m-d');
        $firstdateinv = date('Y-m-',strtotime($date. '-12 month')).'01';
        $current = date('Y-m-01');
        $currentlastday = date('Y-m-').cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        $currentend = date('Y-m-',strtotime($date. '-7 month')).cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));

        $q = "
            SELECT 
                COUNT(orderid) AS volinv, SUM(vrecvalue) AS valinv 
            FROM tb_order 
            WHERE 
                orderinv = 1 
                AND status = '1' 
                AND procdat BETWEEN '". $current ."' AND '". $currentlastday ."'
                AND status != 9
                AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getarsmall($month){
        $date = date('Y-m-d');
        $firstdateinv = date('Y-m-',strtotime($date. '-6 month')).'01';
        $current = date('Y-m-').'01';
        $currentlastday = date('Y-m-').cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        $currentend = date('Y-m-',strtotime($date. '-1 month')).cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));


        $q = "
            SELECT COUNT(orderid) AS volinv, SUM(basevalue) AS valinv FROM tb_order 
            WHERE 
                orderinv = 1
                AND status != '1'
                AND status != 9
                AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getarsmallpaid($month){
        $date = date('Y-m-d');
        $firstdateinv = date('Y-m-',strtotime($date. '-6 month')).'01';
        $current = date('Y-m-01');
        $currentlastday = date('Y-m-').cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        $currentend = date('Y-m-',strtotime($date. '-1 month')).cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));

        $q = "
            SELECT 
                COUNT(orderid) AS volinv, SUM(vrecvalue) AS valinv 
            FROM tb_order 
            WHERE 
                orderinv = 1 
                AND status = '1' 
                AND procdat BETWEEN '". $current ."' AND '". $currentlastday ."'
                AND status != 9
                AND invdate BETWEEN '". $firstdateinv ."' AND '". $currentend ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function gettotalpanjar(){
        $q = "
            SELECT 
                COUNT(orderid) AS vol, SUM(jstvalue) AS val
            FROM tb_order 
            WHERE 
                orderinv = 0
                AND YEAR(crdat) >= '2021'
                AND unit = 'KOMET'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function gettotalpanjarspbinv(){
        $q = "SELECT SUM(b.value) AS val FROM tb_order a
                LEFT JOIN tb_spb b ON b.orderid = a.orderid 
                WHERE a.orderinv = '0' AND `a`.`unit`='KOMET' AND `a`.`jobtype`!='TK'
                AND YEAR(a.crdat) >= '2021' ";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }
    
    function trackpanjarbysegmennontk(){
        $q = "SELECT a.*, b.spbval, c.`name` 
              FROM 
              (
                SELECT 
                    orderid, spbid, segment, SUM(jstvalue) as jstval
                FROM tb_order
                WHERE 
                    orderinv = '0' 
                    AND YEAR(crdat) >= '2021'
                    AND jobtype != 'TK'
                GROUP BY segment
              ) a
              LEFT JOIN 
              (
                    SELECT spbid, orderid, SUM(value) as spbval
                    FROM tb_spb
                    WHERE YEAR(spbdat) >= '2021'
                    GROUP BY orderid 
              )
              b ON b.orderid = a.orderid 
              LEFT JOIN tb_segment c ON c.segmentid = a.segment";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function trackpanjarbysegmentk(){
        $q = "SELECT a.*, b.spbval, c.`name` 
              FROM 
              (
                SELECT 
                    orderid, spbid, segment, SUM(jstvalue) as jstval
                FROM tb_order
                WHERE 
                    orderinv = '0' 
                    AND YEAR(crdat) >= '2021'
                    AND jobtype = 'TK'
                GROUP BY segment
              ) a
              LEFT JOIN 
              (
                    SELECT spbid, orderid, SUM(value) as spbval
                    FROM tb_spb
                    WHERE YEAR(spbdat) >= '2021'
                    GROUP BY orderid 
              )
              b ON b.orderid = a.orderid 
              LEFT JOIN tb_segment c ON c.segmentid = a.segment";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getlop(){
        $q = "
            SELECT 
                a.*, b.code AS divname, c.code AS segmentname,
                d.Q1, e.Q2, f.Q3, g.Q4
            FROM tb_lop a
            LEFT JOIN tb_division b ON b.divisionid = a.divisi
            LEFT JOIN tb_segment c ON c.segmentid = a.segmen
            LEFT JOIN (
                SELECT lopid, invdate, SUM(nilai) AS Q1
                FROM tb_lopdetail 
                WHERE MONTH(invdate) <= 3 AND YEAR(invdate) = YEAR(CURDATE())
                GROUP BY lopid
            ) d ON d.lopid = a.lopid
            LEFT JOIN (
                SELECT  lopid, invdate, SUM(nilai) AS Q2
                FROM tb_lopdetail 
                WHERE MONTH(invdate) >= 4 AND MONTH(invdate) <= 6 AND YEAR(invdate) = YEAR(CURDATE())
                GROUP BY lopid
            ) e ON e.lopid = a.lopid
            LEFT JOIN (
                SELECT lopid, invdate, SUM(nilai) AS Q3
                FROM tb_lopdetail 
                WHERE MONTH(invdate) >= 7 AND MONTH(invdate) <= 9 AND YEAR(invdate) = YEAR(CURDATE())
                GROUP BY lopid
            ) f ON f.lopid = a.lopid
            LEFT JOIN (
                SELECT lopid, invdate, SUM(nilai) AS Q4
                FROM tb_lopdetail 
                WHERE MONTH(invdate) >= 10 AND MONTH(invdate) <= 12 AND YEAR(invdate) = YEAR(CURDATE())
                GROUP BY lopid
            ) g ON g.lopid = a.lopid;";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function gettotalvallop(){
        $q = "
            SELECT 
                COUNT(lopid) AS vol, SUM(nilaikl) AS val
            FROM tb_lop";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getlopbysegmen(){
        $q = "
            SELECT 
                SUM(CASE WHEN a.status = '0' THEN a.nilaikl END) AS kosong,
                SUM(CASE WHEN a.status = '2' THEN a.nilaikl END) AS p1,
                SUM(CASE WHEN a.status = '3' THEN a.nilaikl END) AS p8,
                SUM(CASE WHEN a.status = '4' THEN a.nilaikl END) AS kl,
                SUM(CASE WHEN a.status = '5' THEN a.nilaikl END) AS bast,
                SUM(CASE WHEN a.status = '6' THEN a.nilaikl END) AS bapl,
                SUM(CASE WHEN a.status = '7' THEN a.nilaikl END) AS bapla,
                SUM(CASE WHEN a.status = '1' THEN a.nilaikl END) AS invoice,
                SUM(a.lopid) as vollop, SUM(a.nilaikl) as vallop, a.status,
                b.name 
            FROM tb_lop a
            LEFT JOIN tb_segment b ON b.segmentid = a.segmen
            GROUP BY a.segmen";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getsaldoinvpanjar($statuscair){
        $where = ' WHERE 1=1 ';

        if($statuscair == '1'){
            $where .= " AND a.status = '1'";
        }else{
            $where .= " AND a.status != '1' AND a.status != '9' ";
        }

        $q = "SELECT SUM(total_tabungan) AS saldoinvpanjar FROM (
                SELECT 
                        YEAR(a.invdate),
                        SUM(a.netvalue) AS total_tabungan,
                        c.code as code_division,
                        b.name AS name_segmen,
                        a.segment
                    FROM tb_order a 
                        LEFT JOIN tb_segment b ON b.segmentid = a.segment
                        LEFT JOIN tb_division c ON c.divisionid = a.division
                    ". $where  ." 
                        AND a.`orderinv`='1'
                        AND a.segment != '' 
                        AND YEAR(a.invdate) >= '2021' GROUP BY YEAR(a.invdate)
            ) b";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function gettotalpanjarspb($statuscair){
        $where = ' WHERE 1=1 ';

        if($statuscair == '1'){
            $where .= " AND a.status = '1'";
        }else{
            $where .= " AND a.status != '1' AND a.status != '9' ";
        }

        $q = "SELECT SUM(total) AS totalspbpanjarcair FROM (
                SELECT YEAR(a.invdate), SUM(b.value) AS total FROM tb_order a 
                LEFT JOIN tb_spb b ON b.orderid = a.orderid 
                ". $where  ." AND a.`orderinv`='1' AND YEAR(a.invdate) >= '2021' GROUP BY YEAR(a.invdate)
            ) b";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getsaldoinvpanjaryear($statuscair,$tahun){
        $where = ' WHERE 1=1 ';

        if($statuscair == '1'){
            $where .= " AND a.status = '1'";
        }else{
            $where .= " AND a.status != '1' AND a.status != '9' ";
        }

        $q = "SELECT SUM(total_tabungan) AS saldoinvpanjar FROM (
                SELECT 
                        YEAR(a.invdate),
                        SUM(a.netvalue) AS total_tabungan,
                        c.code as code_division,
                        b.name AS name_segmen,
                        a.segment
                    FROM tb_order a 
                        LEFT JOIN tb_segment b ON b.segmentid = a.segment
                        LEFT JOIN tb_division c ON c.divisionid = a.division
                    ". $where  ." 
                        AND a.`orderinv`='1'
                        AND a.segment != '' 
                        AND YEAR(a.invdate) = '". $tahun ."' GROUP BY YEAR(a.invdate)
            ) b";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function gettotalpanjarspbyear($statuscair, $tahun){
        $where = ' WHERE 1=1 ';

        if($statuscair == '1'){
            $where .= " AND a.status = '1'";
        }else{
            $where .= " AND a.status != '1' AND a.status != '9' ";
        }

        $q = "SELECT SUM(total) AS totalspbpanjarcair FROM (
                SELECT YEAR(a.invdate), SUM(b.value) AS total FROM tb_order a 
                LEFT JOIN tb_spb b ON b.orderid = a.orderid 
                ". $where  ." AND a.`orderinv`='1' AND YEAR(a.invdate) = '". $tahun ."' GROUP BY YEAR(a.invdate)
            ) b";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function collpaidyear(){
        $sdate = date('Y').'-01-01';
        $edate = date('Y').'-12-31';

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` = '1'
		        AND procdat BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valinv'];
        }else{
            return FALSE;
        }
    }

    function collunpaidyear($year){
        if(!empty($year)){
            $sdate = $year.'-01-01';
            $edate = $year.'-12-31';
        }else{
            $sdate = date('Y').'-01-01';
            $edate = date('Y').'-12-31';
        }

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` != '1' AND `status` != '9'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valinv'];
        }else{
            return FALSE;
        }
    }

    function collunpaid(){
        $sdate = '2021-01-01';
        $edate = date('Y-m-d');

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` != '1' AND `status` != '9'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valinv'];
        }else{
            return FALSE;
        }
    }

    function collunpaidfinance(){
        $sdate = '2021-01-01';
        $edate = date('Y-m-d');

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` = '18'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valinv'];
        }else{
            return FALSE;
        }
    }

    function collunpaidfinancetelpro(){
        $sdate = '2021-01-01';
        $edate = date('Y-m-d');

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` = '18'
                AND segmentid = '229'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data;
        }else{
            return FALSE;
        }
    }

    function collunpaidfinancenontelpro(){
        $sdate = '2021-01-01';
        $edate = date('Y-m-d');

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` = '18'
                AND segmentid != '229'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data;
        }else{
            return FALSE;
        }
    }

    function collunpaidprecise(){
        $sdate = '2021-01-01';
        $edate = date('Y-m-d');

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` = '4'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data[0]['valinv'];
        }else{
            return FALSE;
        }
    }

    function collunpaidpreciseobl(){
        $sdate = '2021-01-01';
        $edate = date('Y-m-d');

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` = '4'
		        AND orderstatus = 'OBL'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data;
        }else{
            return FALSE;
        }
    }

    function collunpaidlogiibl(){
        $sdate = '2021-01-01';
        $edate = date('Y-m-d');

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` = '16'
		        AND orderstatus = 'IBL'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data;
        }else{
            return FALSE;
        }
    }

    function collunpaidrevisi(){
        $sdate = '2021-01-01';
        $edate = date('Y-m-d');

        $q = "
            SELECT  
                COUNT(*) AS `volinv`, 
                SUM(`basevalue`) AS `valinv` 
            FROM `vw_order`
		    WHERE 
		        `orderinv` = '1'
		        AND `status` = '5'
		        AND invdate BETWEEN '". $sdate ."' AND '". $edate ."'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        if(count($data) > 0){
            return $data;
        }else{
            return FALSE;
        }
    }

    function getlastprokop(){
        $q = "
            SELECT  
                SUM(proval) AS proval
            FROM `tb_prokoptel`
			GROUP BY periode
            ORDER BY prokopid DESC
            LIMIT 1";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }

    function getsppdweekly(){
        $start = date('Y-m-d', strtotime('monday this week'));
        $end = date('Y-m-d', strtotime('sunday this week'));

        $sql = "SELECT 
                    a.*, b.fullname 
                FROM tb_sppd a
                LEFT JOIN tb_user b ON b.userid = a.userid
                WHERE a.`start` BETWEEN '". $start ."' AND '". $end ."'
                ORDER BY a.sppdid DESC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
	
    function getvalinvestor(){
        $sql = "SELECT SUM(money) AS totalmoney, SUM(fee) AS totalfee FROM tb_investdana";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function gettotalpaidbyar($orderstatus){
        $sql = "SELECT 
                    COUNT(orderid) as volinv, SUM(vrecvalue) as valinv 
                FROM tb_order 
                WHERE 
                status = 1 
                AND YEAR(invdate) >= '2021' 
                AND orderstatus IN (". $orderstatus .")";
        $stmt = $this->db->query($sql);
        $this->db->close();
        return $stmt->result_array();
    }

    function getpaidardaily($orderstatus){
        $datenow = date("Y-m-d");
        $sql = "SELECT 
                    COUNT(orderid) as volinv, SUM(vrecvalue) as valinv 
                FROM tb_order 
                WHERE 
                status = 1 
                AND procdat = '". $datenow ."' 
                AND orderstatus IN (". $orderstatus .")";
        $stmt = $this->db->query($sql);
        $this->db->close();
        return $stmt->result_array();
    }

    function getpaidarmonthly($orderstatus){
        $sql = "SELECT 
                    COUNT(orderid) as volinv, SUM(vrecvalue) as valinv 
                FROM tb_order 
                WHERE 
                status = 1 
                AND MONTH(procdat) = '". date('m') ."' 
                AND YEAR(procdat) = '". date('Y') ."' 
                AND orderstatus IN (". $orderstatus .")";
        $stmt = $this->db->query($sql);
        $this->db->close();
        return $stmt->result_array();
    }

    function getorderbydivseg($division){
        $sql = "SELECT 
                    a.division, a.segment,
                    b.name AS divisionname,
                    c.name AS segmentname,
                    d.panjar, 
                    e.sales,
                    f.unpaid,
                    g.paid
                FROM tb_order a 
                LEFT JOIN tb_division b ON b.divisionid = a.division
                LEFT JOIN tb_segment c ON c.segmentid = a.segment
                LEFT JOIN 
                    (
                        SELECT orderinv, division, segment, SUM(jstvalue) AS panjar FROM tb_order WHERE division = '". $division ."' AND orderinv = 0 AND YEAR(crdat) >= '2021' GROUP BY segment
                    ) d ON d.segment = a.segment
                LEFT JOIN 
                    (
                        SELECT orderinv, division, segment, SUM(basevalue) AS sales FROM tb_order WHERE division = '". $division ."' AND orderinv = 1 AND YEAR(invdate) >= '2021' AND status != '9' GROUP BY segment
                    ) e ON e.segment = a.segment
                LEFT JOIN 
                    (
                        SELECT orderid, division, segment, SUM(basevalue) AS unpaid FROM tb_order WHERE division = '". $division ."' AND YEAR(procdat) >= '2021' AND status != '1' AND status != '9' GROUP BY segment
                    ) f ON f.segment = a.segment
                LEFT JOIN 
                    (
                        SELECT orderid, division, segment, SUM(vrecvalue) AS paid FROM tb_order WHERE division = '". $division ."' AND YEAR(procdat) >= '2021' AND status = '1' GROUP BY segment
                    ) g ON g.segment = a.segment 
                WHERE 
                    YEAR(a.invdate) >= '2021'
                    AND a.status != '9'
                    AND a.division = '". $division ."'
                GROUP BY a.segment 
                ORDER BY a.division ASC";
        $stmt = $this->db->query($sql);
        $this->db->close();
        return $stmt->result_array();
    }

    function getprospectam($am){
        $sql = "SELECT 
                    b.name as divisionname,
                    c.name as segmentname,
                    a.amkomet,
                    COUNT(a.prospectid) AS volpros, 
                    SUM(a.value) AS valpros
                FROM tb_prospectorder a
                LEFT JOIN tb_division b ON b.divisionid = a.division
                LEFT JOIN tb_segment c ON c.segmentid = a.segment
                WHERE 
                    YEAR(a.reqdate) = YEAR(CURDATE())
                    AND a.amkomet = '". $am ."'
                GROUP BY a.segment
                ORDER BY b.name ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }

    function getorderbyamgroupingsegmentordertype($username){
        $sql = "SELECT 
                    a.division, a.segment, a.amkomet, a.orderstatus, a.status, 
                    COUNT(a.orderid) AS vol, SUM(a.basevalue) AS val,
                    b.code as divisioncode,
                    c.name as segmentcode
                FROM tb_order a 
                LEFT JOIN tb_division b ON b.divisionid = a.division
                LEFT JOIN tb_segment c ON c.segmentid = a.segment
                WHERE 
                    a.status != '9' AND a.status != '1'
                    AND a.orderinv = '1'
                    AND a.amkomet = '". $username ."'
                    AND YEAR(a.invdate) >= '2021' 
                GROUP BY a.segment, a.orderstatus
                ORDER BY b.code,c.code ASC";
        $stmt = $this->db->query($sql);
        return $stmt->result_array();
    }
    

    function get_saldo_inv_cair_yearly(){

        $q = "SELECT YEAR(invdate) AS tahun, SUM(netvalue) AS total_tabungan
              FROM vw_order
              WHERE status = '1' 
              AND orderinv = '1'
              AND spbid = '0'
              AND segmentid != '0'
              AND jobtype NOT IN ('TK','SM','HT','NA')
              AND YEAR(invdate) >= '2021' GROUP BY YEAR(invdate);";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }
    
    function get_all_saldo_inv_cair(){

        $q = "SELECT SUM(netvalue) AS total_tabungan
              FROM vw_order
              WHERE status = '1' 
              AND orderinv = '1'
              AND spbid = '0'
              AND segmentid != '0'
              AND jobtype NOT IN ('TK','SM','HT','NA')
              AND YEAR(invdate) >= '2021'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }
    
    function get_saldo_inv_ncair_yearly(){

        $q = "SELECT YEAR(invdate) AS tahun, SUM(netvalue) AS total_tabungan
              FROM vw_order
              WHERE status != '1' 
                AND status != '9' 
              AND orderinv = '1'
              AND spbid = '0'
              AND segmentid != '0'
              AND jobtype NOT IN ('TK','SM','HT','NA')
              AND YEAR(invdate) >= '2021' GROUP BY YEAR(invdate);";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }
    
    function get_all_saldo_inv_ncair(){

        $q = "SELECT SUM(netvalue) AS total_tabungan
              FROM vw_order
              WHERE status != '1' 
                AND status != '9' 
              AND orderinv = '1'
              AND spbid = '0'
              AND segmentid != '0'
              AND jobtype NOT IN ('TK','SM','HT','NA')
              AND YEAR(invdate) >= '2021'";
        $sql = $this->db->query($q);
        $data = $sql->result_array();
        $this->db->close();

        return $data;
    }
}