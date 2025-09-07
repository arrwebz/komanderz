<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Billing</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('orderam');?>">KOMET</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Advance Payment Details</li>
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
<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100 bg-info-subtle overflow-hidden shadow-none">
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="d-flex align-items-center mb-7">
                            <h5 class="fw-semibold mb-0 fs-5">Advance Payment of PRPO progress</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="border-end pe-4 border-muted border-opacity-10">
                                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Position<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                <p class="mb-0 text-dark"><a href="#" class="btn btn-sm waves-effect waves-light btn-outline-success">Closed by Invoices</a></p>
                            </div>
                            <div class="ps-4">
                                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Payment<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                <p class="mb-0 text-dark"><a href="#" class="btn btn-sm waves-effect waves-light btn-outline-success">Related Invoices</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="welcome-bg-img mb-n7 text-end">
                            <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Advpayment.png" alt="" class="img-fluid">
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <h4><strong><?php echo $statusorder ?></strong></h4>
                <p><i class="ti ti-file-invoice"></i> <?php echo $kodenomor ?></p> 
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
	  <div class="card overflow-hidden">
		<div class="d-flex flex-row">
		  <div class="p-3 bg-primary-subtle">
			<h3 class="text-primary box mb-0">
			  <i class="ti ti-receipt"></i>
			</h3>
		  </div>
		  <div class="p-3">
			<a href="<?php echo base_url().$this->router->fetch_class();?>/preview/<?php echo $id; ?>" class="btn btn-sm waves-effect waves-light btn-outline-danger">Print PRPO</a>
		  </div>
		</div>
	  </div>
	  <div class="card overflow-hidden">
		<div class="d-flex flex-row">
		  <div class="p-3 bg-warning-subtle">
			<h3 class="text-warning box mb-0">
			  <i class="ti ti-file"></i>
			</h3>
		  </div>
		  <div class="p-3">
			<a href="<?php echo base_url().$this->router->fetch_class();?>/createinvoice/<?php echo $id; ?>" class="btn btn-sm waves-effect waves-light btn-outline-warning">Create Invoice</a>
		  </div>	
		</div>
	  </div>
	</div>
