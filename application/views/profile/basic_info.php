<style>
	.job-title{
		color:#b2b2b2;
		font-size:12px;
	}
	hr{
		margin:10px 0 10px 0;
	}
	.hide_temp_inc{
		padding-left:15px;
		border-bottom: 1px dotted #cacaca;
		display:none;
	}
</style>
<?php 
	$user = $this->session->userdata('userdb');
	$is_anchor = $this->uri->segment(3); $this_id = $this->uri->segment(4);
?>


<?php

	$income_ty = get_ws_income_month($rlz_ws,$month);
	
	$loan_income = $income_ty['loan'];
	$trx_income = $income_ty['trx'];
	//$trd_income = $income_ty['trd'];
	$lnfee_income = $income_ty['lnfee'];
	$otr_income = $income_ty['otr'];
	$tot = $income_ty['tot'];
	
	$trx_wallet = $wlt_ws->CASA_nii + $wlt_ws->FX_fbi + $wlt_ws->Trade_fbi + $wlt_ws->BG_fbi + + $wlt_ws->OIR_fbi;
	$loan_wallet = $wlt_ws->WCL_nii +  $wlt_ws->IL_nii +  $wlt_ws->SL_nii + $wlt_ws->TR_nii;
	
	if($trx_wallet){$trx_sow = ($trx_income+$rlz_ws->OIR_fbi - $rlz_ws->PWE_fbi - $rlz_ws->SCF_fbi)/$month*12/$trx_wallet/pow(10,9);}
	else{$trx_sow = 0;}
	if($loan_wallet){
	$loan_sow = ($loan_income+$rlz_ws->TR_nii)/$month*12/$loan_wallet/pow(10,9);
	}else{$loan_sow=0;}
	
?>

