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
            <li><a href="#">Billing</a></li>
            <li class="active">Tambah Invoice Terkait</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Penting!</h4>
                    Di bawah ini merupakan daftar Invoice untuk PRPO terkait. Silahkan centang Invoice untuk dapat dikaitkan dengan PRPO. Klik tombol Tambah Invoice untuk menkonfirmasi Invoice.
                </div>
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Silahkan pilih Invoice yang ingin dikaitkan.</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="material-datatables icheck-blue">
                            <?php echo $this->session->flashdata('error'); ?>
                            <?php echo form_open('kprpo/createtermin');?>
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                            </button>
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Kode Order</th>
                                        <th>Segmen</th>
                                        <th>Invoice</th>
                                        <th>Faktur</th>
                                        <th>Nilai Dasar</th>
                                        <th>Tanggal Invoice</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Kode Order</th>
                                        <th>Segmen</th>
                                        <th>Invoice</th>
                                        <th>Faktur</th>
                                        <th>Nilai Dasar</th>
                                        <th>Tanggal Invoice</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <tr>
                                            <td><input type="checkbox" name="termin[]" value="<?php echo $row['orderid'] ?>"></td>
                                            <td style="text-transform: uppercase;"><a target='_blank' href="<?php echo base_url().'knopes/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code'] ?></strong></a></td>
                                            <td><?php echo $row['segment'] ?></td>
                                            <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                                            <td><?php echo $row['faknum'] ?></td>
                                            <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                            <td><?php echo date('d-m-Y', strtotime($row['invdate']));?></td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                </table>
                            <?php } else { echo 'Data tidak diketahui!'; }?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label>Nilai Justifikasi</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Rp
                                </div>
                                <input name="txtJstvalue" type="text" id="idr1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nilai Negosiasi</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Rp
                                </div>
                                <input name="txtNegovalue" type="text" id="idr2" class="form-control">
                            </div>
                        </div>
                        <?php echo form_hidden('hdnPrpoid',$prpoid); ?>
                        <button name="btnCreate" type="submit" class="btn btn-sm btn-success">Konfirmasi Invoice</button>
                        <?php echo form_close();?>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$prpoid;?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('#datatables').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            'responsive'  : true
        });

        $('.selectpicker').select2();

        $('.icheck-blue input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $(".icheck-blue input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".icheck-blue input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        $('#idr1').on('input', function(){

            var value = $('#idr1').val();

            var convert = number_format(value,0,'','.');

            $("#idr1").val(convert);

        });

        $('#idr2').on('input', function(){

            var value = $('#idr2').val();

            var convert = number_format(value,0,'','.');

            $("#idr2").val(convert);

        });

        function number_format(number, decimals, decPoint, thousandsSep) {

            number = (number + '').replace(/[^0-9]/g, '');

            var n = !isFinite(+number) ? 0 : +number;

            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);

            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;

            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;

            var s = '';

            var toFixedFix = function (n, prec) {

                var k = Math.pow(10, prec);

                return '' + (Math.round(n * k) / k).toFixed(prec);

            };

            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

            if (s[0].length > 3) {

                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);

            }

            if ((s[1] || '').length < prec) {

                s[1] = s[1] || '';

                s[1] += new Array(prec - s[1].length + 1).join('0');

            }
            return s.join(dec);
        }
    });
</script>