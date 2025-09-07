<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small><?php echo $brand; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Billing</a></li>
        <li class="active">Pencarian Nopes Padi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Hasil pencarian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="material-datatables">
				<?php if (count ( $drd ) > 0) { ?>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Order</th>
								<th>Segmen</th>
								<th>User</th>
								<th>Tel/SPK/VSO</th>
                                <th>Invoice</th>
                                <th>Faktur</th>
                                <th>Nilai Dasar</th> 
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Order</th>
								<th>Segmen</th>
								<th>User</th>
								<th>Tel/SPK/VSO</th>
                                <th>Invoice</th>
                                <th>Faktur</th>
                                <th>Nilai Dasar</th> 
                                <th class="text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ( $drd as $row ) { ?>
                                <?php $i++; ?> 
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td style="text-transform: uppercase;"><a href="<?php echo base_url().$this->router->fetch_class(). '/details/'.$row['orderid']; ?>" style="<?php if($row['status'] == '9') { echo 'color: #e74c3c;'; } else { echo 'color: #00bcd4;'; }?>"><strong><?php echo $row['code'] ?></strong></a>
									<?php if ($row['procdat'] == '0000-00-00' && $row['status'] != '9' && $row['intervaldat'] >= '28' ) {  
									echo '<sup style="font-size: 8px;color:#dd4b39;"><i class="fa  fa-asterisk"></i></sup>';
									 } ?>
									<a class="btn btn-xs btn-default qd" data-href="<?php echo base_url().$this->router->fetch_class(). '/ajax_details'?>" data-id="<?php echo $row['orderid']; ?>" ><i class="fa fa-external-link-square"></i></a>
									</td>
									<td><?php echo $row['segment'];?></td>
									<td><?php echo $row['amuser'];?></td>
									<td>
                                        <?php echo $row['spknum'];?>
                                        <i class="fa fa-copy text-info copyspknum" data-spknum="<?php echo $row['spknum'] ?>"></i>&nbsp;
                                    </td>
                                    <td style="text-transform: uppercase;"><?php echo $row['invnum'] ?></td>
                                    <td style="text-transform: uppercase;"><?php echo $row['faknum'] ?></td>
                                    <td style="color: #fa591d;">Rp <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3))); ?></td> 
                                    <td class="text-right js-sweetalert">
                                    <?php $nav = array('1','2','3','4','6'); ?>
									<?php if(in_array($group, $nav)) { ?>
                                        <?php $navrole = array('1','2','3','4','5','6','7'); ?>
										<?php if(in_array($role, $navrole)) { ?>
										<small class="label label-primary"><?php echo $row['countspb'];?></small>
                                        <?php if($row['jobtype'] == 'TK'){ ?>
                                            <a href="javascript:" class="btn btn-xs btn-default" disabled=""><i> TKBW</i></a>
                                        <?php }else{ ?>
                                            <?php if($row['countspb'] == '0') { ?>
                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn btn-xs btn-default"><i> Buat SPB</i></a>
                                            <?php } elseif($row['countspb'] > '0') { ?>
                                                <a href="<?php echo base_url().$this->router->fetch_class(). '/addspb/'.$row['orderid']; ?>" class="btn btn-xs btn-primary"><i>+ Tambah SPB</i></a>
                                            <?php } ?>
										<?php } ?>
                                            
                                        <?php $navrole = array('1','2','4','5'); ?>
										<?php if(in_array($role, $navrole)) { ?>
										<a href="<?php echo base_url().$this->router->fetch_class(). '/editnopes/'.$row['orderid']; ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"> Ubah</i></a>
										<button data-href="<?php echo base_url().$this->router->fetch_class(). '/delete'?>" data-id="<?php echo $row['orderid']; ?>" class="btn btn-xs btn-default" onclick="sweet()"><i class="fa fa-trash-o"> Hapus</i></button>
										<?php } ?>
										<?php } ?>
									<?php } ?>	
									</td>
                                </tr>
                            <?php }	?>
                            </tbody>
                        </table>
                    <?php } else { echo 'Data tidak ditemukan!'; }?>
                </div>
            </div>
            <!-- /.box-body -->
			<div class="box-footer">
			  <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url().$this->router->fetch_class();?>';return false;"><i class="fa fa-reply"></i> Kembali</button>
			</div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function() {
       var table = $('#datatables').DataTable({
           'responsive'  : true,
			'paging'      : true,
            'lengthChange': true,
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
        var current_url = "<?php echo base_url("knopes");?>";
        var uri = $(this).attr("data-href");
        var id = $(this).attr("data-id");
        showCancelMessage(current_url,uri,id);
    });

    function showCancelMessage(current_url, uri, id){
        swal({
            title: "Yakin menghapus data?",
            text: "Data SPB yang berkaitan juga akan terhapus!  ",
            icon: "warning",
            buttons: ["Batal", "Hapus!"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                
                swal("Anda telah berhasil menghapus data ini selamanya.", {
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
							  location.href = current_url;
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

<!-- Modal -->
<div id="modal_details" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;"></h4>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
		<div class="form-group label-floating">
			<label class="control-label">Nomor Invoice</label>
			<input type="text" class="form-control" value="inv" disabled>
		</div>
		<div class="form-group label-floating">
			<label class="control-label">Nomor Faktur</label>
			<input type="text" class="form-control" value="fak" disabled>
		</div>
		<div class="form-group label-floating">
			<label class="control-label">Nomor Tel / SPK</label>
			<input type="text" class="form-control" value="spk" disabled>
		</div>
		<div class="form-group label-floating">
			<label class="control-label">Divisi</label>
			<input type="text" class="form-control" value="div" disabled>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group label-floating">
			<label class="control-label">Segmen</label>
			<input type="text" class="form-control" value="seg" disabled>
		</div> 		
		<div class="form-group label-floating">
			<label class="control-label">AM User</label>
			<input type="text" class="form-control" value="am1" disabled>
		</div> 	
		<div class="form-group label-floating">
			<label class="control-label">AM Komet</label>
			<input type="text" class="form-control" value="am2" disabled>
		</div> 	
		<div class="form-group label-floating">
			<label class="control-label">Nama Project</label>
			<input type="text" class="form-control" value="pn" disabled>
		</div> 	
      </div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>