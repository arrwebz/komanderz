<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('mspb');?>">SPB</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Status SPB</li>
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

<?php if ($status == '1') { ?>
    <div class="alert alert-success" role="alert">
        <h4><i class="ti ti-info-circle fs-5 text-danger me-2 flex-shrink-0"></i> Catatan</h4>
        SPB ini <strong>telah dibayarkan ke bank oleh Staff Finance</strong>. Klik tombol kembali di bagian bawah untuk Kembali ke daftar SPB atau klik tombol Selesai jika telah merubah form.
    </div>
<?php } elseif ($status == '9') { ?>
    <div class="alert alert-warning" role="alert">
        <h4><i class="ti ti-info-circle fs-5 text-danger me-2 flex-shrink-0"></i> Catatan</h4>
        SPB ini <strong>sedang diproses pembayaran ke bank oleh Staff Finance</strong>. Isi form di bawah untuk melakukan konfirmasi jika sudah melakukan pembayaran. Klik tombol Selesai di bagian bawah untuk konfirmasi pembayaran.
    </div>
<?php } elseif ($status == '0') { ?>
    <div class="alert alert-info" role="alert">
        <h4><i class="ti ti-info-circle fs-5 text-danger me-2 flex-shrink-0"></i> Catatan</h4>
        SPB ini <strong>belum dikonfirmasi oleh pihak Pengurus</strong>. Isi form di bawah untuk melakukan konfirmasi jika sudah melakukan pembayaran. Klik tombol Selesai di bagian bawah untuk konfirmasi pembayaran.
    </div>
<?php } ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Update Form</h5>
            </div>
            <?php echo form_open_multipart('mspb/editspb');?>
            <?php echo form_hidden('hdnSpbid',$id); ?>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Informasi</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor SPB</label>
                            <input name="txtKodenomor" type="text" class="form-control" value="<?php echo $kodenomor; ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal SPB</label>
                            <input name="txtKodenomor" type="text" class="form-control" value="<?php echo $tglspb; ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Jenis Pembayaran</label>
                            <select name="optPayment" class="form-control selectpicker" disabled>
                                <option disabled>Select</option>
                                <option value="cash" <?php if($jenisbayar == 'cash') echo 'selected' ?> >CASH</option>
                                <option value="transfer" <?php if($jenisbayar == 'transfer') echo 'selected' ?>>TRANSFER</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Rekening</label>
                            <input name="txtAccnum" type="text" class="form-control" value="<?php echo $norek ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Bank</label>
                            <select name="optBank" class="form-control selectpicker" disabled>
                                <option value=" " <?php if($bank == 0) echo 'selected' ?>>Pilih</option>
                                <option value="bca" <?php if($bank == 'bca') echo 'selected' ?>>BCA</option>
                                <option value="mandiri" <?php if($bank == 'mandiri') echo 'selected' ?>>MANDIRI</option>
                                <option value="bni" <?php if($bank == 'bni') echo 'selected' ?>>BNI</option>
                                <option value="bri" <?php if($bank == 'bri') echo 'selected' ?>>BRI</option>
                                <option value="other" <?php if($bank == 'other') echo 'selected' ?>>LAINNYA...</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Bank Lainnya</label>
                            <input name="txtBankother" type="text" class="form-control" value="<?php echo $banklain ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Payment</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Confirm Payment</label>
                                <select name="optStatus" class="form-control selectpicker" style="width: 100%">
                                    <option disabled>Pilih</option>
                                    <?php $sess = $this->session->userdata();?>
                                    <?php if($sess['role'] == 1 || $sess['role'] == 2): ?>
                                        <option value="0" <?php if($status == '0') echo 'selected' ?>>Pending</option>
                                    <?php endif;?>
                                    <option value="1" <?php if($status == '1') echo 'selected' ?> >Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Process Date</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                    <input name="txtDate" type="date" class="form-control datepicker" value="<?php echo date('Y-m-d', strtotime($tglproses)); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Process Time</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-clock"></i></div>
                                        <input name="txtTime" type="text" class="form-control timepicker" value="<?php echo date('H:i');?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Upload Bukti Transaksi</label>
                                <input type="file" name="txtFile" class="form-control file" />
                                <?php echo form_error('txtFile'); ?>
                                <?php echo $this->session->flashdata('error_doupload');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                    <button type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Selesai</button>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

<script>
	$(function() {
		$('.timepicker').timepicker({
			showInputs: false
		});

		$('.selectpicker').select2();
	});
</script>