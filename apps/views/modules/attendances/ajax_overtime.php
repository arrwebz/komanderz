<div class="table-responsive pb-9">
    <?php if (count ( $overtime ) > 0) { ?>
        <table id="datatables" class="table table-sm table-bordered" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2" width="20%" class="align-middle text-center">Tanggal</th>
                    <th colspan="2" width="20%" class="text-center">Jam</th>
                    <th rowspan="2" width="10%" class="align-middle text-center">Durasi</th>
                    <th rowspan="2" width="40%" class="align-middle text-center">Kegiatan</th>
                    <th rowspan="2" width="10%" class="align-middle text-center">Nilai</th>
                </tr>
                <tr>
                    <th width="10%" class="text-center">Mulai</th>
                    <th width="10%" class="text-center">Berakhir</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            <?php
            $sum_hours = 0;
            $sum_makan = 0;
            $sum_nilai = 0;
            ?>
            <?php foreach ( $overtime as $rov ) { ?>
                <?php $i++; ?>
                <tr>
                    <td><?php echo customDate($rov['datetime']); ?></td>
                    <td class="text-center"><?php echo date('H:i',strtotime($rov['datetime'])); ?></td>
                    <td class="text-center"><?php echo '22:00'; ?></td>
                    <td class="text-center">
                        <?php
                        $minutes = date('i', strtotime($rov['datetime']));
                        if($minutes == '00'){
                            $starthours = date('H', strtotime($rov['datetime']));
                        }else{
                            if($minutes <= '30'){
                                $starthours = date('H', strtotime($rov['datetime']));
                            }else{
                                $starthours = date('H', strtotime($rov['datetime']))+0.5;
                            }
                        }
                        $endhours = '22';
                        $totalhours = $endhours-$starthours;
                        if($totalhours >= '3'){
                            $sum_makan += '25000';
                        }
                        $sum_hours += $totalhours;
                        echo $totalhours;
                        ?>
                    </td>
                    <td><?php echo $rov['notes'] ?></td>
                    <td class="text-end">
                        <?php
                            $totalnilai = $totalhours*20000;
                            $sum_nilai += $totalnilai;
                            echo strrev(implode('.',str_split(strrev(strval($totalnilai)),3)));
                        ?>
                    </td>
                </tr>
            <?php }	?>
            </tbody>
            <tfoot>
            <tr style="border-top:2px solid #201e1f42">
                <td colspan="4" class="text-end fw-semibold">Total</td>
                <td class="text-center fw-semibold"><?php echo $sum_hours;?></td>
                <td class="text-end fw-semibold">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($sum_nilai)),3)));?></td>
            </tr>
            </tfoot>
        </table>
    <?php } else { echo 'Belum ada data lembur!'; }?>
</div>

<script>
    $(function () {
        $("#boxLembur").removeClass("hidden");
        $(".nominal").addClass("animated zoomIn");

        $("#uangLembur").html("Rp. <?php echo strrev(implode('.',str_split(strrev(strval($sum_nilai)),3)));?>");
        $("#uangMakan").html("Rp. <?php echo strrev(implode('.',str_split(strrev(strval($sum_makan)),3)));?>");
        $("#totalUang").html("Rp. <?php echo strrev(implode('.',str_split(strrev(strval($sum_nilai+$sum_makan)),3)));?>");
    })
</script>