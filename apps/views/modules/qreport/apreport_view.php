<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri')?>favicon.png" />
	<?php $this->carabiner->display('css_head');?>
	<?php $this->carabiner->display('js_head');?>
	
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div style="max-width: 512px;margin: 0 auto;margin-top: 10%;">
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> KOMANDERS
            <small class="pull-right"><?php echo $datenow; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info"> 
        <div class="col-sm-12 invoice-col">
          <p id="copytext">
			*Request Approval SPB untuk <?php echo $tomorrow; ?>*</p>
			*Rangkuman SPB* 
			<br/>
			Isnanza Zulkarnaini
			<br/>
			<?php echo $tcountspbnanza; ?> SPB
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($tsumspbnanza)),3))); ?>
			<br/>
			<br/>
			Sigit Hidayatullah
			<br/>
			<?php echo $tcountspbsigit; ?> SPB
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($tsumspbsigit)),3))); ?>
			<br/>
			<br/>
			Vania Miranda Putri
			<br/>
			<?php echo $tcountspbvania; ?> SPB
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($tsumspbvania)),3))); ?>
			<br/>
			<br/>
			Eva Ayu Komala
			<br/>
			<?php echo $tcountspbeva; ?> SPB
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($tsumspbeva)),3))); ?>
			
			<br/>
			<br/>
			*Total SPB Hari Ini*
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($grandtotal)),3))); ?>
			<br/>
			<br/>
			Detail : <a href="https://kms.kopegtel-metropolitan.co.id/quickreport/aprv">https://kms.kopegtel-metropolitan.co.id/quickreport/aprv</a>  
			<br/>
			*Komanders*
			<br/>
			<br/>
			<a href="<?php echo base_url() ?>" class="btn btn-success btn-sm"> Mulai Approve</a> 
			<hr/> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <h3 style="text-align: center;vertical-align: middle;">AM Isnanza Zulkarnaini</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
                        <table id="datatablesnk" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dept</th>
                                <th>SPB</th>
                                <th>INV</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            <?php
							if ($kcrn != 0) {
							$kin = 0;
							for ($krown = 0; $krown < $kcrn; $krown++) {
								$kin++;	
								  echo '<tr>';
									echo '<td>'.$kin.'</td>';
									echo '<td><span class="label label-danger">KOMET</span></td>';
									echo '<td>'.$kdrn[$krown][0]['code'].'</td>';
									if ($kdrn[$krown][0]['invnum'] == 0 ){
										echo '<td>PRPO<br/>'.$kdrn[$krown][0]['segment'].'</td>';
									} else {
										echo '<td>';
										echo $kdrn[$krown][0]['invnum'].'<br/>'.$kdrn[$krown][0]['segment'];
											if ($kdrn[$krown][0]['invstatus'] == '1') {
												echo '<br/><span class="label label-success">Cair</span>';
											} elseif ($kdrn[$krown][0]['invstatus'] == '2') {
												echo '<br/><span class="label label-info">Segmen</span>';
											} elseif ($kdrn[$krown][0]['invstatus'] == '3') {
												echo '<br/><span class="label label-warning">PJM</span>';
											} elseif ($kdrn[$krown][0]['invstatus'] == '4') {
												echo '<br/><span class="label label-warning">ASD</span>';
											} elseif ($kdrn[$krown][0]['invstatus'] == '5') {
												echo '<br/><span class="label label-primary">Logistik</span>';
											} elseif ($kdrn[$krown][0]['invstatus'] == '6') {
												echo '<br/><span class="label label-success">Keuangan</span>';
											} elseif ($kdrn[$krown][0]['invstatus'] == '7') {
												echo '<br/><span class="label label-primary">Legal</span>';
											} elseif ($kdrn[$krown][0]['invstatus'] == '8') {
												echo '<br/><span class="label label-success">Posting</span>';
											} else {
												echo '<br/><span class="label label-info">Terkirim</span>';
											}
										echo '</td>';	
									}
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($kdrn[$krown][0]['value'])),3))).'</td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="material-datatables">
                        <table id="datatablesnm" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dept</th>
                                <th>SPB</th>
                                <th>INV</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            <?php
							if ($mcrn != 0) {
							$min = 0;
							for ($mrown = 0; $mrown < $mcrn; $mrown++) {
								$min++;	
								  echo '<tr>';
									echo '<td>'.$min.'</td>';
									echo '<td><span class="label label-primary">MESRA</span></td>';
									echo '<td>'.$mdrn[$mrown][0]['code'].'</td>';									
									if ($mdrn[$mrown][0]['invnum'] == 0 ){
										echo '<td>PRPO<br/>'.$mdrn[$mrown][0]['segment'].'</td>';
									} else {
										echo '<td>';
										echo $mdrn[$mrown][0]['invnum'].'<br/>'.$mdrn[$mrown][0]['segment'];
											if ($mdrn[$mrown][0]['invstatus'] == '1') {
												echo '<br/><span class="label label-success">Cair</span>';
											} elseif ($mdrn[$mrown][0]['invstatus'] == '2') {
												echo '<br/><span class="label label-info">Segmen</span>';
											} elseif ($mdrn[$mrown][0]['invstatus'] == '3') {
												echo '<br/><span class="label label-warning">PJM</span>';
											} elseif ($mdrn[$mrown][0]['invstatus'] == '4') {
												echo '<br/><span class="label label-warning">ASD</span>';
											} elseif ($mdrn[$mrown][0]['invstatus'] == '5') {
												echo '<br/><span class="label label-primary">Logistik</span>';
											} elseif ($mdrn[$mrown][0]['invstatus'] == '6') {
												echo '<br/><span class="label label-success">Keuangan</span>';
											} elseif ($mdrn[$mrown][0]['invstatus'] == '7') {
												echo '<br/><span class="label label-primary">Legal</span>';
											} elseif ($mdrn[$mrown][0]['invstatus'] == '8') {
												echo '<br/><span class="label label-success">Posting</span>';
											} else {
												echo '<br/><span class="label label-info">Terkirim</span>';
											}
										echo '</td>';	
									}
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($mdrn[$mrown][0]['value'])),3))).'</td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
	  <h3 style="text-align: center;vertical-align: middle;">AM Sigit Hidayatullah</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
                        <table id="datatablessk" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dept</th>
                                <th>SPB</th>
                                <th>INV</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            <?php
							if ($kcrs != 0) {
							$kis = 0;
							for ($krows = 0; $krows < $kcrs; $krows++) {
								$kis++;	
								  echo '<tr>';
									echo '<td>'.$kis.'</td>';
									echo '<td><span class="label label-danger">KOMET</span></td>';
									echo '<td>'.$kdrs[$krows][0]['code'].'</td>';						
									if ($kdrs[$krows][0]['invnum'] == 0 ){
										echo '<td>PRPO<br/>'.$kdrs[$krows][0]['segment'].'</td>';
									} else {
										echo '<td>';
										echo $kdrs[$krows][0]['invnum'].'<br/>'.$kdrs[$krows][0]['segment'];
											if ($kdrs[$krows][0]['invstatus'] == '1') {
												echo '<br/><span class="label label-success">Cair</span>';
											} elseif ($kdrs[$krows][0]['invstatus'] == '2') {
												echo '<br/><span class="label label-info">Segmen</span>';
											} elseif ($kdrs[$krows][0]['invstatus'] == '3') {
												echo '<br/><span class="label label-warning">PJM</span>';
											} elseif ($kdrs[$krows][0]['invstatus'] == '4') {
												echo '<br/><span class="label label-warning">ASD</span>';
											} elseif ($kdrs[$krows][0]['invstatus'] == '5') {
												echo '<br/><span class="label label-primary">Logistik</span>';
											} elseif ($kdrs[$krows][0]['invstatus'] == '6') {
												echo '<br/><span class="label label-success">Keuangan</span>';
											} elseif ($kdrs[$krows][0]['invstatus'] == '7') {
												echo '<br/><span class="label label-primary">Legal</span>';
											} elseif ($kdrs[$krows][0]['invstatus'] == '8') {
												echo '<br/><span class="label label-success">Posting</span>';
											} else {
												echo '<br/><span class="label label-info">Terkirim</span>';
											}
										echo '</td>';	
									}
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($kdrs[$krows][0]['value'])),3))).'</td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
        <!-- /.col -->
      </div> 
      <!-- /.row -->
      <div class="row">
        <div class="material-datatables">
                        <table id="datatablessm" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dept</th>
                                <th>SPB</th>
                                <th>INV</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            <?php
							if ($mcrs != 0) {
							$mis = 0;
							for ($mrows = 0; $mrows < $mcrs; $mrows++) {
								$mis++;	
								  echo '<tr>';
									echo '<td>'.$mis.'</td>';
									echo '<td><span class="label label-primary">MESRA</span></td>';
									echo '<td>'.$mdrs[$mrows][0]['code'].'</td>';				
									if ($mdrs[$mrows][0]['invnum'] == 0 ){
										echo '<td>PRPO<br/>'.$mdrs[$mrows][0]['segment'].'</td>';
									} else {
										echo '<td>';
										echo $mdrs[$mrows][0]['invnum'].'<br/>'.$mdrs[$mrows][0]['segment'];
											if ($mdrs[$mrows][0]['invstatus'] == '1') {
												echo '<br/><span class="label label-success">Cair</span>';
											} elseif ($mdrs[$mrows][0]['invstatus'] == '2') {
												echo '<br/><span class="label label-info">Segmen</span>';
											} elseif ($mdrs[$mrows][0]['invstatus'] == '3') {
												echo '<br/><span class="label label-warning">PJM</span>';
											} elseif ($mdrs[$mrows][0]['invstatus'] == '4') {
												echo '<br/><span class="label label-warning">ASD</span>';
											} elseif ($mdrs[$mrows][0]['invstatus'] == '5') {
												echo '<br/><span class="label label-primary">Logistik</span>';
											} elseif ($mdrs[$mrows][0]['invstatus'] == '6') {
												echo '<br/><span class="label label-success">Keuangan</span>';
											} elseif ($mdrs[$mrows][0]['invstatus'] == '7') {
												echo '<br/><span class="label label-primary">Legal</span>';
											} elseif ($mdrs[$mrows][0]['invstatus'] == '8') {
												echo '<br/><span class="label label-success">Posting</span>';
											} else {
												echo '<br/><span class="label label-info">Terkirim</span>';
											}
										echo '</td>';	
									}
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($mdrs[$mrows][0]['value'])),3))).'</td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
	  <h3 style="text-align: center;vertical-align: middle;">AM Vania Miranda Putri</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
                        <table id="datatablesvk" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dept</th>
                                <th>SPB</th>
                                <th>INV</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            <?php
							if ($kcrv != 0) {
							$kiv = 0;
							for ($krowv = 0; $krowv < $kcrv; $krowv++) {
								$kiv++;	
								  echo '<tr>';
									echo '<td>'.$kiv.'</td>';
									echo '<td><span class="label label-danger">KOMET</span></td>';
									echo '<td>'.$kdrv[$krowv][0]['code'].'</td>';									
									if ($kdrv[$krowv][0]['invnum'] == 0 ){
										echo '<td>PRPO<br/>'.$kdrv[$krowv][0]['segment'].'</td>';
									} else {
										echo '<td>';
										echo $kdrv[$krowv][0]['invnum'].'<br/>'.$kdrv[$krowv][0]['segment'];
											if ($kdrv[$krowv][0]['invstatus'] == '1') {
												echo '<br/><span class="label label-success">Cair</span>';
											} elseif ($kdrv[$krowv][0]['invstatus'] == '2') {
												echo '<br/><span class="label label-info">Segmen</span>';
											} elseif ($kdrv[$krowv][0]['invstatus'] == '3') {
												echo '<br/><span class="label label-warning">PJM</span>';
											} elseif ($kdrv[$krowv][0]['invstatus'] == '4') {
												echo '<br/><span class="label label-warning">ASD</span>';
											} elseif ($kdrv[$krowv][0]['invstatus'] == '5') {
												echo '<br/><span class="label label-primary">Logistik</span>';
											} elseif ($kdrv[$krowv][0]['invstatus'] == '6') {
												echo '<br/><span class="label label-success">Keuangan</span>';
											} elseif ($kdrv[$krowv][0]['invstatus'] == '7') {
												echo '<br/><span class="label label-primary">Legal</span>';
											} elseif ($kdrv[$krowv][0]['invstatus'] == '8') {
												echo '<br/><span class="label label-success">Posting</span>';
											} else {
												echo '<br/><span class="label label-info">Terkirim</span>';
											}
										echo '</td>';	
									}
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($kdrv[$krowv][0]['value'])),3))).'</td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="material-datatables">
                        <table id="datatablesvm" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dept</th>
                                <th>SPB</th>
                                <th>INV</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            <?php
							if ($mcrv != 0) {
							$miv = 0;
							for ($mrowv = 0; $mrowv < $mcrv; $mrowv++) {
								$miv++;	
								  echo '<tr>';
									echo '<td>'.$miv.'</td>';
									echo '<td><span class="label label-primary">MESRA</span></td>';
									echo '<td>'.$mdrv[$mrowv][0]['code'].'</td>';								
									if ($mdrv[$mrowv][0]['invnum'] == 0 ){
										echo '<td>PRPO<br/>'.$mdrv[$mrowv][0]['segment'].'</td>';
									} else {
										echo '<td>';
										echo $mdrv[$mrowv][0]['invnum'].'<br/>'.$mdrv[$mrowv][0]['segment'];
											if ($mdrv[$mrowv][0]['invstatus'] == '1') {
												echo '<br/><span class="label label-success">Cair</span>';
											} elseif ($mdrv[$mrowv][0]['invstatus'] == '2') {
												echo '<br/><span class="label label-info">Segmen</span>';
											} elseif ($mdrv[$mrowv][0]['invstatus'] == '3') {
												echo '<br/><span class="label label-warning">PJM</span>';
											} elseif ($mdrv[$mrowv][0]['invstatus'] == '4') {
												echo '<br/><span class="label label-warning">ASD</span>';
											} elseif ($mdrv[$mrowv][0]['invstatus'] == '5') {
												echo '<br/><span class="label label-primary">Logistik</span>';
											} elseif ($mdrv[$mrowv][0]['invstatus'] == '6') {
												echo '<br/><span class="label label-success">Keuangan</span>';
											} elseif ($mdrv[$mrowv][0]['invstatus'] == '7') {
												echo '<br/><span class="label label-primary">Legal</span>';
											} elseif ($mdrv[$mrowv][0]['invstatus'] == '8') {
												echo '<br/><span class="label label-success">Posting</span>';
											} else {
												echo '<br/><span class="label label-info">Terkirim</span>';
											}
										echo '</td>';	
									}								
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($mdrv[$mrowv][0]['value'])),3))).'</td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
	  <h3 style="text-align: center;vertical-align: middle;">AM Eva Ayu Komala</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
                        <table id="datatablesek" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dept</th>
                                <th>SPB</th>
                                <th>INV</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            <?php
							if ($kcre != 0) {
							$kie = 0;
							for ($krowe = 0; $krowe < $kcre; $krowe++) {
								$kie++;	
								  echo '<tr>';
									echo '<td>'.$kie.'</td>';
									echo '<td><span class="label label-danger">KOMET</span></td>';
									echo '<td>'.$kdre[$krowe][0]['code'].'</td>';						
									if ($kdre[$krowe][0]['invnum'] == 0 ){
										echo '<td>PRPO<br/>'.$kdre[$krowe][0]['segment'].'</td>';
									} else {
										echo '<td>';
										echo $kdre[$krowe][0]['invnum'].'<br/>'.$kdre[$krowe][0]['segment'];
											if ($kdre[$krowe][0]['invstatus'] == '1') {
												echo '<br/><span class="label label-success">Cair</span>';
											} elseif ($kdre[$krowe][0]['invstatus'] == '2') {
												echo '<br/><span class="label label-info">Segmen</span>';
											} elseif ($kdre[$krowe][0]['invstatus'] == '3') {
												echo '<br/><span class="label label-warning">PJM</span>';
											} elseif ($kdre[$krowe][0]['invstatus'] == '4') {
												echo '<br/><span class="label label-warning">ASD</span>';
											} elseif ($kdre[$krowe][0]['invstatus'] == '5') {
												echo '<br/><span class="label label-primary">Logistik</span>';
											} elseif ($kdre[$krowe][0]['invstatus'] == '6') {
												echo '<br/><span class="label label-success">Keuangan</span>';
											} elseif ($kdre[$krowe][0]['invstatus'] == '7') {
												echo '<br/><span class="label label-primary">Legal</span>';
											} elseif ($kdre[$krowe][0]['invstatus'] == '8') {
												echo '<br/><span class="label label-success">Posting</span>';
											} else {
												echo '<br/><span class="label label-info">Terkirim</span>';
											}
										echo '</td>';	
									}
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($kdre[$krowe][0]['value'])),3))).'</td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="material-datatables">
                        <table id="datatablesem" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dept</th>
                                <th>SPB</th>
                                <th>INV</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            <?php
							if ($mcre != 0) {
							$mie = 0;
							for ($mrowe = 0; $mrowe < $mcre; $mrowe++) {
								$mie++;	
								  echo '<tr>';
									echo '<td>'.$mie.'</td>';
									echo '<td><span class="label label-primary">MESRA</span></td>';
									echo '<td>'.$mdre[$mrowe][0]['code'].'</td>';				
									if ($mdre[$mrowe][0]['invnum'] == 0 ){
										echo '<td>PRPO<br/>'.$mdre[$mrowe][0]['segment'].'</td>';
									} else {
										echo '<td>';
										echo $mdre[$mrowe][0]['invnum'].'<br/>'.$mdre[$mrowe][0]['segment'];
											if ($mdre[$mrowe][0]['invstatus'] == '1') {
												echo '<br/><span class="label label-success">Cair</span>';
											} elseif ($mdre[$mrowe][0]['invstatus'] == '2') {
												echo '<br/><span class="label label-info">Segmen</span>';
											} elseif ($mdre[$mrowe][0]['invstatus'] == '3') {
												echo '<br/><span class="label label-warning">PJM</span>';
											} elseif ($mdre[$mrowe][0]['invstatus'] == '4') {
												echo '<br/><span class="label label-warning">ASD</span>';
											} elseif ($mdre[$mrowe][0]['invstatus'] == '5') {
												echo '<br/><span class="label label-primary">Logistik</span>';
											} elseif ($mdre[$mrowe][0]['invstatus'] == '6') {
												echo '<br/><span class="label label-success">Keuangan</span>';
											} elseif ($mdre[$mrowe][0]['invstatus'] == '7') {
												echo '<br/><span class="label label-primary">Legal</span>';
											} elseif ($mdre[$mrowe][0]['invstatus'] == '8') {
												echo '<br/><span class="label label-success">Posting</span>';
											} else {
												echo '<br/><span class="label label-info">Terkirim</span>';
											}
										echo '</td>';	
									}
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($mdre[$mrowe][0]['value'])),3))).'</td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2020<b><a href="#" class="text-black"> Koperasi Metropolitan</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->
<?php $this->carabiner->display('js_content');?>
  <script type="text/javascript">
    $(document).ready(function() {
       $('#datatablesnk').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatablesnm').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatablessk').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatablessm').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatablesvk').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
		
       $('#datatablesvm').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatablesek').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatablesem').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
    });
	
</script>
</body>
</html>
