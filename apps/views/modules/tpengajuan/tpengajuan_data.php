<table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center" width="5%">No</th>
            <th>Nomor Pengajuan</th>
            <th>Tipe Pengajuan</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Nominal (Rp)</th>
            <th class="text-center" width="10%" >Platform</th>
            <th class="text-center" width="10%">Status</th>
            <th class="disabled-sorting text-right">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ( $drd as $row ) {
            $i++;
            if($row['tipe_pengajuan'] == '1'){
                $show_tipepengajuan = '<span class="badge bg-info">Anggota Baru</span>';
                $nominal = '-'; 
            }elseif($row['tipe_pengajuan'] == '2'){
                $show_tipepengajuan = '<span class="badge bg-primary">Penarikan Simpanan</span>';
                $nominal = $row['nominal_penarikan'];
            }elseif($row['tipe_pengajuan'] == '3'){
                $show_tipepengajuan = '<span class="badge bg-success">Perubahan Simpanan</span>';
                $nominal = $row['simpanan_sukarela']+$row['band_value'];
            }elseif($row['tipe_pengajuan'] == '4'){
                $show_tipepengajuan = '<span class="label label-default">Perubahan Data</span>';
                $nominal = '-';
            }elseif($row['tipe_pengajuan'] == '5'){
                $show_tipepengajuan = '<span class="badge bg-warning">Pinjaman Insidentil</span>';
                $nominal = $row['nominal_pinjaman_insidentil'];
            }elseif($row['tipe_pengajuan'] == '6'){
                $show_tipepengajuan = '<span class="badge bg-danger">Pinjaman Koptel</span>';
                $nominal = '';
            }else{
                $show_tipepengajuan = '<span class="label label-default">Tidak Diketahui</span>';
                $nominal = '';
            }

            if($row['status'] == '1'){
                $show_status = '<span class="label label-warning">Proses</span>';
            }elseif($row['status'] == '2'){
                $show_status = '<span class="label label-warning">SPB Dibuat</span>';
            }elseif($row['status'] == '3'){
                $show_status = '<span class="label label-success">Selesai</span>';
            }elseif($row['status'] == '4'){
                $show_status = '<span class="label label-danger">Pengajuan Ditolak</span>';
            }elseif($row['status'] == '5'){
                $show_status = '<span class="label label-danger">Pengajuan Dibatalkan</span>';
            }else{
                $show_status = '<span class="label label-default">Tidak Diketahui</span>';
            }

            if($row['platform'] == '1'){
                $show_platform = 'Kaila';
            }elseif($row['platform'] == '2'){
                $show_platform = 'KMS';
            }else{
                $show_platform = 'Tidak Diketahui'; 
            }
            ?>
            <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td>
                    <a href="<?php echo site_url('tpengajuan/detail/'.$row['pengajuanid']);?>" class="text-aqua">
                        <strong><?php echo $row['nomor_pengajuan'];?></strong>
                    </a>
                    <br><?php echo customDate($row['tanggal_pengajuan']);?>
                </td>
                <td><strong><?php echo $show_tipepengajuan;?></strong></td>
                <td><?php echo $row['nik'];?></td>
                <td><?php echo $row['nama'];?></td>
                <td class="text-end"><strong><?php echo strrev(implode('.',str_split(strrev(strval($nominal)),3)));?></strong></td>
                <td class="text-center"><?php echo $show_platform;?></td>
                <td class="text-center"><?php echo $show_status;?></td>
                <td class="text-right js-sweetalert">
                    <!-- untuk pengajuan anggota baru -->
                    <?php if($row['tipe_pengajuan'] == '1'){?>
                        <?php if($row['status'] == '1'){?>
                            <a href="javascript:" class="btn btn-xs btn-default"><i> Menunggu Sentralisasi koptel</i></a>
                        <?php } ?>
                        <?php if($row['status'] == '3'){?>
                            <a href="javascript:" class="btn btn-xs btn-success detail-spb"> Angota sudah ditambahkan</a>
                        <?php } ?>
                    <?php } ?>

                    <!-- untuk pengajuan penarikan, insidentil, koptel -->
                    <?php if($row['tipe_pengajuan'] == '2' || $row['tipe_pengajuan'] == '5' || $row['tipe_pengajuan'] == '6'){?>
                        <?php if($row['status'] == '1'){?>
                            <a href="<?php echo site_url('tpengajuan/addspb/'.$row['pengajuanid']);?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                <i class="fs-4 ti ti-plus text-info"></i> SPB
                            </a>
                        <?php } ?>
                        <?php if($row['status'] == '2' || $row['status'] == '3'){?>
                            <a href="javascript:" class="btn btn-xs btn-success detail-spb" data-id="<?php echo $row['pengajuanid'];?>"><i class="ti ti-eye-check"></i></a>
                        <?php } ?>
                    <?php } ?>

                    <!-- untuk pengajuan perubahan simpanan, perubahan data -->
                    <?php if($row['tipe_pengajuan'] == '3' || $row['tipe_pengajuan'] == '4'){?>
                        <?php if($row['tipe_pengajuan'] == '3' && $row['status'] == '1'){?>
                            <a href="<?php echo site_url('tpengajuan/perubahansimpanan/'.$row['pengajuanid']);?>" class="btn btn-xs btn-default"><i class="fa fa-exclamation-circle"></i> Konfirmasi</a>
                        <?php } ?>
                        <?php if($row['tipe_pengajuan'] == '4' && $row['status'] == '1'){?>
                            <a href="<?php echo site_url('tpengajuan/perubahandata/'.$row['pengajuanid']);?>" class="btn btn-xs btn-default"><i class="fa fa-exclamation-circle"></i> Konfirmasi</a>
                        <?php } ?>
                    <?php } ?>

                    <?php if($role == '1'){ ?>
                        <?php if($row['status'] != '3'){?>
                            <a href="<?php echo base_url().$this->router->fetch_class(). '/editpengajuan/'.$row['pengajuanid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                <i class="fs-4 ti ti-edit text-warning"></i>
                            </a>
                            <button data-href="<?php echo base_url().$this->router->fetch_class().'/delete';?>" data-id="<?php echo $row['pengajuanid'];?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                <i class="fs-4 ti ti-trash text-danger"></i>
                            </button>
                        <?php } ?>
                    <?php } ?>
                </td>
            </tr>
        <?php }	?>
    </tbody>
