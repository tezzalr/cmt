<?php
	if($anchor){$data_a = "anchor"; $data_b=$anchor->id;}
	else{$data_a = "directorate"; $data_b=$dir['code'];}
?>
<div class="sidebar_nav_left">
	<div style="margin-top:0px;">
		<div style="padding-left:20px">
			<div style="margin-bottom:10px; margin-left:0px;"><!--<img src="<?php echo base_url();?>assets/img/general/wsaweb.png" alt="..." style="height:80px;">--></div>
			<div style="font-size:13px;"></div>
			<div style="font-size:11px;"></div>
		</div>
		<hr style="margin:10px 0 0 0">
		<ul class="nav" id="side-menu">
			<li>
				<a href="<?php echo base_url()?>"><i class="fa fa-lightbulb-o fa-fw"></i> Daftar Anchor</a>
			</li>
		</ul>
		<hr style="margin:0 0 0 0">
		<ul class="nav" id="side-menu">
			<li>
				<a href="<?php echo base_url()?>profile/show/<?php echo $data_a?>/<?php echo $data_b?>"><i class="fa fa-lightbulb-o fa-fw"></i> Summary</a>
			</li>
			<li>
				<a href="<?php echo base_url()?>product_analysis/show/<?php echo $data_a?>/<?php echo $data_b?>/CASA/volume"><i class="fa fa-table fa-fw"></i> Product Analysis</a>
			</li>
			<li>
				<a href="<?php echo base_url()?>initiative/segment"><i class="fa fa-sitemap fa-fw"></i> Dashboard</a>
			</li>
			<li>
				<a href="<?php echo base_url()?>program/list_programs/Wholesale"><i class="fa fa-dashboard fa-fw"></i> Action Plan</a>
			</li>
			<li>
				<a href="<?php echo base_url()?>logact"><i class="fa fa-edit fa-fw"></i> Review</a>
			</li>
		</ul>
		<hr style="margin:0 0 0 0">
		<ul class="nav" id="side-menu">
			<li>
				<a href="<?php echo base_url()?>"><i class="fa fa-lightbulb-o fa-fw"></i> Report</a>
			</li>
		</ul>
		<hr style="margin:0 0 0 0">
	</div>
</div>