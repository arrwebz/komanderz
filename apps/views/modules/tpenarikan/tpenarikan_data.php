<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
    <tr>
        <th class="text-center" width="5%">No</th>
        <th>Nomor Pengajuan</th>
        <th>Nomor SPB</th>
        <th>NIK</th>
        <th>Nama</th>
        <th class="text-center">Tipe Penarikan</th>
        <th>Nilai</th>
        <th>Info Pembayaran</th>
        <th class="disabled-sorting text-center">Bukti Transfer</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th class="text-center" width="5%">No</th>
        <th>Nomor Pengajuan</th>
        <th>Nomor SPB</th>
        <th>NIK</th>
        <th>Nama</th>
        <th class="text-center">Tipe Penarikan</th>
        <th>Nilai</th>
        <th>Info Pembayaran</th>
        <th class="disabled-sorting text-center">>Bukti Transfer</th>
    </tr>
    </tfoot>
    <tbody>
    <?php
    $i = 0;
    foreach ( $drd as $row ) {
        $i++;
        if($row['tipe_penarikan'] == '1'){
            $show_tipepenarikan = '<span class="label label-default">Simpanan</span>';
        }elseif($row['tipe_penarikan'] == '2'){
            $show_tipepenarikan = '<span class="label label-default">Pensiun</span>';
        }elseif($row['tipe_penarikan'] == '3'){
            $show_tipepenarikan = '<span class="label label-default">Keluar</span>';
        }else{
            $show_tipepenarikan = '<span class="label label-default">Tidak Diketahui</span>';
        }
        ?>
        <tr>
            <td class="text-center"><?php echo $i; ?></td>
            <td>
                <a href="<?php echo site_url('tpengajuan/detail/'.$row['pengajuanid']);?>" class="text-aqua" target="_blank">
                    <strong><?php echo $row['nomor_pengajuan'];?></strong>
                </a>
            </td>
            <td>
                <a href="<?php echo site_url('tspbsp/detail/'.$row['spbspid']);?>" class="text-aqua" target="_blank">
                    <strong><?php echo $row['nomor_spb'];?></strong>
                </a>
            </td>
            <td><?php echo $row['nik'];?></td>
            <td><?php echo $row['nama'];?></td>
            <td class="text-center"><?php echo $show_tipepenarikan;?></td>
            <td style="color: #fa591d;">
                <strong><?php echo strrev(implode('.',str_split(strrev(strval($row['nominal_penarikan'])),3)));?></strong>
            </td>
            <td>
                Bank : <?php echo $row['bank'];?>
                <br>Norek : <?php echo $row['norek'];?>
                <br>Atas nama : <?php echo $row['atas_nama'];?>
            </td>
            <td class="text-center">
                <a id="lightboxImages" href="javascript:"><i class="fa fa-image"></i></a>
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