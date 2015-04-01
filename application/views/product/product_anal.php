<style>
	.job-title{
		color:#b2b2b2;
		font-size:12px;
	}
	hr{
		margin:10px 0 10px 0;
	}

.amcharts-graph-g2 .amcharts-graph-stroke {
  stroke-dasharray: 3px 3px;
  stroke-linejoin: round;
  stroke-linecap: round;
  -webkit-animation: am-moving-dashes 1s linear infinite;
  animation: am-moving-dashes 1s linear infinite;
}

.amcharts-graph-g3 .amcharts-graph-stroke {
  stroke-dasharray: 3px 3px;
  stroke-linejoin: round;
  stroke-linecap: round;
  -webkit-animation: am-moving-dashes 1s linear infinite;
  animation: am-moving-dashes 1s linear infinite;
}

@-webkit-keyframes am-moving-dashes {
  100% {
    stroke-dashoffset: -31px;
  }
}
@keyframes am-moving-dashes {
  100% {
    stroke-dashoffset: -31px;
  }
}


.lastBullet {
  -webkit-animation: am-pulsating 1s ease-out infinite;
  animation: am-pulsating 1s ease-out infinite;
}
@-webkit-keyframes am-pulsating {
  0% {
    stroke-opacity: 1;
    stroke-width: 0px;
  }
  100% {
    stroke-opacity: 0;
    stroke-width: 50px;
  }
}
@keyframes am-pulsating {
  0% {
    stroke-opacity: 1;
    stroke-width: 0px;
  }
  100% {
    stroke-opacity: 0;
    stroke-width: 50px;
  }
}

.amcharts-graph-column-front {
  -webkit-transition: all .3s .3s ease-out;
  transition: all .3s .3s ease-out;
}
.amcharts-graph-column-front:hover {
  fill: #496375;
  stroke: #496375;
  -webkit-transition: all .3s ease-out;
  transition: all .3s ease-out;
}


@-webkit-keyframes am-draw {
    0% {
        stroke-dashoffset: 500%;
    }
    100% {
        stroke-dashoffset: 0px;
    }
}
@keyframes am-draw {
    0% {
        stroke-dashoffset: 500%;
    }
    100% {
        stroke-dashoffset: 0px;
    }
}
							

#chartdiv {
    width		: 100%;
	height		: 500px;
}
#chartdiv-inc {
    width		: 100%;
	height		: 500px;
}
#chartdivsw {
	width		: 100%;
	height		: 200px;
	font-size	: 9px;
}		
</style>
<?php echo $sidebar?>
<div class="content">
	<h2 style="margin-bottom:0px;"><?php echo $anchor->name?></h2>
	<span style="font-size:18px; color:#bbb">Product Analysis / CASA</span>
	<hr>
	<div style="width:50%; float:left; padding:0 5px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Volume Trend Line</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="chartdiv"></div>
			</div>
		</div>
	</div>
	
	<div style="width:50%; float:left; padding:0 5px 0 5px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Income Trend Line</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="chartdiv-inc"></div>
			</div>
		</div>
	</div>
	<div style="width:50%; float:left; padding:0 5px 0 5px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Share of Wallet</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="chartdivsw"></div>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
</div>

