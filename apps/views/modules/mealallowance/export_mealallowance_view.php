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

            <?php for($i=0; $i<=$totalday; $i++){ ?>
                <th colspan="4" style="text-align: center;"><?php echo $extdate[$i];?></th>
            <?php } ?>
            <th rowspan="2">WFO</th>
            <th rowspan="2">UANG MAKAN</th>
        </tr>
        <tr>
            <?php for($i=0; $i<=$totalday; $i++){ ?>
                <th>STATUS</th>
                <th>IN</th>
                <th>LOCATION</th>
                <th>NOTES</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php
    $num = 1;
    $uang_makan = 20000;
    $sum_total = 0;
    foreach($drd as $row){
        $sum_total += $uang_makan*$row['wfo'];?>
        <tr>
            <td><?php echo $num++;?></td>
            <td><?php echo $row['fullname'];?></td>

            <?php for($i=0; $i<=$totalday; $i++){ ?>
                <?php $datenow = $extdate[$i];?>
                <?php $day = date('d', strtotime($extdate[$i]));?>

                <!-- get cuti -->
                <?php $offwork = $this->repmd->offworkuser($row['userid'], $datenow); ?>

                <!-- get off day -->
                <?php $offday = $this->repmd->offday($datenow); ?>

                <?php if(date('l', strtotime($datenow)) == 'Saturday' || date('l', strtotime($datenow)) == 'Sunday' ){ ?>
                    <td colspan="4" style="background-color: #f2dede; text-align: center;">
                        Weekend
                    </td>
                <?php }elseif(count($offday) > 0){ ?>
                    <td colspan="4" style="background-color: #f2dede; text-align: center;">
                        <?php echo $offday[0]['name'];?>
                    </td>
                <?php }elseif(count($offwork) > 0){?>
                    <td colspan="4" style="text-align: center;">
                        <?php echo 'Cuti - '.ucfirst($offwork[0]['offstatus']).'<br>'.$offwork[0]['offnotes'];?>
                    </td>
                <?php }else{ ?>
                    <td style="text-align: center;">
                        <?php
                        if(!empty($row[$day.'_in'])){
                            $batas = "09:15";
                            if($row[$day.'_statuswork'] == '3'){
                                echo '<span style="color: #0f0ddd !important;">WFH</span>';
                            }else{
                                echo '<span style="color: #000 !important;">WFO</span>';
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if(!empty($row[$day.'_in'])){
                            $batas = "09:15";
                            if($row[$day.'_statuswork'] == '3'){
                                echo '<span style="color: #0f0ddd !important;">' .date('H:i', strtotime($row[$day.'_in'])).'</span>';
                            }else{
                                if(date('H:i', strtotime($row[$day.'_in'])) > $batas){
                                    echo '<span style="color: #dd4b39 !important;">'.date('H:i', strtotime($row[$day.'_in'])).'</span>';
                                }else{
                                    echo date('H:i', strtotime($row[$day.'_in']));
                                }
                            }
                        }
                        ?>
                    </td>
                    <td>
                    <?php if(!empty($row[$day.'_in_latitude'])){ ?>
                        <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $row[$day.'_in_latitude'];?>,<?php echo $row[$day.'_in_longitude'];?>">Buka Google Map</a></td>
                    <?php }else{ ?>
                        <?php if($row[$day.'_statuswork'] == '1'){ ?>
                            <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=-6.183648,106.8292636">Buka Google Map</a></td>
                        <?php } ?>
                    <?php } ?>
                    <td><?php if(!empty($row[$day.'_in_notes'])){ echo $row[$day.'_in_notes']; }?></td>
                <?php } ?>

            <?php } ?>

            <td style="text-align: center;"><?php echo $row['wfo'];?></td>
            <td style="text-align: right"><?php echo $uang_makan*$row['wfo'];?></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="<?php echo $totalday*4+7;?>" style=" text-align: right; padding-right: 20px;"><strong>Total</strong></td>
        <td style=" text-align: right;">
            <strong><?php echo strrev(implode('.',str_split(strrev(strval($sum_total)),3)));?></strong>
        </td>
    </tr>
    </tbody>
</table>