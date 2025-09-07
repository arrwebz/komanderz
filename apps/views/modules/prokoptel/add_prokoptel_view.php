<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Funding</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('prokop');?>">Koptel</a>
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

<?php echo form_open_multipart('prokoptel/addproject');?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Add Form</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Informasi</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Nomor Surat</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <input name="chkB2B" type="button" value="%">
                                <spann>
                                <input name="txtKodenomor" type="text" class="form-control" placeholder="Tergenerate setelak klik Simpan" readonly>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Unit</label>
                            <select name="optUnit" class="form-control selectpicker" style="width:100%">
                                <option disabled selected>Select</option>
                                <option value="KOMET">KOMET</option>
                                <option value="MESRA">MESRA</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Segmen</label>
                            <select name="optSegment" class="form-control selectpicker" style="width:100%">
                                <option disabled selected>Select</option>
                                <?php
                                if(!empty($segment)){
                                    foreach($segment as $row){
                                        if (!empty($segmen) && $segmen == $row['segmentid'] ) {
                                            $strselected = "selected";
                                        } else {
                                            $strselected = " ";
                                        }
                                        echo '<option value="'.$row['segmentid'].'"'. $strselected.'>'.$row['name'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Segment not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Title</label>
                            <textarea name="txtProname" type="text" class="form-control"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Project Date</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtProdate" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Contract Number</label>
                            <input name="txtPronum" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Contract Value</label>
                            <input name="txtProval" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Term of payment</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Start Contract</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </div>
                                <input name="txtStartop" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">End Contract</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="txtEndop" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="txtNama" class="form-label fw-semibold">Period</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="txtPeriode" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <button type="submit" name="cmdsave" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
                    <a href="<?php echo base_url().$this->router->fetch_class();?>" class="btn btn-light rounded-pill px-4 waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').select2();

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