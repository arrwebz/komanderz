<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Report</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('allreport');?>">Invoice</a>
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
        <div class="card card-hover">
            <div class="card-header">
                <h4 class="mb-0 text-dark fs-5">Search</h4>
            </div>
            <form id="formSearch" action="javascript:">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Tipe Order</label>
                                <select id="optTipe" name="optTipe" class="form-control selectpicker" style="width:100%;">
                                    <option value="all">Pilih</option>
                                    <option value="invoice">ALL INVOICE</option>
                                    <option value="NOPES">NOPES</option>
                                    <option value="IBL">IBL</option>
                                    <option value="OBL">OBL</option>
                                    <option value="PADI">PADI</option>
                                    <option value="prpo">PANJAR PRPO</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Divisi</label>
                                <select name="optDivision" id="optDivision" class="form-control selectpicker" style="width:100%;">
                                    <option value="all">Pilih</option>
                                    <?php
                                    if(!empty($division)){
                                        foreach($division as $row){
                                            if (!empty($divisi) && $divisi == $row['divisionid'] ) {
                                                $strselected = "selected";
                                            } else {
                                                $strselected = " ";
                                            }
                                            echo '<option value="'.$row['code'].'"'. $strselected .'>'.$row['code'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="">Division not available</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Status Pencairan</label>
                                <select id="optStatinv" name="optStatinv" class="form-control selectpicker" style="width:100%;">
                                    <option value="all">Pilih</option>
                                    <option value="0">Accurate</option>
                                    <option value="2">Segment</option>
                                    <option value="3">Invidea</option>
                                    <option value="4">Precise</option>
                                    <option value="10">Forecast Pencairan</option>
                                    <option value="18">Verifikasi Keuangan</option>
                                    <option value="8">Posting</option>
                                    <option value="1">Cair</option>
                                    <option value="belumcair">Belum Cair</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Start Tanggal Invoice</label>
                                <?php
                                $month = date('m');
                                $currentfirstday = date('Y').'-'.$month.'-01';
                                ?>
                                <input id="txtStartInvdate" name="txtStartInvdate" type="date" class="form-control" value="<?php echo $currentfirstday;?>">
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Sorting</label>
                                <select id="optSorting" name="optSorting" class="form-control selectpicker" style="width:100%;">
                                    <option value="sort_tglinv_asc" selected>Tanggal Invoice A-Z</option>
                                    <option value="sort_tglinv_desc">Tanggal Invoice Z-A</option>
                                    <option value="sort_basevalue_asc">Nilai Dasar A-Z</option>
                                    <option value="sort_basevalue_desc">Nilai Dasar Z-A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Unit</label>
                                <select id="optUnit" name="optUnit" class="form-control selectpicker" style="width:100%;">
                                    <option value="all">Pilih</option>
                                    <option value="KOMET">KOMET</option>
                                    <option value="MESRA">MESRA</option>
                                    <option value="PADI">PADI</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Segment</label>
                                <select id="optSegment" name="optSegment" class="form-control selectpicker" style="width:100%;">
                                    <option value="all">Pilih</option>
                                    <?php
                                    if(!empty($segment)){
                                        foreach($segment as $row){
                                            if (!empty($segmen) && $segmen == $row['segmentid'] ) {
                                                $strselected = "selected";
                                            } else {
                                                $strselected = " ";
                                            }
                                            echo '<option value="'.$row['code'].'"'. $strselected.'>'.$row['code'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="">Segment not available</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Status SPB</label>
                                <select id="optSPB" name="optSPB" class="form-control selectpicker" style="width:100%;">
                                    <option value="all">Pilih</option>
                                    <option value="0">Belum ada</option>
                                    <option value="1">Ada</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">End Tanggal Invoice</label>
                                <?php
                                $month = date('m');
                                $currentlastday = date('Y').'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
                                ?>
                                <input id="txtEndInvdate" name="txtEndInvdate" type="date" class="form-control" value="<?php echo $currentlastday;?>">
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Jenis Pekerjaan</label>
                                <select id="optJob" name="optJob" class="form-control selectpicker" style="width:100%;">
                                    <option value="all">Pilih</option>
                                    <option value="invoice">IT, BS, PD</option>
                                    <option value="tkbw">TK, SM, HT, NA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12">
                        <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                            <div class="d-flex align-items-center">
                                <i class="ti ti-send me-2 fs-4"></i> Filter
                            </div>
                        </button>
                        <button id="downloadExcell" type="button" class="btn btn-dark font-medium rounded-pill px-4 mb-6 hidden" style="margin-left:8px;">
                            <i class="ti ti-download"></i> Excel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="card card-hover">
            <div class="card-header">
                <h4 class="mb-0 text-dark fs-5">List Data</h4>
            </div>
            <div id="dataSearch" class="card-body"></div>
        </div>

        <!-- Chart All Report -->
        <div class="col-md-12">
            <div id="boxChart" class="card card-hover hidden">
                <div class="card-header">
                    <h3 class="mb-0 text-dark fs-5 title-chart">Generated Chart...</h3>
                </div>
                <div id="loadingChart" class="card-body"></div>
                <div id="dataChart" class="card-body"></div>
            </div>
        </div>

        <!-- Cair -->
        <div class="col-md-12">
            <div id="boxChartCair" class="card hidden">
                <div class="card-header text-bg-success">
                    <h3 class="mb-0 text-dark fs-5 title-chart-cair">Generated Chart...</h3>
                </div>
                <div id="loadingChartCair" class="card-body"></div>
                <div id="dataChartCair" class="card-body"></div>
            </div>
        </div>

        <!-- Belum Cair -->
        <div class="col-md-12">
            <div id="boxChartBelumCair" class="card hidden">
                <div class="card-header text-bg-danger">
                    <h3 class="mb-0 text-dark fs-5 title-chart-belum-cair">Generated Chart...</h3>
                </div>
                <div id="loadingChartBelumCair" class="card-body"></div>
                <div id="dataChartBelumCair" class="card-body"></div>
            </div>
        </div>

        <!-- Collection Radar -->
        <div class="col-md-12">
            <div id="boxChartCollRadar" class="card hidden">
                <div class="card-header text-bg-warning">
                    <h3 class="mb-0 text-dark fs-5 title-chart-coll-radar">Generated Chart...</h3>
                </div>
                <div id="loadingChartCollRadar" class="card-body"></div>
                <div id="dataChartCollRadar" class="card-body"></div>
            </div>
        </div>

        <!-- Forecasst -->
        <div class="col-md-12">
            <div id="boxChartForecast" class="card hidden">
                <div class="card-header text-bg-danger">
                    <h3 class="mb-0 text-dark fs-5 title-chart-forecast">Generated Chart...</h3>
                </div>
                <div id="loadingChartForecast" class="card-body"></div>
                <div id="dataChartForecast" class="card-body"></div>
            </div>
        </div>

        <!-- Keuangan -->
        <div class="col-md-12">
            <div id="boxChartKeuangan" class="card hidden">
                <div class="card-header text-bg-danger">
                    <h3 class="mb-0 text-dark fs-5 title-chart-keuangan">Generated Chart...</h3>
                </div>
                <div id="loadingChartKeuangan" class="card-body"></div>
                <div id="dataChartKeuangan" class="card-body"></div>
            </div>
        </div>

        <!-- Posting -->
        <div class="col-md-12">
            <div id="boxChartPosting" class="card hidden">
                <div class="card-header text-bg-danger">
                    <h3 class="mb-0 text-dark fs-5 title-chart-posting">Generated Chart...</h3>
                </div>
                <div id="loadingChartPosting" class="card-body"></div>
                <div id="dataChartPosting" class="card-body"></div>
            </div>
        </div>

        <div id="output"></div>
        <div id="outputCair"></div>
        <div id="outputBelumCair"></div>
        <div id="outputCollRadar"></div>


        <div class="col-md-12">
            <button id="exportPDF" class="btn btn-xs btn-success hidden"><i class="ti ti-download"></i> Export PDF</button>
        </div>
        <img id="logoKms" class="hidden" src="<?php echo $this->config->item('skins_uri');?>dist/img/apple-icon-114x114.png" alt=""/>


    </div>
</section>

<script>
	$(function () {
		$('.selectpicker').select2();

		$('#formSearch').on('submit', function () {
			$('#dataSearch').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:150px"></div>');

			var optSegmen = $('#optSegment').val();
			if(optSegmen == 'all'){
				$('#exportPDF').addClass('hidden');
			}else{
				$('#exportPDF').removeClass('hidden');
			}

			$.ajax({
				type: "POST",
				url: '<?php echo site_url('allreport/search')?>',
				data: $('#formSearch').serialize(),
				success: function (data) {
					$("#downloadExcell").removeClass('hidden');
					$('#dataSearch').html(data);

					loadChart();
				}
			});
		});
		$('#formSearch').trigger('submit');

		$('#downloadExcell').on('click', function () {
			var optUnit = document.getElementById("optUnit").value,
					optSPB = document.getElementById("optSPB").value,
					optDivision = document.getElementById("optDivision").value,
					optStatinv = document.getElementById("optStatinv").value,
					txtStartInvdate = document.getElementById("txtStartInvdate").value,
					txtEndInvdate = document.getElementById("txtEndInvdate").value,
					optTipe = document.getElementById("optTipe").value,
					optJob = document.getElementById("optJob").value,
					optSegment = document.getElementById("optSegment").value,
					optSorting = document.getElementById("optSorting").value,
					postData = 'optUnit='+ optUnit +
							'&optSPB='+ optSPB +
							'&optDivision='+ optDivision +
							'&optStatinv='+ optStatinv +
							'&txtStartInvdate='+ txtStartInvdate +
							'&txtEndInvdate='+ txtEndInvdate +
							'&optSegment='+ optSegment +
							'&optSorting='+ optSorting +
							'&optTipe='+ optTipe +
							'&optJob='+ optJob;

			var link = '<?php echo site_url('allreport/exportfilter?')?>'+postData;
			window.location.href = link;
		});

		$("#exportPDF").click(function(){
			$('#exportPDF').addClass('hidden');

			var optStatusPencairan = $('#optStatinv').val();
			if(optStatusPencairan == 'all'){
				var timerInterval;
				Swal.fire({
					title: 'Generated PDF',
					html: 'Tunggu sebentar yaa, kami sedang menyiapkan data. <br>Selesai dalam <b></b> detik.',
					timer: 10000,
					timerProgressBar: true,
					allowOutsideClick: false,
					didOpen: () => {
						Swal.showLoading();
						const b = Swal.getHtmlContainer().querySelector('b');
						timerInterval = setInterval(() => {
							b.textContent = Swal.getTimerLeft()
						}, 100)
					},
					willClose: () => {
						clearInterval(timerInterval)
					}
				}).then((result) => {
					if (result.dismiss === Swal.DismissReason.timer) {
						console.log('selesai');
						const swalWithBootstrapButtons = Swal.mixin({
							customClass: {
								confirmButton: 'btn btn-success',
								cancelButton: 'btn btn-danger me-2'
							},
							buttonsStyling: false
						});

						swalWithBootstrapButtons.fire({
							title: "Hai <?php echo $this->session->userdata('userfullname'); ?>",
							text: "data yang kamu minta sudah selesai kami siapkan, Apakah kamu ingin men-download nya.?",
							icon: 'success',
							showCancelButton: true,
							confirmButtonText: '<i class="ti ti-thumb-up"></i> Ya, Download',
							cancelButtonText: '<i class="ti ti-thumb-down"></i> Nanti saja',
							allowOutsideClick: false,
							reverseButtons: true
						}).then((result) => {
							if (result.isConfirmed) {
								$('#exportPDF').removeClass('hidden');

								var doc = new jsPDF('l');

								/* semua data */
								doc.addImage(document.getElementById('imgChartAll'), "JPEG", 15, 10, 270, 150);
								/* SET Logo */
								doc.setFont("helvetica");
								doc.setFontSize(9);
								var text = "Komanders";
								doc.text(text, doc.internal.pageSize.width-15, 170, 'right');
								doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width-30, 170, 15, 15);

								/* cair */
								const elementCair = document.getElementById('dataChartCair');
								if (elementCair.firstElementChild) {
									doc.addPage();
									doc.addImage(document.getElementById('imgChartCair'), "JPEG", 15, 10, 270, 150);
									/* SET Logo */
									doc.setFont("helvetica");
									doc.setFontSize(9);
									var text = "Komanders";
									doc.text(text, doc.internal.pageSize.width - 15, 170, 'right');
									doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width - 30, 170, 15, 15);
								}

								/* belum cair */
								const elementBelumCair = document.getElementById('dataChartBelumCair');
								if (elementBelumCair.firstElementChild) {
									doc.addPage();
									doc.addImage(document.getElementById('imgChartBelumCair'), "JPEG", 15, 10, 270, 150);
									/* SET Logo */
									doc.setFont("helvetica");
									doc.setFontSize(9);
									var text = "Komanders";
									doc.text(text, doc.internal.pageSize.width - 15, 170, 'right');
									doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width - 30, 170, 15, 15);
								}

								/* collection radar */
								const elementColRadar = document.getElementById('dataChartCollRadar');
								if (elementColRadar.firstElementChild) {
									doc.addPage();
									doc.addImage(document.getElementById('imgChartCollRadar'), "JPEG", 15, 10, 270, 150);
									/* SET Logo */
									doc.setFont("helvetica");
									doc.setFontSize(9);
									var text = "Komanders";
									doc.text(text, doc.internal.pageSize.width - 15, 170, 'right');
									doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width - 30, 170, 15, 15);
								}

								/* save */
								var boxChart2 = document.getElementById('boxChart');
								var title = boxChart2.querySelector('#dataChart .title-segmen');
								var segmen = title.innerHTML;
								var filename = 'allreport-'+segmen.replace(' ','-').toLowerCase()+'-semuadata.pdf';
								doc.save(filename);

								document.getElementById('imgChartAll').remove();
								document.getElementById('imgChartCair').remove();
								document.getElementById('imgChartBelumCair').remove();
								document.getElementById('imgChartCollRadar').remove();
							} else if (
									result.dismiss === Swal.DismissReason.cancel
							) {
								$('#exportPDF').removeClass('hidden');
								document.getElementById('imgChartAll').remove();
								document.getElementById('imgChartCair').remove();
								document.getElementById('imgChartBelumCair').remove();
								document.getElementById('imgChartCollRadar').remove();
							}
						});
					}
				});

				generatedSemuaData();
			}else if(optStatusPencairan == '1'){
				generatedCair();
			}else if(optStatusPencairan == '0'){
				generatedBelumCair();
			}else if(optStatusPencairan == '10'){
				generatedForecast();
			}else if(optStatusPencairan == '18'){
				generatedKeuangan();
			}else if(optStatusPencairan == '8'){
				generatedPosting();
			}else{
				alert('status pencairan tidak diketahui');
			}
		});
	});

	function loadChart(){
		$('#boxChart').removeClass('hidden');
		$('#loadingChart').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');
		$('#dataChart').html('');

		var optSegment = $('#optSegment').val();
		if(optSegment == 'all'){
			$('#boxChart').removeClass('hidden');
			$('#boxChartCair').addClass('hidden');
			$('#boxChartBelumCair').addClass('hidden');
			$('#boxChartCollRadar').addClass('hidden');
			$('#boxChartForecast').addClass('hidden');
			$('#boxChartKeuangan').addClass('hidden');
			$('#boxChartPosting').addClass('hidden');

			$('#loadingChart').html('');
			$('.title-chart').html('Silahkan pilih Segmen pada kolom pencarian di atas, untuk menampilkan Grafik Order.');
		}else{
			var optStatinv = $('#optStatinv').val();
			if(optStatinv == 'all'){
				$('#boxChart').removeClass('hidden');
				$('#boxChartCair').removeClass('hidden');
				$('#boxChartBelumCair').removeClass('hidden');
				$('#boxChartCollRadar').removeClass('hidden');
				$('#boxChartForecast').addClass('hidden');
				$('#boxChartKeuangan').addClass('hidden');
				$('#boxChartPosting').addClass('hidden');

				$('#dataChart').html('');
				$('#dataChartCair').html('');
				$('#dataChartBelumCair').html('');
				$('#dataChartCollRadar').html('');
				$('#dataChartForecast').html('');
				$('#dataChartKeuangan').html('');
				$('#dataChartPosting').html('');

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmen')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChart').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart').html('Total Order');
							$('#dataChart').html(respons.view);
						}else{
							$('.title-chart').html(respons.msg);
							$('#dataChart').html(respons.view);
							// alert(respons.msg);
						}
					}
				});

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmencair')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChartCair').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart-cair').html('Paid');
							$('#dataChartCair').html(respons.view);
						}else{
							$('.title-chart-cair').html('Paid');
							$('#dataChartCair').html(respons.view);
							// alert(respons.msg);
						}
					}
				});

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmenbelumcair')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChartBelumCair').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart-belum-cair').html('Unpaid');
							$('#dataChartBelumCair').html(respons.view);
						}else{
							$('.title-chart-belum-cair').html('Unpaid');
							$('#dataChartBelumCair').html(respons.view);
							// alert(respons.msg);
						}
					}
				});

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmencoll')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChartCollRadar').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart-coll-radar').html('Collection Update');
							$('#dataChartCollRadar').html(respons.view);
						}else{
							$('.title-chart-coll-radar').html('Collection Update');
							$('#dataChartCollRadar').html(respons.view);
							// alert(respons.msg);
						}
					}
				});

			}else if(optStatinv == '1'){
				$('#boxChart').addClass('hidden');
				$('#boxChartCair').removeClass('hidden');
				$('#boxChartBelumCair').addClass('hidden');
				$('#boxChartCollRadar').addClass('hidden');
				$('#boxChartForecast').addClass('hidden');
				$('#boxChartKeuangan').addClass('hidden');
				$('#boxChartPosting').addClass('hidden');

				$('#dataChart').html('');
				$('#dataChartCair').html('');
				$('#dataChartBelumCair').html('');
				$('#dataChartCollRadar').html('');
				$('#dataChartForecast').html('');
				$('#dataChartKeuangan').html('');
				$('#dataChartPosting').html('');

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmencair')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChartCair').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart-cair').html('Paid');
							$('#dataChartCair').html(respons.view);
						}else{
							$('.title-chart-cair').html('Paid');
							$('#dataChartCair').html(respons.view);
							// alert(respons.msg);
						}
					}
				});
			}else if(optStatinv == '0'){
				$('#boxChart').addClass('hidden');
				$('#boxChartCair').addClass('hidden');
				$('#boxChartBelumCair').removeClass('hidden');
				$('#boxChartCollRadar').addClass('hidden');
				$('#boxChartForecast').addClass('hidden');
				$('#boxChartKeuangan').addClass('hidden');
				$('#boxChartPosting').addClass('hidden');

				$('#dataChart').html('');
				$('#dataChartCair').html('');
				$('#dataChartBelumCair').html('');
				$('#dataChartCollRadar').html('');
				$('#dataChartForecast').html('');
				$('#dataChartKeuangan').html('');
				$('#dataChartPosting').html('');

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmenbelumcair')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChartBelumCair').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart-belum-cair').html('Unpaid');
							$('#dataChartBelumCair').html(respons.view);
						}else{
							$('.title-chart-belum-cair').html('Unpaid');
							$('#dataChartBelumCair').html(respons.view);
							// alert(respons.msg);
						}
					}
				});
			}else if(optStatinv == '10'){
				$('#boxChart').addClass('hidden');
				$('#boxChartCair').addClass('hidden');
				$('#boxChartBelumCair').addClass('hidden');
				$('#boxChartCollRadar').addClass('hidden');
				$('#boxChartForecast').removeClass('hidden');
				$('#boxChartKeuangan').addClass('hidden');
				$('#boxChartPosting').addClass('hidden');

				$('#dataChart').html('');
				$('#dataChartCair').html('');
				$('#dataChartBelumCair').html('');
				$('#dataChartCollRadar').html('');
				$('#dataChartForecast').html('');
				$('#dataChartKeuangan').html('');
				$('#dataChartPosting').html('');

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmenforecast')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChartForecast').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart-forecast').html('Forecast Pencairan');
							$('#dataChartForecast').html(respons.view);
						}else{
							$('.title-chart-forecast').html('Forecast Pencairan');
							$('#dataChartForecast').html(respons.view);
							// alert(respons.msg);
						}
					}
				});
			}else if(optStatinv == '18'){
				$('#boxChart').addClass('hidden');
				$('#boxChartCair').addClass('hidden');
				$('#boxChartBelumCair').addClass('hidden');
				$('#boxChartCollRadar').addClass('hidden');
				$('#boxChartForecast').addClass('hidden');
				$('#boxChartKeuangan').removeClass('hidden');
				$('#boxChartPosting').addClass('hidden');

				$('#dataChart').html('');
				$('#dataChartCair').html('');
				$('#dataChartBelumCair').html('');
				$('#dataChartCollRadar').html('');
				$('#dataChartForecast').html('');
				$('#dataChartKeuangan').html('');
				$('#dataChartPosting').html('');

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmenkeuangan')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChartKeuangan').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart-keuangan').html('Verifikasi Keuangan');
							$('#dataChartKeuangan').html(respons.view);
						}else{
							$('.title-chart-keuangan').html('Verifikasi Keuangan');
							$('#dataChartKeuangan').html(respons.view);
							// alert(respons.msg);
						}
					}
				});
			}else if(optStatinv == '8'){
				$('#boxChart').addClass('hidden');
				$('#boxChartCair').addClass('hidden');
				$('#boxChartBelumCair').addClass('hidden');
				$('#boxChartCollRadar').addClass('hidden');
				$('#boxChartForecast').addClass('hidden');
				$('#boxChartKeuangan').addClass('hidden');
				$('#boxChartPosting').removeClass('hidden');

				$('#dataChart').html('');
				$('#dataChartCair').html('');
				$('#dataChartBelumCair').html('');
				$('#dataChartCollRadar').html('');
				$('#dataChartForecast').html('');
				$('#dataChartKeuangan').html('');
				$('#dataChartPosting').html('');

				$.ajax({
					type: "POST",
					url: "<?php echo site_url('allreport/chartsegmenposting')?>",
					data: $('#formSearch').serialize(),
					success: function (data) {
						$('#loadingChartPosting').html('');
						var respons = JSON.parse(data);
						if(respons.status == 'success'){
							$('.title-chart-posting').html('Posting');
							$('#dataChartPosting').html(respons.view);
						}else{
							$('.title-chart-posting').html('Posting');
							$('#dataChartPosting').html(respons.view);
							// alert(respons.msg);
						}
					}
				});
			}else{
				$('#loadingChart').html('');
				// alert('status tidak diketahui');
			}
		}
	}

	function generatedSemuaData(){
		/* clone box and insert to div output */
		var boxChart = document.getElementById('boxChart');
		var boxChartClone = boxChart.cloneNode(true);
		$('#output').append(boxChartClone);

		/* clone html */
		var boxOutput = document.getElementById('output');

		/* remove element */
		boxOutput.querySelector('#boxChart').classList.remove('card');
		boxOutput.querySelector('#boxChart').classList.remove('box-default');
		boxOutput.querySelector('#boxChart .card-header').remove();
		boxOutput.querySelector('#loadingChart').remove();

		/* add title segmen */
		var titleChart = boxOutput.querySelector('#dataChart');
		titleChart.innerHTML = titleChart.innerHTML;

		/* create images */
		domtoimage.toPng(boxOutput).then (function (dataUrl) {
			$('#output').html('');

			var imgdiv = document.createElement('img');
			imgdiv.setAttribute('id','imgChartAll');
			imgdiv.setAttribute('class','hidden');
			imgdiv.src = dataUrl;

			var op = document.getElementById('output');
			op.parentNode.insertBefore(imgdiv, op.nextSibling);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});

		/* BOX CHART CAIR */
		/* clone box and insert to div output */
		var boxChartCair = document.getElementById('boxChartCair');
		var boxChartCairClone = boxChartCair.cloneNode(true);
		$('#outputCair').append(boxChartCairClone);

		/* clone html cair */
		var boxOutputCair = document.getElementById('outputCair');

		/* remove element cair */
		boxOutputCair.querySelector('#boxChartCair').classList.remove('box');
		boxOutputCair.querySelector('#boxChartCair').classList.remove('box-default');
		boxOutputCair.querySelector('#boxChartCair .card-header').remove();
		boxOutputCair.querySelector('#loadingChartCair').remove();

		/* add title segmen cair */
		var titleChartCair = boxOutputCair.querySelector('#dataChartCair');
		titleChartCair.innerHTML = titleChartCair.innerHTML;

		/* create images cair */
		domtoimage.toPng(boxOutputCair).then (function (dataUrl) {
			$('#outputCair').html('');

			var imgdivc = document.createElement('img');
			imgdivc.setAttribute('id','imgChartCair');
			imgdivc.setAttribute('class','hidden');
			imgdivc.src = dataUrl;

			var opCair = document.getElementById('outputCair');
			opCair.parentNode.insertBefore(imgdivc, opCair.nextSibling);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});

		/* BOX CHART BELUM CAIR */
		/* clone box and insert to div output */
		var boxChartBelumCair = document.getElementById('boxChartBelumCair');
		var boxChartBelumCairClone = boxChartBelumCair.cloneNode(true);
		$('#outputBelumCair').append(boxChartBelumCairClone);

		/* clone html belum cair */
		var boxOutputBelumCair = document.getElementById('outputBelumCair');

		/* remove element belum cair */
		boxOutputBelumCair.querySelector('#boxChartBelumCair').classList.remove('box');
		boxOutputBelumCair.querySelector('#boxChartBelumCair').classList.remove('box-default');
		boxOutputBelumCair.querySelector('#boxChartBelumCair .card-header').remove();
		boxOutputBelumCair.querySelector('#loadingChartBelumCair').remove();

		/* add title segmen belum cair */
		var titleChartBelumCair = boxOutputBelumCair.querySelector('#dataChartBelumCair');
		titleChartBelumCair.innerHTML = titleChartBelumCair.innerHTML;

		/* create images belum cair */
		domtoimage.toPng(boxOutputBelumCair).then (function (dataUrl) {
			$('#outputBelumCair').html('');

			var imgdivbc = document.createElement('img');
			imgdivbc.setAttribute('id','imgChartBelumCair');
			imgdivbc.setAttribute('class','hidden');
			imgdivbc.src = dataUrl;

			var opbc = document.getElementById('outputBelumCair');
			opbc.parentNode.insertBefore(imgdivbc, opbc.nextSibling);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});

		/* BOX CHART COLLECTION */
		/* clone box and insert to div output */
		var boxChartCollRadar = document.getElementById('boxChartCollRadar');
		var boxChartCollRadarClone = boxChartCollRadar.cloneNode(true);
		$('#outputCollRadar').append(boxChartCollRadarClone);

		/* clone html COLLECTION */
		var boxOutputCollRadar = document.getElementById('outputCollRadar');

		/* remove element COLLECTION */
		boxOutputCollRadar.querySelector('#boxChartCollRadar').classList.remove('box');
		boxOutputCollRadar.querySelector('#boxChartCollRadar').classList.remove('box-default');
		boxOutputCollRadar.querySelector('#boxChartCollRadar .card-header').remove();
		boxOutputCollRadar.querySelector('#loadingChartCollRadar').remove();

		/* add title segmen COLLECTION */
		var titleChartCollRadar = boxOutputCollRadar.querySelector('#dataChartCollRadar');
		titleChartCollRadar.innerHTML = titleChartCollRadar.innerHTML;

		/* create images COLLECTION */
		domtoimage.toPng(boxOutputCollRadar).then (function (dataUrl) {
			$('#outputCollRadar').html('');

			var imgdivcr = document.createElement('img');
			imgdivcr.setAttribute('id','imgChartCollRadar');
			imgdivcr.setAttribute('class','hidden');
			imgdivcr.src = dataUrl;

			var opcr = document.getElementById('outputCollRadar');
			opcr.parentNode.insertBefore(imgdivcr, opcr.nextSibling);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});
	}

	function generatedCair(){
		/* clone html */
		var boxChart = document.getElementById('boxChartCair');
		var boxChartClone = boxChart.cloneNode(true);

		/* set new box */
		$('#output').html(boxChartClone);
		var boxChartFix = document.getElementById('output');

		/* remove element */
		boxChartFix.querySelector('#boxChartCair').classList.remove('box');
		boxChartFix.querySelector('#boxChartCair').classList.remove('box-default');
		boxChartFix.querySelector('.card-header').remove();
		boxChartFix.querySelector('#loadingChartCair').remove();

		/* add title segmen */
		var title = boxChartFix.querySelector('.title-segmen');
		var segmen = title.innerHTML;
		title.innerHTML = segmen+' (Cair)';

		/* to pdf */
		domtoimage.toPng(boxChartFix).then (function (dataUrl) {
			$('#output').html('');
			var img = new Image();
			img.src = dataUrl;

			var doc = new jsPDF('l');

			/* SET Grafik */
			doc.addImage(img, "JPEG", 15, 10, 270, 150);

			/* SET Logo */
			doc.setFont("helvetica");
			doc.setFontSize(9);
			var text = "Komanders";
			doc.text(text, doc.internal.pageSize.width-15, 170, 'right');
			doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width-30, 170, 15, 15);

			/* generate */
			var filename = 'allreport-'+segmen.replace(' ','-').toLowerCase()+'-cair.pdf';
			doc.save(filename);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});
	}

	function generatedBelumCair(){
		/* clone html */
		var boxChart = document.getElementById('boxChartBelumCair');
		var boxChartClone = boxChart.cloneNode(true);

		/* set new box */
		$('#output').html(boxChartClone);
		var boxChartFix = document.getElementById('output');

		/* remove element */
		boxChartFix.querySelector('#boxChartBelumCair').classList.remove('box');
		boxChartFix.querySelector('#boxChartBelumCair').classList.remove('box-default');
		boxChartFix.querySelector('.card-header').remove();
		boxChartFix.querySelector('#loadingChartBelumCair').remove();

		/* add title segmen */
		var title = boxChartFix.querySelector('.title-segmen');
		var segmen = title.innerHTML;
		title.innerHTML = segmen+' (Belum Cair)';

		/* to pdf */
		domtoimage.toPng(boxChartFix).then (function (dataUrl) {
			$('#output').html('');
			var img = new Image();
			img.src = dataUrl;

			var doc = new jsPDF('l');

			/* SET Grafik */
			doc.addImage(img, "JPEG", 15, 10, 270, 150);

			/* SET Logo */
			doc.setFont("helvetica");
			doc.setFontSize(9);
			var text = "Komanders";
			doc.text(text, doc.internal.pageSize.width-15, 170, 'right');
			doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width-30, 170, 15, 15);

			/* generate */
			var filename = 'allreport-'+segmen.replace(' ','-').toLowerCase()+'-belumcair.pdf';
			doc.save(filename);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});
	}

	function generatedForecast(){
		/* clone html */
		var boxChart = document.getElementById('boxChartForecast');
		var boxChartClone = boxChart.cloneNode(true);

		/* set new box */
		$('#output').html(boxChartClone);
		var boxChartFix = document.getElementById('output');

		/* remove element */
		boxChartFix.querySelector('#boxChartForecast').classList.remove('box');
		boxChartFix.querySelector('#boxChartForecast').classList.remove('box-default');
		boxChartFix.querySelector('.card-header').remove();
		boxChartFix.querySelector('#loadingChartForecast').remove();

		/* add title segmen */
		var title = boxChartFix.querySelector('.title-segmen');
		var segmen = title.innerHTML;
		title.innerHTML = segmen+' (Forecasting Pencairan)';

		/* to pdf */
		domtoimage.toPng(boxChartFix).then (function (dataUrl) {
			$('#output').html('');
			var img = new Image();
			img.src = dataUrl;

			var doc = new jsPDF('l');

			/* SET Grafik */
			doc.addImage(img, "JPEG", 15, 10, 270, 150);

			/* SET Logo */
			doc.setFont("helvetica");
			doc.setFontSize(9);
			var text = "Komanders";
			doc.text(text, doc.internal.pageSize.width-15, 170, 'right');
			doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width-30, 170, 15, 15);

			/* generate */
			var filename = 'allreport-'+segmen.replace(' ','-').toLowerCase()+'-forecast.pdf';
			doc.save(filename);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});
	}

	function generatedKeuangan(){
		/* clone html */
		var boxChart = document.getElementById('boxChartKeuangan');
		var boxChartClone = boxChart.cloneNode(true);

		/* set new box */
		$('#output').html(boxChartClone);
		var boxChartFix = document.getElementById('output');

		/* remove element */
		boxChartFix.querySelector('#boxChartKeuangan').classList.remove('box');
		boxChartFix.querySelector('#boxChartKeuangan').classList.remove('box-default');
		boxChartFix.querySelector('.card-header').remove();
		boxChartFix.querySelector('#loadingChartKeuangan').remove();

		/* add title segmen */
		var title = boxChartFix.querySelector('.title-segmen');
		var segmen = title.innerHTML;
		title.innerHTML = segmen+' (Keuangan)';

		/* to pdf */
		domtoimage.toPng(boxChartFix).then (function (dataUrl) {
			$('#output').html('');
			var img = new Image();
			img.src = dataUrl;

			var doc = new jsPDF('l');

			/* SET Grafik */
			doc.addImage(img, "JPEG", 15, 10, 270, 150);

			/* SET Logo */
			doc.setFont("helvetica");
			doc.setFontSize(9);
			var text = "Komanders";
			doc.text(text, doc.internal.pageSize.width-15, 170, 'right');
			doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width-30, 170, 15, 15);

			/* generate */
			var filename = 'allreport-'+segmen.replace(' ','-').toLowerCase()+'-keuangan.pdf';
			doc.save(filename);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});
	}

	function generatedPosting(){
		/* clone html */
		var boxChart = document.getElementById('boxChartPosting');
		var boxChartClone = boxChart.cloneNode(true);

		/* set new box */
		$('#output').html(boxChartClone);
		var boxChartFix = document.getElementById('output');

		/* remove element */
		boxChartFix.querySelector('#boxChartPosting').classList.remove('box');
		boxChartFix.querySelector('#boxChartPosting').classList.remove('box-default');
		boxChartFix.querySelector('.card-header').remove();
		boxChartFix.querySelector('#loadingChartPosting').remove();

		/* add title segmen */
		var title = boxChartFix.querySelector('.title-segmen');
		var segmen = title.innerHTML;
		title.innerHTML = segmen+' (Posting)';

		/* to pdf */
		domtoimage.toPng(boxChartFix).then (function (dataUrl) {
			$('#output').html('');
			var img = new Image();
			img.src = dataUrl;

			var doc = new jsPDF('l');

			/* SET Grafik */
			doc.addImage(img, "JPEG", 15, 10, 270, 150);

			/* SET Logo */
			doc.setFont("helvetica");
			doc.setFontSize(9);
			var text = "Komanders";
			doc.text(text, doc.internal.pageSize.width-15, 170, 'right');
			doc.addImage(document.getElementById('logoKms'), "PNG", doc.internal.pageSize.width-30, 170, 15, 15);

			/* generate */
			var filename = 'allreport-'+segmen.replace(' ','-').toLowerCase()+'-posting.pdf';
			doc.save(filename);
		}).catch(function (error) {
			alert('oops, something went wrong! '+error);
		});
	}

</script>