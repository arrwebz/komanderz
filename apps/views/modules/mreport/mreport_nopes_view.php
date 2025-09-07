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
        <li class="active">Nopes Mesra</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
			<!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Nopes per Bulan</h3>
            </div>
            <div class="box-body">
              <div id="chartdiv" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-6">
			<!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Nopes per Hari</h3>
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
	<!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Pencarian</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
		<?php echo form_open('mreportnps/reportfilter');?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Divisi</label>
				<select name="optDivision" id="optDivision" class="form-control selectpicker" >
					<option disabled selected>Pilih</option>
					<?php	
							
						if(!empty($division)){
							foreach($division as $row){ 
								if (!empty($divisi) && $divisi == $row['divisionid'] ) {
									$strselected = "selected";
								} else {
									$strselected = " ";
								}
								echo '<option value="'.$row['code'].'"'. $strselected .'>'.$row['code'].'</option>';
							}
						}else{
							echo '<option value="">Division not available</option>';
						}
					?> 
				</select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Segmen</label>
                <select name="optSegment" class="form-control selectpicker">
							<option disabled selected>Pilih</option>
							<?php
							
							if(!empty($segment)){
								foreach($segment as $row){ 
									if (!empty($segmen) && $segmen == $row['segmentid'] ) {
									$strselected = "selected";
									} else {
										$strselected = " ";
									}
									echo '<option value="'.$row['code'].'"'. $strselected.'>'.$row['code'].'</option>';
								}
							}else{
								echo '<option value="">Segment not available</option>';
							}
						?> 
						</select>
              </div>
              <!-- /.form-group -->
			  <div class="form-group">
                <label>Tanggal Awal:</label>
				<input name="txtFirstdate" type="text" class="form-control datepicker">
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Status SPB</label>
					<select name="optSPB" class="form-control selectpicker">
						<option disabled selected>Pilih</option>
						<option value="0">Belum ada</option>
						<option value="1">Ada</option>
					</select> 
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Status Pencairan</label>
					<select name="optStatinv" class="form-control selectpicker">
						<option disabled selected>Pilih</option>
						<option value="0">Belum cair</option>
						<option value="1">Cair</option>
					</select> 
              </div>
              <!-- /.form-group -->
			  <div class="form-group">
                <label>Tanggal Akhir:</label>
				<input name="txtEnddate" type="text" class="form-control datepicker">
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" name="cmdsave" class="btn btn-fill btn-default">Filter</button>
			<?php echo form_close();?>
        </div>
      </div>
      <!-- /.box -->
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
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart instance
	var chart = am4core.create("chartdiv", am4charts.XYChart);

	// Add data
	chart.data = <?php echo $drdnmonth ?>;

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
	series.dataFields.valueY = "totalinvoice";
	series.dataFields.categoryX = "month";
	series.name = "Total Invoice";
	series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
	series.columns.template.fillOpacity = .8;

	var columnTemplate = series.columns.template;
	columnTemplate.strokeWidth = 2;
	columnTemplate.strokeOpacity = 1;

	}); // end am4core.ready()
</script>
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

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

}); // end am4core.ready()
</script>
