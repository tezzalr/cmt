<?php 
	$user = $this->session->userdata('userdb');
?>
<!--<style>
	.header_top a{
		color:#0B0A51;
	}
	.header_top a:hover{
		color:white;
	}
</style>
<div style="width:100%; background-color:#ffff; padding-left:60px; height:50px; padding-top:5px;">
	<div class="header_top" style="float:left; margin-right:20px;"><a href="<?php echo base_url()?>anchor">Anchor</a></div>
	<div class="header_top" style="float:left; margin-right:20px;"><a href="<?php echo base_url()?>product/top_transaksi/CASA">Produk</a></div>
	<div class="header_top" style="float:left; margin-right:20px;"><a href="<?php echo base_url()?>monthly/share_anchor">Monthly Report</a></div>
	<div class="header_top" style="float:left; margin-right:20px;"><a href="<?php echo base_url()?>update/activity_wall">Activity Update</a></div>
	<div class="header_top" style="float:right; margin-right:20px;"><a href="<?php echo base_url()?>user/logout">Logout</a></div>
	
	<?php if($user){?>
		<div class="header_top" style="float:right; margin-right:20px;"><a href="<?php echo base_url()?>user/input_user"><?php echo $user['name']?></a></div>
	<?php }?>
	<?php if($user['role']=="admin"){?>
		<div class="header_top" style="float:right; margin-right:20px;"><a href="<?php echo base_url()?>user/input_user">User</a></div>
	<?php }?>
	
	<div style="clear:both"></div>
</div>
<div style="float:right; padding:5px 25px 5px 5px;">
<form method="post" action="<?php echo base_url()?>anchor/change_report_month">
	<?php $rpttime = $this->session->userdata('rpttime'); $lsttime = $this->session->userdata('lsttime');?>
	<label style="margin-right:20px">Bulan laporan:</label>
	<input type="hidden" name="last_url" value="<?php echo uri_string();?>">
	<select id="mth" name="report_month" style="width:150px">
		<?php for($i=1;$i<=$lsttime['month'];$i++){?>
				<option value="<?php echo $i?>" <?php if($rpttime['month'] == $i){echo "selected";}?>><?php echo get_month_full_name($i)?></option>
		<?php }?>
	</select>
	<input type="submit" class="btn btn-xs btn-default" value="Ubah" style="background-color:#0B0A51; border-color:#0B0B61; color:white;">
</form>

</div><div style="clear:both"></div>
<hr style="margin: 0">
-->
<style>
	.header_top a{
		color:#0B0A51;
	}
	.header_top a:hover{
		color:white;
	}
	.header_top{
		width:100%; background-color:#eda32b; padding:15px 20px 0 30px; height:50px; top:0; left:0;
		position:fixed; opacity:0.9; z-index:99999999;
	}
</style>

<div class="header_top">
	<div style="float:left">
		<span style="">
			<!--<img height=20px src="<?php echo base_url()?>assets/img/general/font-logo.png">-->
		</span>
		<form method="post" action="<?php echo base_url()?>anchor/change_report_month">
	<?php $rpttime = $this->session->userdata('rpttime'); $lsttime = $this->session->userdata('lsttime');?>
	<label style="margin-right:20px">Bulan laporan:</label>
	<input type="hidden" name="last_url" value="<?php echo uri_string();?>">
	<select class="btn-wsa-grey" id="year_chg" name="report_year" style="width:60px">
		<option value="2014" <?php if($rpttime['year'] == 2014){echo "selected";}?>>2014</option>
		<option value="2015" <?php if($rpttime['year'] == 2015){echo "selected";}?>>2015</option>
	</select>
	<select class="btn-wsa-grey" id="mth" name="report_month" style="width:150px">
		<?php for($i=1;$i<=/*$lsttime['month']*/12;$i++){?>
				<option value="<?php echo $i?>" <?php if($rpttime['month'] == $i){echo "selected";}?>><?php echo get_month_full_name($i)?></option>
		<?php }?>
	</select>
	<input type="submit" class="btn btn-xs btn-default" value="Ubah" style="background-color:#737373; border-color:#737373; color:white;">
</form>
	</div>
	<div style="float:right">
		<span class="glyphicon glyphicon-user"></span> <span style="font-size:13px"><?php echo $user['name']?></span>
	</div>
</div>
