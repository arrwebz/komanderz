<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('mspb');?>">SPB</a>
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
                    <h4 class="card-title text-white mb-0">Daftar SPB MESRA</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor SPB</th>
                                    <th>Invoice</th>
                                    <th>Segmen</th>
                                    <th>Kepada</th>
                                    <th>Nilai</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>No. SPB</th>
                                    <th>Invoice</th>
                                    <th>Segmen</th>
                                    <th>Kepada</th>
                                    <th>Nilai</th>
                                    <th class="text-right"></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $drd as $row ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['spbid']; ?>" style="color: #00bcd4;"><?php echo $row['code'] ?></a></td>
                                        <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                                        <td><?php echo $row['segmentname'] ?></td>
                                        <td><?php echo $row['customer'] ?></td>
                                        <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></td>
                                        <td class="text-right js-sweetalert">
                                            <?php $nav = array('1','2','3','6'); ?>
                                            <?php if(in_array($group, $nav)) { ?>
                                                <?php $navrole = array('1','2','3','4','5','6','7'); ?>
                                                <?php if(in_array($role, $navrole)) { ?>
                                                    <?php if($row['status'] == '0') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-primary-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            Menunggu Konfirmasi
                                                        </a>
                                                    <?php } elseif($row['status'] == '2') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            SPB Diproses
                                                        </a>
                                                    <?php } elseif($row['status'] == '1') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            SPB Selesai
                                                        </a>
                                                    <?php } elseif($row['status'] == '3') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            SPB Approved
                                                        </a>
                                                    <?php } ?>
                                                    <?php $navrole = array('1','2','4','5'); ?>
                                                    <?php if(in_array($role, $navrole)) { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/editspb/'.$row['spbid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            <i class="fs-4 ti ti-edit text-warning"></i>
                                                        </a>
                                                        <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['spbid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" onclick="sweet()">
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
                    <div class="col-md-12">
                        <?php echo form_open('kspb/export');?>
                        <?php echo form_hidden('hdnSegment',$segment); ?>
                        <?php echo form_hidden('hdnSpbyear',$spbyear); ?>
                        <?php echo form_hidden('hdnSpbmonth',$spbmonth); ?>
                        <?php echo form_hidden('hdnSpbnum',$spbnum); ?>
                        <button type="submit" name="btnSubmit" class="btn btn-success rounded-pill px-4 waves-effect waves-light">
                            <i class="ti ti-download"></i> Excel</button>
                        <?php echo form_close();?>
                        <a class="btn btn-light rounded-pill px-4 waves-effect waves-light" href="<?php echo base_url().$this->router->fetch_class();?>">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	$(function() {
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
		var current_url = "<?php echo base_url("mspb");?>";
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