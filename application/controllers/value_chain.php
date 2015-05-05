<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Value_chain extends CI_Controller {
    
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
    	$year = $rpttime['year']; $content['year'] = $year; $content['month'] = $rpttime['month'];
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
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('value_chain/show_vc',$content,TRUE);

		$this->load->view('front',$data);
    }
    
    public function detail(){
    	$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; $content['year'] = $year; $content['month'] = $rpttime['month'];
    	$data_rl_inc = array();
    	$anchor_id = $this->uri->segment(4);
    	
    	if($this->uri->segment(3)=='anchor'){
			$content['anchor'] = $this->manchor->get_anchor_by_id($anchor_id);
			$data['title'] = $content['anchor']->name;
			$content['top_anc']="";
    	}
    	elseif($this->uri->segment(3)=='directorate'){
    		$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($anchor_id);
    		$content['dir']['code'] = $anchor_id;
    		$data['title'] = get_direktorat_full_name($anchor_id);
    		$anchors = $this->manchor->get_anchor_by_group_where($anchor_id);
    		$i=0; $content['top_anc']=array();
    		foreach($anchors as $anc){
    			$content['top_anc'][$i]['anc'] = $anc['anc'];
    			$content['top_anc'][$i]['real'] = $this->mrealization->get_anchor_ws_realization($anc['anc']->id, $rpttime['year'],"");
    			$content['top_anc'][$i]['real_ly'] = $this->mrealization->get_anchor_ws_realization($anc['anc']->id, $rpttime['year']-1,"");
    			$content['top_anc'][$i]['tot_inc'] = get_ws_income_month($content['top_anc'][$i]['real'],$content['month']);
    			$content['top_anc'][$i]['tot_inc_ly'] = get_ws_income_month($content['top_anc'][$i]['real_ly'],$content['month']);
    			if($content['top_anc'][$i]['tot_inc_ly']['tot']){
    				$content['top_anc'][$i]['growth'] = (($content['top_anc'][$i]['tot_inc']['tot']/$content['top_anc'][$i]['tot_inc_ly']['tot'])-1)*100;
    			}else{
    				$content['top_anc'][$i]['growth'] = 100;
    			}
    			$i++;
    		}
    		usort($content['top_anc'], function($a, $b) {
				return $b['growth'] - $a['growth'];
			});
			
			for($k=1;$k<=7;$k++){
				$c = "CB".$k;
				$content['rlz_cb'][$k] = $this->mrealization->get_anchor_ws_realization($c, $rpttime['year'],"");
				$content['inc_cb'][$k] = get_ws_income_month($content['rlz_cb'][$k],$content['month']);
			}
    	}		
    	
		$content['rlz_ws_ly'] = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year']-1,"");
		$content['rlz_ws'] = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year'],"");
		$content['ly'] = $this->mrealization->count_realization_now($content['rlz_ws_ly']);
		$content['now'] = $this->mrealization->count_realization_now($content['rlz_ws']);
		
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
	
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('income/detail_info',$content,TRUE);

		$this->load->view('front',$data);
    }
}