</div>
<div class="row">
    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Information</h4>
                </div>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Panjar Code</label>
                            <input type="text" class="form-control" value="<?php echo $kodenomor ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" value="<?php echo $unit ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Types of Work</label>
                            <input type="text" class="form-control" value="<?php echo $jp ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Division</label>
                            <input type="text" class="form-control" value="<?php echo $divisi ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Customer</label>
                            <input type="text" class="form-control" value="<?php echo $segmen ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">Nominal</h4>
                </div>
            <div class="card-body p-4 border-bottom">
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Account Manager</label>
                            <input type="text" class="form-control" value="<?php echo $amkomet ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">PIC User</label>
                            <input type="text" class="form-control" value="<?php echo $amuser ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Justification Value</label>
                            <input type="text" class="form-control" value="<?php echo $nilaijst ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Negotiation Value</label>
                            <input type="text" class="form-control" value="<?php echo $nilainego ?>" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Project Name</label>
                            <input type="text" class="form-control" value="<?php echo $namaproyek ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-header text-bg-warning">
                <h5 class="mb-0 text-white card-title">PRPO Positions</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <button type="button" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4" data-bs-toggle="modal" data-bs-target="#Modalstatus">+ Add</button>
                <br/>
                <br/>
                <div class="row">
                    <div class="table-responsive rounded-2 mb-4">
                        <?php if (count ( $posinvoice ) > 0) { ?>
                            <table class="table-sm table border text-nowrap customize-table mb-0 align-middle" >
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Account Manager</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $posinvoice as $pos ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $pos['recipient']; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($pos['collectdate'])); ?></td>
                                        <td>
                                            <?php if($pos['status'] == '5' || $pos['status'] == '7') { ?>
                                                <span class="label label-warning"><?php echo $pos['position']; ?></span>
                                            <?php } elseif($pos['status'] == '1') { ?>
                                                <span class="label label-success"><?php echo $pos['position']; ?></span>
                                            <?php } ?>
                                        </td>

                                        <td><?php echo $pos['notes']; ?></td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        <?php } else { echo 'The contract position does not yet exist!'; }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-header text-bg-success">
                <h5 class="mb-0 text-white card-title">Related Invoices</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <?php echo form_open('kprpo/addtermininv');?>
                <?php echo form_hidden('hdnOrderid',$id); ?>
                <?php echo form_hidden('hdnSegmen',$segmen); ?>
                <?php echo form_hidden('hdnDivision',$divisi); ?>
                <button type="submit" name="btnSubmit" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">
                    + Add</button>
                <?php echo form_close();?>
                <br>
                <div class="row">
                    <div class="table-responsive rounded-2 mb-4">
                        <?php if (count($rowtable[0]) > 0) { ?>
                            <table class="table-sm table border text-nowrap customize-table mb-0 align-middle" >
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Customer</th>
                                    <th>Invoice</th>
                                    <th>Faktur</th>
                                    <th>Base Value</th>
                                    <th>Invoice Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php for ($row = 0; $row < $rowcount; $row++) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="text-transform: uppercase;"><a target='_blank' href="<?php echo base_url().'knopes/details/'.$rowtable[$row][0]['orderid']; ?>" style="color: #00bcd4;"><strong><?php echo $rowtable[$row][0]['code']; ?></strong></a></td>
                                        <td><?php echo $rowtable[$row][0]['segment']; ?></td>
                                        <td style="text-transform: uppercase;"><?php if($rowtable[$row][0]['invnum'] == 0) echo '<i style="color:red;">PRPO</i>'; else echo '<p style="color:green;">'.$rowtable[$row][0]['invnum'].'</p>';  ?></td>
                                        <td><?php echo $rowtable[$row][0]['faknum'] ?></td>
                                        <td style="color: #fa591d;"><strong><?php echo strrev(implode('.',str_split(strrev(strval($rowtable[$row][0]['basevalue'])),3))); ?></strong></td>
                                        <td><?php echo date('d-m-Y', strtotime($rowtable[$row][0]['invdate']));?></td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        <?php } else { echo 'There is no Invoice for this Down Payment yet!'; }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-header text-bg-info">
                <h5 class="mb-0 text-white card-title">Partner Payouts</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <div class="row">
                    <div class="table-responsive rounded-2 mb-4">
                        <?php if (count ( $spbbyinvoice ) > 0) { ?>
                            <table class="table-sm table border text-nowrap customize-table mb-0 align-middle" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SPB</th>
                                    <th>Value</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ( $spbbyinvoice as $inv ) { ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td> <td><?php if ($inv['code'] == "") {
                                                echo "<i style='color:red;'>Data has not been updated.</i>";
                                            } else {
                                                echo "<a target='_blank' href=' ".base_url()."kspb/details/".$inv['spbid']."' style='color: #00bcd4;'><strong>".$inv['code']."</strong></a>"; } ?>
                                        </td>
                                        <td><?php if ($inv['value'] == "") {
                                                echo "<i style='color:red;'>Data has not been updated.</i>";
                                            } else {
                                                echo strrev(implode('.',str_split(strrev(strval($inv['value'])),3))); } ?>
                                        </td>
                                        <td><?php if ($inv['spbdat'] == "0000-00-00") {
                                                echo "<i style='color:red;'>Data has not been updated.</i>";
                                            } else {
                                                echo date("d F Y", strtotime($inv['spbdat'])); } ?>
                                        </td>
                                        <td>
                                            <?php if($inv['status'] == '0') { ?>
                                                <span class="badge bg-primary-subtle text-primary fw-semibold fs-2">Submission</span>
                                            <?php } elseif($inv['status'] == '2') { ?>
                                                <span class="badge bg-warning-subtle text-warning fw-semibold fs-2">Processed</span>
                                            <?php } elseif($inv['status'] == '1') { ?>
                                                <span class="badge bg-success-subtle text-success fw-semibold fs-2">Paid</span>
                                            <?php } elseif($inv['status'] == '3') { ?>
                                                <span class="badge bg-info-subtle text-info fw-semibold fs-2">Approved</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        <?php } else { echo 'There is no SPB for this invoice yet!'; }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        Created by: <?php echo $buat; ?>, <?php echo $tglbuat; ?><br><br>
        <?php if($edit != 0){ ?>
            Edited by: <?php echo $edit; ?>, <?php echo $tgledit; ?><br><br>
        <?php } ?>
        <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">Back</a>
    </div>
</div>

<!-- Modal -->
<div id="Modalstatus" class="modal fade" aria-hidden="true" aria-labelledby="modalEditLetter" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background-color: #d72027; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                <h4 class="modal-title text-white">Perbarui Posisi Dokumen Invoice</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formstatus" method="POST" action="javascript:">
                <div class="modal-body">
                    <input name="hdnOrderid" type="hidden" class="form-control" value="<?php echo $id ?>">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Posisi Invoice</label>
                        <select name="optPosition" class="form-control" style="width:100%;">
                            <option disabled selected>Pilih</option>
                            <option value="closed">Closed by Invoice</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Penerima</label>
                        <input name="txtRecipient" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Tanggal</label>
                        <input name="txtColdate" type="date" class="form-control datepicker">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <textarea name="txtNotes" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnUpdate" type="submit" name="cmdsave" class="btn btn-success pull-left">Simpan</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#datatablspos').DataTable({
			'responsive'  : true,
			'paging'      : false,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : false,
			'info'        : false,
			'autoWidth'   : true

		});

		$('#datatablespb').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true

		});

		$('#datatabletermin').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		});

		$('.selectpicker').select2();

		$("#btnUpdate").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('pbillco/ajax_updatestatus'); ?>",
				data: $('#formstatus').serialize(),
				success: function(data) {
					/* play sound */
					swal({title: "Berhasil", text: "Posisi invoice berhasil diperbarui!", icon:
								"success", buttons: false, timer: 1500,}).then(function(){
								location.reload();
							}
					);
				}
			});
		});
	});
</script>