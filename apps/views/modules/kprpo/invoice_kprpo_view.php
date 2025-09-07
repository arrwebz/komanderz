<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Billing</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('kprpo');?>">Down Payment PRPO KOMET</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Create Invoice</li>
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

<?php echo form_open_multipart('kprpo/createinvoice');?>
<?php echo form_hidden('hdnOrderid',$orderid); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Nomor</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Unit</label>
                            <input name="optUnit" type="text" class="form-control" value="KOMET" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tipe Order</label>
                            <select name="optOrderstatus" class="form-control selectpicker" style="width:100%">
                                <option disabled selected>Pilih</option>
                                <option value="IBL" <?php if($strstatorder == 'IBL'){ echo 'selected'; }?>>IBL</option>
                                <option value="OBL" <?php if($strstatorder == 'OBL'){ echo 'selected'; }?>>OBL</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Kode</label>
                            <input name="txtKodenomor" type="text" class="form-control" value="<?php echo $kodenomor; ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Invoice</label>
                            <input name="txtNomorinv" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Faktur Pajak</label>
                            <input name="txtNomorfak" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor KL/Tel/SPK</label>
                            <input name="txtNomorkl" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal Invoice</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                <input name="txtTglinv" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Nominal</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nilai Dasar</label>
                            <div class="input-group">
                                <div class="input-group-text">Rp</div>
                                <input name="txtNilaidasar" type="text" id="idr1" class="form-control" value="<?php echo $nilainego; ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nilai Net</label>
                            <div class="input-group">
                                <div class="input-group-text">Rp</div>
                                <input name="txtNilainet" type="text" id="idr2" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>/details/<?php echo $orderid; ?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>

<script type="text/javascript">
	$(document).ready(function() {

		$('.selectpicker').select2();


		$('#idr1').on('input', function(){

			var value = $('#idr1').val();

			var convert = number_format(value,0,'','.');

			$("#idr1").val(convert);

		});

		$('#idr2').on('input', function(){

			var value = $('#idr2').val();

			var convert = number_format(value,0,'','.');

			$("#idr2").val(convert);

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