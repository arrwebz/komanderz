<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Report</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('allreportspb');?>">SPB</a>
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
                                <select id="optTipe" name="optTipe" class="form-control selectpicker" style="width: 100%">
                                    <option value="all">Pilih</option>
                                    <option value="nopes">NOPES</option>
                                    <option value="prpo">PRPO</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Bulan</label>
                                <select id="optBulan" name="optBulan" class="form-control selectpicker" style="width: 100%">
                                    <option value="all">Pilih</option>
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Status Order</label>
                                <select id="optStatinv" name="optStatinv" class="form-control selectpicker" style="width: 100%">
                                    <option value="all">Pilih</option>
                                    <option value="1">Cair</option>
                                    <option value="0">Belum Cair</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Tahun</label>
                                <select id="optTahun" name="optTahun" class="form-control selectpicker" style="width: 100%">
                                    <option value="all">Pilih</option>
                                    <?php for($i=date('Y')-3; $i<=date('Y'); $i++){ ?>
                                        <option value="<?php echo $i;?>" <?php if(date('Y') == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                                    <?php } ?>
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
                    <?php if($role == 1 || $userid == '8' || $userid == '9' || $userid == '14'){ ?>
                        <button id="downloadExcell" type="button" class="btn btn-dark font-medium rounded-pill px-4 mb-6 hidden" style="margin-left:8px;">
                            <i class="ti ti-download"></i> Excel
                        </button>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="card card-hover">
            <div class="card-header">
                <h4 class="mb-0 text-dark fs-5">List Data</h4>
            </div>
            <div class="card-body">
                <div id="dataSearch" class="box-body"></div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function () {
        $('.selectpicker').select2();

        $('#formSearch').on('submit', function () {
	        $('#dataSearch').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:150px"></div>');

            $.ajax({
                type: "POST",
                url: '<?php echo site_url('allreportspb/search')?>',
                data: $('#formSearch').serialize(),
                success: function (data) {
                    $("#downloadExcell").removeClass('hidden');
                    $('#dataSearch').html(data);
                }
            });
        });
        $('#formSearch').trigger('submit');

        $('#downloadExcell').on('click', function () {
            var optStatinv = document.getElementById("optStatinv").value,
                optBulan = document.getElementById("optBulan").value,
                optTahun = document.getElementById("optTahun").value,
                optTipe = document.getElementById("optTipe").value,
                postData = 'optStatinv='+ optStatinv +
                    '&optBulan='+ optBulan +
                    '&optTahun='+ optTahun +
                    '&optTipe='+ optTipe;

            var link = '<?php echo site_url('allreportspb/exportfilter?')?>'+postData;
            window.location.href = link;
        });
    });
</script>