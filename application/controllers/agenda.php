<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Agenda extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('muser');
        $this->load->model('magenda');
        
        $session = $this->session->userdata('user_cmt');
        
        if(!$session){
            redirect('user/login');
        }
    }
    /**
     * Method for page (public)
     */
    public function index()
    {
		$data['title'] = "Agenda";
		
		$user = $this->session->userdata('user_cmt');
		
		if($this->uri->segment(3) && $this->uri->segment(4)){$month = $this->uri->segment(3); $year = $this->uri->segment(4);}
		else{$month = date('m'); $year = date('Y');}
		$agendas = $this->magenda->get_all_agenda_month($month, $year);
		
		$datereq['month'] = $month; $datereq['year']=$year;
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('agenda/index_agenda',array('agendas' => $agendas,'datereq'=>$datereq),TRUE);

		$this->load->view('front',$data);
    }
    
    public function change_month(){
    	$month = $this->input->post('month');
    	$year = $this->input->post('year');
    	redirect('agenda/index/'.$month."/".$year);
    }
    
    public function get_detail(){
       	$id = $this->input->get('id');
       	$user = $this->session->userdata('user_cmt');
    	$agenda = $this->magenda->get_agenda_by_id($id); 
		if($agenda){
			$json['status'] = 1;
            $json['message'] = $this->load->view('agenda/detail_agenda',array('agenda' => $agenda,'user'=>$user),TRUE);
            $json['title'] = $agenda['agenda']->title;
		}else{
			$json['status'] = 0;
		}
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
    
    public function input_agenda(){
    	$data['title'] = "Input Agenda";
    	
    	$id = $this->uri->segment(3);
		
		$users = $this->muser->get_all_user();
		$user = $this->session->userdata('user_cmt');
		$agenda = "";
		if($id){
			$agenda = $this->magenda->get_agenda_by_id($id);
		}
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('agenda/input_agenda',array('agenda' => '', 'cmters' => $users, 'agenda' => $agenda,'user' => $user),TRUE);

		$this->load->view('front',$data);
    }
    
    public function submit_agenda(){
      	$id = $this->uri->segment(3);
      	$user = $this->session->userdata('user_cmt');
      	
      	$program['title'] = $this->input->post('title');
        $program['location'] = $this->input->post('location');
        $program['description'] = $this->input->post('description');
        $program['maker_id'] = $user['id'];
        
        $userss = $this->input->post('required');
        $attend = ""; $totatd = count($userss); $f=1;
        foreach($userss as $s){
        	$attend=$attend.$s;
        	if($f!=$totatd){$attend=$attend.",";}
        	$f++;
        }
        $program['required'] = $attend;
        
        if($this->input->post('start')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('start'));
    		$program['start'] = $start->format('Y-m-d')." ".$this->input->post('start_time').":00";
    	}
    	
    	if($this->input->post('end')){$end = DateTime::createFromFormat('m/d/Y', $this->input->post('end'));
    		$program['end'] = $end->format('Y-m-d')." ".$this->input->post('end_time').":00";
    	}
        
        if($id){
        	if($this->minitiative->update_initiative($program,$id)){redirect('initiative/list_initiative/'.$segment);}
        	else{redirect('initiative/input_initiative/'.$segment);}
        }
        else{
        	if($this->magenda->insert_agenda($program)){redirect('agenda');}
        	else{redirect('agenda/input_agenda/');}
        }
    }
    
    public function delete_agenda(){
    	$id = $this->uri->segment(3);
    	if($id){
        	if($this->magenda->delete_agenda($id)){redirect('agenda/'.$segment);}
        	//else{redirect('initiative/input_initiative/'.$segment);}
        }
    }
    
}
