<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Settings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('targetam');?>">User Account</a>
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

<?php echo form_open_multipart('user/edit', 'class = "form-horizontal"');?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Edit Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
				<?php echo form_hidden('hdnId',$useraccountid); ?>
				<?php echo form_hidden('hdnPhoto',$userphoto); ?>
				<?php echo form_hidden('hdnOldpassword',$password); ?>
                <h5 class="fs-4 fw-semibold mb-4">Detail</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtNik" class="form-label fw-semibold">NIK</label>
                            <input name="txtNik" type="text" class="form-control" value="<?php echo $nik ?>">
                        </div>
                        <div class="mb-4">
                            <label for="txtUsername" class="form-label fw-semibold">Username</label>
							<input name="txtUsername" type="text" class="form-control" value="<?php echo $username ?>">
                        </div>
                        <div class="mb-4">
                            <label for="txtEmail" class="form-label fw-semibold">Email</label>
							<input name="txtEmail" type="email" class="form-control" value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtFullname" class="form-label fw-semibold">Full Name</label>
							<input name="txtFullname" type="text" class="form-control" value="<?php echo $realname ?>">
                        </div>
                        <div class="mb-4">
                            <label for="txtPassword" class="form-label fw-semibold">Password</label>
							<input name="txtPassword" type="text" class="form-control" placeholder="Create new password">							
                        </div>
                        <div class="mb-4">
                            <label for="txtTelp" class="form-label fw-semibold">Phone</label>
							<input name="txtTelp" type="text" class="form-control" value="<?php echo $telp ?>">
                        </div>					
					</div>
                </div>
            </div>
            <div class="card-body p-4">
                <h5 class="fs-4 fw-semibold mb-4">Information</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtPosition" class="form-label fw-semibold">Position</label>
							<input name="txtPosition" type="text" class="form-control" value="<?php echo $userposition ?>">
                        </div>
                        <div class="mb-4">
                            <label for="txtJoindate" class="form-label fw-semibold">Join Date</label>
							<input name="txtJoindate" type="date" class="form-control" value="<?php echo $userjoindate ?>">
                        </div>
                        <div class="mb-4">
                            <label for="txtPhoto" class="form-label fw-semibold">Photo</label>
							<input type="file" name="txtPhoto" class="form-control" id="formFile"> 
								<span class="help-block"> 
								<?php echo form_error('txtPhoto'); ?>
								<?php echo $this->session->flashdata('error_doupload');?>
								</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4"> 
                            <label for="optGroup" class="form-label fw-semibold">Group</label>
							<select name="optGroup" id="optGroup" class="form-select selectpicker" >
								<option disabled selected>Select</option>
								<?php	
										
									if(!empty($usergroup)){
										foreach($usergroup as $row){ 
											if (!empty($groupid) && $groupid == $row['groupid'] ) {
												$strselected = "selected";
											} else {
												$strselected = " ";
											}
											echo '<option value="'.$row['groupid'].'"'. $strselected .'>'.$row['name'].'</option>';
										}
									}else{
										echo '<option value="">User role not available</option>';
									}
								?> 
							</select>
                        </div>
                        <div class="mb-4">
                            <label for="optRole" class="form-label fw-semibold">Authority</label>
							<select name="optRole" id="optRole" class="form-select selectpicker" >
								<option disabled selected>Select</option>
								<?php	
										
									if(!empty($userrole)){
										foreach($userrole as $row){ 
											if (!empty($roleid) && $roleid == $row['roleid'] ) {
												$strselected = "selected";
											} else {
												$strselected = " ";
											}
											echo '<option value="'.$row['roleid'].'"'. $strselected .'>'.$row['name'].'</option>';
										}
									}else{
										echo '<option value="">User role not available</option>';
									}
								?> 
							</select>
                        </div>
						<div class="mb-4">
                            <label for="optStatus" class="form-label fw-semibold">Status</label>
							 <select name="optStatus" class="form-select selectpicker">
									 <option disabled selected>Select</option>
									 <option value="1" <?php if($status == '1') echo 'selected' ?>>Active</option>
									 <option value="0" <?php if($status == '0') echo 'selected' ?>>Inactive</option>
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

<script type="text/javascript">
					 
	$(document).ready(function() {
		$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
						
		$('.selectpicker').select2();
	});
</script>