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

<div class="alert alert-info" role="alert">
    <h4><i class="ti ti-info-circle fs-5 text-info me-2 flex-shrink-0"></i> Informasi</h4>
    Untuk Lembur dimulai dari jam <strong>18.00</strong> sampai dengan <strong>21.00</strong> atau dilakukan paling banyak 3 (Jam) dalam sehari.
    <br>berikut referensi dari kemnaker <a href="<?php echo $this->config->item('uploads_uri');?>lembur/lembur-kemnaker.pdf" target="_blank">KEP.102 /MEN/VI/2004</a>
</div>

<section class="content">
    <div class="card card-hover">
        <div class="card-header">
            <h3 class="box-title">Work attendance form</h3>
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

                    <div class="mb-3">
                        <div class="row">
                            <label class="col-lg-2">Overtime Task</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="txtNotes" type="text" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button id="btnSubmit" type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light" <?php if(count($drd) >= 1){ echo 'disabled'; }?>>Submit</button>
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
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

        $('.optbox').on('change', function () {
            var optStatus = $('#optStatus').val();
            var optHealth = $('#optHealth').val();
            if(optStatus != null && optHealth != null){
                $('#btnSubmit').prop('disabled', !$('select option:selected').length);
            }
        });

        $("#btnSubmit").click(function() {
            $('#btnSubmit').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('attendances/ajaxovertime'); ?>",
                data: $('#formclockin').serialize(),
                success: function(data) {
                    $('#btnSubmit').prop('disabled', false);
                    /* play sound */
                    swal({
                        title: "Yesss",
                        text: "Overtime begins!",
                        icon: "success",
                        buttons: false, timer: 1500,
                    }).then(function(){
	                    var link = '<?php echo site_url('attendances?tab=overtime')?>';
	                    window.location.href = link;
                    });
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