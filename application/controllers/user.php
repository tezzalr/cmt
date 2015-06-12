<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('muser');
    }
    
    public function index()
    {
        $user = $this->session->userdata('userdb');
		
		if($user){
			$users = $this->muser->get_all_user();
			$data['title'] = "User List";
		
			$data['header'] = $this->load->view('shared/header',array(),TRUE);	
			$data['sidebar'] = $this->load->view('shared/sidebar','',TRUE);
			$data['footer'] = $this->load->view('shared/footer','',TRUE);
			$data['content'] = $this->load->view('user/list_user',array('user'=>$users),TRUE);
	
			$this->load->view('front',$data);
        }else{
        	redirect('user/login');
        }
        
    }
    
    public function user_log()
    {
        $user = $this->session->userdata('userdb');
		
		if($user){
			$content['logs'] = $this->muser->get_all_user_log();
			$data['title'] = "User Log";
		
			$data['header'] = $this->load->view('shared/header',array(),TRUE);	
			$data['sidebar'] = $this->load->view('shared/sidebar','',TRUE);
			$data['footer'] = $this->load->view('shared/footer','',TRUE);
			$data['content'] = $this->load->view('user/list_log',$content,TRUE);
	
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
    	$user_id = $this->uri->segment(3); $content['info']="";
    	
    	if($user_id){$content['info'] = $this->muser->get_user_by_id($user_id);}
    	
    	$data['title'] = "Input User";
    	
        $data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
        $data['content'] = $this->load->view('user/input',$content,TRUE);
    
        $this->load->view('front',$data);
    }
    
	public function userEnter()
	{
		$params['username'] = $this->input->post('username');
        $params['password'] = md5($this->input->post('password'));
        
        if($this->check_login($params['username'],$params['password'])){
            $user = $this->muser->get_user_id_by_username($params['username']);
            $data = array(
                'username' => $params['username'],
                'id' => $user->id,
                'name' => $user->name,
                'is_logged_in' => true,
                'role' => $user->role
            );
            $this->session->set_userdata('userdb',$data);
            $this->muser->insert_user_log($data['id']);
            if($user->role == "admin"){
                redirect('general');
            }elseif($user->role == "cmt"){
                redirect('general');
            }elseif($user->role == "rm"){
            	redirect('general');
            }
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
        
      	$user['username'] = $this->input->post('username');
        if($id && $this->input->post('password')){
        	$user['password'] = md5($this->input->post('password'));
        }
        $user['name'] = $this->input->post('name');
        $user['role'] = $this->input->post('role');
        $user['anchor'] = $this->input->post('anchor');
        $user['product'] = $this->input->post('product');
        
        if($id){
			if($this->muser->update_user_general($user,$id)){
				redirect('user');
			}
    	}else{
			if($this->muser->register($user)){
        		redirect('user');
			}
    	}
    }
    
    public function logout(){
        $this->session->unset_userdata('userdb');
        redirect('/user/login');
    }
     
     public function check_user_password($password=null,$format=null){
         if($password==null){
             $password = $this->input->post('password');
         }
         $value;
         if($this->muser->get_user_password($password)){
             $value = $this->muser->get_user_password($password);
         }else{
             $value = $this->muser->get_user_password($password);
         }
         if($format==null){
            $this->output->set_content_type('application/json')
                        ->set_output(json_encode(array("value" => $value)));
         }
         return $value;
     }
    
    public function change_password(){
    	$user['password'] = md5($this->input->post('password_new'));
        
        if($this->muser->update_user($user)){
        	$json['status']=1;
        }
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    }
      
	function random_password($length = 10) {
        $validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ!@#$%^()1234567890";
        $validCharNumber = strlen($validCharacters);
        $result = "";
        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }
        return $result;
     }
    
    public function form_password(){
    	$data['title'] = 'Change Password';
    	
    	$user = $this->session->userdata('userdb');
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['sidebar'] = $this->load->view('shared/sidebar','',TRUE);
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('user/form_password','',TRUE);
		$this->load->view('front',$data);
    }
}
