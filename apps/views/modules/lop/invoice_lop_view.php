<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">LOP</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('lop');?>">Project</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Rocket.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-6">
                    <div class="card-body p-4 border-bottom">
                        <h5 class="fs-4 fw-semibold mb-4">Cari Invoice</h5>
                        <div class="row">
                            <form id="cariInvoice" action="javascript:">
                                <div class="col-md-6">
                                    <div class="box box-danger">
                                        <div class="box-body">
                                            <div class="form-group mb-3">
                                                <label>Nomor Invoice:</label>
                                                <input name="invnum" type="text" class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Tahun:</label>
                                                <select name="invtahun" id="optStatus" class="form-control selectpicker" >
                                                    <option disabled selected>Pilih</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" name="cmdsave" class="btn btn-success pull-right">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body p-4 border-bottom">
                        <h5 class="fs-4 fw-semibold mb-4">List Invoice</h5>
                        <div class="loading-amoung"></div>
                        <div id="boxInvoiceSuccess" class="box-body hidden">
                            <form action="<?php echo site_url('lop/createinvoice/'.$drd[0]['lopid']);?>" method="POST">
                                <input id="resOrderid" name="resOrderid" type="hidden" class="form-control">
                                <div class="form-group mb-3">
                                    <label>Nomor Invoice:</label>
                                    <input id="resInvnum" name="resInvnum" type="text" class="form-control" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Code:</label>
                                    <input id="resCode" name="resCode" type="text" class="form-control" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Base Value:</label>
                                    <input id="resBasevalue" name="resBasevalue" type="text" class="form-control" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Date:</label>
                                    <input id="resDate" name="resDate" type="date" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Value:</label>
                                    <input id="resValue" name="resValue" type="text" class="form-control">
                                </div>
                                <button type="submit" name="cmdsave" class="btn btn-success pull-right">Tambahkan Invoice ini</button>
                            </form>
                        </div>
                        <div id="boxInvoiceUnsuccess" class="box-body hidden">
                            <div class="loading-amoung"></div>
                            <p id="msgEmpty"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Detail LOP</h5>
                </div>
                <div class="card-body">
                    <div class="row col-12">
                        <div class="col-md-6" style="padding-left: 0px;">
                            <div class="form-group">
                                <label>Divisi:</label>
                                <input name="invnum" type="text" class="form-control" readonly value="<?php echo $drd[0]['divname'];?>">
                            </div>
                            <div class="form-group">
                                <label>Segmen:</label>
                                <input name="invnum" type="text" class="form-control" readonly value="<?php echo $drd[0]['segmentname'];?>">
                            </div>
                            <div class="form-group">
                                <label>Amkomet:</label>
                                <input type="text" class="form-control" readonly value="<?php echo $drd[0]['amkomet'];?>">
                            </div>
                            <div class="form-group">
                                <label>Projectname:</label>
                                <textarea class="form-control" readonly><?php echo $drd[0]['projectname'];?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-right: 0px;">
                            <div class="form-group">
                                <label>Spknum:</label>
                                <input type="text" class="form-control" readonly value="<?php echo $drd[0]['spknum'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nilai KL:</label>
                                <input type="text" class="form-control" readonly value="<?php echo strrev(implode('.',str_split(strrev(strval($drd[0]['nilaikl'])),3))); ?>">
                            </div>
                            <div class="form-group">
                                <label>start kl:</label>
                                <input type="text" class="form-control" readonly value="<?php echo $drd[0]['startkl'];?>">
                            </div>
                            <div class="form-group">
                                <label>end kl:</label>
                                <input type="text" class="form-control" readonly value="<?php echo $drd[0]['endkl'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Invoice Terkait</h5>
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                        <?php if (count ( $detail ) > 0) { ?>
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invnum</th>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Nilai</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Invnum</th>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Nilai</th>
                                    <th class="text-right"></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $detail as $row ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['invnum'];?></td>
                                        <td><?php echo $row['code'];?></td>
                                        <td><?php echo $row['invdate'];?></td>
                                        <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['nilai'])),3))); ?></strong></td>
                                        <td class="text-right js-sweetalert">
                                            <button data-href="<?php echo base_url().$this->router->fetch_class(). '/deletedetail'?>" data-id="<?php echo $row['lopdetailid']; ?>" class="btn btn-xs btn-default" onclick="sweet()"><i class="fa fa-trash-o"> Hapus</i></button>
                                        </td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
        </div>

    </div>
</div>

<script>
	$(function() {
		$('.selectpicker').select2();

		$('#idr1').on('input', function(){
			var value = $('#idr1').val();
			var convert = number_format(value,0,'','.');
			$("#idr1").val(convert);
		});
		$('#resValue').on('input', function(){
			var value = $('#resValue').val();
			var convert = number_format(value,0,'','.');
			$("#resValue").val(convert);
		});

		$('#cariInvoice').on('submit', function () {
			$("#boxInvoiceSuccess").addClass('hidden');
			$("#boxInvoiceUnsuccess").addClass('hidden');
			$('.loading-amoung').html('<div class="text-center" style="padding-bottom:20px;"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

            setTimeout(function(){
	            $('.loading-amoung').html('');
	            var dataPost = $('#cariInvoice').serialize();
	            $.ajax({
		            type: "POST",
		            url: "<?php echo site_url('lop/cariinvoice')?>",
		            data: dataPost,
		            success: function (data) {
			            var respon = JSON.parse(data);
			            if(respon['status'] == 'success'){
				            $("#boxInvoiceSuccess").removeClass('hidden');
				            $("#boxInvoiceUnsuccess").addClass('hidden');

				            $("#resOrderid").val(respon['data']['orderid']);
				            $("#resInvnum").val(respon['data']['invnum']);
				            $("#resCode").val(respon['data']['code']);
				            $("#resBasevalue").val(number_format(respon['data']['basevalue'],0,'','.'));
			            }else{
				            $("#boxInvoiceSuccess").addClass('hidden');
				            $("#boxInvoiceUnsuccess").removeClass('hidden');

				            $("#msgEmpty").html(respon['msg']);
			            }
		            }
	            });
            }, 1000);
		});

		$('.js-sweetalert button').on('click', function () {
			var current_url = "<?php echo base_url("lop");?>";
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
						data: 'lopdetailid=' + id,
						type: 'POST',
						success: function(msg) {
							if(msg == "success"){
								setTimeout(function () {
									var link = '<?php echo site_url('lop/createinvoice/'.$this->uri->segment(3))?>';
									location.href = link;
								}, 1500);
							}

						}
					})

				}
			});
		}

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
	});
</script>
