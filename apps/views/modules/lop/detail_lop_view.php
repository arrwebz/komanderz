<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Proship</a></li>
            <li class="active">List Of Project</li>
        </ol>
    </section>
    <div class="pad margin no-print">
        <div class="callout callout-success" style="margin-bottom: 0!important;background-color: #ffffff !important;color: #444444 !important;">
            <?php if($drd[0]['status'] == '1') { ?>
                <h4>Sudah Invoice</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 10%">100%</div>
                </div>
            <?php } elseif($drd[0]['status'] == '2') { ?>
                <h4>P1</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
                </div>
            <?php } elseif($drd[0]['status'] == '3') { ?>
                <h4>P8</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                </div>
            <?php } elseif($drd[0]['status'] == '4') { ?>
                <h4>KL</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45%</div>
                </div>
            <?php } elseif($drd[0]['status'] == '5') { ?>
                <h4>BAST</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                </div>
            <?php } elseif($drd[0]['status'] == '6') { ?>
                <h4>BAPL</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                </div>
            <?php } elseif($drd[0]['status'] == '7') { ?>
                <h4>BAPLA</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
                </div>
            <?php } ?>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nomor</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kode:</label>
                            <input type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kirim:</label>
                            <input type="text" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Unit:</label>
                            <input type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pekerjaan:</label>
                            <input type="text" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nominal</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nilai Dasar:</label>
                            <input type="text" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Posisi</h3>
                        <?php if($drd[0]['status'] == '1') { ?><small>CAIR</small> <?php } ?>
                    </div>
                    <div class="box-body">
                        <a target="_blank" href="<?php echo base_url().'ktrack/details/'.$id;?>"><i class="fa fa-binoculars"></i> Detail dokumen invoice</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">SPB</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="button" class="btn btn-success pull-right" onClick="window.location.href = '<?php echo base_url();?>/kbillco/details/';return true;">
                    <i class="fa fa-credit-card"></i> Pencairan
                </button>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/preview/';return true;">
                    <i class="fa fa-print"></i> Cetak
                </button>
            </div>
        </div>
    </section>
</div>

<script>
	$(function() {
		$('#datatablspos').DataTable({
			'responsive'  : true,
			'paging'      : false,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : false,
			'info'        : false,
			'autoWidth'   : true

		});

		$('#datatablespb').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true

		});

		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true
		});

		$('.selectpicker').select2();

		$("#btnUpdate").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kbillco/ajax_updatestatus'); ?>",
				data: $('#formstatus').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Posisi invoice berhasil diperbarui!", icon:
								"success", buttons: false, timer: 1500,}).then(function(){
								location.reload();
							}
					);
				}
			});
		});
	});
</script>