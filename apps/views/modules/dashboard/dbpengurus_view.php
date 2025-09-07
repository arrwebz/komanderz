<style>
[data-bs-theme=dark] .table td span {
    color: #fff !important;
}
</style>

<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Dashboard</h4>
                <nav aria-label="breadcrumb"> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('dbpengurus');?>">Pengurus</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Bot.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-xl-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="owl-carousel collectibles-carousel owl-theme mt-9 owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(990px, 0px, 0px); transition: all 2s ease 0s; width: 2226px;">
                                <div class="owl-item cloned" style="width: 217.333px; margin-left: 30px;">
                                    <div class="item">
                                        <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
                                            <div class="position-relative">
                                                <img src="<?php echo $this->config->item('skins_uri');?>images/nft/sales.jpg" class="img-fluid w-100" alt="1">
                                            </div>
                                            <div class="p-9 text-start">
                                                <h6 class="ffw-semibold fs-4">Sales</h6>
                                                <div class="d-flex align-items-center mt-3 justify-content-between">
                                                    <div class="fs-3">&nbsp;</div>
                                                    <h6 class="mb-0">
                                                        <span class="text-dark fw-bold">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalrev[0]['totalrev'])),3)))?></span>
                                                    </h6>
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 217.333px; margin-left: 30px;">
                                    <div class="item">
                                        <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
                                            <div class="position-relative">
                                                <img src="<?php echo $this->config->item('skins_uri');?>images/nft/collp.jpg" class="img-fluid w-100" alt="1">
                                            </div>
                                            <div class="p-9 text-start">
                                                <h6 class="fw-semibold fs-4">Collection Paid</h6>
                                                <div class="d-flex align-items-center mt-3 justify-content-between">
                                                    <div class="fs-3">&nbsp;</div>
                                                    <h6 class="mb-0">
                                                        <span class="text-dark fw-bold">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($collpaidyear)),3)))?></span>
                                                    </h6>
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 217.333px; margin-left: 30px;">
                                    <div class="item">
                                        <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
                                            <div class="position-relative">
                                                <img src="<?php echo $this->config->item('skins_uri');?>images/nft/collun.jpg" class="img-fluid w-100" alt="1">
                                            </div>
                                            <div class="p-9 text-start">
                                                <h6 class="fw-semibold fs-4">Collection Unpaid</h6>
                                                <div class="d-flex align-items-center mt-3 justify-content-between">
                                                    <div class="fs-3">&nbsp;</div>
                                                    <h6 class="mb-0">
                                                        <span class="text-dark fw-bold">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($unpaid)),3)))?></span>
                                                    </h6>
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 217.333px; margin-left: 30px;">
                                    <div class="item">
                                        <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
                                            <div class="position-relative">
                                                <img src="<?php echo $this->config->item('skins_uri');?>images/nft/project.jpg" class="img-fluid w-100" alt="1">
                                            </div>
                                            <div class="p-9 text-start">
                                                <h6 class="fw-semibold fs-4">Project</h6>
                                                <div class="d-flex align-items-center mt-3 justify-content-between">
                                                    <div class="fs-3">&nbsp;</div>
                                                    <h6 class="mb-0">
                                                        <span class="text-dark fw-bold">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totallop[0]['val'])),3)))?></span>
                                                    </h6>
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Funding</h5>
                    <p class="card-subtitle mb-0">KOPTEL</p>
                    <div class="card overflow-hidden mt-9">
                        <img src="<?php echo $this->config->item('skins_uri');?>images/backgrounds/my-card.jpg" alt="bg-card" height="220">
                        <div class="card-img-overlay text-white">
                            <div class="d-flex align-items-start flex-column h-100">
                                <div>
                                    <img src="<?php echo $this->config->item('skins_uri');?>images/backgrounds/BCAS.png" width="200" alt="mastercard">
                                    <span class="opacity-75 fs-2 d-block mt-3">CARD NUMBER</span>
                                    <h4 class="text-white fw-normal">00 3400 0043</h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-auto w-100">
                                    <div>
                                        <span class="opacity-75 fs-2 text-uppercase"> BCAS</span>
                                        <h6 class="text-white mb-0">Koperasi Metropolitan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none mb-0">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center mb-3">
                                <h2 class="fw-semibold mb-0">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($valprokop[0]['proval'])),3)))?></h2>
                            </div>
                            <a href="<?php echo base_url();?>prokoptel" class="btn bg-primary-subtle text-primary w-100 mt-3"> View Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Periode 2021 - <?php echo date('Y');?></h5>
                    <div class="card mt-4 mb-0 shadow-none">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle text-nowrap">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <!--<tr>
                                        <td>1</td>
                                        <td>Saldo Segmen</td>
                                        <td class="text-right"><div id="ajaxsaldosegment"></div></td>
                                    </tr>-->
                                    <tr>
                                        <td>1</td>
                                        <td>Simpanan Anggota</td>
                                        <td class="text-right"><div id="ajaxsimpanananggota"></div></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Investor</td>
                                        <td class="text-right"><div id="ajaxinvestor"></div></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-right">Total : </td>
                                        <td class="text-right"><div id="totalHu"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 d-flex align-items-strech">
            <div class="card w-100">
                <div class="chat-box-inner-part h-100">
                    <div class="chatting-box d-block">
                        <div class="p-9 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                            <div class="hstack gap-3 current-chat-user-name">
                                <div class="position-relative">
                                    <img src="<?php echo $this->config->item('uploads_uri');?>user/ai/admin.jpg" alt="user1" width="48" height="48" class="rounded-circle">
                                    <span id="botOnline" class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                                        <span class="visually-hidden"></span>
                                    </span>
                                    <span id="botOffline" class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-primary">
                                        <span class="visually-hidden"></span>
                                    </span>
                                    <span id="botMaintain" class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-danger">
                                        <span class="visually-hidden"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <h6 class="mb-1 name fw-semibold">Komanders</h6>
                                    <p id="botTyping" class="mb-0"></p>
                                    <p id="textBotstatus" class="mb-0"></p>
                                </div> 
                            </div>
                            <ul class="list-unstyled mb-0 d-flex align-items-center">
                                <li>
                                    <a id="checkBot" class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5 " href="javascript:void(0)" data-bs-toggle="tooltip" title="Cek Status Bot">
                                        <i class="ti ti-info-circle"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="position-relative overflow-hidden d-flex">
                            <div class="position-relative d-flex flex-grow-1 flex-column">
                                <div class="chat-box p-9" style="height: calc(100vh - 442px)" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: -20px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                                    <div class="simplebar-content" style="padding: 20px;">
                                                        <div id="boxChat" class="chat-list chat active-chat">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: auto; height: 577px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                        <div class="simplebar-scrollbar" style="height: 263px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                                    </div>
                                </div>
                                <div class="px-9 py-6 border-top chat-send-message-footer">
                                    <form id="chatBot" action="javascript:">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2 w-85">
                                                <a id="onmic" onclick="runSpeechRecog()" class="position-relative nav-icon-hover z-index-5" href="javascript:void(0)">
                                                    <i class="ti ti-microphone text-dark bg-hover-primary fs-7"></i>
                                                </a>
                                                <input id="message" type="text" name="message" class="form-control message-type-box text-muted border-0 p-0 ms-2" placeholder="Type a Message" autocomplete="off">
                                            </div>
                                            <ul class="list-unstyledn mb-0 d-flex align-items-center">
                                                <li>
                                                    <button id="submit" type="submit" class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5">
                                                        <i class="ti ti-send"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                    <p id="action" style="color: grey;font-weight: 800; padding: 0;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row col-xl-12 d-flex align-items-strech pr-0">
            <div class="col-md-6">
                <div class="card w-100">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h4 class="card-title text-white mb-0">DPS</h4>
                        <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                            <a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
                            <a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                            <a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                                <i class="ti ti-x fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4 collapse">
                        <div class="table-responsive pb-9">
                            <table class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">SEGMEN</th>
                                    <th rowspan="2" class="align-middle">PANJAR</th>
                                    <th rowspan="2" class="align-middle">SALES</th>
                                    <th colspan="2" class="text-center">COLLECTION</th>
                                </tr>
                                <tr>
                                    <th class="text-center">UNPAID</th>
                                    <th class="text-center">PAID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($dps as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['segmentname'];?></td>
                                        <td class="text-right"><?php echo formatrev($row['panjar']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['sales']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['unpaid']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['paid']);?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pr-0">
                <div class="card w-100">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h4 class="card-title text-white mb-0">DSS</h4>
                        <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                            <a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
                            <a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                            <a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                                <i class="ti ti-x fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4 collapse">
                        <div class="table-responsive pb-9">
                            <table class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">SEGMEN</th>
                                    <th rowspan="2" class="align-middle">PANJAR</th>
                                    <th rowspan="2" class="align-middle">SALES</th>
                                    <th colspan="2" class="text-center">COLLECTION</th>
                                </tr>
                                <tr>
                                    <th class="text-center">UNPAID</th>
                                    <th class="text-center">PAID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($dss as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['segmentname'];?></td>
                                        <td class="text-right"><?php echo formatrev($row['panjar']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['sales']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['unpaid']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['paid']);?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-xl-12 d-flex align-items-strech pr-0">
            <div class="col-md-6">
                <div class="card w-100">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h4 class="card-title text-white mb-0">DGS</h4>
                        <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                            <a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
                            <a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                            <a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                                <i class="ti ti-x fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4 collapse">
                        <div class="table-responsive pb-9">
                            <table class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">SEGMEN</th>
                                    <th rowspan="2" class="align-middle">PANJAR</th>
                                    <th rowspan="2" class="align-middle">SALES</th>
                                    <th colspan="2" class="text-center">COLLECTION</th>
                                </tr>
                                <tr>
                                    <th class="text-center">UNPAID</th>
                                    <th class="text-center">PAID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($dgs as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['segmentname'];?></td>
                                        <td class="text-right"><?php echo formatrev($row['panjar']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['sales']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['unpaid']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['paid']);?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pr-0">
                <div class="card w-100">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h4 class="card-title text-white mb-0">SDA</h4>
                        <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                            <a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
                            <a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                            <a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                                <i class="ti ti-x fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4 collapse">
                        <div class="table-responsive pb-9">
                            <table class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">SEGMEN</th>
                                    <th rowspan="2" class="align-middle">PANJAR</th>
                                    <th rowspan="2" class="align-middle">SALES</th>
                                    <th colspan="2" class="text-center">COLLECTION</th>
                                </tr>
                                <tr>
                                    <th class="text-center">UNPAID</th>
                                    <th class="text-center">PAID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($sda as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['segmentname'];?></td>
                                        <td class="text-right"><?php echo formatrev($row['panjar']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['sales']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['unpaid']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['paid']);?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-xl-12 d-flex align-items-strech pr-0">
            <div class="col-md-6">
                <div class="card w-100">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h4 class="card-title text-white mb-0">NON</h4>
                        <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                            <a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
                            <a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                            <a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                                <i class="ti ti-x fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4 collapse">
                        <div class="table-responsive pb-9">
                            <table class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">SEGMEN</th>
                                    <th rowspan="2" class="align-middle">PANJAR</th>
                                    <th rowspan="2" class="align-middle">SALES</th>
                                    <th colspan="2" class="text-center">COLLECTION</th>
                                </tr>
                                <tr>
                                    <th class="text-center">UNPAID</th>
                                    <th class="text-center">PAID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($non as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['segmentname'];?></td>
                                        <td class="text-right"><?php echo formatrev($row['panjar']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['sales']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['unpaid']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['paid']);?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pr-0">
                <div class="card w-100">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h4 class="card-title text-white mb-0">EKS</h4>
                        <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                            <a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
                            <a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                            <a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                                <i class="ti ti-x fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4 collapse">
                        <div class="table-responsive pb-9">
                            <table class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">SEGMEN</th>
                                    <th rowspan="2" class="align-middle">PANJAR</th>
                                    <th rowspan="2" class="align-middle">SALES</th>
                                    <th colspan="2" class="text-center">COLLECTION</th>
                                </tr>
                                <tr>
                                    <th class="text-center">UNPAID</th>
                                    <th class="text-center">PAID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($eks as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['segmentname'];?></td>
                                        <td class="text-right"><?php echo formatrev($row['panjar']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['sales']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['unpaid']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['paid']);?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-xl-12 d-flex align-items-strech pr-0">
            <div class="col-md-6">
                <div class="card w-100">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h4 class="card-title text-white mb-0">DES</h4>
                        <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                            <a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
                            <a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                            <a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                                <i class="ti ti-x fs-6"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4 collapse">
                        <div class="table-responsive pb-9">
                            <table class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">SEGMEN</th>
                                    <th rowspan="2" class="align-middle">PANJAR</th>
                                    <th rowspan="2" class="align-middle">SALES</th>
                                    <th colspan="2" class="text-center">COLLECTION</th>
                                </tr>
                                <tr>
                                    <th class="text-center">UNPAID</th>
                                    <th class="text-center">PAID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($des as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['segmentname'];?></td>
                                        <td class="text-right"><?php echo formatrev($row['panjar']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['sales']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['unpaid']);?></td>
                                        <td class="text-right"><?php echo formatrev($row['paid']);?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h4 class="card-title mb-0">Dashboard AM & AR</h4>
                    <div class="overflow-auto mt-4" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <div class="hstack gap-9">
                                                <?php
                                                    $uri_am = site_url('myboard/amboard?preview=');
                                                    $uri_ar = site_url('myboard/collboard?preview=');
                                                ?>
                                                <a href="<?php echo $uri_am.'nanza';?>" class="text-center flex-shrink-0 ">
                                                    <div class="border border-2 border-white rounded-circle hover-img">
                                                        <img data-src="<?php echo $this->config->item('uploads_uri');?>user/ai/nanza.jpg" class="rounded-circle img-fluid m-1 lazyload" alt="art" width="55">
                                                    </div>
                                                    <span class="d-block fs-3 mt-1  text-dark">Isnanza Zulkarnaini</span>
                                                </a>
                                                <a href="<?php echo $uri_am.'vania';?>" class="text-center flex-shrink-0 ">
                                                    <div class="border border-2 border-white rounded-circle hover-img">
                                                        <img data-src="<?php echo $this->config->item('uploads_uri');?>user/ai/vania.jpg" class="rounded-circle img-fluid m-1 lazyload" alt="art" width="55">
                                                    </div>
                                                    <span class="d-block fs-3 mt-1  text-dark">Vania Miranda Putri</span>
                                                </a>
                                                <a href="<?php echo $uri_am.'eva';?>" class="text-center flex-shrink-0 ">
                                                    <div class="border border-2 border-white rounded-circle hover-img">
                                                        <img data-src="<?php echo $this->config->item('uploads_uri');?>user/ai/eva.jpg" class="rounded-circle img-fluid m-1 lazyload" alt="art" width="55">
                                                    </div>
                                                    <span class="d-block fs-3 mt-1  text-dark">Eva Ayu Komala</span>
                                                </a>
                                                <a href="<?php echo $uri_am.'sigit';?>" class="text-center flex-shrink-0 ">
                                                    <div class="border border-2 border-white rounded-circle hover-img">
                                                        <img data-src="<?php echo $this->config->item('uploads_uri');?>user/ai/sigit.jpg" class="rounded-circle img-fluid m-1 lazyload" alt="art" width="55">
                                                    </div>
                                                    <span class="d-block fs-3 mt-1  text-dark">Sigit Hidayatullah</span>
                                                </a>
                                                <a href="<?php echo $uri_ar.'iman';?>" class="text-center flex-shrink-0 ">
                                                    <div class="border border-2 border-white rounded-circle hover-img">
                                                        <img data-src="<?php echo $this->config->item('uploads_uri');?>user/ai/iman.jpg" class="rounded-circle img-fluid m-1 lazyload" alt="art" width="55">
                                                    </div>
                                                    <span class="d-block fs-3 mt-1  text-dark">Iman Suryana</span>
                                                </a>
                                                <a href="<?php echo $uri_ar.'indra';?>" class="text-center flex-shrink-0 ">
                                                    <div class="border border-2 border-white rounded-circle hover-img">
                                                        <img data-src="<?php echo $this->config->item('uploads_uri');?>user/ai/indra.jpg" class="rounded-circle img-fluid m-1 lazyload" alt="art" width="55">
                                                    </div>
                                                    <span class="d-block fs-3 mt-1  text-dark">Indra Saputra Fardilla</span>
                                                </a>
                                                <a href="<?php echo $uri_ar.'lutfi';?>" class="text-center flex-shrink-0 ">
                                                    <div class="border border-2 border-white rounded-circle hover-img">
                                                        <img data-src="<?php echo $this->config->item('uploads_uri');?>user/ai/lutfi.jpg" class="rounded-circle img-fluid m-1 lazyload" alt="art" width="55">
                                                    </div>
                                                    <span class="d-block fs-3 mt-1  text-dark">Muhammad Luthfi</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 710px; height: 91px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary d-flex align-items-center">
                    <h5 class="card-title fw-semibold text-white">Attendance Weekly</h5>
                </div>
                <div class="card-body p-4">
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($attweek as $row){ ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="<?php echo str_replace('-','',$row['tanggal']);?>">
                                    <button class="accordion-button <?php if(date('Y-m-d') != $row['tanggal']){ echo 'collapsed'; }?>" type="button" data-bs-toggle="collapse" data-bs-target="#absen<?php echo str_replace('-','',$row['tanggal']);?>" aria-expanded="<?php if(date('Y-m-d') == $row['tanggal']){ echo 'true'; }else{ echo 'false';}?>" aria-controls="absen<?php echo str_replace('-','',$row['tanggal']);?>">
                                        <?php echo customDate($row['tanggal'].' 00:00:00');?>
                                    </button>
                                </h2>
                                <div id="absen<?php echo str_replace('-','',$row['tanggal']);?>" class="accordion-collapse collapse <?php if(date('Y-m-d') == $row['tanggal']){ echo 'show'; }?>" aria-labelledby="absen<?php echo str_replace('-','',$row['tanggal']);?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive pb-9">
                                            <table class="table border table-hover" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th>In</th>
                                                    <th>Out</th>
                                                    <th>Nama</th>
                                                    <th>Kehadiran</th>
                                                    <th>Kesehatan</th>
                                                    <th>Lokasi</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $dataabsen = $row['absen']; if(count($dataabsen) > 0){ ?>
                                                    <?php foreach ($dataabsen as $key => $rowabsen){ ?>
                                                        <tr>
                                                            <td><?php if(!empty($rowabsen['clockin'])){ echo date('H:i', strtotime($rowabsen['clockin'])); }?></td>
                                                            <td><?php if(!empty($rowabsen['clockout'])){ echo date('H:i', strtotime($rowabsen['clockout'])); }?></td>
                                                            <td><?php echo $rowabsen['fullname'];?></td>
                                                            <td>
                                                                <?php if($rowabsen['status'] == '1'){ ?>
                                                                    <span class="badge bg-primary">WFO</span>
                                                                <?php } elseif($rowabsen['status'] == '2') { ?>
                                                                    <span class="badge">Pulang</span>
                                                                <?php } elseif($rowabsen['status'] == '3') { ?>
                                                                    <span class="badge bg-info">Izin</span>
                                                                <?php } elseif($rowabsen['status'] == '4') { ?>
                                                                    <span class="badge bg-warning">Izin</span>
                                                                <?php } else { ?>
                                                                    <span class="badge bg-danger">Tanpa Keterangan</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if($rowabsen['health'] == '1'){ ?>
                                                                    <span class="badge bg-success">Sehat</span>
                                                                <?php } elseif($rowabsen['health'] == '2') { ?>
                                                                    <span class="badge bg-danger">Sakit</span>
                                                                <?php } else { ?>
                                                                    <span class="badge"> - </span>
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo $rowabsen['notes'];?></td>
                                                            <td>
                                                                <?php if($rowabsen['latitude'] == 0 && $rowabsen['longitude'] == 0 ) { ?>
                                                                    : <i>Mohon izinkan akses lokasi.</i>
                                                                <?php } else { ?>
                                                                    : buka di <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $rowabsen['latitude'] ?>,<?php echo $rowabsen['longitude'] ?>">Google Map</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary d-flex align-items-center">
                    <h5 class="card-title fw-semibold text-white">Overtime</h5>
                </div>
                <div class="card-body p-4">
                    <div class="card mt-4 mb-0 shadow-none">
                        <div class="table-responsive pb-9">
                            <table id="datatablesOvertime" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Date</td>
                                    <td>Name</td>
                                    <td>Notes</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $num = 1; foreach($overtimeweekly as $row){ ?>
                                <tr>
                                    <td><?php echo $num++;?></td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($row['datetime'])).'<br>'.date('H:i', strtotime($row['datetime']));?>
                                    </td>
                                    <td><?php echo $row['fullname'];?></td>
                                    <td><?php echo $row['notes'];?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary d-flex align-items-center">
                    <h5 class="card-title fw-semibold text-white">SPPD</h5>
                </div>
                <div class="card-body p-4">
                    <div class="card mt-4 mb-0 shadow-none">
                        <div class="table-responsive pb-9">
                            <table id="datatablesSPPD" class="table border table-striped table-bordered display text-nowrap">
                                <thead>
                                <tr>
                                    <th style="vertical-align: middle">No</th>
                                    <th style="vertical-align: middle">Nama</th>
                                    <th class="text-center">Destination</th>
                                    <th class="text-center">Start/End</th>
                                    <th class="text-center">Notes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $num = 1; foreach($sppdweekly as $row){ ?>
                                <tr>
                                    <td><?php echo $num++;?></td>
                                    <td><?php echo $row['fullname'];?></td>
                                    <td><?php echo $row['destination'];?></td>
                                    <td>
                                        IN : <?php echo date('d/m/Y', strtotime($row['start']));?>
                                        <br>OUT : <?php echo date('d/m/Y', strtotime($row['end']));?>
                                    </td>
                                    <td><?php echo $row['notes'];?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	$(function() {
		var table = $('#datatablesAttd, #datatablesOvertime, #datatablesSPPD').DataTable({
			'responsive'  : true,
			'paging'      : false,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollX'     : true,
		});

		$("#onmic").on('click', function () {
			const ut = new SpeechSynthesisUtterance("hello, I'M Komanders");
			speechSynthesis.speak(ut);
		});

		$("#botOnline").removeClass('hidden');
		/*document.getElementById("message").focus();*/
		
		/* start saldo segment */
		/*$("#ajaxsaldosegment").html("Loading...");
		$("#ajaxsimpanananggota").html("Loading...");
		$("#ajaxinvestor").html("Loading...");
		$("#totalHu").html("Loading...");
		$.ajax({
				type: "POST",
				url: "<?php //echo site_url().$this->router->fetch_class().'/ajaxsaldosegment'?>",
				data: '',
				success: function (data) {
					var respon = JSON.parse(data);
					if(respon['status'] == 'success'){
							$("#ajaxsaldosegment").html("Rp. "+respon['saldosegment']);
							$("#ajaxsaldosegment").addClass("animated zoomIn");
							
							$("#ajaxsimpanananggota").html("Rp. "+respon['memberactive']);
							$("#ajaxsimpanananggota").addClass("animated zoomIn");
							
							$("#ajaxinvestor").html("Rp. "+respon['investor']);
							$("#ajaxinvestor").addClass("animated zoomIn");
							
							$("#totalHu").html("Rp. "+respon['totalhu']);
							$("#totalHu").addClass("animated zoomIn");
					}else{
						alert('system not responding')
					}
				}
			});*/
		/* end saldo segment */
		

		$("#checkBot").on('click', function () {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url().$this->router->fetch_class().'/checkbot'?>",
				data: 'apikey=a29tZXQ=',
				success: function (data) {
					var respon = JSON.parse(data);
					if(respon['status'] == 'success'){
						$("#textBotstatus").html();

						if(respon['data'][0]['status'] == '1'){
							$("#botOnline").removeClass('hidden');
							$("#botOffline").addClass('hidden');
							$("#botMaintain").addClass('hidden');
							$("#botTyping").addClass('hidden');
							document.getElementById("submit").removeAttribute("disabled");

							$("#textBotstatus").html('Online');
						}else if(respon['data'][0]['status'] == '2'){
							$("#botOnline").addClass('hidden');
							$("#botOffline").removeClass('hidden');
							$("#botMaintain").addClass('hidden');
							$("#botTyping").addClass('hidden');
							document.getElementById("submit").setAttribute("disabled", 'disabled');

							$("#textBotstatus").html('Offline');
						}else if(respon['data'][0]['status'] == '3'){
							$("#botOnline").addClass('hidden');
							$("#botOffline").addClass('hidden');
							$("#botMaintain").removeClass('hidden');
							$("#botTyping").addClass('hidden');
							document.getElementById("submit").setAttribute("disabled", 'disabled');

							$("#textBotstatus").html('Maintain');
						}
					}else{
						alert('system not responding')
					}
				}
			});
		});
		$("#checkBot").trigger('click');

		/* check berkala */
		function cbot(){
			$("#checkBot").trigger('click')
		}
		setInterval(cbot, 60000);

		$("#chatBot").on('submit', function () {
			var message = $('#message').val();

			if(message == ""){
				alert('silahkan ketik pesan')
			}else{
				const now = new Date();
				const hours = now.getHours();
				const minutes = now.getMinutes();
				var timenow = hours+":"+minutes;

				$("#boxChat").append("<div class='hstack gap-3 align-items-start mb-7 justify-content-end'><div class='text-end'><h6 class='fs-2 text-muted'><?php echo $fullname; ?> "+ timenow +"</h6><div class='p-2 bg-info-subtle text-dark rounded-1 d-inline-block fs-3'>"+message+"</div></div></div>");
				$('#message').val('');

				$("#botOnline").addClass('hidden');
				$("#botTyping").removeClass('hidden');
				$("#botOffline").addClass('hidden');
				$("#botMaintain").addClass('hidden');

				setTimeout(function(){
					$.ajax({
						type: "POST",
						url: "<?php echo site_url().$this->router->fetch_class().'/chatbot'?>",
						data: 'question='+message+'&parent_chat_id=0',
						success: function (data) {
							document.getElementById("message").focus();
							var respon = JSON.parse(data);
							if(respon['status'] == 'success'){
								$("#botTyping").addClass('hidden');
								$("#botOnline").removeClass('hidden');
								$("#botOffline").addClass('hidden');
								$("#botMaintain").addClass('hidden');
								$("#boxChat").append("<div class='hstack gap-3 align-items-start mb-7 justify-content-start'><img src='<?php echo $this->config->item('uploads_uri');?>user/ai/admin.jpg' alt='user8' width='40' height='40' class='rounded-circle'><div><h6 class='fs-2 text-muted'>"+ respon['data']['bot_time'] +"</h6><div class='text-bg-light rounded-1 d-inline-block text-dark fs-3'>"+ respon['data']['bot_answer'] +"</div></div></div>");

								const ut = new SpeechSynthesisUtterance(respon['data']['bot_answer']);
								speechSynthesis.speak(ut);
							}else{
								$("#botTyping").removeClass('hidden');
								$("#botOnline").addClass('hidden');
								$("#botOffline").addClass('hidden');
								$("#botMaintain").addClass('hidden');
								alert('System not responding');
							}
						}
					});
				}, 1500);
			}
		});

		$(".collectibles-carousel").owlCarousel({
			loop: true,
			margin: 30,
			mouseDrag: true,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplaySpeed: 2000,
			nav: false,
			dots: false,
			rtl: true,
			responsive: {
				0: {
					items: 1,
				},
				576: {
					items: 2,
				},
				768: {
					items: 3,
				},
			},
		});
	});

	runSpeechRecog = () => {
		document.getElementById("message").innerHTML = "Loading text...";
		var output = document.getElementById('message');
		var action = document.getElementById('action');
		let recognization = new webkitSpeechRecognition();
		recognization.onstart = () => {
			action.innerHTML = "Ucapkan Sesuatu...";
		}
		recognization.onresult = (e) => {
			var transcript = e.results[0][0].transcript;
			$("#message").val(transcript);
			output.classList.remove("hide")
			action.innerHTML = "";
			setTimeout(function(){
				$("#chatBot").trigger('submit');
			}, 500);
		}
		recognization.start();
	}

</script>