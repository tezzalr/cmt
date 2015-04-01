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
			$content['target_ws'] = $this->mtarget->get_anchor_ws_target($anchor_id);
    		
    		$content['target'] = $content['target_ws']->$prd_name;
    		
    		$data['title'] = "Product - ".$content['anchor']->name;
			$content['id'] = $anchor_id;
			$content['level'] = 'anchor';
    	}
    	elseif($this->uri->segment(3)=='directorate'){
    	}
		
		$content['sidebar'] = $this->load->view('shared/sidebar',array('anchor'=>$content['anchor']),TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('product/product_anal',$content,TRUE);

		$this->load->view('front',$data);
        
    }
}
