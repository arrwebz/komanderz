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
          <p id="copytext">*INVESTOR UPDATE* <br/>
		  <?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?></p>
		  *A. Profile Investor*
		  <br/>
			Total investor: <?php echo $totalinvestor[0]['totalinvestor']; ?> orang
			<br/> 
			Total kontrak: <?php echo $totalcontract[0]['totalcontract']; ?> kontrak 
			<br/> 
			Total DES: <?php echo $totaldes[0]['division']; ?> orang
			<br/> 
			Total DGS: <?php echo $totaldgs[0]['division']; ?> orang
			<br/> 
			Total NON: <?php echo $totalnon[0]['division']; ?> orang
			<br/> 
			Total PENSIUN: <?php echo $totalpen[0]['division']; ?> orang
			<br/> 
			*Total Nilai Investasi: Rp. <?php echo strrev(implode('.',str_split(strrev(strval($suminvest[0]['suminvest'])),3))); ?>* 
			<br/>
			<br/>
			*B. Top 5 Investor*
			<br/>
            <?php $i = 0; ?>
				<?php foreach ( $top5 as $row5 ) { ?>
			<?php $i++; ?>
				<?php echo $i; ?>. <?php echo $row5['investname']; ?> : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row5['suminvest'])),3))); ?> <br/>
				<?php } ?>
			*<?php 
				$totaltop5 = array_sum(array_column($top5, 'suminvest')); 
				echo 'Total : Rp.'.strrev(implode('.',str_split(strrev(strval($totaltop5)),3)));
			?>*
			<br/>
			<br/>
			Detail : <a href="https://kms.kopegtel-metropolitan.co.id/quickreport/koin">https://kms.kopegtel-metropolitan.co.id/quickreport/koin</a>  
			<br/>
			*Komanders*
			<br/>
			<hr/> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <h3 style="text-align: center;vertical-align: middle;">Pembayaran Fee Investor</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $paymentfee ) > 0) { ?>
                        <table id="datatablespf" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>Nama</th>
								<th>Tanggal</th>
								<th>Fee Ivest</th>
                            </tr> 
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nama</th>
								<th>Tanggal</th>
								<th>Fee Ivest</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $paymentfee as $rop ) { ?> 
                                <?php $i++; ?>
                                <tr> 
									<?php if(date('m',strtotime($rop['startdate'])) == date('m')) { ?> 
									<td><?php echo $rop['contract'] ?> - <?php echo $rop['investname'] ?></td>
									<td><?php echo date('d F Y',strtotime($rop['startdate'])); ?></td>
									<td style="color: #03ac0e;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rop['feeinvest'])),3))); ?></strong></td>
									<?php } else { ?>
									<td style="color:#b5bbc8;"><?php echo $rop['contract'] ?> - <?php echo $rop['investname'] ?></td>
									<td  style="color:#b5bbc8;"><?php echo date('d F Y',strtotime($rop['startdate'])); ?></td>
									<td style="color: #fa591d;opacity: 0.5;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rop['feeinvest'])),3))); ?></strong></td>
									<?php } ?> 
                                </tr>
                            <?php }	?>
                            </tbody> 
                        </table>
                    <?php } ?>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
	  <h3 style="text-align: center;vertical-align: middle;">Kontrak Berakhir</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $contractend ) > 0) { ?>
                        <table id="datatablesce" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>Nama</th>
								<th>Tanggal</th>
								<th>Fee Ivest</th>
                            </tr> 
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nama</th>
								<th>Tanggal</th>
								<th>Fee Ivest</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $contractend as $roc ) { ?> 
                                <?php $i++; ?>
                                <tr> 
									<?php if(date('m',strtotime($roc['endate'])) == date('m')) { ?> 
									<td><?php echo $roc['contract'] ?> - <?php echo $roc['investname'] ?></td>
									<td><?php echo date('d F Y',strtotime($roc['endate'])); ?></td>
									<td style="color: #03ac0e;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($roc['feeinvest'])),3))); ?></strong></td>
									<?php } else { ?>
									<td style="color:#b5bbc8;"><?php echo $roc['contract'] ?> - <?php echo $roc['investname'] ?></td>
									<td  style="color:#b5bbc8;"><?php echo date('d F Y',strtotime($roc['endate'])); ?></td>
									<td style="color: #fa591d;opacity: 0.5;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($roc['feeinvest'])),3))); ?></strong></td>
									<?php } ?> 
                                </tr>
                            <?php }	?>
                            </tbody> 
                        </table>
                    <?php } else { ?>
					<p style="color:#b5bbc8;">Tidak ada kontrak berakhir untuk besok.</p>
					<?php } ?>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2021<b><a href="#" class="text-black"> Koperasi Metropolitan</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->
<?php $this->carabiner->display('js_content');?>
  <script type="text/javascript">
    $(document).ready(function() {
       $('#datatablespf').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
		
       $('#datatablesce').DataTable({
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
