<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small><?php echo $brand; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">PADI</a></li>
            <li class="active">Edit PO</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php echo form_open_multipart('ppo/editpo','id = "formvalidation"');?>
            <input type="hidden" name="id_ppo" value="<?php echo $drd[0]['id_ppo'];?>"/>
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12 no-padding">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Customer:</label>
                                    <textarea class="form-control tiny-po" name="txtCustomer">
                                        <?php echo $drd[0]['customer'];?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="text-right" style="font-size: 38px">PURCHASE ORDER</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>From:</label>
                                    <textarea class="form-control tiny-po" name="txtDari">
                                        <?php echo $drd[0]['dari'];?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-1">
                                <div class="form-group">
                                    <label>To:</label>
                                    <textarea class="form-control tiny-po" name="txtKepada">
                                        <?php echo $drd[0]['kepada'];?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label>PO Number:</label>
                                    <input type="text" name="txtPoNumber" class="form-control btn-block" value="<?php echo $drd[0]['ponumber'];?>"/>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label>Date:</label>
                                    <input type="text" name="txtDatepo" class="form-control btn-block datepicker" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div id="tabletrx" class="col-md-12" style="margin-top:10px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10%" class="text-center"><button id="tambahUnit" type="button" class="btn btn-sm btn-success">Tambah Unit</button></th>
                                        <th width="40%">UNIT</th>
                                        <th width="5%" class="text-center">QTY</th>
                                        <th width="10%" class="text-center">UNIT PRICE</th>
                                        <th width="10%" class="text-center">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody class="row-unit">
                                <?php if(count($drdunit) > 0): ?>
                                    <?php for($i=0; $i<count($drdunit); $i++): ?>
                                        <input type="hidden" name="id_ppounit[]" value="<?php echo $drdunit[$i]['id_ppounit'];?>"/>
                                        <tr data-id='<?php echo $i+1;?>'>
                                            <td width='10%' class='text-center'>
                                                <button id='hapusTrx' type='button' class='btn btn-danger btn-sm' data-id='<?php echo $i+1;?>'><i class='fa fas fa-window-close'></i> Hapus</button>
                                            </td>
                                            <td>
                                                <input type='text' name='unit[]' class='btn-block form-control' autocomplete='off' placeholder='Nama Unit' value="<?php echo $drdunit[$i]['namaunit'];?>"/>
                                                <input type='text' name='keterangan[]' class='btn-block form-control' autocomplete='off' placeholder='Keterangan' value="<?php echo $drdunit[$i]['keterangan'];?>"/>
                                            </td>
                                            <td>
                                                <input type='number' id='qty' name='qty[]' class='text-center qty form-control' data-id='<?php echo $i+1;?>' autocomplete='off' value="<?php echo $drdunit[$i]['qty'];?>"/>
                                            </td>
                                            <td>
                                                <input type='text' id='price' name='price[]' class='text-right price form-control' data-id='<?php echo $i+1;?>' autocomplete='off' value="<?php echo $drdunit[$i]['price'];?>"/>
                                            </td>
                                            <td>
                                                <input type='text' readonly name='total[]' class='text-right total-price form-control' data-id='<?php echo $i+1;?>' value="<?php echo $drdunit[$i]['qty']*$drdunit[$i]['price'];?>"/>
                                                <input type='hidden' disabled name='total-price-text[]' class='text-right total-price-text form-control' data-id='<?php echo $i+1;?>' value="<?php echo $drdunit[$i]['qty']*$drdunit[$i]['price'];?>"/>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td><strong>Biaya Kirim</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td><input id="ongkir" name="txtOngkir" type="text" class="form-control text-right" value="<?php echo $drd[0]['ongkir'];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
                                        <td><input type="text" name="txtGrandTotal" readonly class="form-control grand-total text-right" value="<?php echo $drd[0]['totalpo'];?>"/></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Notes:</label>
                                    <textarea class="form-control tiny-po" name="txtNotes"><?php echo $drd[0]['notes'];?></textarea>
                                </div>
                            </div>
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

