<div id="" class="container no_pad">
	<div class="no_pad" style="border-bottom: 1px solid #ccc; margin-bottom: 20px;">
		<h4 style="margin-bottom:0px;">PERFORMANCE REVIEW</h4>
		<h2 style="margin-top:0px;">CORPORATE BANKING</h2>
		<ul class="nav nav-pills" style="float:right; margin-top:5px;">
			<li><a href="<?php echo base_url()?>report/relation_income/anchor/">Summary</a></li>
			<li><a href="<?php echo base_url()?>product/top_transaksi/CASA">Top Contributor</a></li>
			<li><a href="<?php echo base_url()?>income/show/anchor/">Detail Group</a></li>
		</ul><div style="clear:both"></div>
	</div>
	<div>
		<div>
			<button type="button" class="btn btn-success btn-md">
				<span class="glyphicon glyphicon-signal"></span> Graph
			</button>
			<button type="button" class="btn btn-warning btn-md" onclick="show_table();">
				<span class="glyphicon glyphicon-list"></span> Table
			</button>
		</div>
		<div id="content_realisasi">
			<div id="container_volume" style="min-width: 310px; height: 350px; margin: 0 auto"></div><hr>
		</div>
		<div style="display:none" id="table_view">
			<div style="margin-top:20px;">
				<h3>Income Realization</h3>(Bn IDR)
				<table class="table table-striped">
					<thead><tr><th>Product</th><th  style="text-align:right">Des 2013</th><th  style="text-align:right">Des 2014</th>
					<th  style="text-align:right">YTD 2014</th><th  style="text-align:right">Target 2014</th><th  style="text-align:right">% Target</th></tr></thead>
					<tbody>
						<tr>
							<td>CASA</td>
							<td style="text-align:right">1,300.0</td>
							<td style="text-align:right">1,627.0</td>
							<td style="text-align:right">1,627.0</td>
							<td style="text-align:right">1,500.0</td>
							<td style="text-align:right">120%</td>
						</tr>
						<tr>
							<td>LOAN</td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right">120%</td>
						</tr>
						<tr>
							<td>TRADE</td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right">120%</td>
						</tr>
						<tr>
							<td>FX</td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right">120%</td>
						</tr>
						<tr>
							<td>BG</td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right"></td>
							<td style="text-align:right">120%</td>
						</tr>
					</tbody>
				</table>
				</div>
				<hr>
		</div>
		<div><center>
				<select class="form-control input-lg" style="width:280px">
					<option>CORPORATE BANKING</option>
					<option>CORPORATE BANKING I</option>
					<option>CORPORATE BANKING II</option>
					<option>CORPORATE BANKING III</option>
					<option>CORPORATE BANKING IV</option>	
					<option>CORPORATE BANKING V</option>	
					<option>CORPORATE BANKING VI</option>	
					<option>CORPORATE BANKING VII</option>	
				</select>
			</center></div>
		<div style="clear:both"></div><br>
	</div>
</div>

<script type="text/javascript">
	$(function () {
        $('#container_volume').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Target vs Pencapaian Income'
            },
            xAxis: {
                categories: ["CASA<br>(120%)", "LOAN<br>(70%)", "TRADE<br>(60%)", "FX<br>(95%)", "BG<br>(105%)"]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Percentage %'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y:.0f}%</b><br/>',
                shared: false,
                enabled: false
                
            },
            plotOptions: {
                column: {
                    stacking: true,
                    dataLabels: {
                        enabled: false,
                        format: '<span style="color:white">{this.total:.0f}%</span>'
                    }
                }
            },
                series: [
            {
                name: 'Tercapai',
            	data: [120,0,0,0,105],
            	color: 'green'
            },{
                name: 'Hampir Tercapai',
            	data: [0,0,0,95,0],
            	color: 'yellow'
            },{
                name: 'Belum Tercapai',
            	data: [0,70,60,0,0],
            	color: 'red'
            }]
        });
    });
</script>
<script>
	function show_table(){
		toggle_visibility('table_view');
		toggle_visibility('content_realisasi');
	}
</script>