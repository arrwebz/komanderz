<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('kspb');?>">SPB</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Search</li>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Daftar SPB Komet</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order Type</th>
                                    <th>SPB</th>
                                    <th>Invoice</th>
                                    <th>Year</th>
                                    <th>Payment To</th>
                                    <th>Method</th>
                                    <th>Value</th>
                                    <th>Date</th>
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
										<?php if($row['orderstatus'] == 'NOPES'){ ?>
										<span class="mb-1 badge text-bg-success" style="font-size: 10px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'PADI') { ?>
										<span class="mb-1 badge text-bg-secondary" style="font-size: 10px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'IBL') { ?>
										<span class="mb-1 badge text-bg-warning" style="font-size: 10px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'OBL') { ?>
										<span class="mb-1 badge text-bg-primary" style="font-size: 10px;"><?php echo $row['orderstatus'] ?></span>
										<?php } else { ?>
										<span class="mb-1 badge text-bg-dark" style="font-size: 10px;">PRPO</span>
										<?php } ?>
										</td>
                                        <td style="text-transform: uppercase;"> 
										<a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['spbid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code'] ?></strong></a>
										</td>
                                        <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                                        <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">'.date('Y', strtotime($row['crdat'])).'</i>'; else echo '<p style="color:green;">'.date('Y', strtotime($row['invdate'])).'</p>';  ?></td>
                                        <td>
                                            <small class="text-muted"><?php echo $row['segment'] ?></small>
                                            <br/><?php echo $row['customer'] ?>
                                            <small><br/><?php
                                                if($row['typeofpayment'] == 'transfer'){
                                                    echo ucfirst($row['bank']). ucfirst($row['bankother']) .' :<br>'.$row['accnumber'];
                                                }else{
                                                    echo strtoupper($row['typeofpayment']);
                                                }
                                                ?>
                                            </small>
                                        </td>
										<td><?php if($row['typeofpayment'] == 'transfer') { ?>											
											<span class="mb-1 badge font-medium bg-info-subtle text-info" style="font-size: 10px;"><?php echo $row['typeofpayment'];?></span>
											<?php }else{ ?>
											<span class="mb-1 badge font-medium bg-success-subtle text-success" style="font-size: 10px;"><?php echo $row['typeofpayment'];?></span>
											<?php } ?>
										</td>
                                        <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></strong></td>                                        
										<td><?php echo date('d-m-Y', strtotime($row['spbdat']));?></td>                                        
                                        <td class="text-right js-sweetalert"> 
                                            <strong></strong><br/>
                                            <?php $nav = array('1','2','3','4','5','6'); ?>
                                            <?php if(in_array($group, $nav)) { ?>
                                                <?php $navrole = array('1','2','3','4','5','6','7'); ?>
                                                <?php if(in_array($role, $navrole)) { ?>
                                                    <?php if($row['status'] == '0') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-light-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            Waiting
                                                        </a>
                                                    <?php } elseif($row['status'] == '2') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-warning-subtle text-warning btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            Processed
                                                        </a>
                                                    <?php } elseif($row['status'] == '1') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-success-subtle text-success btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            Done
                                                        </a>
                                                    <?php } elseif($row['status'] == '3') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-info-subtle text-info btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            Approved
                                                        </a>
                                                    <?php } ?>
                                                    <?php $navrole = array('1','2'); ?>
                                                    <?php if(in_array($role, $navrole)) { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/editspb/'.$row['spbid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            <i class="fs-4 ti ti-edit text-warning"></i>
                                                        </a>
                                                        <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['spbid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
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
                        <?php } else { echo 'Data tidak ditemukan!'; }?>
                    </div>
                </div>

                <div class="card-footer">
                    <?php echo form_open('kspb/export');?>
                    <?php echo form_hidden('hdnSegment',$segment); ?>
                    <?php echo form_hidden('hdnSpbyear',$spbyear); ?>
                    <?php echo form_hidden('hdnSpbmonth',$spbmonth); ?>
                    <?php echo form_hidden('hdnSpbnum',$spbnum); ?>
					<div class="row">
						<div class="col-md-6">
                        <a class="btn btn-primary rounded-pill px-4 waves-effect waves-light" href="<?php echo base_url().$this->router->fetch_class();?>">
                            Back
                        </a>
						</div>
						<div class="col-md-6 text-right">
                        <button type="submit" name="btnSubmit" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4 mb-6">
                            <i class="ti ti-download"></i> Excel
                        </button>
						</div>
					</div>
                    <?php echo form_close();?>
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
		var current_url = "<?php echo base_url("kspb");?>";
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
					data: 'spbid=' + id,
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