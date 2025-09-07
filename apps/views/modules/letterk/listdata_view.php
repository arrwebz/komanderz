<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Type</th>
        <th>Divisi</th>
        <th>Unit</th>
        <th>Month</th>
        <th>Year</th>
        <th>Div Komet</th>
        <th class="disabled-sorting text-right"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Type</th>
        <th>Divisi</th>
        <th>Unit</th>
        <th>Month</th>
        <th>Year</th>
        <th>Div Komet</th>
        <th class="text-right"></th>
    </tr>
    </tfoot>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++; ?>
        <tr>
            <td class="text-center"><?php echo $i; ?></td>
            <td style="text-transform: uppercase;">
                <a class="cetak-row" href="javascript:" style="color: #00bcd4;" data-id="<?php echo $row['letterkontrakid'];?>">
                    <strong><?php echo $row['code'];?></strong>
                </a>
                <a class="btn mb-1 btn-primary btn-circle btn-sm d-inline-flex align-items-center justify-content-center cetak-row" data-id="<?php echo $row['letterkontrakid']; ?>">
                    <i class="ti ti-external-link"></i>
                </a>
            </td>
            <td><?php echo $row['type'];?></td>
            <td><?php echo $row['divisi'];?></td>
            <td><?php echo $row['unit'];?></td>
            <td><?php echo $row['month'];?></td>
            <td><?php echo $row['year'];?></td>
            <td><?php echo $row['divkomet'];?></td>
            <td class="text-right">
                <?php $sess = $this->session->userdata();?>
                <?php if($sess['role'] == 1): ?>
                    <!--<a href="javascript:" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row" data-id="<?php /*echo $row['letterkontrakid'];*/?>">
                        <i class="fs-4 ti ti-edit text-warning"></i>
                    </a>-->
                    <button type="button" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center delete-row" data-id="<?php echo $row['letterkontrakid'];?>">
                        <i class="fs-4 ti ti-trash text-danger"></i>
                    </button>
                <?php endif; ?>
            </td>
        </tr>
    <?php }	?>
    </tbody>
</table>

<script>
	var table = $('#datatables').DataTable({
		'responsive'  : true,
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : true,
		'autoWidth'   : true,
		'scrollX': true,
	});
</script>