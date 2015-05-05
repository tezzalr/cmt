<?php echo $sidebar?>

<div class="content">
	<h2 style="margin-bottom:0px;"><?php if($anchor){echo $anchor->name;}else{echo $dir['name'];}?></h2>
	<span style="font-size:18px; color:#bbb">Value Chain </span>
	<hr style="margin:10px 0 10px 0;">
	<div style="width:70%; float:left; padding:0 15px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading">List Value Chain</div>
			<div class="panel-body" style="padding:5px 0px 5px 0px;" id="body-info">
				<table class="table table-striped">
					<thead>
						<tr>
							<th></th><th>Relationship</th><th>Name</th><th>Kanwil</th><th>Omzet</th><th>Sector</th>
						</tr>
					</thead>
					<tbody>
						<?php for($i=1;$i<=132;$i++){?>
						<tr>
							<td><span class="circle circle-inprog circle-lg""></span></td><td>Grosir</td><td>MEGA INDAH</td><td>Kanwil 10</td><td>3,108,250</td><td>FMCG</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div style="width:30%; float:left; padding:0 5px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Detail Info</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div>
					<div style="color:#cacaca; font-size:12px">Name</div>
					<div>MEGA INDAH</div>
					<div style="color:#cacaca; font-size:12px">Address</div>
					<div>Jl. Raya Pekalongan no 48, Purbalingga</div>
					<div style="color:#cacaca; font-size:12px">Contact Person</div>
					<div>Ade Shinta Ramadhani</div>
					<div style="color:#cacaca; font-size:12px">Phone</div>
					<div>+628527364783</div>
				</div>
			</div>
		</div>
		<div class="panel panel-wsa">
			<div class="panel-heading">Filter Setting</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<form class="form-horizontal">
					<div>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox1" value="option1"> <span class="circle circle-inprog circle-lg""></span>
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox2" value="option2"> <span class="circle circle-delay circle-lg""></span>
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" value="option3"> <span class="circle circle-atrisk circle-lg""></span>
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" value="option3"> <span class="circle circle-notyet circle-lg""></span>
						</label>
					</div><hr>
					<div style="float:left; width:50%">
					<?php for($i=1;$i<=5;$i++){?>
						<div class="checkbox">
						  <label>
							<input type="checkbox" value="" checked>
							Kanwil <?php echo $i?>
						  </label>
						</div>
					<?php }?>
					</div>
					<div style="float:left; width:50%">
					<?php for($i=6;$i<=10;$i++){?>
						<div class="checkbox">
						  <label>
							<input type="checkbox" value="" checked>
							Kanwil <?php echo $i?>
						  </label>
						</div>
					<?php }?>
					</div><div style="clear:both"></div>
					<hr>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Omzet : </label>
						<div class="col-sm-7" style="margin-bottom:10px">
							<input type="password" class="form-control" id="inputPassword" placeholder="Omzet">
						</div>s/d
						<div style="clear:both"></div>
						<label for="inputPassword3" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="inputPassword" placeholder="Omzet">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Sort by : </label>
						<div class="col-sm-7">
						  <select class="form-control">
							<option>Relationship</option>
							<option>Name</option>
							<option>Kanwil</option>
							<option>Omzet</option>
							<option>Sector</option>
						</select>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
</div>

<script type="text/javascript">
	$(function () {
		var chart;
	
		$(document).ready(function () {
		
			// Build the chart
			$('#container_wsa').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: true
				},
				legend: {
					enabled: false
				},
				title: {
					text: null
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							distance: 1,
							format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %',
							style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor), fontSize: "9px"
                    }
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: 'Income share',
					innerSize: '30%',
					data: [
						<?php if($loan_income){?>
						{name: 'Loan', y: <?php echo $loan_income_ly?>, color:"#eda32b"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income_ly?>, color:"#f2be13"},
						<?php }if($trd_income){?>
						{name: 'Trade Finance', y: <?php echo $trd_income_ly?>, color:"grey"},
						<?php }if($lnfee_income){?>
						{name: 'Loan Fee', y: <?php echo $lnfee_income_ly?>, color:"#b3b3b3"},
						<?php }if($otr_income){?>
						{name: 'Others', y: <?php echo $otr_income_ly?>, color:"#d1d1d1"},
						<?php }?>
					]
				}]
			});
		});
	
	});
</script>

<script type="text/javascript">
	$(function () {
		var chart;
	
		$(document).ready(function () {
		
			// Build the chart
			$('#container_wsa2').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: true
				},
				legend: {
					enabled: false
				},
				title: {
					text: null
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							distance: 1,
							format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %',
							style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor), fontSize: "9px"
                    }
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: 'Income share',
					innerSize: '30%',
					data: [
						<?php if($loan_income){?>
						{name: 'Loan', y: <?php echo $loan_income?>, color:"#eda32b"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income?>, color:"#f2be13"},
						<?php }if($trd_income){?>
						{name: 'Trade Finance', y: <?php echo $trd_income?>, color:"grey"},
						<?php }if($lnfee_income){?>
						{name: 'Loan Fee', y: <?php echo $lnfee_income?>, color:"#b3b3b3"},
						<?php }if($otr_income){?>
						{name: 'Others', y: <?php echo $otr_income?>, color:"#d1d1d1"},
						<?php }?>
					]
				}]
			});
		});
	
	});
</script>
<script type="text/javascript">
	$(function () {
		var chart;
	
		$(document).ready(function () {
		
			// Build the chart
			$('#container_wsa2').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: true
				},
				legend: {
					enabled: false
				},
				title: {
					text: null
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							distance: 1,
							format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %',
							style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor), fontSize: "9px"
                    }
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: 'Income share',
					innerSize: '30%',
					data: [
						<?php if($loan_income){?>
						{name: 'Loan', y: <?php echo $loan_income?>, color:"#eda32b"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income?>, color:"#f2be13"},
						<?php }if($trd_income){?>
						{name: 'Trade Finance', y: <?php echo $trd_income?>, color:"grey"},
						<?php }if($lnfee_income){?>
						{name: 'Loan Fee', y: <?php echo $lnfee_income?>, color:"#b3b3b3"},
						<?php }if($otr_income){?>
						{name: 'Others', y: <?php echo $otr_income?>, color:"#d1d1d1"},
						<?php }?>
					]
				}]
			});
		});
	
	});
</script>

<script type="text/javascript">
	$(function () {
		var chart;
	
		$(document).ready(function () {
		
			// Build the chart
			$('#container_wsa3').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: true
				},
				legend: {
					enabled: false
				},
				title: {
					text: null
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							distance: 1,
							format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %',
							style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor), fontSize: "9px"
                    }
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: 'Income share',
					innerSize: '30%',
					data: [
						<?php $h=1; foreach($inc_cb as $cb){?>
								
							{name: 'CB <?php echo $h?>', y: <?php echo $cb['tot']?>, color:"#eda32b"},
						<?php $h++; }?>
					]
				}]
			});
		});
	
	});
</script>