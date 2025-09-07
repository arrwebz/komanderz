<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Logistics</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('letter');?>">Car Rental</a>
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
        <?php echo form_open('sewakendaraan/search');?>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">License Plate</label>
                        <input name="txtNama" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i> Submit
                </div>
            </button>
        </div>
        <?php echo form_close();?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/addsewakendaraan'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%"> 
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Car</th>
                                        <th>License Plate</th>
                                        <th>User/PIC</th>
                                        <th>Price</th>
                                        <th>Periode</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
								</thead>
								<tbody>
								<?php $i = 0; ?>
								<?php foreach ( $drd as $row ) { ?>
									<?php $i++; ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td style="text-transform: uppercase;">
											<a href="<?php echo base_url().$this->router->fetch_class().'/details/'.$row['sewakendaraanid'];?>" style="color: #00bcd4;">
												<strong><?php echo $row['kendaraan'] ?></strong>
											</a>
										</td>
										<td><?php echo $row['no_polisi'];?></td>
										<td><?php echo $row['pic'];?></td>
										<td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['biaya'])),3))); ?></strong></td>
										<td><?php echo date('d F Y', strtotime($row['start_kontrak'])); ?> - <?php echo date('d F Y', strtotime($row['end_kontrak'])); ?></td>
										
										<td class="text-right js-sweetalert">
											<a href="<?php echo site_url('sewakendaraan/editsewakendaraan/'.$row['sewakendaraanid']);?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row">
												<i class="fs-4 ti ti-edit text-warning"></i>
											</a>
											<button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['sewakendaraanid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center delete-row">
												<i class="fs-4 ti ti-trash text-danger"></i>
											</button>
										</td>
									</tr>
								<?php }	?>
								</tbody>
								<tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Car</th>
                                        <th>License Plate</th>
                                        <th>User/PIC</th>
                                        <th>Price</th>
                                        <th>Periode</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
								</tfoot>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatables').DataTable({
            'responsive'  : true,
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true

        });
        $('.selectpicker').select2();
    });

    $('.js-sweetalert button').on('click', function () {
        var current_url = "<?php echo base_url("sewakendaraan");?>";
        var uri = $(this).attr("data-href");
        var id = $(this).attr("data-id");
        showCancelMessage(current_url,uri,id);
    });

    function showCancelMessage(current_url, uri, id){
        swal({
            title: "Yakin menghapus data?",
            text: "",
            icon: "warning",
            buttons: ["Batal", "Hapus!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {

                swal("Anda telah berhasil menghapus data ini selamanya.", {
                    icon: "success",
                    buttons: false
                });

                $.ajax({
                    url: uri,
                    data: 'sewakendaraanid=' + id,
                    type: 'POST',
                    success: function(msg) {
                        if(msg == "success"){
                            setTimeout(function () {
                                location.href = current_url;
                            }, 1500);
                        }

                    }
                })

            }
        });
    }

    $('.qd').on('click', function () {
        var quri = $(this).attr("data-href");
        var qid = $(this).attr("data-id");
        quick_details(quri,qid);
    });

    function quick_details(quri,qid){
        //Ajax Load data from ajax
        $.ajax({
            url : quri,
            data: 'orderid=' + qid,
            type: "POST",
            dataType: "JSON",
            success: function(qdata)
            {

                $('[value="jp"]').val(qdata.jobtype);
                $('[value="div"]').val(qdata.division);
                $('[value="seg"]').val(qdata.segment);
                $('[value="am1"]').val(qdata.amuser);
                $('[value="am2"]').val(qdata.amkomet);
                $('[value="pn"]').val(qdata.projectname);

                $('#modal_details').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text(qdata.code); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
</script>

<div id="modal_details" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-weight: bold;">Default Modal</h4>
            </div>
            <div class="modal-body">
                <div class="form-group label-floating">
                    <label class="control-label">Jenis Pekerjaan</label>
                    <input type="text" class="form-control" value="jp" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Divisi</label>
                    <input type="text" class="form-control" value="div" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Segmen</label>
                    <input type="text" class="form-control" value="seg" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">AM User</label>
                    <input type="text" class="form-control" value="am1" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">AM Komet</label>
                    <input type="text" class="form-control" value="am2" disabled>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Nama Project</label>
                    <input type="text" class="form-control" value="pn" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>