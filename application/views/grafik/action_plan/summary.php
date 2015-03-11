<style>
	.small-title{
		font-size:12px;
		color:#bbb;
	}
</style>
<div id="" class="container no_pad">
	<?php echo $header?>
	<div style="float:left"><h3 style="margin-top:0px">Summary Strategy & Action Plan</h3></div>
	<div style="float:right"><a href="<?php echo base_url()?>plan/edit_strategy/<?php echo $id?>" class="btn btn-success btn-sm">Edit Strategy</a></div>
	<div style="clear:both"></div>
	<div>
		<table class="table" style="font-size:13px">
			<?php foreach($strategies as $stg){?>
				<tr>
					<td width="10%"><a href="<?php echo base_url()?>plan/show/anchor/<?php echo $id."/".$stg['strategy']->product?>"><?php echo $stg['name_prod']?></td>
					<td width="50%">
						<div>
							<div class="small-title">Strategy</div>
							<div>
								<?php echo $stg['strategy']->strategy?>
							</div>
						</div><hr>
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
								Sudah mengunjungi nasabah pada 2 Feb 2015 bersama Dania dari TB
							</div>
							<hr>
						</div>
						<div>
							<div class="small-title">Issue / Next Step</div>
							<div>
								Aplikasi tidak dapat diinstall di tempat nasabah
							</div>
							<hr>
						</div>
						<div>
							<div class="small-title">Support Needed</div>
							<div>
								Aplikasi yang canggih yang dapat bertahan 2 hari 2 malam dalam melayani nasabah
							</div>
						</div>
					</td>
				</tr>
			<?php }?>
		</table>
	</div>
</div>