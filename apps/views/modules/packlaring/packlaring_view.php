<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Letter</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('packlaring');?>">Packlaring</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Rocket.png" alt="" class="img-fluid mb-n4">
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
        <form id="formSearch" action="javascript:" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Kode</label>
                        <input name="code" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i> Submit
                </div>
            </button>
        </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="javascript:" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4" data-bs-target="#modalAddPacklaring" data-bs-toggle="modal">+ Add</a>
                    </p>
                    <div id="listData" class="table-responsive pb-9"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- START MODAL ADD -->
<div id="modalAddPacklaring" class="modal fade" aria-hidden="true" aria-labelledby="modalAddPacklaring" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Form Packlaring</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAddPacklaring" action="javascript:" method="POST">
                <div class="modal-body">
                    <div class="alert alert-info  alert-dismissible">
                        <h4><i class="ti ti-info-circle"></i> Informasi!</h4>
                        Nomor Paklaring terakhir <?php echo $code_packlaring[0]['last_code_packlaring'];?>
                    </div>
                    <div class="form-group mb-3">
                        <label>Paklaring Number :</label>
                        <div class="input-group mb-3">
                            <input id="pkgnum" name="pkgnum" type="text" class="form-control" value="<?php echo sprintf("%04s", $code_packlaring[0]['last_code_packlaring']+1);?>">
                            <span class="input-group-text"><strong>/EXT/TKBW/KOMET/<?php echo month_to_romawi(date('F')).'/'.date('Y');?></strong></span>
                            <div id="msg"></div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Name :</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Place Of Birth :</label>
                        <input name="pob" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Date Of Birth :</label>
                        <input name="dob" type="date" class="form-control datepicker" autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label>Address :</label>
                        <input name="address" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Start of work :</label>
                        <input name="start_work" type="date" class="form-control datepicker" autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label>End of work :</label>
                        <input name="end_work" type="date" class="form-control datepicker" autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label>Notes :</label>
                        <input name="notes" type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="msgForm" class="mb-15" style="font-weight: 600"></div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->

<!-- START MODAL EDIT -->
<div id="modalEditPacklaring" class="modal fade" aria-hidden="true" aria-labelledby="modalEditPacklaring" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 id="modalTitleEdit" class="modal-title text-white" id="myLargeModalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditPacklaring" action="javascript:" method="POST">
                <div class="modal-body">
                    <div id="viewEdit"></div>
                </div>
                <div class="modal-footer">
                    <div id="msgFormEdit" class="mb-15" style="font-weight: 600"></div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->

<!-- START MODAL UPLOAD -->
<div id="modalUploadPacklaring" class="modal fade" aria-hidden="true" aria-labelledby="modalUploadPacklaring" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="modalTitleUpload" class="modal-title" id="exampleOptionalLarge"></h4>
            </div>
            <form id="formUploadPacklaring" action="javascript:" method="POST">
                <div class="modal-body">
                    <div id="viewUpload"></div>
                </div>
                <div class="modal-footer">
                    <div id="msgFormUpload" class="mb-15" style="font-weight: 600"></div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL UPLOAD -->

