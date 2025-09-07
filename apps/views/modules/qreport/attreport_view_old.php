<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/png" href="<?php echo $this->config->item('images_uri')?>favicon.png" />
	<?php $this->carabiner->display('css_head');?>
	<?php $this->carabiner->display('js_head');?>
	
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div style="max-width: 512px;margin: 0 auto;margin-top: 10%;">
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> KOMANDERS
            <small class="pull-right"><?php echo $datenow; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <p id="copytext">Laporan Kondisi Kehadiran & Kesehatan Karyawan Komet <br/>
			  <?php echo $datenow; ?> Pukul <?php echo date( 'H:i', strtotime(date('Y-m-d H:i'))); ?><br/>
			  WFO / WFH / Sehat / Sakit / Sdh Absen / Blm Absen  / Tanpa Ket <br/>
			  <?php echo $status[1]; ?> / <?php echo $status[3]; ?> / <?php echo $health[1]; ?> / <?php if(isset($health[2])){echo $health[2];}else{echo '0';} ?> / <?php echo $totalabsen; ?> / <?php echo $totalba;?>  / 0 <br/>
			  Telat : Nihil 
			  </p> 
			Detail : <a href="https://kms.kopegtel-metropolitan.co.id/quickreport/atdnce">https://kms.kopegtel-metropolitan.co.id/quickreport/atdnce</a>  
			<br/>
			<br/>
			*Komanders*
			<br/> 
			<hr/> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="material-datatables">
				
				<?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
											<span class="badge bg-maroon">WFO</span>
										<?php } elseif($row['status'] == '2') { ?>
											<span class="badge">Pulang</span>
										<?php } elseif($row['status'] == '3') { ?>
											<span class="badge bg-purple">WFH</span>
										<?php } elseif($row['status'] == '4') { ?>
											<span class="badge bg-yellow">Izin</span>
										<?php } else { ?>
											<span class="badge bg-red">Tanpa Keterangan</span>
										<?php } ?>
									</td>
									<td><?php if($row['health'] == '1'){ ?>
											<span class="badge bg-green">Sehat</span>
										<?php } elseif($row['health'] == '2') { ?>
											<span class="badge bg-red">Sakit</span>
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
                    <?php } ?>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2021<b><a href="#" class="text-black"> Koperasi Metropolitan</a></b><br>
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
    });
</script>
</body>
</html>
