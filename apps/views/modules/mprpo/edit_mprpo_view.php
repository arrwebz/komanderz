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
        <li class="active">Ubah PRPO</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<?php echo form_open_multipart('mprpo/editprpo');?>
		<?php echo form_hidden('hdnOrderid',$orderid); ?>
		<div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Kode:</label>
				<input name="txtKodenomor" type="text" class="form-control" value="<?php echo $kodenomor; ?>" required>
              </div>
              <div class="form-group">
                <label>Unit:</label>
				<input name="optUnit" type="text" class="form-control" value="MESRA" disabled>
              </div>
			  <div class="form-group">
                <label>Jenis Pekerjaan:</label>
					<select name="optJobtype" class="form-control selectpicker">
						<option disabled selected>Select</option>
						<option value="IT" <?php if($jp == 'IT') echo 'selected' ?>>IT</option>
						<option value="BS" <?php if($jp == 'BS') echo 'selected' ?>>BS</option>
						<option value="TK" <?php if($jp == 'TK') echo 'selected' ?>>TK</option>
					</select>
              </div>
			  <div class="form-group">
                <label>Divisi:</label>
					<select name="optDivision" id="optDivision" class="form-control selectpicker" >
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
			  <div class="form-group">
                <label>Segmen:</label>
					<select name="optSegment" class="form-control selectpicker" >
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Nominal</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Nilai Justifikasi:</label>
				<div class="input-group">
					<div class="input-group-addon">
						Rp
					</div>
				<input name="txtNilaijst" type="text" id="idr1" class="form-control" value="<?php echo $nilaijst; ?>">
				</div>
              </div>
			  <div class="form-group">
                <label>Nilai Negosiasi:</label>
				<div class="input-group">
					<div class="input-group-addon">
						Rp
					</div>
				<input name="txtNilainego" type="text" id="idr2" class="form-control" value="<?php echo $nilainego; ?>">
				</div>
              </div>
			  <div class="form-group">
                <label>AM User:</label>
				<input name="txtAmuser" type="text" class="form-control" value="<?php echo $amuser; ?>">
              </div>
			  <div class="form-group">
                <label>AM Internal:</label>
				<input name="txtAmkomet" type="text" class="form-control" value="<?php echo $amkomet; ?>">
              </div>
			  <div class="form-group">
                <label>Nama Projek:</label>
				<input name="txtProject" type="text" class="form-control" value="<?php echo $namaproyek; ?>">
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