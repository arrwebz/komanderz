<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Collection</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('knopes');?>">Mapping Invoice to SPB</a>
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
<section class="content">
    <div class="card card-hover">
        <div class="card-header">
            <h4 class="mb-0 text-dark fs-5">Search</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Order Type</label>
                            <select id="filterYear">
                                <?php for ($y = date('Y'); $y >= 2020; $y--): ?>
                                <option value="<?= $y ?>"><?= $y ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="optSegment" class="form-label fw-semibold">Customers</label>
                            <select id="filterOrderType">
                            <option value="">All Types</option>
                            <option value="PRPO">PANJAR</option>
                            <option value="OBL">OBL</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" name="cmdsave" id="btnExport" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i> Excel
                </div>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">List of invoices</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <table id="reportTable" class="display">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>SPB Number</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
    let table = $('#reportTable').DataTable({
        ajax: {
        url: '<?= site_url("mapping/ajax_invoice_spb_data") ?>',
        data: function(d) {
            d.year       = $('#filterYear').val();
            d.order_type = $('#filterOrderType').val();
        }
        },
        columns: [
        { data: 'inv_number' },
        { data: 'spb_number' },
        { data: 'spb_value', render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ') },
        { data: 'spbdat' }
        ]
    });

    $('#filterYear, #filterOrderType').on('change', function() {
        table.ajax.reload();
    });

    $('#btnExport').on('click', function() {
        let year       = $('#filterYear').val();
        let order_type = $('#filterOrderType').val();

        $.ajax({
        url: '<?= site_url("mapping/export_invoice_spb_excel") ?>',
        method: 'POST',
        data: { year, order_type },
        xhrFields: {
            responseType: 'blob'
        },
        success: function(blob) {
            let link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = `invoice_spb_${year}.xlsx`;
            link.click();
        }
        });
    });
    });

</script>