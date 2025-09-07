<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">LOP</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('kpros');?>">Prospect</a>
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
                        <a href="<?php echo base_url().$this->router->fetch_class().'/addnew'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Divisi</th>
                                <th>Segmen</th>
                                <th>User</th>
                                <th>Nilai</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th class="disabled-sorting text-right"></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Divisi</th>
                                <th>Segmen</th>
                                <th>User</th>
                                <th>Nilai</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th class="text-right"></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drd as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['division'];?></td>
                                    <td><?php echo $row['segment'];?></td>
                                    <td style="text-transform: uppercase;"><?php echo $row['amuser'] ?></td>
                                    <td style="color: #ef4444;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></strong></td>
                                    <td><?php echo date('d-m-Y', strtotime($row['reqdate']));?></td>
                                    <td>
                                        <?php if($row['status'] == '0') { ?>
                                            <span class="label label-danger">Open</span>
                                        <?php } else { ?>
                                            <span class="label label-success">Closed</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-right js-sweetalert">
                                        <!--<a href="<?php /*echo base_url().$this->router->fetch_class(). '/details/'.$row['prospectid']; */?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-file-text-o"></i></a>-->
                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/editdata/'.$row['prospectid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row">
                                            <i class="fs-4 ti ti-edit text-warning"></i>
                                        </a>
                                        <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['prospectid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center delete-row">
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
    $(function() {
        var table = $('#datatables').DataTable({
	        'responsive'  : true,
	        'paging'      : true,
	        'lengthChange': false,
	        'searching'   : true,
	        'ordering'    : true,
	        'info'        : true,
	        'autoWidth'   : true,
	        'scrollX': true,
        });
    });
</script>