<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Membership</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('tbudgetsp');?>">Budget SP</a>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <?php $nav = array('1','2','3','4','5'); ?>
                    <?php if(in_array($role, $nav)) { ?>
                        <p>
                            <a href="<?php echo base_url().$this->router->fetch_class().'/addnewbudget'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                        </p>
                    <?php } ?>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Budget</th>
                                    <th>Jumlah SPB</th>
                                    <th>Tanggal</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Budget</th>
                                    <th>Jumlah SPB</th>
                                    <th>Tanggal</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $drd as $row ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/todaybudget/'.$row['budgetspid']; ?>" style="color: #00bcd4;"><strong>CF<?php echo '/'.$row['budgetspid'].'/'.date('dmY', strtotime($row['budgetspdate'])) ?></strong></a>
                                        <td style="text-transform: uppercase;"><?php echo count(explode(';',$row['spbspid']));  ?></td>
                                        <td><?php echo date('d M Y', strtotime($row['budgetspdate']));?>
                                            <?php if(date('Y-m-d', strtotime($row['budgetspdate'])) == date("Y-m-d")) { ?>
                                                <sup style="color:#d73925;"><i class="ti"></i> new</sup>
                                            <?php } else { ?>
                                                <sup style="color:#d73925;"></sup>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                        </td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        <?php } else { echo 'Belum ada Anggaran hari ini!'; }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	$(function() {
		$('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollX': true,
		});

		$('.selectpicker').select2();
	});
</script>