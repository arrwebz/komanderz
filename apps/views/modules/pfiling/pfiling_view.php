<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Approval</a></li>
            <li class="active">SPB Padi</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Penting!</h4>
                    Di bawah ini merupakan daftar Persetujuan SPB. Klik tombol Buat Persetujuan untuk membuat baru persetujuan SPB.
                </div>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Permohonan Persetujuan SPB Padi untuk Pengurus.</h3>
                    </div>
                    <div class="box-body">
                        <p>
                            <a href="<?php echo base_url().$this->router->fetch_class().'/addnew'; ?>" class="btn btn-sm btn-success">+ Buat Baru</a>
                        </p>
                        <div class="material-datatables">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Persetujuan</th>
                                        <th>Jumlah SPB</th>
                                        <th>Nilai SPB</th>
                                        <th>Unit</th>
                                        <th>Tanggal</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Persetujuan</th>
                                        <th>Jumlah SPB</th>
                                        <th>Nilai SPB</th>
                                        <th>Unit</th>
                                        <th>Tanggal</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/myreqspb/'.$row['codeaprv']; ?>" style="color: #00bcd4;"><strong><?php echo $row['codeaprv'];?></strong></a>
                                            <td style="text-transform: uppercase;"><?php echo $row['volspb']; ?></td>
                                            <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['valspb'])),3))); ?></strong></td>
                                            <td><?php echo $row['unit'] ?></td>
                                            <td><?php echo date('d M Y', strtotime($row['aprvdate']));?>
                                                <?php if($row['aprvdate'] <= date('Y-m-d')) { ?>
                                                    <sup style="color:#d73925;"></sup>
                                                <?php } else { ?>
                                                    <sup style="color:#d73925;"><i class="icon fa fa-asterisk"></i> new</sup>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                </table>
                            <?php } else { echo 'Anda belum membuat persetujuan SPB!'; }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            'responsive'  : {
                'details' : {
                    'display' : $.fn.dataTable.Responsive.display.childRowImmediate,
                    'type'    : 'none',
                    'target'  : ''
                }
            }
        });
        $('.selectpicker').select2();
    });
</script>