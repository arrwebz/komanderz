<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Billing</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('letter');?>">Invoice KOMET</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Search.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div> 
</div>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-hover" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Search Result</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table  table-striped table-bordered display text-nowrap table-hover">
                                <thead>
								<tr style="text-transform: uppercase;font-size: 12px;">
									<th>No</th>
									<th>Order Type</th>
									<th>Code</th>
									<th>Invoice</th>
									<th>Tax</th>
									<th>SPK</th>
									<th>Customer</th>
									<th>Value</th>
									<th class="disabled-sorting text-right"></th>
								</tr>
								</thead>
								<tbody>
								<?php $i = 0; ?>
								<?php foreach ( $drd as $row ) { ?>
									<?php $i++; ?>
									<tr>
										<td style="text-transform: uppercase;font-size: 12px;"><?php echo $i; ?></td>
										<td style="text-transform: uppercase;font-size: 12px;">
										<?php if($row['orderstatus'] == 'NOPES'){ ?>
										<span class="mb-1 badge text-bg-success" style="font-size: 12px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'PADI') { ?>
										<span class="mb-1 badge text-bg-secondary" style="font-size: 12px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'IBL') { ?>
										<span class="mb-1 badge text-bg-warning" style="font-size: 12px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'OBL') { ?>
										<span class="mb-1 badge text-bg-primary" style="font-size: 12px;"><?php echo $row['orderstatus'] ?></span>
										<?php } else { ?>
										<span class="mb-1 badge text-bg-dark" style="font-size: 12px;">Unknown</span>
										<?php } ?>
										</td>
										<td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>"><strong><?php echo $row['code'] ?></strong></a>
										</td>
										<td style="text-transform: uppercase;font-size: 12px;"><?php echo $row['invnum'] ?></td>
										<td style="text-transform: uppercase;font-size: 12px;">
										<?php if($row['file'] != '') { ?>
                                            <a href="<?php echo $this->config->item('uploads_uri').'fakturpajak/padi/'.$row['orderid'].'/'.$row['file'];?>" target="_blank">
                                                <i class="ti ti-file-text"></i>&nbsp;
                                            </a>
										<?php } ?>
										<?php echo $row['faknum'] ?>
										</td>
										<td style="text-transform: uppercase;font-size: 12px;">
                                                <?php echo $row['spknum'];?>
										</td>
										<td style="text-transform: uppercase;font-size: 12px;"><?php echo $row['segment'];?><br><small class="text-muted"><?php echo $row['amuser'] ?></small></td>
										<td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
										<td class="text-right js-sweetalert">
											<?php $nav = array('1','2','3','4','6'); ?>
											<?php if(in_array($group, $nav)) { ?>
												<?php $navrole = array('1','2','3','4','5','6','7'); ?>
												<?php if(in_array($role, $navrole)) { ?>
													<?php if ($row['orderid'] != '0' ) { ?>
													<small class="badge text-bg-info fs-1"><?php echo $row['countspb'];?></small>
													<?php } else { ?>
													<small class="badge text-bg-info fs-1">0</small>
													<?php } ?>
													<?php if($row['jobtype'] == 'TK'){ ?>
														<a href="javascript:" class="badge text-bg-danger fs-1" disabled=""><i> TKBW</i></a>
													<?php }elseif($row['jobtype'] == 'SM'){ ?>
														<a href="javascript:" class="badge text-bg-danger fs-1" disabled=""><i> RENT CAR</i></a>
													<?php }else{ ?> 
														<?php if($row['countspb'] == '0') { ?>
															<a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn mb-1 bg-light-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="SPB">
																<i class="fs-4 ti ti-mail-opened text-info"></i>
															</a>
														<?php } elseif($row['countspb'] > '0') { ?>
															<?php if ($row['orderid'] != '0' ) { ?>
															<a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="+ SPB">
																<i class="fs-4 ti ti-mail text-info"></i>
															</a>
															<?php } else { ?>
															<a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn mb-1 bg-light-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="SPB">
																<i class="fs-4 ti ti-mail-opened text-info"></i>
															</a>
															<?php } ?> 
														<?php } ?>
													<?php } ?> 

													<a href="<?php echo base_url().$this->router->fetch_class(). '/editnopes/'.$row['orderid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Edit">
														<i class="fs-4 ti ti-edit text-warning"></i>
													</a>
													<?php $navrole = array('1','2','4'); ?>
													<?php if(in_array($role, $navrole)) { ?>
														<button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['orderid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" onclick="sweet()" data-bs-toggle="tooltip" title="Delete">
														<i class="fs-4 ti ti-trash text-danger"></i>
														</button>
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
				<div class="card-footer">
					<button type="button" class="btn btn-primary rounded-pill px-4 waves-effect waves-light" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>';return false;">Back</button>
				</div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollX'	  : true
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
<div id="modal_details" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;"></h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>

    </div>
</div>