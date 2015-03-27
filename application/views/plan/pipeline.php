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
<div class="content">
	<h2 style="margin-bottom:0px;">TAMBANG BUKIT ASAM GROUP</h2>
	<span style="font-size:18px; color:#bbb">Action Plan</span>
	<hr>
	<div style="width:50%; float:left; padding:0 5px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Transaction Banking Pipeline</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<h4>CASA</h4>
				<div>
					<table class="table">
						
						<tr>
							<td>
								<div style="font-size:16px;"><b>
									Surya Inti Sarana
									<span class="pull-right">e-Tax</span></b>
								</div>
								<div style="font-size:13px">
									<div style="width:50%; float:left; margin-left:15px">
										<div>Open : 2 Feb 14</div>
										<div>Exp. Close : 2 Feb 14</div>
										<div>Won : 2 Feb 14</div>
										<div>Closed : 2 Feb 14</div>
										<div>Deal : 2 Feb 14</div>
									</div>
									<div class="pull-right">
										<div class="pull-right">Cycle 8 - Implementation Done</div><br>
										<div class="pull-right">Simple Deal</div><br><hr>
										<div class="pull-right">
											Est. add Avg Bal : 2.000
										</div><br>
										<div class="pull-right">
											Est. add FBI : 2.000
										</div>
									</div>
								</div><div style="clear:both"></div>
								<div style="border-top:1px #ddd dashed; margin-top:10px; padding-top:10px; display:none">
									<div>
										<span class="small-help">Comment</span><br>
										<p>Presentasi telah dilakukan</p>
									</div>
									<div>
										<span class="small-help">Next Action</span><br>
										<p>Monitor Transaksi</p>
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<div style="width:50%; float:left; padding:0 5px 0 5px">
		<div class="panel panel-wsa">
			<div class="panel-heading">Anchor Client Strategy</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<h4>CASA</h4>
				<hr>
				<div>
					<span class="small-help">Strategy</span>
					<p>"Strategynya apa"</p>
				</div>
				<div>
					<span class="small-help">Action Plan</span>
					<p>"Strategynya apa"</p>
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
							distance: -30,
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
					data: [
						['Loans',   10],
						{name: 'Loan Fee', y: 300, color:"grey"},
						['Trx+CASA',      300],
						['Trade',      300],
						['Others',      300],
					]
				}]
			});
		});
	
	});
</script>