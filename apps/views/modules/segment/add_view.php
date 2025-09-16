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
                        <li class="breadcrumb-item" aria-current="page">Add</li>
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

<?php echo form_open_multipart('segment/add', 'class = "form-horizontal"');?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
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
                            <input name="txtCode" type="text" class="form-control" placeholder="Ex: TEST">
						</div>
						<div class="mb-4">							
                            <label for="txtName" class="form-label fw-semibold">Name</label>	
                            <input name="txtName" type="text" class="form-control" placeholder="Ex: PT. Testing Indonesia">
						</div>
                        <div class="mb-4">							
                            <label for="txtAddress" class="form-label fw-semibold">Alamat</label>	
                            <input name="txtAddress" type="text" class="form-control" placeholder="Ex: Jl. Testing No.1, Jakarta">
						</div>
						<div class="mb-4">						
                            <label for="optAm" class="form-label fw-semibold">Account Manager</label>
                            <select name="optAm" id="optAm" class="form-select" >
                                <option disabled selected>Select</option>
                                <option value="21">Isnanza Zulkarnaini</option>
                                <option value="37">Eva Ayu Komala</option>
                                <option value="36">Vania Miranda Putri</option>
                                <option value="30">Sigit Hidayatullah</option>
                                <option value="47">Muhammad Sihi Bartono Putro</option>
                            </select>
						</div>
						<div class="mb-4">
                            <label for="optPriority" class="form-label fw-semibold">Priority</label>
							<select name="optPriority" class="form-select">
								<option disabled selected>Select</option>
								<option value="1">High</option>
								<option value="2">Medium</option>
								<option value="3">Low</option>
								<option value="4">Standard</option>
							</select>
						</div>
						<div class="mb-4">
                            <label for="optStatus" class="form-label fw-semibold">Status</label>
							<select name="optStatus" class="form-select">
								<option value="1">Active</option>
								<option value="2">Inactive</option>
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
