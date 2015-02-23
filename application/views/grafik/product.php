<?php
	$bagi = get_produk_pow($this->uri->segment(5));
	if($this->uri->segment(6)=="income"){$bagi = 9;}
?>
<script type="text/javascript">
	$(function () {
        $('#container4').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: 'Pertumbuhan <?php echo $this->uri->segment(6)?> <?php echo $product_name?> <?php $date = date("Y"); echo $date-1?> & <?php echo $date?>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: '2014',
                data: [<?php 
                			$mth_bfr = 0; $growth_ty = array(); $sum_gw_ty = 0;
                			for($i=1;$i<=$last_month_data;$i++){
                				$pengali = 1; 
                				if($this->uri->segment(7)=="ann" && not_avg_bal($this->uri->segment(5))){
                					$pengali = 12/$i;
                				} 
                				$mth_ty = 'mth_'.$i;
                				$ths_mth = $this_year->$mth_ty/pow(10,$bagi)*$pengali;
                				if($mth_bfr && $ths_mth){
                					$growth_ty[$i] = ($ths_mth/$mth_bfr)-1;
                					$sum_gw_ty = $sum_gw_ty+$growth_ty[$i];
                				}else{
                					$growth_ty[$i] = 1;
                					$sum_gw_ty = $sum_gw_ty+$growth_ty[$i];
                				}
                				$mth_bfr = $ths_mth;
                				echo round($ths_mth,1).', ';
                			}
                		?>],
            }, {
            	name: '2013',
                data: [<?php 
                			$mth_bfr = 0; $growth_ly = array(); $sum_gw_ly = 0;
                			for($i=1;$i<=12;$i++){
                				$pengali = 1; 
                				if($this->uri->segment(7)=="ann"  && not_avg_bal($this->uri->segment(5))){
                					$pengali = 12/$i;
                				}
                				$mth_ly = 'mth_'.$i;
                				$ths_mth = $ly_year->$mth_ly/pow(10,$bagi)*$pengali;
                				if($mth_bfr && $ths_mth){
                					$growth_ly[$i] = ($ths_mth/$mth_bfr)-1;
                					$sum_gw_ly = $sum_gw_ly+$growth_ly[$i];
                				}else{
                					$growth_ly[$i] = 1;
                					$sum_gw_ly = $sum_gw_ly+$growth_ly[$i];
                				}
                				$mth_bfr = $ths_mth;
                				echo round($ths_mth,1).', ';
                				}
                			?>],
            }<?php if($this->uri->segment(7)=="ann"){?>,{
            	name: 'Target 2014',
                data: [<?php for($i=1;$i<=12;$i++){echo round($target,1).', ';}?>],
                color: 'red'
            }<?php }?>]
        });
    });
</script>

<div id="" class="container no_pad">
	<?php echo $header?>
	<div>
		<div>
			<div style="margin-bottom: 20px; float:left;">
					<form method="post" action="<?php echo base_url()?>tren/refresh_product/<?php echo $level?>/<?php echo $id?>">
					<label style="margin-right:38px;">Produk:</label> 
					<select name="product">
						<?php foreach($arr_prod as $prod){?>
						<option value="<?php echo $prod['id']?>" <?php if($this->uri->segment(5)==$prod['id']){echo "selected";}?>><?php echo $prod['name']?></option>
						<?php }?>
					</select><br>
					<label style="margin-right:55px;">Data:</label> 
					<select name="kind">
						<option value="volume" <?php if($this->uri->segment(6)=="volume"){echo "selected";}?>>Volume</option>
						<option value="income" <?php if($this->uri->segment(6)=="income"){echo "selected";}?>>Income</option>
					</select><br>
					<label style="margin-right:20px;">Annualize:</label> 
					<select name="ann">
						<option value="ann" <?php if($this->uri->segment(7)=="ann"){echo "selected";}?>>Yes</option>
						<option value="" <?php if($this->uri->segment(7)==""){echo "selected";}?>>No</option>
					</select><hr>
					<button type="submit" class="btn btn-default btn-md">Cari</button>
					</form>
			</div>
			<div style="float: right">
				<h4>Avg Growth 2014 : 
					<?php echo round(($sum_gw_ty*100)/$last_month_data,2);?>%
				</h4><!--asdasd-->
				<h4>Avg Growth 2013 : 
					<?php echo round(($sum_gw_ly*100)/12,2);?>%
				</h4>
				<?php if($this->uri->segment(7)=="ann"){?>
				<hr>
				<h4>Realisasi : 
					<?php 
						$ty = $this_year->$mth_ty/pow(10,$bagi)*$pengali;
						$growth = (($ty/$target))*100;
						echo round($growth,2);
					?>%</h4>
				<h4>Growth : 
					<?php 
						$ty = $this_year->$mth_ty/pow(10,$bagi)*$pengali;
						$ly = $ly_year->$mth_ly/pow(10,$bagi)*$pengali;
						$growth = (($ty/$ly)-1)*100;
						echo round($growth,2);
					?>%</h4>
				<?php }?>
			</div><div style="clear:both"></div>
		</div>
		<div id="container4" style="min-width: 310px; height: 380px; margin: 0 auto"></div>
	</div>
</div>