<?php if($arr_send){foreach($arr_send as $send){?>
	<div class="panel panel-wsa">
		<div class="panel-heading"><?php echo $send['prod']['name'];?></div>
		<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">
			<div>
				<div>
					<?php $prev=''; foreach($send['plans'] as $plan){?>
						<div style="margin-bottom:5px;">	
							<?php if($prev!=$plan['plan']->anchor_name){ if($prev!=""){echo "<div style=\"margin-top:20px; border-top:1px dotted #bababa; padding-top:10px\">";}else{echo "<div>";}?>
								<span style="font-size:18px; color:#eda32b;"><?php echo $plan['plan']->anchor_name; ?></span></div>
							<?php $prev=$plan['plan']->anchor_name;} ?>

							<div style="padding-left:20px; font-size:14px;"><b>										
								<div style="float:left; width:1.5%">
									<?php 
										if($plan['plan']->status=="Done"){$circ = "completed";}
										elseif($plan['plan']->status=="On Progress"){$circ = "inprog";}
										elseif($plan['plan']->status=="Has Issued"){$circ = "delay";}
										else{$circ = "notyet";}
									?>
									<span class="circle circle-<?php echo $circ?> circle-sm text-left"></span>
								</div>
								<div style="float:left; width:98%">
									<a style="color:black" href="<?php echo base_url()?>plan/show/anchor/<?php echo $plan['plan']->anchor_id.'/'.$send['prod']['name']?>"><?php echo $plan['plan']->action?></a>
								</div><div style="clear:both"></div>
							</div></b>
							<div style="padding-left:50px;">
								<div style="float:left; width:3%">
									<span style="color:#eda32b;" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
								</div>
								<div style="float:left; width:97%">
									<?php echo $plan['update']->issue?>
								</div><div style="clear:both"></div>
								<div style="font-size:10px; color:#aaaaaa">updated :
								<?php $date = date("Y-m-d", strtotime($plan['update']->created));
										if($date != "-0001-11-30"){echo date("n M Y", strtotime($plan['update']->created));}?>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
<?php }}?>
					