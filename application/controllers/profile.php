<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Profile extends CI_Controller {
    
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
    	$data_rl_inc = array();
    	$anchor_id = $this->uri->segment(4);
    	
    	if($this->uri->segment(3)=='anchor'){
			$content['anchor'] = $this->manchor->get_anchor_by_id($anchor_id);
			$data['title'] = $content['anchor']->name;
    	}
    	elseif($this->uri->segment(3)=='directorate'){
    		$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($anchor_id);
    		$content['dir']['code'] = $anchor_id;
    		$data['title'] = get_direktorat_full_name($anchor_id);
    	}		
    	
		$content['rlz_ws_ly'] = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year']-1,"ey");
		$content['rlz_ws'] = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year'],"");
		//$content['rlz_al'] = $this->mrealization->get_anchor_al_realization($anchor_id, $rpttime['year']);
		$content['wlt_ws'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $rpttime['year']);
		$content['tgt_ws'] = $this->mtarget->get_anchor_ws_target($anchor_id);
		$content['ly'] = $this->mrealization->count_realization_now($content['rlz_ws_ly']);
		$content['now'] = $this->mrealization->count_realization_now($content['rlz_ws']);
		$content['percent'] = $this->mrealization->count_realization($content['tgt_ws'], $content['rlz_ws']);
		$content['ytd'] = $this->mrealization->count_realization_value($content['rlz_ws'], $content['rlz_ws']->month);
    	$content['arr_prod'] = array(); 
    	$barang = array(1,2,3,4,7,9,10);
    	foreach($barang as $i){
    		$content['arr_prod'][$i]['initial'] = $this->mwallet->return_prod_name($i); 
    		$content['arr_prod'][$i]['fullname'] = $this->mwallet->change_real_name($content['arr_prod'][$i]['initial']);
    	}
		
		
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
	
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('profile/basic_info',$content,TRUE);

		$this->load->view('front',$data);
        
    }
}
