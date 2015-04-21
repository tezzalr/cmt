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
	height		: 300px;
}
#chartdiv-inc {
    width		: 100%;
	height		: 300px;
}
#chartdivsw {
	width		: 100%;
	height		: 198px;
	font-size	: 9px;
}		
</style>

<?php
	$usd_arr = array("FX","Trade");
	if(in_array($this->uri->segment(5),$usd_arr)){$cur="$"; $sep="Mn";}
	else{$cur="Rp"; $sep="Bn";}
?>

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
    		
    		$month_name = get_month_name($i);
    		$mth = 'mth_'.$i;
    		if($i<=$month){
    			$this_mth = $now[$i]/pow(10,$bagi)*$pengali;
    		}
    		$last_mth = $ly[$i]/pow(10,$bagi)*$pengali;
    	?>
    {
        "month":"<?php echo $month_name?>",
        <?php if($i<=$month){?>
        "this_year": <?php echo round($this_mth,1)?>,
        <?php if($i==$month){?>
        "bulletClass":'lastBullet',
        <?php }}?>
        "last_year": <?php echo round($last_mth,1)?>
    },
    <?php }?>
    
];

function make_volume(){

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
    title: "<?php echo $year-1?>",
    valueField: "last_year",
    type: "line",
    valueAxis: "a2",
    lineColor: "#786c56",
    lineThickness: 1,
    legendValueText: "[[description]]/<?php echo $cur?> [[value]] <?php echo $sep?>",
    descriptionField: "month",
    fillColorsField: "lineColor",
    fillAlphas: 0.5,
    bullet: "square",
    bulletBorderColor: "#786c56",
    bulletBorderAlpha: 1,
    bulletBorderThickness: 1,
    bulletColor: "#786c56",
    labelText: "[[value]]",
    labelPosition: "right",
    balloonText: "last_year:[[value]]",
    showBalloon: true,
    animationPlayed: false,
  },{
    id: "g3",
    title: "<?php echo $year?>",
    valueField: "this_year",
    classNameField: "bulletClass",
    type: "line",
    valueAxis: "a2",
    lineColor: "#eda32b",
    balloonText: "[[value]]",
    lineThickness: 1,
    legendValueText: "[[description]]/<?php echo $cur?> [[value]] <?php echo $sep?>",
    fillColorsField: "lineColor",
    fillAlphas: 0.4,
    descriptionField: "month",
    bullet: "round",
    labelText: "[[value]]",
    bulletBorderColor: "#eda32b",
    bulletBorderThickness: 1,
    bulletBorderAlpha: 1,
    dashLengthField: "dashLength",
    animationPlayed: false,
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
}
</script>
<script type="text/javascript">
	var chartDatainc = [
    <?php 
    	for($i=1;$i<=12;$i++){
    		$pengali = 1; 
    		
    		if($this->uri->segment(7)=="ann" && not_avg_bal($this->uri->segment(5))){
				$pengali = 12/$i;
			}
			$bagi = 9;
    		
    		$month_name = get_month_name($i);
    		$mth = 'mth_'.$i;
    		if($i<=$month){
    			$this_mth = $nowic[$i]/pow(10,$bagi)*$pengali;
    		}
    		$last_mth = $lyic[$i]/pow(10,$bagi)*$pengali;
    	?>
    {
        "month":"<?php echo $month_name?>",
        <?php if($i<=$month){?>
        "this_year": <?php echo round($this_mth,3)?>,
        <?php if($i==$month){?>
        "bulletClass":'lastBullet',
        <?php }}?>
        "last_year": <?php echo round($last_mth,2)?>,
        
    },
    <?php }?>
    
];
function make_income(){
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
    title: "<?php echo $year-1?>",
    valueField: "last_year",
    type: "line",
    valueAxis: "a2",
    lineColor: "#786c56",
    lineThickness: 1,
    legendValueText: "[[description]]/<?php echo $cur?> [[value]] <?php echo $sep?>",
    descriptionField: "month",
    fillColorsField: "lineColor",
    fillAlphas: 0.5,
    bullet: "square",
    bulletBorderColor: "#786c56",
    bulletBorderAlpha: 1,
    bulletBorderThickness: 1,
    bulletColor: "#786c56",
    labelText: "[[value]]",
    labelPosition: "right",
    balloonText: "last_year:[[value]]",
    showBalloon: true,
    animationPlayed: false,
  },{
    id: "g3",
    title: "<?php echo $year?>",
    valueField: "this_year",
    classNameField: "bulletClass",
    type: "line",
    valueAxis: "a2",
    lineColor: "#eda32b",
    balloonText: "[[value]]",
    lineThickness: 1,
    legendValueText: "[[description]]/<?php echo $cur?> [[value]] <?php echo $sep?>",
    fillColorsField: "lineColor",
    fillAlphas: 0.4,
    descriptionField: "month",
   	bullet: "round",
    labelText: "[[value]]",
    bulletBorderColor: "#eda32b",
    bulletBorderThickness: 1,
    bulletBorderAlpha: 1,
    dashLengthField: "dashLength",
    animationPlayed: false,
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
}
</script>