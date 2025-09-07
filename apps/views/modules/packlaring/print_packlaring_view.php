<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>

    <link type="text/css" rel="stylesheet" href="https://cts.komet.co.id/public/assets/global/fonts/font-awesome/font-awesome.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="https://cts.komet.co.id/public/assets/global/fonts/material-design/material-design.min.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="https://cts.komet.co.id/public/assets/global/fonts/brand-icons/brand-icons.min.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic" media="screen" />
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            font-size: 18px;
            text-align: justify;
        }
        table{
            font-size: x-small;
            margin-bottom: 10px;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .text-left{text-align: left;}
        .text-center{text-align: center;}
        .text-right{text-align: right;}

        .vtop{vertical-align: top;}

        .mt-10{margin-top: 10px;}
        .mt-15{margin-top: 15px;}
        .mt-20{margin-top: 20px;}
        .mt-40{margin-top: 40px;}
        .mt-100{margin-top: 100px;}

        .mb-10{margin-bottom: 10px;}
        .mb-15{margin-bottom: 15px;}
        .mb-20{margin-bottom: 20px;}
        .mb-100{margin-bottom: 100px;}

        .ml-5{margin-left: 5px;}
        .ml-10{margin-left: 10px;}
        .ml-40{margin-left: 40px;}

        .w9{width:15%}
        .w02{width:0.2%}
        .w40{width:40%}

        .space{height: 1%;}
        .space05{height: 0.5%;}
        .space35{height: 4.5%;}

        .color-black{color: #000;}
    </style>
</head>
<body>
<table width="82%" style="margin:0 auto;">
    <tr>
        <td colspan="2" class="space35"></td>
    </tr>
    <tr>
        <td class="text-center" colspan="2">
            <strong class="color-black"><u>SURAT  KETERANGAN</u></strong>
        </td>
    </tr>
    <tr>
        <td class="text-center" colspan="2">
            Nomor : <?php echo $drd[0]['code'];?>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="space"></td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left">Saya yang bertanda tangan dibawah ini :</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="space"></td>
    </tr>
    <tr>
        <td class="w9">
            <span>Nama</span>
        </td>
        <td class="w40">
            : <span class="color-black"><strong>Muhamad Irpan</strong></span>
        </td>
    </tr>
    <tr>
        <td class="w9">
            <span>Divisi</span>
        </td>
        <td class="w40">
            : <span class="color-black"><strong>Manager Corporate Secretary</strong></span>
        </td>
    </tr>
    <tr class="vtop" >
        <td class="w9">
            <span>Alamat</span>
        </td>
        <td class="w40">
            : <span class="color-black"><strong>Jl. Kebon Sirih No. 10 – 12</strong></span>
            <br>
            &nbsp;&nbsp;<span class="color-black"><strong>Jakarta Pusat</strong></span>
        </td>
    </tr>
    <tr>
        <td class="w9">
            <span>Telp/Fax</span>
        </td>
        <td class="w40">
            : <span><strong>021 3852300 - Fax : 021 3860741</strong></span>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="space"></td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left">Dengan ini menerangkan bahwa :</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="space"></td>
    </tr>
    <tr>
        <td class="w9">
            <span>Nama</span>
        </td>
        <td class="w40">
            : <span class="color-black"><strong><?php echo $drd[0]['name'];?></strong></span>
        </td>
    </tr>
    <tr>
        <td class="w9">
            <span>Tempat/Tgl Lahir</span>
        </td>
        <td class="w40">
            : <span class="color-black"><strong><?php echo $drd[0]['pob'];?>, <?php echo onlydate($drd[0]['dob']);?></strong></span>
        </td>
    </tr>
    <tr>
        <td class="w9 vtop">
            <span>Alamat</span>
        </td>
        <td class="vtop" style="width:30%">
            <div style="width: 100%">
                <span style="width:5%;">:</span>
                <div class="color-black" style="width: 95%; position: absolute">
                    <strong style="word-wrap: inherit"><?php echo $drd[0]['address'];?></strong>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="space" style="height: 3%;"></td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left">Benar-benar telah menjadi Tenaga Kerja Outsourching Koperasi Metropolitan yang ditempatkan di PT. Telekomunikasi Indonesia, Tbk – sejak <strong class="color-black"><?php echo onlydate($drd[0]['start_work']);?></strong> sampai <strong class="color-black"><?php echo onlydate($drd[0]['lastwork']);?></strong> dan selama menjalankan tugas berkelakuan baik.</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="space"></td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left">Dan terhitung tanggal <strong class="color-black"><?php echo onlydate($drd[0]['nextmonth_endwork']);?></strong> sudah tidak aktif lagi sebagai tenaga kerja di Koperasi Metropolitan.</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="space"></td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left">Demikian surat keterangan ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="space"></td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left">Jakarta, <?php echo onlydate($drd[0]['nextmonth']);?></span>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left"><strong class="color-black">KOPERASI METROPOLITAN</strong></span>
        </td>
    </tr>
    <tr>
        <td colspan="2"  style="height:80px;">
            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"]; ?>/public/assets/dist/img/ttd-cap-aa.png" alt="" height="100px" />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left"><strong class="color-black"><u>Muhamad Irpan</u></strong></span>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="text-left"><strong class="color-black">Manager Corporate Secretary</strong></span>
        </td>
    </tr>
</table>
</body>
</html>