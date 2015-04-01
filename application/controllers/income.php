<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Income extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mtarget');
        $this->load->model('mwallet');
        $this->load->library('excel');
    }
    /**
     * Method for page (public)
     */
    public function index()
    {		
        
    }
    
    public function show(){
    	$rpttime = $this->session->userdata('rpttime');
    	$month = $rpttime['month'];
    	
    	if($this->uri->segment(3)=='anchor'){
			$anchor_id = $this->uri->segment(4);
			
			$realization_ws = $this->mrealization->get_anchor_ws_realization($anchor_id, $rpttime['year']);
			$realization_al = $this->mrealization->get_anchor_al_realization($anchor_id, $rpttime['year']);
			$wallet_ws = $this->mwallet->get_anchor_ws_wallet($anchor_id, $rpttime['year']);
			$anchor = $this->manchor->get_anchor_by_id($anchor_id);
			$header = $this->load->view('anchor/anchor_header',array('anchor' => $anchor),TRUE);
		
			$data['title'] = "Pendapatan - $anchor->name";
		}
		elseif($this->uri->segment(3)=='directorate'){
			$directorate = $this->uri->segment(4);
			$realization_ws = $this->mrealization->get_directorate_realization($directorate, $rpttime['year'], 'wholesale');
			$realization_al = $this->mrealization->get_directorate_realization($directorate, $rpttime['year'], 'alliance');
			$wallet_ws = $this->mwallet->get_directorate_wallet($directorate, $rpttime['year'], 'wholesale');
		
			$header = $this->load->view('directorate/dir_header',array('directorate' => $directorate),TRUE);
			$dirname = get_direktorat_full_name($directorate);
			$data['title'] = "Pendapatan - $dirname";
		}
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('grafik/pendapatan',array('header' => $header, 'rlzn' => $realization_ws, 'ali' => $realization_al, 'wlt' => $wallet_ws, 'month' => $month),TRUE);

		$this->load->view('front',$data);
    }
}
