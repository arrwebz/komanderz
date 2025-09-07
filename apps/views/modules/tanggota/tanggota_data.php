<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
    <tr>
        <th class="text-center" width="5%">No</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Info Iuran</th>
        <th>Info Saldo</th>
        <th class="text-center">Tipe Anggota</th>
        <th class="text-center">Status</th>
        <th class="disabled-sorting text-right"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th class="text-center" width="5%">No</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Info Iuran</th>
        <th>Info Saldo</th>
        <th class="text-center">Tipe Anggota</th>
        <th class="text-center">Status</th>
        <th class="disabled-sorting text-right"></th>
    </tr>
    </tfoot>
    <tbody>
    <?php
    $i = 0;
    foreach ( $drd as $row ) {
        $i++;

        if($row['status'] == '2' || $row['status'] == '3'){
            $show_tipeanggota = '';
        }else{
            if($row['tipe_anggota'] == '1'){
                $show_tipeanggota = '<span class="label label-success">Anggota Aktif</span>';
            }elseif($row['tipe_anggota'] == '2'){
                $show_tipeanggota = '<span class="label label-success">Anggota Istimewa</span>';
            }elseif($row['tipe_anggota'] == '3'){
                $show_tipeanggota = '<span class="label label-success">Anggota Pindah Loker</span>';
            }elseif($row['tipe_anggota'] == '4'){
                $show_tipeanggota = '<span class="label label-danger">Anggota Pensiun</span>';
            }elseif($row['tipe_anggota'] == '5'){
                $show_tipeanggota = '<span class="label label-default">Anggota Keluar</span>';
            }else{
                $show_tipeanggota = '<span class="label label-default">Tidak Diketahui</span>';
            }
        }

        if($row['status'] == '1'){
            $show_status = '<span class="badge text-bg-secondary">Aktif</span>';
        }elseif($row['status'] == '2'){
            $show_status = '<span class="badge text-bg-primary">Non Aktif</span>';
        }elseif($row['status'] == '3'){
            $show_status = '<span class="badge text-bg-warning">Konfirmasi</span>';
            $show_status .= '<br>'.$row['notes'];
        }else{
            $show_status = '<span class="badge text-bg-dark">Tidak Diketahui</span>';
        }
        ?>
        <tr>
            <td class="text-center"><?php echo $i; ?></td>
            <td><b><?php echo $row['nik'] ?></b></td>
            <td><b><?php echo $row['name'] ?></b></td>
            <td>
                <?php /*echo $row['band_name'] */?><!-- : Rp. <?php /*echo strrev(implode('.',str_split(strrev(strval($row['band_value'])),3))); */?>
                        <br>Simpanan Sukarela : Rp. <?php /*echo strrev(implode('.',str_split(strrev(strval($row['simpanan_sukarela'])),3))); */?>
                        <br>Total Iuran : Rp. <?php /*echo strrev(implode('.',str_split(strrev(strval($row['band_value']+$row['simpanan_sukarela'])),3))); */?>
                        <br>
                        <hr>-->
                <b>Payroll</b>
                <br>Nominal Iuran : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['iuran_bulan_ini'])),3))); ?>
                <br>Bulan : <?php echo $row['bulan_ini'] ?>
                <br>Tahun : <?php echo $row['tahun_ini'] ?>
                <br>Per : <?php echo $row['note_payroll'] ?>
            </td>
            <td>
                <?php if($row['status'] == '1'){?>
                Simpanan Tahun Lalu : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['saldo_simpanan_tahun_lalu_ok'])),3))); ?>
                <br>Simpanan Tahun Ini : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['saldo_simpanan_tahun_ini'])),3))); ?>
                <br>
                <hr>
                <?php } ?>
                <b>Total simpanan : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['total_saldo_simpanan'])),3))); ?></b>

                <?php if($row['status'] == '1'){?>
                <br>Per : <?php echo $row['note_payroll'] ?>
                <?php } ?>
            </td>
            <td class="text-center"><?php echo $show_tipeanggota; ?></td>
            <td class="text-center"><?php echo $show_status;?><br></td>
            <td class="text-right js-sweetalert">
                <?php if($role == '1'){ ?>
                    <a href="<?php echo base_url().$this->router->fetch_class(). '/editanggota/'.$row['nik']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                        <i class="fs-4 ti ti-edit text-warning"></i>
                    </a>
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
</script>