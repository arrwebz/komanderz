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
                        <li class="breadcrumb-item" aria-current="page">Add Invoice</li>
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

<div class="alert alert-info" role="alert">
    <h4><i class="ti ti-info-circle fs-5 text-danger me-2 flex-shrink-0"></i> Informasi</h4>
    Nomor INVOICE terakhir <strong><?php echo $lastinvnum;?></strong>
</div>

<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <?php echo form_open_multipart('knopes/addnopes','id = "formvalidation"');?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Invoicing</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Invoice Number</label>
							<?php
                            $invnum = $lastinvnum+1;
                            $countchar = strlen($invnum);
                            if($countchar == 1){
                                $realinvnum = "000".$invnum;
                            }elseif($countchar == 2){
                                $realinvnum = "00".$invnum;
                            }elseif($countchar == 3){
                                $realinvnum = '0'.$invnum;
                            }else{
                                $realinvnum = $invnum;
                            }
                            ?>
                            
                            <input id="txtInvnum" name="txtInvnum" type="text" class="form-control" autocomplete="off">
                            <input id="txtInvnummust" type="hidden" value="<?php echo $realinvnum?>">
                            
                            <div id="msg"></div>
                        </div>
                        <div class="mb-4"> 
                            <label class="form-label fw-semibold">Invoice Date</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtTglinv" type="date" class="form-control datepicker" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tax Number</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <strong><?php if(!empty($fakturpajak[0])){ echo $fakturpajak[0]['code']; }?></strong>
                                </div>
                                <input name="txtFaknum" type="text" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Delivery Date</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtTglkirim" type="date" class="form-control datepicker" autocomplete="off">
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
                            <input name="txtNopesnomor" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPK Entry Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglmsknopes" type="date" class="form-control datepicker" autocomplete="off">
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Order Type</label>
                            <select name="optOrderstatus" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Select</option>
                                <option value="NOPES">NOPES</option>
                                <option value="PADI">PADI</option>
                                <option value="IBL">IBL</option>
                                <option value="OBL">OBL</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPK Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglnopes" type="date" class="form-control datepicker" autocomplete="off">
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
                            <select name="optUnit" class="form-control selectpicker" style="width: 100%">
                                <option disabled>Select</option>
                                <option value="KOMET" selected>KOMET</option>
                            </select>
                        </div>
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
                                    <option disabled selected>Pilih</option>
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
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Project Name</label>
                            <input name="txtProject" type="text" class="form-control" style="height:108px">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Job Type</label>
                            <select name="optJobtype" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Select</option>
                                <option value="IT">IT</option>
                                <option value="BS">BS</option>
                                <option value="TK">TK</option>
                                <option value="PD">PD</option>
                                <option value="SM">SM</option>
                            </select>
                        </div>
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
                <h5 class="fs-4 fw-semibold mb-4">Nominal</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Base Value</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtNilaidasar" type="text" id="idr1" class="form-control" autocomplete="off" required>
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
                                <input name="txtNilainet" type="text" id="idr3" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Base Value + PPN</label>
                            <div id="boxPPN" class="hidden">
                                PPN + 11% = <strong id="valueAutoPpn11"></strong>
                                <button id='btnAddPpn11' type='button' class='btn mb-1 bg-primary text-white btn-sm' style='margin-bottom:7px'>Use +11%</button>
                                <br>PPN + 12% = <strong id="valueAutoPpn12"></strong>
                                <button id='btnAddPpn12' type='button' class='btn mb-1 bg-primary text-white btn-sm' style='margin-bottom:7px'>Use +12%</button>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtNilaippn" type="text" id="idr2" class="form-control">
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

<!-- MODAL ALERT INVNUM -->
<div id="modalInvnum" class="modal animated shake" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-light-success text-danger">
            <div class="modal-body p-4">
                <div class="text-center text-danger">
                    <i class="ti ti-square-rounded-letter-x fs-7"></i>
                    <h4 class="mt-2">Oh Snap!</h4>
                    <p class="mt-3 text-success-50">
                        Halo, <?php echo $fullname;?>
                        <br>Invoice Number Must be <?php echo $realinvnum;?>
                    </p>
                    <button type="button" class="btn btn-primary my-2" data-bs-dismiss="modal">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL ALERT INVNUM -->

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

				/* PPN 11*/
				var cleanVal = value.replaceAll(".","");
				let presentasePpn11 = (cleanVal * 11) /100;
				var nilaippn11 = +cleanVal + +presentasePpn11;
				var convertPPN11 = number_format(nilaippn11,0,'','.');
				$("#valueAutoPpn11").html(convertPPN11);
				document.getElementById("btnAddPpn11").setAttribute("data-val",convertPPN11);
				
				/* PPN 12*/
				var cleanVal = value.replaceAll(".","");
				let presentasePpn12 = (cleanVal * 12) /100;
				var nilaippn12 = +cleanVal + +presentasePpn12;
				var convertPPN12 = number_format(nilaippn12,0,'','.');
				$("#valueAutoPpn12").html(convertPPN12);
				document.getElementById("btnAddPpn12").setAttribute("data-val",convertPPN12);

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

		$("#btnAddPpn11, #btnAddPpn12").on("click", function () {
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

		$("#txtInvnum").on("blur", function(e) {
			var txtInvnum = $('#txtInvnum').val();
			var txtInvnummust = $('#txtInvnummust').val();
			$('#msg').hide();
			if (txtInvnum == null || txtInvnum == "") {
				$('#msg').show();
				$("#msg").html("<i class='ti ti-bell'></i> Nomor invoice tidak boleh kosong.").css("color", "#f39c12");
				$('#cmdsave').hide();
			} else {
				
				if(txtInvnum == txtInvnummust){
					$.ajax({
					type: "POST",
					url: "<?php echo site_url('knopes/ajaxcheckinvoice'); ?>",
					data: $('#formvalidation').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
							if(msg === 'FALSE') {
								$('#msg').show();
								$("#msg").html("<i class='ti ti-square-rounded-letter-x'></i> Nomor invoice sudah terpakai.").css("color", "red");
								$('#cmdsave').hide();
								console.log(msg);
							} else {
								$('#msg').show();
								$("#msg").html("<i class='ti ti-check'></i> Nomor invoice tersedia").css("color", "green");
								$('#cmdsave').show();
								console.log(msg);
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							$('#msg').show();
							$("#msg").html(textStatus + " " + errorThrown);
						}
					});
				}else{
					$("#modalInvnum").modal("show");

					$('#msg').show();
					$("#msg").html("<i class='ti ti-bell'></i> Invoice Number Must be "+ txtInvnummust +".").css("color", "#f39c12");
					$('#cmdsave').hide();
				}
			}
		});
	});
</script>
