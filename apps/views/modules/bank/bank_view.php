<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Settings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('letter');?>">Bank Account</a>
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

<section class="content">
    <div class="card card-hover">
        <div class="card-header">
            <h4 class="mb-0 text-dark fs-5">Search</h4>
        </div>
        <form id="formSearch" action="javascript:">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Bank</label>
                            <input name="bank" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Atas Nama</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-12">
                    <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-send me-2 fs-4"></i> Submit
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-hover" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <a id="addModalBank" href="javascript:" class="btn btn-sm btn-success" data-bs-target="#modalAddBank" data-bs-toggle="modal">+ Add</a>
                    <div id="listData"></div>					
                </div>
            </div>
        </div>
    </div>
</section>

<!-- START MODAL ADD -->
<div id="modalAddBank" class="modal fade" aria-hidden="true" aria-labelledby="modalAddBank" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Form Bank</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAddBank" action="javascript:" method="POST">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Bank :</label>
                        <input name="bankname" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Atas Nama :</label>
                        <input name="accname" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Nomor Rekening :</label>
                        <input name="accnum" type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="msgForm" class="mb-15" style="font-weight: 600"></div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-sm btn-white btn-pure" data-bs-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->

<!-- START MODAL EDIT -->
<div id="modalEditBank" class="modal fade" aria-hidden="true" aria-labelledby="modalEditBank" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 id="modalTitleEdit" class="modal-title text-white"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditBank" action="javascript:" method="POST">
                <div class="modal-body">
                    <div id="viewEdit"></div>
                </div>
                <div class="modal-footer">
                    <div id="msgFormEdit" class="mb-15" style="font-weight: 600"></div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-sm btn-white btn-pure" data-bs-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL EDIT -->

<script>
	$(function(){
		$('.selectpicker').select2();

		/* load data with search */
		$("#formSearch").on("submit", function () {
			$('#listData').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

			var dataPost = $('#formSearch').serialize();
			$.ajax({
			    type: "POST",
			    url: "<?php echo site_url($this->router->fetch_class().'/listdata')?>",
			    data: dataPost,
			    success: function (data) {
			        var respon = JSON.parse(data);
			        if(respon['status'] == 'success'){
			        	setTimeout(function(){
					        $("#listData").html(respon['view']);
			        	}, 1000);
			        }else{
				        $("#listData").html('system not responding');
			        }
			    }
			});
		});
		$("#formSearch").trigger('submit');
		/* end load data with search */

        /* start refresh data */
        $("#refresh-data").on('click', function () {
	        $("#formSearch").trigger('submit');
        });
        /* end refresh data */

        /* start ajax add */
		$("#formAddBank").on('submit', function () {
            $("#msgForm").html("Loading...");

            var dataPost = $('#formAddBank').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url($this->router->fetch_class().'/ajaxadd')?>",
                data: dataPost,
                success: function (data) {
                    var respon = JSON.parse(data);
                    if(respon['status'] == 'success'){
	                    $("#msgForm").addClass("text-success");
	                    $("#msgForm").html(respon['msg']);

	                    setTimeout(function(){
		                    document.getElementById("formAddBank").reset();
	                        $("#modalAddBank").modal("hide");
		                    $("#msgForm").html("");

		                    $("#formSearch").trigger("submit");
	                    }, 500);
                    }else{
                        alert("system not responding");
                    }
                }
            });
		});
		/* end ajax add */

        /* start ajax edit */
        $(document).on("click", ".edit-row", function () {
	        var id = $(this).attr("data-id");

	        $.ajax({
	            type: "POST",
	            url: "<?php echo site_url($this->router->fetch_class().'/ajaxdetail')?>",
		        data: 'id='+id,
	            success: function (data) {
	                var respon = JSON.parse(data);
	                if(respon['status'] == 'success'){
		                $('#modalEditBank').modal('show');
		                $('#modalTitleEdit').html('<strong>'+respon['data']['accname']+'</strong><br>Bank : '+respon['data']['bankname']+' - '+respon['data']['accnum']);
		                $('#viewEdit').html(respon['view']);
	                }else{
	                	alert("system not responding");
	                }
	            }
	        });
        });
        $("#formEditBank").on("submit", function () {
	        $("#msgFormEdit").html("Loading...");

            var dataPost = $('#formEditBank').serialize();
            $.ajax({
               type: "POST",
               url: "<?php echo site_url($this->router->fetch_class().'/ajaxedit')?>",
               data: dataPost,
               success: function (data) {
                    var respon = JSON.parse(data);
                    if(respon['status'] == 'success'){
                    	$("#msgFormEdit").addClass("text-success");
                    	$("#msgFormEdit").html(respon['msg']);

                    	setTimeout(function(){
		                    document.getElementById("formEditBank").reset();
		                    $("#modalEditBank").modal("hide");
		                    $("#msgFormEdit").html("");
                    		$("#formSearch").trigger("submit");
                        }, 500);
                    }else{
                    	alert('system not responding');
                    }
               }
            });
        });
        /* end ajax edit */

        /* start ajax delete */
        $(document).on("click",".delete-row",function() {
			var id = $(this).attr("data-id");

	        swal({
		        title: "Yakin menghapus data?",
		        text: "",
		        icon: "warning",
		        buttons: ["Batal", "Hapus!"],
		        dangerMode: true,
	        }).then((willDelete) => {
		        if (willDelete) {
                    $.ajax({
                        url: "<?php echo site_url($this->router->fetch_class().'/ajaxdelete');?>",
                        data: 'id=' + id,
                        type: 'POST',
                        success: function(data) {
	                        var respon = JSON.parse(data);
	                        if(respon['status'] == 'success'){
		                        swal("Anda telah berhasil menghapus data ini selamanya.", {
			                        icon: "success",
			                        buttons: false,
			                        timer: 2000
		                        });

		                        $("#formSearch").trigger("submit");
                        	}else{
		                        swal("System not responding.", {
			                        icon: "failed",
			                        buttons: false
		                        });
                            }
				        }
                    })
		        }
	        });
		});
		/* end ajax delete */
	});
</script>