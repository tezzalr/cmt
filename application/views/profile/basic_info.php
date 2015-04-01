<style>
	.job-title{
		color:#b2b2b2;
		font-size:12px;
	}
	hr{
		margin:10px 0 10px 0;
	}
</style>
<?php echo $sidebar?>

<?php

	$loan_income = $rlz_ws->WCL_nii +  $rlz_ws->IL_nii +  $rlz_ws->SL_nii;
	$trx_income = $rlz_ws->CASA_nii + $rlz_ws->FX_fbi + $rlz_ws->SCF_fbi + $rlz_ws->Trade_fbi + $rlz_ws->PWE_fbi + $rlz_ws->BG_fbi;
	$trd_income = $rlz_ws->TR_nii+$rlz_ws->OIR_fbi;
	$lnfee_income = $rlz_ws->WCL_fbi +  $rlz_ws->IL_fbi +  $rlz_ws->SL_fbi;
	$otr_income = $rlz_ws->TD_nii +  $rlz_ws->CASA_fbi +  $rlz_ws->OW_fbi;
	$tot = $loan_income+$trx_income+$trd_income+$lnfee_income+$otr_income;
?>

<div class="content">
	<h2 style="margin-bottom:0px;"><?php echo $anchor->name?></h2>
	<span style="font-size:18px; color:#bbb">Summary Info</span>
	<hr>
	<div style="width:30%; float:left; padding:0 5px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Total Relationship Income</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="container_wsa" style="width: 100%; height:280px;"></div>
				<div>
					<hr>
					<div>
						<div><h5>Loans : <span class="pull-right">Rp <?php echo number_format($loan_income/pow(10,9),2,'.',',')?> M </span></h5></div>
						<div><h5>Trx-CASA : <span class="pull-right">Rp <?php echo number_format($trx_income/pow(10,9),2,'.',',')?> M </span></h5></div>
						<div><h5>Trade : <span class="pull-right">Rp <?php echo number_format($trd_income/pow(10,9),2,'.',',')?> M </span></h5></div>
						<div><h5>Loan Fee : <span class="pull-right">Rp <?php echo number_format($lnfee_income/pow(10,9),2,'.',',')?> M </span></h5></div>
						<div><h5>Others : <span class="pull-right">Rp <?php echo number_format($otr_income/pow(10,9),2,'.',',')?> M </span></h5></div>
						<div style="border-top:1px dashed #ddd">
							<h4>
								Total : 
								<span class="pull-right">Rp <?php echo number_format($tot/pow(10,9),1,'.',',')?> M </span>
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div style="width:35%; float:left; padding:0 5px 0 5px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Volume Realization</div>
			<div class="panel-body" style="padding:5px 0px 5px 0px;" id="body-info">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Product</th><th class="align-right">2014</th><th class="align-right">2015 ann</th><th class="align-right">Target</th><th class="align-right">%</th><th class="align-right">Gwt</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td>CASA</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td><td class="align-right">29%</td>
						</tr>
						<tr>
							<td>TD</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td><td class="align-right">29%</td>
						</tr>
						<tr>
							<td>WCL</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td><td class="align-right">29%</td>
						</tr>
						<tr>
							<td>IL</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td><td class="align-right">29%</td>
						</tr>
						<tr>
							<td>FX</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td><td class="align-right">29%</td>
						</tr>
						<tr>
							<td>Trade</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td><td class="align-right">29%</td>
						</tr>
						<tr>
							<td>BG</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td><td class="align-right">29%</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel panel-wsa">
			<div class="panel-heading">X-Sell Ratio</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div>
					<h4>
						Transaction X-Sell <span class="pull-right">1.0</span> 
					</h4>
					<p style="color:#bbb; font-size:12px">
						Transaction X-Sell menggambarkan berapa porsi income yang didapat dari CASA+TRX(FX, Trade, BG) dibandingkan dengan income LOAN.
						<br>Rumus : SoW Income CASA+TRX / SOW LOAN
					</p>
				</div>
				<hr>
				<div>
					<h4>
						CASA X-Sell <span class="pull-right">78%</span> 
					</h4>
					<p style="color:#bbb; font-size:12px">
						CASA X-Sell adalah perbandingan Realisasi CASA dengan Realisasi Loan.
						<br>Rumus : Income Alliance / Income Wholesale
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div style="width:35%; float:left; padding:0 5px 0 5px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Income Realization</div>
			<div class="panel-body" style="padding:5px 0px 5px 0px;" id="body-info">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Product</th><th class="align-right">2014</th><th class="align-right">2015 ann</th><th class="align-right">Target</th><th class="align-right">%</th><th class="align-right">Gwt</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td>CASA</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td>
						</tr>
						<tr>
							<td>TD</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td>
						</tr>
						<tr>
							<td>WCL</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td>
						</tr>
						<tr>
							<td>IL</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td>
						</tr>
						<tr>
							<td>FX</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td>
						</tr>
						<tr>
							<td>Trade</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td>
						</tr>
						<tr>
							<td>BG</td><td class="align-right">736.4</td><td class="align-right">736.4</td><td class="align-right">80.8</td><td class="align-right" style="color:green">319%</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel panel-wsa">
			<div class="panel-heading">Contact List</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div class="job-title">Relationship Manager</div>
				<div>
					Ade Shinta Ramadhani
					<div class="pull-right">082716238123</div>
				</div>
				<div>
					Ade Putri Marina
					<div class="pull-right">0811892823</div>
				</div>
				<hr>
				<div class="job-title">Tresury</div>
				<div>
					Ade Shinta Ramadhani
					<div class="pull-right">082716238123</div>
				</div>
				<hr>
				<div class="job-title">Transaction Banking</div>
				<div>
					Ade Shinta Ramadhani
					<div class="pull-right">082716238123</div>
				</div>
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
					innerSize: '50%',
					data: [
						<?php if($loan_income){?>
						{name: 'Loan', y: <?php echo $loan_income?>, color:"#eda32b"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income?>, color:"#f2be13"},
						<?php }if($trd_income){?>
						{name: 'Trade', y: <?php echo $trd_income?>, color:"grey"},
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