<div class="intro-y flex flex-col sm:flex-row items-center mt-5 mb-5">
    <h2 class="text-lg font-medium mr-auto">
        Request Order
    </h2>
</div>
<div class="intro-y box p-5">
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y grid-cols-6 col-span-6 md:col-span-6">
			<label for="crud-form-1" class="form-label">No. Request</label>
			<input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text"> 
		</div>
		<div class="intro-y grid-cols-6 col-span-6 md:col-span-6">
			<label for="crud-form-1" class="form-label">No. Request</label>
			<input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text"> 
		</div>
	</div>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y grid-cols-6 col-span-6 md:col-span-6">
			<label for="crud-form-1" class="form-label">Division</label>
			<input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text"> 
		</div>
		<div class="intro-y grid-cols-6 col-span-6 md:col-span-6">
			<label for="crud-form-1" class="form-label">No. Request</label>
			<input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text"> 
		</div>
	</div>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y grid-cols-6 col-span-6 md:col-span-6">
			<button class="btn btn-outline-primary">Search</button>
		</div>
	</div>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Data List
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">Add New</button>
        <div class="dropdown ml-auto sm:ml-0">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" class="lucide lucide-plus w-4 h-4" data-lucide="plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="#" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-plus" data-lucide="file-plus" class="lucide lucide-file-plus w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg> New Category </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="users" data-lucide="users" class="lucide lucide-users w-4 h-4 mr-2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 00-3-3.87"></path><path d="M16 3.13a4 4 0 010 7.75"></path></svg> New Group </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="intro-y box mt-5 overflow-x-auto">
    <?php if (count ( $drd ) > 0) { ?>
        <table id="datatables" class="table table-striped table-no-bordered table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Order</th>
                <th>Tipe Order</th>
                <th>Segmen</th>
                <th>Invoice</th>
                <th>Faktur</th>
                <th>Nilai Dasar</th>
                <th class="disabled-sorting text-right"></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No</th>
                <th>Kode Order</th>
                <th>Tipe Order</th>
                <th>Segmen</th>
                <th>Invoice</th>
                <th>Faktur</th>
                <th>Nilai Dasar</th>
                <th class="text-right"></th>
            </tr>
            </tfoot>
            <tbody>
            <?php $i = 0; ?>
            <?php foreach ( $drd as $row ) { ?>
                <?php $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #341f97;'; }?>"><strong><?php echo $row['code'] ?></strong></a></td>
                    <td style="text-transform: uppercase;"><?php echo $row['orderstatus'] ?></td>
                    <td><?php echo $row['segment'];?></td>
                    <td style="text-transform: uppercase;"><?php echo $row['invnum'] ?></td>
                    <td style="text-transform: uppercase;"><?php echo $row['faknum'] ?></td> 
                    <td style="color: #ef4444;"><?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td>
                    <td class="text-right js-sweetalert">
                        <?php $nav = array('1','2','3','4','6'); ?>
                        <?php if(in_array($group, $nav)) { ?>
                            <?php $navrole = array('1','2','3','4','5','6','7'); ?>
                            <?php if(in_array($role, $navrole)) { ?>
                               <span class="text-xs px-1 rounded-full bg-slate-100 text-slate-500 dark:bg-darkmode-800 dark:text-slate-300 mr-1"><?php echo $row['countspb'];?></span>
                                <?php if($row['jobtype'] == 'TK'){ ?>
                                    <a href="javascript:" class="btn btn-xs btn-default" disabled=""><i> TKBW</i></a>
                                <?php }else{ ?>
                                    <?php if($row['countspb'] == '0') { ?>
                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn btn-sm btn-default"><i> SPB</i></a>
                                    <?php } elseif($row['countspb'] > '0') { ?>
                                        <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn btn-sm btn-primary"><i>+ SPB</i></a>
                                    <?php } ?>
                                <?php } ?>

                                <?php $navrole = array('1','2','4'); ?>
                                <?php if(in_array($role, $navrole)) { ?>
                                    <a href="<?php echo base_url().$this->router->fetch_class(). '/editnopes/'.$row['orderid']; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                                    <button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['orderid']; ?>" class="btn btn-sm btn-danger" onclick="sweet()"><i class="fa fa-trash-o"></i></button>
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

<script>
	jQuery.noConflict();
	(function( $ ) {
		$(function() {
            var table = $('#datatables').DataTable({
                'responsive'  : true,
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true

            });
	    });
	})(jQuery);
</script>