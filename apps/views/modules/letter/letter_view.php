<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Letter</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('letter');?>">Management Letter</a>
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
    <div class="row">
        <div class="col-sm-6 col-xl-6">
            <div class="card bg-info-subtle shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="<?php echo $this->config->item('images_uri');?>svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="">
                        </div>
                        <h6 class="mb-0 ms-3">Internal</h6>
                        <div class="ms-auto text-primary d-flex align-items-center">
                            <button class="btn btn-light refresh-nomor-surat">Refresh</button>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7 internal">Loading...</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-6">
            <div class="card bg-warning-subtle shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="<?php echo $this->config->item('images_uri');?>svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="">
                        </div>
                        <h6 class="mb-0 ms-3">External</h6>
                        <div class="ms-auto text-primary d-flex align-items-center">
                            <button class="btn btn-light">Refresh</button>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7 external">Loading...</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Subject</label>
                            <input name="subject" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Unit</label>
                            <select name="unit" class="form-control selectpicker" style="width: 100%; height: 36px">
                                <option value="">Pilih</option>
                                <option value="KOMET">KOMET</option>
                                <option value="MESRA">MESRA</option>
                                <option value="PADI">PADI</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Month</label>
                            <select name="month" class="form-control selectpicker" style="width: 100%; height: 36px">
                                <option value="">Pilih</option>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Type</label>
                            <select name="type" class="form-control selectpicker" style="width: 100%; height: 36px">
                                <option value="">Pilih</option>
                                <option value="INT">Internal</option>
                                <option value="EXT">External</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Initial</label>
                            <input name="initial" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Div Komet</label>
                            <select name="divkomet" class="form-control selectpicker" style="width: 100%; height: 36px">
                                <option value="">Pilih</option>
                                <option value="PENGURUS">PENGURUS</option>
                                <option value="CORSEC">CORSEC</option>
                                <option value="FINCO">FINCO</option>
                                <option value="MARSAL">MARSAL</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Year</label>
                            <select name="year" class="form-control selectpicker" style="width: 100%; height: 36px">
                                <option value="">Pilih</option>
                                <?php for($i=date('Y')-3; $i<=date('Y'); $i++){ ?>
                                    <option value="<?php echo $i;?>" <?php if(date('Y') == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                                <?php } ?>
                            </select>
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
                        <a id="addModalSurat" href="javascript:" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4" data-bs-target="#modalAddLetter" data-bs-toggle="modal">+ Add</a>
                    </p>
                    <div id="listData" class="table-responsive pb-9"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- START MODAL ADD -->
<div id="modalAddLetter" class="modal fade" aria-hidden="true" aria-labelledby="modalAddLetter" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Form Surat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAddLetter" action="javascript:" method="POST">
                <div class="modal-body">
                    <!--<div class="form-group">
                        <label>Kode :</label>
                        <input name="code" type="text" class="form-control">
                    </div>-->
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Type </label>
                        <select name="type" class="form-control" style="width: 100%;">
                            <option value="">Pilih</option>
                            <option value="INT">Internal</option>
                            <option value="EXT">External</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Initial </label>
                        <input name="initial" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Subject </label>
                        <input name="subject" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Unit </label>
                        <select name="unit" class="form-control" style="width: 100%;">
                            <option value="">Pilih</option>
                            <option value="KOMET">KOMET</option>
                            <option value="MESRA">MESRA</option>
                            <option value="PADI">PADI</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Div Komet </label>
                        <select name="divkomet" class="form-control" style="width: 100%;">
                            <option value="">Pilih</option>
                            <option value="PENGURUS">PENGURUS</option>
                            <option value="CORSEC">CORSEC</option>
                            <option value="FINCO">FINCO</option>
                            <option value="MARSAL">MARSAL</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Month</label>
                        <select name="month" class="form-control" style="width: 100%;">
                            <option value="">Pilih</option>
                            <option value="januari">Januari</option>
                            <option value="februari">Februari</option>
                            <option value="maret">Maret</option>
                            <option value="april">April</option>
                            <option value="mei">Mei</option>
                            <option value="juni">Juni</option>
                            <option value="juli">Juli</option>
                            <option value="agustus">Agustus</option>
                            <option value="september">September</option>
                            <option value="oktober">Oktober</option>
                            <option value="november">November</option>
                            <option value="desember">Desember</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Year </label>
                        <select name="year" class="form-control" style="width: 100%;">
                            <option value="">Pilih</option>
                            <?php $start_year = '2022';?>
                            <?php $end_year = (date('Y')+2);?>
                            <?php for($i=$start_year; $i<$end_year; $i++): ?>
                                <option value="<?php echo $i;?>" <?php if(date('Y') == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="msgForm" class="mb-15" style="font-weight: 600"></div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a class="btn btn-sm btn-white btn-pure" data-bs-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->

<!-- START MODAL EDIT -->
<div id="modalEditLetter" class="modal fade" aria-hidden="true" aria-labelledby="modalEditLetter" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 id="modalTitleEdit" class="modal-title text-white"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditLetter" action="javascript:" method="POST">
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

		/* start generate nomor surat terakhir */
        $(".refresh-nomor-surat").on("click", function () {
	        $(".internal").html("Loading...");
	        $(".external").html("Loading...");

	        $.ajax({
		        type: "POST",
		        url: "<?php echo site_url('letter/nomorsurat')?>",
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
			    url: "<?php echo site_url('letter/listdata')?>",
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
		$("#formAddLetter").on('submit', function () {
            $("#msgForm").html("Loading...");

            var dataPost = $('#formAddLetter').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('letter/ajaxadd')?>",
                data: dataPost,
                success: function (data) {
                    var respon = JSON.parse(data);
                    if(respon['status'] == 'success'){
	                    $("#msgForm").addClass("text-success");
	                    $("#msgForm").html(respon['msg']);

	                    setTimeout(function(){
		                    $(".selectpicker").select2();
		                    $(".selectpicker").val(null).trigger("change");
		                    document.getElementById("formAddLetter").reset();
	                        $("#modalAddLetter").modal("hide");
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
	            url: "<?php echo site_url('letter/ajaxdetail')?>",
		        data: 'id='+id,
	            success: function (data) {
	                var respon = JSON.parse(data);
	                if(respon['status'] == 'success'){
		                $('#modalEditLetter').modal('show');
		                $('#modalTitleEdit').html(respon['data']['code']);
		                $('#viewEdit').html(respon['view']);
	                }else{
	                	alert("system not responding");
	                }
	            }
	        });
        });
        $("#formEditLetter").on("submit", function () {
	        $("#msgFormEdit").html("Loading...");

            var dataPost = $('#formEditLetter').serialize();
            $.ajax({
               type: "POST",
               url: "<?php echo site_url('letter/ajaxedit')?>",
               data: dataPost,
               success: function (data) {
                    var respon = JSON.parse(data);
                    if(respon['status'] == 'success'){
                    	$("#msgFormEdit").addClass("text-success");
                    	$("#msgFormEdit").html(respon['msg']);

                    	setTimeout(function(){
		                    $(".selectpicker").select2();
		                    $(".selectpicker").val(null).trigger("change");
		                    document.getElementById("formEditLetter").reset();
		                    $("#modalEditLetter").modal("hide");
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
                        url: "<?php echo site_url('letter/ajaxdelete');?>",
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
					        cancelButton: 'btn btn-danger mx-xl-2'
				        },
				        buttonsStyling: false
			        });

			        $.ajax({
			            type: "POST",
			            url: "<?php echo site_url('letter/ajaxdetail')?>",
			            data: "id="+id,
			            success: function (data) {
			                var respon = JSON.parse(data);
			                if(respon['status'] == 'success'){
				                swalWithBootstrapButtons.fire({
					                title: "Hai <?php echo $this->session->userdata('userfullname'); ?>",
					                html:"<img src='<?php echo $this->config->item('skins_uri').'images/backgrounds/icon-word.png'; ?>' width='70' alt='surat komanders'/><br><strong>"+ respon['data']['code'] +"</strong><br><br>file yang kamu minta sudah selesai komanders siapkan, Apakah kamu ingin men-download nya.?",
					                showCancelButton: true,
					                confirmButtonText: '<i class="ti ti-thumb-up"></i> Ya, Download',
					                cancelButtonText: '<i class="ti ti-thumb-down"></i> Nanti saja',
					                allowOutsideClick: false,
					                reverseButtons: true
				                }).then((result) => {
					                if (result.isConfirmed) {
					                	window.open("<?php echo site_url('letter/download/')?>"+respon['data']['letterid']);

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
	});
</script>