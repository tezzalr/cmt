<div>
	<?php foreach($plans as $plan){?>
		<div id="plan_<?php echo $plan->id?>" class="plan_member">
			<div>
				<div style="float:left; width:5%; margin-top:3px;">
					<?php 
						if($plan->status=="Status 1"){$circ = "notyet";}
						elseif($plan->status=="Status 2"){$circ = "inprog";}
						elseif($plan->status=="Status 3"){$circ = "atrisk";}
					?>
					<span class="circle circle-<?php echo $circ?> circle-lg text-left"></span>
				</div>
				<div style="float:left; width:95%; font-size:16px"><a href="#" onclick="show_update(<?php echo $plan->id?>)"><?php echo $plan->action?></a></div>
			</div><div style="clear:both"></div>
			<div style="font-size:13px; color:grey; margin-top:10px;">
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