
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
        <td valign="top"><h3>DETAIL ORDER</h3></td>
		<td align="right">Koperasi Konsumen Metropolitan PT Telkom</td>
    </tr>

  </table>
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
	  <tr>
        <td scope="row"></td>
		<td align="left" style="font-weight: bold;">No. Invoice</td>
        <td align="left"><?php echo $inv ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
		<td align="left" style="font-weight: bold;">Tanggal Invoice</td>
        <td align="left"><?php echo $tglinv ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
		<td align="left" style="font-weight: bold;">No. Faktur</td>
        <td align="left"><?php echo $fak ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
		<td align="left" style="font-weight: bold;">No. Tel/SPK/VSO PADI</td>
        <td align="left"><?php echo $nomorspk ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
		<td align="left" style="font-weight: bold;">Tanggal Tel/SPK/VSO PADI</td>
        <td align="left"><?php echo $tglspk ?></td>
      </tr>
    </tbody>

    <tfoot>  
    </tfoot>
  </table>
  
  <br/>
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
        <td align="left" style="font-weight: bold;">Jenis Pekerjaan</td>
        <td align="left"><?php echo $jp ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Instansi</td>
        <td align="left"><?php echo $segmenpt ?></td>
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
        <td align="left" style="font-weight: bold;">User</td>
        <td align="left"><?php echo $amuser ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">AM</td>
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
        <td align="left" style="font-weight: bold;">Nilai Dasar</td>
        <td align="left"><?php echo $nilaidasar ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">PPN 11%</td>
        <td align="left"><?php echo $nilaippn ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">PPh</td>
        <td align="left"><?php echo $nilaipph ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Nilai Net</td>
        <td align="left"><?php echo $nilainet ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Nilai Margin</td>
        <td align="left"><?php echo $nilaimargin ?></td>
      </tr>
	  <tr>
        <td scope="row"></td>
        <td align="left" style="font-weight: bold;">Nilai Estimasi Pencairan</td>
        <td align="left"><?php echo $nilaiest ?></td>
      </tr>
    </tbody>

    <tfoot>
    </tfoot>
  </table>
    
  <br/>
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
  
  <p align="center" style="font-size: 10px;">© <?php echo date('Y');?> KMZ Application. </p>

</body>
</html>