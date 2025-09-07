<h2 class="title-segmen" style="margin-top:0px !important; margin-left:20px;"><?php echo $segmen;?> (Collection Update)</h2>

<?php if(count($drd) > 0):  ?>
	<div id="chartSegmenCollection" style="width: 100%;height: 500px;"></div>

	<table class="table table-responsive table-bordered">
		<?php
		echo '<thead>';
			echo '<tr>';
				echo '<td width="20%"><i class="ti ti-square" style="color:#9d9ca4"></i> '. $segmen .'</td>';
				echo '<td class="text-center">Total Invoice</td>';
				echo '<td class="text-center">Total Nilai Invoice</td>';
			echo '<tr>';
		echo '</thead>';

		echo '<tbody>';
			foreach($drd as $row) {
				echo '<tr>';
					echo '<td><strong>'. $row['status'] .'</strong></td>';
					echo '<td class="text-center"><strong>'. $row['total_inv'] .'</strong></td>';
					echo '<td class="text-center" style="color: #fa591d;"><strong>'. str_replace(',','.',$row['volinv']) .'</strong></td>';
				echo '</tr>';
			}
		echo '</tbody>';
		?>
	</table>

	<script>
		am4core.useTheme(am4themes_animated);

		// Create chart instance
		var chartColl = am4core.create("chartSegmenCollection", am4charts.XYChart3D);
		chartColl.data = <?php echo $drd_chart?>;

		// Modify chart's colors
		chartColl.colors.list = [
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
			am4core.color("#9d9ca4"),
		];

		// Create axes
		var categoryAxis = chartColl.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "status";
		categoryAxis.renderer.labels.template.rotation = 270;
		categoryAxis.renderer.labels.template.hideOversized = false;
		categoryAxis.renderer.minGridDistance = 30;
		categoryAxis.renderer.labels.template.horizontalCenter = "right";
		categoryAxis.renderer.labels.template.verticalCenter = "middle";
		categoryAxis.tooltip.label.rotation = 270;
		categoryAxis.tooltip.label.horizontalCenter = "right";
		categoryAxis.tooltip.label.verticalCenter = "middle";

		var valueAxis = chartColl.yAxes.push(new am4charts.ValueAxis());
		valueAxis.title.text = "";
		valueAxis.title.fontWeight = "bold";
		valueAxis.numberFormatter.type = "NumberFormatter";
		valueAxis.numberFormatter.numberFormat = "#,###.";

		// Create series
		var series = chartColl.series.push(new am4charts.ColumnSeries3D());
		series.dataFields.valueY = "volinv";
		series.dataFields.categoryX = "status";
		series.name = "Visits";
		series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
		series.columns.template.fillOpacity = .8;
		series.numberFormatter.type = "NumberFormatter";
		series.numberFormatter.numberFormat = "#,###.";

		series.tooltip.label.interactionsEnabled = true;
		series.tooltip.keepTargetHover = true;
		series.columns.template.tooltipHTML = '{status} : <b>{volinv}</b><br>Jumlah Invoice : {total_inv}<br><a href="javascript:" onclick="showmdall({total_inv})" class="list-inv" style="color:white">Lihat Detail Invoice</a>';

		var columnTemplate = series.columns.template;
		columnTemplate.strokeWidth = 2;
		columnTemplate.strokeOpacity = 1;
		columnTemplate.stroke = am4core.color("#FFFFFF");

		columnTemplate.adapter.add("fill", function(fill, target) {
			return chartColl.colors.getIndex(target.dataItem.index);
		});

		columnTemplate.adapter.add("stroke", function(stroke, target) {
			return chartColl.colors.getIndex(target.dataItem.index);
		});

		chartColl.cursor = new am4charts.XYCursor();
		chartColl.cursor.lineX.strokeOpacity = 0;
		chartColl.cursor.lineY.strokeOpacity = 0;

		function showmdall(month) {
			// var month = $(this).attr('data-id');
			alert('coming soon');
		}
	</script>
<?php else: ?>
	<div class="text-center">
		<p>No Data Available</p>
	</div>
<?php endif; ?>