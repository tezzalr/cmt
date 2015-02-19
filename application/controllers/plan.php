<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Plan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mtarget');
        $this->load->model('mwallet');
        $this->load->model('mplan');
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
        
    }
    
    public function show(){
    	$rpttime = $this->session->userdata('rpttime');
    	$product = $this->uri->segment(5);
    	if($this->uri->segment(3)=='anchor'){
			$anchor_id = $this->uri->segment(4);
			$anchor = $this->manchor->get_anchor_by_id($anchor_id);
    		
    		$plans = $this->mplan->get_plan($anchor_id, $product);
    		
			$header = $this->load->view('anchor/anchor_header',array('anchor' => $anchor),TRUE);
			$data['title'] = "Action Plan - $anchor->name";
			$id = $anchor_id;
			$level = 'anchor';
		}
		elseif($this->uri->segment(3)=='directorate'){
			$directorate = $this->uri->segment(4);
			$realization_now = $this->mrealization->get_dir_prd_realization_annual($product, $kind, $rpttime['year'],$directorate);
    		$realization_ly = $this->mrealization->get_dir_prd_realization_annual($product, $kind, $rpttime['year']-1, $directorate);
    		$target_ws = $this->mtarget->get_directorate_target($directorate,'wholesale');
    		$prd_name = $product.$tambahan;
    		$target = $target_ws->$prd_name;
			
			$header = $this->load->view('directorate/dir_header',array('directorate' => $directorate, 'id_ybs' => $directorate, 'code' => 'dir'),TRUE);
			$data['title'] = "Tren Produk";
			$id = $directorate;
			$level = 'directorate';
		}
		$arr_prod = array(); 
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = $this->mwallet->return_prod_name($i);
    		$arr_prod[$i]['name'] = $this->mwallet->change_real_name($arr_prod[$i]['id']);
    	}
    	$list_ap = $this->load->view('grafik/action_plan/_list_action_plan',array('plans' => $plans),TRUE);
    	
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('grafik/action_plan',array('header' => $header, 
												'arr_prod' => $arr_prod, 'id' => $id, 'level' => $level, 
												'list_ap' => $list_ap,
												'product_name' => $this->mwallet->change_real_name($product)),TRUE);

		$this->load->view('front',$data);
    }
    
    public function refresh_product(){
    	$prod = $this->input->post('product');
    	$level = $this->uri->segment(3);
    	$id = $this->uri->segment(4);
    	
    	redirect('plan/show/'.$level.'/'.$id."/".$prod.'/');
    }
    
    public function submit_action_plan(){
    	$user = $this->session->userdata('userdb');
    	
    	$program['anchor_id'] = $this->input->post('anchor');
    	$program['product'] = $this->input->post('product');
      	$program['action'] = $this->input->post('action');
        $program['user_id'] = $user['id'];
        $program['created'] = date("Y-m-d h:i:s");
        
        if($this->mplan->insert_plan($program)){
        	$json['status'] = 1;
        	$plans = $this->mplan->get_plan($program['anchor_id'], $program['product']);
        	$json['html'] = $this->load->view('grafik/action_plan/_list_action_plan',array('plans' => $plans),TRUE);
        }
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function show_update(){
    	$plan_id = $this->input->get('id');
    	$updates['updates'] = $this->mplan->get_plan_update($plan_id);
    	$comp['plan'] = $this->mplan->get_plan_by_id($plan_id);
    	
		$json['status'] = 1;
		$comp['form_update'] = $this->load->view('grafik/action_plan/_update_action_form',$comp,TRUE);
		$comp['list_update'] = $this->load->view('grafik/action_plan/_list_updates',$updates,TRUE);
		$json['html'] = $this->load->view('grafik/action_plan/_update_ap',$comp,TRUE);
    	
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function submit_update_ap(){
    	$user = $this->session->userdata('userdb');
    	
    	$program['plan_id'] = $this->input->post('plan');
    	$program['progress'] = $this->input->post('progress');
      	$program['issue'] = $this->input->post('issue');
      	$program['support'] = $this->input->post('support');
      	
      	if($this->input->post('due_date')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('due_date'));
    		$program['due_date'] = $start->format('Y-m-d');
    	}
    	
      	$program['pic'] = $this->input->post('pic');
        $program['user_id'] = $user['id'];
        $program['created'] = date("Y-m-d h:i:s");
        
        if($this->mplan->insert_plan_update($program)){
        	$json['status'] = 1;
        	$comp['plan'] = $this->mplan->get_plan_by_id($program['plan_id']);
        	$updates['updates'] = $this->mplan->get_plan_update($program['plan_id']);
        	$json['list_update'] = $this->load->view('grafik/action_plan/_list_updates',$updates,TRUE);
        	$json['form_update'] = $this->load->view('grafik/action_plan/_update_action_form',$comp,TRUE);
        }
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
}
