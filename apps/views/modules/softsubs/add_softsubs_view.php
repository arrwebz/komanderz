<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Logistics</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('targetam');?>">Software Subscription</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Add</li>
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
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Account</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtProname" class="form-label fw-semibold">Product</label>
                            <input name="txtProname" type="text" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="optOrderby" class="form-label fw-semibold">Order By</label>
                            <select name="optOrderby" class="form-control selectpicker" >
                                <option disabled selected>Select</option>
                                <?php
                                foreach($user as $row){
                                    echo '<option value="'.$row['userid'].'">'.$row['fullname'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="txtUser" class="form-label fw-semibold">User</label>
                            <input name="txtUser" type="text" class="form-control user_tags" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtEmail" class="form-label fw-semibold">Email</label>
                            <input name="txtEmail" type="text" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="txtPassword" class="form-label fw-semibold">Password</label>
                            <input name="txtPassword" type="text" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="txtNolis" class="form-label fw-semibold">License</label>
                            <input name="txtNolis" type="text" class="form-control" required>
                        </div>
					</div>
                </div>
            </div>
			<div class="card-body p-4">
                <h5 class="fs-4 fw-semibold mb-4">Subscription</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtProname" class="form-label fw-semibold">Currency</label>
                            <input name="optCurrency" type="text" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Payment</label>
                            <select name="optTypeofpay" class="form-control selectpicker" >
                                <option disabled selected>Select</option>
                                <option value="cc">CC</option>
                                <option value="transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Card</label>
                            <input name="txtCardnum" type="text" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Start</label>
                            <input name="txtStartsubs" type="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Price</label>
                            <input name="txtSoftsubsval" type="text" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Bank</label>
                            <input name="txtPayname" type="text" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="txtNolis" class="form-label fw-semibold">Plans</label>
                            <select name="optTypesubs" class="form-control selectpicker" >
                                <option disabled selected>Select</option>
                                <option value="tahunan">Tahunan</option>
                                <option value="bulanan">Bulanan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">End</label>
                            <input name="txtEndsubs" type="date" class="form-control" required>
                        </div>
					</div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">
                        Submit
                    </button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
	    $('.selectpicker').select2();

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
			    return 'badge bg-primary font-size-14 classPenarikan';
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