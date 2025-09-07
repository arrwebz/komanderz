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
        <li class="active">Proses SPB</li>
      </ol>
    </section>
	<div class="pad margin no-print">
      <div class="callout callout-success" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Catatan:</h4>
        Berikut adalah data Pengajuan Cuti atas nama <strong><?php echo $useroffwork; ?></strong>. Klik tombol kembali di bagian bawah untuk Kembali ke daftar Pengajuan Cuti atau klik tombol Selesai untuk menyetujui.
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<?php echo form_open_multipart('offwork/approval');?>
		<?php echo form_hidden('hdnOffworkid',$offworkid); ?>
		<?php echo form_hidden('hdnStaffid',$staffid); ?>
		<?php echo form_hidden('hdnSaldocuti',$saldocuti); ?>
		<?php echo form_hidden('hdnTdat',$totalcuti); ?>
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>Nama :</label>
				<input name="txtName" type="text" class="form-control" value="<?php echo $useroffwork; ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Tanggal Awal :</label>
				<input name="txtSdat" type="text" class="form-control" value="<?php echo date('d-m-Y',strtotime($awalcuti)); ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Tanggal Akhir :</label>
				<input name="txtEdat" type="text" class="form-control" value="<?php echo date('d-m-Y',strtotime($akhircuti)); ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Jumlah hari :</label>
				<input name="txtTdat" type="text" class="form-control" value="<?php echo $totalcuti; ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Jenis cuti :</label>
				<input name="txtJeniscuti" type="text" class="form-control" value="<?php echo $jeniscuti; ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Alasan :</label>
				<input name="txtAlasancuti" type="text" class="form-control" value="<?php echo $alasancuti; ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Persetujuan</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label style="color:red;">Saldo Cuti :</label>
				<input name="txtSaldocuti" type="text" class="form-control" value="<?php echo $saldocuti; ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Konfirmasi Persetujuan Cuti:</label>
					<select name="optApprove" class="form-control selectpicker">
						<option disabled>Pilih</option>
						<option value="1" <?php if($statuscuti == '1') echo 'selected' ?> >Disetujui</option>
						<option value="0" <?php if($statuscuti == '0') echo 'selected' ?>>Ditolak</option> 
					</select>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-xs-12">
          <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
          <button type="submit" name="cmdsave" class="btn btn-success pull-right">Selesai</button> 
        </div>
		<?php echo form_close();?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
					 
	$(document).ready(function() {
						
		$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
						
		$('.selectpicker').select2();		
		
	});
	</script>