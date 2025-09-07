<div id="boxAbsen" class="clearfix border-top border-bottom" style="margin-bottom: 20px;">
    <div class="col-sm-4 border-right border-left label-komet">
        <div class="description-block">
            <span class="description-text">KOMET</span>
            <h5 class="description-header"><?php echo $komet;?></h5>
        </div>
    </div>
    <div class="col-sm-4 border-right label-mesra ">
        <div class="description-block">
            <span class="description-text">MESRA</span>
            <h5 class="description-header"><?php echo $mesra;?></h5>
        </div>
    </div>
    <div class="col-sm-4 border-right label-padi">
        <div class="description-block">
            <span class="description-text">PADI</span>
            <h5 class="description-header"><?php echo $padi;?></h5>
        </div>
    </div>
</div>

<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>SPB</th>
        <th class="text-center">Tanggal Dibuat</th>
        <th class="text-center">Tanggal Pengajuan / Budgeting</th>
        <th class="text-center">Tanggal Cair</th>
        <th class="text-center">Unit</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>#</th>
        <th>SPB</th>
        <th class="text-center">Tanggal Dibuat</th>
        <th class="text-center">Tanggal Pengajuan / Budgeting</th>
        <th class="text-center">Tanggal Cair</th>
        <th class="text-center">Unit</th>
    </tr>
    </tfoot>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++; ?>
        <?php $budget = $this->repmd->get_budget_byspb($row['spbid'], $row['unit']); ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['code'];?></td>
            <td class="text-center"><?php echo date('H:i', strtotime($row['tanggal_spb'])).' WIB<br>'.date('d-m-Y', strtotime($row['tanggal_spb']));?></td>
            <td class="text-center">
                <?php
                foreach($budget as $key => $rowbudget){
                    echo date('H:i', strtotime($rowbudget['tanggal_budget'])).' WIB<br>'.date('d-m-Y', strtotime($rowbudget['tanggal_budget'])).'<br>';
                }
                ?>
            </td>
            <td class="text-center">
                <?php
                    if($row['tanggal_cair'] != '1970-01-01 00:00:00'){
                        echo date('H:i', strtotime($row['tanggal_cair'])).' WIB<br>'.date('d-m-Y', strtotime($row['tanggal_cair']));
                    }
                ?>
            </td>
            <td class="text-center">
                <?php
                if($row['unit'] == 'KOMET'){
                    echo '<label class="label label-komet">'. $row['unit'] .'</label>';
                }elseif($row['unit'] == 'MESRA'){
                    echo '<label class="label label-mesra">'. $row['unit'] .'</label>';
                }elseif($row['unit'] == 'PADI'){
                    echo '<label class="label label-padi">'. $row['unit'] .'</label>';
                }else{
                    echo '-';
                }
                ?>
            </td>
        </tr>
    <?php }	?>
    </tbody>
</table>

<script>
	$(function() {
		$('#datatables').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': true,
			'responsive': true
		});
	})
</script>