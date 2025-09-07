<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Membership</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('tanggota');?>">Members</a>
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
                            <label class="form-label fw-semibold">Nik</label>
                            <input name="txtNik" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Band</label>
                            <select name="optBandid" class="form-control selectpicker" style="width: 100%;">
                                <option value="all">Pilih</option>
                                <option value="1">Online</option>
                                <option value="2">Offline</option>
                                <option value="3">Maintanance</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Tipe Anggota</label>
                            <select name="optTipeanggota" class="form-control selectpicker" style="width: 100%;">
                                <option value="all">Semua Anggota</option>
                                <option value="1" selected>Payroll Koptel</option>
                                <option value="2">Istimewa/Pensiun Aktif</option>
                                <option value="3">Pindah Loker</option>
                                <option value="4">Pensiun</option>
                                <option value="5">Keluar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Name</label>
                            <input name="txtName" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Email</label>
                            <input name="txtEmail" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="optStatus" class="form-control selectpicker" style="width: 100%;">
                                <option value="all">Pilih</option>
                                <option value="1" selected>Aktif</option>
                                <option value="2">Non Aktif</option>
                                <option value="3">Konfirmasi</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                            <div class="d-flex align-items-center">
                                <i class="ti ti-send me-2 fs-4"></i> Submit
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <div id="dataSearch" class="table-responsive pb-9"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	$(function() {
		$('.selectpicker').select2();

		$('#formSearch').on('submit', function () {
			$('#dataSearch').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

			$.ajax({
				type: "POST",
				url: '<?php echo site_url('tanggota/search')?>',
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