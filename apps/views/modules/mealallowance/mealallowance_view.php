<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Directory</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('mealallowance');?>">MealMoney Report</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Rocket.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="card card-hover">
        <div class="card-header">
            <h4 class="mb-0 text-dark fs-5">Search</h4>
        </div>
        <form action="<?php echo site_url($this->router->fetch_class().'/search');?>" method="GET">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Start Date</label>
                            <input type="date" name="txtStartdate" class="form-control" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">End Date</label>
                            <input type="date" name="txtEnddate" class="form-control" autocomplete="off"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-12">
                    <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-send me-2 fs-4"></i> Submit
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Daftar hadir karyawan Minggu ini</h4>
                </div>
                <div class="card-body collapse show">
                    <h2><?php echo $datenow; ?></h2>
                    <?php echo form_open('mealallowance/export');?>
                    <?php echo form_hidden('hdnSdate', $filter['sdate']); ?>
                    <?php echo form_hidden('hdnEdate', $filter['edate']); ?>
                    <button type="submit" name="btnSubmit" class="btn btn-sm btn-success pull-right">
                        <i class="ti ti-download"></i> Excel
                    </button>
                    <?php echo form_close();?>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
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
                                $uang_makan = 17500;
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
            </div>
        </div>
    </div>
</section>

<script>
	$(function() {
		$('.selectpicker').select2();

		var table = $('#datatables').DataTable({
			'responsive'  : false,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollX': true,
		});
	});

</script>