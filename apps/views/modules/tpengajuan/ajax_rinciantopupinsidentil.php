<style>
    .bg-grey{background: #dddddd3b !important;}
</style>
<div class="table-responsive pb-9">
    <div class="row col-md-12">
        <div class="col-md-8">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th colspan="3" class="text-center bg-grey">Pengajuan Lama</th>
                </tr>
                <tr>
                    <th class="bg-grey">Anggota</th>
                    <th colspan="2" class="text-right"><?php echo $nik.' '.$name;?></th>
                </tr>
                <tr>
                    <th class="bg-grey">Nominal</th>
                    <th colspan="2" class="text-right"><?php echo formatrev($lama['nominal']);?></th>
                </tr>
                <tr>
                    <th class="bg-grey">Jangka Waktu</th>
                    <th colspan="2" class="text-right"><?php echo $lama['jw'];?> Bulan</th>
                </tr>
                <tr>
                    <th class="bg-grey">Pokok</th>
                    <th colspan="2" class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($lama['pokok'])),3)));?></th>
                </tr>
                <tr>
                    <th class="bg-grey">Bulan</th>
                    <th class="text-right bg-grey">Terbayar</th>
                    <th class="text-right bg-grey">Belum Terbayar</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($lama['iuran'] as $row){ ?>
                    <tr>
                        <td><?php echo $row['bulan'];?></td>
                        <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['pay_insidentil'])),3)));?></td>
                        <td class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($row['unpay_insidentil'])),3))).'<br>'.$row['catatan'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2" class="text-right bg-grey">Total Sisa Iuran (<?php echo $lama['volkomet'];?>x)</td>
                    <td class="text-right bg-grey"><?php echo strrev(implode('.',str_split(strrev(strval($lama['valkomet'])),3)));?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right bg-grey">Total Sisa Iuran Berjalan (<?php echo $lama['volkoptel'];?>x)</td>
                    <td class="text-right bg-grey"><?php echo strrev(implode('.',str_split(strrev(strval($lama['valkoptel'])),3)));?></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-4">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th colspan="3" class="text-center bg-grey">Pengajuan Lama</th>
                </tr>
                <tr>
                    <th class="bg-grey">Anggota</th>
                    <th colspan="2" class="text-right"><?php echo $nik.' '.$name;?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="bg-grey">Nominal</th>
                    <th colspan="2" class="text-right"><?php echo formatrev($baru['nominal']);?></th>
                </tr>
                <tr>
                    <th class="bg-grey">Jangka Waktu</th>
                    <th colspan="2" class="text-right"><?php echo $baru['jw'];?> Bulan</th>
                </tr>
                <tr>
                    <th class="bg-grey">Cicilan Perbulan</th>
                    <th colspan="2" class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($baru['cicilan'])),3)));?></th>
                </tr>
                <tr>
                    <th class="bg-grey">Pencairan</th>
                    <th colspan="2" class="text-right"><?php echo strrev(implode('.',str_split(strrev(strval($baru['pencairan'])),3)));?></th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="boxFormTopupInsidentil">
    <div class="form-group mb-4">
        <label class="form-label fw-semibold">Topup ID</label>
        <input id="txtPinjamanid" name="txtPinjamanid" type="text" class="form-control" readonly>
    </div>
    <div class="form-group mb-4">
        <label class="form-label fw-semibold">Pencairan</label>
        <input id="txtPencairanInsidentil" name="txtPencairanInsidentil" type="text" class="form-control" readonly>
    </div>
</div>