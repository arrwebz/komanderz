<input type="hidden" name="letterid" value="<?php echo $detail['letterid'];?>"/>
<input type="hidden" name="codeold" value="<?php echo $detail['code'];?>"/>
<input type="hidden" name="type" value="<?php echo $detail['type'];?>"/>
<div class="form-group">
    <label>Kode :</label>
    <input name="code" type="text" class="form-control" value="<?php echo $detail['code'];?>" readonly>
</div>
<div class="control-group mb-15">
    <label>Type :</label>
    <select id="typeEdit" name="type" class="form-control selectpicker" data-width="100%">
        <!-- merubah type dapat membuat nomor code duplicate -->
        <option value="">Pilih</option>
        <option value="INT" <?php if($detail['type'] == 'INT'){ echo 'selected'; }?>>Internal</option>
        <option value="EXT" <?php if($detail['type'] == 'EXT'){ echo 'selected'; }?>>External</option>
    </select>
</div>
<div class="form-group">
    <label>Initial :</label>
    <input name="initial" type="text" class="form-control" value="<?php echo $detail['initial'];?>">
</div>
<div class="form-group">
    <label>Subject :</label>
    <input name="subject" type="text" class="form-control" value="<?php echo $detail['subject'];?>">
</div>
<div class="control-group mb-15">
    <label>Unit :</label>
    <select name="unit" class="form-control selectpicker" data-width="100%">
        <option value="">Pilih</option>
        <option value="KOMET" <?php if($detail['unit'] == 'KOMET'){ echo 'selected'; }?>>KOMET</option>
        <option value="MESRA" <?php if($detail['unit'] == 'MESRA'){ echo 'selected'; }?>>MESRA</option>
        <option value="PADI" <?php if($detail['unit'] == 'PADI'){ echo 'selected'; }?>>PADI</option>
    </select>
</div>
<div class="control-group mb-15">
    <label>Div Komet :</label>
    <select name="divkomet" class="form-control selectpicker" data-width="100%">
        <option value="">Pilih</option>
        <option value="PENGURUS" <?php if($detail['divkomet'] == 'PENGURUS'){ echo 'selected'; }?>>PENGURUS</option>
        <option value="CORSEC" <?php if($detail['divkomet'] == 'CORSEC'){ echo 'selected'; }?>>CORSEC</option>
        <option value="FINCO" <?php if($detail['divkomet'] == 'FINCO'){ echo 'selected'; }?>>FINCO</option>
        <option value="MARSAL" <?php if($detail['divkomet'] == 'MARSAL'){ echo 'selected'; }?>>MARSAL</option>
    </select>
</div>
<div class="control-group mb-15">
    <label>Month :</label>
    <select name="month" class="form-control selectpicker" data-width="100%">
        <option value="">Pilih</option>
        <option value="januari" <?php if($detail['month'] == 'januari'){ echo 'selected'; }?>>Januari</option>
        <option value="februari" <?php if($detail['month'] == 'februari'){ echo 'selected'; }?>>Februari</option>
        <option value="maret" <?php if($detail['month'] == 'maret'){ echo 'selected'; }?>>Maret</option>
        <option value="april" <?php if($detail['month'] == 'april'){ echo 'selected'; }?>>April</option>
        <option value="mei" <?php if($detail['month'] == 'mei'){ echo 'selected'; }?>>Mei</option>
        <option value="juni" <?php if($detail['month'] == 'juni'){ echo 'selected'; }?>>Juni</option>
        <option value="juli" <?php if($detail['month'] == 'juli'){ echo 'selected'; }?>>Juli</option>
        <option value="agustus" <?php if($detail['month'] == 'agustus'){ echo 'selected'; }?>>Agustus</option>
        <option value="september" <?php if($detail['month'] == 'september'){ echo 'selected'; }?>>September</option>
        <option value="oktober" <?php if($detail['month'] == 'oktober'){ echo 'selected'; }?>>Oktober</option>
        <option value="november" <?php if($detail['month'] == 'november'){ echo 'selected'; }?>>November</option>
        <option value="desember" <?php if($detail['month'] == 'desember'){ echo 'selected'; }?>>Desember</option>
    </select>
</div>
<div class="control-group mb-15 mb-15">
    <label>Year :</label>
    <select name="year" class="form-control selectpicker" data-width="100%">
        <option value="">Pilih</option>
        <?php $start_year = '2022';?>
        <?php $end_year = (date('Y')+2);?>
        <?php for($i=$start_year; $i<$end_year; $i++): ?>
            <option value="<?php echo $i;?>" <?php if($detail['year'] == $i){ echo 'selected'; }?>><?php echo $i;?></option>
        <?php endfor; ?>
    </select>
</div>


<script>
	$(function() {
		$('.selectpicker').select2();
		$("#typeEdit").select2({disabled:'readonly'});
	});
</script>