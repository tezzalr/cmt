<div>
	<?php foreach($updates as $update){?>	
		<div class="panel panel-wsa" style="margin-right:15px">
			<div class="panel-heading">
				<span>
					<button class="btn btn-warning  btn-xs" onclick="edit_plan(<?php echo $update->id?>,'<?php echo $plan->anchor_id?>','<?php echo $plan->product?>')"><span class="glyphicon glyphicon-pencil"></span></button>
					<button class="btn btn-danger btn-xs" onclick="delete_plan(<?php echo $update->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
				</span>
				<div class="pull-right" style="font-size:12px; color:grey">Updated : <?php 
						$date = date("Y-m-d", strtotime($update->created));
					if($date != "-0001-11-30"){echo date("d M Y", strtotime($update->created));}?>
				</div><div style="clear:both"></div>
			</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div style="padding-left:10px;">
					<div>
						<span style="color:grey; font-size:12px;">Progress : </span>
						<p><?php echo $update->progress?></p>
					</div>
					<div>
						<span style="color:grey; font-size:12px;">Issue :</span>
						<p><?php echo $update->issue?></p>
					</div>
					<div>
						<span style="color:grey; font-size:12px;">Next Step / Support Needed :</span>
						<p><?php echo $update->support?></p>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
</div>