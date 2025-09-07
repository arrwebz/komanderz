<div class="text-center">
    <p>
        Total Nilai Invoice :
        <strong style="color: #fa591d;">Rp.
            <?php
            $sum_total_basevalue = array_sum(array_column($drd, 'basevalue'));
            $sum_total = strrev(implode('.',str_split(strrev(strval($sum_total_basevalue)),3)));
            echo $sum_total;
            ?>
        </strong>
    </p>
</div>
<div class="table-responsive pb-9">
    <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Unit</th>
            <th>Tipe Order</th>
            <th>Divisi</th>
            <th>Segmen</th>
            <th>Kode</th>
            <th>Invoice</th>
            <th>Tanggal Invoice</th>
            <th>Nilai Dasar</th>
            <th>Status</th>
            <th>SPB</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Unit</th>
            <th>Tipe Order</th>
            <th>Divisi</th>
            <th>Segmen</th>
            <th>Kode</th>
            <th>Invoice</th>
            <th>Tanggal Invoice</th>
            <th>Nilai Dasar</th>
            <th>Status</th>
            <th>SPB</th>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 0; ?>
        <?php foreach ( $drd as $row ) { ?>
            <?php $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['unit'] ?></td>
                <td><?php echo $row['orderstatus'] ?></td>
                <td><?php echo $row['code_division'] ?></td>
                <td><?php echo $row['code_segment'] ?></td>
                <td style="text-transform: uppercase;"><a target='_blank' href="<?php echo base_url().'knopes/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><?php echo $row['code'] ?></a></td>
                <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                <td><?php echo $row['invdate'] ?></td>
                <td><strong style="color: #fa591d;">Rp. <?php if($row['invnum'] == 0) { echo strrev(implode('.',str_split(strrev(strval($row['negovalue'])),3)));} else { echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3)));}?></strong></td>
                <td>
                    <?php
                        switch ($row['status']) {
                            case '1':
                                echo '<span class="label label-success">Cair</span>';
                                break;
                            case '2':
                                echo '<span class="label label-info">Segmen</span>';
                                break;
                            case '3':
                                echo '<span class="label label-warning">PJM</span>';
                                break;
                            case '4':
                                echo '<span class="label label-warning">ASD</span>';
                                break;
                            case '5':
                                echo '<span class="label label-primary">Logistik</span>';
                                break;
                            case '6':
                                echo '<span class="label bg-olive">Keuangan</span>';
                                break;
                            case '7':
                                echo '<span class="label bg-maroon">Legal</span>';
                                break;
                            case '8':
                                echo '<span class="label bg-olive">Posting Keuangan</span>';
                                break;
                            case '9':
                                echo '<span class="label label-danger">Batal</span>';
                                break;
                            case '10':
                                echo '<span class="label label-info">Forecast Pencairan</span>';
                                break;
                            case '11':
                                echo '<span class="label label-default">Materai</span>';
                                break;
                            case '12':
                                echo '<span class="label label-default">Tanda Tangan</span>';
                                break;
                            case '13':
                                echo '<span class="label label-info">Segmen</span>';
                                break;
                            case '14':
                                echo '<span class="label label-warning">PJM</span>';
                                break;
                            case '15':
                                echo '<span class="label label-warning">ASD</span>';
                                break;
                            case '16':
                                echo '<span class="label label-primary">Logistik</span>';
                                break;
                            case '17':
                                echo '<span class="label bg-maroon">Legal</span>';
                                break;
                            case '18':
                                echo '<span class="label bg-olive">Verifikasi Keuangan</span>';
                                break;
                            default:
                                echo '<span class="label label-danger">Belum Cair</span>';
                        }
                    ?>
                </td>
                <td><?php if($row['spbid'] == '0') echo '<span class="label label-default">Belum SPB</span>'; elseif($row['spbid'] != '0') echo '<span class="label label-info">Sudah SPB</span>';  ?></td>
            </tr>
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
	        'scrollX': true,
        });
    });
</script>