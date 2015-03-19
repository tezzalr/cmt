<style>
	.img_blur {
		background-image: url("<?php echo base_url()?>assets/img/general/bgblur.png");
		background-size: 100%;
		height:100%;
		width:100%;
	}
	.element_top{
		position:relative;
		top:23%;
		color:white;
		padding-left:40px
	}
	.bottom_part{
		width:20%;
		float:left;
	}
	.bottom_part p{
		font-size:15px;
		width:140px;
		margin-top:10px;
	}
	.bottom_part h4{
		margin-bottom:20px;
	}
</style>
<div style="" class="img_blur">
	<div style="height:65%" class="element_top">
		<h1 style="font-size:55px; margin:0px; margin-bottom:30px">Welcome to WSA Web</h1>
		<p style="width:48%; font-size:16px; margin-bottom:40px;">Website ini berisi data Account Planning nasabah Anchor Client Bank Mandiri. Dalam website ini kami menyediakan data dan analisis dari target, pencapaian serta action plan untuk tiap-tiap Nasabah Anchor Client dari waktu ke waktu.</p>
		<a href="<?php echo base_url()?>anchor" class="btn btn-info btn-lg">Daftar Anchor</a>
	</div>
	<div style="height:35%; background-color:white; padding-top:20px">
		<div class="bottom_part"><center>
			<h4 style="color:#27ae60">Realization</h4>
			<img height='80px' src="<?php echo base_url()?>assets/img/general/real.png">
			<p>See your realization for each product.</p>
		</center></div>
		<div class="bottom_part"><center>
			<h4 style="color:#f1c40f">Income Composition</h4>
			<img height='80px' src="<?php echo base_url()?>assets/img/general/income.png">
			<p>See your Wholesale and Alliance income composition.</p>
		</center></div>
		<div class="bottom_part"><center>
			<h4 style="color:#e74c3c">Share of Wallet</h4>
			<img height='80px' src="<?php echo base_url()?>assets/img/general/wallet.png">
			<p>Determine your focus based on the potential.</p>
		</center></div>
		<div class="bottom_part"><center>
			<h4 style="color:#2980b9">Product Trend</h4>
			<img height='80px' src="<?php echo base_url()?>assets/img/general/trend.png">
			<p>Analyze your product trend line.</p>
		</center></div>
		<div class="bottom_part"><center>
			<h4 style="color:#8e44ad">Action Plan</h4>
			<img height='80px' src="<?php echo base_url()?>assets/img/general/action.png">
			<p>Monitor your Action Plan.</p>
		</center></div>
		<div style="clear:both"></div>
	</div>
</div>