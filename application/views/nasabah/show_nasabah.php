<div id="" class="container no_pad">
	<table class="table">
		<thead>
			<tr>
				<th>No</th><th>Company</th><th>Group</th><th>Sector</th><th>GAS</th><th>BUC</th><th>BUC New</th><th>RM</th><th><?php echo $fac?></th>
			</tr>
		</thead>
			<tbody>
				<?php $i=1; foreach($nas as $comp){?>
					<tr>
						<td><?php echo $i?></td>
						<td><?php echo $comp->company?></td>
						<td><?php echo $comp->group?></td>
						<td><?php echo $comp->sector?></td>
						<td><?php echo $comp->gas?></td>
						<td><?php echo $comp->oldbuc?></td>
						<td><?php echo $comp->newbuc?></td>
						<td><?php echo $comp->rm?></td>
						<td><?php echo $comp->$fac?></td>
					</tr>
				<?php $i++; }?>
			</tbody>
	</table>

</div>