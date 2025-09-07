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
				<th>Segmen</th>
				<th>SPB</th> 
				<th>Keterangan</th>
				<th>Nilai SPB</th> 
				<th>Status SPB</th> 
				<th>Invoice</th>
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
			<?php $i = 0; ?> 
            <?php foreach($drd as $row) { ?>
			<?php $i++; ?>
           <tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['unit']; ?></td>
				<td><?php echo $row['segment']; ?></td>
				<td><?php echo $row['code']; ?></td>  
				<td><?php echo $row['info'] ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></td>
				<td><?php if($row['status'] == '0') echo 'Menunggu'; elseif($row['status'] == '1') echo 'Selesai' ?></td>
				<td><?php if($row['invnum'] == 0) echo 'PRPO'; else echo $row['invnum'].'/'.$row['jobtype'].'/'.date('m/y', strtotime($row['invdate'])); ?></td>
				<td><?php echo $row['projectname']; ?></td> 
				<td><?php echo $row['customer']; ?></td>
				<td style="text-transform: uppercase;"><?php echo $row['typeofpayment']; ?></td>
				<td><?php if($row['invnum'] == 0) { echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3)));} else { echo strrev(implode('.',str_split(strrev(strval($row['netvalue'])),3)));}?></td>
				<td><?php echo date('d/m/y', strtotime($row['spbdat'])); ?></td>
				<td><?php echo date('d/m/y', strtotime($row['processdate'])); ?></td>
				<td><?php if($row['statinv'] != '1') echo 'Belum Cair'; elseif($row['statinv'] == '1') echo 'Cair'; elseif($row['statinv'] == '9') echo 'Batal' ?></td>
			</tr>
 
           <?php } ?>
 
      </tbody>
 
 </table>