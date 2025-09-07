<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Billing</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('orderam');?>">Invoice</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Edit Invoice</li>
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

<?php
    $check_disabled = '';
    if($userid == '6'){
        /* sayuti disabled semua kecuali upload file */
        $check_disabled = 'readonly';
    }
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <?php echo form_open_multipart('knopes/editnopes');?>
            <?php echo form_hidden('hdnOrderid',$orderid); ?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Invoicing</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row col-lg-12">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Invoice Number</label>
                                    <input name="txtInvnum" type="text" class="form-control" value="<?php echo $inv; ?>" <?php echo $check_disabled;?>>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Code System</label>
                                    <input name="txtKodenomor" type="text" class="form-control" value="<?php echo $kodenomor; ?>" required  <?php echo $check_disabled;?>>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Invoice Date</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtTglinv" type="date" class="form-control" value="<?php echo $tglinv; ?>" <?php echo $check_disabled;?>>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tax Number</label>
                            <div class="input-group">
                                <div class="input-group-text"> 
                                    <i class="ti ti-receipt-tax"></i>&nbsp;
                                </div>
                                <input name="txtFile" type="file" class="form-control form-control form-control-sm" style="width:100px; padding-top:10px;">
                                <input name="txtFaknum" type="text" class="form-control" value="<?php echo $fak; ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Delivery Date</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtTglkirim" type="date" class="form-control datepicker" value="<?php echo $tglkrm; ?>" <?php echo $check_disabled;?>>
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
                            <input name="txtNopesnomor" type="text" class="form-control" value="<?php echo $nomorspk; ?>" <?php echo $check_disabled;?>>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPK Entry Date</label> 
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglmsknopes" type="date" class="form-control datepicker" value="<?php echo $tglmskspk; ?>" <?php echo $check_disabled;?>>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Order Type</label>
                            <select name="optOrderstatus" class="form-control selectpicker" style="width: 100%" <?php echo $check_disabled;?>>
                                <option disabled selected>Select</option>
                                <option value="NOPES" <?php if($statusorder == 'NOPES'){ echo 'selected'; }?>>NOPES</option>
                                <option value="PADI" <?php if($statusorder == 'PADI'){ echo 'selected'; }?>>PADI</option>
                                <option value="IBL" <?php if($statusorder == 'IBL'){ echo 'selected'; }?>>IBL</option>
                                <option value="OBL" <?php if($statusorder == 'OBL'){ echo 'selected'; }?>>OBL</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPK Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglnopes" type="date" class="form-control datepicker"  value="<?php echo $tglspk; ?>" <?php echo $check_disabled;?>>
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
                            <select name="optUnit" class="form-control selectpicker" style="width: 100%" <?php echo $check_disabled;?>>
                                <option disabled selected>Select</option>
                                <option value="KOMET" <?php if($unit == 'KOMET') echo 'selected' ?>>KOMET</option>
                                <option value="MESRA" <?php if($unit == 'MESRA') echo 'selected' ?>>MESRA</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Division</label>
                            <select name="optDivision" id="optDivision" class="form-control selectpicker" style="width: 100%" <?php echo $check_disabled;?>>
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
                                <select name="txtAmkomet" id="txtAmkomet" class="form-control selectpicker" style="width: 100%" <?php echo $check_disabled;?>>
                                    <option disabled selected>Pilih</option>
                                    <?php
                                    if(!empty($marketing)){
                                        foreach($marketing as $row){
                                            if (in_array($row['fullname'], listam())) {
                                                if (!empty($amkomet) && $amkomet == $row['fullname'] ) {
                                                    $strselected = "selected";
                                                } else {
                                                    $strselected = " ";
                                                }
                                                echo '<option value="'.$row['fullname'].'" '. $strselected .'>'.$row['fullname'].'</option>';
                                            }
                                        }
                                    }else{
                                        echo '<option value="">AM not available</option>';
                                    }
                                    ?>
                                </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Project Name</label>
                            <input name="txtProject" type="text" class="form-control" style="height:108px" value="<?php echo $namaproyek; ?>" <?php echo $check_disabled;?>>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Job Type</label>
                            <select name="optJobtype" class="form-control selectpicker" style="width: 100%" <?php echo $check_disabled;?>>
                                <option disabled selected>Select</option>
                                <option value="IT" <?php if($jp == 'IT') echo 'selected' ?>>IT</option>
                                <option value="BS" <?php if($jp == 'BS') echo 'selected' ?>>BS</option>
                                <option value="TK" <?php if($jp == 'TK') echo 'selected' ?>>TK</option>
                                <option value="PD" <?php if($jp == 'PD') echo 'selected' ?>>PD</option>
                                <option value="SM" <?php if($jp == 'SM') echo 'selected' ?>>SM</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Customers</label>
                            <select name="optSegment" class="form-control selectpicker" style="width: 100%" <?php echo $check_disabled;?>>
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
                            <input name="txtAmuser" type="text" class="form-control" value="<?php echo $amuser; ?>" <?php echo $check_disabled;?>>
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
                                <input name="txtNilaidasar" type="text" id="idr1" class="form-control" value="<?php echo $nilaidasar; ?>" <?php echo $check_disabled;?>>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Net Value</label>
                            <div id="boxNet" class="hidden">
                                NET - 8% = <strong id="valueNet8"></strong>
                                <button id='btnAddNet8' type='button' class='btn mb-1 bg-primary text-white btn-sm' style='margin-bottom:7px'>Use -8%</button>
                                <br>NET - 10% = <strong id="valueNet10"></strong>
                                <button id='btnAddNet10' type='button' class='btn mb-1 bg-primary text-white btn-sm' style='margin-bottom:7px'>Use -10%</button>
                                <br>NET - 12% = <strong id="valueNet12"></strong>
                                <button id='btnAddNet12' type='button' class='btn mb-1 bg-primary text-white btn-sm' style='margin-bottom:7px'>Use -12%</button>
                                <br>NET - 15% = <strong id="valueNet15"></strong>
                                <button id='btnAddNet15' type='button' class='btn mb-1 bg-primary text-white btn-sm' style='margin-bottom:7px'>Use -15%</button>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtNilainet" type="text" id="idr3" class="form-control" value="<?php echo $nilainet; ?>" <?php echo $check_disabled;?>>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Base Value + PPN</label>
                            <div id="boxPPN" class="hidden">
                                PPN + 11% = <strong id="valueAutoPpn"></strong>
                                <button id='btnAddPpn' type='button' class='btn mb-1 bg-primary text-white btn-sm' style='margin-bottom:7px'>Use +11%</button>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtNilaippn" type="text" id="idr2" class="form-control" value="<?php echo $nilaippn; ?>" <?php echo $check_disabled;?>>
                            </div> 
                        </div>
						<div class="mb-4">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="optStatinv" class="form-control">
                                <option selected value="Pilih">Select</option>
                                <option value="9" <?php if($statinv == '9') echo 'selected' ?>>BATAL</option>
                            </select>
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

			if(value != ''){
				$("#boxPPN").removeClass("hidden");
				$("#boxNet").removeClass("hidden");

				/* PPN*/
				var cleanVal = value.replaceAll(".","");
				let presentasePpn = (cleanVal * 11) /100;
				var nilaippn = +cleanVal + +presentasePpn;
				var convertPPN = number_format(nilaippn,0,'','.');
				$("#valueAutoPpn").html(convertPPN);
				document.getElementById("btnAddPpn").setAttribute("data-val",convertPPN);

				/* NET*/
				var cleanValNet = value.replaceAll(".","");
				let presentaseNet8 = (cleanValNet * 8) /100;
				var nilainet8 = +cleanValNet - +presentaseNet8;
				var convertNet8 = number_format(nilainet8,0,'','.');
				$("#valueNet8").html(convertNet8);
				document.getElementById("btnAddNet8").setAttribute("data-val",convertNet8);

				var cleanValNet = value.replaceAll(".","");
				let presentaseNet10 = (cleanValNet * 10) /100;
				var nilainet10 = +cleanValNet - +presentaseNet10;
				var convertNet10 = number_format(nilainet10,0,'','.');
				$("#valueNet10").html(convertNet10);
				document.getElementById("btnAddNet10").setAttribute("data-val",convertNet10);

				var cleanValNet = value.replaceAll(".","");
				let presentaseNet12 = (cleanValNet * 12) /100;
				var nilainet12 = +cleanValNet - +presentaseNet12;
				var convertNet12 = number_format(nilainet12,0,'','.');
				$("#valueNet12").html(convertNet12);
				document.getElementById("btnAddNet12").setAttribute("data-val",convertNet12);

				let presentaseNet15 = (cleanValNet * 15) /100;
				var nilainet15 = +cleanValNet - +presentaseNet15;
				var convertNet15 = number_format(nilainet15,0,'','.');
				$("#valueNet15").html(convertNet15);
				document.getElementById("btnAddNet15").setAttribute("data-val",convertNet15);

			}else{
				$("#idr2").val("");
				$("#idr3").val("");
				$("#boxPPN").addClass("hidden");
				$("#boxNet").addClass("hidden");
			}
		});

		$('#idr2').on('input', function(){

			var value = $('#idr2').val();

			var convert = number_format(value,0,'','.');

			$("#idr2").val(convert);

		});

		$('#idr3').on('input', function(){

			var value = $('#idr3').val();

			var convert = number_format(value,0,'','.');

			$("#idr3").val(convert);

		});

		$("#btnAddPpn").on("click", function () {
			var value = $(this).data('val');
			$("#idr2").val(value);
		});

		$("#btnAddNet8, #btnAddNet10, #btnAddNet12, #btnAddNet15").on("click", function () {
			var value = $(this).data('val');
			$("#idr3").val(value);
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