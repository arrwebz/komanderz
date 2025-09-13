<div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Hai, <?php echo $fullname; ?> </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="#">Silakan isi kehadiran Anda hari ini</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Office.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body p-0">
        <div id="ww_d6246721befc8" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":["wl3000"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'><a href="https://weatherwidget.org/" id="ww_d6246721befc8_u" target="_blank">Html weather widget</a></div><script async src="https://app2.weatherwidget.org/js/?id=ww_d6246721befc8"></script>
    </div>
</div>
<div class="card">
    <div class="card-body p-0">
        <div class="row align-items-center">
            <div class="col-lg-4 order-lg-1 order-2">
                <div class="d-flex align-items-center justify-content-around m-4">
                    <div class="text-center">
                        <?php if ($drp[0]['userstatus'] == 'TETAP') { ?>
                            <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1"></h4>
                            <p class="mb-0 fs-4">Pegawai Tetap</p>
                        <?php } else { ?>
                            <i class="ti ti-user fs-6 d-block mb-2"></i>
                            <h4 class="mb-0 fw-semibold lh-1"></h4>
                            <p class="mb-0 fs-4">Pegawai Kontrak</p>
                        <?php }?>
                    </div>
                    <div class="text-center">
                        <i class="ti ti-cards fs-6 d-block mb-2"></i>
                        <h4 class="mb-0 fw-semibold lh-1"></h4>
                        <p class="mb-0 fs-4"><?php echo $drp[0]['nik']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                <div class="mt-n5">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 110px; height: 110px;" ;="">
                            <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;" ;="">
                                <img src="<?php echo $this->config->item('uploads_uri');?>user/ai/<?php echo $photo; ?>" alt="" class="w-100 h-100">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="fs-5 mb-0 fw-semibold"><?php echo $fullname; ?></h5>
                        <p class="mb-0 fs-4"><?php echo $position; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-last">
                <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-4 gap-4">
                    <li class="position-relative">
                        <a class="text-bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle" href="javascript:void(0)">
                            <i class="ti ti-brand-instagram"></i>
                        </a>
                    </li>
                    <li class="position-relative">
                        <a class="text-bg-dark d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle" href="javascript:void(0)">
                            <i class="ti ti-brand-tiktok"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-light-subtle rounded-2" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 <?php if(!isset($_GET['tab']) || $_GET['tab'] == 'presensi'){ echo 'active'; }?>" id="pills-presensi-tab" data-bs-toggle="pill" data-bs-target="#pills-presensi" type="button" role="tab" aria-controls="pills-presensi" aria-selected="true">
                    <i class="ti ti-clock me-2 fs-6"></i>
                    <span class="d-none d-md-block">Presensi</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 <?php if(isset($_GET['tab']) && $_GET['tab'] == 'cuti'){ echo 'active'; }?>" id="pills-cuti-tab" data-bs-toggle="pill" data-bs-target="#pills-cuti" type="button" role="tab" aria-controls="pills-cuti" aria-selected="false">
                    <i class="ti ti-plane-inflight me-2 fs-6"></i>
                    <span class="d-none d-md-block">Cuti</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 <?php if(isset($_GET['tab']) && $_GET['tab'] == 'overtime'){ echo 'active'; }?>" id="pills-overtime-tab" data-bs-toggle="pill" data-bs-target="#pills-overtime" type="button" role="tab" aria-controls="pills-overtime" aria-selected="false">
                    <i class="ti ti-file-time me-2 fs-6"></i>
                    <span class="d-none d-md-block">Lembur</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 <?php if(isset($_GET['tab']) && $_GET['tab'] == 'profile'){ echo 'active'; }?>" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Profil</span>
                </button>
            </li>
        </ul>
    </div>
