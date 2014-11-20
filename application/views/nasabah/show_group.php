<div id="" class="container no_pad">
	<table class="table">
		<thead>
			<tr>
				<th>No</th><th>Group</th><th>Sector</th><th>GAS</th><th>RM</th><th>BUC New</th><th>RM</th>
			</tr>
		</thead>
			<tbody>
				<?php $i=1; foreach($nas as $comp){?>
					<tr>
						<td><?php echo $i?></td>
						<td><?php echo $comp['group']?></td>
						<td><?php foreach($comp['sector'] as $sector){echo $sector->sector.", ";}?></td>
						<td><?php foreach($comp['gas'] as $sector){echo $sector->gas.", ";}?></td>
						<td><?php foreach($comp['rm'] as $sector){echo $sector->rm.", ";}?></td>
					</tr>
				<?php $i++; }?>
			</tbody>
	</table>

</div>