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
        <li><a href="#">Budgeting</a></li>
        <li class="active">SPB Mesra</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		  <div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-info"></i> Penting!</h4>
			Di bawah ini merupakan daftar SPB untuk hari ini. Silahkan centang SPB untuk dapat diproses pengajuan. Klik tombol Buat Persetujuan untuk menkonfirmasi SPB. 
		  </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Silahkan pilih SPB hari ini yang ingin diajukan.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="material-datatables icheck-blue">
				<?php echo $this->session->flashdata('error'); ?>
				<?php echo form_open('mfiling/create');?>
				<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
				<?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
								<th>AM</th>
								<th>Unit</th>
                                <th>Nomor SPB</th>
                                <th>Invoice</th>
                                <th>Segmen</th> 
                                <th>Kepada</th>
                                <th>Pembayaran</th>
                                <th>Nilai</th>
                                <th>Tanggal</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th></th>
								<th>AM</th>
								<th>Unit</th>
                                <th>No. SPB</th>
                                <th>Invoice</th>
                                <th>Segmen</th> 
                                <th>Kepada</th>
                                <th>Pembayaran</th>
                                <th>Nilai</th>
                                <th>Tanggal</th>
                            </tr>
                            </tfoot> 
                            <tbody>
                            <?php foreach ( $drd as $row ) { ?>
                                <tr>
                                    <td><input type="checkbox" name="aprv[]" value="<?php echo $row['spbid'].','.$row['amkomet'].','.$row['orderid'].','.$row['value'] ?>"></td>
									<td><?php echo $row['amkomet'] ?></td>
									<td><span class="label label-primary"><?php echo $row['unit'] ?></span></td>
                                    <td style="text-transform: uppercase;"><a target='_blank' href="<?php echo base_url().'kspb/details/'.$row['spbid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code'] ?></strong></a></td>
                                    <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                                    <td><?php echo $row['segment'] ?></td>
                                    <td><?php echo $row['customer'] ?></td>
                                    <td style="text-transform: uppercase;"><?php echo $row['typeofpayment'] ?></td>
                                    <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></strong></td> 
                                    <td><?php echo date('d-m-Y', strtotime($row['spbdat']));?></td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } else { echo 'Belum ada SPB hari ini!'; }?>
                </div>
            </div>
            <!-- /.box-body -->
			<div class="box-footer">
				<div class="form-group">
					<label>Request untuk tanggal:</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
					<input name="tglAprv" type="text" class="form-control datepicker">
					</div>
				  </div>
					<button name="btnCreate" type="submit" class="btn btn-sm btn-info">Buat Persetujuan</button>
				<?php echo form_close();?>
			</div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-xs-12">
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
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'responsive'  : true
		});
		
	$('.selectpicker').select2();
	
	$('.datepicker').datepicker({
		format: 'dd-mm-yyyy',
		autoclose: true,
		todayHighlight: true
	});
	
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
	
    });
	
</script>