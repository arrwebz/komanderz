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
    Jangan lupa di simpan
</div>

<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <form id="formInvoice">
                <input type="hidden" name="orderid" id="orderid">
                <div class="card-body p-4 border-bottom">
                    <h5 class="fs-4 fw-semibold mb-4">Invoicing</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Invoice Number</label>
                                
                                <input id="txtCode" name="txtCode" type="text" class="form-control" autocomplete="off" readonly>
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
                                    <button id="btnAddNet8" type="button" class="btn mb-1 bg-primary text-white btn-sm" style="margin-bottom:7px">Use -8%</button>
                                    <br>NET - 10% = <strong id="valueNet10"></strong>
                                    <button id="btnAddNet10" type="button" class="btn mb-1 bg-primary text-white btn-sm" style="margin-bottom:7px">Use -10%</button>
                                    <br>NET - 12% = <strong id="valueNet12"></strong>
                                    <button id="btnAddNet12" type="button" class="btn mb-1 bg-primary text-white btn-sm" style="margin-bottom:7px">Use -12%</button>
                                    <br>NET - 15% = <strong id="valueNet15"></strong>
                                    <button id="btnAddNet15" type="button" class="btn mb-1 bg-primary text-white btn-sm" style="margin-bottom:7px">Use -15%</button>
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
                                    <button id="btnAddPpn11" type="button" class="btn mb-1 bg-primary text-white btn-sm" style="margin-bottom:7px">Use +11%</button>
                                    <br>PPN + 12% = <strong id="valueAutoPpn12"></strong>
                                    <button id="btnAddPpn12" type="button" class="btn mb-1 bg-primary text-white btn-sm" style="margin-bottom:7px">Use +12%</button>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input name="txtNilaippn" type="text" id="idr2" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="btnSave" type="button" class="btn bg-success-subtle font-medium rounded-pill px-4 mb-6">Save</button>
                <button id="btnUpdate" type="button" class="btn bg-success-subtle font-medium rounded-pill px-4 mb-6">Update</button>
                <button id="btnDelete" type="button" class="btn bg-danger-subtle font-medium rounded-pill px-4 mb-6">Delete</button>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Invoice Item</h5>
            </div>
                <div class="card-body p-4 border-bottom">
                    <form id="formItem">
                        <input type="hidden" name="orderid" id="item_orderid">
                        <input type="text" name="description" placeholder="Description">
                        <input type="number" name="qty" placeholder="Qty">
                        <input type="text" name="unit" placeholder="Unit">
                        <input type="number" name="price" placeholder="Price">
                        <button type="button" id="btnAddItem" class="btn mb-1 bg-success btn-circle btn-md d-inline-flex align-items-center justify-content-center"></button>
                    </form>
                    <table id="itemTable" class="table">
                        <thead>
                            <tr>
                                <th width="3%">
                                    
                                </th>
                                <th>Description</th>
                                <th width="7%">Qty</th>
                                <th width="7%">Unit</th>
                                <th width="15%">Harga</th>
                                <th width="15%">Total</th>
                                <th width="5%" class="text-right"> Act</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    </div>
            </div>
            <div class="card-footer">
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
				$("#boxPPH").removeClass("hidden");
				$("#boxNet").removeClass("hidden");

				/* PPN*/
				var cleanVal = value.replaceAll(".","");
				let presentasePpn = (cleanVal * 11) /100;
				var nilaippn = +cleanVal + +presentasePpn;
				var convertPPN = number_format(nilaippn,0,'','.');
				$("#valueAutoPpn").html(convertPPN);
				document.getElementById("btnAddPpn").setAttribute("data-val",convertPPN);

				/* PPH */
				var cleanValNet = value.replaceAll(".","");
				let presentasePph1_5 = (cleanValNet * 1.5) /100;
				var nilaipph1_5 = +presentasePph1_5;
				var convertPph1_5 = number_format(nilaipph1_5,0,'','.');
				$("#valuePph1_5").html(convertPph1_5);
				document.getElementById("btnAddPph1_5").setAttribute("data-val",convertPph1_5);

				var cleanValNet = value.replaceAll(".","");
				let presentasePph2 = (cleanValNet * 2) /100;
				var nilaipph2 = +presentasePph2;
				var convertPph2 = number_format(nilaipph2,0,'','.');
				$("#valuePph2").html(convertPph2);
				document.getElementById("btnAddPph2").setAttribute("data-val",convertPph2);

				/* NET*/
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
		$('#idr4').on('input', function(){

			var value = $('#idr4').val();

			var convert = number_format(value,0,'','.');

			$("#idr4").val(convert);

		});

		$("#btnAddPpn").on("click", function () {
			var value = $(this).data('val');
			$("#idr2").val(value);
		});

		$("#btnAddPph1_5, #btnAddPph2").on("click", function () {
			var value = $(this).data('val');
			$("#idr4").val(value);
		});

		$("#btnAddNet10, #btnAddNet12, #btnAddNet15").on("click", function () {
			var value = $(this).data('val');
			$("#idr3").val(value);
		});

        /* AJAX create */

        // Save Invoice
        $("#btnSave").on("click", function(e){
            e.preventDefault();
            $.post("<?= site_url('invoice/create_ajax'); ?>", $("#formInvoice").serialize(), function(res){
                res = JSON.parse(res);
                if(res.status === "success"){
                    $("#txtCode").val(res.code);
                    $("#orderid").val(res.orderid);
                    $("#item_orderid").val(res.orderid);
                    alert("Invoice berhasil dibuat!");
                }
            });
        });

        // Update Invoice
        $("#btnUpdate").on("click", function(e){
            e.preventDefault();
            var orderid = $("#orderid").val();
            $.post("<?= site_url('invoice/update_ajax/'); ?>" + orderid, $("#formInvoice").serialize(), function(res){
                res = JSON.parse(res);
                if(res.status === "success"){
                    alert("Invoice berhasil diupdate!");
                }
            });
        });

        // Delete Invoice
        $("#btnDelete").on("click", function(e){
            e.preventDefault();
            var orderid = $("#orderid").val();
            $.post("<?= site_url('invoice/delete_ajax/'); ?>" + orderid, function(res){
                res = JSON.parse(res);
                if(res.status === "success"){
                    alert("Invoice berhasil dihapus!");
                    location.reload();
                }
            });
        });

        // Add Item
        $("#btnAddItem").on("click", function(e){
            e.preventDefault();
            $.post("<?= site_url('invoice/add_item_ajax'); ?>", $("#formItem").serialize(), function(res){
                res = JSON.parse(res);
                if(res.status === "success"){
                    loadItems($("#item_orderid").val());
                }
            });
        });

        // Load Items
        function loadItems(orderid){
            $.getJSON("<?= site_url('invoice/get_items_ajax/'); ?>" + orderid, function(data){
                let rows = "";
                $.each(data, function(i, item){
                    rows += "<tr>"
                        + "<td>"+item.description+"</td>"
                        + "<td>"+item.qty+"</td>"
                        + "<td>"+item.unit+"</td>"
                        + "<td>"+item.price+"</td>"
                        + "<td>"+item.total+"</td>"
                        + "<td><button onclick='deleteItem("+item.itemid+")'>Hapus</button></td>"
                        + "</tr>";
                });
                $("#itemTable tbody").html(rows);
            });
        }

        // Delete Item
        function deleteItem(itemid){
            $.post("<?= site_url('invoice/delete_item_ajax/'); ?>" + itemid, function(res){
                res = JSON.parse(res);
                if(res.status === "success"){
                    loadItems($("#item_orderid").val());
                }
            });
        }


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

