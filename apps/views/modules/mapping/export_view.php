<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=export_orders_{$filter_year}_".date('Ymd_His').".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

    <h3>Data Invoice & SPB</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>No Invoice</th>
                <th>Project</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Tanggal Invoice</th>
                <th>SPB List</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)) { 
                $no = 1;
                foreach ($results as $row) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['code'] ?></td>
                    <td><?= $row['projectname'] ?></td>
                    <?php if($row['orderstatus'] == 'OBL') { ?>
                        <td><?= number_format($row['basevalue'], 0, ',', '.') ?></td>
                    <?php } else { ?>
                        <td><?= number_format($row['negovalue'], 0, ',', '.') ?></td>
                    <?php } ?>
                    <td><?= $row['orderstatus'] ?></td>
                    <?php if($row['orderstatus'] == 'OBL') { ?>
                        <td><?= date('d-m-Y', strtotime($row['invdate'])) ?></td>
                    <?php } else { ?>
                        <td><?= date('d-m-Y', strtotime($row['crdat'])) ?></td>
                    <?php } ?>
                    <td><?= !empty($row['spb_list']) ? $row['spb_list'] : '-' ?></td>
                </tr>
            <?php } } else { ?>
                <tr><td colspan="7">Data tidak ada</td></tr>
            <?php } ?>
        </tbody>
    </table>
