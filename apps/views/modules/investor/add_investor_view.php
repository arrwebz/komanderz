<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Investor</a></li>
            <li class="active">Profil Investor</li>
        </ol>
    </section>
    <div class="pad margin no-print">
        <div class="callout callout-warning" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Catatan:</h4>
            Silahkan isi data <strong>profil investor</strong>. Total invest akan terlihat setelah pembuatan kontrak.
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors(); ?>
            </div>
            <?php echo form_open_multipart('investor/addinvestor','id = "formvalidation"');?>
            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama:</label>
                            <input id="txtName" type="text" class="form-control" name="txtName">
                            <span class="resTxtName label label-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Lokasi Kerja:</label>
                            <input type="text" class="form-control" name="txtLoc">
                        </div>
                        <div class="form-group">
                            <label>Kategori:</label>
                            <input type="text" class="form-control" name="txtCat">
                        </div>
                        <div class="form-group">
                            <label>Kelas Band:</label>
                            <input type="text" class="form-control" name="txtBand">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Administrasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>KTP:</label>
                            <input type="text" class="form-control" name="txtKtp">
                        </div>
                        <div class="form-group">
                            <label>NPWP:</label>
                            <input type="text" class="form-control" name="txtNpwp">
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <input type="text" class="form-control" name="txtAdrs">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Investasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Total Invest:</label>
                            <input type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Bergabung:</label>
                            <input type="text" class="form-control datepicker" name="optJoindate">
                        </div>
                        <div class="form-group">
                            <label>Catatan:</label>
                            <input type="text" class="form-control" name="txtNotes">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" name="cmdsave" id="cmdsave" class="btn btn-success pull-right">Selesai</button>
            </div>
            <?php echo form_close();?>
        </div>
    </section>
</div>

<script>
	$(function() {
		$('.selectpicker').select2();
		document.getElementById("cmdsave").setAttribute('disabled','disabled');

		$('#datatabls').DataTable({
			'responsive'  : true,
			'paging'      : false,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : false,
			'info'        : false,
			'autoWidth'   : true

		});

		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true
		});

		$('#txtName').on('input', function () {
			var txtName = $('#txtName').val();
			$.ajax({
			    type: "POST",
			    url: "<?php echo base_url().$this->router->fetch_class().'/checkname'?>",
			    data: 'txtName='+txtName,
			    success: function (data) {
			        var respon = JSON.parse(data);
			        if(respon['status'] == 'success'){
				        document.getElementById("cmdsave").removeAttribute('disabled');
                        $('.resTxtName').html(respon['msg']);
			        }else{
				        document.getElementById("cmdsave").setAttribute('disabled','disabled');
				        $('.resTxtName').html(respon['msg']);
			        }
			    }
			});
		});
	});
</script>