<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('mealallowance');?>">Laporan Uang Makan</a></li>
            <li class="active">Hasil Filter</li>
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
                        <h3 class="box-title">Hasil Filter : <strong><?php echo $filter['sdate'].' s/d '.$filter['edate'];?></strong></h3>
                    </div>
                    <div class="box-body">
                        <div class="material-datatables table-responsive">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle">No</th>
                                        <th rowspan="2" style="vertical-align: middle">Nama</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">WFO</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">WFH</th>
                                        <th rowspan="2" class="text-right" style="vertical-align: middle" width="15%">Total Uang Makan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 1;
                                    $uang_makan = 20000;
                                    $sum_total = 0;
                                    foreach($drd as $row){
                                        $sum_total += $uang_makan*$row['wfo'];
                                        ?>
                                        <tr>
                                            <td><?php echo $num++;?></td>
                                            <td><?php echo $row['fullname'];?></td>
                                            <td class="text-center"><?php echo $row['wfo'];?></td>
                                            <td class="text-center"><?php echo $row['wfh'];?></td>
                                            <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($uang_makan*$row['wfo'])),3)));?></td>
                                        </tr>
                                    <?php } ?>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Total</strong></td>
                                            <td class="text-right">
                                                <strong><?php echo strrev(implode('.',str_split(strrev(strval($sum_total)),3)));?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                        <?php echo form_open('mealallowance/export');?>
                        <?php echo form_hidden('hdnSdate', $filter['sdate']); ?>
                        <?php echo form_hidden('hdnEdate', $filter['edate']); ?>
                        <button type="submit" name="btnSubmit" class="btn btn-sm btn-success pull-right">
                            <i class="fa fa-download"></i> Excel</button>
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