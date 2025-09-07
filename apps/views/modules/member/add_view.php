<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class = "form-horizontal">
							<div class="card-header card-header-icon" data-background-color="red">
								<i class="material-icons">photo_album</i>
							</div>
							<div class="card-content">
								<h4 class="card-title">Form Keanggotaan</h4>
						   </div>						 
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="red">
						<i class="material-icons">account_box</i>
					</div>
					<div class="card-content">
					<?php echo form_open_multipart('member/add', 'class = "form-horizontal"');?>
						<h4 class="card-title">Detail Anggota</h4> 
							<div class="form-group label-floating">
								<label class="control-label">NIK</label>
								<input name="txtNIK" type="text" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Nama Lengkap</label>
								<input name="txtName" type="text" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Divisi</label>
								<select name="optDivision" id="optDivision" class="form-control selectpicker" >
									<option disabled selected>Pilih Divisi</option>
									<?php	
											
										if(!empty($division)){
											foreach($division as $row){ 
												if (!empty($divisi) && $divisi == $row['divisionid'] ) {
													$strselected = "selected";
												} else {
													$strselected = " ";
												}
												echo '<option value="'.$row['divisionid'].'"'. $strselected .'>'.$row['code'].'</option>';
											}
										}else{
											echo '<option value="">Division not available</option>';
										}
									?> 
								</select>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Segmen</label>
								<select name="optSegment" class="form-control selectpicker">
									<option disabled selected>Pilih Segmen</option>
									<?php
									
									if(!empty($segment)){
										foreach($segment as $row){ 
											if (!empty($segmen) && $segmen == $row['segmentid'] ) {
											$strselected = "selected";
											} else {
												$strselected = " ";
											}
											echo '<option value="'.$row['segmentid'].'"'. $strselected.'>'.$row['code'].'</option>';
										}
									}else{
										echo '<option value="">Segment not available</option>';
									}
								?> 
								</select>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Lokasi</label>
								<select name="optLoc" class="form-control selectpicker">
										 <option disabled selected>Pilih Lokasi</option>
										 <option value="DKI JAKARTA">DKI JAKARTA</option>
										 <option value="BANDUNG">BANDUNG</option>
								 </select>
							</div>	
							<div class="form-group label-floating">
								<label class="control-label">Band</label>
								<select name="optBand" class="form-control selectpicker">
									<option disabled selected>Pilih Band</option>
									<?php
									
									if(!empty($memberband)){
										foreach($memberband as $row){ 
											if (!empty($band) && $band == $row['bandid'] ) {
											$strselected = "selected";
											} else {
												$strselected = " ";
											}
											echo '<option value="'.$row['bandid'].'"'. $strselected.'>'.$row['bandname'].'</option>';
										}
									}else{
										echo '<option value="">Band not available</option>';
									}
								?> 
								</select>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Status Aktif</label>
								<select name="optStatus" class="form-control selectpicker">
										 <option disabled selected>Pilih Status Aktif</option>
										 <option value="0">TIDAK</option>
										 <option value="1">YA</option>
								 </select>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Keterangan</label>
								<select name="optNote" class="form-control selectpicker">
										 <option disabled selected>Pilih Keterangan</option>
										 <option value="DIPEKERJAKAN">DIPEKERJAKAN</option>
										 <option value="PENSIUN">PENSIUN</option>
								 </select>
							</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="red">
						<i class="material-icons">priority_high</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Informasi</h4>	
							<div class="form-group label-floating">
								<label class="control-label">Simpanan Pokok</label>
								<input name="txtBasicvalue" type="number" class="form-control" value="100000">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Simpanan Wajib</label>
								<select name="optOblvalue" class="form-control selectpicker">
									<option disabled selected>Pilih Simpanan Wajib</option>
									<?php
									
									if(!empty($memberband)){
										foreach($memberband as $row){ 
											if (!empty($band) && $band == $row['bandvalue'] ) {
											$strselected = "selected";
											} else {
												$strselected = " ";
											}
											echo '<option value="'.$row['bandvalue'].'"'. $strselected.'>'.$row['bandname'].' - '.$row['bandvalue'].'</option>';
										}
									}else{
										echo '<option value="">Band not available</option>';
									}
								?> 
								</select>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Simpanan Sukarela</label>
								<input name="txtVolvalue" type="number" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Tanggal Bergabung</label>
								<input name="txtJoindate" type="text" class="form-control datepicker">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Telp</label>
								<input name="txtTelp" type="number" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Email</label>
								<input name="txtEmail" type="text" class="form-control">
							</div>						
							<div class="form-group label-floating">
								<label class="control-label">No. Rekening</label>
								<input name="txtAccnum" type="text" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Bank</label>
								<select name="optBank" class="form-control selectpicker" onchange="check(this);">
									<option disabled selected>Pilih Bank</option>
									<option value="bca">BCA</option>
									<option value="mandiri">MANDIRI</option>
									<option value="bni">BNI</option>
									<option value="bri">BRI</option>
									<option value="other">LAINNYA...</option>
								</select>
							</div>
							<div class="form-group label-floating" id="otherid" style="display: none;">
								<label class="control-label">Bank Lainnya</label>
								<input name="txtBankother" type="text" class="form-control">
							</div>
					</div>
				</div>
			</div>   
									
			<br/><br/><br/>
			&nbsp;&nbsp;&nbsp;
			<button type="submit" name="cmdsave" class="btn btn-fill btn-danger">Submit</button>
			&nbsp;
			<button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>member';return false;">Back</button>
	<?php echo form_close();?>				
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.selectpicker').select2();
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {	 
			 $('.datepicker').datepicker({
				format: 'dd-mm-yyyy',
				autoclose: true,
				todayHighlight: true});
			 });
	function check(bank) {
				if (bank.value == "other") {
					document.getElementById("otherid").style.display = "block";
				} else {
					document.getElementById("otherid").style.display = "none";
				}
			}
</script>