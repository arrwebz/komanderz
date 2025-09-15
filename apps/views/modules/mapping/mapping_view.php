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
                            <select id="filter_year" class="form-control selectpicker">
                                <option value="">All</option>
                                <?php foreach($years as $y): ?>
                                    <option value="<?= $y['y'] ?>"><?= $y['y'] ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="optSegment" class="form-label fw-semibold">Customers</label>
                            <select id="filter_order_type" class="form-control selectpicker">
                            <option value="">All</option>
                                <option value="PRPO" selected>PRPO</option>
                                <option value="OBL">OBL</option>
                            </select>
                    </div>
                </div>
            </div>
            <button id="btn_filter" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i> Filter
                </div>
            </button>
            <button id="btn_export" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i> Export
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
                        <table id="invoice_table" class="table border table-striped table-bordered display text-nowrap table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th></th> <!-- expand -->
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Project Name</th>
                                    <th>SPB Count</th>
                                    <th>Amount</th>
                                    <th>Invoice Date</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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

<script>
    $(document).ready(function(){
      const table = $('#invoice_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= site_url("mapping/ajax_list") ?>',
            type: 'POST',
            data: function(d){
            d.filter_year = $('#filter_year').val();
            d.filter_order_type = $('#filter_order_type').val();
            },
            error: function(xhr, error, thrown){
            console.log("AJAX Error:", xhr.responseText);
            alert("AJAX Error: " + xhr.status + " " + thrown);
            }
        },
        columns: [
            { data: null, orderable: false, render: function(d,t,r){ return '<span class="expand-btn" data-id="'+r.id+'"><div class="avatar-initial bg-label-danger rounded-3"><i class="ti fs-6 ti-plus"></i></div></span>'; } },
            { data: 'id' },
            { data: 'invoice_no' },
            { data: 'project_name' },
            { data: 'spb_count' },
            { data: 'amount' },
            { data: 'invoice_date' }
        ],
        pageLength: 100,   // default tampil 100 row
        lengthMenu: [ [10, 25, 50, 100, 1000], [10, 25, 50, 100, 1000] ] 
        });

      // filter button
      $('#btn_filter').on('click', function(){ table.ajax.reload(); });

      // export
      $('#btn_export').on('click', function(){
        const y = $('#filter_year').val();
        const t = $('#filter_order_type').val();
        const url = '<?= site_url("mapping/export_excel") ?>?filter_year='+encodeURIComponent(y)+'&filter_order_type='+encodeURIComponent(t);
        window.location = url;
      });

      // handle expand click (child rows show SPB table)
      $('#invoice_table tbody').on('click', '.expand-btn', function(){
        const tr = $(this).closest('tr');
        const row = table.row(tr);
        const invoiceId = $(this).data('id');
        if (row.child.isShown()){
          row.child.hide();
          $(this).html('<div class="avatar-initial bg-label-danger rounded-3"><i class="ti fs-6 ti-plus"></i></div>');
        } else {
          // fetch spbs
          $.getJSON('<?= site_url("mapping/ajax_spb_by_invoice") ?>/'+invoiceId, function(spbs){
            if (!spbs || spbs.length === 0){
              row.child('<div class="child-row">No SPB Payments</div>').show();
            } else {
              let html = '<table style="width:50%; border-collapse:collapse;" border="1"><thead><tr><th>SPB No</th><th>Amount</th><th>SPB Date</th></tr></thead><tbody>';
              spbs.forEach(function(s){
                html += '<tr><td>'+s.spb_no_link+'</td><td style="text-align:left">'+s.spb_amount_fmt+'</td><td>'+s.payment_date+'</td></tr>';
              });
              html += '</tbody></table>';
              row.child(html).show();
            }
            $(this).html('<div class="avatar-initial bg-label-danger rounded-3"><i class="ti fs-6 ti-minus"></i></div>');
          }.bind(this)).fail(function(){
            row.child('<div class="child-row">Gagal fetch SPB</div>').show();
            $(this).html('<div class="avatar-initial bg-label-danger rounded-3"><i class="ti fs-6 ti-minus"></i></div>');
          }.bind(this));
        }
      });
      $('.selectpicker').select2();
    });
  </script>