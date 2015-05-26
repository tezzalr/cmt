<?php 
	function calculate_array($array, $incknd, $xsell){
		$arrres = array();
		$arrres['wl_ly'] = 0;
		$arrres['in_ly'] =  0;
		$arrres['wl'] = 0;
		$arrres['in'] =  0;
		foreach ($array as $mmber){
			if($mmber == 'CASA'){$incknd = 'nii';}
			$prod = $mmber; $wal = $prod."_".$incknd; $inc = $prod."_inc";
			$arrres['wl_ly'] = $arrres['wl_ly']+$xsell['wal_ly']->$wal;
			$arrres['in_ly'] =  $arrres['in_ly']+$xsell['inc_ly'][$inc];
			$arrres['wl'] = $arrres['wl']+$xsell['wal']->$wal;
			$arrres['in'] =  $arrres['in']+$xsell['inc'][$inc];
		}
		if($arrres['wl_ly']){$arrres['sw_ly'] = $arrres['in_ly']/$arrres['wl_ly']*100;}
		else{$arrres['sw_ly'] = 0;}
		if($arrres['wl']){$arrres['sw'] = $arrres['in']/$arrres['wl']*100;}
		else{$arrres['sw'] = 0;}
		//$arrres['sw'] = $arrres['in']/$arrres['wl']*100;
		
		return $arrres;
	}
	function write_prod($array, $incknd, $xsell){
		foreach ($array as $mmber){
			$prod = $mmber; $wal = $prod."_".$incknd; $inc = $prod."_inc";
			
			if(!$xsell['wal_ly']->$wal){$sow_ly = 0;}
			else{$sow_ly = $xsell['inc_ly'][$inc]/$xsell['wal_ly']->$wal*100;}
			if(!$xsell['wal']->$wal){$sow = 0;}
			else{$sow = $xsell['inc'][$inc]/$xsell['wal']->$wal*100;}
			
			echo "<tr><td>".change_real_name($mmber)."</td>";
			echo "<td>".number_format($xsell['wal_ly']->$wal,2)."</td>";
			echo "<td>".number_format($xsell['inc_ly'][$inc],2)."</td>";
			echo "<td>".number_format($sow_ly,2)." %</td>";
			echo "<td>".number_format($xsell['wal']->$wal,2)."</td>";
			echo "<td>".number_format($xsell['inc'][$inc],2)."</td>";
			echo "<td>".number_format($sow,2)." %</td></tr>";
			
		}
	}
	$loanarr = array('WCL','IL','TR');
	$trxarr = array('FX', 'Trade', 'BG', 'OIR');
	$castrxarr = array('FX', 'Trade', 'BG', 'OIR', 'CASA');
	$loanres = calculate_array($loanarr, 'nii', $xsell);
	$trxres = calculate_array($trxarr, 'fbi', $xsell);
	$castrxres = calculate_array($castrxarr, 'fbi', $xsell);
	
?>
<?php echo $sidebar?>
<div id="" class="content">
	<?php echo $header?>
	<div>
		
		<h2>Transaction Cross Sell*</h2>
		<h4 style="color:grey;">Transaction Cross Sell* Tahun <?php echo date('Y')-1?> sebesar <?php if(!$loanres['sw_ly'] && $castrxres['sw_ly']){$ly_trx_sell_final = 10;}elseif(!$loanres['sw_ly']&&!$castrxres['sw_ly']){$ly_trx_sell_final = 0;}else{$ly_trx_sell_final = $castrxres['sw_ly']/$loanres['sw_ly'];} echo number_format($ly_trx_sell_final,1)?>
		dan menjadi <?php if(!$loanres['sw'] && $castrxres['sw']){$ty_trx_sell_final = 10;}elseif(!$loanres['sw']&&!$castrxres['sw']){$ty_trx_sell_final = 0;}else{$ty_trx_sell_final = $castrxres['sw']/$loanres['sw'];} echo number_format($ty_trx_sell_final,1)?>
		</h4>
		<span style="font-size:11px;">*Transaction Cross Sell adalah SOW(CASA + Trx)/SOW Loan</span><br><br>
		
		<div style="width: 100%; margin: 0 auto;">
			<table class="table table-bordered" style="font-size:12px">
				<tr style="background-color:#08088A; color:white;"><th rowspan=2></th><center><th colspan=3><?php echo $year-1?></th><th colspan=3>YTD Annualized <?php echo $year?></th></center></tr>
				<tr style="background-color:#08088A; color:white;"><th>Wallet</th><th>Real</th><th>SOW</th><th>Wallet</th><th>Real</th><th>SOW</th>
				<tr style="background-color:#9FF781;"><td>Loan :</td><td><?php echo number_format($loanres['wl_ly'],2)?></td><td><?php echo number_format($loanres['in_ly'],2)?></td><td><?php echo number_format($loanres['sw_ly'],2)?> %</td><td><?php echo number_format($loanres['wl'],2)?></td><td><?php echo number_format($loanres['in'],2)?></td><td><?php echo number_format($loanres['sw'],2)?> %</td></tr>
				<?php write_prod($loanarr, 'nii', $xsell);?>
				<tr style="background-color:#9FF781;"><td>CASA + Trx :</td><td><?php echo number_format($castrxres['wl_ly'],2)?></td><td><?php echo number_format($castrxres['in_ly'],2)?></td><td><?php echo number_format($castrxres['sw_ly'],2)?> %</td><td><?php echo number_format($castrxres['wl'],2)?></td><td><?php echo number_format($castrxres['in'],2)?></td><td><?php echo number_format($castrxres['sw'],2)?> %</td></tr>
				<tr style="background-color:#BDBDBD;"><td>CASA</td><td><?php echo number_format($xsell['wal_ly']->CASA_nii,2)?></td><td><?php echo number_format($xsell['inc_ly']['CASA_inc'],2)?></td><td><?php echo number_format($xsell['sow_ly'][16],2)?> %</td><td><?php echo number_format($xsell['wal']->CASA_nii,2)?></td><td><?php echo number_format($xsell['inc']['CASA_inc'],2)?></td><td><?php echo number_format($xsell['sow'][16],2)?> %</td></tr>
				<tr style="background-color:#BDBDBD;"><td>Transaction (Trx)</td><td><?php echo number_format($trxres['wl_ly'],2)?></td><td><?php echo number_format($trxres['in_ly'],2)?></td><td><?php echo number_format($trxres['sw_ly'],2)?> %</td><td><?php echo number_format($trxres['wl'],2)?></td><td><?php echo number_format($trxres['in'],2)?></td><td><?php echo number_format($trxres['sw'],2)?> %</td></tr>
				<?php write_prod($trxarr, 'fbi', $xsell);?>
				<tr style="background-color:#08088A; color:white;"><td>Transaction cross sell</td><td></td><td></td><td><?php echo number_format($ly_trx_sell_final,2);?></td><td></td><td></td><td><?php echo number_format($ty_trx_sell_final,2)?></td></tr>
				
			</table>
		</div>
		
		<br>
	</div>
</div>