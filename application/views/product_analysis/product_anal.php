<?php echo $sidebar?>
<?php echo $tren_graph?>
<style>
	.pp_tit{
		font-size:20px;
		color:#eda32b;
	}
	table td{
		 padding:1px 0 1px 0;
	}
	.al-right{
		text-align:right;
	}
</style>

	<?php 
		$prd_name = $this->uri->segment(5)."_vol";
		$prd_name_inc = $this->uri->segment(5)."_inc";
		$nii_arr = array("CASA","TD","IL","WCL","TR","SL");
		if(in_array($this->uri->segment(5),$nii_arr)){$inc_name = $this->uri->segment(5)."_nii";}
		else{$inc_name = $this->uri->segment(5)."_fbi";}
		$target_vol = $tgt_ws->$prd_name;
		$target_vol_ly = $tgt_ws_ly->$prd_name;	
		$target_inc = $tgt_ws->$inc_name;
		$target_inc_ly = $tgt_ws_ly->$inc_name;
		
		$usd_arr = array("FX","Trade");
		if(in_array($this->uri->segment(5),$usd_arr)){$cur="$"; $sep="Mn";}
		else{$cur="Rp"; $sep="Bn";}
	?>

<div class="content">
	<h2 style="margin-bottom:0px;"><?php if($anchor){echo $anchor->name; $id_nas=$anchor->id; $kind="anchor";}else{echo $dir['name']; $id_nas=$dir['code']; $kind="directorate";}?></h2>
	<span style="font-size:18px; color:#bbb">Product Analysis / <?php echo change_real_name($this->uri->segment(5))?></span>
	<div class="pull-right" style="padding-right:10px;">
		<select class="btn-wsa" name="product" onchange="if (this.value) window.location.href=this.value">
			<?php foreach($arr_prod as $prod){?>
			<option value="<?php echo base_url()."product_analysis/show/".$kind."/".$id_nas."/".$prod['id']?>" <?php if($this->uri->segment(5)==$prod['id']){echo "selected";}?>><?php echo $prod['name']?></option>
			<?php }?>
		</select>
	</div>
	<hr>
	<div>
	<div style="width:25%; float:left; padding:0 5px 0 5px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Summary</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<?php 
					$delta_vol = $rlz[$prd_name]-$rlzly[$prd_name]; if($delta_vol>0){$col = "green"; $word = "Peningkatan";}else{$col = "red"; $word = "Penurunan";}
				?>
				<p>Secara annualize terdapat <span style="color:<?php echo $col?>"><?php echo $word?> Volume</span> sebesar <span style="color:#eda23b"> <?php echo $cur." ".number_format(abs($delta_vol),1,'.',',')." ".$sep?></span> dari <?php echo $year-1?>.<br><br>Growth : <span style="color:#eda23b"><?php echo number_format((($rlz[$prd_name]/$rlzly[$prd_name])-1)*100,2)?>%</span></p>
				<hr>
				<?php 
					$delta_inc = $rlz[$prd_name_inc]-$rlzly[$prd_name_inc]; if($delta_inc>0){$col = "green"; $word = "Peningkatan";}else{$col = "red"; $word = "Penurunan";}
				?>
				<p>Secara annualize terdapat <span style="color:<?php echo $col?>"><?php echo $word?> Income</span> sebesar <span style="color:#eda23b"> <?php echo $cur." ".number_format(abs($delta_inc),1,'.',',')." ".$sep?></span> dari <?php echo $year-1?>.<br><br>Growth : <span style="color:#eda23b"><?php echo number_format((($rlz[$prd_name_inc]/$rlzly[$prd_name_inc])-1)*100,2)?>%</span></p>
			</div>
		</div>
	</div>
	<div style="width:25%; float:left; padding:0 5px 0 5px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Product Performance</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div>
					<table style="width:100%;">
						<tr style="color:#bbbbbb">
							<td style="width:30%">Realization</td><td class="al-right" style="width:10%"><?php echo $year?></td><td class="al-right" style="width:10%"><?php echo $year-1?></td>
						</tr>
						<tr class="pp_tit">
							<td>Volume</td><td class="al-right"><?php echo round($rlz[$prd_name]/$target_vol*100,0)?>%</td><td class="al-right"><?php echo round($rlzly[$prd_name]/$target_vol_ly*100,0)?>%</td>
						</tr>
						<tr>
							<td>Ann.</td><td class="al-right"><?php echo number_format($rlz[$prd_name],1,'.',',')?></td><td class="al-right"><?php echo number_format($rlzly[$prd_name],1,'.',',')?></td>
						</tr>
						<tr>
							<td>Target</td><td class="al-right"><?php echo number_format($target_vol,1,'.',',')?></td><td class="al-right"><?php echo number_format($target_vol_ly,1,'.',',')?></td>
						</tr>
						<tr class="pp_tit" style="border-top:1px solid #ebebeb">
							<td>Income</td><td class="al-right"><?php echo round($rlz[$prd_name_inc]/$target_inc*100,0)?>%</td><td class="al-right"><?php echo round($rlzly[$prd_name_inc]/$target_inc_ly*100,0)?>%</td>
						</tr>
						<tr>
							<td>Ann.</td><td class="al-right"><?php echo number_format($rlz[$prd_name_inc],1,'.',',')?></td><td class="al-right"><?php echo number_format($rlzly[$prd_name_inc],1,'.',',')?></td>
						</tr>
						<tr>
							<td>Target</td><td class="al-right"><?php echo number_format($target_inc,1,'.',',')?></td><td class="al-right"><?php echo number_format($target_inc_ly,1,'.',',')?></td>
						</tr>
						<tr class="pp_tit" style="border-top:1px solid #ebebeb">
							<td>Margin</td><td class="al-right"><?php echo round($rlz[$prd_name_inc]/$rlz[$prd_name]*100,0)?>%</td><td class="al-right"><?php echo round($rlzly[$prd_name_inc]/$rlzly[$prd_name]*100,0)?>%</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div style="width:50%; float:left; padding:0 5px 0 5px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Share of Wallet Volume</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="chartdivsw"></div>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="width:50%; float:left; padding:0 5px 0 0px" id="volume_tren">
		<div class="panel panel-wsa">
			<div class="panel-heading">Volume Trend Line<div class="pull-right"><button onclick="full_size('volume_tren','chartdiv','volume_icon')" class="btn btn-xs btn-wsa"><span class="glyphicon glyphicon-resize-full" id="volume_icon"></span></div></div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="chartdiv"></div>
			</div>
		</div>
	</div>
	
	<div style="width:50%; float:left; padding:0 5px 0 5px" id="income_tren">
		<div class="panel panel-wsa">
			<div class="panel-heading">Income Trend Line<div class="pull-right"><button onclick="full_size('income_tren','chartdiv-inc','income_icon')" class="btn btn-xs btn-wsa"><span class="glyphicon glyphicon-resize-full" id="income_icon"></span></div></div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="chartdiv-inc"></div>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
