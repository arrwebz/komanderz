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
            <th colspan="3" style="text-align: center;"><?php echo $year.'-'.$month.'-'.$i;?></th>
        <?php } ?>
    </tr>
    <tr>
        <?php for($i=1; $i<=$totalday; $i++){ ?>
            <th>STATUS</th>
            <th>IN</th>
            <th>OUT</th>
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
                    <td colspan="3" style="background-color: #f2dede; text-align: center;">
                        Weekend
                    </td>
                <?php }elseif(count($offday) > 0){ ?>
                    <td colspan="3" style="background-color: #f2dede; text-align: center;">
                        <?php echo $offday[0]['name'];?>
                    </td>
                <?php }elseif(count($offwork) > 0){?>
                    <td colspan="3" style="text-align: center;">
                        <?php echo 'Cuti - '.ucfirst($offwork[0]['offstatus']).' - '.$offwork[0]['offnotes'];?>
                    </td>
                <?php }else{ ?>
                    <td style="text-align: center;">
                        <?php
                        if(!empty($row[$i.'_in'])){
                            $batas = "09:00";
                            if($row[$i.'_statuswork'] == '3'){
                                echo '<span style="color: #0f0ddd !important;">IZIN</span>';
                            }else{
                                echo '<span style="color: #000 !important;">WFO</span>';
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if(!empty($row[$i.'_in'])){
                            $batas = "09:00";
                            if($row[$i.'_statuswork'] == '3'){
                                echo '<span style="color: #0f0ddd !important;">' .date('H:i', strtotime($row[$i.'_in'])).'</span>';
                            }else{
                                if(date('H:i', strtotime($row[$i.'_in'])) > $batas){
                                    echo '<span style="color: #dd4b39 !important;">'.date('H:i', strtotime($row[$i.'_in'])).'</span>';
                                }else{
                                    echo date('H:i', strtotime($row[$i.'_in']));
                                }
                            }
                        }
                        ?>
                    </td>
                    <td><?php if(!empty($row[$i.'_out'])){ echo date('H:i', strtotime($row[$i.'_out'])); }?></td>
                <?php } ?>

            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>