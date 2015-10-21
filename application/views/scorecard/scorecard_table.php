<style>
	.ring_title{
		border-top:3px solid #007aff;
		text-align:center;
	}
</style>
<?php $arrsc = array('platinum','gold','silver');?>
<div id="" class="content" style="background-color:white">
	<div>
		<div style="position:fixed; width:100%; background-color:white; margin-top:-20px; padding-top:25px; margin-left:-10px;">
			<center><h1 style="margin:0; padding:0;">SoW CARD</h1><h3 style="margin:0; padding:0;">
				<a href="<?php echo base_url()?>income/detail/directorate/CB">Wholesale Income</a>
			</h3></center>
			<div style="margin-top:10px; border-bottom:1px solid #f3f3f3; padding-bottom:5px;">
				<div class="ring_title" style="width:32%; float:left; margin-left:5px;"><h4>Ring 3 : Less Important Bank</h4><span style="font-size:14px">SoW < 30% <!--, Trx X-Sell < 0.5, CASA X-Sell < 0.05--></span></div>
				<div class="ring_title" style="width:32%; float:left; margin-left:20px;"><h4>Ring 2 : Important Bank</h4><span style="font-size:14px">SoW 30% - 60% <!--,, Trx X-Sell 0.5 - 1, CASA X-Sell 0.05 - 0.1--></span></div>
				<div class="ring_title" style="width:32%; float:left; margin-left:20px;"><h4>Ring 1 : Most Important Bank</h4><span style="font-size:14px">SoW > 60% <!--,, Trx X-Sell > 1, CASA X-Sell > 0.1--></span></div>
				<div style="clear:both"></div>
			</div>
		</div>
		<div style="padding-top:140px; width:100%;">
			<?php for($a=0;$a<3;$a++){?>
				<div style="margin-bottom:10px">
					<h3><?php echo $arrsc[$a]?></h3>
				
				
					<?php for($s=3;$s>=1;$s--){?>
						<div style="width:32%; float:left; <?php if($s!=3){?>margin-left:20px;<?php }?>">
							<table class="table" style="font-size:14px">
								<tr><th></th><th>gas</th><th>wal</th><th>ytd</th><th>sow</th><th>trx</th><th>casx</th></tr>
							<?php if($scs[$arrsc[$a]][$s]){foreach($scs[$arrsc[$a]][$s] as $sc){?>
								<?php 
									$sow_col = "#656565"; $trx_col = "#656565"; $casx_col = "#656565";
									if(($s==3&&$sc['sow']<0.3)||($s==2&&$sc['sow']<0.6)||($s==1&&$sc['sow']>1)){$sow_col = "red";}else{$sow_col = "#656565";}
									/*if(($s==3&&$sc['trx']<0.5)||($s==2&&$sc['trx']<1)){$trx_col = "red";}else{$trx_col = "#656565";}
									if(($s==3&&$sc['casx']<0.05)||($s==2&&$sc['casx']<0.1)){$casx_col = "red";}else{$casx_col = "#656565";}*/
								?>
								<tr>
									<td><a href="<?php echo base_url()."profile/summary/anchor/".$sc['anchor']->id?>"><?php echo $sc['anchor']->srt_name?></a></td>
									<td><?php echo number_format($sc['anchor']->gas,0)?></td>
									<td><?php echo number_format($sc['wal']['ws'],0)?></td>
									<td><?php echo number_format($sc['inc']['ws'],0)?></td>
									<td style="color:<?php echo $sow_col?>"><?php echo number_format($sc['sow']*100,0)?> %</td>
									<td style="color:<?php echo $trx_col?>"><?php echo number_format($sc['trx'],1)?></td>
									<td style="color:<?php echo $casx_col?>"><?php echo number_format($sc['casx'],1)?></td>
								</tr>
							<?php }}?>
							</table>
						</div>
					<?php }?>
					<div style="clear:both"></div>
				</div>
			<?php }?>
		</div>
	</div>
</div>