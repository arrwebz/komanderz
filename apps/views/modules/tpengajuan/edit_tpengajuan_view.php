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
            <?php echo form_open_multipart('tpengajuan/editpengajuan','id = "formvalidation"');?>
            <input type="hidden" name="txtPengajuanid" value="<?php echo $pengajuan[0]['pengajuanid'];?>"/>
            <input type="hidden" name="optTipepengajuan" value="<?php echo $pengajuan[0]['tipe_pengajuan'];?>"/>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pengajuan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tipe Pengajuan</label>
                            <select id="tipePengajuan" name="optTipepengajuan" class="form-control selectpicker" disabled>
                                <option value="">Pilih</option>
                                <option value="1" <?php if($pengajuan[0]['tipe_pengajuan'] == '1'){ echo 'selected'; }?>>Anggota Baru</option>
                                <option value="2" <?php if($pengajuan[0]['tipe_pengajuan'] == '2'){ echo 'selected'; }?>>Penarikan Simpanan</option>
                                <option value="3" <?php if($pengajuan[0]['tipe_pengajuan'] == '3'){ echo 'selected'; }?>>Perubahan Simpanan</option>
                                <option value="4" <?php if($pengajuan[0]['tipe_pengajuan'] == '4'){ echo 'selected'; }?>>Perubahan Data</option>
                                <option value="5" <?php if($pengajuan[0]['tipe_pengajuan'] == '5'){ echo 'selected'; }?>>Pinjaman Insidentil</option>
                                <option value="6" <?php if($pengajuan[0]['tipe_pengajuan'] == '6'){ echo 'selected'; }?>>Pinjaman Koptel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nomor Pengajuan</label>
                            <input name="txtNomorPengajuan" type="text" class="form-control" value="<?php echo $pengajuan[0]['nomor_pengajuan'];?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pengajuan</label>
                            <input name="txtTanggalpengajuan" type="text" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($pengajuan[0]['tanggal_pengajuan']));?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- START ANGGOTA BARU -->
                <div id="boxAnggotaBaru" class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Anggota Baru</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input id="txtNikBaru" name="txtNikBaru" type="text" class="form-control" value="<?php echo $pengajuan[0]['nik'];?>">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="txtNama" type="text" class="form-control" value="<?php echo $pengajuan[0]['nama'];?>">
                        </div>
                        <div class="form-group">
                            <label>Simpanan Pokok</label>
                            <input id="txtSimpananpokok" name="txtSimpananpokok" type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['simpanan_pokok'])),3)));?>">
                        </div>
                        <div class="form-group">
                            <label>Band</label>
                            <select id="bandidanggotabaru" name="bandidanggotabaru" class="form-control selectpicker">
                                <?php for($i=0; $i<count($band); $i++):
                                        $selected = '';
                                        if($band[$i]['bandid'] == $pengajuan[0]['bandid']){
                                            $selected = 'selected';
                                        }
                                    ?>
                                    <option value="<?php echo $band[$i]['bandid'];?>" <?php echo $selected; ?>><?php echo '<b>'.$band[$i]['band_name'].'</b> ( Rp. '.strrev(implode('.',str_split(strrev(strval($band[$i]['band_value'])),3))).' )';?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Simpanan Sukarela</label>
                            <input id="txtSimpanansukarela" name="txtSimpanansukarela" type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['simpanan_sukarela'])),3)));?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="txtEmail" type="text" class="form-control" value="<?php echo $pengajuan[0]['email'];?>">
                        </div>
                        <div class="form-group">
                            <label>Division</label>
                            <input name="txtDivision" type="text" class="form-control" value="<?php echo $pengajuan[0]['division'];?>">
                        </div>
                        <div class="form-group">
                            <label>Segment</label>
                            <input name="txtSegment" type="text" class="form-control" value="<?php echo $pengajuan[0]['segment'];?>">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input name="txtLocation" type="text" class="form-control" value="<?php echo $pengajuan[0]['location'];?>">
                        </div>
                        <div class="form-group">
                            <label>Telp</label>
                            <input name="txtTelp" type="text" class="form-control" value="<?php echo $pengajuan[0]['telp'];?>">
                        </div>
                        <div class="form-group">
                            <label>Bank</label>
                            <input name="txtBank" type="text" class="form-control" value="<?php echo $pengajuan[0]['bank'];?>">
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input name="txtNorek" type="text" class="form-control" value="<?php echo $pengajuan[0]['norek'];?>">
                        </div>
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input name="txtAtasnama" type="text" class="form-control" value="<?php echo $pengajuan[0]['atas_nama'];?>">
                        </div>
                        <div class="form-group">
                            <label>File Anggota Baru (pdf/word)</label>
                            <input name="txtFileanggotabaru" type="file" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- END ANGGOTA BARU -->

                <!-- START PENARIKAN SIMPANAN -->
                <div id="boxPenarikanSimpanan" class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Penarikan Simpanan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <select id="txtNikPenarikan" name="txtNikPenarikan" class="form-control selectpicker">
                                <?php if(!empty($nik)): ?>
                                    <?php foreach($nik as $rowNik):
                                        $selected = '';    
                                        if($rowNik['nik'] == $pengajuan[0]['nik']){
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $rowNik['nik'];?>" <?php echo $selected;?>><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bank</label>
                            <input name="txtBankPenarikan" type="text" class="form-control" value="<?php echo $pengajuan[0]['bank'];?>">
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input name="txtNorekPenarikan" type="text" class="form-control" value="<?php echo $pengajuan[0]['norek'];?>">
                        </div>
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input name="txtAtasnamaPenarikan" type="text" class="form-control" value="<?php echo $pengajuan[0]['atas_nama'];?>">
                        </div>
                        <div class="form-group">
                            <label>Tipe Penarikan</label>
                            <select id="txtTipepenarikan" name="txtTipepenarikan" class="form-control selectpicker">
                                <option value="1" <?php if($pengajuan[0]['tipe_penarikan'] == '1'){ echo 'selected'; }?>>Simpanan</option>
                                <option value="2" <?php if($pengajuan[0]['tipe_penarikan'] == '2'){ echo 'selected'; }?>>Pensiun</option>
                                <option value="3" <?php if($pengajuan[0]['tipe_penarikan'] == '3'){ echo 'selected'; }?>>Keluar Anggota</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nominal Penarikan</label>
                            <input id="txtNominalpenarikan" name="txtNominalpenarikan" type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['nominal_penarikan'])),3)));?>">
                        </div>
                    </div>
                </div>
                <!-- END PENARIKAN SIMPANAN -->

                <!-- START PERUBAHAN SIMPANAN -->
                <div id="boxPerubahanSimpanan" class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Perubahan Simpanan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <select id="txtNikPerubahanSimpanan" name="txtNikPerubahanSimpanan" class="form-control selectpicker">
                                <?php if(!empty($nik)): ?>
                                    <?php foreach($nik as $rowNik):
                                        $selected = '';
                                        if($rowNik['nik'] == $pengajuan[0]['nik']){
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $rowNik['nik'];?>" <?php echo $selected;?>><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div id="wrapPerubahanSimpanan" class="">
                            <div class="form-group">
                                <label>Band</label>
                                <select id="bandidperubahansimpanan" name="bandidperubahansimpanan" class="form-control selectpicker">
                                    <?php for($i=0; $i<count($band); $i++):
                                        $selected = '';
                                        if($band[$i]['bandid'] == $pengajuan[0]['bandid']){
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $band[$i]['bandid'];?>" <?php echo $selected; ?>><?php echo '<b>'.$band[$i]['band_name'].'</b> ( Rp. '.strrev(implode('.',str_split(strrev(strval($band[$i]['band_value'])),3))).' )';?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Simpanan Sukarela</label>
                                <input id="txtSimpanansukarelaPerubahansimpanan" name="txtSimpanansukarelaPerubahansimpanan" type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['simpanan_sukarela'])),3)));?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PERUBAHAN SIMPANAN -->

                <!-- START PERUBAHAN DATA -->
                <div id="boxPerubahanData" class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Perubahan Data</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <select id="txtNikPerubahanData" name="txtNikPerubahanData" class="form-control selectpicker">
                                <?php if(!empty($nik)): ?>
                                    <?php foreach($nik as $rowNik):
                                        $selected = '';
                                        if($rowNik['nik'] == $pengajuan[0]['nik']){
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $rowNik['nik'];?>" <?php echo $selected;?>><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div id="wrapPerubahanDataAnggota" class="">
                            <div class="form-group">
                                <label>Nama</label>
                                <input id="txtNamaPerubahanData" name="txtNamaPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['nama'];?>">
                            </div>
                            <div class="form-group">
                                <label>Simpanan Pokok</label>
                                <input id="txtSimpananpokokPerubahanData" name="txtSimpananpokokPerubahanData" type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['simpanan_pokok'])),3)));?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input id="txtEmailPerubahanData" name="txtEmailPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['email'];?>">
                            </div>
                            <div class="form-group">
                                <label>Division</label>
                                <input id="txtDivisionPerubahanData" name="txtDivisionPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['division'];?>">
                            </div>
                            <div class="form-group">
                                <label>Segment</label>
                                <input id="txtSegmentPerubahanData" name="txtSegmentPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['segment'];?>">
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input id="txtLocationPerubahanData" name="txtLocationPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['location'];?>">
                            </div>
                            <div class="form-group">
                                <label>Telp</label>
                                <input id="txtTelpPerubahanData" name="txtTelpPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['telp'];?>">
                            </div>
                            <div class="form-group">
                                <label>Bank</label>
                                <input id="txtBankPerubahanData" name="txtBankPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['bank'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input id="txtNorekPerubahanData" name="txtNorekPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['norek'];?>">
                            </div>
                            <div class="form-group">
                                <label>Atas Nama</label>
                                <input id="txtAtasnamaPerubahanData" name="txtAtasnamaPerubahanData" type="text" class="form-control" value="<?php echo $pengajuan[0]['atas_nama'];?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PERUBAHAN DATA -->

                <!-- START PINJAMAN INSIDENTIL -->
                <div id="boxPinjamanInsidentil" class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pinjaman Insidentil</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <select id="txtNikInsidentil" name="txtNikInsidentil" class="form-control selectpicker">
                                <?php if(!empty($nik)): ?>
                                    <?php foreach($nik as $rowNik):
                                        $selected = '';
                                        if($rowNik['nik'] == $pengajuan[0]['nik']){
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?php echo $rowNik['nik'];?>" <?php echo $selected;?>><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bank</label>
                            <input name="txtBankInsidentil" type="text" class="form-control" value="<?php echo $pengajuan[0]['bank'];?>">
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input name="txtNorekInsidentil" type="text" class="form-control" value="<?php echo $pengajuan[0]['norek'];?>">
                        </div>
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input name="txtAtasnamaInsidentil" type="text" class="form-control" value="<?php echo $pengajuan[0]['atas_nama'];?>">
                        </div>
                        <div class="form-group">
                            <label>Nominal Insidentil</label>
                            <input id="txtNominalpinjamaninsidentil" name="txtNominalpinjamaninsidentil" type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['nominal_pinjaman_insidentil'])),3)));?>">
                        </div>
                        <div class="form-group">
                            <label>Jangka Waktu</label>
                            <input name="txtJangkawaktuinsidentil" type="text" class="form-control" value="<?php echo $pengajuan[0]['jangka_waktu_insidentil'];?>">
                        </div>
                        <div class="form-group">
                            <label>File Pinjaman Insidentil (pdf/word)</label>
                            <input name="txtFileinsidentil" type="file" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- END PINJAMAN INSIDENTIL -->

                <!-- START PINJAMAN KOPTEL -->
                <div id="boxPinjamanKoptel" class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pinjaman Koptel</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label>NIK</label>
                                <select id="txtNikKoptel" name="txtNikKoptel" class="form-control selectpicker">
                                    <?php if(!empty($nik)): ?>
                                        <?php foreach($nik as $rowNik):
                                            $selected = '';
                                            if($rowNik['nik'] == $pengajuan[0]['nik']){
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?php echo $rowNik['nik'];?>" <?php echo $selected;?>><?php echo '<b>'.$rowNik['nik'].'</b> - '.strtoupper($rowNik['name']);?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bank</label>
                                <input name="txtBankKoptel" type="text" class="form-control" value="<?php echo $pengajuan[0]['bank'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input name="txtNorekKoptel" type="text" class="form-control" value="<?php echo $pengajuan[0]['norek'];?>">
                            </div>
                            <div class="form-group">
                                <label>Atas Nama</label>
                                <input name="txtAtasnamaKoptel" type="text" class="form-control" value="<?php echo $pengajuan[0]['atas_nama'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nominal Koptel</label>
                                <input id="txtNominalpinjamankoptel" name="txtNominalpinjamankoptel" type="text" class="form-control" value="<?php echo strrev(implode('.',str_split(strrev(strval($pengajuan[0]['nominal_pinjaman_koptel'])),3)));?>">
                            </div>
                            <div class="form-group">
                                <label>Jangka Waktu</label>
                                <input name="txtJangkawaktukoptel" type="text" class="form-control" value="<?php echo $pengajuan[0]['jangka_waktu_koptel'];?>">
                            </div>
                            <div class="form-group">
                                <label>File Pinjaman Insidentil (pdf/word)</label>
                                <input name="txtFilekoptel" type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PINJAMAN KOPTEL -->
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

		$('.datepicker').datepicker({
			defaultDate: new Date(),
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true
		});

		/* start validasi nik */
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
			}else if(tipePengajuan == '2'){
				$('#txtNikPenarikan').trigger('change');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').removeClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '3'){
				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').removeClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '4'){
				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').removeClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '5'){
				$('#txtNikInsidentil').trigger('change');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').removeClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
			}else if(tipePengajuan == '6'){
				$('#txtNikKoptel').trigger('change');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').removeClass('hidden');
			}else{
				disabledSend('false');

				$('#boxAnggotaBaru').addClass('hidden');
				$('#boxPenarikanSimpanan').addClass('hidden');
				$('#boxPerubahanSimpanan').addClass('hidden');
				$('#boxPerubahanData').addClass('hidden');
				$('#boxPinjamanInsidentil').addClass('hidden');
				$('#boxPinjamanKoptel').addClass('hidden');
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
		});
		$('#txtNominalpinjamankoptel').on('input', function(){
			var value = $('#txtNominalpinjamankoptel').val();
			var convert = number_format(value,0,'','.');
			$("#txtNominalpinjamankoptel").val(convert);
		});
		/* end format number */

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

	function disabledSend(param) {
		if(param == 'true'){
			$('#cmdsave').removeAttr('disabled', false);
		}else{
			$('#cmdsave').attr('disabled', true);
		}
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