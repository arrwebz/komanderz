<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Target</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('targetam');?>">Account Manager</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Update Target</li>
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

<?php echo form_open_multipart('targetam/edit', 'class = "form-horizontal"');?>
<?php echo form_hidden('targetamid',$tsid); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Target Detail</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Account Manager</label>
                            <select name="optAm" id="optAm" class="form-control selectpicker"  style="width: 100%; height: 36px">
                                <option disabled selected>Pilih</option>
                                <option value="21" <?php if($tsamid == 21){ echo 'selected'; }?>>Isnanza Zulkarnaini</option>
                                <option value="37" <?php if($tsamid == 37){ echo 'selected'; }?>>Eva Ayu Komala</option>
                                <option value="36" <?php if($tsamid == 36){ echo 'selected'; }?>>Vania Miranda Putri</option>
                                <option value="30" <?php if($tsamid == 30){ echo 'selected'; }?>>Sigit Hidayatullah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtTarget" class="form-label fw-semibold">Nominal</label>
                            <input name="txtTarget" id="txtTarget" type="text" class="form-control" value="<?php echo $tstarget;?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <h5 class="fs-4 fw-semibold mb-4">Periodic Info</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="optBulan" class="form-label fw-semibold">Month</label>
                            <select name="optBulan" id="optBulan" class="form-control selectpicker" style="width: 100%; height: 36px">
                                <option disabled selected>Pilih</option>
                                <option value="1" <?php if($tsbulan == '1'){ echo 'selected'; }?>>Januari</option>
                                <option value="2" <?php if($tsbulan == '2'){ echo 'selected'; }?>>Februari</option>
                                <option value="3" <?php if($tsbulan == '3'){ echo 'selected'; }?>>Maret</option>
                                <option value="4" <?php if($tsbulan == '4'){ echo 'selected'; }?>>April</option>
                                <option value="5" <?php if($tsbulan == '5'){ echo 'selected'; }?>>Mei</option>
                                <option value="6" <?php if($tsbulan == '6'){ echo 'selected'; }?>>Juni</option>
                                <option value="7" <?php if($tsbulan == '7'){ echo 'selected'; }?>>Juli</option>
                                <option value="8" <?php if($tsbulan == '8'){ echo 'selected'; }?>>Agustus</option>
                                <option value="9" <?php if($tsbulan == '9'){ echo 'selected'; }?>>September</option>
                                <option value="10" <?php if($tsbulan == '10'){ echo 'selected'; }?>>Oktober</option>
                                <option value="11" <?php if($tsbulan == '11'){ echo 'selected'; }?>>November</option>
                                <option value="12" <?php if($tsbulan == '12'){ echo 'selected'; }?>>Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="optTahun" class="form-label fw-semibold">Year</label>
                            <select name="optTahun" id="optTahun" class="form-control selectpicker"  style="width: 100%; height: 36px">
                                <option disabled selected>Pilih</option>
                                <?php
                                $year = date('Y')-1;
                                for($i=$year; $i<=$year+2; $i++){
                                    $selected = '';
                                    if($tstahun == $i){ $selected = 'selected'; }
                                    echo '<option value="'. $i .'" '. $selected .'>'. $i .'</option>';
                                }
                                ?>
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
		$('.selectpicker').select2();

		$('#txtTarget').on('input', function(){
			var value = $('#txtTarget').val();
			var convert = number_format(value,0,'','.');
			$("#txtTarget").val(convert);
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