
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $inv ?></title>

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
<body style="border-style: solid; padding: 25px; margin: 5px;">

	
	<table width="100%">
    <tr>
		<td><?php if($unit == 'KOMET') echo '<img src="public/assets/dist/img/logo-komet.png" height="46px" width="96px"/>'; else echo '<img src="public/assets/dist/img/logo-mesra.jpg" height="46px" width="96px"/>'; ?></td>
        <td align="right"><strong style="font-size:24px;">RECEIPT VOUCHER CASH / BANK</strong></td>
    </tr>

  </table>
  
  <br/>
  <br/>
  <br/>
  
  <table width="100%">
    <tr>
        <td width="250px" align="left">Receive From : <?php echo $dari ?></td>
		<td width="200px" style="color:white;">.</td>
        <td >Voucher No &nbsp;: <?php echo $nomorvoucher ?><br/> Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $tglcair ?></td>
    </tr>

  </table>

  <br/>
  
  <table border="1" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: lightgray;">
      <tr>
        <th>No</th>
        <th>Description</th>
        <th>Acct. No</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row">1</th>
        <td align="left">No. Invoice: <?php echo $inv ?></td>
        <td align="left">Nilai Dasar</td>
        <td align="right">Rp. <?php echo $nilaidasar ?></td>
      </tr>
	  <tr>
        <td scope="row"></th>
        <td align="left"></td>
        <td align="left">Ppn</td>
        <td align="right">Rp. <?php echo $nilaipajak ?></td>
      </tr>
	  <tr>
        <td scope="row"></th>
        <td align="left"></td>
        <td align="left">Pph</td>
        <td align="right">Rp. <?php echo $nilaipph ?></td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right">Rp. <?php echo $nilaivoucher ?></td>
        </tr>
    </tfoot>
  </table>
  
  <br/>
  
  <table width="100%">
    <tr>
        <td><strong></strong></td>
    </tr>

  </table>

  <br/>
  
  <table width="100%">
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
	<tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
    <tr>
        <td>Approve <br/><br/><br/><br/><br/> Head of Fin.</td>
        <td>Paid by <br/><br/><br/><br/><br/> Cashier</td>
		<td>Book by <br/><br/><br/><br/><br/> Acct.</td>
		<td>Receive by <br/><br/><br/><br/><br/> (Attached Proof)</td>
    </tr>

  </table>
  
  <br/>
  <br/>
  <br/>
  
  <p align="center" style="font-size: 10px;">© <?php echo date('Y');?> Komanders Application. </p>
	
</body>
</html>