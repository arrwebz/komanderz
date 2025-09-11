<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Collection</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('knopes');?>">Mapping Invoice to SPB</a>
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
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Order Type</label>
                            <select id="filterYear">
                                <?php for ($y = date('Y'); $y >= 2020; $y--): ?>
                                <option value="<?= $y ?>"><?= $y ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="optSegment" class="form-label fw-semibold">Customers</label>
                            <select id="filterOrderType">
                            <option value="">All Types</option>
                            <option value="PRPO">PANJAR</option>
                            <option value="OBL">OBL</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" name="cmdsave" id="btnExport" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i> Excel
                </div>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">List of invoices</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>SPB Number</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($invoices as $inv): ?>
                                <?php 
                                    $countSpb = max(1, count($inv['spbs']));
                                    $firstSpb = array_shift($inv['spbs']);
                                ?>
                                <tr>
                                    <td rowspan="<?= $countSpb ?>"><?= $no++ ?></td>
                                    <td rowspan="<?= $countSpb ?>"><?= htmlspecialchars($inv['inv_number']) ?></td>
                                    <?php if ($firstSpb): ?>
                                    <td><?= htmlspecialchars($firstSpb['spb_number']) ?></td>
                                    <td style="text-align:right"><?= number_format($firstSpb['spb_value'], 2, ',', '.') ?></td>
                                    <td><?= $firstSpb['spbdat'] ?></td>
                                    <?php else: ?>
                                    <td colspan="3" style="text-align:center">– No SPB –</td>
                                    <?php endif; ?>
                                </tr>

                                <?php foreach ($inv['spbs'] as $spb): ?>
                                <tr>
                                    <td><?= htmlspecialchars($spb['spb_number']) ?></td>
                                    <td style="text-align:right"><?= number_format($spb['spb_value'], 2, ',', '.') ?></td>
                                    <td><?= $spb['spbdat'] ?></td>
                                </tr>
                                <?php endforeach; ?>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true

		});
		$('.selectpicker').select2();
	});



</script>