<style>
	.small-title{
		font-size:12px;
		color:#bbb;
	}
</style>
<?php echo $sidebar?>
<div class="content">
	<h2 style="margin-bottom:0px;"><?php if($anchor){echo $anchor->name; $id_nas=$anchor->id; $kind="anchor";}else{echo $dir['name']; $id_nas=$dir['code']; $kind="directorate";}?></h2>
	<span style="font-size:18px; color:#bbb">Issues Summary</span>
	<hr style="margin:10px 0 10px 0;">
	<div>
		<div style="float:left; padding:0 5px 0 5px">
			<?php if($arr_send){foreach($arr_send as $send){?>
				<div>
					<div><?php echo $send['prod']['id'];?></div>
					<div>
						<?php $prev=''; foreach($send['plans'] as $plan){?>
							<div>
								<?php 
									if($prev!=$plan['plan']->anchor_name){
										echo $plan['plan']->anchor_name; 
										$prev=$plan['plan']->anchor_name;
									}
								?>
							</div>
							<div style="padding-left:20px">
								<?php echo $plan['plan']->status?> <?php echo $plan['plan']->action?>
								<div style="padding-left:30px">
									<?php echo $plan['update']->issue?>
								</div>
							</div>
						<?php }?>
					</div>
				</div><hr>
			<?php }}?>
		</div>
	</div>
</div>