<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Profile</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('attendances');?>">Attendance</a>
                        </li>
                        <li class="breadcrumb-item">Clock In</li>
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
<div class="row">
	<div class="col-md-12">
		<div class="card" style="margin-bottom:50px;">
			<div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
				<h4 class="card-title text-white mb-0">Presensi Saya</h4>
			</div>
			<div class="card-body collapse show">
				<div class="table-responsive pb-9">
					<?php if (count ( $drd ) > 0) { ?>
						<table id="datatables" class="table table-sm table-no-bordered" cellspacing="0" width="100%" style="width:100%">
								<thead>
								<tr>
									<th>Waktu</th>
									<th>Tanggal</th>
									<th>Presensi</th>
									<th>Kesehatan</th>
									<th>Keterangan</th>
									<th>Lokasi</th>
								</tr>
								</thead>
							<tbody>
							<?php foreach ( $drd as $key => $row ) { ?>
									<tr>
										<td><?php echo date('H:i',strtotime($row['datetime'])); ?></td>
										<td><?php echo nice_date($row['datetime'],'d-m-Y'); ?></td>
										<td>
											<?php if($key < 1){ ?>
												<?php if($row['status'] == '1'){ ?>
													<span class="mb-1 badge text-bg-secondary">WFO</span>
												<?php } elseif($row['status'] == '2') { ?>
													<span class="mb-1 badge text-bg-light">Pulang</span>
												<?php } elseif($row['status'] == '3') { ?>
													<span class="mb-1 badge text-bg-warning">WFH</span>
												<?php } elseif($row['status'] == '4') { ?>
													<span class="mb-1 badge text-bg-danger">Izin</span>
												<?php } else { ?>
													<span class="mb-1 badge text-bg-danger">Tanpa Keterangan</span>
												<?php } ?>
											<?php } ?>
										</td> 
										<td>
											<?php if($key < 1){ ?>
												<?php if($row['health'] == '1'){ ?>
													<span class="mb-1 badge font-medium bg-success-subtle text-success">Sehat</span>
												<?php } elseif($row['health'] == '2') { ?>
													<span class="mb-1 badge font-medium bg-danger-subtle text-danger">Sakit</span>
												<?php } else { ?>
													<span class="mb-1 badge text-bg-dark">Tanpa Keterangan</span>
												<?php } ?>
											<?php } ?>
										</td>
										<td><?php echo $row['notes'] ?></td>
										<td>
											<a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $row['latitude'] ?>,<?php echo $row['longitude'] ?>">
												<i class="ti ti-map-2"></i> Cek Lokasi
											</a>
										</td>
									</tr>
								<?php }	?>
							</tbody>
						</table>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="content">
    <div class="card card-hover">
        <div class="card-header">
            <h3 class="box-title">Form presensi</h3>
        </div>
        <form id="formclockin" class="form-horizontal" method="POST" action="javascript:">
            <div class="card-body">
                <div id="map" style="height: 200px;width: 100%;"></div>
                <div class="form-group">
                    <label for="txtNotes" class="col-sm-2 control-label"></label>

                    <div class="col-sm-6">
                        <input name="txtLat" id="txtLat" type="hidden" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtNotes" class="col-sm-2 control-label"></label>

                    <div class="col-sm-6">
                        <input name="txtLong" id="txtLong" type="hidden" class="form-control" />
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <label class="col-lg-2">Tanggal</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $datenow; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <label class="col-lg-2">Waktu</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="clock" style="font-size: 4em;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(count($drd) < 1){?>
                    <div class="mb-3">
                        <div class="row">
                            <label class="col-lg-2">Presensi</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select id="optStatus" name="optStatus" class="form-control selectpicker optbox">
                                            <option selected disabled>Pilih</option>
                                            <option value="1">WFO</option>
                                            <option value="3">Izin</option>
                                            <!--<option value="4">Izin</option>-->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <label class="col-lg-2">Kesehatan</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select id="optHealth" name="optHealth" class="form-control selectpicker optbox">
                                            <option selected disabled>Pilih</option>
                                            <option value="1">Healthy</option>
                                            <option value="2">Sick</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <label class="col-lg-2">Action Plan Today</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea id="txtNotes" name="txtNotes" type="text" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="card-footer">
				<?php if(count($drd) == 0){?>
                    <?php if($userid != '15' && $userid != '3' && $userid != '19' && $userid != '12'){ ?>
                        <p id="msgClockin" class="text-primary">Harap mengisi presensi, kesehatan dan action plan</p>
                    <?php } ?>
					<button id="btnSubmit" type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light" disabled>Submit</button>
				<?php } ?>
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Back</a>
            </div>
        </form>
    </div>
</section>

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

        // $('#btnSubmit').attr('disabled', 'disabled');
        // function updateFormEnabled() {
        // if (verifyAdSettings()) {
        // $('#btnSubmit').attr('disabled', '');
        // } else {
        // $('#btnSubmit').attr('disabled', 'disabled');
        // }
        // }
        // function verifyAdSettings() {
        // if ($('#optStatus').val() != '' && $('#optHealth').val() != '') {
        // return true;
        // } else {
        // return false
        // }
        // }
        // $('#optStatus').change(updateFormEnabled);
        // $('#optHealth').change(updateFormEnabled);

        // $(function() {
        // $('#optStatus, #optHealth').change(function() {
        //$('#btnSubmit').prop('disabled', !($('#optStatus option:selected').val() != '' && $('#optHealth option:selected').val() != ''));
        // if ($('#optStatus option:selected').val() != '' && $('#optHealth option:selected').val() != '') {
        // $('#btnSubmit').prop('disabled', false);
        // } else {
        // $('#btnSubmit').prop('disabled', true);
        // }
        // });
        // });

        <?php if($userid != '15' && $userid != '3' && $userid != '19' && $userid != '12'){ ?>
            $('.optbox').on('change', function () {
                var optStatus = $('#optStatus').val();
                var optHealth = $('#optHealth').val();
                var txtNotes = $('#txtNotes').val();
                var btnsubmit = document.getElementById("btnSubmit");
                if(optStatus != null && optHealth != null && txtNotes != ''){
                    $('#msgClockin').addClass('hidden');
                    btnsubmit.removeAttribute('disabled','disabled');
                }else{
                    $('#msgClockin').removeClass('hidden');
                    btnsubmit.setAttribute('disabled','disabled');
                }
            });
            $('#txtNotes').on('change', function () {
                var optStatus = $('#optStatus').val();
                var optHealth = $('#optHealth').val();
                var txtNotes = $('#txtNotes').val();
                var btnsubmit = document.getElementById("btnSubmit");
                if(optStatus != null && optHealth != null && txtNotes != ''){
                    $('#msgClockin').addClass('hidden');
                    btnsubmit.removeAttribute('disabled','disabled');
                }else{
                    $('#msgClockin').removeClass('hidden');
                    btnsubmit.setAttribute('disabled','disabled');
                }
            });
        <?php }else{?>
            $('.optbox').on('change', function () {
                var optStatus = $('#optStatus').val();
                var optHealth = $('#optHealth').val();
                var btnsubmit = document.getElementById("btnSubmit");
                if(optStatus != null && optHealth != null){
                    btnsubmit.removeAttribute('disabled','disabled');
                }else{
                    btnsubmit.setAttribute('disabled','disabled');
                }
            });
        <?php } ?>

        $("#btnSubmit").click(function() {
            $('#btnSubmit').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('attendances/ajaxclockin'); ?>",
                data: $('#formclockin').serialize(),
                success: function(data) {
                    $('#btnSubmit').prop('disabled', false);
                    /* play sound */
                    swal({title: "Success", text: "Thank you for filling in the attendance", icon:
                            "success", buttons: false, timer: 3000,}).then(function(){
                            location.reload();
                        }
                    );
                }
            });
        });

        function clock() {// We create a new Date object and assign it to a variable called "time".
            var time = new Date(),

                // Access the "getHours" method on the Date object with the dot accessor.
                hours = time.getHours(),

                // Access the "getMinutes" method with the dot accessor.
                minutes = time.getMinutes(),


                seconds = time.getSeconds();

            document.querySelectorAll('.clock')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

            function harold(standIn) {
                if (standIn < 10) {
                    standIn = '0' + standIn
                }
                return standIn;
            }
        }
        setInterval(clock, 1000);

    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCveHUedH_uI_6mhNDvCqrX0ZCNnz-m7Ik&callback=initMap"></script>