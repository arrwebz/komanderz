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
                top:30px;
                right:0;
                font-size: 28px;
                color:#e08b6c;
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
                border: 1px solid #ffb179;
            }
            .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
                padding-left: 5px;
                padding-right: 5px;
            }

            footer {
                position: fixed;
                bottom: 0cm;
                height: 1cm;
                font-size: 11px;

                /** Extra personal styles **/
                background: #c00000;
                color:#FFFFFF;
                padding-top:20px;
                padding-bottom:5px;
            }
            .foot-left{
                width: 300px;
                clear: both;
                text-align: center;
            }
            .foot-center{
                width: 300px;
                position: absolute;
                top:0;
                margin-left: 230px;
                clear: top;
                text-align: center;
            }
            .foot-right{
                width: 200px;
                position: absolute;
                top:0;
                margin-left: 500px;
                clear: both;
                text-align: center;
            }
        </style>
    </head>
<body>

    <header>
        <div class="text-right mr20">
            <img src="public/assets/dist/img/logo-komet.png" alt="Komet" style="width: 150px;"/>
        </div>
    </header>

    <main>
        <div class="box">
            <div class="customer">
                <?php echo $drd[0]['customer'];?>
            </div>
            <div class="po">PURCHASE ORDER</div>
        </div>

        <div class="box">
            <div class="from">
                <div>FROM :</div>
                <?php echo $drd[0]['dari'];?>
            </div>
            <div class="to">
                <div>TO :</div>
                <div><?php echo $drd[0]['kepada'];?></div>
            </div>
            <div class="ponumber">
                <label>P.O. NUMBER:</label>
                <div><strong><?php echo $drd[0]['ponumber'];?></strong></div>
                <label>DATE:</label>
                <div><strong><?php echo date('d/m/Y', strtotime($drd[0]['datepo']));?></strong></div>
            </div>
        </div>

        <div class="box">
            <div>
                Dengan hormat,
                <br>Bersama surat ini kami mengkonfirmasi barang yang akan di pesan, yaitu sebagai berikut :
            </div>
        </div>

        <div class="box">
            <table class="table table-bordered">
                <thead>
                    <tr style="background: #ffc9aa;">
                        <td class="text-center"></td>
                        <td>UNIT</td>
                        <td class="text-center">QTY</td>
                        <td class="text-right">UNIT PRICE</td>
                        <td class="text-right">TOTAL</td>
                    </tr>
                </thead>
                <tbody class="row-unit">
                <?php if(count($drdunit) > 0): ?>
                    <?php for($i=0; $i<count($drdunit); $i++): ?>
                        <tr data-id='<?php echo $i+1;?>'>
                            <td style="width: 5%;" class='text-center'><?php echo $i+1;?></td>
                            <td style="width: 50%;">
                                <div><?php echo $drdunit[$i]['namaunit'];?></div>
                                <div><?php if(!empty($drdunit[$i]['keterangan'])){ echo '('.$drdunit[$i]['keterangan'].')'; };?></div>
                            </td>
                            <td class="text-center">
                                <div><?php echo $drdunit[$i]['qty'];?></div>
                            </td>
                            <td class="text-right">
                                <div><?php echo strrev(implode('.',str_split(strrev(strval($drdunit[$i]['price'])),3)));?></div>
                            </td>
                            <td class="text-right">
                                <div><?php echo strrev(implode('.',str_split(strrev(strval($drdunit[$i]['qty']*$drdunit[$i]['price'])),3)));?></div>
                            </td>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td>Biaya Kirim</td>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        <div>
                            <?php
                            if(!empty($drd[0]['ongkir'])){
                                echo strrev(implode('.',str_split(strrev(strval($drd[0]['ongkir'])),3)));
                            }else{
                                echo '-';
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr class="text-right">
                    <td style="border:none !important;"></td>
                    <td style="border:none !important;"></td>
                    <td colspan="2" class="text-right"><strong>TOTAL</strong></td>
                    <td><div><strong><?php echo strrev(implode('.',str_split(strrev(strval($drd[0]['totalpo'])),3)));?></strong></div></td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="box" style="margin-left: 30px;">
            <div><?php echo $drd[0]['notes'];?></div>
        </div>
        <div class="col-md-12 text-right bg-kmt" style="margin-top: 20px; height: 200px;">
            <div>Jakarta, <?php echo date('d M Y', strtotime($drd[0]['datepo']));?></div>
            <div>Hormat Kami,</div>
            <img src="public/assets/dist/img/ttd-arrie.png" alt="ttd-arrie" style="margin-top: 15px;"/>
            <div><u>Arrie Wicaksono</u></div>
            <div>Koperasi Metropolitan</div>
        </div>
    </main>

    <div style="position:absolute; margin-left:-265px; bottom:-140px;">
        <img src="public/assets/dist/img/bg-po.png" alt="aple" width="550px; opacity:0.1%"/>
    </div>

    <footer>
        <div class="foot-left">
            Menara Multimedia Lt. 1
        </div>
        <div class="foot-center">
            Jl. Kebon Sirih No.10-12, Gambir - Jakarta Pusat
            <br>www.kopegtel-metropolitan.co.id
        </div>
        <div class="foot-right">
            Telp : (021) 319 01666
        </div>
    </footer>
</body>
</html>
