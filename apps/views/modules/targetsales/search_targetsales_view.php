<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Target Sales</a></li>
            <li class="active">Pencarian</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Target Sales</h3>
                    </div>
                    <div class="box-body">
                        <div class="material-datatables">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Tipe</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Tipe</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php
                                            if($row['tipe'] == '1'){
                                                $tipe = 'Global';
                                                $bulan = '-';
                                            }elseif($row['tipe'] == '2'){
                                                $tipe = 'Quarter';
                                                $bulan = '-';
                                            }elseif($row['tipe'] == '3'){
                                                $tipe = 'Monthly';
                                                $bulan = getIndMonth($row['bulan']);
                                            }elseif($row['tipe'] == '4'){
                                                $tipe = 'NOPES';
                                                $bulan = getIndMonth($row['bulan']);
                                            }elseif($row['tipe'] == '5'){
                                                $tipe = 'PADI';
                                                $bulan = getIndMonth($row['bulan']);
                                            }elseif($row['tipe'] == '6'){
                                                $tipe = 'IBL';
                                                $bulan = getIndMonth($row['bulan']);
                                            }elseif($row['tipe'] == '7'){
                                                $tipe = 'OBL';
                                                $bulan = getIndMonth($row['bulan']);
                                            }else{
                                                $tipe = 'Unknown';
                                                $bulan = '-';
                                            }
                                        ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['nama'];?></td>
                                            <td style="color: #fa591d;">
                                                <strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['nilai'])),3)));?></strong>
                                            </td>
                                            <td><?php echo $tipe; ?></td>
                                            <td><?php echo $bulan;?></td>
                                            <td><?php echo $row['tahun'];?></td>

                                            <td class="text-right js-sweetalert">
                                                <?php $sess = $this->session->userdata();?>
                                                <?php if($sess['role'] == 1): ?>
                                                    <a href="<?php echo site_url('targetsales/edittargetsales/'.$row['idtargetsales']);?>" class="btn btn-xs btn-default edit-row">
                                                        <i class="fa fa-edit"> Ubah</i>
                                                    </a>
                                                    <button type="button" class="btn btn-xs btn-default delete-row" data-id="<?php echo $row['idtargetsales'];?>" data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>">
                                                        <i class="fa fa-trash-o"> Hapus</i>
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>';return false;"><i class="fa fa-reply"></i> Kembali</button>
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
        var current_url = "<?php echo base_url("targetsales");?>";
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
                    data: 'idtargetsales=' + id,
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