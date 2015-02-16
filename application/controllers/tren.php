<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tren extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mtarget');
        $this->load->model('mwallet');
        $this->load->library('excel');
    }
    /**
     * Method for page (public)
     */
    public function index()
    {		
        
    }
    
    public function show(){
    	$rpttime = $this->session->userdata('rpttime');
    	$kind = $this->uri->segment(6);
    	$product = $this->uri->segment(5);
    	if($kind=="volume"){$tambahan = "_vol";}else{$tambahan = "_".get_product_income_type($product);}
    	if($this->uri->segment(3)=='anchor'){
			$anchor_id = $this->uri->segment(4);
			$realization_now = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, $kind, $rpttime['year']);
			$realization_ly = $this->mrealization->get_anchor_prd_realization_annual($anchor_id, $product, $kind, $rpttime['year']-1);
			$anchor = $this->manchor->get_anchor_by_id($anchor_id);
			$target_ws = $this->mtarget->get_anchor_ws_target($anchor_id);
    		$prd_name = $product.$tambahan;
    		$target = $target_ws->$prd_name;
    		
			$header = $this->load->view('anchor/anchor_header',array('anchor' => $anchor),TRUE);
			$data['title'] = "Tren Produk - $anchor->name";
			$id = $anchor_id;
			$level = 'anchor';
		}
		elseif($this->uri->segment(3)=='directorate'){
			$directorate = $this->uri->segment(4);
			$realization_now = $this->mrealization->get_dir_prd_realization_annual($product, $kind, $rpttime['year'],$directorate);
    		$realization_ly = $this->mrealization->get_dir_prd_realization_annual($product, $kind, $rpttime['year']-1, $directorate);
    		$target_ws = $this->mtarget->get_directorate_target($directorate,'wholesale');
    		$prd_name = $product.$tambahan;
    		$target = $target_ws->$prd_name;
			
			$header = $this->load->view('directorate/dir_header',array('directorate' => $directorate, 'id_ybs' => $directorate, 'code' => 'dir'),TRUE);
			$data['title'] = "Tren Produk";
			$id = $directorate;
			$level = 'directorate';
		}
		$arr_prod = array(); 
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = $this->mwallet->return_prod_name($i);
    		$arr_prod[$i]['name'] = $this->mwallet->change_real_name($arr_prod[$i]['id']);
    	}
    	
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('grafik/product',array('header' => $header, 'target' => $target,
												'this_year' => $realization_now, 'ly_year' => $realization_ly, 'last_month_data' => $this->mrealization->get_last_month($rpttime['year']), 
												'arr_prod' => $arr_prod, 'id' => $id, 'level' => $level,
												'product_name' => $this->mwallet->change_real_name($product)),TRUE);

		$this->load->view('front',$data);
    }
    
    public function refresh_product(){
    	$prod = $this->input->post('product');
    	$kind = $this->input->post('kind');
    	$ann = $this->input->post('ann');
    	$level = $this->uri->segment(3);
    	$id = $this->uri->segment(4);
    	
    	redirect('tren/show/'.$level.'/'.$id."/".$prod.'/'.$kind.'/'.$ann);
    }
}
