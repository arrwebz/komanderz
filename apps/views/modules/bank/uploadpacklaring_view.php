<input type="hidden" name="packlaringid" value="<?php echo $detail['packlaringid'];?>"/>
<input type="hidden" name="codeold" value="<?php echo $detail['code'];?>"/>
<input type="hidden" name="pkgnum" value="<?php echo $detail['pkgnum'];?>"/>

<div class="form-group">
    <label>Code :</label>
    <input name="code" type="text" class="form-control" value="<?php echo $detail['code'];?>" readonly>
</div>
<div class="form-group">
    <label>Name :</label>
    <input name="name" type="text" class="form-control" value="<?php echo $detail['name'];?>" readonly>
</div>
<div class="form-group">
    <label>Upload Faktur Pajak:</label>
    <input id="txtFile" type="file" id="file" class="form-control">
</div>

<script>
	$(function(){
		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true
		});
    });
</script>