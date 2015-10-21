<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Product_analysis extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mrealization_company');
        $this->load->model('mtarget');
        $this->load->model('mwallet');
        $this->load->model('mplan');
        $this->load->library('excel');
        
        /*$session = $this->session->userdata('userdb');
        
        if(!$session){
            redirect('user/login');
        }*/
    }
    /**
     * Method for page (public)
     */
    public function show()
    {
		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; $content['year'] = $year; $content['month'] = $rpttime['month'];
    	$product = $this->uri->segment(5);
    	$content['product'] = $product;
    	$kind = $this->uri->segment(6); $content['kind'] = $this->uri->segment(3);
    	if($kind=="volume"){$tambahan = "_vol";}else{$tambahan = "_".get_product_income_type($product);}
    	$prd_name = $product.$tambahan;
    	$anchor_id = $this->uri->segment(4); $content['anchor_id']=$anchor_id;
    	$content['type_prod'] = return_ws_or_al($product);
    	if($this->uri->segment(3)=='anchor'){
			$content['anchor'] = $this->manchor->get_anchor_by_id($anchor_id);
    		$data['title'] = "Product - ".$content['anchor']->name;
    		$anc_not = "anchor";
    		$content['comps'] = $this->mrealization_company->get_company_realization($content['anchor']->name,$content['type_prod']);
    	}
    	elseif($this->uri->segment(3)=='directorate'){
    		$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($anchor_id);
    		$content['dir']['code'] = $anchor_id;
    		$data['title'] = "Product - ".get_direktorat_full_name($anchor_id);
    		$anc_not = "group";
    	}
    	//echo $content['type_prod'];
    	$content['now'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "volume", $rpttime['year'],$anc_not);
		$content['ly'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "volume", $rpttime['year']-1,$anc_not);
		$content['two_ly'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "volume", $rpttime['year']-2,$anc_not);
		$content['tri_ly'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "volume", $rpttime['year']-3,$anc_not);
		$content['nowic'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "income", $rpttime['year'],$anc_not);
		$content['lyic'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "income", $rpttime['year']-1,$anc_not);
		$content['two_lyic'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "income", $rpttime['year']-2,$anc_not);
		$content['tri_lyic'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "income", $rpttime['year']-3,$anc_not);
		$content['tgt_ws'] = $this->mtarget->get_anchor_ws_target_w_year($anchor_id,$year,$content['type_prod']);
		$content['tgt_ws_ly'] = $this->mtarget->get_anchor_ws_target_w_year($anchor_id,$year-1,$content['type_prod']);
		$content['tgt_ws_two_ly'] = $this->mtarget->get_anchor_ws_target_w_year($anchor_id,$year-2,$content['type_prod']);
		$content['tgt_ws_tri_ly'] = $this->mtarget->get_anchor_ws_target_w_year($anchor_id,$year-3,$content['type_prod']);
		
		
		$content['wlt'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $year,$content['type_prod']);
		$content['real'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year'],"",$content['type_prod']);
		$content['rlz'] = $this->mrealization->count_realization_value($content['real'], $content['real']->month,$content['type_prod']);
		$content['sow'] = $this->mwallet->get_sow($content['wlt'], $content['rlz'], $content['type_prod']);
		
		$content['wltly'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $year-1,$content['type_prod']);
		$content['real_ly'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year']-1,"ey",$content['type_prod']);
		$content['rlzly'] = $this->mrealization->count_realization_value($content['real_ly'], $content['real_ly']->month,$content['type_prod']);
		$content['sowly'] = $this->mwallet->get_sow($content['wltly'], $content['rlzly'], $content['type_prod']);
		
		$content['wlt_two_ly'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $year-2,$content['type_prod']);
		$content['real_two_ly'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year']-2,"ey",$content['type_prod']);
		$content['rlz_two_ly'] = $this->mrealization->count_realization_value($content['real_two_ly'], $content['real_two_ly']->month,$content['type_prod']);
		$content['sow_two_ly'] = $this->mwallet->get_sow($content['wlt_two_ly'], $content['rlz_two_ly'], $content['type_prod']);
		
		$content['wlt_tri_ly'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $year-3,$content['type_prod']);
		$content['real_tri_ly'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year']-3,"ey",$content['type_prod']);
		$content['rlz_tri_ly'] = $this->mrealization->count_realization_value($content['real_tri_ly'], $content['real_tri_ly']->month,$content['type_prod']);
		$content['sow_tri_ly'] = $this->mwallet->get_sow($content['wlt_tri_ly'], $content['rlz_tri_ly'], $content['type_prod']);
		
		$content['asu'] = 'ytd';
		$content['total_prd'] = $this->manchor->get_total_vol_prd($product, $content['month'], $year, $content['type_prod'].'_realization','');
    	$content['top_anchor_vol'] = $this->manchor->get_top_anchor_prd($product, $content['month'], $year,$anchor_id,$content['type_prod']);
    	$content['top_anchor_nom_grow'] = $this->manchor->get_top_anchor_prd_nml_grw($product, $content['month'], $year, 12, 'desc',$anchor_id,$content['type_prod']);
    	$content['top_anchor_nom_grow_min'] = $this->manchor->get_top_anchor_prd_nml_grw($product, $content['month'], $year, 12, 'asc',$anchor_id,$content['type_prod']);
    	$content['top_anchor_nom_grow_tm'] = $this->manchor->get_top_anchor_prd_nml_grw($product, $content['month'], $year, $content['month'], 'desc',$anchor_id,$content['type_prod']);
    	$content['top_anchor_nom_grow_tm_min'] = $this->manchor->get_top_anchor_prd_nml_grw($product, $content['month'], $year, $content['month'], 'asc',$anchor_id,$content['type_prod']);
    	$content['top_anchor_grow'] = $this->manchor->get_top_anchor_prd_grw($product, $content['month'], $year, 12, 'desc',$anchor_id,$content['type_prod']);
    	$content['top_anchor_grow_min'] = $this->manchor->get_top_anchor_prd_grw($product, $content['month'], $year, 12, 'asc',$anchor_id,$content['type_prod']);
    	$content['top_anchor_grow_tm'] = $this->manchor->get_top_anchor_prd_grw($product, $content['month'], $year, $content['month'], 'desc',$anchor_id,$content['type_prod']);
    	$content['top_anchor_grow_tm_min'] = $this->manchor->get_top_anchor_prd_grw($product, $content['month'], $year, $content['month'], 'asc',$anchor_id,$content['type_prod']);
    	
    	$stgy = $this->mplan->get_strategy_by_prod($product,$anchor_id);
		$content['strategy'] = "";
		$plans = $this->mplan->get_plan($anchor_id, $product);
		if($stgy){
			$content['strategy'] = $stgy;
			//$arr_strategy[$arr_prod[$i]['id']]['name_prod'] = $arr_prod[$i]['name'];
			//$arr_strategy[$arr_prod[$i]['id']]['ap'] = $plans;
			$arr_ap = array();
			$p=1;
			foreach($plans as $plan){
				$arr_ap[$p]['ap'] = $plan;
				$arr_ap[$p]['last_update'] = "";
				$up = $this->mplan->get_plan_update($plan->id);
				if($up){
					$arr_ap[$p]['last_update'] = $up[0];
				}
				$p++;
			}
			$content['ap'] = $arr_ap;
		}
    	
    	$arr_prod = array(); 
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = return_prod_name($i);
    		$arr_prod[$i]['name'] = change_real_name($arr_prod[$i]['id']);
    	}
    	
    	for($j=1;$j<=16;$j++){
    		$arr_prod_al[$j]['id'] = return_prod_name_al($j);
    		$arr_prod_al[$j]['name'] = change_real_name($arr_prod_al[$j]['id']);
    	}
    	
    	$content['tren_graph'] = $this->load->view('product_analysis/_tren_graph',$content,TRUE);
    	$content['arr_prod'] = $arr_prod; $content['arr_prod_al'] = $arr_prod_al;
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		$content['japs_form'] = $this->load->view('product_analysis/_japs_form',$content,TRUE);
		$content['child_company'] = $this->load->view('product_analysis/_child_company',$content,TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('product_analysis/product_anal',$content,TRUE);

		$this->load->view('front',$data);
        
    }
    
    public function scorecard()
    {
		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; $content['year'] = $year; $content['month'] = $rpttime['month'];
    	$product = $this->uri->segment(5);
    	$content['product'] = $product;
		
		$data['title'] = "Scorecard";
		
		$id = $this->uri->segment(3);
		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; 
    	$content['year'] = $year; $content['month'] = $rpttime['month'];
		
		$sc = array(); $i=0; 
		$real = array();
		$p1=0; $p2=0; $p3=0; $g1=0; $g2=0; $g3=0; $s1=0; $s2=0; $s3=0;
		$month = $content['month'];
		//$arrsc = array('platinum','gold','silver');
		
		$anchors = $this->manchor->get_anchor_sc($id);
		foreach($anchors as $anchor){
			$rlz_raw = $this->mrealization->get_anchor_realization($anchor->id, $year,"","wholesale");
			$wallet = $this->mwallet->get_anchor_ws_wallet($anchor->id, $year,"wholesale");
    		$rlz = $this->mrealization->count_realization_value($rlz_raw, $month,"wholesale");
    		$sow = $this->mwallet->get_sow($wallet, $rlz, 'wholesale');
    		
			$sc[$i]['anchor'] = $anchor;
			$sc[$i]['wal'] = $this->mwallet->get_anchor_total_wallet($anchor->id, $year);
			$sc[$i]['inc'] = $this->mrealization->get_anchor_total_income($anchor->id, $year);
			if($sc[$i]['wal']['ws']){
				$sc[$i]['sow'] = $sc[$i]['inc']['ws']/$sc[$i]['wal']['ws'];
			}else{
				$sc[$i]['sow'] = 0;
			}
			if($sow[32]){
				$sc[$i]['trx'] = $sow[34]/$sow[32];
			}else{$sc[$i]['trx'] = 10;}
			if($rlz['IL_vol']+$rlz['WCL_vol']+$rlz['SL_vol']){
				$sc[$i]['casx'] = $rlz['CASA_vol']/($rlz['IL_vol']+$rlz['WCL_vol']+$rlz['SL_vol']);
			}else{$sc[$i]['casx'] = 10;}
			$i++;
		}
		
		$arrsc['platinum'][1]=""; $arrsc['platinum'][2]=""; $arrsc['platinum'][3]="";
		$arrsc['gold'][1]=""; $arrsc['gold'][2]=""; $arrsc['gold'][3]="";
		$arrsc['silver'][1]=""; $arrsc['silver'][2]=""; $arrsc['silver'][3]="";
		
		foreach($sc as $each){
			if($each['sow']<=0.3 /*|| $each['trx']<=0.5 || $each['casx']<=0.05*/){
				$ring = 3;
			}
			elseif(($each['sow']>0.3 && $each['sow']<=0.6) /*|| ($each['trx']>0.5 && $each['trx']<=1) || ($each['casx']>0.05 && $each['casx']<=0.1)*/){
				$ring = 2;
			}else{
				$ring = 1;
			}
			
			if($each['anchor']->gas >20000){
				if($ring==1){$x=$p1;}elseif($ring==2){$x=$p2;}else{$x=$p3;}
				$arrsc['platinum'][$ring][$x] = $each;
				if($ring==1){$p1++;}elseif($ring==2){$p2++;}else{$p3++;}
			}
			elseif($each['anchor']->gas < 20000 && $each['anchor']->gas > 5000){
				if($ring==1){$x=$g1;}elseif($ring==2){$x=$g2;}else{$x=$g3;}
				$arrsc['gold'][$ring][$x] = $each;
				if($ring==1){$g1++;}elseif($ring==2){$g2++;}else{$g3++;}
			}
			elseif($each['anchor']->gas < 5000){
				if($ring==1){$x=$s1;}elseif($ring==2){$x=$s2;}else{$x=$s3;}
				$arrsc['silver'][$ring][$x] = $each;
				if($ring==1){$s1++;}elseif($ring==2){$s2++;}else{$s3++;}
			}
		}
		$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($id);
    	$content['dir']['code'] = $id;
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		$content['scs']=$arrsc;
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('scorecard/scorecard_table',$content,TRUE);

		$this->load->view('front',$data);
        
    }
}
