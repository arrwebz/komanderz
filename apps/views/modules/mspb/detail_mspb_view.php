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
        <li><a href="#">SPB</a></li>
        <li class="active">Detail SPB</li>
      </ol>
    </section>
	<?php if ($status == '1') { ?>
	<div class="pad margin no-print">
      <div class="callout callout-success" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Catatan:</h4>
        SPB ini <strong>telah</strong> dibayarkan ke bank oleh Staff Finance. Klik tombol cetak di bagian bawah untuk mencetak SPB dan Voucher.
      </div>
    </div>
	<?php } else { ?>
	<div class="pad margin no-print">
      <div class="callout callout-warning" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Catatan:</h4>
        SPB ini <strong>belum</strong> dibayarkan ke bank oleh Staff Finance. Klik tombol cetak di bagian bawah untuk mencetak SPB dan Voucher.
      </div>
    </div>
	<?php } ?>
    <!-- Main content -->
    <section class="content">
	<!-- SELECT2 EXAMPLE -->
      <div class="box box-primary box-solid collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text-o"></i> Invoice Terkait</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nomor Invoice</label>
				<input type="text" class="form-control" value="<?php echo $inv ?>" disabled>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Segmen</label>
				<input type="text" class="form-control" value="<?php echo $segmen ?>" disabled>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Total SPB</label>
				<input type="text" class="form-control" value="<?php echo $totspb ?> Panjar" disabled>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Nilai <?php if ($orderinv == '1') echo 'Dasar'; else echo 'Justifikasi' ?></label>
				<input type="text" class="form-control" value="Rp. <?php if ($orderinv == '1') echo $nilaidasar; else echo $nilaijst; ?>" disabled>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Nilai <?php if ($orderinv == '1') echo 'Net'; else echo 'Nego' ?></label>
				<input type="text" class="form-control" value="Rp. <?php if ($orderinv == '1') echo $nilainet; else echo $nilainego; ?>" disabled>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Total Nilai SPB</label>
				<input type="text" class="form-control" value="Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totspbcair[0]['totalvalue'])),3))); ?>" disabled>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
			<a target="blank_" href="<?php 
			if ($orderinv == '1') { 
				$path = 'mnopes'; } else { $path = 'mprpo'; }
			echo base_url().$path. '/details/'.$orderid; ?>" class="btn btn-success">
			<strong> Lihat Detail Invoice
			</strong></a>
        </div>
      </div>
      <!-- /.box -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>SPB</strong></h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>Nomor Invoice:</label>
				<input name="txtInvoice" type="text" class="form-control" value="<?php if ($orderinv == '1') echo $inv; else echo 'PRPO' ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nomor SPB:</label>
				<input type="text" class="form-control" value="<?php echo $kodenomor ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Jenis Pekerjaan:</label>
				<input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $divisi ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Kepada:</label>
				<input type="text" class="form-control" value="<?php echo $kepada ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Untuk Pembayaran:</label>
				<textarea name="txtInfo" type="text" class="form-control" style="width:445px; height:183px;" disabled><?php echo $ket ?></textarea>
              </div>			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Pembayaran</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>Tanggal SPB:</label>
				<input type="text" class="form-control" value="<?php echo $tglspb ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nilai SPB:</label>
				<input type="text" class="form-control" value="Rp. <?php echo $nilai ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Jenis Pembayaran:</label>
				<input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $jenisbayar ?>" disabled>
              </div>
			  <div class="form-group">
                <label>No Rekening:</label>
				<input type="text" class="form-control" value="<?php echo $norek ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Atas Nama:</label>
				<input type="text" class="form-control" value="<?php echo $anrek ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Bank:</label>
				<input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $bank ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Bank Lainnya:</label>
				<input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $banklain ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Tanggal Proses:</label>
				<input type="text" class="form-control" value="<?php echo $tglproses ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Bukti Transaksi:</label>
				<a data-toggle="modal" href="#myModal">Lihat</a>
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
          <?php $nav = array('1','2','3','4','6'); ?>
			<?php if(in_array($group, $nav)) { ?>
          <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
          <button type="button" class="btn bg-maroon pull-right" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/voucher/<?php echo $id; ?>';return true;">
			<i class="fa fa-sticky-note-o"></i> Voucher
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/preview/<?php echo $id; ?>';return true;">
            <i class="fa fa-print"></i> Cetak
          </button>
		<?php } ?>  
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Bukti Transaksi</h4>
		  </div>
		  <div class="modal-body">
			<img src="<?php echo $this->config->item('uploads_uri').$this->router->fetch_class().'/'.$img?>" style="width:100%;max-width:300px"/>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>