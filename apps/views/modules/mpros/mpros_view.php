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
            <li><a href="#">Prospect Sales</a></li>
            <li class="active">Mesra</li>
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
                <?php echo form_open('kpros/search');?>
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
                                        echo '<option value="'.$row['divisionid'].'"'. $strselected .'>'.$row['code'].'</option>';
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
                                <option disabled selected>Select</option>
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
                            <label>Bulan</label>
                            <select name="optMonth" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
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
                                <?php
                                $start_year = '2017';
                                $end_year = date('Y');
                                for($i = $start_year; $i<=$end_year; $i++):?>
                                    <option value="<?php echo $i?>" <?php if($i == date('Y')){ echo 'selected'; }?> ><?php echo $i?></option>
                                <?php endfor; ?>
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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Prospect Sales Mesra</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>
                            <a href="<?php echo base_url().$this->router->fetch_class().'/addnew'; ?>" class="btn btn-sm btn-success">+ Buat baru</a>
                        </p>
                        <div class="material-datatables">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Divisi</th>
                                        <th>Segmen</th>
                                        <th>User</th>
                                        <th>Nilai</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Divisi</th>
                                        <th>Segmen</th>
                                        <th>User</th>
                                        <th>Nilai</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['division'];?></td>
                                            <td><?php echo $row['segment'];?></td>
                                            <td style="text-transform: uppercase;"><?php echo $row['amuser'] ?></td>
                                            <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></strong></td>
                                            <td><?php echo date('d-m-Y', strtotime($row['reqdate']));?></td>
                                            <td>
                                                <?php if($row['status'] == '0') { ?>
                                                    <span class="label label-danger">Open</span>
                                                <?php } else { ?>
                                                    <span class="label label-success">Closed</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-right js-sweetalert">
                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/editdata/'.$row['prospectid']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"> Ubah</i></a>
                                                <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['prospectid']; ?>" class="btn btn-xs btn-default"><i class="fa fa-trash-o"> Hapus</i></button>
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
			'paging'      : true,
			'lengthChange': false,
			'pageLength'  : 25,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		});
		$('.selectpicker').select2();
	});

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url("kpros");?>";
		var uri = $(this).attr("data-href");
		var id = $(this).attr("data-id");
		showCancelMessage(current_url,uri,id);
	});

	function showCancelMessage(current_url, uri, id){
		swal({
			title: "Yakin menghapus data?",
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
					data: 'prospectid=' + id,
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