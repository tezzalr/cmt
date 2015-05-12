<form class="form-horizontal" action="<?php echo base_url();?>plan/submit_action_plan" method ="post" id="formap" role="form">
	<input type="hidden" name="product" value="<?php echo $product;?>">
	<input type="hidden" name="anchor" value="<?php echo $anchor;?>">
	<input type="hidden" value="<?php if($plan){echo $plan->id;}?>" name="id">
	<div class="form-group">
		<label class="col-sm-2 control-label input-sm">Action Plan</label>
		<div class="col-sm-10">
		  <textarea class="form-control" style="height:120px" placeholder="Action Plan" name="action"><?php if($plan){echo $plan->action;}?></textarea>
		</div><div style="clear:both"></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label input-sm">PIC</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" placeholder="PIC" name="pic" value="<?php if($plan){echo $plan->pic;}?>">
		</div><div style="clear:both"></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label input-sm">Due Date</label>
		<div class="col-sm-4">
		  <input type="text" class="form-control input-sm" placeholder="mm/dd/yy" name="due_date" id="due_date" value="<?php if($plan){echo date("m/d/Y", strtotime($plan->due_date));}?>">
		</div><div style="clear:both"></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label input-sm">Due Date</label>
		<div class="col-sm-4">
			<select class="form-control input-sm" name="status">
				<option value="Status 1" <?php if($plan){if($plan->status=="Status 1"){echo "selected";}}?>>Status 1</option>
				<option value="Status 2" <?php if($plan){if($plan->status=="Status 2"){echo "selected";}}?>>Status 2</option>
				<option value="Status 3" <?php if($plan){if($plan->status=="Status 3"){echo "selected";}}?>>Status 3</option>
			</select>
		</div><div style="clear:both"></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label input-sm"></label>
		<div class="col-sm-10">
			<button class="btn btn-lg btn-success btn-sm" type="submit" onclick="submit_ap();">Submit</button>
		</div>
	</div>
	<hr>
</form>
<script>
	$('#due_date').datepicker({
		autoclose: true,
		todayHighlight: true
	});
</script>