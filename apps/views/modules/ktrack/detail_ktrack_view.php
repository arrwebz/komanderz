<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Collection</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('ktrack');?>">Tracking</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Detail</li>
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
        <div class="col-md-4">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center text-bg-success">
                    <h4 class="card-title text-white mb-0">Update Position</h4>
                </div>
                <div class="card-body">
                    <form id="formposition" method="POST" action="javascript:">
                        <input name="hdnOrderid" type="hidden" class="form-control" value="<?php echo $id ?>">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Posisi Invoice:</label>
                            <select name="optPosition" class="form-control selectpicker" style="width:100%;">
                                <option disabled selected>Select</option>
                                <option value="accurate">Accurate</option>
                                <option value="segmen">Segmen</option>
                                <option value="invidea">Invidea</option>
                                <option value="precise">Precise</option>
                                <option value="pps">PPS</option>
                                <option value="keuangan">Keuangan</option>
                                <option value="legal">Legal</option>
                                <option value="forecasting">Forecasting</option>
                                <option value="revisi">Revisi</option>
                                <option value="percepatan">Percepatan</option>
                                <option value="npk">NPK</option>
                                <option value="dokhilang">Dokumen Hilang</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Recipient:</label>
                            <input name="txtRecipient" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Notes:</label>
                            <input name="txtNotes" type="text" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <button id="btnSubmit" type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Information</h4>
                </div>
                <div class="card-body">
                    <div class="box-body">
                        <?php if($inv != 0) { ?>
                            <div class="form-group mb-2">
                                <label class="form-label fw-semibold">Invoice:</label>
                                <input type="text" class="form-control" value="<?php echo $inv ?>" disabled>
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-2">
                                <label class="form-label fw-semibold">PRPO:</label>
                                <input type="text" class="form-control" value="<?php echo $kodenomor ?>" disabled>
                            </div>
                        <?php } ?>
                        <div class="form-group mb-2">
                            <label class="form-label fw-semibold">Customer:</label>
                            <input type="text" class="form-control" style="text-transform: uppercase;" value="<?php echo $segmen ?>" disabled>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label fw-semibold">Title:</label>
                            <textarea type="text" class="form-control" style="height:65px;" disabled><?php echo $namaproyek ?></textarea>
                        </div>
                        <?php if($inv != 0) { ?>
                            <div class="form-group mb-2">
                                <label class="form-label fw-semibold">Base Value:</label>
                                <input type="text" class="form-control" value="<?php echo $nilaidasar ?>" disabled>
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-2">
                                <label class="form-label fw-semibold">Justification Value:</label>
                                <input type="text" class="form-control" value="<?php echo $nilaijusti ?>" disabled>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center text-bg-info">
                    <h4 class="card-title text-white mb-0">SPB</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $spbbyinvoice ) > 0) { ?>
                            <table id="" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
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
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center text-bg-success">
                    <h4 class="card-title text-white mb-0">Document Position</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <?php foreach ( $positioninvoice as $pos ) { ?>
                        <a href="javascript:" class="list-group-item list-group-item-action mb-3" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">
                                    <?php echo $pos['position']; ?>
                                    <br><span style="font-size:12px">Recipient : <?php echo $pos['recipient']; ?></span>
                                    <br><span style="font-size:12px">Updated : <?php echo customDateEn($pos['trackdate'].' 00:00:00'); ?></span>
                                </h5>
                                <small><?php echo time_difference($pos['crdat']);?></small>
                            </div>
                            <p class="mb-1"><?php echo $pos['tracknote']; ?></p>
                        </a>
                        <?php }	?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            Dibuat oleh: <?php echo $buat; ?>, <?php echo $tglbuat; ?><br><br>
            <?php if($edit != 0){ ?>
                Diubah oleh: <?php echo $edit; ?>, <?php echo $tgledit; ?><br><br>
            <?php } ?>
            <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-primary rounded-pill px-4 waves-effect waves-light"><i class="ti ti-arrow-left"></i> Return</a>
            <button type="button" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/voucher/<?php echo $id; ?>';return true;">
                <i class="ti ti-sticker"></i> Voucher
            </button>
        </div>
    </div>
</section>

<script>
	$(function() {
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

		$('.selectpicker').select2();

		$("#btnSubmit").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('ktrack/ajaxposition'); ?>",
				data: $('#formposition').serialize(),
				success: function(data) {
					/* play sound */
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

