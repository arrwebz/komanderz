
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
<hr/>
<br/>
  <table width="100%">
    <tr>
        <td valign="top">
		<?php if($unit == 'KOMET'){ ?>
			KOPERASI METROPOLITAN PT. TELKOM <br/>
			DIV ENTERPRISE & GOVERNMENT SERVICE <br/>
			DKI Jakarta<br/>
			Jl. Kebon Sirih No. 10 - 12 <br/>
			Jakarta Pusat - 10110
		<?php } else { ?> 
			PT. METROPOLITAN SEJAHTERA <br/>
			DKI Jakarta<br/>
			Jl. Kebon Sirih No. 10 - 12 <br/>
			Jakarta Pusat - 10110
		<?php } ?>
		</td>
		<td align="center" style="background-color: lightgray;font-weight:bold;color:blue;">
		RAHASIA PRIBADI <br/>
		PRIVATE & CONFIDENTIAL
		</td>
    </tr>
	<br/>
  </table>
  <table width="100%">
    <tr>
        <td align="center"><h3>SLIP GAJI PEGAWAI<br/><?php echo strtoupper(date('F Y',strtotime($draftdat))); ?><h3></td>
    </tr>
  </table>
  <br/>
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead>
    </thead> 
    <tbody> 
      <tr>
        <td style="background-color: lightgray;">NIK</td>
		<td style="font-weight: bold;"><?php echo $usernik ?></td>
        <td style="background-color: lightgray;">Periode</td>
		<td style="font-weight: bold;"><?php echo strtoupper(date('F Y',strtotime($draftdat))); ?></td>
      </tr>
      <tr>
        <td style="background-color: lightgray;">Nama Pegawai</td>
		<td style="font-weight: bold;"><?php echo strtoupper($staffname); ?></td>
        <td style="background-color: lightgray;">Susunan Keluarga</td>
		<td style="font-weight: bold;"><?php echo $tstaff; ?></td>
      </tr>
      <tr>
        <td style="background-color: lightgray;">Lokasi</td>
		<td style="font-weight: bold;"><?php if($userlocation == 'Spinindo' ) { echo 'GD. SPININDO WAHID HASYIM'; } else { echo 'GD. MENARA MULTIMEDIA KEBON SIRIH'; } ?></td>
        <td style="background-color: lightgray;">Jenis Kelamin</td> 
		<td style="font-weight: bold;"><?php if($usergender == 'P' ) { echo 'LAKI-LAKI'; } else { echo 'PEREMPUAN'; } ?></td>
      </tr>
    </tbody>
    <tfoot>  
    </tfoot>
  </table>
	<br/>
  <table width="100%">
    <tr>
		<td align="center" style="background-color: lightgray;font-weight:bold;color:blue;">
			PERINCIAN GAJI
		</td>
	</tr>
  </table>
  <br/>
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
		<tr>
			<th align="center">Total Penghasilan (Rp.)</th>
			<th align="center">Total Potongan (Rp.)</th>
			<th align="center">Gaji Bersih (Rp.)</th>
			<th align="center">Terbilang</th>
		</tr>
	</thead> 
    <tbody> 
      <tr>
        <td align="center" style="background-color: lightgray;"><?php echo strrev(implode('.',str_split(strrev(strval($inthp)),3))); ?></td>
		<td align="center" style="background-color: lightgray;"><?php echo strrev(implode('.',str_split(strrev(strval($cutsal)),3))); ?></td>
        <td align="center" style="background-color: lightgray;"><?php echo strrev(implode('.',str_split(strrev(strval($totalsal)),3))); ?></td>
		<td align="center" style="background-color: lightgray;"><?php echo $wordtotal; ?></td>
      </tr>
    </tbody>
    <tfoot>  
    </tfoot>
  </table>
  <br/>
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead>
		<tr>
			<th align="center">Jenis Penghasilan</th>
			<th align="center">Jumlah (Rp.)</th>
			<th align="center">Rapel (Rp.)</th>
			<th align="center">Jenis Potongan</th> 
			<th align="center">Jumlah (Rp.)</th>
			<th align="center">Rapel (Rp.)</th>
		</tr>
	</thead> 
    <tbody> 
      <tr class="noborder">
        <td> </td>
		<td></td>
        <td></td>
		<td> </td>
		<td></td>
		<td></td>
      </tr>
      <tr class="noborder">
        <td>Gaji Dasar</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($bscsal)),3))); ?></td>
        <td></td>
		<td>Angsuran Koperasi</td>
		<td></td>
		<td></td>
      </tr>
	  <tr>
        <td>Status</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($statsal)),3))); ?></td>
        <td></td>
		<td>Lain-lain</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($cutsal)),3))); ?></td>
		<td></td>
      </tr>
	  <tr>
        <td>Masa Kerja</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($perdsal)),3))); ?></td>
        <td></td>
		<td></td>
		<td></td>
		<td></td>
      </tr>
	  <tr>
        <td>Strata Pendidikan</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($edsal)),3))); ?></td>
        <td></td>
		<td></td>
		<td></td>
		<td></td>
      </tr>
	  <tr>
        <td>Uang Makan</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($consal)),3))); ?></td>
        <td></td>
		<td></td>
		<td></td>
		<td></td>
      </tr>
	  <tr>
        <td>Transport</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($transal)),3))); ?></td>
        <td></td>
		<td></td>
		<td></td>
		<td></td>
      </tr>
	  <tr>
        <td>Pulsa</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($vsal)),3))); ?></td>
        <td></td>
		<td></td>
		<td></td>
		<td></td>
      </tr>
	  <tr>
        <td>Jabatan</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($postsal)),3))); ?></td>
        <td></td>
		<td></td>
		<td></td>
		<td></td>
      </tr>
	  <tr>
        <td>Strategis</td>
		<td><?php echo strrev(implode('.',str_split(strrev(strval($strsal)),3))); ?></td>
        <td></td>
		<td></td> 
		<td></td>
		<td></td>
      </tr>
    </tbody>
    <tfoot>  
    </tfoot>
  </table>
  <br/>
  <table width="100%">
    <tr>
		<td align="center" style="background-color: lightgray;font-weight:bold;color:blue;">
			RINGKASAN PERHITUNGAN PAJAK 
		</td>
	</tr>
  </table>
  <br/>
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
		<tr>
			<th align="center">Penghasilan s/d bulan lalu </th>
			<th align="center">Iuran Dana Pensiun + Taspen s/d bulan lalu</th>
			<th align="center">Pajak Penghasilan s/d bulan lalu</th>
		</tr>
	</thead> 
    <tbody> 
      <tr>
        <td align="center" style="background-color: lightgray;">0</td>
		<td align="center" style="background-color: lightgray;">0</td> 
        <td align="center" style="background-color: lightgray;">0</td>
      </tr>
    </tbody>
    <tfoot>  
    </tfoot>
  </table>
  <br/>
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead>
		<tr>
			<th>Lembar Catatan</th>
		</tr>
	</thead> 
    <tbody> 
    </tbody>
    <tfoot>  
    </tfoot>
  </table>
  <br/>
  <table border="0" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
		<tr>
			<th>Management </th>
		</tr>
	</thead> 
    <tbody> 
      <tr>
        <td style="background-color: lightgray;">Semoga bermanfaat bagi keluarga dan dapat menambah motivasi dalam bekerja sehingga prestasi kerja kita akan terus meningkat</td>
      </tr>
    </tbody>
    <tfoot>  
    </tfoot>
  </table>
  <br/>
  
  <p align="center" style="font-size: 10px;">© <?php echo date('Y');?> Komanders Application. </p>

</body>
</html>