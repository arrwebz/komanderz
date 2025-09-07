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
        <th>Type</th>
        <th>PIC</th>
        <th>AR</th>
        <th>AM</th>
        <th>Status</th>
        <th>Last Update</th>
    </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        <?php foreach ( $drd as $row ) { ?>
            <?php $i++; ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['orderstatus'];?></td>
                <td><?php echo $row['amuser'];?></td>
                <td>
                <?php
                    if($row['amkomet'] == 'Sigit Hidayatullah' || $row['amkomet'] == 'Isnanza Zulkarnaini'){
                        $ar = 'Iman Suryana';
                    }elseif($row['amkomet'] == 'Vania Miranda Putri'){
                        $ar = 'Muhamad Luthfi';
                    }elseif($row['amkomet'] == 'Eva Ayu Komala'){
                        $ar = 'Indra Saputra';
                    }else{
                        $ar = 'Agung';
                    }
                    echo $ar;
                ?>
                </td>
                <td><?php echo $row['amkomet'];?></td>
                <td>
                    <?php
                    switch ($row['status']) {
                        case '0':
                            echo '<span class="label label-warning">Accurate</span>';
                            break;
                        case '1':
                            echo '<span class="label label-success">PAID</span>';
                            break;
                        case '2':
                            echo '<span class="label label-info">Segmen</span>';
                            break;
                        case '3':
                            echo '<span class="label label-warning">Invidea</span>';
                            break;
                        case '4':
                            echo '<span class="label label-warning">Precise</span>';
                            break;
                        case '16':
                            echo '<span class="label label-primary">LOGISTIK</span>';
                            break;
                        case '18':
                            echo '<span class="label bg-olive">Keuangan</span>';
                            break;
                        case '6':
                            echo '<span class="label bg-olive">Keuangan</span>';
                            break;
                        case '7':
                            echo '<span class="label bg-purple">Legal</span>';
                            break;
                        case '10':
                            echo '<span class="label bg-maroon">Forecasting</span>';
                            break;
                        default:
                            echo '<span class="label label-danger">Belum Cair</span>';
                    }
                    ?>
                </td>
                <td><strong><?php echo $row['code'];?></strong></td>
            </tr>
        <?php }	?>
    </tbody>
</table>