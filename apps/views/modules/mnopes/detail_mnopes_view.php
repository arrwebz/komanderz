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
        <li class="active">Detail NOPES</li>
      </ol>
    </section>
	<div class="pad margin no-print">
      <div class="callout callout-success" style="margin-bottom: 0!important;background-color: #ffffff !important;color: #444444 !important;">
        <?php if($statusinv == '11') { ?> 
		<h4>Materai</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
			</div>
		<?php } elseif($statusinv == '12') { ?>
		<h4>Tanda Tangan</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
			</div>
		<?php } elseif($statusinv == '2' || $statusinv == '13') { ?>
        <h4>Segmen</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
			</div>
		<?php } elseif($statusinv == '3' || $statusinv == '14') { ?>
        <h4>PJM</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45%</div>
			</div>
		<?php } elseif($statusinv == '4' || $statusinv == '15') { ?>
        <h4>ASD</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
			</div>
		<?php } elseif($statusinv == '5' || $statusinv == '16') { ?>
        <h4>Logistik</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
			</div>
		<?php } elseif($statusinv == '6' || $statusinv == '18') { ?>
        <h4>Keuangan</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
			</div>
		<?php } elseif($statusinv == '9') { ?>
        <h4>Batal</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
			</div>		
		<?php } elseif($statusinv == '1') { ?>
        <h4>Cair</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
			</div>
			<?php echo $novoucher ?>
			<br/>
			<?php echo $vprodate ?>
		<?php } else { ?>
        <h4>Printed</h4>
			<div class="progress progress-striped active">
			  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%">5%</div>
			</div>
		<?php } ?>	
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nomor</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Kode:</label>
				<input type="text" class="form-control" value="<?php echo $kodenomor ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nomor Invoice:</label>
				<input type="text" class="form-control" value="<?php echo $inv ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nomor Faktur Pajak:</label>
				<input type="text" class="form-control" value="<?php echo $fak ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nomor Tel/SPK:</label>
				<input type="text" class="form-control" value="<?php echo $nomorspk ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Tanggal masuk SPK:</label>
				<input type="text" class="form-control" value="<?php echo $tglmskspk ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Tanggal SPK:</label>
				<input type="text" class="form-control" value="<?php echo $tglspk ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Tanggal Invoice:</label>
				<input type="text" class="form-control" value="<?php echo $tglinv ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Tanggal Kirim:</label>
				<input type="text" class="form-control" value="<?php echo $tglkrm ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
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
				<textarea class="form-control" disabled><?php echo $namaproyek; ?></textarea>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nominal</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Nilai Dasar:</label>
				<input type="text" class="form-control" value="<?php echo $nilaidasar ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nilai + PPN:</label>
				<input type="text" class="form-control" value="<?php echo $nilaippn ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nilai Net:</label>
				<input type="text" class="form-control" value="<?php echo $nilainet ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nilai Margin:</label>
				<input type="text" class="form-control" value="<?php echo $nilaimargin ?>" disabled>
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
              <h3 class="box-title">Posisi</h3>
              <?php if($statusinv == '1') { ?><small>CAIR</small> <?php } ?>
            </div>
            <div class="box-body"> 
			<a target="_blank" href="<?php echo base_url().'mtrack/details/'.$id;?>"><i class="fa fa-binoculars"></i> Detail dokumen invoice</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-12">
          <div class="box box-info">
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
                                <th>Status</th> 
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $spbbyinvoice as $inv ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td> <td><?php if ($inv['code'] == "") {
										echo "<i style='color:red;'>Data belum diupdate.</i>";
									} else {
										echo "<a target='_blank' href=' ".base_url()."mspb/details/".$inv['spbid']."' style='color: #00bcd4;'><strong>".$inv['code']."</strong></a>"; } ?>
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
									<td>
										<?php if($inv['status'] == '0') { ?>
											<span class="label label-default">Pengajuan</span>
										<?php } elseif($inv['status'] == '2') { ?>
											<span class="label label-warning">Diproses</span>
										<?php } elseif($inv['status'] == '1') { ?>
											<span class="label label-success">Cair</span>
										<?php } elseif($inv['status'] == '3') { ?>
											<span class="label label-info">Approved</span>
										<?php } ?>
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
          <button type="button" class="btn btn-success pull-right" onClick="window.location.href = '<?php echo base_url();?>/mbillco/details/<?php echo $id; ?>';return true;">
			<i class="fa fa-credit-card"></i> Pencairan
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
		
		$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
						
		$('.selectpicker').select2();
		
		$("#btnUpdate").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('mbillco/ajax_updatestatus'); ?>",
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