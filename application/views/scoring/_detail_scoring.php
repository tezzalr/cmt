<div>
	<table class="table">
		<thead><tr><th>Parameter</th><th>Bobot</th><th>Score</th><th>Nilai</th></tr></thead>
		<tbody>
			<?php foreach($scoring as $anc){ 
				if($anc->value == 4){$bgcolor="#339966";}
				elseif($anc->value == 3){$bgcolor="#00ff00";}
				elseif($anc->value == 2){$bgcolor="#ffff00";}
				elseif($anc->value == 1){$bgcolor="#ff9900";}
				
				$arr_vd = array('brances','corp_action','sectors','priority_gov');
				$arr_dollar = array('Trade_vol','FX_vol');
				if(in_array($anc->id_comp,$arr_dollar)){$satuan = "Mn USD";}
				elseif($anc->id_comp == "PCD_vol"){$satuan = "accts";}
				elseif(in_array($anc->id_comp,$arr_vd)){$satuan = "";}
				else{$satuan = "Bn IDR";}
			?>
				
				<tr>
					<td><?php echo $anc->desc_comp?></td>
					<td><?php echo $anc->bobot?>%</td>
					<td><div style="height:20px; width:20px; border-radius:2px; background-color:<?php echo $bgcolor?>"></div></td>
					<td><?php echo "<b>".number_format($anc->real_value,0)."</b> ".$satuan?></td>
				</tr>
			<?php }?>
		</tbody>
	</table>
	<div>
		<div>Score</div>
		<div style="float:left; margin-right:15px;">
			<div style="float:left; height:20px; width:20px; border-radius:2px; background-color:#339966; margin-right:3px;"></div> = 4
		</div>
		<div style="float:left; margin-right:15px;">
			<div style="float:left; height:20px; width:20px; border-radius:2px; background-color:#00ff00; margin-right:3px;"></div> = 3
		</div>
		<div style="float:left; margin-right:15px;">
			<div style="float:left; height:20px; width:20px; border-radius:2px; background-color:#ffff00; margin-right:3px;"></div> = 2
		</div>
		<div style="float:left; margin-right:15px;">
			<div style="float:left; height:20px; width:20px; border-radius:2px; background-color:#ff9900; margin-right:3px;"></div> = 1
		</div><div style="clear:both"></div>
	</div>
</div>