<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Orange_Theme">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon icon-->
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

    <!-- Core Css -->
    <?php $this->carabiner->display('css_head'); ?>
    <!-- Core Js -->

    <title>Komanderz</title>
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <img src="<?php echo $this->config->item('images_uri');?>favicon/favicon.png" alt="loader" class="lds-ripple img-fluid">
</div>
<div id="main-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8 text-bg-dark">
                    <a href="<?php echo base_url(''); ?>" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                        <img src="<?php echo $this->config->item('images_uri');?>logos/komet-dark-logo.svg" class="dark-logo" alt="Logo-Dark" width="174px" height="26px">
                        <img src="<?php echo $this->config->item('images_uri');?>logos/komet-light-logo.svg" class="light-logo" alt="Logo-light" width="174px" height="26px">
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                        <img src="<?php echo $this->config->item('images_uri');?>backgrounds/rip-kmz.png" alt="" class="img-fluid" width="500">
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-2">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h6 class="mb-1 fs-7 fw-bolder text-center"><i>KOMANDERz</i></h6>
                            <div class="position-relative text-center my-4">
								<p class="mb-0 fs-4 px-3 d-inline-block bg-body text-dark z-index-5 position-relative">2019 - 2024</p>
                            </div>

                            <?php echo form_open('login/validate');?>
                            <?php echo form_error('txtUsername'); ?>
                            <?php echo form_error('txtPassword'); ?>
                            <?php
                            $message = $this->session->flashdata('error_login');
                            if (isset($message)) {
                                echo '<div class="alert customize-alert alert-dismissible border-danger text-danger fade show remove-close-icon" role="alert">
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										<div class="d-flex align-items-center font-medium me-3 me-md-0">
										  <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
										  '. $message .'
										</div> 
									  </div>';
                                $this->session->unset_userdata('error_login');
                            }
                            ?>
                            <div class="mb-3">
                                <label for="txtUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" name="txtUsername" id="txtUsername" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-4">
                                <label for="txtPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword">
                            </div>
                            <button type="submit" name="btnSubmit" class="btn btn-dark w-100 py-8 mb-4 rounded-2">Login</button>
                            <?php echo form_close();?>
                            <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-medium" style="color:#dfe6e9;">kodeverse</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dark-transparent sidebartoggler"></div>
<!-- Import Js Files -->

<?php $this->carabiner->display('js_content'); ?>
</body>

</html>