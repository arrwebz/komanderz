<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home');?>"><i class="fa fa-dashboard"></i> home</a></li>
            <li><a href="javascript:"><?php echo strtolower($title);?></a></li>
            <li class="active"><?php echo strtolower($brand);?></li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Pengajuan Anggota Komet.</h3>
                    </div>
                    <div class="box-body">
                        <p><a href="<?php echo base_url().$this->router->fetch_class().'/addpengajuan'; ?>" class="btn btn-sm btn-success">+ Tambah Pengajuan</a></p>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th>Nomor Pengajuan</th>
                                    <th class="text-center" width="10%" >Platform</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tipe Pengajuan</th>
                                    <th class="text-center" width="10%">Status</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th>Nomor Pengajuan</th>
                                    <th class="text-center" width="10%" >Platform</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tipe Pengajuan</th>
                                    <th class="text-center" width="10%">Status</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $i = 0;
                                foreach ( $drd as $row ) {
                                    $i++;
                                    if($row['tipe_pengajuan'] == '1'){
                                        $show_tipepengajuan = '<span class="label label-default">Anggota Baru</span>';
                                    }elseif($row['tipe_pengajuan'] == '2'){
                                        $show_tipepengajuan = '<span class="label label-default">Penarikan Simpanan</span>';
                                    }elseif($row['tipe_pengajuan'] == '3'){
                                        $show_tipepengajuan = '<span class="label label-default">Perubahan Simpanan</span>';
                                    }elseif($row['tipe_pengajuan'] == '4'){
                                        $show_tipepengajuan = '<span class="label label-default">Perubahan Data</span>';
                                    }elseif($row['tipe_pengajuan'] == '5'){
                                        $show_tipepengajuan = '<span class="label label-default">Pinjaman Insidentil</span>';
                                    }elseif($row['tipe_pengajuan'] == '6'){
                                        $show_tipepengajuan = '<span class="label label-default">Pinjaman Koptel</span>';
                                    }else{
                                        $show_tipepengajuan = '<span class="label label-default">Tidak Diketahui</span>';
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
                                        </td>
                                        <td class="text-center"><?php echo $show_platform;?></td>
                                        <td><?php echo $row['nik'];?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo customDate($row['tanggal_pengajuan']);?></td>
                                        <td><?php echo $show_tipepengajuan;?></td>
                                        <td class="text-center"><?php echo $show_status;?></td>
                                        <td class="text-right js-sweetalert">
                                            <!-- untuk pengajuan anggota baru -->
                                            <?php if($row['tipe_pengajuan'] == '1'){?>
                                                <?php if($row['status'] == '1'){?>
                                                    <a href="javascript:" class="btn btn-xs btn-default"><i> Menunggu payroll koptel</i></a>
                                                <?php } ?>
                                                <?php if($row['status'] == '3'){?>
                                                    <a href="javascript:" class="btn btn-xs btn-success detail-spb"> Angota sudah ditambahkan</a>
                                                <?php } ?>
                                            <?php } ?>

                                            <!-- untuk pengajuan penarikan, insidentil, koptel -->
                                            <?php if($row['tipe_pengajuan'] == '2' || $row['tipe_pengajuan'] == '5' || $row['tipe_pengajuan'] == '6'){?>
                                                <?php if($row['status'] == '1'){?>
                                                    <a href="<?php echo site_url('tpengajuan/addspb/'.$row['pengajuanid']);?>" class="btn btn-xs btn-default"><i> Buat SPB</i></a>
                                                <?php } ?>
                                                <?php if($row['status'] == '2' || $row['status'] == '3'){?>
                                                    <a href="javascript:" class="btn btn-xs btn-success detail-spb" data-id="<?php echo $row['pengajuanid'];?>"><i class="fa fa-eye"></i> Lihat Status SPB</a>
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
                                                    <a href="<?php echo base_url().$this->router->fetch_class(). '/editpengajuan/'.$row['pengajuanid']; ?>" class="btn btn-xs btn-default">
                                                        <i class="fa fa-edit"> Ubah</i>
                                                    </a>
                                                    <button data-href="<?php echo base_url().$this->router->fetch_class().'/delete';?>" data-id="<?php echo $row['pengajuanid'];?>" class="btn btn-xs btn-default"><i class="fa fa-trash-o"> Hapus</i></button>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        </div>

                        <div id="ModalDetailSPB" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Detail SPB</h4>
                                    </div>
                                    <form id="formSPB" method="POST" action="javascript:">
                                        <div class="modal-body row">
                                            <div id="loadingDetailSPB"></div>
                                            <div id="containerDetailSPB" class="col-md-12 hidden">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nomor SPB</label>
                                                        <input id="txtnomorspb" type="text" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tangggal SPB</label>
                                                        <input id="txtTanggalspb" type="text" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nilai SPB</label>
                                                        <input id="txtNilaispb" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="padding-right: 5px!important;">
                                                    <div class="form-group">
                                                        <label>Status SPB</label>
                                                        <input id="txtStatusspb" type="text" class="form-control" readonly>
                                                    </div>
                                                    <div id="boxTf" class="hidden">
                                                        <div class="form-group">
                                                            <label>Tanggal Proses SPB</label>
                                                            <input id="txtTanggalprosesspb" type="text" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bukti Transaksi</label>
                                                            <img id="txtBuktitf" class="img-responsive" alt="" width="200"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div id="footerSPB">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
		                    $(document).ready(function() {
			                    var table = $('#datatables').DataTable({
				                    'responsive': true,
				                    'paging': true,
				                    'lengthChange': false,
				                    'searching': true,
				                    'ordering': true,
				                    'info': true,
				                    'autoWidth': true
			                    });

			                    $('.detail-spb').on('click', function () {
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>