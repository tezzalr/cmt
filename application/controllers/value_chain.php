<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Value_chain extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mvalue_chain');
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
		$content['vcs'] = $this->mvalue_chain->get_value_chain($anchor_id);
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('value_chain/show_vc',$content,TRUE);

		$this->load->view('front',$data);
    }
    
    public function show_detail(){
    	$id = $this->input->get('id');
    	
		$json['status'] = 1;
		$comp['vc'] = $this->mvalue_chain->get_value_chain_by_id($id);
		$json['html'] = $this->load->view('value_chain/_detail_vc',$comp,TRUE);
    	
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
}