<script>
	var chart3 = AmCharts.makeChart("chartdivsw", {
	type: "serial",
	pathToImages: "http://cdn.amcharts.com/lib/3/images/",
	categoryField: "year",
	rotate: true,
	startthis_year: 1,
	categoryAxis: {
		gridPosition: "start",
		position: "left"
	},
	trendLines: [],
	graphs: [
		{
			balloonText: "Income:[[value]]",
			labelText: "[[value]]",
			fillAlphas: 0.8,
			id: "AmGraph-1",
			lineAlpha: 0.2,
			title: "Wallet Size",
			type: "column",
			valueField: "Wallet Size"
		},
		{
			balloonText: "Expenses:[[value]]",
			labelText: "[[value]]",
			fillAlphas: 0.8,
			id: "AmGraph-2",
			lineAlpha: 0.2,
			title: "Realisasi",
			type: "column",
			valueField: "Realisasi"
		}
	],
	guides: [],
	valueAxes: [
		{
			id: "ValueAxis-1",
			position: "top",
			axisAlpha: 0
		}
	],
	allLabels: [],
	amExport: {
		right: 20,
		top: 20
	},
	balloon: {},
	titles: [],
	dataProvider: [
		{
			"year": 2013,
			"Wallet Size": 492.6,
			"Realisasi": 278.6
		},
		{
			"year": 2014,
			"Wallet Size": 492.6,
			"Realisasi": 278.6
		},
		{
			"year": 2015,
			"Wallet Size": 492.6,
			"Realisasi": 278.6
		}
	]
});
</script>
<script type="text/javascript">
	var chartData = [
    <?php 
    	for($i=1;$i<=12;$i++){
    		$pengali = 1; 
    		
    		if($this->uri->segment(7)=="ann" && not_avg_bal($this->uri->segment(5))){
				$pengali = 12/$i;
			}
			$bagi = get_produk_pow($this->uri->segment(5));
			if($this->uri->segment(6)=="income"){$bagi = 9;}
    		
    		$month = get_month_name($i);
    		$mth = 'mth_'.$i;
    		$this_mth = $now->$mth/pow(10,$bagi)*$pengali;
    		$last_mth = $ly->$mth/pow(10,$bagi)*$pengali;
    	?>
    {
        "month":"<?php echo $month?>",
        "this_year": <?php echo round($last_mth,1)?>,
        "last_year": <?php echo round($this_mth,1)?>
    },
    <?php }?>
    
];
var chart = AmCharts.makeChart("chartdiv", {
  type: "serial",
  dataDateFormat: "YYYY-MM-DD",
  dataProvider: chartData,

  addClassNames: true,
  startthis_year: 1,
  color: "black",
  marginLeft: 0,

  categoryField: "month",
  

  valueAxes: [{
    id: "a2",
    position: "left",
    gridAlpha: 0.4,
    axisAlpha: 0,
    labelsEnabled: true
  }],
  graphs: [{
    id: "g2",
    title: "<?php echo $year?>",
    valueField: "last_year",
    classNameField: "bulletClass",
    type: "line",
    valueAxis: "a2",
    lineColor: "#eda32b",
    lineThickness: 1,
    legendValueText: "[[description]]/[[value]]",
    descriptionField: "month",
    fillColorsField: "lineColor",
    fillAlphas: 0.4,
    bullet: "round",
    bulletBorderColor: "#eda32b",
    bulletBorderAlpha: 1,
    bulletBorderThickness: 3,
    bulletColor: "#eda32b",
    labelText: "[[value]]",
    labelPosition: "right",
    balloonText: "last_year:[[value]]",
    showBalloon: true,
  },{
    id: "g3",
    title: "<?php echo $year-1?>",
    valueField: "this_year",
    type: "line",
    valueAxis: "a2",
    lineColor: "#786c56",
    balloonText: "[[value]]",
    lineThickness: 1,
    legendValueText: "[[description]]/[[value]]",
    fillColorsField: "lineColor",
    fillAlphas: 0.4,
    descriptionField: "month",
    bullet: "square",
    labelText: "[[value]]",
    bulletBorderColor: "#786c56",
    bulletBorderThickness: 1,
    bulletBorderAlpha: 1,
    dashLengthField: "dashLength",
  }],

  chartCursor: {
    zoomable: false,
    categoryBalloonDateFormat: "DD",
    cursorAlpha: 0,
    valueBalloonsEnabled: false
  },
  legend: {
    bulletType: "round",
    equalWidths: false,
    valueWidth: 120,
    useGraphSettings: true,
    color: "Black"
  }
});
</script>

<script type="text/javascript">
	var chartDatainc = [
    <?php 
    	for($i=1;$i<=12;$i++){
    		$pengali = 1; 
    		
    		if($this->uri->segment(7)=="ann" && not_avg_bal($this->uri->segment(5))){
				$pengali = 12/$i;
			}
			$bagi = 6;
    		
    		$month = get_month_name($i);
    		$mth = 'mth_'.$i;
    		$this_mth = $nowic->$mth/pow(10,$bagi)*$pengali;
    		$last_mth = $lyic->$mth/pow(10,$bagi)*$pengali;
    	?>
    {
        "month":"<?php echo $month?>",
        "this_year": <?php echo round($last_mth,1)?>,
        "last_year": <?php echo round($this_mth,1)?>
    },
    <?php }?>
    
];
var chart = AmCharts.makeChart("chartdiv-inc", {
  type: "serial",
  dataDateFormat: "YYYY-MM-DD",
  dataProvider: chartDatainc,

  addClassNames: true,
  startthis_year: 1,
  color: "black",
  marginLeft: 0,

  categoryField: "month",
  

  valueAxes: [{
    id: "a2",
    position: "left",
    gridAlpha: 0.4,
    axisAlpha: 0,
    labelsEnabled: true
  }],
  graphs: [{
    id: "g2",
    title: "<?php echo $year?>",
    valueField: "last_year",
    classNameField: "bulletClass",
    type: "line",
    valueAxis: "a2",
    lineColor: "#eda32b",
    lineThickness: 1,
    legendValueText: "[[description]]/Rp [[value]] Juta",
    descriptionField: "month",
    fillColorsField: "lineColor",
    fillAlphas: 0.4,
    bullet: "round",
    bulletBorderColor: "#eda32b",
    bulletBorderAlpha: 1,
    bulletBorderThickness: 3,
    bulletColor: "#eda32b",
    labelText: "[[value]]",
    labelPosition: "right",
    balloonText: "last_year:[[value]]",
    showBalloon: true,
  },{
    id: "g3",
    title: "<?php echo $year-1?>",
    valueField: "this_year",
    type: "line",
    valueAxis: "a2",
    lineColor: "#786c56",
    balloonText: "[[value]]",
    lineThickness: 1,
    legendValueText: "[[description]]/Rp [[value]] Juta",
    fillColorsField: "lineColor",
    fillAlphas: 0.4,
    descriptionField: "month",
    bullet: "square",
    labelText: "[[value]]",
    bulletBorderColor: "#786c56",
    bulletBorderThickness: 1,
    bulletBorderAlpha: 1,
    dashLengthField: "dashLength",
  }],

  chartCursor: {
    zoomable: false,
    categoryBalloonDateFormat: "DD",
    cursorAlpha: 0,
    valueBalloonsEnabled: false
  },
  legend: {
    bulletType: "round",
    equalWidths: false,
    valueWidth: 120,
    useGraphSettings: true,
    color: "Black"
  }
});
</script>