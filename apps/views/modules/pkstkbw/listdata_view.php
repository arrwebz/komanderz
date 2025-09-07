<div class="material-datatables">
    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Number PKS TKBW</th>
            <th>Name</th>
            <th>Segmen</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Number PKS TKBW</th>
            <th>Name</th>
            <th>Segmen</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 0; ?>
        <?php foreach ( $drd as $row ) { ?>
            <?php $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td style="text-transform: uppercase;">
                    <strong><?php echo $row['code'];?></strong>
                </td>
                <td><strong><?php echo $row['name'];?></strong></td>
                <td><?php echo $row['segmen'];?></td>
                <td class="text-right">
                    <?php $sess = $this->session->userdata();?>
                        <a href="javascript:" class="btn btn-xs btn-default edit-row" data-id="<?php echo $row['pkstkbwid'];?>">
                            <i class="fa fa-edit"> Ubah</i>
                        </a>
                        <a href="<?php echo site_url($this->router->fetch_class().'/toword/'.$row['pkstkbwid']);?>" target="_blank" class="btn btn-xs btn-default" data-id="<?php echo $row['pkstkbwid'];?>">
                            <i class="fa fa-file-pdf-o"> Print</i>
                        </a>
                        <!--<a href="javascript:" class="btn btn-xs btn-default upload-row" data-id="<?php /*echo $row['pkstkbwid'];*/?>">
                            <i class="fa fa-upload"> Upload</i>
                        </a>-->
                </td>
            </tr>
        <?php }	?>
        </tbody>
    </table>
</div>

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