</div>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane animated fadeIn <?php if(!isset($_GET['tab']) || $_GET['tab'] == 'presensi'){ echo 'show active'; }?>" id="pills-presensi" role="tabpanel" aria-labelledby="pills-presensi-tab" tabindex="0">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-none border">
                    <div class="card-body">
                        <h4 class="fw-semibold mb-3">Presensi<span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 ms-2"><i class="ti ti-clock"></i></span></h4>
                        <p>Silakan klik tombol berikut untuk menuju aplikasi kehadiran dan jangan lupa klik tombol ketika tiba waktunya untuk pulang.</p>
                        <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                            <!-- <a href="<?php echo site_url('attendances/clockin');?>" class="btn btn-primary">Masuk</a> -->
                            <!-- <a href="<?php echo site_url('attendances/clockout');?>" class="btn btn-outline-dark">Pulang</a> -->
                        </div>
                        <!-- <p>Silakan klik tombol ini untuk lembur pada pukul 18:00 </p> -->
                        <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                            <a href="https://account.mekari.com/users/sign_in?client_id=TAL-73645&return_to=L2F1dGg_Y2xpZW50X2lkPVRBTC03MzY0NSZyZXNwb25zZV90eXBlPWNvZGUmc2NvcGU9c3NvOnByb2ZpbGU%3D" target="_blank" class="btn bg-primary-subtle text-primary">Mekari Talenta</a>
                            <!-- <a href="<?php echo site_url('attendances/overtime');?>" class="btn bg-primary-subtle text-primary">Mulai Lembur</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-none border">
                    <div class="card-header">
                        <h4 class="fw-semibold mb-3">Action Plan Today</h4>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="floatingTextarea2" style="height: 137px">
									<?php
                                    if(count($drd) < 1){
                                        echo ' ';
                                    } else {
                                        echo $drd[0]['notes'];
                                    }
                                    ?>
                                    Tetap semangat dan jaga kesehatan ya!
								</textarea>

                            </div>
                            <!--<div class="d-flex align-items-center gap-2">
                                <button class="btn btn-light rounded-pill px-4 waves-effect waves-light">Update</button>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="margin-bottom:50px;">
                    <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                        <h4 class="card-title text-white mb-0"></h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="table-responsive pb-9">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-sm table-no-bordered" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Waktu</th>
                                        <th>Tanggal</th>
                                        <th>Presensi</th>
                                        <th>Kesehatan</th>
                                        <th>Keterangan</th>
                                        <th>Lokasi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ( $drd as $key => $row ) { ?>
                                        <tr>
                                            <td><?php echo date('H:i',strtotime($row['datetime'])); ?></td>
                                            <td><?php echo nice_date($row['datetime'],'d-m-Y'); ?></td>
                                            <td>
                                                <?php if($key < 1){ ?>
                                                    <?php if($row['status'] == '1'){ ?>
                                                        <span class="mb-1 badge text-bg-secondary">WFO</span>
                                                    <?php } elseif($row['status'] == '2') { ?>
                                                        <span class="mb-1 badge text-bg-light">Pulang</span>
                                                    <?php } elseif($row['status'] == '3') { ?>
                                                        <span class="mb-1 badge text-bg-warning">WFH</span>
                                                    <?php } elseif($row['status'] == '4') { ?>
                                                        <span class="mb-1 badge text-bg-danger">Izin</span>
                                                    <?php } else { ?>
                                                        <span class="mb-1 badge text-bg-danger">Tanpa Keterangan</span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if($key < 1){ ?>
                                                    <?php if($row['health'] == '1'){ ?>
                                                        <span class="mb-1 badge font-medium bg-success-subtle text-success">Sehat</span>
                                                    <?php } elseif($row['health'] == '2') { ?>
                                                        <span class="mb-1 badge font-medium bg-danger-subtle text-danger">Sakit</span>
                                                    <?php } else { ?>
                                                        <span class="mb-1 badge text-bg-dark">Tanpa Keterangan</span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $row['notes'] ?></td>
                                            <td>
                                                <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $row['latitude'] ?>,<?php echo $row['longitude'] ?>">
                                                    <i class="ti ti-map-2"></i> Cek Lokasi
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane animated fadeIn <?php if(isset($_GET['tab']) && $_GET['tab'] == 'cuti'){ echo 'show active'; }?>" id="pills-cuti" role="tabpanel" aria-labelledby="pills-cuti-tab" tabindex="0">
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
            <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Form Cuti <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 ms-2"><i class="ti ti-plane-inflight"></i></span>
            </h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Sisa saldo cuti tahunan Anda adalah <strong><?php echo $drp[0]['leavebalance']; ?></strong> hari</h5>
                        <form id="formoffwork" method="POST" action="javascript:">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Tanggal Mulai</label>
                                        <input name="txtSdat" type="date" class="form-control" id="sdate_cuti" data-date-days-off-week-disabled="0,5">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Tanggal Akhir</label>
                                        <input name="txtEdat" type="date" class="form-control" id="edate_cuti">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Jenis Cuti</label>
                                        <select class="form-control selectpicker" id="jcuti">
                                            <option disabled selected>Pilih</option>
                                            <option value="fullday">Cuti Tahunan</option>
                                            <option value="sick">Cuti Sakit</option>
                                            <option value="pray">Cuti Ibadah</option>
                                            <option value="givebirth">Cuti Melahirkan</option>
                                        </select>
                                    </div>
                                    <input name="txtCuti" type="hidden" class="form-control" id="vjcuti">
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Total Cuti </label>
                                        <input id="jmlcuti" type="text" name="txtTdat" class="form-control" readonly style="background-color: #eaeff4;">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Alasan Cuti</label>
                                        <textarea class="form-control" placeholder="..." style="height: 137px"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-md-flex align-items-center mt-3">
                                        <div class="ms-auto mt-3 mt-md-0">
                                            <button id="btnSubmitOffwork" type="submit" class="btn btn-sm btn-dark font-medium rounded-pill mb-2 px-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="ti ti-send me-2 fs-4"></i>
                                                    Submit
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane animated fadeIn <?php if(isset($_GET['tab']) && $_GET['tab'] == 'overtime'){ echo 'show active'; }?>" id="pills-overtime" role="tabpanel" aria-labelledby="pills-overtime-tab" tabindex="0">
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
            <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Lembur <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 ms-2"><i class="ti ti-file-time"></i></span>
            </h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Data lembur Anda </h5>
                        <div class="row">
                            <div class="row col-md-6">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Bulan</label>
                                        <select id="optBulan" name="optBulan" class="form-control selectpicker" style="width: 100%">
                                            <option value="01" <?php if(date('m') == '01'){ echo 'selected'; }?>>Januari</option>
                                            <option value="02" <?php if(date('m') == '02'){ echo 'selected'; }?>>Februari</option>
                                            <option value="03" <?php if(date('m') == '03'){ echo 'selected'; }?>>Maret</option>
                                            <option value="04" <?php if(date('m') == '04'){ echo 'selected'; }?>>April</option>
                                            <option value="05" <?php if(date('m') == '05'){ echo 'selected'; }?>>Mei</option>
                                            <option value="06" <?php if(date('m') == '06'){ echo 'selected'; }?>>Juni</option>
                                            <option value="07" <?php if(date('m') == '07'){ echo 'selected'; }?>>Juli</option>
                                            <option value="08" <?php if(date('m') == '08'){ echo 'selected'; }?>>Agustus</option>
                                            <option value="09" <?php if(date('m') == '09'){ echo 'selected'; }?>>September</option>
                                            <option value="10" <?php if(date('m') == '10'){ echo 'selected'; }?>>Oktober</option>
                                            <option value="11" <?php if(date('m') == '11'){ echo 'selected'; }?>>November</option>
                                            <option value="12" <?php if(date('m') == '12'){ echo 'selected'; }?>>Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-top:30px;">
                                    <button id="filterOvertime" type="button" class="btn btn-sm btn-dark font-medium mb-2 px-4">
                                        <i class="ti ti-search me-2 fs-4"></i> Filter
                                    </button>
                                    <button id="downloadOvertime" type="button" class="btn btn-sm btn-success font-medium mb-2 px-4">
                                        <i class="ti ti-download me-2 fs-4"></i> Download
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6" style="border-left: 1px solid black;">
                                <div class="ms-3">
                                    <h4 class="mb-0 fw-semibold">Peraturan</h4>
                                    <p>
                                        Jam Lembur dimulai 18:00 s/d 22.00
                                        <br>Berikut referensi dari kemnaker <a href="<?php echo $this->config->item('uploads_uri');?>lembur/lembur-kemnaker.pdf" target="_blank">KEP.102 /MEN/VI/2004</a>
                                    </p>
                                </div>
                                <div id="boxLembur" class="hidden">
                                    <div class="mt-2 py-1 d-flex align-items-center">
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-semibold">Uang Lembur</h6>
                                        </div>
                                        <div class="ms-auto nominal">
                                            <span id="uangLembur" class="fs-2">0</span>
                                        </div>
                                    </div>
                                    <div class="py-1 d-flex align-items-center">
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-semibold">Uang Makan</h6>
                                        </div>
                                        <div class="ms-auto nominal">
                                            <span id="uangMakan" class="fs-2">0</span>
                                        </div>
                                    </div>
                                    <div class="py-1 d-flex align-items-center">
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-semibold">Total</h6>
                                        </div>
                                        <div class="ms-auto nominal">
                                            <span id="totalUang" class="fs-2 fw-semibold">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="dataOvertime" class="mt-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane animated fadeIn <?php if(isset($_GET['tab']) && $_GET['tab'] == 'profile'){ echo 'show active'; }?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
            <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Profil <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 ms-2"><i class="ti ti-user-circle"></i></span>
            </h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card hover-img">
                    <div class="card-body p-4 border-bottom">
                        <h5 class="fs-4 fw-semibold mb-4">Contact Detail</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">NIK</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['nik']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Email</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Mulai Bekerja</label>
                                    <input name="txtTarget" type="date" class="form-control" value="<?php echo $drp[0]['joindate']; ?>"readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Telp</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['telp']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 border-bottom">
                        <h5 class="fs-4 fw-semibold mb-4">Nomor Induk Pemerintah</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">KTP</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['idcard']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Passport</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['passport']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">NPWP</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['npwp']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Expired</label>
                                    <input name="txtTarget" type="date" class="form-control" value="<?php echo $drp[0]['passportexp']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 border-bottom">
                        <h5 class="fs-4 fw-semibold mb-4">Personal Info</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Status Pernikahan</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['marital']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Gol. Darah</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['bloodtype']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Pendidikan</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['education']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Agama</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['religion']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Tempat Tanggal Lahir</label>
                                    <input name="txtTarget" type="date" class="form-control" value="<?php echo $drp[0]['dob']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Divisi</label>
                                    <input name="txtTarget" type="text" class="form-control" value="<?php echo $drp[0]['groupcode']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="fs-4 fw-semibold mb-4">Location</h5>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="txtTarget" class="control-label">Alamat</label>
                                    <textarea name="txtNotes" type="text" class="form-control" rows="10" readonly><?php echo $drp[0]['address']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                        <li class="position-relative">
                            <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                <i class="ti ti-brand-facebook"></i>
                            </a>
                        </li>
                        <li class="position-relative">
                            <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                <i class="ti ti-brand-instagram"></i>
                            </a>
                        </li>
                        <li class="position-relative">
                            <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                <i class="ti ti-brand-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- START DOB -->
<div id="modalAlertdob" class="modal fade">
    <canvas id="confeti" class="active" width="100%" height="100vh" style="display: none;position: absolute;z-index: -1;left: 0px;top: 0px;"></canvas>
    <div class="modal-dialog" style="margin: 100px auto;">
        <div class="modal-content">
            <div class="modal-body">
                <img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/giphy.gif'?>" class="img-responsive" style="display: block; margin-left: auto; margin-right: auto; width: 40%;">
                <?php if(count($dob) == 1){?>
                    <h1 class="text-center" style="color: #ff4757; -webkit-text-stroke-width: 0.5px; -webkit-text-stroke-color:#eccc68;"><?php echo $dob[0]['age'];?><sup><small style="color: #ff4757;">th</small></sup></h1>
                <?php } ?>
                <div class="swal-title" style="padding-top: 0">
                    Hi, today is a birthday !
                </div>

                <div class="prevyear" style="margin-top:20px">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">NIK</th>
                            <th class="text-center">NAME</th>
                            <th class="text-center">DOB</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dob as $row): ?>
                            <tr>
                                <td class="text-center"><?php echo $row['nik'];?></td>
                                <td class="text-center"><?php echo $row['name'];?></td>
                                <td class="text-center"><?php echo $row['pob'];?>, <?php echo date('d-m-Y', strtotime($row['dob']));?></td>
                                <?php if(count($dob) > 1){?>
                                    <td class="text-center"><?php echo $row['age'];?> th</td>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END DOB -->

<audio id="myAudio">
    <source src="<?php echo site_url() ?>public/assets/sound/tada_windows_xp.mp3" type="audio/ogg">
    <source src="<?php echo site_url() ?>public/assets/sound/tada_windows_xp.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<script>
	$(document).ready(function() {
		$('.selectpicker').select2();
		var sel = document.getElementById('jcuti');

        <?php if(count($dob) > 0 ){ ?>

		$("#modalAlertdob").modal("show");
		const note = document.querySelector('.modal-backdrop');
		note.style.opacity = '0.1';
		document.getElementById("confeti").style.display = "block";
		/*$.playSound('<?php echo site_url() ?>public/assets/sound/tada_windows_xp.mp3');*/
        <?php }?>

		var datesForDisable = <?php echo $disabledays?>;
		$('#jcuti').change(function(){
			if ($('#jcuti').val()=="fullday"){
				$('#jmlcuti').show();
			}else if ($('#jcuti').val()=="sick"){
				$('#jmlcuti').show();
			}else if ($('#jcuti').val()=="pray"){
				$('#jmlcuti').hide();
			}else if ($('#jcuti').val()=="givebirth"){
				$('#jmlcuti').hide();
			}
			//console.log($('#jcuti').val());
			var opt = sel.options[sel.selectedIndex];
			$('#vjcuti').val( opt.value );
		});

		$("#sdate_cuti").change(function(){
			/*$("#edate_cuti").val($("#sdate_cuti").val());*/
			//$("#cuti").val(1);
			var sdate = new Date($("#sdate_cuti").val());
			var edate = new Date($("#edate_cuti").val());
			if (sdate > edate){
				alert ('End Date tidak boleh lebih dulu');
				$("#edate_cuti").val($("#sdate_cuti").val());
				return false;
			}
			var timeDiff = Math.abs(edate.getTime() - sdate.getTime());
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24) + 1);
			var valEdate = $("#edate_cuti").val();
			if(valEdate == '') {
			}else {
				$("#jmlcuti").val(diffDays);
			}

			/* pecah value input */
			var splitsdate = $("#sdate_cuti").val().split('-');
			var splitedate = $("#edate_cuti").val().split('-');

			/* extract startdate sampai enddate */
			let startDate = new Date(splitsdate[0], splitsdate[1], splitsdate[2]);
			let endDate = new Date(splitedate[0], splitedate[1], splitedate[2]);
			let daysOffwork = [];
			for (let day = startDate;day <= endDate; day.setDate(day.getDate() + 1)) {
				var dat = new Date(day);
				daysOffwork.push(dat.yyyymmdd());
			}

			/* cek array cuti dengan array disabled dan count */
			var offwork = daysOffwork;
			var jumlahoffwork = arr_diff(offwork,datesForDisable);
			if(valEdate == '') {
			}else{
				$("#jmlcuti").val(jumlahoffwork.length);
			}
		});

		Date.prototype.yyyymmdd = function() {
			var mm = this.getMonth(); // getMonth() is zero-based
			var dd = this.getDate();

			return [this.getFullYear()+'-',
				(mm>9 ? '' : '0') + mm+'-',
				(dd>9 ? '' : '0') + dd
			].join('');
		};

		function arr_diff (a1, a2) {

			var a = [], diff = [];

			for (var i = 0; i < a1.length; i++) {
				a[a1[i]] = true;
			}

			for (var i = 0; i < a2.length; i++) {
				if (a[a2[i]]) {
					delete a[a2[i]];
				}
			}

			for (var k in a) {
				diff.push(k);
			}

			return diff;
		}

		$("#edate_cuti").change(function(){
			var sdate = new Date($("#sdate_cuti").val());
			var edate = new Date($("#edate_cuti").val());
			if (sdate > edate){
				alert ('End Date tidak boleh lebih dulu');
				$("#edate_cuti").val($("#sdate_cuti").val());
				return false;
			}
			var timeDiff = Math.abs(edate.getTime() - sdate.getTime());
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24) + 1);
			var valEdate = $("#edate_cuti").val();
			if(valEdate == '') {
			}else {
				$("#jmlcuti").val(diffDays);
			}

			/* pecah value input */
			var splitsdate = $("#sdate_cuti").val().split('-');
			var splitedate = $("#edate_cuti").val().split('-');

			/* extract startdate sampai enddate */
			let startDate = new Date(splitsdate[0], splitsdate[1], splitsdate[2]);
			let endDate = new Date(splitedate[0], splitedate[1], splitedate[2]);
			let daysOffwork = [];
			for (let day = startDate;day <= endDate; day.setDate(day.getDate() + 1)) {
				var dat = new Date(day);
				daysOffwork.push(dat.yyyymmdd());
			}

			/* cek array cuti dengan array disabled dan count */
			var offwork = daysOffwork;
			var jumlahoffwork = arr_diff(offwork,datesForDisable);
			if(valEdate == '') {
			}else{
				$("#jmlcuti").val(jumlahoffwork.length);
			}
		});

		$("#btnSubmitOffwork").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('offwork/ajaxoffwork'); ?>",
				data: $('#formoffwork').serialize(),
				success: function(data) {
					/* play sound */
					swal({
                        title: "Berhasil",
                        text: "Terima kasih, tunggu approval ya!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    }).then(function(){
						var link = '<?php echo site_url('attendances?tab=cuti')?>';
						window.location.href = link;
                    });
				}
			});
		});

		$("#filterOvertime").on("click", function () {
			$('#dataOvertime').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

            var bulan = $("#optBulan").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('attendances/dataovertime')?>",
                data: "optBulan="+bulan,
                success: function (data) {
                    var respon = JSON.parse(data);
                    if(respon['status'] == 'success'){
	                    setTimeout(function(){
		                    $("#downloadOvertime").removeClass("hidden");
		                    $("#dataOvertime").html(respon['view']);
	                    }, 300);
                    }else if(respon['status'] == 'emptydata'){
	                    setTimeout(function(){
		                    $("#downloadOvertime").addClass("hidden");
		                    $("#dataOvertime").html(respon['msg']);
		                    $("#uangLembur").html("0");
		                    $("#uangMakan").html("0");
		                    $("#totalUang").html("0");
	                    }, 300);
                    }else{
	                    $("#downloadOvertime").addClass("hidden");
	                    $("#dataOvertime").html('system not responding');
                    }
                }
            });
		});
		$("#filterOvertime").trigger("click");

		$("#downloadOvertime").on('click', function () {
			var bulan = $("#optBulan").val();

			var link = '<?php echo site_url('attendances/exportlembur?optBulan=')?>'+bulan;
			window.location.href = link;
		});

		$("#pills-presensi-tab").on('click', function () {
           var uriTab = '<?php echo @$_GET['tab']?>';
           if(uriTab != ''){
	           var link = '<?php echo site_url('attendances')?>';
	           window.location.href = link;
           }
		});
	});
