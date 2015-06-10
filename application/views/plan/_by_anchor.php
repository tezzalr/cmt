<?php $prev=''; $prev_iss = ""; if($arr_by_anchor){
	foreach($arr_by_anchor as $send){?>
			<?php if($prev!=$send['plan']['plan']->anchor_name){?>
				<?php if($prev!=''){?>
					</div></div>
				<?php }?>
				<div class="panel panel-wsa">
					<div class="panel-heading" style="color:#eda32b;"><?php echo $send['plan']['plan']->anchor_name;?></div>
					<div class="panel-body" style="padding:5px 10px 5px 10px;" id="body-info">	
				<?php }?>
						<div style="margin-bottom:5px;">	
							<?php if($prev_iss && ($prev_iss!=$send['prod']['name']) && ($prev==$send['plan']['plan']->anchor_name)){?>
							<div style="padding-bottom:10px; border-top:1px dotted #bababa; padding-top:10px">
							<?php }else{?>
							<div style="padding-bottom:10px; padding-top:0px">
							<?php }?>
								<?php if(!$prev_iss || ($prev_iss && ($prev_iss!=$send['prod']['name']))){?>
									<span style="font-size:18px; color:#a1a1a1;"><?php echo $send['prod']['name']; ?></span>
								<?php }?>
								<div style="padding-left:20px; font-size:14px;">
									<b>										
										<div style="float:left; width:1.5%">
											<?php 
												if($send['plan']['plan']->status=="Done"){$circ = "completed";}
												elseif($send['plan']['plan']->status=="On Progress"){$circ = "inprog";}
												elseif($send['plan']['plan']->status=="Has Issued"){$circ = "delay";}
												else{$circ = "notyet";}
											?>
											<span class="circle circle-<?php echo $circ?> circle-sm text-left"></span>
										</div>
										<div style="float:left; width:98%">
											<a style="color:black" 
											href="<?php echo base_url()?>plan/show/anchor/<?php echo $send['plan']['plan']->anchor_id.'/'.$send['prod']['id'].'/'.$send['plan']['plan']->id?>">
											<?php echo $send['plan']['plan']->action?></a>
										</div><div style="clear:both"></div>
									</b>
									<div style="padding-left:30px;">
										<div style="float:left; width:3%">
											<span style="color:#eda32b;" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
										</div>
										<div style="float:left; width:97%">
											<?php echo $send['plan']['update']->issue?>
										</div><div style="clear:both"></div>
										<div style="font-size:10px; color:#aaaaaa">updated :
										<?php $date = date("Y-m-d", strtotime($send['plan']['update']->created));
												if($date != "-0001-11-30"){echo date("n M Y", strtotime($send['plan']['update']->created));}?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php $prev = $send['plan']['plan']->anchor_name; $prev_iss=$send['prod']['name'];?>		
	<?php }?>
	</div></div>
<?php }?>
					