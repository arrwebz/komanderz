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
        <li class="active">Pengajuan SPB</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<?php echo form_open_multipart('kprpo/addspb');?>
		<?php echo form_hidden('hdnOrderid',$orderid); ?>
		<?php echo form_hidden('hdnSpbid',$spbid); ?>
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nomor</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>Kode:</label>
				<input name="txtInvoice" type="text" class="form-control" value="<?php echo $kodenomor; ?>" disabled>
              </div>
			  <div class="form-group">
                <label>Nomor SPB:</label>
				<input name="txtKodenomor" type="number" class="form-control">
              </div>
			  <div class="form-group">
                <label>Jenis Pekerjaan:</label>
					<select name="optJobtype" class="form-control selectpicker">
						<option disabled selected>Pilih</option>
						<option value="IT">IT</option>
						<option value="BS">BS</option>
						<option value="TK">TK</option>
					</select>
              </div>
			  <div class="form-group">
                <label>Kepada:</label>
				<input name="txtCustomer" type="text" class="form-control">
              </div>
			  <div class="form-group">
                <label>Untuk Pembayaran:</label>
				<textarea name="txtInfo" type="text" class="form-control" style="width:445px; height:183px;"><?php echo $namaproyek ?></textarea>
              </div>			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Pembayaran</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>Nilai SPB:</label>
				<div class="input-group">
					<div class="input-group-addon">
						Rp
					</div>
				<input name="txtValue" type="text" id="idr" class="form-control">
				</div>
              </div>
			  <div class="form-group">
                <label>Tanggal SPB:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				<input name="txtSpbdate" type="text" class="form-control datepicker">
				</div>
              </div>
			  <div class="form-group">
                <label>Jenis Pembayaran:</label>
					<select name="optPayment" class="form-control selectpicker">
						<option disabled selected>Pilih</option>
						<option value="cash">CASH</option>
						<option value="transfer">TRANSFER</option>
					</select>
              </div>
			  <div class="form-group">
                <label>No Rekening:</label>
				<input name="txtAccnum" type="text" class="form-control">
              </div>
			  <div class="form-group">
                <label>Atas Nama:</label>
				<input name="txtAccname" type="text" class="form-control">
              </div>
			  <div class="form-group">
                <label>Bank:</label>
					<select name="optBank" class="form-control selectpicker" onchange="check(this);">
						<option disabled selected>Pilih</option>
						<option value="bca">BCA</option>
						<option value="mandiri">MANDIRI</option>
						<option value="bni">BNI</option>
						<option value="bri">BRI</option>
						<option value="other">LAINNYA...</option>
					</select>
              </div>
			  <div class="form-group" id="otherid" style="display: none;">
                <label>Bank Lainnya:</label>
				<input name="txtBankother" type="text" class="form-control">
              </div>
			  <script>
				function check(that) {
						if (that.value == "other") {
							document.getElementById("otherid").style.display = "block";
						} else {
							document.getElementById("otherid").style.display = "none";
						}
					}
				</script>
			  <div class="form-group">
                <label>Nama Pemohon:</label>
				<input name="txtApplicant" type="text" class="form-control">
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-xs-12">
          <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
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
	});
	</script>