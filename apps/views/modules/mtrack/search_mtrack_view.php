<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tracking Invoice</a></li>
            <li class="active">Mesra</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hasil pencarian:</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="material-datatables">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Posisi</th>
                                        <th>Segmen</th>
                                        <th>AM</th>
                                        <th>Nilai</th>
                                        <th>Progres</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Posisi</th>
                                        <th>Segmen</th>
                                        <th>AM</th>
                                        <th>Nilai</th>
                                        <th>Progres</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;">
                                                <?php if($row['invnum'] == 0 ) { ?>
                                                    <a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="color: #d33724;"><strong><?php echo $row['code']; ?></strong>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['invnum'].'/INV/'.$row['jobtype'].'/'.date('m', strtotime($row['invdate'])).'/'.date('y', strtotime($row['invdate'])) ?></strong>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if($row['status'] == '1') { ?>
                                                    <span class="label label-success">Cair</span>
                                                <?php } elseif($row['status'] == '2' || $row['status'] == '13') { ?>
                                                    <span class="label label-primary">Segmen</span>
                                                <?php } elseif($row['status'] == '3' || $row['status'] == '14') { ?>
                                                    <span class="label label-warning">PJM</span>
                                                <?php } elseif($row['status'] == '4' || $row['status'] == '15') { ?>
                                                    <span class="label label-warning">ASD</span>
                                                <?php } elseif($row['status'] == '5' || $row['status'] == '16') { ?>
                                                    <span class="label label-success">Logistik</span>
                                                <?php } elseif($row['status'] == '6' || $row['status'] == '18') { ?>
                                                    <span class="label label-success">Keuangan</span>
                                                <?php } elseif($row['status'] == '7' || $row['status'] == '17') { ?>
                                                    <span class="label label-info">Legal</span>
                                                <?php } elseif($row['status'] == '8') { ?>
                                                    <span class="label label-primary">Posting</span>
                                                <?php } elseif($row['status'] == '9') { ?>
                                                    <span class="label label-danger">Batal</span>
                                                <?php } elseif($row['status'] == '10') { ?>
                                                    <span class="label label-warning">Forecasting</span>
                                                <?php } elseif($row['status'] == '11') { ?>
                                                    <span class="label label-info">Materai</span>
                                                <?php } elseif($row['status'] == '12') { ?>
                                                    <span class="label label-info">Signed</span>
                                                <?php } elseif($row['status'] == '0' && $row['invnum'] == 0) { ?>
                                                    <span class="label label-default">Unknown</span>
                                                <?php } else { ?>
                                                    <span class="label label-default">Printed</span>
                                                <?php } ?>
                                            </td>
                                            <td style="text-transform: uppercase;"><?php echo $row['segment'] ?></td>
                                            <td><?php echo $row['amkomet'] ?></td>
                                            <?php if($row['invnum'] == 0 ) { ?>
                                                <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['jstvalue'])),3))); ?></td>
                                            <?php } else { ?>
                                                <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td>
                                            <?php } ?>
                                            <td><?php if($row['status'] == '1') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '2' || $row['status'] == '13') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '3' || $row['status'] == '14') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '4' || $row['status'] == '15') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '5' || $row['status'] == '16') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '6' || $row['status'] == '18') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '7' || $row['status'] == '17') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '8') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '9') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '10') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">65%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '11') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '12') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '0' && $row['invnum'] == 0) { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">15%</div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                </table>
                            <?php } else { echo 'Data tidak ditemukan!'; }?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>';return false;"><i class="fa fa-reply"></i> Kembali</button>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatables').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'pageLength'  : 25,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
        });
        $('.selectpicker').select2();
    });
</script>