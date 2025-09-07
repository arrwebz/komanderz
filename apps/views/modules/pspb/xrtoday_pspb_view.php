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
            <th>Segmen</th>
            <th>SPB</th>
            <th>Invoice</th>
            <th>PADI</th>
			
            <th>Nilai</th>
            <th>User</th>
			
            <th>Nama Barang</th>
            <th>Transfer / Cash</th>
			
            <th>User</th>
            <th>AM</th>
			
            <th>Rekening</th>
            <th>Permintaan</th>
			
            <th>Ket</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        <?php foreach($drd as $row) { ?>
            <?php $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['segmentname']; ?></td>
                    <td>K <?php echo substr($row['code'],0,4); ?></td>
                    <td>K <?php echo $row['invnum']; ?></td>
                    <td><?php echo $row['spknum'] ?></td>
					
					<td><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></td>
                    <td><?php echo $row['accname']; ?></td>
					
                    <td><?php echo $row['projectname']; ?></td>
                    <td style="text-transform: uppercase;"><?php echo $row['typeofpayment']; ?></td>
					
					<td>Segmen</td>
					<td><?php echo $row['applicant']; ?></td>
					<td><span style="text-transform: uppercase;"><?php echo $row['bank']; ?></span><br><?php echo $row['accname']; ?><br><?php echo $row['accnumber']; ?></td>
					
                    <td><?php echo date('d/m/y', strtotime($row['spbdat'])); ?></td>
					<td> </td>
                </tr>
        <?php } ?>
    </tbody>
</table>