<!DOCTYPE html>
<html lang="id-ID">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nomor Surat Komet</title>
        <link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri')?>favicon.png" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="theme-color" content="#e10b15">

        <meta name="title" content="Nomor Surat Komet">
        <meta name="description" content="Laporan Nomor Surat Terbaru Komet <?php echo $datenow;?>">
        <meta name="image_src" content="<?php echo base_url().'public/assets/dist/img/logo-komet.png';?>">

        <meta property="og:type" content="profile">
        <meta property="og:url" content="<?php echo site_url('quickreport/letter');?>">
        <meta property="og:image" content="<?php echo base_url().'public/assets/dist/img/logo-komet.png';?>">
        <meta property="og:image:width" content="620">
        <meta property="og:image:height" content="413">
        <meta property="og:title" content="Nomor Surat Komet">
        <meta property="og:description" content="Laporan Nomor Surat Terbaru Komet <?php echo $datenow;?>">
        <meta property="og:site_name" content="KOperasi METropolitan">

        <?php $this->carabiner->display('css_head');?>
        <?php $this->carabiner->display('js_head');?>
        <style>
            .info-box-text{font-size: 22px !important; word-break: break-all;}
            .info-box-number{font-size: 22px !important; word-break: break-all;}
            .info-box-icon{height: 105px;line-height: 105px;}
        </style>
    </head>
    <body style="background-color: #ecf0f5;">
        <section class="content">
            <div class="row" style="margin:8% auto;">
                <div class="col-md-10 col-lg-offset-1">
                    <div class="box box-default">
                        <div class="box-header text-center">
                            <h3 class="box-title">
                                <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet.png'; ?>" alt="Koperasi Metropolitan" width="120px"/>
                            </h3>
                        </div>
                        <div class="box-body" style="margin-bottom: 10px;">
                            <div class="col-md-6">
                                <div class="info-box bg-red">
                                    <span class="info-box-icon"><i class="fa fa-file-word-o" style="margin: 20px;"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Internal</span>
                                        <span class="info-box-number internal" data-val="asd">Loading...</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">Komanders</span>
                                    </div>
                                </div>
									<img src="<?php echo base_url() . 'public/assets/dist/img/komanders.png'; ?>" alt="Komanders" width="120px"/>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-gray">
                                    <span class="info-box-icon"><i class="fa fa-file-word-o" style="margin: 20px;"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">External</span> 
                                        <span class="info-box-number external" data-val="asd">Loading...</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">Komanders</span>
                                    </div>
                                </div>
									<img src="<?php echo base_url() . 'public/assets/dist/img/kaila.png'; ?>" alt="Kaila" width="70px" height="130px" style="float:right;"/>
                            </div>
                            <div class="col-md-12 text-center" style="margin-top:8px;">
                                <div style="margin-bottom: 8px;">
                                    <a href="javascript:" class="btn btn-social btn-github refresh-nomor-surat" style="padding: 5px 60px;">
                                        <i class="fa fa-refresh"></i>Refresh
                                    </a>
                                </div>
                                <div>
                                    <a id="btnShare" class="btn btn-social bg-olive share hidden"><i class="fa fa-whatsapp"></i> </a>
                                </div>
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
                /* start generate nomor surat terakhir */
                $(".refresh-nomor-surat").on("click", function () {
                    $(".internal").html("Loading...");
                    $(".external").html("Loading...");

                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('quickreport/ajaxletter')?>",
                        data: "",
                        success: function (data) {
                            var respon = JSON.parse(data);
                            if(respon['status'] == 'success'){
                                setTimeout(function(){
                                    $(".internal").html(respon['data']['int']);
                                    $(".external").html(respon['data']['ext']);

                                    $(".internal").attr("data-val", respon['data']['int']);
                                    $(".external").attr("data-val", respon['data']['ext']);

                                    $("#btnShare").removeClass("hidden");
                                }, 1000);
                            }else{
                                $(".internal").html('System not responding');
                                $(".external").html('System not responding');

                                $(".internal").attr("data-val", "System not responding");
                                $(".external").attr("data-val", "System not responding");

                                $("#btnShare").addClass("hidden");
                            }
                        }
                    });
                });
                $(".refresh-nomor-surat").trigger("click");
                /* end generate nomor surat terakhir */

                /* auto reload */
                function reloadletter() {
                    $(".refresh-nomor-surat").trigger("click");
                }
                setInterval(reloadletter, 15000); /* setiap 15 detik */
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
                    var textWa = '*Nomor Surat Terbaru Komet* %0A<?php echo $datenow; ?> %0A%0ANOMOR SURAT INTERNAL TERAKHIR :%0A*'+ $(".internal").attr("data-val") +'*%0A%0ANOMOR SURAT EXTERNAL TERAKHIR :%0A*'+ $(".external").attr("data-val") +'*%0A%0ADetail : https://kms.kopegtel-metropolitan.co.id/quickreport/letter %0A%0A*Komanders*';
                    var link = $(".share").attr("data-href");
                    var target = link+textWa;
                    window.open(target);
                });
            });
        </script>
    </body>
</html>