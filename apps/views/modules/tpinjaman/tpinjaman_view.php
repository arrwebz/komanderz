<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Membership</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('tspbsp');?>">Loans</a>
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
                            <label class="form-label fw-semibold">No Pengajuan</label>
                            <input name="txtNomorpengajuan" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Bulan</label>
                            <select name="optBulan" class="form-control selectpicker" style="width: 100%">
                                <option disabled selected>Pilih</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Tahun</label>
                            <select name="optTahun" class="form-control selectpicker" style="width: 100%">
                                <option disabled>Pilih</option>
                                <option value="all">Semua Pinjaman</option>
                                <?php
                                $start_year = '2022';
                                $end_year = date('Y');
                                for($i = $start_year; $i<=$end_year; $i++):?>
                                    <option value="<?php echo $i?>" <?php if($i == date('Y')){ echo 'selected'; }?> ><?php echo $i?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">No SPB</label>
                            <input name="txtNomorspb" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">NIK</label>
                            <input name="txtNik" type="text" class="form-control">
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
				url: '<?php echo site_url('tpinjaman/search')?>',
				data: $('#formSearch').serialize(),
				success: function (data) {
					$('#dataSearch').html(data);
				}
			});
		});
		$('#formSearch').trigger('submit');
	});
</script>