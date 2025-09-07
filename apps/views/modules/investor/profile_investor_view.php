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
        <li><a href="#">Investor</a></li>
        <li class="active">Profil Investor</li>
      </ol>
    </section>
	<div class="pad margin no-print">
      <div class="callout callout-warning" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Catatan:</h4>
        Berikut adalah data <strong>profil investor</strong>. Terlihat ada beberapa kontrak dari investor.
      </div> 
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Nama:</label>
				<input type="text" class="form-control" value="<?php echo $invname ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Lokasi Kerja:</label>
				<input type="text" class="form-control" value="<?php echo $location ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Kategori:</label>
				<input type="text" class="form-control" value="<?php echo $category ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Kelas Band:</label>
				<input type="text" class="form-control" value="<?php echo $band ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Administrasi</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>KTP:</label>
				<input type="text" class="form-control" value="<?php echo $ktp ?>" disabled>
              </div>
			  <div class="form-group">
                <label>NPWP:</label>
				<input type="text" class="form-control" value="<?php echo $npwp ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Alamat:</label>
				<input type="text" class="form-control" value="<?php echo $adrs ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
        <!-- /.col -->
		<div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Investasi</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Total Invest:</label>
				<input type="text" class="form-control" value="<?php echo $totalinvest ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Tanggal Bergabung:</label>
				<input type="text" class="form-control" value="<?php echo date('d F Y', strtotime($investdate)); ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Catatan:</label>
				<input type="text" class="form-control" value="<?php echo $notes ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col --> 
		<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kontrak</h3>
            </div>
            <div class="box-body">
              <div class="material-datatables">
				
				<?php if (count ( $drc ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kontrak</th>
                                <th>Nomor</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Jumlah Invest</th> 
                                <th>Status</th> 
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drc as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td> 
									<td><?php echo $row['code'];?></td>
									<td><?php echo $row['contract'];?></td>
                                    <td><?php echo date('d F Y', strtotime($row['startdate']));?></td>
                                    <td><?php echo date('d F Y', strtotime($row['endate']));?></td>
                                    <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['totalinvest'])),3))); ?></strong></td>
									<td class="text-right"> 
                                    <?php if($row['status'] == '1') { ?>
										<span class="label label-success">Aktif</span>
									<?php } else { ?>
										<span class="label label-danger">Ganti Kontrak</span>
									<?php } ?>
									</td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>    
            </div>
            <!-- /.box-body -->
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
		$('#datatabls').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true 

        });	
		
		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true});
						
		$('.selectpicker').select2();
	});
</script>