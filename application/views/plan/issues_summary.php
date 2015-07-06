<style>
	.small-title{
		font-size:12px;
		color:#bbb;
	}
</style>
<?php echo $sidebar?>
<div class="content">
	<h2 style="margin-bottom:0px;">ISSUES SUMMARY - By <?php echo $this->uri->segment(5)?></h2>
	<span style="font-size:18px; color:#bbb"><?php if($anchor){echo $anchor->name; $id_nas=$anchor->id; $kind="anchor";}else{echo $dir['name']; $id_nas=$dir['code']; $kind="directorate";}?></span>
	<span class="pull-right" style="margin-right:20px;">
		<select class="btn-wsa" name="product" onchange="if (this.value) window.location.href=this.value">
			<option value="Product" <?php if($this->uri->segment(5)=="Product"){echo "selected";}?>>By Product</option>
			<option value="Anchor" <?php if($this->uri->segment(5)=="Anchor"){echo "selected";}?>>By Anchor</option>
		</select>
	</span>
	<hr style="margin:10px 0 10px 0;">
	<div>
		<div style="padding:0 15px 0 5px" style="width:100%">
			<?php echo $by_cntn?>
		</div>
	</div>
</div>