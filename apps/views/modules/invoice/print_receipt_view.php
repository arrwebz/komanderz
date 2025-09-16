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
                width:300px;
                position:absolute;
                top:50px;
                right:75px;
				margin-bottom: 100px;
                font-size: 48px;
                color:#000000;
                text-align: right;
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
        <div class="text-right mr20">
            <div class="po"><strong>RECEIPT</strong></div>
        </div>
    </header>

    <main>   
		<div class="box" style="margin-top:10px;">
            <p class="text-right" style="font-size: 16px;"><?php echo $kodenomor;?></p>
        </div>

        <div class="box">
            <table class="table table-bordered">
				<thead>
                        <tr>
                            <td style="width: 5%;border:none !important;"><strong>Received from</strong></td>
                        </tr>
				<thead>
                <tbody class="row-unit" style="background: #fafafa;">
                        <tr>
                            <td style="width: 5%;"><?php echo $segmenpt;?><br><?php echo $segmenalamat;?></td>
                        </tr>
                </tbody>
            </table>
        </div>

		<div class="box">
            <table class="table table-bordered">
				<thead>
                        <tr>
                            <td style="width: 5%;border:none !important;"><strong>Amount</strong></td>
                        </tr>
				<thead>
                <tbody class="row-unit" style="background: #fafafa;">
                        <tr>
                            <td style="width: 5%;font-size: 24px;"><strong>Rp <?php echo $nilaippn;?></td>
                        </tr>
                        <tr>
                            <td style="width: 5%;"><i><?php echo $terbilang; ?></i></td>
                        </tr>
                </tbody>
            </table>
        </div>
		
		<div class="box">
            <table class="table table-bordered">
				<thead>
                        <tr>
                            <td style="width: 5%;border:none !important;"><strong>Purpose of Payment</strong></td>
                        </tr>
				<thead>
                <tbody class="row-unit" style="background: #fafafa;">
                        <tr>
                            <td style="width: 5%;"><?php echo $namaproyek;?></td>
                        </tr>
                </tbody>
            </table>
        </div>

        <div class="box" style="margin-left: 30px;">
            <div> </div>
        </div>
        <div class="col-md-12 text-right bg-kmt" style="margin-top: 20px; height: 180px;">
            <div>Jakarta, <?php echo date('d F Y', strtotime($tglinv));?></div>
            <div style="margin-top: 120px;"><b><u>Radian Sigit Dwiananto</u></b></div>
            <div><b>Ketua</b></div>
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
