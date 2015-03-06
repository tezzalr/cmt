
<div id="" class="container no_pad">
	<div class="no_pad" style="border-bottom: 1px solid #ccc; margin-bottom: 20px;">
		<h2><img style="width:100px; float:right; margin-top:-20px;" src="<?php echo base_url()?>assets/img/general/logo.jpg"><a href="<?php echo base_url()?>realization/show/directorate/">Anchor Client Bank Mandiri</a></h2>
		<span style="font-size:20px"><?php echo count($anchor['cor'])+count($anchor['ib'])+count($anchor['com']);?> Anchor <div style="clear:both"></span></div>
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
				<div style="width:33%; float:left; margin-bottom:20px;">
				<h5 style="color:#EBB22D"><a style="color:orange" href="<?php echo base_url()?>realization/show/directorate/<?php echo $code?>"><?php echo $anchr->group."</a></h5>"; $grup = $anchr->group; }?>
				
				<a href="<?php echo base_url()?>realization/show/anchor/<?php echo $anchr->id?>"><span><?php echo $anchr->name?></span><br></a>
			<?php }?></div><div style="clear:both"></div>
			</div>
		</div>
		<!--<div style="width: 30%; margin-right:5px; float:left;"><h4><a href="<?php echo base_url()?>realization/show/directorate/IB">Institutional Banking</a></h4><?php echo count($anchor['ib']);?> Anchor Di Institutional Banking<br><br>
			<div style="font-size:11px;">
			<?php $grup=''; foreach ($anchor['ib'] as $anchr){?>
				<?php if($grup!=$anchr->group){?>
				<?php
					if($anchr->group=='INSTITUTIONAL BANKING I'){$code='IB1';}
					elseif($anchr->group=='CORPORATE BANKING VI'){$code='CB7';}
				?>
				<hr><h5 style="color:#EBB22D"><a style="color:orange" href="<?php echo base_url()?>realization/show/directorate/<?php echo $code?>"><?php echo $anchr->group; $grup = $anchr->group; }?></a></h5>
				
				<a href ="<?php echo base_url()?>realization/show/anchor/<?php echo $anchr->id?>"><span><?php echo $anchr->name?></span><br></a>
			<?php }?>
			</div>
		</div>
		<div style="width: 40%; float:left; padding-left:10px;"><h4><a href="<?php echo base_url()?>realization/show/directorate/CBB">Commercial and Business Banking</a></h4><?php echo count($anchor['com']);?> Anchor Di Commercial and Business Banking<br><br>
			<div style="font-size:11px;">
			<?php $grup=''; foreach ($anchor['com'] as $anchr) {?>
				<?php if($grup!=$anchr->group){?>
				<?php
					if($anchr->group=='JAKARTA COMMERCIAL SALES'){$code='JCS';}
					elseif($anchr->group=='REGIONAL COMMERCIAL SALES I'){$code='RCS1';}
					elseif($anchr->group=='REGIONAL COMMERCIAL SALES II'){$code='RCS2';}
				?>
				<hr><h5 style="color:#EBB22D"><a style="color:orange" href="<?php echo base_url()?>realization/show/directorate/<?php echo $code?>"><?php echo $anchr->group; $grup = $anchr->group; }?></a></h5>
				
				<a href ="<?php echo base_url()?>realization/show/anchor/<?php echo $anchr->id?>"><span><?php echo $anchr->name?></span><br></a>
			<?php }?>
			</div>
		</div>-->
		<div style="clear:both"></div>
	</div><br><br>
</div>
