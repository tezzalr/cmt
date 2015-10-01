<style>
	.job-title{
		color:#b2b2b2;
		font-size:12px;
	}
	hr{
		margin:10px 0 10px 0;
	}
</style>

<?php

	$income_ty = get_ws_income_month($rlz_ws,$month);
	
	$loan_income = $income_ty['loan'];
	$trx_income = $income_ty['trx'];
	//$trd_income = $income_ty['trd'];
	$lnfee_income = $income_ty['lnfee'];
	$otr_income = $income_ty['otr'];
	$tot = $income_ty['tot'];
	$tot_ytd = $income_ty['tot_ytd'];
	
	$income_ly = get_ws_income_month($rlz_ws_ly,$month);
	
	$loan_income_ly = $income_ly['loan'];
	$trx_income_ly = $income_ly['trx'];
	//$trd_income_ly = $income_ly['trd'];
	$lnfee_income_ly = $income_ly['lnfee'];
	$otr_income_ly = $income_ly['otr'];
	$tot_ly = $income_ly['tot'];
	$tot_ytd_ly = $income_ly['tot_ytd'];
	
	//$trx_wallet = $wlt_ws->CASA_nii + $wlt_ws->FX_fbi + $wlt_ws->Trade_fbi + $wlt_ws->BG_fbi + + $wlt_ws->OIR_fbi;
	//$loan_wallet = $wlt_ws->WCL_nii +  $wlt_ws->IL_nii +  $wlt_ws->SL_nii + $wlt_ws->TR_nii;
	
	/*$trx_sow = ($trx_income+$rlz_ws->OIR_fbi - $rlz_ws->PWE_fbi - $rlz_ws->SCF_fbi)/$month*12/$trx_wallet/pow(10,9);
	if($loan_wallet){
	$loan_sow = ($loan_income+$rlz_ws->TR_nii)/$month*12/$loan_wallet/pow(10,9);
	}else{$loan_sow=0;}
	*/
?>

