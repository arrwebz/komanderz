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
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="javascript:">Add Submission</a>
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

<div class="alert alert-info" role="alert">
    <h4><i class="ti ti-info-circle fs-5 text-danger me-2 flex-shrink-0"></i> Informasi</h4>
    No Pengajuan Terakhir <?php echo $lastpengajuan[0]['lastnum'];?>
    <br><a href="<?php echo site_url('tpengajuan/detail/'.$lastpengajuan[0]['pengajuanid']);?>"><?php echo $lastpengajuan[0]['nomor_pengajuan'];?></a>
</div>

<?php echo form_open_multipart('tpengajuan/addpengajuan','id = "formvalidation"');?>
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Submission</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tipe Pengajuan</label>
                            <select id="tipePengajuan" name="optTipepengajuan" class="form-control selectpicker" style="width:100%">
                                <option value="">Pilih</option>
                                <option value="1">Anggota Baru</option>
                                <option value="2">Penarikan Simpanan</option>
                                <option value="3">Perubahan Simpanan</option>
                                <option value="4">Perubahan Data</option>
                                <option value="5">Pinjaman Insidentil</option>
                                <option value="6">Pinjaman Koptel</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor Pengajuan</label>
                            <input name="txtNomorPengajuan" type="text" class="form-control" value="<?php echo $newnum;?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal Pengajuan</label>
                            <input name="txtTanggalpengajuan" type="date" class="form-control datepicker" value="<?php echo date('Y-m-d');?>">
                        </div>
                    </div>
                </div>
            </div>
            <div id="boxInfoSaldo" class="hidden">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Info Saldo</h5>
                </div>
                <div class="card-body p-4 border-bottom">
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Total Saldo Simpanan</label>
                            <input id="totalSaldoSimpanan" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Saldo Simpanan Tahun lalu</label>
                            <input id="saldoTahunLalu" type="text" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="col-md-12">
                        <!-- START ANGGOTA BARU -->
                        <div id="boxAnggotaBaru">
                            <div>
                                <h3 class="box-title">Anggota Baru</h3>
                            </div>
                            <div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">NIK</label>
                                    <input id="txtNikBaru" name="txtNikBaru" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Nama</label>
                                    <input name="txtNama" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Simpanan Pokok</label>
                                    <input id="txtSimpananpokok" name="txtSimpananpokok" type="text" class="form-control" value="100.000">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Band</label>
                                    <select id="bandidanggotabaru" name="bandidanggotabaru" class="form-control selectpicker" style="width:100%">
                                        <?php for($i=0; $i<count($band); $i++): ?>
                                            <option value="<?php echo $band[$i]['bandid'];?>"><?php echo '<b>'.$band[$i]['band_name'].'</b> ( Rp. '.strrev(implode('.',str_split(strrev(strval($band[$i]['band_value'])),3))).' )';?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Simpanan Sukarela</label>
                                    <input id="txtSimpanansukarela" name="txtSimpanansukarela" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input name="txtEmail" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Division</label>
                                    <input name="txtDivision" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Segment</label>
                                    <input name="txtSegment" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Location</label>
                                    <input name="txtLocation" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Telp</label>
                                    <input name="txtTelp" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Bank</label>
                                    <input name="txtBank" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Nomor Rekening</label>
                                    <input name="txtNorek" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Atas Nama</label>
                                    <input name="txtAtasnama" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">File Anggota Baru (pdf/word)</label>
                                    <input name="txtFileanggotabaru" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- END ANGGOTA BARU -->

                        <!-- START PENARIKAN SIMPANAN -->
                        <div id="boxPenarikanSimpanan">
                            <div>
                                <h3 class="box-title">Penarikan Simpanan</h3>
                            </div>
                            <div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">NIK</label>
                                    <select id="txtNikPenarikan" name="txtNikPenarikan" class="form-control selectpicker" style="width:100%">
                                        <option value="">Pilih</option>
                                        <?php if(!empty($nik)): ?>
                                            <?php foreach($nik as $rowNik): ?>
                                                <option value="<?php echo $rowNik['nik'];?>"><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Bank</label>
                                    <input name="txtBankPenarikan" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Nomor Rekening</label>
                                    <input name="txtNorekPenarikan" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Atas Nama</label>
                                    <input name="txtAtasnamaPenarikan" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Tipe Penarikan</label>
                                    <select id="txtTipepenarikan" name="txtTipepenarikan" class="form-control selectpicker" style="width:100%">
                                        <option value="1">Simpanan</option>
                                        <option value="2">Pensiun</option>
                                        <option value="3">Keluar Anggota</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Nominal Penarikan</label>
                                    <input id="txtNominalpenarikan" name="txtNominalpenarikan" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- END PENARIKAN SIMPANAN -->

                        <!-- START PERUBAHAN SIMPANAN -->
                        <div id="boxPerubahanSimpanan">
                            <div>
                                <h3 class="box-title">Perubahan Simpanan</h3>
                            </div>
                            <div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">NIK</label>
                                    <select id="txtNikPerubahanSimpanan" name="txtNikPerubahanSimpanan" class="form-control selectpicker" style="width:100%">
                                        <option value="">Pilih</option>
                                        <?php if(!empty($nik)): ?>
                                            <?php foreach($nik as $rowNik): ?>
                                                <option value="<?php echo $rowNik['nik'];?>"><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div id="wrapPerubahanSimpanan" class="hidden">
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Band</label>
                                        <select id="bandidperubahansimpanan" name="bandidperubahansimpanan" class="form-control selectpicker" style="width:100%">
                                            <?php for($i=0; $i<count($band); $i++): ?>
                                                <option value="<?php echo $band[$i]['bandid'];?>"><?php echo '<b>'.$band[$i]['band_name'].'</b> ( Rp. '.strrev(implode('.',str_split(strrev(strval($band[$i]['band_value'])),3))).' )';?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Simpanan Sukarela</label>
                                        <input id="txtSimpanansukarelaPerubahansimpanan" name="txtSimpanansukarelaPerubahansimpanan" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PERUBAHAN SIMPANAN -->

                        <!-- START PERUBAHAN DATA -->
                        <div id="boxPerubahanData">
                            <div>
                                <h3 class="box-title">Perubahan Data</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">NIK</label>
                                    <select id="txtNikPerubahanData" name="txtNikPerubahanData" class="form-control selectpicker" style="width:100%">
                                        <option value="">Pilih</option>
                                        <?php if(!empty($nik)): ?>
                                            <?php foreach($nik as $rowNik): ?>
                                                <option value="<?php echo $rowNik['nik'];?>"><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div id="wrapPerubahanDataAnggota" class="hidden">
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Nama</label>
                                        <input id="txtNamaPerubahanData" name="txtNamaPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Simpanan Pokok</label>
                                        <input id="txtSimpananpokokPerubahanData" name="txtSimpananpokokPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input id="txtEmailPerubahanData" name="txtEmailPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Division</label>
                                        <input id="txtDivisionPerubahanData" name="txtDivisionPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Segment</label>
                                        <input id="txtSegmentPerubahanData" name="txtSegmentPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Location</label>
                                        <input id="txtLocationPerubahanData" name="txtLocationPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Telp</label>
                                        <input id="txtTelpPerubahanData" name="txtTelpPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Bank</label>
                                        <input id="txtBankPerubahanData" name="txtBankPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Nomor Rekening</label>
                                        <input id="txtNorekPerubahanData" name="txtNorekPerubahanData" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-semibold">Atas Nama</label>
                                        <input id="txtAtasnamaPerubahanData" name="txtAtasnamaPerubahanData" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PERUBAHAN DATA -->

                        <!-- START PINJAMAN INSIDENTIL -->
                        <div id="boxPinjamanInsidentil">
                            <div>
                                <h3 class="box-title">Pinjaman Insidentil</h3>
                            </div>
                            <div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">NIK</label>
                                    <select id="txtNikInsidentil" name="txtNikInsidentil" class="form-control selectpicker" style="width:100%">
                                        <option value="">Pilih</option>
                                        <?php if(!empty($nik)): ?>
                                            <?php foreach($nik as $rowNik): ?>
                                                <option value="<?php echo $rowNik['nik'];?>"><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div id="insidentilAktif"></div>
                                <div id="viewRinciantopupinsidentil"></div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Nominal Insidentil</label>
                                    <input id="txtNominalpinjamaninsidentil" name="txtNominalpinjamaninsidentil" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Jangka Waktu</label>
                                    <input id="txtJangkawaktuinsidentil" name="txtJangkawaktuinsidentil" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Bank</label>
                                    <input name="txtBankInsidentil" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Nomor Rekening</label>
                                    <input name="txtNorekInsidentil" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Atas Nama</label>
                                    <input name="txtAtasnamaInsidentil" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">File Pinjaman Insidentil (pdf/word)</label>
                                    <input name="txtFileinsidentil" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- END PINJAMAN INSIDENTIL -->

                        <!-- START PINJAMAN KOPTEL -->
                        <div id="boxPinjamanKoptel">
                            <div>
                                <h3 class="box-title">Pinjaman Koptel</h3>
                            </div>
                            <div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">NIK</label>
                                    <select id="txtNikKoptel" name="txtNikKoptel" class="form-control selectpicker" style="width:100%">
                                        <option value="">Pilih</option>
                                        <?php if(!empty($nik)): ?>
                                            <?php foreach($nik as $rowNik): ?>
                                                <option value="<?php echo $rowNik['nik'];?>"><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Bank</label>
                                    <input name="txtBankKoptel" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Nomor Rekening</label>
                                    <input name="txtNorekKoptel" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Atas Nama</label>
                                    <input name="txtAtasnamaKoptel" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Nominal Koptel</label>
                                    <input id="txtNominalpinjamankoptel" name="txtNominalpinjamankoptel" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">Jangka Waktu</label>
                                    <input name="txtJangkawaktukoptel" type="text" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold">File Pinjaman Insidentil (pdf/word)</label>
                                    <input name="txtFilekoptel" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- END PINJAMAN KOPTEL -->
                    </div>
                </div>
            </div>
            <div id="boxSubmit" class="card-footer">
                <div class="col-md-12">
                    <button type="submit" id="cmdsave" name="cmdsave" disabled class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>

