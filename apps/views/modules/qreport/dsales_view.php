<!DOCTYPE html>
<html style="color-scheme:dark;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->config->item('images_uri') ?>favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $this->config->item('images_uri') ?>favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->config->item('images_uri') ?>favicon/favicon-16x16.png">

    <title><?php echo $title;?></title>
    <meta name="description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">

    <meta property="og:title" content="Daily Report <?php echo date('d-m-Y');?>">
    <meta property="og:description" content="Daily Report <?php echo date('d-m-Y');?> Komanders">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo site_url('quickreport/dsales');?>">
    <meta property="og:image" content="<?php echo $this->config->item('skins_uri');?>images/backgrounds/logo-komet.png">
    <meta property="og:site_name" content="Komanders">

    <?php $this->carabiner->display('css_head');?>
    <style type="text/css">
        .margin-left-none{margin-left:0px !important;}
        .col-money{color: #2ecc71;}
        .font-10{font-size: 10px;}
        .font-24{font-size: 24px;}
        .font-40{font-size: 40px;}
        .font-62{font-size: 62px;}
        .font-58{font-size: 58px;}
        .mt5{margin-top: 5px;}
        .mt8{margin-top: 28px;} 
        .p-10{padding: 10px;}
        .p-20{padding: 20px;}
        .b-bottom{border-bottom: 1px solid #f4f4f4;}
        .no-boxshadow{box-shadow: none;}
        .no-radius{border-radius: unset;}
        .col-white{color:#CBD5E1;}
        .bg-dark{background: #1B253B;color: #CBD5E1;}
        .box-dark{background: #232D45; border: none; color:#CBD5E1 !important;}
        .nav-tabs-custom>.tab-content{background: #232D45;}
        .nav-tabs-custom>.nav-tabs>li>a{color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs.pull-right>li{background: #232D45; color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs>li.active{border-top-color:#CBD5E1;}
        .nav-tabs-custom>.nav-tabs>li>a:hover, .nav-tabs-custom>.nav-tabs>li.active>a:hover{color: #dbe5f1;}
        .nav-tabs-custom>.nav-tabs>li.active>a, .nav-tabs-custom>.nav-tabs>li.active:hover>a{background-color: #232D45 !important;}
        .nav-tabs-custom>.nav-tabs>li.active>a{background: #232D45 !important; color:#CBD5E1;}
        .info-box-number {display: block;font-weight: bold;font-size: 18px;}
        .description-block{display: block;margin: 10px 0;text-align: center;}
        .border-right{border-right: 1px solid #f4f4f4;}
    </style>

    <?php $this->carabiner->display('js_head');?>
</head>
<body class="hold-transition lockscreen bg-dark">
<div style="max-width: 100%;">
    <section class="content p-20">
        <div class="card no-radius p-10 box-dark">
            <div class="card-header p-10 b-bottom col-white">
                <div class="row">
                    <div class="box-title col-lg-6">
                        <span class="font-40">DAILYREPORT SALES</span>
                        <br><i><?php echo customDate(date('Y-m-d H:i:s'));?></i>
                    </div>
                    <div class="box-tools col-lg-6 text-right">
                        <img src="<?php echo base_url() . 'public/assets/dist/img/logo-komet-white.png'; ?>" alt="Koperasi Metropolitan" width="95px"/>
                    </div>
                </div>
            </div>
            <div class="card-body p-10" style="margin:0 20px;">
                <!-- box atas -->
                <div class="row col-md-12">
                    <div class="col-md-3 no-padding">
                        <div class="margin-bottom-none no-border">
                            <div class="info-box-content margin-left-none">
                                <span>Realisasi Q3</span>
                                <br><span class="info-box-number col-money font-24 col-money">Rp <?php echo strrev(implode('.',str_split(strrev(strval($realisasiq)),3)));?></span>
                                <span class="progress-description font-10">Target Q3 : <?php echo formatrev($targetqsales);?></span>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-3 no-padding">
                        <div class="col-md-12">
                            <div class="font-58 text-center"><small><i class="ti ti-trending-up" style="color: #2ecc71; font-size: medium; padding: 10px;"></i></small><?php echo sprintf("%0.1f", $prosentasereal);?><small style="font-size: small;">%</small></div>
                        </div>
                    </div>
                    <div class="col-md-3 no-padding">
                        <div class="margin-bottom-none no-border">
                            <div class="info-box-content margin-left-none">
                                <span>SALES CURRENT MONTH</span>
                                <div class="row col-md-12">
                                    <div class="col-md-6">VOL</div>
                                    <div class="col-md-6">VAL</div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-6 col-money font-10"><?php echo $volvalnopesmonthly[0]['volinv'];?></div>
                                    <div class="col-md-6 col-money font-10"><?php echo strrev(implode('.',str_split(strrev(strval($volvalnopesmonthly[0]['valinv'])),3)));;?></div>
                                </div> 
                                <div class="row col-md-12">
                                    <span class="progress-description font-10 mt5">Target CM : <?php echo formatrev($targetcmsales);?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 no-padding">
                        <div class="col-md-12">
                            <div class="font-58 text-center"><small><i class="ti ti-chevrons-up" style="color: #2ecc71; font-size: medium; padding: 10px;"></i></small><?php echo sprintf("%0.1f", $prosentasenopespros);?><small style="font-size: small;">%</small></div>
                        </div>
                    </div>
                </div>
				<div class="row mt8">
                    <div class="col-sm-6 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header col-money" style="font-size: small">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalinv[0]['totalinv'])),3)))?></h5>
                            <span class="description-text col-white" style="font-size: small">TOTAL INVOICE</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="description-block"> 
                            <h5 class="description-header" style="color:#e35d59; font-size: small">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalacr[0]['totalacr'])),3)))?></h5>
                            <span class="description-text col-red" style="font-size: small">TOTAL ACCRUAL</span>
                        </div>
                    </div>
                </div>
                <div class="row mt8">
                    <div class="col-sm-3 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header col-money">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalrev[0]['totalrev'])),3)))?></h5>
                            <span class="description-text col-white">TOTAL REVENUE</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header" style="color:#e35d59">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalcost[0]['totalcost'])),3)))?></h5>
                            <span class="description-text col-white">TOTAL COST</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header col-money">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalprofit[0]['totalprofit'])),3)))?></h5>
                            <span class="description-text col-white">TOTAL MARGIN</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6"> 
                        <div class="description-block">
                            <h5 class="description-header col-money">181 M</h5>
                            <span class="description-text col-white">GOAL COMPLETIONS</span>
                        </div>
                    </div>
                </div>

                <div class="row col-md-12 mt8">
                    <div class="box box-dark">
                        <div class="box-header font-24 col-white">YoY Report : VAL</div>
                        <div class="box-body">
                            <p class="text-center"><strong>Total Invoice Monthly <?php echo (date('Y')-1).' vs '.date('Y');?></strong></p>
                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <div id="chartyoyval" style="height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- sales YoY-->
                <div class="row col-md-12">
                    <div class="col-md-8 mt8">
                        <div class="box box-dark">
                            <div class="box-header font-24 col-white">Division Sales YoY Semester I</div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartdivisionyoy" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt8">
                        <div class="box box-dark">
                            <div class="box-header font-24 col-white">User Performance Semester I</div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartdist" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-md-12">
                    <div class="col-md-8 mt8">
                        <div class="box box-dark">
                            <div class="box-header font-24 col-white">Division Sales YoY Semester II</div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartdivisionyoysm2" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt8">
                        <div class="box box-dark">
                            <div class="box-header font-24 col-white">User Performance Semester II</div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartdistsm2" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                

                <!-- box prospect monthly -->
                <div class="row col-md-12 mt8">
                    <div class="col-md-8">
                        <div class="box box-dark no-boxshadow">
                            <div class="box-header col-white">
                                <span class="font-40">Realisasi <?php echo date('F Y');?></span>
                            </div>
                            <div class="box-body">
                                <div class="nav-tabs-custom box-dark" style="cursor: move;">
                                    <ul class="nav nav-tabs salespf" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#revenue-chart" role="tab" aria-selected="false" tabindex="-1">
                                                <span>Value</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#sales-chart" role="tab" aria-selected="false" tabindex="-1">
                                                <span>Volume</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-padding">
                                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            <div id="chartamval" class="box-dark" style="height: 250px;"></div>
                                        </div>
                                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                            <div id="chartamvol" class="box-dark" style="height: 250px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-dark no-boxshadow">
                            <div class="box-header">
                                <div class="font-40 text-center col-white"><?php echo sprintf("%0.1f", $prosentasereal);?>%</div>
                            </div>
                            <div class="box-body">
                                <div style="padding: 0px 30px; margin: 0 auto;">
                                    <h2 class="text-center col-white"><i class="ti ti-users"></i> AM ACHIEVMENT</h2>
                                    <?php foreach($amval as $key=>$row){?>
                                        <div class="col-md-12" style="font-size: 18px;">
                                            <p>
                                                <span><?php echo ($key+1).'. '.$row['amkomet'];?></span>
                                                <span class="float-end">
                                                    Rp. <?php echo strrev(implode('.',str_split(strrev(strval($row['basevalue'])),3)));?>
                                                </span>
                                            </p>
                                            <hr>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="lockscreen-footer text-center">
        Copyright &copy; <?php echo date('Y')?>. All rights reserved
        <br><b>Crafted with <i class="ti ti-heart" style="color: #f06548 !important;"></i> by Koperasi Metropolitan</b>
        <br><p style="color: #8f9b9f;">rendering in {elapsed_time} seconds</p>
        <br>
    </div>
</div>

<?php $this->carabiner->display('js_content');?>
<script>
	$(function () {
		function reloadletter() {
			window.location.href = '<?php echo site_url('quickreport/dsales')?>';
		}
		setInterval(reloadletter , 60000); /* setiap 15 detik */

		var table = $('#datatables1, #datatables2, #datatables3, #datatables4, #datatables5, #datatables6, #datatables7, #datatables8').DataTable({
			'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
	});

	am4core.ready(function() {
		// Themes begin
		am4core.useTheme(am4themes_dark);
		am4core.useTheme(am4themes_frozen);
		am4core.useTheme(am4themes_animated)
		// Themes end

		//------Start chart YoY VAL
		var chart = am4core.create("chartyoyval", am4charts.XYChart);

		chart.data = <?php echo $drdvalyoy ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2025): [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY VAL

		//------Start chart YoY Division
		var chart = am4core.create("chartdivisionyoy", am4charts.XYChart);

		chart.data = <?php echo $divisionyoy ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "division";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "division";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "division";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2025): [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY Division

		//------Start chart YoY Division
		var chart = am4core.create("chartdivisionyoysm2", am4charts.XYChart);

		chart.data = <?php echo $divisionyoysm2 ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "division";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "division";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "division";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2025): [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY Division

		//---------Start chart User Performance
		var chart = am4core.create("chartdist", am4charts.PieChart3D);
		chart.hiddenState.properties.opacity = 0;

		chart.legend = new am4charts.Legend();

		chart.data = <?php echo $invdist ?>;

		var series = chart.series.push(new am4charts.PieSeries3D());
		series.dataFields.value = "valinv";
		series.dataFields.category = "division";
		series.hiddenInLegend = true;
		//------End chart User Performance

		// ---------Start chart User Performance
		var chart = am4core.create("chartdistsm2", am4charts.PieChart3D);
		chart.hiddenState.properties.opacity = 0;

		chart.legend = new am4charts.Legend();

		chart.data = <?php echo $invdistsm2 ?>;

		var series = chart.series.push(new am4charts.PieSeries3D());
		series.dataFields.value = "valinv";
		series.dataFields.category = "division";
		series.hiddenInLegend = true;
		//------End chart User Performance

		//------Start chart AM Volume
		var chart = am4core.create("chartamvol", am4charts.XYChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.paddingBottom = 30;

		chart.data = <?php echo $drdamvol ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "amkomet";
		categoryAxis.renderer.grid.template.strokeOpacity = 0;
		categoryAxis.renderer.minGridDistance = 10;
		categoryAxis.renderer.labels.template.dy = 35;
		categoryAxis.renderer.tooltip.dy = 35;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.renderer.inside = true;
		valueAxis.renderer.labels.template.fillOpacity = 0.3;
		valueAxis.renderer.grid.template.strokeOpacity = 0;
		valueAxis.min = 0;
		valueAxis.cursorTooltipEnabled = false;
		valueAxis.renderer.baseGrid.strokeOpacity = 0;

		var series = chart.series.push(new am4charts.ColumnSeries);
		series.dataFields.valueY = "orderid";
		series.dataFields.categoryX = "amkomet";
		series.tooltipText = "{valueY.value}";
		series.tooltip.pointerOrientation = "vertical";
		series.tooltip.dy = - 6;
		series.columnsContainer.zIndex = 100;

		var columnTemplate = series.columns.template;
		columnTemplate.width = am4core.percent(50);
		columnTemplate.maxWidth = 66;
		columnTemplate.column.cornerRadius(60, 60, 10, 10);
		columnTemplate.strokeOpacity = 0;

		series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#13deb9"), max: am4core.color("#13deb9") });
		/*series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });*/
		series.mainContainer.mask = undefined;

		var cursor = new am4charts.XYCursor();
		chart.cursor = cursor;
		cursor.lineX.disabled = true;
		cursor.lineY.disabled = true;
		cursor.behavior = "none";

		var bullet = columnTemplate.createChild(am4charts.CircleBullet);
		bullet.circle.radius = 30;
		bullet.valign = "bottom";
		bullet.align = "center";
		bullet.isMeasured = true;
		bullet.mouseEnabled = false;
		bullet.verticalCenter = "bottom";
		bullet.interactionsEnabled = false;

		var hoverState = bullet.states.create("hover");
		var outlineCircle = bullet.createChild(am4core.Circle);
		outlineCircle.adapter.add("radius", function (radius, target) {
			var circleBullet = target.parent;
			return circleBullet.circle.pixelRadius + 10;
		})

		var image = bullet.createChild(am4core.Image);
		image.width = 60;
		image.height = 60;
		image.horizontalCenter = "middle";
		image.verticalCenter = "middle";
		image.propertyFields.href = "amphoto";

		image.adapter.add("mask", function (mask, target) {
			var circleBullet = target.parent;
			return circleBullet.circle;
		})

		var previousBullet;
		chart.cursor.events.on("cursorpositionchanged", function (event) {
			var dataItem = series.tooltipDataItem;

			if (dataItem.column) {
				var bullet = dataItem.column.children.getIndex(1);

				if (previousBullet && previousBullet != bullet) {
					previousBullet.isHover = false;
				}

				if (previousBullet != bullet) {

					var hs = bullet.states.getKey("hover");
					hs.properties.dy = -bullet.parent.pixelHeight + 30;
					bullet.isHover = true;

					previousBullet = bullet;
				}
			}
		})
		//------End chart AM Vol

		//------Start chart AM Value
		var chart = am4core.create("chartamval", am4charts.XYChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.paddingBottom = 30;

		chart.data = <?php echo $drdamval ?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "amkomet";
		categoryAxis.renderer.grid.template.strokeOpacity = 0;
		categoryAxis.renderer.minGridDistance = 10;
		categoryAxis.renderer.labels.template.dy = 35;
		categoryAxis.renderer.tooltip.dy = 35;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.renderer.inside = true;
		valueAxis.renderer.labels.template.fillOpacity = 0.3;
		valueAxis.renderer.grid.template.strokeOpacity = 0;
		valueAxis.min = 0;
		valueAxis.cursorTooltipEnabled = false;
		valueAxis.renderer.baseGrid.strokeOpacity = 0;

		var series = chart.series.push(new am4charts.ColumnSeries);
		series.dataFields.valueY = "basevalue";
		series.dataFields.categoryX = "amkomet";
		series.tooltipText = "{valueY.value}";
		series.tooltip.pointerOrientation = "vertical";
		series.tooltip.dy = - 6;
		series.columnsContainer.zIndex = 100;

		var columnTemplate = series.columns.template;
		columnTemplate.width = am4core.percent(50);
		columnTemplate.maxWidth = 66;
		columnTemplate.column.cornerRadius(60, 60, 10, 10);
		columnTemplate.strokeOpacity = 0;

		series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#13deb9"), max: am4core.color("#13deb9") });
		/*series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });*/
		series.mainContainer.mask = undefined;

		var cursor = new am4charts.XYCursor();
		chart.cursor = cursor;
		cursor.lineX.disabled = true;
		cursor.lineY.disabled = true;
		cursor.behavior = "none";

		var bullet = columnTemplate.createChild(am4charts.CircleBullet);
		bullet.circle.radius = 30;
		bullet.valign = "bottom";
		bullet.align = "center";
		bullet.isMeasured = true;
		bullet.mouseEnabled = false;
		bullet.verticalCenter = "bottom";
		bullet.interactionsEnabled = false;

		var hoverState = bullet.states.create("hover");
		var outlineCircle = bullet.createChild(am4core.Circle);
		outlineCircle.adapter.add("radius", function (radius, target) {
			var circleBullet = target.parent;
			return circleBullet.circle.pixelRadius + 10;
		})

		var image = bullet.createChild(am4core.Image);
		image.width = 60;
		image.height = 60;
		image.horizontalCenter = "middle";
		image.verticalCenter = "middle";
		image.propertyFields.href = "amphoto";

		image.adapter.add("mask", function (mask, target) {
			var circleBullet = target.parent;
			return circleBullet.circle;
		})

		var previousBullet;
		chart.cursor.events.on("cursorpositionchanged", function (event) {
			var dataItem = series.tooltipDataItem;

			if (dataItem.column) {
				var bullet = dataItem.column.children.getIndex(1);

				if (previousBullet && previousBullet != bullet) {
					previousBullet.isHover = false;
				}

				if (previousBullet != bullet) {

					var hs = bullet.states.getKey("hover");
					hs.properties.dy = -bullet.parent.pixelHeight + 30;
					bullet.isHover = true;

					previousBullet = bullet;
				}
			}
		})
		//------End chart AM Val
	});
</script>
</body>
</html>