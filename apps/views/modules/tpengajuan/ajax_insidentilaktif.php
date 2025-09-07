<table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Nominal</td>
        <td>Pencairan</td>
        <td>Mulai</td>
        <td>Berakhir</td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ( $drd as $row ) { ?>
        <?php $i++;?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo formatrev($row['nominal_pinjaman']);?></td>
            <td><?php echo formatrev($row['pencairan']);?></td>
            <td><?php echo monthyear($row['mulai']);?></td>
            <td><?php echo monthyear($row['berakhir']);?></td>
            <td class="text-center">
                <?php if(date('d') >= 10 && date('m', strtotime($row['berakhir'].' -1 months')) == date('m')){ ?>
                <?php }else{ ?>
                    <button type="button" class="btn btn-sm btn-primary topup" data-topupid="<?php echo $row['pinjamanid'];?>">Topup</button>
                <?php }?>
                <button type="button" class="btn btn-sm btn-secondary cancel-topup hidden" data-topupid="<?php echo $row['pinjamanid'];?>">Cancel</button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    $(function () {
        $(".topup").on('click', function () {
	        var pinjamanid = $(this).attr("data-topupid");
	        $("#txtTopupinsidentilid").val(pinjamanid);

	        $('#txtNominaltopupinsidentil').val("");
	        setTimeout(function() { $('#txtNominaltopupinsidentil').focus() }, 500);
	        $('#submitTopupinsindetil').attr('disabled', true);
            $("#modalAddTopup").modal("show");
        });
        $(".cancel-topup").on('click', function () {
	        $('.topup').removeClass('hidden');
	        var sel = $(this).attr("data-topupid");
        	$('.cancel-topup[data-topupid="'+sel+'"]').addClass('hidden');
        	$("#viewRinciantopupinsidentil").html("");
	        $("#txtPinjamanid").val("");
	        $("#txtPencairanInsidentil").val("");

	        $("#txtNominalpinjamaninsidentil").val("");
	        $("#txtJangkawaktuinsidentil").val("");

	        document.getElementById('txtNominalpinjamaninsidentil').removeAttribute('readonly');
	        document.getElementById('txtJangkawaktuinsidentil').removeAttribute('readonly');

	        disabledSend('false');
        });
    })
</script>