<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
    <tr>
        <th>Invoice</th>
        <th>SPB Number</th>
        <th>Amount</th>
        <th>Payment Date</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++; ?>
        <tr> 
            <td><?php echo $i; ?></td>
            <td><?php echo $row['inv_number'] ?></td>
            <td><?php echo $row['spb_number'] ?></td>
            <td><?php echo strrev(implode('.',str_split(strrev(strval($row['spb_value'])),3))) ?></td>
            <td><?php echo $row['amuser'] ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>