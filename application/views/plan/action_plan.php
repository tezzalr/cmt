<?php echo $sidebar?>
<div class="content">
	<h2 style="margin-bottom:0px;"><?php if($anchor){echo $anchor->name; $id_nas=$anchor->id; $kind="anchor";}else{echo $dir['name']; $id_nas=$dir['code']; $kind="directorate";}?></h2>
	<span style="font-size:18px; color:#bbb">Action Plan & Progress / <?php echo $prod_name?></span>
	<div class="pull-right" style="padding-right:10px;">
		<select class="btn-wsa" name="product" onchange="if (this.value) window.location.href=this.value">
			<?php foreach($arr_prod as $prod){?>
			<option value="<?php echo base_url()."plan/show/".$kind."/".$id_nas."/".$prod['id']?>" <?php if($this->uri->segment(5)==$prod['id']){echo "selected";}?>><?php echo $prod['name']?></option>
			<?php }?>
		</select>
	</div>
	<hr style="margin:10px 0 10px 0;">
	<div>
		<div>
			<div style="float: left; width:50%;">
				<div class="panel panel-wsa">
					<div class="panel-heading">Daftar Action Plan
						<button style="float:right; margin-right:10px" class="btn btn-xs btn-wsa" onclick="edit_plan('','<?php echo $this->uri->segment(4)?>','<?php echo $this->uri->segment(5)?>');">
							<span class="glyphicon glyphicon-plus"></span> Action Plan
						</button><div style="clear:both"></div>
					</div>
					<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
						<div id="form_input_action_plan" style="display:none; margin-top:20px">
						</div>
						<div style="margin-top:20px" id="list_ap">
							<?php echo $list_ap?>
						</div>
					</div>
				</div>
			</div>
			<div style="float: left; width:50%; padding-left:40px" id="list_update">
			</div>
			<div style="clear:both"></div>
		</div>
		<div id="container4" style="min-width: 310px; height: 380px; margin: 0 auto"></div>
	</div>
</div>
<script>
	function submit_ap(){
		$("#formap").ajaxForm({	
    		dataType: 'json',
    		success: function(resp) 
    		{
        		if(resp.status==1){
					$("#list_ap").html(resp.html);
					toggle_visibility('form_input_action_plan');
				}else{}
    		},
		});
	}
	
	function show_update(id){
		$.ajax({
			type: "GET",
			url: config.base+"plan/show_update",
			data: {id: id},
			dataType: 'json',
			cache: false,
			success: function(resp){
				if(resp.status==1){
					$("#list_update").html(resp.html);
				}else{}
			}
		});
	}
	
	function edit_plan(id,anchor,product){
		$.ajax({
			type: "GET",
			url: config.base+"plan/edit_action_plan",
			data: {id: id, anchor: anchor, product: product},
			dataType: 'json',
			cache: false,
			success: function(resp){
				if(resp.status==1){
					if($('#form_input_action_plan').css('display') == 'none'){
						$('#form_input_action_plan').animate({'height':'toggle','opacity':'toggle'});
					}
					$("#form_input_action_plan").html(resp.html);
				}else{}
			}
		});
	}
	
	function delete_plan(id, event){
		bootbox.confirm("Apa anda yakin?", function(confirmed) {
			if(confirmed===true){
				$.ajax({
					url: config.base+"plan/delete_plan",
					data: {id: id},
					dataType: 'json',
					type: "POST",
					success: function (resp) {
						if(resp.status == 1){
							$('#plan_'+id).animate({'opacity':'toggle'});
							succeedMessage('Action Plan berhasil dihapus');
						}
					}
				});
			}
		});
	}
	
	function submit_update(){
		$("#formupdateap").ajaxForm({	
    		dataType: 'json',
    		success: function(resp) 
    		{
        		if(resp.status==1){
					$("#list_update_data").html(resp.list_update);
					$("#form_update").html(resp.form_update);
					//toggle_visibility('form_add_workblocks');
					//if($('#list_workblocks').css('display') == 'none'){
						//toggle_visibility('list_workblocks');
					//}
					//$("#body-info").html(resp.info);
				}else{}
    		},
		});
	}
	$('#due_date').datepicker({
		autoclose: true,
		todayHighlight: true
	});
</script>