<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Kehadiran Karyawan Komet <?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?> WIB</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#e10b15">
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

    <meta name="title" content="Laporan Kehadiran Karyawan Komet <?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?> WIB">
    <meta name="description" content="WFO, Izin, Sehat, Sakit, Sudah Abse, Belum Absen, Tanpa Keterangan">
    <meta name="image_src" content="<?php echo base_url().'public/assets/dist/img/logo-komet.png';?>">

    <meta property="og:type" content="profile">
    <meta property="og:url" content="<?php echo site_url('quickreport/atdnce');?>">
    <meta property="og:image" content="<?php echo base_url().'public/assets/dist/img/logo-komet.png';?>">
    <meta property="og:image:width" content="620">
    <meta property="og:image:height" content="413">
    <meta property="og:title" content="Laporan Kehadiran Karyawan Komet <?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?> WIB">
    <meta property="og:description" content="WFO, Izin, Sehat, Sakit, Sudah Abse, Belum Absen, Tanpa Keterangan, Cuti">
    <meta property="og:site_name" content="KOperasi METropolitan">

    <?php $this->carabiner->display('css_head');?>
    <?php $this->carabiner->display('js_head');?>
    <style>
        .lockscreen{background: #d2d6de;}
        .border-right{
            border-right: 1px solid #f4f4f4;
        }
        .border-left{
            border-left: 1px solid #f4f4f4;
        }
        .border-bottom{
            border-bottom: 1px solid #f4f4f4;
        }
        .border-top{
            border-top: 1px solid #f4f4f4;
        }
        .mt-20{
            margin-top: 20px!important;
        }
        .content{
            position: relative;
            background: #fff;
            border: 1px solid #f4f4f4;
            padding: 20px;
            margin: 10px 25px;
        }
        .gutter{
            --bs-gutter-x:0px !important;
        }
        .description-block{display: block;margin: 10px 0;text-align: center;}

    </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div style="max-width: 80%;margin: 0 auto; margin-top: 5%;">
    <section class="content">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="ti ti-world"></i> KOMANDERS
                    <small class="pull-right"><?php echo $datenow; ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row gutter">
            <div class="row col-sm-12 gutter">
                <p id="copytext">Laporan Kondisi Kehadiran & Kesehatan Karyawan Komet <br/>
                    <?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?><br/>
                </p>
                <div class="row clearfix border-top gutter">
                    <div class="col-sm-3 border-right border-left">
                        <div class="description-block">
                            <span class="description-text">WFO</span>
                            <h5 class="description-header"><?php if(isset($status[1])){ echo $status[1]; }else{ echo '0';} ?></h5>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <span class="description-text">Izin</span>
                            <h5 class="description-header"><?php if(isset($status[3])){ echo $status[3]; }else{ echo '0';} ?></h5>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <span class="description-text">Sehat</span>
                            <h5 class="description-header"><?php if(isset($health[1])){ echo $health[1]; }else{ echo '0';} ?></h5>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <span class="description-text">Sakit</span>
                            <h5 class="description-header"><?php if(isset($health[2])){echo $health[2];}else{echo '0';} ?></h5>
                        </div>
                    </div>
                </div>
                <div id="boxAbsen" class="row clearfix border-top border-bottom gutter">
                    <div class="col-sm-3 border-right border-left">
                        <div class="description-block">
                            <span class="description-text">Sudah Absen</span>
                            <h5 class="description-header"><?php echo $totalabsen; ?></h5>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right ">
                        <div class="description-block">
                            <span class="description-text">Belum Absen</span>
                            <h5 class="description-header"><?php echo $totalba;?></h5>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <span class="description-text">Tanpa Keterangan</span>
                            <h5 class="description-header"><?php echo $tanpaket;?></h5>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <span class="description-text">Cuti</span>
                            <h5 class="description-header"><?php echo $totalcuti;?></h5>
                        </div>
                    </div>
                </div>
                <div class="mt-20 clearfix row gutter">
                    <div id="btnShare" class="col-sm-12"></div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row mt-20 clearfix">
            <div class="table-responsive pb-9">
                <h4>Daftar Hadir</h4>
                <?php if (count ( $drd ) > 0) { ?>
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Clockin</th>
                            <th>Nama</th>
                            <th>Kehadiran</th>
                            <th>Kesehatan</th>
                            <th>Ket</th>
                            <th>Lokasi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Clockin</th>
                            <th>Nama</th>
                            <th>Kehadiran</th>
                            <th>Kesehatan</th>
                            <th>Ket</th>
                            <th>Lokasi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ( $drd as $row ) { ?>
                            <?php $i++; ?>
                            <tr>
                                <td><?php echo date('H:i',strtotime($row['datetime'])); ?></td>
                                <?php if($row['health'] == '1'){ ?>
                                    <td><?php echo $row['nik'] ?><br/><a href="#" style="color: green;"><?php echo $row['fullname'] ?></a></td>
                                <?php } elseif($row['health'] == '2') { ?>
                                    <td><?php echo $row['nik'] ?><br/><a href="#" style="color: red;"><?php echo $row['fullname'] ?></a></td>
                                <?php } else { ?>
                                    <td><?php echo $row['nik'] ?><br/><a href="#" style="color: black;"><?php echo $row['fullname'] ?></a></td>
                                <?php } ?>
                                <td><?php if($row['status'] == '1'){ ?>
                                        <span class="badge bg-primary">WFO</span>
                                    <?php } elseif($row['status'] == '2') { ?>
                                        <span class="badge">Pulang</span>
                                    <?php } elseif($row['status'] == '3') { ?>
                                        <span class="badge bg-info">Izin</span>
                                    <?php } elseif($row['status'] == '4') { ?>
                                        <span class="badge bg-warning">Izin</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger">Tanpa Keterangan</span>
                                    <?php } ?>
                                </td>
                                <td><?php if($row['health'] == '1'){ ?>
                                        <span class="badge bg-success">Sehat</span>
                                    <?php } elseif($row['health'] == '2') { ?>
                                        <span class="badge bg-danger">Sakit</span>
                                    <?php } else { ?>
                                        <span class="badge"> - </span>
                                    <?php } ?>
                                </td>
                                <td> : <?php echo $row['notes'] ?></td>
                                <?php if($row['latitude'] == 0 && $row['longitude'] == 0 ) { ?>
                                    <td> : <i>Mohon izinkan akses lokasi.</i></td>
                                <?php } else { ?>
                                    <td> : buka di <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $row['latitude'] ?>,<?php echo $row['longitude'] ?>">Google Map</td>
                                <?php } ?>
                            </tr>
                        <?php }	?>
                        </tbody>
                    </table>

                    <h4>Daftar Cuti</h4>
                    <table id="datatables" class="table table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ( $cuti as $row ) { ?>
                            <?php $i++; ?>
                            <tr>
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['offstatus'] ?></td>
                                <td><?php echo $row['offnotes'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['sdate'])); ?>
                                    <br>s/d<br>
                                    <?php echo date('d-m-Y', strtotime($row['edate'])); ?></td>
                            </tr>
                        <?php }	?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <div class="lockscreen-footer text-center">
        Copyright &copy; <?php echo date('Y');?><b><a href="#" class="text-black"> Koperasi Metropolitan</a></b><br>
        All rights reserved
    </div>
