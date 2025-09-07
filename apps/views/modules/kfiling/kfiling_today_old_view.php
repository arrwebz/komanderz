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
        <li class="active">Komet</li>
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
              <h3 class="box-title">Approval SPB Komet tanggal </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<div class="material-datatables">
                        <?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
								<th>Dept</th>
								<th>SPB</th>
                                <th>Transaksi</th>
                                <th>Customer</th>
                                <th>User</th> 
                                <th>INV</th>
                                <th>Kepada</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th></th>
								<th>Dept</th>
								<th>SPB</th>
                                <th>Transaksi</th>
                                <th>Customer</th>
                                <th>User</th>  
                                <th>INV</th>
                                <th>Kepada</th>
                                <th>Jumlah</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ( $drd as $row ) { ?>
                                <tr>
                                    <td></td>
									<td><?php echo $row['jobtype'] ?></td>
									<td><?php echo $row['code'] ?></td>
									<td><?php echo $row['info'] ?></td>
									<td><?php echo $row['segment'] ?></td>
									<td><?php echo $row['customer'] ?></td>
									<?php if ($row['invnum'] == 0 ) { ?>
									<td>PRPO</td>
									<?php } else { ?>
									<td><?php echo $row['invnum'] ?></td>
									<?php } ?>
									<td><?php echo $row['accname'] ?></td>
                                    <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></strong></td> 
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } else { echo 'Belum ada SPB hari ini!'; }?>
                </div>
            </div>
            <!-- /.box-body -->
			<div class="box-footer">
			<form id="formupdateam" method="POST" action="javascript:">
				<input name="hdnFilingid" type="hidden" class="form-control" value="">
			  <div class="form-group">
                <label>Nama AM</label>
				<select name="optAmname" class="form-control selectpicker">
					<option>Pilih</option>
					<option value="Isnanza Zulkarnaini" <?php if($amname == 'Isnanza Zulkarnaini') echo 'selected' ?>>Isnanza Zulkarnaini</option>
					<option value="Sigit Hidayatullah" <?php if($amname == 'Sigit Hidayatullah') echo 'selected' ?>>Sigit Hidayatullah</option>
					<option value="Vania Miranda Putri" <?php if($amname == 'Vania Miranda Putri') echo 'selected' ?>>Vania Miranda Putri</option>
					<option value="Eva Ayu Komala" <?php if($amname == 'Eva Ayu Komala') echo 'selected' ?>>Eva Ayu Komala</option>
				</select>
              </div>
			  <button id="btnConfirm" type="submit" class="btn btn-fill btn-success"><i class="fa fa-check-square-o"> Konfirmasi</i></button>
			</form>
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
	
		$("#btnConfirm").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kfiling/ajaxupdateam'); ?>",
				data: $('#formupdateam').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Update nama AM berhasil!", icon: 
					"success", buttons: false, timer: 1500,}).then(function(){
					   location.reload();
					   }
					);
				}
			}); 
		});
	
});
	
</script>