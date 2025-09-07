 <!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
</head>
<body>
 <?php
 
 header("Content-type: application/vnd.ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 <center>
		<h1><?php if($unit == 'KOMET') echo '<h3>RINCIAN PENGELUARAN KOPERASI METROPOLITAN</h3>'; else echo '<h3>RINCIAN PENGELUARAN PT. METROPOLITAN SEJAHTERA</h3>'; ?></h1>
	</center>
 
 <table border="1" width="100%">
 
      <thead>  
 
           <tr>
			<th>No.</th>
			<th>Dept</th>
			<th>SPB</th>
			<th>Transaksi</th>
			<th>Customer</th>
			<th>User</th>
			<th>Jenis</th>
			<th>Invoice</th>
			<th>Tahun</th>
			<th>Projek</th>
			<th>Nilai Pekerjaan</th>
			<th>Total Panjar Sebelumnya</th>
			<th>Jumlah SPB</th>
			<th>Status Pekerjaan</th>
			<th>Kepada</th>
			<th>Posisi</th>
		  </tr>
  
      </thead>
 
      <tbody>
			<?php
				$sum = 0;
				$i = 0;
				for ($row = 0; $row < $rowcount; $row++) {
				$i++;	
				  echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td>'.$rowtable[$row][0]['jobtype'].'</td>';
					echo '<td>'.$rowtable[$row][0]['code'].'</td>';
					echo '<td>'.$rowtable[$row][0]['info'].'</td>';
					echo '<td>'.$rowtable[$row][0]['segment'].'</td>';
					echo '<td>'.$rowtable[$row][0]['customer'].'</td>';
					echo '<td>'.$rowtable[$row][0]['orderstatus'].'</td>';
                    if ($rowtable[$row][0]['invnum'] == 0 ) {
                        echo '<td>&#39;' . substr($rowtable[$row][0]['codeinv'], 0, 3) . '</td>';
                        echo '<td>' . date('d-m-Y', strtotime($rowtable[$row][0]['crdat'])) . '</td>';
                    }else{
                        echo '<td>&#39;'.$rowtable[$row][0]['invnum'].'</td>';
                        echo '<td>' . date('d-m-Y', strtotime($rowtable[$row][0]['invdate'])) . '</td>';
                    }
					echo '<td>&#39;'.$rowtable[$row][0]['projectname'].'</td>';
                    if($rowtable[$row][0]['orderinv'] == '1'){
					echo '<td>'.strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['netvalue'])),3))).'</td>';
					} else {
					echo '<td>'.strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['negovalue'])),3))).'</td>';	
					}
					echo '<td>'.strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['totalvalue'])),3))).'</td>';
					echo '<td>'.strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['value'])),3))).'</td>';
					if($rowtable[$row][0]['saldovalue'] == NULL){
					echo '<td align="center">C</td>';
					} else {
					echo '<td align="center">S</td>';	
					}$invnotess = $rowtable[$row][0]['invnotes'];
			if($invnotess == ''){
				$invnotess = 'Silahkan update posisi.';
			} else {
				$invnotess = $rowtable[$row][0]['invnotes'];
			}
			// invstatus ambil dari table billco
			// status ambil dari table order 
			echo '<td>'.$rowtable[$row][0]['accname'].'</td>';	
			if($rowtable[$row][0]['invstatus'] == '1'){
			echo '<td align="center">';
			echo '<p style="font-weight:bold">Cair</p> ( '.$rowtable[$row][0]['vrecnum'].' )';
			echo '</td>';
			} elseif($rowtable[$row][0]['invstatus'] == '2') {
			echo '<td align="center">';
			echo '<p style="font-weight:bold">Segmen</p> ( '.$invnotess.' )';
			echo '</td>';	
			} elseif($rowtable[$row][0]['invstatus'] == '3') {	
			echo '<td align="center">';
			echo '<p style="font-weight:bold">PJM</p> ( '.$invnotess.' )';
			echo '</td>';
			} elseif($rowtable[$row][0]['invstatus'] == '4') {
			echo '<td align="center">';
			echo '<p style="font-weight:bold">ASD</p> ( '.$invnotess.' )';
			echo '</td>';
			} elseif($rowtable[$row][0]['invstatus'] == '5') {
			echo '<td align="center">';
			echo '<p style="font-weight:bold">Logistik</p> ( '.$invnotess.' )';
			echo '</td>';
			} elseif($rowtable[$row][0]['invstatus'] == '6') {
			echo '<td align="center">';
			echo '<p style="font-weight:bold">Keuangan</p> ( '.$invnotess.' )';
			echo '</td>';
			} elseif($rowtable[$row][0]['invstatus'] == '7') {
			echo '<td align="center">';
			echo '<p style="font-weight:bold">Legal</p> ( '.$invnotess.' )';
			echo '</td>';
			} elseif($rowtable[$row][0]['invstatus'] == '0') {
			echo '<td align="center">'; 
			echo '<p style="font-weight:bold">Terkirim</p> ( '.$invnotess.' )'; 
			echo '</td>';
			}
		  echo '</tr>';
				  $sum += $rowtable[$row][0]['value']; 
				}
			?>
 
      </tbody>
	  
	  <tfoot style="background-color: lightgray;">
        <tr>
		
            <td></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
            <td></td>
			<td></td>
			<td></td>
			<td></td>
			
        </tr>
		<tr style="background-color:#fff200;">
		
            <td></td>
            <td></td>
            <td></td>
            <td align="center" style="font-weight:bold">Total</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
            <td align="center" style="font-weight:bold"><?php echo strrev(implode('.',str_split(strrev(strval($sum)),3))); ?></td>
			<td></td>
			<td></td>
			
        </tr>
    </tfoot>
 
 </table>
 <table border="1" width="100%">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
		<tr style="font-weight:bold">
            <td></td>
            <td></td>
            <td></td>
            <td>BANK MANDIRI KCP BIMANTARA
			<br/><?php if($unit == 'KOMET') echo '123-00-0414731-2'; else echo '103-00-0260002-7'; ?>
			<br/>CEK <?php echo $nomorcek; ?>
			<br/><?php echo $tglbudget; ?>
			<br/>CATATAN :  C:Closed   S:Sisa/Saldo
			</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><u>Radian Sigit</u><br/>Ketua</td>
			<td><u>Mohamad Darmawi</u><br/>Bendahara</td>
			<td><u>Joko Santosa</u><br/>Sekretaris</td>
            <td><u>Nining F</u><br/>Manager</td>
			<td><u>Dewi Y</u><br/>Accounting</td>
			<td></td>
        </tr>
    </tbody>
    <tfoot>
        
		<tr>
            <td></td>
            <td></td>
            <td></td>
            <td align="center"></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
            <td align="center"></td>
			<td></td>
			<td></td>
			<td></td>
        </tr>
    </tfoot>
  </table>
  
</body>
</html>  