<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Order</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('orderam');?>">Request</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Rocket.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="card card-hover">
        <div class="card-header">
            <h4 class="mb-0 text-dark fs-5">Search</h4>
        </div>
        <?php echo form_open('knopes/search');?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Nomor Invoice</label>
                        <input name="txtInv" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Tipe Order</label>
                        <select id="optTipeodr" name="optTipeodr" class="form-control selectpicker" style="width: 100%">
                            <option disabled selected>Pilih</option>
                            <option value="NOPES">Nopes</option>
                            <option value="IBL">IBL</option>
                            <option value="OBL">OBL</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Bulan</label>
                        <select name="optMonth" class="form-control selectpicker" style="width: 100%">
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
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Segment</label>
                        <select name="optSegment" class="form-control selectpicker" style="width: 100%">
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
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Tahun</label>
                        <select name="optYear" class="form-control selectpicker" style="width: 100%">
                            <option disabled>Pilih</option>
                            <?php
                            $start_year = '2017';
                            $end_year = date('Y');
                            for($i = $start_year; $i<=$end_year; $i++):?>
                                <option value="<?php echo $i?>" <?php if($i == date('Y')){ echo 'selected'; }?> ><?php echo $i?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-12">
                <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-send me-2 fs-4"></i> Submit
                    </div>
                </button>
            </div>
        </div>
        <?php echo form_close();?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Order Request</h4>
                </div>
                <div class="card-body collapse show">
                    <?php $nav = array('1','2','3','4'); ?>
                    <?php if(in_array($role, $nav) || in_array($fullname, listam()) || in_array($fullname, listsupportam()) || $userid == '8') { ?>
                        <p>
                            <a href="<?php echo base_url().$this->router->fetch_class().'/addoam'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Request</a>
                        </p>
                    <?php } ?>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Request</th>
                                    <th>Order Type</th>
                                    <th>SPK</th>
                                    <th>Customer</th>
                                    <th>AM KOMET</th>
                                    <th>Base Values</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $drd as $row ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="text-transform: uppercase;">
                                            <?php
                                            if($row['orderinv'] == '0'){
                                                echo 'PANJAR PRPO';
                                            }elseif($row['orderinv'] == '1'){
                                                echo 'ORDER INVOICE';
                                            }else{
                                                echo 'UNDENFINED';
                                            }
                                            ?>
                                        </td>
                                        <td style="text-transform: uppercase;"><?php echo $row['orderstatus'] ?></td>
                                        <td>
                                            <?php if($row['orderstatus'] == 'PADI'){ ?>
                                                <?php
                                                    $ex = explode('-',$row['spknum']);
                                                    $numspk = count($ex);
                                                ?>
                                                <?php echo $ex[$numspk-1];?>
                                            <?php }else{?>
                                                <?php echo $row['spknum'];?>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $row['segment'];?><br><small class="text-muted"><?php echo $row['amuser'] ?></small></td>
                                        <td><?php echo $row['amkomet'];?></td>
                                        <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                        <td>
                                            <!-- MSG -->
                                            <?php if($row['status'] == '0') { ?>
                                                <small class="badge text-bg-warning fs-1">Process</small>
                                            <?php }else{ ?>
                                                <small class="badge text-bg-success fs-1">Accepted</small>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right js-sweetalert">
                                            <?php $nav = array('1','2','3','4','6'); ?>
                                            <?php if(in_array($group, $nav)) { ?>
                                                <?php $navrole = array('1','2','3','4','5','6','7'); ?>
                                                <?php if(in_array($role, $navrole)) { ?>

                                                    <!-- SPB -->
                                                    <?php if($row['jobtype'] == 'TK'){ ?>
                                                        <a href="javascript:" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" disabled=""><i> TKBW</i></a>
                                                    <?php }else{ ?>
                                                        <?php if($row['status'] == '0') { ?>
                                                            <?php if($row['countspb'] == '0') { ?>
                                                                <?php if(!empty($row['orderid'])){ ?>
                                                                    <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderamid']; ?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Create SPB">
                                                                        <i class="ti ti-pencil text-info"></i>
                                                                    </a>
                                                                <?php } ?>
                                                            <?php } elseif($row['countspb'] > '0') { ?>
                                                                <?php if(!empty($row['orderid'])){ ?>
                                                                    <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderamid']; ?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Add SPB">
                                                                        <i class="ti ti-pencil text-info"></i>
                                                                    </a>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- ACC -->
                                                    <?php if($row['status'] == '0') { ?>
                                                        <?php $navrole = array('1','2','4'); ?>
                                                        <?php if(in_array($fullname, listaccorder()) || in_array($role, $navrole)){ ?>
                                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/addnopes/'.$row['orderamid']; ?>" class="btn mb-1 bg-secondary-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Accept">
                                                                <i class="ti ti-checklist text-secondary"></i>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <!-- EDIT / DELETE -->
                                                    <?php $navrole = array('1','2','4'); ?>
                                                    <?php if(in_array($role, $navrole)) { ?>
                                                        <?php if($row['status'] == '0') { ?>
                                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/editoam/'.$row['orderamid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Edit">
                                                                <i class="fs-4 ti ti-edit text-warning"></i>
                                                            </a>
                                                            <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['orderamid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" onclick="sweet()" data-bs-toggle="tooltip" title="Delete">
                                                                <i class="fs-4 ti ti-trash text-danger"></i>
                                                            </button>
                                                        <?php }else{?>
                                                            <?php if($row['unit'] == 'KOMET') { ?>
                                                                <a href="<?php echo site_url('knopes/details/'.$row['orderid']);?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Detail Invoice">
                                                                    <i class="fs-4 ti ti-file-export text-info"></i>
                                                                </a>
                                                            <?php }elseif($row['unit'] == 'PADI') { ?>
                                                                <a href="<?php echo site_url('pnopes/details/'.$row['orderid']);?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Detail Invoice">
                                                                    <i class="fs-4 ti ti-file-export text-info"></i>
                                                                </a> 
                                                            <?php } ?>
                                                        <?php } ?>
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
            </div>
        </div>
    </div>
</section>

<script>
	$(function() {
		var table = $('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollX': true,
		});

		$('.selectpicker').select2();
	});

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url("orderam");?>";
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
					data: 'orderamid=' + id,
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

	$('.qd').on('click', function () {
		var quri = $(this).attr("data-href");
		var qid = $(this).attr("data-id");
		quick_details(quri,qid);
	});

	function quick_details(quri,qid){
		//Ajax Load data from ajax
		$.ajax({
			url : quri,
			data: 'orderamid=' + qid,
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