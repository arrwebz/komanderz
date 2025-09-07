<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('kbudget');?>">Budget</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Konfirmasi SPB Komet</li>
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
    Di bawah ini merupakan daftar SPB untuk di ekspor ke Excel. Silahkan centang SPB untuk dapat diproses pembayarannya. Klik tombol Perbarui Anggaran untuk menkonfirmasi SPB. Klik tombol Ekspor ke Excel untuk mengunduh file Excel tersebut.
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Konfirmasi SPB Komet tanggal <?php echo $tglbudget; ?></h3></h5>
            </div>
            <form id="formupdatebudget" method="POST" action="javascript:">
            <input name="hdnBudgetid" type="hidden" class="form-control" value="<?php echo $budgetid ?>">
                <div class="card-body p-4 border-bottom">
                    <div class="row">
                        <div class="table-responsive pb-9 icheck-blue">
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="ti ti-square"></i></button>
                            <?php echo $this->session->flashdata('error'); ?>
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>No.</th>
                                    <th>Dept</th>
                                    <th>SPB</th>
                                    <th>Transaksi</th>
                                    <th>Customer</th>
                                    <th>User</th>
                                    <th>INV</th>
                                    <th>Tahun</th>
                                    <th>Kepada</th>
                                    <th>Pembayaran</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>No.</th>
                                    <th>Dept</th>
                                    <th>SPB</th>
                                    <th>Transaksi</th>
                                    <th>Customer</th>
                                    <th>User</th>
                                    <th>INV</th>
                                    <th>Tahun</th>
                                    <th>Kepada</th>
                                    <th>Pembayaran</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                if ($rowcount != 0) {
                                    $i = 0;
                                    for ($row = 0; $row < $rowcount; $row++) {
                                        $stat = $rowtable[$row][0]['status'];
                                        $i++;
                                        echo '<tr>';
                                        echo '<td><input type="checkbox" name="budget[]" value="'.$rowtable[$row][0]['spbid'].'"></td>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td>'.$rowtable[$row][0]['jobtype'].'</td>';
                                        echo '<td>'.$rowtable[$row][0]['code'].'</td>';
                                        echo '<td>'.$rowtable[$row][0]['info'].'</td>';
                                        echo '<td>'.$rowtable[$row][0]['segment'].'</td>';
                                        echo '<td>'.$rowtable[$row][0]['customer'].'</td>';
                                        if ($rowtable[$row][0]['invnum'] == 0 ){
                                            echo '<td>'.substr($rowtable[$row][0]['codeinv'],0,3).'</td>';
                                            echo '<td>' . date('Y', strtotime($rowtable[$row][0]['crdat'])) . '</td>';
                                        } else {
                                            echo '<td>'.$rowtable[$row][0]['invnum'].'</td>';
                                            echo '<td>' . date('Y', strtotime($rowtable[$row][0]['invdate'])) . '</td>';
                                        }
                                        echo '<td>'.$rowtable[$row][0]['accname'].'</td>';

                                        if ($rowtable[$row][0]['typeofpayment'] == 'transfer') {
                                            echo '<td>'. ucfirst($rowtable[$row][0]['bank']) . ucfirst($rowtable[$row][0]['bankother']) . ' :<br>' . $rowtable[$row][0]['accnumber'] .'</td>';
                                        } else {
                                            echo '<td>'. strtoupper($rowtable[$row][0]['typeofpayment']) .'</td>';
                                        }

                                        echo '<td>'.strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['value'])),3))).'</td>';
                                        if ($rowtable[$row][0]['status'] == 0 ){
                                            echo '<td><small class="badge bg-danger">X</small></td>';
                                        } else {
                                            echo '<td><small class="badge bg-success">OK</small></td>'; 
                                        }
                                        echo '</tr>';
                                    }
                                    echo 'Belum buat anggaran.';
                                } 
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label>Nomor Cek</label>
                            <input name="txtCek" type="text" class="form-control" value="<?php echo $nomorcek; ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btnConfirm" type="submit" class="btn btn-fill btn-success"><i class="ti ti-circle-check"> Konfirmasi</i></button>
                    <button id="btnUpdate" type="submit" class="btn btn-fill btn-default">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        Dibuat oleh: <?php echo $buat; ?>, <?php echo $tglbuat; ?><br><br>
        <?php if($edit != 0){ ?>
            Diubah oleh: <?php echo $edit; ?>, <?php echo $tgledit; ?><br><br>
        <?php } ?>
        <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default">Kembali</a>
        <?php if($stat != 0) { ?>
            <button type="button" class="btn btn-success pull-right" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/export/<?php echo $budgetid; ?>';return true;">
                <i class="ti ti-download"></i> Excel
            </button>
            <button type="button" class="btn bg-purple pull-right" style="margin-right: 5px;" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>/preview/<?php echo $budgetid; ?>';return true;">
                <i class="ti ti-printer"></i> Cetak Budget
            </button>
            <?php if($role == 1 || $userid == '8' || $userid == '9'){ ?>
                <a target="_blank" href="<?php echo site_url($this->router->fetch_class().'/previewspb/'.$budgetid);?>" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="ti ti-printer"></i> Cetak SPB
                </a>
                <a target="_blank" href="<?php echo site_url($this->router->fetch_class().'/previewinvoice/'.$budgetid);?>" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="ti ti-printer"></i> Cetak Invoice
                </a>
            <?php } ?>
        <?php } ?>
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

		//Enable check and uncheck all functionality
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

		$("#btnConfirm").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kbudget/ajaxconfirmbudget'); ?>",
				data: $('#formupdatebudget').serialize(),
				success: function(data) {
					/* play sound */
					swal({
                        title: "Berhasil",
                        text: "Konfirmasi data anggaran berhasil!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    }).then(function(){
                    	location.reload();
                    });
				}
			});
		});

		$("#btnUpdate").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('kbudget/ajaxupdatebudget'); ?>",
				data: $('#formupdatebudget').serialize(),
				success: function(data) {
					/* play sound */
					swal({
                        title: "Berhasil",
                        text: "Perbarui data anggaran berhasil!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    }).then(function(){
                    	location.reload();
                    });
				}
			});
		});
	});
</script>