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
        <div>
            <div class="po"><strong>BERITA ACARA SERAH TERIMA</strong></div>
        </div>
    </header>

    <main>   
		<div class="box" style="margin-top:-30px;">
            <p style="font-size: 16px; text-align:center;">BAST<?php echo substr($kodenomor, 2);?> </p>
        </div>
		
		<div class="box" style="margin-top:-50px;">
			<p style="font-size: 12px;">Pada hari ini <?php echo $tglbast;?> bertempat di <?php echo $segmenalamat;?>, kami yang bertanda tangan di bawah ini : </p>
        </div>

        <div class="box" style="margin-top:-30px;">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 10%;"><strong>I.</<strong></td>
                    </tr>
                    <tr>
                        <td style="width: 10%;"><strong>Nama</<strong></td>
                        <td style="width: 50%;"><strong>: Radian Sigit Dwiananto</<strong></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                        <tr>
                            <td style="width: 10%;"><strong>Instansi</strong></td>
                            <td style="width: 50%;"><strong>: Koperasi Konsumen Metropolitan PT. Telkom</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;"><strong>Alamat</strong></td>
                            <td style="width: 50%;"><strong>: Menara Multimedia, Jl. Kebon Sirih No.10 11, RT.11/RW.2, Jakarta Pusat</strong></td>
                        </tr>
                </tbody>
            </table>
        </div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">Untuk selanjutnya disebut sebagai <strong>Pihak Pertama.</strong></p>
        </div>
		
		<div class="box" style="margin-top:-40px;">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 10%;"><strong>II.</<strong></td>
                    </tr>
                    <tr>
                        <td style="width: 10%;"><strong>Nama</<strong></td>
                        <td style="width: 50%;"><strong>: <?php echo $amuser;?></<strong></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                        <tr>
                            <td style="width: 10%;"><strong>Instansi</strong></td>
                            <td style="width: 50%;"><strong>: <?php echo $segmenpt;?></strong></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;"><strong>Divisi/Unit</strong></td>
                            <td style="width: 50%;"><strong>: <?php echo $segmen;?></strong></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;"><strong>Alamat</strong></td>
                            <td style="width: 50%;"><strong>: <?php echo $segmenalamat;?></strong></td>
                        </tr>
                </tbody>
            </table>
        </div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">Untuk selanjutnya disebut sebagai <strong>Pihak Kedua.</strong></p>
        </div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">Dengan ini menyatakan bahwa Pihak Pertama telah menyerahkan kepada Pihak Kedua, dan Pihak Kedua telah menerima dari Pihak Pertama barang/jasa <b><i><?php echo $namaproyek;?></i></b> dengan rincian sebagai berikut:</p>
        </div>

        <div class="box" style="margin-top:-40px;">
            <table class="table table-bordered">
                <thead>
                    <tr style="background: #fafafa;">
                        <td><strong>No</strong></td>
                        <td class="text-center"><strong>Nama</strong></td>
                        <td class="text-center"><strong>Jumlah</strong></td>
                        <td class="text-center"><strong>Keterangan</strong></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                <?php if(count($iteminvoice) > 0): ?>
                    <?php for($i=0; $i<count($iteminvoice); $i++): ?>
                        <tr data-id='<?php echo $i+1;?>'>
                            <td style="width: 5%;" class='text-center'><?php echo $i+1;?></td>
                            <td style="width: 75%;">
                                <div><?php echo $iteminvoice[$i]['description'];?></div>
                            </td>
                            <td class="text-center">
                                <div><?php echo $iteminvoice[$i]['qty'];?> <?php echo $iteminvoice[$i]['unit'];?></div>
                            </td>
                            <td class="text-center">
                                <div>BAIK</div>
                            </td>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
		
        <div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">Berdasarkan hasil pengecekan dan verifikasi yang dilakukan oleh Pihak Pertama dan Pihak Kedua, barang/jasa yang diserahterimakan dinyatakan dalam kondisi sebagai berikut:</p>
        </div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">1. Seluruh barang/jasa yang diserahkan berada dalam kondisi baik dan berfungsi sebagaimana mestinya, telah sesuai dengan standar dan spesifikasi yang telah ditentukan sebelumnya, tanpa adanya kerusakan fisik atau malfungsi yang dapat mempengaruhi operasional atau pemakaian barang/jasa tersebut.</p>
        </div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">2. Dokumen ini menjadi acuan utama bagi Pihak Pertama dalam melakukan penagihan kepada Pihak Kedua dan diakui oleh masing-masing pihak keabsahannya.</p>
        </div>
		
		<div class="box" style="margin-top:-60px;">
			<p style="font-size: 12px;">Dengan demikian, barang/jasa yang diterima dapat dinyatakan layak digunakan dan sesuai dengan perjanjian antara Pihak Pertama dan Pihak Kedua.</p>
        </div>
		<div class="box" style="margin-top:-40px;">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 50%;" align="center"><strong>Koperasi Konsumen Metropolitan PT. Telkom<br><br><br><br></<strong></td>
                        <td style="width: 50%;" align="center"><strong><?php echo $segmenpt;?><br><br><br><br></<strong></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                    <tr>
                        <td style="width: 50%;" align="center"><strong>Radian Sigit Dwiananto</<strong></td>
                        <td style="width: 50%;" align="center"><strong><?php echo $amuser;?></<strong></td>
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
