<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small>Purchase Order</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">PADI</li>
            <li class="active">Purchase Order</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!--Pencarian-->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pencarian</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form id="formSearch" action="javascript:">
                        <div class="box-body" style="padding-bottom: 24px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor PO:</label>
                                    <input id="filterCode" name="ponumber" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button id="cariData" class="btn btn-fill btn-default" type="submit">
                                    Filter
                                </button>
                                <label>&nbsp;</label>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Data -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar PO PADI</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo site_url('ppo/addpo');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah PO</a>
                        <div id="dataSearch" ></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        $('.selectpicker').select2();

        /* DATA TABLE */
        $('#formSearch').on('submit', function () {
            $('#dataSearch').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

            $.ajax({
                type: "POST",
                url: '<?php echo site_url('ppo/search')?>',
                data: $('#formSearch').serialize(),
                success: function (data) {
                    $('#dataSearch').html(data);
                }
            });
        });
        $('#formSearch').trigger('submit');
        /* DATA TABLE */
    });
</script>