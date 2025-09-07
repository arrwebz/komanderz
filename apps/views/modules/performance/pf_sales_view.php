<div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Performance</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="<?php echo site_url('pfsales');?>">Sales</a>
                        </li>
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

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-hover">
                <div class="card-header with-border" style="background-color: #d72027;">
                    <h4 class="mb-0 text-white fs-5">Q1 Sales Performance</h4>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="chartq1yoy" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-hover">
                <div class="card-header with-border" style="background-color: #d72027;">
                    <h4 class="mb-0 text-white fs-5">Q2 Sales Performance</h4>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="chartq2yoy" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-hover">
                <div class="card-header with-border" style="background-color: #d72027;">
                    <h4 class="mb-0 text-white fs-5">Q3 Sales Performance</h4>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="chartq3yoy" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-hover">
                <div class="card-header with-border" style="background-color: #d72027;">
                    <h4 class="mb-0 text-white fs-5">Q4 Sales Performance</h4>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div id="chartq4yoy" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header text-bg-danger d-flex align-items-center">
			  <h4 class="card-title text-white mb-0">Prospect</h4>
			  <div class="card-actions cursor-pointer ms-auto d-flex button-group">
				<a href="javascript:void(0)" class="link d-flex text-white align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
				<a href="javascript:void(0)" class="mb-0 text-white btn-minimize px-2 cursor-pointer link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
				<a href="javascript:void(0)" class="mb-0 text-white link d-flex align-items-center pe-0 cursor-pointer" data-action="close">
				  <i class="ti ti-x fs-6"></i>
				</a>
			  </div>
			</div>
			<div class="card-body collapse" style="">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Prospect x Invoice Monthly</h4>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="chartprospectorder" style="height: 250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Prospect x Invoice DES CM</h4>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="chartpodes" style="height: 250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Prospect x Invoice DSS CM</h4>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="chartpodss" style="height: 250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Prospect x Invoice DPS CM</h4>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="chartpodps" style="height: 250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Prospect x Invoice DGS CM</h4>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="chartpodgs" style="height: 250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Prospect x Invoice SDA CM</h4>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="chartposda" style="height: 250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Prospect x Invoice EBIS CM</h4>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="chartpoebis" style="height: 250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Prospect x Invoice NON CM</h4>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="chartponon" style="height: 250px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header text-bg-success d-flex align-items-center">
			  <h4 class="card-title text-white mb-0">Total Order</h4>
			  <div class="card-actions cursor-pointer ms-auto d-flex button-group">
				<a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
				<a href="javascript:void(0)" class="mb-0 text-white btn-minimize px-2 cursor-pointer link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
				<a href="javascript:void(0)" class="mb-0 text-white link d-flex align-items-center pe-0 cursor-pointer" data-action="close">
				  <i class="ti ti-x fs-6"></i>
				</a>
			  </div>
			</div>
			<div class="card-body collapse" style="">
			  <div class="row">
				<div class="col-md-12">
					<div class="card card-hover">
						<div class="card-header with-border">
							<h4 class="mb-0 text-dark fs-5">Total Order DES CM</h4>
						</div>
						<div class="card-body">
							<div class="chart">
								<div id="chartorderdes" style="height: 250px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-hover">
						<div class="card-header with-border">
							<h4 class="mb-0 text-dark fs-5">Total Order DSS CM</h4>
						</div>
						<div class="card-body">
							<div class="chart">
								<div id="chartorderdss" style="height: 250px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-hover">
						<div class="card-header with-border">
							<h4 class="mb-0 text-dark fs-5">Total Order DPS CM</h4>
						</div>
						<div class="card-body">
							<div class="chart">
								<div id="chartorderdps" style="height: 250px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-hover">
						<div class="card-header with-border">
							<h4 class="mb-0 text-dark fs-5">Total Order DGS CM</h4>
						</div>
						<div class="card-body">
							<div class="chart">
								<div id="chartorderdgs" style="height: 250px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-hover">
						<div class="card-header with-border">
							<h4 class="mb-0 text-dark fs-5">Total Order SDA CM</h4>
						</div>
						<div class="card-body">
							<div class="chart">
								<div id="chartordersda" style="height: 250px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		  </div>
		</div>
    </div>
	<div class="row">
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header text-bg-info d-flex align-items-center">
			  <h4 class="card-title text-white mb-0">Target</h4>
			  <div class="card-actions cursor-pointer ms-auto d-flex button-group">
				<a href="javascript:void(0)" class="link text-white d-flex align-items-center" data-action="collapse"><i class="ti fs-6 ti-plus"></i></a>
				<a href="javascript:void(0)" class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center" data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
				<a href="javascript:void(0)" class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
				  <i class="ti ti-x fs-6"></i>
				</a>
			  </div>
			</div>
			<div class="card-body collapse" style="">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Target Per AM</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<h3 class="box-title text-center"><strong>Nanza</strong></h3>

										<div class="chart">
											<div id="chartamNanza" style="height: 250px;"></div>
										</div>
									</div>
									<div class="col-md-12">
										<h3 class="box-title text-center"><strong>Eva</strong></h3>

										<div class="chart">
											<div id="chartamEva" style="height: 250px;"></div>
										</div>
									</div>
									<div class="col-md-12">
										<h3 class="box-title text-center"><strong>Vania</strong></h3>

										<div class="chart">
											<div id="chartamVania" style="height: 250px;"></div>
										</div>
									</div>
									<div class="col-md-12">
										<h3 class="box-title text-center"><strong>Sigit</strong></h3>

										<div class="chart">
											<div id="chartamSigit" style="height: 250px;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card card-hover">
							<div class="card-header with-border">
								<h4 class="mb-0 text-dark fs-5">Target Segment</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<h3 class="box-title text-center"><strong>Nanza</strong></h3>

										<div class="chart">
											<div id="chartsegmentNanza" style="height: 250px;"></div>
										</div>
									</div>
									<div class="col-md-12">
										<h3 class="box-title text-center"><strong>Eva</strong></h3>

										<div class="chart">
											<div id="chartsegmentEva" style="height: 250px;"></div>
										</div>
									</div>
									<div class="col-md-12">
										<h3 class="box-title text-center"><strong>Vania</strong></h3>

										<div class="chart">
											<div id="chartsegmentVania" style="height: 250px;"></div>
										</div>
									</div>
									<div class="col-md-12">
										<h3 class="box-title text-center"><strong>Sigit</strong></h3>

										<div class="chart">
											<div id="chartsegmentSigit" style="height: 250px;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	</div>
