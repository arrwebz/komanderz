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
        <li><a href="#">Profile</a></li>
        <li class="active">Detail Salary</li>
      </ol>
    </section>
	<?php if($unit == 'KOMET'){ ?>
	<div class="pad margin no-print">
      <div class="callout callout-danger" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> RAHASIA PRIBADI - PRIVATE & CONFIDENTIAL</h4>
        KOPERASI METROPOLITAN PT. TELKOM <br/>
		DIV ENTERPRISE & GOVERNMENT SERVICE <br/>
		DKI Jakarta<br/>
		Jl. Kebon Sirih No. 10 - 12 <br/>
		Jakarta Pusat - 10110
      </div>
    </div>
	<?php } else { ?> 
	<div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> RAHASIA PRIBADI - PRIVATE & CONFIDENTIAL</h4>
        PT. METROPOLITAN SEJAHTERA <br/>
		DKI Jakarta<br/>
		Jl. Kebon Sirih No. 10 - 12 <br/>
		Jakarta Pusat - 10110
      </div>
    </div>
	<?php } ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-12">	
			<h3 class="box-title" style="color: #fa591d;"><strong>SLIP GAJI PEGAWAI</strong></h3>
			<h3><?php echo date('F Y',strtotime($draftdat)); ?></h3>
		</div>
		<!-- /.col -->
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>NIK:</label>
				<input type="text" class="form-control" value="<?php echo $usernik; ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nama Pegawai:</label>
				<input type="text" class="form-control" value="<?php echo $staffname; ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Lokasi Kerja:</label>
				<input type="text" class="form-control" value="<?php echo $userlocation; ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Periode:</label>
				<input type="text" class="form-control" value="<?php echo date('F Y',strtotime($draftdat)); ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Susunan Keluarga:</label>
				<input type="text" class="form-control" value="<?php echo $tstaff; ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Jenis Kelamin:</label>
				<input type="text" class="form-control" value="<?php if($usergender == 'P' ) { echo 'Laki-Laki'; } else { echo 'Perempuan'; } ?>" disabled>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
        <!-- /.col -->
		<div class="col-md-12">					
			<h3 style="color: #fa591d;"><strong>RINGKASAN GAJI</strong></h3>
			<br/>
		</div>
		<!-- /.col -->
		<div class="col-md-6">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">THP</h3>
			</div>
			<div class="box-body">
			  <div class="form-group">
				<label>Total Penghasilan:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($inthp)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Total Potongan:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($cutsal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Gaji Bersih:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($totalsal)),3))); ?>" disabled>
			  </div>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-6">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">Terbilang</h3>
			</div>
			<div class="box-body">
			  <div class="form-group">
				<label></label>
				<input type="text" class="form-control" value="<?php echo $wordtotal; ?>" disabled>
			  </div>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
		<!-- /.col --> 
		<div class="col-md-12">					
			<h3 style="color: #fa591d;"><strong>PERINCIAN GAJI</strong></h3>
			<br/>
		</div>
		<!-- /.col -->
		<div class="col-md-6">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">Jenis Penghasilan</h3>
			</div>
			<div class="box-body">
			  <div class="form-group">
				<label>Gaji Dasar:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($bscsal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Status:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($statsal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Masa Kerja:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($perdsal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Strata Pendidikan:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($edsal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Uang Makan:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($consal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Transport:</label> 
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($transal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Komunikasi:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($vsal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Jabatan:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($postsal)),3))); ?>" disabled>
			  </div>
			  <div class="form-group">
				<label>Strategis:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($strsal)),3))); ?>" disabled>
			  </div>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-6">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">Jenis Potongan</h3>
			</div>
			<div class="box-body">
			 <div class="form-group">
				<label>Angsuran Koperasi:</label>
				<input type="text" class="form-control" value="0" disabled>
			  </div> 
			 <div class="form-group">
				<label>Lain-lain:</label>
				<input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($cutsal)),3))); ?>" disabled>
			  </div>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
		<!-- /.col --> 
		<div class="col-xs-12">
          <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/printsalary/<?php echo $userstaffid; ?>';return true;">
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
		
		$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
						
		$('.selectpicker').select2();
	});
</script>