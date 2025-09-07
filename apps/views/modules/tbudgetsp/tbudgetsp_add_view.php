<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Membership</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('tbudgetsp');?>">Budget SP</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Add Budget</li>
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

<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <span class="side-stick"></span>
            <h6 class="note-title text-truncate w-75 mb-0" data-noteheading="Go for lunch">
                <i class="ti ti-info-circle"></i> Penting!
            </h6>
            <p class="note-date fs-2">&nbsp;</p>
            <div class="note-content">
                <p class="note-inner-content">
                    Di bawah ini merupakan daftar SPB untuk hari ini. Silahkan centang SPB untuk dapat diproses pembayarannya. Klik tombol Buat Anggaran untuk menkonfirmasi SPB.
                </p>
            </div>
        </div>
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Silahkan pilih SPB yang ingin dikonfirmasi.</h5>
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="ti ti-square"></i></button>
            </div>
            <?php echo form_open('tbudgetsp/createbudget');?>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <?php if (count ( $drd ) > 0) { ?>
                        <div class="table-responsive pb-9 icheck-blue">
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>NO SPB</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Pengajuan</th>
                                        <th>Nilai</th>
                                        <th>Tanggal</th>
                                        <th>Bank</th>
                                        <th>PERCEPATAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ( $drd as $row ) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="budget[]" value="<?php echo $row['spbspid'] ?>"></td>
                                        <td><?php echo $row['nomor'];?></td>
                                        <td><?php echo $row['nik'];?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td>
                                            <?php
                                                if($row['tipe_pengajuan'] == '2'){
                                                    $tipe_pengajuan = 'Penarikan Simpanan';
                                                    if($row['tipe_penarikan'] == '1'){
                                                        $tipe_pengajuan .= ' - Saldo Tahun Lalu';
                                                    }elseif($row['tipe_penarikan'] == '2'){
                                                        $tipe_pengajuan .= ' - Pensiun';
                                                    }elseif($row['tipe_penarikan'] == '3'){
                                                        $tipe_pengajuan .= ' - Keluar Anggota';
                                                    }else{
                                                        $tipe_pengajuan .= ' - Tidak Diketahui';
                                                    }
                                                }elseif ($row['tipe_pengajuan'] == '5'){
                                                    $tipe_pengajuan = 'Pinjaman Insidentil';
                                                }elseif ($row['tipe_pengajuan'] == '6'){
                                                    $tipe_pengajuan = 'Pinjaman Super Telco';
                                                }

                                                echo $tipe_pengajuan;
                                            ?>
                                        </td>
                                        <td><?php echo $row['nominal'];?></td>
                                        <td><?php echo date('d-m-Y', strtotime($row['tanggal_spb']));?></td>
                                        <td><?php echo $row['bank'].' - '.$row['norek'];?></td>
                                        <td>URGENT</td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { echo 'Belum ada SPB hari ini!'; }?>
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
	});
</script>