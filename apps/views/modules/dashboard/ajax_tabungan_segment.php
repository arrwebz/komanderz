<table class="table table-no-bordered">
    <tr>
        <td class="text-right" width="50%">Total Tabungan Segmen <?php echo $tahun;?> :</td>
        <td class="text-left" width="50%">
            <strong style="color: #fa591d;">
                <?php
                    $total_tabungan_segment = 0;
                    foreach ($drdrepseg as $row) {
                        $data_totalspb = $this->repmd->getTotalSpb($row['segment'], $param);
                        if ($data_totalspb[0]['totalspb'] == 0) {
                            $totalspb = 0;
                        } else {
                            $totalspb = $data_totalspb[0]['totalspb'];
                        }
                        $total_tabungan_segment += $row['total_tabungan'] - $totalspb;
                    }
                    echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($total_tabungan_segment)),3)));
                 ?>
            </strong>
        </td>
    </tr>
</table>

<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Divisi</th>
        <th>Segmen</th>
        <th>Total Nilai NET</th>
        <th>Total Panjar SPB</th>
        <th>Sisa Saldo Segmen</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>No</th>
        <th>Divisi</th>
        <th>Segmen</th>
        <th>Total Nilai NET</th>
        <th>Total Panjar SPB</th>
        <th>Sisa Saldo Segmen</th>
    </tr>
    </tfoot>
    <tbody>
    <?php $i = 0; ?>
    <?php
    $total_tabungan_segment = 0;
    foreach ( $drdrepseg as $row ) {
        $data_totalspb = $this->repmd->getTotalSpb($row['segment'], $param);
        if($data_totalspb[0]['totalspb'] == 0){
            $totalspb = 0;
        }else{
            $totalspb = $data_totalspb[0]['totalspb'];
        }
        $total_tabungan_segment += $row['total_tabungan']-$totalspb;
        ?>
        <?php $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['code_division']; ?></td>
            <td><?php echo $row['name_segmen']; ?></td>
            <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['total_tabungan'])),3))); ?></strong></td>
            <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($totalspb)),3))); ?></strong></td>
            <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['total_tabungan']-$totalspb)),3))); ?></strong></td>
        </tr>
    <?php }	?>
    </tbody>
</table>

<script>
    $(function () {
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