<?php
	$prd_name = $this->uri->segment(5)."_vol";
	$nii_arr = array("CASA","TD","IL","WCL","TR","SL");
	if(in_array($this->uri->segment(5),$nii_arr)){$inc_name = $this->uri->segment(5)."_nii";}
	else{$inc_name = $this->uri->segment(5)."_fbi";}
	
	usort($comps, function($a, $b) {
		$prd_name = $this->uri->segment(5)."_vol";
		return (($b->$prd_name > $a->$prd_name));
	});
	$cur = return_cur($this->uri->segment(5));
?>
<div style="width:70%; float:left; padding:0 5px 0 0px" id="volume_tren">
	<div class="panel panel-wsa">
		<div class="panel-heading">Child Company</div>
		<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
			<table class="table table-striped" style="font-size:13px">
				<tr>
					<th></th>
					<th style="width:40%">Company</th>
					<th class="align-right">Volume</th>
					<th class="align-right">%</th>
					<th class="align-right">Income</th>
					<th class="align-right">%</th>
				</tr>
				<?php $i=1; $kc=0; $tot=0; foreach($comps as $comp){?>
					<?php if($comp->$prd_name){
						if($kc<80){$color="#08c";}
						else{$color="#ababab";}
					?>
					<tr>
						<td><?php echo $i?></td>
						<td style="color:<?php echo $color?>"><?php echo $comp->comp_name?></td>
						<td class="align-right"><?php echo $cur['cur']." ".number_format($comp->$prd_name,0,'.',',')?></td>
						<td class="align-right"><?php echo number_format($comp->$prd_name/$real->$prd_name*100,0,'.',',')?> %</td>
						<td class="align-right"><?php echo $cur['cur']." ".number_format($comp->$inc_name,0,'.',',')?></td>
						<td class="align-right"><?php echo number_format($comp->$inc_name/$real->$inc_name*100,0,'.',',')?> %</td>
					</tr>
					<?php $i++; $kc=$kc+($comp->$prd_name/$real->$prd_name*100); $tot=$tot+$comp->$prd_name;}?>
				<?php }?>
			</table>
		</div>
	</div>
</div>