<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class = "form-horizontal">
            <div class="card-header card-header-text" data-background-color="red">
                <h4 class="card-title">Detail Segment</h4>
            </div>
            <div class="card-content">
				<div class="row">
					 <label class="col-sm-2 label-on-left">Kode</label>
							<div class="col-sm-3">
								<div class="form-group">
								<label class="control-label"></label>
								<p><?php echo $kode ?></p>
							</div>
							</div>
				</div>
				<div class="row">
					 <label class="col-sm-2 label-on-left">Nama</label>
								<div class="col-sm-3">
									<div class="form-group">
									<label class="control-label"></label>
									<p><?php echo $nama ?></p>
								</div>
							</div>
				</div>
                <br/><br/><br/>
                <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>segment';return false;">Back</button>

            </div>
            </div>		
        </div>
    </div>
</div>