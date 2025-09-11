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
            <li class="active">Mapping Invoice SPB</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar invoice Komet.</h3>
                    </div>
                    <select id="filterYear">
                    <?php for ($y = date('Y'); $y >= 2020; $y--): ?>
                        <option value="<?= $y ?>"><?= $y ?></option>
                    <?php endfor; ?>
                    </select>

                    <select id="filterOrderType">
                    <option value="">All Types</option>
                    <option value="cash">Cash</option>
                    <option value="credit">Credit</option>
                    </select>

                    <button id="btnExport">Export Excel</button>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="material-datatables">
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
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
        { data: 'invoice_number' },
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