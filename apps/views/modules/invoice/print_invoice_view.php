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
            <div class="po"><strong>INVOICE</strong></div>
        </div>
    </header>

    <main>   
		<div class="box" style="margin-top:10px;">
            <p class="text-right" style="font-size: 16px;">ID : <?php echo $kodenomor;?><br>Date : <?php echo date('d/m/Y', strtotime($tglinv));?></p>
        </div>
		
		<div class="box" <?php if(count($iteminvoice) > 5): ?>style="margin-top:100px;"<?php endif; ?>>
            <table class="table table-bordered">
                <thead>
                    <tr style="background: #fafafa;">
                        <td><strong>Invoice to</<strong></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                        <tr>
                            <td style="width: 5%;"><?php echo $amuser;?><br><?php echo $segmen;?><br><?php echo $segmenpt;?><br><?php echo $segmenalamat;?></td>
                        </tr>
                </tbody>
            </table>
        </div>

        <div class="box">
            <table class="table table-bordered">
                <thead>
                    <tr style="background: #fafafa;">
                        <td><strong>Description</<strong></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                        <tr>
                            <td style="width: 5%;"><?php echo $namaproyek;?></td>
                        </tr>
                </tbody>
            </table>
        </div>

        <div class="box">
            <table class="table table-bordered">
                <thead>
                    <tr style="background: #fafafa;">
                        <td><strong>#</strong></td>
                        <td><strong>Item</strong></td>
                        <td><strong>Qty</strong></td>
                        <td><strong>Unit</strong></td>
                        <td><strong>Price</strong></td>
                        <td><strong>Amount</strong></td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                <?php if(count($iteminvoice) > 0): ?>
                    <?php for($i=0; $i<count($iteminvoice); $i++): ?>
                        <tr data-id='<?php echo $i+1;?>'>
                            <td style="width: 5%;" class='text-center'><?php echo $i+1;?></td>
                            <td style="width: 50%;">
                                <div><?php echo $iteminvoice[$i]['description'];?></div>
                            </td>
                            <td class="text-center">
                                <div><?php echo $iteminvoice[$i]['qty'];?></div>
                            </td>
                            <td class="text-center">
                                <div><?php echo $iteminvoice[$i]['unit'];?></div>
                            </td>
                            <td class="text-right">
                                <div><?php echo strrev(implode('.',str_split(strrev(strval($iteminvoice[$i]['price'])),3)));?></div>
                            </td>
                            <td class="text-right">
                                <div><?php echo strrev(implode('.',str_split(strrev(strval($iteminvoice[$i]['qty']*$iteminvoice[$i]['price'])),3)));?></div>
                            </td>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr class="text-right">
                    <td style="border:none !important;"></td>
                    <td style="border:none !important;"></td>
                    <td style="border:none !important;"></td>
                    <td colspan="2" class="text-right"><strong>Subtotal</strong></td>
                    <td><div><strong><?php echo $nilainet;?></strong></div></td>
                </tr>
                <tr class="text-right">
                    <td style="border:none !important;"></td>
                    <td style="border:none !important;"></td>
                    <td style="border:none !important;"></td>
                    <td colspan="2" class="text-right"><strong>PPN</strong></td>
                    <td><div><strong><?php echo $nilaimargin;?></strong></div></td>
                </tr>
                <tr class="text-right">
                    <td style="border:none !important;"></td>
                    <td style="border:none !important;"></td>
                    <td style="border:none !important;"></td>
                    <td colspan="2" class="text-right"><strong>Total</strong></td>
                    <td><div><strong><?php echo $nilaippn;?></strong></div></td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="box" style="margin-left: 30px;">
            <div> </div>
        </div>
        <div class="col-md-12 text-right bg-kmt" style="margin-top: 20px; height: 180px;">
            <div>Sincerly,</div>
            <div style="margin-top: 50px;"><b><u>Alfian Insani Fadil S.T </u></b></div>
            <div><b>Director</b></div>
        </div>
    </main>
	<footer style="margin-top:10px;">
		<p align="center" style="font-size: 10px;"><strong>PT. Rafindio Insantama Oceanindo</strong></p>
		<p align="center" style="font-size: 10px;margin-top:-10px;">JL. KH. Muchtar Tabrani, No.2, Summarecon Kota Bekasi, Marga Mulya, Kecamatan Bekasi Utara, Kota Bekasi, Jawa Barat 17124</p>
		<p align="center" style="font-size: 10px;margin-top:-10px;">Phone: 081381112795 | Email: rafindioinsantama@gmail.com</p>
		<p align="center" style="font-size: 10px;margin-top:-10px;">www.rafindio.com</p>
	</footer>
</body>
</html>