<script>
	$(function(){
		$('.selectpicker').select2();

		/* start generate nomor surat terakhir */
        $(".refresh-nomor-surat").on("click", function () {
	        $(".internal").html("Loading...");
	        $(".external").html("Loading...");

	        $.ajax({
		        type: "POST",
		        url: "<?php echo site_url('packlaring/nomorsurat')?>",
		        data: "",
		        success: function (data) {
			        var respon = JSON.parse(data);
			        if(respon['status'] == 'success'){
			        	setTimeout(function(){
					        $(".internal").html(respon['data']['int']);
					        $(".external").html(respon['data']['ext']);
			        	}, 1000);
			        }else{
				        $(".internal").html('System not responding');
				        $(".external").html('System not responding');
			        }
		        }
	        });
        });
        $(".refresh-nomor-surat").trigger("click");
		/* end generate nomor surat terakhir */

		/* load data with search */
		$("#formSearch").on("submit", function () {
			$('#listData').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

			var dataPost = $('#formSearch').serialize();
			$.ajax({
			    type: "POST",
			    url: "<?php echo site_url('packlaring/listdata')?>",
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
		$("#formAddPacklaring").on('submit', function () {
            $("#msgForm").html("Loading...");

            var dataPost = $('#formAddPacklaring').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('packlaring/ajaxadd')?>",
                data: dataPost,
                success: function (data) {
                    var respon = JSON.parse(data);
                    if(respon['status'] == 'success'){
	                    $("#msgForm").addClass("text-success");
	                    $("#msgForm").html(respon['msg']);

	                    setTimeout(function(){
		                    $(".selectpicker").select2();
		                    $(".selectpicker").val(null).trigger("change");
		                    document.getElementById("formAddPacklaring").reset();
	                        $("#modalAddPacklaring").modal("hide");
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
	            url: "<?php echo site_url('packlaring/ajaxdetail')?>",
		        data: 'id='+id,
	            success: function (data) {
	                var respon = JSON.parse(data);
	                if(respon['status'] == 'success'){
		                $('#modalEditPacklaring').modal('show');
		                $('#modalTitleEdit').html(respon['data']['code']);
		                $('#viewEdit').html(respon['view']);
	                }else{
	                	alert("system not responding");
	                }
	            }
	        });
        });
        $("#formEditPacklaring").on("submit", function () {
	        $("#msgFormEdit").html("Loading...");

            var dataPost = $('#formEditPacklaring').serialize();
            $.ajax({
               type: "POST",
               url: "<?php echo site_url('packlaring/ajaxedit')?>",
               data: dataPost,
               success: function (data) {
                    var respon = JSON.parse(data);
                    if(respon['status'] == 'success'){
                    	$("#msgFormEdit").addClass("text-success");
                    	$("#msgFormEdit").html(respon['msg']);

                    	setTimeout(function(){
		                    $(".selectpicker").select2();
		                    $(".selectpicker").val(null).trigger("change");
		                    document.getElementById("formEditPacklaring").reset();
		                    $("#modalEditPacklaring").modal("hide");
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

        /* start ajax upload */
		$(document).on("click", ".upload-row", function () {
			var id = $(this).attr("data-id");

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('packlaring/ajaxdetailupload')?>",
				data: 'id='+id,
				success: function (data) {
					var respon = JSON.parse(data);
					if(respon['status'] == 'success'){
						$('#modalUploadPacklaring').modal('show');
						$('#modalTitleUpload').html(respon['data']['code']);
						$('#viewUpload').html(respon['view']);
					}else{
						alert("system not responding");
					}
				}
			});
		});
		$("#formUploadPacklaring").on("submit", function () {
			$("#msgFormUpload").html("Loading...");

			let dataPost = new FormData(this);

			const txtFile = $('#txtFile').prop('files')[0];
			dataPost.append('txtFile', txtFile);

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('packlaring/ajaxupload')?>",
				data: dataPost,
				cache: false,
				processData: false,
				contentType: false,
				success: function (data) {
					var respon = JSON.parse(data);
					if(respon['status'] == 'success'){
						$("#msgFormUpload").addClass("text-success");
						$("#msgFormUpload").html(respon['msg']);

						setTimeout(function(){
							$(".selectpicker").select2();
							$(".selectpicker").val(null).trigger("change");
							document.getElementById("formUploadPacklaring").reset();
							$("#modalUploadPacklaring").modal("hide");
							$("#msgFormUpload").html("");
							$("#formSearch").trigger("submit");
						}, 500);
					}else{
						alert('system not responding');
					}
				}
			});
		});
        /* end ajax upload */

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
                        url: "<?php echo site_url('packlaring/ajaxdelete');?>",
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

        /* start ajax cetak file */
        $(document).on("click", ".cetak-row", function () {
            var id = $(this).attr("data-id");

	        Swal.fire({
		        title: "Mempersiapkan File",
		        html: "Tunggu sebentar yaa, <br>komanders sedang menyiapkan file nya. <br>Selesai dalam <b></b> detik.",
		        timer: 5000,
		        timerProgressBar: true,
		        allowOutsideClick: false,
		        didOpen: () => {
			        Swal.showLoading();
			        const b = Swal.getHtmlContainer().querySelector('b');
			        timerInterval = setInterval(() => {
				        b.textContent = Swal.getTimerLeft()
			        }, 100)
		        },
		        willClose: () => {
			        clearInterval(timerInterval)
		        }
	        }).then((result) => {
		        if (result.dismiss === Swal.DismissReason.timer) {
			        const swalWithBootstrapButtons = Swal.mixin({
				        customClass: {
					        confirmButton: 'btn btn-success',
					        cancelButton: 'btn btn-danger'
				        },
				        buttonsStyling: false
			        });

			        $.ajax({
			            type: "POST",
			            url: "<?php echo site_url('packlaring/ajaxdetail')?>",
			            data: "id="+id,
			            success: function (data) {
			                var respon = JSON.parse(data);
			                if(respon['status'] == 'success'){
				                swalWithBootstrapButtons.fire({
					                title: "Hai <?php echo $this->session->userdata('userfullname'); ?>",
					                html:"<img src='<?php echo $this->config->item('images_uri')?>icon-word.png' width='70' alt='surat komanders'/><br><strong>"+ respon['data']['code'] +"</strong><br><br>file yang kamu minta sudah selesai komanders siapkan, Apakah kamu ingin men-download nya.?",
					                showCancelButton: true,
					                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ya, Download',
					                cancelButtonText: '<i class="fa fa-thumbs-down"></i> Nanti saja',
					                allowOutsideClick: false,
					                reverseButtons: true
				                }).then((result) => {
					                if (result.isConfirmed) {
					                	window.open("<?php echo site_url('packlaring/download/')?>"+respon['data']['packlaringid']);

						                Swal.fire({
							                icon: 'success',
							                html: 'File sudah berhasil di download, <br>silahkan upload file kembali sebagai draft kamu',
							                showConfirmButton: false,
							                footer: '<strong class="text-center">Salam,<br>Komanders</strong>',
							                timer: 10000
						                })
					                } else if (
							                result.dismiss === Swal.DismissReason.cancel
					                ) {
					                }
				                });
			                }else{
			                	alert("system not responding");
			                }
			            }
			        });
		        }
	        });
        });
        /* end ajax cetak file */

		$("#pkgnum").on("blur", function(e) {
			$('#msg').hide();
			if ($('#pkgnum').val() == null || $('#pkgnum').val() == "") {
				$('#msg').show();
				$("#msg").html("<i class='fa fa-bell-o'></i> Nomor Paklaring tidak boleh kosong.").css("color", "#f39c12");
				$('#cmdsave').hide();
			} else {
				var pkgnum = $('#pkgnum').val();
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('packlaring/ajaxcheckpkgnum'); ?>",
					data: 'pkgnum='+pkgnum,
					dataType: "html",
					cache: false,
					success: function(msg) {
						if(msg === 'FALSE') {
							$('#msg').show();
							$("#msg").html("<i class='fa fa-times-circle-o'></i> Nomor Paklaring sudah terpakai.").css("color", "red");
							$('#cmdsave').hide();
							console.log(msg);
						} else {
							$('#msg').show();
							$("#msg").html("<i class='fa fa-check'></i> Nomor Paklaring tersedia").css("color", "green");
							$('#cmdsave').show();
							console.log(msg);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#msg').show();
						$("#msg").html(textStatus + " " + errorThrown);
					}
				});
			}
		});
	});
</script>