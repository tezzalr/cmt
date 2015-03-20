<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class General extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mtarget');
        $this->load->model('mwallet');
        $this->load->model('mplan');
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
    public function performance_review(){
    	$rpttime = $this->session->userdata('rpttime');
    	
    	//$list_ap = $this->load->view('grafik/action_plan/_list_action_plan',array('plans' => $plans),TRUE);
    	
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('pr/home',array(),TRUE);
		
		$data['title'] = "Performance Reviwe";

		$this->load->view('front',$data);
    }
}
