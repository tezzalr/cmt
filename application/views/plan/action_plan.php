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
						<div style="float:right;">
						<div id="btn-add-ap">
						<button style="margin-right:2px" class="btn btn-xs btn-wsa" onclick="edit_plan('','<?php echo $this->uri->segment(4)?>','<?php echo $this->uri->segment(5)?>');">
							<span class="glyphicon glyphicon-plus"></span> Action Plan
						</button>
						</div>
						<div id="btn-add-uap" style="display:none">
							<button style="margin-right:2px;" class="btn btn-wsa btn-xs" onclick="show_all_ap();">
								<span class="glyphicon glyphicon-list"></span> Show All
							</button>
						</div>
						</div>
						<div style="clear:both"></div>
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
					$(".plan_member").css("cssText", "display: none;");
					$("#plan_"+id).css("cssText", "display: block");
					$("#gear_plan_"+id).css("cssText", "display: block");
					$("#btn-add-ap").css("cssText", "display: none");
					$("#btn-add-uap").css("cssText", "display: block");
					$("#btn-real-uap-"+id).css("cssText", "display: inline");
					//$("#btn-real-uap").on('onclick',edit_plan_update('',id));
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
					$("#form_input_action_plan").html(resp.html);
					if($('#form_input_action_plan').css('display') == 'none'){
						$('#form_input_action_plan').animate({'height':'toggle','opacity':'toggle'});
					}
				}else{}
			}
		});
	}
	
	function close_form_edit_plan(){
		//$("#form_input_action_plan").html('');
		$('#form_input_action_plan').animate({'height':'toggle','opacity':'toggle'});
	}
	
	function edit_plan_update(id,plan_id){
		$.ajax({
			type: "GET",
			url: config.base+"plan/edit_plan_update",
			data: {id: id, plan_id: plan_id},
			dataType: 'json',
			cache: false,
			success: function(resp){
				if(resp.status==1){
					$("#form_update").html(resp.html);
					if($('#form_update').css('display') == 'none'){
						$('#form_update').animate({'height':'toggle','opacity':'toggle'});
					}
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
							show_all_ap();
							succeedMessage('Action Plan berhasil dihapus');
						}
					}
				});
			}
		});
	}
	
	function delete_plan_update(id, event){
		bootbox.confirm("Apa anda yakin?", function(confirmed) {
			if(confirmed===true){
				$.ajax({
					url: config.base+"plan/delete_plan_update",
					data: {id: id},
					dataType: 'json',
					type: "POST",
					success: function (resp) {
						if(resp.status == 1){
							$('#update_'+id).animate({'opacity':'toggle'});
							succeedMessage('Update Action Plan berhasil dihapus');
						}
					}
				});
			}
		});
	}
	
	function show_all_ap(){
		$(".plan_member").css("cssText", "display: block;");
		$("#btn-add-ap").css("cssText", "display: block");
		$("#btn-add-uap").css("cssText", "display: none");
		$(".btn-real-uap").css("cssText", "display: none");
		$(".gear_plan").css("cssText", "display: none");
		$("#list_update").html('');
	}
	
	function submit_update(){
		$("#formupdateap").ajaxForm({	
    		dataType: 'json',
    		success: function(resp) 
    		{
        		if(resp.status==1){
					$("#list_update_data").html(resp.list_update);
					$("#form_update").html('');
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