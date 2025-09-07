<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pengaturan</a></li>
            <li class="active">Faktur Pajak</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form isi pembuatan Faktur Pajak.</h3>
                    </div>
                    <div class="box-body">
                        <?php echo form_open_multipart('fakturpajak/add','id = "formvalidation" class = "form-horizontal"');?>
                        <div class="form-group">
                            <label for="txtCode" class="col-sm-2 control-label">Kode</label>
                            <div class="col-sm-3">
                                <input id="txtCode" name="txtCode" type="number" class="form-control" autocomplete="off">
                                <div id="msg"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="optPriority" class="col-sm-2 control-label">Unit</label>
                            <div class="col-sm-3">
                                <select name="optUnit" class="form-control selectpicker">
                                    <option value="KOMET">Komet</option>
                                    <option value="MESRA">Mesra</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="optPriority" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-3">
                                <select name="optStatus" class="form-control selectpicker">
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="cmdsave" class="btn btn-fill btn-success">Simpan</button>
                        <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>fakturpajak';return false;">Batal</button>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function() {
        $('.selectpicker').select2();

        $("#txtCode").on("blur", function(e) {
            $('#msg').hide();
            if ($('#txtCode').val() == null || $('#txtCode').val() == "") {
                $('#msg').show();
                $("#msg").html("<i class='fa fa-bell-o'></i> Kode Faktur Pajak tidak boleh kosong.").css("color", "#f39c12");
                $('#cmdsave').hide();
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('fakturpajak/ajaxcheckcode'); ?>",
                    data: $('#formvalidation').serialize(),
                    dataType: "html",
                    cache: false,
                    success: function(msg) {
                        if(msg === 'FALSE') {
                            $('#msg').show();
                            $("#msg").html("<i class='fa fa-times-circle-o'></i> Kode Faktur sudah terpakai.").css("color", "red");
                            $('#cmdsave').hide();
                            console.log(msg);
                        } else {
                            $('#msg').show();
                            $("#msg").html("<i class='fa fa-check'></i> Kode Faktur tersedia").css("color", "green");
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
</script>