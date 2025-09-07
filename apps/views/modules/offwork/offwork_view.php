<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Directory</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('offwork');?>">Leave Form</a>
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
    <div class="card card-hover">
        <div class="card-header">
            <h4 class="mb-0 text-dark fs-5">
                Hi, <?php echo $fullname; ?>. Your remaining annual leave balance is <?php echo $saldocuti[0]['leavebalance']; ?> days.
            </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">My Leave Application</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drc ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Types of Leave</th>
                                    <th>Total Days</th>
                                    <th>Reasons</th>
                                    <th>Approval</th>
                                </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                <?php $i = 0;?>
                                <?php foreach ( $drc as $roc ) { ?>
                                    <?php $i++;?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo date('d-m-Y',strtotime($roc['sdate'])); ?></td>
                                        <td><?php echo date('d-m-Y',strtotime($roc['edate'])); ?></td>
                                        <td>
                                            <?php if($roc['offstatus'] == 'fullday') { ?>
                                                <span class="label label-success">Cuti Fullday</span>
                                            <?php } elseif($roc['offstatus'] == 'sick') { ?>
                                                <span class="label label-danger">Cuti Sakit</span>
                                            <?php } elseif($roc['offstatus'] == 'pray') { ?>
                                                <span class="label label-success">Cuti Ibadah</span>
                                            <?php } elseif($roc['offstatus'] == 'givebirth') { ?>
                                                <span class="label label-success">Cuti Melahirkan</span>
                                            <?php }	?>
                                        </td>
                                        <td><?php echo $roc['totalday'] ?> hari</td>
                                        <td><?php echo $roc['offnotes'] ?></td>
                                        <td>
                                            <?php if($roc['status'] == '0') { ?>
                                                <span class="label label-warning"><i> Waiting Approval</i></span>
                                            <?php } elseif($roc['status'] == '1') { ?>
                                                <span class="label label-success"><i class="fa fa-check-square-o"> Approved by <?php echo $roc['userapprove']; ?></i></span>
                                            <?php } ?>

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

    <?php $navrole = array('1','2','3','4'); ?>
    <?php if(in_array($role, $navrole)) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">List of Employee Leave Applications</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Name</th>
                                    <th>Types of Leave</th>
                                    <th>Leave Date</th>
                                    <th>Total Days</th>
                                    <th>Approval</th>
                                </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                <?php $j = 0; ?>
                                <?php foreach ( $drd as $row ) { ?>
                                    <?php $j++; ?>
                                    <tr>
                                        <td><?php echo $j; ?></td>
                                        <td><?php echo $row['nik'] ?></td>
                                        <td><a href="#"><?php echo $row['fullname'] ?></a></td>
                                        <td><?php echo $row['offstatus'] ?></td>
                                        <td>
                                            <?php echo date('d-m-Y',strtotime($row['sdate'])); ?> s/d
                                            <?php echo date('d-m-Y',strtotime($row['edate'])); ?>
                                        </td>
                                        <td><?php echo $row['totalday'] ?> hari</td>
                                        <td>
                                            <?php if($row['status'] == '0') { ?>
                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/approval/'.$row['offworkid']; ?>" class="btn btn-xs btn-default"><i> Waiting Approval</i></a>
                                            <?php } elseif($row['status'] == '1') { ?>
                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/approval/'.$row['offworkid']; ?>" class="btn btn-xs btn-success"><i class="fa fa-check-square-o"> Approved by <?php echo $row['userapprove']; ?></i></a>
                                            <?php } ?>
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
    <?php } ?>
</section>

<script>
	$(function() {

		$('.selectpicker').select2();

		$('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : false,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : false,
			'info'        : false,
			'autoWidth'   : true
		});

		$('#datatablesc').DataTable({
			'responsive'  : true,
			'paging'      : false,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : false,
			'info'        : false,
			'autoWidth'   : true
		});

		var sel = document.getElementById('jcuti');

		var datesForDisable = <?php echo $disabledays?>;
		$('#sdate_cuti').datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight: true,
			beforeShowDay: function (currentDate) {
				var dayNr = currentDate.getDay();
				var dateNr = moment(currentDate.getDate()).format("DD-MM-YYYY");
				if (datesForDisable.length > 0) {
					for (var i = 0; i < datesForDisable.length; i++) {
						if (moment(currentDate).unix()==moment(datesForDisable[i],'YYYY-MM-DD').unix()){
							return false;
						}
					}
				}
				return true;
			}
		});

		$('#edate_cuti').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
			beforeShowDay: function (currentDate) {
				var dayNr = currentDate.getDay();
				var dateNr = moment(currentDate.getDate()).format("DD-MM-YYYY");
				if (datesForDisable.length > 0) {
					for (var i = 0; i < datesForDisable.length; i++) {
						if (moment(currentDate).unix()==moment(datesForDisable[i],'YYYY-MM-DD').unix()){
							return false;
						}
					}
				}
				return true;
			}
		});
		$('#jcuti').change(function(){
			if ($('#jcuti').val()=="fullday"){
				$('#jmlcuti').show();
			}else if ($('#jcuti').val()=="sick"){
				$('#jmlcuti').show();
			}else if ($('#jcuti').val()=="pray"){
				$('#jmlcuti').hide();
			}else if ($('#jcuti').val()=="givebirth"){
				$('#jmlcuti').hide();
			}
			//console.log($('#jcuti').val());
			var opt = sel.options[sel.selectedIndex];
			$('#vjcuti').val( opt.value );
		});

		$("#sdate_cuti").change(function(){
			/*$("#edate_cuti").val($("#sdate_cuti").val());*/
			//$("#cuti").val(1);
			var sdate = new Date($("#sdate_cuti").val());
			var edate = new Date($("#edate_cuti").val());
			if (sdate > edate){
				alert ('End Date tidak boleh lebih dulu');
				$("#edate_cuti").val($("#sdate_cuti").val());
				return false;
			}
			var timeDiff = Math.abs(edate.getTime() - sdate.getTime());
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24) + 1);
			var valEdate = $("#edate_cuti").val();
			if(valEdate == '') {
			}else {
				$("#jmlcuti").val(diffDays);
			}

			/* pecah value input */
			var splitsdate = $("#sdate_cuti").val().split('-');
			var splitedate = $("#edate_cuti").val().split('-');

			/* extract startdate sampai enddate */
			let startDate = new Date(splitsdate[0], splitsdate[1], splitsdate[2]);
			let endDate = new Date(splitedate[0], splitedate[1], splitedate[2]);
			let daysOffwork = [];
			for (let day = startDate;day <= endDate; day.setDate(day.getDate() + 1)) {
				var dat = new Date(day);
				daysOffwork.push(dat.yyyymmdd());
			}

			/* cek array cuti dengan array disabled dan count */
			var offwork = daysOffwork;
			var jumlahoffwork = arr_diff(offwork,datesForDisable);
			if(valEdate == '') {
			}else{
				$("#jmlcuti").val(jumlahoffwork.length);
			}
		});

		Date.prototype.yyyymmdd = function() {
			var mm = this.getMonth(); // getMonth() is zero-based
			var dd = this.getDate();

			return [this.getFullYear()+'-',
				(mm>9 ? '' : '0') + mm+'-',
				(dd>9 ? '' : '0') + dd
			].join('');
		};

		function arr_diff (a1, a2) {

			var a = [], diff = [];

			for (var i = 0; i < a1.length; i++) {
				a[a1[i]] = true;
			}

			for (var i = 0; i < a2.length; i++) {
				if (a[a2[i]]) {
					delete a[a2[i]];
				}
			}

			for (var k in a) {
				diff.push(k);
			}

			return diff;
		}

		$("#edate_cuti").change(function(){
			var sdate = new Date($("#sdate_cuti").val());
			var edate = new Date($("#edate_cuti").val());
			if (sdate > edate){
				alert ('End Date tidak boleh lebih dulu');
				$("#edate_cuti").val($("#sdate_cuti").val());
				return false;
			}
			var timeDiff = Math.abs(edate.getTime() - sdate.getTime());
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24) + 1);
			var valEdate = $("#edate_cuti").val();
			if(valEdate == '') {
			}else {
				$("#jmlcuti").val(diffDays);
			}

			/* pecah value input */
            var splitsdate = $("#sdate_cuti").val().split('-');
            var splitedate = $("#edate_cuti").val().split('-');

			/* extract startdate sampai enddate */
			let startDate = new Date(splitsdate[0], splitsdate[1], splitsdate[2]);
			let endDate = new Date(splitedate[0], splitedate[1], splitedate[2]);
			let daysOffwork = [];
			for (let day = startDate;day <= endDate; day.setDate(day.getDate() + 1)) {
				var dat = new Date(day);
				daysOffwork.push(dat.yyyymmdd());
			}

			/* cek array cuti dengan array disabled dan count */
			var offwork = daysOffwork;
			var jumlahoffwork = arr_diff(offwork,datesForDisable);
			if(valEdate == '') {
			}else{
				$("#jmlcuti").val(jumlahoffwork.length);
			}
		});

		$("#btnSubmit").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('offwork/ajaxoffwork'); ?>",
				data: $('#formoffwork').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Terima kasih, tunggu approval ya!", icon:
								"success", buttons: false, timer: 1500,}).then(function(){
								location.reload();
							}
					);
				}
			});
		});

	});
</script>