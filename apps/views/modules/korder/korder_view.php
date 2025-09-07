<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Billing</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('knopes');?>">Invoice KOMET</a>
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
        <?php echo form_open('knopes/search');?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Invoice</label>
                        <input name="txtInv" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Tax Invoice</label>
                        <input name="txtFp" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">SPK VSO</label>
                        <input name="txtSpk" type="text" class="form-control">
                    </div> 
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Order Type</label>
                        <select id="optOrderstatus" name="optOrderstatus" class="form-control">
                            <option disabled selected>Select</option>
                            <option value="NOPES">NOPES</option>
                            <option value="PADI">PADI</option>
                            <option value="IBL">IBL</option>
                            <option value="OBL">OBL</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="optSegment" class="form-label fw-semibold">Customers</label>
                        <select name="optSegment" class="form-control selectpicker" style="width: 100%;">
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
                        <label for="optMonth" class="form-label fw-semibold">Month</label>
                        <select name="optMonth" class="form-control selectpicker" style="width: 100%;">
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
                    <div class="form-group mb-4">
                        <label for="optTahun" class="form-label fw-semibold">Year</label>
                        <select name="optYear" class="form-control" style="width: 100%; height: 36px">
                            <option selected disabled>Select</option>
                            <?php for($i=date('Y')-4; $i<=date('Y'); $i++){ ?>
                                <option value="<?php echo $i;?>" <?php if(date('Y') == $i){ echo 'selected'; }?>><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="optSPB" class="form-label fw-semibold">SPB</label>
                        <select id="optSPB" name="optSPB" class="form-control">
                            <option disabled selected>Select</option>
                            <option value="0">Exclude</option>
                            <option value="1">Include</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" name="cmdsave" class="btn btn-dark font-medium rounded-pill px-4 mb-6">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i> Submit
                </div>
            </button>
        </div>
        <?php echo form_close();?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">List of invoices</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/addnopes'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap table-hover" style="width: 100%">
                                <thead>
                                <tr style="text-transform: uppercase;font-size: 12px;">
                                    <th>No</th>
                                    <th>Order Type</th>
                                    <th>Code</th>
                                    <th>Invoice</th>
                                    <th>Tax</th>
                                    <th>SPK</th>
                                    <th>Customer</th>
                                    <th>Value</th>
                                    <th class="disabled-sorting text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $drd as $row ) { ?>
                                    <?php $i++; ?> 
                                    <tr>
                                        <td style="text-transform: uppercase;font-size: 12px;"><?php echo $i; ?></td>
                                        <td style="text-transform: uppercase;font-size: 12px;">
										<?php if($row['orderstatus'] == 'NOPES'){ ?>
										<span class="mb-1 badge text-bg-success" style="font-size: 12px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'PADI') { ?>
										<span class="mb-1 badge text-bg-secondary" style="font-size: 12px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'IBL') { ?>
										<span class="mb-1 badge text-bg-warning" style="font-size: 12px;"><?php echo $row['orderstatus'] ?></span>
										<?php } elseif($row['orderstatus'] == 'OBL') { ?>
										<span class="mb-1 badge text-bg-primary" style="font-size: 12px;"><?php echo $row['orderstatus'] ?></span>
										<?php } else { ?>
										<span class="mb-1 badge text-bg-dark" style="font-size: 12px;">Unknown</span>
										<?php } ?>
										</td>
                                        <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>"><strong><?php echo $row['code'] ?></strong></a>
                                        </td>
                                        <td style="text-transform: uppercase;font-size: 12px;"><?php echo $row['invnum'] ?></td>
                                        <td style="text-transform: uppercase;font-size: 12px;">
                                            <?php if($row['file'] != '') { ?>
                                                <a href="<?php echo $this->config->item('uploads_uri').'fakturpajak/padi/'.$row['orderid'].'/'.$row['file'];?>" target="_blank">
                                                    <i class="ti ti-file-text"></i>&nbsp;
                                                </a>
                                            <?php } ?>
                                            <?php echo $row['faknum'] ?>
                                        </td>
                                        <td style="text-transform: uppercase;font-size: 12px;">
                                                <?php echo $row['spknum'];?>
                                        </td>
                                        <td style="text-transform: uppercase;font-size: 12px;"><?php echo $row['segment'];?><br><small class="text-muted"><?php echo $row['amuser'] ?></small></td>
                                        <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></strong></td>
                                        <td class="text-right js-sweetalert">
                                            <?php $nav = array('1','2','3','4','5','6'); ?>
                                            <?php $navrole = array('1','2','3','4','5','6','7'); ?>
                                            <?php if(in_array($group, $nav) || in_array($role, $navrole)) { ?>
                                                <?php if ($row['orderid'] != '0' ) { ?>
                                                    <small class="badge text-bg-info fs-1"><?php echo $row['countspb'];?></small>
                                                <?php } else { ?>
                                                    <small class="badge text-bg-info fs-1">0</small>
                                                <?php } ?>
                                                <?php if($row['jobtype'] == 'TK'){ ?>
                                                    <a href="javascript:" class="badge text-bg-danger fs-1" disabled=""><i> TKBW</i></a>
                                                <?php }else{ ?>
                                                    <?php if($row['countspb'] == '0') { ?>
                                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn mb-1 bg-light-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="SPB">
                                                            <i class="fs-4 ti ti-mail-opened text-info"></i>
                                                        </a>
                                                    <?php } elseif($row['countspb'] > '0') { ?>
                                                        <?php if ($row['orderid'] != '0' ) { ?>
                                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn mb-1 bg-info-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="+ SPB">
                                                                <i class="fs-4 ti ti-mail text-info"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn mb-1 bg-light-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="SPB">
                                                                <i class="fs-4 ti ti-mail-opened text-info"></i>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php $navrole = array('1','2','4'); ?>
                                                <?php if(in_array($role, $navrole) || $userid == '6') { ?>
                                                    <a href="<?php echo base_url().$this->router->fetch_class(). '/editnopes/'.$row['orderid']; ?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fs-4 ti ti-edit text-warning"></i>
                                                    </a>
                                                <?php } ?>

                                                <?php $navrole = array('1','2','4'); ?>
                                                <?php if(in_array($role, $navrole)) { ?>
                                                    <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['orderid']; ?>" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center" onclick="sweet()" data-bs-toggle="tooltip" title="Delete">
                                                        <i class="fs-4 ti ti-trash text-danger"></i>
                                                    </button>
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

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#datatables').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true

		});
		$('.selectpicker').select2();

		$("#datatables").on("click", ".copyspknum", function(){
			var spknum = $(this).attr('data-spknum');
			copyToClipboard(spknum)
			alert('Copied : '+spknum)
		})
	});

	$('.js-sweetalert button').on('click', function () {
		var current_url = "<?php echo base_url("pnopes");?>";
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
					data: 'orderid=' + id,
					type: 'POST',
					success: function(msg) {
						if(msg == "success"){
							setTimeout(function () {
								//location.href = current_url;
							}, 1500);
						}

					}
				})

			}
		});
	}

	$('.qd').on('click', function () {
		var quri = $(this).attr("data-href");
		var qid = $(this).attr("data-id");
		quick_details(quri,qid);
	});

	function quick_details(quri,qid){
		//Ajax Load data from ajax
		$.ajax({
			url : quri,
			data: 'orderid=' + qid,
			type: "POST",
			dataType: "JSON",
			success: function(qdata)
			{

				$('[value="inv"]').val(qdata.invnum);
				$('[value="fak"]').val(qdata.faknum);
				$('[value="spk"]').val(qdata.spknum);
				$('[value="div"]').val(qdata.division);
				$('[value="seg"]').val(qdata.segment);
				$('[value="am1"]').val(qdata.amuser);
				$('[value="am2"]').val(qdata.amkomet);
				$('[value="pn"]').val(qdata.projectname);

				$('#modal_details').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text(qdata.code); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}

	function copyToClipboard(text) {
		if (window.clipboardData && window.clipboardData.setData) {
			// IE specific code path to prevent textarea being shown while dialog is visible.
			return clipboardData.setData("Text", text);

		} else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
			var textarea = document.createElement("textarea");
			textarea.textContent = text;
			textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in MS Edge.
			document.body.appendChild(textarea);
			textarea.select();
			try {
				return document.execCommand("copy"); // Security exception may be thrown by some browsers.
			} catch (ex) {
				console.warn("Copy to clipboard failed.", ex);
				return false;
			} finally {
				document.body.removeChild(textarea);
			}
		}
	}
</script>