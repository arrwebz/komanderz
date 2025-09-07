<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('kspb');?>">KOMET</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">SPB Details</li>
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
<div class="row">
	<div class="col-lg-8 d-flex align-items-stretch">
	  <div class="card w-100 bg-info-subtle overflow-hidden shadow-none">
		<div class="card-body position-relative">
		  <div class="row">
			<div class="col-sm-7">
			  <div class="d-flex align-items-center mb-7">
				<h5 class="fw-semibold mb-0 fs-5">Hardcopy of SPB progress</h5>
			  </div>
			  <div class="d-flex align-items-center">
				<div class="border-end pe-4 border-muted border-opacity-10">
				  <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><?php echo $segmen ?></h3>
				</div>
				<div class="ps-4">
				  <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><?php echo $totspb ?> SPB</h3>
				</div> 
			  </div>
			</div>
			<div class="col-sm-5">
			  <div class="welcome-bg-img mb-n7 text-end">
				<img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Spb.png" alt="" class="img-fluid">
			  </div>
			</div>
			<div class="pad margin no-print">
			<br> 
			<?php if($status == '1') { ?> 
				<h4>SPB Paid</h4>
					<div class="progress bg-success-subtle mt-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-success progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
					</div>				
				<?php } else { ?> 
				<h6>Waiting for budget cashflow</h6>
					<div class="progress bg-warning-subtle mt-2 mb-2" style="height: 15px"> 
					  <div class="progress-bar progress-bar-striped text-bg-warning progress-bar-animated" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 50%">50%</div>
					</div>
				<?php } ?>	
			</div>
		  </div>
		</div>
		<div class="card-footer">
			<h4><strong><?php echo $kodenomor ?></strong></h4>
			<p><a target="blank_" href="<?php 
			if ($orderinv == '1') {
				$path = 'knopes'; } else { $path = 'kprpo'; } 
			echo base_url().$path. '/details/'.$orderid; ?>" class="link-danger link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">
			<i class="ti ti-file-invoice"></i> <?php echo $inv ?></a>
			<br/><small>Rp <?php if ($orderinv == '1') echo $nilaidasar; else echo $nilaijst; ?></small></p>
		</div>
	  </div>
	</div>
	<div class="col-lg-3 col-md-6">
	  <div class="card overflow-hidden">
		<div class="d-flex flex-row">
		  <div class="p-3 bg-warning-subtle">
			<h3 class="text-warning box mb-0">
			  <i class="ti ti-award"></i>
			</h3>
		  </div>
		  <div class="p-3">
			<h3 class="text-warning mb-0 fs-6">Rp <?php echo $nilai ?></h3>
			<small class="text-muted">SPB Value</small>
		  </div>
		</div>
	  </div>
	  <div class="card overflow-hidden">
		<div class="d-flex flex-row">
		  <div class="p-3 bg-primary-subtle">
			<h3 class="text-primary box mb-0">
			  <i class="ti ti-receipt"></i>
			</h3>
		  </div>
		  <div class="p-3">
			<a href="<?php echo base_url().$this->router->fetch_class();?>/voucher/<?php echo $id; ?>" class="btn btn-sm waves-effect waves-light btn-outline-danger">Print Voucher</a>
		  </div>
		</div>
	  </div>
	  <div class="card overflow-hidden">
		<div class="d-flex flex-row">
		  <div class="p-3 bg-info-subtle">
			<h3 class="text-info box mb-0">
			  <i class="ti ti-file"></i>
			</h3>
		  </div>
		  <div class="p-3">
			<a href="<?php echo base_url().$this->router->fetch_class();?>/preview/<?php echo $id; ?>" class="btn btn-sm waves-effect waves-light btn-outline-info">Print SPB</a>
		  </div>
		</div>
	  </div>
	</div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Partner Payouts</h4>
                </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">SPB Details</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Types of Work</label>
                            <input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $jobtype ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">SPB</label>
                            <input type="text" class="form-control" value="<?php echo $kodenomor ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Payment to</label>
                            <input type="text" class="form-control" value="<?php echo $kepada ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">For Payment</label>
                            <textarea name="txtInfo" type="text" class="form-control" style="height:183px;" disabled><?php echo $ket ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Payment Information</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">SPB Value</label>
                            <input type="text" class="form-control" value="Rp. <?php echo $nilai ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">SPB Date</label>
                            <input type="text" class="form-control" value="<?php echo $tglspb ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Payment Method</label>
                            <input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $jenisbayar ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Payment Date</label>
                            <input type="text" class="form-control" value="<?php echo $tglproses ?>" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Account Name</label>
                            <input type="text" class="form-control" value="<?php echo $anrek ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Account Number</label>
                            <input type="text" class="form-control" value="<?php echo $norek ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Bank</label>
                            <input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $bank ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Other Bank</label>
                            <input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $banklain ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-xs-12">
	Created by: <?php echo $buat; ?>, <?php echo $tglbuat; ?><br><br>
	<?php if($edit != 0){ ?>
	Edited by: <?php echo $edit; ?>, <?php echo $tgledit; ?><br><br>
	<?php } ?>
	  <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">Back</a>  
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Form Surat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?php echo $this->config->item('uploads_uri').$this->router->fetch_class().'/'.$img?>" style="width:100%;max-width:300px"/>
            </div>
            <div class="modal-footer">
                <a class="btn btn-sm btn-white btn-pure" data-bs-dismiss="modal" href="javascript:void(0)">Close</a>
            </div>
        </div>

    </div>
</div>