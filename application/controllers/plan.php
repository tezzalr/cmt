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
    
    public function pipeline(){
    	$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year'];
    	$data_rl_inc = array();
    	
    	if($this->uri->segment(3)=='anchor'){
    	}
    	elseif($this->uri->segment(3)=='directorate'){
    	}
		
		$sidebar = $this->load->view('shared/sidebar','',TRUE);
		
		$data['title'] = "Pipeline";
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('plan/pipeline',array('sidebar'=>$sidebar),TRUE);

		$this->load->view('front',$data);
    }
    
    public function summary(){
    	$anchor_id = $this->uri->segment(4);
    	$rpttime = $this->session->userdata('rpttime');
    	$arr_prod = array(); 
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = return_prod_name($i);
    		$arr_prod[$i]['name'] = change_real_name($arr_prod[$i]['id']);
    	}
    	$arr_strategy = array(); $j=0;
    	$arr_ap = array();
    	if($this->uri->segment(3)=='anchor'){
			$content['anchor'] = $this->manchor->get_anchor_by_id($anchor_id);
			$anchor = $this->manchor->get_anchor_by_id($anchor_id);
    		
    		for($i=1;$i<=15;$i++){
    			$stgy = $this->mplan->get_strategy_by_prod($arr_prod[$i]['id'],$anchor_id);
    			$plans = $this->mplan->get_plan($anchor_id, $arr_prod[$i]['id']);
    			if($stgy){
    				$arr_strategy[$arr_prod[$i]['id']]['strategy'] = $stgy;
    				$arr_strategy[$arr_prod[$i]['id']]['name_prod'] = $arr_prod[$i]['name'];
    				//$arr_strategy[$arr_prod[$i]['id']]['ap'] = $plans;
    				$arr_ap = array();
    				$p=1;
    				foreach($plans as $plan){
    					$arr_ap[$p]['ap'] = $plan;
    					$arr_ap[$p]['last_update'] = "";
    					$up = $this->mplan->get_plan_update($plan->id);
    					if($up){
    						$arr_ap[$p]['last_update'] = $up[0];
    					}
    					$p++;
    				}
    				$arr_strategy[$arr_prod[$i]['id']]['ap'] = $arr_ap;
    			}	
    		}
    		
			$header = $this->load->view('anchor/anchor_header',array('anchor' => $anchor),TRUE);
			$data['title'] = "Action Plan - $anchor->name";
		}
		elseif($this->uri->segment(3)=='directorate'){
			$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($anchor_id);
    		$content['dir']['code'] = $anchor_id;
		}
    	//$list_ap = $this->load->view('grafik/action_plan/_list_action_plan',array('plans' => $plans),TRUE);
    	$content['strategies'] = $arr_strategy;	
    	
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('plan/summary',$content,TRUE);

		$this->load->view('front',$data);
    }
    
    public function issues_summary(){
    	$anchor_id = $this->uri->segment(4);
    	$rpttime = $this->session->userdata('rpttime');
    	$arr_strategy = array(); $j=0;
    	$arr_ap = array();
    	if($this->uri->segment(3)=='anchor'){
			$content['anchor'] = $this->manchor->get_anchor_by_id($anchor_id);
			$data['title'] = "Action Plan - $anchor->name";
		}
		elseif($this->uri->segment(3)=='directorate'){
			$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($anchor_id);
    		$content['dir']['code'] = $anchor_id;
    		$data['title'] = "Issues Summary - ".$content['dir']['name'];
		}
    	$arr_prod = array(); $content['arr_send'] = array(); $j=0;
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = return_prod_name($i);
    		$arr_prod[$i]['name'] = change_real_name($arr_prod[$i]['id']);
    		$arr_plan = $this->mplan->get_plan_with_latest_issue_by_prod($anchor_id,$this->uri->segment(3),$arr_prod[$i]['id']);
    		if($arr_plan){
    			$content['arr_send'][$j]['plans'] = $arr_plan;
    			$content['arr_send'][$j]['prod'] = $arr_prod[$i];
    			$j++;
    		}
    	}
    	
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('plan/issues_summary',$content,TRUE);

		$this->load->view('front',$data);
    }
    
    public function edit_strategy(){
    	$rpttime = $this->session->userdata('rpttime');
    	
		$anchor_id = $this->uri->segment(3);
		$anchor = $this->manchor->get_anchor_by_id($anchor_id);
    		
    	//$plans = $this->mplan->get_plan($anchor_id, $product);
    		
		$header = $this->load->view('anchor/anchor_header',array('anchor' => $anchor),TRUE);
		$data['title'] = "Action Plan - $anchor->name";
		$id = $anchor_id;
		$level = 'anchor';
		
		$arr_prod = array(); $arr_strategy = array();
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = $this->mwallet->return_prod_name($i);
    		$arr_prod[$i]['name'] = $this->mwallet->change_real_name($arr_prod[$i]['id']);
    		$stgy = $this->mplan->get_strategy_by_prod($arr_prod[$i]['id'],$anchor_id);
    		$arr_strategy[$arr_prod[$i]['id']] = "";
    		if($stgy){
				$arr_strategy[$arr_prod[$i]['id']] = $stgy;
			}
    	}
    	//$list_ap = $this->load->view('grafik/action_plan/_list_action_plan',array('plans' => $plans),TRUE);
    	
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('plan/strategy_form',array('header' => $header, 
												'arr_prod' => $arr_prod, 'id' => $id, 'stgy' => $arr_strategy, 
												),TRUE);

		$this->load->view('front',$data);
    }
    
    public function show(){
    	$rpttime = $this->session->userdata('rpttime');
    	$product = $this->uri->segment(5);
    	$anchor_id = $this->uri->segment(4);
    	if($this->uri->segment(3)=='anchor'){
			$anchor = $this->manchor->get_anchor_by_id($anchor_id);
    		
    		$plans = $this->mplan->get_plan($anchor_id, $product);
    		
			$header = $this->load->view('anchor/anchor_header',array('anchor' => $anchor),TRUE);
			$data['title'] = "Action Plan - $anchor->name";
			$content['id'] = $anchor_id;
			$content['level'] = 'anchor';
		}
		elseif($this->uri->segment(3)=='directorate'){
			$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($anchor_id);
    		$content['dir']['code'] = $anchor_id;
		}
		$arr_prod = array(); 
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = $this->mwallet->return_prod_name($i);
    		$arr_prod[$i]['name'] = $this->mwallet->change_real_name($arr_prod[$i]['id']);
    	}
    	$content['prod_name'] = $this->mwallet->change_real_name($product);
    	$content['arr_prod'] = $arr_prod;
    	$content['list_ap'] = $this->load->view('plan/_list_action_plan',array('plans' => $plans),TRUE);
    	$content['product_name'] = $this->mwallet->change_real_name($product);
    	$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
    	
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('plan/action_plan',$content,TRUE);

		$this->load->view('front',$data);
    }
    
    public function edit_action_plan(){
		$id = $this->input->get('id');
    	$content['plan'] = $this->mplan->get_plan_by_id($id);
    	$content['anchor'] = $this->input->get('anchor');
    	$content['product'] = $this->input->get('product');
    	if($id){
			if($content['plan']){
				$json['status'] = 1;
				$json['html'] = $this->load->view('plan/_form_action_plan',$content,TRUE);
			}else{
				$json['status'] = 0;
			}
		}
		else{
			$json['status'] = 1;
				$json['html'] = $this->load->view('plan/_form_action_plan',$content,TRUE);
		}
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
	
	public function edit_plan_update(){
		$id = $this->input->get('id');
		$content['plan_id'] = $this->input->get('plan_id');
    	$content['plan_update'] = $this->mplan->get_plan_update_by_id($id);
    	if($id){
			if($content['plan_update']){
				$json['status'] = 1;
				$json['html'] = $this->load->view('plan/_update_action_form',$content,TRUE);
			}else{
				$json['status'] = 0;
			}
		}
		else{
			$json['status'] = 1;
				$json['html'] = $this->load->view('plan/_update_action_form',$content,TRUE);
		}
		$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
	
	public function delete_plan(){
        if($this->mplan->delete_plan($this->input->post('id'))){
        	
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
    
    public function delete_plan_update(){
        if($this->mplan->delete_plan_update($this->input->post('id'))){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
    
    public function refresh_product(){
    	$prod = $this->input->post('product');
    	$level = $this->uri->segment(3);
    	$id = $this->uri->segment(4);
    	
    	redirect('plan/show/'.$level.'/'.$id."/".$prod.'/');
    }
    
    public function submit_strategy(){
    	$user = $this->session->userdata('userdb');
    	
    	$products = array("CASA","TD","WCL","IL","Trade","FX","BG");
    	$anchor_id = $this->input->post('anchor');
    	foreach($products as $prod){
    		$program['anchor_id'] = $anchor_id;
        	$program['user_id'] = $user['id'];
        	$program['created'] = date("Y-m-d h:i:s");
        	$program['strategy'] = $this->input->post($prod);
        	$program['product'] = $prod;
        	
        	if($program['strategy']){
        		if($this->mplan->get_strategy_by_prod($prod,$anchor_id)){
        			$this->mplan->update_strategy($program,$prod,$anchor_id);	
        		}
        		else{
        			$this->mplan->insert_strategy($program);
        		}
        	}
        	else{
        		if($this->mplan->get_strategy_by_prod($prod,$anchor_id)){
        			$this->mplan->delete_strategy($prod,$anchor_id);	
        		}
        	}
    	}
        
    	redirect('plan/summary/anchor/'.$anchor_id);
    }
    
    public function submit_action_plan(){
    	$user = $this->session->userdata('userdb');
    	$id = $this->input->post('id');
    	
    	$program['anchor_id'] = $this->input->post('anchor');
    	$program['product'] = $this->input->post('product');
      	$program['action'] = $this->input->post('action');
      	$program['status'] = $this->input->post('status');
      	$program['pic'] = $this->input->post('pic');
      	if($this->input->post('due_date')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('due_date'));
    		$program['due_date'] = $start->format('Y-m-d');
    	}
      	//$program['due_date'] = $this->input->post('due_date');
        $program['user_id'] = $user['id'];
        $program['created'] = date("Y-m-d h:i:s");
        
        if($id){
        	if($this->mplan->update_plan($program,$id)){$json['status'] = 1;}
        }
        else{
			if($this->mplan->insert_plan($program)){$json['status'] = 1;}
        }
        $plans = $this->mplan->get_plan($program['anchor_id'], $program['product']);
		$json['html'] = $this->load->view('plan/_list_action_plan',array('plans' => $plans),TRUE);
		
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function show_update(){
    	$plan_id = $this->input->get('id');
    	$updates['updates'] = $this->mplan->get_plan_update($plan_id);
    	$comp['plan'] = $this->mplan->get_plan_by_id($plan_id);
    	$comp['plan_id'] = $plan_id;
    	
		$json['status'] = 1;
		$comp['form_update'] = $this->load->view('plan/_update_action_form',$comp,TRUE);
		$comp['list_update'] = $this->load->view('plan/_list_updates',$updates,TRUE);
		$json['html'] = $this->load->view('plan/_update_ap',$comp,TRUE);
    	
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function submit_update_ap(){
    	$user = $this->session->userdata('userdb');
    	$id = $this->input->post('id');
    	
    	$program['plan_id'] = $this->input->post('plan');
    	$program['progress'] = $this->input->post('progress');
      	$program['issue'] = $this->input->post('issue');
      	$program['support'] = $this->input->post('support');
      	
      	/*if($this->input->post('due_date')){$start = DateTime::createFromFormat('m/d/Y', $this->input->post('due_date'));
    		$program['due_date'] = $start->format('Y-m-d');
    	}
    	
      	$program['pic'] = $this->input->post('pic');*/
        $program['user_id'] = $user['id'];
        $program['created'] = date("Y-m-d h:i:s");
        
        if($id){
        	if($this->mplan->update_plan_update($program,$id)){$json['status'] = 1;}
        }
        else{
			if($this->mplan->insert_plan_update($program)){$json['status'] = 1;}
        }
                
		$comp['plan_id'] = $program['plan_id'];
		$updates['updates'] = $this->mplan->get_plan_update($program['plan_id']);
		$json['list_update'] = $this->load->view('plan/_list_updates',$updates,TRUE);
		$json['form_update'] = $this->load->view('plan/_update_action_form',$comp,TRUE);
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
}
