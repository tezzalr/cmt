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
    public function index()
    {
		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year'];
    	$data_rl_inc = array();
    	
    	if($this->uri->segment(3)=='anchor'){
    	}
    	elseif($this->uri->segment(3)=='directorate'){
    	}
		
		$sidebar = $this->load->view('shared/sidebar','',TRUE);
		
		$data['title'] = "Product Analysis";
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('product/product_anal',array('sidebar'=>$sidebar),TRUE);

		$this->load->view('front',$data);
        
    }
}
