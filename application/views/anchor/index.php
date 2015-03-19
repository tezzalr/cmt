<style>
	.group_cb{
		padding:5px;
		float:right;
	}
	#header_group{
		height:100%;
		width:100%;
    	-webkit-filter: grayscale(40%);
    	z-index:-1;
    	position:relative;
	}
	.group_name{
		position: absolute; 
		bottom:0;
		padding:5px 0 0px 10px; 
		background-color:white; 
		width:62%; 
		border-radius: 0 15px 0 0;
		display:none;
		opacity:0.15;
	}
	.group_div{
		width:33.33%; float:left; padding-left:0px;
	}
	#header_detail{
		height:100%;
		width:100%;
		-webkit-filter: grayscale(70%) blur(2px);
    	z-index:10;
    	position:relative;
    	opacity:0.5;
	}
	#hantu{
		position: absolute; 
		top:0;
		z-index:11;
	}
</style>
<div style="font-family:'Trebuchet MS', Helvetica, sans-serif; position:relative; z-index:1;">
	<!--<div style="padding:10px">
		<center>
			<img width="15%" src="<?php echo base_url()?>assets/img/general/bmri.jpg">
			<div style="font-size:32px">Anchor Client Bank Mandiri 2015</div>
		</center>
		<hr style="margin:0px">
	</div>-->
	<div style="padding:10px">
		<center>
		<div style="color:grey; font-size:14px;">ACCOUNT PLAN BANK MANDIRI</div>
		<div style="font-size:38px">CORPORATE BANKING</div>
		</center>
	</div>
	<div style="height:415px;" id="detail_group">
		<div style="display:none; position:relative; color:white" id="wrap_detail">
			<div style="height:100px;">
				<img id="header_detail">
			</div>
			<div style="padding:20px;" id="content_detail_group">
				<div id="hantu">
					<h2>CORPORATE BANKING I</h2>
				</div>
				<div style="float:left; width:20%">
					<h4>Department 1</h4>
					<div></div>
				</div>
				<div style="float:left; width:20%">
					<h4>Department 2</h4>
					<div></div>
				</div>
				<div style="float:left; width:20%">
					<h4>Department 3</h4>
					<div></div>
				</div>
				<div style="float:left; width:20%">
					<h4>Department 4</h4>
					<div></div>
				</div>
				<div style="float:left; width:20%">
					<h4>Department 5</h4>
					<div></div>
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<div id="group_group_div" style="width:100%; height:180px; overflow-y:hidden; color:white">
		<div class="group_div">
			<div style="position:relative">
				<div style="height:180px;">
					<img id="header_group" src="<?php echo base_url()?>assets/img/general/cb1.png">
				</div>
				<a href="#" onclick="choose_detail('#291400','cb1.png')" style="color:#291400;" class="group_name">
					<span style="font-size:20px;">CORPORATE BANKING I</span><br>
					<span>5 Department 10 Anchor</span>
				</a>
			
			</div>
		</div>
		<div class="group_div">
			<div style="position:relative">
				<div style="height:180px;">
					<img id="header_group" src="<?php echo base_url()?>assets/img/general/cb2.png">
				</div>
				<a href="#" onclick="choose_detail('#CCCC00','cb2.png')" style="color:#CCCC00;" class="group_name">
					<span style="font-size:20px;">CORPORATE BANKING II</span><br>
					<span>5 Department 10 Anchor</span>
				</a>
			
			</div>
		</div>
		<div class="group_div">
			<div style="position:relative">
				<div style="height:180px; z-index:-1">
					<img id="header_group" src="<?php echo base_url()?>assets/img/general/cb3.jpeg">
				</div>
				<a href="#" onclick="choose_detail('red','cb3.jpeg')" style="color:red;" class="group_name">
					<span style="font-size:20px;">CORPORATE BANKING III</span><br>
					<span>5 Department 10 Anchor</span>
				</a>
			
			</div>
		</div>
		<div class="group_div">
			<div style="position:relative">
				<div style="height:180px; z-index:-1">
					<img id="header_group" src="<?php echo base_url()?>assets/img/general/cb4.png">
				</div>
				<a href="#" onclick="choose_detail('#339933','cb4.png')" style="color:#339933;" class="group_name">
					<span style="font-size:20px;">CORPORATE BANKING IV</span><br>
					<span>5 Department 10 Anchor</span>
				</a>
			</div>
		</div>
		<div class="group_div">
			<div style="position:relative">
				<div style="height:180px; z-index:-1">
					<img id="header_group" src="<?php echo base_url()?>assets/img/general/cb5.png">
				</div>
				<a href="#" onclick="choose_detail('#8E4524','cb5.png')" style="color:#8E4524;" class="group_name">
					<span style="font-size:20px;">CORPORATE BANKING V</span><br>
					<span>5 Department 10 Anchor</span>
				</a>
			</div>
		</div>
		<div class="group_div">
			<div style="position:relative">
				<div style="height:180px; z-index:-1">
					<img id="header_group" src="<?php echo base_url()?>assets/img/general/cb6.png">
				</div>
				<a href="#" onclick="choose_detail('#008AE6','cb6.png')" style="color:#008AE6;" class="group_name">
					<span style="font-size:20px;">CORPORATE BANKING VI</span><br>
					<span>5 Department 10 Anchor</span>
				</a>
			
			</div>
		</div>
		<div class="group_div">
			<div style="position:relative">
				<div style="height:180px; z-index:-1">
					<img id="header_group" src="<?php echo base_url()?>assets/img/general/cb7.png">
				</div>
				<a href="#" onclick="choose_detail('#996633','cb7.png')" style="color:#996633;" class="group_name">
					<span style="font-size:20px;">CORPORATE BANKING VII</span><br>
					<span>5 Department 10 Anchor</span>
				</a>
			
			</div>
		</div>
		<div class="group_div">
			<center style="margin-top:15%">
			<a style="color:black" href="#" onclick="close_group()">
				<img height="60px" src="<?php echo base_url()?>assets/img/general/close.png">
				<div>Close</div>
			</a>
			</center>
		</div>
		<div style="clear:both"></div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$( ".group_name" ).animate({
			height: "toggle",
			opacity: "1"
	  		}, 900);
	});
	$( "#group_group_div" ).mouseenter(function() {
	  $("#detail_group").animate({
		height: "0",
	  }, 300, function() {
		
		});$("#group_group_div").animate({
		height: "540",
	  }, 600);
	});
	function close_group() {
	  $("#detail_group").animate({
		height: "415",
	  }, 300, function() {
		$("#group_group_div").animate({
		height: "180",
	  }, 300);
		});
	}
	function choose_detail(bg_color,bg_pic){
		close_group();
		$('#detail_group').css('background',bg_color);
		$('#wrap_detail').css('display','block');
		$("#header_detail").attr("src","<?php echo base_url()?>assets/img/general/"+bg_pic);
	}
</script>