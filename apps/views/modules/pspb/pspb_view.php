<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('pspb');?>">SPB</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">KOMET PADI</li>
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
        <?php echo form_open('pspb/search');?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">SPB</label>
                        <input id="filterSpb" name="txtSpb" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Order Type</label>
                        <select name="optOrderstatus" class="form-control">
                            <option disabled>Select</option>
                            <option value="NOPES">NOPES</option>
                            <option value="PADI" selected>PADI</option>
                            <option value="IBL">IBL</option>
                            <option value="OBL">OBL</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Customers</label>
                        <select id="filterSegmen" name="optSegment" class="form-control selectpicker" style="width: 100%;">
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
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Date</label>
                        <input id="filterDate" name="txtDate" type="date" class="form-control datepicker">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Month</label>
                        <select id="filterMonth" name="optMonth" class="form-control selectpicker" style="width: 100%;">
                            <option disabled selected>Select</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label fw-semibold">Year</label>
                        <select id="filterYear" name="optYear" class="form-control selectpicker" style="width: 100%;">
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
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-send me-2 fs-4"></i> Submit
                        </div>
                    </button>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" id="xrtSPB" class="btn rounded-pill waves-effect waves-light btn-outline-info px-4 mb-6">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-download me-2 fs-4"></i> PADI Today
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center bg-info">
                    <h4 class="card-title text-white mb-0">List of SPB</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Type</th>
                                    <th>SPB</th>
                                    <th>Invoice</th>
                                    <th>Year</th>
                                    <th>Payment To</th>
                                    <th>Method</th>
                                    <th>Value</th>
                                    <th>Date</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $drd as $row ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="text-transform: uppercase;"> 
										<?php if($row['orderstatus'] == 'NOPES'){ ?>
										<span class="mb-1 badge text-bg-success" style="font-size: 10px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'PADI') { ?>
										<span class="mb-1 badge text-bg-secondary" style="font-size: 10px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'IBL') { ?>
										<span class="mb-1 badge text-bg-warning" style="font-size: 10px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'OBL') { ?>
										<span class="mb-1 badge text-bg-primary" style="font-size: 10px;"><?php echo $row['orderstatus'] ?></span>
										<?php } else { ?>
										<span class="mb-1 badge text-bg-dark" style="font-size: 10px;">PRPO</span>
										<?php } ?>
										</td>
                                        <td style="text-transform: uppercase;"> 
										<a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['spbid']; ?>" style="color: #00bcd4;"><strong><?php echo $row['code'] ?></strong></a>
										</td>
                                        <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$row['invnum'].'</p>';  ?></td>
                                        <td style="text-transform: uppercase;"><?php if($row['invnum'] == 0) echo '<i style="color:red;">'.date('Y', strtotime($row['crdat'])).'</i>'; else echo '<p style="color:green;">'.date('Y', strtotime($row['invdate'])).'</p>';  ?></td>
                                        <td>
                                            <small class="text-muted"><?php echo $row['segment'] ?></small>
                                            <br/><?php echo $row['customer'] ?>
                                            <small><br/><?php
                                                if($row['typeofpayment'] == 'transfer'){
                                                    echo ucfirst($row['bank']). ucfirst($row['bankother']) .' :<br>'.$row['accnumber'];
                                                }else{
                                                    echo strtoupper($row['typeofpayment']);
                                                }
                                                ?>
                                            </small>
                                        </td>
										<td><?php if($row['typeofpayment'] == 'transfer') { ?>											
											<span class="mb-1 badge font-medium bg-info-subtle text-info" style="font-size: 10px;"><?php echo $row['typeofpayment'];?></span>
											<?php }else{ ?>
											<span class="mb-1 badge font-medium bg-success-subtle text-success" style="font-size: 10px;"><?php echo $row['typeofpayment'];?></span>
											<?php } ?>
										</td>
                                        <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['value'])),3))); ?></strong></td>                                        
										<td><small><?php echo date('d-m-Y', strtotime($row['spbdat']));?></small></td>                                        
                                        <td class="text-right js-sweetalert"> 
                                            <strong></strong><br/>
                                            <?php $nav = array('1','2','3','4','5','6'); ?>
                                            <?php if(in_array($group, $nav)) { ?>
                                                <?php $navrole = array('1','2','3','4','5','6','7'); ?>
                                                <?php if(in_array($role, $navrole)) { ?>
                                                    <?php if($row['status'] == '0') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-light-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" style="font-size: 10px;">
                                                            Waiting
                                                        </a>
                                                    <?php } elseif($row['status'] == '2') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-warning-subtle text-warning btn-circle btn-sm d-inline-flex align-items-center justify-content-center" style="font-size: 10px;">
                                                            Processed
                                                        </a>
                                                    <?php } elseif($row['status'] == '1') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-success-subtle text-success btn-circle btn-sm d-inline-flex align-items-center justify-content-center" style="font-size: 10px;">
                                                            Done
                                                        </a>
                                                    <?php } elseif($row['status'] == '3') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/updatestatus/'.$row['spbid']; ?>" class="btn mb-1 bg-info-subtle text-info btn-circle btn-sm d-inline-flex align-items-center justify-content-center" style="font-size: 10px;">
                                                            Approved
                                                        </a>
                                                    <?php } ?>
                                                    <?php $navrole = array('1','2'); ?>
                                                    <?php if(in_array($role, $navrole)) { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/editspb/'.$row['spbid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            <i class="fs-4 ti ti-edit text-warning"></i>
                                                        </a>
                                                        <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['spbid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center">
                                                            <i class="fs-4 ti ti-trash text-danger"></i>
                                                        </button>
                                                    <?php } ?>
                                                <?php } ?>
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

<script>
	$(function() {
		var table = $('#datatables').DataTable({ 
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': true, 
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollX': true,
		});
		$('.selectpicker').select2();

		$('#exportSPB').on('click', function(){
			var filterSpb = document.getElementById("filterSpb").value,
					filterSegmen = document.getElementById("filterSegmen").value,
					filterMonth = document.getElementById("filterMonth").value,
					filterYear = document.getElementById("filterYear").value,
					postData = 'hdnSpbnum='+ filterSpb +
							'&optSegment='+ filterSegmen +
							'&hdnSpbmonth='+ filterMonth +
							'&hdnSpbyear='+ filterYear;

			var link = '<?php echo site_url('pspb/export?')?>'+postData;
			window.location.href = link;
		});

		$('#xrtSPB').on('click', function(){
			var link = '<?php echo site_url('pspb/xreqspbtoday?')?>';
			window.location.href = link;
		});
	});

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url("pspb");?>";
		var uri = $(this).attr("data-href");
		var id = $(this).attr("data-id");
		showCancelMessage(current_url,uri,id);
	});

	function showCancelMessage(current_url, uri, id){
		swal({
			title: "Are you sure",
			text: "The corresponding SPB data will also be deleted!  ",
			icon: "warning",
			buttons: ["Cancel", "Delete"],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {

				swal("You have successfully deleted this data forever.", {
					icon: "success",
					buttons: false
				});


				$.ajax({
					url: uri,
					data: 'spbid=' + id,
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