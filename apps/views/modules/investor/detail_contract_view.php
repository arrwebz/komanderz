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
        <li class="active">Detail Kontrak</li>
      </ol>
    </section>
	<div class="pad margin no-print">
      <div class="callout callout-warning" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Catatan:</h4>
        Berikut adalah detail <strong>kontrak</strong> investor. Klik tombol cetak di bagian bawah untuk mencetak Kontrak.
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Nomor</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Kode Kontrak:</label>
				<input type="text" class="form-control" value="<?php echo $kodekontrak ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nomor Kontrak:</label>
				<input type="text" class="form-control" value="<?php echo $kontrak ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nama Investor:</label>
				<input type="text" class="form-control" value="<?php echo $invname ?>" disabled>
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
                <label>Jumlah Uang:</label>
				<input type="text" class="form-control" value="<?php echo $totalinvest ?>" disabled>
              </div> 
              <div class="form-group">
                <label>Tanggal Awal:</label>
				<input type="text" class="form-control" value="<?php echo date('d F Y', strtotime($startdate)); ?>" disabled>
              </div> 
			  <div class="form-group">
                <label>Tanggal Akhir:</label>
				<input type="text" class="form-control" value="<?php echo date('d F Y', strtotime($endate)); ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Jangka Waktu:</label>
				<input type="text" class="form-control" value="<?php echo $periode ?> Bulan" disabled>
              </div>
			  <div class="form-group">
                <label>Bunga:</label>
				<input type="text" class="form-control" value="<?php echo $interest ?>%" disabled>
              </div>
              <div class="form-group">
                <label>Fee Invest:</label>
				<input type="text" class="form-control" value="<?php echo $feeinvest ?>" disabled>
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
              <h3 class="box-title">Rekening</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Bank:</label>
				<input type="text" class="form-control" value="<?php echo $dbank ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nomor Rekening:</label>
				<input type="text" class="form-control" value="<?php echo $drek ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Atas Nama:</label>
				<input type="text" class="form-control" value="<?php echo $dname ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Keterangan:</label>
				<textarea class="form-control" disabled><?php echo $dnote; ?></textarea>
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
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/print/<?php echo $danaid; ?>';return true;">
            <i class="fa fa-print"></i> Cetak
          </button>
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