</section>

<script>
	$(function () {
		var table = $('#datatables').DataTable({
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
		am4core.useTheme(am4themes_frozen); 
		am4core.useTheme(am4themes_animated);
		// Themes end

		//------Start chart YoY VAL Q1
		// Create chart instance
		var chart = am4core.create("chartq1yoy", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $valq1yoy ?>;

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
		series.tooltipText = "Total grow in {categoryX} (2023): [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe"); 

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff"); 

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY VAL Q1
		//------Start chart YoY VAL Q2
		// Create chart instance
		var chart = am4core.create("chartq2yoy", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $valq2yoy ?>;

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
		series.tooltipText = "Total grow in {categoryX} (2023): [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe"); 

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff"); 

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY VAL Q2

		//------Start chart YoY VAL Q3
		// Create chart instance
		var chart = am4core.create("chartq3yoy", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $valq3yoy ?>;

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
		series.tooltipText = "Total grow in {categoryX} (2023): [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe"); 


		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff"); 

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY VAL Q3

		//------Start chart YoY VAL Q4
		// Create chart instance
		var chart = am4core.create("chartq4yoy", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $valq4yoy ?>;

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
		series.tooltipText = "Total grow in {categoryX} (2023): [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe"); 

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "thisyear";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total grow in {categoryX} (2024): [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff"); 

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart YoY VAL Q4

		//------Start chart am Nanza
		// Create chart instance
		var chart = am4core.create("chartamNanza", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $targetamnz ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Target & Realisasi Nanza";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "target";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Target {categoryX}: [bold]{valueY}[/]";
		series.fill = am4core.color("#ebf3fe"); 

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "realisasi";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Realisasi {categoryX}: [bold]{valueY}[/]";
		series2.fill = am4core.color("#539bff"); 

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart am Nanza

		//------Start chart am Eva
		// Create chart instance
		var chart = am4core.create("chartamEva", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $targetamev ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Target & Realisasi";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "target";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Target {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "realisasi";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Realisasi {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart am Eva

		//------Start chart am Vania
		// Create chart instance
		var chart = am4core.create("chartamVania", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $targetamvn ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Target & Realisasi";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "target";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Target {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "realisasi";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Realisasi {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart am Vania

		//------Start chart am Sigit
		// Create chart instance
		var chart = am4core.create("chartamSigit", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $targetamsg ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Target & Realisasi";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "target";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Target {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "realisasi";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Realisasi {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart am Sigit

		//------Start chart Segment Nanza
		// Create chart instance
		var chart = am4core.create("chartsegmentNanza", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $targetsegmentnz ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segmentname";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Target & Realisasi";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "target";
		series.dataFields.categoryX = "segmentname";
		series.clustered = false;
		series.tooltipText = "Target {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "realisasi";
		series2.dataFields.categoryX = "segmentname";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Realisasi {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Segment Nanza

		//------Start chart Segment Eva
		// Create chart instance
		var chart = am4core.create("chartsegmentEva", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $targetsegmentev ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segmentname";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Target & Realisasi";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "target";
		series.dataFields.categoryX = "segmentname";
		series.clustered = false;
		series.tooltipText = "Target {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "realisasi";
		series2.dataFields.categoryX = "segmentname";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Realisasi {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Segment Eva

		//------Start chart Segment Vania
		// Create chart instance
		var chart = am4core.create("chartsegmentVania", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $targetsegmentvn ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segmentname";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Target & Realisasi";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "target";
		series.dataFields.categoryX = "segmentname";
		series.clustered = false;
		series.tooltipText = "Target {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "realisasi";
		series2.dataFields.categoryX = "segmentname";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Realisasi {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Segment Vania

		//------Start chart Segment Sigit
		// Create chart instance
		var chart = am4core.create("chartsegmentSigit", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $targetsegmentsg ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segmentname";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Target & Realisasi";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "target";
		series.dataFields.categoryX = "segmentname";
		series.clustered = false;
		series.tooltipText = "Target {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "realisasi";
		series2.dataFields.categoryX = "segmentname";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Realisasi {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Segment Sigit

		/* START ORDER SEGMENT DES */
		var chart = am4core.create("chartorderdes", am4charts.XYChart);
		chart.data = <?php echo $order_des?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "code";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;


		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.renderer.inside = true;
		valueAxis.renderer.labels.template.disabled = true;
		valueAxis.min = 0;

		function createSeries(field, name) {
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "code";
			series.sequencedInterpolation = true;

			series.stacked = true;

			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			return series;
		}

		createSeries("komet", "KOMET");
		createSeries("mesra", "MESRA");
		createSeries("padi", "PADI");
		chart.legend = new am4charts.Legend();
		/* END ORDER SEGMENT DES */
		
		/* START ORDER SEGMENT DSS */
		var chart = am4core.create("chartorderdss", am4charts.XYChart);
		chart.data = <?php echo $order_dss?>; 

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "code";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;


		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.renderer.inside = true;
		valueAxis.renderer.labels.template.disabled = true;
		valueAxis.min = 0;

		function createSeries(field, name) {
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "code";
			series.sequencedInterpolation = true;

			series.stacked = true;

			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			return series;
		}

		createSeries("komet", "KOMET");
		createSeries("mesra", "MESRA");
		createSeries("padi", "PADI");
		chart.legend = new am4charts.Legend();
		/* END ORDER SEGMENT DSS */
		
		/* START ORDER SEGMENT DPS */
		var chart = am4core.create("chartorderdps", am4charts.XYChart);
		chart.data = <?php echo $order_dps?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "code";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;


		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.renderer.inside = true;
		valueAxis.renderer.labels.template.disabled = true;
		valueAxis.min = 0;

		function createSeries(field, name) {
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "code";
			series.sequencedInterpolation = true;

			series.stacked = true;

			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			return series;
		}

		createSeries("komet", "KOMET");
		createSeries("mesra", "MESRA");
		createSeries("padi", "PADI");
		chart.legend = new am4charts.Legend();
		/* END ORDER SEGMENT DPS */

		/* START ORDER SEGMENT DGS */
		var chart = am4core.create("chartorderdgs", am4charts.XYChart);
		chart.data = <?php echo $order_dgs?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "code";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;


		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.renderer.inside = true;
		valueAxis.renderer.labels.template.disabled = true;
		valueAxis.min = 0;

		function createSeries(field, name) {
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "code";
			series.sequencedInterpolation = true;

			series.stacked = true;

			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			return series;
		}

		createSeries("komet", "KOMET");
		createSeries("mesra", "MESRA");
		createSeries("padi", "PADI");
		chart.legend = new am4charts.Legend();
		/* END ORDER SEGMENT DGS */

		/* START ORDER SEGMENT SDA */
		var chart = am4core.create("chartordersda", am4charts.XYChart);
		chart.data = <?php echo $order_sda?>;

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "code";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;


		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.renderer.inside = true;
		valueAxis.renderer.labels.template.disabled = true;
		valueAxis.min = 0;

		function createSeries(field, name) {
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "code";
			series.sequencedInterpolation = true;

			series.stacked = true;

			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			return series;
		}

		createSeries("komet", "KOMET");
		createSeries("mesra", "MESRA");
		createSeries("padi", "PADI");
		chart.legend = new am4charts.Legend();
		/* END ORDER SEGMENT SDA */

		//------Start chart PROSPECT VS ORDER
		// Create chart instance
		var chart = am4core.create("chartprospectorder", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $prospectorder ?>;

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
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "month";
		series.clustered = false;
		series.tooltipText = "Total Prospect : [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valorder";
		series2.dataFields.categoryX = "month";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Total Order : [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart PROSPECT VS ORDER

		//------Start Prospect Order DES CM
		// Create chart instance
		var chart = am4core.create("chartpodes", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $podes ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segment";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Prospect & Invoice";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "segment";
		series.clustered = false;
		series.tooltipText = "Prospect {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valinvoice";
		series2.dataFields.categoryX = "segment";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Invoice {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Prospect Order DES CM

        // ------Start Prospect Order DSS CM
		// Create chart instance
		var chart = am4core.create("chartpodss", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $podss ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segment";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Prospect & Invoice";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "segment";
		series.clustered = false;
		series.tooltipText = "Prospect {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valinvoice";
		series2.dataFields.categoryX = "segment";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Invoice {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Prospect Order DSS CM

        // ------Start Prospect Order DPS CM
		// Create chart instance
		var chart = am4core.create("chartpodps", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $podps ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segment";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Prospect & Invoice";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "segment";
		series.clustered = false;
		series.tooltipText = "Prospect {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valinvoice";
		series2.dataFields.categoryX = "segment";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Invoice {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Prospect Order DSS CM

		//------Start Prospect Order DGS CM
		// Create chart instance
		var chart = am4core.create("chartpodgs", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $podgs ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segment";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Prospect & Invoice";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "segment";
		series.clustered = false;
		series.tooltipText = "Prospect {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valinvoice";
		series2.dataFields.categoryX = "segment";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Invoice {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Prospect Order DGS CM

		//------Start Prospect Order SDA CM
		// Create chart instance
		var chart = am4core.create("chartposda", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $posda ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segment";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Prospect & Invoice";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "segment";
		series.clustered = false;
		series.tooltipText = "Prospect {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valinvoice";
		series2.dataFields.categoryX = "segment";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Invoice {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Prospect Order SDA CM

		//------Start Prospect Order EBIS CM
		// Create chart instance
		var chart = am4core.create("chartpoebis", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $poebis ?>;

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segment";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Prospect & Invoice";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "segment";
		series.clustered = false;
		series.tooltipText = "Prospect {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valinvoice";
		series2.dataFields.categoryX = "segment";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Invoice {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Prospect Order EBIS CM
		
		//------Start Prospect Order NON CM
		// Create chart instance
		var chart = am4core.create("chartponon", am4charts.XYChart);

		// Add percent sign to all numbers
		//chart.numberFormatter.numberFormat = "#.3'%'";

		// Add data
		chart.data = <?php echo $ponon ?>; 

		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "segment";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "Prospect & Invoice";
		valueAxis.title.fontWeight = 800;

		// Create series
		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.valueY = "valprospect";
		series.dataFields.categoryX = "segment";
		series.clustered = false;
		series.tooltipText = "Prospect {categoryX}: [bold]{valueY}[/]";

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.dataFields.valueY = "valinvoice";
		series2.dataFields.categoryX = "segment";
		series2.clustered = false;
		series2.columns.template.width = am4core.percent(50);
		series2.tooltipText = "Invoice {categoryX}: [bold]{valueY}[/]";

		chart.cursor = new am4charts.XYCursor();
		chart.cursor.lineX.disabled = true;
		chart.cursor.lineY.disabled = true;
		//------End chart Prospect Order NON CM

	});
</script>