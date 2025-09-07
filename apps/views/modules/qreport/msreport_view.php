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
          <p id="copytext">*PERFORMANSI UPDATE* <br/>
		  <?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?></p>
			*Pencapaian AM* 
			<br/>
			Isnanza Zulkarnaini = <?php echo $dtn[0]['volinv']; ?> order | Rp. <?php echo strrev(implode('.',str_split(strrev(strval($dtn[0]['valinv'])),3))); ?>
			<br/>
			Sigit Hidayatullah = <?php echo $dts[0]['volinv']; ?> order | Rp. <?php echo strrev(implode('.',str_split(strrev(strval($dts[0]['valinv'])),3))); ?>
			<br/>
			Vania Miranda Putri = <?php echo $dtv[0]['volinv']; ?> order | Rp. <?php echo strrev(implode('.',str_split(strrev(strval($dtv[0]['valinv'])),3))); ?>
			<br/>
			Eva Ayu Komala = <?php echo $dte[0]['volinv']; ?> order | Rp. <?php echo strrev(implode('.',str_split(strrev(strval($dte[0]['valinv'])),3))); ?>
			<br/> 
			<br/> 
			*Pencapaian Bulan ini*
			<br/> 
			Rp <?php echo strrev(implode('.',str_split(strrev(strval($totalorder[0]['valinv'])),3))); ?>
			<br/> 
			<br/> 
			*Estimasi Profit*
			<br/>
			Rp <?php echo strrev(implode('.',str_split(strrev(strval($estimasiprofit[0]['estprofit'])),3))); ?>
			<br/> 
			<br/> 
			Detail : <a href="https://kms.kopegtel-metropolitan.co.id/quickreport/mrsl">https://kms.kopegtel-metropolitan.co.id/quickreport/mrsl</a>  
			<br/>
			*Komanders*
			<br/>
			<hr/> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <h3 style="text-align: center;vertical-align: middle;">AM Isnanza Zulkarnaini</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $drn ) > 0) { ?>
                        <table id="datatablesn" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
								<th>Unit</th>
								<th>Segmen</th>
                                <th>Tipe</th>
								<th>Vol</th>
								<th>Val </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>Unit</th>
								<th>Segmen</th>
                                <th>Tipe</th>
								<th>Vol</th>
								<th>Val </th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drn as $rown ) { ?>
                                <?php $i++; ?>
                                <tr>
									<td>
									<?php if($rown['unit'] == 'KOMET') { ?>
									<span class="label label-danger">KOMET</span>
									<?php } else { ?>
									<span class="label label-primary">MESRA</span>
									<?php } ?>
									</td>
									<td><?php echo $rown['segment'] ?></td>
									<td><?php echo $rown['orderstatus'] ?></td>
									<td><?php echo $rown['volinv'] ?> order</td>
									<td style="color: #fa591d;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rown['valinv'])),3))); ?></strong></td>
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
	  <h3 style="text-align: center;vertical-align: middle;">AM Sigit Hidayatullah</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $drs ) > 0) { ?>
                        <table id="datatabless" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
								<th>Unit</th>
								<th>Segmen</th>
                                <th>Tipe</th>
								<th>Vol</th>
								<th>Val </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>Unit</th>
								<th>Segmen</th>
                                <th>Tipe</th>
								<th>Vol</th>
								<th>Val </th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drs as $rows ) { ?>
                                <?php $i++; ?>
                                <tr>
									<td>
									<?php if($rows['unit'] == 'KOMET') { ?>
									<span class="label label-danger">KOMET</span>
									<?php } else { ?>
									<span class="label label-primary">MESRA</span>
									<?php } ?>
									</td>
									<td><?php echo $rows['segment'] ?></td>
									<td><?php echo $rows['orderstatus'] ?></td>
									<td><?php echo $rows['volinv'] ?> order</td>
									<td style="color: #fa591d;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rows['valinv'])),3))); ?></strong></td>
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
	  <h3 style="text-align: center;vertical-align: middle;">AM Vania Miranda Putri</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $drv ) > 0) { ?>
                        <table id="datatablesv" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
								<th>Unit</th>
								<th>Segmen</th>
                                <th>Tipe</th>
								<th>Vol</th>
								<th>Val </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>Unit</th>
								<th>Segmen</th>
                                <th>Tipe</th>
								<th>Vol</th>
								<th>Val </th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drv as $rowv ) { ?>
                                <?php $i++; ?>
                                <tr>
									<td>
									<?php if($rowv['unit'] == 'KOMET') { ?>
									<span class="label label-danger">KOMET</span>
									<?php } else { ?>
									<span class="label label-primary">MESRA</span>
									<?php } ?>
									</td>
									<td><?php echo $rowv['segment'] ?></td>
									<td><?php echo $rowv['orderstatus'] ?></td>
									<td><?php echo $rowv['volinv'] ?> order</td>
									<td style="color: #fa591d;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rowv['valinv'])),3))); ?></strong></td>
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
	  <h3 style="text-align: center;vertical-align: middle;">AM Eva Ayu Komala</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				<?php if (count ( $dre ) > 0) { ?>
                        <table id="datatablese" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
								<th>Unit</th>
								<th>Segmen</th>
                                <th>Tipe</th>
								<th>Vol</th>
								<th>Val </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th>Unit</th>
								<th>Segmen</th>
                                <th>Tipe</th>
								<th>Vol</th>
								<th>Val </th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $dre as $rowe ) { ?>
                                <?php $i++; ?>
                                <tr>
									<td>
									<?php if($rowe['unit'] == 'KOMET') { ?>
									<span class="label label-danger">KOMET</span>
									<?php } else { ?>
									<span class="label label-primary">MESRA</span>
									<?php } ?>
									</td>
									<td><?php echo $rowe['segment'] ?></td>
									<td><?php echo $rowe['orderstatus'] ?></td>
									<td><?php echo $rowe['volinv'] ?> order</td>
									<td style="color: #fa591d;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rowe['valinv'])),3))); ?></strong></td>
                                </tr>
                            <?php }	?>
                            </tbody> 
                        </table>
                    <?php } ?>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?php echo date('Y')?><b><a href="#" class="text-black"> Koperasi Metropolitan</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->
<?php $this->carabiner->display('js_content');?>
  <script type="text/javascript">
    $(document).ready(function() {
       $('#datatablesn').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatabless').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatablesv').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        });
       $('#datatablese').DataTable({
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
