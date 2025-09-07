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
            <th>Order Status</th>
            <th>Unit</th>
            <th>Segmen</th>
            <th>SPB</th>
            <th>Keterangan</th>
            <th>Nilai SPB</th>
            <th>Status SPB</th>
            <th>Invoice</th>
            <th>Tel/SPK/VSO</th>
            <th>Projek</th>
            <th>User</th>
            <th>Pembayaran</th>
            <th>Nilai NET</th>
            <th>Tanggal Pembuatan</th>
            <th>Tanggal Pembayaran</th>
            <th>Status Invoice</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sum_value_spb = 0;
            $sum_base_value = 0;
            $i = 0;
			
            foreach ( $drd as $row ) {
				if(empty($row['basevalue'])){
					$row['basevalue'] = 0;
				}
				if(empty($row['negovalue'])){
					$row['negovalue'] = 0;
				}
			
                $sum_value_spb += $row['value'];
                if($row['invnum'] == 0){
                    $sum_base_value += $row['negovalue'];
                }else{
                    $sum_base_value += $row['basevalue'];
                }
                ?>
            <?php $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['orderstatus']; ?></td>
                <td><?php echo $row['unit']; ?></td>
                <td><?php echo $row['segment']; ?></td>
                <td><?php echo $row['code']; ?></td>
                <td><?php echo $row['info'] ?></td>
                <td><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></td>
                <td><?php if($row['status'] == '0') echo 'Menunggu'; elseif($row['status'] == '1') echo 'Selesai' ?></td>
                <td><?php if($row['invnum'] == 0) echo $row['codeinv']; else echo $row['invnum'].'/'.$row['jobtype'].'/'.date('m/y', strtotime($row['invdate'])); ?></td>
                <td><?php echo $row['spknum']; ?></td>
                <td><?php echo $row['projectname']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td style="text-transform: uppercase;"><?php echo $row['typeofpayment']; ?></td>
                <td><?php if($row['invnum'] == 0) { echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3)));} else { echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3)));}?></td>
                <td><?php echo $row['spbdat']; ?></td>
                <td><?php echo $row['processdate']; ?></td>
                <td><?php if($row['statinv'] != '1') echo 'Belum Cair'; elseif($row['statinv'] == '1') echo 'Cair'; elseif($row['statinv'] == '9') echo 'Batal' ?></td>
            </tr>
        <?php } ?>

        <?php if($optStatinv != 'all'){?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Grand Total SPB :</strong> </td>
                <td><strong><?php echo strrev(implode('.',str_split(strrev(strval($sum_value_spb)),3))); ?></strong></td>
                <td></td>
            </tr>
        <?php }	?>
    </tbody>
</table>