<!-- START MODAL TOPUP -->
<div id="modalAddTopup" class="modal fade" aria-hidden="true" aria-labelledby="modalAddTopup" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Form Topup</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAddTopupinsidentil" action="javascript:" method="POST">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Topup ID :</label>
                        <input id="txtTopupinsidentilid" name="txtTopupinsidentilid" type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Nominal Topup :</label>
                        <input id="txtNominaltopupinsidentil" name="txtNominaltopupinsidentil" type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Jangka Waktu :</label>
                        <select id="txtJwtopupinsidentil" name="txtJwinsidentil" class="form-control selectpicker">
                            <option value="1">1 Bulan</option>
                            <option value="2">2 Bulan</option>
                            <option value="3">3 Bulan</option>
                            <option value="4">4 Bulan</option>
                            <option value="5">5 Bulan</option>
                            <option value="6">6 Bulan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="msgForm" class="mb-15" style="font-weight: 600"></div>
                    <button id="submitTopupinsindetil" class="btn btn-primary" type="submit">Add</button>
                    <a class="btn btn-sm btn-white btn-pure" data-bs-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL TOPUP -->

<script>
	$(function() {
		$('.selectpicker').select2();

		/* start validasi nik */
		$('#txtNikBaru').on('change', function () {
			var txtNikBaru = $('#txtNikBaru').val();
			if(txtNikBaru != ''){
				disabledSend('true')
			}else{
				disabledSend('false')
			}
		});
		$('#txtNikPenarikan').on('change', function () {
			var txtNikPenarikan = $('#txtNikPenarikan').val();
			if(txtNikPenarikan != ''){
				disabledSend('true');
				$('#boxInfoSaldo').removeClass('hidden');
				cekSaldo(txtNikPenarikan);
			}else{
				disabledSend('false')
				$('#boxInfoSaldo').addClass('hidden');
			}
		});
		$('#txtNikPerubahanSimpanan').on('change', function () {
			var txtNikPerubahanSimpanan = $('#txtNikPerubahanSimpanan').val();
			if(txtNikPerubahanSimpanan != ''){
				disabledSend('true');
                setSimpananSukarela(txtNikPerubahanSimpanan);
			}else{
				disabledSend('false');
			}
		});
		$('#txtNikPerubahanData').on('change', function () {
			var txtNikPerubahanData = $('#txtNikPerubahanData').val();
			if(txtNikPerubahanData != ''){
				disabledSend('true');
				setDataAnggota(txtNikPerubahanData)
			}else{
				disabledSend('false')
			}
		});
		$('#txtNikInsidentil').on('change', function () {
			$("#insidentilAktif").html("");
			$("#viewRinciantopupinsidentil").html("");
			$("#txtPinjamanid").val("");
			$("#txtPencairanInsidentil").val("");
			$("#txtNominalpinjamaninsidentil").val("");
			$("#txtJangkawaktuinsidentil").val("");
			document.getElementById('txtNominalpinjamaninsidentil').removeAttribute('readonly');
			document.getElementById('txtJangkawaktuinsidentil').removeAttribute('readonly');

			var txtNikInsidentil = $('#txtNikInsidentil').val();
			$("#insidentilAktif").addClass('hidden');
			if(txtNikInsidentil != ''){
				/*disabledSend('true');*/
                cekInsidentilAktif(txtNikInsidentil)
			}else{
				disabledSend('false');
			}
		});
		$('#txtNikKoptel').on('change', function () {
			var txtNikKoptel = $('#txtNikKoptel').val();
			if(txtNikKoptel != ''){
				disabledSend('true')
			}else{
				disabledSend('false')
			}
		});
		/* end validasi nik */

        /* start validasi tipe pengajuan */
		$("#tipePengajuan").on('change', function () {
			tipePengajuan = $('#tipePengajuan').val();
            if(tipePengajuan == '1'){
                $('#boxAnggotaBaru').removeClass('hidden');
                $('#boxPenarikanSimpanan').addClass('hidden');
                $('#boxPerubahanSimpanan').addClass('hidden');
                $('#boxPerubahanData').addClass('hidden');
                $('#boxPinjamanInsidentil').addClass('hidden');
                $('#boxPinjamanKoptel').addClass('hidden');
	            $('#boxSubmit').removeClass('hidden');
	            $('#boxInfoSaldo').addClass('hidden');
            }else if(tipePengajuan == '2'){
                $('#txtNikPenarikan').trigger('change');

                $('#boxAnggotaBaru').addClass('hidden');
                $('#boxPenarikanSimpanan').removeClass('hidden');
                $('#boxPerubahanSimpanan').addClass('hidden');
                $('#boxPerubahanData').addClass('hidden');
                $('#boxPinjamanInsidentil').addClass('hidden');
                $('#boxPinjamanKoptel').addClass('hidden');
	            $('#boxSubmit').removeClass('hidden');
            }else if(tipePengajuan == '3'){
                $('#txtNikPerubahanSimpanan').trigger('change');

                $('#boxAnggotaBaru').addClass('hidden');
                $('#boxPenarikanSimpanan').addClass('hidden');
                $('#boxPerubahanSimpanan').removeClass('hidden');
                $('#boxPerubahanData').addClass('hidden');
                $('#boxPinjamanInsidentil').addClass('hidden');
                $('#boxPinjamanKoptel').addClass('hidden');
	            $('#boxSubmit').removeClass('hidden');
	            $('#boxInfoSaldo').addClass('hidden');
            }else if(tipePengajuan == '4'){
                $('#txtNikPerubahanData').trigger('change');

                $('#boxAnggotaBaru').addClass('hidden');
                $('#boxPenarikanSimpanan').addClass('hidden');
                $('#boxPerubahanSimpanan').addClass('hidden');
                $('#boxPerubahanData').removeClass('hidden');
                $('#boxPinjamanInsidentil').addClass('hidden');
                $('#boxPinjamanKoptel').addClass('hidden');
	            $('#boxSubmit').removeClass('hidden');
	            $('#boxInfoSaldo').addClass('hidden');
            }else if(tipePengajuan == '5'){
                $('#txtNikInsidentil').trigger('change');

                $('#boxAnggotaBaru').addClass('hidden');
                $('#boxPenarikanSimpanan').addClass('hidden');
                $('#boxPerubahanSimpanan').addClass('hidden');
                $('#boxPerubahanData').addClass('hidden');
                $('#boxPinjamanInsidentil').removeClass('hidden');
                $('#boxPinjamanKoptel').addClass('hidden');
	            $('#boxSubmit').removeClass('hidden');
	            $('#boxInfoSaldo').addClass('hidden');
            }else if(tipePengajuan == '6'){
                $('#txtNikKoptel').trigger('change');

                $('#boxAnggotaBaru').addClass('hidden');
                $('#boxPenarikanSimpanan').addClass('hidden');
                $('#boxPerubahanSimpanan').addClass('hidden');
                $('#boxPerubahanData').addClass('hidden');
                $('#boxPinjamanInsidentil').addClass('hidden');
                $('#boxPinjamanKoptel').removeClass('hidden');
	            $('#boxSubmit').removeClass('hidden');
	            $('#boxInfoSaldo').addClass('hidden');
            }else{
                disabledSend('false');
	            $('#boxSubmit').addClass('hidden');

                $('#boxAnggotaBaru').addClass('hidden');
                $('#boxPenarikanSimpanan').addClass('hidden');
                $('#boxPerubahanSimpanan').addClass('hidden');
                $('#boxPerubahanData').addClass('hidden');
                $('#boxPinjamanInsidentil').addClass('hidden');
                $('#boxPinjamanKoptel').addClass('hidden');
	            $('#boxInfoSaldo').addClass('hidden');
            }
		});
	    $('#tipePengajuan').trigger('change');
        /* end validasi tipe pengajuan */

        /* start format number */
		$('#txtSimpananpokok').on('input', function(){
			var value = $('#txtSimpananpokok').val();
			var convert = number_format(value,0,'','.');
			$("#txtSimpananpokok").val(convert);
		});
		$('#txtSimpanansukarela').on('input', function(){
			var value = $('#txtSimpanansukarela').val();
			var convert = number_format(value,0,'','.');
			$("#txtSimpanansukarela").val(convert);
		});
		$('#txtNominalpenarikan').on('input', function(){
			var value = $('#txtNominalpenarikan').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominalpenarikan").val(convert);
		});
		$('#txtSimpanansukarelaPerubahansimpanan').on('input', function(){
			var value = $('#txtSimpanansukarelaPerubahansimpanan').val();
			var convert = number_format(value,0,'','.');
			$("#txtSimpanansukarelaPerubahansimpanan").val(convert);
		});
		$('#txtSimpananpokokPerubahanData').on('input', function(){
			var value = $('#txtSimpananpokokPerubahanData').val();
			var convert = number_format(value,0,'','.');
			$("#txtSimpananpokokPerubahanData").val(convert);
		});
		$('#txtNominalpinjamaninsidentil').on('input', function(){
			var value = $('#txtNominalpinjamaninsidentil').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominalpinjamaninsidentil").val(convert);

			if(value !== ''){
				disabledSend('true');
			}else{
				disabledSend('false');
			}
		});
		$('#txtNominalpinjamankoptel').on('input', function(){
			var value = $('#txtNominalpinjamankoptel').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominalpinjamankoptel").val(convert);
		});
		$('#txtNominaltopupinsidentil').on('input', function () {
			var value = $('#txtNominaltopupinsidentil').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominaltopupinsidentil").val(convert);
			var cleanNominal = cleandot(convert);

			if(cleanNominal > 20000000){
				$("#txtNominaltopupinsidentil").val("");
				alert("Nominal tidak boleh lebih 20 juta");
				$('#submitTopupinsindetil').attr('disabled', true);
            }else{
				$('#submitTopupinsindetil').removeAttr('disabled', false);
            }
		});
		/* end format number */

        /* start topup insindentil */
        $("#formAddTopupinsidentil").on("submit", function () {
        	var txtNikInsidentil = $("#txtNikInsidentil").val();
        	var txtTopupinsidentilid = $("#txtTopupinsidentilid").val();
        	var nominal = $("#txtNominaltopupinsidentil").val();
        	var cleanNominal = cleandot(nominal);
        	var jw = $("#txtJwtopupinsidentil").val();

        	$.ajax({
        	    type: "POST",
        	    url: "<?php echo base_url().$this->router->fetch_class().'/ajaxrinciantopupinsidentil'?>",
        	    data: "nik="+txtNikInsidentil+"&topupid="+txtTopupinsidentilid+"&nominal="+cleanNominal+"&jw="+jw,
        	    success: function (data) {
        	        var respon = JSON.parse(data);
        	        if(respon['status'] == 'success'){
		                $('.topup').addClass('hidden');
		                $('.cancel-topup[data-topupid="'+txtTopupinsidentilid+'"]').removeClass('hidden');

                        $("#viewRinciantopupinsidentil").html(respon['view']);
                        $("#txtPinjamanid").val(respon['data']['pinjamanid']);
                        $("#txtPencairanInsidentil").val(number_format(respon['data']['baru']['pencairan'],0,'','.'));
		                $("#txtNominalpinjamaninsidentil").val(number_format(respon['data']['baru']['nominal'],0,'','.'));
		                $("#txtJangkawaktuinsidentil").val(respon['data']['baru']['jw']);

		                document.getElementById('txtNominalpinjamaninsidentil').setAttribute('readonly','true');
		                document.getElementById('txtJangkawaktuinsidentil').setAttribute('readonly','true');

		                disabledSend('true');

		                $("#modalAddTopup").modal("hide");
        	        }else{
		                disabledSend('false');
        	        	alert(respon['msg']);
        	        }
        	    }
        	});
        });
        /* end topup insindentil */
	});

	function setSimpananSukarela(nik) {
        var dataPost = 'nik='+nik;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('tpengajuan/simpanansukarela')?>",
            data: dataPost,
            success: function (data) {
                var respon = JSON.parse(data);
                if(respon['status'] == 'success'){
	                $('#wrapPerubahanSimpanan').removeClass('hidden');
	                $("#bandidperubahansimpanan").select2("val", respon['data']['bandid']);
	                $('.selectpicker').select2();

	                var numberFormatSukarela = number_format(respon['data']['simpanan_sukarela'],0,'','.');
	                $("#txtSimpanansukarelaPerubahansimpanan").val(numberFormatSukarela);
                }else{
	                $('#wrapPerubahanSimpanan').addClass('hidden');
	                $("#txtSimpanansukarelaPerubahansimpanan").val('');
                }
            }
        });
	}

	function setDataAnggota(nik) {
        var dataPost = 'nik='+nik;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('tpengajuan/dataanggota')?>",
            data: dataPost,
            success: function (data) {
                var respon = JSON.parse(data);
                if(respon['status'] == 'success'){
	                $('#wrapPerubahanDataAnggota').removeClass('hidden');

	                $("#txtNamaPerubahanData").val(respon['data']['name']);
	                var numberFormatSimpananPokok = number_format(respon['data']['simpanan_pokok'],0,'','.');
	                $("#txtSimpananpokokPerubahanData").val(numberFormatSimpananPokok);
	                $("#txtEmailPerubahanData").val(respon['data']['email']);
	                $("#txtDivisionPerubahanData").val(respon['data']['division']);
	                $("#txtSegmentPerubahanData").val(respon['data']['segment']);
	                $("#txtLocationPerubahanData").val(respon['data']['location']);
	                $("#txtTelpPerubahanData").val(respon['data']['telp']);
	                $("#txtBankPerubahanData").val(respon['data']['bank']);
	                $("#txtNorekPerubahanData").val(respon['data']['norek']);
	                $("#txtAtasnamaPerubahanData").val(respon['data']['atas_nama']);
                }else{
	                $('#wrapPerubahanDataAnggota').addClass('hidden');
	                $("#txtNamaPerubahanData").val('');
	                $("#txtSimpananpokokPerubahanData").val('');
	                $("#txtEmailPerubahanData").val('');
	                $("#txtDivisionPerubahanData").val('');
	                $("#txtSegmentPerubahanData").val('');
	                $("#txtLocationPerubahanData").val('');
	                $("#txtTelpPerubahanData").val('');
	                $("#txtBankPerubahanData").val('');
	                $("#txtNorekPerubahanData").val('');
	                $("#txtAtasnamaPerubahanData").val('');
                }
            }
        });
	}

	function cekSaldo(nik) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('tpengajuan/ajaxinfosaldo');?>",
            data: "nik="+nik,
            success: function (data) {
                var respon = JSON.parse(data);
                if(respon['status'] == 'success'){
                    $("#totalSaldoSimpanan").val(respon['data']['total_saldo_simpanan']);
                    $("#saldoTahunLalu").val(respon['data']['saldo_tahun_lalu']);
                }else{
                	alert(respon['msg'])
                }
            }
        });
	}

	function cekInsidentilAktif(nik) {
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('tpengajuan/ajaxinsidentilaktif')?>",
			data: "nik="+nik,
			success: function (data) {
				var respon = JSON.parse(data);
				if(respon['status'] == 'success'){
					$("#insidentilAktif").removeClass('hidden');
					$("#insidentilAktif").html(respon['view']);
				}else{
					$("#insidentilAktif").addClass('hidden');
				}
			}
		});
	}

	function disabledSend(param) {
		if(param == 'true'){
			$('#cmdsave').removeAttr('disabled', false);
		}else{
			$('#cmdsave').attr('disabled', true);
		}
	}

	function cleandot(number) {
		return number.replace(/\./g,'');
	}

	function number_format(number, decimals, decPoint, thousandsSep) {

		number = (number + '').replace(/[^0-9]/g, '');

		var n = !isFinite(+number) ? 0 : +number;

		var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);

		var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;

		var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;

		var s = '';

		var toFixedFix = function (n, prec) {

			var k = Math.pow(10, prec);

			return '' + (Math.round(n * k) / k).toFixed(prec);

		};

		s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

		if (s[0].length > 3) {

			s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);

		}

		if ((s[1] || '').length < prec) {

			s[1] = s[1] || '';

			s[1] += new Array(prec - s[1].length + 1).join('0');

		}
		return s.join(dec);
	}
</script>