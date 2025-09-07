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
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">SPB</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tipe Pengajuan</label>
                            <?php
                            if ($spb[0]['tipe_pengajuan'] == '2'){
                                if($spb[0]['tipe_penarikan'] == '1'){
                                    $tipe_penarikan = '';
                                }elseif ($spb[0]['tipe_penarikan'] == '2'){
                                    $tipe_penarikan = '- Pensiun';
                                }elseif ($spb[0]['tipe_penarikan'] == '3'){
                                    $tipe_penarikan = '- Keluar';
                                }else{
                                    $tipe_penarikan = 'Tipe Penarikan tidak diketahui';
                                }
                                $show_tipe = 'Penarikan Simpanan '.$tipe_penarikan;
                            }elseif ($spb[0]['tipe_pengajuan'] == '5'){
                                $show_tipe = 'Pinjaman Insidentil';
                            }elseif ($spb[0]['tipe_pengajuan'] == '6'){
                                $show_tipe = 'Pinjaman Koptel';
                            }else{
                                $show_tipe = 'Tipe Pengajuan tidak diketahui';
                            }
                            ?>
                            <input type="text" value="<?php echo $show_tipe;?>" class="form-control" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Nomor SPB</label>
                            <input type="text" value="<?php echo $spb[0]['nomor'];?>" class="form-control" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Tanggal SPB</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($spb[0]['tanggal_spb']));?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Pengajuan</label>
                            <input name="txtNomorPengajuan" type="text" class="form-control" value="<?php echo $spb[0]['nomor_pengajuan'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pengajuan</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($spb[0]['tanggal_pengajuan']));?>" readonly>
                            </div>
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
                            <input type="text" class="form-control" value="<?php echo $spb[0]['bank'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input type="text" class="form-control" value="<?php echo $spb[0]['norek'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Rekening</label>
                            <input type="text" class="form-control" value="<?php echo $spb[0]['atas_nama'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nilai Pengajuan</label>
                            <?php
                            if ($spb[0]['tipe_pengajuan'] == '2'){
                                $nominal = $spb[0]['nominal_penarikan'];
                            }elseif ($spb[0]['tipe_pengajuan'] == '5'){
                                $nominal = $spb[0]['nominal_pinjaman_insidentil'];
                            }elseif ($spb[0]['tipe_pengajuan'] == '6'){
                                $nominal = $spb[0]['nominal_kotel'];
                            }else{
                                $nominal = 'Nilai tidak diketahui';
                            }
                            ?>
                            <input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($nominal)),3)));?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nilai SPB</label>
                            <input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($spb[0]['nominal'])),3)));?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status SPB</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Status SPB</label>
                            <?php
                            if ($spb[0]['status'] == '1'){
                                $status_spb = 'SPB Dibuat';
                                $btf = '-';
                            }elseif ($spb[0]['status'] == '2'){
                                $status_spb = 'SPB Selesai';
                                $imgpath = $this->config->item('uploads_uri') . 'spbsp/' . $spb[0]['spbspid']. '/'. $spb[0]['bukti_transfer'];
                                $btf = '<img src="'. $imgpath .'" class="img-responsive">';
                            }else{
                                $status_spb = 'Status tidak diketahui';
                                $btf = '-';
                            }
                            ?>
                            <input type="text" class="form-control" value="<?php echo $status_spb;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Bukti Transfer</label>
                            <?php echo $btf;?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
            </div>
        </div>
    </section>
</div>

<script>
	$(function() {
		$('.selectpicker').select2();

		var table = $('#datatables').DataTable({
			'responsive': true,
			'paging': true,
			'lengthChange': false,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': true

		});

		$('.datepicker').datepicker({
			defaultDate: new Date(),
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true
		});

		/* start validasi tipe pengajuan */
		$("#tipePengajuan").on('change', function () {
			tipePengajuan = $('#tipePengajuan').val();

			if(tipePengajuan == '1'){
				$('#boxAnggotaBaru').removeClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '2'){
				$('#txtNikPenarikan').trigger('change');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').removeClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '3'){
				$('#txtNikPerubahanSimpanan').trigger('change');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').removeClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '4'){
				$('#txtNikPerubahanData').trigger('change');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').removeClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '5'){
				$('#txtNikInsidentil').trigger('change');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').removeClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '6'){
				$('#txtNikKoptel').trigger('change');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').removeClass('hidden');
			}else{
				disabledSend('false');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}
		});
		$('#tipePengajuan').trigger('change');
		/* end validasi tipe pengajuan */

		/* start format number */
		$('#txtSimpananpokok').on('input', function(){
			var value = $('#txtSimpananpokok').val();
			var convert = number_format(value,0,'','.');
			$("#txtSimpananpokok").val(convert);
		});
		$('#txtSimpanansukarela').on('input', function(){
			var value = $('#txtSimpanansukarela').val();
			var convert = number_format(value,0,'','.');
			$("#txtSimpanansukarela").val(convert);
		});
		$('#txtNominalpenarikan').on('input', function(){
			var value = $('#txtNominalpenarikan').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominalpenarikan").val(convert);
		});
		$('#txtSimpanansukarelaPerubahansimpanan').on('input', function(){
			var value = $('#txtSimpanansukarelaPerubahansimpanan').val();
			var convert = number_format(value,0,'','.');
			$("#txtSimpanansukarelaPerubahansimpanan").val(convert);
		});
		$('#txtSimpananpokokPerubahanData').on('input', function(){
			var value = $('#txtSimpananpokokPerubahanData').val();
			var convert = number_format(value,0,'','.');
			$("#txtSimpananpokokPerubahanData").val(convert);
		});
		$('#txtNominalpinjamaninsidentil').on('input', function(){
			var value = $('#txtNominalpinjamaninsidentil').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominalpinjamaninsidentil").val(convert);
		});
		$('#txtNominalpinjamankoptel').on('input', function(){
			var value = $('#txtNominalpinjamankoptel').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominalpinjamankoptel").val(convert);
		});
		/* end format number */

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