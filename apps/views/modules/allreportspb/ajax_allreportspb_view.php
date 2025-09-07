<div class="material-datatables">
    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Segmen</th>
                <th>SPB</th>
                <th class="text-right">Nilai SPB</th>
                <th class="text-center">Status SPB</th>
                <th>Invoice</th>
                <th class="text-right">Nilai Net</th>
                <th class="text-center">Status Pencairan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Segmen</th>
                <th>SPB</th>
                <th class="text-right">Nilai SPB</th>
                <th class="text-center">Status SPB</th>
                <th>Invoice</th>
                <th class="text-right">Nilai Net</th>
                <th class="text-center">Status Pencairan</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
        $sum_value_spb = 0;
//        $sum_base_value = 0;
        $i = 0;
        foreach ( $drd as $row ) {
            $sum_value_spb += $row['value'];
//            if($row['invnum'] == 0){
//                $sum_base_value += $row['negovalue'];
//            }else{
//                $sum_base_value += $row['basevalue'];
//            }
            ?>
            <?php $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['segment'] ?></td>
                <td><?php echo $row['code'] ?></td>
                <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></td>
                <td class="text-center">
                    <?php
                        if($row['status'] == '0')
                            echo '<span class="label label-default">Menunggu</span>';
                        elseif($row['status'] == '1')
                            echo '<span class="label label-success">Selesai</span>';
                        elseif($row['status'] == '2') 
                            echo '<span class="label label-warning">Diproses</span>';
                        elseif($row['status'] == '3') 
                            echo '<span class="label label-warning">Approved</span>';
                    ?>
				</td>
                <td><?php if($row['invnum'] == 0) echo $row['codeinv']; else echo $row['invnum'].'/'.$row['jobtype'].'/'.date('m/y', strtotime($row['invdate'])); ?></td>
                <td class="text-right"><?php if($row['invnum'] == 0) { echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3)));} else { echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3)));}?></td>
                <td class="text-center">
                    <?php
                        if($row['statinv'] != '1')
                            echo '<span class="label label-warning">Belum Cair</span>';
                        elseif($row['statinv'] == '1')
                            echo '<span class="label label-success">Cair</span>';
                        elseif($row['statinv'] == '9')
                            echo '<span class="label label-danger">Batal</span>';
                    ?>
                </td>
            </tr>
        <?php }	?>

        <?php if($optStatinv != 'all'){?>
            <tfoot>
                <tr style="background: #ebebeb;font-weight: 600;">
                    <td class="text-right" colspan="3">Grand Total SPB : </td>
                    <td class="text-right" style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($sum_value_spb)),3))); ?></td>
                    <td class="text-right" colspan="4"></td>
                </tr>
            </tfoot>
        <?php }	?>
        </tbody>
    </table>
</div>

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