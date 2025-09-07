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
        <th>Divisi</th>
        <th>Nama</th>
        <th>Nama (Kaptial)</th>
        <th>Email</th>
        <th>Tempat/Tanggal Lahir</th>
        <th>Golongan Darah</th>
        <th>Status Karyawan</th>
        <th>Education</th>
        <th>KTP</th>
        <th>NPWP</th>
        <th>PASSPORT</th>
        <th>PASSPORT EXPIRED</th>
        <th>Ukuran Baju</th>
        <th>Ukuran Jaket</th>
        <th>Ukuran Celana</th>
        <th>Ukuran Sepatu</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['nik'] ?></td>
            <td><?php echo $row['groupcode'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo strtoupper($row['fullname']) ?></td>
            <td><?php echo "'".$row['email'] ?></td>
            <td><?php echo "'".$row['pob'].','. date('d-m-Y', strtotime($row['dob']))?></td>
            <td><?php echo "'".$row['bloodtype'] ?></td>
            <td><?php echo "'".$row['userstatus'] ?></td>
            <td><?php echo "'".$row['education'] ?></td>
            <td><?php echo "'".$row['idcard'] ?></td>
            <td><?php echo "'".$row['npwp'] ?></td>
            <td><?php echo "'".$row['passport'] ?></td>
            <td><?php echo "'".$row['passportexp'] ?></td>
            <td><?php echo "'".$row['sizeshirt'] ?></td>
            <td><?php echo "'".$row['sizejacket'] ?></td>
            <td><?php echo "'".$row['sizepants'] ?></td>
            <td><?php echo "'".$row['sizeshoes'] ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>