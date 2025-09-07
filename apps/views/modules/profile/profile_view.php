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
        <li><a href="#">User</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">		
		<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $this->config->item('uploads_uri')?>user/<?php echo $photo;?>" alt="User profile picture">
			<?php if($statuskerja == 'TETAP') {
						$badge = '<sup style="color: #00a65a;"><i class="fa fa-check-circle margin-r-5"></i></sup>';
				} else {
					$badge = ' ';
				}
					?>
              <h3 class="profile-username text-center"><?php echo $fullname ?><?php echo $badge; ?></h3>
 
              <p class="text-muted text-center"><?php echo $position; ?></p>

              <ul class="list-group list-group-unbordered"> 
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right"><?php echo $usernik; ?></a>
                </li>
                <li class="list-group-item">
                  <b>EMAIL</b> <a class="pull-right"><?php echo $email; ?></a>
                </li> 
                <li class="list-group-item">
                  <b>PHONE</b> <a class="pull-right"><?php echo $telp; ?></a> 
                </li>
              </ul>
				<?php if($statuskerja == 'TETAP') {
						$btnclass = 'btn-success';
				} else {
					$btnclass = 'btn-danger';
				}
					?>
				<p class="text-muted text-center"><?php echo date('d-M-Y',strtotime($joindate)); ?></p>
              <a href="#" class="btn <?php echo $btnclass; ?> btn-block disabled"><b>KARYAWAN <?php echo $statuskerja; ?></b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Lainnya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Saldo Cuti</strong>
 
              <p class="text-muted" style="font-size:24px;">
                <strong><?php echo $saldocuti; ?></strong>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $location; ?></p> 
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs"> 
              <li class="active"><a href="#information" data-toggle="tab">Biodata</a></li>
              <li><a href="#family" data-toggle="tab">Keluarga</a></li>
              <li><a href="#salary" data-toggle="tab">Slip Gaji</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="information">
                <form class="form-horizontal">
				<div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">STATUS</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $statusnikah; ?>" disabled>
                    </div>
                  </div>
				<div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">GOL. DARAH</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $goldarah; ?>" disabled>
                    </div>
                  </div>
				<div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">TTL</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $tlahir.', '.date('d-m-Y',strtotime($ttl)); ?>" disabled>
                    </div>
                  </div>
				<div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">DIVISI</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $divisi; ?>" disabled>
                    </div>
                  </div>
				<!--  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Atasan</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" disabled>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">KTP</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $ktp; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">NPWP</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $npwp; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">PASPOR</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" value="<?php echo $paspor; ?>" disabled>
                    </div>
					<label for="inputName" class="col-sm-2 control-label">EXPIRED</label>
					<div class="col-sm-4">
                      <input type="text" class="form-control" value="<?php echo date('d-M-Y',strtotime($pasporex)); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group"> 
                    <label for="inputExperience" class="col-sm-2 control-label">ALAMAT</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" style="height:220px;" disabled><?php echo $address; ?></textarea>
                    </div> 
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">PENDIDIKAN</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $education; ?>" disabled>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">AGAMA</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $agama; ?>" disabled>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">UKURAN</label>

                    <div class="col-sm-10">
                      
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">BAJU</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $baju; ?>" disabled>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">JAKET</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $jaket; ?>" disabled>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">CELANA</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $celana; ?>" disabled>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">SEPATU</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $sepatu; ?>" disabled>
                    </div>
                  </div>
                </form>
              </div>
			  <div class="tab-pane" id="family">
                <div class="box-body">
					<div class="material-datatables">
					<?php if (count ( $staffamily ) > 0) { ?>
							<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
								<tr> 
									<th>Relasi</th>
									<th>Nama</th>
									<th>Gender</th>
									<th>Gol. Darah</th>
									<th>TTL</th>
									<th>Telp</th>
								</tr>
								</thead>
								<tfoot> 
								</tfoot>
								<tbody>
								<?php foreach ( $staffamily as $row ) { ?>
									<tr>
										 <td><?php echo $row['relation'] ?></td>
										 <td><a href="#"><?php echo $row['fullname'] ?></a></td>
										 <td><?php echo $row['gender'] ?></td>
										 <td><?php echo $row['bloodtype'] ?></td>
										 <td><?php echo $row['dob'] ?></td>
										 <td><?php echo $row['telp'] ?></td>
									</tr>
								<?php }	?>
								</tbody>
							</table>
						<?php } else { echo 'Data tidak ditemukan!'; }?>
					</div>	
				</div>
              </div>
              <!-- /.tab-pane -->
			  <div class="tab-pane" id="salary">
                <div class="box-body">
					<div class="material-datatables">
					<?php if($group == '1') {
						$salary = $allstaffsalary;						
					} else {
						$salary = $staffsalary; 
					}?>
					<?php if (count ( $salary ) > 0) { ?>
							<table id="datatablesr" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
								<tr> 
									<th>Nama</th>
									<th>Unit</th>
									<th>Status</th>
									<th>THP</th>
									<th>Periode</th>
									<th> </th>
								</tr>
								</thead>
								<tfoot> 
								</tfoot>
								<tbody>
								<?php foreach ( $salary as $ros ) { ?>
									<tr>
										 <td><a href="<?php echo base_url().$this->router->fetch_class(). '/detailsalary/'.$ros['userid']; ?>"><?php echo $ros['fullname'] ?></a></td>
										 <td><?php echo $ros['unit'] ?></td>
										 <td><?php echo $ros['typestaff'] ?></td>
										 <td><?php echo strrev(implode('.',str_split(strrev(strval($ros['thp'])),3))); ?></td>
										 <td><?php echo date('d F Y',strtotime($ros['draftdate'])); ?></td> 
										 <td><a href="<?php echo base_url().$this->router->fetch_class(). '/detailsalary/'.$ros['userid']; ?>" class="btn btn-xs btn-success"><i> Slip Gaji</i></a></td> 
									</tr>
								<?php }	?>
								</tbody>
							</table>
						<?php } else { echo 'Data tidak ditemukan!'; }?>
					</div>	
				</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
		
       $('#datatables').DataTable({
            'responsive'  : true,
			'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true

        });	
		
		$('#datatablesr').DataTable({
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
    });
	
</script>