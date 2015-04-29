<div id="" class="container no_pad">
	<?php echo $header?>
	<div>
		<form class="form-horizontal" action="<?php echo base_url();?>plan/submit_strategy" method ="post" id="formap" role="form">
			<input type="hidden" name="anchor" value="<?php echo $this->uri->segment(3)?>">
			<div class="form-group">
				<label class="col-sm-2 control-label input-sm">CASA</label>
				<div class="col-sm-10">
				  <textarea class="form-control" style="height:120px" placeholder="Strategy" name="CASA"><?php if($stgy['CASA']){echo $stgy['CASA']->strategy;}?></textarea>
				</div><div style="clear:both"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label input-sm">Time Deposit</label>
				<div class="col-sm-10">
				  <textarea class="form-control" style="height:120px" placeholder="Strategy" name="TD"><?php if($stgy['TD']){echo $stgy['TD']->strategy;}?></textarea>
				</div><div style="clear:both"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label input-sm">Working Capital Loan</label>
				<div class="col-sm-10">
				  <textarea class="form-control" style="height:120px" placeholder="Strategy" name="WCL"><?php if($stgy['WCL']){echo $stgy['WCL']->strategy;}?></textarea>
				</div><div style="clear:both"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label input-sm">Investment Loan</label>
				<div class="col-sm-10">
				  <textarea class="form-control" style="height:120px" placeholder="Strategy" name="IL"><?php if($stgy['IL']){echo $stgy['IL']->strategy;}?></textarea>
				</div><div style="clear:both"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label input-sm">Trade Services</label>
				<div class="col-sm-10">
				  <textarea class="form-control" style="height:120px" placeholder="Strategy" name="Trade"><?php if($stgy['Trade']){echo $stgy['Trade']->strategy;}?></textarea>
				</div><div style="clear:both"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label input-sm">Fx & Derivatives</label>
				<div class="col-sm-10">
				  <textarea class="form-control" style="height:120px" placeholder="Strategy" name="FX"><?php if($stgy['FX']){echo $stgy['FX']->strategy;}?></textarea>
				</div><div style="clear:both"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label input-sm">Bank Guarantee</label>
				<div class="col-sm-10">
				  <textarea class="form-control" style="height:120px" placeholder="Strategy" name="BG"><?php if($stgy['BG']){echo $stgy['BG']->strategy;}?></textarea>
				</div><div style="clear:both"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label input-sm"></label>
				<div class="col-sm-10">
					<button class="btn btn-lg btn-success btn-sm" type="submit">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	CKEDITOR.replace('CASA');
	CKEDITOR.replace('TD');
	CKEDITOR.replace('WCL');
	CKEDITOR.replace('IL');
	CKEDITOR.replace('Trade');
	CKEDITOR.replace('FX');
	CKEDITOR.replace('BG');
</script>