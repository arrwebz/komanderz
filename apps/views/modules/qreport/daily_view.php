<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri')?>favicon.png" />

    <title><?php echo $title;?></title>
    <meta name="description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">

    <meta property="og:title" content="Daily Report <?php echo date('d-m-Y');?>">
    <meta property="og:description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo site_url('quickreport/daily');?>">
    <meta property="og:image" content="https://kms.kopegtel-metropolitan.co.id/public/assets/dist/img/logo-komet.png">
    <meta property="og:site_name" content="Komanders">

    <?php $this->carabiner->display('css_head');?>
    <style type="text/css">
        .margin-left-none{margin-left:0px !important;}
        .col-money{color: #fa591d;}
        .font-10{font-size: 10px;}
        .font-24{font-size: 24px;}
        .font-40{font-size: 40px;}
        .font-62{font-size: 62px;}
        .mt5{margin-top: 5px;}
        .mt8{margin-top: 28px;}
        .mb8{margin-bottom: 8px;}
        .no-boxshadow{box-shadow: none;}
    </style>

    <?php $this->carabiner->display('js_head');?>
</head>
<body class="hold-transition lockscreen">
<div style="max-width: 100%;">
    <section class="invoice">
        <div class="row">
            <div class="box no-border no-boxshadow">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span class="font-40">DAILYREPORT SALES</span>
                        <i><?php echo customDate(date('Y-m-d H:i:s'));?></i>
                    </h3>
                    <div class="box-tools">
                        <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet.png'; ?>" alt="Koperasi Metropolitan" width="95px"/>
                    </div>
                </div>

                <div class="box-body no-border">
                    <!-- box atas -->
                    <div class="col-md-12">
                        <div class="col-md-3 no-padding">
                            <div class="margin-bottom-none no-border">
                                <div class="info-box-content margin-left-none">
                                    <span>Realisasi Q3</span>
                                    <span class="info-box-number col-money font-24">Rp <?php echo strrev(implode('.',str_split(strrev(strval($realisasiq)),3)));?></span>
                                    <span class="progress-description font-10 mt5">Target Q3 : <?php echo formatrev($targetqsales);?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding">
                            <div class="col-md-12">
                                <div class="font-62 text-center"><?php echo sprintf("%0.1f", $prosentasereal);?>%</div>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding">
                            <div class="margin-bottom-none no-border">
                                <div class="info-box-content margin-left-none">
                                    <span>SALES CURRENT MONTH</span>
                                    <div class="col-md-12">
                                        <div class="col-md-6">VOL</div>
                                        <div class="col-md-6">VAL</div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6"><?php echo $volvalnopesmonthly[0]['volinv'];?></div>
                                        <div class="col-md-6">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($volvalnopesmonthly[0]['valinv'])),3)));;?></div>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="progress-description font-10 mt5">Target CM : <?php echo formatrev($targetcmsales);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding">
                            <div class="col-md-12">
                                <div class="font-62 text-center"><?php echo sprintf("%0.1f", $prosentasenopespros);?>%</div>
                            </div>
                        </div>
                    </div>

                    <!-- box yoy report -->
                    <div class="col-md-12 mt8">
                        <div class="box box-danger">
                            <div class="box-header font-24">YoY Report : VAL</div>
                            <div class="box-body">
                                <p class="text-center"><strong>Total Invoice Monthly <?php echo (date('Y')-1).' vs '.date('Y');?></strong></p>
                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <div id="chartyoyval" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- sales YoY-->
                    <div class="col-md-12">
                        <div class="col-md-8 mt8">
                            <div class="box box-danger">
                                <div class="box-header font-24">Division Sales YoY Semester I</div>
                                <div class="box-body">
                                    <div class="chart">
                                        <div id="chartdivisionyoy" style="height: 250px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt8">
                            <div class="box box-danger">
                                <div class="box-header font-24">User Performance Semester I</div>
                                <div class="box-body">
                                    <div class="chart">
                                        <div id="chartdist" style="height: 250px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-8 mt8">
                            <div class="box box-danger">
                                <div class="box-header font-24">Division Sales YoY Semester II</div>
                                <div class="box-body">
                                    <div class="chart">
                                        <div id="chartdivisionyoysm2" style="height: 250px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt8">
                            <div class="box box-danger">
                                <div class="box-header font-24">User Performance Semester II</div>
                                <div class="box-body">
                                    <div class="chart">
                                        <div id="chartdistsm2" style="height: 250px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- box prospect x inv -->
                    <div class="col-md-12 mt8">
                        <div class="box box-danger">
                            <div class="box-header font-24">Prospect x Invoice Monthly</div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartprospectorder" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- box prospect monthly -->
                    <div class="col-md-12 mt8">
                        <div class="col-md-8">
                            <div class="box box-danger no-boxshadow">
                                <div class="box-header">
                                    <span class="font-40">Prospect <?php echo date('F Y');?></span>
                                    <span class="font-40 pull-right">Realisasi</span>
                                </div>
                                <div class="box-body">
                                    <div class="nav-tabs-custom" style="cursor: move;">
                                        <!-- Tabs within a box -->
                                        <ul class="nav nav-tabs pull-right ui-sortable-handle">
                                            <li><a href="#revenue-chart" data-toggle="tab">Value</a></li>
                                            <li class="active"><a href="#sales-chart" data-toggle="tab">Volume</a></li>
                                            <li class="pull-left header"><i class="fa fa-inbox"></i> Invoice</li>
                                        </ul>
                                        <div class="tab-content no-padding">
                                            <!-- Morris chart - Sales -->
                                            <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                <div id="chartamval" style="height: 250px;"></div>
                                            </div>
                                            <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;">
                                                <div id="chartamvol" style="height: 250px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box box-danger no-boxshadow">
                                <div class="box-header">
                                    <div class="font-40 text-center"><?php echo sprintf("%0.1f", $prosentasereal);?>%</div>
                                </div>
                                <div class="box-body">
                                    <div style="padding: 0px 30px; margin: 0 auto;">
                                        <h2 class="text-center"><i class="fa fa-users"></i> AM ACHIEVMENT</h2>
                                        <?php foreach($amval as $key=>$row){?>
                                            <div class="col-md-12" style="font-size: 18px;">
                                                <?php echo ($key+1).'. '.$row['amkomet'];?>
                                                <span class="pull-right">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3)));?></span>
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
        </div>
    </section>

    <section class="invoice">
        <div class="row">
            <div class="box no-border no-boxshadow">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span class="font-40">DAILYREPORT COLLECTION</span>
                        <i><?php echo customDate(date('Y-m-d H:i:s'));?></i>
                    </h3>
                    <div class="box-tools">
                        <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet.png'; ?>" alt="Koperasi Metropolitan" width="95px"/>
                    </div>
                </div>

                <div class="box-body no-border">
                    <!-- box atas -->
                    <div class="col-md-12">
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
                                <div class="font-62 text-center"><?php echo sprintf("%0.1f", $prosentasecollq);?>%</div>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding">
                            <div class="margin-bottom-none no-border">
                                <div class="info-box-content margin-left-none">
                                    <span>COLLECTION CURRENT MONTH</span>
                                    <div class="col-md-12">
                                        <div class="col-md-6">VOL</div>
                                        <div class="col-md-6">VAL</div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6"><?php echo $collcm[0]['volcoll'];?></div>
                                        <div class="col-md-6">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($collcm[0]['valcoll'])),3)));;?></div>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="progress-description font-10 mt5">Target CM : <?php echo formatrev($targetcmcoll);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding">
                            <div class="col-md-12">
                                <div class="font-62 text-center"><?php echo sprintf("%0.1f", $prosentasecollcm);?>%</div>
                            </div>
                        </div>
                    </div>

                    <!-- box monthly coll yoy -->
                    <div class="col-md-12 mt8">
                        <div class="box box-danger">
                            <div class="box-header font-24">Monthly Collection YoY</div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartcollpaidmonthly" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<!-- box pencairan bulan ini -->
                    <div class="col-md-12 mt8">
                        <div class="box box-danger">
                            <div class="box-header font-24">Collection <?php echo date('F Y');?></div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartarday" style="height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<!-- box collection IBL -->
                    <div class="col-md-12 mt8">
                        <div class="box box-danger">
                            <div class="box-header font-24">1. Penyelesaian Invoice Nopes, PADI, IBL</div>
                            <div class="box-body">
                                <div class="chart">
                                    <div class="material-datatables table-responsive">
                                        <h3>DGS : NANZA & IMAN</h3>
                                        <table id="datatables1" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Kode</th>
                                                    <th>Unit, Divisi, Segment</th>
                                                    <th>Invoice Date</th>
                                                    <th>Nilai Dasar</th>
                                                    <th>Umur Piutang</th>
                                                    <th>Status</th>
													<th>Last Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                <?php foreach ( $collamdgsnanza as $row ) { ?>
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                                        <td>
                                                            <?php if($row['unit'] == 'MESRA'){ ?>
                                                                <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                    <strong><?php echo $row['code'];?></strong>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                    <strong><?php echo $row['code'];?></strong>
                                                                </a>
                                                            <?php } ?>
                                                            <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                                        </td>
                                                        <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                                        <td><?php echo $row['invdate'] ?></td>
                                                        <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                                        <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                                        <td>
                                                            <?php
                                                            switch ($row['status']) {
                                                                case '0':
                                                                    echo '<span class="label label-success">Accurate</span>';
                                                                    break;
                                                                case '2':
                                                                    echo '<span class="label label-info">Segmen</span>';
                                                                    break;
                                                                case '3':
                                                                    echo '<span class="label label-warning">Invidea</span>';
                                                                    break;
                                                                case '4':
                                                                    echo '<span class="label label-warning">Precise</span>';
                                                                    break;
                                                                case '16':
                                                                    echo '<span class="label label-primary">PPS</span>';
                                                                    break;
                                                                case '18' OR '6':
                                                                    echo '<span class="label bg-olive">Keuangan</span>';
                                                                    break;
                                                            default:
                                                                echo '<span class="label label-danger">Belum Cair</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td width="20%">
                                                            Penerima : <?php echo $row['recipient'];?>
                                                            <br>Catatan : <?php echo $row['tracknote'];?>
                                                            <br>Tanggal : <?php echo $row['trackdate'];?>
                                                        </td>
                                                    </tr>
                                                <?php }	?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="material-datatables table-responsive">
                                        <h3>DES : EVA & BUDI</h3>
                                        <table id="datatables2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Kode</th>
                                                    <th>Unit, Divisi, Segment</th>
                                                    <th>Invoice Date</th>
                                                    <th>Nilai Dasar</th>
                                                    <th>Umur Piutang</th>
                                                    <th>Status</th>
                                                    <th>Last Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                <?php foreach ( $collamdeseva as $row ) { ?>
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                                        <td>
                                                            <?php if($row['unit'] == 'MESRA'){ ?>
                                                                <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                    <strong><?php echo $row['code'];?></strong>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                    <strong><?php echo $row['code'];?></strong>
                                                                </a>
                                                            <?php } ?>
                                                            <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                                        </td>
                                                        <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                                        <td><?php echo $row['invdate'] ?></td>
                                                        <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                                        <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                                        <td>
                                                            <?php
                                                            switch ($row['status']) {
                                                                case '0':
                                                                    echo '<span class="label label-success">Accurate</span>';
                                                                    break;
                                                                case '2':
                                                                    echo '<span class="label label-info">Segmen</span>';
                                                                    break;
                                                                case '3':
                                                                    echo '<span class="label label-warning">Invidea</span>';
                                                                    break;
                                                                case '4':
                                                                    echo '<span class="label label-warning">Precise</span>';
                                                                    break;
                                                                case '16':
                                                                    echo '<span class="label label-primary">PPS</span>';
                                                                    break;
                                                                case '18' OR '6':
                                                                    echo '<span class="label bg-olive">Keuangan</span>';
                                                                    break;
                                                                default:
                                                                    echo '<span class="label label-danger">Belum Cair</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td width="20%">
                                                            Penerima : <?php echo $row['recipient'];?>
                                                            <br>Catatan : <?php echo $row['tracknote'];?>
                                                            <br>Tanggal : <?php echo $row['trackdate'];?>
                                                        </td>
                                                    </tr>
                                                <?php }	?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="material-datatables table-responsive">
                                        <h3>DES : VANIA & LUTHFI</h3>
                                        <table id="datatables3" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Kode</th>
                                                    <th>Unit, Divisi, Segment</th>
                                                    <th>Invoice Date</th>
                                                    <th>Nilai Dasar</th>
                                                    <th>Umur Piutang</th>
                                                    <th>Status</th>
                                                    <th>Last Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                <?php foreach ( $collamdesvania as $row ) { ?>
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                                        <td>
                                                            <?php if($row['unit'] == 'MESRA'){ ?>
                                                                <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                    <strong><?php echo $row['code'];?></strong>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                    <strong><?php echo $row['code'];?></strong>
                                                                </a>
                                                            <?php } ?>
                                                            <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                                        </td>
                                                        <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                                        <td><?php echo $row['invdate'] ?></td>
                                                        <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                                        <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                                        <td>
                                                            <?php
                                                            switch ($row['status']) {
                                                                case '0':
                                                                    echo '<span class="label label-success">Accurate</span>';
                                                                    break;
                                                                case '2':
                                                                    echo '<span class="label label-info">Segmen</span>';
                                                                    break;
                                                                case '3':
                                                                    echo '<span class="label label-warning">Invidea</span>';
                                                                    break;
                                                                case '4':
                                                                    echo '<span class="label label-warning">Precise</span>';
                                                                    break;
                                                                case '16':
                                                                    echo '<span class="label label-primary">PPS</span>';
                                                                    break;
                                                                case '18' OR '6':
                                                                    echo '<span class="label bg-olive">Keuangan</span>';
                                                                    break;
                                                                default:
                                                                    echo '<span class="label label-danger">Belum Cair</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td width="20%">
                                                            Penerima : <?php echo $row['recipient'];?>
                                                            <br>Catatan : <?php echo $row['tracknote'];?>
                                                            <br>Tanggal : <?php echo $row['trackdate'];?>
                                                        </td>
                                                    </tr>
                                                <?php }	?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="material-datatables table-responsive">
                                        <h3>SDA, EBIS & EKS : SIGIT & IMAN</h3>
                                        <table id="datatables4" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Kode</th>
                                                    <th>Unit, Divisi, Segment</th>
                                                    <th>Invoice Date</th>
                                                    <th>Nilai Dasar</th>
                                                    <th>Umur Piutang</th>
                                                    <th>Status</th>
                                                    <th>Last Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                <?php foreach ( $collamsdasigit as $row ) { ?>
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                                        <td>
                                                            <?php if($row['unit'] == 'MESRA'){ ?>
                                                                <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                    <strong><?php echo $row['code'];?></strong>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                    <strong><?php echo $row['code'];?></strong>
                                                                </a>
                                                            <?php } ?>
                                                            <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                                        </td>
                                                        <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                                        <td><?php echo $row['invdate'] ?></td>
                                                        <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                                        <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                                        <td>
                                                            <?php
                                                            switch ($row['status']) {
                                                                case '0':
                                                                    echo '<span class="label label-success">Accurate</span>';
                                                                    break;
                                                                case '2':
                                                                    echo '<span class="label label-info">Segmen</span>';
                                                                    break;
                                                                case '3':
                                                                    echo '<span class="label label-warning">Invidea</span>';
                                                                    break;
                                                                case '4':
                                                                    echo '<span class="label label-warning">Precise</span>';
                                                                    break;
                                                                case '16':
                                                                    echo '<span class="label label-primary">PPS</span>';
                                                                    break;
                                                                case '18' OR '6':
                                                                    echo '<span class="label bg-olive">Keuangan</span>';
                                                                    break;
                                                                default:
                                                                    echo '<span class="label label-danger">Belum Cair</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td width="20%">
                                                            Penerima : <?php echo $row['recipient'];?>
                                                            <br>Catatan : <?php echo $row['tracknote'];?>
                                                            <br>Tanggal : <?php echo $row['trackdate'];?>
                                                        </td>
                                                    </tr>
                                                <?php }	?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<!-- box collection OBL -->
                    <div class="col-md-12 mt8">
                        <div class="box box-danger">
                            <div class="box-header font-24">2. Penyelesaian Invoice OBL</div>
                            <div class="box-body">
                                <div class="chart">
                                    <div class="material-datatables table-responsive">
                                        <h3>DGS : NANZA & IMAN</h3>
                                        <table id="datatables5" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Kode</th>
                                                <th>Unit, Divisi, Segment</th>
                                                <th>Invoice Date</th>
                                                <th>Nilai Dasar</th>
                                                <th>Umur Piutang</th>
                                                <th>Status</th>
                                                <th>Last Update</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            <?php foreach ( $collamdgsnanzaobl as $row ) { ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                                    <td>
                                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                <strong><?php echo $row['code'];?></strong>
                                                            </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                <strong><?php echo $row['code'];?></strong>
                                                            </a>
                                                        <?php } ?>
                                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                                    </td>
                                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                                    <td><?php echo $row['invdate'] ?></td>
                                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                                    <td>
                                                        <?php
                                                        switch ($row['status']) {
                                                            case '0':
                                                                echo '<span class="label label-success">Accurate</span>';
                                                                break;
                                                            case '2':
                                                                echo '<span class="label label-info">Segmen</span>';
                                                                break;
                                                            case '3':
                                                                echo '<span class="label label-warning">Invidea</span>';
                                                                break;
                                                            case '4':
                                                                echo '<span class="label label-warning">Precise</span>';
                                                                break;
                                                            case '16':
                                                                echo '<span class="label label-primary">PPS</span>';
                                                                break;
                                                            case '18' OR '6':
                                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                                break;
                                                            default:
                                                                echo '<span class="label label-danger">Belum Cair</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td width="20%">
                                                        Penerima : <?php echo $row['recipient'];?>
                                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                                    </td>
                                                </tr>
                                            <?php }	?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="material-datatables table-responsive">
                                        <h3>DES : EVA & BUDI</h3>
                                        <table id="datatables6" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Kode</th>
                                                <th>Unit, Divisi, Segment</th>
                                                <th>Invoice Date</th>
                                                <th>Nilai Dasar</th>
                                                <th>Umur Piutang</th>
                                                <th>Status</th>
                                                <th>Last Update</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            <?php foreach ( $collamdesevaobl as $row ) { ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                                    <td>
                                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                <strong><?php echo $row['code'];?></strong>
                                                            </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                <strong><?php echo $row['code'];?></strong>
                                                            </a>
                                                        <?php } ?>
                                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                                    </td>
                                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                                    <td><?php echo $row['invdate'] ?></td>
                                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                                    <td>
                                                        <?php
                                                        switch ($row['status']) {
                                                            case '0':
                                                                echo '<span class="label label-success">Accurate</span>';
                                                                break;
                                                            case '2':
                                                                echo '<span class="label label-info">Segmen</span>';
                                                                break;
                                                            case '3':
                                                                echo '<span class="label label-warning">Invidea</span>';
                                                                break;
                                                            case '4':
                                                                echo '<span class="label label-warning">Precise</span>';
                                                                break;
                                                            case '16':
                                                                echo '<span class="label label-primary">PPS</span>';
                                                                break;
                                                            case '18' OR '6':
                                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                                break;
                                                            default:
                                                                echo '<span class="label label-danger">Belum Cair</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td width="20%">
                                                        Penerima : <?php echo $row['recipient'];?>
                                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                                    </td>
                                                </tr>
                                            <?php }	?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="material-datatables table-responsive">
                                        <h3>DES : VANIA & LUTHFI</h3>
                                        <table id="datatables7" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Kode</th>
                                                <th>Unit, Divisi, Segment</th>
                                                <th>Invoice Date</th>
                                                <th>Nilai Dasar</th>
                                                <th>Umur Piutang</th>
                                                <th>Status</th>
                                                <th>Last Update</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            <?php foreach ( $collamdesvaniaobl as $row ) { ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                                    <td>
                                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                <strong><?php echo $row['code'];?></strong>
                                                            </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                <strong><?php echo $row['code'];?></strong>
                                                            </a>
                                                        <?php } ?>
                                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                                    </td>
                                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                                    <td><?php echo $row['invdate'] ?></td>
                                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                                    <td>
                                                        <?php
                                                        switch ($row['status']) {
                                                            case '0':
                                                                echo '<span class="label label-success">Accurate</span>';
                                                                break;
                                                            case '2':
                                                                echo '<span class="label label-info">Segmen</span>';
                                                                break;
                                                            case '3':
                                                                echo '<span class="label label-warning">Invidea</span>';
                                                                break;
                                                            case '4':
                                                                echo '<span class="label label-warning">Precise</span>';
                                                                break;
                                                            case '16':
                                                                echo '<span class="label label-primary">PPS</span>';
                                                                break;
                                                            case '18' OR '6':
                                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                                break;
                                                            default:
                                                                echo '<span class="label label-danger">Belum Cair</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td width="20%">
                                                        Penerima : <?php echo $row['recipient'];?>
                                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                                    </td>
                                                </tr>
                                            <?php }	?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="material-datatables table-responsive">
                                        <h3>SDA, EBIS & EKS : SIGIT & IMAN</h3>
                                        <table id="datatables8" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Kode</th>
                                                <th>Unit, Divisi, Segment</th>
                                                <th>Invoice Date</th>
                                                <th>Nilai Dasar</th>
                                                <th>Umur Piutang</th>
                                                <th>Status</th>
                                                <th>Last Update</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            <?php foreach ( $collamsdasigitobl as $row ) { ?>
                                                <?php $i++; ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                                    <td>
                                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                <strong><?php echo $row['code'];?></strong>
                                                            </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                                <strong><?php echo $row['code'];?></strong>
                                                            </a>
                                                        <?php } ?>
                                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                                    </td>
                                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                                    <td><?php echo $row['invdate'] ?></td>
                                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                                    <td>
                                                        <?php
                                                        switch ($row['status']) {
                                                            case '0':
                                                                echo '<span class="label label-success">Accurate</span>';
                                                                break;
                                                            case '2':
                                                                echo '<span class="label label-info">Segmen</span>';
                                                                break;
                                                            case '3':
                                                                echo '<span class="label label-warning">Invidea</span>';
                                                                break;
                                                            case '4':
                                                                echo '<span class="label label-warning">Precise</span>';
                                                                break;
                                                            case '16':
                                                                echo '<span class="label label-primary">PPS</span>';
                                                                break;
                                                            case '18' OR '6':
                                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                                break;
                                                            default:
                                                                echo '<span class="label label-danger">Belum Cair</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td width="20%">
                                                        Penerima : <?php echo $row['recipient'];?>
                                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                                    </td>
                                                </tr>
                                            <?php }	?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="lockscreen-footer text-center">
        Copyright &copy; <?php echo date('Y')?>. All rights reserved
        <br><b>Crafted with <i class="fa fa-heart" style="color: #f06548 !important;"></i> by Koperasi Metropolitan</b>
        <br><p style="color: #8f9b9f;">rendering in {elapsed_time} seconds</p>
        <br>
    </div>
</div>

<?php $this->carabiner->display('js_content');?>
<script>
	$(function () {
		var table = $('#datatables1, #datatables2, #datatables3, #datatables4, #datatables5, #datatables6, #datatables7, #datatables8').DataTable({
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
		am4core.useTheme(am4themes_kelly);
		am4core.useTheme(am4themes_animated);
		// Themes end

		//------Start chart YoY VAL
		var chart = am4core.create("chartyoyval", am4charts.XYChart);

		chart.data = <?php echo $drdvalyoy ?>;

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
		series.tooltipText = "Total grow in {categoryX} (2022): [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2023): [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY VAL

		//------Start chart YoY Division
		var chart = am4core.create("chartdivisionyoy", am4charts.XYChart);

		chart.data = <?php echo $divisionyoy ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "division";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "division";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2022): [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "division";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2023): [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY Division

		//------Start chart YoY Division
		var chart = am4core.create("chartdivisionyoysm2", am4charts.XYChart);

		chart.data = <?php echo $divisionyoysm2 ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "division";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "division";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2022): [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "division";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2023): [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY Division

		//---------Start chart User Performance
		var chart = am4core.create("chartdist", am4charts.PieChart3D);
		chart.hiddenState.properties.opacity = 0;

		chart.legend = new am4charts.Legend();

		chart.data = <?php echo $invdist ?>;

		var series = chart.series.push(new am4charts.PieSeries3D());
		series.dataFields.value = "valinv";
		series.dataFields.category = "division";
		series.hiddenInLegend = true;
		//------End chart User Performance

        // ---------Start chart User Performance
		var chart = am4core.create("chartdistsm2", am4charts.PieChart3D);
		chart.hiddenState.properties.opacity = 0;

		chart.legend = new am4charts.Legend();

		chart.data = <?php echo $invdistsm2 ?>;

		var series = chart.series.push(new am4charts.PieSeries3D());
		series.dataFields.value = "valinv";
		series.dataFields.category = "division";
		series.hiddenInLegend = true;
		//------End chart User Performance

		//------Start chart PROSPECT VS ORDER
		var chart = am4core.create("chartprospectorder", am4charts.XYChart);

		chart.data = <?php echo $prospectorder ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Total Prospect : [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valorder";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total Order : [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart PROSPECT VS ORDER

		//------Start chart AM Volume
		var chart = am4core.create("chartamvol", am4charts.XYChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.paddingBottom = 30;

		chart.data = <?php echo $drdamvol ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "amkomet";
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
		series.dataFields.valueY = "orderid";
		series.dataFields.categoryX = "amkomet";
		series.tooltipText = "{valueY.value}";
		series.tooltip.pointerOrientation = "vertical";
		series.tooltip.dy = - 6;
		series.columnsContainer.zIndex = 100;

		var columnTemplate = series.columns.template;
		columnTemplate.width = am4core.percent(50);
		columnTemplate.maxWidth = 66;
		columnTemplate.column.cornerRadius(60, 60, 10, 10);
		columnTemplate.strokeOpacity = 0;

		series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });
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
		image.propertyFields.href = "amphoto";

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
		//------End chart AM Vol

		//------Start chart AM Value
		var chart = am4core.create("chartamval", am4charts.XYChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.paddingBottom = 30;

		chart.data = <?php echo $drdamval ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "amkomet";
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
		series.dataFields.valueY = "basevalue";
		series.dataFields.categoryX = "amkomet";
		series.tooltipText = "{valueY.value}";
		series.tooltip.pointerOrientation = "vertical";
		series.tooltip.dy = - 6;
		series.columnsContainer.zIndex = 100;

		var columnTemplate = series.columns.template;
		columnTemplate.width = am4core.percent(50);
		columnTemplate.maxWidth = 66;
		columnTemplate.column.cornerRadius(60, 60, 10, 10);
		columnTemplate.strokeOpacity = 0;

		series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });
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
		image.propertyFields.href = "amphoto";

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
		//------End chart AM Val

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
		series.tooltipText = "Total grow in {categoryX} (2022): [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2023): [bold]{valueY}[/]";

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
		series.fill = am4core.color("#44bd32");
		series.stroke = am4core.color("#44bd32");

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
	});
</script>
</body>
</html>