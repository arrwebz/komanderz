<div class="row mb-2">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100 bg-info-subtle overflow-hidden shadow-none">
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex align-items-center mb-7">
                            <?php if(isset($_GET['preview'])){ ?>
                                <?php
                                $prev = $_GET['preview'];
                                if($prev == 'iman'){
                                    $prevphoto = 'iman.jpg';
                                    $name = 'Iman Suryana';
                                }elseif($prev == 'indra'){
                                    $prevphoto = 'indra.jpg';
                                    $name = 'Indra Saputra Fardilla';
                                }elseif($prev == 'lutfi'){
                                    $prevphoto = 'lutfi.jpg';
                                    $name = 'Muhammad Luthfi';
                                }else{
                                    $prevphoto = $this->session->userdata("photo");;
                                    $name = $this->session->userdata("userfullname");;
                                }
                                ?>
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="<?php echo $this->config->item('uploads_uri').'user/ai/'. $prevphoto;?>" alt="" width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Dashboard <?php echo $name;?></h5>
                            <?php }else{?>
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="<?php echo $this->config->item('uploads_uri').'user/ai/indra.jpg';?>" alt="" width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Welcome back <?php echo $fullname;?>!</h5>
                            <?php } ?>
                            <br>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="fw-semibold mb-0 fs-3">Pencairan Bulan ini</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="border-end pe-4 border-muted border-opacity-10">
                                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center text-center"><?php echo $paidarmonthly[0]['volinv'];?></h3>
                                <p class="mb-0 text-dark">Total Invoice</p>
                            </div>
                            <div class="ps-4">
                                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><?php echo formatrev($paidarmonthly[0]['valinv']);?></h3>
                                <p class="mb-0 text-dark">Total Value</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="welcome-bg-img mb-n7 text-end">
                            <img src="<?php echo $this->config->item('skins_uri');?>images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body bg-info-subtle" style="padding: 25px 20px 20px 20px;">
                        <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Cash.png" alt="" class="img-fluid mb-n4" style="height: 80px; margin-bottom: 16px !important;">
                        <h4 class="mb-1 fw-semibold d-flex align-content-center"><?php echo formatrev($collcm[0]['valcoll']);?></h4>
                        <p class="mb-0">Collection Bulan Ini</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body bg-danger-subtle" style="padding: 25px 20px 20px 20px;">
                        <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/TargetDoc.png" alt="" class="img-fluid mb-n4" style="height: 80px; margin-bottom: 16px !important;">
                        <h4 class="mb-1 fw-semibold d-flex align-content-center"><?php echo sprintf("%0.1f", $prosentasecollcm);?>%</h4>
                        <p class="mb-0">Target : <?php echo formatrev($targetcmcoll);?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-lg-12">
        <h5 class="fw-semibold mb-0 fs-5 mb-3"><?php echo $totaltrackingar;?> Invoice  <?php echo str_replace("','",",",str_replace("'","",$trackingar['orderstatus']));?> Tidak Bergerak</h5>
        <div class="owl-carousel counter-carousel owl-theme">
            <?php if($trackingar['alarmaccurate'] != '0'){ ?>
            <div class="item">
                <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                            <p class="fw-semibold fs-3 text-primary mb-1">
                                Accurate
                            </p>
                            <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmaccurate'];?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if($trackingar['alarmpercepatan'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-secondary-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Percepatan
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmpercepatan'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmsegmen'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-success-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Segmen
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmsegmen'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmnpk'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    NPK
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmnpk'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmlegal'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Legal
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmlegal'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmrevisi'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Revisi
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmrevisi'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmdokhilang'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Dok Hilang
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmdokhilang'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarminvidea'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-dark-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Invidea
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarminvidea'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmprecise'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-secondary-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Precise
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmprecise'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmlogistik'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-secondary-subtle-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Logistik
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmlogistik'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmkeuangan'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Keuangan
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmkeuangan'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($trackingar['alarmforecasting'] != '0'){ ?>
                <div class="item">
                    <div class="card border-0 zoom-in bg-success-subtle shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $this->config->item('skins_uri'); ?>images/svgs/icon-database.svg" width="50" height="50" class="mb-3" alt="">
                                <p class="fw-semibold fs-3 text-primary mb-1">
                                    Forecasting
                                </p>
                                <h5 class="fw-semibold text-primary mb-0"><?php echo $trackingar['alarmforecasting'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-bg-primary">
                <h4 class="mb-0 text-white card-title">Data Invoice Tidak Bergerak</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive pb-9">
                    <table class="datatables table border table-striped table-bordered display text-nowrap">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Order Type</th>
                            <th>Invoice</th>
                            <th>Segmen</th>
                            <th>Nilai</th>
                            <th>Umur Piutang</th>
                            <th>Status</th>
                            <th>Last Update</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(count($listtrackalarmar) > 0){ ?>
                            <?php $i = 1; ?>
                            <?php foreach($listtrackalarmar as $row){?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $row['orderstatus'];?></td>
                                    <td><?php echo $row['code'];?></td>
                                    <td><?php echo $row['segment'];?></td>
                                    <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td>
                                    <td>
                                        <?php if($row['status'] != '1') {?>
                                            <?php echo $row['intervaldat']; ?> hari
                                        <?php } else { ?>
                                            -
                                        <?php } ?>
                                    </td>
                                    <td class="text-right">
                                        <?php if($row['status'] == '1') { ?>
                                            <span class="label label-success">Cair</span>
                                        <?php } elseif($row['status'] == '2' || $row['status'] == '13') { ?>
                                            <span class="label label-primary">Segmen</span>
                                        <?php } elseif($row['status'] == '3' || $row['status'] == '14') { ?>
                                            <span class="label label-warning">PJM</span>
                                        <?php } elseif($row['status'] == '4' || $row['status'] == '15') { ?>
                                            <span class="label label-warning">ASD</span>
                                        <?php } elseif($row['status'] == '5' || $row['status'] == '16') { ?>
                                            <span class="label label-success">Logistik</span>
                                        <?php } elseif($row['status'] == '6' || $row['status'] == '18') { ?>
                                            <span class="label label-success">Keuangan</span>
                                        <?php } elseif($row['status'] == '7' || $row['status'] == '17') { ?>
                                            <span class="label label-info">Legal</span>
                                        <?php } elseif($row['status'] == '8') { ?>
                                            <span class="label label-primary">Posting</span>
                                        <?php } elseif($row['status'] == '9') { ?>
                                            <span class="label label-danger">Batal</span>
                                        <?php } elseif($row['status'] == '10') { ?>
                                            <span class="label label-warning">Forecasting</span>
                                        <?php } elseif($row['status'] == '11') { ?>
                                            <span class="label label-info">Materai</span>
                                        <?php } elseif($row['status'] == '12') { ?>
                                            <span class="label label-info">Signed</span>
                                        <?php } elseif($row['status'] == '0') { ?>
                                            <span class="label label-default">Accurate</span>
                                        <?php } else { ?>
                                            <span class="label label-default">Printed</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
	    var table = $('.datatables').DataTable({
		    'responsive'  : true,
		    'paging'      : true,
		    'lengthChange': false,
		    'searching'   : true,
		    'ordering'    : true,
		    'info'        : true,
		    'autoWidth'   : true,
		    'scrollX': true,
	    });
	    $('.selectpicker').select2();

	    $(".counter-carousel").owlCarousel({
		    loop: true,
		    margin: 30,
		    mouseDrag: true,
		    autoplay: true,
		    autoplayTimeout: 4000,
		    autoplaySpeed: 2000,
		    nav: true,
		    dots: true,
		    rtl: true,
		    responsive: {
			    0: {
				    items: 2,
				    loop: true,
			    },
			    576: {
				    items: 2,
				    loop: true,
			    },
			    768: {
				    items: 3,
				    loop: true,
			    },
			    1200: {
				    items: 5,
				    loop: true,
			    },
			    1400: {
				    items: 6,
				    loop: true,
			    },
		    },
	    });
    });

	am4core.ready(function() {
		// Themes begin
		am4core.useTheme(am4themes_dark);
		am4core.useTheme(am4themes_frozen);
		am4core.useTheme(am4themes_animated);
		// Themes end

	});
</script>