<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('web_name') ?> - <?php echo $title ?></title>
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

        <link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri') ?>favicon.png"/>
        <?php $this->carabiner->display('css_head'); ?>
        <?php $this->carabiner->display('js_head'); ?>
    </head>
    <?php
        switch ($title) {
            case 'KOMET':
                $title = 'red';
                break;
            case 'MESRA':
                $title = 'blue';
                break;
            case 'PADI':
                $title = 'purple';
                break;
            default:
                $title = 'green';
        }
    ?>
    <body class="hold-transition skin-<?php echo $title ?> sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="#" class="logo">
                    <span class="logo-mini"><b>KMS</b></span>
                    <span class="logo-lg"><b>Komanders</b></span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                </a>
                                <ul class="dropdown-menu">
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo $this->config->item('uploads_uri') ?>user/<?php echo $photo; ?>"
                                         class="user-image" alt="User Image">
                                    <span class="hidden-xs">Akun</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?php echo $this->config->item('uploads_uri') ?>user/<?php echo $photo; ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $fullname; ?> - <?php echo $position; ?>
                                            <small>Bergabung sejak <?php echo $joindate; ?></small>
                                        </p>
                                    </li>
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#"></a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#"></a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url('profile'); ?>" class="btn btn-default">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url('login/logout') ?>" class="btn btn-danger">Keluar</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button
                            <li>
                              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                            -->
                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $this->config->item('uploads_uri') ?>user/<?php echo $photo; ?>"
                                 class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $fullname; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">NAVIGASI UTAMA</li>
                        <li class="<?php if ($this->uri->segment(1) == "dashboard" || $this->uri->segment(1) == "analytics" || $this->uri->segment(1) == "allreport" || $this->uri->segment(1) == "performance" || $this->uri->segment(1) == "allreportspb" || $this->uri->segment(1) == "saldosegment") { echo 'active ';} ?>treeview">
                            <a href="<?php echo base_url('dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($this->uri->segment(1) == "dashboard") { echo 'class="active"'; } ?>>
                                    <a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-circle-o text-green"></i> My Dashboard</a>
                                </li>
                                <li <?php if ($this->uri->segment(1) == "analytics") { echo 'class="active"'; } ?>>
                                    <a href="<?php echo base_url('analytics'); ?>"><i class="fa fa-circle-o text-yellow"></i>Analytics</a>
                                </li>
                                <li <?php if ($this->uri->segment(1) == "performance") { echo 'class="active"'; } ?>>
                                    <a href="<?php echo base_url('performance'); ?>"><i class="fa fa-circle-o text-red"></i>Performance</a>
                                </li>
                                <li <?php if ($this->uri->segment(1) == "allreport" || $this->uri->segment(1) == "allreportspb" || $this->uri->segment(1) == "saldosegment") { echo 'class="active"'; }else{ echo 'class="treeview"'; } ?>>
                                    <a href="javascript:">
                                        <i class="fa fa-circle-o text-light-blue"></i>
                                        All Report
                                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li <?php if ($this->uri->segment(1) == "allreport") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('allreport'); ?>"><i class="fa fa-circle-o text-light-blue"></i>Invoice</a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "allreportspb") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('allreportspb'); ?>"><i class="fa fa-circle-o text-light-blue"></i>SPB</a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "saldosegment") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('saldosegment'); ?>"><i class="fa fa-circle-o text-light-blue"></i>Saldo Segment</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> KOMET</a></li>
                                     <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> MESRA</a></li> -->
                            </ul>
                        </li>

                        <!--========================= KOMET =========================-->
                        <li class="header" style="color:#e74c3c;">KOPERASI METROPOLITAN</li>
                        <?php $nav = array('1', '2', '3', '4', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <li class="<?php if ($this->uri->segment(1) == "knopes" || $this->uri->segment(1) == "kprpo") { echo 'active '; } ?>treeview">
                                <a href="#">
                                    <i class="fa fa-pencil-square-o"></i> <span>Billing</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if ($this->uri->segment(1) == "knopes") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('knopes'); ?>"><i class="fa fa-circle-o"></i> NOPES
                                            <span class="pull-right-container">
                                                <span id="tnopesk" class="label label-danger pull-right"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "kprpo") {echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('kprpo'); ?>"><i class="fa fa-circle-o"></i> PRPO
                                            <span class="pull-right-container"><span id="tprpok" class="label label-danger pull-right"></span></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if ($this->uri->segment(1) == "ktrack") { echo 'class="active"'; } ?>>
                                <a href="<?php echo base_url('ktrack'); ?>">
                                    <i class="fa fa-binoculars"></i>
                                    <span>Tracking</span>
                                </a>
                            </li>
                            <li <?php if ($this->uri->segment(1) == "kbillco") { echo 'class="active"'; } ?>>
                                <a href="<?php echo base_url('kbillco'); ?>"><i class="fa fa-clipboard"></i>
                                    <span>Collection</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php $nav = array('1', '2', '4', '6'); ?>
                        <?php /*if (in_array($group, $nav)) {*/ ?>
                           <!--<li class="<?php /*if ($this->uri->segment(1) == "kfiling" || $this->uri->segment(1) == "kapproval") { echo 'active '; }*/ ?>treeview">
                                <a href="#">
                                    <i class="fa fa-calendar-check-o"></i> <span>Approval</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php /*if ($this->uri->segment(1) == "kfiling") {echo 'class="active"'; }*/ ?>>
                                        <a href="<?php /*echo base_url('kfiling');*/ ?>"><i class="fa fa-send"></i> Request SPB</a>
                                    </li>
                                    <?php /*$navrole = array('1', '2', '3');*/ ?>
                                    <?php /*if (in_array($role, $navrole)) {*/ ?>
                                        <li <?php /*if ($this->uri->segment(1) == "kapproval") { echo 'class="active"'; }*/ ?>>
                                            <a href="<?php /*echo base_url('kapproval');*/ ?>"><i class="fa fa-check-square-o"></i>Approve SPB</a>
                                        </li>
                                    <?php /*}*/ ?>
                                </ul>
                            </li>-->
                        <?php /*}*/ ?>
                        <?php $nav = array('1', '2', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <li class="<?php if ($this->uri->segment(1) == "kspb" || $this->uri->segment(1) == "kbudget") { echo 'active '; } ?>treeview">
                                <a href="#">
                                    <i class="fa fa-bank"></i> <span>Finance</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if ($this->uri->segment(1) == "kspb") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('kspb'); ?>">
                                            <i class="fa fa-circle-o"></i> SPB
                                            <span class="pull-right-container"><span id="tspbk" class="label label-info pull-right"></span></span>
                                        </a>
                                    </li>
                                    <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                                    <?php if (in_array($role, $navrole)) { ?>
                                        <li <?php if ($this->uri->segment(1) == "kbudget") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('kbudget'); ?>">
                                                <i class="fa fa-circle-o"></i> Budgeting
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php $nav = array('1', '2', '4', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                            <?php if (in_array($role, $navrole)) { ?>
                            <!--     <li class="<?php if ($this->uri->segment(1) == "kreportnps" || $this->uri->segment(1) == "kreportspb" || $this->uri->segment(1) == "kreportprpo" || $this->uri->segment(1) == "kreportbco") { echo 'active '; } ?>treeview">
                                    <a href="#">
                                        <i class="fa fa-bar-chart"></i> <span>Laporan</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li <?php if ($this->uri->segment(1) == "kreportnps") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('kreportnps'); ?>"><i class="fa fa-circle-o"></i> Laporan Nopes</a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "kreportprpo") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('kreportprpo'); ?>"><i class="fa fa-circle-o"></i> Laporan PRPO</a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "kreportbco") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('kreportbco'); ?>"><i class="fa fa-circle-o"></i> Laporan Penagihan</a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "kreportspb") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('kreportspb'); ?>"><i class="fa fa-circle-o"></i> Laporan SPB</a>
                                        </li>
                                    </ul>
                                </li> -->
                            <?php } ?>
                        <?php } ?>

                        <!--========================= MESRA =========================-->
                        <li class="header" style="color:#3498db;">PT. METROPOLITAN SEJAHTERA</li>
                        <?php $nav = array('1', '2', '3', '4', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <li class="<?php if ($this->uri->segment(1) == "mnopes" || $this->uri->segment(1) == "mprpo") { echo 'active '; } ?>treeview">
                                <a href="#">
                                    <i class="fa fa-pencil-square-o"></i> <span>Billing</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if ($this->uri->segment(1) == "mnopes") {echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('mnopes'); ?>">
                                            <i class="fa fa-circle-o"></i> NOPES
                                            <span class="pull-right-container"><span id="tnopesm" class="label label-primary pull-right"></span></span>
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "mprpo") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('mprpo'); ?>">
                                            <i class="fa fa-circle-o"></i> PRPO
                                            <span class="pull-right-container"><span id="tprpom" class="label label-primary pull-right"></span></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if ($this->uri->segment(1) == "mtrack") { echo 'class="active"'; } ?>>
                                <a href="<?php echo base_url('mtrack'); ?>"><i class="fa fa-binoculars"></i>
                                    <span>Tracking</span>
                                </a>
                            </li>
                            <li <?php if ($this->uri->segment(1) == "mbillco") { echo 'class="active"'; } ?>>
                                <a href="<?php echo base_url('mbillco'); ?>">
                                    <i class="fa fa-clipboard"></i>
                                    <span>Collection</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php $nav = array('1', '2', '4', '6'); ?>
                        <?php /*if (in_array($group, $nav)) {*/ ?>
                            <!--<li class="<?php /*if ($this->uri->segment(1) == "mfiling" || $this->uri->segment(1) == "mapproval") { echo 'active '; }*/ ?>treeview">
                                <a href="#">
                                    <i class="fa fa-calendar-check-o"></i> <span>Approval</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php /*if ($this->uri->segment(1) == "mfiling") {echo 'class="active"'; }*/ ?>>
                                        <a href="<?php /*echo base_url('mfiling'); */?>"><i class="fa fa-send"></i> Request SPB</a>
                                    </li>
                                    <?php /*$navrole = array('1', '2', '3'); */?> 
                                    <?php /*if (in_array($role, $navrole)) { */?>
                                        <li <?php /*if ($this->uri->segment(1) == "mapproval") { echo 'class="active"'; }*/ ?>>
                                            <a href="<?php /*echo base_url('mapproval');*/ ?>">
                                                <i class="fa fa-check-square-o"></i> Approve SPB
                                            </a>
                                        </li>
                                    <?php /*}*/ ?>
                                </ul>
                            </li>-->
                        <?php /*}*/ ?>
                        <?php $nav = array('1', '2', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <li class="<?php if ($this->uri->segment(1) == "mspb" || $this->uri->segment(1) == "mbudget") { echo 'active '; } ?>treeview">
                                <a href="#">
                                    <i class="fa fa-bank"></i> <span>Finance</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if ($this->uri->segment(1) == "mspb") {echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('mspb'); ?>">
                                            <i class="fa fa-circle-o"></i> SPB
                                            <span class="pull-right-container"><span id="tspbm" class="label label-info pull-right"></span></span>
                                        </a>
                                    </li>
                                    <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                                    <?php if (in_array($role, $navrole)) { ?>
                                        <li <?php if ($this->uri->segment(1) == "mbudget") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('mbudget'); ?>"><i class="fa fa-circle-o"></i> Budgeting</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php $nav = array('1', '2', '4', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                            <?php if (in_array($role, $navrole)) { ?>
                            <!--     <li class="<?php if ($this->uri->segment(1) == "mreportnps" || $this->uri->segment(1) == "mreportspb" || $this->uri->segment(1) == "mreportprpo" || $this->uri->segment(1) == "mreportbco") { echo 'active '; } ?>treeview">
                                    <a href="#">
                                        <i class="fa fa-bar-chart"></i> <span>Laporan</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li <?php if ($this->uri->segment(1) == "mreportnps") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('mreportnps'); ?>">
                                                <i class="fa fa-circle-o"></i> Laporan Nopes
                                            </a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "mreportprpo") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('mreportprpo'); ?>">
                                                <i class="fa fa-circle-o"></i> Laporan PRPO
                                            </a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "mreportbco") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('mreportbco'); ?>">
                                                <i class="fa fa-circle-o"></i>
                                                Laporan Penagihan
                                            </a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "mreportspb") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('mreportspb'); ?>">
                                                <i class="fa fa-circle-o"></i> Laporan SPB
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                            <?php } ?>
                        <?php } ?>

                        <!--========================= PADI UMKM =========================-->
                        <li class="header" style="color:#605ca8;">PADI UMKM</li>
                        <?php $nav = array('1', '2', '3', '4', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <li class="<?php if ($this->uri->segment(1) == "pnopes" || $this->uri->segment(1) == "pprpo" || $this->uri->segment(1) == "ppros" || $this->uri->segment(1) == "ppo") { echo 'active '; } ?>treeview">
                                <a href="#">
                                    <i class="fa fa-pencil-square-o"></i> <span>Billing</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if ($this->uri->segment(1) == "pnopes") {echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('pnopes'); ?>">
                                            <i class="fa fa-circle-o"></i> NOPES
                                            <span class="pull-right-container"><span id="tnopesp" class="label bg-purple pull-right"></span></span>
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "ppo") {echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('ppo'); ?>">
                                            <i class="fa fa-circle-o"></i> Purchase Order
                                            <span class="pull-right-container"><span id="tnopesp" class="label label-primary pull-right"></span></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if ($this->uri->segment(1) == "pbillco") { echo 'class="active"'; } ?>>
                                <a href="<?php echo base_url('pbillco'); ?>">
                                    <i class="fa fa-clipboard"></i>
                                    <span>Collection</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php $nav = array('1', '2', '4', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <!--<li class="<?php /*if ($this->uri->segment(1) == "pfiling" || $this->uri->segment(1) == "papproval") { echo 'active '; } */?>treeview">
                                <a href="#">
                                    <i class="fa fa-calendar-check-o"></i> <span>Approval</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php /*if ($this->uri->segment(1) == "pfiling") {echo 'class="active"'; } */?>>
                                        <a href="<?php /*echo base_url('pfiling'); */?>"><i class="fa fa-send"></i> Request SPB</a>
                                    </li>
                                    <?php /*$navrole = array('1', '2', '3'); */?>
                                    <?php /*if (in_array($role, $navrole)) { */?>
                                        <li <?php /*if ($this->uri->segment(1) == "papproval") { echo 'class="active"'; } */?>>
                                            <a href="<?php /*echo base_url('papproval'); */?>">
                                                <i class="fa fa-check-square-o"></i> Approve SPB
                                            </a>
                                        </li>
                                    <?php /*} */?>
                                </ul>
                            </li>-->
                        <?php } ?>
                        <?php $nav = array('1', '2', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <li class="<?php if ($this->uri->segment(1) == "pspb" || $this->uri->segment(1) == "pbudget") { echo 'active '; } ?>treeview">
                                <a href="#">
                                    <i class="fa fa-bank"></i> <span>Finance</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if ($this->uri->segment(1) == "pspb") {echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('pspb'); ?>">
                                            <i class="fa fa-circle-o"></i> SPB
                                            <span class="pull-right-container"><span id="tspbp" class="label label-info pull-right"></span></span>
                                        </a>
                                    </li>
                                    <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                                    <?php if (in_array($role, $navrole)) { ?>
                                        <li <?php if ($this->uri->segment(1) == "pbudget") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('pbudget'); ?>"><i class="fa fa-circle-o"></i> Budgeting</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php $nav = array('1', '2', '4', '5', '6'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                            <?php if (in_array($role, $navrole)) { ?>
                            <!--     <li class="<?php if ($this->uri->segment(1) == "preportnps" || $this->uri->segment(1) == "preportspb" || $this->uri->segment(1) == "preportprpo" || $this->uri->segment(1) == "preportbco") { echo 'active '; } ?>treeview">
                                    <a href="#">
                                        <i class="fa fa-bar-chart"></i> <span>Laporan</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li <?php if ($this->uri->segment(1) == "preportnps") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('preportnps'); ?>">
                                                <i class="fa fa-circle-o"></i> Laporan Nopes
                                            </a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "preportbco") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('preportbco'); ?>">
                                                <i class="fa fa-circle-o"></i>
                                                Laporan Penagihan
                                            </a>
                                        </li>
                                        <li <?php if ($this->uri->segment(1) == "preportspb") { echo 'class="active"'; } ?>>
                                            <a href="<?php echo base_url('preportspb'); ?>">
                                                <i class="fa fa-circle-o"></i> Laporan SPB
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                            <?php } ?>
                        <?php } ?>

                        <!--========================= MANAJEMEN =========================-->
                        <li class="header" style="color:#2ecc71;">MANAJEMEN</li>
                        <li <?php if ($this->uri->segment(1) == "letter") { echo 'class="active"'; } ?>><a href="<?php echo base_url('letter'); ?>"><i class="fa fa-file-word-o"></i> Penomoran Surat</a></li>
                        <li class="<?php if ($this->uri->segment(1) == "attendances" || $this->uri->segment(1) == "dircom" || $this->uri->segment(1) == "empreport" || $this->uri->segment(1) == "offwork") { echo 'active '; } ?>treeview">
                            <a href="#">
                                <i class="fa fa-building-o"></i> <span>Direktori</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php $navrole = array('1', '2', '4', '5', '6', '7'); ?>
                                <?php if (in_array($role, $navrole)) { ?>
                                    <li <?php if ($this->uri->segment(1) == "offwork") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('offwork'); ?>">
                                            <i class="fa fa-circle-o"></i> Form Cuti
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "attendances") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('attendances'); ?>">
                                            <i class="fa fa-circle-o"></i> Data Kehadiran
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php $nav = array('1', '5', '6'); ?>
                                <?php if (in_array($group, $nav)) { ?>
                                <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                                <?php if (in_array($role, $navrole)) { ?>
                                    <li <?php if ($this->uri->segment(1) == "dircom") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('dircom'); ?>">
                                            <i class="fa fa-circle-o"></i> Data Karyawan</a></li>
                                    <li <?php if ($this->uri->segment(1) == "empreport") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('empreport'); ?>">
                                            <i class="fa fa-circle-o"></i> Laporan
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(1) == "member" || $this->uri->segment(1) == "emailblast") { echo 'active '; } ?>treeview">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Keanggotaan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($this->uri->segment(1) == "member") { echo 'class="active"'; } ?>>
                                    <a href="<?php echo base_url('member'); ?>">
                                        <i class="fa fa-circle-o"></i> Data Anggota
                                    </a>
                                </li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Simpanan</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Pinjaman</a></li>
                                <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                                <?php if (in_array($role, $navrole)) { ?>
                                    <li <?php if ($this->uri->segment(1) == "emailblast") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('emailblast'); ?>">
                                            <i class="fa fa-circle-o"></i> Email Blast
                                        </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Laporan</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php $navrole = array('1', '2', '4', '5'); ?>
                        <?php if (in_array($role, $navrole)) { ?>
                        <li class="<?php if ($this->uri->segment(1) == "assets" || $this->uri->segment(1) == "rent") { echo 'active '; } ?>treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i> <span>Logistik</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($this->uri->segment(1) == "assets") { echo 'class="active"'; } ?>>
                                    <a href="<?php echo base_url('assets'); ?>">
                                        <i class="fa fa-circle-o"></i> Aktiva Perusahaan
                                    </a>
                                </li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Sewa Kendaraan</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Arsip</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Laporan</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php } ?>
                        <?php $nav = array('1', '5'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <?php $navrole = array('1', '2', '3', '4', '5'); ?>
                            <?php if (in_array($role, $navrole)) { ?>
                                <li <?php if ($this->uri->segment(1) == "investor") {echo 'class="active"'; } ?>>
                                    <a href="<?php echo base_url('investor'); ?>">
                                        <i class="fa fa-gg-circle"></i> <span>Investor</span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php $nav = array('1'); ?>
                        <?php if (in_array($group, $nav)) { ?>
                            <li class="header">NAVIGASI ADMIN</li>
                            <li class="<?php if ($this->uri->segment(1) == "user" || $this->uri->segment(1) == "segment" || $this->uri->segment(1) == "datalog" || $this->uri->segment(1) == "offday" || $this->uri->segment(1) == "targetam" || $this->uri->segment(1) == "targetsegment") { echo 'active '; } ?>treeview">
                                <a href="#">
                                    <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if ($this->uri->segment(1) == "user") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('user'); ?>">
                                            <i class="fa fa-circle-o"></i> Akun Pengguna
                                        </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Grup</a></li>
                                    <li <?php if ($this->uri->segment(1) == "segment") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('segment'); ?>">
                                            <i class="fa fa-circle-o"></i> Segmen
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "targetam") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('targetam'); ?>">
                                            <i class="fa fa-circle-o"></i> Target AM
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "targetsegment") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('targetsegment'); ?>">
                                            <i class="fa fa-circle-o"></i> Target Segmen
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "fakturpajak") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('fakturpajak'); ?>">
                                            <i class="fa fa-circle-o"></i> Faktur Pajak
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "datalog") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('datalog'); ?>">
                                            <i class="fa fa-circle-o"></i> Data Log
                                        </a>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == "offday") { echo 'class="active"'; } ?>>
                                        <a href="<?php echo base_url('offday'); ?>">
                                            <i class="fa fa-circle-o"></i> Libur Nasional
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Analytics
                        <small>Dashboard</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Analytics</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo $totalspb[0]['totalspb']; ?></h3>

                                    <p>SPB</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-paper"></i>
                                </div>
                                <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?php echo $totalpaid[0]['totalcair']; ?><sup style="font-size: 20px">%</sup></h3>

                                    <p>Pencairan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo $totalmember[0]['totalmember']; ?></h3>

                                    <p>Anggota</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?php echo $totalinvtd[0]['totalinvoicetoday']; ?></h3>

                                    <p>Invoice</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-calculator"></i>
                                </div>
                                <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="box-title">Estimasi Profit</h3>
                            <h1 style="color: #fa591d;"><strong>Rp <?php echo strrev(implode('.',str_split(strrev(strval($newestimasiprofit[0]['estprofit'])),3))); ?></strong></h1>
                            <br/>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Monthly Recap Report</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-wrench"></i></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-center">
                                                Sales: 01 January 2022 - <?php echo date('d F Y', strtotime($lastdate[0]['crdat'])); ?>
                                            </p>
                                            <p class="text-center">
                                                Total: <strong><?php echo $totalinv[0]['totalinvoice']; ?> invoices</strong>
                                            </p>

                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <h3>VOL</h3>
                                                <div id="chartvol" style="height: 150px;"></div>
                                            </div>
                                            <!-- /.chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                <strong>Goal Completion</strong>
                                            </p>

                                            <div class="progress-group">
                                                <span class="progress-text">Impresive</span>
                                                <span class="progress-number"><?php echo round($totaltarget); ?> M/<b>182 M</b></span>
                                                <?php $percentage1 = round(round($totaltarget)/182 * 100.2); ?>
                                                <div class="progress m active">
                                                    <div class="progress-bar progress-bar-red progress-bar-striped" style="width: <?php echo $percentage1; ?>%"><?php echo $percentage1; ?>%</div>
                                                </div>
                                            </div>
                                            <!-- /.progress-group -->
                                            <div class="progress-group">
                                                <span class="progress-text">Challenging</span>
                                                <span class="progress-number"><?php echo round($totaltarget); ?> M/<b>174 M</b></span>
                                                <?php $percentage2 = round(round($totaltarget)/174 * 100.2); ?>
                                                <div class="progress m active">
                                                    <div class="progress-bar progress-bar-yellow progress-bar-striped" style="width: <?php echo $percentage2; ?>%"><?php echo $percentage2; ?>%</div>
                                                </div>
                                            </div>
                                            <!-- /.progress-group -->
                                            <div class="progress-group">
                                                <span class="progress-text">Optimitst</span>
                                                <span class="progress-number"><?php echo round($totaltarget); ?> M/<b>167 M</b></span>
                                                <?php $percentage3 = round(round($totaltarget)/167 * 100.2); ?>
                                                <div class="progress m active">
                                                    <div class="progress-bar progress-bar-green progress-bar-striped" style="width: <?php echo $percentage3; ?>%"><?php echo $percentage3; ?>%</div>
                                                </div>
                                            </div>
                                            <!-- /.progress-group -->
                                            <div class="progress-group">
                                                <span class="progress-text">Realization</span>
                                                <span class="progress-number"><b><?php echo round($totaltarget); ?> M</b></span>

                                                <div class="progress m active">
                                                    <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 100%">100%</div>
                                                </div>
                                            </div>
                                            <!-- /.progress-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-12">
                                            <h3>VAL</h3>
                                            <div id="chartval" style="height: 250px;"></div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> -->
                                                <h5 class="description-header" style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalrev[0]['totalrev'])),3)))?></h5>
                                                <span class="description-text">TOTAL REVENUE</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <!-- <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span> -->
                                                <h5 class="description-header" style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalcost[0]['totalcost'])),3)))?></h5>
                                                <span class="description-text">TOTAL COST</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span> -->
                                                <h5 class="description-header" style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalprofit[0]['totalprofit'])),3)))?></h5>
                                                <span class="description-text">TOTAL MARGIN</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block">
                                                <!-- <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span> -->
                                                <h5 class="description-header" style="color: #fa591d;">250 M</h5>
                                                <span class="description-text">GOAL COMPLETIONS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-md-4 connectedSortable">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Tracking Invoice</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="chartinv"></div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                </div>
                                <!-- /.box-footer -->
                            </div>

                        </section>
                        <!-- Left col -->
                        <section class="col-md-4 connectedSortable">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">SPB</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="chartspb"></div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-md-4 connectedSortable">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">User Performance</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="chartdist"></div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                </div>
                                <!-- /.box-footer -->
                            </div>

                        </section>
                        <!-- right col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Collection Forecast</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- /.chart-responsive -->
                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div id="chartpostingforecasting" style="height: 250px;"></div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Monthly Collection : PAID/UNPAID</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- /.chart-responsive -->
                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div id="chartpaidunpaid" style="height: 250px;"></div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <p><strong>Data diambil berdasarkan tanggal invoice dibuat</strong></p>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Monthly AR</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- /.chart-responsive -->
                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div id="chartreceivepaidunpaid" style="height: 250px;"></div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <p><strong>Data diambil berdasarkan tanggal pencairan invoice</strong></p>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Daily AR</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- /.chart-responsive -->
                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div id="chartarday" style="height: 250px;"></div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <p><strong>Data diambil berdasarkan tanggal pencairan invoice</strong></p>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">AM Performance</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="nav-tabs-custom" style="cursor: move;">
                                                <!-- Tabs within a box -->
                                                <ul class="nav nav-tabs pull-right ui-sortable-handle">
                                                    <li><a href="#revenue-chart" data-toggle="tab">Value</a></li>
                                                    <li class="active"><a href="#sales-chart" data-toggle="tab">Volume</a></li>
                                                    <li class="pull-left header"><i class="fa fa-inbox"></i> Invoice</li>
                                                </ul>
                                                <div class="tab-content no-padding">
                                                    <!-- Morris chart - Sales -->
                                                    <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                        <div id="chartamval" style="height: 250px;"></div>
                                                    </div>
                                                    <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;">
                                                        <div id="chartamvol" style="height: 250px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tabs pane-->
                                            <!-- /.chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">AM Collection Unpaid</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="nav-tabs-custom" style="cursor: move;">
                                                <!-- Tabs within a box -->
                                                <ul class="nav nav-tabs pull-right ui-sortable-handle">
                                                    <li><a href="#revenue-collection-chart" data-toggle="tab">Value</a></li>
                                                    <li class="active"><a href="#sales-collection-chart" data-toggle="tab">Volume</a></li>
                                                    <li class="pull-left header"><i class="fa fa-inbox"></i> Invoice</li>
                                                </ul>
                                                <div class="tab-content no-padding">
                                                    <!-- Morris chart - Sales -->
                                                    <div class="chart tab-pane" id="revenue-collection-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                        <div id="chartamcollval" style="height: 250px;"></div>
                                                    </div>
                                                    <div class="chart tab-pane active" id="sales-collection-chart" style="position: relative; height: 300px;">
                                                        <div id="chartamcollvol" style="height: 250px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tabs pane-->
                                            <!-- /.chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">KOMET x PADI UMKM</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                Total :<strong style="color: #fa591d;"> Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpadi[0]['totalvalue'])),3)))?></strong>
                                            </p>
                                            <!-- /.chart-responsive -->
                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div id="chartpadi" style="height: 250px;"></div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Year over Year Report : VOL</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                <strong>Total Invoice Monthly: 2021 vs 2022</strong>
                                            </p>

                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div id="chartyoyvol" style="height: 250px;"></div>
                                            </div>
                                            <!-- /.chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Year over Year Report : VAL</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                <strong>Total Invoice Monthly: 2021 vs 2022</strong>
                                            </p>

                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div id="chartyoyval" style="height: 250px;"></div>
                                            </div>
                                            <!-- /.chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <script>
		        am4core.ready(function() {

			        // Themes begin
			        am4core.useTheme(am4themes_kelly);
			        am4core.useTheme(am4themes_animated);
			        // Themes end

			        //---------Start chart Val
			        var chart = am4core.create("chartval", am4charts.XYChart);

			        // Add data
			        chart.data = <?php echo $drdinval ?>;

			        // Create axes
			        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			        dateAxis.periodChangeDateFormats.setKey("month", "[bold]yyyy[/]");
			        dateAxis.startLocation = 0.5;
			        dateAxis.endLocation = 0.5;

			        // Create value axis
			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

			        // Create series
			        var series = chart.series.push(new am4charts.LineSeries());
			        series.dataFields.valueY = "valinv";
			        series.dataFields.dateX = "month";
			        series.strokeWidth = 3;
			        series.tooltipText = "{valueY.value}";
			        series.fillOpacity = 0.1;

			        // Create a range to change stroke for values below 0
			        var range = valueAxis.createSeriesRange(series);
			        range.value = 0;
			        range.endValue = -1000;
			        range.contents.stroke = chart.colors.getIndex(4);
			        range.contents.fill = range.contents.stroke;
			        range.contents.strokeOpacity = 0.7;
			        range.contents.fillOpacity = 0.1;

			        // Add cursor
			        chart.cursor = new am4charts.XYCursor();
			        chart.cursor.xAxis = dateAxis;
			        chart.scrollbarX = new am4core.Scrollbar();

			        // Add simple bullet
			        var bullet = series.bullets.push(new am4charts.Bullet());
			        var circle = bullet.createChild(am4core.Circle);
			        circle.width = 10;
			        circle.height = 10;
			        circle.horizontalCenter = "middle";
			        circle.verticalCenter = "middle";

			        //------End chart Val
			        //---------Start chart Vol

			        // Create chart instance
			        var chart = am4core.create("chartvol", am4charts.XYChart);

			        // Add data
			        chart.data = <?php echo $drdinvol ?>;

			        // Create axes

			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "month";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
				        if (target.dataItem && target.dataItem.index & 2 == 2) {
					        return dy + 25;
				        }
				        return dy;
			        });

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

			        // Create series
			        var series = chart.series.push(new am4charts.ColumnSeries());
			        series.dataFields.valueY = "volinv";
			        series.dataFields.categoryX = "month";
			        series.name = "Total Vol Invoice";
			        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
			        series.columns.template.fillOpacity = .8;

			        var columnTemplate = series.columns.template;
			        columnTemplate.strokeWidth = 2;
			        columnTemplate.strokeOpacity = 1;

			        //------End chart Vol
			        //------Start chart AM Volume
			        var chart = am4core.create("chartamvol", am4charts.XYChart);
			        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

			        chart.paddingBottom = 30;

			        chart.data = <?php echo $drdamvol ?>;

			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "amkomet";
			        categoryAxis.renderer.grid.template.strokeOpacity = 0;
			        categoryAxis.renderer.minGridDistance = 10;
			        categoryAxis.renderer.labels.template.dy = 35;
			        categoryAxis.renderer.tooltip.dy = 35;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.renderer.inside = true;
			        valueAxis.renderer.labels.template.fillOpacity = 0.3;
			        valueAxis.renderer.grid.template.strokeOpacity = 0;
			        valueAxis.min = 0;
			        valueAxis.cursorTooltipEnabled = false;
			        valueAxis.renderer.baseGrid.strokeOpacity = 0;

			        var series = chart.series.push(new am4charts.ColumnSeries);
			        series.dataFields.valueY = "orderid";
			        series.dataFields.categoryX = "amkomet";
			        series.tooltipText = "{valueY.value}";
			        series.tooltip.pointerOrientation = "vertical";
			        series.tooltip.dy = - 6;
			        series.columnsContainer.zIndex = 100;

			        var columnTemplate = series.columns.template;
			        columnTemplate.width = am4core.percent(50);
			        columnTemplate.maxWidth = 66;
			        columnTemplate.column.cornerRadius(60, 60, 10, 10);
			        columnTemplate.strokeOpacity = 0;

			        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });
			        series.mainContainer.mask = undefined;

			        var cursor = new am4charts.XYCursor();
			        chart.cursor = cursor;
			        cursor.lineX.disabled = true;
			        cursor.lineY.disabled = true;
			        cursor.behavior = "none";

			        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
			        bullet.circle.radius = 30;
			        bullet.valign = "bottom";
			        bullet.align = "center";
			        bullet.isMeasured = true;
			        bullet.mouseEnabled = false;
			        bullet.verticalCenter = "bottom";
			        bullet.interactionsEnabled = false;

			        var hoverState = bullet.states.create("hover");
			        var outlineCircle = bullet.createChild(am4core.Circle);
			        outlineCircle.adapter.add("radius", function (radius, target) {
				        var circleBullet = target.parent;
				        return circleBullet.circle.pixelRadius + 10;
			        })

			        var image = bullet.createChild(am4core.Image);
			        image.width = 60;
			        image.height = 60;
			        image.horizontalCenter = "middle";
			        image.verticalCenter = "middle";
			        image.propertyFields.href = "amphoto";

			        image.adapter.add("mask", function (mask, target) {
				        var circleBullet = target.parent;
				        return circleBullet.circle;
			        })

			        var previousBullet;
			        chart.cursor.events.on("cursorpositionchanged", function (event) {
				        var dataItem = series.tooltipDataItem;

				        if (dataItem.column) {
					        var bullet = dataItem.column.children.getIndex(1);

					        if (previousBullet && previousBullet != bullet) {
						        previousBullet.isHover = false;
					        }

					        if (previousBullet != bullet) {

						        var hs = bullet.states.getKey("hover");
						        hs.properties.dy = -bullet.parent.pixelHeight + 30;
						        bullet.isHover = true;

						        previousBullet = bullet;
					        }
				        }
			        })
			        //------End chart AM Vol
			        //------Start chart AM Value
			        var chart = am4core.create("chartamval", am4charts.XYChart);
			        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

			        chart.paddingBottom = 30;

			        chart.data = <?php echo $drdamval ?>;

			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "amkomet";
			        categoryAxis.renderer.grid.template.strokeOpacity = 0;
			        categoryAxis.renderer.minGridDistance = 10;
			        categoryAxis.renderer.labels.template.dy = 35;
			        categoryAxis.renderer.tooltip.dy = 35;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.renderer.inside = true;
			        valueAxis.renderer.labels.template.fillOpacity = 0.3;
			        valueAxis.renderer.grid.template.strokeOpacity = 0;
			        valueAxis.min = 0;
			        valueAxis.cursorTooltipEnabled = false;
			        valueAxis.renderer.baseGrid.strokeOpacity = 0;

			        var series = chart.series.push(new am4charts.ColumnSeries);
			        series.dataFields.valueY = "basevalue";
			        series.dataFields.categoryX = "amkomet";
			        series.tooltipText = "{valueY.value}";
			        series.tooltip.pointerOrientation = "vertical";
			        series.tooltip.dy = - 6;
			        series.columnsContainer.zIndex = 100;

			        var columnTemplate = series.columns.template;
			        columnTemplate.width = am4core.percent(50);
			        columnTemplate.maxWidth = 66;
			        columnTemplate.column.cornerRadius(60, 60, 10, 10);
			        columnTemplate.strokeOpacity = 0;

			        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });
			        series.mainContainer.mask = undefined;

			        var cursor = new am4charts.XYCursor();
			        chart.cursor = cursor;
			        cursor.lineX.disabled = true;
			        cursor.lineY.disabled = true;
			        cursor.behavior = "none";

			        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
			        bullet.circle.radius = 30;
			        bullet.valign = "bottom";
			        bullet.align = "center";
			        bullet.isMeasured = true;
			        bullet.mouseEnabled = false;
			        bullet.verticalCenter = "bottom";
			        bullet.interactionsEnabled = false;

			        var hoverState = bullet.states.create("hover");
			        var outlineCircle = bullet.createChild(am4core.Circle);
			        outlineCircle.adapter.add("radius", function (radius, target) {
				        var circleBullet = target.parent;
				        return circleBullet.circle.pixelRadius + 10;
			        })

			        var image = bullet.createChild(am4core.Image);
			        image.width = 60;
			        image.height = 60;
			        image.horizontalCenter = "middle";
			        image.verticalCenter = "middle";
			        image.propertyFields.href = "amphoto";

			        image.adapter.add("mask", function (mask, target) {
				        var circleBullet = target.parent;
				        return circleBullet.circle;
			        })

			        var previousBullet;
			        chart.cursor.events.on("cursorpositionchanged", function (event) {
				        var dataItem = series.tooltipDataItem;

				        if (dataItem.column) {
					        var bullet = dataItem.column.children.getIndex(1);

					        if (previousBullet && previousBullet != bullet) {
						        previousBullet.isHover = false;
					        }

					        if (previousBullet != bullet) {

						        var hs = bullet.states.getKey("hover");
						        hs.properties.dy = -bullet.parent.pixelHeight + 30;
						        bullet.isHover = true;

						        previousBullet = bullet;
					        }
				        }
			        })
			        //------End chart AM Val

			        //------Start chart AM Collection Volume
			        var chart = am4core.create("chartamcollvol", am4charts.XYChart);
			        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

			        chart.paddingBottom = 30;

			        chart.data = <?php echo $drdamcollvol ?>;

			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "amkomet";
			        categoryAxis.renderer.grid.template.strokeOpacity = 0;
			        categoryAxis.renderer.minGridDistance = 10;
			        categoryAxis.renderer.labels.template.dy = 35;
			        categoryAxis.renderer.tooltip.dy = 35;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.renderer.inside = true;
			        valueAxis.renderer.labels.template.fillOpacity = 0.3;
			        valueAxis.renderer.grid.template.strokeOpacity = 0;
			        valueAxis.min = 0;
			        valueAxis.cursorTooltipEnabled = false;
			        valueAxis.renderer.baseGrid.strokeOpacity = 0;

			        var series = chart.series.push(new am4charts.ColumnSeries);
			        series.dataFields.valueY = "orderid";
			        series.dataFields.categoryX = "amkomet";
			        series.tooltipText = "{valueY.value}";
			        series.tooltip.pointerOrientation = "vertical";
			        series.tooltip.dy = - 6;
			        series.columnsContainer.zIndex = 100;

			        var columnTemplate = series.columns.template;
			        columnTemplate.width = am4core.percent(50);
			        columnTemplate.maxWidth = 66;
			        columnTemplate.column.cornerRadius(60, 60, 10, 10);
			        columnTemplate.strokeOpacity = 0;

			        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e74c3c"), max: am4core.color("#c0392b") });
			        series.mainContainer.mask = undefined;

			        var cursor = new am4charts.XYCursor();
			        chart.cursor = cursor;
			        cursor.lineX.disabled = true;
			        cursor.lineY.disabled = true;
			        cursor.behavior = "none";

			        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
			        bullet.circle.radius = 30;
			        bullet.valign = "bottom";
			        bullet.align = "center";
			        bullet.isMeasured = true;
			        bullet.mouseEnabled = false;
			        bullet.verticalCenter = "bottom";
			        bullet.interactionsEnabled = false;

			        var hoverState = bullet.states.create("hover");
			        var outlineCircle = bullet.createChild(am4core.Circle);
			        outlineCircle.adapter.add("radius", function (radius, target) {
				        var circleBullet = target.parent;
				        return circleBullet.circle.pixelRadius + 10;
			        })

			        var image = bullet.createChild(am4core.Image);
			        image.width = 60;
			        image.height = 60;
			        image.horizontalCenter = "middle";
			        image.verticalCenter = "middle";
			        image.propertyFields.href = "amphoto";

			        image.adapter.add("mask", function (mask, target) {
				        var circleBullet = target.parent;
				        return circleBullet.circle;
			        })

			        var previousBullet;
			        chart.cursor.events.on("cursorpositionchanged", function (event) {
				        var dataItem = series.tooltipDataItem;

				        if (dataItem.column) {
					        var bullet = dataItem.column.children.getIndex(1);

					        if (previousBullet && previousBullet != bullet) {
						        previousBullet.isHover = false;
					        }

					        if (previousBullet != bullet) {

						        var hs = bullet.states.getKey("hover");
						        hs.properties.dy = -bullet.parent.pixelHeight + 30;
						        bullet.isHover = true;

						        previousBullet = bullet;
					        }
				        }
			        })
			        //------End chart AM Collection Vol
			        //------Start chart AM Collection Value
			        var chart = am4core.create("chartamcollval", am4charts.XYChart);
			        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

			        chart.paddingBottom = 30;

			        chart.data = <?php echo $drdamcollval ?>;

			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "amkomet";
			        categoryAxis.renderer.grid.template.strokeOpacity = 0;
			        categoryAxis.renderer.minGridDistance = 10;
			        categoryAxis.renderer.labels.template.dy = 35;
			        categoryAxis.renderer.tooltip.dy = 35;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.renderer.inside = true;
			        valueAxis.renderer.labels.template.fillOpacity = 0.3;
			        valueAxis.renderer.grid.template.strokeOpacity = 0;
			        valueAxis.min = 0;
			        valueAxis.cursorTooltipEnabled = false;
			        valueAxis.renderer.baseGrid.strokeOpacity = 0;

			        var series = chart.series.push(new am4charts.ColumnSeries);
			        series.dataFields.valueY = "basevalue";
			        series.dataFields.categoryX = "amkomet";
			        series.tooltipText = "{valueY.value}";
			        series.tooltip.pointerOrientation = "vertical";
			        series.tooltip.dy = - 6;
			        series.columnsContainer.zIndex = 100;

			        var columnTemplate = series.columns.template;
			        columnTemplate.width = am4core.percent(50);
			        columnTemplate.maxWidth = 66;
			        columnTemplate.column.cornerRadius(60, 60, 10, 10);
			        columnTemplate.strokeOpacity = 0;

			        series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e74c3c"), max: am4core.color("#c0392b") });
			        series.mainContainer.mask = undefined;

			        var cursor = new am4charts.XYCursor();
			        chart.cursor = cursor;
			        cursor.lineX.disabled = true;
			        cursor.lineY.disabled = true;
			        cursor.behavior = "none";

			        var bullet = columnTemplate.createChild(am4charts.CircleBullet);
			        bullet.circle.radius = 30;
			        bullet.valign = "bottom";
			        bullet.align = "center";
			        bullet.isMeasured = true;
			        bullet.mouseEnabled = false;
			        bullet.verticalCenter = "bottom";
			        bullet.interactionsEnabled = false;

			        var hoverState = bullet.states.create("hover");
			        var outlineCircle = bullet.createChild(am4core.Circle);
			        outlineCircle.adapter.add("radius", function (radius, target) {
				        var circleBullet = target.parent;
				        return circleBullet.circle.pixelRadius + 10;
			        })

			        var image = bullet.createChild(am4core.Image);
			        image.width = 60;
			        image.height = 60;
			        image.horizontalCenter = "middle";
			        image.verticalCenter = "middle";
			        image.propertyFields.href = "amphoto";

			        image.adapter.add("mask", function (mask, target) {
				        var circleBullet = target.parent;
				        return circleBullet.circle;
			        })

			        var previousBullet;
			        chart.cursor.events.on("cursorpositionchanged", function (event) {
				        var dataItem = series.tooltipDataItem;

				        if (dataItem.column) {
					        var bullet = dataItem.column.children.getIndex(1);

					        if (previousBullet && previousBullet != bullet) {
						        previousBullet.isHover = false;
					        }

					        if (previousBullet != bullet) {

						        var hs = bullet.states.getKey("hover");
						        hs.properties.dy = -bullet.parent.pixelHeight + 30;
						        bullet.isHover = true;

						        previousBullet = bullet;
					        }
				        }
			        })
			        //------End chart AM Collection Val

			        //------Start chart YoY VOL
			        // Create chart instance
			        var chart = am4core.create("chartyoyvol", am4charts.XYChart);

			        // Add percent sign to all numbers
			        //chart.numberFormatter.numberFormat = "#.3'%'";

			        // Add data
			        chart.data = <?php echo $drdvolyoy ?>;

			        // Create axes
			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "month";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.title.text = "Total growth rate";
			        valueAxis.title.fontWeight = 800;

			        // Create series
			        var series = chart.series.push(new am4charts.ColumnSeries());
			        series.dataFields.valueY = "lastyear";
			        series.dataFields.categoryX = "month";
			        series.clustered = false;
			        series.tooltipText = "Total grow in {categoryX} (2021): [bold]{valueY}[/]";

			        var series2 = chart.series.push(new am4charts.ColumnSeries());
			        series2.dataFields.valueY = "thisyear";
			        series2.dataFields.categoryX = "month";
			        series2.clustered = false;
			        series2.columns.template.width = am4core.percent(50);
			        series2.tooltipText = "Total grow in {categoryX} (2022): [bold]{valueY}[/]";

			        chart.cursor = new am4charts.XYCursor();
			        chart.cursor.lineX.disabled = true;
			        chart.cursor.lineY.disabled = true;
			        //------End chart YoY VOL
			        //------Start chart YoY VAL
			        // Create chart instance
			        var chart = am4core.create("chartyoyval", am4charts.XYChart);

			        // Add percent sign to all numbers
			        //chart.numberFormatter.numberFormat = "#.3'%'";

			        // Add data
			        chart.data = <?php echo $drdvalyoy ?>;

			        // Create axes
			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "month";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.title.text = "Total growth rate";
			        valueAxis.title.fontWeight = 800;

			        // Create series
			        var series = chart.series.push(new am4charts.ColumnSeries());
			        series.dataFields.valueY = "lastyear";
			        series.dataFields.categoryX = "month";
			        series.clustered = false;
			        series.tooltipText = "Total grow in {categoryX} (2021): [bold]{valueY}[/]";

			        var series2 = chart.series.push(new am4charts.ColumnSeries());
			        series2.dataFields.valueY = "thisyear";
			        series2.dataFields.categoryX = "month";
			        series2.clustered = false;
			        series2.columns.template.width = am4core.percent(50);
			        series2.tooltipText = "Total grow in {categoryX} (2022): [bold]{valueY}[/]";

			        chart.cursor = new am4charts.XYCursor();
			        chart.cursor.lineX.disabled = true;
			        chart.cursor.lineY.disabled = true;
			        //------End chart YoY VAL

			        //------Start chart POSTINGXFORECASTING
			        // Create chart instance
			        var chart = am4core.create("chartpostingforecasting", am4charts.XYChart);

			        // Add percent sign to all numbers
			        //chart.numberFormatter.numberFormat = "#.3'%'";

			        // Add data
			        chart.data = <?php echo $collectionpostingforecasting; ?>;

			        // Create axes
			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "month";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.title.text = "POSTING/FORECASTING";
			        valueAxis.title.fontWeight = 800;

			        // Create series
			        var series = chart.series.push(new am4charts.ColumnSeries());
			        series.dataFields.valueY = "posting";
			        series.dataFields.categoryX = "month";
			        series.clustered = false;
			        series.tooltipText = "Total Posting {categoryX} : [bold]{valueY}[/]";
			        series.columns.template.fill = am4core.color("#00bcd4");
			        series.columns.template.stroke = am4core.color("#00bcd4");

			        var series2 = chart.series.push(new am4charts.ColumnSeries());
			        series2.dataFields.valueY = "forecasting";
			        series2.dataFields.categoryX = "month";
			        series2.clustered = false;
			        series2.columns.template.width = am4core.percent(50);
			        series2.tooltipText = "Total Forecasting {categoryX} : [bold]{valueY}[/]";
			        series2.columns.template.fill = am4core.color("#44bd32");
			        series2.columns.template.stroke = am4core.color("#44bd32");

			        var series3 = chart.series.push(new am4charts.ColumnSeries());
			        series3.dataFields.valueY = "keuangan";
			        series3.dataFields.categoryX = "month";
			        series3.clustered = false;
			        series3.columns.template.width = am4core.percent(50);
			        series3.tooltipText = "Total Keuangan {categoryX} : [bold]{valueY}[/]";
			        series3.columns.template.fill = am4core.color("#F5CF33");
			        series3.columns.template.stroke = am4core.color("#F5CF33");

			        chart.cursor = new am4charts.XYCursor();
			        chart.cursor.lineX.disabled = true;
			        chart.cursor.lineY.disabled = true;
			        //------End chart POSTINGXFORECASTING

			        // ------Start chart PAIDUNPAID
			        // Create chart instance
			        var chart = am4core.create("chartpaidunpaid", am4charts.XYChart);

			        // Add percent sign to all numbers
			        //chart.numberFormatter.numberFormat = "#.3'%'";

			        // Add data
			        chart.data = <?php echo $collectionpaidunpaid ?>;

			        // Create axes
			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "month";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.title.text = "PAID/UNPAID";
			        valueAxis.title.fontWeight = 800;

			        // Create series
			        var series = chart.series.push(new am4charts.ColumnSeries());
			        series.dataFields.valueY = "totalunpaid";
			        series.dataFields.categoryX = "month";
			        series.clustered = false;
			        series.tooltipText = "Total Unpaid {categoryX} : [bold]{valueY}[/]";
			        series.columns.template.fill = am4core.color("#dd4b39");
			        series.columns.template.stroke = am4core.color("#dd4b39");

			        var series2 = chart.series.push(new am4charts.ColumnSeries());
			        series2.dataFields.valueY = "totalpaid";
			        series2.dataFields.categoryX = "month";
			        series2.clustered = false;
			        series2.columns.template.width = am4core.percent(50);
			        series2.tooltipText = "Total Paid {categoryX} : [bold]{valueY}[/]";
			        series2.columns.template.fill = am4core.color("#44bd32");
			        series2.columns.template.stroke = am4core.color("#44bd32");

			        chart.cursor = new am4charts.XYCursor();
			        chart.cursor.lineX.disabled = true;
			        chart.cursor.lineY.disabled = true;
			        //------End chart paidunpaid

			        //------Start chart RECEIVE PAIDUNPAID
			        // Create chart instance
			        var chart = am4core.create("chartreceivepaidunpaid", am4charts.XYChart);

			        // Add percent sign to all numbers
			        //chart.numberFormatter.numberFormat = "#.3'%'";

			        // Add data
			        chart.data = <?php echo $collectionreceivepaidunpaid ?>;

			        // Create axes
			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "month";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.title.text = "PAID";
			        valueAxis.title.fontWeight = 800;

			        var series2 = chart.series.push(new am4charts.ColumnSeries());
			        series2.dataFields.valueY = "totalpaid";
			        series2.dataFields.categoryX = "month";
			        series2.clustered = false;
			        series2.columns.template.width = am4core.percent(50);
			        series2.tooltipText = "Total Paid {categoryX} : [bold]{valueY}[/]";
			        series2.columns.template.fill = am4core.color("#44bd32");
			        series2.columns.template.stroke = am4core.color("#44bd32");

			        chart.cursor = new am4charts.XYCursor();
			        chart.cursor.lineX.disabled = true;
			        chart.cursor.lineY.disabled = true;
			        //------End chart RECEIVE paidunpaid

			        //---------Start chart User Performance
			        var chart = am4core.create("chartdist", am4charts.PieChart3D);
			        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

			        chart.legend = new am4charts.Legend();

			        chart.data = <?php echo $invdist ?>;

			        var series = chart.series.push(new am4charts.PieSeries3D());
			        series.dataFields.value = "valinv";
			        series.dataFields.category = "division";
			        series.hiddenInLegend = true;

			        //------End chart User Performance
			        //---------Start chart SPB

			        // Create chart instance
			        var chart = am4core.create("chartspb", am4charts.PieChart);

			        // Add data
			        chart.data = <?php echo $allspb ?>;

			        // Set inner radius
			        chart.innerRadius = am4core.percent(50);

			        // Add and configure Series
			        var pieSeries = chart.series.push(new am4charts.PieSeries());
			        pieSeries.dataFields.value = "valspb";
			        pieSeries.dataFields.category = "orderstatus";
			        pieSeries.slices.template.stroke = am4core.color("#fff");
			        pieSeries.slices.template.strokeWidth = 2;
			        pieSeries.slices.template.strokeOpacity = 1;

			        // This creates initial animation
			        pieSeries.hiddenState.properties.opacity = 1;
			        pieSeries.hiddenState.properties.endAngle = -90;
			        pieSeries.hiddenState.properties.startAngle = -90;

			        //------End chart SPB
			        //---------Start chart Invoice

			        // Create chart instance
			        var chart = am4core.create("chartinv", am4charts.XYChart);

			        // Add data
			        chart.data = <?php echo $allinv ?>;

			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "status";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
				        if (target.dataItem && target.dataItem.index & 2 == 2) {
					        return dy + 25;
				        }
				        return dy;
			        });

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

			        // Create series
			        var series = chart.series.push(new am4charts.ColumnSeries());
			        series.dataFields.valueY = "volinv";
			        series.dataFields.categoryX = "status";
			        series.name = "Collection Updates";
			        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
			        series.columns.template.fillOpacity = .8;

			        var columnTemplate = series.columns.template;
			        columnTemplate.strokeWidth = 2;
			        columnTemplate.strokeOpacity = 1;
			        //------End chart Invoice

			        //---------Start chart PADI
			        var chart = am4core.create("chartpadi", am4charts.XYChart);

			        // Add data
			        chart.data = <?php echo $drdvalpadi ?>;

			        // Create axes
			        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			        dateAxis.periodChangeDateFormats.setKey("month", "[bold]yyyy[/]");
			        dateAxis.startLocation = 0.5;
			        dateAxis.endLocation = 0.5;

			        // Create value axis
			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

			        // Create series
			        var series = chart.series.push(new am4charts.LineSeries());
			        series.dataFields.valueY = "valinv";
			        series.dataFields.dateX = "month";
			        series.strokeWidth = 3;
			        series.tooltipText = "{valueY.value}";
			        series.fillOpacity = 0.1;

			        // Create a range to change stroke for values below 0
			        var range = valueAxis.createSeriesRange(series);
			        range.value = 0;
			        range.endValue = -1000;
			        range.contents.stroke = chart.colors.getIndex(4);
			        range.contents.fill = range.contents.stroke;
			        range.contents.strokeOpacity = 0.7;
			        range.contents.fillOpacity = 0.1;

			        // Add cursor
			        chart.cursor = new am4charts.XYCursor();
			        chart.cursor.xAxis = dateAxis;
			        chart.scrollbarX = new am4core.Scrollbar();

			        // Add simple bullet
			        var bullet = series.bullets.push(new am4charts.Bullet());
			        var circle = bullet.createChild(am4core.Circle);
			        circle.width = 10;
			        circle.height = 10;
			        circle.horizontalCenter = "middle";
			        circle.verticalCenter = "middle";

			        //------End chart PADI
			        //---------Start chart Collection Paid

			        // Create chart instance
			        var chart = am4core.create("chartcolunpaid", am4charts.XYChart);

			        // Add data
			        chart.data = <?php echo $collectionunpaid ?>;

			        // Create axes

			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "month";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
				        if (target.dataItem && target.dataItem.index & 2 == 2) {
					        return dy + 25;
				        }
				        return dy;
			        });

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

			        // Create series
			        var series = chart.series.push(new am4charts.ColumnSeries());
			        series.dataFields.valueY = "totalunpaid";
			        series.dataFields.categoryX = "month";
			        series.name = "Total Invoice Unpaid";
			        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
			        series.columns.template.fillOpacity = .8;
			        series.columns.template.fill = am4core.color("#ff0310");
			        series.stroke = am4core.color("#ac0d0f");

			        var columnTemplate = series.columns.template;
			        columnTemplate.strokeWidth = 2;
			        columnTemplate.strokeOpacity = 1;
			        //------End chart Collection Paid


		        }); // end am4core.ready()

		        $(function () {
			        $('.selectpicker').select2();
		        });
            </script>
            <script>
		        am4core.ready(function() {

			        // Themes begin
			        am4core.useTheme(am4themes_animated);
			        // Themes end

			        // Create chart instance
			        var chart = am4core.create("chartarday", am4charts.XYChart);

			        // Add data
			        chart.data = <?php echo $getarbyday ?>;

			        // Set input format for the dates
			        chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

			        // Create axes
			        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

			        // Create series
			        var series = chart.series.push(new am4charts.LineSeries());
			        series.dataFields.valueY = "totalpaid";
			        series.dataFields.dateX = "procdat";
			        series.tooltipText = "{totalpaid}"
			        series.strokeWidth = 2;
			        series.minBulletDistance = 15;
			        series.fill = am4core.color("#44bd32");
			        series.stroke = am4core.color("#44bd32");

			        // Drop-shaped tooltips
			        series.tooltip.background.cornerRadius = 20;
			        series.tooltip.background.strokeOpacity = 0;
			        series.tooltip.pointerOrientation = "vertical";
			        series.tooltip.label.minWidth = 40;
			        series.tooltip.label.minHeight = 40;
			        series.tooltip.label.textAlign = "middle";
			        series.tooltip.label.textValign = "middle";

			        // Make bullets grow on hover
			        var bullet = series.bullets.push(new am4charts.CircleBullet());
			        bullet.circle.strokeWidth = 2;
			        bullet.circle.radius = 4;
			        bullet.circle.fill = am4core.color("#fff");

			        var bullethover = bullet.states.create("hover");
			        bullethover.properties.scale = 1.3;

			        // Make a panning cursor
			        chart.cursor = new am4charts.XYCursor();
			        chart.cursor.behavior = "panXY";
			        chart.cursor.xAxis = dateAxis;
			        chart.cursor.snapToSeries = series;

			        // Create vertical scrollbar and place it before the value axis
			        chart.scrollbarY = new am4core.Scrollbar();
			        chart.scrollbarY.parent = chart.leftAxesContainer;
			        chart.scrollbarY.toBack();

			        // Create a horizontal scrollbar with previe and place it underneath the date axis
			        chart.scrollbarX = new am4charts.XYChartScrollbar();
			        chart.scrollbarX.series.push(series);
			        chart.scrollbarX.parent = chart.bottomAxesContainer;

			        chart.events.on("ready", function () {
				        dateAxis.zoom({start:0.79, end:1});
			        });

		        }); // end am4core.ready()
            </script>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 5.0
                </div>
                Server proccess time: <strong>{elapsed_time}</strong> secs.
            </footer>

            <div class="control-sidebar-bg"></div>
        </div>

        <?php $this->carabiner->display('js_content'); ?>
        <script>
            var base_url = '<?php echo base_url();?>';

            $.ajax({
                type: "GET",
                url: base_url+'/ajaxpage/countlabel',
                data: '',
                success: function (data) {
                    var response = JSON.parse(data);
                    $('#tnopesk').html(response.tnk[0].tnopesk);
                    $('#tprpok').html(response.tpk[0].tprpok);
                    $('#tspbk').html(response.tsk[0].tspbk);

                    $('#tnopesm').html(response.tnm[0].tnopesm);
                    $('#tprpom').html(response.tpm[0].tprpom);
                    $('#tspbm').html(response.tsm[0].tspbm);

                    $('#tnopesp').html(response.tnp[0].tnopesp);
                    $('#tprpop').html(response.tpp[0].tprpop);
                    $('#tspbp').html(response.tsp[0].tspbp);
                }
            });

            $.widget.bridge('uibutton', $.ui.button);
        </script>
    </body>
</html>