<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Collection</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('ktrack');?>">Tracking</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Collection Alert</li>
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
<div class="col-sm-12 col-md-12">
    <div class="card overflow-hidden">
        <div class="d-flex flex-row">
            <div class="p-4 text-bg-danger">
                <h3 class="text-white box mb-0">
                    <i class="ti ti-info-circle"></i>
                </h3>
            </div>
            <div class="p-3">
                <h3 class="text-danger mb-0 fs-6">Attention!</h3>
                <span class="text-muted">Exceeding the billing deadline for NOPES, PADI, IBL & OBL!</span>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
 

    <section class="content">

        <div class="row">
            <!-- Nopes -->
            <div class="col-md-12">
				<div class="card" style="margin-bottom:50px;">
					<div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                        <h3 class="card-title text-white mb-0">Invoice NOPES & PADI</h3>						   
                    </div>
                    <div class="card-body">
						<p>The following is invoice data with a value of less than <b>50jt</b> that has not been disbursed for more than <b>2 months</b>.</p>
                        <div class="table-responsive pb-9">
                            <?php if (count ( $nopes ) > 0) { ?>
                                <table id="datatablesNopes" class="table border table-striped table-bordered display text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>AM</th>
                                        <th>Value</th>
                                        <th>Progress</th>
                                        <th>Position</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $nopes as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;">
                                                <?php
                                                if($row['unit'] == 'KOMET'){
                                                    $dlink = 'ktrack';
                                                }elseif ($row['unit'] == 'MESRA'){
                                                    $dlink = 'mtrack';
                                                }elseif ($row['unit'] == 'PADI'){
                                                    $dlink = 'ptrack';
                                                }else{
                                                    $dlink = '';
                                                }
                                                ?>
                                                <?php if($row['invnum'] == 0 ) { ?>
                                                    <a href="<?php echo base_url().$dlink .'/details/'.$row['orderid']; ?>" style="color: #d33724;"><strong><?php echo $row['code']; ?></strong>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url().$dlink .'/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code']; ?></strong>
                                                    </a>
                                                <?php } ?> 
                                            </td>
											<td><?php echo date('d-m-Y', strtotime($row['invdate']));?></td>
                                            <td style="text-transform: uppercase;"><?php echo $row['segment'] ?></td>
                                            <td><?php echo $row['amkomet'] ?></td>
                                            <?php if($row['invnum'] == 0 ) { ?>
                                                <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['jstvalue'])),3))); ?></td>
                                            <?php } else { ?>
                                                <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td>
                                            <?php } ?>
                                            <td>
                                                <?php if($row['status'] == '1') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '2' || $row['status'] == '13') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '3' || $row['status'] == '14') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '4' || $row['status'] == '15') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '5' || $row['status'] == '16') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '6' || $row['status'] == '18') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '7' || $row['status'] == '17') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '8') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '9') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '10') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">65%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '11') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '12') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '0' && $row['invnum'] == 0) { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">15%</div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td>
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
                                    <?php }	?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prpo -->
            <div class="col-md-12">
                <div class="card" style="margin-bottom:50px;">
					<div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                        <h3 class="card-title text-white mb-0">Invoice IBL & OBL</h3>						   
                    </div>
                    <div class="card-body">
						<p>The following is Contract Invoice data with a value of more than <b>50jt</b> that has not been disbursed for more than <b>4 months</b>.</p>
                        <div class="table-responsive pb-9">
                            <?php if (count ( $prpo ) > 0) { ?>
                                <table id="datatablesPrpo" class="table border table-striped table-bordered display text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>AM</th>
                                        <th>Value</th>
                                        <th>Progress</th>
                                        <th>Position</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $prpo as $row ) { ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td style="text-transform: uppercase;">
                                                <?php
                                                if($row['unit'] == 'KOMET'){
                                                    $dlink = 'ktrack';
                                                }elseif ($row['unit'] == 'MESRA'){
                                                    $dlink = 'mtrack';
                                                }elseif ($row['unit'] == 'PADI'){
                                                    $dlink = 'ptrack';
                                                }else{
                                                    $dlink = '';
                                                }
                                                ?>
                                                <?php if($row['invnum'] == 0 ) { ?>
                                                    <a href="<?php echo base_url().$dlink. '/details/'.$row['orderid']; ?>" style="color: #d33724;"><strong><?php echo $row['code']; ?></strong>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url().$dlink. '/details/'.$row['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code']; ?></strong>
                                                    </a>
                                                <?php } ?>
                                            </td>
											<td><?php echo date('d-m-Y', strtotime($row['invdate']));?></td>
                                            <td style="text-transform: uppercase;"><?php echo $row['segment'] ?></td>
                                            <td><?php echo $row['amkomet'] ?></td>
                                            <?php if($row['invnum'] == 0 ) { ?>
                                                <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['jstvalue'])),3))); ?></td>
                                            <?php } else { ?>
                                                <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td>
                                            <?php } ?>
                                            <td>
                                                <?php if($row['status'] == '1') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '2' || $row['status'] == '13') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '3' || $row['status'] == '14') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '4' || $row['status'] == '15') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '5' || $row['status'] == '16') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '6' || $row['status'] == '18') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '7' || $row['status'] == '17') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '8') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">85%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '9') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '10') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">65%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '11') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '12') { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                                    </div>
                                                <?php } elseif($row['status'] == '0' && $row['invnum'] == 0) { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">15%</div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td>
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
</div>

<script>
    $(function () {
        $('.selectpicker').select2();

        var table = $('#datatablesNopes, #datatablesPrpo').DataTable({
            'responsive'  : true,
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
        });
    });
</script>