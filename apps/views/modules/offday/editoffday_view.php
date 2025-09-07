<input type="hidden" name="offdayid" value="<?php echo $detail['offdayid'];?>"/>
<div class="form-group">
    <label>Name:</label>
    <input name="name" type="text" class="form-control" value="<?php echo $detail['name'];?>">
</div>
<div class="form-group">
    <label>Date:</label>
    <input name="date" type="text" class="form-control dateevent" autocomplete="off" value="<?php echo $detail['date'];?>">
</div>

<script>
    $(function () {
	    $('.dateevent').datepicker({
		    format: 'yyyy-mm-dd',
		    todayHighlight: true,
		    autoclose: true,
	    });
    });
</script>