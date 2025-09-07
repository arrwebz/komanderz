<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
	<thead>
	<tr>
		<th>No</th>
		<th>Bank</th>
		<th>Atas Nama</th>
		<th>Nomor Rekening</th>
		<th class="disabled-sorting text-right"></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th>No</th>
		<th>Bank</th>
		<th>Atas Nama</th>
		<th>Nomor Rekening</th>
		<th class="disabled-sorting text-right"></th>
	</tr>
	</tfoot>
	<tbody>
	<?php $i = 0; ?>
	<?php foreach ( $drd as $row ) { ?>
		<?php $i++; ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['bankname'];?></td>
			<td><?php echo $row['accname'];?></td>
			<td><?php echo $row['accnum'];?></td>
			<td class="text-right">
				<?php $sess = $this->session->userdata();?>
				<?php if($sess['role'] == 1): ?>
					<a href="javascript:" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row" data-id="<?php echo $row['bankid'];?>">
                        <i class="fs-4 ti ti-edit text-warning"></i>
					</a>
					<button type="button" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center delete-row" data-id="<?php echo $row['bankid'];?>">
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
		'autoWidth'   : true
	});
</script>