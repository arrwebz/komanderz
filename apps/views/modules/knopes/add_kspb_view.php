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
                        <li class="breadcrumb-item" aria-current="page">Add SPB</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Cash.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12">
    <div class="card overflow-hidden">
        <div class="d-flex flex-row">
            <div class="p-4 text-bg-info">
                <h3 class="text-white box mb-0">
                    <i class="ti ti-number"></i>
                </h3>
            </div>
            <div class="p-3">
                <h3 class="text-info mb-0 fs-6">Attention!</h3>
                <span class="text-muted">Last SPB number</span>
            </div>
            <div class="align-self-center me-3 ms-auto">
                <h2 class="fs-7 text-info mb-0"><?php echo $code_spb[0]['last_code_spb'];?></h2>
            </div>
        </div>
    </div>
</div>
<div class="alert customize-alert alert-dismissible border-info text-info fade show remove-close-icon" role="alert">
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    <h3><?php echo $cust; ?> </h3>  
	<strong>Invoice Number - </strong> <?php echo $kodenomor; ?> 
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                <h4 class="card-title text-white mb-0">Add Form SPB</h4>
            </div>
            <?php echo form_open_multipart('knopes/addspb','id = "formvalidation"');?>
            <?php echo form_hidden('hdnOrderid',$orderid); ?>
            <?php echo form_hidden('hdnSpbid',$spbid); ?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Partner Payouts</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Source of Funds</label>
                            <select id="optTipecek" name="optTipecek" class="form-control" autocomplete="off" width="100%" required>
                                <option disabled selected>Select</option>
                                <option value="LPDB">LPDB</option>
                                <option value="BCAS">KOPTEL BCAS</option>
                                <option value="non">Self-Funding</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPB Number</label>
							<?php
                            $spbnum = $code_spb[0]['last_code_spb']+1;
                            $countchar = strlen($spbnum);
                            if($countchar == 1){
                                $realspbnum = "000".$spbnum;
                            }elseif($countchar == 2){
                                $realspbnum = "00".$spbnum;
                            }elseif($countchar == 3){
                                $realspbnum = '0'.$spbnum;
                            }else{
                                $realspbnum = $spbnum;
                            }
                            ?>
                            <input id="txtKodenomor" name="txtKodenomor" type="text" class="form-control" autocomplete="off" value="<?php echo $realspbnum?>" readonly>
                            <div id="msg"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Types of Work</label>
                            <select name="optJobtype" class="form-control">
                                <option disabled selected>Select</option>
                                <option value="IT">IT</option>
                                <option value="BS">BS</option>
                                <option value="TK">TK</option>
                                <option value="PD">PD</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPB Date</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtSpbdate" type="date" class="form-control datepicker" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Payment Information</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Payment To</label>
                            <input name="txtCustomer" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">For Payment</label>
                            <input name="txtInfo" type="text" class="form-control" style="height:314px" value="<?php echo $namaproyek ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Request By</label>
                            <input name="txtApplicant" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">SPB Value</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtValue" type="text" id="idr" class="form-control" value="<?php echo $nilainet ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Payment Method</label>
                            <select id="optPayment" name="optPayment" class="form-control">
                                <option disabled selected>Select</option>
                                <option value="cash">CASH</option>
                                <option value="transfer">TRANSFER</option>
                            </select>
                        </div>
                        <div id="wrapPembayaranCash" class="hidden">
                            <div class="mb-4">
                                <label for="txtNama" class="form-label fw-semibold">Full Name</label>
                                <input id="txtAccnamecash" name="txtAccnamecash" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="wrapPembayaranTf hidden">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Account Name</label>
                                <select id="txtAccname" name="txtAccname" class="form-control selectpicker" data-width="100%">
                                    <option disabled selected>Pilih</option>
                                    <?php foreach($bank as $row){ ?>
                                        <option value="<?php echo $row['accname'];?>" data-option="<?php echo $row['bankname'].','.$row['accnum'];?>"><?php echo $row['accname'];?></option>
                                    <?php } ?>
                                </select>
							<br/>
							<a id="addModalBank" href="javascript:" class="btn btn-sm btn-success" data-bs-target="#modalAddBank" data-bs-toggle="modal">+ New Bank Account</a>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Account Number</label>
                                <input id="txtAccnum" name="txtAccnum" type="text" class="form-control" readonly>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Bank Name</label>
                                <input id="optBank" name="optBank" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Other Bank Name</label>
                            <input name="txtBankother" type="text" class="form-control">
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

