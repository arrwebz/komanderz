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
				<th>Tipe</th>
				<th>SPB</th> 
				<th>Transaksi</th>
				<th>Invoice</th>
				<th>Projek</th>
				<th>Customer</th>
				<th>User</th> 
				<th>Pembayaran</th> 
				<th>Nilai NET</th> 
				<th>Nilai SPB</th> 
				<th>Tanggal</th> 
				<th>Status</th> 
 
           </tr>
  
      </thead>
 
      <tbody>
			<?php $i = 0; ?> 
            <?php foreach($drd as $row) { ?>
			<?php $i++; ?>
           <tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['unit']; ?></td>
				<td><?php echo $row['jobtype'] ?></td>
				<td><?php echo $row['code']; ?></td>  
				<td><?php echo $row['info'] ?></td>
				<td><?php if($row['invnum'] == 0) echo 'PRPO'; else echo $row['invnum'].'/'.$row['jobtype'].'/'.date('m/y', strtotime($row['invdate'])); ?></td>
				<td><?php echo $row['projectname']; ?></td>
				<td><?php echo $row['segmentname']; ?></td>
				<td><?php echo $row['customer']; ?></td>
				<td style="text-transform: uppercase;"><?php echo $row['typeofpayment']; ?></td>
				<td><?php if($row['invnum'] == 0) { echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3)));} else { echo strrev(implode('.',str_split(strrev(strval($row['netvalue'])),3)));}?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></td>
				<td><?php echo date('d/m/y', strtotime($row['spbdat'])); ?></td>
				<td><?php if($row['status'] == '0') echo 'Menunggu Konfirmasi'; elseif($row['status'] == '1') echo 'Selesai'; elseif($row['status'] == '2') echo 'Proses Bank' ?></td>
			</tr>
 
           <?php } ?>
 
      </tbody>
 
 </table>