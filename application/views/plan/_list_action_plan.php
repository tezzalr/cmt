<div>
	<?php foreach($plans as $plan){?>
		<a href="#" onclick="show_update(<?php echo $plan->id?>)"><h4><?php echo $plan->action?></h4></a>
		<div style="font-size:12px; color:grey;">
			<span style="float:left">by: <?php echo $plan->name?></span>
			
			<span style="float:right">
				<button class="btn btn-warning  btn-xs" onclick=""><span class="glyphicon glyphicon-pencil"></span></button>
				<button class="btn btn-danger btn-xs" onclick=""><span class="glyphicon glyphicon-trash"></span></button>
			</span>
			<span style="float:right; margin-right:10px"><?php echo date("d M Y - h:i", strtotime($plan->created))?></span>
			<div style="clear:both"></div>
		</div>
		<hr>
	<?php }?>
	
	<!--<div style="padding-left:20px;">
		<div>
			<span style="color:grey; font-size:12px;">Progress : </span>
			<p>Presentasi dari Sales Transaction Banking</p>
		</div>
		<div>
			<span style="color:grey; font-size:12px;">Issue/Next Step :</span>
			<p>Presentasi dari Sales Transaction Banking</p>
		</div>
		<div>
			<span style="color:grey; font-size:12px;">Support Needed :</span>
			<p>IT dan Sales</p>
		</div>
		<div>
			<span style="color:grey; font-size:12px;">Due Date :</span>
			<p>25 Mei 2014</p>
		</div>
		<div>
			<span style="color:grey; font-size:12px;">PIC :</span>
			<p>Ade dan Devi</p>
		</div>
	</div>
	<hr>-->
</div>