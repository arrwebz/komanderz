<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Membership</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('tpengajuan');?>">Pengajuan</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="javascript:">Perubahan Simpanan</a>
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

<?php echo $this->session->flashdata('msg');?>

<?php echo form_open_multipart('tpengajuan/perubahansimpanan','id = "formvalidation"');?>
<input type="hidden" name="txtPengajuanid" value="<?php echo $pengajuan[0]['pengajuanid'];?>"/>
<div class="row col-md-12">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header border-bottom px-4 py-3 ">
                <h5 class="card-title fw-semibold mb-0">Konfirmasi</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="mb-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select id="txtStatus" name="txtStatus" class="form-control selectpicker" data-width="100%">
                        <option value="3">Setujui Perubahan</option>
                        <option value="4">Tolak</option>
                    </select>
                </div>
                <div id="wrapNotes" class="mb-6 hidden">
                    <label class="form-label fw-semibold">Catatan</label>
                    <textarea name="txtNotes" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="ti ti-arrow-left"></i> Kembali</a>
                <button type="submit" name="cmdsave" id="cmdsave" class="btn btn-success pull-right">Selesai</button>
            </div>
        </div>
</div>
    <div class="col-md-4">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Simpanan Anggota Sebelumnya</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="mb-6">
                    <label class="form-label fw-semibold">NIK</label>
                    <input id="txtNik" name="txtNik" type="text" class="form-control" value="<?php echo $pengajuan[0]['nik'];?>" readonly>
                </div>
                <div class="mb-6">
                    <label class="form-label fw-semibold">Nama</label>
                    <?php if($pengajuan[0]['platform'] == '2'): ?>
                        <input type="text" class="form-control" value="<?php echo $pengajuan[0]['nama'];?>" readonly>
                    <?php else: ?>
                        <input type="text" class="form-control" value="<?php echo $pengajuan[0]['name'];?>" readonly>
                    <?php endif; ?>
                </div>
                <div class="mb-6">
                    <label class="form-label fw-semibold">Band</label>
                    <?php if($pengajuan[0]['platform'] == '2'): ?>
                        <input type="text" class="form-control" value="<?php echo formatRomawi($pengajuan[0]['bandid']).' - '.strrev(implode('.',str_split(strrev(strval($pengajuan[0]['band_value'])),3)));?>" readonly>
                    <?php else: ?>
                        <input type="text" class="form-control" value="<?php echo formatRomawi($pengajuan[0]['pengajuanbandid']).' - '.strrev(implode('.',str_split(strrev(strval($pengajuan[0]['pengajuanband_value'])),3)));?>" readonly>
                    <?php endif; ?>
                </div>
                <div class="mb-6">
                    <label class="form-label fw-semibold">Simpanan Sukarela</label>
                    <?php if($pengajuan[0]['platform'] == '2'): ?>
                        <input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['simpanan_sukarela'])),3)));?>" readonly>
                    <?php else: ?>
                        <input type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['pengajuansimpanan_sukarela'])),3)));?>" readonly>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Informasi Perubahan Simpanan</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="mb-6">
                    <label class="form-label fw-semibold">NIK</label>
                    <input id="txtNik" name="txtNik" type="text" class="form-control" value="<?php echo $pengajuan[0]['nik'];?>" readonly>
                </div>
                <div class="mb-6">
                    <label class="form-label fw-semibold">Nama</label>
                    <?php if($pengajuan[0]['platform'] == '2'): ?>
                        <input type="text" class="form-control" value="<?php echo $pengajuan[0]['nama'];?>" readonly>
                    <?php else: ?>
                        <input type="text" class="form-control" value="<?php echo $pengajuan[0]['name'];?>" readonly>
                    <?php endif; ?>
                </div>
                <div class="mb-6">
                    <label class="form-label fw-semibold">Band</label>
                    <input type="hidden" name="txtBandid" class="form-control" value="<?php echo $pengajuan[0]['pengajuanbandid'];?>" readonly>
                    <input type="text" class="form-control" value="<?php echo formatRomawi($pengajuan[0]['pengajuanbandid']).' - '.strrev(implode('.',str_split(strrev(strval($pengajuan[0]['pengajuanband_value'])),3)));?>" readonly>
                </div>
                <div class="mb-6">
                    <input type="text" name="txtSimpanansukarela" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['pengajuansimpanan_sukarela'])),3)));?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close();?>
</div>
<script>
	$(function() {
		$('.selectpicker').select2();

		$('#txtStatus').on('change', function () {
            var status = $(this).val();
            if(status == "4"){
            	$('#wrapNotes').removeClass('hidden');
            }else{
	            $('#wrapNotes').addClass('hidden');
            }
		});
	});
</script>