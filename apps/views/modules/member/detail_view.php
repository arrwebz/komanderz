<?php $totalsaldo = $saldoanggota[0]['pastsaldo']+$totalpayroll[0]['totalpayroll']+$totaltransfer[0]['totaltransfer']-$totalpenarikan[0]['totaltarik']; ?>
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
        <li><a href="#">Data Anggota</a></li>
        <li class="active">Detail Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Profil Anggota</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>NIK:</label>
				<p><?php echo $nik ?></p>
              </div>
              <div class="form-group">
                <label>Nama:</label>
				<p><?php echo $nama ?></p>
              </div>
			  <div class="form-group">
                <label>Divisi:</label>
				<p><?php echo $divisi ?></p>
              </div>
			  <div class="form-group">
                <label>Segmen:</label>
				<p><?php echo $segmen ?></p>
              </div>
			  <div class="form-group">
                <label>Telp:</label>
				<p><a target="_blank" href="https://api.whatsapp.com/send?phone=62<?php echo $telp ?>">+62 <?php echo $telp ?></a></p>
              </div>
			  <div class="form-group">
                <label>Email:</label>
				<p><?php echo $email ?></p>
              </div>
			  <div class="form-group">
                <label>Bank:</label>
				<p style="color: #fa591d;"><?php echo $bank ?></p>
              </div>
              <div class="form-group">
                <label>Nomor Rekening:</label>
				<p style="color: #fa591d;"><?php echo $norek ?></p>
              </div>
			  <div class="form-group">
                <label>Atas Nama:</label>
				<p style="color: #fa591d;"><?php echo $namarek ?></p>
              </div>
			  <div class="form-group">
                <label>Band:</label>
				<p><?php echo $band ?></p>
              </div>
			  <div class="form-group">
                <label>Anggota Sejak:</label>
				<p><?php echo $bulanmasuk ?> <?php echo $tahunmasuk ?></p>
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
              <h3 class="box-title">Pinjaman</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>Pinjaman Insidentil:</label>
				<p>Rp</p>
              </div>
			  <div class="form-group">
                <label>Awal - Akhir:</label>
				<p></p>
              </div> 
			  <div class="form-group">
                <label>Tenor:</label>
				<p></p>
              </div> 
			  <div class="form-group">
                <label>Angsuran:</label>
				<p></p>
              </div>
			  <hr/>
			  <div class="form-group">
                <label>Pinjaman Koptel:</label>
				<p style="color: #fa591d;">Rp <?php if(isset($pinjamankoptel[0])){ echo strrev(implode('.',str_split(strrev(strval($pinjamankoptel[0]['totalpinjaman'])),3)));} ?></p>
              </div>
			  <div class="form-group">
                <label>Awal - Akhir:</label>
				<p><?php if(isset($pinjamankoptel[0])){ echo date('M Y',strtotime($pinjamankoptel[0]['awal']));} ?> - <?php if(isset($pinjamankoptel[0])){ echo date('M Y',strtotime($pinjamankoptel[0]['akhir']));} ?></p>
              </div> 
			  <div class="form-group">
                <label>Tenor:</label>
				<p><?php if(isset($pinjamankoptel[0])){ echo $pinjamankoptel[0]['tenor'].' bulan';} ?></p>
              </div> 
			  <div class="form-group">
                <label>Angsuran:</label>
				<p style="color: #fa591d;">Rp <?php if(isset($pinjamankoptel[0])){ echo strrev(implode('.',str_split(strrev(strval($pinjamankoptel[0]['angsuran'])),3)));} ?></p>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col --> 
		<div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Simpanan</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>Saldo Tahun Lalu:</label>
				<p>Rp <?php echo strrev(implode('.',str_split(strrev(strval($saldoanggota[0]['pastsaldo'])),3))); ?></p>
              </div>
			  <div class="form-group">
                <label>Total Payroll:</label>
				<p>Rp <?php echo strrev(implode('.',str_split(strrev(strval($totalpayroll[0]['totalpayroll'])),3))); ?></p>
              </div>
			  <div class="form-group">
                <label>Total Transfer:</label>
				<p>Rp <?php echo strrev(implode('.',str_split(strrev(strval($totaltransfer[0]['totaltransfer'])),3))); ?></p>
              </div>
			  <div class="form-group">
                <label>Total Tarik:</label>
				<p>Rp <?php echo strrev(implode('.',str_split(strrev(strval($totalpenarikan[0]['totaltarik'])),3))); ?></p>
              </div>
			  <div class="form-group">
                <label>Total Saldo:</label> 
				<p style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($totalsaldo)),3))); ?></p>
              </div> 
			  <div class="form-group"> 
                <label><i>(Total Saldo = Saldo Tahun Lalu + Total Payroll + Total Transfer - Total Penarikan)</i></label> 
				<p></p>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col --> 
		</div>
		<!-- /.row -->
		<div class="row">
		<div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
			  <h3 class="box-title">Potongan Payroll Bulanan oleh KOPTEL</h3>
			  <p style="color: #fa591d;"><strong>Rp <?php echo strrev(implode('.',str_split(strrev(strval($saldoanggota[0]['potongan'])),3))); ?></strong></p>
            </div> 
            <div class="box-body">
              <div class="material-datatables"> 
					<?php if (count ( $payrollsimpanan ) > 0) { ?>
                        <table id="datatablep" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Periode</th>
                                <th>Keterangan</th> 
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th> 
                                <th>Periode</th>
                                <th>Keterangan</th> 
                            </tr>
                            </tfoot>
                            <tbody>
							<?php $i = 0; ?>
                            <?php foreach ( $payrollsimpanan as $srow ) { ?>
                                <?php $i++; ?>
								<tr>
									<td><?php echo $i; ?></td>
                                    <?php if($srow['payroll'] == '0'){?>
									<td style="color:red;"><?php echo strrev(implode('.',str_split(strrev(strval($srow['payroll'])),3))); ?></td>
								<?php } else { ?>
									<td style="color:green;">+ <?php echo strrev(implode('.',str_split(strrev(strval($srow['payroll'])),3))); ?></td>
								<?php }	?>
                                    <td><?php echo date('M Y',strtotime($srow['periode'])); ?></td>
                                    <td><?php echo $srow['notes']; ?></td>
								</tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } else { echo 'Belum ada Simpanan!'; }?>
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
			  <h3 class="box-title">Penarikan Simpanan</h3>
            </div> 
            <div class="box-body">
              <div class="material-datatables"> 
					<?php if (count ( $penarikan ) > 0) { ?>
                        <table id="datatabled" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Periode</th>
                                <th>Keterangan</th> 
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th> 
                                <th>Periode</th>
                                <th>Keterangan</th> 
                            </tr>
                            </tfoot>
                            <tbody>
							<?php $i = 0; ?>
                            <?php foreach ( $penarikan as $drow ) { ?>
                                <?php $i++; ?>
								<tr>
									<td><?php echo $i; ?></td>
                                    <?php if($drow['penarikan'] == '0'){?>
									<td style="color:red;"><?php echo strrev(implode('.',str_split(strrev(strval($drow['penarikan'])),3))); ?></td>
								<?php } else { ?>
									<td style="color:red;">- <?php echo strrev(implode('.',str_split(strrev(strval($drow['penarikan'])),3))); ?></td>
								<?php }	?>
                                    <td><?php echo date('M Y',strtotime($drow['periode'])); ?></td>
                                    <td><small><?php echo $drow['notes']; ?></small></td>
								</tr>
                            <?php }	?> 
                            </tbody>
                        </table>
                    <?php } else { echo 'Belum ada Penarikan!'; }?>
                </div>    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<?php if($divisi == 'ANGGOTA ISTIMEWA'){?>
		<div class="col-md-12"> 
          <div class="box box-primary">
            <div class="box-header">
			  <h3 class="box-title">Transfer Anggota Istimewa</h3>
			  <p style="color: #fa591d;"><strong>Rp <?php echo strrev(implode('.',str_split(strrev(strval($transfersimpanan[0]['transfer'])),3))); ?></strong></p>
            </div> 
            <div class="box-body">
              <div class="material-datatables"> 
					<?php if (count ( $transfersimpanan ) > 0) { ?>
                        <table id="datatablet" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Periode</th>
                                <th>Keterangan</th> 
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th> 
                                <th>Periode</th>
                                <th>Keterangan</th> 
                            </tr>
                            </tfoot>
                            <tbody>
							<?php $i = 0; ?>
                            <?php foreach ( $transfersimpanan as $trow ) { ?>
                                <?php $i++; ?>
								<tr>
									<td><?php echo $i; ?></td>
                                    <?php if($trow['transfer'] == '0'){?>
									<td style="color:red;"><?php echo strrev(implode('.',str_split(strrev(strval($trow['transfer'])),3))); ?></td>
								<?php } else { ?>
									<td style="color:green;">+ <?php echo strrev(implode('.',str_split(strrev(strval($trow['transfer'])),3))); ?></td>
								<?php }	?>
                                    <td><?php echo date('M Y',strtotime($trow['periode'])); ?></td>
                                    <td><?php echo $trow['notes']; ?></td>
								</tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } else { echo 'Belum ada Simpanan!'; }?>
                </div>    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<?php } ?>
		<div class="col-xs-12">
		Dibuat oleh: Admin, 22-02-2020 00:07:29<?php //echo $buat; ?> <?php echo $tglbuat; ?><br><br>
		<?php if($edit != 0){ ?>
		Diubah oleh: <?php //echo $edit; ?>, <?php echo $tgledit; ?><br><br>
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
		$('#datatablep').DataTable({
            'responsive'  : true,
			'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true 

        });	
		
		$('#datatabled').DataTable({
            'responsive'  : true,
			'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true

        });
		
		$('#datatablet').DataTable({
            'responsive'  : true,
			'paging'      : true,
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