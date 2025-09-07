<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Unit</th>
        <th>Divisi</th>
        <th>Segmen</th>
        <th>User</th>
        <th>AM</th>
        <th>Kode</th>
        <th>Invoice</th>
        <th>Faktur</th>
        <th>Tel/SPK/VSO</th>
        <th>Tanggal Tel</th>
        <th>Judul</th>
        <th>Nilai Dasar</th>
        <th>Nilai Net</th>
        <th>Nilai Cair Voucher</th>
        <th>Tanggal Invoice</th>
        <th>Tanggal Cair</th>
        <th>Status</th>
        <th>SPB</th>
        <th>Total SPB</th>
        <th>Profit Share</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++; ?>
        <tr> 
            <td><?php echo $i; ?></td>
            <td><?php echo $row['unit'] ?></td>
            <td><?php echo $row['code_division'] ?></td>
            <td><?php echo $row['code_segment'] ?></td>
            <td><?php echo $row['amuser'] ?></td>
            <td><?php echo $row['amkomet'] ?></td>
            <td style="text-transform: uppercase;"><?php echo $row['code'] ?></td>
            <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:black;">'.$row['invnum'].'</p>';  ?></td>
            <td><?php echo $row['faknum'] ?></td>
            <td><?php echo $row['spknum'] ?></td>
            <td><?php echo $row['spkdat'] ?></td>
            <td><?php echo $row['projectname'] ?></td>
            <td><?php if($row['invnum'] == 0) { echo strrev(implode('.',str_split(strrev(strval($row['jstvalue'])),3)));} else { echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3)));}?></td>
            <td><?php if($row['invnum'] == 0) { echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3)));} else { echo strrev(implode('.',str_split(strrev(strval($row['netvalue'])),3)));}?></td>
            <td><?php if($row['invnum'] == 0) { echo '0'; } else { echo strrev(implode('.',str_split(strrev(strval($row['vrecvalue'])),3)));}?></td>
            <td><?php echo $row['invdate'] ?></td>
            <td><?php echo $row['procdat'] ?></td>
            <td><?php switch ($row['status']) {
                    case '1':
                        echo '<span style="color:green;">Sudah Cair</span>';
                        break;
                    case '2':
                        echo '<span style="color:#636e72;">Segmen</span>';
                        break;
                    case '3':
                        echo '<span style="color:#636e72;">PJM</span>';
                        break;
                    case '4':
                        echo '<span style="color:#636e72;">ASD</span>';
                        break;
                    case '5':
                        echo '<span style="color:#636e72;">Logistik</span>';
                        break;
                    case '6':
                        echo '<span style="color:#636e72;">Keuangan</span>';
                        break;
                    case '7':
                        echo '<span style="color:#636e72;">Legal</span>';
                        break;
                    case '8':
                        echo '<span style="color:#636e72;">Posting Keuangan</span>';
                        break;
                    case '9':
                        echo '<span style="color:red;">Batal</span>';
                        break;
                    case '10':
                        echo '<span style="color:#636e72;">Forecast Pencairan</span>';
                        break;
                    case '11':
                        echo '<span style="color:#636e72;">Materai</span>';
                        break;
                    case '12':
                        echo '<span style="color:#636e72;">Tanda Tangan</span>';
                        break;
                    case '13':
                        echo '<span style="color:#636e72;">Segmen</span>';
                        break;
                    case '14':
                        echo '<span style="color:#636e72;">PJM</span>';
                        break;
                    case '15':
                        echo '<span style="color:#636e72;">ASD</span>';
                        break;
                    case '16':
                        echo '<span style="color:#636e72;">Logistik</span>';
                        break;
                    case '17':
                        echo '<span style="color:#636e72;">Legal</span>';
                        break;
                    case '18':
                        echo '<span style="color:#636e72;">Verifikasi Keuangan</span>';
                        break;
                    default:
                        echo '<i style="color:red;">Belum Cair</i>';
                } ?>
            </td>
            <td><?php if($row['spbid'] == '0') echo '<i style="color:#636e72;">Belum SPB</i>'; elseif($row['spbid'] != '0') echo '<span style="color:blue;">Sudah SPB</span>';  ?></td>
            <td><?php echo strrev(implode('.',str_split(strrev(strval($row['totalvalspb'])),3)));?></td>
            <td><?php echo $row['profitshare'];?></td>
        </tr>
    <?php }?>
    </tbody>
</table>