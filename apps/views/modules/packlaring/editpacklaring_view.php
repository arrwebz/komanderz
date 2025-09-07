<input type="hidden" name="packlaringid" value="<?php echo $detail['packlaringid'];?>"/>
<input type="hidden" name="codeold" value="<?php echo $detail['code'];?>"/>

<div class="form-group mb-3">
    <label>Code :</label>
    <input name="code" type="text" class="form-control" value="<?php echo $detail['code'];?>">
</div>
<div class="form-group mb-3">
    <label>Packlaring Number :</label>
    <input name="pkgnum" type="text" class="form-control" value="<?php echo $detail['pkgnum'];?>">
</div>
<div class="form-group mb-3">
    <label>Name :</label>
    <input name="name" type="text" class="form-control" value="<?php echo $detail['name'];?>">
</div>
<div class="form-group mb-3">
    <label>Place Of Birth :</label>
    <input name="pob" type="text" class="form-control" value="<?php echo $detail['pob'];?>">
</div>
<div class="form-group mb-3">
    <label>Date Of Birth :</label>
    <div class="input-group">
        <div class="input-group-text">
            <i class="ti ti-calendar"></i>
        </div>
        <input name="dob" type="text" class="form-control datepicker" autocomplete="off" value="<?php echo date('d-m-Y', strtotime($detail['dob']));?>">
    </div>
</div>
<div class="form-group mb-3">
    <label>Address :</label>
    <input name="address" type="text" class="form-control" value="<?php echo $detail['address'];?>">
</div>
<div class="form-group mb-3">
    <label>Start of work :</label>
    <div class="input-group">
        <div class="input-group-text">
            <i class="ti ti-calendar"></i>
        </div>
        <input name="start_work" type="text" class="form-control datepicker" autocomplete="off" value="<?php echo date('d-m-Y', strtotime($detail['start_work']));?>">
    </div>
</div>
<div class="form-group mb-3">
    <label>End of work :</label>
    <div class="input-group">
        <div class="input-group-text">
            <i class="ti ti-calendar"></i>
        </div>
        <input name="end_work" type="text" class="form-control datepicker" autocomplete="off" value="<?php echo date('d-m-Y', strtotime($detail['end_work']));?>">
    </div>
</div>
<div class="form-group mb-3">
    <label>Notes :</label>
    <input name="notes" type="text" class="form-control" value="<?php echo $detail['notes'];?>">
</div>

<script>
	$(function(){
    });
</script>