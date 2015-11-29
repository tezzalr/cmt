<style>
	.job-title{
		color:#b2b2b2;
		font-size:12px;
	}
	hr{
		margin:10px 0 10px 0;
	}
	.hide_temp_inc{
		padding-left:15px;
		border-bottom: 1px dotted #cacaca;
		display:none;
	}
	#anchor_menu .btn-link{
		color:black;
	}
</style>
<?php

	$income_ty = get_ws_income_month($rlz_ws,$month);
	
	$loan_income = $income_ty['loan'];
	$trx_income = $income_ty['trx'];
	//$trd_income = $income_ty['trd'];
	$lnfee_income = $income_ty['lnfee'];
	$otr_income = $income_ty['otr'];
	$tot = $income_ty['tot'];
	
	$trx_wallet = $wlt_ws->CASA_nii + $wlt_ws->FX_fbi + $wlt_ws->Trade_fbi + $wlt_ws->BG_fbi + + $wlt_ws->OIR_fbi;
	$loan_wallet = $wlt_ws->WCL_nii +  $wlt_ws->IL_nii +  $wlt_ws->SL_nii + $wlt_ws->TR_nii;
	
	if($trx_wallet){$trx_sow = ($trx_income+$rlz_ws->OIR_fbi - $rlz_ws->PWE_fbi - $rlz_ws->SCF_fbi)/$month*12/$trx_wallet/pow(10,9);}
	else{$trx_sow = 0;}
	if($loan_wallet){
	$loan_sow = ($loan_income+$rlz_ws->TR_nii)/$month*12/$loan_wallet/pow(10,9);
	}else{$loan_sow=0;}
	
