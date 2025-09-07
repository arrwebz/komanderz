<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Target</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('targetsegment');?>">Telkom Segment</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Add Target</li>
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

<?php echo form_open('targetsegment/add');?>
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
                            <label for="optSegment" class="form-label fw-semibold">Segment</label>
                            <select name="optSegment" id="optSegment" class="form-control selectpicker" >
                                <option disabled selected>Pilih</option>
                                <?php

                                if(!empty($datasegment)){
                                    foreach($datasegment as $row){
                                        echo '<option value="'.$row['segmentid'].'">'.$row['code'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Division not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div id="boxAm" class="mb-4 hidden">
                            <label for="txtAm" class="form-label fw-semibold">AM</label>
                            <input name="txtAm" id="txtAm" type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtTarget" class="form-label fw-semibold">Nominal</label>
                            <input name="txtTarget" id="txtTarget" type="text" class="form-control" required>
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
                            <select name="optBulan" class="form-control selectpicker" >
                                <option selected disabled>Select</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="optTahun" class="form-label fw-semibold">Year</label>
                            <select name="optTahun" class="form-control selectpicker" style="width: 100%; height: 36px">
                                <option selected disabled>Select</option>
                                <?php for($i=date('Y')-4; $i<=date('Y'); $i++){ ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <div class="d-flex align-items-center gap-3">
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
</div>
<?php echo form_close();?>

<script>
	$(document).ready(function() {
		$('.selectpicker').select2();

		$('#txtTarget').on('input', function(){
			var value = $('#txtTarget').val();
			var convert = number_format(value,0,'','.');
			$("#txtTarget").val(convert);
		});

		$('#optSegment').on('change', function () {
			var optionSegment = document.getElementById("optSegment");
			var segmentId = optionSegment.value;
			$('#boxAm').removeClass('hidden');

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('targetsegment/getmarketing')?>",
				data: "sid="+segmentId,
				success: function (data) {
					var respon = JSON.parse(data);
					if(respon['status'] == 'success'){
						$('#txtAm').val(respon['fullname']);
					}else{
						$('#txtAm').val('undenfined');
					}
				}
			});
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