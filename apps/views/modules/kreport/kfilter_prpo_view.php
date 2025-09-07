<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small><?php echo $brand; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Hasil Filter Laporan</a></li>
        <li class="active">PRPO KOMET</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		  <div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-info"></i> Penting!</h4>
			Di bawah ini merupakan daftar PRPO KOMET berdasarkan filter data. Klik tombol Expor Excel untuk mengunduh data ke format Excel. 
		  </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Hasil Filter PRPO KOMET.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="material-datatables">
				<?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Invoice</th>
                                <th>Faktur</th> 
                                <th>Segmen</th>
                                <th>Nilai Dasar</th>
                                <th>Status</th>
                                <th>SPB</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Invoice</th>
                                <th>Faktur</th> 
                                <th>Segmen</th>
                                <th>Nilai Dasar</th>
                                <th>Status</th>
                                <th>SPB</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drd as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td style="text-transform: uppercase;"><a target='_blank' href="<?php echo base_url().'knopes/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><?php echo $row['code'] ?></a></td>
                                    <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                                    <td><?php echo $row['faknum'] ?></td>
                                    <td><?php echo $row['segment'] ?></td>
                                    <td>Rp. <?php if($row['invnum'] == 0) { echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3)));} else { echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3)));}?></td> 
									<td><?php if($row['status'] == '0') echo '<i style="color:red;">Belum Cair</i>'; elseif($row['status'] == '1') echo '<span style="color:green;">Sudah Cair</span>';  ?></td>
									<td><?php if($row['spbid'] == '0') echo '<i style="color:grey;">Belum SPB</i>'; elseif($row['spbid'] != '0') echo '<span style="color:blue;">Sudah SPB</span>';  ?></td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } else { echo 'Data tidak ditemukan!'; }?>
                </div>
            </div>
            <!-- /.box-body -->
			<div class="box-footer">
					<a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
				<?php echo form_open('kreportprpo/exportfilter');?>
					<?php echo form_hidden('hdnDivision',$division); ?>
					<?php echo form_hidden('hdnSegment',$segment); ?>
					<?php echo form_hidden('hdnSPB',$spb); ?>
					<?php echo form_hidden('hdnStatinv',$inv); ?>
					<?php echo form_hidden('hdnFdate',$fdat); ?>
					<?php echo form_hidden('hdnEdate',$edat); ?>
					<button type="submit" name="btnSubmit" class="btn btn-sm btn-success pull-right">
					<i class="fa fa-download"></i> Excel</button>
				<?php echo form_close();?>
			</div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function() {
       $('#datatables').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'responsive'  : true
		});
		
	$('.selectpicker').select2();
	
    });
	
</script>