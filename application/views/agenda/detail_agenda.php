<div>
	<div style="float:left; width:50%">
		<div><span class="glyphicon glyphicon-home"></span> : <?php echo $agenda['agenda']->location?></div>
		<div><span class="glyphicon glyphicon-calendar"></span> : <?php echo date("d M Y", strtotime($agenda['agenda']->start));?></div>
		<div><span class="glyphicon glyphicon-time"></span> : <?php echo date("h:i", strtotime($agenda['agenda']->start));?></div>
	</div>
	<div style="float:right; width:50%">
		<div style="float:left; width:30px"><span class="glyphicon glyphicon-user"></span> : </div>
		<div style="float:left"><?php foreach($agenda['people'] as $people){echo "<div>".$people->name."</div>";}?></div>
	</div>
	<div style="clear:both"></div>
	<div style="margin-top:20px"><?php echo $agenda['agenda']->description?></div><hr>
	<?php if(($agenda['agenda']->maker_id == $user['id']) || $user['role']=='admin'){?><div style="margin-top:20px; text-align:center">
		<a href="<?php echo base_url()?>agenda/input_agenda/<?php echo $agenda['agenda']->id?>" class="btn btn-warning  btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
		<a href="<?php echo base_url()?>agenda/delete_agenda/<?php echo $agenda['agenda']->id?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
	</div>
	<?php }?>
</div>