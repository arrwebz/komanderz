<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Billing</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('kprpo');?>">Down Payment</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Tambah Invoice Terkait</li>
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

<div class="alert alert-info" role="alert">
    <h4><i class="ti ti-info-circle fs-5 text-danger me-2 flex-shrink-0"></i> Penting</h4>
    Di bawah ini merupakan daftar Invoice untuk PRPO terkait. Silahkan centang Invoice untuk dapat dikaitkan dengan PRPO. Klik tombol Tambah Invoice untuk menkonfirmasi Invoice.
</div>

<section class="content">
    <div class="card card-hover">
        <div class="card-header">
            <h4 class="mb-0 text-dark fs-5">Silahkan pilih Invoice yang ingin dikaitkan.</h4>
        </div>
        <?php echo form_open('kprpo/createtermin');?>
        <?php echo form_hidden('hdnPrpoid',$prpoid); ?>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive pb-9">
                    <?php echo $this->session->flashdata('error'); ?>
                    <?php if (count ( $drd ) > 0) { ?>
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Kode Order</th>
                                <th>Segmen</th>
                                <th>Invoice</th>
                                <th>Faktur</th>
                                <th>Nilai Dasar</th>
                                <th>Tanggal Invoice</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Kode Order</th>
                                <th>Segmen</th>
                                <th>Invoice</th>
                                <th>Faktur</th>
                                <th>Nilai Dasar</th>
                                <th>Tanggal Invoice</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ( $drd as $row ) { ?>
                                <tr>
                                    <td><input type="checkbox" name="termin[]" value="<?php echo $row['orderid'] ?>"></td>
                                    <td style="text-transform: uppercase;"><a target='_blank' href="<?php echo base_url().'knopes/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code'] ?></strong></a></td>
                                    <td><?php echo $row['segment'] ?></td>
                                    <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                                    <td><?php echo $row['faknum'] ?></td>
                                    <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo date('d-m-Y', strtotime($row['invdate']));?></td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php }?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-4">
                        <label for="txtNama" class="form-label fw-semibold">Nilai Justifikasi</label>
                        <input name="txtJstvalue" type="text" id="idr1" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="txtNama" class="form-label fw-semibold">Nilai Negosiasi</label>
                        <input name="txtNegovalue" type="text" id="idr2" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button name="btnCreate" type="submit" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Konfirmasi Invoice</button>
            <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
        </div>
        <?php echo form_close();?>
    </div>
</section>

<script type="text/javascript">
	$(document).ready(function() {

		$('#datatables').DataTable({
			'paging'      : false,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'responsive'  : true
		});

		$('.selectpicker').select2();

		$('.icheck-blue input[type="checkbox"]').iCheck({
			checkboxClass: 'icheckbox_flat-blue',
			radioClass: 'iradio_flat-blue'
		});
		//Enable check and uncheck all functionality
		$(".checkbox-toggle").click(function () {
			var clicks = $(this).data('clicks');
			if (clicks) {
				//Uncheck all checkboxes
				$(".icheck-blue input[type='checkbox']").iCheck("uncheck");
				$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
			} else {
				//Check all checkboxes
				$(".icheck-blue input[type='checkbox']").iCheck("check");
				$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
			}
			$(this).data("clicks", !clicks);
		});

		$('#idr1').on('input', function(){

			var value = $('#idr1').val();

			var convert = number_format(value,0,'','.');

			$("#idr1").val(convert);

		});

		$('#idr2').on('input', function(){

			var value = $('#idr2').val();

			var convert = number_format(value,0,'','.');

			$("#idr2").val(convert);

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

	});

</script>