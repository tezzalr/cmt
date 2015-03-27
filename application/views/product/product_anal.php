<style>
	.job-title{
		color:#b2b2b2;
		font-size:12px;
	}
	hr{
		margin:10px 0 10px 0;
	}
	#chartdiv {
    width		: 100%;
	height		: 500px;
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
							


#chartdivsw {
	width		: 100%;
	height		: 200px;
	font-size	: 9px;
}		
</style>
<?php echo $sidebar?>
<div class="content">
	<h2 style="margin-bottom:0px;">TAMBANG BUKIT ASAM GROUP</h2>
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
				<div id="chartdiv"></div>
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
	startDuration: 1,
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
    {
        "month":"Jan",
        "date": "2012-01-01",
        "townName": "New York",
        "townName2": "New York",
        "townSize": 25,
        "latitude": 40.71,
        "duration": 408
    },
    {
        "month":"Feb",
        "date": "2012-01-02",
        "townName": "Washington",
        "townSize": 14,
        "latitude": 38.89,
        "duration": 482
    },
    {
        "month":"Mar",
        "date": "2012-01-03",
        "townName": "Wilmington",
        "townSize": 6,
        "latitude": 34.22,
        "duration": 562
    },
    {
        "month":"Apr",
        "date": "2012-01-04",
        "townName": "Jacksonville",
        "townSize": 7,
        "latitude": 30.35,
        "duration": 379
    },
    {
        "month":"May",
        "date": "2012-01-05",
        "townName": "Miami",
        "townName2": "Miami",
        "townSize": 10,
        "latitude": 25.83,
        "duration": 501
    },
    {
        "month":"Jun",
        "date": "2012-01-06",
        "townName": "Tallahassee",
        "townSize": 7,
        "latitude": 30.46,
        "duration": 443
    },
    {
        "month":"Jul",
        "date": "2012-01-07",
        "townName": "New Orleans",
        "townSize": 10,
        "latitude": 29.94,
        "duration": 405
    },
    {
       "month":"Aug",
        "date": "2012-01-08",
        "townName": "Houston",
        "townName2": "Houston",
        "townSize": 16,
        "latitude": 29.76,
        "duration": 309
    },
    {
        "month":"Sep",
        "date": "2012-01-09",
        "townName": "Dalas",
        "townSize": 17,
        "latitude": 32.8,
        "duration": 287
    },
    {
        "month":"Okt",
        "date": "2012-01-10",
        "townName": "Oklahoma City",
        "townSize": 11,
        "latitude": 35.49,
        "duration": 485
    },
    {
        "month":"Nov",
        "date": "2012-01-11",
        "townName": "Kansas City",
        "townSize": 10,
        "latitude": 39.1,
        "duration": 890
    },
    {
		"month":"Des",        
        "date": "2012-01-12",
        "townName": "Denver",
        "townName2": "Denver",
        "townSize": 18,
        "latitude": 39.74,
        "duration": 810,
        "bulletClass": "lastBullet"
    }
];
var chart = AmCharts.makeChart("chartdiv", {
  type: "serial",
  dataDateFormat: "YYYY-MM-DD",
  dataProvider: chartData,

  addClassNames: true,
  startDuration: 1,
  color: "black",
  marginLeft: 0,

  categoryField: "month",
  

  valueAxes: [{
    id: "a2",
    position: "left",
    gridAlpha: 0,
    axisAlpha: 0,
    labelsEnabled: false
  },{
    id: "a3",
    title: "duration",
    position: "right",
    gridAlpha: 0,
    axisAlpha: 0,
    duration: "mm",
    durationUnits: {
        DD: "d. ",
        hh: "h ",
        mm: "min",
        ss: ""
    }
  }],
  graphs: [{
    id: "g2",
    valueField: "latitude",
    classNameField: "bulletClass",
    title: "latitude/city",
    type: "line",
    valueAxis: "a2",
    lineColor: "#786c56",
    lineThickness: 1,
    legendValueText: "[[description]]/[[value]]",
    descriptionField: "townName",
    bullet: "round",
    bulletBorderColor: "#786c56",
    bulletBorderAlpha: 1,
    bulletBorderThickness: 2,
    bulletColor: "#000000",
    /*labelText: "[[value]]",*/
    labelPosition: "right",
    balloonText: "latitude:[[value]]",
    showBalloon: true,
    animationPlayed: true,
  },{
    id: "g3",
    title: "duration",
    valueField: "duration",
    type: "line",
    valueAxis: "a3",
    lineColor: "#ff5755",
    balloonText: "[[value]]",
    lineThickness: 1,
    legendValueText: "[[value]]",
    bullet: "square",
    bulletBorderColor: "#ff5755",
    bulletBorderThickness: 1,
    bulletBorderAlpha: 1,
    dashLengthField: "dashLength",
    animationPlayed: true
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