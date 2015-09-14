<style>
	body{
	  	background-color:#f4f4f4;
	  	max-width:1280px;
	  	margin: 0px auto;
	}
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
		width:100%;
		-webkit-filter: grayscale(70%) blur(2px);
    	z-index:10;
    	position:relative;
    	opacity:0.5;
	}
	.list_group_anchor{
		position: absolute; 
		top:25px;
		width:100%;
		z-index:11;
		display:none;
	}
	.each_menu{
		float:left;
		width:33%;
	}
	.logo_outer{
		background-color: #eda32b;
		width:160px;
		height:160px;
		border-radius:40px;
		padding-top:30px;
	}
	.logo_outer img{
		height:100px;
	}
	
</style>

<div style="position:relative; z-index:10; height:100%; background-color:white;">
	<div style="padding:10px; margin-top:100px;">
		<center>
			<div style="color:grey; font-size:14px;">ACCOUNT PLAN BANK MANDIRI</div>
			<div style="font-size:48px">
				Relationship Deepening Web
			</div>
			<div id="menu-RINGWeb" style="margin-top:80px;">
				<div class="each_menu">
					<a href="<?php echo base_url()?>profile/show/directorate/CB">
					<div class="logo_outer">
						<img src="<?php echo base_url()?>assets/img/icon/library - white.png">
					</div>
					<h3>Group Analysis</h3>
					</a>
				</div>
				<div class="each_menu">
					<a href="<?php echo base_url()?>scorecard/show/CB">
					<div class="logo_outer">
						<img src="<?php echo base_url()?>assets/img/icon/conf - white.png">
					</div>
					<h3>Anchor Analysis</h3>
					</a>
				</div>
				<div class="each_menu">
					<a href="<?php echo base_url()?>product_analysis/show/directorate/CB/CASA">
					<div class="logo_outer">
						<img src="<?php echo base_url()?>assets/img/icon/product - white.png">
					</div>
					<h3>Product Analysis</h3>
					</a>
				</div>
				<div style="clear:both"></div>
			</div>
		</center>
	</div>
</div>