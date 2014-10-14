<link href="<?php echo base_url();?>assets/css/user.css" rel="stylesheet"/>

<div id="" class="container no_pad">
	<div class="col-md-7">
		<div class="form-signin">
		<h3 class="form-signin-heading">Input Program</h3>
		<form class="form-horizontal" action="<?php echo base_url();?>initiative/submit_program" method ="post" id="formsignup" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="">Segment</label>
				<div class="col-sm-9">
					<select class="form-control" name="segment">
						<option value="Wholesale">Wholesale</option>
						<option value="SME">SME</option>
						<option value="Mikro">Mikro</option>
						<option value="Individuals">Individuals</option>
						<option value="IT">IT</option>
						<option value="HC">HC</option>
						<option value="Risk">Risk</option>
						<option value="Distribution">Distribution</option>
						<option value="Organization">Organization</option>
						<option value="Performance Management">Performance Management</option>
						<option value="Marketing">Marketing</option>
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Program</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="title" name="title" placeholder="Program">
				</div>
			</div>
			 <div class="form-group">
				<label class="col-sm-3 control-label">Id</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="code" id="code" placeholder="Id">
				</div>
			</div>
			<hr>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
		</form>
	</div>
</div>
</div>