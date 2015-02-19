<div id="" class="container no_pad">
	<?php echo $header?>
	<div>
		<div>
			<div style="margin-bottom: 20px;">
				<form method="post" action="<?php echo base_url()?>plan/refresh_product/<?php echo $level?>/<?php echo $id?>">
					<label style="margin-right:18px;">Produk:</label> 
					<select name="product">
						<?php foreach($arr_prod as $prod){?>
						<option value="<?php echo $prod['id']?>" <?php if($this->uri->segment(5)==$prod['id']){echo "selected";}?>><?php echo $prod['name']?></option>
						<?php }?>
					</select>
					<button type="submit" class="btn btn-default btn-xs">Tampilkan</button>
				</form>
			</div>
			<div style="float: left; width:50%;">
				<h4 style="float:left">Daftar Action Plan</h4>
				<button style="float:right; margin-right:10px" class="btn btn-primary btn-xs" onclick="toggle_visibility('form_input_action_plan');">
					<span class="glyphicon glyphicon-plus"></span> Action Plan
				</button><div style="clear:both"></div><hr style="margin:0px">
				<div id="form_input_action_plan" style="display:none; margin-top:20px">
					<form class="form-horizontal" action="<?php echo base_url();?>plan/submit_action_plan" method ="post" id="formap" role="form">
						<input type="hidden" name="product" value="<?php echo $this->uri->segment(5)?>">
						<input type="hidden" name="anchor" value="<?php echo $this->uri->segment(4)?>">
						<div class="form-group">
							<label class="col-sm-2 control-label input-sm">Action Plan</label>
							<div class="col-sm-10">
							  <textarea class="form-control" style="height:120px" placeholder="Action Plan" name="action"></textarea>
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
				</div>
				<div style="margin-top:20px" id="list_ap">
					<?php echo $list_ap?>
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
</script>