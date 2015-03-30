
<div id="" class="container no_pad">
	<div class="no_pad" style="border-bottom: 1px solid #ccc; margin-bottom: 20px;">
		<h2><img style="width:100px; float:right; margin-top:-20px;" src="<?php echo base_url()?>assets/img/general/logo.jpg"><a href="<?php echo base_url()?>realization/show/directorate/">Anchor Client Bank Mandiri</a></h2>
		<!--<span style="font-size:20px"><?php echo count($anchor['cor'])+count($anchor['ib'])+count($anchor['com']);?> Anchor <div style="clear:both"></span></div>-->
		<br>
	</div>
	<!--<div id="container_all" style="min-width: 310px; width: 100%; height: 500px; margin: 0;"></div><br><br>-->
	<div>
		<div style="width: 100%; height: 100%; float:left; margin-right:20px; padding-right:5px;"><h4><a href="<?php echo base_url()?>realization/show/directorate/CB">Corporate Banking</a></h4><?php echo count($anchor['cor']);?> Anchor Di Corporate Banking<br><hr>
			<div style="font-size:11px;">
			<?php $grup=''; foreach ($anchor['cor'] as $anchr) {?>
				<?php if($grup!=$anchr->group){ 
					if($anchr->group=='CORPORATE BANKING IV'){$code='CB4';}
					elseif($anchr->group=='CORPORATE BANKING I'){$code='CB1';}
					elseif($anchr->group=='CORPORATE BANKING II'){$code='CB2';}
					elseif($anchr->group=='CORPORATE BANKING III'){$code='CB3';}
					elseif($anchr->group=='CORPORATE BANKING V'){$code='CB5';}
					elseif($anchr->group=='CORPORATE BANKING VI'){$code='CB6';}
					elseif($anchr->group=='CORPORATE BANKING VII'){$code='CB7';}?>
				
				<?php 
					if($grup){
						echo "</div>";
					}
				?>
				<div style="width:20%; float:left; margin-bottom:20px;">
				<h5 style="color:#EBB22D"><a style="color:orange" href="<?php echo base_url()?>report/relation_income/directorate/<?php echo $code?>"><?php echo $anchr->group."</a></h5>"; $grup = $anchr->group; }?>
				
				<a href="<?php echo base_url()?>report/relation_income/anchor/<?php echo $anchr->id?>"><span><?php echo $anchr->name?></span><br></a>
			<?php }?></div><div style="clear:both"></div>
			</div>
		</div>
		<div style="clear:both"></div>
	</div><br><br>
</div>
