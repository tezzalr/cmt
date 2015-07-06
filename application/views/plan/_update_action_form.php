<div id="form_input_update_plan" margin-top:20px;">
	<form class="form-horizontal" action="<?php echo base_url();?>plan/submit_update_ap" method ="post" id="formupdateap" role="form">
		<input type="hidden" name="plan" value="<?php echo $plan_id?>">
		<input type="hidden" value="<?php if($plan_update){echo $plan_update->id;}?>" name="id">
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Activity</label>
			<div class="col-sm-10">
			  <textarea class="form-control" style="height:60px" placeholder="Activity" name="progress"><?php if($plan_update){echo $plan_update->activity;}?></textarea>
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Timeline</label>
			<div class="col-sm-10">
			  <input type="text" id="start" class="form-control" style="width:49%; float:left; margin-right:5px" placeholder="Start" name="end" value="<?php if($plan_update){echo $plan_update->start;}?>">
			  <input type="text" id="end" class="form-control" style="width:49%; float:left;" placeholder="End" name="end" value="<?php if($plan_update){echo $plan_update->end;}?>">
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Status</label>
			<div class="col-sm-10">
				<select class="form-control input-sm" name="status">
					<option value="Not Started" <?php if($plan_update){if($plan_update->status=="Not Started"){echo "selected";}}?>>Not Started</option>
					<option value="On Progress" <?php if($plan_update){if($plan_update->status=="On Progress"){echo "selected";}}?>>On Progress</option>
					<option value="Has Issued" <?php if($plan_update){if($plan_update->status=="Has Issued"){echo "selected";}}?>>Has Issued</option>
					<option value="Done" <?php if($plan_update){if($plan_update->status=="Done"){echo "selected";}}?>>Done</option>
				</select>
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Output</label>
			<div class="col-sm-10">
			  <textarea class="form-control" style="height:60px" placeholder="Output" name="progress"><?php if($plan_update){echo $plan_update->activity;}?></textarea>
			</div><div style="clear:both"></div>
		</div>
		<hr>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Progress</label>
			<div class="col-sm-10">
			  <textarea class="form-control" style="height:60px" placeholder="Progress" name="progress"><?php if($plan_update){echo $plan_update->progress;}?></textarea>
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Issue</label>
			<div class="col-sm-10">
			  <textarea class="form-control" style="height:60px" placeholder="Issue" name="issue"><?php if($plan_update){echo $plan_update->issue;}?></textarea>
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Next Step / Supported Needed</label>
			<div class="col-sm-10">
			  <textarea class="form-control" style="height:60px" placeholder="Next Step / Supported Needed" name="support"><?php if($plan_update){echo $plan_update->support;}?></textarea>
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm"></label>
			<div class="col-sm-4">
			<button class="btn btn-lg btn-wsa-green btn-sm" type="submit" onclick="submit_update();">Submit</button>
			<button class="btn btn-lg btn-wsa-red btn-sm" type="button" onclick="close_form_edit_update_plan();">Close</button>
			</div><div style="clear:both"></div>
		</div>
	</form><hr>
</div>
<script>
	$('#start').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	$('#end').datepicker({
		autoclose: true,
		todayHighlight: true
	});
</script>