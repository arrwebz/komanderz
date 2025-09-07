<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Billing</a></li>
            <li class="active">PRPO Padi</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Pencarian</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php echo form_open('pprpo/search');?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode PRPO</label>
                            <input name="txtInv" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Segmen</label>
                            <select name="optSegment" class="form-control selectpicker">
                                <option disabled selected>Select</option>
                                <?php

                                if(!empty($segment)){
                                    foreach($segment as $row){
                                        if (!empty($segmen) && $segmen == $row['segmentid'] ) {
                                            $strselected = "selected";
                                        } else {
                                            $strselected = " ";
                                        }
                                        echo '<option value="'.$row['segmentid'].'"'. $strselected.'>'.$row['code'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Segment not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" name="cmdsave" class="btn btn-fill btn-default">Filter</button>
                <?php echo form_close();?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar kontrak Padi.</h3>
                    </div>
                    <div class="box-body">
                        <?php $nav = array('1','2','3','4','5','6','7'); ?>
                        <?php if(in_array($role, $nav)) { ?>
                            <p>
                                <a href="<?php echo base_url().$this->router->fetch_class().'/addprpo'; ?>" class="btn btn-sm btn-success">+ Tambah Kontrak</a>
                            </p>
                        <?php } ?>
                        <div class="material-datatables">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>KODE PRPO</th>
                                        <th>Segmen</th>
                                        <th>Nilai Nego</th>
                                        <th>Umur</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>KODE PRPO</th>
                                        <th>Segmen</th>
                                        <th>Nilai Nego</th>
                                        <th>Umur</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code'] ?></strong></a>
                                                <?php if ($row['intervaldat'] >= '180' ) {
                                                    echo '<sup style="font-size: 8px;color:#dd4b39;"><i class="fa  fa-asterisk"></i></sup>';
                                                } ?>
                                                <a class="btn btn-xs btn-default qd" data-href="<?php echo base_url().$this->router->fetch_class(). '/ajax_details'?>" data-id="<?php echo $row['orderid']; ?>" ><i class="fa fa-external-link-square"></i></a>
                                            </td>
                                            <td><?php echo $row['segment'];?></td>
                                            <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3))); ?></strong></td>
                                            <td><?php echo $row['intervaldat'];?> hari</td>
                                            <td class="text-right js-sweetalert">
                                                <?php $nav = array('1','2','3','4','6'); ?>
                                                <?php if(in_array($group, $nav)) { ?>
                                                    <?php $navrole = array('1','2','3','4','5','6','7'); ?>
                                                    <?php if(in_array($role, $navrole)) { ?>
                                                        <small class="label label-primary"><?php echo $row['countspb'];?></small>
                                                        <?php if($row['countspb'] == '0') { ?>
                                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn btn-xs btn-default"><i> Buat SPB</i></a>
                                                        <?php } elseif($row['countspb'] > '0') { ?>
                                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn btn-xs btn-primary"><i>+ Tambah SPB</i></a>
                                                        <?php } ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/createinvoice/'.$row['orderid']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-file-text-o"> Buat Invoice</i></a>
                                                        <?php $navrole = array('1','2','4','5'); ?>
                                                        <?php if(in_array($role, $navrole)) { ?>
                                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/editprpo/'.$row['orderid']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"> Ubah</i></a>
                                                            <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['orderid']; ?>" class="btn btn-xs btn-default" onclick="sweet()"><i class="fa fa-trash-o"> Hapus</i></button>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
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