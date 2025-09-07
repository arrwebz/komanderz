<!DOCTYPE html>
<html style="color-scheme:dark;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daily Report Collection <?php echo date('d-m-Y');?> Komanders</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#e10b15">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $this->config->item('images_uri') ?>favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-16x16.png">

    <meta name="title" content="Daily Report Data Collection">
    <meta name="description" content="Daily Report Data Collection <?php echo date('d-m-Y');?> Komanders">
    <meta name="image_src" content="<?php echo base_url().'public/assets/dist/img/data-collection.png';?>">

    <meta property="og:type" content="profile">
    <meta property="og:url" content="<?php echo site_url('quickreport/dcollect');?>">
    <meta property="og:image" content="<?php echo base_url().'public/assets/dist/img/data-collection.png';?>">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="314">
    <meta property="og:title" content="Daily Report Data Collection">
    <meta property="og:description" content="Daily Report Data Collection <?php echo date('d-m-Y');?> Komanders">
    <meta property="og:site_name" content="Koperasi Metropolitan">

    <?php $this->carabiner->display('css_head');?>
    <style type="text/css">
        .margin-left-none{margin-left:0px !important;}
        .col-money{color: #2ecc71;}
        .col-red{color: #e35d59;}
        .font-10{font-size: 10px;}
        .font-14{font-size: 14px;}
        .font-16{font-size: 16px;}
        .font-17{font-size: 17px;}
        .font-18{font-size: 18px;}
        .font-24{font-size: 24px;}
        .font-28{font-size: 28px;}
        .font-30{font-size: 30px;}
        .font-40{font-size: 40px;}
        .font-62{font-size: 62px;}
        .font-58{font-size: 58px;}
        .mt5{margin-top: 5px;}
        .mt8{margin-top: 28px;}
        .mb8{margin-bottom: 8px;}
        .no-boxshadow{box-shadow: none;}

        .bg-acc{background-color: #F3C300;}
        .bg-percepatan{background-color: #68001C;}
        .bg-segmen{background-color: #F38400;}
        .bg-legal{background-color: #68001C;}
        .bg-npk{background-color: #68001C;}
        .bg-revisi{background-color: #68001C;}
        .bg-dochilang{background-color: #68001C;}
        .bg-invidea{background-color: #A1CAF1;}
        .bg-precise{background-color: #A1CAF1;}
        .bg-logistik{background-color: #68001C;}
        .bg-keuangan{background-color: #C2B280;}
        .bg-forecasting{background-color: #B5A779;}
        .bg-paid{background-color: #B06755;}

        .p-10{padding: 10px;}
        .p-20{padding: 20px;}
        .b-bottom{border-bottom: 1px solid #f4f4f4;}
        .no-boxshadow{box-shadow: none;}
        .no-radius{border-radius: unset;}
        .col-white{color:#CBD5E1;}
        .bg-dark{background: #1B253B;color: #CBD5E1;}
        .box-dark{background: #232D45; border: none; color:#CBD5E1 !important;}
        .nav-tabs-custom>.tab-content{background: #232D45;}
        .nav-tabs-custom>.nav-tabs>li>a{color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs.pull-right>li{background: #232D45; color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs>li.active{border-top-color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs>li>a:hover, .nav-tabs-custom>.nav-tabs>li.active>a:hover{color: #dbe5f1;}
        .nav-tabs-custom>.nav-tabs>li.active>a, .nav-tabs-custom>.nav-tabs>li.active:hover>a{background-color: #232D45 !important;}
        .nav-tabs-custom>.nav-tabs>li.active>a{background: #232D45 !important; color:#CBD5E1;}
        .info-box-number {display: block;font-weight: bold;font-size: 18px;}
        .description-block{display: block;margin: 10px 0;text-align: center;}
        .border-right{border-right: 1px solid #f4f4f4;}

        .table {
            --bs-table-color: #CBD5E1;
            --bs-table-bg: unset;
        }
    </style>

    <?php $this->carabiner->display('js_head');?>
</head>
<body class="hold-transition lockscreen bg-dark">

    <div style="max-width: 100%;">
        <section class="content p-20">
            <div class="card no-radius p-10 box-dark">
                <div class="card-header p-10 b-bottom col-white">
                    <div class="row">
                        <div class="box-title col-lg-6">
                            <span class="font-40">DAILYREPORT COLLECTION</span>
                            <br><i><?php echo customDate(date('Y-m-d H:i:s'));?></i>
                        </div>
                        <div class="box-tools col-lg-6 text-right">
                            <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet-white.png'; ?>" alt="Koperasi Metropolitan" width="95px"/>
                        </div>
                    </div>
                </div>
                <div class="card-body no-border">
                    <div class="row col-md-12">
                        <div class="col-md-3 no-padding">
                            <div class="margin-bottom-none no-border">
                                <div class="info-box-content margin-left-none">
                                    <span>Collection Q3</span>
                                    <span class="info-box-number col-money font-24">Rp <?php echo strrev(implode('.',str_split(strrev(strval($collq)),3)));?></span>
                                    <span class="progress-description font-10 mt5">Target Q3 : <?php echo formatrev($targetqcoll);?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding">
                            <div class="col-md-12">
                                <div class="font-58 text-center"><small><i class="ti ti-trending-up" style="color: #2ecc71; font-size: medium; padding: 10px;"></i></small><?php echo sprintf("%0.1f", $prosentasecollq);?><small style="font-size: small;">%</small></div>
                            </div>
                        </div>

                        <div class="col-md-3 no-padding">
                            <div class="margin-bottom-none no-border">
                                <div class="info-box-content margin-left-none">
                                    <span>COLLECTION CURRENT MONTH</span>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">VOL</div>
                                        <div class="col-md-6">VAL</div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6 col-money"><?php echo $collcm[0]['volcoll'];?></div>
                                        <div class="col-md-6 col-money"><?php echo strrev(implode('.',str_split(strrev(strval($collcm[0]['valcoll'])),3)));;?></div>
                                    </div>
                                    <div class="row col-md-12">
                                        <span class="progress-description font-10 mt5">Target CM : <?php echo formatrev($targetcmcoll);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 no-padding">
                            <div class="col-md-12">
                                <div class="font-58 text-center"><small><i class="ti ti-chevrons-up" style="color: #2ecc71; font-size: medium; padding: 10px;"></i></small><?php echo sprintf("%0.1f", $prosentasecollcm);?><small style="font-size: small;">%</small></div>
                            </div>
                        </div>

                        <div class="row col-md-12 mt8">
                            <div class="row">
                                <div class="col-sm-3 col-xs-3">
                                    <div class="description-block border-right">
                                        <h5 class="description-header col-money">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($collpaidyear)),3)))?></h5>
                                        <span class="description-text col-white">PAID</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="description-block border-right">
                                        <h5 class="description-header col-red">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($finance)),3)))?></h5>
                                        <span class="description-text col-white">Finance</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="description-block border-right">
                                        <h5 class="description-header col-red">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($precise)),3)))?></h5>
                                        <span class="description-text col-white">Precise</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="description-block border-right">
                                        <h5 class="description-header col-red">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($unpaid)),3)))?></h5>
                                        <span class="description-text col-white">UNPAID</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- box monthly coll yoy -->
                        <div class="row col-md-12 mt8 no-padding">
                            <div class="box box-dark">
                                <div class="row">
                                    <div class="col-md-8 mt8 no-padding">
                                        <div class="box-header font-24 col-white">Monthly Collection YoY</div>
                                        <div class="box-body">
                                            <div class="chart">
                                                <div id="chartcollpaidmonthly" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt8 no-padding">
                                        <div class="box-header font-24 col-white">Collection Distribution</div>
                                        <div class="box-body">
                                            <div class="chart">
                                                <div id="piecolldo" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- box pencairan bulan ini -->
                        <div class="col-md-12 mt8">
                            <div class="box box-dark">
                                <div class="box-header font-24 col-white">Collection <?php echo date('F Y');?></div>
                                <div class="box-body">
                                    <div class="chart">
                                        <div id="chartarday" style="height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content p-20">
            <div class="card no-radius p-10 box-dark">
                <div class="card-header p-10 b-bottom col-white">
                    <div class="row">
                        <div class="box-title col-lg-6">
                            <span class="font-40">HIGHLIGHT Pencairan Piutang</span>
                        </div>
                    </div>
                </div>
                <div class="card-body no-border">
                    <div class="row col-md-12 no-margin">
                        <div class="col-md-6">
                            <div class="box box-dark">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="font-28">Bulan : <?php echo getIndMonth(date('m')).' '.date('Y');?></span>
                                            <div>
                                                <span class="font-28">Target : <strong class="col-money"><?php echo formatrev($targetcmcoll); ?></strong></span>
                                                <span class="font-28" style="margin-left:50px;">PAID : <strong class="col-money"><?php echo formatrev($collcm[0]['valcoll']);?></strong> - <?php if(!empty($collcm[0]['valcoll'])){ echo sprintf("%0.1f", $targetcmcoll/$collcm[0]['valcoll']); }else{ echo '0'; }?>%</span>
                                            </div>
                                            <span class="font-28"><u>Progress</u></span>
                                            <div>Finance Telkom : <?php echo formatrev($financetelpro[0]['valinv']);?> | <?php echo $financetelpro[0]['volinv'];?> INV</div>
                                            <div>Finance Telpro : <?php echo formatrev($financenontelpro[0]['valinv']);?> | <?php echo $financenontelpro[0]['volinv'];?> INV</div>
                                            <div>IBL Logistik : <?php echo formatrev($logiibl[0]['valinv']);?> | <?php echo $logiibl[0]['volinv'];?> INV</div>
                                            <div>OBL Precise : <?php echo formatrev($preciseobl[0]['valinv']);?> | <?php echo $preciseobl[0]['volinv'];?> INV</div>
                                            <div>Revisi : <?php echo formatrev($revisi[0]['valinv']);?> | <?php echo $revisi[0]['volinv'];?> INV</div>
                                            <div>Total : <?php echo formatrev($financetelpro[0]['valinv']+$financenontelpro[0]['valinv']+$logiibl[0]['valinv']+$preciseobl[0]['valinv']+$revisi[0]['valinv']);?> | <?php echo $financetelpro[0]['volinv']+$financenontelpro[0]['volinv']+$logiibl[0]['volinv']+$preciseobl[0]['volinv']+$revisi[0]['volinv'];?> INV</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="material-datatables table-responsive">
                                <table class="table table-bordered" cellspacing="0" style="width:80%; margin:0 auto; margin-right:18px;">
                                    <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">PAID Today</th>
                                    </tr>
                                    <tr>
                                        <th>AR</th>
                                        <th class="text-right">PAID</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($totalpaidardaily as $row){?>
                                        <tr>
                                            <td><?php echo $row['arname'];?></td>
                                            <td class="text-right">
                                                <strong>
                                                    <?php
                                                    if(empty($row['valinv'])){
                                                        echo '0';
                                                    }else{
                                                        echo formatrev($row['valinv']);
                                                    }
                                                    ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    <?} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12 mt8">
                        <div class="col-md-8">
                            <div class="box box-dark no-boxshadow">
                                <div class="box-header col-white">
                                    <span class="font-40">PAID <?php echo date('F Y');?></span>
                                </div>
                                <div class="box-body">
                                    <div class="nav-tabs-custom box-dark" style="cursor: move;">
                                        <ul class="nav nav-tabs salespf" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#monthlypaidvol" role="tab" aria-selected="false" tabindex="-1">
                                                    <span>Volume</span>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#monthlypaidval" role="tab" aria-selected="false" tabindex="-1">
                                                    <span>Value</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content no-padding">
                                            <div class="chart tab-pane active" id="monthlypaidvol" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                <div id="chartpaidmonthlyvol" class="box-dark" style="height: 250px;"></div>
                                            </div>
                                            <div class="chart tab-pane" id="monthlypaidval" style="position: relative; height: 300px;">
                                                <div id="chartpaidmonthlyval" class="box-dark" style="height: 250px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box box-dark no-boxshadow">
                                <div class="box-header">
                                    <div class="font-40 text-center col-white"><?php echo sprintf("%0.1f", $prosentasecollcm);?>%</div>
                                </div>
                                <div class="box-body">
                                    <div style="padding: 0px 30px; margin: 0 auto;">
                                        <h2 class="text-center col-white"><i class="ti ti-users"></i> AR Collect <?php echo date('F Y');?></h2>
                                        <?php foreach($totalpaidarmonthly as $key=>$row){?>
                                            <div class="col-md-12" style="font-size: 18px;">
                                                <p>
                                                    <span><?php echo ($key+1).'. '.$row['arname'];?></span>
                                                    <span class="float-end">
                                                    Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['valinv'])),3)));?>
                                                </span>
                                                </p>
                                                <hr>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12 mt8">
                        <div class="col-md-8">
                            <div class="box box-dark no-boxshadow">
                                <div class="box-header col-white">
                                    <span class="font-40">PAID 2021 - Today</span>
                                </div>
                                <div class="box-body">
                                    <div class="nav-tabs-custom box-dark" style="cursor: move;">
                                        <ul class="nav nav-tabs salespf" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#totalpaidvol" role="tab" aria-selected="false" tabindex="-1">
                                                    <span>Volume</span>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#totalpaidval" role="tab" aria-selected="false" tabindex="-1">
                                                    <span>Value</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content no-padding">
                                            <div class="chart tab-pane active" id="totalpaidvol" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                <div id="charttotalpaidarvol" class="box-dark" style="height: 250px;"></div>
                                            </div>
                                            <div class="chart tab-pane" id="totalpaidval" style="position: relative; height: 300px;">
                                                <div id="charttotalpaidarval" class="box-dark" style="height: 250px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box box-dark no-boxshadow">
                                <div class="box-body">
                                    <div style="padding: 0px 30px; margin: 0 auto;">
                                        <h2 class="text-center col-white"><i class="ti ti-users"></i> AR Collect 2021 - Today</h2>
                                        <?php foreach($totalpaidar as $key=>$row){?>
                                            <div class="col-md-12" style="font-size: 18px;">
                                                <p>
                                                    <span><?php echo ($key+1).'. '.$row['arname'];?></span>
                                                    <span class="float-end">
                                                    Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['valinv'])),3)));?>
                                                </span>
                                                </p>
                                                <hr>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content p-20">
            <div class="card no-radius p-10 box-dark">
                <div class="card-header p-10 b-bottom col-white">
                    <div class="row">
                        <div class="box-title col-lg-6">
                            <span class="font-40">COLLECTION REPORT</span>
                            <br><span class="font-24">JAN 2021 - <?php echo getIndMonth(date('m')).' '.date('Y');?></span>
                        </div>
                    </div>
                </div>
                <div class="card-body no-border">
                    <div class="row col-md-12 no-margin">
                        <div class="box box-dark">
                            <div class="box-body text-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="font-30">LIST PIUTANG</span>
                                        <br>
                                        <span class="font-28"><strong class="col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval($coll)),3))); ?></strong></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="font-30">DONE</span>
                                        <br>
                                        <span class="font-28"><strong class="col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval($collpaid)),3))); ?></strong></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="font-30">Persentase</span>
                                        <br>
                                        <span class="font-28">
                                                <?php echo sprintf("%0.1f", $collpaid/$coll*100);?>%
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box no-border box-dark" style="box-shadow: none; margin: 30px 0 ;">
                            <div class="box-body font-17">
                                <div class="row col-md-12 no-padding">
                                    <div class="col-md-4">
                                        <p class="text-center"><strong>DATA PIUTANG</strong></p>
                                        <div class="material-datatables table-responsive">
                                            <table class="table table-bordered" cellspacing="0" style="width:70%; margin:0 auto;">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Team</th>
                                                    <th class="text-right">Nilai</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">SNI</td>
                                                    <td class="text-right"><strong><?php echo formatrev($collsni[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">LV</td>
                                                    <td class="text-right"><strong><?php echo formatrev($colllv[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">IE</td>
                                                    <td class="text-right"><strong><?php echo formatrev($collie[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">TOTAL</td>
                                                    <?php $totalcollam = $collsni[0]['valinv']+$colllv[0]['valinv']+$collie[0]['valinv'];?>
                                                    <td class="text-right"><strong><?php echo formatrev($totalcollam); ?></strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center"><strong>PENCAIRAN</strong></p>
                                        <div class="material-datatables table-responsive">
                                            <table class="table table-bordered" cellspacing="0" style="width:90%; margin:0 auto;">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Team</th>
                                                    <th class="text-right">Target</th>
                                                    <th class="text-right">Ach</th>
                                                    <th class="text-right">%</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">SNI</td>
                                                    <td class="text-right">10 M</td>
                                                    <td class="text-right"><strong><?php echo formatrev($paidsni[0]['valinv']); ?></strong></td>
                                                    <td class="text-right"><?php echo sprintf("%0.1f", $paidsni[0]['valinv']/10000000000*100);?>%</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">LV</td>
                                                    <td class="text-right">9 M</td>
                                                    <td class="text-right"><strong><?php echo formatrev($paidlv[0]['valinv']); ?></strong></td>
                                                    <td class="text-right"><?php echo sprintf("%0.1f", $paidlv[0]['valinv']/9000000000*100);?>%</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">IE</td>
                                                    <td class="text-right">2 M</td>
                                                    <td class="text-right"><strong><?php echo formatrev($paidie[0]['valinv']); ?></strong></td>
                                                    <td class="text-right"><?php echo sprintf("%0.1f", $paidie[0]['valinv']/2000000000*100);?>%</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">TOTAL</td>
                                                    <td class="text-right">21 M</td>
                                                    <?php $totalpaidam = $paidsni[0]['valinv']+$paidlv[0]['valinv']+$paidie[0]['valinv'];?>
                                                    <td class="text-right"><strong><?php echo formatrev($totalpaidam); ?></strong></td>
                                                    <td class="text-right"><?php echo sprintf("%0.1f", $totalpaidam/21000000000*100);?>%</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center"><strong>DATA PANJAR SPB INVOICE</strong></p>
                                        <div class="material-datatables table-responsive">
                                            <table class="table table-bordered" cellspacing="0" style="width:70%; margin:0 auto;">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Team</th>
                                                    <th class="text-right">Nilai</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">SNI</td>
                                                    <td class="text-right"><strong><?php echo formatrev($panjarsni[0]['valspb']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">LV</td>
                                                    <td class="text-right"><strong><?php echo formatrev($panjarlv[0]['valspb']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">IE</td>
                                                    <td class="text-right"><strong><?php echo formatrev($panjarie[0]['valspb']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">TOTAL</td>
                                                    <?php $totalpanjaram = $panjarsni[0]['valspb']+$panjarlv[0]['valspb']+$panjarie[0]['valspb'];?>
                                                    <td class="text-right"><strong><?php echo formatrev($totalpanjaram); ?></strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12 no-padding" style="margin-top: 40px">
                                    <div class="col-md-4">
                                        <p class="text-center"><strong>AR > 1 thn</strong></p>
                                        <div class="material-datatables table-responsive">
                                            <table class="table table-bordered" cellspacing="0" style="width:70%; margin:0 auto;">
                                                <thead>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th class="text-center">Vol</th>
                                                    <th class="text-right">Nilai</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">Total</td>
                                                    <td class="text-center"><?php echo $arlarge[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($arlarge[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Closed</td>
                                                    <td class="text-center"><?php echo $arlargepaid[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($arlargepaid[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">OGP</td>
                                                    <td class="text-center"><?php echo $arlarge[0]['volinv']-$arlargepaid[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($arlarge[0]['valinv']-$arlargepaid[0]['valinv']); ?></strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center"><strong>AR 7 - 12 bln</strong></p>
                                        <div class="material-datatables table-responsive">
                                            <table class="table table-bordered" cellspacing="0" style="width:90%; margin:0 auto;">
                                                <thead>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th class="text-center">Vol</th>
                                                    <th class="text-right">Nilai</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">Total</td>
                                                    <td class="text-center"><?php echo $armedium[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($armedium[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Closed</td>
                                                    <td class="text-center"><?php echo $armediumpaid[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($armediumpaid[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">OGP</td>
                                                    <td class="text-center"><?php echo $armedium[0]['volinv']-$armediumpaid[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($armedium[0]['valinv']-$armediumpaid[0]['valinv']); ?></strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center"><strong>AR 1 - 6 bln</strong></p>
                                        <div class="material-datatables table-responsive">
                                            <table class="table table-bordered" cellspacing="0" style="width:70%; margin:0 auto;">
                                                <thead>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th class="text-center">Vol</th>
                                                    <th class="text-right">Nilai</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">Total</td>
                                                    <td class="text-center"><?php echo $arsmall[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($arsmall[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">Closed</td>
                                                    <td class="text-center"><?php echo $arsmallpaid[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($arsmallpaid[0]['valinv']); ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">OGP</td>
                                                    <td class="text-center"><?php echo $arsmall[0]['volinv']-$arsmallpaid[0]['volinv'];?></td>
                                                    <td class="text-right"><strong><?php echo formatrev($arsmall[0]['valinv']-$arsmallpaid[0]['valinv']); ?></strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12 no-margin">
                        <div class="col-md-6">
                            <div class="box box-dark">
                                <div class="box-header font-24 text-center col-white">S-N-I Collection</div>
                                <div class="box-body">
                                    <div class="chart">
                                        <div id="piecollsni" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="material-datatables table-responsive box-dark">
                                <table class="table table-bordered " cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>AR KOMET</th>
                                        <th>AM KOMET</th>
                                        <th class="text-center">KETERANGAN</th>
                                        <th class="text-right">VOL</th>
                                        <th class="text-right">VAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $collamsni as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td>IMAN</td>
                                            <td>
                                                <?php
                                                if($row['amkomet'] == 'Indra Saputra Fardilla'){
                                                    echo 'Sigit Hidayatullah';
                                                }else{
                                                    echo $row['amkomet'];
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                switch ($row['status']) {
                                                    case '0':
                                                        echo '<span class="badge  bg-acc">Accurate</span>';
                                                        break;
                                                    case '1':
                                                        echo '<span class="badge  bg-paid">PAID</span>';
                                                        break;
                                                    case '2':
                                                        echo '<span class="badge  bg-segmen">Segmen</span>';
                                                        break;
                                                    case '3':
                                                        echo '<span class="badge  bg-invidea">Invidea</span>';
                                                        break;
                                                    case '4':
                                                        echo '<span class="badge  bg-precise">Precise</span>';
                                                        break;
                                                    case '16':
                                                        echo '<span class="badge  bg-logistik">LOGISTIK</span>';
                                                        break;
                                                    case '18':
                                                        echo '<span class="badge  bg-keuangan">Keuangan</span>';
                                                        break;
                                                    case '7':
                                                        echo '<span class="badge  bg-legal">Legal</span>';
                                                        break;
                                                    case '10':
                                                        echo '<span class="badge  bg-forecasting">Forecasting</span>';
                                                        break;
                                                    case '6':
                                                        echo '<span class="badge  bg-percepatan">Percepatan</span>';
                                                        break;
                                                    case '5':
                                                        echo '<span class="badge  bg-revisi">Revisi</span>';
                                                        break;
                                                    case '11':
                                                        echo '<span class="badge  bg-npk">NPK</span>';
                                                        break;
                                                    case '8':
                                                        echo '<span class="badge  bg-dochilang">Doc Hilang</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge  label-danger">Belum Cair</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right"><?php echo $row['volinv'];?></td>
                                            <td class="text-right"><strong class="col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['valinv'])),3))); ?></strong></td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>TOTAL</strong></td>
                                        <td class="text-right"><?php echo array_sum(array_column($collamsni, 'volinv'));?></td>
                                        <td class="text-right"><strong class="col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval(array_sum(array_column($collamsni, 'valinv')))),3)));?></strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-dark">
                                <div class="box-header font-24 text-center col-white">L-V Collection</div>
                                <div class="box-body">
                                    <div class="chart">
                                        <div id="piecolllv" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="material-datatables table-responsive box-dark">
                                <table class="table table-bordered " cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>AR KOMET</th>
                                        <th>AM KOMET</th>
                                        <th class="text-center">KETERANGAN</th>
                                        <th class="text-right">VOL</th>
                                        <th class="text-right">VAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $collamlv as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td>LUTHFI</td>
                                            <td><?php echo $row['amkomet'];?></td>
                                            <td class="text-center">
                                                <?php
                                                switch ($row['status']) {
                                                    case '0':
                                                        echo '<span class="badge  bg-acc">Accurate</span>';
                                                        break;
                                                    case '1':
                                                        echo '<span class="badge  bg-paid">PAID</span>';
                                                        break;
                                                    case '2':
                                                        echo '<span class="badge  bg-segmen">Segmen</span>';
                                                        break;
                                                    case '3':
                                                        echo '<span class="badge  bg-invidea">Invidea</span>';
                                                        break;
                                                    case '4':
                                                        echo '<span class="badge  bg-precise">Precise</span>';
                                                        break;
                                                    case '16':
                                                        echo '<span class="badge  bg-logistik">LOGISTIK</span>';
                                                        break;
                                                    case '18':
                                                        echo '<span class="badge  bg-keuangan">Keuangan</span>';
                                                        break;
                                                    case '7':
                                                        echo '<span class="badge  bg-legal">Legal</span>';
                                                        break;
                                                    case '10':
                                                        echo '<span class="badge  bg-forecasting">Forecasting</span>';
                                                        break;
                                                    case '6':
                                                        echo '<span class="badge  bg-percepatan">Percepatan</span>';
                                                        break;
                                                    case '5':
                                                        echo '<span class="badge  bg-revisi">Revisi</span>';
                                                        break;
                                                    case '11':
                                                        echo '<span class="badge  bg-npk">NPK</span>';
                                                        break;
                                                    case '8':
                                                        echo '<span class="badge  bg-dochilang">Doc Hilang</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge  label-danger">Belum Cair</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right"><?php echo $row['volinv'];?></td>
                                            <td class="text-right"><strong class="col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['valinv'])),3))); ?></strong></td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>TOTAL</strong></td>
                                        <td class="text-right"><?php echo array_sum(array_column($collamlv, 'volinv'));?></td>
                                        <td class="text-right"><strong class="col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval(array_sum(array_column($collamlv, 'valinv')))),3)));?></strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12 no-margin">
                        <div class="col-md-6 offset-3">
                            <div class="box box-dark">
                                <div class="box-header font-24 text-center col-white">I-E Collection</div>
                                <div class="box -body">
                                    <div class="chart box-dark">
                                        <div id="piecollie" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="material-datatables table-responsive">
                                <table class="table table-bordered " cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>AR KOMET</th>
                                        <th>AM KOMET</th>
                                        <th class="text-center">KETERANGAN</th>
                                        <th class="text-right">VOL</th>
                                        <th class="text-right">VAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $collamie as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td>INDRA</td>
                                            <td><?php echo $row['amkomet'];?></td>
                                            <td class="text-center">
                                                <?php
                                                switch ($row['status']) {
                                                    case '0':
                                                        echo '<span class="badge  bg-acc">Accurate</span>';
                                                        break;
                                                    case '1':
                                                        echo '<span class="badge  bg-paid">PAID</span>';
                                                        break;
                                                    case '2':
                                                        echo '<span class="badge  bg-segmen">Segmen</span>';
                                                        break;
                                                    case '3':
                                                        echo '<span class="badge  bg-invidea">Invidea</span>';
                                                        break;
                                                    case '4':
                                                        echo '<span class="badge  bg-precise">Precise</span>';
                                                        break;
                                                    case '16':
                                                        echo '<span class="badge  bg-logistik">LOGISTIK</span>';
                                                        break;
                                                    case '18':
                                                        echo '<span class="badge  bg-keuangan">Keuangan</span>';
                                                        break;
                                                    case '7':
                                                        echo '<span class="badge  bg-legal">Legal</span>';
                                                        break;
                                                    case '10':
                                                        echo '<span class="badge  bg-forecasting">Forecasting</span>';
                                                        break;
                                                    case '6':
                                                        echo '<span class="badge  bg-percepatan">Percepatan</span>';
                                                        break;
                                                    case '5':
                                                        echo '<span class="badge  bg-revisi">Revisi</span>';
                                                        break;
                                                    case '11':
                                                        echo '<span class="badge  bg-npk">NPK</span>';
                                                        break;
                                                    case '8':
                                                        echo '<span class="badge  bg-dochilang">Doc Hilang</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge  label-danger">Belum Cair</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right"><?php echo $row['volinv'];?></td>
                                            <td class="text-right"><strong class="col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['valinv'])),3))); ?></strong></td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>TOTAL</strong></td>
                                        <td class="text-right"><?php echo array_sum(array_column($collamie, 'volinv'));?></td>
                                        <td class="text-right"><strong class="col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval(array_sum(array_column($collamie, 'valinv')))),3)));?></strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="lockscreen-footer text-center">
            Copyright &copy; <?php echo date('Y')?>. All rights reserved
            <br><b>Crafted with <i class="ti ti-heart" style="color: #f06548 !important;"></i> by Koperasi Metropolitan</b>
            <br><p style="color: #8f9b9f;">rendering in {elapsed_time} seconds</p>
            <br>
        </div>
    </div>

    <?php $this->carabiner->display('js_content');?>
    <script>
        $(function () {
            function reloadletter() {
                window.location.href = '<?php echo site_url('quickreport/dcollect')?>';
            }
            setInterval(reloadletter , 60000); /* setiap 15 detik */

            var table = $('.datatable').DataTable({
                'responsive'  : true,
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
            });
        });

        am4core.ready(function() {
            // Themes begin
            am4core.useTheme(am4themes_dark);
	        am4core.useTheme(am4themes_frozen);
            am4core.useTheme(am4themes_animated);
            // Themes end

            //---------Start chart nanza collect
            var chart = am4core.create("piecollsni", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = <?php echo json_encode($piecollamsni) ?>;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "valinv";
            series.dataFields.category = "statusname";
            series.hiddenInLegend = false;
            //------End chart User Performance

            //---------Start chart vania collect
            var chart = am4core.create("piecolllv", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = <?php echo json_encode($collamlv) ?>;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "valinv";
            series.dataFields.category = "statusname";
            series.hiddenInLegend = false;
            //------End chart User Performance

            //---------Start chart eva collect
            var chart = am4core.create("piecollie", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = <?php echo json_encode($collamie) ?>;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "valinv";
            series.dataFields.category = "statusname";
            series.hiddenInLegend = false;
            //------End chart User Performance

            //---------Start chart collect order
            var chart = am4core.create("piecolldo", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = <?php echo json_encode($collorderstatus) ?>;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "valinv";
            series.dataFields.category = "orderstatus";
            series.hiddenInLegend = false;
            //------End chart User Performance

            //------Start chart YoY VAL
            var chart = am4core.create("chartcollpaidmonthly", am4charts.XYChart);

            chart.data = <?php echo $collpaidmonthly; ?>;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "month";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Total growth rate";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "lastyear";
            series.dataFields.categoryX = "month";
            series.clustered = false;
            series.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";

            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.dataFields.valueY = "thisyear";
            series2.dataFields.categoryX = "month";
            series2.clustered = false;
            series2.columns.template.width = am4core.percent(50);
            series2.tooltipText = "Total grow in {categoryX} (2025): [bold]{valueY}[/]";

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.disabled = true;
            chart.cursor.lineY.disabled = true;
            //------End chart YoY VAL

            //------Start Pencairan Bulan ini
            var chart = am4core.create("chartarday", am4charts.XYChart);

            // Add data
            chart.data = <?php echo $getarbyday ?>;

            // Set input format for the dates
            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

            // Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

            // Create series
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "totalpaid";
            series.dataFields.dateX = "procdat";
            series.tooltipText = "{totalpaid}"
            series.strokeWidth = 2;
            series.minBulletDistance = 15;
            series.fill = am4core.color("#0984e3");
            series.stroke = am4core.color("#0984e3");

            // Drop-shaped tooltips
            series.tooltip.background.cornerRadius = 20;
            series.tooltip.background.strokeOpacity = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.tooltip.label.minWidth = 80;
            series.tooltip.label.minHeight = 80;
            series.tooltip.label.textAlign = "middle";
            series.tooltip.label.textValign = "middle";

            // Make bullets grow on hover
            var bullet = series.bullets.push(new am4charts.CircleBullet());
            bullet.circle.strokeWidth = 2;
            bullet.circle.radius = 4;
            bullet.circle.fill = am4core.color("#fff");

            var bullethover = bullet.states.create("hover");
            bullethover.properties.scale = 1.3;

            // Make a panning cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "panXY";
            chart.cursor.xAxis = dateAxis;
            chart.cursor.snapToSeries = series;

            // Create vertical scrollbar and place it before the value axis
            chart.scrollbarY = new am4core.Scrollbar();
            chart.scrollbarY.parent = chart.leftAxesContainer;
            chart.scrollbarY.toBack();

            // Create a horizontal scrollbar with previe and place it underneath the date axis
            chart.scrollbarX = new am4charts.XYChartScrollbar();
            chart.scrollbarX.series.push(series);
            chart.scrollbarX.parent = chart.bottomAxesContainer;

            chart.events.on("ready", function () {
                dateAxis.zoom({start:0, end:1});
            });
            //------End Pencairan Bulan ini

	        //------Start chart PAID MONTHLY AR VOL
	        var chart = am4core.create("chartpaidmonthlyvol", am4charts.XYChart);
	        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

	        chart.paddingBottom = 30;

	        chart.data = <?php echo $charttotalpaidarmonthly; ?>;

	        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	        categoryAxis.dataFields.category = "arname";
	        categoryAxis.renderer.grid.template.strokeOpacity = 0;
	        categoryAxis.renderer.minGridDistance = 10;
	        categoryAxis.renderer.labels.template.dy = 35;
	        categoryAxis.renderer.tooltip.dy = 35;

	        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	        valueAxis.renderer.inside = true;
	        valueAxis.renderer.labels.template.fillOpacity = 0.3;
	        valueAxis.renderer.grid.template.strokeOpacity = 0;
	        valueAxis.min = 0;
	        valueAxis.cursorTooltipEnabled = false;
	        valueAxis.renderer.baseGrid.strokeOpacity = 0;

	        var series = chart.series.push(new am4charts.ColumnSeries);
	        series.dataFields.valueY = "volinv";
	        series.dataFields.categoryX = "arname";
	        series.tooltipText = "{valueY.value}";
	        series.tooltip.pointerOrientation = "vertical";
	        series.tooltip.dy = - 6;
	        series.columnsContainer.zIndex = 100;

	        var columnTemplate = series.columns.template;
	        columnTemplate.width = am4core.percent(50);
	        columnTemplate.maxWidth = 66;
	        columnTemplate.column.cornerRadius(60, 60, 10, 10);
	        columnTemplate.strokeOpacity = 0;

	        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#13deb9"), max: am4core.color("#13deb9") });
	        /*series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });*/
	        series.mainContainer.mask = undefined;

	        var cursor = new am4charts.XYCursor();
	        chart.cursor = cursor;
	        cursor.lineX.disabled = true;
	        cursor.lineY.disabled = true;
	        cursor.behavior = "none";

	        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
	        bullet.circle.radius = 30;
	        bullet.valign = "bottom";
	        bullet.align = "center";
	        bullet.isMeasured = true;
	        bullet.mouseEnabled = false;
	        bullet.verticalCenter = "bottom";
	        bullet.interactionsEnabled = false;

	        var hoverState = bullet.states.create("hover");
	        var outlineCircle = bullet.createChild(am4core.Circle);
	        outlineCircle.adapter.add("radius", function (radius, target) {
		        var circleBullet = target.parent;
		        return circleBullet.circle.pixelRadius + 10;
	        })

	        var image = bullet.createChild(am4core.Image);
	        image.width = 60;
	        image.height = 60;
	        image.horizontalCenter = "middle";
	        image.verticalCenter = "middle";
	        image.propertyFields.href = "arphoto";

	        image.adapter.add("mask", function (mask, target) {
		        var circleBullet = target.parent;
		        return circleBullet.circle;
	        })

	        var previousBullet;
	        chart.cursor.events.on("cursorpositionchanged", function (event) {
		        var dataItem = series.tooltipDataItem;

		        if (dataItem.column) {
			        var bullet = dataItem.column.children.getIndex(1);

			        if (previousBullet && previousBullet != bullet) {
				        previousBullet.isHover = false;
			        }

			        if (previousBullet != bullet) {

				        var hs = bullet.states.getKey("hover");
				        hs.properties.dy = -bullet.parent.pixelHeight + 30;
				        bullet.isHover = true;

				        previousBullet = bullet;
			        }
		        }
	        })
	        //------End chart PAID MONTHLY AR VOL

	        //------Start chart PAID MONTHLY AR VAL
	        var chart = am4core.create("chartpaidmonthlyval", am4charts.XYChart);
	        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

	        chart.paddingBottom = 30;

	        chart.data = <?php echo $charttotalpaidarmonthly ?>;

	        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	        categoryAxis.dataFields.category = "arname";
	        categoryAxis.renderer.grid.template.strokeOpacity = 0;
	        categoryAxis.renderer.minGridDistance = 10;
	        categoryAxis.renderer.labels.template.dy = 35;
	        categoryAxis.renderer.tooltip.dy = 35;

	        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	        valueAxis.renderer.inside = true;
	        valueAxis.renderer.labels.template.fillOpacity = 0.3;
	        valueAxis.renderer.grid.template.strokeOpacity = 0;
	        valueAxis.min = 0;
	        valueAxis.cursorTooltipEnabled = false;
	        valueAxis.renderer.baseGrid.strokeOpacity = 0;

	        var series = chart.series.push(new am4charts.ColumnSeries);
	        series.dataFields.valueY = "valinv";
	        series.dataFields.categoryX = "arname";
	        series.tooltipText = "{valueY.value}";
	        series.tooltip.pointerOrientation = "vertical";
	        series.tooltip.dy = - 6;
	        series.columnsContainer.zIndex = 100;

	        var columnTemplate = series.columns.template;
	        columnTemplate.width = am4core.percent(50);
	        columnTemplate.maxWidth = 66;
	        columnTemplate.column.cornerRadius(60, 60, 10, 10);
	        columnTemplate.strokeOpacity = 0;

	        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#13deb9"), max: am4core.color("#13deb9") });
	        /*series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });*/
	        series.mainContainer.mask = undefined;

	        var cursor = new am4charts.XYCursor();
	        chart.cursor = cursor;
	        cursor.lineX.disabled = true;
	        cursor.lineY.disabled = true;
	        cursor.behavior = "none";

	        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
	        bullet.circle.radius = 30;
	        bullet.valign = "bottom";
	        bullet.align = "center";
	        bullet.isMeasured = true;
	        bullet.mouseEnabled = false;
	        bullet.verticalCenter = "bottom";
	        bullet.interactionsEnabled = false;

	        var hoverState = bullet.states.create("hover");
	        var outlineCircle = bullet.createChild(am4core.Circle);
	        outlineCircle.adapter.add("radius", function (radius, target) {
		        var circleBullet = target.parent;
		        return circleBullet.circle.pixelRadius + 10;
	        })

	        var image = bullet.createChild(am4core.Image);
	        image.width = 60;
	        image.height = 60;
	        image.horizontalCenter = "middle";
	        image.verticalCenter = "middle";
	        image.propertyFields.href = "arphoto";

	        image.adapter.add("mask", function (mask, target) {
		        var circleBullet = target.parent;
		        return circleBullet.circle;
	        })

	        var previousBullet;
	        chart.cursor.events.on("cursorpositionchanged", function (event) {
		        var dataItem = series.tooltipDataItem;

		        if (dataItem.column) {
			        var bullet = dataItem.column.children.getIndex(1);

			        if (previousBullet && previousBullet != bullet) {
				        previousBullet.isHover = false;
			        }

			        if (previousBullet != bullet) {

				        var hs = bullet.states.getKey("hover");
				        hs.properties.dy = -bullet.parent.pixelHeight + 30;
				        bullet.isHover = true;

				        previousBullet = bullet;
			        }
		        }
	        })
	        //------End chart PAID DAILY AR VAL

	        //------Start chart TOTAL PAID AR VOL
	        var chart = am4core.create("charttotalpaidarvol", am4charts.XYChart);
	        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

	        chart.paddingBottom = 30;

	        chart.data = <?php echo $charttotalpaid; ?>;

	        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	        categoryAxis.dataFields.category = "arname";
	        categoryAxis.renderer.grid.template.strokeOpacity = 0;
	        categoryAxis.renderer.minGridDistance = 10;
	        categoryAxis.renderer.labels.template.dy = 35;
	        categoryAxis.renderer.tooltip.dy = 35;

	        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	        valueAxis.renderer.inside = true;
	        valueAxis.renderer.labels.template.fillOpacity = 0.3;
	        valueAxis.renderer.grid.template.strokeOpacity = 0;
	        valueAxis.min = 0;
	        valueAxis.cursorTooltipEnabled = false;
	        valueAxis.renderer.baseGrid.strokeOpacity = 0;

	        var series = chart.series.push(new am4charts.ColumnSeries);
	        series.dataFields.valueY = "volinv";
	        series.dataFields.categoryX = "arname";
	        series.tooltipText = "{valueY.value}";
	        series.tooltip.pointerOrientation = "vertical";
	        series.tooltip.dy = - 6;
	        series.columnsContainer.zIndex = 100;

	        var columnTemplate = series.columns.template;
	        columnTemplate.width = am4core.percent(50);
	        columnTemplate.maxWidth = 66;
	        columnTemplate.column.cornerRadius(60, 60, 10, 10);
	        columnTemplate.strokeOpacity = 0;

	        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#13deb9"), max: am4core.color("#13deb9") });
	        /*series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });*/
	        series.mainContainer.mask = undefined;

	        var cursor = new am4charts.XYCursor();
	        chart.cursor = cursor;
	        cursor.lineX.disabled = true;
	        cursor.lineY.disabled = true;
	        cursor.behavior = "none";

	        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
	        bullet.circle.radius = 30;
	        bullet.valign = "bottom";
	        bullet.align = "center";
	        bullet.isMeasured = true;
	        bullet.mouseEnabled = false;
	        bullet.verticalCenter = "bottom";
	        bullet.interactionsEnabled = false;

	        var hoverState = bullet.states.create("hover");
	        var outlineCircle = bullet.createChild(am4core.Circle);
	        outlineCircle.adapter.add("radius", function (radius, target) {
		        var circleBullet = target.parent;
		        return circleBullet.circle.pixelRadius + 10;
	        })

	        var image = bullet.createChild(am4core.Image);
	        image.width = 60;
	        image.height = 60;
	        image.horizontalCenter = "middle";
	        image.verticalCenter = "middle";
	        image.propertyFields.href = "arphoto";

	        image.adapter.add("mask", function (mask, target) {
		        var circleBullet = target.parent;
		        return circleBullet.circle;
	        })

	        var previousBullet;
	        chart.cursor.events.on("cursorpositionchanged", function (event) {
		        var dataItem = series.tooltipDataItem;

		        if (dataItem.column) {
			        var bullet = dataItem.column.children.getIndex(1);

			        if (previousBullet && previousBullet != bullet) {
				        previousBullet.isHover = false;
			        }

			        if (previousBullet != bullet) {

				        var hs = bullet.states.getKey("hover");
				        hs.properties.dy = -bullet.parent.pixelHeight + 30;
				        bullet.isHover = true;

				        previousBullet = bullet;
			        }
		        }
	        })
	        //------End chart TOTAL PAID AR VOL

	        //------Start chart TOTAL PAID AR VAL
	        var chart = am4core.create("charttotalpaidarval", am4charts.XYChart);
	        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

	        chart.paddingBottom = 30;

	        chart.data = <?php echo $charttotalpaid ?>;

	        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	        categoryAxis.dataFields.category = "arname";
	        categoryAxis.renderer.grid.template.strokeOpacity = 0;
	        categoryAxis.renderer.minGridDistance = 10;
	        categoryAxis.renderer.labels.template.dy = 35;
	        categoryAxis.renderer.tooltip.dy = 35;

	        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	        valueAxis.renderer.inside = true;
	        valueAxis.renderer.labels.template.fillOpacity = 0.3;
	        valueAxis.renderer.grid.template.strokeOpacity = 0;
	        valueAxis.min = 0;
	        valueAxis.cursorTooltipEnabled = false;
	        valueAxis.renderer.baseGrid.strokeOpacity = 0;

	        var series = chart.series.push(new am4charts.ColumnSeries);
	        series.dataFields.valueY = "valinv";
	        series.dataFields.categoryX = "arname";
	        series.tooltipText = "{valueY.value}";
	        series.tooltip.pointerOrientation = "vertical";
	        series.tooltip.dy = - 6;
	        series.columnsContainer.zIndex = 100;

	        var columnTemplate = series.columns.template;
	        columnTemplate.width = am4core.percent(50);
	        columnTemplate.maxWidth = 66;
	        columnTemplate.column.cornerRadius(60, 60, 10, 10);
	        columnTemplate.strokeOpacity = 0;

	        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#13deb9"), max: am4core.color("#13deb9") });
	        /*series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });*/
	        series.mainContainer.mask = undefined;

	        var cursor = new am4charts.XYCursor();
	        chart.cursor = cursor;
	        cursor.lineX.disabled = true;
	        cursor.lineY.disabled = true;
	        cursor.behavior = "none";

	        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
	        bullet.circle.radius = 30;
	        bullet.valign = "bottom";
	        bullet.align = "center";
	        bullet.isMeasured = true;
	        bullet.mouseEnabled = false;
	        bullet.verticalCenter = "bottom";
	        bullet.interactionsEnabled = false;

	        var hoverState = bullet.states.create("hover");
	        var outlineCircle = bullet.createChild(am4core.Circle);
	        outlineCircle.adapter.add("radius", function (radius, target) {
		        var circleBullet = target.parent;
		        return circleBullet.circle.pixelRadius + 10;
	        })

	        var image = bullet.createChild(am4core.Image);
	        image.width = 60;
	        image.height = 60;
	        image.horizontalCenter = "middle";
	        image.verticalCenter = "middle";
	        image.propertyFields.href = "arphoto";

	        image.adapter.add("mask", function (mask, target) {
		        var circleBullet = target.parent;
		        return circleBullet.circle;
	        })

	        var previousBullet;
	        chart.cursor.events.on("cursorpositionchanged", function (event) {
		        var dataItem = series.tooltipDataItem;

		        if (dataItem.column) {
			        var bullet = dataItem.column.children.getIndex(1);

			        if (previousBullet && previousBullet != bullet) {
				        previousBullet.isHover = false;
			        }

			        if (previousBullet != bullet) {

				        var hs = bullet.states.getKey("hover");
				        hs.properties.dy = -bullet.parent.pixelHeight + 30;
				        bullet.isHover = true;

				        previousBullet = bullet;
			        }
		        }
	        })
	        //------End chart TOTAL PAID AR VAL
        });
    </script>
</body>
</html>