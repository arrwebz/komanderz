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
        <th>Nik</th>
        <th>Nama</th>
        <th>Nama (Kaptial)</th>
        <th>KTP</th>
        <th>NPWP</th>
        <th>PASSPORT</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['nik'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo strtoupper($row['fullname']) ?></td>
            <td><?php echo "'".$row['idcard'] ?></td>
            <td><?php echo "'".$row['npwp'] ?></td>
            <td><?php echo "'".$row['passport'] ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>