?>
<div class="content" style="text-align:center; min-height:100%; background-color:white;">
	<img src="<?php echo base_url()?>assets/img/anchor/bpjs.jpg" style="height:120px;">
	<h1 style="font-size:42px;"><?php echo $anchor->name;?></h1>
	<div>
		<i>
		<div style="font-size:18px; color:#c3c3c3">Vision</div>
		<h3 style="margin-top:5px;">"Menjadi Badan penyelenggara Jaminan Sosial (BPJS) berkelas dunia, terpercaya, bersahabat dan unggul dalam Operasional dan Pelayanan"</h3>
		</i>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<h3>Key Sector BPJS</h3>
			<div>
			</div>
		</div>
		<div class="col-md-4">
			<h3>Key Companies</h3>
			<div style="text-align:left">
			</div>
		</div>
		<div class="col-md-4">
			<h3>Total Wholesale Income</h3>
			<div id="container_wsa" style="width: 100%; height:280px;"></div>
			<div>
				<hr>
				<div>
					<div><h5>Loans : <span class="pull-right">Rp <?php echo number_format($loan_income/pow(10,9),1,'.',',')?> M </span></h5></div>
					<div class="hide_temp_inc">
						<?php if($ty['CASA_inc']){?><div><h5>WCL : <span class="pull-right">Rp <?php echo number_format($ty['WCL_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['CASA_inc']){?><div><h5>IL : <span class="pull-right">Rp <?php echo number_format($ty['IL_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['CASA_inc']){?><div><h5>SL : <span class="pull-right">Rp <?php echo number_format($ty['SL_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['CASA_inc']){?><div><h5>TR : <span class="pull-right">Rp <?php echo number_format($ty['TR_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
					</div>
					
					<div><h5>Trx-CASA : <span class="pull-right">Rp <?php echo number_format($trx_income/pow(10,9),1,'.',',')?> M </span></h5></div>
					<div class="hide_temp_inc">
						<?php if($ty['CASA_inc']){?><div><h5>CASA : <span class="pull-right">Rp <?php echo number_format($ty['CASA_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['FX_inc']){?><div><h5>FX : <span class="pull-right">Rp <?php echo number_format($ty['FX_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['Trade_inc']){?><div><h5>Trade : <span class="pull-right">Rp <?php echo number_format($ty['Trade_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['BG_inc']){?><div><h5>BG : <span class="pull-right">Rp <?php echo number_format($ty['BG_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['SCF_inc']){?><div><h5>SCF : <span class="pull-right">Rp <?php echo number_format($ty['SCF_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['PWE_inc']){?><div><h5>PWE : <span class="pull-right">Rp <?php echo number_format($ty['PWE_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
						<?php if($ty['OIR_inc']){?><div><h5>OIR : <span class="pull-right">Rp <?php echo number_format($ty['OIR_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
					</div>
					<!--<div><h5>Trade Finance : <span class="pull-right">Rp <?php echo number_format($trd_income/pow(10,9),1,'.',',')?> M </span></h5></div>-->
					<div><h5>Loan Fee : <span class="pull-right">Rp <?php echo number_format($lnfee_income/pow(10,9),1,'.',',')?> M </span></h5></div>
					<div><h5>Others : <span class="pull-right">Rp <?php echo number_format($otr_income/pow(10,9),1,'.',',')?> M </span></h5></div>
					<div class="hide_temp_inc" style="border-bottom:0px">
						<?php if($ty['TD_inc']){?><div><h5>TD : <span class="pull-right">Rp <?php echo number_format($ty['TD_inc']/pow(10,9),2,'.',',')?> M </span></h5></div><?php }?>
					</div>
					<div style="border-top:1px dashed #ddd">
						<h4>
							<button class="btn-link" style="color:black; padding:0px" onclick="$('.hide_temp_inc').animate({'height':'toggle','opacity':'toggle'});">Total <span class="caret"></span></button>
							<span class="pull-right">Rp <?php echo number_format($tot/pow(10,9),2,'.',',')?> M </span>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="anchor_menu">
		<h2>Anchor Menu</h2>
		<div style="margin-top:20px;">
			<div style="width:20%; float:left;">
				<button class="btn btn-link" onclick="show_key_people()">
				<img src="<?php echo base_url()?>assets/img/icon/client - color.png" style="height:100px;">
				<h4>Key People</h4>
				</button>
			</div>
			<div style="width:20%; float:left;">
				<button class="btn btn-link" onclick="show_pic_bmri(<?php echo $anchor->id;?>)">
				<img src="<?php echo base_url()?>assets/img/icon/phonebook - color.png" style="height:100px;">
				<h4>PIC Bank Mandiri</h4>
				</button>
			</div>
			<div style="width:20%; float:left;">
				<button class="btn btn-link" onclick="show_lini_bisnis()">
				<img src="<?php echo base_url()?>assets/img/icon/shop - color.png" style="height:100px;">
				<h4>Lini Bisnis</h4>
				</button>
			</div>
			<div style="width:20%; float:left;">
				<a  href="<?php echo base_url()?>assets/upload/anchor/ppt.pdf">
				<img src="<?php echo base_url()?>assets/img/icon/map - color.png" style="height:100px;">
				<h4>Anchor Update</h4>
				</a>
			</div>
			<div style="width:20%; float:left;">
				<a href="<?php echo base_url()?>profile/show/anchor/2650">
				<img src="<?php echo base_url()?>assets/img/icon/highlight - color.png" style="height:100px;">
				<h4>Performance Highlight</h4>
				</a>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
		var chart;
	
		$(document).ready(function () {
		
			// Build the chart
			$('#container_wsa').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: true
				},
				legend: {
					enabled: false
				},
				title: {
					text: null
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							distance: 1,
							format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %',
							style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor), fontSize: "9px"
                    }
						},
						showInLegend: true
					}
				},
				series: [{
					type: 'pie',
					name: 'Income share',
					innerSize: '30%',
					data: [
						<?php if($loan_income){?>
						{name: 'Loan', y: <?php echo $loan_income?>, color:"#007aff"},
						<?php }if($trx_income){?>
						{name: 'Trx+CASA', y: <?php echo $trx_income?>, color:"#5ac8fa"},
						<?php }/*if($trd_income){?>
						{name: 'Trade Finance', y: <?php echo $trd_income?>, color:"grey"},
						<?php }*/if($lnfee_income){?>
						{name: 'Loan Fee', y: <?php echo $lnfee_income?>, color:"#b3b3b3"},
						<?php }if($otr_income){?>
						{name: 'Others', y: <?php echo $otr_income?>, color:"#d1d1d1"},
						<?php }?>
					]
				}]
			});
		});
	
	});
	
	function edit_sumdesc(){
		toggle_visibility('sumdesc_title');
		toggle_visibility('sumdesc_form');
	} 
	
	function show_key_people(){		
		bootbox.dialog({
			size: "large",
			backdrop: true,
			title: "Key People BPJS Ketenagakerjaan",
			message: "<img style=\"width:100%\" src=\"<?php echo base_url()?>assets/img/anchor/key people.png\"><br>"+
			"<img style=\"width:100%\" src=\"<?php echo base_url()?>assets/img/anchor/merah kuning ijo.png\">",
		
		});
	}
	
	function show_lini_bisnis(){		
		bootbox.dialog({
			size: "large",
			backdrop: true,
			title: "Model Bisnis BPJS Ketenagakerjaan",
			message: "<img style=\"width:100%\" src=\"<?php echo base_url()?>assets/img/anchor/business model.png\">",
		
		});
	}
	
	function show_pic_bmri(id){		
		$.ajax({
			type: "GET",
			url: config.base+"profile/get_pic_bmri",
			data: {id: id},
			dataType: 'json',
			cache: false,
			success: function(resp){
				if(resp.status==1){
					bootbox.dialog({
						backdrop: true,
						title: "PIC Salim di Bank Mandiri",
						message: resp.message,
  						
					});
				}else{}
			}
		});
	}
	
	function show_sector(){		
		$.ajax({
			type: "GET",
			url: config.base+"profile/get_sector",
			dataType: 'json',
			cache: false,
			success: function(resp){
				if(resp.status==1){
					bootbox.dialog({
						backdrop: true,
						title: "Kajian Sektor F&B",
						message: resp.message,
  						
					});
				}else{}
			}
		});
	}
</script>