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
            <li class="active">Pengajuan SPB</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info  alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Informasi!</h4>
                    Nomor SPB terakhir KOMET & PADI <?php echo $code_spb[0]['last_code_spb'];?>
                </div>
            </div>
            <?php echo form_open_multipart('pnopes/addspb','id = "formvalidation"');?>
            <?php echo form_hidden('hdnOrderid',$orderid); ?>
            <?php echo form_hidden('hdnSpbid',$spbid); ?>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nomor</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nomor Invoice:</label>
                            <input name="txtInvoice" type="text" class="form-control" value="<?php echo $invoice; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nomor SPB:</label>
                            <div class="input-group">
                                <?php
                                $code = explode('/',$kodenomor);
                                $checked = '';
                                if(count($code) >= 2){
                                    $kode_lpdb = substr($code[1],0,1);
                                    if($kode_lpdb == 'L'){
                                        $checked = 'checked';
                                    }
                                }
                                ?>
                                <span class="input-group-addon">
                                    <input name="chklpdb" type="checkbox" value="L" <?php echo $checked;?>> LPDB
                                </span>
                                <input id="txtKodenomor" name="txtKodenomor" type="text" class="form-control">
                            </div>
                            <div id="msg"></div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pekerjaan:</label>
                            <select name="optJobtype" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <option value="IT">IT</option>
                                <option value="BS">BS</option>
                                <option value="TK">TK</option>
                                <option value="PD">PD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kepada:</label>
                            <input name="txtCustomer" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Untuk Pembayaran:</label>
                            <textarea name="txtInfo" type="text" class="form-control" style="width:445px; height:183px;"><?php echo $namaproyek ?></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Pembayaran</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nilai SPB:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Rp
                                </div>
                                <input name="txtValue" type="text" id="idr" class="form-control" value="<?php echo $nilainet;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal SPB:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="txtSpbdate" type="text" class="form-control datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pembayaran:</label>
                            <select id="optPayment" name="optPayment" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
                                <option value="cash">CASH</option>
                                <option value="transfer">TRANSFER</option>
                            </select>
                        </div>
                        <div id="wrapPembayaranCash" class="hidden">
                            <div class="form-group">
                                <label>Atas Nama:</label>
                                <input id="txtAccnamecash" name="txtAccnamecash" type="text" class="form-control">
                            </div>
                        </div>
                        <div id="wrapPembayaranTf" class="hidden">
                            <div class="form-group">
                                <label>Atas Nama:</label>
                                <select id="txtAccname" name="txtAccname" class="form-control selectpicker" data-width="100%">
                                    <option disabled selected>Pilih</option>
                                    <?php foreach($bank as $row){ ?>
                                        <option value="<?php echo $row['accname'];?>" data-option="<?php echo $row['bankname'].','.$row['accnum'];?>"><?php echo $row['accname'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bank:</label>
                                <input id="optBank" name="optBank" type="text" class="form-control">
                                <!--<select name="optBank" class="form-control selectpicker" onchange="check(this);">
                                    <option disabled selected>Pilih</option>
                                    <option value="bca">BCA</option>
                                    <option value="mandiri">MANDIRI</option>
                                    <option value="bni">BNI</option>
                                    <option value="bri">BRI</option>
                                    <option value="other">LAINNYA...</option>
                                </select>-->
                            </div>
                            <div class="form-group">
                                <label>No Rekening:</label>
                                <input id="txtAccnum" name="txtAccnum" type="text" class="form-control">
                            </div>
                            <!--<div class="form-group" id="otherid" style="display: none;">
                                <label>Bank Lainnya:</label>
                                <input name="txtBankother" type="text" class="form-control">
                            </div>-->
                        </div>
                        <div class="form-group">
                            <label>Nama Pemohon:</label>
                            <input name="txtApplicant" type="text" class="form-control">
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" name="cmdsave" class="btn btn-success pull-right">Selesai</button>
            </div>
            <?php echo form_close();?>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">

    $(document).ready(function() {

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
	    $("#idr").trigger('input');

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

        $("#txtKodenomor").on("blur", function(e) {
            $('#msg').hide();
            if ($('#txtKodenomor').val() == null || $('#txtKodenomor').val() == "") {
                $('#msg').show();
                $("#msg").html("<i class='fa fa-bell-o'></i> Nomor SPB tidak boleh kosong.").css("color", "#f39c12");
                $('#cmdsave').hide();
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('pnopes/ajaxcheckspb'); ?>",
                    data: $('#formvalidation').serialize(),
                    dataType: "html",
                    cache: false,
                    success: function(msg) {
                        if(msg === 'FALSE') {
                            $('#msg').show();
                            $("#msg").html("<i class='fa fa-times-circle-o'></i> Nomor SPB sudah terpakai.").css("color", "red");
                            $('#cmdsave').hide();
                            console.log(msg);
                        } else {
                            $('#msg').show();
                            $("#msg").html("<i class='fa fa-check'></i> Nomor SPB tersedia").css("color", "green");
                            $('#cmdsave').show();
                            console.log(msg);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#msg').show();
                        $("#msg").html(textStatus + " " + errorThrown);
                    }
                });
            }
        });
    });

    $("#optPayment").on('change', function () {
	    var valopt = this.value;
	    if(valopt == 'cash'){
		    $("#wrapPembayaranCash").removeClass('hidden');
		    $("#wrapPembayaranTf").addClass('hidden');

		    $("#txtAccnamecash").removeAttr('disabled','');
		    $("#txtAccname").attr('disabled','');
		    $("#txtAccnum").attr('disabled','');
		    $("#optBank").attr('disabled','');

		    $("#txtAccnamecash").val('CASH - ');
	    }else if(valopt == 'transfer'){
		    $("#wrapPembayaranCash").addClass('hidden');
		    $("#wrapPembayaranTf").removeClass('hidden');

		    $("#txtAccnamecash").addClass('disabled','');
		    $("#txtAccname").removeAttr('disabled','');
		    $("#txtAccnum").removeAttr('disabled','');
		    $("#optBank").removeAttr('disabled','');
	    }else{
		    $("#wrapPembayaranCash").addClass('hidden');
		    $("#wrapPembayaranTf").addClass('hidden');
	    }
    });

    $("#txtAccname").on('change', function () {
	    var valOption = $('option:selected', this).attr('data-option');
	    var split = valOption.split(",");

	    var bank = split[0];
	    var norek = split[1];

	    $("#optBank").val(bank);
	    $("#txtAccnum").val(norek);
    });
</script>