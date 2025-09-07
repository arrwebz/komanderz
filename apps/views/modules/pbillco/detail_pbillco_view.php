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
        <li class="active">Detail Invoice KOMET</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Tanda Terima</h3>
            </div>
            <div class="box-body">
			<form id="formvoucher" method="POST" action="javascript:">
				<input name="hdnOrderid" type="hidden" class="form-control" value="<?php echo $id ?>">
				<input name="hdnBaseval" type="hidden" class="form-control" value="<?php echo $nilaidasar ?>">
			  <div class="form-group">
                <label>Telah diterima dari:</label>
				<input name="txtRec" type="text" class="form-control" value="<?php echo $receive ?>" <?php //if ($statusinvoice != '6') echo 'disabled' ?>>
              </div>
			  <div class="form-group">
                <label>Nomor Voucher:</label>
				<input name="txtNovoc" type="text" class="form-control" value="<?php echo $nomorvoucher ?>" <?php //if ($statusinvoice != '6') echo 'disabled' ?>>
              </div>
			  <div class="form-group">
                <label>Nilai Pencairan:</label>
				<input name="txtNilai" id="idr" type="text" class="form-control" value="<?php echo $nilaivoucher ?>" <?php //if ($statusinvoice != '6') echo 'disabled' ?>>
              </div>
			  <div class="form-group">
                <label>Tanggal Proses:</label>
				<input name="txtDateproc" type="text" class="form-control datepicker" value="<?php echo $tglcair ?>" <?php //if ($statusinvoice != '6') echo 'disabled' ?>>
              </div>
			  <div class="form-group">
                <label>Status Pembayaran:</label>
					<select name="optStatus" class="form-control selectpicker" <?php //if ($statusinvoice != '6') echo 'disabled' ?>>
						<!--<option selected disabled>Pilih</option>-->
						<option value="1" <?php if($statusinvoice == '1') echo 'selected' ?>>Selesai</option>
						<option value="9" <?php if($statusinvoice == '9') echo 'selected' ?>>Batal</option>
					</select>
              </div>
			  <div class="form-group" <?php //if ($statusinvoice != '6') echo 'style="display: none;"' ?>>
				<button id="btnSubmit" type="submit" name="cmdsave" class="btn btn-success">Simpan</button>
              </div>
			</form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header with-border">
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
                <label style="color:red;">Nomor Spk:</label>
				<input type="text" class="form-control" value="<?php echo $nomorspk ?>" disabled>
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
				<textarea type="text" class="form-control" style="width:378px; height:69px;" disabled><?php echo $namaproyek ?></textarea>
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
		<div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Posisi Dokumen</h3>
            </div>
            <div class="box-body">
			
              <ul class="timeline">
				<?php foreach ( $positioninvoice as $pos ) { ?>
				<!-- timeline time label -->
					<li class="time-label">
						<span class="bg-gray">
							<?php echo $pos['trackdate']; ?>
						</span>
					</li>
					<!-- /.timeline-label -->
					
					<!-- timeline item -->
					<li>
						<!-- timeline icon -->
						<i class="fa fa-pencil bg-blue"></i>
						<div class="timeline-item">
							<span class="time"><i class="fa fa-clock-o"></i> <?php echo $pos['crdat']; ?></span>
							<h3 class="timeline-header no-border"><a href="#"><?php echo $pos['position']; ?></a> <?php echo $pos['tracknote']; ?></h3>
						</div>
					</li>
					<!-- END timeline item -->
				<?php }	?>
				<li>
				  <i class="fa fa-clock-o bg-gray"></i>
				</li>
			</ul>
					  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
	</div>	
      <div class="row">
		<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">SPB</h3>
            </div>
            <div class="box-body">
              <div class="material-datatables">
				
				<?php if (count ( $spbbyinvoice ) > 0) { ?>
                        <table id="spbtables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>SPB</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>SPB</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $spbbyinvoice as $spb ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
									<td><?php if ($spb['code'] == "") {
										echo "<i style='color:red;'>Data belum diupdate.</i>";
									} else {
										echo "<a target='_blank' href=' ".base_url()."kspb/details/".$spb['spbid']."' style='color: #00bcd4;'><strong>".$spb['code']."</strong></a>"; } ?>
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
		<div class="col-md-8">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Status Penagihan</h3>
            </div>
            <div class="box-body">
			<?php $nav = array('1','2','3','4','6'); ?>
			<?php if(in_array($group, $nav)) { ?>
				<?php $navrole = array('1','2','3','4','5','6'); ?>
				<?php if(in_array($role, $navrole)) { ?>
			<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#Modalstatus">+ Tambah Status</button>
				<?php } ?>
			<?php } ?>
              <div class="material-datatables">
			  <?php if (count ( $collectinvoice ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Tanggal</th>
                                <th>Status</th> 
                                <th>Keterangan</th> 
                                <th></th> 
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Tanggal</th>
                                <th>Status</th> 
                                <th>Keterangan</th> 
                                <th></th> 
                            </tr>
                            </tfoot>
                            <tbody>
							<?php $i = 0; ?>
                            <?php foreach ( $collectinvoice as $col ) { ?>
                                <?php $i++; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $col['recipient']; ?></td>
                                <td><?php echo $col['collectdate']; ?></td>
								<td>
								<?php if($col['status'] == '2') { ?>
                                <span class="label label-primary"><?php echo $col['position']; ?></span>
								<?php } elseif($col['status'] == '3' || $col['status'] == '4' || $col['status'] == '5') { ?>
								<span class="label label-warning"><?php echo $col['position']; ?></span>
								<?php } elseif($col['status'] == '6' || $col['status'] == '7' || $col['status'] == '8') { ?>
								<span class="label label-success"><?php echo $col['position']; ?></span>
								<?php } elseif($col['status'] == '10') { ?>
								<span class="label label-default"><?php echo $col['position']; ?></span>
								<?php }	?>
								</td> 
								
                                <td><?php echo $col['notes']; ?></td> 
								<td class="text-right">
								<?php if($col['status'] == '8') { ?> 
									<a href="<?php echo base_url().$this->router->fetch_class(). '/updateposting/'.$col['billcoid']; ?>" class="btn btn-xs btn-default">
									<i class="fa fa-edit"> Update Tanggal Posting</i></a>
								<?php }	?>	
								</td>
                            </tr>
                            <?php }	?>
                            </tbody>
                        </table>
						<?php } else { echo 'Status invoice belum ada!'; }?>
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
          <button type="button" class="btn btn-success pull-right" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/voucher/<?php echo $id; ?>';return true;">
			<i class="fa fa-sticky-note-o"></i> Voucher
          </button>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- Modal -->
<div id="Modalstatus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Perbarui Status Penagihan</h4>
      </div>
      <div class="modal-body">
        <form id="formstatus" method="POST" action="javascript:">
				
			<input name="hdnOrderid" type="hidden" class="form-control" value="<?php echo $id ?>">
			  <div class="form-group">
                <label>Posisi Invoice:</label>
				 <select name="optPosition" class="form-control selectpicker" style="width:250px;">
						 <option disabled selected>Pilih</option>
						 <option value="posting">Posting Keuangan</option>
						 <option value="forecasting">Forecasting Pencairan</option>
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

<script type="text/javascript">
					 
	$(document).ready(function() {
		$('#spbtables').DataTable({
					'paging'      : false,
					'lengthChange': false,
					'searching'   : false,
					'ordering'    : false,
					'info'        : true,
					'autoWidth'   : true,
					'responsive'  : true
				});
		
		$('#datatables').DataTable({
					'paging'      : false,
					'lengthChange': false,
					'searching'   : false,
					'ordering'    : false,
					'info'        : true,
					'autoWidth'   : true,
					'responsive'  : true
				});
				
		$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
						
		$('.selectpicker').select2();
		
		$("#btnSubmit").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kbillco/ajax_voucher'); ?>",
				data: $('#formvoucher').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Voucher pencairan berhasil dibuat!", icon: 
					"success", buttons: false, timer: 1500,}).then(function(){
					   location.reload();
					   }
					);	
				}
			}); 
		});
		
		$("#btnUpdate").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kbillco/ajax_updatestatus'); ?>",
				data: $('#formstatus').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Status invoice berhasil diperbarui!", icon: 
					"success", buttons: false, timer: 1500,}).then(function(){
					   location.reload();
					   }
					);
				}
			}); 
		});
	});
	</script>
	
