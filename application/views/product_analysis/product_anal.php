<?php echo $tren_graph?>
<style>
	.pp_tit{
		font-size:20px;
		color:#007aff;
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
		$nii_arr = array("CASA","TD","IL","WCL","TR","SL","WM","PCD","VCCD","VCL","VCLnDF","Micro_Loan","MKM","KPR","Auto","CC");
		if(in_array($this->uri->segment(5),$nii_arr)){$inc_name = $this->uri->segment(5)."_nii";}
		else{$inc_name = $this->uri->segment(5)."_fbi";}
		$target_vol = $tgt_ws->$prd_name;
		$target_vol_ly = $tgt_ws_ly->$prd_name;	
		$target_vol_two_ly = $tgt_ws_two_ly->$prd_name;	
		$target_vol_tri_ly = 0;//$tgt_ws_tri_ly->$prd_name;	
		$target_inc = $tgt_ws->$inc_name;
		$target_inc_ly = $tgt_ws_ly->$inc_name;
		$target_inc_two_ly = $tgt_ws_two_ly->$inc_name;
		$target_inc_tri_ly = 0;//$tgt_ws_tri_ly->$inc_name;
		
		$usd_arr = array("FX","Trade");
		$item_arr = array("EDC","ATM");
		if(in_array($this->uri->segment(5),$usd_arr)){$cur="$"; $sep="Jt"; $lkp="Juta";}
		elseif(in_array($this->uri->segment(5),$item_arr)){$cur=""; $sep=" Mesin"; $lkp=" Mesin";}
		elseif($this->uri->segment(5) == "CC"){$cur=""; $sep=" Kartu"; $lkp=" Kartu";}
		elseif($this->uri->segment(5) == "PCD"){$cur=""; $sep=" Rek"; $lkp=" Rekening";}
		else{$cur="Rp"; $sep="M"; $lkp="Milyar";}
	?>

<div class="content">
	<h2 style="margin-bottom:0px;">PRODUCT ANALYSIS - <?php echo change_real_name($this->uri->segment(5))?></h2>
	<span style="font-size:18px; color:#bbb">
		<a href="<?php echo base_url().'profile/show/'.$kind.'/'.$anchor_id?>"><?php if($anchor){echo $anchor->name; $id_nas=$anchor->id;}else{echo $dir['name']; $id_nas=$dir['code'];}?></a>
	</span>
	<div class="pull-right" style="padding-right:10px;">
		<select class="btn-wsa" name="product" onchange="if (this.value && this.value!='not') window.location.href=this.value">
			<option value="not">-- Wholesale --</option>
			<?php foreach($arr_prod as $prod){?>
			<option value="<?php echo base_url()."product_analysis/show/".$kind."/".$id_nas."/".$prod['id']?>" <?php if($this->uri->segment(5)==$prod['id']){echo "selected";}?>><?php echo $prod['name']?></option>
			<?php }?>
		</select>
		<select class="btn-wsa" name="product" onchange="if (this.value && this.value!='not') window.location.href=this.value">
			<option value="not">-- Alliance --</option>
			<?php foreach($arr_prod_al as $prod_al){?>
			<option value="<?php echo base_url()."product_analysis/show/".$kind."/".$id_nas."/".$prod_al['id']?>" <?php if($this->uri->segment(5)==$prod_al['id']){echo "selected";}?>><?php echo $prod_al['name']?></option>
			<?php }?>
		</select>
	</div>
	<hr>
	<!--<?php echo $japs_form?>-->
	<div>
		<div style="width:25%; float:left; padding:0 5px 0 5px">
			<div class="panel panel-wsa">
				<div class="panel-heading">Growth</div>
				<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
					<?php 
						$delta_vol = $rlz[$prd_name]-$rlzly[$prd_name]; if($delta_vol>0){$col = "green"; $word = "Peningkatan";}else{$col = "red"; $word = "Penurunan";}
					?>
					<p>Secara annualize terdapat <span style="color:<?php echo $col?>"><?php echo $word?> Volume</span> sebesar <span style="color:#007aff"> <?php echo $cur." ".number_format(abs($delta_vol),1,'.',',')." ".$sep?></span> dari <?php echo $year-1?>.<br><br>Growth : <span style="color:#007aff">
					<?php if($rlz[$prd_name]){if($rlzly[$prd_name]){echo number_format((($rlz[$prd_name]/$rlzly[$prd_name])-1)*100,0);}else{echo 100;}}else{echo 0;}?>%</span></p>
					<hr>
					<?php 
						$delta_inc = $rlz[$prd_name_inc]-$rlzly[$prd_name_inc]; if($delta_inc>0){$col = "green"; $word = "Peningkatan";}else{$col = "red"; $word = "Penurunan";}
					?>
					<p>Secara annualize terdapat <span style="color:<?php echo $col?>"><?php echo $word?> Income</span> sebesar <span style="color:#007aff"> <?php echo "Rp ".number_format(abs($delta_inc),1,'.',',')." M"?></span> dari <?php echo $year-1?>.<br><br>Growth : <span style="color:#007aff">
					<?php if($rlz[$prd_name_inc]){if($rlzly[$prd_name_inc]){echo number_format((($rlz[$prd_name_inc]/$rlzly[$prd_name_inc])-1)*100,0);}else{echo 100;}}else{echo 0;}?>%</span></p>
				</div>
			</div>
		</div>
		<div style="width:30%; float:left; padding:0 5px 0 5px">
			<div class="panel panel-wsa">
				<div class="panel-heading">Product Performance</div>
				<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
					<div>
						<table style="width:100%;">
							<tr style="color:#bbbbbb">
								<td style="width:30%">Realization</td><td class="al-right" style="width:10%"><?php echo $year?></td><td class="al-right" style="width:10%"><?php echo $year-1?></td>
								<?php if(isset($rlz_two_ly)){?>
									<td class="al-right" style="width:10%"><?php echo $year-2?></td>
								<?php }?>
								<?php if(isset($rlz_tri_ly)){?>
									<td class="al-right" style="width:10%"><?php echo $year-3?></td>
								<?php }?>
							
							</tr>
							<tr class="pp_tit">
								<td>Volume</td>
								<td class="al-right"><?php if($target_vol){$real_vol_ty = $rlz[$prd_name]/$target_vol*100;}else{$real_vol_ty=100;}echo round($real_vol_ty,0)?>%</td>
								<td class="al-right"><?php if($target_vol_ly){echo round($rlzly[$prd_name]/$target_vol_ly*100,0);}else{echo 100;}?>%</td>
								<?php if(isset($rlz_two_ly)){?>
									<td class="al-right"><?php if($target_vol_two_ly){echo round($rlz_two_ly[$prd_name]/$target_vol_two_ly*100,0);}else{echo 100;}?>%</td>
								<?php }?>
								<?php if(isset($rlz_tri_ly)){?>
									<td class="al-right"><?php if($target_vol_tri_ly){echo round($rlz_tri_ly[$prd_name]/$target_vol_tri_ly*100,0);}else{echo 100;}?>%</td>
								<?php }?>
							</tr>
							<tr>
								<td>Ann.</td>
								<td class="al-right"><?php echo number_format($rlz[$prd_name],1,'.',',')?></td>
								<td class="al-right"><?php echo number_format($rlzly[$prd_name],1,'.',',')?></td>
								<?php if(isset($rlz_two_ly)){?>
									<td class="al-right"><?php echo number_format($rlz_two_ly[$prd_name],1,'.',',')?></td>
								<?php }?>
								<?php if(isset($rlz_tri_ly)){?>
									<td class="al-right"><?php echo number_format($rlz_tri_ly[$prd_name],1,'.',',')?></td>
								<?php }?>
							</tr>
							<tr>
								<td>Target</td>
								<td class="al-right"><?php echo number_format($target_vol,1,'.',',')?></td>
								<td class="al-right"><?php echo number_format($target_vol_ly,1,'.',',')?></td>
								<?php if(isset($rlz_two_ly)){?>
									<td class="al-right"><?php echo number_format($target_vol_two_ly,1,'.',',')?></td>
								<?php }?>
								<?php if(isset($rlz_tri_ly)){?>
									<td class="al-right"><?php echo number_format($target_vol_tri_ly,1,'.',',')?></td>
								<?php }?>
							</tr>
							<tr class="pp_tit" style="border-top:1px solid #ebebeb">
								<td>Income</td>
								<td class="al-right"><?php if($target_inc){$real_inc_ty = $rlz[$prd_name_inc]/$target_inc*100;}else{$real_inc_ty=100;}echo round($real_inc_ty,0)?>%</td>
								<td class="al-right"><?php if($target_inc_ly){echo round($rlzly[$prd_name_inc]/$target_inc_ly*100,0);}else{echo 100;}?>%</td>
								<?php if(isset($rlz_two_ly)){?>
									<td class="al-right"><?php if($target_inc_two_ly){echo round($rlz_two_ly[$prd_name_inc]/$target_inc_two_ly*100,0);}else{echo 100;}?>%</td>
								<?php }?>
								<?php if(isset($rlz_tri_ly)){?>
									<td class="al-right"><?php if($target_inc_tri_ly){echo round($rlz_tri_ly[$prd_name_inc]/$target_inc_tri_ly*100,0);}else{echo 100;}?>%</td>
								<?php }?>
							</tr>
							<tr>
								<td>Ann.</td>
								<td class="al-right"><?php echo number_format($rlz[$prd_name_inc],1,'.',',')?></td>
								<td class="al-right"><?php echo number_format($rlzly[$prd_name_inc],1,'.',',')?></td>
								<?php if(isset($rlz_two_ly)){?>
									<td class="al-right"><?php echo number_format($rlz_two_ly[$prd_name_inc],1,'.',',')?></td>
								<?php }?>
								<?php if(isset($rlz_tri_ly)){?>
									<td class="al-right"><?php echo number_format($rlz_tri_ly[$prd_name_inc],1,'.',',')?></td>
								<?php }?>
							</tr>
							<tr>
								<td>Target</td>
								<td class="al-right"><?php echo number_format($target_inc,1,'.',',')?></td>
								<td class="al-right"><?php echo number_format($target_inc_ly,1,'.',',')?></td>
								<?php if(isset($rlz_two_ly)){?>
									<td class="al-right"><?php echo number_format($target_inc_two_ly,1,'.',',')?></td>
								<?php }?>
								<?php if(isset($rlz_tri_ly)){?>
									<td class="al-right"><?php echo number_format($target_inc_tri_ly,1,'.',',')?></td>
								<?php }?>
							</tr>
							<tr class="pp_tit" style="border-top:1px solid #ebebeb">
								<td>Margin</td>
								<td class="al-right"><?php if($rlz[$prd_name]){echo number_format($rlz[$prd_name_inc]/$rlz[$prd_name]*100,2,'.',',');}else{echo 0;}?>%</td>
								<td class="al-right"><?php if($rlzly[$prd_name]){echo round($rlzly[$prd_name_inc]/$rlzly[$prd_name]*100,2);}else{echo 0;}?>%</td>
								<?php if(isset($rlz_two_ly)){?>	
									<td class="al-right"><?php if($rlz_two_ly[$prd_name]){echo round($rlz_two_ly[$prd_name_inc]/$rlz_two_ly[$prd_name]*100,2);}else{echo 0;}?>%</td>
								<?php }?>
								<?php if(isset($rlz_tri_ly)){?>
									<td class="al-right"><?php if($rlz_tri_ly[$prd_name]){echo round($rlz_tri_ly[$prd_name_inc]/$rlz_tri_ly[$prd_name]*100,2);}else{echo 0;}?>%</td>
								<?php }?>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div style="width:45%; float:left; padding:0 5px 0 5px">
			<div class="panel panel-wsa">
				<div class="panel-heading">Share of Wallet Volume (<?php echo $lkp." ".$cur?>)</div>
				<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
					<div id="chartdivsw"></div>
				</div>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>
	<div style="float:left; width:70%">
		<div style="width:100%; float:left; padding:0 5px 0 0px" id="volume_tren">
			<div class="panel panel-wsa">
				<div class="panel-heading">Volume Trend Line (<?php echo $lkp." ".$cur?>)<div class="pull-right"><button onclick="full_size('volume_tren','chartdiv','volume_icon')" class="btn btn-xs btn-wsa"><span class="glyphicon glyphicon-resize-small" id="volume_icon"></span></div></div>
				<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
					<div id="chartdiv"></div>
				</div>
			</div>
		</div>
	
		<div style="width:100%; float:left; padding:0 5px 0 5px" id="income_tren">
			<div class="panel panel-wsa">
				<div class="panel-heading">Income Trend Line (Milyar Rp)<div class="pull-right"><button onclick="full_size('income_tren','chartdiv-inc','income_icon')" class="btn btn-xs btn-wsa"><span class="glyphicon glyphicon-resize-small" id="income_icon"></span></div></div>
				<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
					<div id="chartdiv-inc"></div>
				</div>
			</div>
		</div>
	</div>
	<div style="float:left; width:30%">
		<?php if($kind=="anchor"){?>
		<div class="panel panel-wsa">
			<div class="panel-heading">
				<a href="<?php echo base_url()?>plan/summary/anchor/<?php echo $anchor_id?>">Activity Monitoring</a>
				<!--<a href="<?php echo base_url()?>plan/show/anchor/<?php echo $anchor->id."/".$stg['strategy']->product?>"><?php echo $stg['name_prod']?></a>-->
				<div style="font-size:10px; margin-top:5px;">
					<span style="color:#007aff" class="glyphicon glyphicon-signal" aria-hidden="true"></span> : Progress
					<span style="color:#007aff; margin-left:10px" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> : Issues
					<span style="color:#007aff; margin-left:10px" class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> : Next Step & Support Needed
					<!--<span style="color:#007aff; margin-left:10px" class="glyphicon glyphicon-calendar" aria-hidden="true"></span> : Due Date
					<span style="color:#007aff; margin-left:10px" class="glyphicon glyphicon-user" aria-hidden="true"></span> : PIC-->
					
				</div>
			</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<?php if($strategy){?>
					<div>
						<div class="small-title pull-right" style="font-size:11px">Strategy</div>
						<div style="clear:both"></div>
						<center style="font-size:18px;"><p>
							<?php echo $strategy->strategy?>
						</p></center>
					</div><hr style="margin:0 0 10px 0">
					<div>
						<div class="small-title pull-right" style="font-size:11px">Action Plan</div>
						<div style="clear:both"></div>
						<div>
							<center>
								<button type="button" class="btn-link" style="color:#007aff; margin:0px; padding:0px;" onclick="toggle_visibility('prd_<?php echo $strategy->product?>');"><?php echo count($ap)?> Action Plan <span class="caret"></span></button>
							</center>
							<div style="" id="prd_<?php echo $strategy->product?>"><hr style="border-style:dashed; margin:10px 0 10px 0;">
								<?php foreach($ap as $ap){?>
									<div style="margin-bottom:8px">
										<div>
											<div style="float:left; width:5%;">
												<?php 
													if($ap['ap']->status=="Done"){$circ = "completed";}
													elseif($ap['ap']->status=="On Progress"){$circ = "inprog";}
													elseif($ap['ap']->status=="Has Issued"){$circ = "delay";}
													else{$circ = "notyet";}
												?>
												<span class="circle circle-<?php echo $circ?> circle-sm text-left"></span>
											</div>
											<div style="float:left; width:95%">
												<a class="btn-link" style="color:black; margin:0px; padding:0px; text-align:left" href="<?php echo base_url().'plan/show/anchor/'.$anchor->id.'/'.$strategy->product.'/'.$ap['ap']->id?>"><?php echo $ap['ap']->action?></a>
											</div><div style="clear:both"></div>
										</div>
										<div style="margin-top:10px; color:#878787; font-size:13.4px" id="ap_<?php echo $ap['ap']->id?>">
											<?php if($ap['last_update']){?><div style="font-size:11px; color:grey; margin-top:5px" class="pull-right">updated: <?php 
													$date = date("Y-m-d", strtotime($ap['last_update']->created));
													if($date != "-0001-11-30"){echo date("d M Y", strtotime($ap['last_update']->created));}?></div><?php }?><div style="clear:both"></div>
									
											<div>
												<div style="float:left; width:9%"><span style="color:#007aff" class="glyphicon glyphicon-signal" aria-hidden="true"></span></div>
												<div style="float:left; width:91%"><?php if($ap['last_update']){echo $ap['last_update']->progress;}?></div>
												<div style="clear:both"></div>
											</div>
											<div>
												<div style="float:left; width:9%"><span style="color:#007aff" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></div>
												<div style="float:left; width:91%"><?php if($ap['last_update']){echo $ap['last_update']->issue;}?></div>
												<div style="clear:both"></div>
											</div>
											<div>
												<div style="float:left; width:9%"><span style="color:#007aff" class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
												<div style="float:left; width:91%"><?php if($ap['last_update']){echo $ap['last_update']->support;}?></div>
												<div style="clear:both"></div>
											</div>
										</div>
										<hr>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				<?php }else{?><center style="color:#c3c3c3"><h3>No Activity</h3></center><?php }?>
			</div>
		</div>
		<?php }?>
	</div>
	<div style="clear:both"></div>
	<?php if($this->uri->segment(3)!="anchor"){?>
	<div>
		<div class="panel panel-wsa">
			<div class="panel-heading">Top Volume (<?php echo $cur." ".$lkp?>)</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;">
				<table class="table table-striped" style="font-size:16px;">
					<thead><tr>
						<th rowspan=2>No</th><th rowspan=2><center>Nama Anchor</center></th><th><?php echo $year-1?></th><th colspan=3><center><?php echo $year?></center></th>
					</tr><tr>
						<th>Actual</th><th><?php echo get_month_name($month)?></th><th>YTD <?php echo $year?></th><th>Kontribusi (%)</th>
					</tr></thead><tbody>
					<?php 
						$arr_avgbal = array("CASA","TD","WCL","IL","TR");
						$vol = $product."_vol"; $temp_tot=0; $ly = $vol.'_ly'; $ly_tot=0; $sum_cmpny=1; $trgt = $vol."_target"; $trgt_tot=0;
						$bagi=9; if($product == 'FX' || $product == 'Trade'){$bagi=6;}elseif($product == 'OIR'){$bagi=0;}
						$i=1; foreach($top_anchor_vol as $anchor){ if(in_array($product,$arr_avgbal)){$ytd = $anchor->$vol;}else{$ytd = $anchor->$vol/$anchor->month*12;}?>
						<tr>
							<td><?php echo $i?></td>
							<td><a href="<?php echo base_url()?>profile/show/anchor/<?php echo $anchor->anchor_id?>"><?php echo $anchor->name?></a></td>
							<!--<td><?php echo number_format($anchor->$vol/pow(10,$bagi),0,',','.')?></td>
							<td><?php echo number_format($anchor->$vol/$total_prd->$vol*100,1,',','.')?> %</td>-->
							<td><?php echo number_format($anchor->$ly/pow(10,$bagi),0,',','.')?></td>
							
							<td><?php echo number_format($anchor->$vol/pow(10,$bagi),0,',','.')?></td>
							<td><?php echo number_format($ytd/pow(10,$bagi),0,',','.')?></td>
							<td><?php echo number_format($anchor->$vol/$total_prd->$vol*100,1,',','.')?> %</td>
						</tr>
					<?php
							
							$temp_tot = $temp_tot + $anchor->$vol;
							$ly_tot = $ly_tot + $anchor->$ly;
							$trgt_tot = $trgt_tot + $anchor->$trgt;
							$sum_cmpny++;
							if(($temp_tot/$total_prd->$vol) > 0.8  && $sum_cmpny >5){break;}
						$i++; }?>
					 <tr>
						 <td></td>
						 <th><b>Sub-total</b></th>
						 <th><?php echo number_format($ly_tot/pow(10,$bagi),0,',','.')?></th>
						 <th><?php echo number_format($temp_tot/pow(10,$bagi),0,',','.')?></th>
						 <th><?php echo number_format($temp_tot/$anchor->month*12/pow(10,$bagi),0,',','.')?></th>
						 <th><?php echo number_format($temp_tot/$total_prd->$vol*100,0,',','.')?> %</th>
					 </tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-wsa">
					<div class="panel-heading">Top Nominal Growth (<?php echo $cur." ".$lkp?>)</div>
					<div class="panel-body" style="padding:5px 10px 5px 10px;">
						<table class="table table-striped" style="font-size:16px;">
							<thead><tr>
								<th rowspan=2><center>Nama Anchor</center></th><th><?php echo $year-1?></th><th colspan=3><center><?php echo $year?></center></th>
							</tr><tr>
								<th><?php if($asu=='ytd'){echo 'Des';}else{echo get_month_name($month);}?></th><th><?php echo get_month_name($month)?></th><th>YTD <?php echo $year?></th><th>Growth</th>
							</tr></thead><tbody>
							<?php 
								$vol = $product."_vol"; $temp_tot=0; $ly = $vol.'_ly'; $ly_tot=0; $nomgrowtot=0; $trgt_tot=0;
								$bagi=9; if($product == 'FX' || $product == 'Trade'){$bagi=6;}elseif($product == 'OIR'){$bagi=0;}
								foreach($top_anchor_nom_grow as $anchor){ if(in_array($product,$arr_avgbal)){$ytd = $anchor->$vol;}else{$ytd = $anchor->$vol/$anchor->month*12;}?>
								<tr>
									<td><a href="<?php echo base_url()?>profile/show/anchor/<?php echo $anchor->anchor_id?>"><?php echo $anchor->name?></a></td>
									<td><?php echo number_format($anchor->$ly/pow(10,$bagi),0,',','.')?></td>
						
									<td><?php echo number_format($anchor->$vol/pow(10,$bagi),0,',','.')?></td>
									<td><?php echo number_format($ytd/pow(10,$bagi),0,',','.')?></td>
									<td><?php echo number_format($anchor->nom_grow/pow(10,$bagi),0,',','.')?></td>
								</tr>
							<?php
						
									$temp_tot = $temp_tot + $anchor->$vol;
									$ly_tot = $ly_tot + $anchor->$ly;
									$nomgrowtot = $nomgrowtot+$anchor->nom_grow;
								}?>
							<!-- <tr>
								 <td><b>Sub-total</b></td><td><?php echo number_format($ly_tot/pow(10,$bagi),0,',','.')?></td>
					 
								 <td><?php echo number_format($temp_tot/pow(10,$bagi),0,',','.')?></td>
								 <td><?php echo number_format($temp_tot/$anchor->month*12/pow(10,$bagi),0,',','.')?></td>
								 <td><?php echo number_format($nomgrowtot/pow(10,$bagi),0,',','.')?></td>
							 </tr>-->
							 <tr style="background-color:grey"><td></td><td></td><td></td><td></td><td></td></tr>
								<?php 
								$vol = $product."_vol"; $temp_tot=0; $ly = $vol.'_ly'; $ly_tot=0;
								$bagi=9; if($product == 'FX' || $product == 'Trade'){$bagi=6;}elseif($product == 'OIR'){$bagi=0;}
								foreach($top_anchor_nom_grow_min as $anchor){ if(in_array($product,$arr_avgbal)){$ytd = $anchor->$vol;}else{$ytd = $anchor->$vol/$anchor->month*12;}?>
								<tr>
									<td><a href="<?php echo base_url()?>profile/show/anchor/<?php echo $anchor->anchor_id?>"><?php echo $anchor->name?></a></td>
									<td><?php echo number_format($anchor->$ly/pow(10,$bagi),1,',','.')?></td>
									<td><?php echo number_format($anchor->$vol/pow(10,$bagi),1,',','.')?></td>
									<td><?php echo number_format($ytd/pow(10,$bagi),0,',','.')?></td>
									<td><?php echo number_format($anchor->nom_grow/pow(10,$bagi),2,',','.')?></td>
								</tr>
							<?php
						
									$temp_tot = $temp_tot + $anchor->$vol;
									$ly_tot = $ly_tot + $anchor->$ly;
								}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-wsa">
					<div class="panel-heading">Top Growth (%)</div>
					<div class="panel-body" style="padding:5px 10px 5px 10px;">
						<table class="table table-striped" style="font-size:16px;">
							<thead><tr>
								<th rowspan=2><center>Nama Anchor</center></th><th><?php echo $year-1?></th><th colspan=3><center><?php echo $year?></center></th>
							</tr><tr>
								<th><?php if($asu=='ytd'){echo 'Des';}else{echo get_month_name($month);}?></th><th><?php echo get_month_name($month)?></th><th>YTD <?php echo $year?></th><th>Growth</th>
							</tr></thead><tbody>
							<?php 
								$vol = $product."_vol"; $temp_tot=0; $ly = $vol.'_ly'; $ly_tot=0;
								$bagi=9; if($product == 'FX' || $product == 'Trade'){$bagi=6;}elseif($product == 'OIR'){$bagi=0;}
								foreach($top_anchor_grow as $anchor){ if(in_array($product,$arr_avgbal)){$ytd = $anchor->$vol;}else{$ytd = $anchor->$vol/$anchor->month*12;}?>
								<tr>
									<td><a href="<?php echo base_url()?>profile/show/anchor/<?php echo $anchor->anchor_id?>"><?php echo $anchor->name?></a></td>
									<td><?php echo number_format($anchor->$ly/pow(10,$bagi),0,',','.')?></td>
								
									<td><?php echo number_format($anchor->$vol/pow(10,$bagi),1,',','.')?></td>
									<td><?php echo number_format($ytd/pow(10,$bagi),1,',','.')?></td>
									<td><?php echo number_format($anchor->grow*100,0,',','.')?> %</td>
								</tr>
							<?php
						
									$temp_tot = $temp_tot + $anchor->$vol;
									$ly_tot = $ly_tot + $anchor->$ly;
								}?>
								<tr style="background-color:grey"><td></td><td></td><td></td><td></td><td></td></tr>
								<?php 
									$vol = $product."_vol"; $temp_tot=0; $ly = $vol.'_ly'; $ly_tot=0;
									$bagi=9; if($product == 'FX' || $product == 'Trade'){$bagi=6;}elseif($product == 'OIR'){$bagi=0;}
									foreach($top_anchor_grow_min as $anchor){ if(in_array($product,$arr_avgbal)){$ytd = $anchor->$vol;}else{$ytd = $anchor->$vol/$anchor->month*12;}?>
									<tr>
										<td><a href="<?php echo base_url()?>profile/show/anchor/<?php echo $anchor->anchor_id?>"><?php echo $anchor->name?></a></td>
										<td><?php echo number_format($anchor->$ly/pow(10,$bagi),1,',','.')?></td>
									
										<td><?php echo number_format($anchor->$vol/pow(10,$bagi),1,',','.')?></td>
										<td><?php echo number_format($ytd/pow(10,$bagi),1,',','.')?></td>
										<td><?php echo number_format($anchor->grow*100,2,',','.')?> %</td>
									</tr>
								<?php
						
										$temp_tot = $temp_tot + $anchor->$vol;
										$ly_tot = $ly_tot + $anchor->$ly;
									}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php }else{ echo $child_company;}?>
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
			lineColor: "#c3c3c3",
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
			lineColor: "#007aff",
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
		
		<?php if(isset($wlt_tri_ly)){?>{
			"year": <?php echo $year-3?> +"<br>(SoW : "+<?php if($wlt_tri_ly && $wlt_tri_ly->$prd_name){echo round($rlz_tri_ly[$prd_name]/$wlt_tri_ly->$prd_name*100,0);}else{echo 0;}?>+" %)",
			"Wallet": <?php if($wlt_tri_ly && $wlt_tri_ly->$prd_name){echo round($wlt_tri_ly->$prd_name,1);}else{echo 0;}?>,
			"Realization": <?php echo round($rlz_tri_ly[$prd_name],1);?>
		},<?php }?>
		<?php if(isset($wlt_two_ly)){?>{
			"year": <?php echo $year-2?> +"<br>(SoW : "+<?php if($wlt_two_ly->$prd_name){echo round($rlz_two_ly[$prd_name]/$wlt_two_ly->$prd_name*100,0);}else{echo 0;}?>+" %)",
			"Wallet": <?php if($wlt_two_ly->$prd_name){echo round($wlt_two_ly->$prd_name,1);}else{echo 0;}?>,
			"Realization": <?php echo round($rlz_two_ly[$prd_name],1);?>
		},<?php }?>
		{
			"year": <?php echo $year-1?> +"<br>(SoW : "+<?php if($wltly->$prd_name){echo round($rlzly[$prd_name]/$wltly->$prd_name*100,0);}else{echo 0;}?>+" %)",
			"Wallet": <?php if($wltly->$prd_name){echo round($wltly->$prd_name,1);}else{echo 0;}?>,
			"Realization": <?php echo round($rlzly[$prd_name],1);?>
		},
		{
			"year": <?php echo $year?> +"<br>(SoW : "+<?php if($wlt->$prd_name){echo round($rlz[$prd_name]/$wlt->$prd_name*100,0);}else{echo 0;}?>+" %)",
			"Wallet": <?php if($wlt->$prd_name){echo round($wlt->$prd_name,1);}else{echo 0;}?>,
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