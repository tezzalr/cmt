<?php
	if($anchor){$data_a = "anchor"; $data_b=$anchor->id;}
	elseif($dir){$data_a = "directorate"; $data_b=$dir['code'];}
	else{$data_a = ""; $data_b="";}
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
		<?php if($anchor || $dir){?>
		<hr style="margin:0 0 0 0">
		<ul class="nav" id="side-menu" style="padding-left:20px">
			<li>
				<a href="<?php echo base_url()?>profile/show/<?php echo $data_a?>/<?php echo $data_b?>"><i class="fa fa-lightbulb-o fa-fw"></i> Summary</a>
			</li>
			<li>
				<a href="<?php echo base_url()?>product_analysis/show/<?php echo $data_a?>/<?php echo $data_b?>/CASA"><i class="fa fa-table fa-fw"></i> Product Analysis</a>
			</li>
			<li>
				<a href="<?php echo base_url()?>income/detail/<?php echo $data_a?>/<?php echo $data_b?>"><i class="fa fa-table fa-fw"></i> Income Analysis</a>
			</li>
			<!--<li>
				<a href="<?php echo base_url()?>report/relation_income/<?php echo $data_a?>/<?php echo $data_b?>"><i class="fa fa-sitemap fa-fw"></i> Dashboard</a>
			</li>-->
			<li>
				<?php if($data_a == "directorate"){?>
					<a href="<?php echo base_url()?>plan/issues_summary/directorate/<?php echo $data_b?>/Product"><i class="fa fa-dashboard fa-fw"></i> Activity Analysis</a>
				<?php }else{?>
					<a href="<?php echo base_url()?>plan/summary/anchor/<?php echo $data_b?>"><i class="fa fa-dashboard fa-fw"></i> Activity Analysis</a>
				<?php }?>
			</li>
			<li>
				<a href="<?php echo base_url()?>value_chain/show/anchor/<?php echo $data_b?>"><i class="fa fa-dashboard fa-fw"></i> Value Chain</a>
			</li>
			<li>
				<a href="<?php echo base_url()?>analysis/show/<?php echo $data_a?>/<?php echo $data_b?>"><i class="fa fa-edit fa-fw"></i> Review</a>
			</li>
			<?php if($data_a == "directorate"){?>
			<li>
				<a href="<?php echo base_url()?>scorecard/show/<?php echo $data_b?>"><i class="fa fa-lightbulb-o fa-fw"></i> Scorecard</a>
			</li>
			<?php }?>
		</ul>
		<?php }?>
		<ul class="nav" id="side-menu">
			<!--<li>
				<a href="<?php echo base_url()?>product/top_transaksi/CASA"><i class="fa fa-lightbulb-o fa-fw"></i> Product</a>
			</li>-->
		</ul>
		<hr style="margin:0 0 0 0">
	</div>
</div>