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
				  <p class="mb-0 text-dark"><a target="blank_" href="<?php echo base_url().'ktrack/details/'.$orderid;?>" class="btn btn-sm waves-effect waves-light btn-outline-success">Tracking</a></p>
				</div>
				<div class="ps-4">
				  <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Payment<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
				  <p class="mb-0 text-dark"><a target="blank_" href="<?php echo base_url();?>/kbillco/details/<?php echo $orderid; ?>" class="btn btn-sm waves-effect waves-light btn-outline-success">Collection</a></p>
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
			<a href="<?php echo base_url().$this->router->fetch_class();?>/preview/<?php echo $orderid; ?>" class="btn btn-sm waves-effect waves-light btn-outline-danger mb-2">Print Atch Invoice</a></br>
            <a href="<?php echo base_url().$this->router->fetch_class();?>/printinvoice/<?php echo $orderid; ?>" class="btn btn-sm waves-effect waves-light btn-outline-danger mb-2">Print Acc Invoice</a></br>
            <a href="<?php echo base_url().$this->router->fetch_class();?>/printreceipt/<?php echo $orderid; ?>" class="btn btn-sm waves-effect waves-light btn-outline-danger mb-2">Print Recceipt Invoice</a></br>
            <a href="<?php echo base_url().$this->router->fetch_class();?>/printbast/<?php echo $orderid; ?>" class="btn btn-sm waves-effect waves-light btn-outline-danger mb-2">Print BAST</a></br>
            <a href="<?php echo base_url().$this->router->fetch_class();?>/printsp/<?php echo $orderid; ?>" class="btn btn-sm waves-effect waves-light btn-outline-danger mb-2">Print SP Invoice</a>
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
				  <a href="<?php echo $this->config->item('uploads_uri').'fakturpajak/padi/'.$orderid.'/'.$file;?>" class="btn btn-sm waves-effect waves-light btn-outline-info">Print Tax</a>
			  <?php } else { ?>
				<button class="btn btn-sm bg-info-subtle text-info" disabled>Please upload Tax file</button>
			  <?php } ?>			
		  </div>
		</div>
	  </div>
	</div>
</div>

