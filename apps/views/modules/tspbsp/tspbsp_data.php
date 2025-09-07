<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center" width="5%">No</th>
            <th>Nomor SPB</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tipe Pengajuan</th>
            <th>Nilai</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="text-center" width="5%">No</th>
            <th>Nomor SPB</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tipe Pengajuan</th>
            <th>Nilai</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $i = 0;
        foreach ( $drd as $row ) {
            $i++;
            if($row['tipe_pengajuan'] == '1'){
                $show_tipepengajuan = '<span class="label label-default">Anggota Baru</span>';
            }elseif($row['tipe_pengajuan'] == '2'){
                $show_tipepengajuan = '<span class="label label-default">Penarikan Simpanan</span>';
            }elseif($row['tipe_pengajuan'] == '3'){
                $show_tipepengajuan = '<span class="label label-default">Perubahan Simpanan</span>';
            }elseif($row['tipe_pengajuan'] == '4'){
                $show_tipepengajuan = '<span class="label label-default">Perubahan Data</span>';
            }elseif($row['tipe_pengajuan'] == '5'){
                $show_tipepengajuan = '<span class="label label-default">Pinjaman Insidentil</span>';
            }elseif($row['tipe_pengajuan'] == '6'){
                $show_tipepengajuan = '<span class="label label-default">Pinjaman Koptel</span>';
            }else{
                $show_tipepengajuan = '<span class="label label-default">Tidak Diketahui</span>';
            }

            if($row['status'] == '1'){
                $show_status = '<span class="label label-warning">SPB Dibuat</span>';
            }elseif($row['status'] == '2'){
                $show_status = '<span class="label label-success">SPB Proses</span>';
            }elseif($row['status'] == '3'){
                $show_status = '<span class="label label-success">SPB Selesai</span>';
            }else{
                $show_status = '<span class="label label-default">Tidak Diketahui</span>';
            }

            if($row['platform'] == '2'){
                $show_name = $row['nama'];
            }else{
                $show_name = $row['name'];
            }
            ?>
            <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td>
                    <a href="<?php echo site_url('tspbsp/detail/'.$row['spbspid']);?>" class="text-aqua">
                        <strong><?php echo $row['nomor'];?></strong>
                    </a>
                </td>
                <td><?php echo $row['nik'];?></td>
                <td><?php echo $show_name;?></td>
                <td><?php echo $show_tipepengajuan;?></td>
                <td style="color: #fa591d;">
                    <strong><?php echo strrev(implode('.',str_split(strrev(strval($row['nominal'])),3)));?></strong>
                </td>
                <td class="text-right js-sweetalert">
                    <strong><?php echo customDate($row['tanggal_spb'].' 00:00:00');?></strong>
                    <br>
                    <?php if($row['tipe_pengajuan'] == '2' || $row['tipe_pengajuan'] == '5' || $row['tipe_pengajuan'] == '6'){?>
                        <?php if($row['status'] == '1'){?>
                            <a href="<?php echo site_url('tspbsp/updatestatus/'.$row['spbspid']);?>" class="btn btn-xs btn-warning" title="SPB DIBUAT">
                                <i class="ti ti-star-off"> SPB Dibuat</i>
                            </a>
                        <?php } ?>
                        <?php if($row['status'] == '2'){?>
                            <a href="<?php echo site_url('tspbsp/updatestatus/'.$row['spbspid']);?>" class="btn btn-xs btn-warning">
                                <i class="ti ti-star"> SPB Proses</i>
                            </a>
                        <?php } ?>
                        <?php if($row['status'] == '3'){?>
                            <a href="javascript:" class="btn btn-xs btn-success">
                                <i class="ti ti-star"> SPB Selesai</i>
                            </a>
                        <?php } ?>
                    <?php } ?>

                    <?php if($role == '1'){ ?>
                        <a href="<?php echo base_url().$this->router->fetch_class(). '/editspbsp/'.$row['spbspid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                            <i class="fs-4 ti ti-edit text-warning"></i>
                        </a>
                        <button data-href="<?php echo base_url().$this->router->fetch_class().'/delete';?>" data-id="<?php echo $row['spbspid'];?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                            <i class="fs-4 ti ti-trash text-danger"></i>
                        </button>
                    <?php } ?>
                </td>
            </tr>
        <?php }	?>
    </tbody>
</table>

<script>
	$(function() {
		var table = $('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollX': true,
		});
	});

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url().$this->router->fetch_class();?>";
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
					data: 'id=' + id,
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