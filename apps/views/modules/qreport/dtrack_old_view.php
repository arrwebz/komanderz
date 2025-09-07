<!DOCTYPE html>
<html style="color-scheme:dark;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

    <title><?php echo $title;?></title>
    <meta name="description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">

    <meta property="og:title" content="Daily Report <?php echo date('d-m-Y');?>">
    <meta property="og:description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo site_url('quickreport/daily');?>">
    <meta property="og:image" content="<?php echo $this->config->item('skins_uri');?>images/backgrounds/logo-komet.png">
    <meta property="og:site_name" content="Komanders">

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
                        <span class="font-40">DAILYREPORT TRACKING</span>
                        <i><?php echo customDate(date('Y-m-d H:i:s'));?></i>
                    </div>
                    <div class="box-tools col-lg-6 text-right">
                        <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet-white.png'; ?>" alt="Koperasi Metropolitan" width="95px"/>
                    </div>
                </div>
            </div>
            <div class="box p-10 box-dark" style="margin:0 20px;">
                <div class="row col-md-12">
                    <div class="box-header d-flex align-items-center">
                        <h4 class="card-title text-white mb-0 p-3">Invoice Position</h4>
                    </div>
                    <div class="box-body p-0">
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered text-nowrap customize-table mb-0 align-middle">
                                <tbody>
                                <tr>
                                    <td class="text-center" rowspan="2" width="20%" style="vertical-align: middle;"><strong>Order Type</strong></td>
                                    <td class="text-center p-2" colspan="12"><strong>Unpaid Position</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-right" width="8%"><strong><small>Accurate</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Percepatan</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Segmen</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>NPK</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Legal</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Revisi</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Doc Hilang</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Invidea</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Precise</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Logistik</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Keuangan</small></strong></td>
                                    <td class="text-right" width="8%"><strong><small>Forecasting</small></strong></td>
                                </tr>
                                <?php
                                $sumtarget = 0;
                                $sumpaid = 0;
                                $sumunpaid = 0;
                                $sumunpaidaccurate = 0;
                                $sumunpaidpercepatan = 0;
                                $sumunpaidsegmen = 0;
                                $sumunpaidnpk = 0;
                                $sumunpaidlegal = 0;
                                $sumunpaidrevisi = 0;
                                $sumunpaiddokhilang = 0;
                                $sumunpaidinvidea = 0;
                                $sumunpaidprecise = 0;
                                $sumunpaidlogistik = 0;
                                $sumunpaidkeuangan = 0;
                                $sumunpaidforecasting = 0;
                                ?>
                                <?php for($i=0; $i<count($collmonthly); $i++): ?>
                                    <?php
                                    if(!empty($collmonthly[$i]['unpaidaccurate'])){ $sumunpaidaccurate += $collmonthly[$i]['unpaidaccurate']; }
                                    if(!empty($collmonthly[$i]['unpaidpercepatan'])){ $sumunpaidpercepatan += $collmonthly[$i]['unpaidpercepatan']; }
                                    if(!empty($collmonthly[$i]['unpaidsegmen'])){ $sumunpaidsegmen += $collmonthly[$i]['unpaidsegmen']; }
                                    if(!empty($collmonthly[$i]['unpaidnpk'])){ $sumunpaidnpk += $collmonthly[$i]['unpaidnpk']; }
                                    if(!empty($collmonthly[$i]['unpaidlegal'])){ $sumunpaidlegal += $collmonthly[$i]['unpaidlegal']; }
                                    if(!empty($collmonthly[$i]['unpaidrevisi'])){ $sumunpaidrevisi += $collmonthly[$i]['unpaidrevisi']; }
                                    if(!empty($collmonthly[$i]['unpaiddokhilang'])){ $sumunpaiddokhilang += $collmonthly[$i]['unpaiddokhilang']; }
                                    if(!empty($collmonthly[$i]['unpaidinvidea'])){ $sumunpaidinvidea += $collmonthly[$i]['unpaidinvidea']; }
                                    if(!empty($collmonthly[$i]['unpaidprecise'])){ $sumunpaidprecise += $collmonthly[$i]['unpaidprecise']; }
                                    if(!empty($collmonthly[$i]['unpaidlogistik'])){ $sumunpaidlogistik += $collmonthly[$i]['unpaidlogistik']; }
                                    if(!empty($collmonthly[$i]['unpaidkeuangan'])){ $sumunpaidkeuangan += $collmonthly[$i]['unpaidkeuangan']; }
                                    if(!empty($collmonthly[$i]['unpaidforecasting'])){ $sumunpaidforecasting += $collmonthly[$i]['unpaidforecasting']; }
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $collmonthly[$i]['orderstatus'];?></td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-0" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Accurate">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidaccurate'])){ echo formatrev($collmonthly[$i]['unpaidaccurate']); }else{ echo $collmonthly[$i]['unpaidaccurate']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmaccurate'] != 0){ ?>
                                            <br>
                                            <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmaccurate']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-6" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Percepatan">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidpercepatan'])){ echo formatrev($collmonthly[$i]['unpaidpercepatan']); }else{ echo $collmonthly[$i]['unpaidpercepatan']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmpercepatan'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmpercepatan']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-2" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Segmen">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidsegmen'])){ echo formatrev($collmonthly[$i]['unpaidsegmen']); }else{ echo $collmonthly[$i]['unpaidsegmen']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmsegmen'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmsegmen']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-11" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Npk">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidnpk'])){ echo formatrev($collmonthly[$i]['unpaidnpk']); }else{ echo $collmonthly[$i]['unpaidnpk']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmnpk'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmnpk']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-7" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Legal">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidlegal'])){ echo formatrev($collmonthly[$i]['unpaidlegal']); }else{ echo $collmonthly[$i]['unpaidlegal']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmlegal'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmlegal']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-5" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Revisi">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidrevisi'])){ echo formatrev($collmonthly[$i]['unpaidrevisi']); }else{ echo $collmonthly[$i]['unpaidrevisi']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmrevisi'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmrevisi']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-8" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Dokhilang">
                                                <?php if(is_numeric($collmonthly[$i]['unpaiddokhilang'])){ echo formatrev($collmonthly[$i]['unpaiddokhilang']); }else{ echo $collmonthly[$i]['unpaiddokhilang']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmdokhilang'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmdokhilang']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-3" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Invidea">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidinvidea'])){ echo formatrev($collmonthly[$i]['unpaidinvidea']); }else{ echo $collmonthly[$i]['unpaidinvidea']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarminvidea'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarminvidea']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-4" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Precise">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidprecise'])){ echo formatrev($collmonthly[$i]['unpaidprecise']); }else{ echo $collmonthly[$i]['unpaidprecise']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmprecise'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmprecise']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-16" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Logistik">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidlogistik'])){ echo formatrev($collmonthly[$i]['unpaidlogistik']); }else{ echo $collmonthly[$i]['unpaidlogistik']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmlogistik'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmlogistik']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-18" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Keuangan">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidkeuangan'])){ echo formatrev($collmonthly[$i]['unpaidkeuangan']); }else{ echo $collmonthly[$i]['unpaidkeuangan']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmkeuangan'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmkeuangan']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-10" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Forecasting">
                                                <?php if(is_numeric($collmonthly[$i]['unpaidforecasting'])){ echo formatrev($collmonthly[$i]['unpaidforecasting']); }else{ echo $collmonthly[$i]['unpaidforecasting']; };?>
                                            </a>
                                            <?php if($tracking[$i]['alarmforecasting'] != 0){ ?>
                                                <br>
                                                <span style="font-size: 10px;"><?php echo $tracking[$i]['alarmforecasting']?> inv <br>tidak bergerak</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                                <tr>
                                    <td class="text-center"><strong>Total</strong></td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidaccurate)){ echo formatrev($sumunpaidaccurate); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidpercepatan)){ echo formatrev($sumunpaidpercepatan); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidsegmen)){ echo formatrev($sumunpaidsegmen); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidnpk)){ echo formatrev($sumunpaidnpk); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidlegal)){ echo formatrev($sumunpaidlegal);}?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidrevisi)){ echo formatrev($sumunpaidrevisi); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaiddokhilang)){ echo formatrev($sumunpaiddokhilang); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidinvidea)){ echo formatrev($sumunpaidinvidea); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidprecise)){ echo formatrev($sumunpaidprecise); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidlogistik)){ echo formatrev($sumunpaidlogistik); } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidkeuangan)){ echo formatrev($sumunpaidkeuangan);}?>
                                    </td>
                                    <td class="text-right">
                                        <?php if(!empty($sumunpaidforecasting)){ echo formatrev($sumunpaidforecasting);}?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			<div class="box p-10 box-dark" style="margin:0 20px;">
                <div class="box-body p-0">
				<!-- box prospect x inv -->
					<div class="row col-md-12 p-0">
						<div class="col-md-6 mt8 mb8">
							<div class="info-box-content margin-left-none col-white">
								<span class="font-24">Total Panjar PRPO non Invoice 2021 - <?php echo date('Y');?></span>
								<span class="info-box-number col-money font-24">Rp <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjar[0]['val'])),3)));?></span>
								<small>*Berdasarkan Nilai Justifikasi</small>
							</div>
						</div>
						<div class="col-md-6 mt8 mb8">
							<div class="info-box-content margin-left-none col-white">
								<span class="font-24">Total Panjar SPB PRPO non Invoice 2021 - <?php echo date('Y');?></span>
								<span class="info-box-number col-money font-24">Rp <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspb[0]['val'])),3)));?></span>
								<small>*Berdasarkan Nilai SPB Status PRPO</small>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class="box p-10 box-dark" style="margin:0 20px;">
                <div class="box-body p-0">
                    <div class="row col-md-12 p-0">
                        <div class="box-header d-flex align-items-center">
                            <h4 class="card-title text-white mb-0">Track Panjar</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title text-white mb-0 p-3 text-center">ORDER</h4>
                            <div class="table-responsive mb-4">
                                <table class="table table-sm table-bordered text-nowrap customize-table mb-0 align-middle">
                                    <thead>
                                        <tr>
                                            <td>Customer</td>
                                            <td class="text-right">Nilai Justifikasi</td>
                                            <td class="text-right">Nilai SPB</td> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($trackpanjarbysegmennontk as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['jstval'])),3)));?></td>
                                            <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['spbval'])),3)));?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title text-white mb-0 p-3 text-center">TKBW</h4>
                            <div class="table-responsive mb-4">
                                <table class="table table-sm table-bordered text-nowrap customize-table mb-0 align-middle">
                                    <thead>
                                        <tr>
                                            <td>Cust</td>
                                            <td class="text-right">Nilai Justifikasi</td>
                                            <td class="text-right">Nilai SPB</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($trackpanjarbysegmentk as $row){ ?>
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['jstval'])),3)));?></td>
                                            <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['spbval'])),3)));?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
			window.location.href = '<?php echo site_url('quickreport/dtrack')?>';
		}
		setInterval(reloadletter , 120000); /* setiap 1 menit */

		var table = $('#datatables1, #datatables2, #datatables3, #datatables4, #datatables5, #datatables6, #datatables7, #datatables8').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmaccurate'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmaccurate'].' invois '.$tracking[$i]['orderstatus']?> di akuret tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmpercepatan'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmpercepatan'].' invois '.$tracking[$i]['orderstatus']?> di percepatan tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmsegmen'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmsegmen'].' invois '.$tracking[$i]['orderstatus']?> di segmen tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmnpk'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmnpk'].' invois '.$tracking[$i]['orderstatus']?> di enpeka tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmlegal'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmlegal'].' invois '.$tracking[$i]['orderstatus']?> di legal tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmrevisi'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmrevisi'].' invois '.$tracking[$i]['orderstatus']?> di revisi tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmdokhilang'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmdokhilang'].' invois '.$tracking[$i]['orderstatus']?> di dokumen hilang tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarminvidea'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarminvidea'].' invois '.$tracking[$i]['orderstatus']?> di invidea tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmprecise'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmprecise'].' invois '.$tracking[$i]['orderstatus']?> di pricese tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmlogistik'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmlogistik'].' invois '.$tracking[$i]['orderstatus']?> di logistik tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmkeuangan'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmkeuangan'].' invois '.$tracking[$i]['orderstatus']?> di keuangan tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmforecasting'] > 0){?>
        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();
        msg.voice = voices[0];
        msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmforecasting'].' invois '.$tracking[$i]['orderstatus']?> di forekasting tidak bergerak";
        speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Terima kasih, Salam Corsec";
		speechSynthesis.speak(msg);
	});
	speechSynthesis.getVoices().forEach(function(voice) {
		console.log(voice.name, voice.default ? voice.default :'');
	});
</script>
</body>
</html>