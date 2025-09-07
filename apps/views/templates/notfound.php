<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->config->item('web_name')?> - <?= $title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri')?>favicon.png" />
    <?php $this->carabiner->display('css_head');?>
    <style>
        .page_404{
            padding:40px 0; background:#fff; font-family: 'Arvo', serif;
        }
        .page_404  img{ width:100%;}
        .four_zero_four_bg{
            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
        }
        .four_zero_four_bg h1{
            font-size:80px;
        }
        .four_zero_four_bg h3{
            font-size:80px;
        }
        .contant_box_404{ margin-top:-50px;}
    </style>
    <?php $this->carabiner->display('js_head');?>
</head>
<body class="hold-transition login-page" style="background-color: #ffffff;">
<section class="page_404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="col-sm-10 col-sm-offset-1  text-center">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center ">404</h1>
                    </div>

                    <div class="contant_box_404">
                        <h3 class="h2">
                            Anda Menemukan Halaman 404 Kami
                        </h3>
                        <p>Ini bukan kesalahan, hanya sebuah kecelakaan yang tak terduga :)</p>
                        <a href="https://kms.kopegtel-metropolitan.co.id" class="btn bg-olive margin">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<iframe width="560" height="315" src="https://www.youtube.com/embed/Rk01_D006_Q?start=33&autoplay=1&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php $this->carabiner->display('js_content');?>
</body>
</html>