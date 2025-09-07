<h2 class="title-segmen" style="margin-top:0px !important; margin-left:20px;"><?php echo $segmen;?></h2>
<div class="text-center">
    <p>Jumlah Total Invoice Forecasting Pencairan : <?php echo array_sum(array_column($drd, 'total_inv'));?></p>
    <p>
        Jumlah Value Forecasting Pencairan :
        <strong style="color: #fa591d;">Rp.
            <?php
            $sum_total_basevalue = array_sum(array_column($drd, 'total_basevalue'));
            $sum_total = strrev(implode('.',str_split(strrev(strval($sum_total_basevalue)),3)));
            echo $sum_total;
            ?>
        </strong>
    </p>
</div>
<div id="chartSegmenForecas" style="width: 100%;height: 500px;"></div>

<table class="table table-responsive table-bordered">
    <?php
    $key_januari = array_search('Jan', array_column($drd, 'bulan'));
    $key_februari = array_search('Feb', array_column($drd, 'bulan'));
    $key_maret = array_search('Mar', array_column($drd, 'bulan'));
    $key_april = array_search('Apr', array_column($drd, 'bulan'));
    $key_mei = array_search('Mei', array_column($drd, 'bulan'));
    $key_juni = array_search('Jun', array_column($drd, 'bulan'));
    $key_juli = array_search('Jul', array_column($drd, 'bulan'));
    $key_agustus = array_search('Agu', array_column($drd, 'bulan'));
    $key_september = array_search('Sep', array_column($drd, 'bulan'));
    $key_oktober = array_search('Okt', array_column($drd, 'bulan'));
    $key_november = array_search('Nov', array_column($drd, 'bulan'));
    $key_desember = array_search('Des', array_column($drd, 'bulan'));

    echo '<thead>';
        echo '<tr>';
            echo '<td>Forecast Pencairan</td>';
            if(is_numeric($key_januari)){
                echo '<td>JAN</td>';
            }
            if(is_numeric($key_februari)){
                echo '<td>FEB</td>';
            }
            if(is_numeric($key_maret)){
                echo '<td>MAR</td>';
            }
            if(is_numeric($key_april)){
                echo '<td>APR</td>';
            }
            if(is_numeric($key_mei)){
                echo '<td>MEI</td>';
            }
            if(is_numeric($key_juni)){
                echo '<td>JUN</td>';
            }
            if(is_numeric($key_juli)){
                echo '<td>JUL</td>';
            }
            if(is_numeric($key_agustus)){
                echo '<td>AGU</td>';
            }
            if(is_numeric($key_september)){
                echo '<td>SEP</td>';
            }
            if(is_numeric($key_oktober)){
                echo '<td>OKT</td>';
            }
            if(is_numeric($key_november)){
                echo '<td>NOV</td>';
            }
            if(is_numeric($key_desember)){
                echo '<td>DES</td>';
            }
            echo '<td><strong>Total</strong></td>';
        echo '</tr>';
    echo '</thead>';

    echo '<tbody>';
        echo '<tr>';
            echo '<td><i class="ti ti-square" style="color:#C20000"></i> '. $segmen .'</td>';
            if(is_numeric($key_januari)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_januari]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_februari)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_februari]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_maret)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_maret]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_april)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_april]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_mei)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_mei]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_juni)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_juni]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_juli)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_juli]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_agustus)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_agustus]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_september)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_september]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_oktober)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_oktober]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_november)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_november]['total_basevalue_format']) .'</strong></td>';
            }
            if(is_numeric($key_desember)){
                echo '<td><strong>'. str_replace(',','.',$drd[$key_desember]['total_basevalue_format']) .'</strong></td>';
            }

            $sum_total_basevalue = array_sum(array_column($drd, 'total_basevalue'));
            $sum_total = strrev(implode('.',str_split(strrev(strval($sum_total_basevalue)),3)));
            echo '<td style="color: #fa591d;"><strong>'. $sum_total .'</strong></td>';
        echo '</tr>';
    echo '</tbody>';
    ?>
</table>

<script>
    am4core.useTheme(am4themes_animated);

    // Create chart instance
    var chartForecast = am4core.create("chartSegmenForecas", am4charts.XYChart3D);
    chartForecast.data = <?php echo $drd_chart?>;

    // Modify chart's colors
    chartForecast.colors.list = [
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
        am4core.color("#C20000"),
    ];

    // Create axes
    var categoryAxis = chartForecast.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "bulan";
    categoryAxis.renderer.labels.template.rotation = 270;
    categoryAxis.renderer.labels.template.hideOversized = false;
    categoryAxis.renderer.minGridDistance = 30;
    categoryAxis.renderer.labels.template.horizontalCenter = "right";
    categoryAxis.renderer.labels.template.verticalCenter = "middle";
    categoryAxis.tooltip.label.rotation = 270;
    categoryAxis.tooltip.label.horizontalCenter = "right";
    categoryAxis.tooltip.label.verticalCenter = "middle";

    var valueAxis = chartForecast.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = "";
    valueAxis.title.fontWeight = "bold";
    valueAxis.numberFormatter.type = "NumberFormatter";
    valueAxis.numberFormatter.numberFormat = "#,###.";

    // Create series
    var series = chartForecast.series.push(new am4charts.ColumnSeries3D());
    series.dataFields.valueY = "total_basevalue_format";
    series.dataFields.categoryX = "bulan";
    series.name = "Visits";
    series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
    series.columns.template.fillOpacity = .8;
    series.numberFormatter.type = "NumberFormatter";
    series.numberFormatter.numberFormat = "#,###.";

    series.tooltip.label.interactionsEnabled = true;
    series.tooltip.keepTargetHover = true;
    series.columns.template.tooltipHTML = '<b>{total_basevalue_format}</b><br>Jumlah Invoice : {total_inv}<br><a href="javascript:" onclick="showmd()" class="list-inv" data-id="{bulan.urlEncode()}" style="color:white">Lihat Detail Invoice</a>';

    var columnTemplate = series.columns.template;
    columnTemplate.strokeWidth = 2;
    columnTemplate.strokeOpacity = 1;
    columnTemplate.stroke = am4core.color("#FFFFFF");

    columnTemplate.adapter.add("fill", function(fill, target) {
        return chartForecast.colors.getIndex(target.dataItem.index);
    });

    columnTemplate.adapter.add("stroke", function(stroke, target) {
        return chartForecast.colors.getIndex(target.dataItem.index);
    });

    chartForecast.cursor = new am4charts.XYCursor();
    chartForecast.cursor.lineX.strokeOpacity = 0;
    chartForecast.cursor.lineY.strokeOpacity = 0;
</script>