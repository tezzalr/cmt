<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admins
 *
 * @author Maulnick
 */
   	
   	 
	function get_direktorat_where($direktorat,$model){
		if($direktorat == 'CB'){
			$model->db->where("(`group` = 'CORPORATE BANKING I' OR `group` = 'CORPORATE BANKING II' OR `group` = 'CORPORATE BANKING III' OR `group` = 'CORPORATE BANKING IV' OR `group` = 'CORPORATE BANKING V' OR `group` = 'CORPORATE BANKING VI' OR `group` = 'CORPORATE BANKING VII')");
		}
		elseif($direktorat == 'IB'){
			$model->db->where("(`group` = 'INSTITUTIONAL BANKING I' OR `group` = 'INSTITUTIONAL BANKING II')");
		}
		elseif($direktorat == 'CBB'){
			$model->db->where("(`group` = 'JAKARTA COMMERCIAL SALES' OR `group` = 'REGIONAL COMMERCIAL SALES I' OR `group` = 'REGIONAL COMMERCIAL SALES II' )");
		}
		elseif($direktorat == 'CB1'){
			$model->db->where("(`group` = 'CORPORATE BANKING I')");
		}
		elseif($direktorat == 'CB2'){
			$model->db->where("(`group` = 'CORPORATE BANKING II')");
		}
		elseif($direktorat == 'CB3'){
			$model->db->where("(`group` = 'CORPORATE BANKING III')");
		}
		elseif($direktorat == 'CB4'){
			$model->db->where("(`group` = 'CORPORATE BANKING IV')");
		}
		elseif($direktorat == 'CB5'){
			$model->db->where("(`group` = 'CORPORATE BANKING V')");
		}
		elseif($direktorat == 'CB6'){
			$model->db->where("(`group` = 'CORPORATE BANKING VI')");
		}
		elseif($direktorat == 'CB7'){
			$model->db->where("(`group` = 'CORPORATE BANKING VII')");
		}
		elseif($direktorat == 'JCS'){
			$model->db->where("(`group` = 'JAKARTA COMMERCIAL SALES')");
		}
		elseif($direktorat == 'RCS1'){
			$model->db->where("(`group` = 'REGIONAL COMMERCIAL SALES I')");
		}
		elseif($direktorat == 'RCS2'){
			$model->db->where("(`group` = 'REGIONAL COMMERCIAL SALES II')");
		}
		
		$model->db->where("show_anc = 1");
	}
	
	function get_type_select_month($type,$model){
    	if($type == 'wholesale'){
    		$model->db->select('month, SUM(CASA_vol) as CASA_vol,
								SUM(CASA_nii) as CASA_nii,
								SUM(CASA_fbi) as CASA_fbi,
								SUM(TD_vol) as TD_vol,
								SUM(TD_nii) as TD_nii,
								SUM(WCL_vol) as WCL_vol,
								SUM(WCL_nii) as WCL_nii,
								SUM(WCL_fbi) as WCL_fbi,
								SUM(IL_vol) as IL_vol,
								SUM(IL_nii) as IL_nii,
								SUM(IL_fbi) as IL_fbi,
								SUM(SL_vol) as SL_vol,
								SUM(SL_nii) as SL_nii,
								SUM(SL_fbi) as SL_fbi,
								SUM(FX_vol) as FX_vol,
								SUM(FX_fbi) as FX_fbi,
								SUM(SCF_vol) as SCF_vol,
								SUM(SCF_fbi) as SCF_fbi,
								SUM(Trade_vol) as Trade_vol,
								SUM(Trade_fbi) as Trade_fbi,
								SUM(PWE_vol) as PWE_vol,
								SUM(PWE_fbi) as PWE_fbi,
								SUM(TR_vol) as TR_vol,
								SUM(TR_nii) as TR_nii,
								SUM(BG_vol) as BG_vol,
								SUM(BG_fbi) as BG_fbi,
								SUM(OIR_vol) as OIR_vol,
								SUM(OIR_fbi) as OIR_fbi,
								SUM(OW_vol) as OW_vol,
								SUM(OW_nii) as OW_nii,
								SUM(OW_fbi) as OW_fbi,
								SUM(ECM_vol) as ECM_vol,
								SUM(ECM_fbi) as ECM_fbi,
								SUM(DCM_vol) as DCM_vol,
								SUM(DCM_fbi) as DCM_fbi,
								SUM(MA_vol) as MA_vol,
								SUM(MA_fbi) as MA_fbi,');
    	}else{
    		$model->db->select('month, SUM(WM_vol) as WM_vol,
								SUM(WM_nii) as WM_nii,
								SUM(DPLK_vol) as DPLK_vol,
								SUM(DPLK_fbi) as DPLK_fbi,
								SUM(PCD_vol) as PCD_vol,
								SUM(PCD_nii) as PCD_nii,
								SUM(VCCD_vol) as VCCD_vol,
								SUM(VCCD_nii) as VCCD_nii,
								SUM(VCCD_fbi) as VCCD_fbi,
								SUM(VCL_vol) as VCL_vol,
								SUM(VCL_nii) as VCL_nii,
								SUM(VCL_fbi) as VCL_fbi,
								SUM(VCLnDF_vol) as VCLnDF_vol,
								SUM(VCLnDF_nii) as VCLnDF_nii,
								SUM(VCLnDF_fbi) as VCLnDF_fbi,
								SUM(Micro_Loan_vol) as Micro_Loan_vol,
								SUM(Micro_Loan_nii) as Micro_Loan_nii,
								SUM(Micro_Loan_fbi) as Micro_Loan_fbi,
								SUM(MKM_vol) as MKM_vol,
								SUM(MKM_nii) as MKM_nii,
								SUM(KPR_vol) as KPR_vol,
								SUM(KPR_nii) as KPR_nii,
								SUM(Auto_vol) as Auto_vol,
								SUM(Auto_nii) as Auto_nii,
								SUM(CC_vol) as CC_vol,
								SUM(CC_nii) as CC_nii,
								SUM(EDC_vol) as EDC_vol,
								SUM(EDC_fbi) as EDC_fbi,
								SUM(ATM_vol) as ATM_vol,
								SUM(ATM_fbi) as ATM_fbi,
								SUM(AXA_vol) as AXA_vol,
								SUM(AXA_fbi) as AXA_fbi,
								SUM(MAGI_vol) as MAGI_vol,
								SUM(MAGI_fbi) as MAGI_fbi,
								SUM(retail_vol) as retail_vol,
								SUM(retail_fbi) as retail_fbi,
								SUM(cicil_Emas_vol) as cicil_Emas_vol,
								SUM(cicil_Emas_fbi) as cicil_Emas_fbi,
								SUM(OA_vol) as OA_vol,
								SUM(OA_nii) as OA_nii,
								SUM(OA_fbi) as OA_fbi,');
    	}
    	
    }
    
    function get_type_select($type,$model){
    	if($type == 'wholesale'){
    		$model->db->select('SUM(CASA_vol) as CASA_vol,
								SUM(CASA_nii) as CASA_nii,
								SUM(CASA_fbi) as CASA_fbi,
								SUM(TD_vol) as TD_vol,
								SUM(TD_nii) as TD_nii,
								SUM(WCL_vol) as WCL_vol,
								SUM(WCL_nii) as WCL_nii,
								SUM(WCL_fbi) as WCL_fbi,
								SUM(IL_vol) as IL_vol,
								SUM(IL_nii) as IL_nii,
								SUM(IL_fbi) as IL_fbi,
								SUM(SL_vol) as SL_vol,
								SUM(SL_nii) as SL_nii,
								SUM(SL_fbi) as SL_fbi,
								SUM(FX_vol) as FX_vol,
								SUM(FX_fbi) as FX_fbi,
								SUM(SCF_vol) as SCF_vol,
								SUM(SCF_fbi) as SCF_fbi,
								SUM(Trade_vol) as Trade_vol,
								SUM(Trade_fbi) as Trade_fbi,
								SUM(PWE_vol) as PWE_vol,
								SUM(PWE_fbi) as PWE_fbi,
								SUM(TR_vol) as TR_vol,
								SUM(TR_nii) as TR_nii,
								SUM(BG_vol) as BG_vol,
								SUM(BG_fbi) as BG_fbi,
								SUM(OIR_vol) as OIR_vol,
								SUM(OIR_fbi) as OIR_fbi,
								SUM(OW_vol) as OW_vol,
								SUM(OW_nii) as OW_nii,
								SUM(OW_fbi) as OW_fbi,
								SUM(ECM_vol) as ECM_vol,
								SUM(ECM_fbi) as ECM_fbi,
								SUM(DCM_vol) as DCM_vol,
								SUM(DCM_fbi) as DCM_fbi,
								SUM(MA_vol) as MA_vol,
								SUM(MA_fbi) as MA_fbi,');
    	}else{
    		$model->db->select('SUM(WM_vol) as WM_vol,
								SUM(WM_nii) as WM_nii,
								SUM(DPLK_vol) as DPLK_vol,
								SUM(DPLK_fbi) as DPLK_fbi,
								SUM(PCD_vol) as PCD_vol,
								SUM(PCD_nii) as PCD_nii,
								SUM(VCCD_vol) as VCCD_vol,
								SUM(VCCD_nii) as VCCD_nii,
								SUM(VCCD_fbi) as VCCD_fbi,
								SUM(VCL_vol) as VCL_vol,
								SUM(VCL_nii) as VCL_nii,
								SUM(VCL_fbi) as VCL_fbi,
								SUM(VCLnDF_vol) as VCLnDF_vol,
								SUM(VCLnDF_nii) as VCLnDF_nii,
								SUM(VCLnDF_fbi) as VCLnDF_fbi,
								SUM(Micro_Loan_vol) as Micro_Loan_vol,
								SUM(Micro_Loan_nii) as Micro_Loan_nii,
								SUM(Micro_Loan_fbi) as Micro_Loan_fbi,
								SUM(MKM_vol) as MKM_vol,
								SUM(MKM_nii) as MKM_nii,
								SUM(KPR_vol) as KPR_vol,
								SUM(KPR_nii) as KPR_nii,
								SUM(Auto_vol) as Auto_vol,
								SUM(Auto_nii) as Auto_nii,
								SUM(CC_vol) as CC_vol,
								SUM(CC_nii) as CC_nii,
								SUM(EDC_vol) as EDC_vol,
								SUM(EDC_fbi) as EDC_fbi,
								SUM(ATM_vol) as ATM_vol,
								SUM(ATM_fbi) as ATM_fbi,
								SUM(AXA_vol) as AXA_vol,
								SUM(AXA_fbi) as AXA_fbi,
								SUM(MAGI_vol) as MAGI_vol,
								SUM(MAGI_fbi) as MAGI_fbi,
								SUM(retail_vol) as retail_vol,
								SUM(retail_fbi) as retail_fbi,
								SUM(cicil_Emas_vol) as cicil_Emas_vol,
								SUM(cicil_Emas_fbi) as cicil_Emas_fbi,
								SUM(OA_vol) as OA_vol,
								SUM(OA_nii) as OA_nii,
								SUM(OA_fbi) as OA_fbi,');
    	}
    	
    }
    
    function return_ws_or_al($product){
    	$ws = array("CASA","TD","WCL","IL","SL","TR","FX","SCF","Trade","BG","OIR","PWE","ECM","DCM","MA");
    	if(in_array($product,$ws)){return "wholesale";}
    	else{return "alliance";}
    }
    
    function return_prod_name($i){
    	if($i==1){return "CASA";}
    	elseif($i==2){return "TD";}
    	elseif($i==3){return "WCL";}
    	elseif($i==4){return "IL";}
    	elseif($i==5){return "SL";}
    	elseif($i==6){return "TR";}
    	elseif($i==7){return "FX";}
    	elseif($i==8){return "SCF";}
    	elseif($i==9){return "Trade";}
    	elseif($i==10){return "BG";}
    	elseif($i==11){return "OIR";}
    	elseif($i==12){return "PWE";}
    	elseif($i==13){return "ECM";}
    	elseif($i==14){return "DCM";}
    	elseif($i==15){return "MA";}
    	elseif($i==16){return "LMF";}
    	elseif($i==17){return "SF";}
    	elseif($i==18){return "OW_nii";}
    	elseif($i==19){return "OW_fbi";}
    }
    
    function return_prod_name_al($i){
    	if($i==1){return "WM";}
    	elseif($i==2){return "DPLK";}
    	elseif($i==3){return "PCD";}
    	elseif($i==4){return "VCCD";}
    	elseif($i==5){return "VCL";}
    	elseif($i==6){return "VCLnDF";}
    	elseif($i==7){return "Micro_Loan";}
    	elseif($i==8){return "MKM";}
    	elseif($i==9){return "KPR";}
    	elseif($i==10){return "Auto";}
    	elseif($i==11){return "CC";}
    	elseif($i==12){return "EDC";}
    	elseif($i==13){return "ATM";}
    	elseif($i==14){return "AXA";}
    	elseif($i==15){return "MAGI";}
    	elseif($i==16){return "retail";}
    	elseif($i==17){return "cicil_Emas";}
    	elseif($i==18){return "OA_nii";}
    	elseif($i==19){return "OA_fbi";}
    }
       
    function change_real_name($initial){
    	if($initial == "CASA"){return "CASA";}
    	elseif($initial ==  "TD"){return "Time Deposit";}
		elseif($initial ==  "WCL"){return 'Working Capital Loan';}
		elseif($initial ==  "IL"){return 'Investment Loan';}
		elseif($initial ==  "SL"){return 'Structured Loan';}
		elseif($initial ==  "TR"){return 'Trust Receipt';}
		elseif($initial ==  "FX"){return 'FX & Derivatives';}
		elseif($initial ==  "SCF"){return 'Supply Chain Financing';}
		elseif($initial ==  "Trade"){return 'Trade Services';}
		elseif($initial ==  "BG"){return 'Bank Guarantee';}
		elseif($initial ==  "OIR"){return 'Outgoing Intl Remittance';}
		elseif($initial ==  "PWE"){return 'PWE non L/C';}
		elseif($initial ==  "ECM"){return 'ECM';}
		elseif($initial ==  "DCM"){return 'DCM';}
		elseif($initial ==  "MA"){return 'M&A';}
		elseif($initial ==  "LMF"){return 'Loan Maintenance Fee';}
		elseif($initial ==  "SF"){return 'Syndication Fee';}
		elseif($initial ==  "OW_nii"){return 'NII Others';}
		elseif($initial ==  "OW_fbi"){return 'FBI Others';}
		elseif($initial ==  "VC"){return 'Value Chain';}
		elseif($initial ==  "WM"){return 'Wealth Management';}
		elseif($initial ==  "DPLK"){return 'DPLK';}
		elseif($initial ==  "PCD"){return 'Payroll CASA Deposit';}
		elseif($initial ==  "VCCD"){return 'VC CASA Deposit';}
		elseif($initial ==  "VCL"){return 'VC Lending';}
		elseif($initial ==  "VCLnDF"){return 'VC Lending non DF';}
		elseif($initial ==  "Micro_Loan"){return 'Micro Loan';}
		elseif($initial ==  "MKM"){return 'MKM & KTA';}
		elseif($initial ==  "KPR"){return 'KPR & MGM';}
		elseif($initial ==  "Auto"){return 'AUTO & 2W Loan';}
		elseif($initial ==  "EDC"){return 'EDC';}
		elseif($initial ==  "ATM"){return 'ATM';}
		elseif($initial ==  "AXA"){return 'Life Insurance - AXA';}
		elseif($initial ==  "retail"){return 'Retail Trading - MANSEK';}
		elseif($initial ==  "Micro"){return 'Micro';}
		elseif($initial ==  "CC"){return 'Credit Card';}
		elseif($initial ==  "CM"){return 'Cash Management';}
		elseif($initial ==  "cicil_Emas"){return 'Cicil Emas';}
		elseif($initial ==  "DPLK"){return 'DPLK';}
		elseif($initial ==  "MAGI"){return 'General Insurance - MAGI';}
		elseif($initial ==  "MTF"){return 'Mandiri Tunas Finance';}
		elseif($initial ==  "Mansek"){return 'Mandiri Sekuritas';}
    }
    
    function get_tot_income($ws, $al, $month,$pow){
    	$arr_tot_inc = array('ws'=>0,'al'=>0,'tot'=>0,'each_ws'=>0,'each_al'=>0);
    	if($ws && $al){
    	$arr_tot_inc['ws'] = ((($ws->WCL_nii +  $ws->IL_nii +  $ws->SL_nii + $ws->CASA_nii + $ws->TR_nii + $ws->OW_nii + $ws->TD_nii + 
    					$ws->CASA_fbi + $ws->FX_fbi + $ws->SCF_fbi + $ws->Trade_fbi + $ws->PWE_fbi + $ws->BG_fbi + $ws->OIR_fbi + $ws->OW_fbi)/$month*12) + $ws->IL_fbi + $ws->SL_fbi + $ws->WCL_fbi)/pow(10,$pow);
    	$arr_tot_inc['ms'] = ($ws->ECM_fbi + $ws->DCM_fbi + $ws->MA_fbi)/pow(10,$pow);				
    	$arr_tot_inc['al'] = ($al->WM_nii + $al->DPLK_fbi + $al->PCD_nii + $al->VCCD_nii + $al->VCCD_fbi + $al->VCL_nii + $al->VCL_fbi+ $al->VCLnDF_nii + $al->VCLnDF_fbi + $al->Micro_Loan_nii + $al->Micro_Loan_fbi + 
					$al->MKM_nii + $al->KPR_nii + $al->Auto_nii + $al->CC_nii + $al->EDC_fbi + $al->ATM_fbi + $al->AXA_fbi + $al->MAGI_fbi + $al->retail_fbi + $al->cicil_Emas_fbi)/$month*12/pow(10,$pow);
		
		$arr_tot_inc['tot'] = $arr_tot_inc['ws'] + $arr_tot_inc['ms'] + $arr_tot_inc['al'];
		$arr_tot_inc['each_ws'] = $ws;
		$arr_tot_inc['each_al'] = $al;
		}
		return $arr_tot_inc;
    }
    function get_ws_income_month($rlz_ws,$month){
    	if($rlz_ws){
			$income['loan'] = $rlz_ws->WCL_nii +  $rlz_ws->IL_nii +  $rlz_ws->SL_nii+$rlz_ws->TR_nii;
			$income['trx'] = $rlz_ws->CASA_nii + $rlz_ws->FX_fbi + $rlz_ws->SCF_fbi + $rlz_ws->Trade_fbi + $rlz_ws->PWE_fbi + $rlz_ws->BG_fbi+$rlz_ws->OIR_fbi;
			//$income['trd'] = $rlz_ws->TR_nii+$rlz_ws->OIR_fbi;
			$income['lnfee'] = $rlz_ws->WCL_fbi +  $rlz_ws->IL_fbi +  $rlz_ws->SL_fbi;
			$income['otr'] = $rlz_ws->TD_nii +  $rlz_ws->CASA_fbi +  $rlz_ws->OW_fbi;
			$income['tot'] = $income['loan']+$income['trx']+$income['lnfee']+$income['otr'];
			$income['tot_ytd'] = (($income['loan']+$income['trx']+$income['otr'])/$month*12)+$income['lnfee'];
		}
		else{
			$income['loan'] = 0;
			$income['trx'] = 0;
			//$income['trd'] = 0;
			$income['lnfee'] = 0;
			$income['otr'] = 0;
			$income['tot'] = 0;
			$income['tot_ytd'] = (($income['loan']+$income['trx']+$income['otr'])/$month*12)+$income['lnfee'];
		}
		return $income;
    }
    function get_direktorat_full_name($directorate){
    	if($directorate == 'CB'){$title = 'Corporate Banking';}
		elseif($directorate == 'IB'){$title = 'Institutional Banking';}
		elseif($directorate == 'CBB'){$title = 'Commercial and Bussines Banking';}
		elseif($directorate == 'CB1'){$title = 'CORPORATE BANKING I';}
		elseif($directorate == 'CB2'){$title = 'CORPORATE BANKING II';}
		elseif($directorate == 'CB3'){$title = 'CORPORATE BANKING III';}
		elseif($directorate == 'CB4'){$title = 'CORPORATE BANKING IV';}
		elseif($directorate == 'CB5'){$title = 'CORPORATE BANKING V';}
		elseif($directorate == 'CB6'){$title = 'CORPORATE BANKING VI';}
		elseif($directorate == 'CB7'){$title = 'CORPORATE BANKING VII';}
		elseif($directorate == 'JCS'){$title = 'JAKARTA COMMERCIAL SALES';}
		elseif($directorate == 'RCS1'){$title = 'REGIONAL COMMERCIAL SALES I';}
		elseif($directorate == 'RCS2'){$title = 'REGIONAL COMMERCIAL SALES II';}
		else{$title = 'BANKWIDE BANK MANDIRI';}
		
		return $title;
    }
    
    function get_group_attr(){
    	$anchor['CB1']['color'] = '#291400';
    	$anchor['CB2']['color'] = '#CCCC00';
    	$anchor['CB3']['color'] = 'red';
    	$anchor['CB4']['color'] = '#339933';
    	$anchor['CB5']['color'] = '#8E4524';
    	$anchor['CB6']['color'] = '#008AE6';
    	$anchor['CB7']['color'] = '#996633';
    	
    	$anchor['CB1']['dept'] = 6;
    	$anchor['CB2']['dept'] = 4;
    	$anchor['CB3']['dept'] = 3;
    	$anchor['CB4']['dept'] = 6;
    	$anchor['CB5']['dept'] = 4;
    	$anchor['CB6']['dept'] = 6;
    	$anchor['CB7']['dept'] = 6;
    	
    	return $anchor;
    }
    
    function dept_name($dept){
    	if($dept == 101){return 'Consumer Goods';}
    	elseif($dept == 102){return 'Chemical & Pharmaceutical';}
    	elseif($dept == 103){return 'Retailers';}
    	elseif($dept == 104){return 'Automotive';}
    	elseif($dept == 105){return 'Surabaya';}
    	elseif($dept == 106){return 'Semarang';}
    	elseif($dept == 201){return 'Infrastructure';}
    	elseif($dept == 202){return 'Construction';}
    	elseif($dept == 203){return 'Property';}
    	elseif($dept == 204){return 'Heavy Equipment & Materials';}
    	elseif($dept == 301){return 'Telecomunication';}
    	elseif($dept == 302){return 'Media & Technology';}
    	elseif($dept == 303){return 'Textile';}
    	elseif($dept == 401){return 'Plantation I';}
    	elseif($dept == 402){return 'Plantation II';}
    	elseif($dept == 403){return 'Plantation III';}
    	elseif($dept == 404){return 'Plantation IV';}
    	elseif($dept == 405){return 'Plantation V';}
    	elseif($dept == 406){return 'Medan';}
    	elseif($dept == 501){return 'Oil & Gas I';}
    	elseif($dept == 502){return 'Oil & Gas II';}
    	elseif($dept == 503){return 'Mining';}
    	elseif($dept == 504){return 'Energy';}
    	elseif($dept == 601){return 'Goverment Strategy Venture';}
    	elseif($dept == 602){return 'Fertilizer & Logistic';}
    	elseif($dept == 603){return 'Electricity';}
    	elseif($dept == 604){return 'Shipping & Ports';}
    	elseif($dept == 605){return 'Airports';}
    	elseif($dept == 606){return 'Government Finance';}
    	elseif($dept == 701){return 'Natural Resources';}
    	elseif($dept == 702){return 'Government Defense';}
    	elseif($dept == 703){return 'Government Financial Services';}
    	elseif($dept == 704){return 'Government Education';}
    	elseif($dept == 705){return 'Government Social & Healthcare';}
    	elseif($dept == 706){return 'Government Social Security';}
    	
    }
    
    function get_produk_pow($product){
    	$bagi=9; 
    	$item_arr = array("PCD","CC","EDC","ATM");
    	if($product == 'FX' || $product == 'Trade'){$bagi=6;}
    	elseif(in_array($product,$item_arr)){$bagi=0;}
    	return $bagi;
    }
    
    function get_month_name($month){
    	if($month == 1){return "Jan";}
    	elseif($month == 2){return "Feb";}
    	elseif($month == 3){return "Mar";}
    	elseif($month == 4){return "Apr";}
    	elseif($month == 5){return "May";}
    	elseif($month == 6){return "Jun";}
    	elseif($month == 7){return "Jul";}
    	elseif($month == 8){return "Aug";}
    	elseif($month == 9){return "Sep";}
    	elseif($month == 10){return "Oct";}
    	elseif($month == 11){return "Nov";}
    	elseif($month == 12){return "Dec";}
    }
    
    function get_month_full_name($month){
    	if($month == 1){return "January";}
    	elseif($month == 2){return "February";}
    	elseif($month == 3){return "March";}
    	elseif($month == 4){return "April";}
    	elseif($month == 5){return "Mei";}
    	elseif($month == 6){return "June";}
    	elseif($month == 7){return "July";}
    	elseif($month == 8){return "August";}
    	elseif($month == 9){return "September";}
    	elseif($month == 10){return "October";}
    	elseif($month == 11){return "November";}
    	elseif($month == 12){return "December";}
    }
    
    function get_product_anal_prod(){
    	$prod = array(); $i=0;
    	$inisial = array("Trade","BG","SCF","VC","WM","EDC","ATM","Micro","CC","CM","cicil_Emas","DPLK","MAGI","MTF","FX","Mansek","OIR");
    	foreach($inisial as $asu){
    		$prod[$i]['ins'] = $asu;
    		$prod[$i]['name'] = change_real_name($asu);
    		$i++;
    	}
    	return $prod;
    }
    
    function get_product_income_type($product){
    	$prod_nii = array("CASA", "TD", "IL", "SL", "WCL", "TR", "WM","PCD","VCCD","VCLnDF","Micro_Loan","MKM","KPR","Auto","CC");
    	//$prod_fbi = array("FX", "SCF", "Trade", "PWE", "BG", "OIR", "OW", "ECM", "DCM", "MA");
    	if(in_array($product, $prod_nii)){return 'nii';}
    	//elseif(in_array($product, $prod_fbi)){return 'fbi';}
    	else{return 'fbi';}
    }
	
	function not_avg_bal($product){
		$res = true;
		$prod_avg = array("CASA", "TD", "IL", "SL", "WCL");
		if(in_array($product,$prod_avg)){$res = false;}
		return $res;
	}
	
	function return_mineral($anchor){
		if($anchor->gas >20000){
			return "Platinum";
		}
		elseif($anchor->gas < 20000 && $anchor->gas > 5000){
			return "Gold";
		}
		elseif($anchor->gas < 5000){
			return "Silver";
		}
	}
	
	function return_ring($sow,$trx,$casx){
		if($sow<=0.1 || $trx<=0.5 || $casx<=0.05){
			return 3;
		}
		elseif(($sow>0.1 && $sow<=0.3) || ($trx>0.5 && $trx<=1) || ($casx>0.05 && $casx<=0.1)){
			return 2;
		}else{
			return 1;
		}
	}
	
	function return_cur($prod){
		$usd_arr = array("FX","Trade"); $arr_cur = array();
		if(in_array($prod,$usd_arr)){$arr_cur['cur']="$"; $arr_cur['sep']="Mn";}
		else{$arr_cur['cur']="Rp"; $arr_cur['sep']="Bn";}
		return $arr_cur;
	}