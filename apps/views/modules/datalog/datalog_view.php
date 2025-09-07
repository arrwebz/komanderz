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
        <li><a href="#">Datalog</a></li>
        <li class="active">File</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Pencarian</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
		<?php echo form_open('datalog/search');?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama</label>
				<input name="txtSpb" type="text" class="form-control">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tanggal</label>
				<input name="txtCrdate" type="text" class="form-control datepicker">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Bulan</label>
					<select name="optMonth" class="form-control selectpicker">
						<option disabled selected>Pilih</option>
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select> 
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tahun</label>
                <select name="optYear" class="form-control selectpicker">
							<option disabled>Pilih</option>
							<option value="2020" selected>2020</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
						</select> 
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" name="cmdsave" class="btn btn-fill btn-default">Filter</button>
			<?php echo form_close();?>
        </div>
      </div>
      <!-- /.box -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Log</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="material-datatables">
				<?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Unit</th>
                                <th>Order</th>
                                <th>Spb</th>
                                <th>Nilai</th>
                                <th>Nama</th> 
                                <th>Tanggal</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Unit</th>
                                <th>Order</th>
                                <th>Spb</th>
                                <th>Nilai</th>
                                <th>Nama</th> 
                                <th>Tanggal</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drd as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
									<td><?php echo $row['unit'] ?></td>
                                    <td style="text-transform: uppercase;"><a href="#" style="color: #00bcd4;"><strong><?php echo $row['ordercode'] ?></strong></a></td>
                                    <td style="text-transform: uppercase;"><a href="#" style="color: #00bcd4;"><strong><?php echo $row['spbcode'] ?></strong></a></td>
                                    <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['spbvalue'])),3))); ?></strong></td>
                                    <td><?php echo $row['userlog'] ?></td>
                                    <td style="color: #fa591d;"><strong><?php echo date('d-m-Y', strtotime($row['crdat']));?></strong></td> 
                                    
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function() {
       var table = $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });	
	$('.selectpicker').select2();
	$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
    });  
</script>