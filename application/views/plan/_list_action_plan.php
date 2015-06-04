<div>
	<?php foreach($plans as $plan){?>
		<div id="plan_<?php echo $plan->id?>" class="plan_member">
			<div>
				<div style="float:left; width:3%; margin-top:7px;">
					<?php 
						if($plan->status=="Done"){$circ = "completed";}
						elseif($plan->status=="On Progress"){$circ = "inprog";}
						elseif($plan->status=="Has Issued"){$circ = "delay";}
						else{$circ = "notyet";}
					?>
					<span class="circle circle-<?php echo $circ?> circle-lg text-left"></span>
				</div>
				<div style="float:left; width:95%; font-size:16px"><button style="text-align:left; color:black" class="btn-link" style="color:black" onclick="show_update(<?php echo $plan->id?>)"><?php echo $plan->action?></div>
			</div><div style="clear:both"></div>
			<div style="font-size:13px; color:grey; margin-top:10px;">
				<span style="float:left">PIC: <?php echo $plan->pic?></span>
				<span style="float:right; margin-right:0px">Due: <?php echo date("d M Y", strtotime($plan->due_date))?></span>
				<div style="clear:both"></div>
			</div>
			<div class="gear_plan" id="gear_plan_<?php echo $plan->id?>" style="display:none">
				<span style="float:right">
					<button class="btn btn-warning  btn-xs" onclick="edit_plan(<?php echo $plan->id?>,'<?php echo $plan->anchor_id?>','<?php echo $plan->product?>')"><span class="glyphicon glyphicon-pencil"></span></button>
					<button class="btn btn-danger btn-xs" onclick="delete_plan(<?php echo $plan->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
					<button style="margin-right:10px; display:none;" class="btn btn-wsa btn-xs btn-real-uap" id="btn-real-uap-<?php echo $plan->id?>" onclick="edit_plan_update('',<?php echo $plan->id?>);">
						<span class="glyphicon glyphicon-plus"></span> Update
					</button>
				</span><div style="clear:both"></div>
			</div>
			<hr style="margin:10px 0 10px 0">
		</div>
	<?php }?>
</div>