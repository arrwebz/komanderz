<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('pspb');?>">SPB</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Edit SPB</li> 
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
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
				<h4 class="card-title text-white mb-0">Edit Form SPB</h4>
			</div>
            <?php echo form_open_multipart('pspb/editspb');?>
            <?php echo form_hidden('hdnSpbid',$id); ?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Partner Payouts</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Invoice</label>
                            <input name="txtInvoice" type="text" class="form-control" value="<?php echo $inv; ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPB</label>
                            <input name="txtKodenomor" type="text" class="form-control" value="<?php echo $kodenomor; ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Types of Work</label>
                            <select name="optDivisi" class="form-control" style="width: 100%;" required>
                                <option disabled>Select</option>
                                <option value="IT" <?php if($divisi == 'IT') echo 'selected' ?>>IT</option>
                                <option value="BS" <?php if($divisi == 'BS') echo 'selected' ?>>BS</option>
                                <option value="TK" <?php if($divisi == 'TK') echo 'selected' ?>>TK</option>
                                <option value="PD" <?php if($divisi == 'PD') echo 'selected' ?>>PD</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Payment To</label>
                            <input name="txtCustomer" type="text" class="form-control" value="<?php echo $kepada ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">For Payment</label>
                            <textarea name="txtInfo" type="text" class="form-control" style="width:100%; height:183px;"><?php echo $ket ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPB Date</label>
                            <input name="txtSpbdate" type="date" class="form-control datepicker" value="<?php echo $tglspb ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPB Value</label>
                            <input name="txtValue" type="text" id="idr" class="form-control" value="<?php echo $nilai ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Payment Method</label>
                            <select name="optPayment" class="form-control">
                                <option disabled>Select</option>
                                <option value="cash" <?php if($jenisbayar == 'cash') echo 'selected' ?> >CASH</option>
                                <option value="transfer" <?php if($jenisbayar == 'transfer') echo 'selected' ?>>TRANSFER</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Account Name</label>
                            <input name="txtAccname" type="text" class="form-control" value="<?php echo $anrek ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Account Number</label>
                            <input name="txtAccnum" type="text" class="form-control" value="<?php echo $norek ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Bank</label>
                            <select name="optBank" class="form-control" style="width: 100%;">
                                <option value=" " <?php if($bank == 0) echo 'selected' ?>>Select</option>
                                <option value="bca" <?php if($bank == 'bca') echo 'selected' ?>>BCA</option>
                                <option value="mandiri" <?php if($bank == 'mandiri') echo 'selected' ?>>MANDIRI</option>
                                <option value="bni" <?php if($bank == 'bni') echo 'selected' ?>>BNI</option>
                                <option value="bri" <?php if($bank == 'bri') echo 'selected' ?>>BRI</option>
                                <option value="other" <?php if($bank == 'other') echo 'selected' ?>>LAINNYA...</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Other Bank</label>
                            <input name="txtBankother" type="text" class="form-control" value="<?php echo $banklain ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Request By</label>
                            <input name="txtApplicant" type="text" class="form-control" value="<?php echo $pemohon ?>">
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
		$('.selectpicker').select2();


		$('#idr').on('input', function(){

			var value = $('#idr').val();

			var convert = number_format(value,0,'','.');

			$("#idr").val(convert);

		});

		function number_format(number, decimals, decPoint, thousandsSep) {

			number = (number + '').replace(/[^0-9]/g, '');

			var n = !isFinite(+number) ? 0 : +number;

			var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);

			var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;

			var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;

			var s = '';

			var toFixedFix = function (n, prec) {

				var k = Math.pow(10, prec);

				return '' + (Math.round(n * k) / k).toFixed(prec);

			};

			s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

			if (s[0].length > 3) {

				s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);

			}

			if ((s[1] || '').length < prec) {

				s[1] = s[1] || '';

				s[1] += new Array(prec - s[1].length + 1).join('0');

			}
			return s.join(dec);
		}
	});
</script>