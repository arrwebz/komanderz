<?php

header("Content-Type: application/msword");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=\"" . $file_name . ".doc");

?>

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
            font-size: x-small;
            justify-content: inherit;
        }

        .text-center{text-align: center}
        .text-right{text-align: right}
        .text-red{color:red}

        .mt--5{margin-top: -5px;}
        .mt--10{margin-top: -10px;}
        .mr-10{margin-right: 10px;}
        .ml-15{margin-left:15px;}
        .ml--20{margin-left: -20px;}
        .pl-30{padding-left:30px;}

        footer{
            height: 50px;
            margin-bottom: -50px;
        }

        .border-bottom{border-bottom: 2px solid #000 !important;}
        .vtop{vertical-align: top;}

        ol {
            counter-reset: item;
            margin-left: -20px;
            padding-left: 0;
        }
        li {
            display: block;
            margin-bottom: .5em;
            text-align: justify;
            text-justify: inter-word;
        }
        li::before {
            display: inline-block;
            content: counter(item, upper-roman) ")";
            counter-increment: item;
        }
    </style>
</head>
<body>

<div class="text-center">
    <strong>
        PERJANJIAN KERJA
        <br>ANTARA
        <br>TENAGA PEKERJA BERJANGKA WAKTU (TPBW)
        <br>DENGAN
        <br>KOPERASI METROPOLITAN (KOMET) PT. TELKOM
        <br>TENTANG
        <br>JASA TENAGA KERJA
    </strong>
</div>
<div class="border-bottom" style="font-size:3px;">&nbsp;</div>
<div class="text-center">
    Nomor : <?php echo $drd[0]['code'];?>
</div>
<section>
    <p style="text-align: justify;text-justify: inter-word;">
        Pada hari ini, Sabtu tanggal Satu bulan Januari tahun Dua Ribu Dua Puluh Dua bertempat di Kantor Koperasi Metropolitan (KOMET) PT. TELKOM, Jl. Kebon Sirih Kav. 10-12 Jakarta Pusat, antara pihak-pihak:---------------------------------------------------------------------------------
    </p>
    <table width="100%" class="pl-30">
        <tr>
            <td width="2%" class="ml--20" style="vertical-align: text-top; text-align: justify;text-justify: inter-word;">I.</td>
            <td width="98%" class="ml--20" style="text-align: justify;text-justify: inter-word;">Koperasi Metropolitan (KOMET) PT. TELKOM, didirikan berdasarkan Akte Pendirian Koperasi di Jakarta, Keputusan Menteri Koperasi dan UKM RI No. 0100/BH/-1.82/X/2003 tanggal 3 Oktober 2003 berkedudukan di Gedung Menara Multimedia Jalan Kebon Sirih Kav. 10 Jakarta Pusat, dalam perbuatan hukum ini diwakili secara sah oleh RADIAN SIGIT DWIANANTO Jabatan KETUA KOPERASI METROPOLITAN selanjutnya dalam Perjanjian ini disebut sebagai KOMET. ---------</td>
        </tr>
    </table>
    <table width="100%" class="pl-30">
        <tr>
            <td width="1%" class="ml--20">II.</td>
            <td width="24%" class="ml--20">Nama</td>
            <td width="60%" class="ml--20" style="text-align: justify;text-justify: inter-word;">: <?php echo $drd[0]['name'];?></td>
        </tr>
        <tr>
            <td width="1%" class="ml--20"></td>
            <td width="24%" class="ml--20">Tempat/Tanggal Lahir</td>
            <td width="60%" class="ml--20" style="text-align: justify;text-justify: inter-word;">: <?php echo $drd[0]['pob'].', '.$drd[0]['dob'];?></td>
        </tr>
        <tr>
            <td width="1%" class="ml--20"></td>
            <td width="24%" class="ml--20">Alamat</td>
            <td width="60%" class="ml--20" style="text-align: justify;text-justify: inter-word;">: <?php echo $drd[0]['address'];?></td>
        </tr>
    </table>
    <p style="text-align: justify;text-justify: inter-word;">Dalam hal ini bertindak untuk dan atas nama diri sendiri, selanjutnya dalam perjanjian ini disebut sebagai TPBW.</p>
    <p style="text-align: justify;text-justify: inter-word;">Telah dicapai kata sepakat, bahwa dengan ini KOMET dan TPBW mengadakan Perjanjian Kerja dengan ketentuan-ketentuan sebagai berikut :</p>

    <p class="text-center">
        <strong>
            Pasal 1
            <br>LINGKUP TUGAS PEKERJAAN
        </strong>
    </p>
    <ol>
        <li>KOMET memberikan tugas pekerjaan kepada TPBW sebagaimana TPBW menerima tugas tersebut serta mengikatkan diri untuk melaksanakan tugas sebagai Tenaga Pekerja Berjangka Waktu di PT. TELKOM Divisi <?php echo $drd[0]['segmen'];?>.</li>
        <li>Tugas-tugas TPBW akan diberikan oleh Manajemen dimana yang bersangkutan ditugaskan oleh KOMET.</li>
        <li>Apabila TPBW pada masa 3 (tiga) bulan pertama atau masa percobaan sejak tanggal masuk kerja dinyatakan tidak mampu melaksanakan pekerjaan dalam ayat Pasal ini, maka TPBW tersebut diberhentikan dan tidak berhak mendapatkan Uang Pesangon.</li>
        <li>KOMET berwenang untuk melakukan perubahan posisi terhadap TPBW dengan ketentuan posisi tersebut disesuaikan dengan kemampuan TPBW yang berakibat pada peningkatan atau penurunan penghasilan sesuai dengan posisi yang dipangkunya, perubahan ini akan diberitahukan oleh KOMET selambat-lambatnya 7 (tujuh) hari kerja kepada TPBW sebelum ditetapkannya/ berlakunya perubahan tersebut.</li>
    </ol>

    <p class="text-center">
        <strong>
            Pasal 2
            <br>SIFAT HUBUNGAN KERJA
        </strong>
    </p>
    <p style="text-align: justify;text-justify: inter-word;">
        TPBW mengetahui dengan sebenar-benarnya bahwa hubungan kerja yang dimaksud dalam Perjanjian ini bukan dipersiapkan menjadi pegawai tetap KOMET dan atau pegawai tetap <?php echo $drd[0]['segmen'];?> dan atau pegawai tetap PT. TELKOM.
    </p>

    <p class="text-center">
        <strong>
            Pasal 3
            <br>JANGKA WAKTU
        </strong>
    </p>
    <ol>
        <li>Perjanjian ini diadakan dan berlaku untuk jangka waktu 12 (Dua Belas) bulan, terhitung sejak tanggal <?php echo $drd[0]['start_work'];?> berakhir sampai dengan tanggal <?php echo $drd[0]['end_work'];?>.</li>
        <li>Perjanjian Kerja ini diperpanjang apabila pemberi kerja dalam hal ini masih memerlukan TPBW dan TPBW diharuskan mengajukan lamaran kembali kepada KOMET.</li>
    </ol>

    <p class="text-center">
        <strong>
            Pasal 4
            <br>WAKTU KERJA
        </strong>
    </p>
    <ol>
        <li>TPBW berkewajiban melaksanakan tugas-tugas sesuai dengan jadual yang telah ditentukan olehdimana TPBW ditugaskan.TPBW ditetapkan sebagai <b><i><?php echo $drd[0]['position'];?> <?php echo $drd[0]['segmen'];?></b></i> dengan jadwal ditetapkan sesuai waktu kerja setempat yaitu sebagai berikut :</li>
    </ol>
    <table width="100%" style="padding-left: 70px;">
        <tr>
            <td width="22%" class="ml--20" style="vertical-align: text-top">&#8226; Senin s.d Kamis</td>
            <td width="55%" class="ml--20">
                : Jam 08.00 s.d 17.00
                <br>&nbsp;&nbsp;(Istirahat Jam 12.00 s.d 13.00)
            </td>
        </tr>
        <tr>
            <td width="22%" class="ml--20" style="vertical-align: text-top">&#8226; Jum`at</td>
            <td width="55%" class="ml--20">
                : Jam 08.00 s.d 17.00
                <br>&nbsp;&nbsp;(Istirahat Jam 11.30 s.d 13.00)
            </td>
        </tr>
    </table>

    <p class="text-center">
        <strong>
            Pasal 5
            <br>BESARAN PENGHASILAN
        </strong>
    </p>
    <ol>
        <li>Besaran Penghasilan yang diterima TPBW untuk setiap bulannya adalah sebesar,
            <i>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($drd[0]['total'])),3)));?>,-* <?php echo $drd[0]['terbilang'];?> **</i> terdiri dari :</li>
    </ol>
    <div style="margin-left:60px;">Gaji Dasar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($drd[0]['basic_sallary'])),3)));?></div>
    <div style="margin-left:60px;">Kompleksitas kerja &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($drd[0]['work_complexity'])),3)));?></div>
    <div style="margin-left:60px;">Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($drd[0]['overtime'])),3)));?></div>
    <div style="margin-left:60px;">Uang Makan & Transport &nbsp;&nbsp;&nbsp; : Rp. <?php echo strrev(implode('.',str_split(strrev(strval($drd[0]['meal_allowance'])),3)));?></div>
    <div style="margin-left:30px; margin-top:10px;">Biaya-biaya yang terjadi dalam transaksi di Bank ditanggung oleh TPBW yang akan dipotong langsung dari penghasilan yang diterima</div>
    <ol>
        <li value="2">Selain Penghasilan tersebut diatas, TPBW berhak mendapatkan Tunjangan Hari Raya Keagamaan (THR) sebesar 1 (satu) kali Penghasilan yang diterima perbulan, pemberian THR tersebut akan diberikan selambat-lambatnya 7 (tujuh) hari kerja sebelum Hari Raya Keagamaan. --------------------------------------------------------------------------------------------</li>
        <li value="3">PBW berhak mendapatkan Asuransi BPJS Ketenagakerjaan yang akan langsung disetorkan ke Instansi yang berwenang dan Asuransi BPJS Kesehatan untuk Pemeliharaan Kesehatan bagi TPBW sesuai ketentuan yang berlaku di KOMET. ---------------------------</li>
    </ol>

    <p class="text-center">
        <strong>
            Pasal 6
            <br>CARA PEMBAYARAN
        </strong>
    </p>
    <ol>
        <li>Pembayaran atas Gaji dimaksud Pasal 5 dalam Perjanjian ini akan dibayarkan KOMET kepada TPBW setiap bulan berikutnya selambat-lambatnya tanggal 1 (satu) bulan berikutnya secara giral.</li>
        <li>Transfer atas pembayaran dimaksud Ayat (1) Pasal ini dialamatkan sesuai dengan data Rekening Bank dari TPBW yang bersangkutan atau yang diatasnamakan.</li>
    </ol>

    <p class="text-center">
        <strong>
            Pasal 7
            <br>HAK DAN KEWAJIBAN PARA PIHAK
        </strong>
    </p>
    <ol>
        <li>
            TPBW berhak mendapatkan :
            <ol type="a">
                <li style="margin-top:-30px;">Penghasilan sesuai dengan Pasal 5 pada Perjanjian ini. </li>
                <li>Cuti dalam masa jangka waktu perjanjian sesuai dengan Pasal 3, diberikan selama 12 (dua belas) hari dimana dipotong 1 (satu) hari cuti untuk cuti bersama yang ditetapkan oleh Pemerintah atas izin dari pihak PT. TELKOM, mendapatkan Gaji selama menjalankan cuti, surat cuti dikirimkan ke KOMET. </li>
                <li>Semua ketidakhadiran TPBW diluar alasan sakit (ijin urusan keluarga, urusan pribadi, dll) akan dihitung otomatis mengambil hak cuti. </li>
                <li>
                    TPBW masa percobaan belum memperoleh hak cuti, namun setelah 3 (tiga) bulan akan memperoleh hak cuti penuh yang diberikan secara bertahap, yaitu:
                    <ol type="i" style="margin-left: 10px;">
                        <li style="margin-top:-30px;">3 – 6 bulan, hak cuti yang boleh diambil adalah 2 (dua) hari kerja.</li>
                        <li>6 – 9 bulan, hak cuti yang boleh diambil adalah 5 (lima) hari kerja.</li>
                        <li>≥ 9 bulan, dapat diperoleh hak cuti penuh tahunan. </li>
                    </ol>
                </li>
                <li>Jika dalam waktu perjanjian kerja sesuai Pasal 3 Ayat 1, karena satu dan lain hal yang sangat penting TPBW harus meninggalkan tugas (menghadiri pemakaman orang tua/mertua/keluarga inti yang meninggal, menikah, menemani orang tua/mertua/keluarga inti yang dalam kondisi serius/UGD) maka hak cuti karena alasan tersebut diatas adalah selama 3 (tiga) hari kerja dengan melampirkan surat-surat keterangannya.</li>
                <li>Cuti melahirkan selama 1 (satu) bulan sebelum dan 2 (dua) bulan sesudah melahirkan dengan mendapatkan Gaji Dasar, dan menyertakan surat cuti yang telah didisposisi oleh Manajemen <?php echo $drd[0]['segmen'];?> yang dikirimkan ke KOMET. </li>
                <li>Tunjangan Hari Raya Keagamaan (THR).</li>
                <li>Uang Lembur.</li>
            </ol>
        </li>
        <li>
            TPBW berkewajiban :
            <ol type="a">
                <li>Melaksanakan dan tunduk pada Perjanjian yang telah disepakati dengan KOMET, mentaati serta melaksanakan tugas-tugas yang diberikan secara langsung maupun tidak langsung oleh <?php echo $drd[0]['segmen'];?></li>
                <li>Mengindahkan dan mentaati ketentuan dan peraturan Perundang-undangan yang berlaku, baik dikeluarkan oleh Negara atau Pemerintah maupun KOMET serta <?php echo $drd[0]['segmen'];?></li>
                <li>Menjunjung tinggi nama baik KOMET dan <?php echo $drd[0]['segmen'];?> serta memegang kerahasiaan akan segala sesuatu yang diketahui didalam melaksanakan tugas pekerjaannya.</li>
                <li>Menggunakan dan memelihara dengan sebaik-baiknya semua peralatan dan perlengkapan kerja yang dipercayakan kepada TPBW.</li>
                <li>Tidak menyalahgunakan peralatan atau perlengkapan KOMET dan <?php echo $drd[0]['segmen'];?> yang dipercayakan untuk dipergunakan oleh TPBW. </li>
            </ol>
        </li>
        <li>
            KOMET berhak atas :
            <ol type="a">
                <li>Jasa atau tenaga TPBW.</li>
                <li>Menempatkan TPBW untuk bertugas di <?php echo $drd[0]['segmen'];?>.</li>
                <li>Melakukan monitoring atau evaluasi terhadap TPBW.</li>
                <li>Memberhentikan tenaga TPBW jika dari hasil evaluasi tidak mematuhi peraturan dan tata-tertib kerja yang berlaku atau tidak hadir tanpa konfirmasi apapun kepada KOMET selama 3 (tiga) kali dalam satu bulan atau atas permintaan Manajemen <?php echo $drd[0]['segmen'];?></li>
            </ol>
        </li>
        <li>
            KOMET berkewajiban :
            <ol type="a">
                <li>Membayar Gaji kepada TPBW.</li>
                <li>Memberikan pengarahan dan pembinaan kepada TPBW.</li>
                <li>Membangun jiwa korsa TPBW.</li>
                <li>Memberikan fasilitas kesehatan BPJS Kesehatan dan BPJS Ketenagakerjaan kepada TPBW sesuai dengan ketentuan yang berlaku.</li>
            </ol>
        </li>
    </ol>

    <p class="text-center">
        <strong>
            Pasal 8
            <br>PEMUTUSAN HUBUNGAN KERJA
        </strong>
    </p>
    <ol>
        <li>TPBW berhak mendapatkan Uang Pesangon yang dibayar langsung oleh KOMET secara giral dialamatkan sesuai dengan Ayat (2) pada Pasal 6 tersebut diatas. Pemberian Pesangon tersebut diberikan kepada TPBW yang diputus hubungan kerja akibat habis masa perjanjiannya, maka terhadap TPBW tersebut diberikan Pesangon sebesar 1 (satu) kali Gaji.</li>
        <li>
            TPBW tidak mendapatkan Uang Pesangon apabila Putus Hubungan Kerja, akibat:
            <ol type="a">
                <li>TPBW melakukan tindakan tidak masuk kerja selama 5 (lima) hari atau lebih berturut-turut tanpa keterangan secara tertulis yang dilengkapi dengan bukti yang sah dan telah dipanggil oleh KOMET 2 (dua) kali secara tertulis, maka terhadap TPBW tersebut dianggap mengundurkan diri. </li>
                <li>Apabila TPBW melakukan pengunduran diri atas permintaan sendiri.</li>
                <li>Apabila TPBW melakukan tindakan pelanggaran berat sesuai dengan ketentuan Perundang-undangan yang berlaku dan Peraturan KOMET.</li>
            </ol>
        </li>
    </ol>

    <br>
    <br>
    <br>
    <br>
    <br>
    <p class="text-center">
        <strong>
            Pasal 9
            <br>SANKSI
        </strong>
    </p>
    <ol>
        <li>TPBW menyatakan mengikatkan diri untuk tunduk dan patuh terhadap ketentuan dan Peraturan Perundang-undangan yang berlaku, oleh karenanya TPBW dapat dikenakan tuntutan apabila TPBW memutuskan hubungan kerja tanpa adanya pemberitahuan atau alasan yang dapat diterima oleh KOMET dan atau <?php echo $drd[0]['segmen'];?>.</li>
        <li>Apabila TPBW melakukan pengunduran diri atas permintaan sendiri tanpa pemberitahuan 2 (dua) bulan sebelumnya, maka pihak KOMET dapat mengenakan pinalti sesuai dengan perhitungan dari KOMET dengan mempertimbangkan kerugian-kerugian selama pengembangan TPBW. </li>
        <li>TPBW yang mengajukan permohonan pengunduran diri maka sejak pengunduran diri hak cuti menjadi hangus.</li>
        <li>Apabila TPBW mengajukan pengunduran diri, maka atas usulan Manajemen <?php echo $drd[0]['segmen'];?> maka KOMET dapat mempercepat pengunduran diri TPBW. </li>
        <li>KOMET dapat menerapkan aturan pemotongan gaji jika TPBW tidak disiplin dalam jadwal jam kerja dan adanya konfirmasi atas keterlambatan, adapun besaran pemotongan gaji sesuai dengan perhitungan dari KOMET yang diterapkan sesuai kesepakatan.</li>
        <li>Dalam rangka mendukung program Cinta Produk TELKOM, maka KOMET dapat menerapkan sanksi jika TPBW tidak mengindahkan himbauan untuk menggunakan layanan TELKOM Group. </li>
        <li>Apabila TPBW ternyata terbukti melakukan tindakan-tindakan yang langsung maupun tidak langsung, merugikan material maupun jasa, maka yang bersangkutan wajib mengganti kerugian menurut ketentuan tentang ganti rugi yang berlaku bagi KOMET dan <?php echo $drd[0]['segmen'];?>.</li>
        <li>Apabila TPBW mencemarkan nama baik KOMET dan atau <?php echo $drd[0]['segmen'];?>, maka TPBW dapat diminta pertanggungjawabannya oleh KOMET. </li>
        <li>Dalam hal TPBW melakukan pencemaran nama baik sebagaimana dimaksud Ayat (8) dan tidak dapat mempertanggungjawabkannya, maka KOMET akan menuntut TPBW ke Pengadilan Negeri setempat. </li>
        <li>Pelanggaran terhadap ketentuan Ayat (7) sampai dengan Ayat (8) yang tersebut diatas, dapat dikenakan sanksi yaitu Pemutusan Hubungan Kerja tanpa Pesangon. </li>
    </ol>

    <p class="text-center">
        <strong>
            Pasal 10
            <br>PENYELESAIAN PERSELISIHAN
        </strong>
    </p>
    <p style="text-align: justify;text-justify: inter-word;">
        Dalam hal terjadi perselisihan antara KOMET dengan TPBW, maka penyelesaiannya dilakukan secara musyawarah mufakat, apabila musyawarah mufakat tidak tercapai, maka kedua belah pihak sepakat menyelesaikan melalui jalur hukum. ------------------------------------
    </p>

    <br>
    <br>
    <br>
    <br>
    <br>
    <p class="text-center">
        <strong>
            Pasal 11
            <br>AMANDEMEN
        </strong>
    </p>
    <p style="text-align: justify;text-justify: inter-word;">
        Dalam hal terjadi perubahan terhadap isi Perjanjian ini, akan dilakukan dengan Kesepakatan Kedua belah pihak yang dituangkan dalam bentuk Amandemen. -----------------------------------
    </p>

    <p class="text-center">
        <strong>
            Pasal 12
            <br>PENUTUP
        </strong>
    </p>
    <p style="text-align: justify;text-justify: inter-word;">
        Perjanjian Kerja ini dibuat rangkap 2 (dua) asli diatas kertas bermeterai cukup, serta mempunyai kekuatan hukum yang sama setelah ditandatangani oleh kedua belah pihak, masing-masing 1 (satu) rangkap oleh kedua belah pihak. --------------------------------------------
    </p>

    <p style="text-align: justify;text-justify: inter-word;">
        Demikian Perjanjian ini dibuat dengan itikad baik tanpa adanya paksaan dan tekanan dari pihak manapun dan dalam keadaan sehat jasmani maupun rohani untuk dipatuhi dan dilaksanakan.
    </p>

    <br><br><br>
    <table width="100%">
        <tr>
            <td width="40%" class="text-center">
                <strong>KOPERASI METROPOLITAN</strong>
                <br><br><br><br><br><br><br><br>
                <b><u>RADIAN SIGIT DWIANANTO</u></b>
                <br><b>KETUA</b>
            </td>
            <td width="20%"></td>
            <td width="40%" class="text-center">
                <strong>TPBW</strong>
                <br><br><br><br><br><br><br><br>
                <b><u><?php echo $drd[0]['name'];?></u></b>
                <br>&nbsp;
            </td>
        </tr>
    </table>
</section>

</body>
</html>