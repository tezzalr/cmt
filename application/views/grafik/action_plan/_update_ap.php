<div id="">
	<h4 style="float:left"><?php echo $plan->action?></h4>
	<button style="float:right; margin-right:10px; margin-bottom:15px" class="btn btn-primary btn-xs" onclick="toggle_visibility('form_input_update_plan');">
		<span class="glyphicon glyphicon-plus"></span> Update
	</button><div style="clear:both"></div><hr style="margin:0px">
	<div id="form_update">
		<?php echo $form_update?>
	</div>
</div>
<div id="list_update_data" style="margin-top:20px">
	<?php echo $list_update?>
</div>