<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Number Packlaring</th>
        <th>Name</th>
        <th>Place, Date of birth</th>
        <th>Address</th>
        <th>Start/End Date</th>
        <th>Notes</th>
        <th class="disabled-sorting text-right"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>No</th>
        <th>Number Packlaring</th>
        <th>Name</th>
        <th>Place, Date of birth</th>
        <th>Address</th>
        <th>Start/End Date</th>
        <th>Notes</th>
        <th class="disabled-sorting text-right"></th>
    </tr>
    </tfoot>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++; ?>
        <tr>
            <td class="text-center"><?php echo $i; ?></td>
            <td style="text-transform: uppercase;">
                <!--<a class="cetak-row" href="javascript:" style="color: #00bcd4;" data-id="<?php /*echo $row['packlaringid'];*/?>">-->
                <strong><?php echo $row['code'];?></strong>
                <!--</a>-->
                <!--<a class="btn btn-xs btn-default cetak-row" data-id="<?php /*echo $row['packlaringid']; */?>"><i class="fa fa-external-link-square"></i></a>-->
            </td>
            <td><strong><?php echo $row['name'];?></strong></td>
            <td><?php echo $row['pob'];?>, <?php echo onlydate($row['dob']);?></td>
            <td><?php echo $row['address'];?></td>
            <td>
                <?php echo onlydate($row['start_work']);?>
                <div>s/d</div>
                <?php echo onlydate($row['end_work']);?>
            </td>
            <td><?php echo $row['notes'];?></td>
            <td class="text-right">
                <?php $sess = $this->session->userdata();?>
                <a href="javascript:" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row" data-id="<?php echo $row['packlaringid'];?>">
                    <i class="fs-4 ti ti-edit text-warning"></i>
                </a>
                <a href="<?php echo site_url($this->router->fetch_class().'/preview/'.$row['packlaringid']);?>" target="_blank" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-id="<?php echo $row['packlaringid'];?>">
                    <i class="ti ti-printer"> Print</i>
                </a>
                <a href="javascript:" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center upload-row" data-id="<?php echo $row['packlaringid'];?>">
                    <i class="ti ti-upload"> Upload</i>
                </a>
                <?php if($row['file'] != ''){ ?>
                    <a href="<?php echo $this->config->item('uploads_uri').'packlaring/'.$row['pkgnum'].'/'.$row['file'];?>" target="_blank" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-id="<?php echo $row['packlaringid'];?>">
                        <i class="ti ti-eye"> Preview Upload</i>
                    </a>
                <?php } ?>
                <!--<button type="button" class="btn btn-xs btn-default delete-row" data-id="<?php /*echo $row['packlaringid'];*/?>">
                        <i class="fa fa-trash-o"> Hapus</i>
                    </button>-->
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