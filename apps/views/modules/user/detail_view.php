<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class = "form-horizontal">
            <div class="card-header card-header-text" data-background-color="red">
                <h4 class="card-title">Form Edit User</h4>
            </div>
            <div class="card-content"> 
				<div class="row">
					<label class="col-sm-2 label-on-left">Role</label>
					<div class="col-sm-3">
						 <div class="form-group">
							<label class="control-label"></label>
							<p><?php echo $rolename ?></p>
						</div>
					 </div>
				</div>
				<div class="row">
                    <label class="col-sm-2 label-on-left">Username</label>
                   <div class="col-sm-3">
						 <div class="form-group">
							<label class="control-label"></label>
							<p><?php echo $username ?></p>
						</div>
					 </div>
                </div>
				<div class="row">
                    <label class="col-sm-2 label-on-left">Password</label>
                    <div class="col-sm-3">
						 <div class="form-group">
							<label class="control-label"></label>
							<p>******</p>
						</div>
					 </div>
                </div>
				<div class="row">
                    <label class="col-sm-2 label-on-left">Email</label>
                   <div class="col-sm-3">
						 <div class="form-group">
							<label class="control-label"></label>
							<p><?php echo $email ?></p>
						</div>
					 </div>
                </div>
				<div class="row">
                    <label class="col-sm-2 label-on-left">Full Name</label>
                  <div class="col-sm-3">
						 <div class="form-group">
							<label class="control-label"></label>
							<p><?php echo $realname ?></p>
						</div>
					 </div>
                </div>
				<div class="row">
					 <label class="col-sm-2 label-on-left">Profile Picture</label>
					  <div class="col-sm-3">
						 <div class="form-group">
						   <label class="control-label"></label>
							<img style="height:32px; width: 32px;" src="<?php echo $this->config->item('uploads_uri').$this->router->fetch_class().'/'.$photo ?>">
							<p><?php echo $photo ?></p>
						  </div>
						</div>
				 </div>
				<div class="row">
					<label class="col-sm-2 label-on-left">Status Aktif?</label>
					<div class="col-sm-3">
						 <div class="form-group">
							<label class="control-label"></label>
							<p><?php if($status == '0') echo 'No'; else echo 'Yes'?></p>
						</div>
					 </div>
				</div>
                <br/><br/><br/>
                <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>user';return false;">Back</button>

            </div>
            </div>		
        </div>
    </div>
</div>