<div class="content">
	<h2 style="margin-bottom:0px;"><?php if($anchor){echo $anchor->name;}else{echo $dir['name'];}?>
		<?php if($user['role']=='admin'){?>
			<button class="btn btn-link" style="color:#007aff; padding:0;" onclick="edit_sumdesc()"><span class="glyphicon glyphicon-pencil" style="font-size:18px; margin-left:10px;"></span></button>
		<?php }?>
	</h2>
	<div>
		<div id="sumdesc_title"><span style="font-size:18px; color:#bbb"><?php if($summary_desc){echo $summary_desc->sum_desc;}?></span></div>
		<div id="sumdesc_form" style="display:none; margin-top:20px;">
			<form class="form-horizontal" action="<?php echo base_url()."summary_desc/submit_sumdesc";?>" method ="post" role="form">
				<input type="hidden" name="id_sumdesc" value="<?php if($summary_desc){echo $summary_desc->id;}?>">
				<input type="hidden" name="for_what" value="basic_info">
				<input type="hidden" name="comp_id" value="<?php echo $this_id?>">
				<input type="hidden" name="kind" value="<?php echo $is_anchor?>">
				<textarea class="form-control" style="width:99%; height:120px; margin-bottom:10px;" name="sum_desc"><?php if($summary_desc){echo $summary_desc->sum_desc;}?></textarea>
				<button type="submit" class="btn btn-wsa inverse">Submit</button>
			</form>
		</div>
	</div>
	<hr>
	<div style="width:30%; float:left; padding:0 5px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading"><a href="<?php echo base_url().'income/detail/'.$is_anchor.'/'.$this_id?>">Total Wholesale Income</a></div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="container_wsa" style="width: 100%; height:280px;"></div>
				<div>
					<hr>
					<div>
						<div><h5>Loans : <span class="pull-right">Rp <?php echo number_format($loan_income/pow(10,9),0,'.',',')?> M </span></h5></div>
						<div class="hide_temp_inc">
							<?php if($ty['CASA_inc']){?><div><h5>WCL : <span class="pull-right">Rp <?php echo number_format($ty['WCL_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['CASA_inc']){?><div><h5>IL : <span class="pull-right">Rp <?php echo number_format($ty['IL_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['CASA_inc']){?><div><h5>SL : <span class="pull-right">Rp <?php echo number_format($ty['SL_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['CASA_inc']){?><div><h5>TR : <span class="pull-right">Rp <?php echo number_format($ty['TR_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
						</div>
						
						<div><h5>Trx-CASA : <span class="pull-right">Rp <?php echo number_format($trx_income/pow(10,9),0,'.',',')?> M </span></h5></div>
						<div class="hide_temp_inc">
							<?php if($ty['CASA_inc']){?><div><h5>CASA : <span class="pull-right">Rp <?php echo number_format($ty['CASA_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['FX_inc']){?><div><h5>FX : <span class="pull-right">Rp <?php echo number_format($ty['FX_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['Trade_inc']){?><div><h5>Trade : <span class="pull-right">Rp <?php echo number_format($ty['Trade_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['BG_inc']){?><div><h5>BG : <span class="pull-right">Rp <?php echo number_format($ty['BG_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['SCF_inc']){?><div><h5>SCF : <span class="pull-right">Rp <?php echo number_format($ty['SCF_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['PWE_inc']){?><div><h5>PWE : <span class="pull-right">Rp <?php echo number_format($ty['PWE_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['OIR_inc']){?><div><h5>OIR : <span class="pull-right">Rp <?php echo number_format($ty['OIR_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
						</div>
						<!--<div><h5>Trade Finance : <span class="pull-right">Rp <?php echo number_format($trd_income/pow(10,9),0,'.',',')?> M </span></h5></div>-->
						<div><h5>Loan Fee : <span class="pull-right">Rp <?php echo number_format($lnfee_income/pow(10,9),0,'.',',')?> M </span></h5></div>
						<div><h5>Others : <span class="pull-right">Rp <?php echo number_format($otr_income/pow(10,9),0,'.',',')?> M </span></h5></div>
						<div class="hide_temp_inc" style="border-bottom:0px">
							<?php if($ty['TD_inc']){?><div><h5>TD : <span class="pull-right">Rp <?php echo number_format($ty['TD_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['OW_nii_inc']){?><div><h5>Other Nii : <span class="pull-right">Rp <?php echo number_format($ty['OW_nii_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
							<?php if($ty['OW_fbi_inc']){?><div><h5>Other Fbi : <span class="pull-right">Rp <?php echo number_format($ty['OW_fbi_inc']/pow(10,9),0,'.',',')?> M </span></h5></div><?php }?>
						</div>
						<div style="border-top:1px dashed #ddd">
							<h4>
								<button class="btn-link" style="color:black; padding:0px" onclick="$('.hide_temp_inc').animate({'height':'toggle','opacity':'toggle'});">Total <span class="caret"></span></button>
								<span class="pull-right">Rp <?php echo number_format($tot/pow(10,9),0,'.',',')?> M </span>
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
						<th>Product</th><th class="align-right"><?php echo $year-1?></th>
						<!--<th class="align-right"><?php echo $year?></th>-->
						<th class="align-right"><?php echo $year?></th><th class="align-right">Target</th><th class="align-right">%Rlztn</th><th class="align-right">Growth</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($arr_prod as $prod){ $prod_name = $prod['initial']."_vol";?>
						<tr>
							<?php 
								if($tgt_ws){
									if($ly && $ly[$prod_name] && $ly_ey[$prod_name]){
										$tgt = $tgt_ws->$prod_name*$ly[$prod_name]/$ly_ey[$prod_name];
									}
									else{
										$anl = array('CASA','TD','WCL','IL','TR');
										if(in_array($prod['initial'],$anl)){
											$tgt = $tgt_ws->$prod_name;
										}else{$tgt = $tgt_ws->$prod_name/12*$month;}
									}
								}
								if($ly){$ly_val = $ly[$prod_name];}else{$ly_val=0;}
								
								if($tgt){$pct = $ty[$prod_name]/$tgt/pow(10,9);}else{$pct=1;}
								if($ly&&$ly[$prod_name]){$gwt = ($ty[$prod_name]/$ly[$prod_name])-1;}else{$gwt=1;}
								
								if($pct>=1){$color="green";}elseif($pct<0.95){$color="red";}else{$color="#f0ce5d";}
								if($gwt>0){$color_gwt="green";}else{$color_gwt="red";}
								?>
							<td><a href="<?php echo base_url().'product_analysis/show/'.$is_anchor.'/'.$this_id.'/'.$prod['initial'];?>"><?php echo $prod['initial']?></a></td>
							<td class="align-right"><?php echo number_format($ly_val/pow(10,9),1,'.',',');?></td>
							<td class="align-right"><?php echo number_format($ty[$prod_name]/pow(10,9),1,'.',',');?></td>
							<!--<td class="align-right"><?php echo number_format($ytd[$prod_name],1,'.',',');?></td>-->
							<td class="align-right"><?php echo number_format($tgt,1,'.',',');?></td>
							<td class="align-right" style="color:<?php echo $color;?>"><?php echo number_format($pct*100,0,'.',',')?>%</td>
							<td class="align-right" style="color:<?php echo $color_gwt;?>"><?php echo number_format($gwt*100,0,'.',',')?>%</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel panel-wsa">
			<div class="panel-heading">X-Sell Ratio</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div>
					<h4>
						<?php if($anchor){?><a style="color:black" href="<?php echo base_url()?>report/trans_xsell/anchor/<?php echo $anchor->id?>"><?php }else{?>
						<a style="color:black" href="<?php echo base_url()?>report/trans_xsell/directorate/<?php echo $dir['code']?>"><?php }?>
							Transaction X-Sell <span class="pull-right"><?php if(!$loan_sow && $trx_sow){$trx_sell = 10;}elseif(!$loan_sow&&!$trx_sow){$trx_sell = 0;}else{$trx_sell = $trx_sow/$loan_sow;} echo number_format($trx_sell,1)?></span>
						</a>
					</h4>
					<p style="color:#bbb; font-size:12px">
						Transaction X-Sell menggambarkan perbandingan porsi income dari CASA+TRX(FX, Trade, BG, OIR) dan income LOAN.
						<br>Rumus : SoW Income CASA+TRX / SoW Income LOAN
					</p>
				</div>
				<hr>
				<div>
					<h4>
						CASA X-Sell <span class="pull-right"><?php if($now["IL_vol"]+$now["WCL_vol"]){echo number_format(($now["CASA_vol"]/($now["IL_vol"]+$now["WCL_vol"]))*100,1,'.',',');}else{echo 100;}?>%</span> 
					</h4>
					<p style="color:#bbb; font-size:12px">
						CASA X-Sell adalah perbandingan Realisasi CASA dengan Realisasi Loan.
						<br>Rumus : Realisasi CASA / Realisasi LOAN
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
						<th>Product</th><th class="align-right"><?php echo $year-1?></th>
						<!--<th class="align-right"><?php echo $year?></th>-->
						<th class="align-right"><?php echo $year?></th><th class="align-right">Target</th><th class="align-right">%Rlztn</th><th class="align-right">Growth</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($arr_prod as $prod){ 
							$prd_name_arr = $prod['initial']."_inc";
							$nii_arr = array("CASA","TD","IL","WCL","TR");
							if(in_array($prod['initial'],$nii_arr)){$prd_name = $prod['initial']."_nii";}
							else{$prd_name = $prod['initial']."_fbi";}
							$target = $tgt_ws->$prd_name;				
						?>
						<tr>
							<?php 
								if($tgt_ws){
									if($ly && $ly[$prd_name_arr] && $ly_ey[$prd_name_arr]){
										$tgt = $tgt_ws->$prd_name*$ly[$prd_name_arr]/$ly_ey[$prd_name_arr];
									}
									else{
										$tgt = $tgt_ws->$prd_name/12*$month;
									}
								}
								if($ly){$ly_val_inc = $ly[$prd_name_arr];}else{$ly_val_inc=0;}
								
								if($tgt){$pct = $ty[$prd_name_arr]/$tgt/pow(10,9);}else{$pct=1;}
								if($ly&&$ly[$prd_name_arr]){$gwt = ($ty[$prd_name_arr]/$ly[$prd_name_arr])-1;}else{$gwt=1;}
								
								
								//if($target){$pct = $ytd[$prd_name_arr]/$target;}else{$pct=1;}
								//if($ly[$prd_name_arr]){$gwt = ($ytd[$prd_name_arr]*pow(10,9)/$ly[$prd_name_arr])-1;}else{$gwt=1;}
								if($pct>=1){$color="green";}elseif($pct<0.95){$color="red";}else{$color="#f0ce5d";}
								if($gwt>0){$color_gwt="green";}else{$color_gwt="red";}
							?>
							<td><a href="<?php echo base_url().'product_analysis/show/'.$is_anchor.'/'.$this_id.'/'.$prod['initial'];?>"><?php echo $prod['initial']?></a></td>
							<td class="align-right"><?php echo number_format($ly_val_inc/pow(10,9),1,'.',',');?></td>
							<td class="align-right"><?php echo number_format($ty[$prd_name_arr]/pow(10,9),1,'.',',');?></td>
							<!--<td class="align-right"><?php echo number_format($ytd[$prd_name_arr],1,'.',',');?></td>-->
							<td class="align-right"><?php echo number_format($tgt,1,'.',',');?></td>
							<td class="align-right" style="color:<?php echo $color;?>"><?php echo number_format($pct*100,0,'.',',')?>%</td>
							<td class="align-right" style="color:<?php echo $color_gwt;?>"><?php echo number_format($gwt*100,0,'.',',')?>%</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<!--<div class="panel panel-wsa">
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
			</div>-->
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
						{name: 'Loan', y: <?php echo $loan_income?>, color:"#007aff"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income?>, color:"#5ac8fa"},
						<?php }/*if($trd_income){?>
						{name: 'Trade Finance', y: <?php echo $trd_income?>, color:"grey"},
						<?php }*/if($lnfee_income){?>
						{name: 'Loan Fee', y: <?php echo $lnfee_income?>, color:"#b3b3b3"},
						<?php }if($otr_income){?>
						{name: 'Others', y: <?php echo $otr_income?>, color:"#d1d1d1"},
						<?php }?>
					]
				}]
			});
		});
	
	});
	
	function edit_sumdesc(){
		toggle_visibility('sumdesc_title');
		toggle_visibility('sumdesc_form');
	} 
</script>