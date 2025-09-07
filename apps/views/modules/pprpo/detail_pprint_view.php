
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $title ?></title>

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

<br/>
  <table width="100%">
    <tr>
        <td valign="top"><h3>DETAIL PRPO</h3></td>
		<td align="right"><?php if($unit == 'KOMET') echo '<strong>KOMET</strong>'; else echo '<strong>MESRA</strong>'; ?></td>
    </tr>

  </table>
	<br/>
	<br/>
	<br/>
  <table width="100%">
    <tr>
        <td valign="top"><strong>DETAIL</strong></td>
    </tr>

  </table>

  <br/>

  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row"></td>
		<td align="left" style="font-weight: bold;">KODE</td>
        <td align="left"><?php echo $kodenomor ?></td>
      </tr>
    </tbody>

    <tfoot>
    </tfoot>
  </table>
  
  <br/>
  <br/>
  
  <table width="100%">
    <tr>
        <td><strong>INFORMASI</strong></td>
    </tr>

  </table>

  <br/>
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Unit</td>
        <td align="left"><?php echo $unit ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Jenis Pekerjaan</td>
        <td align="left"><?php echo $jp ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Divisi</td>
        <td align="left"><?php echo $divisi ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Segmen</td>
        <td align="left"><?php echo $segmen ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">AM User</td>
        <td align="left"><?php echo $amuser ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">AM KOMET</td>
        <td align="left"><?php echo $amkomet ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Nama Proyek</td>
        <td align="left"><?php echo $namaproyek ?></td>
      </tr>
    </tbody>

    <tfoot>
    </tfoot>
  </table>
  
  <br/>
  <br/>
  <table width="100%">
    <tr>
        <td><strong>NILAI PROJEK</strong></td>
    </tr>

  </table>

  <br/>
  
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Nilai Justifikasi</td>
        <td align="left"><?php echo $nilaijst ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Nilai Nego</td>
        <td align="left"><?php echo $nilainego ?></td>
      </tr>
    </tbody>

    <tfoot>
    </tfoot>
  </table>
  
  <br/>
  <br/>
  <table width="100%">
    <tr>
        <td><strong>TERMIN INVOICE</strong></td>
    </tr>

  </table>

  <br/> 
  <?php if ($rowcount != 1) { ?>
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
	<?php for ($row = 0; $row < $rowcount; $row++) { ?>
			
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;"><?php echo $rowtable[$row][0]['code']; ?></td>
        <td align="left"><?php echo $rowtable[$row][0]['segment'] ?></td>
		<td align="left"><?php echo $rowtable[$row][0]['invnum'] ?></td>
		<td align="left"><?php echo $rowtable[$row][0]['faknum'] ?></td>
		<td align="left"><?php echo date('d-m-Y', strtotime($rowtable[$row][0]['invdate']));?></td>
        <td align="left"><?php echo strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['basevalue'])),3))); ?></td>
      </tr>
	  
	<?php }	?>
    </tbody>

    <tfoot>
    </tfoot>
  </table>
   <?php } else { echo '<p style="font-size: 12px;"> - </p>'; }?> 
   
  <br/>
  <br/>
  <table width="100%">
    <tr>
        <td><strong>RIWAYAT SPB</strong></td>
    </tr>

  </table>

  <br/>
  
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ( $spbbyinvoice as $row ) { ?>
			
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;"><?php echo $row['code'] ?></td>
        <td align="left"><?php echo $row['accname'] ?></td>
		<td align="left"><?php echo $row['info'] ?></td>
		<td align="left"><?php echo date('d-m-Y', strtotime($row['spbdat']));?></td>
        <td align="left"><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></td>
      </tr>
		<?php }	?>
		<tr>
		<td scope="row"></td>
		<td align="left"></td>
		<td align="left"></td>
		<td align="left"></td>
		<td align="left" style="font-weight: bold;">Total Closed SPB</td>
		<td align="left"><?php echo strrev(implode('.',str_split(strrev(strval($totalspbbyinvoice[0]['totalvalue'])),3))); ?></td>
	  </tr>
    </tbody>

    <tfoot>
    </tfoot>
  </table>
  
  <br/> 
  
  <p align="center" style="font-size: 10px;">© <?php echo date('Y');?> Komanders Application. </p>

</body>
</html>