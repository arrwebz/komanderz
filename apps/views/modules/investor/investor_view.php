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
            <li><a href="#">Investor</a></li>
            <li class="active">List Investor</li>
        </ol>
    </section>
    <div id="InvestorNotif" onload="InvestorNotif()"></div>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Pencarian</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php echo form_open('investor/search');?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Kontrak</label>
                            <input name="txtInv" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Investor</label>
                            <select name="optSegment" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <?php

                                if(!empty($invname)){
                                    foreach($invname as $row){
                                        if (!empty($invname) && $invname == $row['investorid'] ) {
                                            $strselected = "selected";
                                        } else {
                                            $strselected = " ";
                                        }
                                        echo '<option value="'.$row['investorid'].'"'. $strselected.'>'.$row['name'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Investor name not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="optMonth" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="optYear" class="form-control selectpicker">
                                <option disabled>Pilih</option>
                                <?php
                                $start_year = '2017';
                                $end_year = date('Y');
                                for($i = $start_year; $i<=$end_year; $i++):?>
                                    <option value="<?php echo $i?>" <?php if($i == date('Y')){ echo 'selected'; }?> ><?php echo $i?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" name="cmdsave" class="btn btn-fill btn-default">Filter</button>
                <?php echo form_close();?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar investor Komet.</h3>
                    </div>
                    <div class="box-body">
                        <p>
                            <a href="<?php echo base_url().$this->router->fetch_class().'/addcontract'; ?>" class="btn btn-sm btn-primary"><i class="fa fa-clipboard"></i> Buat Kontrak</a>

                            <a href="<?php echo base_url().$this->router->fetch_class().'/addinvestor'; ?>" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i> Investor Baru</a>
                        </p>
                        <div class="material-datatables">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kontrak</th>
                                        <th>Nama</th>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Jumlah Invest</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kontrak</th>
                                        <th>Nama</th>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Jumlah Invest</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;">
                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['indanaid']; ?>" style="color: #00bcd4;">
                                                    <strong><?php echo $row['code'] ?></strong>
                                                </a>
                                            </td>
                                            <td><?php echo $row['investname'];?></td>
                                            <td><?php echo date('d F Y', strtotime($row['startdate']));?></td>
                                            <td><?php echo date('d F Y', strtotime($row['endate']));?></td>
                                            <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['totalinvest'])),3))); ?></strong></td>
                                            <td class="text-right js-sweetalert">
                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/profiles/'.$row['investorid']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-user"></i> Profil Investor</a>
                                            </td>
                                        </tr>
                                    <?php }	?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
			'autoWidth'   : true

		});

		$('.selectpicker').select2();

	});

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url("investor");?>";
		var uri = $(this).attr("data-href");
		var id = $(this).attr("data-id");
		showCancelMessage(current_url,uri,id);
	});


	function InvestorNotif() {

		swal({
			title: "<?php echo $contractend[0]['totalendcontract']; ?> kontrak",
			text: "Berakhir di bulan ini.",
			icon: "warning",
			confirm: true,
		});
	}
	window.onload = InvestorNotif;

	function showCancelMessage(current_url, uri, id){
		swal({
			title: "Yakin menghapus data?",
			text: "Data Dana Investor yang berkaitan juga akan terhapus!  ",
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
					data: 'indanaid=' + id,
					type: 'POST',
					success: function(msg) {
						if(msg == "success"){
							setTimeout(function () {
								//location.href = current_url;
							}, 1500);
						}

					}
				})

			}
		});
	}
</script>
