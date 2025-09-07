<style>
    table thead{
        position: sticky !important;
    }

    thead {
        position: sticky;
        top: 0;
        border-bottom: 2px solid #ccc;
    }
    table thead {
        inset-block-start: 0 !important; /* "top" */
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Daftar Karyawan</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Pencarian</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <form action="<?php echo site_url($this->router->fetch_class().'/search');?>" method="GET">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bulan</label>
                                <select name="optMonth" class="form-control selectpicker">
                                    <option disabled selected>Pilih</option>
                                    <option value="01" <?php if(date('m') == '01'){ echo 'selected'; }?>>Januari</option>
                                    <option value="02" <?php if(date('m') == '02'){ echo 'selected'; }?>>Februari</option>
                                    <option value="03" <?php if(date('m') == '03'){ echo 'selected'; }?>>Maret</option>
                                    <option value="04" <?php if(date('m') == '04'){ echo 'selected'; }?>>April</option>
                                    <option value="05" <?php if(date('m') == '05'){ echo 'selected'; }?>>Mei</option>
                                    <option value="06" <?php if(date('m') == '06'){ echo 'selected'; }?>>Juni</option>
                                    <option value="07" <?php if(date('m') == '07'){ echo 'selected'; }?>>Juli</option>
                                    <option value="08" <?php if(date('m') == '08'){ echo 'selected'; }?>>Agustus</option>
                                    <option value="09" <?php if(date('m') == '09'){ echo 'selected'; }?>>September</option>
                                    <option value="10" <?php if(date('m') == '10'){ echo 'selected'; }?>>Oktober</option>
                                    <option value="11" <?php if(date('m') == '11'){ echo 'selected'; }?>>Nopember</option>
                                    <option value="12" <?php if(date('m') == '12'){ echo 'selected'; }?>>Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="optYear" class="form-control selectpicker">
                                    <option disabled>Pilih</option>
                                    <?php for($i=date('Y')-3; $i<=date('Y'); $i++){ ?>
                                        <option value="<?php echo $i;?>" <?php if(date('Y') == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!--<div class="form-group">
                                <label>Status</label>
                                <select name="optStatus" class="form-control selectpicker">
                                    <option selected disabled>Pilih</option>
                                    <option value="0">Belum Absen</option>
                                    <option value="1">Masuk</option>
                                    <option value="3">Cuti Full Day</option>
                                    <option value="4">Cuti Half Day</option>
                                    <option value="5">Cuti Sakit</option>
                                </select>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-fill btn-default">Filter</button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Daftar hadir karyawan.</h3>
                        <div class="pull-right">
                            <h2><?php echo $datenow; ?></h2>
                            <?php echo form_open('empreport/export');?>
                            <?php echo form_hidden('hdnMonth', $month); ?>
                            <?php echo form_hidden('hdnYear', $year); ?>
                            <button type="submit" name="btnSubmit" class="btn btn-sm btn-success pull-right">
                                <i class="fa fa-download"></i> Excel
                            </button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="material-datatables table-responsive">
                            <?php if (count ( $drd ) > 0) { ?>
                                <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle">No</th>
                                            <th style="vertical-align: middle" width="200px">Nama</th>
                                            <th style="vertical-align: middle" width="300px">Senin, <?php echo $senin;?></th>
                                            <th style="vertical-align: middle" width="300px">Selasa, <?php echo $selasa;?></th>
                                            <th style="vertical-align: middle" width="300px">Rabu, <?php echo $rabu;?></th>
                                            <th style="vertical-align: middle" width="300px">Kamis, <?php echo $kamis;?></th>
                                            <th style="vertical-align: middle" width="300px">Jumat, <?php echo $jumat;?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        <?php foreach($drd as $row){ ?>
                                            <?php $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['fullname'];?></td>
                                                <td>
                                                    <b>Absen :</b><?php echo $row['datesenin'];?>
                                                    <br><br>
                                                    <b>Kegiatan :</b><br><?php echo $row['notesenin'];?>
                                                </td>
                                                <td>
                                                    <b>Absen :</b><?php echo $row['dateselasa'];?>
                                                    <br><br>
                                                    <b>Kegiatan :</b><br><?php echo $row['noteselasa'];?>
                                                </td>
                                                <td>
                                                    <b>Absen :</b><?php echo $row['daterabu'];?>
                                                    <br><br>
                                                    <b>Kegiatan :</b><br><?php echo $row['noterabu'];?>
                                                </td>
                                                <td>
                                                    <b>Absen :</b><?php echo $row['datekamis'];?>
                                                    <br><br>
                                                    <b>Kegiatan :</b><br><?php echo $row['notekamis'];?>
                                                </td>
                                                <td>
                                                    <b>Absen :</b><?php echo $row['datejumat'];?>
                                                    <br><br>
                                                    <b>Kegiatan :</b><br><?php echo $row['notejumat'];?>
                                                </td>
                                            </tr>
                                        <?php } ?>
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

<script type="text/javascript">
	$(document).ready(function() {

		var table = $('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true

		});
		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true});
		$('.selectpicker').select2();
	});

</script>