</table>

<div id="ModalDetailSPB" class="modal fade" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Detail SPB</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formSPB" method="POST" action="javascript:">
                <div class="modal-body row">
                    <div id="loadingDetailSPB"></div>
                    <div id="containerDetailSPB" class="col-md-12 hidden">
                        <div class="form-group mb-3">
                            <label>Nomor SPB</label>
                            <input id="txtnomorspb" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tangggal SPB</label>
                            <input id="txtTanggalspb" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group mb-3"> 
                            <label>Nilai SPB</label>
                            <input id="txtNilaispb" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label>Status SPB</label>
                            <input id="txtStatusspb" type="text" class="form-control" readonly>
                        </div>
                        <div id="boxTf" class="hidden">
                            <div class="form-group mb-3">
                                <label>Tanggal Proses SPB</label>
                                <input id="txtTanggalprosesspb" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label>Bukti Transaksi</label>
                                <img id="txtBuktitf" class="img-responsive" alt="" width="200"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="footerSPB">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
	$(function() {
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

		$(document).on("click",".detail-spb",function() {
            var id = $(this).attr('data-id');
			$('#ModalDetailSPB').modal('show');
			$('#loadingDetailSPB').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

            var dataPost = 'pengajuanid='+id;
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('tpengajuan/detailspb');?>",
                data: dataPost,
                success: function (data) {
	                var respon = JSON.parse(data);

	                $('#loadingDetailSPB').html('');
                    if(respon['status'] == 'success'){
	                    $('#containerDetailSPB').removeClass('hidden');

                    	$('#txtnomorspb').val(respon['data']['nomor']);
                    	$('#txtTanggalspb').val(respon['data']['tanggal_spb']);
	                    var convert = number_format(respon['data']['nominal'],0,'','.');
                    	$('#txtNilaispb').val(convert);
                    	if(respon['data']['status'] == '1'){
		                    $('#txtStatusspb').val('SPB Di buat');
		                    $('#boxTf').addClass('hidden');

		                    $('#txtStatusspb').addClass('bg-orange');
		                    $('#txtStatusspb').removeClass('bg-green');
                        }else if(respon['data']['status'] == '2'){
		                    $('#txtStatusspb').val('SPB Proses');
		                    $('#boxTf').addClass('hidden');

		                    $('#txtStatusspb').addClass('bg-orange');
		                    $('#txtStatusspb').removeClass('bg-green');
                        }else if(respon['data']['status'] == '3'){
		                    $('#boxTf').removeClass('hidden');
		                    $('#txtStatusspb').removeClass('bg-orange');
		                    $('#txtStatusspb').addClass('bg-green');

		                    $('#txtStatusspb').val('SPB Selesai');
		                    $('#txtTanggalprosesspb').val(respon['data']['tanggal_proses']);
		                    $('#txtBuktitf').attr('src',"<?php echo $this->config->item('uploads_uri').'/spbsp/'?>"+ respon['data']['spbspid'] +"/"+ respon['data']['bukti_transfer']);
                        }else{
		                    $('#txtStatusspb').val('Status tidak diketahui');
		                    $('#boxTf').addClass('hidden');
                        }
                    }else{
	                    $('#containerDetailSPB').addClass('hidden');
	                    $('#boxTf').removeClass('hidden');
                    }
                }
            });
		});
	});

	function number_format(number, decimals, decPoint, thousandsSep) {

		number = (number + '').replace(/[^0-9]/g, '');

		var n = !isFinite(+number) ? 0 : +number;

		var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);

		var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;

		var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;

		var s = '';

		var toFixedFix = function (n, prec) {

			var k = Math.pow(10, prec);

			return '' + (Math.round(n * k) / k).toFixed(prec);

		};

		s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

		if (s[0].length > 3) {

			s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);

		}

		if ((s[1] || '').length < prec) {

			s[1] = s[1] || '';

			s[1] += new Array(prec - s[1].length + 1).join('0');

		}
		return s.join(dec);
	}

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url().$this->router->fetch_class();?>";
		var uri = $(this).attr("data-href");
		var id = $(this).attr("data-id");
		showCancelMessage(current_url,uri,id);
	});
	function showCancelMessage(current_url, uri, id){
		swal({
			title: "Yakin menghapus data?",
			text: "",
			icon: "warning",
			buttons: ["Batal", "Hapus!"],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				swal("Anda telah berhasil menghapus data ini selamanya.", {
					icon: "success",
					buttons: false
				});

				$.ajax({
					url: uri,
					data: 'id=' + id,
					type: 'POST',
					success: function(msg) {
						if(msg == "success"){
							setTimeout(function () {
								location.href = current_url;
							}, 1500);
						}

					}
				})

			}
		});
	}
</script>