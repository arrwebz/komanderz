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
        <th>Invoice</th>
        <th>Project Name</th>
        <th>SPB Count</th>
        <th>Amount</th>
        <th>Invoice Date</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++; ?>
        <tr> 
            <td><?php echo $i; ?></td>
            <td><?php echo $row['invoice_no'] ?></td>
                <?php if (!empty($row['spbs'])) foreach($row['spbs'] as $s){ ?>
                <tr>
                    <td><?php echo $s['spb_no_link'] ?></td>
                    <td><?php echo strrev(implode('.',str_split(strrev(strval($s['spb_amount_fmt'])),3)))?></td>
                    <td><?php echo $s['payment_date']?></td>
                </tr>
                <?php } ?>
            <td><?php echo $row['project_name'] ?></td>
            <td><?php echo $row['spb_count'] ?></td>
            <td><?php echo strrev(implode('.',str_split(strrev(strval($row['amount'])),3))) ?></td>
            <td><?php echo $row['invoice_date']?></td>
        </tr>
    <?php }?>
    </tbody>
</table>