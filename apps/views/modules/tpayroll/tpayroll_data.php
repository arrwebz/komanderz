<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center" width="5%">No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th class="text-right">Iuran Simpanan</th>
            <th class="text-right">Iuran Bank</th>
            <th class="text-right">Iuran Insidentil</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Status & Tipe Anggota</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="text-center" width="5%">No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th class="text-right">Iuran Simpanan</th>
            <th class="text-right">Iuran Bank</th>
            <th class="text-right">Iuran Insidentil</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Status & Tipe Anggota</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $i = 0;
        foreach ( $drd as $row ) { $i++;

            if($row['status'] == '1'){
                $show_status = '<span class="label label-warning">Production</span>';
            }elseif($row['status'] == '2'){
                $show_status = '<span class="label label-warning">Staging</span>';
            }else{
                $show_status = '<span class="label label-default">Tidak Diketahui</span>';
            }

            if($row['tipe_anggota'] == '1'){
                $show_tipeanggota = '<span class="label label-default">Anggota Aktif</span>';
            }elseif($row['tipe_anggota'] == '2'){
                $show_tipeanggota = '<span class="label label-default">Anggota Istimewa</span>';
            }elseif($row['tipe_anggota'] == '3'){
                $show_tipeanggota = '<span class="label label-default">Pindah Loker</span>';
            }elseif($row['tipe_anggota'] == '4'){
                $show_tipeanggota = '<span class="label label-default">Pensiun</span>';
            }elseif($row['tipe_anggota'] == '5'){
                $show_tipeanggota = '<span class="label label-default">Keluar</span>';
            }else{
                $show_tipeanggota = '<span class="label label-default">Tidak Diketahui</span>';
            }

            if($row['status_anggota'] == '1'){
                $show_statusanggota = '<span class="label label-default">Aktif</span>';
            }elseif($row['status_anggota'] == '2'){
                $show_statusanggota = '<span class="label label-default">Tidak Aktif</span>';
            }elseif($row['status_anggota'] == '3'){
                $show_statusanggota = '<span class="label label-default">Konfirmasi</span>';
            }else{
                $show_statusanggota = '<span class="label label-default">Tidak Diketahui</span>';
            }
            ?>
            <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td><?php echo $row['nik'];?></td>
                <td><?php echo $row['name'];?></td>
                <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['iuran_simpanan'])),3)));?></td>
                <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['iuran_bank'])),3)));?></td>
                <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['iuran_insidentil'])),3)));?></td>
                <td><?php echo $row['bulan'];?></td>
                <td><?php echo $row['tahun'];?></td>
                <td><?php echo $show_tipeanggota.'<br>'.$show_statusanggota;?></td>
                <td class="text-right js-sweetalert">
                    <?php if($role == '1'){ ?>
                        <a href="<?php echo base_url().$this->router->fetch_class(). '/editpayroll/'.$row['payrollid']; ?>" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"> Ubah</i>
                        </a>
                        <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['payrollid']; ?>" class="btn btn-xs btn-default"><i class="fa fa-trash-o"> Hapus</i></button>
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
		var current_url = "<?php echo base_url("tpayroll");?>";
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
								$('#formSearch').trigger('submit');
							}, 1500);
						}

					}
				})

			}
		});
	}
</script>