<div class="row">
    <div class="nav-align-top">
        <ul class="nav nav-pills mb-4" role="tablist">
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link waves-effect waves-light active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-home" aria-controls="navs-pills-left-home" aria-selected="true">Invoice</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-profile" aria-controls="navs-pills-left-profile" aria-selected="false" tabindex="-1">Items</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-messages" aria-controls="navs-pills-left-messages" aria-selected="false" tabindex="-1">SPB</button>
        </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="navs-pills-left-home" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                                    <h4 class="card-title text-white mb-0">Detail Invoice</h4>
                                </div>
                            <div class="card-body p-4 border-bottom">
                                <h5 class="fs-4 fw-semibold mb-4">Order Information</h5>
                                <div class="row">
                                    <div class="col-lg-3">
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
                                    <div class="col-lg-3">
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
                                    <div class="col-lg-3">
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
                                    <div class="col-lg-3">
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
                                <h5 class="fs-4 fw-semibold mb-4"></h5>
                                <div class="row"> 
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Project Name</label>
                                            <input name="txtProject" type="text" class="form-control" style="height:108px" value="<?php echo $namaproyek ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 border-bottom">
                                <h5 class="fs-4 fw-semibold mb-4"></h5>
                                <div class="row">
                                    <div class="col-lg-3">
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
                                    </div>
                                    <div class="col-lg-3">
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
                                    <div class="col-lg-3">
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
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Margin Value</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input name="txtNilaimargin" type="text" class="form-control" value="<?php echo $nilaimargin ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">PPN</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input name="txtNilaippn" type="text" class="form-control" value="<?php echo $nilaippn ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">PPH</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input name="txtNilaippn" type="text" class="form-control" value="<?php echo $nilaipph ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">Estimated Payment Value</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input name="txtNilaimargin" type="text" class="form-control" value="<?php echo $nilaiestcair ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-left-profile" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                                <h5 class="mb-0 text-white card-title">Invoice Items</h5>
                            </div>
                            <div class="card-body p-4 border-bottom">
                                <h5 class="fs-4 fw-semibold mb-4">List items</h5> 
                                    <div class="row">
                                        <div class="table-responsive rounded-2 mb-4">		
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">
                                                                <button type="button" id="addItem" class="btn btn-default btn-sm">+</button>
                                                            </th>
                                                            <th width="5%" class="text-center">No</th>
                                                            <th>Description</th>
                                                            <th width="7%">Qty</th>
                                                            <th width="7%">Unit</th>
                                                            <th width="15%">Harga</th>
                                                            <th width="15%">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodyItem"></tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="6" class="text-end">Total</th>
                                                            <th><input type="text" name="grandtotal" id="grandtotal" class="form-control" placeholer="125.000" readonly></th>
                                                        </tr>
                                                    </tfoot>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">  
                                <!-- <button type="button" id="saveItems" class="btn btn-primary">Update</button> -->
                            </div>
                        </div>    
                    </div>       
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-left-messages" role="tabpanel">
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
					 
	$(document).ready(function(){
        // format angka jadi ribuan
        function formatRupiah(angka){
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split   = number_string.split(","),
            sisa    = split[0].length % 3,
            rupiah  = split[0].substr(0, sisa),
            ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

            if(ribuan){
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return rupiah;
        }

        // ambil angka asli dari input rupiah
        function toNumber(rp){
            return parseInt(rp.replace(/\./g, "").replace(/[^0-9]/g,'')) || 0;
        }


        var orderid = "<?= $orderid ?>";

        // load items
        loadItems(orderid);

        function loadItems(orderid){
            $.get("<?= site_url('invoice/get_items_ajax/'); ?>" + orderid, function(data){
                data = JSON.parse(data);
                $("#bodyItem").empty();
                var no = 1;
                var grandtotal = 0;

                $.each(data, function(i, item){
                    grandtotal += parseFloat(item.subtotal);

                    $("#bodyItem").append(
                        '<tr class="row-item" data-id="'+ item.itemid +'">' +
                            '<td class="text-center">' +
                                '<button type="button" class="btn btn-sm remove-item" data-id="'+item.itemid+'">' +
                                    '<i class="fs-4 ti ti-trash text-danger"></i>' +
                                '</button>' +
                            '</td>' +
                            '<td class="text-center"><span>'+no+'</span></td>' +
                            '<td><textarea class="form-control description" data-id="'+item.itemid+'">'+item.description+'</textarea></td>' +
                            '<td><input type="number" class="form-control qty" data-id="'+item.itemid+'" value="'+item.qty+'"/></td>' +
                            '<td><input type="text" class="form-control unit" data-id="'+item.itemid+'" value="'+item.unit+'"/></td>' +
                            '<td><input type="text" class="form-control price" data-id="'+item.itemid+'" value="'+formatRupiah(item.price.toString())+'"/></td>' +
                            '<td><input type="text" class="form-control total" value="'+formatRupiah(item.subtotal.toString())+'" readonly/></td>' +
                        '</tr>'
                    );
                    no++;
                });

                $("#grandtotal").val(formatRupiah(grandtotal.toString()));
            });
        }

        // format rupiah saat ketik harga atau qty
        $(document).on("keyup", ".price, .qty", function(){
            var val = $(this).val();
            $(this).val(formatRupiah(val));
        });

        // add item
        $("#addItem").on("click", function(){
            $.post("<?= site_url('invoice/add_item_ajax'); ?>", {
                orderid: orderid,
                description: "New item",
                qty: 1,
                unit: "",
                price: 0
            }, function(res){
                loadItems(orderid);
            }, "json");
        });

        // update item (on blur / change)
        $(document).on("change", ".description, .qty, .unit, .price", function(){
            var id = $(this).data("id");
            var row = $(".row-item[data-id="+id+"]");

            var desc  = row.find(".description").val();
            var qty   = toNumber(row.find(".qty").val());
            var unit  = row.find(".unit").val();
            var price = toNumber(row.find(".price").val());

            $.post("<?= site_url('invoice/update_item_ajax'); ?>", {
                itemid: id,
                description: desc,
                qty: qty,
                unit: unit,
                price: price
            }, function(res){
                loadItems(orderid);
            }, "json");
        });

        // delete item
        $(document).on("click", ".remove-item", function(){
            var id = $(this).data("id");
            $.get("<?= site_url('invoice/delete_item_ajax/'); ?>" + id, function(res){
                loadItems(orderid);
            }, "json");
        });

    });

</script>