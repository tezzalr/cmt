<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('muser');
        $this->load->model('mmilestone');
    }
    
    public function index()
    {
    	$user = $this->session->userdata('user');
		
		if($user){
			$users = $this->muser->get_all_user();
			$data['title'] = "User List";
		
			$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
			$data['footer'] = $this->load->view('shared/footer','',TRUE);
			$data['content'] = $this->load->view('user/list_user',array('user'=>$users),TRUE);
	
			$this->load->view('front',$data);
        }else{
        	redirect('user/login');
        }
        
    }
    
    public function login($params=null)
    {
    	/*$session = $this->session->userdata('user');
        if($session){
            redirect('customer');
        }*/
    	$data['title'] = "User Login";
    	
        $data['header'] = '';
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
        $data['content'] = $this->load->view('user/login',array('params' => $params),TRUE);
    
        $this->load->view('front',$data);
    }
    
    public function input_user()
    {
    	$user_id = $this->uri->segment(3); $data_user="";
    	
    	if($user_id){$data_user = $this->muser->get_user_by_id($user_id);}
    	
    	$data['title'] = "Input User";
		
		$user = $this->session->userdata('user');
		$data['header'] = $this->load->view('shared/header',array('user' => $user, 'info' => $data_user),TRUE);
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
        $data['content'] = $this->load->view('user/input',array(),TRUE);
    
        $this->load->view('front',$data);
    }
    
	public function userEnter()
	{
		$params['username'] = $this->input->post('username');
        $params['password'] = md5($this->input->post('password'));
        
        if($this->check_login($params['username'],$params['password'])){
            $user = $this->muser->get_user_id_by_username($params['username']);
            $user_roles = explode(',',$user->role);
            $data = array(
					'username' => $params['username'],
					'id' => $user->id,
					'name' => $user->name,
					'is_logged_in' => true,
					'role' => $user->role,
				);
			$this->session->set_userdata('user',$data);
			redirect('home/');
        }else{
            $params['type_login']="failed";
            $this->login($params);
        }
	}
	
	private function check_login($username, $password){
         if(empty($username) || empty($password)){
             return false;
         }else{
             if($this->muser->verify($username, $password)){return true;}
             else{return false;}
         }
    }
    
    public function register(){
      	$id = $this->uri->segment(3);
      	$user['username'] = $this->input->post('username');
      	if(!$id){
        	$user['password'] = md5($this->input->post('password'));
        }
        $user['name'] = $this->input->post('name');
        $user['role'] = $this->input->post('role');
        
        if($id){
			if($this->muser->update_user($user,$id)){
				redirect('user');
			}
    	}else{
			if($this->muser->register($user)){
        		redirect('user');
			}
    	}
    }
    
    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/user/login');
    }
    
    public function delete_user(){
        if($this->muser->delete_user()){
    		$json['status'] = 1;
    	}
    	else{
    		$json['status'] = 0;
    	}
    	$this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
	}
    
    public function change_password(){
    	$user['password'] = md5($this->input->post('password_new'));
        
        if($this->muser->update_user($user)){
        	$json['status']=1;
        }
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
    
    public function not_login_yet(){
    	$params['type_login']="not_login";
        $this->login($params);
    }
}
