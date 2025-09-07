<div class="">

    <div class="text-center">
        <p>
            <strong><?php echo $title;?></strong>
            <br>Total Nilai Invoice :
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
        <table id="datatables" class="table table-sm border table-striped table-bordered display text-nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th style="font-size: 12px;">No</th>
                    <th style="font-size: 12px;">Unit</th>
                    <th style="font-size: 12px;">Segmen</th>
                    <th style="font-size: 12px;">Code</th>
                    <th style="font-size: 12px;">Base Value</th>
                    <th style="font-size: 12px;">Invoice Date</th>
                    <th style="font-size: 12px;">Aging</th>
                    <th style="font-size: 12px;">Customer</th>
                    <th style="font-size: 12px;">AM Komet</th>
                    <th style="font-size: 12px;">AR Komet</th>
                    <th style="font-size: 12px;">Last Update</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach ( $drd as $row ) { ?>
                    <?php $i++; ?>
                    <tr>
                        <td style="font-size: 12px;"><?php echo $i;?></td>
                        <td style="font-size: 12px;"><?php echo $row['unit'];?></td>
                        <td style="font-size: 12px;"><?php echo $row['segment'];?></td>
                        <td style="font-size: 12px;">
                            <?php if($row['unit'] == 'MESRA'){ ?>
                                <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                    <strong><?php echo $row['code'];?></strong>
                                </a>
                            <?php }else{ ?>
                                <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                    <strong><?php echo $row['code'];?></strong>
                                </a>
                            <?php } ?>
                            <small><br>INV : <?php echo $row['invnum'];?>
                                <br>FP : <?php echo $row['faknum'];?></small>
                        </td>
                        <td style="font-size: 12px;"><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                        <td style="font-size: 12px;"><?php echo $row['invdate'];?></td>
                        <td style="font-size: 12px;"><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                        <td style="font-size: 12px;"><?php echo $row['amuser'];?></td>
                        <td style="font-size: 12px;"><?php echo $row['amkomet'];?></td>
                        <td style="font-size: 12px;">
                            <?php
                            if($row['amkomet'] == 'Sigit Hidayatullah' || $row['amkomet'] == 'Isnanza Zulkarnaini'){
                                $ar = 'Iman Suryana';
                            }elseif($row['amkomet'] == 'Vania Miranda Putri'){
                                $ar = 'Muhamad Luthfi';
                            }elseif($row['amkomet'] == 'Eva Ayu Komala'){
                                $ar = 'Indra Saputra Fardilla	';
                            }elseif($row['amkomet'] == 'Indra Saputra Fardilla'){
                                $ar = 'Indra Saputra Fardilla';
                            }else{
                                $ar = '-';
                            }
                            echo $ar;
                            ?>
                        </td>
                        <td style="font-size: 12px;">
                            Penerima : <?php echo $row['recipient'];?>
                            <br>Catatan : <?php echo $row['tracknote'];?>
                            <br>Tanggal : <?php echo $row['trackdate'];?>
                        </td>
                    </tr>
                <?php }	?>
            </tbody>
        </table>
    </div>
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
			'scrollY': true,
		});
	});
</script>