</div>

<script>
	var chart3 = AmCharts.makeChart("chartdivsw", {
	"type": "serial",
	"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
	"categoryField": "year",
	"rotate": true,
	"legend": {
        "useGraphSettings": true,
        "markerSize":10,
        "valueWidth":0,
        "verticalGap":0
    },
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left"
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "Wallet:[[value]]",
			"fillAlphas": 0.8,
			lineColor: "#eda32b",
			labelText: "[[value]]",
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "Wallet",
			"type": "column",
			"valueField": "Wallet",
			
		},
		{
			"balloonText": "Realization:[[value]]",
			"fillAlphas": 0.8,
			lineColor: "#786c56",
			labelText: "[[value]]",
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Realization ann.",
			"type": "column",
			"valueField": "Realization"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "top",
			"axisAlpha": 0
		}
	],
	"allLabels": [],
	"amExport": {
		"right": 20,
		"top": 20
	},
	"balloon": {},
	"titles": [],
	"dataProvider": [
		
		{
			"year": <?php echo $year-1?> +"<br>(SoW : "+<?php echo round($rlzly[$prd_name]/$wltly->$prd_name*100,1)?>+" %)",
			"Wallet": <?php echo round($wltly->$prd_name,1);?>,
			"Realization": <?php echo round($rlzly[$prd_name],1);?>
		},
		{
			"year": <?php echo $year?> +"<br>(SoW : "+<?php echo round($rlz[$prd_name]/$wlt->$prd_name*100,1)?>+" %)",
			"Wallet": <?php echo round($wlt->$prd_name,1);?>,
			"Realization": <?php echo round($rlz[$prd_name],1);?>
		}
	]
});
</script>

<script>
	$(document).ready(function() {
		make_volume();
		make_income();
	});
	
	function full_size(div1,div2,div3,kind) {
		if($("#"+div3).hasClass( "glyphicon-resize-full" )){
			$("#"+div1).animate({
				width: "100%",
			}, 300, function() {
			$("#"+div2).animate({
				width: "100%",
			}, 300);
			make_graph(div1);
			});
			$("#"+div3).removeClass("glyphicon-resize-full");
			$("#"+div3).addClass("glyphicon-resize-small");
		}else{
			$("#"+div1).animate({
				width: "50%",
			}, 300, function() {
			$("#"+div2).animate({
				width: "100%",
			}, 300);
			make_graph(div1);
			});
			$("#"+div3).addClass("glyphicon-resize-full");
			$("#"+div3).removeClass("glyphicon-resize-small");
		}
	}
	function make_graph(div){
		if(div == "volume_tren" ){
			make_volume();
		}
		else{
			make_income();
		}
	}
</script>