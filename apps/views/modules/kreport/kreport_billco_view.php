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
        <li><a href="#">Laporan</a></li>
        <li class="active">Billco Komet</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
			<!-- BAR CHART -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pencairan per Bulan</h3>
            </div>
            <div class="box-body">
              <div id="chartdiv" style="height: 250px;"></div>
            </div>
          <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
				<?php echo form_open('kreportbco/reportfilter');?>
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
					<h5 class="description-header">Cari invoice belum cair berdasarkan bulan</h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <div class="form-group">
						<select name="optMonth" class="form-control selectpicker">
									<option disabled selected>Pilih</option>
									<option value="1">Januari</option>
									<option value="2">Februari</option>
									<option value="3">Maret</option>
									<option value="4">April</option>
									<option value="5">Mei</option>
									<option value="6">Juni</option>
									<option value="7">Juli</option>
									<option value="8">Agustus</option>
									<option value="9">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>
								</select> 
					  </div>
					  <!-- /.form-group -->
                  </div>
                  <!-- /.description-block -->
                </div> 
                <!-- /.col -->
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block">
                    <button type="submit" name="cmdsave" class="btn btn-fill btn-success">Filter</button>
                  </div>
                  <!-- /.description-block -->
                </div>
				<?php echo form_close();?>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
        <!-- /.col -->
		<div class="col-md-12">
			<!-- BAR CHART -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pencairan per Hari</h3>
            </div>
            <div class="box-body">
               <div id="chartlinediv" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
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
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });	
	$('.selectpicker').select2();
	$('.datepicker').datepicker({
						format: 'dd-mm-yyyy',
						autoclose: true,
						todayHighlight: true});
												
});
</script>
<script>
	
	am4core.ready(function() {

	// Themes begin
	am4core.useTheme(am4themes_kelly);
	am4core.useTheme(am4themes_animated);
	// Themes end
	
	//------Start chart Monthly
	// Create chart instance
	var chart = am4core.create("chartdiv", am4charts.XYChart);

	// Add data
	chart.data = <?php echo $drdnmonth ?>;

	// Create axes
	var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	categoryAxis.dataFields.category = "month";
	categoryAxis.renderer.grid.template.location = 0;
	categoryAxis.renderer.minGridDistance = 30;

	var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	valueAxis.title.text = "Total paid";
	valueAxis.title.fontWeight = 800;

	// Create series
	var series = chart.series.push(new am4charts.ColumnSeries());
	series.dataFields.valueY = "paid";
	series.dataFields.categoryX = "month";
	series.clustered = false;
	series.tooltipText = "Total paid in {categoryX} : [bold]{valueY}[/]";

	var series2 = chart.series.push(new am4charts.ColumnSeries());
	series2.dataFields.valueY = "unpaid";
	series2.dataFields.categoryX = "month";
	series2.clustered = false;
	series2.columns.template.width = am4core.percent(50);
	series2.tooltipText = "Total unpaid in {categoryX} : [bold]{valueY}[/]";

	chart.cursor = new am4charts.XYCursor();
	chart.cursor.lineX.disabled = true;
	chart.cursor.lineY.disabled = true;
	
	//------End chart Monthly
	
	//------Start chart Daily
	// Create chart instance
	var chart = am4core.create("chartlinediv", am4charts.XYChart);

	// Add data
	chart.data = <?php echo $drdnday ?>;

	// Set input format for the dates
	chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

	// Create axes
	var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
	var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

	// Create series
	var series = chart.series.push(new am4charts.LineSeries());
	series.dataFields.valueY = "totalinvoice";
	series.dataFields.dateX = "invdate";
	series.tooltipText = "{totalinvoice}"
	series.strokeWidth = 2;
	series.minBulletDistance = 15;

	// Drop-shaped tooltips
	series.tooltip.background.cornerRadius = 20;
	series.tooltip.background.strokeOpacity = 0;
	series.tooltip.pointerOrientation = "vertical";
	series.tooltip.label.minWidth = 40;
	series.tooltip.label.minHeight = 40;
	series.tooltip.label.textAlign = "middle";
	series.tooltip.label.textValign = "middle";

	// Make bullets grow on hover
	var bullet = series.bullets.push(new am4charts.CircleBullet());
	bullet.circle.strokeWidth = 2;
	bullet.circle.radius = 4;
	bullet.circle.fill = am4core.color("#fff");

	var bullethover = bullet.states.create("hover");
	bullethover.properties.scale = 1.3;

	// Make a panning cursor
	chart.cursor = new am4charts.XYCursor();
	chart.cursor.behavior = "panXY";
	chart.cursor.xAxis = dateAxis;
	chart.cursor.snapToSeries = series;

	// Create vertical scrollbar and place it before the value axis
	chart.scrollbarY = new am4core.Scrollbar();
	chart.scrollbarY.parent = chart.leftAxesContainer;
	chart.scrollbarY.toBack();

	// Create a horizontal scrollbar with previe and place it underneath the date axis
	chart.scrollbarX = new am4charts.XYChartScrollbar();
	chart.scrollbarX.series.push(series);
	chart.scrollbarX.parent = chart.bottomAxesContainer;

	chart.events.on("ready", function () {
	  dateAxis.zoom({start:0.79, end:1});
	});
	//------End chart Daily

	}); // end am4core.ready()
</script>