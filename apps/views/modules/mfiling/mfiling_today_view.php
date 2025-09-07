<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small><?php echo $brand; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Approval SPB</a></li>
        <li class="active">Mesra</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		  <div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-warning"></i> Penting!</h4>
			Di bawah ini merupakan daftar SPB untuk diajukan kepada Pengurus.
		  </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Request Approval SPB Komet untuk tanggal <?php echo $tglapp; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<div class="material-datatables">
                        <?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>Nama AM</th>
								<th>SPB</th>
                                <th>Jumlah</th>
                                <th>Transaksi</th>
                                <th>Customer</th>
                                <th>User</th> 
                                <th>INV</th>
								<th>Sekretaris</th>
								<th>Bendahara</th>
								<th>Ketua</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nama AM</th>
								<th>SPB</th>
                                <th>Jumlah</th>
                                <th>Transaksi</th>
                                <th>Customer</th>
                                <th>User</th> 
                                <th>INV</th>
								<th>Sekretaris</th>
								<th>Bendahara</th>
								<th>Ketua</th>
                            </tr>
                            </tfoot> 
                            <tbody>
                            <?php foreach ( $drd as $row ) { ?>
							<?php 
									switch ($row['invstatus']) {
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
											$invstat = '<span class="label bg-maroon">Legal</span>';
											break;
										case '8':
											$invstat = '<span class="label bg-olive">Posting</span>';
											break;
										case '9':
											$invstat = '<span class="label label-danger">Batal</span>';
											break;
										case '10':
											$invstat = '<span class="label label-info">Forecasts</span>';
											break;
										case '11':
											$invstat = '<span class="label label-default">Materai</span>';
											break;
										case '12':
											$invstat = '<span class="label label-default">Tanda Tangan</span>';
											break;
										case '13':
											$invstat = '<span class="label label-info">Segmen</span>';
											break;
										case '14':
											$invstat = '<span class="label label-warning">PJM</span>';
											break;
										case '15':
											$invstat = '<span class="label label-warning">ASD</span>';
											break;
										case '16':
											$invstat = '<span class="label label-primary">Logistik</span>';
											break;
										case '17':
											$invstat = '<span class="label bg-maroon">Legal</span>';
											break;
										case '18':
											$invstat = '<span class="label bg-olive">Keuangan</span>'; 
											break;
										default:
											$invstat = '<span class="label label-default">Printed</span>';
									} ?>
                                <tr>
                                    <td style="color: #3c8dbc;"><strong><?php echo $row['amname'] ?></strong></td>
									<td><?php echo $row['code'] ?></td>
                                    <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></strong></td> 
									<td><?php echo $row['info'] ?></td>
									<td><?php echo $row['segment'] ?></td>
									<td><strong style="color: #636e72;"><?php echo $row['customer'].'</strong><br/><i class="icon fa fa-credit-card"> </i> '.$row['accname'] ?></td>
									<?php if ($row['invnum'] == 0 ) { ?> 
									<td>PRPO</td> 
									<?php } else { ?>
									<td><?php echo $row['invnum'].'<br/>'.$invstat ?></td>
									<?php } ?>
									<?php if ($row['staprvsek'] == 0 ){ ?>
										<td><small class="badge bg-red">X</small></td>
									<?php } else { ?>
										<td><small class="badge bg-green"><i class="fa fa-check"></i></small></td>
									<?php } ?>
									<?php if ($row['staprvben'] == 0 ){ ?>
										<td><small class="badge bg-red">X</small></td>
									<?php } else { ?>
										<td><small class="badge bg-green"><i class="fa fa-check"></i></small></td>
									<?php } ?>
									<?php if ($row['staprvket'] == 0 ){ ?>
										<td><small class="badge bg-red">X</small></td>
									<?php } else { ?>
										<td><small class="badge bg-green"><i class="fa fa-check"></i></small></td>
									<?php } ?> 
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table> 
                    <?php } else { echo 'Belum ada SPB hari ini!'; }?>
                </div>
            </div>
            <!-- /.box-body -->
			<div class="box-footer">
			</div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-xs-12">
		Dibuat oleh: <?php echo $buat; ?>, <?php echo $tglbuat; ?><br><br>
		<?php if($edit != 0){ ?>
		Diubah oleh: <?php echo $edit; ?>, <?php echo $tgledit; ?><br><br>
		<?php } ?>
          <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
		</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function() {
       $('#datatables').DataTable({
			'paging'      : false,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : false,
			'info'        : true,
			'autoWidth'   : true,
			'responsive'  : true
		});
		
		$('.selectpicker').select2();
		
	
});
	
</script>