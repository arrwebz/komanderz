<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">LOP</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('kpros');?>">Prospect</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Add Target</li>
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

<?php echo form_open('kpros/addnew');?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Target Detail</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Location</label>
                            <div id="map" style="height: 200px;width: 100%;"></div>

                            <input name="txtLat" id="txtLat" type="hidden" class="form-control" />
                            <input name="txtLong" id="txtLong" type="hidden" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Divisi</label>
                            <select name="optDivision" id="optDivision" class="form-control selectpicker" style="width: 100%">
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
                            <label class="form-label fw-semibold">AM User</label>
                            <input name="txtAmuser" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal Permintaan</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtReqdate" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Segmen</label>
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
                            <label class="form-label fw-semibold">AM Internal</label>
                            <input name="txtAmkomet" type="text" class="form-control" value='<?php echo $fullname; ?>'>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-text">Rp</div>
                                <input name="txtValue" type="text" id="idr" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Notes</label>
                            <textarea name="txtNotes" class="form-control" style="height:150px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

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