</div>
<!-- /.center -->
<?php $this->carabiner->display('js_content');?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatables').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'responsive'  : true
			// {
			// 'details' : {
			// 'display' : $.fn.dataTable.Responsive.display.childRowImmediate,
			// 'type'    : 'none',
			// 'target'  : ''
			// }
			// }
		});

        <?php if($totalba <= 10): ?>
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('quickreport/ajax_belum_absen');?>",
			data: '',
			success: function (data) {
				$('#boxAbsen').after(data);
			}
		});
        <?php endif; ?>
	});
	
	if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
		var textWa = 'Laporan Kondisi Kehadiran Dan Kesehatan Karyawan Komet %0A<?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?> %0A%0AWFO / Izin / Sehat / Sakit / Sdh Absen / Blm Absen  / Cuti %0A<?php if(isset($status[1])){ echo $status[1]; }else{ echo '0';} ?> / <?php if(isset($status[3])){ echo $status[3]; }else{ echo '0';} ?> / <?php if(isset($health[1])){ echo $health[1]; }else{ echo '0';} ?> / <?php if(isset($health[2])){echo $health[2];}else{echo '0';} ?> / <?php echo $totalabsen; ?> / <?php echo $totalba;?>  / <?php echo $totalcuti;?> %0A%0ADetail : https://kms.kopegtel-metropolitan.co.id/quickreport/atdnce %0A%0A*Komanders*';
		$('#btnShare').html('<a class="btn btn-block btn-social btn-success w-100" href="whatsapp://send?text='+ textWa +'"><i class="ti ti-brand-whatsapp"></i> Share via Whatsapp Mobile</a>');
	}else{
		var textWa = 'Laporan Kondisi Kehadiran Dan Kesehatan Karyawan Komet %0A<?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?> %0A%0AWFO / Izin / Sehat / Sakit / Sdh Absen / Blm Absen  / Cuti %0A<?php if(isset($status[1])){ echo $status[1]; }else{ echo '0';} ?> / <?php if(isset($status[3])){ echo $status[3]; }else{ echo '0';} ?> / <?php if(isset($health[1])){ echo $health[1]; }else{ echo '0';} ?> / <?php if(isset($health[2])){echo $health[2];}else{echo '0';} ?> / <?php echo $totalabsen; ?> / <?php echo $totalba;?>  / <?php echo $totalcuti;?> %0A%0ADetail : https://kms.kopegtel-metropolitan.co.id/quickreport/atdnce %0A%0A*Komanders*';
		$('#btnShare').html('<a class="btn btn-block btn-social btn-success w-100" target="_blank" href="https://web.whatsapp.com/send?text='+ textWa +'" data-action="share/whatsapp/share"><i class="ti ti-brand-whatsapp"></i> Share via Whatsapp web</a>');
	}
</script>
</body>
</html>