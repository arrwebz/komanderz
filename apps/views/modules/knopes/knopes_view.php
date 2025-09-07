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
            <li class="active">Nopes Komet</li>
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
                <?php echo form_open('knopes/search');?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Invoice</label>
                            <input name="txtInv" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tipe Order</label>
                            <select id="optTipeodr" name="optTipeodr" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <option value="NOPES">Nopes</option>
                                <option value="IBL">IBL</option>
                                <option value="OBL">OBL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status SPB</label>
                            <select id="optSPB" name="optSPB" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <option value="0">Belum ada</option>
                                <option value="1">Ada</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
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
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar invoice Komet.</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php $nav = array('1','2','3','4','5','6','7'); ?>
                        <?php if(in_array($role, $nav)) { ?>
                            <p>
                                <a href="<?php echo base_url().$this->router->fetch_class().'/addnopes'; ?>" class="btn btn-sm btn-success">+ Tambah Invoice</a>
                            </p>
                        <?php } ?>
                        <div class="material-datatables">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Order</th>
                                        <th>Tipe Order</th>
                                        <th>Segmen</th>
                                        <th>Invoice</th>
                                        <th>Faktur</th>
                                        <th>Nilai Dasar</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Order</th>
                                        <th>Tipe Order</th>
                                        <th>Segmen</th>
                                        <th>Invoice</th>
                                        <th>Faktur</th>
                                        <th>Nilai Dasar</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>"><strong><?php echo $row['code'] ?></strong></a>

                                                <a class="btn btn-xs btn-default qd" data-href="<?php echo base_url().$this->router->fetch_class(). '/ajax_details'?>" data-id="<?php echo $row['orderid']; ?>" ><i class="fa fa-external-link-square"></i></a>
                                            </td>
                                            <td style="text-transform: uppercase;"><?php echo $row['orderstatus'] ?></td>
                                            <td><?php echo $row['segment'];?></td>
                                            <td style="text-transform: uppercase;"><?php echo $row['invnum'] ?></td>
                                            <td style="text-transform: uppercase;"><?php echo $row['faknum'] ?></td>
                                            <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                            <td class="text-right js-sweetalert">
                                                <?php $nav = array('1','2','3','4','6'); ?>
                                                <?php if(in_array($group, $nav)) { ?>
                                                    <?php $navrole = array('1','2','3','4','5','6','7'); ?>
                                                    <?php if(in_array($role, $navrole)) { ?>
                                                        <small class="label label-primary"><?php echo $row['countspb'];?></small>
                                                        <?php if($row['jobtype'] == 'TK'){ ?>
                                                            <a href="javascript:" class="btn btn-xs btn-default" disabled=""><i> TKBW</i></a>
                                                        <?php }else{ ?>
                                                            <?php if($row['countspb'] == '0') { ?>
                                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn btn-xs btn-default"><i> Buat SPB</i></a>
                                                            <?php } elseif($row['countspb'] > '0') { ?>
                                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn btn-xs btn-primary"><i>+ Tambah SPB</i></a>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php $navrole = array('1','2','4'); ?>
                                                        <?php if(in_array($role, $navrole)) { ?>
                                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/editnopes/'.$row['orderid']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"> Ubah</i></a>
                                                            <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['orderid']; ?>" class="btn btn-xs btn-default" onclick="sweet()"><i class="fa fa-trash-o"> Hapus</i></button>
                                                        <?php } ?>
                                                    <?php } ?>
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
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true

		});
		$('.selectpicker').select2();
	});

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url("knopes");?>";
		var uri = $(this).attr("data-href");
		var id = $(this).attr("data-id");
		showCancelMessage(current_url,uri,id);
	});

	function showCancelMessage(current_url, uri, id){
		swal({
			title: "Yakin menghapus data?",
			text: "Data SPB yang berkaitan juga akan terhapus!  ",
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
					data: 'orderid=' + id,
					type: 'POST',
					success: function(msg) {
						if(msg == "success"){
							setTimeout(function () {
								//location.href = current_url;
							}, 1500);
						}

					}
				})

			}
		});
	}

	$('.qd').on('click', function () {
		var quri = $(this).attr("data-href");
		var qid = $(this).attr("data-id");
		quick_details(quri,qid);
	});

	function quick_details(quri,qid){
		//Ajax Load data from ajax
		$.ajax({
			url : quri,
			data: 'orderid=' + qid,
			type: "POST",
			dataType: "JSON",
			success: function(qdata)
			{

				$('[value="inv"]').val(qdata.invnum);
				$('[value="fak"]').val(qdata.faknum);
				$('[value="spk"]').val(qdata.spknum);
				$('[value="div"]').val(qdata.division);
				$('[value="seg"]').val(qdata.segment);
				$('[value="am1"]').val(qdata.amuser);
				$('[value="am2"]').val(qdata.amkomet);
				$('[value="pn"]').val(qdata.projectname);

				$('#modal_details').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text(qdata.code); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}
</script>

<!-- Modal -->
<div id="modal_details" class="modal fade">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-weight: bold;">Default Modal</h4>
            </div>
            <div class="modal-body">
                <div class="form-group label-floating">
                    <label class="control-label">Nomor Invoice</label>
                    <input type="text" class="form-control" value="inv" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Nomor Faktur</label>
                    <input type="text" class="form-control" value="fak" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Nomor Tel / SPK</label>
                    <input type="text" class="form-control" value="spk" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Divisi</label>
                    <input type="text" class="form-control" value="div" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Segmen</label>
                    <input type="text" class="form-control" value="seg" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">AM User</label>
                    <input type="text" class="form-control" value="am1" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">AM Komet</label>
                    <input type="text" class="form-control" value="am2" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Nama Project</label>
                    <input type="text" class="form-control" value="pn" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>

    </div>
</div>