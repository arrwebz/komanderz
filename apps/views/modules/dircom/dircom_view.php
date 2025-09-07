<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Directory</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('dircom');?>">Employee Data</a>
                        </li>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Peta Alamat Rumah Karyawan</h4>
                </div>
                <div class="card-body collapse show">
                    <div id="map_wrapper_div" style="height: 400px;">
                        <div id="map_tuts" style="width: 100%;height: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">List Karyawan</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/download'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4"><i class="ti ti-download"></i> Download</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>Kontak</th>
                                    <th>Log</th>
                                </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $drd as $row ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['nik'] ?></td>
                                        <td>
										 <div class="d-flex align-items-center">
											<div class="me-2 pe-1">
											  <img src="<?php echo $this->config->item('uploads_uri');?>user/ai/<?php echo $row['photo']; ?>" class="rounded-circle" width="40" height="40" alt="">
											</div>
											<div>
											  <h6 class="fw-semibold mb-1"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['userid']; ?>"><?php echo $row['fullname'] ?></a></h6>
											  <p class="fs-2 mb-0 text-muted">
												<?php echo $row['username']; ?>
											  </p>
											</div>
										  </div>										
										</td>
                                        <td><?php echo $row['position'] ?></td>
                                        <td><a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $row['email'] ?>" target="_blank" style="color:red;"><?php echo $row['email'] ?></a>
                                            <br/><a href="https://wa.me/<?php echo str_replace('-','',str_replace('0','',$row['telp'])); ?>" target="_blank" style="color:green;"><?php echo $row['telp'] ?></a></td>
                                        <td><?php echo date('d M Y H:i:s', strtotime($row['chdat'])) ?></td>
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
</section>

<script>
	$(function() {
		var table = $('#datatables').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			],
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Search records",
			}

		});

        // Asynchronously Load the map API
		var script = document.createElement('script');
		script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCveHUedH_uI_6mhNDvCqrX0ZCNnz-m7Ik&callback=initialize";
		document.body.appendChild(script);
	});

	function initialize() {
		var map;
		var bounds = new google.maps.LatLngBounds();
		var mapOptions = {
			mapTypeId: 'roadmap'
		};

        // Display a map on the page
		map = new google.maps.Map(document.getElementById("map_tuts"), mapOptions);
		map.setTilt(45);

        // Multiple Markers
		var markers = JSON.parse(`<?php echo ($markers); ?>`);
		console.log(markers);

		var infoWindowContent = JSON.parse(`<?php echo ($infowindow); ?>`);

        // Display multiple markers on a map
		var infoWindow = new google.maps.InfoWindow(), marker, i;

        // Loop through our array of markers &amp; place each one on the map
		for( i = 0; i < markers.length; i++ ) {
			var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
			bounds.extend(position);
			marker = new google.maps.Marker({
				position: position,
				map: map,
				title: markers[i][0]
			});

			// Each marker to have an info window
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infoWindow.setContent(infoWindowContent[i][0]);
					infoWindow.open(map, marker);
				}
			})(marker, i));

			// Automatically center the map fitting all markers on the screen
			map.fitBounds(bounds);
		}

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
		var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
			this.setZoom(10);
			google.maps.event.removeListener(boundsListener);
		});

	}
</script>