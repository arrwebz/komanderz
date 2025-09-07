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
            <li><a href="#">Billing</a></li>
            <li class="active">Add Prospect Order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php echo form_open_multipart('kpros/editdata');?>
            <input type="hidden" name="txtProspectid" value="<?php echo $prospectid;?>"/>
            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Divisi:</label>
                            <select name="optDivision" id="optDivision" class="form-control selectpicker" >
                                <option disabled selected>Pilih</option>
                                <?php

                                if(!empty($division)){
                                    foreach($division as $row){
                                        if (!empty($divisi) && $divisi == $row['divisionid'] ) {
                                            $strselected = "selected";
                                        } else {
                                            $strselected = " ";
                                        }
                                        echo '<option value="'.$row['divisionid'].'"'. $strselected .'>'.$row['code'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Division not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Segmen:</label>
                            <select name="optSegment" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <?php

                                if(!empty($segment)){
                                    foreach($segment as $row){
                                        if (!empty($segmen) && $segmen == $row['segmentid'] ) {
                                            $strselected = "selected";
                                        } else {
                                            $strselected = " ";
                                        }
                                        echo '<option value="'.$row['segmentid'].'"'. $strselected.'>'.$row['name'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Segment not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nominal</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>AM User:</label>
                            <input name="txtAmuser" type="text" class="form-control" value="<?php echo $amuser; ?>">
                        </div>
                        <div class="form-group">
                            <label>AM Internal:</label>
                            <input name="txtAmkomet" type="text" class="form-control" value="<?php echo $amkomet; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal permintaan:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="txtReqdate" type="text" class="form-control datepicker" value="<?php echo $reqdate; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nilai:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Rp
                                </div>
                                <input name="txtValue" type="text" id="idr" class="form-control" value="<?php echo $value; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Closed by Invoice</h3>
                </div>
                <div class="box-body">
                <form>
                <input name="hdnOrderid" type="hidden" id="hdnOrderid" class="form-control">
                  <div class="form-group">
                    <label>Nomor Invoice:</label>
                    <div class="input-group">
                    <input name="txtInv" id="txtInv" type="text" class="form-control">
                        <div class="input-group-addon">
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="cmdsave" id="cmdsave" class="btn btn-info">Tambah</button>
                  </div>

                </form>
                  <div class="material-datatables">

                    </div>
                </div>
                <!--
              </div>
              <!--
            </div>
            <!-- /.col -->
            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" name="cmdsave" id="cmdsave" class="btn btn-success pull-right">Selesai</button>
            </div>
            <?php echo form_close();?>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                    <tr>
                        <td>Invoice</td>
                        <td>Segmen</td>
                        <td>Nilai Dasar</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($datainv as $row) { ?>
                        <tr>
                            <td><?php echo $row['invnum']; ?></td>
                            <td><?php echo $row['segment']; ?></td>
                            <td><?php echo $row['basevalue']; ?></td>
                            <td><button class="btn btn-info btn-xs" id="select"
                                        data-id="<?php echo $row['orderid']; ?>"
                                        data-invnum="<?php echo $row['invnum']; ?>"
                                >
                                    <i class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

	$(document).ready(function() {

		$(document).on('click','#select', function() {
			var orderid = $(this).data('id');
			var invnum = $(this).data('invnum');
			$('#hdnOrderid').val(orderid);
			$('#txtInv').val(invnum);
			$('#myModal').modal('hide');
		})


		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			todayHighlight: true});

		$('.selectpicker').select2();

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
