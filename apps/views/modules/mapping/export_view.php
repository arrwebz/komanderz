<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=export_orders_{$filter_year}_".date('Ymd_His').".xls");
?>
<table border="1">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Code</th>
            <th>Project Name</th>
            <th>Base Value</th>
            <th>Status</th>
            <th>Invoice Date</th>
            <th>SPB List</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $row): ?>
        <tr>
            <td><?= $row['orderid']; ?></td>
            <td><?= $row['code']; ?></td>
            <td><?= $row['projectname']; ?></td>
            <td><?= number_format($row['basevalue'], 0, ',', '.'); ?></td>
            <td><?= $row['orderstatus']; ?></td>
            <td><?= $row['invdate'] ? date('d-m-Y', strtotime($row['invdate'])) : ''; ?></td>
            <td><?= $row['spb_list']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>