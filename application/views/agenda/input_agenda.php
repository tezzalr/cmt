<link href="<?php echo base_url();?>assets/css/user.css" rel="stylesheet"/>

<script>
$(document).ready(function(){
	if($('#type_login').val()=='failed'){
		$('#login_failed').removeClass('hide');
	}
	if($('#type_login').val()=='not_login'){
		$('#not_login').removeClass('hide');
	}
        
    $("#formagenda").validate({
		rules: {
			username: {
				required: true,
			},
			password: {
				//required: true,
				minlength: 5
			},
			verify_password: {
				//required: true,
				equalTo: "#password"
			},
			name: "required",
		},
		messages: {
			username: {
				required: "Please enter an username"
			},
			password_su: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			verify_password: {
				required: "Please provide a password",
				equalTo: "Please enter the same password as above"
			},
			agree: "Please accept our policy"
		}
	});     
});
</script>

<div id="" class="container no_pad">
	<div class="col-md-10">
		<div class="form-signin">
		<h3 class="form-signin-heading">Form Agenda</h3>
		<form class="form-horizontal" action="<?php if($agenda){echo base_url()."agenda/submit_agenda/".$agenda['agenda']->id;}else{echo base_url()."agenda/submit_agenda";}?>" method ="post" id="formagenda" role="form">
			 <div class="form-group">
				<label class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title" placeholder="Title" <?php if($agenda){echo "value='".$agenda['agenda']->title."'";}?>>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Location</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="location" name="location" placeholder="Location" <?php if($agenda){echo "value='".$agenda['agenda']->location."'";}?>>
				</div>
			</div>
			 <div class="form-group">
				<label for="" class="col-sm-2 control-label">Date</label>
				<div class="col-sm-8">
					<?php $start=""; if($agenda['agenda']->start){$start = date("m/d/Y", strtotime($agenda['agenda']->start));}?>
					<input type="text" class="form-control" id="start" name="start" placeholder="mm/dd/YYYY" value="<?php echo $start?>">
					<small style="color:grey">*format: mm/dd/YYYY</small>
				</div>
				<div class="col-sm-2">
					<?php $start_time=""; if($agenda['agenda']->start){$start_time = date("h:i", strtotime($agenda['agenda']->start));}?>
					<input type="text" class="form-control" id="start_time" name="start_time" placeholder="hh:mm" value="<?php echo $start_time?>">
					<small style="color:grey">*format: hh:mm</small>
				</div>
				<!--
				<div class="col-sm-2">
					<input type="text" class="form-control" id="end" name="end" placeholder="mm/dd/YYYY">
					<small style="color:grey">*format: mm/dd/YYYY</small>
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="end_time" name="end_time" placeholder="hh:mm">
					<small style="color:grey">*format: hh:mm</small>
				</div>-->
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description</label>
				<div class="col-sm-10">
					<textarea type="text" class="form-control" name="description">
						<?php if($agenda){echo $agenda['agenda']->description;}else{?>
						<!--<br><br><b>---Follow Up---</b>-->
						<?php }?>
					</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Required</label>
				<div class="col-sm-10">
					<?php foreach($cmters as $cmt){?>
					<label class="checkbox-inline">
						<input type="checkbox" name="required[]" value="<?php echo $cmt->id?>" <?php if(!$agenda){if($user['id']==$cmt->id){echo "checked";}}else{
							if(in_array($cmt->id,$agenda['arr_user'])){echo "checked";}
						}?>> <?php echo $cmt->name?>
					</label>
					<?php }?>
				</div>
			</div>	
			<hr>
			<button class="btn btn-md btn-primary btn-block" type="submit">Submit</button>
		</form>
	</div>
</div>
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
	CKEDITOR.replace('description');
</script>