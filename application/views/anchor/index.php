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
	
</style>

<div style="position:relative; z-index:10; height:100%" id="yes-man">
	
	<div style="padding:10px; margin-top:50px;">
		<center>
		<div style="color:grey; font-size:14px;">ACCOUNT PLAN BANK MANDIRI</div>
		<div style="font-size:38px"><a style="color:black" href="<?php echo base_url()?>profile/show/directorate/CB">CORPORATE BANKING</a></div>
		<?php $anc_atr = get_group_attr();?>
		</center>
	</div>
	<div style="height:415px; overflow:hidden" id="detail_group">
		<div id="promo_center" style="border-top:1px dashed #bbb;">
			<?php 
				$today = DateTime::createFromFormat('Y-m-d', date("Y-m-d"));
				if($today->format('H')<16){$pic = "day"; $bgcol="white"; $foncol="black";}
				elseif($today->format('H')>=18){$pic = "night"; $bgcol="#696868"; $foncol="white";}
				else{$pic = "evening"; $bgcol="#fce99d"; $foncol="#787775";}
			?>
			<div id="promo_cntn" style="opacity:0.15; background-color:<?php echo $bgcol?>; color:<?php echo $foncol?>">
				<div style="width:50%; float:left; padding-top:40px; ">
					<center>
					<img src="<?php echo base_url()?>assets/img/general/wsaweb.png">
					<div style="color:grey; font-size:20px">New Version Release</div>
					</center>
				</div>
				<div style="width:50%; float:left; padding-left:60px; overflow:hidden; position:relative;">
					<div style="-webkit-filter: grayscale(40%) blur(0px); opacity:0.4;">
						<img height="434px" src="<?php echo base_url()?>assets/img/general/<?php echo $pic?>.jpg">
					</div>
					<div style="position:absolute; top:15%; width:100%; margin:0 auto;">
						<center>
						<div style="font-size:54px"><?php echo $today->format('l');?></div>
						<div style="font-size:94px; margin-top:-20px;"><?php echo $today->format('d');?></div>
						<div style="font-size:64px; margin-top:-45px;"><?php echo $today->format('M');?></div>
						<div style="font-size:54px; margin-top:-30px;"><?php echo $today->format('Y');?></div>
						</center>
					</div>
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
		<div style="display:none; position:relative; color:white" id="wrap_detail">
			<div style="height:100%;">
				<img id="header_detail" src="">
			</div>
			<div style="padding:20px;">
				<?php for($i=1;$i<=7;$i++){?>
					<div class="list_group_anchor" id="CB<?php echo $i?>">
						<div>
							<h2 style="margin-bottom:0px"><a style="color:white" href="<?php echo base_url()?>profile/show/directorate/<?php echo 'CB'.$i?>">CORPORATE BANKING <?php echo $i?></a></h2>
							<span style="font-size:14px"><?php echo $anc_atr['CB'.$i]['dept']?> Department <?php echo count($anchor[$i])?> Anchor</span><br><br>
						</div>
						<?php 
							$dept=''; 
							foreach($anchor[$i] as $member){
								if($dept != $member['anc']->code_dept){ if($dept){echo "</div>";}?>
									<div style="float:left; width:<?php echo (100/$anc_atr['CB'.$i]['dept']) ?>%; padding-right:20px">
									<h4 style="margin-bottom:0px">DEPARTMENT <?php echo $member['anc']->dept;?></h4>
									<span style="font-size:12px"><?php echo dept_name($member['anc']->code_dept)?></span><hr style="margin:10px 0 10px 0;">
									
								<?php $dept =  $member['anc']->code_dept;}?>								
								<div><a style="color:white" href="<?php echo base_url()?>profile/show/anchor/<?php echo $member['anc']->id?>">
									<?php echo $member['anc']->name?></a>
								</div>
								<?php if($member['anc']->is_group_holding){
									foreach($member['member'] as $child){?>
										<div style="padding-left:15px; font-size:13px">
											<a style="color:white" href="<?php echo base_url()?>profile/show/anchor/<?php echo $child->id?>">
											<?php echo $child->name?></a>
										</div>
								<?php }}?>
						<?php }?></div>
						<div style="clear:both"></div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
	<!--<div>
		<h3 style="padding: 0 10px 0 10px;">Daftar 76 Anchor Client</h3>
		<div>
			<?php for($j=1;$j<=7;$j++){ $atr = $anc_atr['CB'.$j]; $cb = "CB".$j; $img = $cb.".png";?>
			<div style="float:left; width:14.28%">
				<img style="width:100%; height:100px" src="<?php echo base_url()?>assets/img/general/<?php echo $cb?>.png">
				<h3>CB <?php echo $j?></h3>
			</div>
			<?php }?>
		</div>
	</div>-->
	<div id="group_group_div" style="width:100%; height:180px; overflow-y:hidden; color:white;">
		<?php for($j=1;$j<=7;$j++){ $atr = $anc_atr['CB'.$j]; $cb = "CB".$j; $img = $cb.".png";?>
			<div class="group_div">
				<div style="position:relative">
					<div style="height:180px;">
						<img id="header_group" src="<?php echo base_url()?>assets/img/general/<?php echo $cb?>.png">
					</div>
					<a href="#" onclick="choose_detail('<?php echo $atr['color']?>','<?php echo $img?>','<?php echo $cb?>')" style="color:<?php echo $atr['color']?>;" class="group_name">
						<span style="font-size:20px;">CORPORATE BANKING <?php echo $j?></span><br>
						<span><?php echo $atr['dept']?> Department <?php echo count($anchor[$j])?> Anchor</span>
					</a>
				</div>
			</div>
		<?php }?>
		<div class="group_div">
			<center style="margin-top:15%">
			<a style="color:black" href="#" onclick="restart_page()">
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
	  	$( "#promo_cntn" ).animate({
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
		
		});$("#group_group_div").animate({
			height: "180",
		}, 300);
	}
	function restart_page(){
		$('#promo_center').css('display','block');
		$('#wrap_detail').css('display','none');
		$('#detail_group').css('background','white');
		close_group();
	}
	function choose_detail(bg_color,bg_pic,group){
		$(".list_group_anchor").css('display','none');
		$('#promo_center').css('display','none');
		close_group();
		$('#detail_group').css('background',bg_color);
		$('#wrap_detail').css('display','block');
		$("#header_detail").attr("src","<?php echo base_url()?>assets/img/general/"+bg_pic);
		$("#"+group).css('display','block');
	}
</script>