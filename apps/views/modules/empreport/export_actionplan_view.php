<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
    <tr>
        <th rowspan="2" style="vertical-align: middle">No</th>
        <th rowspan="2" style="vertical-align: middle">Nama</th>

        <?php for($i=1; $i<=$totalday; $i++){ ?>
            <th colspan="1" style="text-align: center;"><?php echo $year.'-'.$month.'-'.$i;?></th>
        <?php } ?>
    </tr>
    <tr>
        <?php for($i=1; $i<=$totalday; $i++){ ?>
            <th>Kegiatan</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php $num = 1; foreach($drd as $row){ ?>
        <tr>
            <td><?php echo $num++;?></td>
            <td><?php echo $row['fullname'];?></td>

            <?php for($i=1; $i<=$totalday; $i++){ ?>
                <?php $datenow = $year.'-'.$month.'-'.$i;?>

                <!-- get cuti -->
                <?php $offwork = $this->repmd->offworkuser($row['userid'], $datenow); ?>

                <!-- get off day -->
                <?php $offday = $this->repmd->offday($datenow); ?>

                <?php if(date('l', strtotime($datenow)) == 'Saturday' || date('l', strtotime($datenow)) == 'Sunday' ){ ?>
                    <td colspan="1" style="background-color: #f2dede; text-align: center;">
                        Weekend
                    </td>
                <?php }elseif(count($offday) > 0){ ?>
                    <td colspan="1" style="background-color: #f2dede; text-align: center;">
                        <?php echo $offday[0]['name'];?>
                    </td>
                <?php }elseif(count($offwork) > 0){?>
                    <td colspan="1" style="text-align: center;">
                        <?php echo 'Cuti - '.ucfirst($offwork[0]['offstatus']).' - '.$offwork[0]['offnotes'];?>
                    </td>
                <?php }else{ ?>
                    <td style="text-align: center;">
                        <?php
                        if(!empty($row[$i.'_in'])){
                            echo $row[$i.'_in_notes'];
                        }
                        ?>
                    </td>
                <?php } ?>

            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>