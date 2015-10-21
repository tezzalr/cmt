<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Profile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mtarget');
        $this->load->model('mwallet');
        $this->load->model('msummary_desc');
        $this->load->library('excel');
        
        /*$session = $this->session->userdata('userdb');
        
        if(!$session){
            redirect('user/login');
        }*/
    }
    /**
     * Method for page (public)
     */
    public function summary()
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
    		redirect('profile/show');
    	}		
    	$content['summary_desc'] = $this->msummary_desc->get_summary_desc($content['month'],$year,'basic_info',$anchor_id);
		$content['rlz_ws_ly'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year']-1,"","wholesale");
		$content['rlz_ws_ly_ey'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year']-1,"ey","wholesale");
		$content['rlz_ws'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year'],"","wholesale");
		//$content['rlz_al'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year'],"","alliance");
		//$content['rlz_al'] = $this->mrealization->get_anchor_al_realization($anchor_id, $rpttime['year']);
		$content['wlt_ws'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $rpttime['year'],"wholesale");
		$content['tgt_ws'] = $this->mtarget->get_anchor_ws_target($anchor_id,"wholesale");
		$content['ty'] = $this->mrealization->count_realization_now($content['rlz_ws']);
		if($content['rlz_ws_ly']){
			$content['ly'] = $this->mrealization->count_realization_now($content['rlz_ws_ly']);
		}else{$content['ly'] = "";}
		$content['ly_ey'] = $this->mrealization->count_realization_now($content['rlz_ws_ly_ey']);
		$content['now'] = $this->mrealization->count_realization_now($content['rlz_ws']);
		$content['percent'] = $this->mrealization->count_realization($content['tgt_ws'], $content['rlz_ws']);
		$content['ytd'] = $this->mrealization->count_realization_value($content['rlz_ws'], $content['rlz_ws']->month,'wholesale');
    	$content['arr_prod'] = array(); 
    	$barang = array(1,2,3,4,6,7,9,10);
    	foreach($barang as $i){
    		$content['arr_prod'][$i]['initial'] = $this->mwallet->return_prod_name($i); 
    		$content['arr_prod'][$i]['fullname'] = $this->mwallet->change_real_name($content['arr_prod'][$i]['initial']);
    	}
		
		//$content['pic_view'] = $this->load->view('profile/_pic','',TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('profile/summary',$content,TRUE);

		$this->load->view('front',$data);
        
    }
    
    public function get_pic_bmri(){
    	
		$json['status'] = 1;
        $json['message'] = $this->load->view('profile/_pic','',TRUE);
        
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function get_sector(){
    	
		$json['status'] = 1;
        $json['message'] = $this->load->view('profile/_sector','',TRUE);
        
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
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
    	$content['summary_desc'] = $this->msummary_desc->get_summary_desc($content['month'],$year,'basic_info',$anchor_id);
		$content['rlz_ws_ly'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year']-1,"","wholesale");
		$content['rlz_ws_ly_ey'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year']-1,"ey","wholesale");
		$content['rlz_ws'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year'],"","wholesale");
		//$content['rlz_al'] = $this->mrealization->get_anchor_realization($anchor_id, $rpttime['year'],"","alliance");
		//$content['rlz_al'] = $this->mrealization->get_anchor_al_realization($anchor_id, $rpttime['year']);
		$content['wlt_ws'] = $this->mwallet->get_anchor_ws_wallet($anchor_id, $rpttime['year'],"wholesale");
		$content['tgt_ws'] = $this->mtarget->get_anchor_ws_target($anchor_id,"wholesale");
		$content['ty'] = $this->mrealization->count_realization_now($content['rlz_ws']);
		if($content['rlz_ws_ly']){
			$content['ly'] = $this->mrealization->count_realization_now($content['rlz_ws_ly']);
		}else{$content['ly'] = "";}
		$content['ly_ey'] = $this->mrealization->count_realization_now($content['rlz_ws_ly_ey']);
		$content['now'] = $this->mrealization->count_realization_now($content['rlz_ws']);
		$content['percent'] = $this->mrealization->count_realization($content['tgt_ws'], $content['rlz_ws']);
		$content['ytd'] = $this->mrealization->count_realization_value($content['rlz_ws'], $content['rlz_ws']->month,'wholesale');
    	$content['arr_prod'] = array(); 
    	$barang = array(1,2,3,4,6,7,9,10);
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
