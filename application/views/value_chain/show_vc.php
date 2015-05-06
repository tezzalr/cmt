<?php echo $sidebar?>

<div class="content">
	<h2 style="margin-bottom:0px;">
		<?php if($anchor){echo $anchor->name;}else{echo $dir['name'];}?>
		<button class="btn btn-link" onclick="toggle_visibility('contact_id')"><span style="color:#bababa; font-size:16px" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
	</h2>
	<div style="display:none" id="contact_id">
		<div style="color:#bababa">Contact Person</div>
		Martha Viona (0812-8613-3839) / (0812-2115-9888)<br>
		Hally CB1 (0812-8531-9261)
		<br><br>
	</div>
	<span style="font-size:18px; color:#bbb">Value Chain </span>
	<hr style="margin:10px 0 10px 0;">
	<div style="margin-bottom:10px;">
			<span class="circle circle-notyet circle-lg text-left"></span>Not Yet
			<span class="circle circle-inprog circle-lg text-left" style="margin-left:10px"></span>Terakuisisi
			<span class="circle circle-atrisk circle-lg text-left" style="margin-left:10px"></span>In Progress
			<span class="circle circle-delay circle-lg text-left" style="margin-left:10px"></span>Gagal
			
		</div>
	<div style="width:70%; float:left; padding:0 15px 0 0px">
		<div class="panel panel-wsa">
			<div class="panel-heading">List Value Chain</div>
			<div class="panel-body" style="padding:5px 0px 5px 0px;" id="body-info">
				<table class="table table-striped">
					<thead>
						<tr>
							<th></th><th>Relationship</th><th>Name</th><th>Kanwil</th><th>Sector</th><th style="text-align:right">Omzet</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($vcs as $vc){?>
						<tr>
							<td>
								<span class="circle circle-notyet circle-lg""></span>
							</td>
							<td><?php echo $vc->relationship?></td>
							<td><button type="button" class="btn-link" style="padding:0px; color:black;" onclick="show_detail(<?php echo $vc->id?>)"><?php echo $vc->name?></button></td>
							<td><?php echo $vc->kanwil?></td>
							<td><?php echo $vc->sector?></td>
							<td style="text-align:right"><?php echo number_format($vc->omzet,0,'.',',')?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div style="width:25%; float:left; padding:0 5px 0 0px; position:fixed; right:5px;">
		<div class="panel panel-wsa">
			<div class="panel-heading">Detail Info</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div id="info_detail">
				</div>
			</div>
		</div>
		<div class="panel panel-wsa">
			<div class="panel-heading">Filter Setting</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<form class="form-horizontal">
					<div>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox1" value="option1"> <span class="circle circle-inprog circle-lg""></span>
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox2" value="option2"> <span class="circle circle-delay circle-lg""></span>
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" value="option3"> <span class="circle circle-atrisk circle-lg""></span>
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" value="option3"> <span class="circle circle-notyet circle-lg""></span>
						</label>
					</div><hr>
					<div style="float:left; width:50%">
					<?php for($i=1;$i<=5;$i++){?>
						<div class="checkbox">
						  <label>
							<input type="checkbox" value="" checked>
							Kanwil <?php echo $i?>
						  </label>
						</div>
					<?php }?>
					</div>
					<div style="float:left; width:50%">
					<?php for($i=6;$i<=10;$i++){?>
						<div class="checkbox">
						  <label>
							<input type="checkbox" value="" checked>
							Kanwil <?php echo $i?>
						  </label>
						</div>
					<?php }?>
					</div><div style="clear:both"></div>
					<hr>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Omzet : </label>
						<div class="col-sm-7" style="margin-bottom:10px">
							<input type="password" class="form-control" id="inputPassword" placeholder="Omzet">
						</div>s/d
						<div style="clear:both"></div>
						<label for="inputPassword3" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="inputPassword" placeholder="Omzet">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Sort : </label>
						<div class="col-sm-7">
						  <select class="form-control">
							<option>Relationship</option>
							<option>Name</option>
							<option>Kanwil</option>
							<option>Omzet</option>
							<option>Sector</option>
						</select>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
</div>

<script type="text/javascript">
	function show_detail(id){
		$.ajax({
			type: "GET",
			url: config.base+"value_chain/show_detail",
			data: {id: id},
			dataType: 'json',
			cache: false,
			success: function(resp){
				if(resp.status==1){
					$("#info_detail").html(resp.html);
				}else{}
			}
		});
	}
</script>