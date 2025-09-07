<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Logistics</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('letter');?>">Company Asset</a>
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
        <?php echo form_open('assets/search');?>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Product</label>
                        <input name="txtName" type="text" class="form-control">
                    </div>
					<div class="form-group mb-4">
						<label class="form-label fw-semibold">Brand</label>						
						<select name="optBrand" class="form-control selectpicker">
							<option disabled selected>Select</option>
							<?php
							
							if(!empty($brandname)){
								foreach($brandname as $row){ 
									if (!empty($brandname) && $brandname == $row['astbrandid'] ) {
									$strselected = "selected";
									} else {
										$strselected = " ";
									}
									echo '<option value="'.$row['astbrandid'].'"'. $strselected.'>'.$row['brandname'].'</option>';
								}
							}else{
								echo '<option value="">Brand not available</option>';
							}
						?> 
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label class="form-label fw-semibold">Category</label>
						<select name="optCategory" class="form-control selectpicker">
							<option disabled selected>Select</option>
							<?php
							
							if(!empty($cat)){
								foreach($cat as $row){ 
									if (!empty($cat) && $cat == $row['astcategoryid'] ) {
									$strselected = "selected";
									} else {
										$strselected = " ";
									}
									echo '<option value="'.$row['astcategoryid'].'"'. $strselected.'>'.$row['categoryname'].'</option>';
								}
							}else{
								echo '<option value="">Category not available</option>';
							}
						?> 
						</select>
					</div>
					<div class="form-group mb-4">
						<label class="form-label fw-semibold">Type</label>
						<select name="OptType" class="form-control selectpicker">
							<option disabled selected>Select</option>
							<?php
							
							if(!empty($type)){
								foreach($type as $row){ 
									if (!empty($type) && $type == $row['astypeid'] ) {
									$strselected = "selected";
									} else {
										$strselected = " ";
									}
									echo '<option value="'.$row['astypeid'].'"'. $strselected.'>'.$row['typename'].'</option>';
								}
							}else{
								echo '<option value="">Type not available</option>';
							}
						?> 
						</select>
					</div>
				</div>
            </div>
            <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i> Submit
                </div>
            </button>
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
                        <a href="<?php echo base_url().$this->router->fetch_class().'/add'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%"> 
                                <thead>
									<tr>
										<th>No</th>
										<th>Category</th>
										<th>Product</th>
										<th>Year</th>
										<th>Total</th>
										<th>User</th>
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
										<td><span class="label label-primary"><?php echo $row['typename'] ?></span></td>
										 <td>
											<a href="<?php echo base_url().$this->router->fetch_class(). '/detail/'.$row['assetid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['series'] ?></strong></a>
											<p>SN : <?php echo $row['serialnumber'] ?></p>
										 </td>										 
										 <td><?php echo $row['assetdate'] ?></td>
										 <td><?php echo $row['amount'] ?></td>
										 <td><?php echo $row['user'] ?></td>
										 <td><?php if($row['status'] == '1'){ ?>
												<span class="badge fw-semibold py-1 w-85 bg-success-subtle text-success">Available</span>
											<?php } elseif($row['status'] == '2') { ?>
												<span class="badge fw-semibold py-1 w-85 bg-info-subtle text-info">On Use</span>
											<?php } elseif($row['status'] == '3') { ?>
												<span class="badge fw-semibold py-1 w-85 bg-warning-subtle text-warning">Sold</span>
											<?php } else { ?>
												<span class="badge fw-semibold py-1 w-85 bg-danger-subtle text-danger">Not Available</span>
											<?php } ?>
										 </td>
										<td class="text-right js-sweetalert">
											<a href="<?php echo site_url('softsubs/edit/'.$row['assetid']);?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row">
												<i class="fs-4 ti ti-edit text-warning"></i>
											</a>
											<button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['assetid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center delete-row">
												<i class="fs-4 ti ti-trash text-danger"></i>
											</button>
										</td>
									</tr>
								<?php }	?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Category</th>
										<th>Product</th>
										<th>Year</th>
										<th>Total</th>
										<th>User</th>
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
                [25, 50, -1],
                [25, 50, "All"]
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
        var current_url = "<?php echo base_url("assets");?>";
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
                    data: 'assetid=' + id,
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