<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Summary_desc extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('muser');
        $this->load->model('msummary_desc');
        
        $session = $this->session->userdata('userdb');
        
        if(!$session){
            redirect('user/login');
        }
    }
    /**
     * Method for page (public)
     */
    
    public function submit_sumdesc(){
      	//$id = $this->uri->segment(3);
      	$user = $this->session->userdata('userdb');
      	$rpttime = $this->session->userdata('rpttime');
      	$id = $this->input->post('id_sumdesc');
      	$program['sum_desc'] = $this->input->post('sum_desc');
        $program['for_what'] = $this->input->post('for_what');
        $program['comp_id'] = $this->input->post('comp_id');
        $program['kind'] = $this->input->post('kind');
        $program['user_id'] = $user['id'];
        $program['year'] = $rpttime['year'];
        $program['month'] = $rpttime['month'];
        
        if($id && $program['sum_desc']){
        	$this->msummary_desc->update_summary_desc($program,$id);
        }
        elseif($id && !$program['sum_desc']){
        	$this->msummary_desc->delete_summary_desc($id);
        }
        elseif($program['sum_desc']){
        	$this->msummary_desc->insert_summary_desc($program);
        }
		$url="";
		if($program['for_what']=="basic_info"){$url="profile/show/".$program['kind']."/".$program['comp_id'];}
		redirect($url);
    }
    
    public function delete_agenda(){
    	$id = $this->uri->segment(3);
    	if($id){
        	if($this->magenda->delete_agenda($id)){redirect('agenda/'.$segment);}
        	//else{redirect('initiative/input_initiative/'.$segment);}
        }
    }
    
}
