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
        <li class="active">Add Prospect Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<?php echo form_open_multipart('mpros/addnew');?>
		<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
				<div class="form-group">
					<label>Location:</label>
					<div id="map" style="height: 200px;width: 100%;"></div>

					<input name="txtLat" id="txtLat" type="hidden" class="form-control" />
					<input name="txtLong" id="txtLong" type="hidden" class="form-control" />
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
		<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nominal</h3>
            </div>
            <div class="box-body">
			<div class="form-group">
				<label>AM User:</label>
				<input name="txtAmuser" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label>AM Internal:</label>
				<input name="txtAmkomet" type="text" class="form-control" value='<?php echo $fullname; ?>'>
			</div>
			<div class="form-group">
				<label>Notes:</label>
				<textarea name="txtNotes" class="form-control" style="height:150px;"></textarea>
			</div>
			<div class="form-group">
				<label>Tanggal permintaan:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input name="txtReqdate" type="text" class="form-control datepicker">
				</div>
			</div>
              <div class="form-group">
                <label>Nilai:</label>
				<div class="input-group">
					<div class="input-group-addon">
						Rp
					</div>
				<input name="txtValue" type="text" id="idr" class="form-control">
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
          <button type="submit" name="cmdsave" id="cmdsave" class="btn btn-success pull-right">Selesai</button> 
        </div>
		<?php echo form_close();?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>
	// Note: This example requires that you consent to location sharing when
	// prompted by your browser. If you see the error "The Geolocation service
	// failed.", it means you probably did not give permission for the browser to
	// locate you.
	var map, infoWindow;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 20
		});
		infoWindow = new google.maps.InfoWindow;

		// Try HTML5 geolocation.
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};

				//Put into input
				document.getElementById("txtLat").value = pos.lat;
				document.getElementById("txtLong").value = pos.lng;

				infoWindow.setPosition(pos);
				infoWindow.setContent('<?php echo $fullname ?>');
				infoWindow.open(map);
				map.setCenter(pos);
			}, function() {
				handleLocationError(true, infoWindow, map.getCenter());
			});
		} else {
			// Browser doesn't support Geolocation
			handleLocationError(false, infoWindow, map.getCenter());
		}
	}

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		infoWindow.setPosition(pos);
		infoWindow.setContent(browserHasGeolocation ?
				'Error: The Geolocation service failed.' :
				'Error: Your browser doesn\'t support geolocation.');
		infoWindow.open(map);
	}
</script>

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
	
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCveHUedH_uI_6mhNDvCqrX0ZCNnz-m7Ik&callback=initMap"></script>
