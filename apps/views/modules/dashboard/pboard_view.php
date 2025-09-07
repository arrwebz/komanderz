<style>
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
        border: 1px solid #747272;
        font-size:16px;
    }
    .link-unpaid{
        color: #333333;
    }
    .link-unpaid:hover{
        color: #000;
        cursor:pointer;
    }
	
	td.text-right{padding: 10px 8px;}
	td.text-center.bg-light-subtle{padding: 10px 8px;}
</style>
<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Dashboard</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('letter');?>">Overview</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3"> 
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Target.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div> 
</div>
<section class="content"> 
    <div class="card card-hover">
		<div class="card-header text-bg-danger d-flex align-items-center">
		  <h4 class="mb-0 text-white fs-5 mb-0">SALES</h4> 
		</div>
        <div class="card-body">  
			<h2><strong>Target <?php echo date('Y');?></strong></h2>
            <div class="row">
                <div class="col-lg-12">
						<div class="table-responsive mb-4">
							<table class="table border text-nowrap customize-table mb-0 align-middle">
							<tbody>
							<tr style="background: #2c2c54; color: white">
								<td class="text-center bg-light-subtle" width="20%"><strong>Quarterly</strong></td>
								<td class="text-right bg-light-subtle"><strong>Target</strong></td>
								<td class="text-right bg-light-subtle"><strong>Realization</strong></td>
								<td class="text-right bg-danger-subtle text-danger"><strong>Remaining Target</strong></td>
								<td class="text-center bg-light-subtle"><strong>Percentage</strong></td>
							</tr>
							<?php
							$sisatargetq1 = $targetq[0]['nilai']-$realisasiq[0]['value'];
							if($sisatargetq1 > 0){
								$sisatargetq1 = $sisatargetq1;
							}else{
								$sisatargetq1 = 0;
							}

							$sisatargetq2 = $targetq[1]['nilai']-$realisasiq[1]['value'];
							if($sisatargetq2 > 0){
								$sisatargetq2 = $sisatargetq2;
							}else{
								$sisatargetq2 = 0;
							}

							$sisatargetq3 = $targetq[2]['nilai']-$realisasiq[2]['value'];
							if($sisatargetq3 > 0){
								$sisatargetq3 = $sisatargetq3;
							}else{
								$sisatargetq3 = 0;
							}

							$sisatargetq4 = $targetq[3]['nilai']-$realisasiq[3]['value'];
							if($sisatargetq4 > 0){
								$sisatargetq4 = $sisatargetq4;
							}else{
								$sisatargetq4 = 0;
							}
							?>
							<tr>
								<td class="text-center"><strong>Q1</strong></td>
								<td class="text-right"><?php echo formatrev($targetq[0]['nilai']);?></td>
								<?php /*if(date('m') > 3){*/?>
								<td class="text-right <?php if($realisasiq[0]['value'] < $targetq[0]['nilai']){  }?>">
									<?php echo formatrev($realisasiq[0]['value']);?>
								</td>
								<td class="text-right bg-danger-subtle text-danger">
									<?php echo formatrev($sisatargetq1); ?>
								</td>
								<td class="text-center <?php if($realisasiq[0]['value'] < $targetq[0]['nilai']){  }?>">
									<?php echo sprintf("%0.1f", $realisasiq[0]['value']/$targetq[0]['nilai']*100);?>%
									<div class="progress bg-light-subtle mt-2 mb-2" style="height: 15px"> 
									  <div class="progress-bar progress-bar-striped text-bg-danger progress-bar-animated" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" 
									  style="width: <?php echo sprintf("%0.1f", $realisasiq[0]['value']/$targetq[0]['nilai']*100);?>%"></div>
									</div>
								</td>
								<?php /*}else{ */?><!--
										<td class="text-right">-</td>
										<td class="text-right">-</td>
										<td class="text-center">-</td>
									--><?php /*} */?>
							</tr>
							<tr>
								<td class="text-center"><strong>Q2</strong></td>
								<td class="text-right"><?php echo formatrev($targetq[1]['nilai']);?></td>
								<?php /*if(date('m') >= 6 && date('m') <= 9){*/?>
								<td class="text-right <?php if($realisasiq[1]['value'] < $targetq[1]['nilai']){  }?>">
									<?php echo formatrev($realisasiq[1]['value']);?>
								</td>
								<td class="text-right bg-danger-subtle text-danger">
									<?php echo formatrev($sisatargetq2); ?>
								</td>
								<td class="text-center <?php if($realisasiq[1]['value'] < $targetq[1]['nilai']){  }?>">
									<?php echo sprintf("%0.1f", $realisasiq[1]['value']/$targetq[1]['nilai']*100);?>%
									<div class="progress bg-light-subtle mt-2 mb-2" style="height: 15px"> 
									  <div class="progress-bar progress-bar-striped text-bg-danger progress-bar-animated" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" 
									  style="width: <?php echo sprintf("%0.1f", $realisasiq[1]['value']/$targetq[1]['nilai']*100);?>%"></div>
									</div>
								</td>
								<?php /*}else{ */?><!--
										<td class="text-right">-</td>
										<td class="text-right">-</td>
										<td class="text-center">-</td>
									--><?php /*} */?>
							</tr>
							<tr>
								<td class="text-center"><strong>Q3</strong></td>
								<td class="text-right"><?php echo formatrev($targetq[2]['nilai']);?></td>
								<?php /*if(date('m') >= 9 && date('m') <= 12){*/?>
								<td class="text-right <?php if($realisasiq[2]['value'] < $targetq[2]['nilai']){  }?>">
									<?php echo formatrev($realisasiq[2]['value']);?>
								</td>
								<td class="text-right bg-danger-subtle text-danger">
									<?php echo formatrev($sisatargetq3); ?></td>
								<td class="text-center <?php if($realisasiq[2]['value'] < $targetq[2]['nilai']){  }?>">
									<?php echo sprintf("%0.1f", $realisasiq[2]['value']/$targetq[2]['nilai']*100);?>%
									<div class="progress bg-light-subtle mt-2 mb-2" style="height: 15px"> 
									  <div class="progress-bar progress-bar-striped text-bg-danger progress-bar-animated" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" 
									  style="width: <?php echo sprintf("%0.1f", $realisasiq[2]['value']/$targetq[2]['nilai']*100);?>%"></div>
									</div>
								</td>
								<?php /*}else{ */?><!--
										<td class="text-right">-</td>
										<td class="text-right">-</td>
										<td class="text-center">-</td>
									--><?php /*} */?>
							</tr>
							<tr>
								<td class="text-center"><strong>Q4</strong></td>
								<td class="text-right"><?php echo formatrev($targetq[3]['nilai']);?></td>
								<?php /*if(date('m') == 12 && date('d') >= 20){*/?>
								<td class="text-right <?php if($realisasiq[3]['value'] < $targetq[3]['nilai']){  }?>">
									<?php echo formatrev($realisasiq[3]['value']);?>
								</td>
								<td class="text-right bg-danger-subtle text-danger">
									<?php echo formatrev($sisatargetq4); ?>
								</td>
								<td class="text-center <?php if($realisasiq[3]['value'] < $targetq[3]['nilai']){  }?>">
									<?php echo sprintf("%0.1f", $realisasiq[3]['value']/$targetq[3]['nilai']*100);?>%
									<div class="progress bg-light-subtle mt-2 mb-2" style="height: 15px"> 
									  <div class="progress-bar progress-bar-striped text-bg-danger progress-bar-animated" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" 
									  style="width: <?php echo sprintf("%0.1f", $realisasiq[3]['value']/$targetq[3]['nilai']*100);?>%"></div>
									</div>
								</td>
								<?php /*}else{ */?><!--
										<td class="text-right">-</td>
										<td class="text-right">-</td>
										<td class="text-center">-</td>
									--><?php /*} */?>
							</tr>
							</tbody>
							<tfoot>
							<?php
							$sumrealq1 = 0;
							if (date('m') > 3){
								$sumrealq1 = $realisasiq[0]['value'];
							}

							$sumrealq2 = 0;
							if (date('m') >= 6){
								$sumrealq2 = $realisasiq[1]['value'];
							}

							$sumrealq3 = 0;
							if (date('m') > 9){
								$sumrealq3 = $realisasiq[2]['value'];
							}

							$sumrealq4 = 0;
							if (date('m') > 12 && date('d') >= 20){
								$sumrealq4 = $realisasiq[3]['value'];
							}

							$sumtargetyear = $targetq[0]['nilai']+$targetq[1]['nilai']+$targetq[2]['nilai']+$targetq[3]['nilai'];
							$sumrealyear = $sumrealq1+$sumrealq2+$sumrealq3+$sumrealq4;
							$sumpresentase = sprintf("%0.1f", $sumrealyear/$sumtargetyear*100).'%';
							$sumsisatarget = formatrev($sumtargetyear-$sumrealyear);
							?>
							<tr style="background: #2c2c54; color: white">
								<td class="text-center bg-light-subtle"><strong>Total</strong></td>
								<td class="text-right bg-light-subtle">
									<strong><?php echo formatrev($sumtargetyear);?></strong>
								</td>
								<td class="text-right bg-light-subtle">
									<strong><?php echo formatrev($sumrealyear);?></strong>
								</td>
								<td class="text-right bg-danger-subtle text-danger fw-semibold">
									<strong><?php echo $sumsisatarget;?></strong>
								</td>
								<td class="text-center bg-light-subtle">
									<strong><?php echo $sumpresentase;?></strong>
								</td>
							</tr>
							</tfoot>
						</table>
					</div>	
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header text-bg-danger d-flex align-items-center">
                    <h4 class="card-title text-white mb-0"><?php echo 'Quarter '.$curquartersales;?></h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive mb-4">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
							<tbody>
							<tr>
								<td class="text-center bg-light-subtle" width="20%"><strong>Month</strong></td>
								<td class="text-right bg-light-subtle"><strong>Target</strong></td>
								<td class="text-right bg-light-subtle"><strong>Realization</strong></td>
								<td class="text-center bg-light-subtle"><strong>Percentage</strong></td>
							</tr>
							<?php
							$sumtargetmonthly = 0;
							$sumrealmonthly = 0;
							?>
							<?php for($i=0; $i<count($quartermonthsales); $i++): ?>
								<?php
								$sumtargetmonthly += $quartermonthsales[$i]['targetsales'];
								$sumrealmonthly += $quartermonthsales[$i]['valinv'];
								$sumpresentasemonthly = sprintf("%0.1f", $sumrealmonthly/$sumtargetmonthly*100).'%';
								?>
								<tr>
									<td class="text-center"><strong><?php echo $quartermonthsales[$i]['monthname'];?></strong></td>
									<td class="text-right"><?php echo formatrev($quartermonthsales[$i]['targetsales']);?></td>
									<td class="text-right <?php if($quartermonthsales[$i]['valinv'] < $quartermonthsales[$i]['targetsales']){  }?>">
										<?php echo formatrev($quartermonthsales[$i]['valinv']);?>
									</td>
									<td class="text-center <?php if($quartermonthsales[$i]['valinv'] < $quartermonthsales[$i]['targetsales']){  }?>">
										<?php echo sprintf("%0.1f", $quartermonthsales[$i]['valinv']/$quartermonthsales[$i]['targetsales']*100);?>%
									</td>
								</tr>
							<?php endfor; ?>
							</tbody>
							<tfoot>
							<tr style="background: #2c2c54; color: white">
								<td class="text-center bg-light-subtle"><strong>Total</strong></td>
								<td class="text-right bg-light-subtle">
									<strong><?php echo formatrev($sumtargetmonthly);?></strong>
								</td>
								<td class="text-right bg-light-subtle">
									<strong><?php echo formatrev($sumrealmonthly);?></strong>
								</td>
								<td class="text-center bg-light-subtle">
									<strong><?php echo $sumpresentasemonthly;?></strong>
								</td>
							</tr>
							</tfoot>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header text-bg-danger d-flex align-items-center">
                    <h4 class="card-title text-white mb-0">Current Month</h4>
                </div>
                <div class="card-body collapse show">
					<h2><strong><?php echo $ismonthly;?></strong></h2>
                    <div class="table-responsive mb-4">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
							<tbody>
							<tr>
								<td class="text-center bg-light-subtle" width="20%"><strong>Order Type</strong></td>
								<td class="text-right bg-light-subtle"><strong>Target</strong></td>
								<td class="text-right bg-light-subtle"><strong>Realization</strong></td>
								<td class="text-center bg-light-subtle"><strong>Percentage</strong></td>
							</tr>
							<tr>
								<td class="text-center"><strong>NOPES</strong></td>
								<td class="text-right"><?php echo formatrev($tsmonthlynopes[0]['nilai']);?></td>
								<td class="text-right <?php if($valmonthlynopes[0]['valinv'] < $tsmonthlynopes[0]['nilai']){  }?>">
									<?php echo formatrev($valmonthlynopes[0]['valinv']);?>
								</td>
								<td class="text-center <?php if($valmonthlynopes[0]['valinv'] < $tsmonthlynopes[0]['nilai']){  }?>">
									<?php echo sprintf("%0.1f", $valmonthlynopes[0]['valinv']/$tsmonthlynopes[0]['nilai']*100);?>%
								</td>
							</tr>
							<tr>
								<td class="text-center"><strong>PADI</strong></td>
								<td class="text-right"><?php echo formatrev($tsmonthlypadi[0]['nilai']);?></td>
								<td class="text-right <?php if($valmonthlypadi[0]['valinv'] < $tsmonthlypadi[0]['nilai']){  }?>">
									<?php echo formatrev($valmonthlypadi[0]['valinv']);?>
								</td>
								<td class="text-center <?php if($valmonthlypadi[0]['valinv'] < $tsmonthlypadi[0]['nilai']){  }?>">
									<?php echo sprintf("%0.1f", $valmonthlypadi[0]['valinv']/$tsmonthlypadi[0]['nilai']*100);?>%
								</td>
							</tr>
							<tr>
								<td class="text-center"><strong>IBL</strong></td>
								<td class="text-right"><?php echo formatrev($tsmonthlyibl[0]['nilai']);?></td>
								<td class="text-right <?php if($valmonthlyibl[0]['valinv'] < $tsmonthlyibl[0]['nilai']){  }?>">
									<?php echo formatrev($valmonthlyibl[0]['valinv']);?>
								</td>
								<td class="text-center <?php if($valmonthlyibl[0]['valinv'] < $tsmonthlyibl[0]['nilai']){  }?>">
									<?php echo sprintf("%0.1f", $valmonthlyibl[0]['valinv']/$tsmonthlyibl[0]['nilai']*100);?>%
								</td>
							</tr>
							<tr>
								<td class="text-center"><strong>OBL</strong></td>
								<td class="text-right"><?php echo formatrev($tsmonthlyobl[0]['nilai']);?></td>
								<td class="text-right <?php if($valmonthlyobl[0]['valinv'] < $tsmonthlyobl[0]['nilai']){  }?>">
									<?php echo formatrev($valmonthlyobl[0]['valinv']);?>
								</td>
								<td class="text-center <?php if($valmonthlyobl[0]['valinv'] < $tsmonthlyobl[0]['nilai']){  }?>">
									<?php echo sprintf("%0.1f", $valmonthlyobl[0]['valinv']/$tsmonthlyobl[0]['nilai']*100);?>%
								</td>
							</tr>
							</tbody>
							<?php
							$sumtsmonthlysales = $tsmonthlynopes[0]['nilai']+$tsmonthlypadi[0]['nilai']+$tsmonthlyibl[0]['nilai']+$tsmonthlyobl[0]['nilai'];
							$summonthlysales = $valmonthlynopes[0]['valinv']+$valmonthlypadi[0]['valinv']+$valmonthlyibl[0]['valinv']+$valmonthlyobl[0]['valinv'];
							$sumpresentasemonthlysales = sprintf("%0.1f", $summonthlysales/$sumtsmonthlysales*100).'%';
							?>
							<tfoot>
							<tr style="background: #2c2c54; color: white">
								<td class="text-center bg-light-subtle"><strong>Total</strong></td>
								<td class="text-right bg-light-subtle">
									<strong><?php echo formatrev($sumtsmonthlysales);?></strong>
								</td>
								<td class="text-right bg-light-subtle">
									<strong><?php echo formatrev($summonthlysales);?></strong>
								</td>
								<td class="text-center bg-light-subtle">
									<strong><?php echo $sumpresentasemonthlysales;?></strong>
								</td>
							</tr>
							</tfoot>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="card card-hover">
		<div class="card-header text-bg-warning d-flex align-items-center">
		  <h4 class="mb-0 text-white fs-5 mb-0">COLLECTION</h4> 
		</div>
        <div class="card-body">  
			<h2><strong>Period 2021-<?php echo date('Y');?></strong></h2>
            <div class="row">
                <div class="col-lg-12">
					<div class="table-responsive mb-4">
						<table class="table table-hover border text-nowrap customize-table mb-0 align-middle">
							<tbody>
							<tr>
								<td class="text-center bg-light-subtle" width="20%"><strong>AR Resume</strong></td>
								<td class="text-right bg-warning-subtle text-warning" width="20%"><strong>Collection Remain</strong></td>
								<td class="text-right bg-warning-subtle text-warning" width="20%"><strong>Sales</strong></td>
								<td class="text-right bg-warning-subtle text-warning" width="20%"><strong>Collection Paid</strong></td>
								<td class="text-right bg-warning-subtle text-warning" width="20%"><strong>Final Collection</strong></td>
							</tr>
							<?php for($i=0; $i<count($resumear); $i++): ?>
								<tr>
									<td class="bg-light-subtle"><?php echo $resumear[$i]['monthname'];?></td>
									<td class="text-right">
										<?php if(is_numeric($resumear[$i]['sisacollection'])){ echo formatrev($resumear[$i]['sisacollection']); }else{ echo $resumear[$i]['sisacollection']; };?>
									</td>
									<td class="text-right">
										<?php if(is_numeric($resumear[$i]['sales'])){ echo formatrev($resumear[$i]['sales']); }else{ echo $resumear[$i]['sales']; };?>
									</td>
									<td class="text-right">
										<?php if(is_numeric($resumear[$i]['collectionpaid'])){ echo formatrev($resumear[$i]['collectionpaid']); }else{ echo $resumear[$i]['collectionpaid']; };?>
									</td>
									<td class="text-right">
										<?php if(is_numeric($resumear[$i]['finalcollection'])){ echo formatrev($resumear[$i]['finalcollection']); }else{ echo $resumear[$i]['finalcollection']; };?>
									</td>
								</tr>
							<?php endfor; ?>
							</tbody>
						</table>
					</div>	
                </div>
            </div>
        </div>
    </div>
	
	<div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header text-bg-warning d-flex align-items-center">
                    <h4 class="card-title text-white mb-0">Current Month</h4>
                </div>
                <div class="card-body collapse show">
					<h2><strong><?php echo $ismonthly;?></strong></h2>
                    <div class="table-responsive mb-4">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
							<tbody>
							<tr>
								<td class="text-center bg-light-subtle" width="3.65%" style="vertical-align: middle;"><strong>Order Type</strong></td>
								<td class="text-right bg-light-subtle" width="8%" style="vertical-align: middle;"><strong>Target</strong></td>
								<td class="text-right bg-success-subtle text-success" width="8%" style="vertical-align: middle;"><strong>Paid</strong></td>
								<td class="text-right bg-danger-subtle text-danger" width="8%" style="vertical-align: middle;"><strong>Unpaid</strong></td>
							</tr> 
							<?php
							$sumtarget = 0;
							$sumpaid = 0;
							$sumunpaid = 0;
							?>
							<?php for($i=0; $i<count($collmonthly); $i++): ?>
								<?php
								if(!empty($collmonthly[$i]['targetcoll'])){ $sumtarget += $collmonthly[$i]['targetcoll']; }
								if(!empty($collmonthly[$i]['paid'])){ $sumpaid += $collmonthly[$i]['paid']; }
								if(!empty($collmonthly[$i]['unpaid'])){ $sumunpaid += $collmonthly[$i]['unpaid']; }
								?>
								<tr>
									<td class="text-center"><?php echo $collmonthly[$i]['orderstatus'];?></td>
									<td class="text-right">
										<?php if(is_numeric($collmonthly[$i]['targetcoll'])){ echo formatrev($collmonthly[$i]['targetcoll']); }else{ echo $collmonthly[$i]['targetcoll']; };?>
									</td>
									<td class="text-right text-right bg-success-subtle text-success">
										<?php if(is_numeric($collmonthly[$i]['paid'])){ echo formatrev($collmonthly[$i]['paid']); }else{ echo $collmonthly[$i]['paid']; };?>
									</td>
									<td class="text-right text-right bg-danger-subtle text-danger">
										<?php if(is_numeric($collmonthly[$i]['unpaid'])){ echo formatrev($collmonthly[$i]['unpaid']); }else{ echo $collmonthly[$i]['unpaid']; };?>
										<?php //echo '<br>'.$collmonthly[$i]['unpaid'];?>
									</td>
								</tr>
							<?php endfor; ?>
							<tr>
								<td class="text-center bg-light-subtle"><strong>Total</strong></td>
								<td class="text-right bg-light-subtle">
									<?php if(!empty($sumtarget)){ echo formatrev($sumtarget); } ?>
								</td>
								<td class="text-right bg-success-subtle text-success">
									<strong><?php if(!empty($sumpaid)){ echo formatrev($sumpaid); } ?></strong>
								</td>
								<td class="text-right bg-danger-subtle text-danger">
									<strong><?php if(!empty($sumunpaid)){ echo formatrev($sumunpaid); } ?></strong>
								</td>
							</tr>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header text-bg-warning d-flex align-items-center">
                    <h4 class="card-title text-white mb-0">Invoice Position</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive mb-4">
                        <table class="table table-sm table-hover border text-nowrap customize-table mb-0 align-middle">
							<tbody>
							<tr style="background: #2c2c54; color: white">
								<td class="text-center bg-light-subtle" rowspan="2" width="20%" style="vertical-align: middle;"><strong>Order Type</strong></td>
								<td class="text-center bg-warning-subtle text-warning" colspan="12"><strong>Unpaid Position</strong></td>
							</tr>
							<tr style="background: #2c2c54; color: white">
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
									<td class="text-center bg-light-subtle"><?php echo $collmonthly[$i]['orderstatus'];?></td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-0" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Accurate">
											<?php if(is_numeric($collmonthly[$i]['unpaidaccurate'])){ echo formatrev($collmonthly[$i]['unpaidaccurate']); }else{ echo $collmonthly[$i]['unpaidaccurate']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-6" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Percepatan">
											<?php if(is_numeric($collmonthly[$i]['unpaidpercepatan'])){ echo formatrev($collmonthly[$i]['unpaidpercepatan']); }else{ echo $collmonthly[$i]['unpaidpercepatan']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-2" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Segmen">
											<?php if(is_numeric($collmonthly[$i]['unpaidsegmen'])){ echo formatrev($collmonthly[$i]['unpaidsegmen']); }else{ echo $collmonthly[$i]['unpaidsegmen']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-11" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Npk">
											<?php if(is_numeric($collmonthly[$i]['unpaidnpk'])){ echo formatrev($collmonthly[$i]['unpaidnpk']); }else{ echo $collmonthly[$i]['unpaidnpk']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-7" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Legal">
											<?php if(is_numeric($collmonthly[$i]['unpaidlegal'])){ echo formatrev($collmonthly[$i]['unpaidlegal']); }else{ echo $collmonthly[$i]['unpaidlegal']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-5" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Revisi">
											<?php if(is_numeric($collmonthly[$i]['unpaidrevisi'])){ echo formatrev($collmonthly[$i]['unpaidrevisi']); }else{ echo $collmonthly[$i]['unpaidrevisi']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-8" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Dokhilang">
											<?php if(is_numeric($collmonthly[$i]['unpaiddokhilang'])){ echo formatrev($collmonthly[$i]['unpaiddokhilang']); }else{ echo $collmonthly[$i]['unpaiddokhilang']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-3" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Invidea">
											<?php if(is_numeric($collmonthly[$i]['unpaidinvidea'])){ echo formatrev($collmonthly[$i]['unpaidinvidea']); }else{ echo $collmonthly[$i]['unpaidinvidea']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-4" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Precise">
											<?php if(is_numeric($collmonthly[$i]['unpaidprecise'])){ echo formatrev($collmonthly[$i]['unpaidprecise']); }else{ echo $collmonthly[$i]['unpaidprecise']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-16" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Logistik">
											<?php if(is_numeric($collmonthly[$i]['unpaidlogistik'])){ echo formatrev($collmonthly[$i]['unpaidlogistik']); }else{ echo $collmonthly[$i]['unpaidlogistik']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-18" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Keuangan">
											<?php if(is_numeric($collmonthly[$i]['unpaidkeuangan'])){ echo formatrev($collmonthly[$i]['unpaidkeuangan']); }else{ echo $collmonthly[$i]['unpaidkeuangan']; };?>
										</a>
									</td>
									<td class="text-right">
										<a style="color: #dc2626;font-weight: bold;" class="link-unpaid" data-unpaid="<?php echo $collmonthly[$i]['orderstatus'];?>-10" title="Detail <?php echo $collmonthly[$i]['orderstatus'];?>-Forecasting">
											<?php if(is_numeric($collmonthly[$i]['unpaidforecasting'])){ echo formatrev($collmonthly[$i]['unpaidforecasting']); }else{ echo $collmonthly[$i]['unpaidforecasting']; };?>
										</a>
									</td>
								</tr>
							<?php endfor; ?>
							<tr style="background: #2c2c54; color: white">
								<td class="text-center bg-light-subtle"><strong>Total</strong></td>
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
    </div>
</section>

<div id="modalUnpaid" class="modal fade" aria-hidden="true" aria-labelledby="modalUnpaid" role="dialog">
    <div class="modal-dialog modal-simple modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 id="modalTitle" class="modal-title text-white"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="viewUnpaid"></div>
            </div>
            <div class="modal-footer">
                <a id="downloadUnpaidPosition" class="btn btn-sm btn-success btn-pure hidden" href="javascript:void(0)" style="float: left;"><i class="ti ti-download"></i> Download</a>
                <a class="btn btn-sm btn-default btn-pure" data-bs-dismiss="modal" href="javascript:void(0)">Tutup</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $(".link-unpaid").on("click", function () {
	        var dataPost = $(this).data("unpaid");
	        // var dataPost = 'PADI-0';

	        $.ajax({
		        type: "POST",
		        url: "<?php echo base_url().$this->router->fetch_class().'/ajaxviewunpaid'?>",
		        data: "unpaid="+dataPost,
		        success: function (data) {
			        var respon = JSON.parse(data);
			        if(respon['status'] == 'success'){
				        $('#modalUnpaid').modal('show');
				        $('#modalTitle').html(respon['title']);
				        $('#viewUnpaid').html(respon['view']);
				        $('#downloadUnpaidPosition').removeClass("hidden");
				        document.getElementById("downloadUnpaidPosition").setAttribute("data-unpaid", respon['titlestatus']);
			        }else{
				        alert("system not responding");
				        $('#downloadUnpaidPosition').addClass("hidden");
			        }
		        }
	        });
        });

        $("#downloadUnpaidPosition").on("click", function () {
            var dataPost = $(this).data("unpaid");

            var link = '<?php echo site_url('dashboard/download?unpaid=')?>'+dataPost;
            window.location.href = link;
        });
    });
</script>