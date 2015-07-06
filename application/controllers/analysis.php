<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Analysis extends CI_Controller {
    
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
    	$year = $rpttime['year'];
    	$anchor_id = $this->uri->segment(4);
    	if($this->uri->segment(3)=='anchor'){
			$anchor = $this->manchor->get_anchor_by_id($anchor_id);
			$content['anchor'] = $anchor;
		
			$data['title'] = "Anchor Analysis - content['anchor']->name";
			$content['id'] = $anchor_id;
			$content['level'] = 'anchor';
		}
		elseif($this->uri->segment(3)=='directorate'){
			
		}
		
		$rlz_raw = $this->mrealization->get_anchor_realization($anchor->id, $year,"","wholesale");
		$wallet = $this->mwallet->get_anchor_ws_wallet($anchor->id, $year);		
		$rlz = $this->mrealization->count_realization_value($rlz_raw, $month,"wholesale");
		$sow = $this->mwallet->get_sow($wallet, $rlz, 'wholesale');
		$content['all_sow'] = $this->mwallet->get_sow_lengkap($wallet, $rlz, 'wholesale');
		$content['wal'] = $this->mwallet->get_anchor_total_wallet($anchor->id, $year);
		$content['inc'] = $this->mrealization->get_anchor_total_income($anchor->id, $year);
		
		$inc_group = $this->mrealization->get_anchor_total_income_mth_to_mth_ytd($anchor->id,$month,$year);
		$content['inc_group'] = $inc_group;
		//$content['inc'] = $inc_group['ty']['tot']*$inc_group['ly_ey']['tot']/$inc_group['ly']['tot']/pow(10,9);
		
		if($content['wal']['ws']){
			$content['sow'] = $content['inc']['ws']/$content['wal']['ws'];
		}else{
			$content['sow'] = 0;
		}
		if($sow[32]){
			$content['trx'] = $sow[34]/$sow[32];
		}else{$content['trx'] = 10;}
		if($rlz['IL_vol']+$rlz['WCL_vol']+$rlz['SL_vol']){
			$content['casx'] = $rlz['CASA_vol']/($rlz['IL_vol']+$rlz['WCL_vol']+$rlz['SL_vol']);
		}else{$content['casx'] = 10;}
		
		$content['ring'] = return_ring($content['sow'],$content['trx'],$content['casx']);
		$content['mineral'] = return_mineral($anchor);
		
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('analysis/show_analysis',$content,TRUE);

		$this->load->view('front',$data);
    }
}
