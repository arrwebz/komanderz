<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Dashboard</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('analytics');?>">Analytics</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Dashboard.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-3 d-flex align-items-stretch">
            <a href="javascript:void(0)" class="card border-0 zoom-in bg-danger-subtle shadow-none w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo $this->config->item('images_uri');?>svgs/icon-favorites.svg" width="50" height="50" class="mb-3" alt="">
                        <div class="ms-auto text-danger">
                            <i class="ti ti-arrow-right fs-8"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h4 class="card-title mb-1 text-danger">
                            <?php echo $totalinvtd[0]['totalinvoicetoday']; ?>
                        </h4>
                        <h6 class="card-text fw-normal text-danger">
                            Invoices
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 d-flex align-items-stretch">
            <a href="javascript:void(0)" class="card border-0 zoom-in bg-info-subtle shadow-none w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
						<img src="<?php echo $this->config->item('images_uri');?>svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="">
                        <div class="ms-auto text-info">
                            <i class="ti ti-arrow-right fs-8"></i>
                        </div> 
                    </div>
                    <div class="mb-4">
                        <h4 class="card-title mb-1 text-info">
                            <?php echo $totalspb[0]['totalspb']; ?>
                        </h4>
                        <h6 class="card-text fw-normal text-info">
                            SPB Partner Payouts 
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 d-flex align-items-stretch">
            <a href="javascript:void(0)" class="card border-0 zoom-in bg-success-subtle shadow-none w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
						<img src="<?php echo $this->config->item('images_uri');?>svgs/icon-speech-bubble.svg" width="50" height="50" class="mb-3" alt="">
                        <div class="ms-auto text-success">
                            <i class="ti ti-arrow-right fs-8"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h4 class="card-title mb-1 text-success">
                            <?php echo $totalpaid[0]['totalcair']; ?><small>%</small>
                        </h4>
                        <h6 class="card-text fw-normal text-success">
                            Collection Paid
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 d-flex align-items-stretch">
            <a href="javascript:void(0)" class="card border-0 zoom-in bg-warning-subtle shadow-none w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo $this->config->item('images_uri');?>svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="">
                        <div class="ms-auto text-warning">
                            <i class="ti ti-arrow-right fs-8"></i>
                        </div>
                    </div>
                    <div class="mt-b">
                        <h4 class="card-title mb-1 text-warning">
                            <?php echo $memberactive[0]['totalmember']; ?>
                        </h4>
                        <h6 class="card-text fw-normal text-warning">
                            Active Members
                        </h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-9">
                            <h5 class="card-title mb-9 fw-semibold">
                                Gross Profit
                            </h5>
                            <h4 class="fw-semibold mb-3" style="color: #fa591d;"><strong>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($newestimasiprofit[0]['estprofit'])),3))); ?></strong></h4>
                            <div class="d-flex align-items-center pb-1">
                                 <span class="me-2 rounded-circle bg-success-subtle round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-right text-success"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">Asumsi Biaya Opr Perbulan : 1.1 M</p>
                            </div>
                        </div>
						<div class="col-3">
							<div class="text-center mb-n5">
								<img src="<?php echo $this->config->item('images_uri');?>breadcrumb/Cash.png" alt="" class="img-fluid mb-n4">
							</div>
						</div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-9">
                            <h5 class="card-title mb-9 fw-semibold">
                                Q2 Realization
                            </h5>
                            <h4 class="fw-semibold mb-3" style="color: #fa591d;"><strong>Rp <?php echo strrev(implode('.',str_split(strrev(strval($realisasiq)),3)));?></strong></h4>
                            <div class="d-flex align-items-center pb-1"> 
                                <span class="me-2 rounded-circle bg-danger-subtle round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-right text-danger"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">Target Q2 : 45 M</p>
                            </div> 
                        </div>
						<div class="col-3">
							<div class="text-center mb-n5">
								<img src="<?php echo $this->config->item('images_uri');?>breadcrumb/TargetDoc.png" alt="" class="img-fluid mb-n4">
							</div>
						</div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
			<div class="card card-hover">
				<div class="card-body">
					<h5 class="card-title fw-semibold">Monthly Recap Report</h5>
					<div class="row">
						<div class="col-md-8">
							<p class="text-center">
								Sales: 01 January 2025 - <?php echo date('d F Y', strtotime($lastdate[0]['crdat'])); ?>
							</p>
							<p class="text-center">
								Total: <strong><?php echo $totalinv[0]['totalinvoice']; ?> invoices</strong>
							</p>
							<div id="chartvol" style="height: 150px;"></div>
						</div>
						<div class="col-md-4">
							<p class="text-center">
								<strong>Goal Completion</strong>
							</p>
							<div class="mb-3">
								<div class="col-md-12">
									<span class="progress-text">Impresive</span>
									<span class="progress-number" style="float:right"><?php echo round($totaltarget); ?> M/<b>200 M</b></span>
								</div>
								<div class="progress">
									<?php $percentage1 = round(round($totaltarget)/200 * 100.2); ?>
									<div class="progress-bar progress-bar-striped text-bg-primary progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $percentage1;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage1;?>%">
										<?php echo $percentage1;?>%
									</div>
								</div>
							</div>
							<div class="mb-3">
								<div class="col-md-12">
									<span class="progress-text">Challenging</span>
									<span class="progress-number" style="float:right"><?php echo round($totaltarget); ?> M/<b>190 M</b></span>
								</div>
								<div class="progress">
									<?php $percentage2 = round(round($totaltarget)/190 * 100.2); ?>
									<div class="progress-bar progress-bar-striped text-bg-warning progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $percentage2;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage2;?>%">
										<?php echo $percentage2;?>%
									</div>
								</div>
							</div>
							<div class="mb-3">
								<div class="col-md-12">
									<span class="progress-text">Optimitst</span>
									<span class="progress-number" style="float:right"><?php echo round($totaltarget); ?> M/<b>181 M</b></span>
								</div>
								<div class="progress">
									<?php $percentage3 = round(round($totaltarget)/181 * 100.2); ?>
									<div class="progress-bar progress-bar-striped text-bg-success progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $percentage3;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage3;?>%">
										<?php echo $percentage3;?>%
									</div>
								</div>
							</div>
							<div class="mb-3">
								<div class="col-md-12">
									<span class="progress-text">Realization</span>
									<span class="progress-number" style="float:right"><b><?php echo round($totaltarget); ?> M</b></span>
								</div>
								<div class="progress">
									<?php $percentage1 = round(round($totaltarget)/175 * 100.2); ?>
									<div class="progress-bar progress-bar-striped text-bg-info progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div id="chartval" style="height: 250px;"></div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right text-center">
								<h5 class="description-header" style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalrev[0]['totalrev'])),3)))?></h5>
								<span class="description-text">TOTAL REVENUE</span>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right text-center">
								<h5 class="description-header" style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalcost[0]['totalcost'])),3)))?></h5>
								<span class="description-text">TOTAL COST</span>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right text-center">
								<h5 class="description-header" style="color: #fa591d;">Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalprofit[0]['totalprofit'])),3)))?></h5>
								<span class="description-text">TOTAL MARGIN</span>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="description-block text-center">
								<h5 class="description-header" style="color: #fa591d;">181 M</h5>
								<span class="description-text">GOAL COMPLETIONS</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
    </div>
    <div class="row">
        <div class="col-md-6 pl-0">
            <div class="card">
                <div class="card-body">
				<h5 class="card-title fw-semibold">SPB</h5>
                    <div id="chartspb"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pr-0">
            <div class="card">
                <div class="card-body">
				<h5 class="card-title fw-semibold">Invoices</h5>
                    <div id="charttipeorder"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-0">
            <div class="card">
                <div class="card-body">
				<h5 class="card-title fw-semibold">Prospect Order SM 1</h5>
                    <div id="chartinv"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pr-0">
            <div class="card">
                <div class="card-body">
				<h5 class="card-title fw-semibold">User Performance SM 1</h5>
                    <div id="chartdist"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-0">
            <div class="card">
                <div class="card-body">
				<h5 class="card-title fw-semibold">Prospect Order SM 2</h5>
                    <div id="chartinvsm2"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pr-0">
            <div class="card">
                <div class="card-body">
				<h5 class="card-title fw-semibold">User Performance SM 2</h5>
                    <div id="chartdistsm2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-bg-success">
					<h4 class="mb-0 text-white card-title">Sales Performance</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-tabs salespf" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" data-bs-toggle="tab" href="#revenue-chart" role="tab" aria-selected="false" tabindex="-1">
								<span>Volume</span>
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" data-bs-toggle="tab" href="#sales-chart" role="tab" aria-selected="false" tabindex="-1">
								<span>Value</span>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active show" id="revenue-chart" role="tabpanel">
                            <div id="chartamvol" style="height: 250px;"></div>
						</div>
						<div class="tab-pane p-3" id="sales-chart" role="tabpanel">
                            <div id="chartamval" style="height: 250px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-bg-primary">
					<h4 class="mb-0 text-white card-title">Sales Collection Unpaid</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-tabs salescoll" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" data-bs-toggle="tab" href="#revenue-collection-chart" role="tab" aria-selected="false" tabindex="-1">
								<span>Volume</span>
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" data-bs-toggle="tab" href="#sales-collection-chart" role="tab" aria-selected="false" tabindex="-1">
								<span>Value</span>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active show" id="revenue-collection-chart" role="tabpanel">
                            <div id="chartamcollvol" style="height: 250px;"></div>
						</div>
						<div class="tab-pane p-3" id="sales-collection-chart" role="tabpanel">
                            <div id="chartamcollval" style="height: 250px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>	
    </div>
    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-bg-secondary">
					<h4 class="mb-0 text-white card-title">PADI UMKM</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">
								Total :<strong style="color: #fa591d;"> Rp. <?php echo strrev(implode('.',str_split(strrev(strval($totalpadi[0]['totalvalue'])),3)))?></strong>
							</p>
							<div class="chart">
								<div id="chartpadi" style="height: 250px;"></div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>	
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
			<h5 class="card-title fw-semibold">Division Sales YoY SM 1</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart">
                            <div id="chartdivisionyoy" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
			<h5 class="card-title fw-semibold">Division Sales YoY SM 2</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart">
                            <div id="chartdivisionyoysm2" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
			<h5 class="card-title fw-semibold">YoY Report : VOL</h5>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">
                            <strong>Total Invoice Monthly: 2024 vs 2025</strong>
                        </p>
                        <div class="chart">
                            <div id="chartyoyvol" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
			<h5 class="card-title fw-semibold">YoY Report : VAL</h5>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">
                            <strong>Total Invoice Monthly: 2024 vs 2025</strong>
                        </p>
                        <div class="chart">
                            <div id="chartyoyval" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
			<h5 class="card-title fw-semibold">Revenue History</h5>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">
                            <strong>Total Invoice Monthly: 2021 - <?php echo date('Y');?></strong>
                        </p>
                        <div class="chart">
                            <div id="chartrevhis" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_frozen); 
		am4core.useTheme(am4themes_animated);
		// Themes end

		//---------Start chart Val
		var chart = am4core.create("chartval", am4charts.XYChart);

		// Add data
		chart.data = <?php echo $drdinval ?>;

		// Create axes
		var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
		dateAxis.periodChangeDateFormats.setKey("month", "[bold]yyyy[/]");
		dateAxis.startLocation = 0.5;
		dateAxis.endLocation = 0.5;

		// Create value axis
		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		var series = chart.series.push(new am4charts.LineSeries());
		series.dataFields.valueY = "valinv";
		series.dataFields.dateX = "month";
		series.strokeWidth = 3;
		series.tooltipText = "{valueY.value}";
		series.fillOpacity = 0.1;
		series.fill = am4core.color("#539bff"); 

		// Create a range to change stroke for values below 0
		var range = valueAxis.createSeriesRange(series);
		range.value = 0;
		range.endValue = -1000;
		range.contents.stroke = chart.colors.getIndex(4);
		range.contents.fill = range.contents.stroke;
		range.contents.strokeOpacity = 0.7;
		range.contents.fillOpacity = 0.1;

		// Add cursor
		chart.cursor = new am4charts.XYCursor();
		chart.cursor.xAxis = dateAxis;
		chart.scrollbarX = new am4core.Scrollbar();

		// Add simple bullet
		var bullet = series.bullets.push(new am4charts.Bullet());
		var circle = bullet.createChild(am4core.Circle);
		circle.width = 10;
		circle.height = 10;
		circle.horizontalCenter = "middle";
		circle.verticalCenter = "middle";

		//------End chart Val
		//---------Start chart Vol

		// Create chart instance
		var chart = am4core.create("chartvol", am4charts.XYChart);

		// Add data
		chart.data = <?php echo $drdinvol ?>;

		// Create axes

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
			if (target.dataItem && target.dataItem.index & 2 == 2) {
				return dy + 25;
			}
			return dy;
		});

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "volinv";
		series.dataFields.categoryX = "month";
		series.name = "Total Vol Invoice";
		series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
		series.columns.template.fillOpacity = .8;
		series.fill = am4core.color("#539bff"); 

		var columnTemplate = series.columns.template;
		columnTemplate.strokeWidth = 2;
		columnTemplate.strokeOpacity = 1;

		//------End chart Vol
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

		//------Start chart AM Collection Volume
		var chart = am4core.create("chartamcollvol", am4charts.XYChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.paddingBottom = 30;

		chart.data = <?php echo $drdamcollvol ?>;

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

		series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#fa896b"), max: am4core.color("#fa896b") });
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
		//------End chart AM Collection Vol
		//------Start chart AM Collection Value
		var chart = am4core.create("chartamcollval", am4charts.XYChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.paddingBottom = 30;

		chart.data = <?php echo $drdamcollval ?>;

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

		series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#fa896b"), max: am4core.color("#fa896b") });
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
		//------End chart AM Collection Val

		//------Start chart YoY VOL
		// Create chart instance
		var chart = am4core.create("chartyoyvol", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $drdvolyoy ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe"); 

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2025): [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff"); 

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY VOL

		//------Start chart YoY VAL
		// Create chart instance
		var chart = am4core.create("chartyoyval", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $drdvalyoy ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe"); 

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2025): [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff"); 

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY VAL


		//---------Start chart revenue history
		// Create chart instance
		var chart = am4core.create("chartrevhis", am4charts.XYChart);

		// Add data
		chart.data = <?php echo $drdrevhis ?>;

		// Create axes

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "year";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
			if (target.dataItem && target.dataItem.index & 2 == 2) {
				return dy + 25;
			}
			return dy;
		});

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "volinv";
		series.dataFields.categoryX = "year";
		series.name = "Total Vol Invoice";
		series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
		series.columns.template.fillOpacity = .8;
		series.fill = am4core.color("#539bff"); 

		var columnTemplate = series.columns.template;
		columnTemplate.strokeWidth = 2;
		columnTemplate.strokeOpacity = 1;
		//------End chart revenue history

		//---------Start chart User Performance
		var chart = am4core.create("chartdist", am4charts.PieChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.legend = new am4charts.Legend();

		chart.data = <?php echo $invdist ?>;

		var series = chart.series.push(new am4charts.PieSeries());
		series.dataFields.value = "valinv";
		series.dataFields.category = "division";
		series.hiddenInLegend = true;
		//------End chart User Performance

		//---------Start chart User Performance sm2
		var chart = am4core.create("chartdistsm2", am4charts.PieChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.legend = new am4charts.Legend();

		chart.data = <?php echo $invdistsm2 ?>;

		var series = chart.series.push(new am4charts.PieSeries());
		series.dataFields.value = "valinv";
		series.dataFields.category = "division";
		series.hiddenInLegend = true;
		//------End chart User Performance

		//---------Start chart SPB

		// Create chart instance
		var chart = am4core.create("chartspb", am4charts.PieChart);

		// Add data
		chart.data = <?php echo $allspb ?>;

		// Set inner radius
		chart.innerRadius = am4core.percent(50);

		// Add and configure Series
		var pieSeries = chart.series.push(new am4charts.PieSeries());
		pieSeries.dataFields.value = "valspb";
		pieSeries.dataFields.category = "orderstatus";
		pieSeries.slices.template.stroke = am4core.color("#fff");
		pieSeries.slices.template.strokeWidth = 2;
		pieSeries.slices.template.strokeOpacity = 1;

		// This creates initial animation
		pieSeries.hiddenState.properties.opacity = 1;
		pieSeries.hiddenState.properties.endAngle = -90;
		pieSeries.hiddenState.properties.startAngle = -90;

		//------End chart SPB

		// Create chart INVOICE
		var chart = am4core.create("charttipeorder", am4charts.PieChart);

		// Add data
		chart.data = <?php echo $invtipeorder; ?>;

		// Set inner radius
		chart.innerRadius = am4core.percent(50);

		// Add and configure Series
		var pieSeries = chart.series.push(new am4charts.PieSeries());
		pieSeries.dataFields.value = "totalinvoice";
		pieSeries.dataFields.category = "orderstatus";
		pieSeries.slices.template.stroke = am4core.color("#fff");
		pieSeries.slices.template.strokeWidth = 2;
		pieSeries.slices.template.strokeOpacity = 1;

		// This creates initial animation
		pieSeries.hiddenState.properties.opacity = 1;
		pieSeries.hiddenState.properties.endAngle = -90;
		pieSeries.hiddenState.properties.startAngle = -90;

		//------End chart INVOICE

		//---------Start chart Prospect
		var chart = am4core.create("chartinv", am4charts.PieChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.legend = new am4charts.Legend();

		chart.data = <?php echo $prospectcm ?>;

		var series = chart.series.push(new am4charts.PieSeries());
		series.dataFields.value = "totalvalue";
		series.dataFields.category = "division";
		series.hiddenInLegend = true;
		//------End chart Prospect

		// ---------Start chart Prospect
		var chart = am4core.create("chartinvsm2", am4charts.PieChart);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.legend = new am4charts.Legend();

		chart.data = <?php echo $prospectcmsm2 ?>;

		var series = chart.series.push(new am4charts.PieSeries());
		series.dataFields.value = "totalvalue";
		series.dataFields.category = "division";
		series.hiddenInLegend = true;
		//------End chart Prospect

		//---------Start chart PADI
		var chart = am4core.create("chartpadi", am4charts.XYChart);

		// Add data
		chart.data = <?php echo $drdvalpadi ?>;

		// Create axes
		var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
		dateAxis.periodChangeDateFormats.setKey("month", "[bold]yyyy[/]");
		dateAxis.startLocation = 0.5;
		dateAxis.endLocation = 0.5;

		// Create value axis
		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		var series = chart.series.push(new am4charts.LineSeries());
		series.dataFields.valueY = "valinv";
		series.dataFields.dateX = "month";
		series.strokeWidth = 3;
		series.tooltipText = "{valueY.value}";
		series.fillOpacity = 0.1;

		// Create a range to change stroke for values below 0
		var range = valueAxis.createSeriesRange(series);
		range.value = 0;
		range.endValue = -1000;
		range.contents.stroke = chart.colors.getIndex(4);
		range.contents.fill = range.contents.stroke;
		range.contents.strokeOpacity = 0.7;
		range.contents.fillOpacity = 0.1;

		// Add cursor
		chart.cursor = new am4charts.XYCursor();
		chart.cursor.xAxis = dateAxis;
		chart.scrollbarX = new am4core.Scrollbar();

		// Add simple bullet
		var bullet = series.bullets.push(new am4charts.Bullet());
		var circle = bullet.createChild(am4core.Circle);
		circle.width = 10;
		circle.height = 10;
		circle.horizontalCenter = "middle";
		circle.verticalCenter = "middle";

		//------End chart PADI

		//------Start chart YoY Division
		// Create chart instance
		var chart = am4core.create("chartdivisionyoy", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $divisionyoy ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "division";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "division";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe");

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "division";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2025): [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff");

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY Division

		//------Start chart YoY Division
		// Create chart instance
		var chart = am4core.create("chartdivisionyoysm2", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $divisionyoysm2 ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "division";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Total growth rate";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "lastyear";
		series.dataFields.categoryX = "division";
		series.clustered = false;
		series.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe"); 

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "division";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2025): [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff");

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY Division


	}); // end am4core.ready()

	$(function () {
		$('.selectpicker').select2();

		$('#dataTabunganSegment').on('change', function () {
			$('#dataTabunganSegment').html('<div class="text-center"><img src="<?php echo $this->config->item('skins_uri').'images/backgrounds/load.gif'?>" style="height:100px"></div>');

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('analytics/tabungan_segment')?>",
				data: $('#formSearchTabungan').serialize(),
				success: function (data) {
					$('#dataTabunganSegment').html(data);
				}
			});
		});
		$('#dataTabunganSegment').trigger('change');

		$('#cariData').on('click', function () {
			$('#dataTabunganSegment').trigger('change');
		});

	});
</script>
