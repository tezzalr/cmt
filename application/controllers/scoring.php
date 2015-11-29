<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Scoring extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mtarget');
        $this->load->model('mwallet');
        $this->load->model('mscoring');
        $this->load->library('excel');
        
    }
    /**
     * Method for page (public)
     */    
    public function input_bobot(){
    	$data['title'] = "Input Scoring - CB";

		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; 
    	$content['year'] = $year; $content['month'] = $rpttime['month'];
    	
    	$content['profile'] = $this->mscoring->get_scoring_comp_by_group('profile');
		$content['value_deal'] = $this->mscoring->get_scoring_comp_by_group('value_deal');
    	$content['wallet_size'] = $this->mscoring->get_scoring_comp_by_group('wallet_size');
		$content['wallet_gap'] = $this->mscoring->get_scoring_comp_by_group('wallet_gap');
    	$content['realization'] = $this->mscoring->get_scoring_comp_by_group('realization');
    	
    	$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('scoring/input_bobot',$content,TRUE);

		$this->load->view('front',$data);
    }
    
    public function list_anchor_scoring(){
    	$data['title'] = "Anchor Scoring - CB";

		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; 
    	$content['year'] = $year; $content['month'] = $rpttime['month'];
    	
    	$content['anchors'] = $this->manchor->get_all_anchor_scoring();
		
		$arr_anc = array();
		$i=0;
		foreach($content['anchors'] as $anc){
			$arr_anc[$i]['anchor'] = $anc;
			$arr_anc[$i]['param'] = $this->mscoring->get_anchor_scoring_detail_by_id($anc->id);
			$i++;
		}
    	$content['arr_anchors'] = $arr_anc;
		
    	$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('scoring/list_anchor_scoring',$content,TRUE);

		$this->load->view('front',$data);
    }
    
    public function calculate_anchor_scoring(){
    	$componen = $this->mscoring->get_scoring_comp_by_group('');
    	
    	foreach($componen as $comp){
    		$compdata['bobot'] = $this->input->post($comp->id);
    		$this->mscoring->update_scoring_comp($compdata, $comp->id);
    	}
    	
    	$anchors = $this->manchor->get_all_anchor_show();
    	$arr_anch = array(); $i=0;
    	foreach($anchors as $anchor){
			$anchor_scor = 0;
    		foreach($componen as $comp){
    			$bobot = $this->input->post($comp->id);	
    			$get_anchor_comp_val = $this->mscoring->get_anchor_comp_val($anchor->id,$comp->id);
    			if($get_anchor_comp_val){$val = $get_anchor_comp_val->value*$bobot/100;}
    			else{$val = 0;}
    			$anchor_scor = $anchor_scor+$val;
    		}
    		//echo $anchor->name." - ".$anchor_scor."<br>";
			if($anchor_scor){
				$arr_anch[$i]['anchor'] = $anchor;
				$arr_anch[$i]['value'] = $anchor_scor;
				$i++;
			}
    	}
    	
		//echo count($arr_anch);
		$sum_anchor = count($arr_anch);
    	usort($arr_anch, function($a, $b) {
			return ($b['value']*100) - ($a['value']*100);
		});
		$top_limit = round($sum_anchor*0.1); $top_limit_val = $arr_anch[$top_limit-1]['value'];
    	$med_limit = round($sum_anchor*0.2); $med_limit_val = $arr_anch[$top_limit+$med_limit-1]['value'];
    	$low_limit = round($sum_anchor*0.4); $low_limit_val = $arr_anch[$sum_anchor-$low_limit-2]['value'];
		$sum_anc = 0; echo $top_limit;
		foreach($arr_anch as $anch){
    		if($anch['value'] >= $top_limit_val){
    			$data['class'] = "Diamond";
    		}
    		elseif($anch['value'] < $low_limit_val){
    			$data['class'] = "Silver";
    		}
    		elseif($anch['value'] < $top_limit_val && $anch['value'] > $med_limit_val){
    			$data['class'] = "Platinum";
    		}
    		else{
    			$data['class'] = "Gold";
    		}
			
    		$data['scoring'] = $anch['value'];
    		$this->manchor->update_anchor($data, $anch['anchor']->id);
    		
    		//echo $anch['anchor']->name." - ".$data['class']." - ".$anch['value']."<br>";
    		$sum_anc++;
    	}
    	
    	redirect('scoring/list_anchor_scoring');
    	
    }
    
    public function anchor_scoring(){
    	$this->mscoring->truncate_table_anchor_comp_val();
		//PROFILE
    	$this->count_anchor_comp_val("num_of_comp","anchor");
		
		//Value Deal
    	$this->count_anchor_comp_val("corp_action","anchor");
		$this->count_anchor_comp_val("sectors","anchor");
		$this->count_anchor_comp_val("priority_gov","anchor");
		$this->count_anchor_comp_val("brances","anchor");
    	
    	//WALLET
    	$this->count_anchor_comp_val("gas","anchor");
    	$this->count_anchor_comp_val("CASA","wallet_size");
    	$this->count_anchor_comp_val("Trade","wallet_size");
    	$this->count_anchor_comp_val("BG","wallet_size");
    	$this->count_anchor_comp_val("FX","wallet_size");
    	$this->count_anchor_comp_val("PCD","wallet_size");
		$this->count_anchor_comp_val("Loan","wallet_size");
    	
		//WALLET Gap
		$this->count_anchor_comp_val("CASA","wallet_gap");
    	$this->count_anchor_comp_val("Trade","wallet_gap");
    	$this->count_anchor_comp_val("BG","wallet_gap");
    	$this->count_anchor_comp_val("FX","wallet_gap");
    	$this->count_anchor_comp_val("PCD","wallet_gap");
		
    	//REALIZATION
		$this->count_anchor_comp_val("CASA","realization");
    	$this->count_anchor_comp_val("Trade","realization");
    	$this->count_anchor_comp_val("BG","realization");
    	$this->count_anchor_comp_val("FX","realization");
    	$this->count_anchor_comp_val("PCD","realization");
    	$this->count_anchor_comp_val("Loan","realization");
    	$this->count_anchor_comp_val("","ws_income");
		
		redirect('scoring/input_bobot');
    }
    
    public function count_anchor_comp_val($prod,$db_kind)
    {
		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; $month = $rpttime['month'];
    	
    	if($prod){$prod_vol = $prod."_vol";}
    	
    	$anchors = $this->manchor->get_all_anchor_show();
        	
    	$arr_anch = array();
    	$i=0;
    	foreach($anchors as $anchor){
    		if($db_kind=="wallet_size"){
    			$scor_comp_val = $this->mwallet->get_anchor_ws_wallet($anchor->id, $year,return_ws_or_al($prod));
    			if($prod == "Loan"){$val = $scor_comp_val->WCL_vol + $scor_comp_val->IL_vol + $scor_comp_val->TR_vol;}
    			else{$val = $scor_comp_val->$prod_vol;}
    			
    			$scoring_comp_id = $this->mscoring->get_scoring_comp($db_kind, $prod_vol)->id;
    		}elseif($db_kind=="realization"){
    			$scor_comp_val = $this->mrealization->get_anchor_realization($anchor->id, $year,"",return_ws_or_al($prod));
    			if($prod == "Loan"){$val = ($scor_comp_val->WCL_vol + $scor_comp_val->IL_vol + $scor_comp_val->TR_vol)/1000000000;}
    			else{$val = $scor_comp_val->$prod_vol/1000000000;}
    			
    			$scoring_comp_id = $this->mscoring->get_scoring_comp($db_kind, $prod_vol)->id;
    		}elseif($db_kind=="wallet_gap"){
    			$wal = $this->mwallet->get_anchor_ws_wallet($anchor->id, $year,return_ws_or_al($prod));
				$realz = $this->mrealization->get_anchor_realization($anchor->id, $year,"",return_ws_or_al($prod));
    			if($prod == "Loan"){$val = (($wal->WCL_vol + $wal->IL_vol + $wal->TR_vol)) - (($realz->WCL_vol + $realz->IL_vol + $realz->TR_vol)/1000000000);}
    			else{$val = ($wal->$prod_vol) - ($realz->$prod_vol/1000000000);}
    			
    			$scoring_comp_id = $this->mscoring->get_scoring_comp($db_kind, $prod_vol)->id;
    		}elseif($db_kind=="ws_income"){
    			$scor_comp_val = $this->mrealization->return_income_ws_month($anchor->id, $year, $month);
    			$val = $scor_comp_val['tot']/1000000000;
    			
    			$scoring_comp_id = $this->mscoring->get_scoring_comp("realization", "WH_inc")->id;
    		}elseif($db_kind=="anchor"){
    			$scor_comp_val = $this->manchor->get_anchor_by_id($anchor->id);
    			$val = $scor_comp_val->$prod;
    			
    			$scoring_comp_id = $this->mscoring->get_scoring_comp("", $prod)->id;
    		}
    		if($val){
    			$arr_anch[$i]['anchor'] = $anchor;
    			$arr_anch[$i]['value'] = $val;
    			$i++;
    		}
    	}
    	
    	$tot = count($arr_anch);
    	
    	usort($arr_anch, function($a, $b) {
			return $b['value'] - $a['value'];
		});
    	
    	
    	$top_limit = round($tot*0.1); $top_limit_val = $arr_anch[$top_limit]['value'];
    	$med_limit = round($tot*0.2); $med_limit_val = $arr_anch[$top_limit+$med_limit]['value'];
    	$low_limit = round($tot*0.4); $low_limit_val = $arr_anch[$tot-$low_limit-1]['value'];
    	
		//echo $prod." - ".$db_kind." - ".$top_limit." - ".$med_limit." - ".$low_limit." - ".$top_limit_val." - ".$med_limit_val." - ".$low_limit_val."<br>";
		
    	$anc_val = 0;
    	
    	$comp['scoring_comp_id'] = $scoring_comp_id;
    	
    	foreach($arr_anch as $anch){
    		if($anch['value'] >= $top_limit_val){
    			$anc_val = 4;
    		}
    		elseif($anch['value'] < $low_limit_val){
    			$anc_val = 1;
    		}
    		elseif($anch['value'] < $top_limit_val && $anch['value'] >= $med_limit_val){
    			$anc_val = 3;
    		}
    		else{
    			$anc_val = 2;
    		}
			//echo $prod." - ".$anch['anchor']->name." - ".number_format($anch['value'],0,".",",")."<br>";
    		$comp['anchor_id'] = $anch['anchor']->id;
    		$comp['value'] = $anc_val;
			$comp['real_value'] = $anch['value'];
    		$this->mscoring->insert_scoring($comp);
    	}
        
    }
	
	public function get_detail(){
       	$id = $this->input->get('id');
    	$data['scoring'] = $this->mscoring->get_anchor_scoring_detail_by_id($id);
		if($data['scoring']){
			$json['status'] = 1;
            $json['message'] = $this->load->view('scoring/_detail_scoring',$data,TRUE);
            $json['title'] = $data['scoring'][0]->name;
		}else{
			$json['status'] = 0;
		}
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
}
