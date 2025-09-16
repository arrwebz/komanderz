<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->config->item('web_name') ?> - <?php echo $title ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <style>
            @page {
                margin: 0cm 0cm;
            }
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;

                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                line-height: 1.5;
                vertical-align: baseline;
                -webkit-text-size-adjust: auto;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }

            .text-center{text-align: center}
            .text-right{text-align: right}
            .m20{margin:20px;}
            .mr20{margin-right:20px;}

            .box{margin:40px 0;}
            .customer{
                width:300px;
            }
            .po{
                top:50px;
                font-size: 24px;
                color:#000000;
                text-align: center;
            }

            .from{
                width: 250px;
                clear: both;
            }
            .to{
                width: 250px;
                position: absolute;
                top:0;
                margin-left: 250px;
                clear: top;
            }
            .ponumber{
                width: 200px;
                position: absolute;
                top:0;
                margin-left: 500px;
                clear: both;
            }
			.datepo{
                width: 200px;
                position: absolute;
                top:0;
                margin-left: 500px;
                clear: both;
            }

            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
                background-color: transparent;
                border-collapse: collapse;
                border-spacing: 0;
            }
            .table-bordered {
                border: 1px solid #f4f4f4;
            }
            .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
                border: 1px solid #2f2f2f;
            }
            .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
                padding-left: 5px;
                padding-right: 5px;
            }

        </style>
    </head>
<body>

    <header>
	
    </header>

    <main>   
		<div class="box" style="margin-top:-40px;">
            <p style="font-size: 16px; text-align:center;"> </p>
        </div>
		
		<div class="box">
			<p style="font-size: 12px;">Jakarta, <?php echo $tglsp;?></p>
        </div>

        <div class="box" style="margin-top:-30px;">
            <table class="table">
                    <tr>
                        <td style="width: 10%;">Nomor</td>
                        <td style="width: 50%;">: SP<?php echo substr($kodenomor, 2);?></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                        <tr>
                            <td style="width: 10%;">Perihal</td>
                            <td style="width: 50%;">: Surat Permohonan Pembayaran</td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Lampiran</td>
                            <td style="width: 50%;">: 1 bundel tagihan</td>
                        </tr>
                </tbody>
            </table>
        </div>
		
		<div class="box">
			<p style="font-size: 12px;">Kepada yang terhormat,<br><b><?php echo $segmenpt;?></b><br><?php echo $segmenalamat;?></p>
        </div>
		
		<div class="box" style="margin-top:-40px;">
			<p style="font-size: 12px;">Dengan hormat,</p>
			<ol type="1">
				<li>Merujuk surat kontrak nomor <b><?php echo $nomorspk;?></b> tanggal <?php echo $tglspk;?>, perihal <?php echo $namaproyek;?>.</li>
			</ol>
			<p style="font-size: 12px;">Sehubung dengan telah selesainya pekerjaan barang/jasa pada Point 1 (satu), kami dari Koperasi Konsumen Metropolitan PT Telkom mengajukan permohonan pembayaran sesuai dengan perjanjian dan kesepakatan yang telah disetujui sebelumnya.</p>
			<p style="font-size: 12px;">Adapun rincian pembayaran yang kami ajukan adalah sebagai berikut:</p>
			<ul>
				<li>Nomor Invoice: <b><?php echo $kodenomor;?></b></li>
				<li>Tanggal Invoice: <b><?php echo $tglinv;?></b></li>
				<li>Jumlah Pembayaran: <b>Rp. <?php echo $nilaippn;?>,-</b> ( <?php echo $terbilang;?>)</li>
			</ul>
        </div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">Kami berharap pembayaran dapat dilakukan setelah surat ini diterima, dengan transfer ke rekening kami di:</p>
			<ul>
				<li>Nama Bank: <b>Mandiri</b></li>
				<li>Nomor Rekening: <b>1234567890</b></li>
				<li>Atas Nama: <b>Koperasi Konsumen Metropolitan PT Telkom/b></li>
			</ul>
		</div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">Bahwa berdasarkan UU No. 7 tahun 2021 tentang harmonisasi peraturan perpajakan diatur bahwa pemberlakuan PPN 11% per 1 April 2022. Maka disampaikan untuk tagihan pembayaran ini dikenakan PPN 11%.</p>
        </div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">Demikian permohonan ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
        </div>

        
		<div class="box" style="margin-top:-40px;">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 50%;">Hormat kami,<br><br><br><br></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                    <tr>
                        <td style="width: 50%;"><strong><u>Radian Sigit Dwiananto</u><br>Ketua</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>	
    </main>
	<footer style="margin-top:50px;">
		<p align="center" style="font-size: 10px;"><strong>Koperasi Konsumen Metropolitan PT. Telkom</strong></p>
		<p align="center" style="font-size: 10px;margin-top:-10px;">Menara Multimedia, Jl. Kebon Sirih No.10 11, RT.11/RW.2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110</p>
		<p align="center" style="font-size: 10px;margin-top:-10px;">Phone: 021 2139 7196 | Email: komet.metropolitan@gmail.com</p>
		<p align="center" style="font-size: 10px;margin-top:-10px;">www.kopegtel-metropolitan.co.id</p>
	</footer>
</body>
</html>
