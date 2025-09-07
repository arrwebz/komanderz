<div class="material-datatables">
    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
        <tr>
            <th>No</th>
            <th>PO Number</th>
            <th>Unit</th>
            <th class="text-right">Total</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>PO Number</th>
            <th>Unit</th>
            <th class="text-right">Total</th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 0;?>
        <?php foreach ( $drd as $row ) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td style="text-transform: uppercase;">
                    <a href="javascript:" class="detail-spb" style="color: #00bcd4;" data-id="<?php echo $row['id_ppo'];?>">
                        <strong><?php echo $row['ponumber']; ?></strong>
                    </a>
                </td>
                <td><?php echo $row['namaunit'];?></td>
                <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['totalpo'])),3)));?></td>
                <td class="text-center">
                    <a href="<?php echo base_url().$this->router->fetch_class(). '/editpo/'.$row['id_ppo']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"> Ubah</i></a>
                    <a target="_blank" href="<?php echo base_url().$this->router->fetch_class(). '/pdf/'.$row['id_ppo']; ?>" class="btn btn-xs btn-info"><i class="fa fa-file-pdf-o"> PDF</i></a>
                </td>
            </tr>
        <?php }	?>
        </tbody>
    </table>
</div>

<script>
    $(function () {
        $('.selectpicker').select2();

        var table = $('#datatables').DataTable({
            'responsive'  : true,
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
        });

    });
</script>