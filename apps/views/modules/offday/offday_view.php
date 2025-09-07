<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9"> 
                <h4 class="fw-semibold mb-8">Settings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('user');?>">Public Holiday</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Cog.png" alt="" class="img-fluid mb-n4">
                </div>
            </div> 
        </div>
    </div>
</div> 

<style>
    .fc-title{
        font-weight: normal;
    }
    .list-offday{
        list-style-type: none;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        padding: 0px;
    }
    .list-offday>li{
        width: 295px;
    }
</style>
<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <button class="btn btn-sm btn-success" style="margin:10px;" data-target="#modalAddEvent" data-toggle="modal" >
                            + Add Event
                        </button>
                    </div>
                    <div class="panel-body">
                        <div id="calendarIO"></div>

                        <div class="col-md-12" style="margin-top:30px;">
                            <div class="box-title">
                                <strong><i class="fa fa-calendar"></i> Libur Tahun <?php echo date('Y');?> :</strong>
                            </div>
                            <ul class="list-offday">
                                <?php foreach ($offdayyear as $row): ?>
                                    <li>
                                        <span class="label label-danger dz-size">&nbsp;</span>
                                        <?php echo $row['title'];?>, <?php echo date('d-m-Y', strtotime($row['end']));?>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- START MODAL ADD EVENT -->
<div id="modalAddEvent" class="modal fade" aria-hidden="true" aria-labelledby="modalAddEvent" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="exampleOptionalLarge">Event</h4>
            </div>
                <form id="formAddEvent" action="javascript:" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date:</label>
                        <input name="date" type="text" class="form-control dateevent" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer text-left">
                    <p id="msgForm"></p>
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL ADD EVENT  -->

<!-- MODAL EDIT Event -->
<div id="modalEditEvent" class="modal fade" aria-hidden="true" aria-labelledby="modalEditEvent" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="modalTitleEdit" class="modal-title"></h4>
            </div>
            <form id="formEditEvent" action="javascript:" method="POST">
                <div class="modal-body">
                    <div id="viewEdit"></div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <p id="msgFormEdit" class="text-center"></p>
                    </div>
                    <div class="col-md-6 text-left no-padding">
                        <button id="deleteCalendar" class="btn btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
                    </div>
                    <div class="col-md-6">
                        <button id="editItem" class="btn btn-primary" type="submit">Update</button>
                        <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL EDIT Event -->

<script>
	var get_data = '<?php echo json_encode($drd)?>';

    $(function () {
	    $('#calendarIO').fullCalendar({
		    header: {
			    left: 'prev,next',
			    center: 'title',
			    right: 'today'
		    },
		    defaultDate: moment().format('YYYY-MM-DD'),
		    editable: true,
		    eventLimit: true, // allow "more" link when too many events
		    selectable: true,
		    selectHelper: true,
		    /*select: function(start, end) {
                document.getElementById("form_create").reset();
                $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                $('#create_modal').modal('show');
                save();
                $('#calendarIO').fullCalendar('unselect');
            },*/
		    eventClick: function(event, element)
		    {
			    deteil(event);
		    },
		    events: JSON.parse(get_data)
	    });

	    $('.dateevent').datepicker({
		    format: 'yyyy-mm-dd',
		    todayHighlight: true,
            autoclose: true,
        });

	    /* start ajax add */
	    $('#formAddEvent').on('submit', function () {
		    var dataPost = $('#formAddEvent').serialize();

            $.ajax({
                type: "POST",
	            url: "<?php echo site_url('offday/ajaxaddevent')?>",
	            data: dataPost,
                success: function (data) {
	                var respon = JSON.parse(data);
	                if(respon['status'] == 'success'){
	                	$('#msgForm').addClass('text-success');
	                	$('#msgForm').html(respon['msg']);

		                setTimeout(function(){
			                window.location.href = "<?php echo site_url('offday')?>";
		                }, 1000);
	                }else{
                        alert('system not responding');
                    }
                }
            });
	    });
	    /* end ajax add */

        /* start ajax edit */
	    function deteil(event){
		    var id = event.id;

		    $.ajax({
			    type: "POST",
			    url: "<?php echo site_url('offday/ajaxdetail')?>",
			    data: 'id='+id,
			    success: function (data) {
				    var respon = JSON.parse(data);
				    if(respon['status'] == 'success'){
					    $('#modalEditEvent').modal('show');
					    $('#modalTitleEdit').html(respon['data']['name']);
					    $('#viewEdit').html(respon['view']);
					    document.getElementById('deleteCalendar').setAttribute('data-id',respon['data']['offdayid']);
				    }else{
					    alert('System not responding');
				    }
			    }
		    });
	    }

	    $('#formEditEvent').on('submit', function () {
		    var dataPost = $('#formEditEvent').serialize();
		    $('#msgFormEdit').html('Loading...');

		    $.ajax({
			    type: "POST",
			    url: "<?php echo site_url('offday/ajaxeditevent')?>",
			    data: dataPost,
			    success: function (data) {
				    var respon = JSON.parse(data);
				    if(respon['status'] == 'success'){
					    $('#msgFormEdit').addClass('text-success');
					    $('#msgFormEdit').html(respon['msg']);

					    setTimeout(function(){
						    window.location.href = "<?php echo site_url('offday')?>";
					    }, 800);
				    }else{
					    alert('system not responding');
				    }
			    }
		    });
	    });
	    /* end ajax edit */

	    /* delete */
	    $('#deleteCalendar').on('click', function () {
		    $('#msgFormEdit').html('Loading..');
		    var id = $(this).attr('data-id');

		    $.ajax({
			    type: "POST",
			    url: "<?php echo site_url('offday/ajaxdelete')?>",
			    data: 'id='+id,
			    success: function (data) {
				    var respon = JSON.parse(data);
				    if(respon['status'] == 'success'){
					    $('#msgFormEdit').addClass('text-success');
					    $('#msgFormEdit').html(respon['msg']);

					    setTimeout(function(){
						    window.location.href = "<?php echo site_url('offday')?>";
					    }, 800);
				    }else{
					    alert('System not responding');
				    }
			    }
		    });
	    });
	    /* delete */

        $('.fc-corner-right').on('click', function () {
        	var tahun = $('.fc-center').html();
        	tahun = tahun.replace('<h2>','');
	        tahun = tahun.replace('</h2>','');
	        tahun = tahun.substr(-4);
        });
    });
</script>