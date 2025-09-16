<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Billing</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('orderam');?>">KOMET</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Invoice Details</li>
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
				<h5 class="fw-semibold mb-0 fs-5">Hardcopy of Invoice progress</h5>
			  </div>
			  <div class="d-flex align-items-center">
				<div class="border-end pe-4 border-muted border-opacity-10">
				  <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Position<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
				  <p class="mb-0 text-dark"><a target="blank_" href="<?php echo base_url().'ktrack/details/'.$id;?>" class="btn btn-sm waves-effect waves-light btn-outline-success">Tracking</a></p>
				</div>
				<div class="ps-4">
				  <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Payment<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
				  <p class="mb-0 text-dark"><a target="blank_" href="<?php echo base_url();?>/kbillco/details/<?php echo $id; ?>" class="btn btn-sm waves-effect waves-light btn-outline-success">Collection</a></p>
				</div> 
			  </div>
			</div>
			<div class="col-sm-5">
			  <div class="welcome-bg-img mb-n7 text-end">
				<img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Doc.png" alt="" class="img-fluid">
			  </div>
			</div>
			<div class="pad margin no-print">
			<br> 
			<?php if($statusinv == '11') { ?> 
				<h4>Invoice Sealed 10.000</h4>
					<div class="progress bg-light-subtle mt-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-info progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
					</div>
				<?php } elseif($statusinv == '12') { ?>
				<h4>Invoice Signed</h4>
					<div class="progress bg-light-subtle mt-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-info progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
					</div>
				<?php } elseif($statusinv == '2' || $statusinv == '13') { ?>
				<h4>Invoice on Customer</h4>
					<div class="progress bg-light-subtle mt-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-info progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
					</div>
				<?php } elseif($statusinv == '3' || $statusinv == '14') { ?>
				<h4>Invoice on Legal</h4>
					<div class="progress bg-light-subtle mt-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-warning progress-bar-animated" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45%</div>
					</div>
				<?php } elseif($statusinv == '4' || $statusinv == '15') { ?>
				<h4>Invoice on Legal</h4>
					<div class="progress bg-light-subtle mt-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-warning progress-bar-animated" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
					</div>
				<?php } elseif($statusinv == '5' || $statusinv == '16') { ?>
				<h4>Invoice on Logistic</h4>
					<div class="progress bg-light-subtle mt-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
					</div>
				<?php } elseif($statusinv == '6' || $statusinv == '18') { ?>
				<h4>Invoice on Finance Customer</h4>
					<div class="progress bg-light-subtle mt-2 mb-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-success progress-bar-animated" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
					</div>
				<?php } elseif($statusinv == '9') { ?>
				<h6>Invoice Cancelled</h6>
					<div class="progress bg-light-subtle mt-2 mb-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-danger progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
					</div>		
				<?php } elseif($statusinv == '1') { ?>
				<h6>Invoice Paid <i class="border-end pe-2 border-muted border-opacity-10"></i>&nbsp; <small><?php echo $novoucher ?></small>
					<i class="border-end pe-2 border-muted border-opacity-10"></i>&nbsp; <small><?php echo $vprodate ?></small></h6>
					<div class="progress bg-light-subtle mt-2 mb-2" style="height: 15px">
					  <div class="progress-bar progress-bar-striped text-bg-success progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
					</div> 
				<?php } else { ?> 
				<h6>Invoice Created on Accurate</h6>
					<div class="progress bg-light-subtle mt-2 mb-2" style="height: 15px"> 
					  <div class="progress-bar progress-bar-striped text-bg-info progress-bar-animated" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%">5%</div>
					</div>
				<?php } ?>	
			</div>
		  </div>
		</div>
		<div class="card-footer">
			<h4><strong><?php echo $statusorder ?></strong></h4>
			<p><i class="ti ti-file-invoice"></i> <?php echo $kodenomor ?></p>
		</div>
	  </div>
	</div>
	<div class="col-lg-3 col-md-6">
	  <div class="card overflow-hidden">
		<div class="d-flex flex-row">
		  <div class="p-3 bg-primary-subtle">
			<h3 class="text-primary box mb-0">
			  <i class="ti ti-receipt"></i>
			</h3>
		  </div>
		  <div class="p-3">
			<a href="<?php echo base_url().$this->router->fetch_class();?>/preview/<?php echo $id; ?>" class="btn btn-sm waves-effect waves-light btn-outline-danger">Print Invoice</a>
		  </div>
		</div>
	  </div>
	  <div class="card overflow-hidden">
		<div class="d-flex flex-row">
		  <div class="p-3 bg-info-subtle">
			<h3 class="text-info box mb-0">
			  <i class="ti ti-receipt-tax"></i>
			</h3>
		  </div>
		  <div class="p-3">
			<?php if(!empty($file)){ ?>
				  <a href="<?php echo $this->config->item('uploads_uri').'fakturpajak/padi/'.$id.'/'.$file;?>" class="btn btn-sm waves-effect waves-light btn-outline-info">Print Tax</a>
			  <?php } else { ?>
				<button class="btn btn-sm bg-info-subtle text-info" disabled>Please upload Tax file</button>
			  <?php } ?>			
		  </div>
		</div>
	  </div>
	</div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Detail Invoice</h4>
                </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Invoicing</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Invoice Number</label>
                            <input name="txtInvnum" type="text" class="form-control" value="<?php echo $inv ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Invoice Date</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtTglinv" type="text" class="form-control" value="<?php echo $tglinv ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tax Number</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-receipt-tax"></i> 
                                </div>
                                <input name="txtFaknum" type="text" class="form-control" value="<?php echo $fak ?>" disabled>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Delivery Date</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtTglkirim" type="text" class="form-control" value="<?php echo $tglkrm ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Order Information</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tel/SPK/VSO PADI</label>
                            <input name="txtNopesnomor" type="text" class="form-control" value="<?php echo $nomorspk ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPK Entry Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglmsknopes" type="text" class="form-control" value="<?php echo $tglmskspk ?>" disabled>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Order Type</label>
                            <input name="optOrderstatus" type="text" class="form-control" value="<?php echo $statusorder ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPK Date</label> 
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglnopes" type="text" class="form-control" value="<?php echo $tglspk ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Customer Detail</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Unit</label>
							<input name="optUnit" type="text" class="form-control" value="<?php echo $unit ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Division</label>
							<input name="optDivision" type="text" class="form-control" value="<?php echo $divisi ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">AM KOMET</label>
							<input name="txtAmkomet" type="text" class="form-control" value="<?php echo $amkomet ?>" disabled>
                        </div> 
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Project Name</label>
                            <input name="txtProject" type="text" class="form-control" style="height:108px" value="<?php echo $namaproyek ?>" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Types of Work</label>
							<input name="optJobtype" type="text" class="form-control" value="<?php echo $jp ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Customers</label>
							<input name="optSegment" type="text" class="form-control" value="<?php echo $segmen ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">PIC Customer</label>
							<input name="txtAmuser" type="text" class="form-control" value="<?php echo $amuser ?>" disabled>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Nominal</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Base Value</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
								<input name="txtNilaidasar" type="text" class="form-control" value="<?php echo $nilaidasar ?>" disabled>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Net Value</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
								<input name="txtNilainet" type="text" class="form-control" value="<?php echo $nilainet ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Base Value + PPN</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
								<input name="txtNilaippn" type="text" class="form-control" value="<?php echo $nilaippn ?>" disabled>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Margin Value</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
								<input name="txtNilaimargin" type="text" class="form-control" value="<?php echo $nilaimargin ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header text-bg-info">
          <h5 class="mb-0 text-white card-title">Invoice Items</h5>
      </div>
      <div class="card-body p-4 border-bottom">
        <h5 class="fs-4 fw-semibold mb-4">List items</h5> 
        <div class="row">
						<div class="table-responsive rounded-2 mb-4">		
                <?php if (count ( $iteminvoice ) > 0) { ?>
                        <table class="table-sm table border text-nowrap customize-table mb-0 align-middle" >
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Qty</th>
                                <th>Unit</th> 
                                <th>Harga</th> 
                                <th>Total</th> 
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $iteminvoice as $inv ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td> 
                                    <td><?php echo $inv['description']; ?></td>
                                    <td><?php echo $inv['qty']; ?></td>
                                    <td><?php echo $inv['unit']; ?></td>
                                    <td><?php echo strrev(implode('.',str_split(strrev(strval($inv['price'])),3))); ?></td>
                                    <td><?php echo strrev(implode('.',str_split(strrev(strval($inv['total'])),3))); ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { echo 'Belum ada Item untuk invoice ini!'; }?>
          </div>
        </div>      
        </div>
    </div>
   </div>       
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-bg-info">
                <h5 class="mb-0 text-white card-title">Partner Payouts</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">List SPB</h5> 
					<div class="row">
						<div class="table-responsive rounded-2 mb-4">			
					<?php if (count ( $spbbyinvoice ) > 0) { ?>
						<table class="table-sm table border text-nowrap customize-table mb-0 align-middle" >
							<thead>
							<tr>
								<th>#</th>
								<th>SPB</th>
								<th>Value</th>
								<th>Date</th> 
								<th>Status</th> 
							</tr>
							</thead>
							<tbody>
							<?php $i = 0; ?>
							<?php foreach ( $spbbyinvoice as $inv ) { ?>
								<?php $i++; ?>
								<tr>
									<td><?php echo $i; ?></td> <td><?php if ($inv['code'] == "") {
										echo "<i style='color:red;'>Data has not been updated.</i>";
									} else {
										echo "<a target='_blank' href=' ".base_url()."kspb/details/".$inv['spbid']."' style='color: #00bcd4;'><strong>".$inv['code']."</strong></a>"; } ?>
									</td>
									<td><?php if ($inv['value'] == "") {
										echo "<i style='color:red;'>Data has not been updated.</i>";
									} else {
										echo strrev(implode('.',str_split(strrev(strval($inv['value'])),3))); } ?>
									</td>
									<td><?php if ($inv['spbdat'] == "0000-00-00") {
										echo "<i style='color:red;'>Data has not been updated.</i>";
									} else {
										echo date("d F Y", strtotime($inv['spbdat'])); } ?>
									</td> 
									<td>
										<?php if($inv['status'] == '0') { ?>
											<span class="badge bg-primary-subtle text-primary fw-semibold fs-2">Submission</span>
										<?php } elseif($inv['status'] == '2') { ?>
											<span class="badge bg-warning-subtle text-warning fw-semibold fs-2">Processed</span>
										<?php } elseif($inv['status'] == '1') { ?>
											<span class="badge bg-success-subtle text-success fw-semibold fs-2">Paid</span>
										<?php } elseif($inv['status'] == '3') { ?>
											<span class="badge bg-info-subtle text-info fw-semibold fs-2">Approved</span>
										<?php } ?>
									</td>
								</tr>
							<?php }	?>
							</tbody>
						</table>
					<?php } else { echo 'There is no SPB for this invoice yet!'; }?>
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

<script type="text/javascript">
					 
	$(document).ready(function() { 
		
		$('#datatablespb').DataTable({
            'responsive'  : true,
			'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true

        });	
	});
</script>