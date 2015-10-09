<?php 
	$user = $this->session->userdata('userdb');
?>
<style>
	.header_top a{
		color:white;
	}
	.header_top a:hover{
		color:white;
	}
	.header_top{
		width:100%; background-color:#3f3f3f; padding:15px 20px 0 30px; height:50px; top:0; left:0;
		position:fixed; opacity:0.9; z-index:999;
	}
	.menu_header{
		font-size:16px; 
		color:white !important; 
		margin: 0 15px 0 15px;
		padding:0px !important;
		opacity:1 !important;
	}
	.menu_header:hover{
		color:white;
	}
	.menu_header.btn.disabled{
		color:#8f8f8f !important;
	}
</style>
<?php 
	$contr = $this->uri->segment(1);
	$func = $this->uri->segment(2);
?>
<div class="header_top">
	<div style="float:left; width:30%; color:white">
		<form method="post" action="<?php echo base_url()?>anchor/change_report_month">
			<?php $rpttime = $this->session->userdata('rpttime'); $lsttime = $this->session->userdata('lsttime');?>
			<!--<label style="margin-right:20px">Bulan laporan:</label>-->
			<input type="hidden" name="last_url" value="<?php echo uri_string();?>">
			<select class="btn-wsa-grey" id="mth" name="report_month" style="width:150px">
				<?php for($i=1;$i<=/*$lsttime['month']*/12;$i++){?>
						<option value="<?php echo $i?>" <?php if($rpttime['month'] == $i){echo "selected";}?>><?php echo get_month_full_name($i)?></option>
				<?php }?>
			</select>
			<select class="btn-wsa-grey" id="year_chg" name="report_year" style="width:70px">
				<option value="2013" <?php if($rpttime['year'] == 2014){echo "selected";}?>>2013</option>
				<option value="2014" <?php if($rpttime['year'] == 2014){echo "selected";}?>>2014</option>
				<option value="2015" <?php if($rpttime['year'] == 2015){echo "selected";}?>>2015</option>
			</select>
			<input type="submit" class="btn btn-xs btn-default" value="Ubah" style="background-color:#737373; border-color:#737373; color:white;">
		</form>
	</div>
	<div style="float:left; width:50%; text-align:center">
		<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST']?>/cbic" class="menu_header btn btn-link ">CBIC</a>
		<a href="<?php echo base_url()?>" class="menu_header btn btn-link <?php echo get_disabled($contr,'fund')?>">Home</a>
		<a href="<?php echo base_url()?>profile/show/directorate/CB" class="menu_header btn btn-link <?php echo get_disabled($contr,'fund')?>">Group Analysis</a>
		<a href="<?php echo base_url()?>scorecard/show/CB" class="menu_header btn btn-link <?php echo get_disabled($contr,'loan')?>">Anchor Analysis</a>
		<a href="<?php echo base_url()?>scorecard/product/CASA" class="menu_header btn btn-link <?php echo get_disabled($contr,'fee')?>">Product Analysis</a>
		
	</div>
	<div class="dropdown" style="float:left; text-align:right; width:20%;">
		<button style="color:white;" class="btn btn-link btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
			<span class="glyphicon glyphicon-user"></span> <span style="font-size:13px"><?php echo $user['name']?></span>
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" style="right:0; left:auto;" role="menu" aria-labelledby="dropdownMenu1">
		<li role="presentation" class="dropdown-header">Account</li>
		<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()?>user/form_password">Change Password</a></li>
		<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()?>user/logout">Logout</a></li>
		<?php if($user['role']=='admin'){?>
		<li class="divider"></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()?>anchor/form_input_file">Input File</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()?>user/">User Management</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()?>user/user_log">User Log</a></li>
		<?php }?>
	  </ul>
	</div><div style="clear:both"></div>
</div>
