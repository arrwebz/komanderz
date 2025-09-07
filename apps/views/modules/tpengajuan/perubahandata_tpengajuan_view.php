<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home');?>"><i class="fa fa-dashboard"></i> home</a></li>
            <li><a href="javascript:"><?php echo strtolower($title);?></a></li>
            <li class="active"><?php echo strtolower($brand);?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php echo form_open_multipart('tpengajuan/perubahandata','id = "formvalidation"');?>
            <input type="hidden" name="txtPengajuanid" value="<?php echo $pengajuan[0]['pengajuanid'];?>"/>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Anggota Sebelumnya</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['nik'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['name'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Simpanan Pokok</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['simpanan_pokok'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['email'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Division</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['division'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Segment</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['segment'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['location'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Telp</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['telp'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Bank</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['bank'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['norek'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input type="text" class="form-control" value="<?php echo $pengajuan[0]['namarek'];?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Perubahan Data</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input name="txtNik" type="text" class="form-control" value="<?php echo $pengajuan[0]['nik'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="txtNamaPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['pnama'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Simpanan Pokok</label>
                            <input name="txtSimpananpokokPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['psimpanan_pokok'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="txtEmailPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['pemail'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Division</label>
                            <input name="txtDivisionPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['pdivision'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Segment</label>
                            <input name="txtSegmentPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['psegment'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input name="txtLocationPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['plocation'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Telp</label>
                            <input name="txtTelpPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['ptelp'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Bank</label>
                            <input name="txtBankPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['pbank'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input name="txtNorekPerubahanDataP" type="text" class="form-control" value="<?php echo $pengajuan[0]['pnorek'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input name="atas_nama" type="text" class="form-control" value="<?php echo $pengajuan[0]['patas_nama'];?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Konfirmasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Status</label>
                            <select id="txtStatus" name="txtStatus" class="form-control selectpicker" data-width="100%">
                                <option value="3">Setujui Perubahan</option>
                                <option value="4">Tolak</option>
                            </select>
                        </div>
                        <div id="wrapNotes" class="form-group hidden">
                            <label>Catatan</label>
                            <textarea name="txtNotes" class="form-control" rows="8"></textarea>
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