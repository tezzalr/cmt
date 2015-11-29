<div style="text-align:center">
	<img style="height:60px" src="<?php echo base_url()?>assets/img/icon/manager - color.png">
	<div style="text-align:left">
		<label>Relation Manager</label>
		<table class="table table-striped">
			<?php if($anchor_id){?>
				<tr>
					<td>Dyah Eti Erawati (Dept. Head)</td><td></td>
				</tr>
				<tr>
					<td>Danu S. Purnomosidhi</td><td></td>
				</tr>
				<tr>
					<td>Melody</td><td></td>
				</tr>
			<?php }else{?>
				<tr>
					<td>Roby Hasman</td><td>7124872</td>
				</tr>
				<tr>
					<td>Monica Y. Octavia</td><td>0811848868</td>
				</tr>
				<tr>
					<td>M. Andi Syafrizal</td><td>081510542117</td>
				</tr>
				<tr>
					<td>Hudzaifil Hazen</td><td>087883040757</td>
				</tr>
			<?php }?>
		</table>
	</div>
	<div style="text-align:left">
		<label>Transaction Banking</label>
		<table class="table table-striped">
			<?php if($anchor_id){?>
			<tr>
				<td>Roy Manulang</td><td></td>
			</tr>
			<tr>
				<td>Intan P</td><td></td>
			</tr>
			<?php }else{?>
			<tr>
				<td>Putra Pratama</td><td>08111362715</td>
			</tr>
			<?php }?>
		</table>
	</div>
	<?php if(!$anchor_id){?>
	<div style="text-align:left">
		<label>Treasury</label>
		<table class="table table-striped">
			<tr>
				<td>Grace Natalia Manurung</td><td>081230980288</td>
			</tr>
		</table>
	</div>
	<?php }?>
	<div style="text-align:left">
		<label>Alliance</label>
		<table class="table table-striped">
			<?php if($anchor_id){?>
			<tr>
				<td>Mandiri Sekuritas</td><td>Dila</td><td></td>
			</tr>
			<tr>
				<td>MMI</td><td>Yenita</td><td></td>
			</tr>	
			<tr>
				<td>IBFI</td><td>Yuda Aditya Arief</td><td></td>
			</tr>
			<?php }else{?>
			<tr>
				<td>Consumer Loan</td><td>Dini/Wuri</td><td></td>
			</tr>
			<tr>
				<td>Consumer Card</td><td>Fanda Famelia</td><td>081908200965</td>
			</tr>	
			<tr>
				<td>Micro Loan</td><td>Sigit Aryo Tejo</td><td>081575004657</td>
			</tr>
			<?php }?>
		</table>
	</div>
</div>