<!-- START MODAL ADD -->
<div id="modalAddBank" class="modal fade" aria-hidden="true" aria-labelledby="modalAddBank" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Form Bank</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAddBank" action="javascript:" method="POST">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Bank :</label>
                        <input name="bankname" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Atas Nama :</label>
                        <input name="accname" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Nomor Rekening :</label>
                        <input name="accnum" type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="msgForm" class="mb-15" style="font-weight: 600"></div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-sm btn-white btn-pure" data-bs-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->

<script type="text/javascript">

	$(document).ready(function() {

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

		$("#txtKodenomor").on("blur", function(e) {
			$('#msg').hide();
			if ($('#txtKodenomor').val() == null || $('#txtKodenomor').val() == "") {
				$('#msg').show();
				$("#msg").html("<i class='ti ti-bell'></i> Nomor SPB tidak boleh kosong.").css("color", "#f39c12");
				$('#cmdsave').hide();
			} else {
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('knopes/ajaxcheckspb'); ?>",
					data: $('#formvalidation').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
						if(msg === 'FALSE') {
							$('#msg').show();
							$("#msg").html("<i class='ti ti-square-rounded-letter-x'></i> Nomor SPB sudah terpakai.").css("color", "red");
							$('#cmdsave').hide();
							console.log(msg);
						} else {
							$('#msg').show();
							$("#msg").html("<i class='ti ti-check'></i> Nomor SPB tersedia").css("color", "green");
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

	$("#optPayment").on('change', function () {
		var valopt = this.value;
		if(valopt == 'cash'){
			$("#wrapPembayaranCash").removeClass('hidden');
			$(".wrapPembayaranTf").addClass('hidden');

			$("#txtAccnamecash").removeAttr('disabled','');
			$("#txtAccname").attr('disabled','');
			$("#txtAccnum").attr('disabled','');
			$("#optBank").attr('disabled','');

			$("#txtAccnamecash").val('CASH - ');
		}else if(valopt == 'transfer'){
			$("#wrapPembayaranCash").addClass('hidden');
			$(".wrapPembayaranTf").removeClass('hidden');
			$('#cmdsave').hide();

			$("#txtAccnamecash").addClass('disabled','');
			$("#txtAccname").removeAttr('disabled','');
			$("#txtAccnum").removeAttr('disabled','');
			$("#optBank").removeAttr('disabled','');
		}else{
			$("#wrapPembayaranCash").addClass('hidden');
			$(".wrapPembayaranTf").addClass('hidden');
		}
	});

	$("#txtAccname").on('change', function () {
		var valOption = $('option:selected', this).attr('data-option');
		var split = valOption.split(",");

		var bank = split[0];
		var norek = split[1];

		$("#optBank").val(bank);
		$("#txtAccnum").val(norek);
		$('#cmdsave').show();
	});
	
	/* start ajax add */
		$("#formAddBank").on('submit', function () {
            $("#msgForm").html("Loading...");

            var dataPost = $('#formAddBank').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url($this->router->fetch_class().'/ajaxaddbank')?>",
                data: dataPost,
                success: function (data) {
                    var respon = JSON.parse(data);
                    if(respon['status'] == 'success'){
	                    $("#msgForm").addClass("text-success");
	                    $("#msgForm").html(respon['msg']);

	                    setTimeout(function(){
		                    document.getElementById("formAddBank").reset();
	                        $("#modalAddBank").modal("hide");
		                    $("#msgForm").html("");

		                    $("#formSearch").trigger("submit");
							location.reload();
	                    }, 500);
                    }else{
                        alert("system not responding");
                    }
                }
            });
		});
		/* end ajax add */
</script>