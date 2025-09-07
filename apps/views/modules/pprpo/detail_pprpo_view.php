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
        <li><a href="#">Billing</a></li>
        <li class="active">Detail PRPO</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Kode:</label>
				<input type="text" class="form-control" value="<?php echo $kodenomor ?>" disabled>
              </div>
              <div class="form-group">
                <label>Unit:</label>
				<input type="text" class="form-control" value="<?php echo $unit ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Jenis Pekerjaan:</label>
				<input type="text" class="form-control" value="<?php echo $jp ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Divisi:</label>
				<input type="text" class="form-control" value="<?php echo $divisi ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Segmen:</label>
				<input type="text" class="form-control" value="<?php echo $segmen ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Nominal</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Nilai Justifikasi:</label>
				<input type="text" class="form-control" value="<?php echo $nilaijst ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nilai Negosiasi:</label>
				<input type="text" class="form-control" value="<?php echo $nilainego ?>" disabled>
              </div>
			  <div class="form-group">
                <label>AM User:</label>
				<input type="text" class="form-control" value="<?php echo $amuser ?>" disabled>
              </div>
			  <div class="form-group">
                <label>AM Internal:</label>
				<input type="text" class="form-control" value="<?php echo $amkomet ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nama Projek:</label>
				<input type="text" class="form-control" value="<?php echo $namaproyek ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Posisi</h3>
            </div>
            <div class="box-body">
			<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#Modalstatus">+ Tambah</button>
              <div class="material-datatables">
			  <?php if (count ( $posinvoice ) > 0) { ?>
                        <table id="datatablepos" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Tanggal</th>
                                <th>Status</th> 
                                <th>Keterangan</th> 
                            </tr>
                            </thead>
                            <tbody>
							<?php $i = 0; ?>
                            <?php foreach ( $posinvoice as $pos ) { ?>
                                <?php $i++; ?>
                            <tr> 
                                <td><?php echo $i; ?></td>
                                <td><?php echo $pos['recipient']; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($pos['collectdate'])); ?></td>
								<td>
								<?php if($pos['status'] == '5' || $pos['status'] == '7') { ?>
                                <span class="label label-warning"><?php echo $pos['position']; ?></span>
								<?php } elseif($pos['status'] == '1') { ?>
								<span class="label label-success"><?php echo $pos['position']; ?></span>
								<?php } ?> 
								</td> 
								
                                <td><?php echo $pos['notes']; ?></td> 
                            </tr>
                            <?php }	?>
                            </tbody>
                        </table>
						<?php } else { echo 'Posisi kontrak belum ada!'; }?>
                </div>    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Invoice Terkait</h3>
            </div>
            <div class="box-body">
				<?php echo form_open('pprpo/addtermininv');?>
					<?php echo form_hidden('hdnOrderid',$id); ?>
                    <?php echo form_hidden('hdnSegmen',$segmen); ?>
					<?php echo form_hidden('hdnDivision',$divisi); ?>
					<button type="submit" name="btnSubmit" class="btn btn-xs btn-success">
					+ Tambah</button>
				<?php echo form_close();?>
            </div>
			<div class="material-datatables">
			  <?php if ($rowcount != 1) { ?>
                        <table id="datatabletermin" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Order</th>
                                <th>Segmen</th> 
                                <th>Invoice</th>
                                <th>Faktur</th>
                                <th>Nilai Dasar</th>
                                <th>Tanggal Invoice</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php $i = 0; ?>
                            <?php for ($row = 0; $row < $rowcount; $row++) { ?>
                            <?php $i++; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td style="text-transform: uppercase;"><a target='_blank' href="<?php echo base_url().'knopes/details/'.$rowtable[$row][0]['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $rowtable[$row][0]['code']; ?></strong></a></td>
								<td><?php echo $rowtable[$row][0]['segment']; ?></td>
								<td style="text-transform: uppercase;"><?php if($rowtable[$row][0]['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$rowtable[$row][0]['invnum'].'</p>';  ?></td>
								<td><?php echo $rowtable[$row][0]['faknum'] ?></td>
								<td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['basevalue'])),3))); ?></strong></td> 
								<td><?php echo date('d-m-Y', strtotime($rowtable[$row][0]['invdate']));?></td>
                            </tr>
                            <?php }	?>
                            </tbody>
                        </table>
						<?php } else { echo 'Tidak ada termin invoice!'; }?>
                </div>  
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">SPB</h3>
            </div>
            <div class="box-body">
              <div class="material-datatables">
				
				<?php if (count ( $spbbyinvoice ) > 0) { ?>
                        <table id="datatablespb" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>SPB</th>
                                <th>Nilai</th>
                                <th>Tanggal</th> 
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>SPB</th>
                                <th>Nilai</th>
                                <th>Tanggal</th> 
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $spbbyinvoice as $inv ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td> <td><?php if ($inv['code'] == "") {
										echo "<i style='color:red;'>Data belum diupdate.</i>";
									} else {
										echo "<a target='_blank' href=' ".base_url()."kspb/details/".$inv['spbid']."' style='color: #00bcd4;'><strong>".$inv['code']."</strong></a>"; } ?>
									</td>
                                    <td><?php if ($inv['value'] == "") {
										echo "<i style='color:red;'>Data belum diupdate.</i>";
									} else {
										echo strrev(implode('.',str_split(strrev(strval($inv['value'])),3))); } ?>
									</td>
									<td><?php if ($inv['spbdat'] == "0000-00-00") {
										echo "<i style='color:red;'>Data belum diupdate.</i>";
									} else {
										echo date("d F Y", strtotime($inv['spbdat'])); } ?>
									</td> 
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } else { echo 'Belum ada SPB untuk invoice ini!'; }?>
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
		  <button type="button" class="btn btn-warning pull-right" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/createinvoice/<?php echo $id; ?>';return true;">
			<i class="fa fa-file-text-o"></i> Buat Invoice
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/preview/<?php echo $id; ?>';return true;">
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
		$('#datatablspos').DataTable({
            'responsive'  : true,
			'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true 

        });	
		
		$('#datatablespb').DataTable({
            'responsive'  : true,
			'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true

        });
		
		$('#datatabletermin').DataTable({
            'responsive'  : true,
			'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true

        });	
		
		$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
						
		$('.selectpicker').select2();
		 
		$("#btnUpdate").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kbillco/ajax_updatestatus'); ?>",
				data: $('#formstatus').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Posisi invoice berhasil diperbarui!", icon: 
					"success", buttons: false, timer: 1500,}).then(function(){
					   location.reload();
					   }
					);
				}
			}); 
		});
	});
</script>

<!-- Modal -->
<div id="Modalstatus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Perbarui Posisi Dokumen Invoice</h4>
      </div>
      <div class="modal-body">
        <form id="formstatus" method="POST" action="javascript:">
				
			<input name="hdnOrderid" type="hidden" class="form-control" value="<?php echo $id ?>">
			  <div class="form-group">
                <label>Posisi Invoice:</label>
				 <select name="optPosition" class="form-control selectpicker" style="width:250px;">
						 <option disabled selected>Pilih</option>
						 <option value="closed">Closed by Invoice</option>
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
			</form>
      </div>
      <div class="modal-footer">
		<button id="btnUpdate" type="submit" name="cmdsave" class="btn btn-success pull-left">Simpan</button>
		</form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>	