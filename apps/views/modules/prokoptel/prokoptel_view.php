<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Funding</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('prokoptel');?>">Koptel</a>
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
                        <a href="<?php echo base_url().$this->router->fetch_class().'/addproject'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table table-sm table-striped table-no-bordered table-hover" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="font-size: 12px;">No</th>
                                    <th style="font-size: 12px;">Unit</th>
                                    <th style="font-size: 12px;">Code</th>
                                    <th style="font-size: 12px;">Project</th>
                                    <th style="font-size: 12px;">Nilai</th>
                                    <th style="font-size: 12px;">Period</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $drd as $row ) {

                                    ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
										<td style="font-size: 12px;"><?php echo $row['unit'];?></td>
                                        <td style="text-transform: uppercase;font-size: 12px;"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['prokopid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code'] ?></strong></a></td>
                                        
                                        <td style="font-size: 12px;"><?php echo $row['pronum'];?><br/>
										<?php echo wordwrap($row['proname'], 85, '<br>');?><br/>
										<?php echo date('d F Y', strtotime($row['prodate'])); ?>
                                        <td style="color: #fa591d;font-size: 12px;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['proval'])),3))); ?></strong></td>
                                        <td style="font-size: 12px;"><?php echo date('d F Y', strtotime($row['startop'])); ?> <br/> <?php echo date('d F Y', strtotime($row['endtop'])); ?></td>
 
                                        <td class="text-right js-sweetalert">
                                            <a target="_blank" href="<?php echo base_url().$this->router->fetch_class(). '/previewsp/'.$row['prokopid']; ?>" 
											class="<?php if($row['unit'] == 'MESRA') { ?> btn mb-1 bg-secondary-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center <?php }else{ ?> btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center <?php }?>"
											data-bs-toggle="tooltip" title="SP">
											<i class="fs-4 ti ti-file"></i></a>
                                            <a target="_blank" href="<?php echo base_url().$this->router->fetch_class(). '/previewaki/'.$row['prokopid']; ?>" 
											class="btn mb-1 bg-success-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="AKI"><i class="fs-4 ti ti-file"></i></a>
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

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatables').DataTable({
	        'responsive'  : true,
	        'paging'      : true,
	        'lengthChange': false,
	        'searching'   : true,
	        'ordering'    : true,
	        'info'        : true,
	        'autoWidth'   : true,
	        'scrollX': true,
        });
        $('.selectpicker').select2();
    });

    $('.js-sweetalert button').on('click', function () {
        var current_url = "<?php echo base_url("kprpo");?>";
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
                    data: 'orderid=' + id,
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