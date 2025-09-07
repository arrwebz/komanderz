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

<?php foreach($drd as $row){ ?>
    <br/>
    <table width="100%">
        <tr>
            <td valign="top"><h3>DETAIL ORDER</h3></td>
            <td align="right">
                <?php
                    if($row['unit'] == 'KOMET'){
                        echo '<strong>KOMET</strong>';
                    }elseif($row['unit'] == 'MESRA'){
                        echo '<strong>MESRA</strong>';
                    }else{
                        echo '<strong>PADI</strong>';
                    }
                ?>
            </td>
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
            <td align="left"><?php echo $row['code'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">No. Invoice</td>
            <td align="left"><?php echo $row['invnum'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">No. Faktur</td>
            <td align="left"><?php echo $row['faknum'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">No. SPK</td>
            <td align="left"><?php echo $row['spknum'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">Tanggal Masuk SPK</td>
            <td align="left"><?php echo date('d-m-Y', strtotime($row['spkindat'])) ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">Tanggal SPK</td>
            <td align="left"><?php echo date('d-m-Y', strtotime($row['spkdat'])) ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">Tanggal Invoice</td>
            <td align="left"><?php echo date('d-m-Y', strtotime($row['invdate'])) ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">Tanggal Kirim</td>
            <td align="left"><?php echo date('d-m-Y', strtotime($row['sentdate'])) ?></td>
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
            <td align="left" style="font-weight: bold;">Unit</td>
            <td align="left"><?php echo $row['unit'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">Jenis Pekerjaan</td>
            <td align="left"><?php echo $row['jp'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">Divisi</td>
            <td align="left"><?php echo $row['divisi'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">Segmen</td>
            <td align="left"><?php echo $row['segmen'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">AM User</td>
            <td align="left"><?php echo $row['amuser'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">AM KOMET</td>
            <td align="left"><?php echo $row['amkomet'] ?></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td align="left" style="font-weight: bold;">Nama Proyek</td>
            <td align="left"><?php echo $row['namaproyek'] ?></td>
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
                <td align="left"><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))) ?></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td align="left" style="font-weight: bold;">Nilai Dasar + PPN 10%</td>
                <td align="left"><?php echo strrev(implode('.',str_split(strrev(strval($row['ppnvalue'])),3))) ?></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td align="left" style="font-weight: bold;">Nilai net KOMET</td>
                <td align="left"><?php echo strrev(implode('.',str_split(strrev(strval($row['netvalue'])),3))) ?></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td align="left" style="font-weight: bold;">Nilai Margin</td>
                <td align="left"><?php echo strrev(implode('.',str_split(strrev(strval($row['marginvalue'])),3))) ?></td>
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
            <?php foreach ( $spb as $rowspb ) { ?>
                <?php if($rowspb['orderid'] == $row['orderid']){ ?>
                    <tr>
                        <td scope="row"></td>
                        <td align="left" style="font-weight: bold;"><?php echo $rowspb['code'] ?></td>
                        <td align="left"><?php echo $rowspb['accname'] ?></td>
                        <td align="left"><?php echo $rowspb['info'] ?></td>
                        <td align="left"><?php echo date('d-m-Y', strtotime($rowspb['spbdat']));?></td>
                        <td align="left"><?php echo strrev(implode('.',str_split(strrev(strval($rowspb['value'])),3))); ?></td>
                    </tr>
                <?php }	?>
            <?php }	?>
        </tbody>

        <tfoot>
        </tfoot>
    </table>
    <br/>
    <br/>
    <br/>
    <br/>
<?php } ?>

    <p align="center" style="font-size: 10px;">© <?php echo date('Y');?> Komanders Application. </p>
</body>
</html>