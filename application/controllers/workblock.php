<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Workblock extends CI_Controller {
    
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
    
    public function detail_workblock(){
    	$id = $this->uri->segment(3);
    	$workblock['wb'] = $this->mworkblock->get_workblock_by_id($id);
    	$workblock['stat'] = $this->mworkblock->get_workblock_status($id);
		$milestones = $this->mmilestone->get_all_workblock_milestone($id);
    	
    	$user = $this->session->userdata('user');
    	$roles = explode(',',$user['role']);
    	$inits = explode(';',$user['initiative']); 
    	if((in_array('PIC',$roles)&&(count($roles)==1))&& !(in_array($workblock['wb']->code,$inits))){
    		redirect('initiative/list_initiative');
    	}
    	else{    	
			$data['title'] = $workblock['wb']->title;
		
			$user = $this->session->userdata('user');
			$pending_aprv = $this->mmilestone->get_pending_aprv($user['id'],$user['role']);
		
			$data['header'] = $this->load->view('shared/header',array('user' => $user,'pending'=>$pending_aprv),TRUE);	
			$data['footer'] = $this->load->view('shared/footer','',TRUE);
			$data['content'] = $this->load->view('workblock/detail_wb',array('wb' => $workblock, 'ms' => $milestones),TRUE);

			$this->load->view('front',$data);
		}
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
