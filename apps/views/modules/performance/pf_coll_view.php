<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Performance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('pfcoll');?>">Collection</a>
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
        <div class="col-md-6 col-lg-3">
            <div class="card rounded-3 card-hover">
                <a href="<?php echo site_url('allreport');?>" class="stretched-link"></a>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="flex-shrink-0"><i class="ti ti-database text-warning display-6"></i></span>
                        <div class="ms-4">
                            <h4 class="card-title text-dark">2024</h4>
                            <h6 class="card-subtitle mb-0 fs-2 fw-normal">
                                Rp. <?php echo strrev(implode('.',str_split(strrev(strval($collyear[3]['totalvalue'])),3))); ?>
                            </h6>
                            <span class="fs-2 mt-1 ">Invoice belum terbayar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card rounded-3 card-hover">
                <a href="<?php echo site_url('allreport');?>" class="stretched-link"></a>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="flex-shrink-0"><i class="ti ti-database text-warning display-6"></i></span>
                        <div class="ms-4">
                            <h4 class="card-title text-dark">2023</h4>
                            <h6 class="card-subtitle mb-0 fs-2 fw-normal">
                                Rp. <?php echo strrev(implode('.',str_split(strrev(strval($collyear[2]['totalvalue'])),3))); ?>
                            </h6>
                            <span class="fs-2 mt-1 ">Invoice belum terbayar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card rounded-3 card-hover">
                <a href="<?php echo site_url('allreport');?>" class="stretched-link"></a>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="flex-shrink-0"><i class="ti ti-database text-warning display-6"></i></span>
                        <div class="ms-4">
                            <h4 class="card-title text-dark">2022</h4>
                            <h6 class="card-subtitle mb-0 fs-2 fw-normal">
                                Rp. <?php echo strrev(implode('.',str_split(strrev(strval($collyear[1]['totalvalue'])),3))); ?>
                            </h6>
                            <span class="fs-2 mt-1 ">Invoice belum terbayar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card rounded-3 card-hover">
                <a href="<?php echo site_url('allreport');?>" class="stretched-link"></a>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="flex-shrink-0"><i class="ti ti-database text-warning display-6"></i></span>
                        <div class="ms-4">
                            <h4 class="card-title text-dark">2021</h4>
                            <h6 class="card-subtitle mb-0 fs-2 fw-normal">
                                Rp. <?php echo strrev(implode('.',str_split(strrev(strval($collyear[0]['totalvalue'])),3))); ?>
                            </h6>
                            <span class="fs-2 mt-1 ">Invoice belum terbayar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-hover">
                <div class="card-header with-border">
                    <h4 class="mb-0 text-dark fs-5">Tracking Invoice</h4>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="chartinv" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-hover">
                <div class="card-header with-border">
                    <h4 class="mb-0 text-dark fs-5">Forecasting Collection</h4>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="chartpostingforecasting" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-hover">
                <div class="card-header with-border">
                    <h4 class="mb-0 text-dark fs-5">List Forecasting Collection - Monthly</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive pb-9">
                                <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bulan</th>
                                        <th>On Hand</th>
                                        <th>Posting</th>
                                        <th>Forecasting</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Bulan</th>
                                        <th>On Hand</th>
                                        <th>Posting</th>
                                        <th>Forecasting</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    foreach($collpostfor as $key => $row ){
                                        if($row['month'] != ''){?>
                                            <tr>
                                                <td style="width: 5%"><?php echo $key;?></td>
                                                <td><?php echo $row['month'];?></td>
                                                <td style="color: #fa591d;">
                                                    <strong><?php echo strrev(implode('.',str_split(strrev(strval($row['keuangan'])),3)));?></strong>
                                                </td>
                                                <td style="color: #fa591d;">
                                                    <strong><?php echo strrev(implode('.',str_split(strrev(strval($row['posting'])),3)));?></strong>
                                                </td>
                                                <td style="color: #fa591d;">
                                                    <strong><?php echo strrev(implode('.',str_split(strrev(strval($row['forecasting'])),3)));?></strong>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p><i class="ti ti-building-bank"></i> <strong>On Hand</strong> : Invoice posisi di Keuangan.</p>
                    <p><i class="ti ti-file"></i> <strong>Posting</strong> : Invoice yang sudah di Approve Keuangan Telkom dan ada nomor SPB & Finest Telkom.</p>
                    <p><i class="ti ti-tags"></i> <strong>Forecasting</strong> : Invoice yang sedang dalam antrian Payment dan disatukan berdasarkan Tanggal Estimasi Cair.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card card-hover">
            <div class="card-header with-border">
                <h4 class="mb-0 text-dark fs-5">Collection PAID</h4>
            </div>
            <div class="card-body">
                <form id="formCollection" action="javascript:">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Segmen</label>
                                <select id="optSegment" name="optSegment" class="form-control selectpicker">
                                    <option value="all">Pilih</option>
                                    <?php
                                    if(!empty($segment)){
                                        foreach($segment as $row){
                                            if (!empty($segmen) && $segmen == $row['segmentid'] ) {
                                                $strselected = "selected";
                                            } else {
                                                $strselected = " ";
                                            }
                                            echo '<option value="'.$row['code'].'"'. $strselected.'>'.$row['code'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="">Segment not available</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label fw-semibold">Bulan</label>
                                <select id="optBulan" name="optBulan" class="form-control selectpicker">
                                    <option value="all">Pilih</option>
                                    <option value="01" <?php if(date('m') == '01'){ echo 'selected'; }?>>Januari</option>
                                    <option value="02" <?php if(date('m') == '02'){ echo 'selected'; }?>>Februari</option>
                                    <option value="03" <?php if(date('m') == '03'){ echo 'selected'; }?>>Maret</option>
                                    <option value="04" <?php if(date('m') == '04'){ echo 'selected'; }?>>April</option>
                                    <option value="05" <?php if(date('m') == '05'){ echo 'selected'; }?>>Mei</option>
                                    <option value="06" <?php if(date('m') == '06'){ echo 'selected'; }?>>Juni</option>
                                    <option value="07" <?php if(date('m') == '07'){ echo 'selected'; }?>>Juli</option>
                                    <option value="08" <?php if(date('m') == '08'){ echo 'selected'; }?>>Agustus</option>
                                    <option value="09" <?php if(date('m') == '09'){ echo 'selected'; }?>>September</option>
                                    <option value="10" <?php if(date('m') == '10'){ echo 'selected'; }?>>Oktober</option>
                                    <option value="11" <?php if(date('m') == '11'){ echo 'selected'; }?>>November</option>
                                    <option value="12" <?php if(date('m') == '12'){ echo 'selected'; }?>>Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Tahun</label>
                                <select id="optTahun" name="optTahun" class="form-control selectpicker">
                                    <option value="all">Pilih</option>
                                    <?php for($i=date('Y')-3; $i<=date('Y'); $i++){ ?>
                                        <option value="<?php echo $i;?>" <?php if(date('Y') == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label fw-semibold">&nbsp;</label>
                                <button type="submit" class="btn form-control btn-fill btn-default">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div id="dataCollectionPaid"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card card-hover">
            <div class="card-header with-border">
                <h4 class="mb-0 text-dark fs-5">Monthly Collection : Invoice PAID/UNPAID</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div id="chartpaidunpaid" style="height: 250px;"></div>
                </div>
            </div>
            <div class="card-footer">
                <p><strong>Data diambil berdasarkan tanggal invoice dibuat</strong></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card card-hover">
            <div class="card-header with-border">
                <h4 class="mb-0 text-dark fs-5">Monthly AR</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div id="chartreceivepaidunpaid" style="height: 250px;"></div>
                </div>
            </div>
            <div class="card-footer">
                <p><strong>Data diambil berdasarkan tanggal pencairan invoice</strong></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card card-hover">
            <div class="card-header with-border">
                <h4 class="mb-0 text-dark fs-5">Daily AR</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div id="chartarday" style="height: 250px;"></div>
                </div>
            </div>
            <div class="card-footer">
                <p><strong>Data diambil berdasarkan tanggal pencairan invoice</strong></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card card-hover">
            <div class="card-header with-border">
                <h4 class="mb-0 text-dark fs-5">1. Penyelesaian Invoice Nopes, PADI, IBL</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive pb-9">
                        <h3>DGS : NANZA & IMAN</h3>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kode</th>
                                <th>Unit, Divisi, Segment</th>
                                <th>Invoice Date</th>
                                <th>Nilai Dasar</th>
                                <th>Umur Piutang</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $collamdgsnanza as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                    <td>
                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php } ?>
                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                    </td>
                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                    <td><?php echo $row['invdate'] ?></td>
                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case '0':
                                                echo '<span class="label label-success">Accurate</span>';
                                                break;
                                            case '2':
                                                echo '<span class="label label-info">Segmen</span>';
                                                break;
                                            case '3':
                                                echo '<span class="label label-warning">Invidea</span>';
                                                break;
                                            case '4':
                                                echo '<span class="label label-warning">Precise</span>';
                                                break;
                                            case '16':
                                                echo '<span class="label label-primary">LOGISTIK</span>';
                                                break;
                                            case '18' OR '6':
                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                break;
                                            default:
                                                echo '<span class="label label-danger">Belum Cair</span>';
                                        }
                                        ?>
                                    </td>
                                    <td width="20%">
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive pb-9">
                        <h3>DES : EVA & BUDI</h3>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kode</th>
                                <th>Unit, Divisi, Segment</th>
                                <th>Invoice Date</th>
                                <th>Nilai Dasar</th>
                                <th>Umur Piutang</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $collamdeseva as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                    <td>
                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php } ?>
                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                    </td>
                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                    <td><?php echo $row['invdate'] ?></td>
                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case '0':
                                                echo '<span class="label label-success">Accurate</span>';
                                                break;
                                            case '2':
                                                echo '<span class="label label-info">Segmen</span>';
                                                break;
                                            case '3':
                                                echo '<span class="label label-warning">Invidea</span>';
                                                break;
                                            case '4':
                                                echo '<span class="label label-warning">Precise</span>';
                                                break;
                                            case '16':
                                                echo '<span class="label label-primary">LOGISTIK</span>';
                                                break;
                                            case '18' OR '6':
                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                break;
                                            default:
                                                echo '<span class="label label-danger">Belum Cair</span>';
                                        }
                                        ?>
                                    </td>
                                    <td width="20%">
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive pb-9">
                        <h3>DES : VANIA & LUTHFI</h3>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kode</th>
                                <th>Unit, Divisi, Segment</th>
                                <th>Invoice Date</th>
                                <th>Nilai Dasar</th>
                                <th>Umur Piutang</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $collamdesvania as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                    <td>
                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php } ?>
                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                    </td>
                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                    <td><?php echo $row['invdate'] ?></td>
                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case '0':
                                                echo '<span class="label label-success">Accurate</span>';
                                                break;
                                            case '2':
                                                echo '<span class="label label-info">Segmen</span>';
                                                break;
                                            case '3':
                                                echo '<span class="label label-warning">Invidea</span>';
                                                break;
                                            case '4':
                                                echo '<span class="label label-warning">Precise</span>';
                                                break;
                                            case '16':
                                                echo '<span class="label label-primary">LOGISTIK</span>';
                                                break;
                                            case '18' OR '6':
                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                break;
                                            default:
                                                echo '<span class="label label-danger">Belum Cair</span>';
                                        }
                                        ?>
                                    </td>
                                    <td width="20%">
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive pb-9">
                        <h3>SDA, EBIS & EKS : SIGIT & IMAN</h3>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kode</th>
                                <th>Unit, Divisi, Segment</th>
                                <th>Invoice Date</th>
                                <th>Nilai Dasar</th>
                                <th>Umur Piutang</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $collamsdasigit as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                    <td>
                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php } ?>
                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                    </td>
                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                    <td><?php echo $row['invdate'] ?></td>
                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case '0':
                                                echo '<span class="label label-success">Accurate</span>';
                                                break;
                                            case '2':
                                                echo '<span class="label label-info">Segmen</span>';
                                                break;
                                            case '3':
                                                echo '<span class="label label-warning">Invidea</span>';
                                                break;
                                            case '4':
                                                echo '<span class="label label-warning">Precise</span>';
                                                break;
                                            case '16':
                                                echo '<span class="label label-primary">LOGISTIK</span>';
                                                break;
                                            case '18' OR '6':
                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                break;
                                            default:
                                                echo '<span class="label label-danger">Belum Cair</span>';
                                        }
                                        ?>
                                    </td>
                                    <td width="20%">
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card card-hover">
            <div class="card-header with-border">
                <h4 class="mb-0 text-dark fs-5">2. Penyelesaian Invoice OBL</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive pb-9">
                        <h3>DGS : NANZA & IMAN</h3>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kode</th>
                                <th>Unit, Divisi, Segment</th>
                                <th>Invoice Date</th>
                                <th>Nilai Dasar</th>
                                <th>Umur Piutang</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $collamdgsnanzaobl as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                    <td>
                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php } ?>
                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                    </td>
                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                    <td><?php echo $row['invdate'] ?></td>
                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case '0':
                                                echo '<span class="label label-success">Accurate</span>';
                                                break;
                                            case '2':
                                                echo '<span class="label label-info">Segmen</span>';
                                                break;
                                            case '3':
                                                echo '<span class="label label-warning">Invidea</span>';
                                                break;
                                            case '4':
                                                echo '<span class="label label-warning">Precise</span>';
                                                break;
                                            case '16':
                                                echo '<span class="label label-primary">LOGISTIK</span>';
                                                break;
                                            case '18' OR '6':
                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                break;
                                            default:
                                                echo '<span class="label label-danger">Belum Cair</span>';
                                        }
                                        ?>
                                    </td>
                                    <td width="20%">
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive pb-9">
                        <h3>DES : EVA & BUDI</h3>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kode</th>
                                <th>Unit, Divisi, Segment</th>
                                <th>Invoice Date</th>
                                <th>Nilai Dasar</th>
                                <th>Umur Piutang</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $collamdesevaobl as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                    <td>
                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php } ?>
                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                    </td>
                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                    <td><?php echo $row['invdate'] ?></td>
                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case '0':
                                                echo '<span class="label label-success">Accurate</span>';
                                                break;
                                            case '2':
                                                echo '<span class="label label-info">Segmen</span>';
                                                break;
                                            case '3':
                                                echo '<span class="label label-warning">Invidea</span>';
                                                break;
                                            case '4':
                                                echo '<span class="label label-warning">Precise</span>';
                                                break;
                                            case '16':
                                                echo '<span class="label label-primary">LOGISTIK</span>';
                                                break;
                                            case '18' OR '6':
                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                break;
                                            default:
                                                echo '<span class="label label-danger">Belum Cair</span>';
                                        }
                                        ?>
                                    </td>
                                    <td width="20%">
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive pb-9">
                        <h3>DES : VANIA & LUTHFI</h3>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kode</th>
                                <th>Unit, Divisi, Segment</th>
                                <th>Invoice Date</th>
                                <th>Nilai Dasar</th>
                                <th>Umur Piutang</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $collamdesvaniaobl as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                    <td>
                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php } ?>
                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                    </td>
                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                    <td><?php echo $row['invdate'] ?></td>
                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case '0':
                                                echo '<span class="label label-success">Accurate</span>';
                                                break;
                                            case '2':
                                                echo '<span class="label label-info">Segmen</span>';
                                                break;
                                            case '3':
                                                echo '<span class="label label-warning">Invidea</span>';
                                                break;
                                            case '4':
                                                echo '<span class="label label-warning">Precise</span>';
                                                break;
                                            case '16':
                                                echo '<span class="label label-primary">LOGISTIK</span>';
                                                break;
                                            case '18' OR '6':
                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                break;
                                            default:
                                                echo '<span class="label label-danger">Belum Cair</span>';
                                        }
                                        ?>
                                    </td>
                                    <td width="20%">
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive pb-9">
                        <h3>SDA, EBIS & EKS : SIGIT & IMAN</h3>
                        <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kode</th>
                                <th>Unit, Divisi, Segment</th>
                                <th>Invoice Date</th>
                                <th>Nilai Dasar</th>
                                <th>Umur Piutang</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $collamsdasigitobl as $row ) { ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('Y', strtotime($row['invdate'])) ?></td>
                                    <td>
                                        <?php if($row['unit'] == 'MESRA'){ ?>
                                            <a href="<?php echo base_url().'mtrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url().'ktrack/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>" target="_blank">
                                                <strong><?php echo $row['code'];?></strong>
                                            </a>
                                        <?php } ?>
                                        <br>Nomor Invoice : <?php echo $row['invnum'];?>
                                    </td>
                                    <td><?php echo $row['unit'].'<br>'.$row['divisionname'].'<br><b>'.$row['segmenname'] ?></b></td>
                                    <td><?php echo $row['invdate'] ?></td>
                                    <td><strong style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                    <td><?php echo datediff($row['invdate'],date('Y-m-d'));?></td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case '0':
                                                echo '<span class="label label-success">Accurate</span>';
                                                break;
                                            case '2':
                                                echo '<span class="label label-info">Segmen</span>';
                                                break;
                                            case '3':
                                                echo '<span class="label label-warning">Invidea</span>';
                                                break;
                                            case '4':
                                                echo '<span class="label label-warning">Precise</span>';
                                                break;
                                            case '16':
                                                echo '<span class="label label-primary">LOGISTIK</span>';
                                                break;
                                            case '18' OR '6':
                                                echo '<span class="label bg-olive">Keuangan</span>';
                                                break;
                                            default:
                                                echo '<span class="label label-danger">Belum Cair</span>';
                                        }
                                        ?>
                                    </td>
                                    <td width="20%">
                                        Penerima : <?php echo $row['recipient'];?>
                                        <br>Catatan : <?php echo $row['tracknote'];?>
                                        <br>Tanggal : <?php echo $row['trackdate'];?>
                                    </td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	$(function () {
		$('.selectpicker').select2();

		var table = $('#datatables, .datatable').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': true,
			'lengthMenu'  : [ [4, 8, 12], [4, 8,"All"] ],
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollX': true,
		});

		$('#formCollection').on('submit', function () {
			$.ajax({
				type: "POST",
				url: '<?php echo site_url('pfcoll/searchcoll')?>',
				data: $('#formCollection').serialize(),
				success: function (data) {
					$('#dataCollectionPaid').html(data);
				}
			});
		});
		$('#formCollection').trigger('submit');
	});

	am4core.ready(function() {
		// Themes begin
		am4core.useTheme(am4themes_kelly);
		am4core.useTheme(am4themes_animated);
		// Themes end

		//---------Start chart Tracking Invoice

		// Create chart instance
		var chart = am4core.create("chartinv", am4charts.XYChart);

		// Add data
		chart.data = <?php echo $allinv ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "status";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
			if (target.dataItem && target.dataItem.index & 2 == 2) {
				return dy + 25;
			}
			return dy;
		});

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "volinv";
		series.dataFields.categoryX = "status";
		series.name = "Collection Updates";
		series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
		series.columns.template.fillOpacity = .8;

		var columnTemplate = series.columns.template;
		columnTemplate.strokeWidth = 2;
		columnTemplate.strokeOpacity = 1;
		//------End chart Tracking Invoice

		//------Start chart POSTINGXFORECASTING
		// Create chart instance
		var chart = am4core.create("chartpostingforecasting", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $collectionpostingforecasting; ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "ON TELKOM FINANCE";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "posting";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Total Posting {categoryX} : [bold]{valueY}[/]";
		series.columns.template.fill = am4core.color("#00bcd4");
		series.columns.template.stroke = am4core.color("#00bcd4");

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "forecasting";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total Forecasting {categoryX} : [bold]{valueY}[/]";
		series2.columns.template.fill = am4core.color("#44bd32");
		series2.columns.template.stroke = am4core.color("#44bd32");

		var series3 = chart.series.push(new am4charts.ColumnSeries());
		series3.dataFields.valueY = "keuangan";
		series3.dataFields.categoryX = "month";
		series3.clustered = false;
		series3.columns.template.width = am4core.percent(50);
		series3.tooltipText = "Total Keuangan {categoryX} : [bold]{valueY}[/]";
		series3.columns.template.fill = am4core.color("#F5CF33");
		series3.columns.template.stroke = am4core.color("#F5CF33");

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart POSTINGXFORECASTING

		// ------Start chart PAIDUNPAID
		// Create chart instance
		var chart = am4core.create("chartpaidunpaid", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $collectionpaidunpaid ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "PAID/UNPAID";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "totalunpaid";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Total Unpaid {categoryX} : [bold]{valueY}[/]";
		series.columns.template.fill = am4core.color("#dd4b39");
		series.columns.template.stroke = am4core.color("#dd4b39");

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "totalpaid";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total Paid {categoryX} : [bold]{valueY}[/]";
		series2.columns.template.fill = am4core.color("#44bd32");
		series2.columns.template.stroke = am4core.color("#44bd32");

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart paidunpaid

		//------Start chart RECEIVE PAIDUNPAID
		// Create chart instance
		var chart = am4core.create("chartreceivepaidunpaid", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $collectionreceivepaidunpaid ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "PAID";
		valueAxis.title.fontWeight = 800;

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "totalpaid";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total Paid {categoryX} : [bold]{valueY}[/]";
		series2.columns.template.fill = am4core.color("#44bd32");
		series2.columns.template.stroke = am4core.color("#44bd32");

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart RECEIVE paidunpaid




	});
</script>
<script>
	am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end

		// Create chart instance
		var chart = am4core.create("chartarday", am4charts.XYChart);

		// Add data
		chart.data = <?php echo $getarbyday ?>;

		// Set input format for the dates
		chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

		// Create axes
		var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		var series = chart.series.push(new am4charts.LineSeries());
		series.dataFields.valueY = "totalpaid";
		series.dataFields.dateX = "procdat";
		series.tooltipText = "{totalpaid}"
		series.strokeWidth = 2;
		series.minBulletDistance = 15;
		series.fill = am4core.color("#44bd32");
		series.stroke = am4core.color("#44bd32");

		// Drop-shaped tooltips
		series.tooltip.background.cornerRadius = 20;
		series.tooltip.background.strokeOpacity = 0;
		series.tooltip.pointerOrientation = "vertical";
		series.tooltip.label.minWidth = 40;
		series.tooltip.label.minHeight = 40;
		series.tooltip.label.textAlign = "middle";
		series.tooltip.label.textValign = "middle";

		// Make bullets grow on hover
		var bullet = series.bullets.push(new am4charts.CircleBullet());
		bullet.circle.strokeWidth = 2;
		bullet.circle.radius = 4;
		bullet.circle.fill = am4core.color("#fff");

		var bullethover = bullet.states.create("hover");
		bullethover.properties.scale = 1.3;

		// Make a panning cursor
		chart.cursor = new am4charts.XYCursor();
		chart.cursor.behavior = "panXY";
		chart.cursor.xAxis = dateAxis;
		chart.cursor.snapToSeries = series;

		// Create vertical scrollbar and place it before the value axis
		chart.scrollbarY = new am4core.Scrollbar();
		chart.scrollbarY.parent = chart.leftAxesContainer;
		chart.scrollbarY.toBack();

		// Create a horizontal scrollbar with previe and place it underneath the date axis
		chart.scrollbarX = new am4charts.XYChartScrollbar();
		chart.scrollbarX.series.push(series);
		chart.scrollbarX.parent = chart.bottomAxesContainer;

		chart.events.on("ready", function () {
			dateAxis.zoom({start:0.79, end:1});
		});

	}); // end am4core.ready()
</script>