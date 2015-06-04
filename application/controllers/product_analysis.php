<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Product_analysis extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mtarget');
        $this->load->model('mwallet');
        $this->load->library('excel');
        
        $session = $this->session->userdata('userdb');
        
        if(!$session){
            redirect('user/login');
        }
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
    	$kind = $this->uri->segment(6);
    	if($kind=="volume"){$tambahan = "_vol";}else{$tambahan = "_".get_product_income_type($product);}
    	$prd_name = $product.$tambahan;
    	$anchor_id = $this->uri->segment(4);
    	if($this->uri->segment(3)=='anchor'){
			$content['anchor'] = $this->manchor->get_anchor_by_id($anchor_id);
    		$data['title'] = "Product - ".$content['anchor']->name;
    		$anc_not = "anchor";
    	}
    	elseif($this->uri->segment(3)=='directorate'){
    		$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($anchor_id);
    		$content['dir']['code'] = $anchor_id;
    		$data['title'] = "Product - ".get_direktorat_full_name($anchor_id);
    		$anc_not = "group";
    	}
    	$content['now'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "volume", $rpttime['year'],$anc_not);
		$content['ly'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "volume", $rpttime['year']-1,$anc_not);
		$content['nowic'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "income", $rpttime['year'],$anc_not);
		$content['lyic'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "income", $rpttime['year']-1,$anc_not);
		$content['tgt_ws'] = $this->mtarget->get_anchor_ws_target($anchor_id);
		$content['tgt_ws_ly'] = $this->mtarget->get_anchor_ws_target_w_year($anchor_id,$year-1);
		
		$content['wlt'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $rpttime['year']);
		$content['real'] = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year'],"");
		$content['rlz'] = $this->mrealization->count_realization_value($content['real'], $content['real']->month);
		$content['sow'] = $this->mwallet->get_sow($content['wlt'], $content['rlz'], 'wholesale');
		
		$content['wltly'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $rpttime['year']-1);
		$content['real_ly'] = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year']-1,"ey");
		$content['rlzly'] = $this->mrealization->count_realization_value($content['real_ly'], $content['real_ly']->month);
		$content['sowly'] = $this->mwallet->get_sow($content['wltly'], $content['rlzly'], 'wholesale');
		
		$content['asu'] = 'ytd';
		$content['total_prd'] = $this->manchor->get_total_vol_prd($product, $content['month'], $year, 'wholesale_realization','');
    	$content['top_anchor_vol'] = $this->manchor->get_top_anchor_prd($product, $content['month'], $year,$anchor_id);
    	$content['top_anchor_nom_grow'] = $this->manchor->get_top_anchor_prd_nml_grw($product, $content['month'], $year, 12, 'desc',$anchor_id);
    	$content['top_anchor_nom_grow_min'] = $this->manchor->get_top_anchor_prd_nml_grw($product, $content['month'], $year, 12, 'asc',$anchor_id);
    	$content['top_anchor_nom_grow_tm'] = $this->manchor->get_top_anchor_prd_nml_grw($product, $content['month'], $year, $content['month'], 'desc',$anchor_id);
    	$content['top_anchor_nom_grow_tm_min'] = $this->manchor->get_top_anchor_prd_nml_grw($product, $content['month'], $year, $content['month'], 'asc',$anchor_id);
    	$content['top_anchor_grow'] = $this->manchor->get_top_anchor_prd_grw($product, $content['month'], $year, 12, 'desc',$anchor_id);
    	$content['top_anchor_grow_min'] = $this->manchor->get_top_anchor_prd_grw($product, $content['month'], $year, 12, 'asc',$anchor_id);
    	$content['top_anchor_grow_tm'] = $this->manchor->get_top_anchor_prd_grw($product, $content['month'], $year, $content['month'], 'desc',$anchor_id);
    	$content['top_anchor_grow_tm_min'] = $this->manchor->get_top_anchor_prd_grw($product, $content['month'], $year, $content['month'], 'asc',$anchor_id);
    	
    	$arr_prod = array(); 
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = $this->mwallet->return_prod_name($i);
    		$arr_prod[$i]['name'] = $this->mwallet->change_real_name($arr_prod[$i]['id']);
    	}
    	
    	$content['tren_graph'] = $this->load->view('product_analysis/_tren_graph',$content,TRUE);
    	
    	$content['arr_prod'] = $arr_prod;
		
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		$content['japs_form'] = $this->load->view('product_analysis/_japs_form',$content,TRUE);
		$content['child_company'] = $this->load->view('product_analysis/_child_company',$content,TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('product_analysis/product_anal',$content,TRUE);

		$this->load->view('front',$data);
        
    }
}
