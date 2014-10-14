<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Milestone extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mworkblock');
        $this->load->model('mmilestone');
        
        $session = $this->session->userdata('user');
        
        if(!$session){
            redirect('user/login');
        }
    }
    /**
     * Method for page (public)
     */
    public function index()
    {
		
    }
    
    public function submit_milestone(){
      	$id = $this->uri->segment(3);
      	$program['title'] = $this->input->post('title');
        $program['workblock_id'] = $this->input->post('workblock');
        $program['status'] = $this->input->post('status');
        $program['reason'] = $this->input->post('reason');
        
        if($this->input->post('start')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('start'));
    		$program['start'] = $start->format('Y-m-d');
    	}
    	
    	if($this->input->post('end')){$end = DateTime::createFromFormat('m/d/Y', $this->input->post('end'));
    		$program['end'] = $end->format('Y-m-d');
    	}
    	
    	if($this->input->post('revised')){
    		$revised = DateTime::createFromFormat('m/d/Y', $this->input->post('revised'));
    		$program['revised'] = $revised->format('Y-m-d');
        }
        
        if(!$id){
        	if($this->mmilestone->insert_milestone($program)){
        		redirect("workblock/detail_workblock/".$program['workblock_id']);
        	}else{redirect("workblock/detail_workblock/".$program['workblock_id']);}
        }
        else{
        	if($this->mmilestone->update_milestone($program,$id)){
        		redirect("workblock/detail_workblock/".$program['workblock_id']);
        	}else{redirect("workblock/detail_workblock/".$program['workblock_id']);}
		}
    }
    
    public function submit_revised(){
    	$id = $this->uri->segment(3);
    	$wb = $this->uri->segment(4);
    	$program['milestone_id'] = $id;
    	$program['reason'] = $this->input->post('reason');
    	$program['action'] = $this->input->post('action');
    	if($this->input->post('revised')){
    		$revised = DateTime::createFromFormat('m/d/Y', $this->input->post('revised'));
    		$program['revised_date'] = $revised->format('Y-m-d');
        }
        if($this->mmilestone->insert_revised($program,$wb)){
			redirect("workblock/detail_workblock/".$wb);
		}else{redirect("workblock/detail_workblock/".$wb);}
    }
    
    public function aprove_revised(){
    	$aut = $this->uri->segment(3);
    	$id = $this->uri->segment(4);
    	$ms = $this->uri->segment(5);
    	$wb = $this->uri->segment(6);
    	if (isset($_POST['yes'])) {
			$revised['desc_'.$aut]="Approved";
		} else if (isset($_POST['no'])) {
			$revised['desc_'.$aut]="Rejected";
		}
		$revised[$aut.'_cmnt']=$this->input->post('cmnt_'.$aut);
		$revised['aprv_'.$aut]=date('Y-m-d');
		if($this->mmilestone->update_revised($revised,$id)){
			redirect("workblock/detail_workblock/".$wb);
		}else{redirect("workblock/detail_workblock/".$wb);}
    } 
    
    public function change_status(){
    	$stat = $this->uri->segment(3);
    	$id = $this->uri->segment(4);
    	$wb = $this->uri->segment(5);
    	if($stat == "start"){$ms['status'] = "In Progress";}
    	elseif($stat == "end"){$ms['status'] = "Completed";}
    	
    	if($stat){
    		if($this->mmilestone->update_milestone($ms, $id)){
				redirect("workblock/detail_workblock/".$wb);
			}else{redirect("workblock/detail_workblock/".$wb);}
    	}
    }
    
    public function delete_milestone(){
        if($this->mmilestone->delete_milestone()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
}
