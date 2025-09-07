<!DOCTYPE html>
<html style="color-scheme:dark;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $this->config->item('images_uri') ?>favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-16x16.png">

    <title><?php echo $title;?></title>
    <meta name="description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">

    <meta property="og:title" content="Daily Report <?php echo date('d-m-Y');?>">
    <meta property="og:description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo site_url('quickreport/daily');?>">
    <meta property="og:image" content="<?php echo $this->config->item('skins_uri');?>images/backgrounds/logo-komet.png">
    <meta property="og:site_name" content="Komanders">

    <?php $this->carabiner->display('css_head');?>
    <style type="text/css">
        .margin-left-none{margin-left:0px !important;}
        .col-money{color: #2ecc71;}
        .col-red{color: #e35d59;}
        .font-10{font-size: 10px;}
        .font-14{font-size: 14px;}
        .font-16{font-size: 16px;}
        .font-17{font-size: 17px;}
        .font-18{font-size: 18px;}
        .font-24{font-size: 24px;}
        .font-28{font-size: 28px;}
        .font-30{font-size: 30px;}
        .font-40{font-size: 40px;}
        .font-62{font-size: 62px;}
        .mt5{margin-top: 5px;}
        .mt8{margin-top: 28px;}
        .mb8{margin-bottom: 8px;}
        .no-boxshadow{box-shadow: none;}

        .bg-acc{background-color: #F3C300;}
        .bg-percepatan{background-color: #68001C;}
        .bg-segmen{background-color: #F38400;}
        .bg-legal{background-color: #68001C;}
        .bg-npk{background-color: #68001C;}
        .bg-revisi{background-color: #68001C;}
        .bg-dochilang{background-color: #68001C;}
        .bg-invidea{background-color: #A1CAF1;}
        .bg-precise{background-color: #A1CAF1;}
        .bg-logistik{background-color: #68001C;}
        .bg-keuangan{background-color: #C2B280;}
        .bg-forecasting{background-color: #B5A779;}
        .bg-paid{background-color: #B06755;}

        .p-10{padding: 10px;}
        .p-20{padding: 20px;}
        .b-bottom{border-bottom: 1px solid #f4f4f4;}
        .no-boxshadow{box-shadow: none;}
        .no-radius{border-radius: unset;}
        .col-white{color:#CBD5E1;}
        .bg-dark{background: #1B253B;color: #CBD5E1;}
        .box-dark{background: #232D45; border: none; color:#CBD5E1 !important;}
        .nav-tabs-custom>.tab-content{background: #232D45;}
        .nav-tabs-custom>.nav-tabs>li>a{color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs.pull-right>li{background: #232D45; color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs>li.active{border-top-color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs>li>a:hover, .nav-tabs-custom>.nav-tabs>li.active>a:hover{color: #dbe5f1;}
        .nav-tabs-custom>.nav-tabs>li.active>a, .nav-tabs-custom>.nav-tabs>li.active:hover>a{background-color: #232D45 !important;}
        .nav-tabs-custom>.nav-tabs>li.active>a{background: #232D45 !important; color:#CBD5E1;}
        .info-box-number {display: block;font-weight: bold;font-size: 18px;}
        .description-block{display: block;margin: 10px 0;text-align: center;}
        .border-right{border-right: 1px solid #f4f4f4;}

        .table {
            --bs-table-color: #CBD5E1;
            --bs-table-bg: unset;
        }
    </style>

    <?php $this->carabiner->display('js_head');?>
</head>
<body class="hold-transition lockscreen bg-dark">
<div style="max-width: 100%;">
    <section class="content p-20">
        <div class="card no-radius p-10 box-dark">
            <div class="card-header p-10 b-bottom col-white">
                <div class="row">
                    <div class="box-title col-lg-6">
                        <span class="font-40">DAILYREPORT LOP</span>
                        <i><?php echo customDate(date('Y-m-d H:i:s'));?></i>
                    </div>
                    <div class="box-tools col-lg-6 text-right">
                        <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet-white.png'; ?>" alt="Koperasi Metropolitan" width="95px"/>
                    </div>
                </div>
            </div>
            <div class="box p-10 box-dark" style="margin:0 20px;">
                <div class="box-body p-0">
                    <div class="row col-md-12 p-0">
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered text-nowrap customize-table mb-0 align-middle">
                                <thead>
                                <tr>
                                    <td>Cust</td>
                                    <td class="text-center">Belum ada status</td>
                                    <td class="text-center">P1</td>
                                    <td class="text-center">P8</td>
                                    <td class="text-center">KL</td>
                                    <td class="text-center">BAST</td>
                                    <td class="text-center">BAPLA</td>
                                    <td class="text-center">NPK</td>
                                    <td class="text-center">INVOICE</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($drd as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['name'];?></td>
                                        <td class="text-center"><?php echo formatrev($row['kosong']);?></td>
                                        <td class="text-center"><?php echo formatrev($row['p1']);?></td>
                                        <td class="text-center"><?php echo formatrev($row['p8']);?></td>
                                        <td class="text-center"><?php echo formatrev($row['kl']);?></td>
                                        <td class="text-center"><?php echo formatrev($row['bast']);?></td>
                                        <td class="text-center"><?php echo formatrev($row['bapl']);?></td>
                                        <td class="text-center"><?php echo formatrev($row['bapla']);?></td>
                                        <td class="text-center"><?php echo formatrev($row['invoice']);?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="lockscreen-footer text-center">
        Copyright &copy; <?php echo date('Y')?>. All rights reserved
        <br><b>Crafted with <i class="ti ti-heart" style="color: #f06548 !important;"></i> by Koperasi Metropolitan</b>
        <br><p style="color: #8f9b9f;">rendering in {elapsed_time} seconds</p>
        <br>
    </div>
</div>

<?php $this->carabiner->display('js_content');?>
<script>
	$(function () {
		function reloadletter() {
			window.location.href = '<?php echo site_url('quickreport/dtrack')?>';
		}
		setInterval(reloadletter , 120000); /* setiap 1 menit */

		var table = $('#datatables1, #datatables2, #datatables3, #datatables4, #datatables5, #datatables6, #datatables7, #datatables8').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmaccurate'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmaccurate'].' invois '.$tracking[$i]['orderstatus']?> di akuret tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmpercepatan'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmpercepatan'].' invois '.$tracking[$i]['orderstatus']?> di percepatan tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmsegmen'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmsegmen'].' invois '.$tracking[$i]['orderstatus']?> di segmen tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmnpk'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmnpk'].' invois '.$tracking[$i]['orderstatus']?> di enpeka tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmlegal'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmlegal'].' invois '.$tracking[$i]['orderstatus']?> di legal tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmrevisi'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmrevisi'].' invois '.$tracking[$i]['orderstatus']?> di revisi tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmdokhilang'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmdokhilang'].' invois '.$tracking[$i]['orderstatus']?> di dokumen hilang tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarminvidea'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarminvidea'].' invois '.$tracking[$i]['orderstatus']?> di invidea tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmprecise'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmprecise'].' invois '.$tracking[$i]['orderstatus']?> di pricese tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmlogistik'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmlogistik'].' invois '.$tracking[$i]['orderstatus']?> di logistik tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmkeuangan'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmkeuangan'].' invois '.$tracking[$i]['orderstatus']?> di keuangan tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

        <?php for($i=0; $i<count($tracking); $i++){ ?>
        <?php if($tracking[$i]['alarmforecasting'] > 0){?>
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Halo tim a er ada <?php echo $tracking[$i]['alarmforecasting'].' invois '.$tracking[$i]['orderstatus']?> di forekasting tidak bergerak";
		speechSynthesis.speak(msg);
        <?php } ?>
        <?php } ?>

		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[0];
		msg.text = "Terima kasih, Salam Corsec";
		speechSynthesis.speak(msg);
	});
	speechSynthesis.getVoices().forEach(function(voice) {
		console.log(voice.name, voice.default ? voice.default :'');
	});
</script>
</body>
</html>