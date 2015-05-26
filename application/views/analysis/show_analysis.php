<?php echo $sidebar?>
<div class="content">
	<h2 style="margin-bottom:0px;"><?php if($anchor){echo $anchor->name; $id_nas=$anchor->id; $kind="anchor";}else{echo $dir['name']; $id_nas=$dir['code']; $kind="directorate";}?></h2>
	<span style="font-size:18px; color:#bbb">Anchor Analysis</span>
	<hr style="margin:10px 0 10px 0;">
	<div>
		<div>
			<h4>Ring 1 Strategy</h4>
			<div>
				<?php echo $anchor->name?> merupakan nasabah <?php echo $mineral?> dan Berada pada Ring <?php echo $ring?><br>
				Gas : <?php echo $anchor->gas?><br>
				SoW : <?php echo $sow*100?><br>
				Trx X-Sell : <?php echo $trx?><br>
				CASA X-Sell : <?php echo $casx*100?>
			</div><hr>
			<?php if($ring>1){?>
			<div>
				Untuk menjadi Bank terpenting nasabah perlu adanya peningkatan pada : <br>
				<?php if($sow < 0.3){?> 
					Sow <br>
					<div style="margin-left:10px;">
						<p>Perlu adanya peningkatan share pada produk-produk di bawah ini menjadi minimal 30% :</p>
						<table class="table"><tr><td>Produk</td><td>Wallet</td><td>Realisasi</td><td>SoW</td><td>Potensi</td></tr>
						<?php for($i=16;$i<=30;$i++){ if(($all_sow[$i]['sow']<30) && $all_sow[$i]['wallet']){?>
							<tr>
							<td><?php echo change_real_name(return_prod_name($i-15))?></td>
							<td><?php echo $all_sow[$i]['wallet']?></td>
							<td><?php echo $all_sow[$i]['realz']?></td>
							<td><?php echo $all_sow[$i]['sow']?>%</td>
							<td><?php echo $all_sow[$i]['wallet']-$all_sow[$i]['realz']?></td>
							</tr>
						<?php }}?>
						</table>
					</div>
				<?php }?>
				<?php if($trx < 1){?> 
					Transaction X-Sell <br>
					<div style="margin-left:10px;">
						<p>Saat ini share loan sebesar <?php echo $all_sow[32]['sow']?>%. Perlu adanya peningkatan share Transaksi dan CASA sebesar <?php echo $all_sow[32]['sow']-$all_sow[34]['sow']?>% atau Rp <?php echo ($all_sow[32]['sow']-$all_sow[34]['sow'])/100*$all_sow[34]['wallet']?> Miliar.</p>
						<div>
							<p>Berikut potensi dari masing-masing produk Transaksi dan CASA (dalam Miliar Rupiah)</p>
							<?php 
								$arr_trx = array(1,7,9,10,11); 
								echo "<table class=\"table\"><tr><td>Produk</td><td>Wallet</td><td>Realisasi</td><td>SoW</td><td>Potensi</td></tr>";
								foreach($arr_trx as $ar){
									echo "<tr>".
									"<td>".change_real_name(return_prod_name($ar))."</td>".
									"<td>".$all_sow[$ar+15]['wallet']."</td>".
									"<td>".$all_sow[$ar+15]['realz']."</td>".
									"<td>".$all_sow[$ar+15]['sow']."%</td>".
									"<td>".($all_sow[$ar+15]['wallet']-$all_sow[$ar+15]['realz'])."</td>";
									
									echo "</tr>";
								}
								echo "</table>";
							?>
						</div>
					</div>
				<?php }?>
				<?php if($casx < 0.1){?> 
					CASA X-Sell <br>
					<div style="margin-left:10px;">
						<p>CASA X-Sell saat ini adalah <?php echo $casx*100?>%. Perlu adanya peningkatan volume CASA agar CASA X-Sell menjadi minimal 10%.</p>
						<table class="table">
							<tr><td>Loan</td><td>CASA</td><td>CASA X-Sell</td><td>CASA to be</td><td>GAP</td></tr>
							<tr>
								<td><?php echo $all_sow[31]['realz']?></td>
								<td><?php echo $all_sow[1]['realz']?></td>
								<td><?php echo $casx*100?>%</td>
								<td><?php echo $all_sow[31]['realz']*0.1?></td>
								<td><?php echo $all_sow[31]['realz']*0.1-$all_sow[1]['realz']?></td>
							</tr>
						</table>
						<p>Agar mencapai CASA X-Sell sebesar 10%, perlu adanya peningkatan CASA sebesar Rp <?php echo $all_sow[31]['realz']*0.1-$all_sow[1]['realz']?> Miliar.</p>
					</div>
				<?php }?>
			</div>
			<?php }?>
		</div>
	</div>
</div>