<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Settings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('targetam');?>">Customers</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Edit</li>
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
<?php echo form_open_multipart('segment/edit');?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Edit Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Customer Detail</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="optDivision" class="form-label fw-semibold">Division</label>
                            <select name="optDivision" id="optDivision" class="form-select" >
								<option disabled selected>Select</option>
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
						<div class="mb-4">				
                            <label for="txtCode" class="form-label fw-semibold">Initial</label>			
                            <input name="txtCode" type="text" class="form-control" value="<?php echo $kode ?>">
						</div>
						<div class="mb-4">							
                            <label for="txtName" class="form-label fw-semibold">Name</label>	
                            <input name="txtName" type="text" class="form-control" value="<?php echo $nama ?>">
						</div>
						<div class="mb-4">						
                            <label for="optAm" class="form-label fw-semibold">Account Manager</label>
                            <select name="optAm" id="optAm" class="form-select" >
                                <option disabled selected>Select</option>
                                    <?php

                                    if(!empty($useram)){
                                        foreach($useram as $row){
                                            if (!empty($useramid) && $useramid == $row['userid'] ) {
                                                $strselected = "selected";
                                            } else {
                                                $strselected = " ";
                                            }
                                            echo '<option value="'.$row['userid'].'"'. $strselected .'>'.$row['fullname'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="">AM Name not available</option>';
                                    }
                                    ?>
                            </select>
						</div>
						<div class="mb-4">
                            <label for="optPriority" class="form-label fw-semibold">Priority</label>
							<select name="optPriority" class="form-select">
								<option disabled selected>Select</option>
								<option value="1" <?php if($prioritas == '1') echo 'selected' ?>>High</option>
								<option value="2" <?php if($prioritas == '2') echo 'selected' ?>>Medium</option>
								<option value="3" <?php if($prioritas == '3') echo 'selected' ?>>Low</option>
								<option value="4" <?php if($prioritas == '4') echo 'selected' ?>>Standard</option>
							</select>
						</div>
						<div class="mb-4">
                            <label for="optStatus" class="form-label fw-semibold">Status</label>
							<select name="optStatus" class="form-select">
								<option value="1" <?php if($status == '1') echo 'selected' ?>>Active</option>
								<option value="2" <?php if($status == '1') echo 'selected' ?>>Inactive</option>
							</select>
						</div>						
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">
                        Submit
                    </button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>