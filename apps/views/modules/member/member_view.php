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
        <li><a href="#">Keanggotaan</a></li>
        <li class="active">Data Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">DES</span>
              <span class="info-box-number"><?php echo $totalaktifdes[0]['desaktif']; ?> <small>aktif</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bank"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">DGS</span>
              <span class="info-box-number"><?php echo $totalaktifdgs[0]['dgsaktif']; ?> <small>aktif</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box"> 
            <span class="info-box-icon bg-maroon"><i class="fa fa-building-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">NON</span>
              <span class="info-box-number"><?php echo $totalaktifndegs[0]['nondegsaktif']; ?> <small>aktif</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-grey"><i class="fa fa-home"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ISTIMEWA</span>
              <span class="info-box-number"><?php echo $totalistimewa[0]['istimewa']; ?> <small>aktif</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
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
		<?php echo form_open('member/search');?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Divisi</label>
				<select name="optDivision" id="optDivision" class="form-control selectpicker" >
					<option disabled selected>Pilih</option>
					<?php	
							
						if(!empty($division)){
							foreach($division as $row){ 
								if (!empty($divisi) && $divisi == $row['divisionid'] ) {
									$strselected = "selected";
								} else {
									$strselected = " ";
								}
								echo '<option value="'.$row['code'].'"'. $strselected .'>'.$row['code'].'</option>';
							}
						}else{
							echo '<option value="">Division not available</option>';
						}
					?> 
				</select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Segmen</label>
                <select name="optSegment" class="form-control selectpicker">
							<option disabled selected>Pilih</option>
							<?php
							
							if(!empty($segment)){
								foreach($segment as $row){ 
									if (!empty($segmen) && $segmen == $row['segmentid'] ) {
									$strselected = "selected";
									} else {
										$strselected = " ";
									}
									echo '<option value="'.$row['segmentid'].'"'. $strselected.'>'.$row['code'].'</option>';
								}
							}else{
								echo '<option value="">Segment not available</option>';
							}
						?> 
						</select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Keangotaan</label>
                <select name="optYear" class="form-control selectpicker">
							<option selected disabled>Pilih</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
						</select> 
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Status</label>
                <select name="optYear" class="form-control selectpicker">
							<option selected disabled>Pilih</option>
							<option value="1">Aktif</option>
							<option value="0">Pensiun</option>
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
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data Anggota Komet : <strong><?php echo $totalmember[0]['totalmember']; ?></strong> Aktif.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php $nav = array('1','2','3'); ?>
				<?php if(in_array($role, $nav)) { ?>
			<p>
				<a href="<?php echo base_url().$this->router->fetch_class().'/addmember'; ?>" class="btn btn-sm btn-success">+ Tambah Anggota</a>
			</p>
			<?php } ?>
			<div class="material-datatables">
				<?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drd as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><a href="<?php echo base_url().$this->router->fetch_class(). '/detail/'.$row['memberid']; ?>" style="color: #00bcd4;"><?php echo $row['nik'] ?></a></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td style="text-transform: uppercase;"><?php echo $row['division'];  ?></td>
                                    <td><?php if($row['status'] == '0') echo '<i style="color:red;">Non Aktif</i>'; elseif($row['status'] == '1') echo '<p style="color:green;">Aktif</p>';  ?></td>
                                    <td><?php echo $row['notes'] ?></td>
									<td class="text-right js-sweetalert">
                                        <?php $nav = array('1','2','3'); ?>
										<?php if(in_array($role, $nav)) { ?>
										<a href="<?php echo base_url().$this->router->fetch_class(). '/edit/'.$row['memberid']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"> Ubah</i></a>
                                        <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['memberid']; ?>" class="btn btn-xs btn-default" onclick="sweet()"><i class="fa fa-trash-o"> Hapus</i></button>
										<?php } ?>
                                    </td>
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
    });
	
	$('.js-sweetalert button').on('click', function () {
        var current_url = "<?php echo base_url("member");?>";
        var uri = $(this).attr("data-href");
        var id = $(this).attr("data-id");
        showCancelMessage(current_url,uri,id);
    });

    function showCancelMessage(current_url, uri, id){
        swal({
            title: "Yakin menghapus data?",
            text: "Data simpanan dan pinjaman yang berkaitan juga akan terhapus!  ",
            icon: "warning",
            buttons: ["Batal", "Hapus!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                
                swal("Anda telah berhasil menghapus data ini selamanya.", {
                    icon: "success",
                    buttons: false
                });

                
                $.ajax({
                    url: uri,
                    data: 'memberid=' + id,
                    type: 'POST',
                    success: function(msg) {
                        if(msg == "success"){
                            setTimeout(function () {
							  location.href = current_url;
							}, 1500);
                        }
                       
                    }
                })

            } 
        });
    }
</script>