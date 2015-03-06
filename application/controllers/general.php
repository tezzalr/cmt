<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class General extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
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
		$data['title'] = 'CMT Web';
    	
    	$user = $this->session->userdata('user');
		
		$data['header'] = "";	
		$data['footer'] = "";
		$data['content'] = $this->load->view('general/homepage',array(),TRUE);

		$this->load->view('front',$data);
    }
    
    public function overview(){
    	$data['title'] = 'Overview Corplan';
    	
    	$user = $this->session->userdata('user');
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('general/overview',array(),TRUE);

		$this->load->view('front',$data);
    }
    
    public function submit_workblock(){
      	$id = $this->uri->segment(3);
      	$program['title'] = $this->input->post('title');
      	$program['pic'] = $this->input->post('pic');
      	$program['objective'] = $this->input->post('objective');
        $program['initiative_id'] = $this->input->post('initiative');
        
        if($this->input->post('start')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('start'));
    		$program['start'] = $start->format('Y-m-d');}
    	
    	if($this->input->post('end')){$end = DateTime::createFromFormat('m/d/Y', $this->input->post('end'));
    		$program['end'] = $end->format('Y-m-d');}
        
        if($id){
        	if($this->mworkblock->update_workblock($program,$id)){redirect("initiative/detail_initiative/".$program['initiative_id']);}
        	else{redirect("initiative/detail_initiative/".$program['initiative_id']);}
        }
        else{
        	if($this->mworkblock->insert_workblock($program)){redirect("initiative/detail_initiative/".$program['initiative_id']);}
        	else{redirect("initiative/detail_initiative/".$program['initiative_id']);}
		}
    }
    
    public function delete_workblock(){
        if($this->mworkblock->delete_workblock()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
}
