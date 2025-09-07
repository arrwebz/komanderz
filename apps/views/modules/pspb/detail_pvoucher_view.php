<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $kodenomor ?></title>

        <style>
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
            <td><?php if($unit == 'KOMET') echo '<img src="public/assets/dist/img/logo-komet.png" height="46px" width="96px"/>'; elseif($unit == 'MESRA') echo '<img src="public/assets/dist/img/logo-mesra.jpg" height="46px" width="96px"/>'; else echo '<img src="public/assets/dist/img/logo-komet.png" height="46px" width="96px"/>'; ?></td>
            <td align="right"><strong style="font-size:24px;">PAYMENT VOUCHER CASH / BANK</strong></td>
        </tr>
        </table>
        <br/>
        <br/>
        <br/>

        <table width="100%">
            <tr>
                <td width="250px" align="left">Paid To : <?php echo $kepada ?></td>
                <td width="200px" style="color:white;">.</td>
                <td>Voucher No &nbsp;: <br/> Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $tglspb ?></td>
            </tr>
        </table>

        <br/>
        <table border="1" width="100%" style="border-collapse: collapse;">
            <thead style="background-color: lightgray;">
            <tr>
                <th>No</th>
                <th>Description</th>
                <th>Invoice</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td scope="row">1</th>
                <td align="left"><?php echo $ket ?></td>
                <td align="left"><?php echo $inv ?></td>
                <td align="right"> <?php echo $nilai ?> </td>
            </tr>
            </tbody>

            <tfoot>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right"><?php echo $nilai ?></td>
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
                <td>Head of FINCO<br/><br/><br/><br/><br/> Nining Fitriana</td>
				<td>Delivered by <br/><br/><br/><br/><br/> (....................)</td>
				<td>Head of MARSAL <br/><br/><br/><br/><br/> Rachmad Syah</td>
				<td>Account Manager <br/><br/><br/><br/><br/> <?php echo $pemohon ?></td>
				<td>Receive by <br/><br/><br/><br/><br/> (....................................)</td>
            </tr>
        </table>
        <br/>
        <br/>
        <br/>

        <p align="center" style="font-size: 10px;">© <?php echo date('Y');?> Komanders Application. </p>
    </body>
</html>