<script>
$('.datepicker').datepicker({
	format: 'yyyy-mm-dd',
	autoclose: true,
	todayHighlight: true
	});
	
    var tinymce_uri = "<?php echo $this->config->item('template_uri');?>";
    (function( $ ){
        $.fn.sum=function () {
            var sum=0;
            $(this).each(function(index, element){
                if($(element).val()!="")
                    sum += parseFloat($(element).val());
            });
            return sum;
        };
    })( jQuery );

    $(function() {
        $('.selectpicker').select2();
        var tinymce_uri = "<?php echo $this->config->item('template_uri');?>";

        tinymce.init({
            selector: ".tiny-po",
            force_br_newlines : false,
            force_p_newlines : false,
            forced_root_block : '',
            menubar: '',
            theme: "modern",
            height: 120,
            toolbar1: "bold | italic | underline | fontsizeselect",
            fontsize_formats: "8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt",
            content_style: ".mce-content-body {font-size:14px;font-family:Arial,sans-serif;}",
            image_advtab: true,
        });

        var addproductId = [<?php if(count($drdunit) > 0): for($i=0; $i<count($drdunit)+1; $i++){ echo ($i+1).','; } else: endif;?>];

        $(document).on('change', '#qty', function(e){
            var $id = $(this).attr("data-id");

            var qty = $(".qty[data-id='"+$id+"']").val();
            var price = $(".price[data-id='"+$id+"']").val();
            $(".price[data-id='"+$id+"']").val(number_format(price,0,'','.'));

            var replacePrice = price.replace(/\./g,'');
            var totalPrice = qty*replacePrice;
            $(".total-price-text[data-id='"+$id+"']").val(totalPrice);
            $(".total-price[data-id='"+$id+"']").val(number_format(totalPrice,0,'','.'));

            var gt = $('.total-price-text').sum();
            var ongkir = $('#ongkir').val();
            var replaceOngkir = ongkir.replace(/\./g,'');
            var gtongkir = +gt + +replaceOngkir;
            $(".grand-total").val(number_format(gtongkir,0,'','.'));
        });

        $(document).on('keyup', '#price', function(e){
            var $id = $(this).attr("data-id");

            var qty = $(".qty[data-id='"+$id+"']").val();
            var price = $(".price[data-id='"+$id+"']").val();
            $(".price[data-id='"+$id+"']").val(number_format(price,0,'','.'));

            var replacePrice = price.replace(/\./g,'');
            var totalPrice = qty*replacePrice;
            $(".total-price-text[data-id='"+$id+"']").val(totalPrice);
            $(".total-price[data-id='"+$id+"']").val(number_format(totalPrice,0,'','.'));

            var gt = $('.total-price-text').sum();
            var ongkir = $('#ongkir').val();
            var replaceOngkir = ongkir.replace(/\./g,'');
            var gtongkir = +gt + +replaceOngkir;
            $(".grand-total").val(number_format(gtongkir,0,'','.'));
        });

        $(document).on('keyup', '#ongkir', function(e){
            var ongkir = $('#ongkir').val();
            $('#ongkir').val(number_format(ongkir,0,'','.'));

            var gt = $('.total-price-text').sum();
            var replaceOngkir = ongkir.replace(/\./g,'');
            var gtongkir = +gt + +replaceOngkir;
            $(".grand-total").val(number_format(gtongkir,0,'','.'));
        });

        $(document).on('click', '#hapusTrx', function(e){
            var $id = $(this).data("id");
            $('#tabletrx tbody tr[data-id="'+$id+'"]').remove();

            var gt = $('.total-price-text').sum();
            $(".grand-total").val(gt);

            addproductId.shift($id);
        });

        $('#tambahUnit').on('click', function () {
            var $product = addproductId.length+1;
            var index = addproductId.length;

            var $tabletrx = $("#tabletrx");
            $tabletrx.find("table tbody").append("" +
                "<tr data-id='"+index+"'>" +
                "<td width='10%' class='text-center'><button id='hapusTrx' type='button' class='btn btn-danger btn-sm' data-id='"+index+"'><i class='fa fas fa-window-close'></i> Hapus</button></td>" +
                "<td><input type='text' name='unit[]' class='btn-block form-control' autocomplete='off' placeholder='Nama Unit'/><input type='text' name='keterangan[]' class='btn-block form-control' autocomplete='off' placeholder='Keterangan'/></td>" +
                "<td><input type='number' id='qty' name='qty[]' class='text-center qty form-control' data-id='"+index+"' autocomplete='off'/></td>" +
                "<td><input type='text' id='price' name='price[]' class='text-right price form-control' data-id='"+index+"' autocomplete='off'/></td>" +
                "<td><input type='text' readonly name='total[]' class='text-right total-price form-control' data-id='"+index+"'/><input type='hidden' disabled name='total-price-text[]' class='text-right total-price-text form-control' data-id='"+index+"'/></td>" +
                "</tr>");

            addproductId.push($product);
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
