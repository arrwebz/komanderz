<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Finance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('tbudgetsp');?>">Budget</a>
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
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="margin-bottom:50px;">
                <div class="card-header d-flex align-items-center" style="background-color: #d72027; ">
                    <h4 class="card-title text-white mb-0">KOMET PADI Budget List</h4>
                </div>
                <div class="card-body collapse show">
                    <?php $nav = array('1','2','3','4','5'); ?>
                    <?php if(in_array($role, $nav)) { ?>
                        <p>
                            <a href="<?php echo base_url().$this->router->fetch_class().'/addnewbudget'; ?>" class="btn rounded-pill waves-effect waves-light btn-outline-success px-4">+ Buat Baru</a>
                        </p>
                    <?php } ?>
                    <div class="table-responsive pb-9">
                        <?php if (count ( $drd ) > 0) { ?>
                            <table id="datatables" class="table border table-striped table-bordered display text-nowrap">
                                <thead>
                                <tr> 
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Total SPB</th>
                                    <th>Unit</th>
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
                                        <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/todaybudget/'.$row['budgetid']; ?>" style="color: #00bcd4;"><strong>CF<?php echo substr($row['unit'],0,1).'/'.$row['budgetid'].'/'.date('dmY', strtotime($row['budgetdate'])) ?></strong></a>
                                        <td style="text-transform: uppercase;"><?php echo count(explode(';',$row['spbid']));  ?></td>
                                        <td><?php echo $row['unit'] ?></td>
                                        <td><?php echo date('d M Y', strtotime($row['budgetdate']));?>
                                            <?php if(date('Y-m-d', strtotime($row['budgetdate'])) == date("Y-m-d")) { ?>
                                                <sup style="color:#d73925;"><i class="icon fa fa-asterisk"></i> new</sup>
                                            <?php } else { ?>
                                                <sup style="color:#d73925;"></sup>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                        </td>
                                    </tr>
                                <?php }	?>
                                </tbody>
                            </table>
                        <?php } else { echo 'No Budget yet today'; }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $('#datatables').DataTable({
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