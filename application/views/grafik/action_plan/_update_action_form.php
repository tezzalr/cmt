<div id="form_input_update_plan" style="display:none; margin-top:20px;">
	<form class="form-horizontal" action="<?php echo base_url();?>plan/submit_update_ap" method ="post" id="formupdateap" role="form">
		<input type="hidden" name="plan" value="<?php echo $plan->id?>">
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Progress</label>
			<div class="col-sm-10">
			  <textarea class="form-control" style="height:60px" placeholder="Progress" name="progress"></textarea>
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Issue / Next Step</label>
			<div class="col-sm-10">
			  <textarea class="form-control" style="height:60px" placeholder="Issue / Next Step" name="issue"></textarea>
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Supported Needed</label>
			<div class="col-sm-10">
			  <textarea class="form-control" style="height:60px" placeholder="Supported Needed" name="support"></textarea>
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">Due Date</label>
			<div class="col-sm-4">
			  <input type="text" class="form-control input-sm" placeholder="mm/dd/yy" name="due_date" id="due_date" value="">
			</div><div style="clear:both"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm">PIC</label>
			<div class="col-sm-4">
			  <input type="text" class="form-control input-sm" placeholder="PIC" name="pic" id="pic" value="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label input-sm"></label>
			<div class="col-sm-4">
			<button class="btn btn-lg btn-success btn-sm" type="submit" onclick="submit_update();">Submit</button>
			</div><div style="clear:both"></div>
		</div>
	</form><hr>
</div>

<script>
	$('#due_date').datepicker({
		autoclose: true,
		todayHighlight: true
	});
</script>