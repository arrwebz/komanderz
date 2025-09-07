<input type="hidden" name="pkstkbwid" value="<?php echo $detail['pkstkbwid'];?>"/>
<input type="hidden" name="codeold" value="<?php echo $detail['code'];?>"/>

<div class="form-group">
    <label>Code :</label>
    <input name="code" type="text" class="form-control" value="<?php echo $detail['code'];?>">
</div>
<div class="form-group">
    <label>Name :</label>
    <input name="name" type="text" class="form-control" value="<?php echo $detail['name'];?>">
</div>
<div class="form-group">
    <label>Jabatan :</label>
    <input name="position" type="text" class="form-control" value="<?php echo $detail['position'];?>">
</div>
<div class="form-group">
    <label>Place Of Birth :</label>
    <input name="pob" type="text" class="form-control" value="<?php echo $detail['pob'];?>">
</div>
<div class="form-group">
    <label>Date Of Birth :</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input name="dob" type="text" class="form-control datepicker" autocomplete="off" value="<?php echo $detail['dob'];?>">
    </div>
</div>
<div class="form-group">
    <label>Address :</label>
    <input name="address" type="text" class="form-control" value="<?php echo $detail['address'];?>">
</div>
<div class="form-group">
    <label>Segmen :</label>
    <input name="segmen" type="text" class="form-control" value="<?php echo $detail['segmen'];?>">
</div>
<div class="form-group">
    <label>Start of work :</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input name="start_work" type="text" class="form-control datepicker" autocomplete="off" value="<?php echo $detail['start_work'];?>">
    </div>
</div>
<div class="form-group">
    <label>End of work :</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input name="end_work" type="text" class="form-control datepicker" autocomplete="off" value="<?php echo $detail['end_work'];?>">
    </div>
</div>
<div class="form-group">
    <label>Gaji Dasar :</label>
    <input name="basic_sallary" type="text" class="form-control" value="<?php echo $detail['basic_sallary'];?>">
</div>
<div class="form-group">
    <label>Kompleksitas kerja :</label>
    <input name="work_complexity" type="text" class="form-control" value="<?php echo $detail['work_complexity'];?>">
</div>
<div class="form-group">
    <label>Lembur :</label>
    <input name="overtime" type="text" class="form-control" value="<?php echo $detail['overtime'];?>">
</div>
<div class="form-group">
    <label>Uang Makan & Transport :</label>
    <input name="meal_allowance" type="text" class="form-control" value="<?php echo $detail['meal_allowance'];?>">
</div>

<script>
	$(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true
		});
    });
</script>