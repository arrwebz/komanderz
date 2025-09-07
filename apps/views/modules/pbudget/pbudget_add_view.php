<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('pbudget');?>">Budget</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Add Budget PADI</li>
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

<div class="alert alert-info" role="alert">
    <h4><i class="ti ti-info-circle fs-5 text-danger me-2 flex-shrink-0"></i> Penting</h4>
    Di bawah ini merupakan daftar SPB untuk hari ini. Silahkan centang SPB untuk dapat diproses pembayarannya. Klik tombol Buat Anggaran untuk menkonfirmasi SPB.
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Silahkan pilih SPB yang ingin dikonfirmasi.</h5>
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="ti ti-square"></i></button>
            </div>
            <?php echo form_open('pbudget/createbudget');?>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="table-responsive pb-9 icheck-blue">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="" class="table border table-striped table-bordered display text-nowrap">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nomor SPB</th>
                                    <th>Invoice</th>
                                    <th>Tahun</th>
                                    <th>Segmen</th>
                                    <th>Kepada</th>
                                    <th>Pembayaran</th>
                                    <th>Nilai</th>
                                    <th>Tanggal</th>
                                    <th>Posisi</th>
                                    <th>Approval</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>No. SPB</th>
                                    <th>Invoice</th>
                                    <th>Tahun</th>
                                    <th>Segmen</th>
                                    <th>Kepada</th>
                                    <th>Pembayaran</th>
                                    <th>Nilai</th>
                                    <th>Tanggal</th>
                                    <th>Posisi</th>
                                    <th>Approval</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ( $drd as $row ) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="budget[]" value="<?php echo $row['spbid'] ?>"></td>
                                        <td style="text-transform: uppercase;"><a target='_blank' href="<?php echo base_url().'kspb/details/'.$row['spbid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code'] ?></strong></a></td>
                                        <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">'.substr($row['codeinv'],0,3).'</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                                        <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">'.date('Y', strtotime($row['crdat'])).'</i>'; else echo '<p style="color:green;">'.date('Y', strtotime($row['invdate'])).'</p>';  ?></td>
                                        <td><?php echo $row['segment'] ?></td>
                                        <td><?php echo $row['customer'] ?></td>
                                        <td style="text-transform: uppercase;"><?php echo $row['typeofpayment'] ?></td>
                                        <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></strong></td>
                                        <td><?php echo date('d-m-Y', strtotime($row['spbdat']));?></td>
                                        <td>
                                            <?php switch ($row['invstatus']) {
                                                case '0':
                                                    echo '<span class="label label-primary">Accurate</span>';
                                                    break;
                                                case '1':
                                                    echo '<span class="label label-success">Cair</span>';
                                                    break;
                                                case '2':
                                                    echo '<span class="label label-info">Segmen</span>';
                                                    break;
                                                case '3':
                                                    echo '<span class="label label-warning">Invidea</span>';
                                                    break;
                                                case '4':
                                                    echo '<span class="label label-warning">Precise</span>';
                                                    break;
                                                case '5':
                                                    echo '<span class="label label-primary">Revisi</span>';
                                                    break;
                                                case '6':
                                                    echo '<span class="label bg-olive">Percepatan</span>';
                                                    break;
                                                case '7':
                                                    echo '<span class="label bg-maroon">Legal</span>';
                                                    break;
                                                case '8':
                                                    echo '<span class="label bg-olive">Doc Hilang</span>';
                                                    break;
                                                case '9':
                                                    echo '<span class="label label-danger">Batal</span>';
                                                    break;
                                                case '10':
                                                    echo '<span class="label label-info">Forecasts</span>';
                                                    break;
                                                case '11':
                                                    echo '<span class="label label-default">NPK</span>';
                                                    break;
                                                case '16':
                                                    echo '<span class="label label-primary">Logistik</span>';
                                                    break;
                                                case '18':
                                                    echo '<span class="label bg-olive">Keuangan</span>';
                                                    break;
                                                default:
                                                    echo '<span class="label label-default">NO STATUS</span>';
                                            } ?>
                                        </td>
                                        <td>
                                            <?php switch ($row['status']) {
                                                case '3':
                                                    echo '<span class="label label-success">Approved</span>';
                                                    break;
                                                default:
                                                    echo '<span class="label label-default">Waiting</span>';
                                            } ?>
                                        </td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        <?php } else { echo 'Belum ada SPB hari ini!'; }?>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">
                    Informasi
                    <br>
                    Nomor LPDB terakhir KOMET & PADI <?php echo $code_lpdb[0]['last_code_lpdb'];?>
                </h5>
                <div class="row">
                    <div class="col-lg-12"
                    <label for="txtNama" class="form-label fw-semibold">Nomor Cek</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <div class="form-check">
                                <input name="chklpdb" type="checkbox" value="L"> LPDB
                                <label class="form-check-label" for="checkbox3"></label>
                            </div>
                        </div>
                        <?php
                        if(empty($code_lpdb[0]['last_code_lpdb'])){
                            $code_lpdb[0]['last_code_lpdb'] = 0;
                        }

                        $new_code = $code_lpdb[0]['last_code_lpdb']+1;
                        if(strlen($code_lpdb[0]['last_code_lpdb']) == 1){
                            $new_code = '00'.($code_lpdb[0]['last_code_lpdb']+1);
                        }elseif(strlen($code_lpdb[0]['last_code_lpdb']) == 2){
                            $new_code = "0".($code_lpdb[0]['last_code_lpdb']+1);
                        }else{
                            $new_code = $code_lpdb[0]['last_code_lpdb']+1;
                        }
                        ?>
                        <input name="txtCek" type="text" class="form-control" value="<?php echo $new_code; ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button name="btnCreate" type="submit" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Create Budget</button>
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light"> Cancel</a>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#datatables').DataTable({
	        'responsive'  : true,
	        'paging'      : true,
	        'lengthChange': true,
	        'searching'   : true,
	        'ordering'    : true,
	        'info'        : true,
	        'autoWidth'   : true,
	        'scrollX': true,
	        'scrollY': true,
        });

        $('.selectpicker').select2();

        $('.icheck-blue input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        $(".checkbox-toggle").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $(".icheck-blue input[type='checkbox']").iCheck("uncheck");
	            $(".ti", this).removeClass("ti-square-check").addClass('ti-square');
            } else {
                //Check all checkboxes
                $(".icheck-blue input[type='checkbox']").iCheck("check");
	            $(".ti", this).removeClass("ti-square").addClass('ti-square-check');
            }
            $(this).data("clicks", !clicks);
        });
    });
</script>