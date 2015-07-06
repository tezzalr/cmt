<div>
	<?php if($updates){ foreach($updates as $update){?>	
		<div class="panel panel-wsa" style="margin-right:15px" id="update_<?php echo $update->id?>">
			<div class="panel-heading">
				<div style="float:left; color:black">
					<div style="font-size:20px">"Activity"</div>
					<div style="font-size:10px">Start date - End date</div>
				</div>
				<div class="pull-right" style="font-size:12px; color:grey">Updated : <?php 
						$date = date("Y-m-d", strtotime($update->created));
					if($date != "-0001-11-30"){echo date("d M Y", strtotime($update->created));}?><br>
					<span class="pull-right">
						<button class="btn btn-warning  btn-xs" onclick="edit_plan_update(<?php echo $update->id?>,<?php echo $update->plan_id?>);"><span class="glyphicon glyphicon-pencil"></span></button>
						<button class="btn btn-danger btn-xs" onclick="delete_plan_update(<?php echo $update->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
					</span>
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
	<?php }}else{echo "<center><h2 style=\"color:#bababa\">No Activity</h2></center>";}?>
</div>