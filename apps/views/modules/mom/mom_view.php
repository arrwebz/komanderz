<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9"> 
                <h4 class="fw-semibold mb-8">Minutes of Meeting</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('mom');?>">Data</a>
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
        <?php echo form_open('mom/search');?>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Title</label>
                        <input name="txtTitle" type="text" class="form-control">
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
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/addmom'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap table-hover" style="width: 100%"> 
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Agenda</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr style="font-size: 12px;">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['title'];?></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td>
                                                <?php echo customDate($row['mdate'].' 00:00:00'); ?>
                                                <br><?php echo $row['mtime']; ?>
                                            </td>
                                            <td>
											<?php 
												$stragenda = $row['agenda'];
												if( strlen( $stragenda ) > 50 ) {
												$stragendas = substr( $stragenda, 0, 50 ) . '...';
												echo $stragendas; 
											} ?>
											</td>
                                            <td class="text-right js-sweetalert">
													<a href="<?php echo site_url('mom/pdfmom/'.$row['momid']);?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Pdf">
                                                        <i class="fs-4 ti ti-file text-info"></i>
                                                    </a>
                                                <?php $sess = $this->session->userdata();?>
                                                <?php if($sess['role'] == 1): ?>
                                                    <a href="<?php echo site_url('mom/editmom/'.$row['momid']);?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fs-4 ti ti-edit text-warning"></i>
                                                    </a>
                                                    <button type="button" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center delete-row" data-bs-toggle="tooltip" title="Delete"
													data-id="<?php echo $row['momid'];?>" data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>">
                                                        <i class="fs-4 ti ti-trash text-danger"></i>
                                                    </button>
                                                <?php endif; ?>
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
		var current_url = "<?php echo base_url("mom");?>";
		var uri = $(this).attr("data-href");
		var id = $(this).attr("data-id");
		showCancelMessage(current_url,uri,id);
	});

	function showCancelMessage(current_url, uri, id){
		swal({
			title: "Are you sure?",
			text: "",
			icon: "warning",
			buttons: ["Cancel", "Delete!"],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {

				swal("You have successfully deleted this data forever", {
					icon: "success",
					buttons: false
				});

				$.ajax({
					url: uri,
					data: 'momid=' + id,
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