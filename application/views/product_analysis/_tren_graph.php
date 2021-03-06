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

.amcharts-graph-g5 .amcharts-graph-stroke {
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
	$item_arr = array("EDC","ATM");
	if(in_array($this->uri->segment(5),$usd_arr)){$cur="$"; $sep="Jt"; $lkp="Juta";}
	elseif(in_array($this->uri->segment(5),$item_arr)){$cur=""; $sep=" Mesin"; $lkp=" Mesin";}
	elseif($this->uri->segment(5) == "CC"){$cur=""; $sep=" Kartu"; $lkp=" Kartu";}
	elseif($this->uri->segment(5) == "PCD"){$cur=""; $sep=" Rek"; $lkp=" Rekening";}
	elseif($this->uri->segment(5) == "OIR"){$cur=""; $sep=" Trx"; $lkp=" Transaksi";}
	else{$cur="Rp"; $sep="M"; $lkp="Milyar";}
?>

<script type="text/javascript">
	var chartData = [
    <?php 
    	$start_from = 0;
		if(not_avg_bal($this->uri->segment(5))){
			$start_from = 1;
		}
		for($i=$start_from;$i<=12;$i++){
    		
    		$pengali = 1;
    		
    		if($this->uri->segment(7)=="ann" && not_avg_bal($this->uri->segment(5))){
				$pengali = 12/$i;
			}
			$bagi = get_produk_pow($this->uri->segment(5));
			if($this->uri->segment(6)=="income"){$bagi = 9;}
    		
    		$month_name = get_month_name($i);
    		$mth = 'mth_'.$i;
    		$prd_name = $this->uri->segment(5)."_vol";
    		$last_mth = $ly[$i]/pow(10,$bagi)*$pengali;
    		if($i==0){
				$target = $tgt_ws_ly->$prd_name;
			}
			else{
				if(!$ly[$i]){
					if(not_avg_bal($this->uri->segment(5))){
						$target=$tgt_ws->$prd_name/12*$i;
					}
					else{$target= $tgt_ws->$prd_name;}
				}else{
					$target = (($tgt_ws->$prd_name)*$ly[$i]/$ly[12]);
				}
			}
    		if($i<=$month){
    			$this_mth = $now[$i]/pow(10,$bagi)*$pengali;
    			if($ly[$i]){
    				$gwth = (($now[$i]/$ly[$i])-1)*100;	
    			}
    			elseif($now[$i]){
    				$gwth = 100;
    			}
    			else{$gwth=0;}
    			if($target){
					$real = ($this_mth/$target*100);
				}else{$real = 100;}
    		}
    		
    		
    	?>
    {
		<?php if($i>0){?>
			"month":"<?php echo $month_name?>",
		<?php }else{?>
			"month":"<?php echo $year-1?>",
		<?php }?>
		<?php if(($i<=$month && $this_mth && !$start_from) || $start_from){?>
			"this_year": <?php echo round(abs($this_mth),1)?>,
			"growth": <?php echo round($gwth,2)?>,
			"real": <?php echo round($real,1)?>,
			<?php if($i==$month){?>
				//"bulletClass":'lastBullet',
        <?php }}?>
		<?php if(($last_mth && !$start_from) || $start_from){?>
			"last_year": <?php echo round(abs($last_mth),1)?>,
		<?php }?>
		"target": <?php echo round($target,1)?>,
		
        
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
  },{
    id: "a3",
    position: "right",
    gridAlpha: 0,
    axisAlpha: 0,
    labelsEnabled: false
  }],
  graphs: [
  {
  	id: "g5",
  	title: "Target :",
  	valueField: "target",
  	type: "line",
  	lineColor: "red",
  	descriptionField: "real",
  	legendValueText: "<?php echo $cur?> [[value]] <?php echo $sep?> ([[real]]%)",
  	lineThickness: 1,
  	valueAxis: "a2",
  	labelText: "[[value]]",
  	bullet: "square",
  },{
    id: "g2",
    title: "<?php echo $year-1?> : ",
    valueField: "last_year",
    type: "line",
    valueAxis: "a2",
    lineColor: "#c3c3c3",
    lineThickness: 1,
    legendValueText: "<?php echo $cur?> [[value]] <?php echo $sep?>",
    descriptionField: "month",
    fillColorsField: "lineColor",
    fillAlphas: 0.5,
    bulletBorderColor: "#c3c3c3",
    bulletBorderAlpha: 1,
    bulletBorderThickness: 0.3,
    bulletColor: "#c3c3c3",
    
    labelPosition: "right",
    balloonText: "last_year:[[value]]",
    showBalloon: true,
    animationPlayed: false,
  },{
    id: "g3",
    title: "<?php echo $year?> : ",
    valueField: "this_year",
    classNameField: "bulletClass",
    type: "line",
    valueAxis: "a2",
    lineColor: "#007aff",
    balloonText: "[[value]]",
    lineThickness: 1,
    legendValueText: "<?php echo $cur?> [[value]] <?php echo $sep?> (Growth : [[description]]%)",
    fillColorsField: "lineColor",
    fillAlphas: 0.4,
    descriptionField: "growth",
    bullet: "round",
    labelText: "[[value]]",
    bulletBorderColor: "#007aff",
    bulletBorderThickness: 1,
    bulletBorderAlpha: 1,
    dashLengthField: "dashLength",
    animationPlayed: false,
  },{
  	id: "g4",	
  	lineThickness: 0,
  	valueAxis: "a3",
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
    		$nii_arr = array("CASA","TD","IL","WCL","TR","SL","WM","PCD","VCCD","VCL","VCLnDF","Micro_Loan","MKM","KPR","Auto","CC");
			if(in_array($this->uri->segment(5),$nii_arr)){$inc_name = $this->uri->segment(5)."_nii";}
			else{$inc_name = $this->uri->segment(5)."_fbi";}
			
			$last_mth = $lyic[$i]/pow(10,$bagi)*$pengali;
			if(!$lyic[$i]){
				$targetic=$tgt_ws->$inc_name/12*$i;
			}else{
				$targetic = (($tgt_ws->$inc_name)*$lyic[$i]/$lyic[12]);
			}
    		if($i<=$month){
    			$this_mth = $nowic[$i]/pow(10,$bagi)*$pengali;
    			if($lyic[$i]){
    				$gwthic = (($nowic[$i]/$lyic[$i])-1)*100;	
    			}elseif($nowic[$i]){$gwthic = 100;}else{$gwthic =0;}
    			if($targetic){
					$realic = ($this_mth/$targetic*100);
				}else{$realic = 100;}
    		}
    		
    	?>
    {
        "month":"<?php echo $month_name?>",
        <?php if($i<=$month){?>
        "this_year": <?php echo round(abs($this_mth),2)?>,
        "growth": <?php echo round($gwthic,2)?>,
        "real": <?php echo round($realic,1)?>,
        <?php if($i==$month){?>
        //"bulletClass":'lastBullet',
        <?php }}?>
        "last_year": <?php echo round(abs($last_mth),2)?>,
        "target": <?php echo round($targetic,2)?>,
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
  },{
    id: "a3",
    position: "right",
    gridAlpha: 0,
    axisAlpha: 0,
    labelsEnabled: false
  }],
  graphs: [
  {
  	id: "g5",
  	title: "Target :",
  	valueField: "target",
  	type: "line",
  	lineColor: "red",
  	descriptionField: "real",
  	legendValueText: "Rp [[value]] M ([[real]]%)",
  	lineThickness: 1,
  	valueAxis: "a2",
  	labelText: "[[value]]",
  	bullet: "square",
  },{
    id: "g2",
    title: "<?php echo $year-1?> : ",
    valueField: "last_year",
    type: "line",
    valueAxis: "a2",
    lineColor: "#c3c3c3",
    lineThickness: 1,
    legendValueText: "[[description]]/Rp [[value]] M",
    descriptionField: "month",
    fillColorsField: "lineColor",
    fillAlphas: 0.5,
    
    bulletBorderColor: "#c3c3c3",
    bulletBorderAlpha: 1,
    bulletBorderThickness: 0.3,
    bulletColor: "#c3c3c3",
    labelPosition: "right",
    balloonText: "last_year:[[value]]",
    showBalloon: true,
    animationPlayed: false,
  },{
    id: "g3",
    title: "<?php echo $year?> : ",
    valueField: "this_year",
    classNameField: "bulletClass",
    type: "line",
    valueAxis: "a2",
    lineColor: "#007aff",
    balloonText: "[[value]]",
    lineThickness: 1,
    legendValueText: "Rp [[value]] M (Growth : [[description]]%)",
    fillColorsField: "lineColor",
    fillAlphas: 0.4,
    descriptionField: "growth",
   	bullet: "round",
    labelText: "[[value]]",
    bulletBorderColor: "#007aff",
    bulletBorderThickness: 1,
    bulletBorderAlpha: 1,
    dashLengthField: "dashLength",
    animationPlayed: false,
  },{
  	id: "g4",
  	lineThickness: 0,
  	valueAxis: "a3",
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