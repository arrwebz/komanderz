<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Billing</a></li>
            <li class="active">Buat Invoice PRPO</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php echo form_open_multipart('mprpo/createinvoice');?>
            <?php echo form_hidden('hdnOrderid',$orderid); ?>
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Unit:</label>
                            <input name="optUnit" type="text" class="form-control" value="MESRA" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tipe Order:</label>
                            <select name="optOrderstatus" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <option value="IBL" <?php if($strstatorder == 'IBL'){ echo 'selected'; }?>>IBL</option>
                                <option value="OBL" <?php if($strstatorder == 'OBL'){ echo 'selected'; }?>>OBL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode:</label>
                            <input name="txtKodenomor" type="text" class="form-control" value="<?php echo $kodenomor; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Invoice:</label>
                            <input name="txtNomorinv" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nomor Faktur Pajak:</label>
                            <input name="txtNomorfak" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nomor KL/Tel/SPK:</label>
                            <input name="txtNomorkl" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Invoice:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="txtTglinv" type="text" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Nominal</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nilai Dasar:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Rp
                                </div>
                                <input name="txtNilaidasar" type="text" id="idr1" class="form-control" value="<?php echo $nilainego; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nilai Net:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Rp
                                </div>
                                <input name="txtNilainet" type="text" id="idr2" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>/details/<?php echo $orderid; ?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" name="cmdsave" class="btn btn-success pull-right">Selesai</button>
            </div>
            <?php echo form_close();?>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">

	$(document).ready(function() {

		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true});

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