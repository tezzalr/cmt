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
	<div style="padding:10px; padding-top:70px;">
		<center>
			<div style="font-size:32px">
				Anchor Client Scoring
			</div>
			<div id="menu-RINGWeb" style="margin-top:10px;">
				<?php $class=""; foreach($anchors as $anchor){?>
				<?php if($class != $anchor->class){if($class){echo "</div>";}?><div class="each_menu" style="width:25%; padding:0 15px 0 15px;"><h4 style="border-bottom:3px solid #007aff; padding-bottom:10px;"><?php echo $anchor->class?></h4><?php }?>
					<div>
						<div style="width:80%; float:left; text-align:left"><?php echo $anchor->srt_name; ?></div>
						<div style="width:10%; float:left;"><?php echo number_format($anchor->scoring,2); ?></div>
						<div style="clear:both"></div>
					</div>
				<?php $class=$anchor->class;}?>
				</div>
				<div style="clear:both"></div>
			</div>
		</center>
	</div>
</div>