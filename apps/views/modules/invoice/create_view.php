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
                <input type="hidden" name="hdnOrderid" id="hdnOrderid">
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
                                    <input id="txtTglinv" name="txtTglinv" type="date" class="form-control datepicker" autocomplete="off">
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
                                    <input id="txtFaknum" name="txtFaknum" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Delivery Date</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="ti ti-calendar"></i>
                                    </div>
                                    <input id="txtTglkirim" name="txtTglkirim" type="date" class="form-control datepicker" autocomplete="off">
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
                                <input id="txtNopesnomor" name="txtNopesnomor" type="text" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">SPK Entry Date</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                    <input id="txtTglmsknopes" name="txtTglmsknopes" type="date" class="form-control datepicker" autocomplete="off">
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Order Type</label>
                                <select id="optOrderstatus" name="optOrderstatus" class="form-control selectpicker" style="width: 100%">
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
                                    <input id="txtTglnopes" name="txtTglnopes" type="date" class="form-control datepicker" autocomplete="off">
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
                                <select id="optUnit" name="optUnit" class="form-control selectpicker" style="width: 100%">
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
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Job Type</label>
                                <select id="optJobtype" name="optJobtype" class="form-control selectpicker" style="width: 100%">
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
                                <select id="optSegment" name="optSegment" class="form-control selectpicker" style="width: 100%">
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
                                <input id="txtAmuser" name="txtAmuser" type="text" class="form-control">
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Project Name</label>
                                <input id="txtProject" name="txtProject" type="text" class="form-control" style="height:108px">
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
                                <!-- Box NET -->
                                <div id="boxNet" class="hidden">
                                    <p>Hitung NET:</p>
                                    <span id="valueNet8"></span>
                                    <button type="button" id="btnAddNet8" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">8%</button><br>
                                    <span id="valueNet10"></span>
                                    <button type="button" id="btnAddNet10" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">10%</button><br>
                                    <span id="valueNet12"></span>
                                    <button type="button" id="btnAddNet12" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">12%</button><br>
                                    <span id="valueNet15"></span>
                                    <button type="button" id="btnAddNet15" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">15%</button><br>
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
                                <!-- Box PPN -->
                                <div id="boxPPN" class="hidden">
                                    <p>Hitung PPN:</p>
                                    <span id="valueAutoPpn11"></span>
                                    <button type="button" id="btnAddPpn11" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">11%</button><br>
                                    <span id="valueAutoPpn12"></span>
                                    <button type="button" id="btnAddPpn12" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">12%</button><br>
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
                    <button id="btnSave" type="button" class="btn bg-success-subtle font-medium rounded-pill px-4 mb-6">Save</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 mb-6 waves-effect waves-light">Cancel</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		$('.selectpicker').select2();

        function formatRupiah(angka) {
        angka = angka ? parseInt(angka, 10) : 0;
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    $('#idr1').on('keyup', function() {
        // ambil nilai input → kalau kosong default "0"
        let value = ($(this).val() || "0").toString();
        let cleanVal = value.replace(/\./g, ""); // hapus titik
        
        // update hidden field dengan angka mentah
        $("#basevalue").val(cleanVal);

        // tampilkan angka dengan format ribuan
        $(this).val(formatRupiah(cleanVal));

        if (cleanVal !== "0") {
            $("#boxPPN").removeClass("hidden");
            $("#boxNet").removeClass("hidden");

            // PPN 11%
            let ppn11 = +cleanVal + (cleanVal * 11 / 100);
            $("#valueAutoPpn11").html(formatRupiah(ppn11));
            $("#btnAddPpn11").attr("data-val", ppn11);

            // PPN 12%
            let ppn12 = +cleanVal + (cleanVal * 12 / 100);
            $("#valueAutoPpn12").html(formatRupiah(ppn12));
            $("#btnAddPpn12").attr("data-val", ppn12);

            // NET -8%
            let net8 = +cleanVal - (cleanVal * 8 / 100);
            $("#valueNet8").html(formatRupiah(net8));
            $("#btnAddNet8").attr("data-val", net8);

            // NET -10%
            let net10 = +cleanVal - (cleanVal * 10 / 100);
            $("#valueNet10").html(formatRupiah(net10));
            $("#btnAddNet10").attr("data-val", net10);

            // NET -12%
            let net12 = +cleanVal - (cleanVal * 12 / 100);
            $("#valueNet12").html(formatRupiah(net12));
            $("#btnAddNet12").attr("data-val", net12);

            // NET -15%
            let net15 = +cleanVal - (cleanVal * 15 / 100);
            $("#valueNet15").html(formatRupiah(net15));
            $("#btnAddNet15").attr("data-val", net15);

        } else {
            $("#idr2, #idr3").val("");
            $("#boxPPN, #boxNet").addClass("hidden");
        }
    });

    // Event click untuk isi nilai ke input lain
    $("#btnAddPpn11, #btnAddPpn12").on("click", function () {
        var value = $(this).data('val');
        $("#idr2").val(formatRupiah(value));
    });

    $("#btnAddNet8, #btnAddNet10, #btnAddNet12, #btnAddNet15").on("click", function () {
        var value = $(this).data('val');
        $("#idr3").val(formatRupiah(value));
    });

	
        /* AJAX create */

        // Save Invoice
        $("#btnSave").on("click", function(e){
            e.preventDefault();
            $.post("<?= site_url('invoice/create_ajax'); ?>", $("#formInvoice").serialize(), function(res){
                try {
                    res = JSON.parse(res);
                } catch (e) {
                    swal("Error!", "Respon server tidak valid", "error");
                    return;
                }

                if(res.status === "error"){
                    swal("Gagal!", res.message || "Terjadi kesalahan.", "error");
                } else if(res.status === "success"){
                    swal({
                        title: "Invoice berhasil dibuat!",
                        text: "Nomor: " + res.code,
                        type: "success",
                        confirmButtonText: "OK"
                    }, function(){
                        window.location.href = res.redirect_url;
                    });
                }
                // if(res.status === "error"){
                //     alert("Data invoice sudah ada, tidak bisa disimpan lagi!");
                // } else {
                //    $("#optOrderstatus").val(res.orderstatus);
                //     $("#txtCode").val(res.invnum);
                //     $("#hdnOrderid").val(res.orderid);
                //     $("#item_orderid").val(res.orderid);
                //     $("#txtFaknum").val(res.faknum);
                //     $("#txtTglinv").val(res.invdate);
                //     $("#optUnit").val(res.unit);
                //     $("#optJobtype").val(res.jobtype);
                //     $("#optDivision").val(res.division);
                //     $("#optSegment").val(res.segment);
                //     $("#txtAmuser").val(res.amuser);
                //     $("#txtAmkomet").val(res.amkomet);
                //     $("#txtProject").val(res.projectname);
                //     $("#txtTglkirim").val(res.sentdate);
                //     $("#txtNopesnomor").val(res.spknum);
                //     $("#txtTglmsknopes").val(res.spkindat);
                //     $("#txtTglnopes").val(res.spkdat);
                //     $("#idr1").val(res.basevalue);
                //     $("#idr3").val(res.netvalue);
                //     $("#idr2").val(res.ppnvalue);

                //     alert("Invoice berhasil dibuat!");
                //     window.location.href = res.redirect_url;
                // }
            });
        });
	});
</script>

