<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home');?>"><i class="fa fa-dashboard"></i> home</a></li>
            <li><a href="javascript:"><?php echo strtolower($title);?></a></li>
            <li class="active"><?php echo strtolower($brand);?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php echo form_open_multipart('tbot/editbot/'.$drd[0]['botid'],'id = "formvalidation"');?>
            <input type="hidden" name="txtBotid" value="<?php echo $drd[0]['botid'];?>"/>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Bot</label>
                            <input name="txtName" type="text" class="form-control" value="<?php echo $drd[0]['name'];?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap Bot</label>
                            <input name="txtFullname" type="text" class="form-control" value="<?php echo $drd[0]['fullname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Text Interupt</label>
                            <input name="txtTextinterupt" type="text" class="form-control" value="<?php echo $drd[0]['text_interupt'];?>">
                        </div>
                        <div class="form-group">
                            <label>Tentang Bot</label>
                            <textarea name="txtAboutme" id="" cols="10" rows="5" class="form-control"><?php echo $drd[0]['about_me'];?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Note</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Note Online</label>
                            <textarea name="txtNoteonline" id="" cols="10" rows="5" class="form-control"><?php echo $drd[0]['note_online'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Note Offline</label>
                            <textarea name="txtNoteoffline" id="" cols="10" rows="5" class="form-control"><?php echo $drd[0]['note_offline'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Note Maintanance</label>
                            <textarea name="txtNotemaintanance" id="" cols="10" rows="5" class="form-control"><?php echo $drd[0]['note_maintain'];?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Status Bot </label>
                            <select name="optStatus" class="form-control selectpicker">
                                <option value="1" <?php if($drd[0]['status'] == '1'){ echo 'selected'; }?>>Online</option>
                                <option value="2" <?php if($drd[0]['status'] == '2'){ echo 'selected'; }?>>Offline</option>
                                <option value="3" <?php if($drd[0]['status'] == '3'){ echo 'selected'; }?>>Maintanance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Suara Bot </label>
                            <select name="optSpeakchat" class="form-control selectpicker">
                                <option value="1" <?php if($drd[0]['speakchat'] == '1'){ echo 'selected'; }?>>Dapat Bersuara</option>
                                <option value="2" <?php if($drd[0]['speakchat'] == '2'){ echo 'selected'; }?>>Tidak Dapat Bersuara</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" name="cmdsave" id="cmdsave" class="btn btn-success pull-right">Selesai</button>
            </div>
            <?php echo form_close();?>
        </div>
    </section>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.selectpicker').select2();
	});
</script>