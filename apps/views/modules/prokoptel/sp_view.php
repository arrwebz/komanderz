
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
<body style="padding: 50px;">

<br/>
<br/>

<?php if($unit == 'MESRA') { ?>
    <br/>
<?php } ?>


<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>Nomor&nbsp; : <?php echo $kodesurat; ?></span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>Jakarta, &nbsp;<?php echo $crdat;?></span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>Kepada Yth.</span>
  </strong>
</p>
<h2 style='margin:0cm;font-size:15px;font-family:"Times New Roman",serif;'>
  <span style='font-family:"Arial",sans-serif;'>KETUA &nbsp;KOPTEL</span>
</h2>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>JL. Ciwulan No 23</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>BANDUNG</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>Perihal&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pengajuan Pembiayaan Modal Kerja</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>Dengan hormat,</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;text-indent:0cm;font-size:15px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'>
  <span style='line-height:150%;font-family:"Arial",sans-serif;'>Bersama ini kami dari <?php if($unit == 'KOMET') echo 'Koperasi Metropolitan (KOMET)'; else echo 'PT. Metropolitan Sejahtera (MESRA)'; ?> mengajukan permohonan Pembiayaan &nbsp;kepada KOPTEL BANDUNG Sebesar&nbsp;</span>
  <strong>
    <span style='line-height:150%;font-family:"Arial",sans-serif;'>Rp. <?php echo $nilaikontrak; ?>,- ( <?php echo $terbilang; ?>)&nbsp;</span>
  </strong>
  <span style='line-height:150%;font-family:"Arial",sans-serif;'>yang akan kami pergunakan sebagai modal <?php echo $namaprojek; ?> dengan Jangka Waktu Pengembalian selama <?php echo $jangkawaktu; ?> (<?php echo $jangkahuruf; ?>) bulan.</span>
</p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;text-indent:0cm;font-size:15px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'>
  <span style='line-height:150%;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
  <?php if($unit == 'MESRA') { ?>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;text-indent:0cm;font-size:15px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'>
  <span style='line-height:150%;font-family:"Arial",sans-serif;'>Kami mohon dapat ditransfer ke Bank Muamalat Indonesia Cabang Buah Batu Bandung, Nomor Rekening 1010124081 atas nama PT. METROPOLITAN SEJAHTERA.</span>
</p>
  <?php } else { ?>
 <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;text-indent:0cm;font-size:15px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'>
  <span style='line-height:150%;font-family:"Arial",sans-serif;'>Kami mohon dapat ditransfer ke Bank BCA Syariah Cabang Samanhudi Jakarta Pusat, Nomor Rekening. 0033000043 atas nama Koperasi Konsumen Metropolitan.</span>
</p>
  <?php } ?>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:21.3pt;text-indent:-21.3pt;font-size:15px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'>
  <span style='line-height:150%;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;text-indent:0cm;font-size:15px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'>
  <span style='line-height:150%;font-family:"Arial",sans-serif;'>Besar harapan kami pengajuan pembiayaan &nbsp; dapat &nbsp;di setujui oleh KOPTEL, guna mendukung kelancaran operasional kerja kami.</span>
</p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;text-indent:0cm;font-size:15px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'>
  <br>
</p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;text-indent:0cm;font-size:15px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'>
  <span style='line-height:150%;font-family:"Arial",sans-serif;'>Demikian permohonan &nbsp;ini kami sampaikan, atas kerjasamanya kami ucapkan banyak terima kasih.</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>Hormat &nbsp;kami,</span>
</p>

  <?php if($unit == 'MESRA') { ?>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;PT. METROPOLITAN SEJAHTERA</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <br>
</p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:21.3pt;text-indent:-21.3pt;font-size:15px;font-family:"AvantGarde Md BT",sans-serif;text-decoration:underline;text-align:justify;'>
  <strong>
    <span style='font-family:"Arial",sans-serif;'>NINING FITRIANA</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;DIREKTUR</span>
</p>
  <?php } else { ?>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>KOPERASI METROPOLITAN</span>
  </strong>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <strong>
    <span style='font-size:15px;font-family:"Arial",sans-serif;'>&nbsp;</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <br>
</p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:18.3pt;text-indent:-21.3pt;font-size:15px;font-family:"AvantGarde Md BT",sans-serif;text-decoration:underline;text-align:justify;'>
  <strong>
    <span style='font-family:"Arial",sans-serif;'>RADIAN SIGIT DWIANANTO</span>
  </strong>
</p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",serif;margin-left:21.3pt;text-align:justify;text-indent:-21.3pt;'>
  <span style='font-size:15px;font-family:"Arial",sans-serif;'>KETUA</span>
</p>
  <?php } ?>

</body>
</html>