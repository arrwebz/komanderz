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
			<?php echo $tvolnanza; ?> SPB
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($tvalnanza)),3))); ?>
			<br/>
			<br/>
			Sigit Hidayatullah
			<br/>
			<?php echo $tvolsigit; ?> SPB
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($tvalsigit)),3))); ?>
			<br/>
			<br/>
			Vania Miranda Putri
			<br/>
			<?php echo $tvolvania; ?> SPB
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($tvalvania)),3))); ?>
			<br/>
			<br/>
			Eva Ayu Komala
			<br/>
			<?php echo $tvoleva; ?> SPB
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($tvaleva)),3))); ?>
			<br/>
			<br/>
			*Total SPB Hari Ini*
			<br/>
			Total : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($grandtotal)),3))); ?>
			<br/>
			<br/>
			Detail : <a href="https://kms.kopegtel-metropolitan.co.id/quickreport/reqaprv">https://kms.kopegtel-metropolitan.co.id/quickreport/reqaprv</a>  
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
		<?php if (count ( $krn ) > 0) { ?>
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
				<?php $i = 0; ?>
					<?php foreach ( $krn as $krown ) { ?>
					<?php $i++; ?>
					<?php 
						switch ($krown['invstatus']) {
									case '1':
										$invstat = '<span class="label label-success">Cair</span>';
										break;
									case '2':
										$invstat = '<span class="label label-info">Segmen</span>';
										break;
									case '3':
										$invstat = '<span class="label label-warning">PJM</span>';
										break;
									case '4':
										$invstat = '<span class="label label-warning">ASD</span>';
										break;
									case '5':
										$invstat = '<span class="label label-primary">Logistik</span>';
										break;
									case '6':
										$invstat = '<span class="label bg-olive">Keuangan</span>';
										break;
									case '7':
										$invstat = '<span class="label label-primary">Legal</span>';
										break;
									case '8':
										$invstat = '<span class="label bg-olive">Posting</span>';
										break;
									case '9':
										$invstat = '<span class="label label-danger">Batal</span>';
										break;
									case '10':
										$invstat = '<span class="label label-default">Forecasts</span>';
										break;
									default:
										$invstat = '<span class="label label-info">Terkirim</span>';
						}
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><span class="label label-danger">KOMET</span></td>
							<td><?php echo $krown['code']; ?></td>
							<td><?php echo $krown['invnum']; ?></td>
							<td><?php echo strrev(implode('.',str_split(strrev(strval($krown['value'])),3))); ?></td>
						</tr>
					<?php }	?>
				</tbody> 
			</table>
		<?php } else { echo 'Belum ada Request Approval SPB hari ini!'; }?>	
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="material-datatables">
		<?php if (count ( $mrn ) > 0) { ?>
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
				<?php $j = 0; ?>
					<?php foreach ( $mrn as $mrown ) { ?>
					<?php $j++; ?>
					<?php 
						switch ($mrown['invstatus']) {
									case '1':
										$invstat = '<span class="label label-success">Cair</span>';
										break;
									case '2':
										$invstat = '<span class="label label-info">Segmen</span>';
										break;
									case '3':
										$invstat = '<span class="label label-warning">PJM</span>';
										break;
									case '4':
										$invstat = '<span class="label label-warning">ASD</span>';
										break;
									case '5':
										$invstat = '<span class="label label-primary">Logistik</span>';
										break;
									case '6':
										$invstat = '<span class="label bg-olive">Keuangan</span>';
										break;
									case '7':
										$invstat = '<span class="label label-primary">Legal</span>';
										break;
									case '8':
										$invstat = '<span class="label bg-olive">Posting</span>';
										break;
									case '9':
										$invstat = '<span class="label label-danger">Batal</span>';
										break;
									case '10':
										$invstat = '<span class="label label-default">Forecasts</span>';
										break;
									default:
										$invstat = '<span class="label label-info">Terkirim</span>';
						}
					?>
						<tr>
							<td><?php echo $j; ?></td>
							<td><span class="label label-primary">MESRA</span></td>
							<td><?php echo $mrown['code']; ?></td>
							<td><?php echo $mrown['invnum']; ?></td>
							<td><?php echo strrev(implode('.',str_split(strrev(strval($mrown['value'])),3))); ?></td>
						</tr>
					<?php }	?>
				</tbody> 
			</table>
		<?php } else { echo 'Belum ada Request Approval SPB hari ini!'; }?>
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
	  <h3 style="text-align: center;vertical-align: middle;">AM Sigit Hidayatullah</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
		<?php if (count ( $krs ) > 0) { ?>
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
				<?php $k = 0; ?>
					<?php foreach ( $krs as $krows ) { ?>
					<?php $k++; ?>
					<?php 
						switch ($krows['invstatus']) {
									case '1':
										$invstat = '<span class="label label-success">Cair</span>';
										break;
									case '2':
										$invstat = '<span class="label label-info">Segmen</span>';
										break;
									case '3':
										$invstat = '<span class="label label-warning">PJM</span>';
										break;
									case '4':
										$invstat = '<span class="label label-warning">ASD</span>';
										break;
									case '5':
										$invstat = '<span class="label label-primary">Logistik</span>';
										break;
									case '6':
										$invstat = '<span class="label bg-olive">Keuangan</span>';
										break;
									case '7':
										$invstat = '<span class="label label-primary">Legal</span>';
										break;
									case '8':
										$invstat = '<span class="label bg-olive">Posting</span>';
										break;
									case '9':
										$invstat = '<span class="label label-danger">Batal</span>';
										break;
									case '10':
										$invstat = '<span class="label label-default">Forecasts</span>';
										break;
									default:
										$invstat = '<span class="label label-info">Terkirim</span>';
						}
					?>
						<tr>
							<td><?php echo $k; ?></td>
							<td><span class="label label-danger">KOMET</span></td>
							<td><?php echo $krows['code']; ?></td>
							<td><?php echo $krows['invnum']; ?></td>
							<td><?php echo strrev(implode('.',str_split(strrev(strval($krows['value'])),3))); ?></td>
						</tr>
					<?php }	?>
				</tbody> 
			</table>
		<?php } else { echo 'Belum ada Request Approval SPB hari ini!'; }?>
        </div>
        <!-- /.col -->
      </div> 
      <!-- /.row -->
      <div class="row">
        <div class="material-datatables">
        <?php if (count ( $mrs ) > 0) { ?>
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
				<?php $l = 0; ?>
					<?php foreach ( $mrs as $mrows ) { ?>
					<?php $l++; ?>
					<?php 
						switch ($mrows['invstatus']) {
									case '1':
										$invstat = '<span class="label label-success">Cair</span>';
										break;
									case '2':
										$invstat = '<span class="label label-info">Segmen</span>';
										break;
									case '3':
										$invstat = '<span class="label label-warning">PJM</span>';
										break;
									case '4':
										$invstat = '<span class="label label-warning">ASD</span>';
										break;
									case '5':
										$invstat = '<span class="label label-primary">Logistik</span>';
										break;
									case '6':
										$invstat = '<span class="label bg-olive">Keuangan</span>';
										break;
									case '7':
										$invstat = '<span class="label label-primary">Legal</span>';
										break;
									case '8':
										$invstat = '<span class="label bg-olive">Posting</span>';
										break;
									case '9':
										$invstat = '<span class="label label-danger">Batal</span>';
										break;
									case '10':
										$invstat = '<span class="label label-default">Forecasts</span>';
										break;
									default:
										$invstat = '<span class="label label-info">Terkirim</span>';
						}
					?>
						<tr>
							<td><?php echo $l; ?></td>
							<td><span class="label label-primary">MESRA</span></td>
							<td><?php echo $mrows['code']; ?></td>
							<td><?php echo $mrows['invnum']; ?></td>
							<td><?php echo strrev(implode('.',str_split(strrev(strval($mrows['value'])),3))); ?></td>
						</tr>
					<?php }	?>
				</tbody> 
			</table>
		<?php } else { echo 'Belum ada Request Approval SPB hari ini!'; }?>
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
	  <h3 style="text-align: center;vertical-align: middle;">AM Vania Miranda Putri</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
        <?php if (count ( $krv ) > 0) { ?>
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
				<?php $m = 0; ?>
					<?php foreach ( $krv as $krowv ) { ?>
					<?php $m++; ?>
					<?php 
						switch ($krowv['invstatus']) {
									case '1':
										$invstat = '<span class="label label-success">Cair</span>';
										break;
									case '2':
										$invstat = '<span class="label label-info">Segmen</span>';
										break;
									case '3':
										$invstat = '<span class="label label-warning">PJM</span>';
										break;
									case '4':
										$invstat = '<span class="label label-warning">ASD</span>';
										break;
									case '5':
										$invstat = '<span class="label label-primary">Logistik</span>';
										break;
									case '6':
										$invstat = '<span class="label bg-olive">Keuangan</span>';
										break;
									case '7':
										$invstat = '<span class="label label-primary">Legal</span>';
										break;
									case '8':
										$invstat = '<span class="label bg-olive">Posting</span>';
										break;
									case '9':
										$invstat = '<span class="label label-danger">Batal</span>';
										break;
									case '10':
										$invstat = '<span class="label label-default">Forecasts</span>';
										break;
									default:
										$invstat = '<span class="label label-info">Terkirim</span>';
						}
					?>
						<tr>
							<td><?php echo $m; ?></td>
							<td><span class="label label-danger">KOMET</span></td>
							<td><?php echo $krowv['code']; ?></td>
							<td><?php echo $krowv['invnum']; ?></td>
							<td><?php echo strrev(implode('.',str_split(strrev(strval($krowv['value'])),3))); ?></td>
						</tr>
					<?php }	?>
				</tbody> 
			</table>
		<?php } else { echo 'Belum ada Request Approval SPB hari ini!'; }?>
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="material-datatables">
        <?php if (count ( $mrv ) > 0) { ?>
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
				<?php $n = 0; ?>
					<?php foreach ( $mrv as $mrowv ) { ?>
					<?php $n++; ?>
					<?php 
						switch ($mrowv['invstatus']) {
									case '1':
										$invstat = '<span class="label label-success">Cair</span>';
										break;
									case '2':
										$invstat = '<span class="label label-info">Segmen</span>';
										break;
									case '3':
										$invstat = '<span class="label label-warning">PJM</span>';
										break;
									case '4':
										$invstat = '<span class="label label-warning">ASD</span>';
										break;
									case '5':
										$invstat = '<span class="label label-primary">Logistik</span>';
										break;
									case '6':
										$invstat = '<span class="label bg-olive">Keuangan</span>';
										break;
									case '7':
										$invstat = '<span class="label label-primary">Legal</span>';
										break;
									case '8':
										$invstat = '<span class="label bg-olive">Posting</span>';
										break;
									case '9':
										$invstat = '<span class="label label-danger">Batal</span>';
										break;
									case '10':
										$invstat = '<span class="label label-default">Forecasts</span>';
										break;
									default:
										$invstat = '<span class="label label-info">Terkirim</span>';
						}
					?>
						<tr>
							<td><?php echo $n; ?></td>
							<td><span class="label label-primary">MESRA</span></td>
							<td><?php echo $mrowv['code']; ?></td>
							<td><?php echo $mrowv['invnum']; ?></td>
							<td><?php echo strrev(implode('.',str_split(strrev(strval($mrowv['value'])),3))); ?></td>
						</tr>
					<?php }	?>
				</tbody> 
			</table>
		<?php } else { echo 'Belum ada Request Approval SPB hari ini!'; }?>
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <hr/>
	  <h3 style="text-align: center;vertical-align: middle;">AM Eva Ayu Komala</h3> 
      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
        <?php if (count ( $kre ) > 0) { ?>
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
				<?php $o = 0; ?>
					<?php foreach ( $kre as $krowe ) { ?>
					<?php $o++; ?>
					<?php 
						switch ($krowe['invstatus']) {
									case '1':
										$invstat = '<span class="label label-success">Cair</span>';
										break;
									case '2':
										$invstat = '<span class="label label-info">Segmen</span>';
										break;
									case '3':
										$invstat = '<span class="label label-warning">PJM</span>';
										break;
									case '4':
										$invstat = '<span class="label label-warning">ASD</span>';
										break;
									case '5':
										$invstat = '<span class="label label-primary">Logistik</span>';
										break;
									case '6':
										$invstat = '<span class="label bg-olive">Keuangan</span>';
										break;
									case '7':
										$invstat = '<span class="label label-primary">Legal</span>';
										break;
									case '8':
										$invstat = '<span class="label bg-olive">Posting</span>';
										break;
									case '9':
										$invstat = '<span class="label label-danger">Batal</span>';
										break;
									case '10':
										$invstat = '<span class="label label-default">Forecasts</span>';
										break;
									default:
										$invstat = '<span class="label label-info">Terkirim</span>';
						}
					?>
						<tr>
							<td><?php echo $o; ?></td>
							<td><span class="label label-danger">KOMET</span></td>
							<td><?php echo $krowe['code']; ?></td>
							<td><?php echo $krowe['invnum']; ?></td>
							<td><?php echo strrev(implode('.',str_split(strrev(strval($krowe['value'])),3))); ?></td>
						</tr>
					<?php }	?>
				</tbody> 
			</table>
		<?php } else { echo 'Belum ada Request Approval SPB hari ini!'; }?>
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="material-datatables">
        <?php if (count ( $mre ) > 0) { ?>
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
				<?php $p = 0; ?>
					<?php foreach ( $mre as $mrowe ) { ?>
					<?php $p++; ?>
					<?php 
						switch ($mrowe['invstatus']) {
									case '1':
										$invstat = '<span class="label label-success">Cair</span>';
										break;
									case '2':
										$invstat = '<span class="label label-info">Segmen</span>';
										break;
									case '3':
										$invstat = '<span class="label label-warning">PJM</span>';
										break;
									case '4':
										$invstat = '<span class="label label-warning">ASD</span>';
										break;
									case '5':
										$invstat = '<span class="label label-primary">Logistik</span>';
										break;
									case '6':
										$invstat = '<span class="label bg-olive">Keuangan</span>';
										break;
									case '7':
										$invstat = '<span class="label label-primary">Legal</span>';
										break;
									case '8':
										$invstat = '<span class="label bg-olive">Posting</span>';
										break;
									case '9':
										$invstat = '<span class="label label-danger">Batal</span>';
										break;
									case '10':
										$invstat = '<span class="label label-default">Forecasts</span>';
										break;
									default:
										$invstat = '<span class="label label-info">Terkirim</span>';
						}
					?>
						<tr>
							<td><?php echo $p; ?></td>
							<td><span class="label label-primary">MESRA</span></td>
							<td><?php echo $mrowe['code']; ?></td>
							<td><?php echo $mrowe['invnum']; ?></td>
							<td><?php echo strrev(implode('.',str_split(strrev(strval($mrowe['value'])),3))); ?></td>
						</tr>
					<?php }	?>
				</tbody> 
			</table>
		<?php } else { echo 'Belum ada Request Approval SPB hari ini!'; }?>
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
