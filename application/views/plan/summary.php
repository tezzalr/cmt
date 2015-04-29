<style>
	.small-title{
		font-size:12px;
		color:#bbb;
	}
</style>
<?php echo $sidebar?>
<div class="content">
	<h2 style="margin-bottom:0px;"><?php if($anchor){echo $anchor->name; $id_nas=$anchor->id; $kind="anchor";}else{echo $dir['name']; $id_nas=$dir['code']; $kind="directorate";}?></h2>
	<span style="font-size:18px; color:#bbb">Summary Strategy & Action Plan</span>
	<div class="pull-right" style="padding-right:10px;">
		<a href="<?php echo base_url()?>plan/edit_strategy/<?php echo $anchor->id?>" class="btn btn-success btn-sm">Edit Strategy</a>
	</div>
	<hr>
	<div>
		<?php $fouryes=1; foreach($strategies as $stg){?>
			<?php if($fouryes==1){?><div><?php }?>
			<div style="width:25%; float:left; padding:0 5px 0 5px">
				<div class="panel panel-wsa">
					<div class="panel-heading"><a href="<?php echo base_url()?>plan/show/anchor/<?php echo $anchor->id."/".$stg['strategy']->product?>"><?php echo $stg['name_prod']?></a></div>
					<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
						<div>
							<div class="small-title pull-right" style="font-size:11px">Strategy</div>
							<div style="clear:both"></div>
							<center><p>
								<?php echo $stg['strategy']->strategy?>
							</p></center>
						</div><hr style="margin:0 0 10px 0">
						<div>
							<div class="small-title pull-right" style="font-size:11px">Action Plan</div>
							<div style="clear:both"></div>
							<div>
								<div><a href="#" style="color:#eda32b;" onclick="toggle_visibility('prd_<?php echo $stg['strategy']->product?>');"><?php echo count($stg['ap'])?> Action Plan</a></div>
								<div style="display:none;" id="prd_<?php echo $stg['strategy']->product?>"><hr style="border-style:dashed">
									<?php foreach($stg['ap'] as $ap){?>
										<div style="margin-bottom:8px">
											<div>
												<a style="color:black" href="#" onclick="toggle_visibility('ap_<?php echo $ap['ap']->id?>');"><?php echo $ap['ap']->action?></a>
											</div>
											<div style="display:none; margin-top:10px" id="ap_<?php echo $ap['ap']->id?>">
												<div>
													<div style="float:left; width:20px"><span style="color:#eda32b" class="glyphicon glyphicon-signal" aria-hidden="true"></span></div>
													<div style="float:left"><?php if($ap['last_update']){echo $ap['last_update']->progress;}?></div>
													<div style="clear:both"></div>
												</div>
												<div>
													<div style="float:left; width:20px"><span style="color:#eda32b" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></div>
													<div style="float:left"><?php if($ap['last_update']){echo $ap['last_update']->issue;}?></div>
													<div style="clear:both"></div>
												</div>
												<div>
													<div style="float:left; width:20px"><span style="color:#eda32b" class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
													<div style="float:left"><?php if($ap['last_update']){echo $ap['last_update']->support;}?></div>
													<div style="clear:both"></div>
												</div>
												<div>
													<div style="float:left; width:20px"><span style="color:#eda32b" class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
													<div style="float:left"><?php if($ap['last_update']){echo $ap['last_update']->due_date;}?></div>
													<div style="clear:both"></div>
												</div>
												<div>
													<div style="float:left; width:20px"><span style="color:#eda32b" class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
													<div style="float:left"><?php if($ap['last_update']){echo $ap['last_update']->pic;}?></div>
													<div style="clear:both"></div>
												</div>
												<hr>
											</div>
										</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if($fouryes==4){?></div><?php }?>
		<?php $fouryes++;}?>
		<!--<div style="float:left"><h3 style="margin-top:0px">Summary Strategy & Action Plan</h3></div>
		<div style="float:right"><a href="<?php echo base_url()?>plan/edit_strategy/<?php echo $anchor->id?>" class="btn btn-success btn-sm">Edit Strategy</a></div>
		<div style="clear:both"></div>
		<div>
			<table class="table" style="font-size:13px">
				<?php foreach($strategies as $stg){?>
					<tr>
						<td width="10%"><a href="<?php echo base_url()?>plan/show/anchor/<?php echo $anchor->id."/".$stg['strategy']->product?>"><?php echo $stg['name_prod']?></td>
						<td width="25%">
							<div>
								<div class="small-title">Strategy</div>
								<div>
									<?php echo $stg['strategy']->strategy?>
								</div>
							</div><hr>
						</td>
						<td width="25%">
							<div>
								<div class="small-title">Action Plan</div>
								<div>
									<ul>
									<?php foreach($stg['ap'] as $ap){?>
										<li><?php echo $ap->action?></li>
									<?php }?>
									</ul>
								</div>
							</div>
						</td>
						<td width="15%">
							<div>
								<div class="small-title">Due Date</div>
								<div>
									20 February 2015
								</div>
								<hr>
							</div>
							<div>
								<div class="small-title">PIC</div>
								<div>
									Ade Shinta Ramadhani
								</div>
							</div>
						</td>
						<td width="25%">
							<div>
								<div class="small-title">Progress</div>
								<div>
								
								</div>
								<hr>
							</div>
							<div>
								<div class="small-title">Issue / Next Step</div>
								<div>
								
								</div>
								<hr>
							</div>
							<div>
								<div class="small-title">Support Needed</div>
								<div>
								
								</div>
							</div>
						</td>
					</tr>
				<?php }?>
			</table>
		</div>-->
	</div>
</div>