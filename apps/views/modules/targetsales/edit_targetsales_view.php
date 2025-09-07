<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Target</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('targetsales');?>">Sales</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Update Target</li>
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

<?php echo form_open_multipart('targetsales/edittargetsales/'.$idtargetsales);?>
<input type="hidden" name="txtIdtargetsales" value="<?php echo $idtargetsales;?>"/>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Target Detail</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Name</label>
                            <input name="txtNama" type="text" class="form-control" value="<?php echo $nama;?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Type</label>
                            <select name="optTipe" class="form-control selectpicker" >
                                <option disabled selected>Select</option>
                                <option value="1" <?php if($tipe == '1'){ echo 'selected';} ?>>Global</option>
                                <option value="2" <?php if($tipe == '2'){ echo 'selected';} ?>>Quarter</option>
                                <option value="3" <?php if($tipe == '3'){ echo 'selected';} ?>>Monthly</option>
                                <option value="4" <?php if($tipe == '4'){ echo 'selected';} ?>>Nopes</option>
                                <option value="5" <?php if($tipe == '5'){ echo 'selected';} ?>>PADI</option>
                                <option value="6" <?php if($tipe == '6'){ echo 'selected';} ?>>IBL</option>
                                <option value="7" <?php if($tipe == '7'){ echo 'selected';} ?>>OBL</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nominal</label>
                            <input name="txtNilai" type="text" class="form-control" value="<?php echo $nilai;?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Periodic Info</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Bulan</label>
                            <select name="optBulan" class="form-control selectpicker" >
                                <option value="0">Pilih</option>
                                <option value="01" <?php if($bulan == '1'){ echo 'selected';} ?>>Januari</option>
                                <option value="02" <?php if($bulan == '2'){ echo 'selected';} ?>>Februari</option>
                                <option value="03" <?php if($bulan == '3'){ echo 'selected';} ?>>Maret</option>
                                <option value="04" <?php if($bulan == '4'){ echo 'selected';} ?>>April</option>
                                <option value="05" <?php if($bulan == '5'){ echo 'selected';} ?>>Mei</option>
                                <option value="06" <?php if($bulan == '6'){ echo 'selected';} ?>>Juni</option>
                                <option value="07" <?php if($bulan == '7'){ echo 'selected';} ?>>Juli</option>
                                <option value="08" <?php if($bulan == '8'){ echo 'selected';} ?>>Agustus</option>
                                <option value="09" <?php if($bulan == '9'){ echo 'selected';} ?>>September</option>
                                <option value="10" <?php if($bulan == '10'){ echo 'selected';} ?>>Oktober</option>
                                <option value="11" <?php if($bulan == '11'){ echo 'selected';} ?>>November</option>
                                <option value="12" <?php if($bulan == '12'){ echo 'selected';} ?>>Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tahun</label>
                            <select name="optTahun" class="form-control selectpicker" >
                                <option value="0">Pilih</option>
                                <?php for($i=date('Y')-1; $i<=date('Y')+2; $i++){ ?>
                                    <option value="<?php echo $i;?>" <?php if($tahun == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
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

		$("#optTipe").on('change', function () {
			var sel = $('#optTipe').val();
			if(sel == '1'){
				$("#textMenu").addClass("hidden");
				$("#textLabel").removeClass("hidden");
				$("#boxParentmenu").addClass("hidden");
				$("#boxUri").addClass("hidden");
				$("#boxIcon").addClass("hidden");
			}else{
				$("#textMenu").removeClass("hidden");
				$("#textLabel").addClass("hidden");
				$("#boxParentmenu").removeClass("hidden");
				$("#boxUri").removeClass("hidden");
				$("#boxIcon").removeClass("hidden");
			}
		});

        <?php if($tipe == '1'){ ?>
		$("#textMenu").addClass("hidden");
		$("#boxParentmenu").addClass("hidden");
		$("#boxUri").addClass("hidden");
		$("#boxIcon").addClass("hidden");
        <?php }else{ ?>
		$("#textMenu").removeClass("hidden");
		$("#boxParentmenu").removeClass("hidden");
		$("#boxUri").removeClass("hidden");
		$("#boxIcon").removeClass("hidden");
        <?php } ?>
	});
</script>