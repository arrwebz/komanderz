<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Membership</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('tpengajuan');?>">Submission</a>
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
            <h4 class="mb-0 text-dark fs-5">Search</h4>
        </div>
        <form id="formSearch" action="javascript:">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Nomor Pengajuan</label>
                            <input name="txtNomorpengajuan" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">NIK</label>
                            <input name="txtNik" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Nama</label>
                            <input name="txtNama" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Bulan</label>
                            <select name="optBulan" class="form-control selectpicker" style="width:100%">
                                <option disabled selected>Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Tipe Pengajuan</label>
                            <select name="optTipepengajuan" class="form-control selectpicker" style="width: 100%">
                                <option value="all">Semua Pengajuan</option>
                                <option value="1">Anggota Baru</option>
                                <option value="2">Penarikan Simpanan</option>
                                <option value="3">Perubahan Simpanan</option>
                                <option value="4">Perubahan Data</option>
                                <option value="5">Pinjaman Insidentil</option>
                                <option value="6">Pinjaman Koptel</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Platform</label>
                            <select name="optPlatform" class="form-control selectpicker" style="width: 100%">
                                <option value="all">Pilih</option>
                                <option value="1">Kaila</option>
                                <option value="2">KMS</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="optStatus" class="form-control selectpicker" style="width: 100%">
                                <option value="all">Pilih</option>
                                <option value="1">Proses</option>
                                <option value="2">SPB Dibuat</option>
                                <option value="3">Selesai</option>
                                <option value="4">Ditolak</option>
                                <option value="5">Dibatalkan</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Tahun</label>
                            <select name="optTahun" class="form-control selectpicker" style="width:100%">
                                <option disabled>Pilih</option>
                                <?php
                                $start_year = '2021';
                                $end_year = date('Y');
                                for($i = $start_year; $i<=$end_year; $i++):?>
                                    <option value="<?php echo $i?>" <?php if($i == date('Y')){ echo 'selected'; }?> ><?php echo $i?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-send me-2 fs-4"></i> Submit
                    </div>
                </button>
            </div>
        </form>
    </div>
</section>

<div class="row">
    <div class="col-md-12">
        <div class="card" style="margin-bottom:50px;">
            <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                <h4 class="card-title text-white mb-0">Data List</h4>
            </div>
            <div class="card-body collapse show">
                <div>
                    <a href="<?php echo base_url().$this->router->fetch_class().'/addpengajuan'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Submission</a>
                </div>
                <div id="dataSearch" class="table-responsive pb-9"></div>
            </div>
        </div>
    </div>
</div>

<script>
	$(function() {
		$('.selectpicker').select2();

		$('#formSearch').on('submit', function () {
			$('#dataSearch').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

			$.ajax({
				type: "POST",
				url: '<?php echo site_url('tpengajuan/search')?>',
				data: $('#formSearch').serialize(),
				success: function (data) {
					$("#downloadExcell").removeClass('hidden');
					$('#dataSearch').html(data);
				}
			});
		});
		$('#formSearch').trigger('submit');
	});
</script>