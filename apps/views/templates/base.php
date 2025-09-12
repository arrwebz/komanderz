<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Orange_Theme" data-layout="vertical" data-boxed-layout="full" data-card="shadow">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title><?php echo $title; ?></title>

    <link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri');?>favicon/favicon.png">
    <?php $this->carabiner->display('css_head'); ?>
    <?php $this->carabiner->display('js_head'); ?>
</head>
<?php
    $username = $this->session->userdata('username');
    $location = $this->session->userdata('location');
?>
<body>
    <div class="preloader">
        <img src="<?php echo $this->config->item('images_uri');?>favicon/favicon.png" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="javascript:" class="text-nowrap logo-img">
                        <img data-src="<?php echo $this->config->item('images_uri');?>logos/kmz-logo.svg" class="dark-logo lazyload" alt="Logo-Dark" style="height: 40px;margin-left: -35px;">
                        <img data-src="<?php echo $this->config->item('images_uri');?>logos/kmz-logo.svg" class="light-logo lazyload" alt="Logo-light" style="height: 40px;margin-left: -35px;">
                    </a>
                    <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-x"></i>
                    </a>
                </div>


                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <?php $nav = array('1', '3'); ?>
                        <?php if (in_array($role, $nav)) { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('dbpengurus');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-app-window"></i>
                                </span>
                                <span class="hide-menu">Board of Management</span> 
                            </a>
                        </li>
                        <?php } ?>
                        <?php $timaram = array('9', '18', '49', '36','30','37','21'); ?>
                        <?php if (in_array($userid, $timaram)) { ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?php echo site_url('myboard');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-app-window"></i>
                                </span>
                                    <span class="hide-menu">My Dashboard <sup style="background:#d72027; color: #ffffff; font-family: auto; padding:1px 3px;">New</sup></span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('dashboard');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-artboard"></i>
                                </span>
                                <span class="hide-menu">Overview</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('analytics');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-activity-heartbeat"></i>
                                </span>
                                <span class="hide-menu">Analytics</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('pfsales');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-chart-pie"></i> 
                                </span>
                                <span class="hide-menu">Sales</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('pfcoll');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-chart-donut"></i>
                                </span>
                                <span class="hide-menu">Collection</span>
                            </a>
                        </li> 
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('kailareports');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-device-mobile"></i>
                                </span>
                                <span class="hide-menu">Kaila</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Performance -->
                        <!-- ---------------------------------- -->
                        <!-- <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Performance</span>
                        </li> -->                    
                        <!-- ---------------------------------- -->
                        <!-- LoP -->
                        <!-- ---------------------------------- -->
                        <?php $nav = array('5'); ?>
                        <?php $nav_role = array('1'); ?>
                        <?php if (in_array($group, $nav) || in_array($role, $nav_role)) { ?>
                        <!-- <li class="nav-small-cap"> 
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">LOP</span>
                        </li> 
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('lop');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-list-check"></i>
                                </span>
                                <span class="hide-menu">Project</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('kpros');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-list-search"></i>
                                </span>
                                <span class="hide-menu">Prospect</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('partnership');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-dna"></i>
                                </span>
                                <span class="hide-menu">Partnership</span>
                            </a>
                        </li> -->
                        <?php } ?>
                        <!-- ---------------------------------- -->
                        <!-- Order -->
                        <!-- ---------------------------------- -->
                        <!--<li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Order</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php /*echo site_url('orderam');*/?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-forms"></i>
                                </span>
                                <span class="hide-menu">Request</span>
                            </a>
                        </li>-->
                        <!-- ---------------------------------- -->
                        <!-- Billing -->
                        <!-- ---------------------------------- -->
                        <?php $nav = array('2','3','4'); ?>
                        <?php $nav_role = array('1','2','3','4','5'); ?>
                        <?php if (in_array($group, $nav) || in_array($role, $nav_role) || $userid == '26') { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Billing</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-file-invoice"></i>
                                </span>
                                <span class="hide-menu">Invoice</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('invoice');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">KOMET</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('mnopes');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MESRA</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-file-broken"></i>
                                </span>
                                <span class="hide-menu">Panjar</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('kprpo');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">KOMET</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('mprpo');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MESRA</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
						<!-- ---------------------------------- -->
                        <!-- Finance -->
                        <!-- ---------------------------------- -->
                        <?php $nav = array('3'); ?>
                        <?php $nav_role = array('1'); ?>
                        <?php if (in_array($group, $nav) || in_array($role, $nav_role) || $userid = '26') { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Financing</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-receipt"></i>
                                </span> 
                                <span class="hide-menu">SPB</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('kspb');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">KOMET</span>
                                    </a>
                                </li>
								<li class="sidebar-item">
                                    <a href="<?php echo site_url('pspb');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">PADI</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('mspb');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MESRA</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php $nav = array('3'); ?>
                        <?php $nav_role = array('1'); ?>
                        <?php if (in_array($group, $nav) || in_array($role, $nav_role) || $userid == '26') { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-folder"></i>
                                </span>
                                <span class="hide-menu">Budget</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('kbudget');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">KOMET</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('pbudget');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">PADI</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('mbudget');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MESRA</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <!-- ---------------------------------- -->
                        <!-- Collection -->
                        <!-- ---------------------------------- -->
                        <?php $nav = array('3','4'); ?>
                        <?php $nav_role = array('1','2','3','4','5'); ?>
                        <?php if (in_array($group, $nav) || in_array($role, $nav_role)) { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Collection</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-files"></i>
                                </span>
                                <span class="hide-menu">Mapping</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('mapping');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">SPB to Invoice</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-file-search"></i>
                                </span>
                                <span class="hide-menu">Tracking</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('ktrack');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">KOMET</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('mtrack');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MESRA</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-cash"></i>
                                </span>
                                <span class="hide-menu">Payment</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('kbillco');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">KOMET</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('mbillco');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">MESRA</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>                        
						<!-- ---------------------------------- -->
                        <!-- Reports -->
                        <!-- ---------------------------------- -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Report</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('allreport');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-file-analytics"></i>
                                </span>
                                <span class="hide-menu">Invoice</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('allreportspb');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-file-code"></i>
                                </span>
                                <span class="hide-menu">SPB</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('saldosegment');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-building-bank"></i>
                                </span>
                                <span class="hide-menu">Saldo Segmen</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Directory -->
                        <!-- ---------------------------------- -->
                        <?php $nav = array('2'); ?>
                        <?php $nav_role = array('1','2','4'); ?>
                        <?php if (in_array($group, $nav) || in_array($role, $nav_role)) { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Directory</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('dircom');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-brand-office"></i>
                                </span>
                                <span class="hide-menu">Data Karyawan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('attendances');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-clock"></i>
                                </span>
                                <span class="hide-menu">Presensi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('offwork');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-file-time"></i>
                                </span>
                                <span class="hide-menu">Form Cuti</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('empreport');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-file-certificate"></i>
                                </span>
                                <span class="hide-menu">Report Presensi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('mealallowance');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-tools-kitchen-2"></i>
                                </span>
                                <span class="hide-menu">Report Uang Makan</span>
                            </a>
                        </li>
                        <?php } ?>
                        <!-- ---------------------------------- -->
                        <!-- Management -->
                        <!-- ---------------------------------- -->
                        <?php $nav = array('2'); ?>
                        <?php $nav_role = array('1','3'); ?>
                        <?php if (in_array($group, $nav) || in_array($role, $nav_role)) { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Management</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-writing-sign"></i>
                                </span>
                                <span class="hide-menu">Letter</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('letter');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Management Letter</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('letterkontrak');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Contract & PO</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('packlaring');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Paklaring</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('pkstkbw');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Draft PKS TKBW</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-building-warehouse"></i>
                                </span>
                                <span class="hide-menu">Logistics</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('softsubs');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Software subscriptions</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('assets');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Company Assets</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('sewakendaraan');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Car Rental</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- ---------------------------------- -->
                        <!-- Anggota -->
                        <!-- ---------------------------------- -->
                        <?php $nav_role = array('1','3','4'); ?>
                        <?php if (in_array($role, $nav_role) || $userid == '43' || $userid == '8' || $userid == '14' || $userid == '22') { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Keanggotaan</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                  <i class="ti ti-user-check"></i>
                                </span>
                                <span class="hide-menu">Active Members</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('tanggota');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Data 2018 - <?php echo date('Y');?></span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('tpengajuan');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Submission Recap</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('tspbsp');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">SPB</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('tbudgetsp');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Budget</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('tpenarikan');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Deposits</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('tpinjaman');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Loans</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo site_url('tpayroll');?>" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Sentralisasi</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <!-- ---------------------------------- -->
                        <!-- Investor -->
                        <!-- ---------------------------------- -->
                        <?php $nav_role = array('1','3','4'); ?>
                        <?php if (in_array($role, $nav_role) || $userid == '43' || $userid == '8' || $userid == '14' || $userid == '22') { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Funding</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                  <i class="ti ti-user-circle"></i>
                                </span>
                                <span class="hide-menu">Investor</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('prokoptel');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-aperture"></i>
                                </span>
                                <span class="hide-menu">KOPTEL</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                  <i class="ti ti-topology-star-3"></i>
                                </span>
                                <span class="hide-menu">LPDB</span>
                            </a>
                        </li>
                        <?php } ?>
                        <!-- ---------------------------------- -->
                        <!-- Target -->
                        <!-- ---------------------------------- -->
                        <?php $nav_role = array('1'); ?>
                        <?php if (in_array($role, $nav_role)) { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Target</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('targetam');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-target"></i>
                                </span>
                                <span class="hide-menu">Account Manager</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('targetsegment');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-target-arrow"></i>
                                </span>
                                <span class="hide-menu">Telkom Segment</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('targetsales');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-swords"></i>
                                </span>
                                <span class="hide-menu">Sales</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('targetcoll');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-shield"></i>
                                </span>
                                <span class="hide-menu">Collection</span>
                            </a>
                        </li>
                        <?php } ?>
                        <!-- ---------------------------------- -->
                        <!-- Settings -->
                        <!-- ---------------------------------- -->
                        <?php $nav_role = array('1'); ?>
                        <?php if (in_array($role, $nav_role)) { ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Settings</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('user');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">User Account</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="javascript:" aria-expanded="false">
                                <span>
                                  <i class="ti ti-layers-intersect"></i>
                                </span>
                                <span class="hide-menu">User Group</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('segment');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-building-castle"></i>
                                </span>
                                <span class="hide-menu">Customers</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('bank');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-credit-card"></i>
                                </span>
                                <span class="hide-menu">Bank Account</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('fakturpajak');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-credit-card"></i>
                                </span>
                                <span class="hide-menu">Tax Invoice</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('offday');?>" aria-expanded="false">
                                <span>
                                  <i class="ti ti-calendar"></i>
                                </span>
                                <span class="hide-menu">Public Holidays</span>
                            </a>
                        </li>
                        <?php } ?>
                        <!-- ---------------------------------- -->
                        <!-- END MAIN MENU LAPTOP -->
                        <!-- ---------------------------------- -->
                    </ul>
                </nav>

                <div class="fixed-profile p-3 mx-4 mb-2 bg-danger-subtle rounded sidebar-ad mt-3">
                    <div class="hstack gap-3">
                        <div class="john-img">
                            <img data-src="<?php echo $this->config->item('uploads_uri');?>user/ai/<?php echo $photo; ?>" class="rounded-circle lazyload" width="40" height="40" alt="">
                        </div>
                        <div class="john-title">
                            <h6 class="mb-0 fs-4 fw-semibold">@<?php echo $username; ?></h6>
                            <span class="fs-2"><?php echo $position; ?></span>
                        </div>
                        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                            <i class="ti ti-power fs-6"></i>
                        </button>
                    </div>
                    <p style="font-size:11px; color:transparent;">rendering in {elapsed_time} seconds</p>
                </div>
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
            </div>
        </aside>
        <!--  Sidebar End -->

        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical">
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="ti ti-search"></i>
                                </a>
                            </li>
							<li class="nav-item dropdown-hover d-none d-lg-block">
							  <a class="nav-link" href="<?php echo site_url('mom');?>">Minutes of Meeting</a>
							</li>
                        </ul>

                        <div class="d-block d-lg-none">
                            <img data-src="<?php echo $this->config->item('images_uri');?>logos/kms-dark-logo.svg" class="lazyload" width="180" alt="">
                        </div>
                        <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                              <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <!-- ------------------------------- -->
                                    <!-- start notification Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-bell-ringing"></i>
                                            <div class="notification rounded-circle" style="background: #d72027;"></div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                                <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">1 new</span>
                                            </div>
                                            <div class="message-body" data-simplebar="">
                                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                      <img data-src="https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/admin.jpg" alt="user" class="rounded-circle lazyload" width="48" height="48">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle">
                                                        <h6 class="mb-1 fw-semibold lh-base">New Komanders</h6>
                                                        <span class="fs-2 d-block text-body-secondary">Congratulate him</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="py-6 px-7 mb-1">
                                                <button class="btn btn-outline-primary w-100">See All Notifications</button>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end notification Dropdown -->
                                    <!-- ------------------------------- -->

                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="<?php echo $this->config->item('uploads_uri');?>user/ai/<?php echo $photo; ?>" class="rounded-circle" width="35" height="35" alt="">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar="">
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="<?php echo $this->config->item('uploads_uri');?>user/ai/<?php echo $photo; ?>" class="rounded-circle " width="80" height="80" alt="">
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3"><?php echo $fullname; ?></h5>
                                                        <span class="mb-1 d-block"><?php echo $position; ?></span>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-map-pin fs-4"></i> <?php echo $location; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                                                      <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                        <img src="<?php echo $this->config->item('images_uri');?>svgs/icon-account.svg" class="" alt="" width="24" height="24">
                                                      </span>
                                                        <div class="w-75 d-inline-block v-middle ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <div class="upgrade-plan bg-primary-subtle position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h5 class="fs-4 mb-3 w-50 fw-semibold">Unlimited Access</h5>
                                                                <button class="btn btn-primary">Upgrade</button>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-n4 unlimited-img">
                                                                    <img src="https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/admin.jpg" alt="" class="w-100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo site_url('logout');?>" class="btn btn-outline-primary">Log Out</a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="app-header with-horizontal">
                    <nav class="navbar navbar-expand-xl container-fluid p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item d-block d-xl-none">
                                <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li class="nav-item d-none d-xl-block">
                                <a href="index.html" class="text-nowrap nav-link">
                                    <img data-src="<?php echo $this->config->item('images_uri');?>logos/kms-dark-logo.svg" class="dark-logo lazyload" width="180" alt="">
                                    <img data-src="<?php echo $this->config->item('images_uri');?>logos/kms-dark-logo.svg" class="light-logo lazyload" width="180" alt="">
                                </a>
                            </li>
                            <li class="nav-item d-none d-xl-block">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="ti ti-search"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav quick-links d-none d-xl-flex">
                            <!-- ------------------------------- -->
                            <!-- start apps Dropdown -->
                            <!-- ------------------------------- -->
                            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
                                    Apps<span class="mt-1"><i class="ti ti-chevron-down fs-3"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="ps-7 pt-7">
                                                <div class="border-bottom">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="position-relative">
                                                                <a href="app-chat.html" class="d-flex align-items-center pb-9 position-relative">
                                                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="../assets/images/svgs/icon-dd-chat.svg" alt="" class="img-fluid" width="24" height="24">
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Chat Application
                                                                        </h6>
                                                                        <span class="fs-2 d-block text-body-secondary">New messages arrived</span>
                                                                    </div>
                                                                </a>
                                                                <a href="app-invoice.html" class="d-flex align-items-center pb-9 position-relative">
                                                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="../assets/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24">
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">Invoice App</h6>
                                                                        <span class="fs-2 d-block text-body-secondary">Get latest invoice</span>
                                                                    </div>
                                                                </a>
                                                                <a href="app-contact2.html" class="d-flex align-items-center pb-9 position-relative">
                                                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="../assets/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24">
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Contact Application
                                                                        </h6>
                                                                        <span class="fs-2 d-block text-body-secondary">2 Unsaved Contacts</span>
                                                                    </div>
                                                                </a>
                                                                <a href="app-email.html" class="d-flex align-items-center pb-9 position-relative">
                                                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="../assets/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24">
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">Email App</h6>
                                                                        <span class="fs-2 d-block text-body-secondary">Get new emails</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="position-relative">
                                                                <a href="page-user-profile.html" class="d-flex align-items-center pb-9 position-relative">
                                                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="../assets/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24">
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            User Profile
                                                                        </h6>
                                                                        <span class="fs-2 d-block text-body-secondary">learn more information</span>
                                                                    </div>
                                                                </a>
                                                                <a href="app-calendar.html" class="d-flex align-items-center pb-9 position-relative">
                                                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="../assets/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24">
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Calendar App
                                                                        </h6>
                                                                        <span class="fs-2 d-block text-body-secondary">Get dates</span>
                                                                    </div>
                                                                </a>
                                                                <a href="app-contact.html" class="d-flex align-items-center pb-9 position-relative">
                                                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="../assets/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24">
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Contact List Table
                                                                        </h6>
                                                                        <span class="fs-2 d-block text-body-secondary">Add new contact</span>
                                                                    </div>
                                                                </a>
                                                                <a href="app-notes.html" class="d-flex align-items-center pb-9 position-relative">
                                                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="../assets/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24">
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Notes Application
                                                                        </h6>
                                                                        <span class="fs-2 d-block text-body-secondary">To-do and Daily tasks</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center py-3">
                                                    <div class="col-8">
                                                        <a class="fw-semibold text-dark d-flex align-items-center lh-1" href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="d-flex justify-content-end pe-4">
                                                            <button class="btn btn-primary">Check</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 ms-n4">
                                            <div class="position-relative p-7 border-start h-100">
                                                <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                                <ul class="">
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary" href="page-pricing.html">Pricing Page</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary" href="authentication-login.html">Authentication Design</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary" href="authentication-register.html">Register Now</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary" href="authentication-error.html">404 Error Page</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary" href="app-notes.html">Notes App</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary" href="page-user-profile.html">User Application</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary" href="page-account-settings.html">Account Settings</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- ------------------------------- -->
                            <!-- end apps Dropdown -->
                            <!-- ------------------------------- -->
                            <li class="nav-item dropdown-hover d-none d-lg-block">
                                <a class="nav-link" href="app-chat.html">Chat</a>
                            </li>
                            <li class="nav-item dropdown-hover d-none d-lg-block">
                                <a class="nav-link" href="app-calendar.html">Calendar</a>
                            </li>
                            <li class="nav-item dropdown-hover d-none d-lg-block">
                                <a class="nav-link" href="app-email.html">Email</a>
                            </li>
                        </ul>
                        <div class="d-block d-xl-none">
                            <a href="index.html" class="text-nowrap nav-link">
                                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                            </a>
                        </div>
                        <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                              <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                                    <!-- ------------------------------- -->
                                    <!-- start notification Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-bell-ringing"></i>
                                            <div class="notification bg-primary rounded-circle"></div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                                <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                                            </div>
                                            <div class="message-body" data-simplebar="">
                                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                      <img src="https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/admin.jpg" alt="user" class="rounded-circle" width="48" height="48">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle">
                                                        <h6 class="mb-1 fw-semibold lh-base">New Komanders</h6>
                                                        <span class="fs-2 d-block text-body-secondary">Congratulate him</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                      <img src="../assets/images/profile/user-2.jpg" alt="user" class="rounded-circle" width="48" height="48">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle">
                                                        <h6 class="mb-1 fw-semibold lh-base">New message</h6>
                                                        <span class="fs-2 d-block text-body-secondary">Salma sent you new message</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                      <img src="../assets/images/profile/user-3.jpg" alt="user" class="rounded-circle" width="48" height="48">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle">
                                                        <h6 class="mb-1 fw-semibold lh-base">Bianca sent payment</h6>
                                                        <span class="fs-2 d-block text-body-secondary">Check your earnings</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                      <img src="../assets/images/profile/user-4.jpg" alt="user" class="rounded-circle" width="48" height="48">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle">
                                                        <h6 class="mb-1 fw-semibold lh-base">Jolly completed tasks</h6>
                                                        <span class="fs-2 d-block text-body-secondary">Assign her new tasks</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                      <img src="../assets/images/profile/user-5.jpg" alt="user" class="rounded-circle" width="48" height="48">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle">
                                                        <h6 class="mb-1 fw-semibold lh-base">John received payment</h6>
                                                        <span class="fs-2 d-block text-body-secondary">$230 deducted from account</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                      <img src="https://kms.kopegtel-metropolitan.co.id/public/files/uploads/user/ai/admin.jpg" alt="user" class="rounded-circle" width="48" height="48">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle">
                                                        <h6 class="mb-1 fw-semibold lh-base">New Komanders</h6>
                                                        <span class="fs-2 d-block text-body-secondary">Congratulate him</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="py-6 px-7 mb-1">
                                                <button class="btn btn-outline-primary w-100">See All Notifications</button>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end notification Dropdown -->
                                    <!-- ------------------------------- -->

                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="../assets/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar="">
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="<?php echo $this->config->item('images_uri');?>profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="">
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3"><?php echo $fullname; ?></h5>
                                                        <span class="mb-1 d-block"><?php echo $position; ?></span>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i> <?php echo $group; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                                                          <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                            <img src="../assets/images/svgs/icon-account.svg" alt="" width="24" height="24">
                                                          </span>
                                                        <div class="w-75 d-inline-block v-middle ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                                        </div>
                                                    </a>
                                                    <a href="app-email.html" class="py-8 px-7 d-flex align-items-center">
                                                      <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                        <img src="../assets/images/svgs/icon-inbox.svg" alt="" width="24" height="24">
                                                      </span>
                                                        <div class="w-75 d-inline-block v-middle ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Messages & Emails</span>
                                                        </div>
                                                    </a>
                                                    <a href="app-notes.html" class="py-8 px-7 d-flex align-items-center">
                                                      <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                        <img src="../assets/images/svgs/icon-tasks.svg" alt="" width="24" height="24">
                                                      </span>
                                                        <div class="w-75 d-inline-block v-middle ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Task</h6>
                                                            <span class="fs-2 d-block text-body-secondary">To-do and Daily Tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <div class="upgrade-plan bg-primary-subtle position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h5 class="fs-4 mb-3 w-50 fw-semibold">Unlimited Access</h5>
                                                                <button class="btn btn-primary">Upgrade</button>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-n4 unlimited-img">
                                                                    <img src="../assets/images/backgrounds/unlimited-bg.png" alt="" class="w-100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo site_url('analytics');?>" class="btn btn-outline-primary">Log Out</a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </header>
            <!--  Header End -->

            <aside class="left-sidebar with-horizontal">
                <!-- Sidebar scroll-->
                <div>
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav scroll-sidebar container-fluid">
                        <ul id="sidebarnav">
                            <!-- ============================= -->
                            <!-- Home -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Home</span>
                            </li>
                            <!-- =================== -->
                            <!-- Dashboard -->
                            <!-- =================== -->
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                      <span>
                                        <i class="ti ti-home-2"></i>
                                      </span>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="index.html" class="sidebar-link">
                                            <i class="ti ti-aperture"></i>
                                            <span class="hide-menu">Modern</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="index2.html" class="sidebar-link">
                                            <i class="ti ti-shopping-cart"></i>
                                            <span class="hide-menu">eCommerce</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="index3.html" class="sidebar-link">
                                            <i class="ti ti-currency-dollar"></i>
                                            <span class="hide-menu">NFT</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="index4.html" class="sidebar-link">
                                            <i class="ti ti-cpu"></i>
                                            <span class="hide-menu">Crypto</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="index5.html" class="sidebar-link">
                                            <i class="ti ti-activity-heartbeat"></i>
                                            <span class="hide-menu">General</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="index6.html" class="sidebar-link">
                                            <i class="ti ti-playlist"></i>
                                            <span class="hide-menu">Music</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- ============================= -->
                            <!-- Apps -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Apps</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                  <span>
                                    <i class="ti ti-archive"></i>
                                  </span>
                                    <span class="hide-menu">Apps</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="app-calendar.html" class="sidebar-link">
                                            <i class="ti ti-calendar"></i>
                                            <span class="hide-menu">Calendar</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="apps-kanban.html" class="sidebar-link">
                                            <i class="ti ti-layout-kanban"></i>
                                            <span class="hide-menu">Kanban</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="app-chat.html" class="sidebar-link">
                                            <i class="ti ti-message-dots"></i>
                                            <span class="hide-menu">Chat</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="app-email.html" aria-expanded="false">
                                          <span>
                                            <i class="ti ti-mail"></i>
                                          </span>
                                            <span class="hide-menu">Email</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="app-contact.html" class="sidebar-link">
                                            <i class="ti ti-phone"></i>
                                            <span class="hide-menu">Contact Table</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="app-contact2.html" class="sidebar-link">
                                            <i class="ti ti-list-details"></i>
                                            <span class="hide-menu">Contact List</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="app-notes.html" class="sidebar-link">
                                            <i class="ti ti-notes"></i>
                                            <span class="hide-menu">Notes</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="app-invoice.html" class="sidebar-link">
                                            <i class="ti ti-file-text"></i>
                                            <span class="hide-menu">Invoice</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="page-user-profile.html" class="sidebar-link">
                                            <i class="ti ti-user-circle"></i>
                                            <span class="hide-menu">User Profile</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="blog-posts.html" class="sidebar-link">
                                            <i class="ti ti-article"></i>
                                            <span class="hide-menu">Posts</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="blog-detail.html" class="sidebar-link">
                                            <i class="ti ti-details"></i>
                                            <span class="hide-menu">Detail</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="eco-shop.html" class="sidebar-link">
                                            <i class="ti ti-shopping-cart"></i>
                                            <span class="hide-menu">Shop</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="eco-product-list.html" class="sidebar-link">
                                            <i class="ti ti-list-check"></i>
                                            <span class="hide-menu">List</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="eco-checkout.html" class="sidebar-link">
                                            <i class="ti ti-brand-shopee"></i>
                                            <span class="hide-menu">Checkout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- ============================= -->
                            <!-- PAGES -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">PAGES</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                      <span>
                                        <i class="ti ti-notebook"></i>
                                      </span>
                                    <span class="hide-menu">Pages</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="page-faq.html" class="sidebar-link">
                                            <i class="ti ti-help"></i>
                                            <span class="hide-menu">FAQ</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="page-account-settings.html" class="sidebar-link">
                                            <i class="ti ti-user-circle"></i>
                                            <span class="hide-menu">Account Setting</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="page-pricing.html" class="sidebar-link">
                                            <i class="ti ti-currency-dollar"></i>
                                            <span class="hide-menu">Pricing</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="widgets-cards.html" class="sidebar-link">
                                            <i class="ti ti-cards"></i>
                                            <span class="hide-menu">Card</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="widgets-banners.html" class="sidebar-link">
                                            <i class="ti ti-ad"></i>
                                            <span class="hide-menu">Banner</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="widgets-charts.html" class="sidebar-link">
                                            <i class="ti ti-chart-bar"></i>
                                            <span class="hide-menu">Charts</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="../../../landingpage/index.html" class="sidebar-link">
                                            <i class="ti ti-app-window"></i>
                                            <span class="hide-menu">Landing Page</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- ============================= -->
                            <!-- UI -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">UI</span>
                            </li>
                            <!-- =================== -->
                            <!-- UI Elements -->
                            <!-- =================== -->
                            <li class="sidebar-item mega-dropdown">
                                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                      <span class="rounded-3">
                                        <i class="ti ti-layout-grid"></i>
                                      </span>
                                    <span class="hide-menu">UI</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="ui-accordian.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Accordian</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-badge.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Badge</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-buttons.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Buttons</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-dropdowns.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Dropdowns</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-modals.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Modals</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-tab.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Tab</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-tooltip-popover.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Tooltip & Popover</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-notification.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Notification</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-progressbar.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Progressbar</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-pagination.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Pagination</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-typography.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Typography</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-bootstrap-ui.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Bootstrap UI</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-breadcrumb.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Breadcrumb</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-offcanvas.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Offcanvas</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-lists.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Lists</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-grid.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Grid</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-carousel.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Carousel</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-scrollspy.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Scrollspy</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-spinner.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Spinner</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-link.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Link</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- ============================= -->
                            <!-- Forms -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Forms</span>
                            </li>
                            <!-- =================== -->
                            <!-- Forms -->
                            <!-- =================== -->
                            <li class="sidebar-item">
                                <a class="sidebar-link two-column has-arrow" href="#" aria-expanded="false">
                                  <span class="rounded-3">
                                    <i class="ti ti-file-text"></i>
                                  </span>
                                    <span class="hide-menu">Forms</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <!-- form elements -->
                                    <li class="sidebar-item">
                                        <a href="form-inputs.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Forms Input</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-input-groups.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Input Groups</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-input-grid.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Input Grid</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-checkbox-radio.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Checkbox & Radios</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-bootstrap-touchspin.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Bootstrap Touchspin</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-bootstrap-switch.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Bootstrap Switch</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-select2.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Select2</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-dual-listbox.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Dual Listbox</span>
                                        </a>
                                    </li>
                                    <!-- form inputs -->
                                    <li class="sidebar-item">
                                        <a href="form-basic.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Basic Form</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-vertical.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Form Vertical</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-horizontal.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Form Horizontal</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-actions.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Form Actions</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-row-separator.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Row Separator</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-bordered.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Form Bordered</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-detail.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Form Detail</span>
                                        </a>
                                    </li>
                                    <!-- form wizard -->
                                    <li class="sidebar-item">
                                        <a href="form-wizard.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Form Wizard</span>
                                        </a>
                                    </li>
                                    <!-- Quill Editor -->
                                    <li class="sidebar-item">
                                        <a href="form-editor-quill.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Quill Editor</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- ============================= -->
                            <!-- Tables -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Tables</span>
                            </li>
                            <!-- =================== -->
                            <!-- Bootstrap Table -->
                            <!-- =================== -->
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                  <span class="rounded-3">
                                    <i class="ti ti-layout-sidebar"></i>
                                  </span>
                                    <span class="hide-menu">Tables</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="table-basic.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Basic Table</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-dark-basic.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Dark Basic Table</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-sizing.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Sizing Table</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-layout-coloured.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Coloured Table</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-datatable-basic.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Basic Initialisation</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-datatable-api.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">API</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-datatable-advanced.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Advanced Initialisation</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- ============================= -->
                            <!-- Charts -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Charts</span>
                            </li>
                            <!-- =================== -->
                            <!-- Apex Chart -->
                            <!-- =================== -->
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                  <span class="rounded-3">
                                    <i class="ti ti-chart-pie"></i>
                                  </span>
                                    <span class="hide-menu">Charts</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="chart-apex-line.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Line Chart</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-area.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Area Chart</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-bar.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Bar Chart</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-pie.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Pie Chart</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-radial.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Radial Chart</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-radar.html" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Radar Chart</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- ============================= -->
                            <!-- Icons -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Icons</span>
                            </li>
                            <!-- =================== -->
                            <!-- Tabler Icon -->
                            <!-- =================== -->
                            <li class="sidebar-item">
                                <a class="sidebar-link sidebar-link" href="icon-tabler.html" aria-expanded="false">
                                      <span class="rounded-3">
                                        <i class="ti ti-archive"></i>
                                      </span>
                                    <span class="hide-menu">Icon</span>
                                </a>
                            </li>
                            <!-- multi level -->
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                      <span class="rounded-3">
                                        <iconify-icon icon="solar:airbuds-case-minimalistic-line-duotone" class="ti"></iconify-icon>
                                      </span>
                                    <span class="hide-menu">Multi DD</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Page 1</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link has-arrow">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Page 2</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse second-level">
                                            <li class="sidebar-item">
                                                <a href="#" class="sidebar-link">
                                                    <i class="ti ti-circle"></i>
                                                    <span class="hide-menu">Page 2.1</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="#" class="sidebar-link">
                                                    <i class="ti ti-circle"></i>
                                                    <span class="hide-menu">Page 2.2</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="#" class="sidebar-link">
                                                    <i class="ti ti-circle"></i>
                                                    <span class="hide-menu">Page 2.3</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">
                                            <i class="ti ti-circle"></i>
                                            <span class="hide-menu">Page 3</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->

            </aside>

            <div class="body-wrapper">
                <div class="container-fluid mb-rem-6">
                    <?php echo $content ?>
                </div>
            </div>
            <script>
                function handleColorTheme(e) {
                    $("html").attr("data-color-theme", e);
                    $(e).prop("checked", !0);
                }
            </script>
            <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="icon ti ti-settings fs-7"></i>
            </button>

            <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                    <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                        Settings
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" data-simplebar="" style="height: calc(100vh - 80px)">
                    <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="theme-layout" id="light-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary thememode" val-theme="light"  for="light-layout"><i class="icon ti ti-brightness-up fs-7 me-2"></i>Light</label>

                        <input type="radio" class="btn-check" name="theme-layout" id="dark-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary thememode" val-theme="dark"  for="dark-layout"><i class="icon ti ti-moon fs-7 me-2"></i>Dark</label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary" for="ltr-layout"><i class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR</label>

                        <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary" for="rtl-layout"><i class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL</label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

                    <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
                        <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME">
                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME">
                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME">
                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">
                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <div>
                            <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off">
                            <label class="btn p-9 btn-outline-primary" for="vertical-layout"><i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off">
                            <label class="btn p-9 btn-outline-primary" for="horizontal-layout"><i class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal</label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary" for="boxed-layout"><i class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed</label>

                        <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary" for="full-layout"><i class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full</label>
                    </div>

                    <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <a href="javascript:void(0)" class="fullsidebar">
                            <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off">
                            <label class="btn p-9 btn-outline-primary" for="full-sidebar"><i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full</label>
                        </a>
                        <div>
                            <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off">
                            <label class="btn p-9 btn-outline-primary" for="mini-sidebar"><i class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse</label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary" for="card-with-border"><i class="icon ti ti-border-outer fs-7 me-2"></i>Border</label>

                        <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off">
                        <label class="btn p-9 btn-outline-primary" for="card-without-border"><i class="icon ti ti-border-none fs-7 me-2"></i>Shadow</label>
                    </div>
                </div>
            </div>
        </div>

        <!--  Search Bar -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content rounded-1">
                    <div class="modal-header border-bottom">
                        <input type="search" class="form-control fs-3" placeholder="Search here" id="search">
                        <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                            <i class="ti ti-x fs-5 ms-3"></i>
                        </a>
                    </div>
                    <div class="modal-body message-body" data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                        <ul class="list mb-0 py-2">
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Request Order</span>
                                    <span class="fs-3 text-muted d-block">/reqorder
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Invoice</span>
                                    <span class="fs-3 text-muted d-block">/invoice</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Panjar</span>
                                    <span class="fs-3 text-muted d-block">/panjar</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">SPB</span>
                                    <span class="fs-3 text-muted d-block">/spb</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Budget</span>
                                    <span class="fs-3 text-muted d-block">/budget</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Tracking</span>
                                    <span class="fs-3 text-muted d-block">/tracking</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Collection</span>
                                    <span class="fs-3 text-muted d-block">/collection</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <?php $this->carabiner->display('js_content'); ?>
    <script>
	    $(function () {
		    var imagesLoad = new LazyLoad({
			    elements_selector: '.lazyload'
		    });

		    "use strict";
		    $("#main-wrapper").AdminSettings({
			    Theme: "<?php echo $this->session->userdata("thememode");?>", // light | dark				
				Layout: "vertical", // vertical | horizontal
				SidebarType: "mini-sidebar", // full / mini-sidebar
				BoxedLayout: false, // true | false
				Direction: "ltr", // ltr | rtl
				ColorTheme: "Orange_Theme", // Blue_Theme | Aqua_Theme | Purple_Theme | Green_Theme | Cyan_Theme | Orange_Theme
				cardBorder: false // true | false
		    });

		    $(".thememode").on('click', function(){
		    	var mode = $(this).attr('val-theme');
		    	$.ajax({
		    	    type: "POST",
		    	    url: "<?php echo site_url('ajaxpage/savethememode')?>",
		    	    data: 'mode='+mode,
		    	    success: function (data) {
		    	        var respon = JSON.parse(data);
		    	        if(respon['status'] != 'success'){
				            alert('system not responding!');
		    	        }
		    	    }
		    	});
            });
	    });
    </script>
</body>
</html>