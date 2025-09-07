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
		  <div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-warning"></i> Penting!</h4>
			Di bawah ini merupakan daftar SPB untuk disetujui oleh Pengurus.
		  </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Approval SPB Komet tanggal <?php echo $tglapp; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
				<div class="material-datatables icheck-blue">
					<form id="formupdateam" method="POST" action="javascript:">
					<input name="hdnFilingid" type="hidden" class="form-control" value="<?php echo $filingid ?>">
					<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
								<th></th>
                                <th>SPB</th>
                                <th>Jumlah</th>
                                <th>Dept</th>
                                <th>Transaksi</th> 
                                <th>Customer</th>
                                <th>User</th> 
                                <th>INV</th>
                                <th>Kepada</th>
								<th>Sekretaris</th>
								<th>Bendahara</th>
								<th>Ketua</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
								<th></th>
                                <th>SPB</th>
								<th>Jumlah</th>
                                <th>Dept</th>
                                <th>Transaksi</th> 
                                <th>Customer</th>
                                <th>User</th>
                                <th>INV</th>
                                <th>Kepada</th>
								<th>Sekretaris</th>
								<th>Bendahara</th>
								<th>Ketua</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
							if ($rowcount != 0) {
							$i = 0;
							for ($row = 0; $row < $rowcount; $row++) {
								$stat = $rowtable[$row][0]['status'];	
								switch ($rowtable[$row][0]['invstatus']) {
											case '1':
												$invstat = '<span class="label label-success">Cair</span>';
												break;
											case '2':
												$invstat = '<span class="label label-info">Segmen</span>';
												break;
											case '3':
												$invstat = '<span class="label label-warning">PJM</span>';
												break;
											case '4':
												$invstat = '<span class="label label-warning">ASD</span>';
												break;
											case '5':
												$invstat = '<span class="label label-primary">Logistik</span>';
												break;
											case '6':
												$invstat = '<span class="label bg-olive">Keuangan</span>';
												break;
											case '7':
												$invstat = '<span class="label label-primary">Legal</span>';
												break;
											case '8':
												$invstat = '<span class="label bg-olive">Posting</span>';
												break;
											case '9':
												$invstat = '<span class="label label-danger">Batal</span>';
												break;
											case '10':
												$invstat = '<span class="label label-default">Forecasts</span>';
												break;
											default:
												$invstat = '<span class="label label-info">Terkirim</span>';
								}				
								$i++;	
								  echo '<tr>';
									echo '<td><input type="checkbox" name="filing[]" value="'.$rowtable[$row][0]['spbid'].'"></td>';
									echo '<td>'.$rowtable[$row][0]['spbid'].'</td>';
									echo '<td>'.strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['value'])),3))).'</td>';
									echo '<td>'.$rowtable[$row][0]['jobtype'].'</td>';
									echo '<td>'.$rowtable[$row][0]['info'].'</td>';
									echo '<td>'.$rowtable[$row][0]['segment'].'</td>';
									echo '<td>'.$rowtable[$row][0]['customer'].'</td>';
									if ($rowtable[$row][0]['invnum'] == 0 ){
										echo '<td>PRPO</td>';
									} else {	
									echo '<td>'.$rowtable[$row][0]['invnum'].'<br/>'.$invstat.'</td>';
									}
									echo '<td>'.$rowtable[$row][0]['accname'].'</td>';
									if ($rowtable[$row][0]['status'] == 0 ){
										echo '<td><small class="badge bg-red">X</small></td>';
									} else {
										echo '<td><small class="badge bg-green"><i class="fa fa-check"></i></small></td>';
									}
									echo '<td><small class="badge bg-red">X</small></td>';
									echo '<td><small class="badge bg-red">X</small></td>';
								  echo '</tr>';
								}
							}
							?>
                            </tbody> 
                        </table>
                </div>
            </div>
            <!-- /.box-body -->
			<div class="box-footer">
			  <div class="form-group">
                <label>Nama AM</label>
				<select name="optAmname" class="form-control selectpicker">
					<option disabled>Pilih</option>
					<option value="Isnanza Zulkarnaini" <?php if($amname == 'Isnanza Zulkarnaini') echo 'selected' ?>>Isnanza Zulkarnaini</option>
					<option value="Sigit Hidayatullah" <?php if($amname == 'Sigit Hidayatullah') echo 'selected' ?>>Sigit Hidayatullah</option>
					<option value="Vania Miranda Putri" <?php if($amname == 'Vania Miranda Putri') echo 'selected' ?>>Vania Miranda Putri</option>
					<option value="Eva Ayu Komala" <?php if($amname == 'Eva Ayu Komala') echo 'selected' ?>>Eva Ayu Komala</option>
				</select>
              </div>
			  <button id="btnConfirm" type="submit" class="btn btn-fill btn-success"><i class="fa fa-check-square-o"> Approve</i></button>
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
			'responsive'  : {
				'details' : {
					'display' : $.fn.dataTable.Responsive.display.childRowImmediate,
					'type'    : 'none',
					'target'  : ''
				}
			} 
		});
		
		$('.selectpicker').select2();
		
		$('.icheck-blue input[type="checkbox"]').iCheck({
		  checkboxClass: 'icheckbox_flat-blue',
		  radioClass: 'iradio_flat-blue'
		});
		
		//Enable check and uncheck all functionality
		$(".checkbox-toggle").click(function () {
		  var clicks = $(this).data('clicks');
		  if (clicks) {
			//Uncheck all checkboxes
			$(".icheck-blue input[type='checkbox']").iCheck("uncheck");
			$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
		  } else {
			//Check all checkboxes
			$(".icheck-blue input[type='checkbox']").iCheck("check");
			$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
		  }
		  $(this).data("clicks", !clicks);
		});
	
		$("#btnConfirm").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kfiling/ajaxapprove'); ?>",
				data: $('#formupdateam').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Approve SPB berhasil!", icon: 
					"success", buttons: false, timer: 1500,}).then(function(){
					   //location.reload();
					   }
					);
				}
			}); 
		});
	
});
	
</script>