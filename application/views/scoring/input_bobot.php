<style>
	html, body{
	  	background-color:white;
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
		background-color: #c3c3c3;
		width:160px;
		height:160px;
		border-radius:40px;
		padding-top:30px;
	}
	.logo_outer img{
		height:100px;
	}
	
</style>

<div style="z-index:10; min-height:100%; width:100%; background-color:white;">
	<div style="padding:10px; padding-top:100px;">
		<center>
			<div style="font-size:32px">
				Scoring Parameter
			</div>
			<div id="menu-RINGWeb" style="margin-top:10px;">
				<form class="form-horizontal" action="<?php echo base_url()."scoring/calculate_anchor_scoring"?>" method ="post" id="formparamscor" role="form">
				<div class="each_menu">
					<h3>Profile</h3>
					<div>
						<?php foreach($profile as $pro){?>
							<div class="form-group">
								<label class="col-sm-6 control-label"><?php echo $pro->desc_comp?></label>
								<div class="col-sm-4">
									<div class="input-group">
										<input type="text" class="form-control" id="location" name="<?php echo $pro->id?>" value="<?php echo $pro->bobot?>">
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
				<div class="each_menu">
					<h3>Wallet</h3>
					<div>
						<?php foreach($wallet_size as $wal){?>
							<div class="form-group">
								<label class="col-sm-6 control-label"><?php echo $wal->desc_comp?></label>
								<div class="col-sm-4">
									<div class="input-group">
										<input type="text" class="form-control" id="location" name="<?php echo $wal->id?>" value="<?php echo $wal->bobot?>">
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
				<div class="each_menu">
					<h3>Realization</h3>
					<div>
						<?php foreach($realization as $real){?>
							<div class="form-group">
								<label class="col-sm-6 control-label"><?php echo $real->desc_comp?></label>
								<div class="col-sm-4">
									<div class="input-group">
										<input type="text" class="form-control" id="location" name="<?php echo $real->id?>" value="<?php echo $real->bobot?>">
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
				<div style="clear:both"></div>
				<hr>
				<button type="submit" class="btn btn-wsa btn-md" >Submit Parameter</button>
				</form>
			</div>
		</center>
	</div>
</div>