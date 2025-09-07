<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">LOP</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('lop');?>">Project</a>
                        </li>
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

<?php echo form_open_multipart('lop/addlop','id = "formvalidation"');?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Informasi</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Unit</label>
                            <input name="optUnit" type="text" class="form-control" value="KOMET">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Divisi</label>
                            <select name="optDivision" class="form-control selectpicker" style="width: 100%">
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
                            <label class="form-label fw-semibold">AM Komet</label>
                            <select name="txtAmkomet" class="form-control selectpicker" >
                                <option disabled selected>Pilih</option>
                                <?php
                                if(!empty($marketing)){
                                    foreach($marketing as $row){
                                        if($row['userid'] == '30' || $row['userid'] == '36' || $row['userid'] == '21' || $row['userid'] == '37') {
                                            if (!empty($amkomet) && $amkomet == $row['fullname']) {
                                                $strselected = "selected";
                                            } else {
                                                $strselected = " ";
                                            }
                                            echo '<option value="'.$row['fullname'].'"'. $strselected .'>'.$row['fullname'].'</option>';
                                        }
                                    }
                                }else{
                                    echo '<option value="">AM not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nama Projek</label>
                            <input name="txtProjectname" type="text" class="form-control" style="height:108px">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="optStatus" id="optStatus" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
                                <option value="2">P1</option>
                                <option value="3">P8</option>
                                <option value="4">KL</option>
                                <option value="5">BAST</option>
                                <option value="6">BAPL</option>
                                <option value="7">BAPLA</option>
                                <option value="1">SUDAH INVOICE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Tel/SPK/VSO PADI</label>
                            <input name="txtSpknum" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nilai KL</label>
                            <input name="txtNilaikl" type="text" id="idr1" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Start Date</label>
                            <input name="txtStart" type="date" class="form-control datepicker">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">End Date</label>
                            <input name="txtEnd" type="date" class="form-control datepicker">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <input name="txtNotes" type="text" class="form-control" style="height:108px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" name="cmdsave" id="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Selesai</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>

<script>
	$(function() {

		$('.selectpicker').select2();

		$('#idr1').on('input', function(){
			var value = $('#idr1').val();
			var convert = number_format(value,0,'','.');
			$("#idr1").val(convert);
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
