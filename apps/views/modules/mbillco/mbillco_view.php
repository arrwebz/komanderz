<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Collection</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('mbillco');?>">Payment</a>
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
        <?php echo form_open('mbillco/search');?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Invoice</label>
                        <input name="txtInv" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Customer</label>
                        <select name="optSegment" class="form-control selectpicker" style="width: 100%">
                            <option disabled selected>Select</option>
                            <?php

                            if(!empty($segment)){
                                foreach($segment as $row){
                                    if (!empty($segmen) && $segmen == $row['segmentid'] ) {
                                        $strselected = "selected";
                                    } else {
                                        $strselected = " ";
                                    }
                                    echo '<option value="'.$row['segmentid'].'"'. $strselected.'>'.$row['code'].'</option>';
                                }
                            }else{
                                echo '<option value="">Segment not available</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Month</label>
                        <select name="optMonth" class="form-control selectpicker" style="width: 100%">
                            <option disabled selected>Select</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Tax</label>
                        <input name="txtFp" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="optStatus" class="form-control selectpicker" style="width: 100%">
                            <option value="">Pilih Semua</option>
                            <option value="6">Keuangan</option>
                            <option value="8">Posting</option>
                            <option value="10">Forecasting</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Year</label>
                        <select name="optYear" class="form-control selectpicker" style="width: 100%">
                            <option disabled>Pilih</option>
                            <?php
                            $start_year = '2017';
                            $end_year = date('Y');
                            for($i = $start_year; $i<=$end_year; $i++):?>
                                <option value="<?php echo $i?>" <?php if($i == date('Y')){ echo 'selected'; }?> ><?php echo $i?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-12">
                <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-send me-2 fs-4"></i> Search
                    </div>
                </button>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center text-bg-secondary">
                    <h4 class="card-title text-white mb-0">Invoice MESRA</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Customer</th>
                                    <th>Title</th>
                                    <th>Value</th>
                                    <th>Progress</th>
                                    <th>AR</th>
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
                                        <td style="text-transform: uppercase;"><?php echo $row['segment'] ?></td>
                                        <td><?php echo substr($row['projectname'],0,25);?>...</td>
                                        <td style="color: #fa591d;"><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td>
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

<div id="modalAlertnopes" class="modal fade" aria-hidden="true" aria-labelledby="modalAddLetter" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="swal-icon swal-icon--warning">
                    <span class="swal-icon--warning__body">
                      <span class="swal-icon--warning__dot"></span>
                    </span>
                </div>
                <div class="swal-title" style="padding-top: 0">
                    Year <?php echo date('Y');?>
                    <br>
                    <?php echo $alertnopes[0]['totalnopes']; ?> NOPES unpaid | <?php echo $alertprpo[0]['totalprpo']; ?> PRPO unpaid
                </div>
                <h4 class="text-center">Invoice NOPES > 2 months & Invoice Contract > 4 months</h4>

                <div class="prevyear" style="margin-top:20px">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Year</th>
                            <th class="text-center">Invoice Nopes</th>
                            <th class="text-center">Invoice Contract</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($alertnopesprpoprevyear as $row): ?>
                            <tr>
                                <td class="text-center"><?php echo $row['tahun'];?></td>
                                <td class="text-center"><?php echo $row['nopes'];?> Nopes unpaid</td>
                                <td class="text-center"><?php echo $row['prpo'];?> Prpo unpaid</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('allreport/alertcoll')?>" class="btn btn-danger">View Data</a>
                <button type="button" class="btn btn-light px-4 waves-effect waves-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
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

	    $("#modalAlertnopes").modal("show");
	    const note = document.querySelector('.modal-backdrop');
	    note.style.opacity = '0.1';

        //swal({
        //    title: "<?php //echo $alertnopes[0]['totalnopes']; ?>// NOPES unpaid | <?php //echo $alertprpo[0]['totalprpo']; ?>// PRPO unpaid",
        //    text: "Invoice NOPES > 2 months & Invoice Contract > 4 months",
        //    dangerMode: true,
        //    icon: "warning",
        //    buttons: ["Close", "View Data"],
        //}).then((willDelete) => {
        //    if (willDelete) {
        //        window.location.href = "<?php //echo site_url('allreport/alertcoll')?>//";
        //    }
        //});
    });
</script>