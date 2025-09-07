<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url().$this->router->fetch_class()?>">Sewa Kendaraan</a></li>
            <li class="active"><?php echo $drd[0]['kendaraan'];?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Kendaraan</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['kendaraan'];?>">
                        </div>
                        <div class="form-group">
                            <label>No Polisi</label>
                            <input id="nopol" type="text" class="form-control" disabled value="<?php echo $drd[0]['no_polisi'];?>">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['tahun'];?>">
                        </div>
                        <div class="form-group">
                            <label>PIC</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['pic'];?>">
                        </div>
                        <div class="form-group">
                            <label>Segmen</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['segmen'];?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['alamat'];?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['keterangan'];?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Biaya</label>
                            <input type="text" class="form-control" disabled value="<?php echo strrev(implode('.',str_split(strrev(strval($drd[0]['biaya'])),3)));?>">
                        </div>
                        <div class="form-group">
                            <label>No Kontrak</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['no_kontrak'];?>">
                        </div>
                        <div class="form-group">
                            <label>Mulai Kontrak</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['start_kontrak'];?>">
                        </div>
                        <div class="form-group">
                            <label>Akhir Kontrak</label>
                            <input type="text" class="form-control" disabled value="<?php echo $drd[0]['end_kontrak'];?>">
                        </div>
                        <div class="form-group">
                            <label>Draft Kontrak</label>
                            <?php if(!empty($drd[0]['draftkontrak'])): ?>
                                <a href="<?php echo $this->config->item('uploads_uri').'sewakendaraan/draftktk/'.$drd[0]['sewakendaraanid'].'/'.$drd[0]['draftkontrak'];?>" target="_blank" class="btn btn-block btn-social bg-purple" style="margin-bottom:20px;">
                                    <i class="fa fa-file-pdf-o"></i> Draft Kontrak
                                </a>
                            <?php endif; ?>
                            <div class="input-group">
                                <input id="filDft" type="file" class="form-control timepicker">
                                <div id="draftkontrak" class="input-group-addon label-success">
                                    <i class="fa fa-upload"></i> Upload
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bast Kontrak</label>
                            <?php if(!empty($drd[0]['bastkontrak'])): ?>
                                <a href="<?php echo $this->config->item('uploads_uri').'sewakendaraan/bastktk/'.$drd[0]['sewakendaraanid'].'/'.$drd[0]['bastkontrak'];?>" target="_blank" class="btn btn-block btn-social bg-purple" style="margin-bottom:20px;">
                                    <i class="fa fa-file-pdf-o"></i> Bast Kontrak
                                </a>
                            <?php endif; ?>
                            <div class="input-group">
                                <input id="filBast" type="file" class="form-control timepicker">
                                <div id="bastkontrak" class="input-group-addon label-success">
                                    <i class="fa fa-upload"></i> Upload
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Invoice Terkait</h3>
                    </div>
                    <div class="box-body">
                        <?php $nav = array('1','2','3','4','5','6','7'); ?>
                        <?php if(in_array($role, $nav)) { ?>
                            <p>
                                <a href="<?php echo base_url().$this->router->fetch_class().'/addtermininv/'.$drd[0]['sewakendaraanid']; ?>" class="btn btn-sm btn-success">+ Tambah</a>
                            </p>
                        <?php } ?>
                        <div class="material-datatables">
                            <?php if (count ( $invterkait ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Order</th>
                                        <th>Segmen</th>
                                        <th>Invoice</th>
                                        <th>Faktur</th>
                                        <th>Nilai Dasar</th>
                                        <th>Tanggal Invoice</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Order</th>
                                        <th>Segmen</th>
                                        <th>Invoice</th>
                                        <th>Faktur</th>
                                        <th>Nilai Dasar</th>
                                        <th>Tanggal Invoice</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $invterkait as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;">
                                                <a target='_blank' href="<?php echo base_url().'knopes/details/'.$row['orderid']; ?>" style="color: #00bcd4;">
                                                    <strong><?php echo $row['code']; ?></strong>
                                                </a>
                                            </td>
                                            <td><?php echo $row['segment']; ?></td>
                                            <td style="text-transform: uppercase;"><p style="color:green;"><?php echo $row['invnum'];?></p></td>
                                            <td><?php echo $row['faknum'] ?></td>
                                            <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                            <td><?php echo date('d-m-Y', strtotime($row['invdate']));?></td>
                                            <td></td>
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
</div>

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

        $('#draftkontrak').on('click', function () {

	        let dataPost = new FormData();

	        const dft = $('#filDft').prop('files')[0];
	        dataPost.append('txtFile', dft);

	        const idsewa = '<?php echo $this->uri->segment(3);?>';
	        dataPost.append('idsewa', idsewa);

	        const nopol = $('#nopol').val();
	        dataPost.append('nopol', nopol);

	        $.ajax({
		        type: "POST",
		        url: '<?php echo site_url('sewakendaraan/uploaddraft')?>',
		        data: dataPost,
		        cache: false,
		        processData: false,
		        contentType: false,
		        success: function (data) {
			        var link = '<?php echo site_url('sewakendaraan/details/').$this->uri->segment(3);?>';
			        window.location.href = link;
		        }
	        });
        });

        $('#bastkontrak').on('click', function () {

	        let dataPost = new FormData();

	        const dft = $('#filBast').prop('files')[0];
	        dataPost.append('txtFile', dft);

	        const idsewa = '<?php echo $this->uri->segment(3);?>';
	        dataPost.append('idsewa', idsewa);

	        const nopol = $('#nopol').val();
	        dataPost.append('nopol', nopol);

	        $.ajax({
		        type: "POST",
		        url: '<?php echo site_url('sewakendaraan/uploadbast')?>',
		        data: dataPost,
		        cache: false,
		        processData: false,
		        contentType: false,
		        success: function (data) {
			        var link = '<?php echo site_url('sewakendaraan/details/').$this->uri->segment(3);?>';
			        window.location.href = link;
		        }
	        });
        });

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