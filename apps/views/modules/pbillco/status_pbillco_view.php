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
        <li class="active">Status Invoice KOMET</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-4">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Perbarui Posisi Invoice</h3>
            </div>
            <div class="box-body">
			<form id="formstatus" method="POST" action="javascript:">
				
				<input name="hdnOrderid" type="hidden" class="form-control" value="<?php echo $id ?>">
			  <div class="form-group">
                <label>Posisi Invoice:</label>
				 <select name="optPosition" class="form-control selectpicker">
						 <option disabled selected>Pilih</option>
						 <option value="segmen">Segmen</option>
						 <option value="PJM">PJM</option>
						 <option value="ASD">ASD</option>
						 <option value="logistik">Logistik</option>
						 <option value="keuangan">Keuangan</option>
				  </select>
              </div>
			  <div class="form-group">
                <label>Penerima:</label>
				<input name="txtRecipient" type="text" class="form-control">
              </div>
			  <div class="form-group">
                <label>Tanggal:</label>
				<input name="txtColdate" type="text" class="form-control datepicker">
              </div>
			  <div class="form-group">
                <label>Keterangan:</label>
				<textarea name="txtNotes" class="form-control" rows="3"></textarea>
              </div>
			  <div class="form-group">
				<button id="btnSubmit" type="submit" name="cmdsave" class="btn btn-success">Simpan</button>
              </div>
			</form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-8">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Nomor Invoice:</label>
				<input type="text" class="form-control" value="<?php echo $inv ?>" disabled>
              </div>
              <div class="form-group">
                <label>Nomor Faktur Pajak:</label>
				<input type="text" class="form-control" value="<?php echo $fak ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Jenis Pekerjaan:</label>
				<input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $jp ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Segmen:</label>
				<input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $segmen ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Judul:</label>
				<textarea type="text" class="form-control" style="width:670px; height:50px;" disabled><?php echo $namaproyek ?></textarea>
              </div>
              <div class="form-group">
                <label>Nilai Dasar:</label>
				<input type="text" class="form-control" value="<?php echo $nilaidasar ?>" disabled>
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
						
		$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
						
		$('.selectpicker').select2();
		
		$("#btnSubmit").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kbillco/ajax_updatestatus'); ?>",
				data: $('#formstatus').serialize(),
				success: function(data) {
					/* play sound */
					alert("Data successfuly updated!");	
				}
			}); 
		});
	});
	</script>