<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tracking</a></li>
            <li class="active">Detail Invoice PADI</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Posisi</h3>
                    </div>
                    <div class="box-body">
                        <form id="formposition" method="POST" action="javascript:">
                            <input name="hdnOrderid" type="hidden" class="form-control" value="<?php echo $id ?>">
                            <div class="form-group">
                                <label>Posisi Invoice:</label>
                                <select name="optPosition" class="form-control selectpicker" style="width:250px;">
                                    <option disabled selected>Pilih</option>
                                    <option value="materai">Materai</option>
                                    <option value="signed">Tanda Tangan</option>
                                    <option value="segmen">Segmen</option>
                                    <option value="PJM">PJM</option>
                                    <option value="ASD">ASD</option>
                                    <option value="logistik">Logistik</option>
                                    <option value="legal">Legal</option>
                                    <option value="keuangan">Keuangan</option>
                                    <option value="legal">Legal</option>
                                    <option value="forecasting">Forecasting</option>
                                    <option value="revisi">Revisi</option>
                                    <option value="percepatan">Percepatan</option>
                                    <option value="npk">NPK</option>
                                    <option value="dokhilang">Dokumen Hilang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Penerima:</label>
                                <input name="txtRecipient" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Catatan:</label>
                                <input name="txtNotes" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button id="btnSubmit" type="submit" name="cmdsave" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <?php if($inv != 0) { ?>
                            <div class="form-group">
                                <label>Nomor Invoice:</label>
                                <input type="text" class="form-control" value="<?php echo $inv ?>" disabled>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <label>Nomor PRPO:</label>
                                <input type="text" class="form-control" value="<?php echo $kodenomor ?>" disabled>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label>Segmen:</label>
                            <input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $segmen ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Judul:</label>
                            <textarea type="text" class="form-control" style="width:610px; height:50px;" disabled><?php echo $namaproyek ?></textarea>
                        </div>
                        <?php if($inv != 0) { ?>
                            <div class="form-group">
                                <label>Nilai Dasar:</label>
                                <input type="text" class="form-control" value="<?php echo $nilaidasar ?>" disabled>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <label>Nilai Justifikasi:</label>
                                <input type="text" class="form-control" value="<?php echo $nilaijusti ?>" disabled>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">SPB</h3>
                    </div>
                    <div class="box-body">
                        <div class="material-datatables">
                            <?php if (count ( $spbbyinvoice ) > 0) { ?>
                                <table id="spbtables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>SPB</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>SPB</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $spbbyinvoice as $spb ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php if ($spb['code'] == "") {
                                                    echo "<i style='color:red;'>Data belum diupdate.</i>";
                                                } else {
                                                    echo "<a target='_blank' href=' ".base_url()."kspb/details/".$spb['spbid']."' style='color: #00bcd4;'><strong>".$spb['code']."</strong></a>"; } ?>
                                            </td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                </table>
                            <?php } else { echo 'Belum ada SPB untuk invoice ini!'; }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Posisi Dokumen</h3>
                    </div>
                    <div class="box-body">
                        <ul class="timeline">
                            <?php foreach ( $positioninvoice as $pos ) { ?>

                                <?php if($pos['trackstatus'] == '11') {
                                    $pills = '<i class="fa fa-file-text-o bg-gray"></i>';
                                } elseif($pos['trackstatus'] == '12') {
                                    $pills = '<i class="fa fa-pencil bg-gray"></i>';
                                } elseif($pos['trackstatus'] == '13') {
                                    $pills = '<i class="fa fa-building bg-maroon"></i>';
                                } elseif($pos['trackstatus'] == '18') {
                                    $pills = '<i class="fa fa-university bg-green"></i>';
                                } ?>
                                <li class="time-label">
                                    <span class="bg-gray">
                                        <?php echo $pos['trackdate']; ?>
                                    </span>
                                </li>
                                <li>
                                    <?php echo $pills; ?>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo $pos['crdat']; ?></span>
                                        <h3 class="timeline-header no-border"><a href="#"><?php echo $pos['position']; ?></a> <?php echo $pos['tracknote']; ?></h3>
                                        <div class="timeline-body" style="background: #f4f4f4;">
                                            <p>Comment here</p>
                                            <span class="time" style="color: #777777;"><i class="fa fa-clock-o"></i> <?php echo $pos['crdat']; ?></span>
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Add comment</a>
                                        </div>
                                    </div>
                                </li>
                            <?php }	?>
                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                Dibuat oleh: <?php echo $buat; ?>, <?php echo $tglbuat; ?><br><br>
                <?php if($edit != 0){ ?>
                    Diubah oleh: <?php echo $edit; ?>, <?php echo $tgledit; ?><br><br>
                <?php } ?>
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="button" class="btn btn-success pull-right" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/voucher/<?php echo $id; ?>';return true;">
                    <i class="fa fa-sticky-note-o"></i> Voucher
                </button>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#spbtables').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true,
            'responsive'  : true
        });

        $('#datatables').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true,
            'responsive'  : true
        });

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true});

        $('.selectpicker').select2();

        $("#btnSubmit").click(function() {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ptrack/ajaxposition'); ?>",
                data: $('#formposition').serialize(),
                success: function(data) {
                    swal({title: "Berhasil", text: "Voucher pencairan berhasil dibuat!", icon:
                            "success", buttons: false, timer: 1500,}).then(function(){
                            location.reload();
                        }
                    );
                }
            });
        });
    });
</script>
	
