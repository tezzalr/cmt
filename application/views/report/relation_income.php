<?php 
	$year = 2014;
	$rl_inc['inc']['ws'] = 0.75*$rl_inc['inc']['ws'];
	$rl_inc['inc_ly']['ws'] = 0.75*$rl_inc['inc_ly']['ws'];
	$rl_inc['inc']['tot'] = $rl_inc['inc']['ws']+$rl_inc['inc']['al'];
	$rl_inc['inc_ly']['tot'] = $rl_inc['inc_ly']['ws']+$rl_inc['inc_ly']['al'];
?>
<script type="text/javascript">
	$(function () {
        $('#container_potensi').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Potensi Relationship Income (Rp Miliar)'
            },
            xAxis: {
                categories: [<?php echo ($year-1).", 'YTD Ann. ".$year."'"?>]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Billions'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y:.0f}%</b><br/>',
                shared: false,
                enabled: false
                
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
                series: [
            {
                name: 'Wallet Size',
            	data: [<?php echo round($rl_inc['inc_wal_ly']['tot'],0).",".round($rl_inc['inc_wal']['tot'],1);?>],
            	color: 'blue'
            },{
                name: 'Actual',
            	data: [<?php echo round($rl_inc['inc_ly']['tot'],0).",".round($rl_inc['inc']['tot'],1);?>],
            	color: 'red'
            }]
        });
    });
</script>

<script type="text/javascript">
	$(function () {
		var chart;
	
		$(document).ready(function () {
		
			// Build the chart
			$('#container_ly').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: 'Komposisi Income 2013'
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
							format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %',
						},
						showInLegend: false
					}
				},
				series: [{
					type: 'pie',
					name: 'Income share',
					data: [
						['Alliance',   <?php echo $rl_inc['inc_ly']['al']?>],
						['Wholesale',   <?php echo $rl_inc['inc_ly']['ws']?>]
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
			$('#container_ty').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: 'Komposisi Income 2014 (Ann.)'
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
							format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %',
						},
						showInLegend: false
					}
				},
				series: [{
					type: 'pie',
					name: 'Income share',
					data: [
						['Alliance',   <?php echo $rl_inc['inc']['al']?>],
						['Wholesale',   <?php echo $rl_inc['inc']['ws']?>]
					]
				}]
			});
		});
	
	});
</script>

<div id="" class="container no_pad">
	<?php echo $header?>
	<div>
		<a href="<?php echo base_url()?>report/wholesale_income/<?php echo $info_page['type'];?>/<?php echo $info_page['id'];?>"><span style="float:right">Komposisi Income --></span></a>
		<h2>Relationship Income</h2>
		<h4 style="color:grey;">Relationship Income <?php echo ($year-1)?> Rp <?php echo number_format($rl_inc['inc_ly']['tot'],0)?> T. Share of Wallet BMRI <?php echo number_format($rl_inc['inc_ly']['tot']/$rl_inc['inc_wal_ly']['tot']*100,0)?>%, 
		2014 Rp <?php echo number_format($rl_inc['inc']['tot'],0)?> T. Share of Wallet BMRI <?php echo number_format($rl_inc['inc']['tot']/$rl_inc['inc_wal']['tot']*100,0)?>%
		</h4><br><br>
		
		<div id="container_potensi" style="width: 510px; height: 300px; margin: 0 auto"></div><hr>
		<div>
			<div id="container_ly" style="min-width: 310px; width: 30%; height: 300px; margin: 0; float:left;"></div>
			<div id="" style="width: 40%; height: 170px; margin: 0 auto; padding:10px; float:left; margin-top:100px;">
				<span style="float:right; font-size:11px;">(Rp Miliar)</span>
				<table class="table table-bordered">
					<tr class="headertab"><th></th><th><center>2013</th><th><center>2014 (Ann.)</th></tr>
					<tr><td>Wholesale</td><td><center><?php echo number_format($rl_inc['inc_ly']['ws'],0)?></td><td><center><?php echo number_format($rl_inc['inc']['ws'],0)?></td></tr>
					<tr><td>Alliance</td><td><center><?php echo number_format($rl_inc['inc_ly']['al'],0)?></td><td><center><?php echo number_format($rl_inc['inc']['al'],0)?></td></tr>
					<tr><td>All cross-sell*</td><td><center><?php echo number_format($rl_inc['inc_ly']['al']/$rl_inc['inc_ly']['ws']*100,0)?>%</center></td><td><center><?php echo number_format($rl_inc['inc']['al']/$rl_inc['inc']['ws']*100,0)?> %</td></tr>
					
				</table>
			</div>
			<div id="container_ty" style="min-width: 310px; width: 30%; height: 300px; margin: 0; float:left;"></div>
		</div><div style="clear:both"></div>
		<br>
	</div>
</div>