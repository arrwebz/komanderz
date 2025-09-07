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
        <li><a href="#">Collection</a></li>
        <li class="active">Update Posisi Invoice KOMET</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Silahkan update tanggal posting invoice.</h3>
            </div>
            <div class="box-body">
			<?php echo form_open('kbillco/updateposting');?>
			<?php echo form_hidden('hdnOrderid',$idinvoice); ?>
			<?php echo form_hidden('hdnBillcoid',$idbillco); ?>
			  <div class="form-group">
                <label>Penerima:</label>
				<input name="txtRec" type="text" class="form-control" value="<?php echo $penerima; ?>">
              </div>
			  <div class="form-group">
                <label>Tanggal Posting:</label>
				<input name="txtPosdate" type="text" class="form-control datepicker" value="<?php echo $tglposting; ?>">
              </div>
			  <div class="form-group">
                <label>Keterangan:</label>
				<input name="txtNotes" id="idr" type="text" class="form-control" value="<?php echo $catatan; ?>">
              </div>
			  <div class="form-group">
				<button type="submit" name="cmdsave" class="btn btn-success">Simpan</button>
              </div>
			<?php echo form_close();?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-xs-12">
          <a href="<?php echo base_url().$this->router->fetch_class();?>/details/<?php echo $idinvoice; ?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
        </div>
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