<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Membership</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('tspbsp');?>">SPB SP</a>
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

<?php echo form_open_multipart('tspbsp/updatestatus','id = "formvalidation"');?>
<input type="hidden" name="txtPengajuanid" value="<?php echo $spb[0]['pengajuanid'];?>"/>
<input type="hidden" name="txtTipepengajuan" value="<?php echo $spb[0]['tipe_pengajuan'];?>"/>
<input type="hidden" name="txtTipepenarikan" value="<?php echo $spb[0]['tipe_penarikan'];?>"/>
<input type="hidden" name="txtNominalinsidentil" value="<?php echo $spb[0]['nominal_pinjaman_insidentil'];?>"/>
<input type="hidden" name="txtJangkawaktuinsidentil" value="<?php echo $spb[0]['jangka_waktu_insidentil'];?>"/>
<input type="hidden" name="txtTopupidinsidentil" value="<?php echo $spb[0]['topupid_insidentil'];?>"/>
<input type="hidden" name="txtSpbspid" value="<?php echo $spb[0]['spbspid'];?>"/>
<input type="hidden" name="txtNik" value="<?php echo $spb[0]['nik'];?>"/>
<input type="hidden" name="txtNominalspb" value="<?php echo $spb[0]['nominal'];?>"/>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Detail SPB</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-6">
                            <label class="form-label fw-semibold">NIK</label>
                            <input type="text" class="form-control" value="<?php echo $spb[0]['nik'];?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor SPB</label>
                            <input type="text" class="form-control" value="<?php echo $spb[0]['nomor'];?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nilai SPB</label>
                            <input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($spb[0]['nominal'])),3)));?>" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-6">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" class="form-control" value="<?php echo $spb[0]['nama'];?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal SPB</label>
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($spb[0]['tanggal_spb']));?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Close SPB</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal Pencairan</label>
                            <input name="txtTanggalproses" type="date" class="form-control" autocomplete="off" value="<?php echo date('Y-m-d');?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Upload Bukti Transfer</label>
                            <input id="txtBuktitf" name="txtBuktitf" type="file" class="form-control" accept="image/png, image/jpeg" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" disabled id="cmdsave" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>

<script>
	$(function() {
		$('.selectpicker').select2();

		$('#txtBuktitf').on('change', function () {
			var file = $('#txtBuktitf').val();
			if(file != ''){
				disabledSend('true');
			}else{
				disabledSend('false');
			}
		});
	});

	function disabledSend(param) {
		if(param == 'true'){
			$('#cmdsave').removeAttr('disabled', false);
		}else{
			$('#cmdsave').attr('disabled', true);
		}
	}
</script>