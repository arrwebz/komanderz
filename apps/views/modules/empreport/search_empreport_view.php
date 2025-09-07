<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('empreport');?>">Laporan Absensi</a></li>
            <li class="active">Hasil Filter Laporan</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Penting!</h4>
                    Di bawah ini merupakan daftar Kehadiran berdasarkan filter data. Klik tombol Expor Excel untuk mengunduh data ke format Excel.
                </div>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hasil Filter : <strong><?php echo getIndMonth($month).' '.$year;?></strong></h3>
                    </div>
                    <div class="box-body">
                        <div class="material-datatables table-responsive">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle">No</th>
                                        <th rowspan="2" style="vertical-align: middle">Nama</th>

                                        <?php for($i=1; $i<=$totalday; $i++){ ?>
                                            <th colspan="4" class="text-center"><?php echo $i.'/'.$month;?></th>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <?php for($i=1; $i<=$totalday; $i++){ ?>
                                            <th>IN</th>
                                            <th>LOCATION</th>
                                            <th>NOTES</th>
                                            <th>OUT</th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $num = 1; foreach($drd as $row){ ?>
                                        <tr>
                                            <td><?php echo $num++;?></td>
                                            <td><?php echo $row['username'];?></td>

                                            <?php for($i=1; $i<=$totalday; $i++){ ?>
                                                <?php $datenow = $year.'-'.$month.'-'.$i;?>

                                                <!-- get cuti -->
                                                <?php $offwork = $this->repmd->offworkuser($row['userid'], $datenow); ?>

                                                <!-- get off day -->
                                                <?php $offday = $this->repmd->offday($datenow); ?>

                                                <?php if(date('l', strtotime($datenow)) == 'Saturday' || date('l', strtotime($datenow)) == 'Sunday' ){ ?>
                                                    <td colspan="4" class="bg-danger text-center">
                                                        Weekend
                                                    </td>
                                                <?php }elseif(count($offday) > 0){ ?>
                                                    <td colspan="4" class="bg-danger text-center">
                                                        <?php echo $offday[0]['name'];?>
                                                    </td>
                                                <?php }elseif(count($offwork) > 0){?>
                                                    <td colspan="4" class="text-center">
                                                        <?php echo 'Cuti - '.ucfirst($offwork[0]['offstatus']).'<br>'.$offwork[0]['offnotes'];?>
                                                    </td>
                                                <?php }else{ ?>
                                                    <td>
                                                        <?php
                                                        if(!empty($row[$i.'_in'])){
                                                            $batas = "08:15";
                                                            if($row[$i.'_statuswork'] == '3'){
                                                                echo '<span class="text-blue">'.date('H:i', strtotime($row[$i.'_in'])).'</span>';
                                                            }else{
                                                                if(date('H:i', strtotime($row[$i.'_in'])) > $batas){
                                                                    echo '<span class="text-red">'.date('H:i', strtotime($row[$i.'_in'])).'</span>';
                                                                }else{
                                                                    echo date('H:i', strtotime($row[$i.'_in']));
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                    <?php if(!empty($row[$i.'_in_latitude'])){ ?>
                                                        <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $row[$i.'_in_latitude'];?>,<?php echo $row[$i.'_in_longitude'];?>">Buka Google Map</a></td>
                                                    <?php } ?>
                                                    <td><?php if(!empty($row[$i.'_in_notes'])){ echo $row[$i.'_in_notes']; }?></td>
                                                    <td><?php if(!empty($row[$i.'_out'])){ echo date('H:i', strtotime($row[$i.'_out'])); }?></td>
                                                <?php } ?>

                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                        <?php echo form_open('empreport/export');?>
                        <?php echo form_hidden('hdnMonth', $month); ?>
                        <?php echo form_hidden('hdnYear', $year); ?>
                        <button type="submit" name="btnSubmit" class="btn btn-sm btn-success pull-right">
                            <i class="fa fa-download"></i> Excel</button>
                        <?php echo form_close();?>

                        <?php echo form_open('empreport/exportactionplan');?>
                        <?php echo form_hidden('hdnMonth', $month); ?>
                        <?php echo form_hidden('hdnYear', $year); ?>
                        <button type="submit" name="btnSubmit" class="btn btn-sm btn-success pull-right">
                            <i class="fa fa-download"></i> Excel Rencana Kegiatan</button>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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