<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small><?php echo $brand; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Aktiva Perusahaan</a></li>
        <li class="active">Detail Aktiva</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $this->config->item('uploads_uri')?>assets/<?php echo $assetphoto;?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $assetname; ?></h3>

              <p class="text-muted text-center"><?php echo $seri; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nomor Seri</b> <a class="pull-right"><?php echo $serialnumber; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> 
				<?php if($status == '1'){ ?>
						<span class="badge bg-light-blue pull-right">Tersedia</span>
					<?php } elseif($status == '2') { ?>
						<span class="badge bg-green pull-right">Dipakai</span>
					<?php } elseif($status == '3') { ?>
						<span class="badge bg-yellow pull-right">Terjual</span>
					<?php } else { ?>
						<span class="badge bg-red pull-right">Tidak Tersedia</span>
				<?php } ?>
                </li>
                <li class="list-group-item">
                  <b>Jumlah</b> <a class="pull-right"><?php echo $amount; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Pengguna</b> <a class="pull-right"><?php echo $client; ?></a>
                </li>
              </ul>

              <a target="_blank" href="https://www.pricebook.co.id" class="btn btn-primary btn-block"><b>Cek Harga Terbaru</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Spesifikasi</strong>

              <p class="text-muted">
                <?php echo $spec; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Lokasi</strong>

              <p class="text-muted" style="text-transform: uppercase;"><?php echo $location; ?></p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Catatan</strong>

              <p><?php echo $notes; ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#information" data-toggle="tab">Info</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="information">
				<table id="clientTable" class="table table-striped table-hover">
					<tbody>
						<tr>
							<td><b>Kategori</b></td>
							<td><span class="label" style="background-color:#FFF;color:#0073b7;border:1px solid #0073b7;"><?php echo $catname; ?></span></td>
						</tr>
						<tr>
							<td><b>Jenis</b></td>
							<td><span class="label label-primary"><?php echo $typename; ?></span></td>
						</tr>
						<tr>
							<td><b>Merek</b></td>
							<td><?php echo $brandname; ?></td>
						</tr>
						<tr>
							<td><b>Warna</b></td>
							<td><?php echo $color; ?></td>
						</tr>
						<tr>
							<td><b>Kondisi</b></td>
							<td><?php echo $condition; ?></td>
						</tr>
						<tr>
							<td><b>Tahun</b></td>
							<td><?php echo $assetdate; ?></td>
						</tr>

						<tr>
							<td><b>Harga</b></td>
							<td><?php echo $price; ?></td>
						</tr>
						<tr>
							<td><b>Tanggal Beli</b></td>
							<td><?php echo $purchasedate; ?></td>
						</tr>
						<tr>
							<td><b>Garansi</b></td>
							<td><?php echo $warranty; ?></td>
						</tr>
					</tbody>
				</table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col --> 
		<div class="col-xs-12"> 
          <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
					 
	$(document).ready(function() {
		
		var table = $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });	
				
		$('#idr').on('input', function(){

			var value = $('#idr').val(); 

			var convert = number_format(value,0,'','.');

			$("#idr").val(convert); 

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