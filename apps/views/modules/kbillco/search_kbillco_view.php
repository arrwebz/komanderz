<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Billing</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('letter');?>">Invoice KOMET</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Search.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div> 
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-hover" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Search Result</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table  table-striped table-bordered display text-nowrap table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>SPK / VSO</th>
                                        <th>Customer</th>
                                        <th>Judul</th>
                                        <th>Nilai</th>
                                        <th>Umur Piutang</th>
                                        <th class="disabled-sorting text-right">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;">
                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['invnum'].'/INV/'.$row['jobtype'].'/'.date('m', strtotime($row['invdate'])).'/'.date('y', strtotime($row['invdate'])) ?></strong>
                                                </a>
                                            </td>
                                            <td style="text-transform: uppercase;"><?php echo $row['spknum'] ?></td>
                                            <td style="text-transform: uppercase;"><?php echo $row['segment'] ?></td>
                                            <td><?php echo substr($row['projectname'],0,25);?>...</td>
                                            <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td>
                                            <td>
                                                <?php if($row['status'] != '1') {?>
													<?php echo $row['intervaldat']; ?> hari
												<?php } else { ?>
														-
												<?php } ?>
                                            </td>
                                            <td class="text-right">
                                                <?php if($row['status'] == '1') { ?>
                                                    <span class="label label-success">Cair</span>
                                                <?php } elseif($row['status'] == '2' || $row['status'] == '13') { ?>
                                                    <span class="label label-primary">Segmen</span>
                                                <?php } elseif($row['status'] == '3' || $row['status'] == '14') { ?>
                                                    <span class="label label-warning">PJM</span>
                                                <?php } elseif($row['status'] == '4' || $row['status'] == '15') { ?>
                                                    <span class="label label-warning">ASD</span>
                                                <?php } elseif($row['status'] == '5' || $row['status'] == '16') { ?>
                                                    <span class="label label-success">Logistik</span>
                                                <?php } elseif($row['status'] == '6' || $row['status'] == '18') { ?>
                                                    <span class="label label-success">Keuangan</span>
                                                <?php } elseif($row['status'] == '7' || $row['status'] == '17') { ?>
                                                    <span class="label label-info">Legal</span>
                                                <?php } elseif($row['status'] == '8') { ?>
                                                    <span class="label label-primary">Posting</span>
                                                <?php } elseif($row['status'] == '9') { ?>
                                                    <span class="label label-danger">Batal</span>
                                                <?php } elseif($row['status'] == '10') { ?>
                                                    <span class="label label-warning">Forecasting</span>
                                                <?php } elseif($row['status'] == '11') { ?>
                                                    <span class="label label-info">Materai</span>
                                                <?php } elseif($row['status'] == '12') { ?>
                                                    <span class="label label-info">Signed</span>
                                                <?php } elseif($row['status'] == '0' && $row['invnum'] == 0) { ?>
                                                    <span class="label label-default">Unknown</span>
                                                <?php } else { ?>
                                                    <span class="label label-default">Printed</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                            </table>
                        <?php } else { echo 'Data not found!'; }?>
                    </div>
                </div>
				<div class="card-footer">
					<button type="button" class="btn btn-primary rounded-pill px-4 waves-effect waves-light" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>';return false;">Back</button>
				</div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
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
        $('.selectpicker').select2();
    });
</script>