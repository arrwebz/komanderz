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

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/add'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Unit</th>
                                <th>Kode Faktur Pajak</th>
                                <th>Status</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Unit</th>
                                <th>Kode Faktur Pajak</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drd as $row ) {
                                $status = $row['status'];
                                if($status == 0){
                                    $show_status = '';
                                }
                                ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td style="text-transform: uppercase;"><?php echo $row['unit'] ?></td>
                                    <td style="text-transform: uppercase;"><?php echo $row['code'] ?></td>
                                    <td><?php if($row['status'] == '1'){ ?>
                                            <span class="label label-success">Aktif</span>
                                        <?php } elseif($row['status'] == '2') { ?>
                                            <span class="label label-danger">Tidak Aktif</span>
                                        <?php } else { ?>
                                            <span class="label label-info">Tidak diketahui</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-right js-sweetalert">
                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/edit/'.$row['fakturpajakid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                            <i class="fs-4 ti ti-edit text-warning"></i>
                                        </a>
                                        <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['fakturpajakid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" onclick="sweet()">
                                            <i class="fs-4 ti ti-trash text-danger"></i>
                                        </button>
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

<script>
    $(document).ready(function() {
        var table = $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });
    });

    $('.js-sweetalert button').on('click', function () {
        var current_url = "<?php echo base_url("fakturpajak");?>";
        var uri = $(this).attr("data-href");
        var id = $(this).attr("data-id");
        showCancelMessage(current_url,uri,id);
    });

    function showCancelMessage(current_url, uri, id){
        swal({
            title: "Hapus Data",
            text: "Apakah anda yakin untuk menghapus data ini selamanya?",
            icon: "warning",
            buttons: ["Batal", "Hapus!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("Anda telah berhasil menghapus data ini selamanya.", {
                    icon: "success",
                    buttons: false,
                });

                $.ajax({
                    url: uri,
                    data: 'fakturpajakid=' + id,
                    type: 'POST',
                    success: function(msg) {
                        if(msg == "success"){
                            setTimeout(function () {
                                location.href = current_url;
                            }, 1500);
                        }

                    }
                })

            }
        });
    }
</script>