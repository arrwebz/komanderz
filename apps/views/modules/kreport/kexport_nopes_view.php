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
				<th>F Pajak</th> 
				<th>Tipe</th>
				<th>Segmen</th>
				<th>AM User</th>
				<th>Nama Proyek</th> 
				<th>Nilai Dasar</th> 
				<th>Nilai Dasar PPN</th> 
				<th>Nilai NET</th>
				<th>Nilai Margin</th> 
				<th>Nilai Justifikasi</th> 
				<th>Nilai Nego</th> 
				<th>Tanggal</th> 
				<th>Status</th> 
				<th>SPB</th> 
           </tr>
  
      </thead>
 
      <tbody>
			<?php $i = 0; ?> 
            <?php foreach($drd as $row) { ?>
			<?php $i++; ?>
           <tr>
				<td><?php echo $i; ?></td>
				<td><?php if($row['invnum'] == 0) echo 'PRPO'; else echo $row['invnum'].'/INV/'.$row['jobtype'].'/'.date('m/y', strtotime($row['invdate'])); ?></td>
				<td><?php echo $row['faknum']; ?></td>  
				<td><?php echo $row['jobtype'] ?></td>
				<td><?php echo $row['segment']; ?></td>
				<td><?php echo $row['amuser']; ?></td>
				<td><?php echo $row['projectname']; ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['ppnvalue'])),3))); ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['netvalue'])),3))); ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['marginvalue'])),3))); ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['jstvalue'])),3))); ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3))); ?></td>
				<td><?php echo date('d/m/y', strtotime($row['invdate'])); ?></td>
				<td><?php if($row['status'] == '0') echo 'Belum'; elseif($row['status'] == '1') echo 'Cair' ?></td>
				<td><?php if($row['spbid'] == '0') echo 'Belum'; elseif($row['spbid'] != '0') echo 'Sudah' ?></td>
			</tr>
 
           <?php } ?>
 
      </tbody>
 
 </table>