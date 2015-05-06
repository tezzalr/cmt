<div>
	<?php foreach($plans as $plan){?>
		<div id="plan_<?php echo $plan->id?>">
			<a href="#" onclick="show_update(<?php echo $plan->id?>)"><h4><?php echo $plan->action?></h4></a>
			<div style="font-size:13px; color:grey;">
				<span style="float:left">PIC: <?php echo $plan->pic?></span>
			
				<span style="float:right">
					<button class="btn btn-warning  btn-xs" onclick="edit_plan(<?php echo $plan->id?>,'<?php echo $plan->anchor_id?>','<?php echo $plan->product?>')"><span class="glyphicon glyphicon-pencil"></span></button>
					<button class="btn btn-danger btn-xs" onclick="delete_plan(<?php echo $plan->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
				</span>
				<span style="float:right; margin-right:10px"><?php echo date("d M Y", strtotime($plan->due_date))?></span>
				<div style="clear:both"></div>
			</div>
			<hr>
		</div>
	<?php }?>
</div>