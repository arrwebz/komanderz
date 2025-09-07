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
                        <li class="breadcrumb-item">Clock Out</li>
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

<section class="content">
    <div class="card card-hover">
        <div class="card-header">
            <h3 class="box-title">Return attendance form</h3>
        </div>
        <form id="formclockout" class="form-horizontal" method="POST" action="javascript:">
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
                        <label class="col-lg-2">Date</label>
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
                        <label class="col-lg-2">Time</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="clock" style="font-size: 4em;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="btnSubmit" type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
            </div>
        </form>
    </div>
	<div class="card">
		<div class="card-header">
            <h3 class="box-title">History</h3>
        </div>
		<div class="card-body">
			<div class="table-responsive pb-9">
				<?php if (count ( $drd ) > 0) { ?>
					<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%"> 
						<thead>
						<tr>
							<th>Clockout</th> 
							<th>Date</th>
							<th>Action Plan</th>
						</tr>
						</thead>
						<tfoot>
						</tfoot>
						<tbody>
						<?php foreach ( $drd as $row ) {  ?>									
							<tr>
								 <td><?php echo date('H:i',strtotime($row['datetime'])); ?></td>
								 <td><?php echo nice_date($row['datetime'],'d-m-Y'); ?></td>
								 <td><?php echo $row['notes'] ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				<?php } ?>
			</div>	
		</div>
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
		
		$("#btnSubmit").click(function() {
			$.ajax({ 
				type: "POST",
				url: "<?php echo site_url('attendances/ajaxclockout'); ?>",
				data: $('#formclockout').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Hati-hati di jalan!", icon: 
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