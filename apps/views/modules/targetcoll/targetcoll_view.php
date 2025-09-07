<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9"> 
                <h4 class="fw-semibold mb-8">Target</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('targetcoll');?>">Collection</a>
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
        <?php echo form_open('targetcoll/search');?>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Name</label>
                        <input name="txtNama" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Year</label>
                        <select name="optTahun" class="form-control selectpicker" style="width: 100%; height: 36px">
								<option selected disabled>Select</option>
                            <?php for($i=date('Y')-4; $i<=date('Y'); $i++){ ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="exampleInputname" class="form-label fw-semibold">Type</label>
                        <select name="optTipe" class="form-control selectpicker" style="width: 100%; height: 36px">
                            <option selected disabled>Select</option>
                            <option value="1">Global</option>
                            <option value="2">Quarter</option>
                            <option value="3">Monthly</option>
                            <option value="4">Nopes</option>
                            <option value="5">PADI</option>
                            <option value="6">IBL</option>
                            <option value="7">OBL</option>
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
                    <h4 class="card-title text-white mb-0">Data List</h4>
                </div>
                <div class="card-body collapse show">
                    <p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/addtargetcoll'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Add</a>
                    </p>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap" style="width: 100%"> 
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Value</th>
                                        <th>Type</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th class="disabled-sorting text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $drd as $row ) { ?>
                                        <?php
                                        if($row['tipe'] == '1'){
                                            $tipe = 'Global';
                                            $bulan = '-';
                                        }elseif($row['tipe'] == '2'){
                                            $tipe = 'Quarter';
                                            $bulan = '-';
                                        }elseif($row['tipe'] == '3'){
                                            $tipe = 'Monthly';
                                            $bulan = getIndMonth($row['bulan']);
                                        }elseif($row['tipe'] == '4'){
                                            $tipe = 'NOPES';
                                            $bulan = getIndMonth($row['bulan']);
                                        }elseif($row['tipe'] == '5'){
                                            $tipe = 'PADI';
                                            $bulan = getIndMonth($row['bulan']);
                                        }elseif($row['tipe'] == '6'){
                                            $tipe = 'IBL';
                                            $bulan = getIndMonth($row['bulan']);
                                        }elseif($row['tipe'] == '7'){
                                            $tipe = 'OBL';
                                            $bulan = getIndMonth($row['bulan']);
                                        }else{
                                            $tipe = 'Unknown';
                                            $bulan = '-';
                                        }
                                        ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['nama'];?></td>
                                            <td style="color: #fa591d;">
                                                <strong><?php echo strrev(implode('.',str_split(strrev(strval($row['nilai'])),3)));?></strong>
                                            </td>
                                            <td><?php echo $tipe; ?></td>
                                            <td><?php echo $bulan;?></td>
                                            <td><?php echo $row['tahun'];?></td> 

                                            <td class="text-right js-sweetalert">
                                                <?php $sess = $this->session->userdata();?>
                                                <?php if($sess['role'] == 1): ?>
                                                    <a href="<?php echo site_url('targetcoll/edittargetcoll/'.$row['idtargetcoll']);?>" class="btn mb-1 bg-warning-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center edit-row">
                                                        <i class="fs-4 ti ti-edit text-warning"></i>
                                                    </a>
                                                    <button type="button" class="btn mb-1 bg-danger-subtle btn-circle btn-sm d-inline-flex align-items-center justify-content-center delete-row" data-id="<?php echo $row['idtargetcoll'];?>" data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>">
                                                        <i class="fs-4 ti ti-trash text-danger"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php }	?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Value</th>
                                        <th>Type</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </tfoot>
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
			'responsive'  : false,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
        $('.selectpicker').select2();
    });

    $('.js-sweetalert button').on('click', function () {
        var current_url = "<?php echo base_url("targetcoll");?>";
        var uri = $(this).attr("data-href");
        var id = $(this).attr("data-id");
        showCancelMessage(current_url,uri,id);
    });

    function showCancelMessage(current_url, uri, id){
        swal({
            title: "Are you sure?",
            text: "",
            icon: "warning",
            buttons: ["Cancel", "Delete!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {

                swal("You have successfully deleted this data forever", {
                    icon: "success",
                    buttons: false
                });

                $.ajax({
                    url: uri,
                    data: 'idtargetcoll=' + id,
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