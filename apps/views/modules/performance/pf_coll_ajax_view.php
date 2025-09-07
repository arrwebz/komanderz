<div class="material-datatables">
    <div class="text-center">
        <p>
            Jumlah Total Collection :
            <strong style="color: #fa591d;">Rp.
                <?php
                $sumvrec = array_sum(array_column($drd, 'vrecvalue'));
                echo strrev(implode('.',str_split(strrev(strval($sumvrec)),3)));
                ?>
            </strong>
        </p>
    </div>
    <table id="dataCollection" class="table table-striped table-no-bordered table-hover" cellspacing="0" style="width: 100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Unit</th>
            <th>Divisi</th>
            <th>Segment</th>
            <th>Kode</th>
            <th>Invoice</th>
            <th>Tanggal Proses</th>
            <th>Nilai</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>#</th>
            <th>Unit</th>
            <th>Divisi</th>
            <th>Segment</th>
            <th>Kode</th>
            <th>Invoice</th>
            <th>Tanggal Proses</th>
            <th>Nilai</th>
        </tr>
        </tfoot>
        <tbody>
        <?php $num = 1; foreach($drd as $row ){?>
            <tr>
                <td style="width: 5%"><?php echo $num++;?></td>
                <td><?php echo $row['unit'];?></td>
                <td><?php echo $row['division'];?></td>
                <td><?php echo $row['segment'];?></td>
                <td><?php echo $row['code'];?></td>
                <td><?php echo $row['invnum'];?></td>
                <td><?php echo date('d-m-Y', strtotime($row['procdat']));?></td>
                <td style="color: #fa591d;">
                    <strong><?php echo strrev(implode('.',str_split(strrev(strval($row['vrecvalue'])),3)));?></strong>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script>
	$(function () {
		var table = $('#dataCollection').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': true,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
	});
</script>