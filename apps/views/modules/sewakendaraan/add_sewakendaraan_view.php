<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Sewa Kendaraan</a></li>
            <li class="active">Tambah Data</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php echo form_open_multipart('sewakendaraan/addsewakendaraan');?>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>PIC:</label>
                            <input name="txtPic" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Segmen:</label>
                            <input name="txtSegmen" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kendaraan:</label>
                            <input name="txtKendaraan" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No Polisi:</label>
                            <input name="txtNopolisi" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tahun:</label>
                            <input name="txtTahun" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <input name="txtAlamat" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Jangka Waktu</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Biaya:</label>
                            <input name="txtBiaya" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jangka Waktu:</label>
                            <input name="txtJangkawaktu" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No Kontrak:</label>
                            <input name="txtNokontrak" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mulai Kontrak:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="txtStartkontrak" type="text" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Selesai Kontrak:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="txtEndkontrak" type="text" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan:</label>
                            <input name="txtKeterangan" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" name="cmdsave" class="btn btn-success pull-right">Selesai</button>
            </div>
            <?php echo form_close();?>
        </div>
    </section>
</div>

<script type="text/javascript">

    $(function() {
	    $('.selectpicker').select2();
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

	    var userTags = new Bloodhound({
		    datumTokenizer: function (d) {
			    return Bloodhound.tokenizers.whitespace(d.value)
		    },
		    queryTokenizer: Bloodhound.tokenizers.whitespace,
		    remote: {
			    url: "<?php echo site_url('softsubs/detailuser'); ?>",
			    replace: function(url, query) {
				    return url + "?name=" + query;
			    },
			    ajax : {
				    beforeSend: function(jqXhr, settings){
					    settings.data = $.param({q: queryInput.val()})
				    },
				    type: "GET"
			    }
		    }
	    });
	    userTags.clearPrefetchCache();
	    userTags.initialize();
	    user_tags = $('.user_tags');
	    user_tags.tagsinput({
		    tagClass: function(item) {
			    return 'label bg-green font-size-14 classPenarikan';
		    },
		    confirmKeys: [13, 44],
		    maxTags: 5,
		    itemValue: 'value',
		    itemText: 'text',
		    typeaheadjs:{
			    limit: 50,
			    displayKey: 'text',
			    source: userTags.ttAdapter(),
		    }
	    });


        $('#idr1').on('input', function(){

            var value = $('#idr1').val();

            var convert = number_format(value,0,'','.');

            $("#idr1").val(convert);

        });

        $('#idr2').on('input', function(){

            var value = $('#idr2').val();

            var convert = number_format(value,0,'','.');

            $("#idr2").val(convert);

        });

        function number_format(number, decimals, decPoint, thousandsSep) {

            number = (number + '').replace(/[^0-9]/g, '');

            var n = !isFinite(+number) ? 0 : +number;

            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);

            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;

            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;

            var s = '';

            var toFixedFix = function (n, prec) {

                var k = Math.pow(10, prec);

                return '' + (Math.round(n * k) / k).toFixed(prec);

            };

            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

            if (s[0].length > 3) {

                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);

            }

            if ((s[1] || '').length < prec) {

                s[1] = s[1] || '';

                s[1] += new Array(prec - s[1].length + 1).join('0');

            }
            return s.join(dec);
        }

    });
</script>