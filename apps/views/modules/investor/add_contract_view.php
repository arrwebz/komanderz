<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Investor</a></li>
            <li class="active">Kontrak Baru</li>
        </ol>
    </section>

    <div class="col-md-12">
        <div class="alert alert-info  alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi!</h4>
            Nomor Kontrak Investor terakhir <?php echo $code_kontrak[0]['last_kontrak'];?>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors(); ?>
            </div>
            <?php echo form_open_multipart('investor/addcontract','id = "formvalidation"');?>
            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nomor</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kode Kontrak:</label>
                            <input type="text" class="form-control" name="txtKodenomor">
                        </div>
                        <div class="form-group">
                            <label>Nomor Kontrak:</label>
                            <input type="text" class="form-control" name="txtKontrak">
                        </div>
                        <div class="form-group">
                            <label>Nama Investor</label>
                            <select name="optInvestor" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <?php

                                if(!empty($invname)){
                                    foreach($invname as $row){
                                        if (!empty($invname) && $invname == $row['investorid'] ) {
                                            $strselected = "selected";
                                        } else {
                                            $strselected = " ";
                                        }
                                        echo '<option value="'.$row['investorid'].'"'. $strselected.'>'.$row['name'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Investor name not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Awal:</label>
                            <input type="text" class="form-control datepicker" name="optSdate">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir:</label>
                            <input type="text" class="form-control datepicker" name="optEdate">
                        </div>
                        <div class="form-group">
                            <label>Jangka Waktu:</label>
                            <input type="text" class="form-control" name="txtPeriode">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Investasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Jumlah Uang:</label>
                            <input id="txtTotalinvest" type="text" class="form-control numformat" name="txtTotalinvest">
                        </div>
                        <div class="form-group">
                            <label>Bunga:</label>
                            <input id="txtBunga" type="text" class="form-control" name="txtBunga">
                        </div>
                        <div class="form-group">
                            <label>Fee Invest:</label>
                            <input id="txtFeeinvest" type="text" class="form-control numformat" name="txtFeeinvest">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Rekening</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Bank:</label>
                            <input type="text" class="form-control" name="txtBank">
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening:</label>
                            <input type="text" class="form-control" name="txtRek">
                        </div>
                        <div class="form-group">
                            <label>Atas Nama:</label>
                            <input type="text" class="form-control" name="txtRekname">
                        </div>
                        <div class="form-group">
                            <label>Keterangan:</label>
                            <textarea class="form-control" name="txtNotes"></textarea>
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

		$('#datatabls').DataTable({
			'responsive'  : true,
			'paging'      : false,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : false,
			'info'        : false,
			'autoWidth'   : true

		});

		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true
		});

		$('#txtTotalinvest').on('input', function(){
			var value = $('#txtTotalinvest').val();
			var convert = number_format(value,0,'','.');
			$("#txtTotalinvest").val(convert);
		});

		$('#txtFeeinvest').on('input', function(){
			var value = $('#txtFeeinvest').val();
			var convert = number_format(value,0,'','.');
			$("#txtFeeinvest").val(convert);
		});

		$('#txtTotalinvest').on('change', function(){
            var txtTotalinvest = $('#txtTotalinvest').val();
            var txtBunga = $('#txtBunga').val();

			var replacetxtTotalinvest = (txtTotalinvest + '').replace(/[^0-9]/g, '');
            var calculate = (replacetxtTotalinvest*txtBunga)/100;

			$('#txtFeeinvest').val(number_format(calculate,0,'','.'));
		});

		$('#txtBunga').on('change', function(){
            var txtTotalinvest = $('#txtTotalinvest').val();
            var txtBunga = $('#txtBunga').val();

			var replacetxtTotalinvest = (txtTotalinvest + '').replace(/[^0-9]/g, '');
            var calculate = (replacetxtTotalinvest*txtBunga)/100;

			$('#txtFeeinvest').val(number_format(calculate,0,'','.'));
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