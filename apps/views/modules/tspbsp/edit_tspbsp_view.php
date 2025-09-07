<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home');?>"><i class="fa fa-dashboard"></i> home</a></li>
            <li><a href="javascript:"><?php echo strtolower($title);?></a></li>
            <li class="active"><?php echo strtolower($brand);?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php echo form_open_multipart('tspbsp/editspbsp','id = "formvalidation"');?>
            <input type="hidden" name="txtSpbspid" value="<?php echo $spb[0]['spbspid'];?>"/>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Pengajuan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tipe Pengajuan</label>
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
                            <input type="text" value="<?php echo $show_tipe;?>" class="form-control" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Nomor Pengajuan</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['nomor_pengajuan'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <input id="txtNik" name="txtNik" type="text" class="form-control" value="<?php echo $pengajuan[0]['nik'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <?php if($pengajuan[0]['platform'] == '2'): ?>
                                <input type="text" class="form-control" value="<?php echo $pengajuan[0]['nama'];?>" readonly>
                            <?php else: ?>
                                <input type="text" class="form-control" value="<?php echo $pengajuan[0]['name'];?>" readonly>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Pembayaran</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Bank</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['bank'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['norek'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Rekening</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['atas_nama'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nilai Pengajuan</label>
                            <?php
                            if ($pengajuan[0]['tipe_pengajuan'] == '2'){
                                $nominal = $pengajuan[0]['nominal_penarikan'];
                            }elseif ($pengajuan[0]['tipe_pengajuan'] == '5'){
                                $nominal = $pengajuan[0]['nominal_insidentil'];
                            }elseif ($pengajuan[0]['tipe_pengajuan'] == '6'){
                                $nominal = $pengajuan[0]['nominal_kotel'];
                            }else{
                                $nominal = 'Nilai tidak diketahui';
                            }
                            ?>
                            <input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($nominal)),3)));?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit SPB</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tanggal SPB</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="txtTanggalspb" type="text" class="form-control datepicker" autocomplete="off" value="<?php echo date('d-m-Y', strtotime($spb[0]['tanggal_spb']));?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor SPB</label>
                            <input id="txtNomorspb" name="txtNomorspb" type="text" class="form-control" value="<?php echo $spb[0]['nomor'];?>">
                            <div id="msg"></div>
                        </div>
                        <div class="form-group">
                            <label>Nilai SPB</label>
                            <input id="txtNominalspb" name="txtNominalspb" type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($spb[0]['nominal'])),3)));?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" name="cmdsave" id="cmdsave" class="btn btn-success pull-right">Selesai</button>
            </div>
            <?php echo form_close();?>
        </div>
    </section>
</div>

<script>
	$(function() {
		$('.selectpicker').select2();

		$('.datepicker').datepicker({
			defaultDate: new Date(),
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true
		});

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