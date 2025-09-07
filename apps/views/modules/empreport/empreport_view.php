<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Directory</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('empreport');?>">Attendance Report</a>
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
        <form action="<?php echo site_url($this->router->fetch_class().'/search');?>" method="GET">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Bulan</label>
                            <select name="optMonth" class="form-control selectpicker">
                                <option disabled selected>Pilih</option>
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
                                <option value="11" <?php if(date('m') == '11'){ echo 'selected'; }?>>Nopember</option>
                                <option value="12" <?php if(date('m') == '12'){ echo 'selected'; }?>>Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold">Tahun</label>
                            <select name="optYear" class="form-control selectpicker">
                                <option disabled>Pilih</option>
                                <?php for($i=date('Y')-3; $i<=date('Y'); $i++){ ?>
                                    <option value="<?php echo $i;?>" <?php if(date('Y') == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-12">
                    <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-send me-2 fs-4"></i> Submit
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="row col-md-12">
                        <div class="col-md-2 pr-0">
                            <?php echo form_open('empreport/export');?>
                            <?php echo form_hidden('hdnMonth', $month); ?>
                            <?php echo form_hidden('hdnYear', $year); ?>
                            <button type="submit" name="btnSubmit" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">
                                <i class="ti ti-file-download"></i> Excel Kehadiran
                            </button>
                            <?php echo form_close();?>
                        </div>
                        <div class="col-md-6">
                            <?php echo form_open('empreport/exportactionplan');?>
                            <?php echo form_hidden('hdnMonth', $month); ?>
                            <?php echo form_hidden('hdnYear', $year); ?>
                            <button type="submit" name="btnSubmit" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">
                                <i class="ti ti-file-download"></i> Excel Action Plan
                            </button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle">No</th>
                                    <th rowspan="2" style="vertical-align: middle">Nama</th>

                                    <?php for($i=1; $i<=$totalday; $i++){ ?>
                                        <th colspan="5" class="text-center"><?php echo $i.'/'.date('m');?></th>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <?php for($i=1; $i<=$totalday; $i++){ ?>
                                        <th>STATUS</th>
                                        <th>IN</th>
                                        <th>LOCATION</th>
                                        <th>NOTES</th>
                                        <th>OUT</th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $num = 1; foreach($drd as $row){ ?>
                                    <tr>
                                        <td><?php echo $num++;?></td>
                                        <td><?php echo $row['fullname'];?></td>

                                        <?php for($i=1; $i<=$totalday; $i++){ ?>
                                            <?php $datenow = $year.'-'.$month.'-'.$i;?>

                                            <!-- get cuti -->
                                            <?php $offwork = $this->repmd->offworkuser($row['userid'], $datenow); ?>

                                            <!-- get off day -->
                                            <?php $offday = $this->repmd->offday($datenow); ?>

                                            <?php if(date('l', strtotime($datenow)) == 'Saturday' || date('l', strtotime($datenow)) == 'Sunday' ){ ?>
                                                <td class="bg-danger text-center">Weekend</td>
                                                <td class="bg-danger text-center"></td>
                                                <td class="bg-danger text-center"></td>
                                                <td class="bg-danger text-center"></td>
                                                <td class="bg-danger text-center"></td>
                                            <?php }elseif(count($offday) > 0){ ?>
                                                <td><?php echo $offday[0]['name'];?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif(count($offwork) > 0){?>
                                                <td><?php echo 'Cuti - '.ucfirst($offwork[0]['offstatus']).'<br>'.$offwork[0]['offnotes'];?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }else{ ?>
                                                <td style="text-align: center;">
                                                    <?php
                                                    if(!empty($row[$i.'_in'])){
                                                        $batas = "09:00";
                                                        if($row[$i.'_statuswork'] == '3'){
                                                            echo '<span style="color: #0f0ddd !important;">IZIN</span>';
                                                        }else{
                                                            echo '<span style="color: #000 !important;">WFO</span>';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if(!empty($row[$i.'_in'])){
                                                        $batas = "09:00";
                                                        if($row[$i.'_statuswork'] == '3'){
                                                            echo '<span class="text-blue">'.date('H:i', strtotime($row[$i.'_in'])).'</span>';
                                                        }else{
                                                            if(date('H:i', strtotime($row[$i.'_in'])) > $batas){
                                                                echo '<span class="text-red">'.date('H:i', strtotime($row[$i.'_in'])).'</span>';
                                                            }else{
                                                                echo date('H:i', strtotime($row[$i.'_in']));
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                <?php if(!empty($row[$i.'_in_latitude'])){ ?>
                                                    <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $row[$i.'_in_latitude'];?>,<?php echo $row[$i.'_in_longitude'];?>">Buka Google Map</a></td>
                                                <?php } ?>
                                                <td><?php if(!empty($row[$i.'_in_notes'])){ echo $row[$i.'_in_notes']; }?></td>
                                                <td><?php if(!empty($row[$i.'_out'])){ echo date('H:i', strtotime($row[$i.'_out'])); }?></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
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

		$('.selectpicker').select2();
	});

</script>