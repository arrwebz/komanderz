<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Setting</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('fakturpajak');?>">Faktur Pajak</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Update Faktur Pajak</li>
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

<?php echo form_open_multipart('fakturpajak/edit', 'id = "formvalidation" class = "form-horizontal"');?>
<?php echo form_hidden('fpId',$id); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Update Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Faktur Pajak</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="optStatus" class="form-control selectpicker">
                                <option value="1" <?php if($status == '1') echo 'selected' ?>>Aktif</option>
                                <option value="2" <?php if($status == '2') echo 'selected' ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Kode Faktur Pajak</label>
                            <input id="txtCode" name="txtCode" type="text" class="form-control" value="<?php echo $kode ?>" autocomplete="off">
                            <div id="msg"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Unit</label>
                            <select name="optUnit" class="form-control selectpicker">
                                <option value="KOMET" <?php if($unit == 'KOMET') echo 'selected' ?>>KOMET</option>
                                <option value="MESRA" <?php if($unit == 'MESRA') echo 'selected' ?>>MESRA</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="cmdsave" class="btn btn-fill btn-success">Simpan</button>
                <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>fakturpajak';return false;">Batal</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>

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