</script>

<!-- js DOB -->
<script>
	var COLORS, Confetti, NUM_CONFETTI, PI_2, canvas, confetti, context, drawCircle, drawCircle2, drawCircle3, i, range, xpos;
	NUM_CONFETTI = 40;
	COLORS = [
		[235, 90, 70],
		[97, 189, 79],
		[242, 214, 0],
		[0, 121, 191],
		[195, 119, 224]
	];
	PI_2 = 2 * Math.PI;
	canvas = document.getElementById("confeti");
	context = canvas.getContext("2d");
	window.w = 0;
	window.h = 0;
	window.resizeWindow = function() {
		window.w = canvas.width = window.innerWidth;
		return window.h = canvas.height = window.innerHeight;
	};
	window.addEventListener("resize", resizeWindow, !1);
	window.onload = function() {
		return setTimeout(resizeWindow, 0);
	};
	range = function(a, b) {
		return (b - a) * Math.random() + a;
	};
	drawCircle = function(a, b, c, d) {
		context.beginPath();
		context.moveTo(a, b);
		context.bezierCurveTo(a - 17, b + 14, a + 13, b + 5, a - 5, b + 22);
		context.lineWidth = 2;
		context.strokeStyle = d;
		return context.stroke();
	};
	drawCircle2 = function(a, b, c, d) {
		context.beginPath();
		context.moveTo(a, b);
		context.lineTo(a + 6, b + 9);
		context.lineTo(a + 12, b);
		context.lineTo(a + 6, b - 9);
		context.closePath();
		context.fillStyle = d;
		return context.fill();
	};
	drawCircle3 = function(a, b, c, d) {
		context.beginPath();
		context.moveTo(a, b);
		context.lineTo(a + 5, b + 5);
		context.lineTo(a + 10, b);
		context.lineTo(a + 5, b - 5);
		context.closePath();
		context.fillStyle = d;
		return context.fill();
	};
	xpos = 0.9;
	document.onmousemove = function(a) {
		return xpos = a.pageX / w;
	};
	window.requestAnimationFrame = function() {
		return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(a) {
			return window.setTimeout(a, 5);
		};
	}();
	Confetti = function() {
		function a() {
			this.style = COLORS[~~range(0, 5)];
			this.rgb = "rgba(" + this.style[0] + "," + this.style[1] + "," + this.style[2];
			this.r = ~~range(2, 6);
			this.r2 = 2 * this.r;
			this.replace();
		}
		a.prototype.replace = function() {
			this.opacity = 0;
			this.dop = 0.03 * range(1, 4);
			this.x = range(-this.r2, w - this.r2);
			this.y = range(-20, h - this.r2);
			this.xmax = w - this.r;
			this.ymax = h - this.r;
			this.vx = range(0, 2) + 8 * xpos - 5;
			return this.vy = 0.7 * this.r + range(-1, 1);
		};
		a.prototype.draw = function() {
			var a;
			this.x += this.vx;
			this.y += this.vy;
			this.opacity +=
					this.dop;
			1 < this.opacity && (this.opacity = 1, this.dop *= -1);
			(0 > this.opacity || this.y > this.ymax) && this.replace();
			if (!(0 < (a = this.x) && a < this.xmax)) this.x = (this.x + this.xmax) % this.xmax;
			drawCircle(~~this.x, ~~this.y, this.r, this.rgb + "," + this.opacity + ")");
			drawCircle3(0.5 * ~~this.x, ~~this.y, this.r, this.rgb + "," + this.opacity + ")");
			return drawCircle2(1.5 * ~~this.x, 1.5 * ~~this.y, this.r, this.rgb + "," + this.opacity + ")");
		};
		return a;
	}();
	confetti = function() {
		var a, b, c;
		c = [];
		i = a = 1;
		for (b = NUM_CONFETTI; 1 <= b ? a <= b : a >= b; i = 1 <= b ? ++a : --a) c.push(new Confetti);
		return c;
	}();
	window.step = function() {
		var a, b, c, d;
		requestAnimationFrame(step);
		context.clearRect(0, 0, w, h);
		d = [];
		b = 0;
		for (c = confetti.length; b < c; b++) a = confetti[b], d.push(a.draw());
		return d;
	};
	step();

</script>