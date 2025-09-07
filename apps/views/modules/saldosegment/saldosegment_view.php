<style>
    .font-10{font-size: 10px;}
    .font-14{font-size: 14px;}
    .font-16{font-size: 16px;}
    .font-17{font-size: 17px;}
    .font-18{font-size: 18px;}
    .font-20{font-size: 20px;}
    .font-24{font-size: 24px;}
    .font-28{font-size: 28px;}
    .font-30{font-size: 30px;}
    .font-40{font-size: 40px;}
    .font-62{font-size: 62px;}
</style>
<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Report</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('saldosegment');?>">Saldo Segment</a>
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
            <div class="card-header with-border text-center">
                <h4 class="mb-0 text-dark fs-5"><strong>2021 - 2023</strong></h4>
            </div>
            <div class="card-body">
                <div class="col-md-12 text-center" style="margin-bottom:20px;">
                    <span class="font-30">Total Saldo</span>
                    <br>
                    <span class="font-18"><strong style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvcair[0]['saldoinvpanjar']-$totalpanjarspbcair[0]['totalspbpanjarcair']+$saldoinvbelumcair[0]['saldoinvpanjar']-$totalpanjarspbbelumcair[0]['totalspbpanjarcair'])),3)));?></strong></span>
                </div>
                <div class="row col-md-12" style="margin-bottom:20px;">
                    <div class="col-md-6 text-center">
                        <span class="font-20">Saldo Invoice Cair</span>
                        <br>
                        <span class="font-18">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvcair[0]['saldoinvpanjar']-$totalpanjarspbcair[0]['totalspbpanjarcair'])),3)));?></span>
                    </div>
                    <div class="col-md-6 text-center">
                        <span class="font-20">Saldo Invoice Belum Cair</span>
                        <br>
                        <span class="font-18">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvbelumcair[0]['saldoinvpanjar']-$totalpanjarspbbelumcair[0]['totalspbpanjarcair'])),3)));?></span>
                    </div>
                </div>
                <div class="row col-md-12" style="margin-bottom:20px;">
                    <div class="col-md-6 text-center">
                        <span class="font-20">Total Panjar SPB</span>
                        <br>
                        <span class="font-18">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspbcair[0]['totalspbpanjarcair'])),3)));?></span>
                    </div>
                    <div class="col-md-6 text-center">
                        <span class="font-20">Total Panjar SPB</span>
                        <br>
                        <span class="font-18">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspbbelumcair[0]['totalspbpanjarcair'])),3)));?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-hover">
                <div class="box-header with-border text-center">
                    <h3 class="box-title"><strong>2023</strong></h3>
                </div>
                <div class="box-body">
                    <div class="row col-md-12 text-center" style="margin-bottom:20px;">
                        <span class="font-20">Total Saldo</span>
                        <br>
                        <span class="font-17"><strong style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvcair23[0]['saldoinvpanjar']-$totalpanjarspbcair23[0]['totalspbpanjarcair']+$saldoinvbelumcair23[0]['saldoinvpanjar']-$totalpanjarspbbelumcair23[0]['totalspbpanjarcair'])),3)));?></strong></span>
                    </div>
                    <div class="row col-md-12" style="margin-bottom:20px;">
                        <div class="col-md-6 text-center">
                            <span class="font-17">Saldo Invoice Cair</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvcair23[0]['saldoinvpanjar']-$totalpanjarspbcair23[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="font-17">Saldo Invoice Belum Cair</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvbelumcair23[0]['saldoinvpanjar']-$totalpanjarspbbelumcair23[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                    </div>
                    <div class="row col-md-12" style="margin-bottom:20px;">
                        <div class="col-md-6 text-center">
                            <span class="font-17">Total Panjar SPB</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspbcair23[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="font-17">Total Panjar SPB</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspbbelumcair23[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-hover">
                <div class="box-header with-border text-center">
                    <h3 class="box-title"><strong>2022</strong></h3>
                </div>
                <div class="box-body">
                    <div class="row col-md-12 text-center" style="margin-bottom:20px;">
                        <span class="font-20">Total Saldo</span>
                        <br>
                        <span class="font-17"><strong style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvcair22[0]['saldoinvpanjar']-$totalpanjarspbcair22[0]['totalspbpanjarcair']+$saldoinvbelumcair22[0]['saldoinvpanjar']-$totalpanjarspbbelumcair22[0]['totalspbpanjarcair'])),3)));?></strong></span>
                    </div>
                    <div class="row col-md-12 no-padding" style="margin-bottom:20px;">
                        <div class="col-md-6 text-center">
                            <span class="font-17">Saldo Invoice Cair</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvcair22[0]['saldoinvpanjar']-$totalpanjarspbcair22[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="font-17">Saldo Invoice Belum Cair</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvbelumcair22[0]['saldoinvpanjar']-$totalpanjarspbbelumcair22[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                    </div>
                    <div class="row col-md-12 no-padding" style="margin-bottom:20px;">
                        <div class="col-md-6 text-center">
                            <span class="font-17">Total Panjar SPB</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspbcair22[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="font-17">Total Panjar SPB</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspbbelumcair22[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-hover">
                <div class="box-header with-border text-center">
                    <h3 class="box-title"><strong>2021</strong></h3>
                </div>
                <div class="box-body">
                    <div class="row col-md-12 text-center" style="margin-bottom:20px;">
                        <span class="font-20">Total Saldo</span>
                        <br>
                        <span class="font-17"><strong style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvcair21[0]['saldoinvpanjar']-$totalpanjarspbcair21[0]['totalspbpanjarcair']+$saldoinvbelumcair21[0]['saldoinvpanjar']-$totalpanjarspbbelumcair21[0]['totalspbpanjarcair'])),3)));?></strong></span>
                    </div>
                    <div class="row col-md-12 no-padding" style="margin-bottom:20px;">
                        <div class="col-md-6 text-center">
                            <span class="font-17">Saldo Invoice Cair</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvcair21[0]['saldoinvpanjar']-$totalpanjarspbcair21[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="font-17">Saldo Invoice Belum Cair</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($saldoinvbelumcair21[0]['saldoinvpanjar']-$totalpanjarspbbelumcair21[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                    </div>
                    <div class="row col-md-12 no-padding" style="margin-bottom:20px;">
                        <div class="col-md-6 text-center">
                            <span class="font-17">Total Panjar SPB</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspbcair21[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="font-17">Total Panjar SPB</span>
                            <br>
                            <span class="font-16">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpanjarspbbelumcair21[0]['totalspbpanjarcair'])),3)));?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card card-hover">
            <div class="card-header">
                <h4 class="mb-0 text-dark fs-5">Saldo Segmen</h4>
            </div>
            <div class="card-body">
                <form id="formSearchTabungan" action="javascript:" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Tipe Order</label>
                                <select id="optTipe" name="optTipe" class="form-control selectpicker" style="width: 100%;">
                                    <option value="nopes">Nopes</option>
                                    <option value="prpo">Prpo</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Tahun</label>
                                <select id="optTahunSegment" name="optTahunSegment" class="form-control selectpicker" style="width: 100%;">
                                    <option value="all">Pilih</option>
                                    <?php for($i=2021; $i<=date('Y'); $i++){ ?>
                                        <option value="<?php echo $i;?>" <?php if(date('Y') == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Status Invoice</label>
                                <select id="optStatus" name="optStatus" class="form-control selectpicker" style="width: 100%;">
                                    <option value="1">Cair</option>
                                    <option value="!9">Belum Cair</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">&nbsp;</label>
                                <button id="cariData" class="btn btn-primary w-100" type="submit">
                                    <i class="ti ti-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div id="dataTabunganSegment" class="table-responsive" style="margin-top:30px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	$(function () {
		$('.selectpicker').select2();

		var table = $('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});

		$('#dataTabunganSegment').on('change', function () {
			$('#dataTabunganSegment').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('saldosegment/tabungan_segment')?>",
				data: $('#formSearchTabungan').serialize(),
				success: function (data) {
					$('#dataTabunganSegment').html(data);
				}
			});
		});
		$('#dataTabunganSegment').trigger('change');

		$('#cariData').on('click', function () {
			$('#dataTabunganSegment').trigger('change');
		});

	});
</script>