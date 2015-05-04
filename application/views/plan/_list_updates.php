<div>
	<?php foreach($updates as $update){?>	
		<div style="padding-left:20px;">
			<div class="pull-right" style="font-size:12px; color:grey">Updated : <?php 
					$date = date("Y-m-d", strtotime($update->created));
				if($date != "-0001-11-30"){echo date("d M Y", strtotime($update->created));}?>
			</div><div style="clear:both"></div>
			<div>
				<span style="color:grey; font-size:12px;">Progress : </span>
				<p><?php echo $update->progress?></p>
			</div>
			<div>
				<span style="color:grey; font-size:12px;">Issue :</span>
				<p><?php echo $update->issue?></p>
			</div>
			<div>
				<span style="color:grey; font-size:12px;">Next Step / Support Needed :</span>
				<p><?php echo $update->support?></p>
			</div>
			<!--<div>
				<span style="color:grey; font-size:12px;">Due Date :</span>
				<p><?php 
					$date = date("Y-m-d", strtotime($update->created));
				if($date != "-0001-11-30"){echo date("d M Y", strtotime($update->created));}?></p>
			</div>
			<div>
				<span style="color:grey; font-size:12px;">PIC :</span>
				<p><?php echo $update->pic?></p>
			</div>-->
		</div>
		<hr>
	<?php }?>
</div>