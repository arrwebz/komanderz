<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small><?php echo $brand; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Aktiva Perusahaan</a></li>
        <li class="active">Ubah Aktiva</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Form ubah Aktiva.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php echo form_open_multipart('assets/edit', 'class = "form-horizontal"');?>
				<?php echo form_hidden('hdnAssetid',$assetid); ?>
				<?php echo form_hidden('hdnPhoto',$assetphoto); ?>
				<div class="form-group">
                  <label for="optType" class="col-sm-2 control-label">Jenis</label>

                  <div class="col-sm-3">
                    <select name="optType" class="form-control selectpicker">
							<option disabled selected>Pilih</option>
							<?php
							
							if(!empty($type)){
								foreach($type as $row){ 
									if (!empty($type) && $astypeid == $row['astypeid'] ) {
									$strselected = "selected";
									} else {
										$strselected = " ";
									}
									echo '<option value="'.$row['astypeid'].'"'. $strselected.'>'.$row['typename'].'</option>';
								}
							}else{
								echo '<option value="">Type not available</option>';
							}
						?> 
						</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="optBrand" class="col-sm-2 control-label">Merek</label>

                  <div class="col-sm-3">
                    <select name="optBrand" class="form-control selectpicker">
							<option disabled selected>Pilih</option>
							<?php
							
							if(!empty($brandname)){
								foreach($brandname as $row){ 
									if (!empty($brandname) && $brandid == $row['astbrandid'] ) {
									$strselected = "selected";
									} else {
										$strselected = " ";
									}
									echo '<option value="'.$row['astbrandid'].'"'. $strselected.'>'.$row['brandname'].'</option>';
								}
							}else{
								echo '<option value="">Brand not available</option>';
							}
						?> 
						</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="txtName" class="col-sm-2 control-label">Nama Aktiva</label>

                  <div class="col-sm-3">
                    <input name="txtName" type="text" class="form-control" value="<?php echo $assetname; ?>">
                  </div>
                </div>
				<div class="form-group">
                  <label for="txtSeries" class="col-sm-2 control-label">Seri</label>

                  <div class="col-sm-3">
                    <input name="txtSeries" type="text" class="form-control" value="<?php echo $seri; ?>">
                  </div>
                </div>
				<div class="form-group">
                  <label for="txtSpecs" class="col-sm-2 control-label">Spesifikasi</label>

                  <div class="col-sm-6">
                    <textarea name="txtSpecs" type="text" class="form-control"><?php echo $spec; ?></textarea>
                  </div>
                </div>
				<div class="form-group">
                  <label for="txtSerialnum" class="col-sm-2 control-label">Nomor Seri</label>

                  <div class="col-sm-3">
                    <input name="txtSerialnum" type="text" class="form-control" value="<?php echo $serialnumber; ?>">
                  </div>
                </div>
				<div class="form-group">
                  <label for="optColor" class="col-sm-2 control-label">Warna</label>

                  <div class="col-sm-3">
                    
						 <select name="optColor" class="form-control selectpicker">
								 <option disabled selected>Pilih</option>
								 <option value="hitam" <?php if($color == 'hitam') echo 'selected' ?>>Hitam</option>
								 <option value="putih"  <?php if($color == 'putih') echo 'selected' ?>>Putih</option>
								 <option value="abu-abu"  <?php if($color == 'abu-abu') echo 'selected' ?>>Abu-abu</option>
								 <option value="silver"  <?php if($color == 'silver') echo 'selected' ?>>Silver</option>
								 <option value="gold"  <?php if($color == 'gold') echo 'selected' ?>>Gold</option>
								 <option value="merah"  <?php if($color == 'merah') echo 'selected' ?>>Merah</option>
								 <option value="biru"  <?php if($color == 'biru') echo 'selected' ?>>Biru</option>
						 </select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="optCondition" class="col-sm-2 control-label">Kondisi</label>

                  <div class="col-sm-3">
                    
						 <select name="optCondition" class="form-control selectpicker">
								 <option disabled selected>Pilih</option>
								 <option value="bagus" <?php if($condition == 'bagus') echo 'selected' ?>>Bagus</option>
								 <option value="normal" <?php if($condition == 'normal') echo 'selected' ?>>Normal</option>
								 <option value="rusak" <?php if($condition == 'rusak') echo 'selected' ?>>Rusak</option>
						 </select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="txtAssetdate" class="col-sm-2 control-label">Tahun</label>

                  <div class="col-sm-3">
                    <input name="txtAssetdate" type="text" class="form-control" value="<?php echo $assetdate; ?>">
                  </div>
                </div>
				<div class="form-group">
                  <label for="txtPrice" class="col-sm-2 control-label">Harga</label>

                  <div class="col-sm-3">
                    <input id="idr" name="txtPrice" type="text" class="form-control" value="<?php echo $price; ?>">
                  </div>
                </div>
				<div class="form-group">
                <label for="txtPricedate" class="col-sm-2 control-label">Tanggal Beli</label>
				
				<div class="col-sm-3">
					<div class="input-group date">
					  <input type="text" name="txtPricedate" class="form-control pull-right datepicker" value="<?php echo $purchasedate; ?>">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					</div>
				</div>	
                <!-- /.input group -->
				</div>
				<div class="form-group">
                <label for="txtWarranty" class="col-sm-2 control-label">Garansi</label>
				
				<div class="col-sm-3">
					<div class="input-group date">
					  <input type="text" name="txtWarranty" class="form-control" value="<?php echo $warranty; ?>">
					  <div class="input-group-addon">
						<i>Bulan</i>
					  </div>
					</div>
				</div>	
                <!-- /.input group -->
				</div>
				<div class="form-group">
                <label for="txtAmount" class="col-sm-2 control-label">Jumlah</label>
				
				<div class="col-sm-3">
					<div class="input-group date">
					  <input type="text" name="txtAmount" class="form-control" value="<?php echo $amount; ?>">
					  <div class="input-group-addon">
						<i>Buah</i>
					  </div>
					</div>
				</div>	
                <!-- /.input group -->
				</div>
				<div class="form-group">
                  <label for="txtUser" class="col-sm-2 control-label">Pengguna</label>

                  <div class="col-sm-3">
                    <input name="txtUser" type="text" class="form-control" value="<?php echo $client; ?>">
                  </div>
                </div>
				<div class="form-group">
                  <label for="optLocation" class="col-sm-2 control-label">Lokasi</label>

                  <div class="col-sm-3">
                    
						 <select name="optLocation" class="form-control selectpicker">
								 <option disabled selected>Pilih</option>
								 <option value="spinindo building" <?php if($location == 'spinindo building') echo 'selected' ?>>Spinindo Building</option>
								 <option value="spinindo building" <?php if($location == 'network plus') echo 'selected' ?>>Network Plus</option>
								 <option value="menara multimedia" <?php if($location == 'menara multimedia') echo 'selected' ?>>Menara Multimedia</option>
						 </select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="txtNotes" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-6">
                    <textarea name="txtNotes" type="text" class="form-control"><?php echo $notes; ?></textarea>
                  </div>
                </div>
				<div class="form-group">
                  <label for="txtPhoto" class="col-sm-2 control-label">Gambar</label>

                  <div class="col-sm-6">
                    <input type="file" name="txtPhoto" class="form-control-file">
					<span class="help-block"><?php echo form_error('txtPhoto'); ?>
						<?php echo $this->session->flashdata('error_doupload');?></span>
                  </div>
                </div>
				<div class="form-group">
                  <label for="optStatus" class="col-sm-2 control-label">Status Aktiva</label>

                  <div class="col-sm-3">
                    
						 <select name="optStatus" class="form-control selectpicker">
								 <option disabled selected>Pilih</option>
								 <option value="0" <?php if($status == '0') echo 'selected' ?>>Rusak</option>
								 <option value="1" <?php if($status == '1') echo 'selected' ?>>Tersedia</option>
								 <option value="2" <?php if($status == '2') echo 'selected' ?>>Dipakai</option>
								 <option value="3" <?php if($status == '3') echo 'selected' ?>>Terjual</option>
						 </select>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
			<div class="box-footer">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
				<button type="submit" name="cmdsave" class="btn btn-success pull-right">Selesai</button> 
				<?php echo form_close();?>	
              </div>
			<!-- /.box-footer -->  
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
					 
	$(document).ready(function() {
		$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
						
		$('.selectpicker').select2();
		
		$('#idr').on('input', function(){

			var value = $('#idr').val(); 

			var convert = number_format(value,0,'','.');

			$("#idr").val(convert); 

		});

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
	});
	</script>