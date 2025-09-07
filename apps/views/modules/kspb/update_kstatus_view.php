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
                        <li class="breadcrumb-item" aria-current="page">Payment Confirmation</li>
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

<?php if ($status == '1') { ?>
	<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
		This SPB has been paid to the bank by the Finance Staff. Click the back button at the bottom to return to the SPB list or click the Finish button if you have changed the form.
	</div>	
<?php } elseif ($status == '9') { ?>
	<div class="alert alert-danger alert-dismissible bg-warning text-white border-0 fade show" role="alert">
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
		This SPB is being processed for payment to the bank by the Finance Staff. Fill in the form below to confirm if you have made a payment. Click the Done button at the bottom to confirm payment.
	</div>	
<?php } elseif ($status == '0') { ?>
	<div class="alert customize-alert alert-dismissible text-secondary alert-light-secondary bg-secondary-subtle fade show remove-close-icon" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<div class="d-flex align-items-center font-medium me-3 me-md-0">
		  <i class="ti ti-info-circle fs-5 me-2 text-secondary"></i>
		  This SPB has not been confirmed by the Board.
		</div>
	</div>
<?php } ?> 

<div class="row">
    <div class="col-12">
        <div class="card">
			<div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
				<h4 class="card-title text-white mb-0">Payment Confirmation</h4>
			</div>
            <?php echo form_open_multipart('kspb/updatestatus');?>
            <?php echo form_hidden('hdnSpbid',$id); ?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">SPB Details</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPB</label>
                            <input name="txtKodenomor" type="text" class="form-control" value="<?php echo $kodenomor; ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPB Date</label>
                            <input name="txtKodenomor" type="text" class="form-control" value="<?php echo $tglspb; ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Customer Name</label>
                            <input type="text" class="form-control" value="<?php echo $segmen ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Payment Method</label>
                            <select name="optPayment" class="form-control selectpicker" disabled>
                                <option disabled>Select</option>
                                <option value="cash" <?php if($jenisbayar == 'cash') echo 'selected' ?> >CASH</option>
                                <option value="transfer" <?php if($jenisbayar == 'transfer') echo 'selected' ?>>TRANSFER</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Account Name</label>
                            <input type="text" class="form-control" value="<?php echo $anrek ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Account Number</label>
                            <input name="txtAccnum" type="text" class="form-control" value="<?php echo $norek ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Bank</label>
                            <select name="optBank" class="form-control selectpicker" disabled>
                                <option value=" " <?php if($bank == 0) echo 'selected' ?>>Select</option>
                                <option value="bca" <?php if($bank == 'bca') echo 'selected' ?>>BCA</option>
                                <option value="mandiri" <?php if($bank == 'mandiri') echo 'selected' ?>>MANDIRI</option>
                                <option value="bni" <?php if($bank == 'bni') echo 'selected' ?>>BNI</option>
                                <option value="bri" <?php if($bank == 'bri') echo 'selected' ?>>BRI</option>
                                <option value="other" <?php if($bank == 'other') echo 'selected' ?>>OTHER</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Other Bank</label>
                            <input name="txtBankother" type="text" class="form-control" value="<?php echo $banklain ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Transaction Status</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Confirm Payment</label>
                                <select name="optStatus" class="form-control selectpicker" style="width: 100%">
                                    <option disabled>Select</option>
                                    <?php $sess = $this->session->userdata();?>
                                    <?php if($sess['role'] == 1 || $sess['role'] == 2): ?>
                                        <option value="0" <?php if($status == '0') echo 'selected' ?>>Pending</option>
                                    <?php endif;?>
                                    <option value="1" <?php if($status == '1') echo 'selected' ?> >Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Process Date</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                    <input name="txtDate" type="date" class="form-control datepicker" value="<?php echo date('Y-m-d', strtotime($tglproses)); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Process Time</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-clock"></i></div>
                                        <input name="txtTime" type="text" class="form-control timepicker" value="<?php echo date('H:i');?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Upload Proof of Transaction</label>
                                <input type="file" name="txtFile" class="form-control file" />
                                <?php echo form_error('txtFile'); ?>
                                <?php echo $this->session->flashdata('error_doupload');?>
                            </div>
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
            <?php echo form_close();?>
        </div>
    </div>
</div>

<script>
	$(function() {
		$('.timepicker').timepicker({
			showInputs: false
		});

		$('.selectpicker').select2();
	});
</script>