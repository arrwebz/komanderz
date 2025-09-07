<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Timeline SPB</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri')?>favicon.png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#e10b15">

    <meta name="title" content="Timeline SPB Koperasi Metropolitan">
    <meta name="description" content="Laporan Timeline SPB <?php echo $datenow;?>">
    <meta name="image_src" content="<?php echo base_url().'public/assets/dist/img/logo-komet.png';?>">

    <meta property="og:type" content="profile">
    <meta property="og:url" content="<?php echo site_url('quickreport/spbtime');?>">
    <meta property="og:image" content="<?php echo base_url().'public/assets/dist/img/logo-komet.png';?>">
    <meta property="og:image:width" content="620">
    <meta property="og:image:height" content="413">
    <meta property="og:title" content="Timeline SPB Koperasi Metropolitan">
    <meta property="og:description" content="Laporan Timeline SPB <?php echo $datenow;?>">
    <meta property="og:site_name" content="KOperasi METropolitan">

    <?php $this->carabiner->display('css_head');?>
    <?php $this->carabiner->display('js_head');?>
    <style type="text/css">
        .label-komet{background: #e74c3c; color:#ffffff;}
        .label-mesra{background: #3498db; color:#ffffff;}
        .label-padi{background: #605ca8; color:#ffffff;}
    </style>
</head>
<body style="background-color: #ecf0f5;">
<section class="content">
    <div class="row" style="margin:8% auto;">
        <div class="col-md-8 col-lg-offset-2">
            <div class="box box-default">
                <div class="box-header text-center">
                    <h3 class="box-title" style="margin-left: 20px;">
                        <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet.png'; ?>" alt="Koperasi Metropolitan" width="120px"/>
                        <br><i class="fa fa-globe"></i> TIMELINE SPB <?php echo getIndMonth(date('m')).' '.date('Y');?>
                    </h3>
                </div>
                <div class="box-body" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <div id="boxAbsen" class="clearfix border-top border-bottom" style="margin-bottom: 20px;">
                            <div class="col-sm-4 border-right border-left">
                                <div class="description-block">
                                    <a href="javascript:" class="btn btn-social btn-github refresh-spb" style="padding: 5px 60px;"><i class="fa fa-refresh"></i> Refresh</a>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right border-left">
                                <div class="description-block">
                                    <span class="description-text"><strong>TOTAL SPB</strong></span>
                                    <h5 class="description-header"></h5>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <a id="btnShare" class="btn btn-social bg-olive share hidden" style="padding: 5px 60px;"><i class="fa fa-whatsapp"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div id="dataSPB"></div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <div>
                        Copyright &copy; <?php echo date('Y');?>
                        <a href="#" class="text-black">
                            <strong>Koperasi Metropolitan</strong>
                        </a>
                    </div>
                    <div>All rights reserved</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->carabiner->display('js_content');?>
<script>
	$(function(){
		$(".refresh-spb").on("click",function () {
			$("#dataSPB").html("Loading...");
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('quickreport/ajaxspbtime')?>",
				data: '',
				success: function (data) {
					$("#btnShare").removeClass("hidden");
					$("#dataSPB").html(data);
				}
			});
		});
		$(".refresh-spb").trigger('click');

		/* auto reload */
		function reloadspb() {
			$("#refresh-spb").trigger('click');
		}
		setInterval(reloadspb, 15000); /* setiap 15 detik */
		/* end auto reload */

		/* cek device */
		if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
			$("#btnShare.share").attr("data-href","whatsapp://send?text=");
			$("#btnShare.share").html("<i class='fa fa-whatsapp'></i> Share via Whatsapp Mobile");
		}else{
			$("#btnShare.share").attr("data-href","https://web.whatsapp.com/send?text=");
			$("#btnShare.share").html("<i class='fa fa-whatsapp'></i> Share via Whatsapp web");
		}

		/* goto share */
		$("#btnShare").on("click", function () {
			var textWa = '*Laporan Timeline SPB* %0A<?php echo $datenow; ?> %0A%0ADetail : https://kms.kopegtel-metropolitan.co.id/quickreport/spbtime %0A%0A*Komanders*';
			var link = $(".share").attr("data-href");
			var target = link+textWa;
			window.open(target);
		});
	});
</script>
</body>
</html>