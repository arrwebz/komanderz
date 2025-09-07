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
            padding:10px;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
    </style>
</head>
<body style="padding: 50px;">

<table width="100%" style="border:1px solid #000;">
    <tr>
        <td valign="top" colspan="3" style="text-align: center; font-size: 18px;"><strong>ESTIMASI BIAYA PROJECT</strong></td>
    </tr>
</table>
<table width="100%" style="border:1px solid #000;">
    <tr>
        <td><strong>SURAT PESANAN</strong></td>
        <td><strong>:</strong></td>
        <td><strong><?php echo $nokontrak;?></strong></td>
    </tr>
    <tr>
        <td><strong>MITRA</strong></td>
        <td><strong>:</strong></td>
        <?php if($unit == 'MESRA') { ?>
            <td><strong>PT Metropolitan Sejahtera</strong></td>
        <?php }else{?>
            <td><strong>Koperasi Metropolitan</strong></td>
        <?php } ?>
    </tr>
    <tr>
        <td><strong>PEKERJAAN</strong></td>
        <td><strong>:</strong></td>
        <td><strong><?php echo $namaprojek;?></strong></td>
    </tr>
    <tr>
        <td><strong>LOKASI</strong></td>
        <td><strong>:</strong></td>
        <td><strong>JAKARTA</strong></td>
    </tr>
</table>
<table width="100%" style="border:1px solid #000;">
    <tr>
        <td style="margin-left: 10px;">I. NILAI KONTRAK (SEBELUM PPN)</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. MATERIAL</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($valkontrak)),3)));?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B. ONGKOS JASA</td>
        <td></td>
        <td style="text-align: right">-</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUB TOTAL I</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($valkontrak)),3)));?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POT PPH &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2%</td>
        <td></td>
        <td style="text-align: right">-</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUMLAH MURNI</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($valkontrak)),3)));?></td>
    </tr>
    <tr>
        <td><br>II. REALISASI BIAYA PROYEK</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. BIAYA MITRA</td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. MATERIAL</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($materialprojek)),3)));?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B. ONGKOS JASA</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($ongkosprojek)),3)));?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C. OPR</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($oprprojek)),3)));?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUB TOTAL 1</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($subtotal1)),3)));?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. SB BANK / FEE BAGI HASIL</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. SB BANK / BAGI HASIL</td>
        <td></td>
        <td style="text-align: right">-</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUB TOTAL 2</td>
        <td></td>
        <td style="text-align: right">-</td>
    </tr>
    <tr>
        <td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. TOTAL BIAYA PROJECT</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($totalbiayaprojek)),3)));?></td>
    </tr>
    <tr>
        <td><br>III. KEUNTUNGAN ( I - II  )</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($keuntungan)),3)));?></td>
    </tr>
    <tr>
        <td><br>IV. KEBUTUHAN MODAL ( I - II  )</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($kebutuhanmodal)),3)));?></td>
    </tr>
    <tr>
        <td><br>V. OR (II/I) x 100%</td>
        <td></td>
        <td style="text-align: right"><?php echo $or;?>%</td>
    </tr>
    <tr>
        <td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KOPTEL</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($koptel)),3)));?></td>
        <td style="text-align: right"><?php echo $persen_koptel;?>%</td>
    </tr>
    <tr>
        <td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KOMET</td>
        <td></td>
        <td style="text-align: right"><?php echo strrev(implode('.',str_split(strrev(strval($komet)),3)));?></td>
        <td style="text-align: right"><?php echo $persen_komet;?>%</td>
    </tr>
</table>
<table width="100%" style="border:1px solid #000;">
    <tr>
        <td width="70%"></td>
        <td width="30%">
            JAKARTA, <?php echo $crdat;?>
            <br>DIBUAT,
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </td>
    </tr>
    <?php if($unit == 'MESRA') { ?>
        <tr>
            <td width="70%"></td>
            <td width="30%">
                <strong class="color-black">
                    <u>NINING FITRIANA</u>
                </strong>
            </td>
        </tr>
        <tr>
            <td width="70%"></td>
            <td width="30%">DIREKTUR</td>
        </tr>
    <?php }else{?>
        <tr>
            <td width="70%"></td>
            <td width="30%">
                <strong class="color-black">
                    <u>RADIAN SIGIT DWIANANTO</u>
                </strong>
            </td>
        </tr>
        <tr>
            <td width="70%"></td>
            <td width="30%">KETUA</td>
        </tr>
    <?php } ?>
</table>
</body>
</html>