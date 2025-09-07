<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri')?>favicon.png" />

    <title><?php echo $title;?></title>
    <meta name="description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">

    <meta property="og:title" content="Daily Report <?php echo date('d-m-Y');?>">
    <meta property="og:description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo site_url('quickreport/daily');?>">
    <meta property="og:image" content="https://kms.kopegtel-metropolitan.co.id/public/assets/dist/img/logo-komet.png">
    <meta property="og:site_name" content="Komanders">

    <?php $this->carabiner->display('css_head');?>
    <?php $this->carabiner->display('js_head');?>
</head>
<body class="hold-transition lockscreen">
<div style="max-width: 100%;">
    <section class="content no-padding">
        <div class="box no-border no-boxshadow">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span class="font-40">Rencana Kegiatan</span><br>
                    <i><?php echo customDate(date('Y-m-d H:i:s'));?></i>
                </h3>
                <div class="box-tools">
                    <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet.png'; ?>" alt="Koperasi Metropolitan" width="95px"/>
                </div>
            </div>

            <div class="box-body no-border">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </section>

    <div class="lockscreen-footer text-center">
        Copyright &copy; <?php echo date('Y')?>. All rights reserved
        <br><b>Crafted with <i class="fa fa-heart" style="color: #f06548 !important;"></i> by Koperasi Metropolitan</b>
        <br><p style="color: #8f9b9f;">rendering in {elapsed_time} seconds</p>
        <br>
    </div>
</div>

<?php $this->carabiner->display('js_content');?>
<script>
	$(function () {
		var table = $('#datatables1, #datatables2, #datatables3, #datatables4, #datatables5, #datatables6, #datatables7, #datatables8').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
	});
</script>
</body>
</html>