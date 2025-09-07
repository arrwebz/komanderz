<div class="row mb-2">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100 bg-info-subtle overflow-hidden shadow-none">
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex align-items-center mb-7">
                            <?php if(isset($_GET['preview'])){ ?>
                                <div class="rounded-circle overflow-hidden me-6">
                                    <?php
                                    $prev = $_GET['preview'];
                                    if($prev == 'nanza'){
                                        $prevphoto = 'nanza.jpg';
                                        $name = 'Isnanza Zulkarnaini';
                                    }elseif($prev == 'vania'){
                                        $prevphoto = 'vania.jpg';
                                        $name = 'Vania Miranda Putri';
                                    }elseif($prev == 'eva'){
                                        $prevphoto = 'eva.jpg';
                                        $name = 'Eva Ayu Komala';
                                    }elseif($prev == 'sigit'){
                                        $prevphoto = 'sigit.jpg';
                                        $name = 'Sigit Hidayatullah';
                                    }else{
                                        $prevphoto = $this->session->userdata("photo");;
                                        $name = $this->session->userdata("userfullname");;
                                    }
                                    ?>
                                    <img src="<?php echo $this->config->item('uploads_uri').'user/ai/'. $prevphoto;?>" alt="" width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Dashboard <?php echo $name;?></h5>
                            <?php }else{?>
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="<?php echo $this->config->item('uploads_uri').'user/ai/'. $photo;?>" alt="" width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Welcome back <?php echo $fullname;?>!</h5>
                            <?php } ?>
                            <br>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="fw-semibold mb-0 fs-3">Order Current Month</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="border-end pe-4 border-muted border-opacity-10">
                                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center text-center"><?php echo $myordercmvolval[0]['volinv'];?></h3>
                                <p class="mb-0 text-dark">Total Invoice</p>
                            </div>
                            <div class="ps-4">
                                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><?php echo formatrev($myordercmvolval[0]['valinv']);?></h3>
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
                        <h4 class="mb-1 fw-semibold d-flex align-content-center"><?php echo formatrev($volvalnopesmonthly[0]['valinv']);?></h4>
                        <p class="mb-0">All AM Realisasi<br>Current Month</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body bg-danger-subtle" style="padding: 25px 20px 20px 20px;">
                        <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/TargetDoc.png" alt="" class="img-fluid mb-n4" style="height: 80px; margin-bottom: 16px !important;">
                        <h4 class="mb-1 fw-semibold d-flex align-content-center"><?php echo sprintf("%0.1f", $prosentasenopespros);?>%</h4>
                        <p class="mb-0">All AM Target : <?php echo formatrev($targetcmsales);?><br>Current Month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-bg-primary">
                <h4 class="mb-0 text-white card-title">My Order</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive pb-9">
                    <table class="datatables table table-bordered table-striped nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="5%">Division</th>
                            <th>Segmen</th>
                            <th class="text-center">Order Type</th>
                            <th class="text-center">Vol</th>
                            <th class="text-right">Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($myorder) > 0){ ?>
                            <?php $i = 1; ?>
                            <?php foreach($myorder as $row){?>
                                <tr>
                                    <td class="text-center"><?php echo $i++;?></td>
                                    <td><?php echo $row['divisioncode'];?></td>
                                    <td><?php echo $row['segmentcode'];?></td>
                                    <td class="text-center"><?php echo $row['orderstatus'];?></td>
                                    <td class="text-center"><?php echo $row['vol'] ?></td>
                                    <td class="text-right" style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['val'])),3))); ?></strong></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-md-12">
        <div class="card">
            <div class="card-header text-bg-primary">
                <h4 class="mb-0 text-white card-title">My Panjar</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive pb-9">
                    <table class="datatables table table-bordered table-striped nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Division <br>Segmen</th>
                            <th>Vol</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*if(count($mypros) > 0){ */?>
                            <?php /*$i = 1; */?>
                            <?php /*foreach($mypros as $row){*/?>
                                <tr>
                                    <td class="text-center"><?php /*echo $i++;*/?></td>
                                    <td>
                                        <?php /*echo $row['divisionname'];*/?>
                                        <br><?php /*echo $row['segmentname'];*/?>
                                    </td>
                                    <td class="text-center"><?php /*echo $row['volpros'] */?></td>
                                    <td class="text-right" style="color: #fa591d;"><strong><?php /*echo strrev(implode('.',str_split(strrev(strval($row['valpros'])),3))); */?></strong></td>
                                </tr>
                            <?php /*} */?>
                        <?php /*} */?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>-->
    <!--<div class="col-md-12">
        <div class="card">
            <div class="card-header text-bg-primary">
                <h4 class="mb-0 text-white card-title">My Prospect  (<?php /*echo date('Y');*/?>)</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive pb-9">
                    <table class="datatables table table-bordered table-striped nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Division <br>Segmen</th>
                            <th>Vol</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*if(count($mypros) > 0){ */?>
                            <?php /*$i = 1; */?>
                            <?php /*foreach($mypros as $row){*/?>
                                <tr>
                                    <td class="text-center"><?php /*echo $i++;*/?></td>
                                    <td>
                                        <?php /*echo $row['divisionname'];*/?>
                                        <br><?php /*echo $row['segmentname'];*/?>
                                    </td>
                                    <td class="text-center"><?php /*echo $row['volpros'] */?></td>
                                    <td class="text-right" style="color: #fa591d;"><strong><?php /*echo strrev(implode('.',str_split(strrev(strval($row['valpros'])),3))); */?></strong></td>
                                </tr>
                            <?php /*} */?>
                        <?php /*} */?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>-->
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
		});
	});
</script>