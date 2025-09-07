<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">LOP</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('lop');?>">Project</a>
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
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/addlop'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Unit</th>
                                    <th>Divisi</th>
                                    <th>Segmen</th>
                                    <th>Amkomet</th>
                                    <th>Periode</th>
                                    <th>Nilai KL</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Unit</th>
                                    <th>Divisi</th>
                                    <th>Segmen</th>
                                    <th>Amkomet</th>
                                    <th>Periode</th>
                                    <th>Nilai KL</th>
                                    <th class="text-right"></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $drd as $row ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('lop/details/').$row['lopid'];?>">
                                                <?php echo $row['unit'];?>
                                            </a>
                                        </td>
                                        <td><?php echo $row['divname'];?></td>
                                        <td><?php echo $row['segmentname'];?></td>
                                        <td><?php echo $row['amkomet'];?></td>
                                        <td><?php echo date('d F Y', strtotime($row['startkl'])); ?> - <?php echo date('d F Y', strtotime($row['endkl'])); ?></td>
                                        <td style="color: #ef4444;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['nilaikl'])),3))); ?></strong></td>
                                        <td class="text-right js-sweetalert">
                                            <a href="<?php echo site_url('lop/createinvoice/'.$row['lopid']);?>" class="btn btn-sm btn-outline-primary"><i class="ti ti-file-text"></i></a>
                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/editlop/'.$row['lopid']; ?>" class="btn btn-sm btn-default"><i class="ti ti-edit"></i></a>
                                            <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['lopid']; ?>" class="btn btn-sm btn-danger" ><i class="ti ti-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        var table = $('#datatables').DataTable({
            'responsive'  : true,
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
        });
    });

    $('.js-sweetalert button').on('click', function () {
	    var current_url = "<?php echo base_url("lop");?>";
	    var uri = $(this).attr("data-href");
	    var id = $(this).attr("data-id");
	    showCancelMessage(current_url,uri,id);
    });

    function showCancelMessage(current_url, uri, id){
	    swal({
		    title: "Yakin menghapus data?",
		    text: "Data SPB yang berkaitan juga akan terhapus!  ",
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
				    data: 'lopid=' + id,
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
</script>