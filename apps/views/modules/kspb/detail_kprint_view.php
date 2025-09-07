
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $kodenomor ?></title>

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
        <?php
        $code = explode('/',$kodenomor);
        $checked = '';
        if(count($code) >= 2){
            $kode_lpdb = substr($code[1],-1);
            if($kode_lpdb == 'L'){
                ?>
                <td>
                    <img src="public/assets/dist/img/kemenkop.png" height="40"/>
                    <img src="public/assets/dist/img/lpdb.png" height="40" />
                </td>
                <?php
            }
        }
        ?>
		<td align="right"><?php if($unit == 'KOMET') echo '<h1>KOMET</h1>'; else echo '<h1>MESRA</h1>'; ?></td>
    </tr>
  </table>
             <br/>
  <table width="100%">
    <tr>
        <td valign="top"><img src="public/assets/dist/img/spb3.png" /></td>
        <td align="right">
            <h3><?php echo $kodenomor ?></h3>
			<?php echo $divisi ?><br/> 
			<?php echo $tglspb ?><br/> 
			<?php if($unit == 'KOMET') echo 'Koperasi Metropolitan'; else echo 'PT. Metropolitan Sejahtera'; ?>
             <br/>
             <br/>
             <br/>
        </td>
    </tr>

  </table>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <table width="100%">
    <tr>
        <td><strong>Nomor Invoice:</strong> <?php echo $inv ?></td>
        <td><strong>Kepada:</strong> <?php echo $kepada ?></td>
    </tr>

  </table>

  <br/>

  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Transaksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"></th>
        <td><?php echo $ket ?></td>
      </tr>
    </tbody>

    <tfoot style="background-color: lightgray;">
    </tfoot>
  </table>
  
  <br/>
  <br/>
  <br/>
  
  <table width="100%">
    <tr>
        <td><strong>Jenis Pembayaran:</strong> <i style="text-transform: uppercase;"><?php echo $jenisbayar ?></i></td>
    </tr>

  </table>

  <br/>
  
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Atas Nama</th>
        <th>Nomor Rekening</th>
        <th>Bank</th>
        <th>Nilai</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"></th>
        <td align="left"><?php echo $anrek ?></td>
        <td align="left"><?php echo $norek ?></td>
        <td align="left" style="text-transform: uppercase;"><?php if($bank == 'other') echo $banklain; else echo $bank; ?></td>
        <td align="right"> <?php echo $nilai ?> </td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total</td>
            <td align="right"><?php echo $nilai ?></td>
        </tr>
    </tfoot>
  </table>
    
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  
  <table width="100%">
    <tr>
        <td><strong>Mengetahui,</strong></td>
    </tr>

  </table>

  <br/>
  
  <table width="100%">
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
		<td> </td>
    </tr>
    <tr>
        <td><strong>( Nining Fitriana )</strong></td>
        <td><strong>( Rachmad Syah )</strong></td>
		<td><strong>( <?php echo $pemohon ?> )</strong></td>
    </tr>

  </table>
  
  <br/>
  
  <p align="center" style="font-size: 10px;">© <?php echo date('Y');?> Komanders Application. </p>

</body>
</html>