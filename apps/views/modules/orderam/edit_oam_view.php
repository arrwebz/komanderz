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
                        <li class="breadcrumb-item" aria-current="page">Update Request</li>
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
                <h5 class="card-title fw-semibold mb-0">Update Form</h5>
            </div>
            <?php echo form_open_multipart('orderam/editoam');?>
            <?php echo form_hidden('hdnOrderamid',$orderamid); ?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Penomoran</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Status Invoice</label>
                            <select name="optStatinv" class="form-control selectpicker" style="width: 100%">
                                <option selected>Pilih</option>
                                <option value="9" <?php if($statinv == '9') echo 'selected' ?>>BATAL</option>
                            </select>
                            <span class="help-block" style="color:#e74c3c;"><i>Jika invoice batal, ganti kode sistem setelah nomor dengan kata BTL.</i></span>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Invoice Order</label>
                            <select name="optOrderinv" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
                                <option value="0" <?php if($orderinv == '0'){ echo 'selected'; }?>>PRPO</option>
                                <option value="1" <?php if($orderinv == '1'){ echo 'selected'; }?>>NOPES</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal masuk SPK</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglmsknopes" type="date" class="form-control datepicker" autocomplete="off" value="<?php echo $tglmskspk; ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Tel/SPK/VSO PADI</label>
                            <input name="txtNopesnomor" type="text" class="form-control" value="<?php echo $nomorspk; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tipe Order</label>
                            <select name="optOrderstatus" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
                                <option value="NOPES" <?php if($statusorder == 'NOPES'){ echo 'selected'; }?>>NOPES</option>
                                <option value="IBL" <?php if($statusorder == 'IBL'){ echo 'selected'; }?>>IBL</option>
                                <option value="OBL" <?php if($statusorder == 'OBL'){ echo 'selected'; }?>>OBL</option>
                                <option value="OBL" <?php if($statusorder == 'PADI'){ echo 'selected'; }?>>PADI</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal SPK</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                                <input name="txtTglnopes" type="date" class="form-control datepicker" autocomplete="off" value="<?php echo $tglspk; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Informasi</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Unit</label>
                            <select name="optUnit" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
                                <option value="KOMET"<?php if($unit == 'KOMET') echo 'selected' ?>>KOMET</option>
                                <option value="PADI"<?php if($unit == 'PADI') echo 'selected' ?>>PADI</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Divisi</label>
                            <select name="optDivision" id="optDivision" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
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
                            <label class="form-label fw-semibold">AM User</label>
                            <input name="txtAmuser" type="text" class="form-control" value="<?php echo $amuser; ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Project Name</label>
                            <input name="txtProject" type="text" class="form-control" style="height:108px" value="<?php echo $namaproyek; ?>">
                            <span class="help-block" style="color:#737373;"><i>Berikan keterangan jika invoice batal.</i></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Jenis Pekerjaan</label>
                            <select name="optJobtype" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
                                <option value="IT" <?php if($jp == 'IT') echo 'selected' ?>>IT</option>
                                <option value="BS" <?php if($jp == 'BS') echo 'selected' ?>>BS</option>
                                <option value="TK" <?php if($jp == 'TK') echo 'selected' ?>>TK</option>
                                <option value="PD" <?php if($jp == 'PD') echo 'selected' ?>>PD</option>
                                <option value="SM" <?php if($jp == 'SM') echo 'selected' ?>>SM</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Segment</label>
                            <select name="optSegment" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
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
                            <label class="form-label fw-semibold">AM Internal</label>
                            <?php if(in_array($amkomet, listam())){ ?>
                                <input name="txtAmkomet" type="text" class="form-control" value="<?php echo $amkomet;?>" readonly>
                            <?php }elseif(in_array($amkomet, listsupportam())){ ?>
                                <select name="txtAmkomet" id="txtAmkomet" class="form-control selectpicker" style="width: 100%">
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
                                <input name="txtNilaidasar" type="text" id="idr1" class="form-control" value="<?php echo $nilaidasar; ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Base Net</label>
                            <div id="boxNet" class="hidden">
                                NET - 10% = <strong id="valueNet10"></strong>
                                <button id='btnAddNet10' type='button' class='btn btn-default btn-flat btn-xs' style='margin-bottom:7px'>Gunakan -10%</button>
                                <br>NET - 12% = <strong id="valueNet12"></strong>
                                <button id='btnAddNet12' type='button' class='btn btn-default btn-flat btn-xs' style='margin-bottom:7px'>Gunakan -12%</button>
                                <br>NET - 15% = <strong id="valueNet15"></strong>
                                <button id='btnAddNet15' type='button' class='btn btn-default btn-flat btn-xs' style='margin-bottom:7px'>Gunakan -15%</button>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtNilainet" type="text" id="idr3" class="form-control" value="<?php echo $nilaippn; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Base Value + PPN</label>
                            <div id="boxPPN" class="hidden">
                                PPN + 11% = <strong id="valueAutoPpn"></strong>
                                <button id='btnAddPpn' type='button' class='btn btn-default btn-flat btn-xs' style='margin-bottom:7px'>Gunakan +11%</button>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input name="txtNilaippn" type="text" id="idr2" class="form-control" value="<?php echo $nilainet; ?>">
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