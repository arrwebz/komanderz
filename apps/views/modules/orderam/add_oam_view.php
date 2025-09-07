<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Order</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('orderam');?>">Request</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Add Request</li>
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
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <?php echo form_open_multipart('orderam/addoam','id = "formvalidation"');?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Numbering</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Request Order</label>
                            <select name="optOrderinv" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
                                <option value="0">PANJAR PRPO</option>
                                <option value="1">ORDER INVOICE</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPK Entry Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglmsknopes" type="date" class="form-control datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tel/SPK/VSO PADI</label>
                            <input name="txtNopesnomor" type="text" class="form-control">
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
                <h5 class="fs-4 fw-semibold mb-4">Information</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Unit</label>
                            <select name="optUnit" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
                                <option value="KOMET">KOMET</option>
                                <option value="MESRA">MESRA</option>
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
                            <label class="form-label fw-semibold">PIC User</label>
                            <input name="txtAmuser" type="text" class="form-control">
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
                            <label class="form-label fw-semibold">AM KOMET</label>
                            <?php if(in_array($amkomet, listam())){ ?>
                                <input name="txtAmkomet" type="text" class="form-control" value="<?php echo $amkomet;?>" readonly>
                            <?php }elseif(in_array($amkomet, listsupportam())){ ?>
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
                            <?php }else{ ?>
                                <input name="txtAmkomet" type="text" class="form-control" value="<?php echo $amkomet;?>" readonly>
                            <?php } ?>
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
                                <input name="txtNilaidasar" type="text" id="idr1" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Net Value</label>
                            <div id="boxNet" class="hidden">
                                NET - 8% = <strong id="valueNet8"></strong>
                                <button id='btnAddNet8' type='button' class='btn mb-1 waves-effect waves-light bg-primary-subtle text-primary btn-sm' style='margin-bottom:7px'>Use -8%</button>
								<br>NET - 10% = <strong id="valueNet10"></strong>
                                <button id='btnAddNet10' type='button' class='btn mb-1 waves-effect waves-light bg-primary-subtle text-primary btn-sm' style='margin-bottom:7px'>Use -10%</button>
                                <br>NET - 12% = <strong id="valueNet12"></strong>
                                <button id='btnAddNet12' type='button' class='btn mb-1 waves-effect waves-light bg-primary-subtle text-primary btn-sm' style='margin-bottom:7px'>Use -12%</button>
                                <br>NET - 15% = <strong id="valueNet15"></strong>
                                <button id='btnAddNet15' type='button' class='btn mb-1 waves-effect waves-light bg-primary-subtle text-primary btn-sm' style='margin-bottom:7px'>Use -15%</button>
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
                                PPN + 11% = <strong id="valueAutoPpn"></strong>
                                <button id='btnAddPpn' type='button' class='btn mb-1 waves-effect waves-light bg-primary-subtle text-primary btn-sm' style='margin-bottom:7px'>Use +11%</button>
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

<script>
	$(function() {
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

		$("#txtInvnum").on("blur", function(e) {
			$('#msg').hide();
			if ($('#txtInvnum').val() == null || $('#txtInvnum').val() == "") {
				$('#msg').show();
				$("#msg").html("<i class='fa fa-bell-o'></i> Nomor invoice tidak boleh kosong.").css("color", "#f39c12");
				$('#cmdsave').hide();
			} else {
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('knopes/ajaxcheckinvoice'); ?>",
					data: $('#formvalidation').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
						if(msg === 'FALSE') {
							$('#msg').show();
							$("#msg").html("<i class='fa fa-times-circle-o'></i> Nomor invoice sudah terpakai.").css("color", "red");
							$('#cmdsave').hide();
							console.log(msg);
						} else {
							$('#msg').show();
							$("#msg").html("<i class='fa fa-check'></i> Nomor invoice tersedia").css("color", "green");
							$('#cmdsave').show();
							console.log(msg);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#msg').show();
						$("#msg").html(textStatus + " " + errorThrown);
					}
				});
			}
		});
	});
</script>
