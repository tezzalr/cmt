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
	<hr style="margin:10px 0 10px 0;">
	<div>
		<div>
			<span style="color:#eda32b" class="glyphicon glyphicon-signal" aria-hidden="true"></span> : Progress
			<span style="color:#eda32b; margin-left:10px" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> : Issues
			<span style="color:#eda32b; margin-left:10px" class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> : Next Step & Support Needed
			<span style="color:#eda32b; margin-left:10px" class="glyphicon glyphicon-calendar" aria-hidden="true"></span> : Due Date
			<span style="color:#eda32b; margin-left:10px" class="glyphicon glyphicon-user" aria-hidden="true"></span> : PIC
			<br><br>
		</div>
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
								<div>
									<button type="button" class="btn-link" style="color:#eda32b; margin:0px; padding:0px;" onclick="toggle_visibility('prd_<?php echo $stg['strategy']->product?>');"><?php echo count($stg['ap'])?> Action Plan</button>
								</div>
								<div style="display:none;" id="prd_<?php echo $stg['strategy']->product?>"><hr style="border-style:dashed; margin:10px 0 10px 0;">
									<?php foreach($stg['ap'] as $ap){?>
										<div style="margin-bottom:8px">
											<div>
												<div style="float:left; width:5%;">
													<?php 
														if($ap['ap']->status=="Done"){$circ = "completed";}
														elseif($ap['ap']->status=="On Progress"){$circ = "inprog";}
														elseif($ap['ap']->status=="Has Issued"){$circ = "delay";}
														else{$circ = "notyet";}
													?>
													<span class="circle circle-<?php echo $circ?> circle-sm text-left"></span>
												</div>
												<div style="float:left; width:95%">
													<button type="button" class="btn-link" style="color:black; margin:0px; padding:0px; text-align:left" onclick="toggle_visibility('ap_<?php echo $ap['ap']->id?>');"><?php echo $ap['ap']->action?></button>
												</div><div style="clear:both"></div>
											</div>
											<div style="display:none; margin-top:10px" id="ap_<?php echo $ap['ap']->id?>">
												<div>
													<div style="float:left; width:9%"><span style="color:#eda32b" class="glyphicon glyphicon-signal" aria-hidden="true"></span></div>
													<div style="float:left; width:91%"><?php if($ap['last_update']){echo $ap['last_update']->progress;}?></div>
													<div style="clear:both"></div>
												</div>
												<div>
													<div style="float:left; width:9%"><span style="color:#eda32b" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></div>
													<div style="float:left; width:91%"><?php if($ap['last_update']){echo $ap['last_update']->issue;}?></div>
													<div style="clear:both"></div>
												</div>
												<div>
													<div style="float:left; width:9%"><span style="color:#eda32b" class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></div>
													<div style="float:left; width:91%"><?php if($ap['last_update']){echo $ap['last_update']->support;}?></div>
													<div style="clear:both"></div>
												</div>
												<?php if($ap['last_update']){?><div style="font-size:11px; color:grey; margin-top:5px" class="pull-right">updated: <?php 
													$date = date("Y-m-d", strtotime($ap['last_update']->created));
													if($date != "-0001-11-30"){echo date("d M Y", strtotime($ap['last_update']->created));}?></div><?php }?><div style="clear:both"></div>
											</div>
											<hr>
										</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if($fouryes==4){?><div style="clear:both"></div></div><?php $fouryes=0;}?>
		<?php $fouryes++;}?>
	</div>
</div>