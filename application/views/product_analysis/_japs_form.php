<div id="japs_coloumn" style="display:none;">
	<h4>JAPS Form</h4>
	<div style="width:33%; float:left; padding-right:10px">
		<div class="panel panel-wsa">
			<div class="panel-heading">WSA Form</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<div>
					<div class="pull-right" style="font-size:13px; color:#9a9a9a">Wallet Size</div>
					<div style="clear:both">Rp 25.6 M</div>
					<p>Asumsinya adalah . . . . .</p>
				</div><hr>
				<div>
					<div class="pull-right" style="font-size:13px; color:#9a9a9a">Target</div>
					<div style="clear:both">Rp 16.3 M</div>
					<p>Asumsinya adalah . . . . .</p>
					
					<div style="color:#eda32b; font-size:18px; border-top:1px dashed #dbdbdb; padding-top:5px">Share of Wallet : 63.67%</div>
				</div>
			</div>
		</div>
	</div>
	<div style="width:33%; float:left; padding-right:20px">
		<div class="panel panel-wsa">
			<div class="panel-heading">RM Form</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				<form class="form-horizontal" id="form_japs">
				<div>
					<input type="hidden" id="RKAP" value="15">
					<input type="hidden" id="Group_target" value="4">
					<input type="hidden" id="Last_year_real" value="7">
					<div class="pull-right" style="font-size:13px; color:#9a9a9a">Wallet Size</div>
					<div style="clear:both" class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" placeholder="Wallet Size" name="wallet_rm" id="wallet_rm">
						</div><br><br>
						<div class="col-sm-12">
							<textarea class="form-control" placeholder="Asumsi"></textarea>
						</div>
					</div>
				</div><hr>
				<div>
					<div class="pull-right" style="font-size:13px; color:#9a9a9a">Target</div>
					<div style="clear:both" class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" placeholder="Target" name="target_rm" id="target_rm" onchange="calculate_sow();">
						</div><br><br>
						<div class="col-sm-12">
							<textarea class="form-control" placeholder="Asumsi"></textarea>
						</div>
					</div>
				</div>
				<div id="sow_RM"></div>
				<hr>
				<button class="btn btn-success btn-sm">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<div style="width:33%; float:left">
		<div class="panel panel-wsa">
			<div class="panel-heading">Indicator</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
				Berikut ini adalah beberapa indikator yang digunakan untuk menentukan target:<br><br>
				<div style="font-size:14px;" id="RKAP_indicator">Growth RKAP (10%) : Rp 15 M</div>
				<div style="font-size:14px;" id="Group_target_indicator">Target by Group (10%) : Rp 4 M</div>
				<div style="font-size:14px;" id="Last_year_real_indicator">Growth Tahun Lalu (10%) : Rp 7 M</div>
			</div>
		</div>
		<div class="panel panel-wsa">
			<div class="panel-heading">Chat Room</div>
			<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
			<div>
				<div style="border-bottom:1px dashed #dbdbdb; margin-bottom:5px">
					<div style="font-size:12px; color:#9b9b9b"><span>User 1</span><span class="pull-right">15 Mei 2015</span></div>
					<p>Kenapa bisa segini ini targetnya?</p>
				</div>
				<div>
					<div style="font-size:12px; color:#9b9b9b"><span>User 2</span><span class="pull-right">15 Mei 2015</span></div>
					<p>Mengikuti growth tahun lalu</p>
				</div>
			</div>
			<hr>
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-12">
						<div style="float:left; width:285px; margin-right:5px;"><textarea class="form-control"></textarea></div>
						<div style="float:left"><input type="button" class="btn btn-sm btn-success" value="Send"></div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
	<hr>
</div>
<script>
	$.validator.addMethod("greaterThan",

	function (value, element, param) {
	  var $min = $(param);
	  var ret_val = true;
	  if (this.settings.onfocusout) {
		$min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
		  $(element).valid();
		});
	  }
	  
	  if(parseFloat(value) < parseFloat($("#RKAP").val())){
	  	$("#RKAP_indicator").css("cssText", "color: red;");
	  	ret_val = false;
	  }
	  else{$("#RKAP_indicator").css("cssText", "color: black;");}
	  
	  if(parseFloat(value) < parseFloat($("#Group_target").val())){
	  	$("#Group_target_indicator").css("cssText", "color: red;");
	  	ret_val = false;
	  }
	  else{$("#Group_target_indicator").css("cssText", "color: black;");}
	  
	  if(parseFloat(value) < parseFloat($("#Last_year_real").val())){
	  	$("#Last_year_real_indicator").css("cssText", "color: red;");
	  	ret_val = false;
	  }
	  else{$("#Last_year_real_indicator").css("cssText", "color: black;");}
	  
	  return ret_val;
	}, "Max must be greater than the Indicator");
	
	function calculate_sow(){
		var target = $("#target_rm").val();
		var wallet = $("#wallet_rm").val();
		var sow = 0;
		if(target==0){
			sow=0;
		}else if(wallet==0){
			sow=100;
		}else{
			sow=target/wallet*100;
		}
		$("#sow_RM").html("Share of Wallet : "+sow.toFixed(2)+"%");
		$("#sow_RM").css("cssText","border-top:1px dashed #dbdbdb; padding-top:5px; color:#eda32b; font-size:18px;");
	}
	
	$('#form_japs').validate({
		rules: {			
			wallet_rm: {
				required: true,
				number:true,
			},
			target_rm: {
				required: true,
				number:true,
				greaterThan: "#RKAP",
				greaterThan: "#Group_target",
				//greaterThan: "#Last_year_real"
			}
		}
	});
</script>