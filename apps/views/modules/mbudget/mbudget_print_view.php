<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $tglbudget ?></title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }

    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>
<table width="100%">
    <tr> 
		<td align="center"><?php if($unit == 'KOMET') echo '<h3>RINCIAN PENGELUARAN KOPERASI METROPOLITAN</h3>'; else echo '<h3>RINCIAN PENGELUARAN PT. METROPOLITAN SEJAHTERA</h3>'; ?></td>
    </tr>
  </table> 
  
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th align="center">No.</th>
        <th align="center">Dept</th>
        <th align="center">SPB</th>
        <th align="center">Transaksi</th>
        <th align="center">Customer</th>
        <th align="center">User</th>
        <th align="center">Jenis</th>
        <th align="center">Invoice</th>
        <th align="center">Tahun</th>
        <th align="center">Projek</th>
        <th align="center">Nilai Pekerjaan</th>
        <th align="center">Total Panjar Sebelumnya</th>
        <th align="center">Jumlah SPB</th>
        <th align="center">Status Pekerjaan</th>
        <th align="center">Kepada</th>
        <th align="center">Posisi</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$sum = 0;
		$i = 0;
		for ($row = 0; $row < $rowcount; $row++) {
		$i++;	
		  echo '<tr>';
			echo '<td align="center">'.$i.'</td>';
			echo '<td align="center">'.$rowtable[$row][0]['jobtype'].'</td>';
			echo '<td align="center">'.$rowtable[$row][0]['code'].'</td>';
			echo '<td align="center">'.$rowtable[$row][0]['info'].'</td>';
			echo '<td align="center">'.$rowtable[$row][0]['segment'].'</td>';
			echo '<td align="center">'.$rowtable[$row][0]['customer'].'</td>';
			echo '<td align="center">'.$rowtable[$row][0]['orderstatus'].'</td>';
            if ($rowtable[$row][0]['invnum'] == 0 ) {
                echo '<td>' . substr($rowtable[$row][0]['codeinv'], 0, 3) . '</td>';
                echo '<td>' . date('d-m-Y', strtotime($rowtable[$row][0]['crdat'])) . '</td>';
            }else{
                echo '<td>' . $rowtable[$row][0]['invnum'] . '</td>';
                echo '<td>' . date('d-m-Y', strtotime($rowtable[$row][0]['invdate'])) . '</td>';
            }
			echo '<td align="center">'.$rowtable[$row][0]['projectname'].'</td>';
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
    <tfoot style="background-color:#fff200;">
		<tr>
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
			<td></td>
        </tr>
    </tfoot>
  </table>
  
  <br/>
  
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
		<tr>
            <td>BANK MANDIRI KCP BIMANTARA</td>
            <td align="center"></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
        </tr>
		<tr>
            <td><?php if($unit == 'KOMET') echo '123-00-0414731-2'; else echo '103-00-0260002-7'; ?></td>
            <td align="center"></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
        </tr>
		<tr>
            <td>CEK <?php echo $nomorcek; ?></td>
            <td align="center"></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
        </tr>
		<tr>
            <td><?php echo $tglbudget; ?></td>
            <td align="center"></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
        </tr>
		<tr style="font-weight:bold">
            <td>CATATAN :  C:Closed   S:Sisa/Saldo</td>
			<td><u>Radian Sigit</u><br/>Komisaris</td>
			<td><u>Mohamad Darmawi</u><br/>Komisaris</td>
			<td><u>Joko Santosa</u><br/>Komisaris</td>
            <td><u>Nining F</u><br/>Direktur</td>
			<td><u>Dewi Y</u><br/>Accounting</td>
        </tr>
    </tbody>
    <tfoot style="background-color: lightgray;">
		<tr>
            <td></td>
            <td align="center"></td>
            <td align="center"></td>
			<td></td>
			<td></td> 
			<td></td>
        </tr>
    </tfoot>
  </table>
  
  <br/>
  
  <p align="center" style="font-size: 10px;">© <?php echo date('Y');?> Komanders Application. </p>

</body>
</html>