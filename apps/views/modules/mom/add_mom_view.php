<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Minutes of Meeting</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('mom');?>">Mom</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Add Form</li>
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

<?php echo validation_errors(); ?>

<?php echo form_open('mom/addmom');?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">MoM</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Title</label>
                            <input name="txtTitle" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Date</label>
                            <input name="txtMdate" type="date" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Type Of Meeting</label>
                            <input name="txtTom" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Meeting Called By</label>
                            <input name="txtInstructor" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Attendees</label>
                            <input name="txtAttd" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Location</label>
                            <input name="txtLocation" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Time</label>
                            <input name="txtMtime" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Customer</label>
                            <input name="txtCustomer" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Facilitator</label>
                            <input name="txtFacilitator" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <h5 class="fs-4 fw-semibold mb-4">Detail MoM</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Agenda</label>
                            <textarea name="txtAgenda" class="form-control tinyContent" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
				<div class="row">					
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Discussion & Agreement Result</label>
                            <textarea name="txtDaresult" class="form-control tinyContent" cols="30" rows="10"></textarea>
                        </div>
                    </div>
				</div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>

<script>
	var tinymce_uri = "<?php echo $this->config->item('template_uri');?>";
	$(function() {
		$('.selectpicker').select2();
	});
</script>