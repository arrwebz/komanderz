<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table width="100%" style="border-collapse: collapse;">
    <tbody>
        <tr>
            <td colspan="13" style="text-align: center">
                <strong style="font-size: 30px;">DAFTAR LEMBUR KARYAWAN</strong>
                <br>KOPERASI METROPOLITAN
            </td>
        </tr>
    </tbody>
</table>

<br>

<table width="100%" style="border-collapse: collapse;">
    <tbody>
    <tr>
        <td colspan="2"><strong>Nama</strong></td>
        <td width="1%">:</td>
        <td><strong><?php echo $nama;?></strong></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Periode</strong></td>
        <td>:</td>
        <td><strong><?php echo $periode;?></strong></td>
    </tr>
    </tbody>
</table>

<br>

<table border="1" width="100%" style="border-collapse: collapse;">
    <thead>
    <tr>
        <th rowspan="2" width="2%">No</th>
        <th rowspan="2" colspan="3" width="20%">Tanggal</th>
        <th rowspan="2" colspan="5" width="40%">Kegiatan</th>
        <th colspan="2" width="20%">Jam</th>
        <th rowspan="2" width="10%">Durasi</th>
        <th rowspan="2" width="10%">Nilai</th>
    </tr>
    <tr>
        <th width="10%"  style="text-align: center;">Mulai</th>
        <th width="10%"  style="text-align: center;">Berakhir</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php
    $sum_hours = 0;
    $sum_makan = 0;
    $sum_nilai = 0;
    ?>
    <?php foreach ( $overtime as $rov ) { ?>
        <?php $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td colspan="3"><?php echo customDate($rov['datetime']); ?></td>
            <td colspan="5"><?php echo $rov['notes'] ?></td>
            <td style="text-align: center;"><?php echo date('H:i',strtotime($rov['datetime'])); ?></td>
            <td style="text-align: center;"><?php echo '22:00'; ?></td>
            <td style="text-align: right;">
                <strong>
                <?php
                $minutes = date('i', strtotime($rov['datetime']));
                if($minutes == '00'){
                    $starthours = date('H', strtotime($rov['datetime']));
                }else{
                    if($minutes <= '30'){
                        $starthours = date('H', strtotime($rov['datetime']));
                    }else{
                        $starthours = date('H', strtotime($rov['datetime']))+0.5;
                    }
                }
                $endhours = '22';
                $totalhours = $endhours-$starthours;
                if($totalhours >= '3'){
                    $sum_makan += '25000';
                }
                $sum_hours += $totalhours;
                echo $totalhours.' Jam';
                ?>
                </strong>
            </td>
            <td style="text-align: right;">
                <strong>
                <?php
                $totalnilai = $totalhours*20000;
                $sum_nilai += $totalnilai;
                echo $totalnilai;
                ?>
                </strong>
            </td>
        </tr>
    <?php }	?>
    </tbody>
    <tfoot>
    <tr style="border-top:2px solid #201e1f42">
        <td colspan="9"></td>
        <td colspan="2" style="text-align: center;"><strong>TOTAL</strong></td>
        <td style="text-align: right;"><strong><?php echo $sum_hours;?> Jam</strong></td>
        <td style="text-align: right;"><strong><?php echo $sum_nilai;?></strong></td>
    </tr>
    </tfoot>
</table>

<br><br>

<table width="100%" style="border-collapse: collapse;">
    <tbody>
    <tr>
        <td colspan="4" style="text-align: center;" >
            <strong>Karyawan</strong>
        </td>
        <td colspan="5"></td>
        <td colspan="4" style="text-align: center;" >
            <strong>Mengetahui,</strong>
        </td>
    </tr>
    <tr>
        <td style="height: 120px;" colspan="4"></td>
        <td colspan="5"></td>
        <td style="height: 120px;" colspan="4"></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center;" >
            <strong>( <?php echo $nama;?> )</strong>
        </td>
        <td colspan="5"></td>
        <td colspan="4" style="text-align: center;" >
            <strong>( <?php echo $manager;?> )</strong>
        </td>
    </tr>
    </tbody>
</table>