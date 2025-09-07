<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9"> 
                <h4 class="fw-semibold mb-8">Settings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('user');?>">User Account</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Cog.png" alt="" class="img-fluid mb-n4">
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
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/add'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/download'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4"> Download</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%"> 
                                <thead>
								<tr>
									<th>No</th>
									<th>Username</th>
									<th>Full Name</th>
									<th>Division</th>
									<th>Authorize</th>
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
										<td><?php echo $row['username'] ?></td>
										<td style="text-transform: uppercase;"><?php echo $row['fullname'] ?></td>
										<td><?php echo $row['groupcode'] ?></td> 
										<td><?php echo $row['rolecode'] ?></td>
										<td><?php if($row['status'] == '1'){ ?>
												<span class="label label-success">Active</span>
											<?php } else { ?>
												<span class="label label-danger">Inactive</span>
											<?php } ?>
										</td>
										<td class="text-right js-sweetalert">
											<a href="<?php echo base_url().$this->router->fetch_class(). '/edit/'.$row['userid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row">
												<i class="fs-4 ti ti-edit text-warning"></i>
											</a>
											<button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['userid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center delete-row">
												<i class="fs-4 ti ti-trash text-danger"></i>
											</button>
										</td>
									</tr>
								<?php }	?>
								</tbody>
								<tfoot>
								<tr>
									<th>No</th>
									<th>Username</th>
									<th>Full Name</th>
									<th>Division</th>
									<th>Authorize</th>
									<th>Status</th>
									<th class="disabled-sorting text-right"></th>
								</tr>
								</tfoot>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
	});

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url("user");?>";
		var uri = $(this).attr("data-href");
		var id = $(this).attr("data-id");
		showCancelMessage(current_url,uri,id);
	});

	function showCancelMessage(current_url, uri, id){
		swal({
			title: "Are you sure?",
			text: "",
			icon: "warning",
			buttons: ["Cancel", "Delete"],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {

				swal("You have successfully deleted this data forever", {
					icon: "success",
					buttons: false,
				});


				$.ajax({
					url: uri,
					data: 'userid=' + id,
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