<div class="content">
	<a href="<?php echo base_url().'profile/show/'.$kind.'/'.$anchor_id?>"><h2 style="margin-bottom:0px;"><?php if($anchor){echo $anchor->name;}else{echo $dir['name'];}?></h2></a>
	<span style="font-size:18px; color:#bbb">Wholesale Income Analysis </span>
	<hr>
	<div style="width:60%; float:left; padding:0 5px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Total Wholesale Income</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div style="width:50%; float:left; padding:0 10px 0 10px;">
					<h4><center><?php echo get_month_name($month)." ".($year-1)?></center></h4>
					<div id="container_wsa" style="width: 100%; height:280px;"></div>
					<div>
						<hr>
						<div>
							<div><h5>Loans : <span class="pull-right">Rp <?php echo number_format($loan_income_ly/pow(10,9),1,'.',',')?> M </span></h5></div>
							<div><h5>Trx-CASA : <span class="pull-right">Rp <?php echo number_format($trx_income_ly/pow(10,9),1,'.',',')?> M </span></h5></div>
							
							<div><h5>Loan Fee : <span class="pull-right">Rp <?php echo number_format($lnfee_income_ly/pow(10,9),1,'.',',')?> M </span></h5></div>
							<div><h5>Others : <span class="pull-right">Rp <?php echo number_format($otr_income_ly/pow(10,9),1,'.',',')?> M </span></h5></div>
							<div style="border-top:1px dashed #ddd">
								<h4>
									Total : 
									<span class="pull-right">Rp <?php echo number_format($tot_ly/pow(10,9),2,'.',',')?> M </span>
								</h4>
							</div>
							<!--<div style="border-top:1px dashed #ddd">
								<h4>
									Total YTD : 
									<span class="pull-right">Rp <?php echo number_format($tot_ytd_ly/pow(10,9),2,'.',',')?> M </span>
								</h4>
							</div>-->
						</div>
					</div>
				</div>
				<div style="width:50%; float:left; padding:0 10px 0 10px;">
					<h4><center><?php echo get_month_name($month)." ".$year?></center></h4>
					<div id="container_wsa2" style="width: 100%; height:280px;"></div>
					<div>
						<hr>
						<div>
							<div><h5>Loans : <span class="pull-right">Rp <?php echo number_format($loan_income/pow(10,9),1,'.',',')?> M </span></h5></div>
							<div><h5>Trx-CASA : <span class="pull-right">Rp <?php echo number_format($trx_income/pow(10,9),1,'.',',')?> M </span></h5></div>
							
							<div><h5>Loan Fee : <span class="pull-right">Rp <?php echo number_format($lnfee_income/pow(10,9),1,'.',',')?> M </span></h5></div>
							<div><h5>Others : <span class="pull-right">Rp <?php echo number_format($otr_income/pow(10,9),1,'.',',')?> M </span></h5></div>
							<div style="border-top:1px dashed #ddd">
								<h4>
									Total : 
									<span class="pull-right">Rp <?php echo number_format($tot/pow(10,9),2,'.',',')?> M </span>
								</h4>
							</div>
							<!--<div style="border-top:1px dashed #ddd">
								<h4>
									Total YTD : 
									<span class="pull-right">Rp <?php echo number_format($tot_ytd/pow(10,9),2,'.',',')?> M </span>
								</h4>
							</div>-->
						</div>
					</div>
				</div>
				<div style="clear:both"></div>
				<div style="border-top:1px dashed #ddd">
					<center>
					<?php $gwth =(($tot/$tot_ly)/*($tot_ytd/$tot_ytd_ly)*/-1)*100; if($gwth>=0){$colgwth = "green";}else{$colgwth = "red";}?>
					<h3 style="color:<?php echo $colgwth?>">
						Growth : 
						<?php echo number_format($gwth,2,'.',',')?>%
						
						(Rp <?php echo number_format(($tot-$tot_ly)/pow(10,9),2,'.',',')?> M)
					</h3>
					</center>
				</div>
			</div>
		</div>
	</div>
	<?php if($this->uri->segment(3)!="anchor"){?>
	<div style="width:40%; float:left; padding:0 5px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Top Anchor</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div style="font-size:11px">*dalam Bn rupiah</div>
				<table class="table table-striped" style="font-size:13px">
				<tr>
					<th style="width:40%">Anchor</th>
					<th class="align-right"><?php echo get_month_name($month)." ".($year-1)?></th>
					<th class="align-right"><?php echo get_month_name($month)." ".$year?></th>
					<!--<th class="align-right"><?php echo "Ytd ".$year?></th>-->
					<th class="align-right">Growth</th>
				</tr>
				
				<?php foreach($top_anc as $anc){?>
				<tr>
					<td><?php echo $anc['anc']->name?></td>
					<td class="align-right"><?php echo number_format($anc['tot_inc_ly']['tot']/pow(10,9),1,'.',',')?></td>
					<td class="align-right"><?php echo number_format($anc['tot_inc']['tot']/pow(10,9),1,'.',',')?></td>
					<!--<td class="align-right"><?php echo number_format($anc['tot_inc']['tot_ytd']/pow(10,9),1,'.',',')?></td>-->
					<td class="align-right"><?php echo number_format($anc['growth'],1,'.',',')?>%</td>
				</tr>
				<?php }?>
				</table>
			</div>
		</div>
	</div>
	<?php }?>
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
						{name: 'Loan', y: <?php echo $loan_income_ly?>, color:"#007aff"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income_ly?>, color:"#5ac8fa"},
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
						{name: 'Loan', y: <?php echo $loan_income?>, color:"#007aff"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income?>, color:"#5ac8fa"},
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
						{name: 'Loan', y: <?php echo $loan_income?>, color:"#007aff"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income?>, color:"#5ac8fa"},
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