<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Order</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('orderam');?>">Billing</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Down Payment</li>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
			<?php echo form_open_multipart('kprpo/addprpo');?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Down Payment</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Panjar Code</label>
                            <input name="txtKodenomor" type="text" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Unit</label>
                            <select name="optUnit" class="form-control selectpicker" style="width: 100%">
                                <option disabled>Select</option>
                                <option value="KOMET" selected>KOMET</option>
                            </select>
                        </div>
						<div class="mb-4">
                            <label class="form-label fw-semibold">Types of Work</label>						
							<select name="optJobtype" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Select</option>
                                <option value="IT">IT</option>
                                <option value="BS">BS</option>
                                <option value="TK">TK</option>
                                <option value="PD">PD</option>
                                <option value="SM">SM</option>
                            </select>
						</div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Customer</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Division</label>
                            <select name="optDivision" id="optDivision" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Select</option>
                                <?php

                                if(!empty($division)){
                                    foreach($division as $row){
                                        if (!empty($divisi) && $divisi == $row['divisionid'] ) {
                                            $strselected = "selected";
                                        } else {
                                            $strselected = " ";
                                        }
                                        echo '<option value="'.$row['divisionid'].'"'. $strselected .'>'.$row['code'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Division not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">AM KOMET</label>
                                <select name="txtAmkomet" id="txtAmkomet" class="form-control selectpicker" style="width: 100%">
                                    <option disabled selected>Select</option>
                                    <?php
                                    if(!empty($marketing)){
                                        foreach($marketing as $row){
                                            if (in_array($row['fullname'], listam())) {
                                                echo '<option value="'.$row['fullname'].'">'.$row['fullname'].'</option>';
                                            }
                                        }
                                    }else{
                                        echo '<option value="">AM not available</option>';
                                    }
                                    ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Customers</label>
                            <select name="optSegment" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Select</option>
                                <?php

                                if(!empty($segment)){
                                    foreach($segment as $row){
                                        if (!empty($segmen) && $segmen == $row['segmentid'] ) {
                                            $strselected = "selected";
                                        } else {
                                            $strselected = " ";
                                        }
                                        echo '<option value="'.$row['segmentid'].'"'. $strselected.'>'.$row['name'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Segment not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">PIC Customer</label>
                            <input name="txtAmuser" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Project Detail</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Project Name</label>
                            <input name="txtProject" type="text" class="form-control" style="height:108px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Nominal</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Justification Value</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtNilaijst" type="text" id="idr1" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Negotiation Value</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtNilainego" type="text" id="idr2" class="form-control">
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" id="cmdsave" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

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