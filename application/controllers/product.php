<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Product extends CI_Controller {
    
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
    	$kind = $this->uri->segment(6);
    	if($kind=="volume"){$tambahan = "_vol";}else{$tambahan = "_".get_product_income_type($product);}
    	$prd_name = $product.$tambahan;
    	if($this->uri->segment(3)=='anchor'){
    		$anchor_id = $this->uri->segment(4);
			$content['anchor'] = $this->manchor->get_anchor_by_id($anchor_id);
			$content['now'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "volume", $rpttime['year']);
			$content['ly'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "volume", $rpttime['year']-1);
			$content['nowic'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "income", $rpttime['year']);
			$content['lyic'] = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, "income", $rpttime['year']-1);
			$content['tgt_ws'] = $this->mtarget->get_anchor_ws_target($anchor_id);
			
			$content['wlt'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $rpttime['year']);
			$realization_ws = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year']);
			$content['rlz'] = $this->mrealization->count_realization_value($realization_ws, $realization_ws->month);
			$content['sow'] = $this->mwallet->get_sow($content['wlt'], $content['rlz'], 'wholesale');
			
			$content['wltly'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $rpttime['year']-1);
			$realization_ws_ly = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year']-1);
			$content['rlzly'] = $this->mrealization->count_realization_value($realization_ws_ly, $realization_ws_ly->month);
			$content['sowly'] = $this->mwallet->get_sow($content['wltly'], $content['rlzly'], 'wholesale');
    		
    		$content['target'] = $content['tgt_ws']->$prd_name;
    		
    		$data['title'] = "Product - ".$content['anchor']->name;
			$content['id'] = $anchor_id;
			$content['level'] = 'anchor';
    	}
    	elseif($this->uri->segment(3)=='directorate'){
    	}
    	
    	$arr_prod = array(); 
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = $this->mwallet->return_prod_name($i);
    		$arr_prod[$i]['name'] = $this->mwallet->change_real_name($arr_prod[$i]['id']);
    	}
    	
    	$content['arr_prod'] = $arr_prod;
		
		$content['sidebar'] = $this->load->view('shared/sidebar',array('anchor'=>$content['anchor']),TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('product/product_anal',$content,TRUE);

		$this->load->view('front',$data);
        
    }
}
