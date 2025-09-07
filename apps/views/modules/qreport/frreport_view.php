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
          <p id="copytext">*LAPORAN REALISASI PENCAIRAN DES DGS NON* <br/>
		  <?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?></p>
		  *KOMET Realisasi Pencairan*
		  <br/>
		  <?php if(!empty($drdk)) { ?>
			<?php echo array_sum(array_column($drdk, 'totalinv')); ?> invoice <br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalkomet)),3))); ?>
		  <?php } else { ?>
			Belum ada pencairan hari ini.
		  <?php } ?>
			<br/> 
			<br/> 
			*MESRA Realisasi Pencairan*
		  <br/>
		  <?php if(!empty($drdm)) { ?>
			<?php echo array_sum(array_column($drdm, 'totalinv')); ?> invoice <br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalmesra)),3))); ?>
		  <?php } else { ?>
			Belum ada pencairan hari ini.
		  <?php } ?>
			<br/> 
			<br/> 
			Detail : <a href="https://kms.kopegtel-metropolitan.co.id/quickreport/frlsi">https://kms.kopegtel-metropolitan.co.id/quickreport/frlsi</a>  
			<br/>
			*Komanders* 
			<br/> 
			<hr/> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <h3 style="text-align: center;vertical-align: middle;">KOMET Collection Realization</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $drdk ) > 0) { ?>
                        <table id="datatablesk" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr> 
								<th>Unit</th>
								<th>Realisasi Pencairan</th>
                                <th>Total Invoice</th>
								<th>Total Pencairan</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>Unit</th>
								<th>Realisasi Pencairan</th>
                                <th>Total Invoice</th>
								<th>Total Pencairan</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drdk as $rowk ) { ?>
                                <?php $i++; ?>
                                <tr>
									<td><span class="label label-danger">KOMET</span></td>
									<td><?php echo date('d F Y',strtotime($rowk['relsidat'])); ?></td>
									<td><?php echo $rowk['totalinv'] ?></td>
									<td style="color: #fa591d;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rowk['totalcair'])),3))); ?></strong></td>
                                </tr>
                            <?php }	?>
                            </tbody> 
                        </table>
					<?php } else { ?>
						No data.
					  <?php } ?>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $kometdaily ) > 0) { ?>
                        <table id="datatableskw" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
								<th>Unit</th>
								<th>Invoice</th>
								<th>Segmen</th>
								<th>Realisasi Pencairan</th>
								<th>Nilai Cair</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>Unit</th>
								<th>Invoice</th>
								<th>Segmen</th>
								<th>Realisasi Pencairan</th>
								<th>Nilai Cair</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $kometdaily as $kw ) { ?>
                                <?php $i++; ?>
                                <tr>
									<td><span class="label label-danger">KOMET</span></td>
									<td><?php echo $kw['invnum'] ?></td>
									<td><?php echo $kw['segment'] ?></td>
									<td><?php echo date('d F Y',strtotime($kw['procdat'])); ?></td>
                                    <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($kw['vrecvalue'])),3))); ?></strong></td>
                                </tr>
                            <?php }	?>
                            </tbody> 
                        </table>
					<?php } else { ?>
						No data.
					  <?php } ?>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
	  <h3 style="text-align: center;vertical-align: middle;">MESRA Collection Realization</h3>
      <!-- Table row -->
      <div class="row"> 
        <div class="material-datatables">
				<?php if (count ( $drdm ) > 0) { ?>
                        <table id="datatablesm" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
								<th>Unit</th>
								<th>Realisasi Pencairan</th>
                                <th>Total Invoice</th>
								<th>Total Pencairan</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>Unit</th>
								<th>Realisasi Pencairan</th>
                                <th>Total Invoice</th>
								<th>Total Pencairan</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drdm as $rowm ) { ?>
                                <?php $i++; ?>
                                <tr>
									<td><span class="label label-info">MESRA</span></td>
									<td><?php echo date('d F Y',strtotime($rowm['relsidat'])); ?></td>
									<td><?php echo $rowm['totalinv'] ?></td>
									<td style="color: #fa591d;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rowm['totalcair'])),3))); ?></strong></td>
                                </tr>
                            <?php }	?>
                            </tbody> 
                        </table>
					<?php } else { ?>
						No data.
					  <?php } ?>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $mesradaily ) > 0) { ?>
                        <table id="datatablesmw" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
								<th>Unit</th>
								<th>Invoice</th>
								<th>Segmen</th>
								<th>Realisasi Pencairan</th>
								<th>Nilai Cair</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>Unit</th>
								<th>Invoice</th>
								<th>Segmen</th>
								<th>Realisasi Pencairan</th>
								<th>Nilai Cair</th>
                            </tr>
                            </tfoot> 
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $mesradaily as $mw ) { ?>
                                <?php $i++; ?>
                                <tr>
									<td><span class="label label-info">MESRA</span></td>
									<td><?php echo $mw['invnum'] ?></td>
									<td><?php echo $mw['segment'] ?></td>
									<td><?php echo date('d F Y',strtotime($mw['procdat'])); ?></td>
                                    <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($mw['vrecvalue'])),3))); ?></strong></td>
                                </tr>
                            <?php }	?>
                            </tbody> 
                        </table>
					<?php } else { ?>
						No data.
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
       $('#datatablesk').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
		
		$('#datatableskw').DataTable({
            'responsive'  : true,
			'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true
        });
		
       $('#datatablesm').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
		
		$('#datatablesmw').DataTable({
            'responsive'  : true,
			'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true
        });
    });
	
</script>
</body>
</html>
