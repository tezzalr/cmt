<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Scorecard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mrealization');
        $this->load->model('mwallet');
        
    }
    /**
     * Method for page (public)
     */
    public function show(){
    
		$data['title'] = "Scorecard - CB";
		$id = $this->uri->segment(3);
		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; 
    	$content['year'] = $year; $content['month'] = $rpttime['month'];
		
		$sc = array(); $i=0; 
		$real = array();
		$p1=0; $p2=0; $p3=0; $g1=0; $g2=0; $g3=0; $s1=0; $s2=0; $s3=0;
		$month = $content['month'];
		//$arrsc = array('platinum','gold','silver');
		
		$anchors = $this->manchor->get_anchor_sc($id);
		foreach($anchors as $anchor){
			$rlz_raw = $this->mrealization->get_anchor_realization($anchor->id, $year,"","wholesale");
			$wallet = $this->mwallet->get_anchor_ws_wallet($anchor->id, $year,"wholesale");
    		$rlz = $this->mrealization->count_realization_value($rlz_raw, $month,"wholesale");
    		$sow = $this->mwallet->get_sow($wallet, $rlz, 'wholesale');
    		
			$sc[$i]['anchor'] = $anchor;
			$sc[$i]['wal'] = $this->mwallet->get_anchor_total_wallet($anchor->id, $year);
			$sc[$i]['inc'] = $this->mrealization->get_anchor_total_income($anchor->id, $year);
			if($sc[$i]['wal']['ws']){
				$sc[$i]['sow'] = $sc[$i]['inc']['ws']/$sc[$i]['wal']['ws'];
			}else{
				$sc[$i]['sow'] = 0;
			}
			if($sow[32]){
				$sc[$i]['trx'] = $sow[34]/$sow[32];
			}else{$sc[$i]['trx'] = 10;}
			if($rlz['IL_vol']+$rlz['WCL_vol']+$rlz['SL_vol']){
				$sc[$i]['casx'] = $rlz['CASA_vol']/($rlz['IL_vol']+$rlz['WCL_vol']+$rlz['SL_vol']);
			}else{$sc[$i]['casx'] = 10;}
			$i++;
		}
		
		$arrsc['platinum'][1]=""; $arrsc['platinum'][2]=""; $arrsc['platinum'][3]="";
		$arrsc['gold'][1]=""; $arrsc['gold'][2]=""; $arrsc['gold'][3]="";
		$arrsc['silver'][1]=""; $arrsc['silver'][2]=""; $arrsc['silver'][3]="";
		
		foreach($sc as $each){
			if($each['sow']<=0.3 /*|| $each['trx']<=0.5 || $each['casx']<=0.05*/){
				$ring = 3;
			}
			elseif(($each['sow']>0.3 && $each['sow']<=0.6) /*|| ($each['trx']>0.5 && $each['trx']<=1) || ($each['casx']>0.05 && $each['casx']<=0.1)*/){
				$ring = 2;
			}else{
				$ring = 1;
			}
			
			if($each['anchor']->gas >20000){
				if($ring==1){$x=$p1;}elseif($ring==2){$x=$p2;}else{$x=$p3;}
				$arrsc['platinum'][$ring][$x] = $each;
				if($ring==1){$p1++;}elseif($ring==2){$p2++;}else{$p3++;}
			}
			elseif($each['anchor']->gas < 20000 && $each['anchor']->gas > 5000){
				if($ring==1){$x=$g1;}elseif($ring==2){$x=$g2;}else{$x=$g3;}
				$arrsc['gold'][$ring][$x] = $each;
				if($ring==1){$g1++;}elseif($ring==2){$g2++;}else{$g3++;}
			}
			elseif($each['anchor']->gas < 5000){
				if($ring==1){$x=$s1;}elseif($ring==2){$x=$s2;}else{$x=$s3;}
				$arrsc['silver'][$ring][$x] = $each;
				if($ring==1){$s1++;}elseif($ring==2){$s2++;}else{$s3++;}
			}
		}
		$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($id);
    	$content['dir']['code'] = $id;
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		$content['scs']=$arrsc;
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('scorecard/scorecard_table',$content,TRUE);

		$this->load->view('front',$data);
        
    }
    
    public function product(){
		$content['prd_id'] = $this->uri->segment(3);
		$content['prd_name'] = change_real_name($this->uri->segment(3));
		$data['title'] = "Scorecard - ".$content['prd_name'];
		
		$id = $this->uri->segment(3);
		$rpttime = $this->session->userdata('rpttime');
    	$year = $rpttime['year']; 
    	$content['year'] = $year; $content['month'] = $rpttime['month'];
		
		$sc = array(); $i=0; 
		$real = array();
		$p1=0; $p2=0; $p3=0; $g1=0; $g2=0; $g3=0; $s1=0; $s2=0; $s3=0;
		$month = $content['month'];
		//$arrsc = array('platinum','gold','silver');
		$prd_vol = $content['prd_id']."_vol";
		$anchors = $this->manchor->get_anchor_sc($id);
		foreach($anchors as $anchor){
			$rlz_raw = $this->mrealization->get_anchor_realization($anchor->id, $year,"","wholesale");
			$wallet = $this->mwallet->get_anchor_ws_wallet($anchor->id, $year,"wholesale");
    		$rlz = $this->mrealization->count_realization_value($rlz_raw, $month,"wholesale");
    		$sow = $this->mwallet->get_sow($wallet, $rlz, 'wholesale');
    		
			$sc[$i]['anchor'] = $anchor;
			$sc[$i]['wal'] = $wallet->$prd_vol;//$this->mwallet->get_anchor_total_wallet($anchor->id, $year);
			$sc[$i]['real'] = $rlz[$prd_vol];//$this->mrealization->get_anchor_total_income($anchor->id, $year);
			if($wallet->CASA_vol){
				$sc[$i]['sow'] = $sow[return_prod_number($content['prd_id'])];//$sc[$i]['inc']['ws']/$sc[$i]['wal']['ws'];
			}else{
				$sc[$i]['sow'] = 0;
			}
			if($sow[32]){
				$sc[$i]['trx'] = $sow[34]/$sow[32];
			}else{$sc[$i]['trx'] = 10;}
			if($rlz['IL_vol']+$rlz['WCL_vol']+$rlz['SL_vol']){
				$sc[$i]['casx'] = $rlz['CASA_vol']/($rlz['IL_vol']+$rlz['WCL_vol']+$rlz['SL_vol']);
			}else{$sc[$i]['casx'] = 10;}
			$i++;
		}
		
		$arrsc['platinum'][1]=""; $arrsc['platinum'][2]=""; $arrsc['platinum'][3]="";
		$arrsc['gold'][1]=""; $arrsc['gold'][2]=""; $arrsc['gold'][3]="";
		$arrsc['silver'][1]=""; $arrsc['silver'][2]=""; $arrsc['silver'][3]="";
		$arrsc['nowallet']="";
		
		$arr_prod = array(); 
    	for($i=1;$i<=15;$i++){
    		$arr_prod[$i]['id'] = return_prod_name($i);
    		$arr_prod[$i]['name'] = change_real_name($arr_prod[$i]['id']);
    	}
    	
    	$content['arr_prod'] = $arr_prod;
		
		$batas = get_batas_wallet($content['prd_id']);
		
		foreach($sc as $each){
			if($each['sow']){
				if($each['sow']<=30 /*|| $each['trx']<=0.5 || $each['casx']<=0.05*/){
					$ring = 3;
				}
				elseif(($each['sow']>30 && $each['sow']<=60) /*|| ($each['trx']>0.5 && $each['trx']<=1) || ($each['casx']>0.05 && $each['casx']<=0.1)*/){
					$ring = 2;
				}else{
					$ring = 1;
				}
			
				if($each['wal'] > $batas['atas']){
					if($ring==1){$x=$p1;}elseif($ring==2){$x=$p2;}else{$x=$p3;}
					$arrsc['platinum'][$ring][$x] = $each;
					if($ring==1){$p1++;}elseif($ring==2){$p2++;}else{$p3++;}
				}
				elseif($each['wal'] < $batas['atas'] && $each['wal'] > $batas['bawah']){
					if($ring==1){$x=$g1;}elseif($ring==2){$x=$g2;}else{$x=$g3;}
					$arrsc['gold'][$ring][$x] = $each;
					if($ring==1){$g1++;}elseif($ring==2){$g2++;}else{$g3++;}
				}
				elseif($each['wal'] < $batas['bawah']){
					if($ring==1){$x=$s1;}elseif($ring==2){$x=$s2;}else{$x=$s3;}
					$arrsc['silver'][$ring][$x] = $each;
					if($ring==1){$s1++;}elseif($ring==2){$s2++;}else{$s3++;}
				}
			}
			else{
				$arrsc['nowallet'] = $each;
			}
		}
		$content['anchor'] = ""; $content['dir']['name'] = get_direktorat_full_name($id);
    	$content['dir']['code'] = $id;
		$content['sidebar'] = $this->load->view('shared/sidebar',$content,TRUE);
		$content['scs']=$arrsc;
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('scorecard/scorecard_table_product',$content,TRUE);

		$this->load->view('front',$data);
        
    }
}
