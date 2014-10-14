<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 50px;">
		<h2 style=""><?php echo $this->uri->segment(3)?> Initiative</h2>
	</div>
	<div>
		<?php $roles = explode(',',$user['role']); if(in_array("PMO",$roles) || in_array("admin",$roles)){?><div style="margin-bottom:10px; float:right;">
		<button onclick="toggle_visibility('new_initiative');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus"></span> Initiative</button>
		</div><?php }?>
		<?php
			//echo date_format(date_create('2014-05-01'), 'l');
		?>
		
		<div style="margin-bottom:10px; float:left">
			<a href="<?php echo base_url()?>initiative/list_initiative/<?php echo $this->uri->segment(3)?>" style="color:black">Status:</a>
			<a href="<?php echo base_url()?>initiative/list_initiative/<?php echo $this->uri->segment(3)?>/nsy" style="color:black"><button class="btn btn-inverse btn-xs"><span style="color:grey" class="glyphicon glyphicon-off"></span></button><span style="margin-right:10px"> Not Started Yet</span></a>
			<a href="<?php echo base_url()?>initiative/list_initiative/<?php echo $this->uri->segment(3)?>/progress" style="color:black"><button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-refresh"></span></button><span style="margin-right:10px"> On Progress</span></a>
			<a href="<?php echo base_url()?>initiative/list_initiative/<?php echo $this->uri->segment(3)?>/completed" style="color:black"><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button><span style="margin-right:10px"> Completed</span></a>
			<a href="<?php echo base_url()?>initiative/list_initiative/<?php echo $this->uri->segment(3)?>/delay" style="color:black"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button><span> Delay</span></a>
		</div>
		<div style="clear:both">
		
		<div id="new_initiative" style="display:none">
			<?php echo $form_new?>
		</div>
		
		<table class="table table-bordered">
			<thead>
				<tr class="headertab"><th style="width:60px">Program</th><th colspan=2>Initiatives</th><th>WB</th><th>PIC</th><th style="width:85px">Start</th><th  style="width:85px">End</th><th>Dependency</th></tr>
			</thead>
			<tbody>
				<?php
					usort($ints, function($a, $b) {
						return $a['code'] - $b['code'];
					});
				?>
				<?php 
					$statshow=$this->uri->segment(4); $prog=""; $np=1; 
					if($statshow){
						if($statshow == "progress"){$statshow = "In Progress";}
						elseif($statshow == "completed"){$statshow = "Completed";}
						elseif($statshow == "delay"){$statshow = "Delay";}
						else{$statshow = "Not Started Yet";}
					} $arr_descript = array();
					foreach($ints as $int){ 
						$arr_descript = '$int[\'int\']->description'; 
				?>
				<?php if(!$statshow || ($statshow && ($statshow == $int['stat']))){if($prog != $int['int']->program){?>
				<tr style="background-color:#F0EBA8; font-size:14px">
					<td colspan=8><?php echo $int['int']->progcode?><span style="margin-left:10px"><?php echo $int['int']->program?></span>
					</td>
				</tr>
				<?php $prog=$int['int']->program; $np++;}?>
				<tr id="initia_<?php echo $int['int']->id?>">
					<?php 
						if($int['stat']=="Delay"){$clr="danger"; $icn="remove";}
						elseif($int['stat']=="In Progress"){$clr="warning"; $icn="refresh";}
						elseif($int['stat']=="Completed"){$clr="success"; $icn="ok";}
						else{$clr="inverse"; $icn="off";}
					?>
					<td style="width:40px"><center><button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button></center></td>				
					<td>
						<div style="float:left; width:43px; margin-right:5px;"><?php echo $int['int']->code?></div> 
						<div style="float:left; max-width:490px"><a href="<?php echo base_url()?>initiative/detail_initiative/<?php echo $int['int']->id?>"><?php echo $int['int']->title?></a></div>
						<div style="clear:both"></div>
					</td>
					<td style="width:40px"><button class="btn btn-default btn-xs" onclick="show_descript(<?php echo $int['int']->id?>)"><span class="glyphicon glyphicon-comment"></span></button></td>
					<td style="text-align:right; width:20px"><?php echo $int['wb']?></td>
					<td><?php $sumpic = count($int['pic']); $i=1;
						if($int['pic']){
							foreach($int['pic'] as $pic){
								$namaar = explode(' ',$pic->name);
								echo $namaar[0];
								if($i<$sumpic){
									echo ", ";
								} $i++;
							}
						}?>
					</td>
					<td style="text-align:right"><?php if($int['int']->start){echo date("j M y", strtotime($int['int']->start));}?></td>
					<td style="text-align:right"><?php if($int['int']->end){echo date("j M y", strtotime($int['int']->end));}?></td>
					<td><?php echo $int['int']->kickoff.' '.$int['int']->completion?></td>
					<?php if($user['role']=='admin'){?><td style="width:70px">
						<button class="btn btn-warning  btn-xs" onclick="toggle_visibility('edit_int_<?php echo $int['int']->id?>');"><span class="glyphicon glyphicon-pencil"></span></button>
						<button class="btn btn-danger btn-xs" onclick="delete_initiative(<?php echo $int['int']->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
					</td><?php }?>
				</tr>
				<tr id="edit_int_<?php echo $int['int']->id?>" style="display:none"><td></td>
					<div>
					<td colspan=7>
						<form class="form-horizontal" action="<?php echo base_url();?>initiative/submit_initiative/<?php echo $int['int']->id?>" method ="post" id="formsignup" role="form">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="">Program</label>
								<input type="hidden" value="<?php echo $this->uri->segment(3)?>" name="segment">
								<div class="col-sm-4">
									<select class="form-control" name="program">
										<?php foreach($programs as $prg){?>
										<option value="<?php echo $prg->id?>" <?php if($int['int']->program == $prg->title){echo "selected";}?>><?php echo $prg->title?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Initiative</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="title" name="title" placeholder="Initiative" value="<?php echo $int['int']->title?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Id</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="code" id="code" placeholder="Id" value="<?php echo $int['int']->code?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tier</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="tier" id="tier" placeholder="Tier" value="<?php echo $int['int']->tier?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Start</label>
								<div class="col-sm-4">
									<?php $start=""; if($int['int']->start){$start = date("m/d/Y", strtotime($int['int']->start));}?>
									<input type="date" class="form-control" id="start<?php echo $int['int']->id?>" name="start" placeholder="mm/dd/YYYY" value="<?php echo $start?>">
									<small style="color:grey">*format: mm/dd/YYYY</small>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">End</label>
								<div class="col-sm-4">
									<?php $end=""; if($int['int']->end){$end = date("m/d/Y", strtotime($int['int']->end));}?>
									<input type="date" class="form-control" id="end<?php echo $int['int']->id?>" name="end" placeholder="mm/dd/YYYY" value="<?php echo $end?>">
									<small style="color:grey">*format: mm/dd/YYYY</small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Kick-off</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="kickoff" name="kickoff" placeholder="Dependecies Kick-off" value="<?php if($int['int']->kickoff){echo $int['int']->kickoff;}?>">
									<small style="color:grey">jika lebih dari satu pisahkan dengan ","</small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Completion</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="completion" name="completion" placeholder="Dependecies Completion" value="<?php if($int['int']->completion){echo $int['int']->completion;}?>">
									<small style="color:grey">jika lebih dari satu pisahkan dengan ","</small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Description</label>
								<div class="col-sm-8">
									<textarea type="text" class="form-control" id="description<?php echo $int['int']->id?>" name="description"><?php echo $int['int']->description?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-4"><input type="submit" class="btn btn-success"></div></div>
						</form>
						<script>
							 $('#start'+<?php echo $int['int']->id?>).datepicker({
								autoclose: true,
								todayHighlight: true
							});
							$('#end'+<?php echo $int['int']->id?>).datepicker({
								autoclose: true,
								todayHighlight: true
							});
							CKEDITOR.replace('description'+<?php echo $int['int']->id?>);
						</script>
					</div>
				</tr>
				<?php }}?>
			</tbody>
		</table>
	</div><div style="clear:both"></div><br>
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
	function delete_initiative(id, event){
		bootbox.confirm("Apa anda yakin?", function(confirmed) {
			if(confirmed===true){
				$.ajax({
					url: config.base+"initiative/delete_initiative",
					data: {id: id},
					dataType: 'json',
					type: "POST",
					success: function (resp) {
						if(resp.status == 1){
							$('#initia_'+id).animate({'opacity':'toggle'});
							succeedMessage('Initiative berhasil dihapus');
						}
					}
				});
			}
		});
	}
	function show_descript(id){
		$.ajax({
			type: "GET",
			url: config.base+"initiative/get_description",
			data: {id: id},
			dataType: 'json',
			cache: false,
			success: function(resp){
				if(resp.status==1){
					bootbox.dialog({
						title: resp.title,
						message: resp.message
					});
				}else{}
			}
		});
	}
</script>