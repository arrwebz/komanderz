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
        <li class="active">Detail Prospect Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Penomoran</h3>
            </div>
            <div class="box-body">
			  <div class="form-group">
                <label>Kode:</label>
				<input name="txtCode" type="text" class="form-control" value="<?php echo $code; ?>" readonly>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Unit:</label>
				<input name="optUnit" type="text" class="form-control" value="MESRA" disabled>
              </div>
			  <div class="form-group">
                <label>Divisi:</label>
				<select name="optDivision" id="optDivision" class="form-control selectpicker" >
					<option disabled selected>Pilih</option>
					<?php	
							
						if(!empty($division)){
							foreach($division as $row){ 
								if (!empty($divisi) && $divisi == $row['divisionid'] ) {
									$strselected = "selected";
								} else {
									$strselected = " ";
								}
								echo '<option value="'.$row['divisionid'].'"'. $strselected .' readonly>'.$row['code'].'</option>';
							}
						}else{
							echo '<option value="">Division not available</option>';
						}
					?> 
				</select>
              </div>
			  <div class="form-group">
                <label>Segmen:</label>
				<select name="optSegment" class="form-control selectpicker">
					<option disabled selected>Pilih</option>
					<?php
					
					if(!empty($segment)){
						foreach($segment as $row){ 
							if (!empty($segmen) && $segmen == $row['segmentid'] ) {
							$strselected = "selected";
							} else {
								$strselected = " ";
							}
							echo '<option value="'.$row['segmentid'].'"'. $strselected.' readonly>'.$row['name'].'</option>';
						}
					}else{
						echo '<option value="">Segment not available</option>';
					}
				?> 
				</select>
              </div>
			  <div class="form-group">
                <label>AM User:</label>
				<input name="txtAmuser" type="text" class="form-control" value="<?php echo $amuser; ?>" readonly>
              </div>
			  <div class="form-group">
                <label>AM Internal:</label>
				<input name="txtAmkomet" type="text" class="form-control" value='<?php echo $amkomet; ?>' readonly>
              </div>
			  <div class="form-group">
                <label>Tanggal permintaan:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				<input name="txtReqdate" type="text" class="form-control datepicker" value="<?php echo $reqdate; ?>" disabled>
				</div>
              </div> 	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Nominal</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Nilai:</label>
				<div class="input-group">
					<div class="input-group-addon">
						Rp
					</div>
				<input name="txtValue" type="text" id="idr" class="form-control" value="<?php echo $value; ?>" disabled>
				</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-xs-12">
          <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
        </div>
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
