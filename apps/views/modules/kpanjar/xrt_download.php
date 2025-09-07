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
				<th>Kode Panjar</th> 
				<th>Tipe</th>
				<th>Divisi</th> 
				<th>Segmen</th>
				<th>PIC User</th>
				<th>AM Komet</th>
				<th>Nama Proyek</th>  
				<th>Nilai Justifikasi</th> 
				<th>Nilai Nego</th> 
				<th>Nilai SPB</th> 
				<th>Status</th> 
				<th>Tanggal</th> 
				<th>Keterangan</th> 
           </tr>
  
      </thead>
 
      <tbody>
			<?php $i = 0; ?> 
            <?php foreach($drd as $row) { ?>
			<?php $i++; ?>
           <tr>
				<td><?php echo $i; ?></td> 
				<td><?php echo $row['code']; ?></td>
				<td><?php echo $row['jobtype'] ?></td>
				<td><?php echo $row['division']; ?></td>  
				<td><?php echo $row['segment']; ?></td>
				<td><?php echo $row['amuser']; ?></td>
				<td><?php echo $row['amkomet']; ?></td> 
				<td><?php echo $row['projectname']; ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['jstvalue'])),3))); ?></td>
				<td><?php echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3))); ?></td>
				<td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['totalspb'])),3))); ?></strong></td>
				<td><?php if($row['position'] == 'closed') echo 'closed'; else echo 'open' ?></td>
				<td><?php echo $row['collectdate']; ?></td>
				<td><?php echo $row['notes']; ?></td>
			</tr>
 
           <?php } ?>
 
      </tbody>
 
 </table>