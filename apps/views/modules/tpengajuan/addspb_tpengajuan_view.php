<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Membership</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="javascript:">Add SPB SP</a>
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

<?php echo form_open_multipart('tpengajuan/addspb','id = "formvalidation"');?>
<input type="hidden" name="txtPengajuanid" value="<?php echo $pengajuan[0]['pengajuanid'];?>"/>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Informasi Pengajuan</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tipe Pengajuan</label>
                            <?php
                            if ($pengajuan[0]['tipe_pengajuan'] == '2'){
                                if($pengajuan[0]['tipe_penarikan'] == '1'){
                                    $tipe_penarikan = '';
                                }elseif ($pengajuan[0]['tipe_penarikan'] == '2'){
                                    $tipe_penarikan = '- Pensiun';
                                }elseif ($pengajuan[0]['tipe_penarikan'] == '3'){
                                    $tipe_penarikan = '- Keluar';
                                }else{
                                    $tipe_penarikan = 'Tipe Penarikan tidak diketahui';
                                }
                                $show_tipe = 'Penarikan Simpanan '.$tipe_penarikan;
                            }elseif ($pengajuan[0]['tipe_pengajuan'] == '5'){
                                $show_tipe = 'Pinjaman Insidentil';
                            }elseif ($pengajuan[0]['tipe_pengajuan'] == '6'){
                                $show_tipe = 'Pinjaman Koptel';
                            }else{
                                $show_tipe = 'Tipe Pengajuan tidak diketahui';
                            }
                            ?>
                            <input type="text" value="<?php echo $show_tipe;?>" class="form-control" disabled/>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">NIK</label>
                            <input id="txtNik" name="txtNik" type="hidden" class="form-control" value="<?php echo $pengajuan[0]['nik'];?>">
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['nik'];?>" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Pengajuan</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['nomor_pengajuan'];?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nama</label>
                            <?php if($pengajuan[0]['platform'] == '2'): ?>
                                <input type="text" class="form-control" value="<?php echo $pengajuan[0]['nama'];?>" disabled>
                            <?php else: ?>
                                <input type="text" class="form-control" value="<?php echo $pengajuan[0]['name'];?>" disabled>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Informasi Pembayaran</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Bank</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['bank'];?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nilai Pengajuan</label>
                            <?php
                            if ($pengajuan[0]['tipe_pengajuan'] == '2'){
                                $nominal = $pengajuan[0]['nominal_penarikan'];
                            }elseif ($pengajuan[0]['tipe_pengajuan'] == '5'){
                                $nominal = $pengajuan[0]['nominal_pinjaman_insidentil'];
                            }elseif ($pengajuan[0]['tipe_pengajuan'] == '6'){
                                $nominal = $pengajuan[0]['nominal_kotel'];
                            }else{
                                $nominal = 'Nilai tidak diketahui';
                            }
                            ?>
                            <input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($nominal)),3)));?>" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Rekening</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['norek'];?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nama Rekening</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['atas_nama'];?>" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">SPB</h5>
                Nomor SPB SP terakhir <?php echo $code_spb;?>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor SPB SP</label>
                            <input id="txtNomorspb" name="txtNomorspb" type="text" class="form-control" value="<?php echo $code_spb;?>">
                        </div>
                        <div class="mb-4">
                            <?php
                                $nominal_spb = '';
                                if($pengajuan[0]['tipe_pengajuan'] == '5'){
                                    $nominal_spb = strrev(implode('.',str_split(strrev(strval($pengajuan[0]['pencairan_insidentil'])),3)));
                                }
                            ?>
                            <label class="form-label fw-semibold">Nilai SPB SP</label>
                            <input id="txtNominalspb" name="txtNominalspb" type="text" class="form-control" value="<?php echo $nominal_spb;?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal SPB SP</label>
                            <input name="txtTanggalspb" type="date" class="form-control datepicker" autocomplete="off" required value=<?php echo date('Y-m-d');?>>
                        </div>
                        <?php if($pengajuan[0]['tipe_pengajuan'] == '5'){?>
                        <?php if($pengajuan[0]['topupid_insidentil'] > 0){?>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">TOPUP ID</label>
                                <input type="text" class="form-control" value="<?php echo $pengajuan[0]['topupid_insidentil'];?>" readonly>
                            </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" id="cmdsave" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>

<script>
	$(function() {
		$('.selectpicker').select2();

		$('#txtNominalspb').on('input', function(){
			var value = $('#txtNominalspb').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominalspb").val(convert);
		});

		$("#txtNomorspb").on("blur", function(e) {
			$('#msg').hide();
			if ($('#txtNomorspb').val() == null || $('#txtNomorspb').val() == "") {
				$('#msg').show();
				$("#msg").html("<i class='fa fa-bell-o'></i> Nomor SPB tidak boleh kosong.").css("color", "#f39c12");
				$('#cmdsave').hide();
			} else {
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('tpengajuan/ajaxcheckspb'); ?>",
					data: $('#formvalidation').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
						if(msg === 'FALSE') {
							$('#msg').show();
							$("#msg").html("<i class='fa fa-times-circle-o'></i> Nomor SPB sudah terpakai.").css("color", "red");
							$('#cmdsave').hide();
							console.log(msg);
						} else {
							$('#msg').show();
							$("#msg").html("<i class='fa fa-check'></i> Nomor SPB tersedia").css("color", "green");
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

	function disabledSend(param) {
		if(param == 'true'){
			$('#cmdsave').removeAttr('disabled', false);
		}else{
			$('#cmdsave').attr('disabled', true);
		}
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
</script>