<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Extfile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('mvalue_chain');
        $this->load->model('muser');
        $this->load->library('excel');
        
        /*$session = $this->session->userdata('userdb');
        
        if(!$session){
            redirect('user/login');
        }*/
    }
    /**
     * Method for page (public)
     */
    public function index()
    {
		redirect('program/list_programs');
    }
    
    public function submit_file_input(){
    	$month = $this->input->post('month');
    	$year = $this->input->post('year');
    	$filetype = $this->input->post('filetype');
    	
    	if($filetype == "scoring"){
			redirect('scoring/anchor_scoring');
		}
		elseif($filetype == "detail"){
    		$this->manchor->delete_detail($year,$month);
    		$this->input_detail($year,$month);
    	}
    	else{
    		$this->manchor->delete_ws($filetype,$year,$month);
    		$this->manchor->delete_al($filetype,$year,$month);
    		$this->input_ws_al($filetype,$year,$month);
    	}
    	redirect('anchor');
    	
    }
    
    private function input_ws_al($kind, $year, $month){
    	$iter=1;
    	$month_x = ''; $year_fldr = '';
    	$kind_file = $kind;
    	if($kind == 'realization' || $kind == 'realization_company'){
    		$year_fldr= $year."/"; 
    		$iptdata['month']= $month; 
    		$iptdata2['month']= $month;
    		$month_x = $month;
    	}
    	if($kind=='realization_company'){
    		$kind_file = 'realization';
    	}
    	$arr_target = $this->get_excel('datadashboard/'.$kind_file.'/'.$year_fldr.$kind_file.'_'.$year.$month_x.'.xlsx',"realisasi",$kind);
    	
    	foreach($arr_target as $target){
    		if($kind != 'realization_company'){
    			$anchor_id = $this->manchor->get_anchor_id($target[0],$target[1]);
    			$iptdata['anchor_id']= $anchor_id;
    			$iptdata2['anchor_id']= $anchor_id;
    		}elseif($kind=='realization_company'){
    			$iptdata['anchor_name']= $target[0];
    			$iptdata['comp_name']= $target[2];
    			$iptdata2['anchor_name']= $target[0];
    			$iptdata2['comp_name']= $target[2];
    		}
    		if(($kind!='realization_company' && $anchor_id) || $kind == 'realization_company'){			
				$iptdata['CASA_vol']= $target[4];
				$iptdata['CASA_nii']= $target[5];
				$iptdata['CASA_fbi']= $target[6];
				$iptdata['CASA_trans']= $target[7];
				$iptdata['TD_vol']= $target[8];
				$iptdata['TD_nii']= $target[9];
				$iptdata['WCL_vol']= $target[10];
				$iptdata['WCL_nii']= $target[11];
				$iptdata['WCL_fbi']= $target[12];
				$iptdata['IL_vol']= $target[13];
				$iptdata['IL_nii']= $target[14];
				$iptdata['IL_fbi']= $target[15]; //salah
				$iptdata['SL_vol']= $target[16];
				$iptdata['SL_nii']= $target[17];
				$iptdata['SL_fbi']= $target[18];
				$iptdata['FX_vol']= $target[19];
				$iptdata['FX_fbi']= $target[20];
				$iptdata['SCF_vol']= $target[21]; //salah
				$iptdata['SCF_fbi']= $target[22]; //salah
				$iptdata['Trade_vol']= $target[23];
				$iptdata['Trade_fbi']= $target[24];//salah
				$iptdata['PWE_vol']= $target[25];
				$iptdata['PWE_fbi']= $target[26];
				$iptdata['TR_vol']= $target[27];
				$iptdata['TR_nii']= $target[28];
				$iptdata['BG_vol']= $target[29];
				$iptdata['BG_fbi']= $target[30];
				$iptdata['OIR_vol']= $target[31];
				$iptdata['OIR_fbi']= $target[32];
				$iptdata['OW_vol']= $target[33];
				$iptdata['OW_nii']= $target[34];
				$iptdata['OW_fbi']= $target[35];
				$iptdata['ECM_vol']= $target[36];
				$iptdata['ECM_fbi']= $target[37];
				$iptdata['DCM_vol']= $target[38];
				$iptdata['DCM_fbi']= $target[39];
				$iptdata['MA_vol']= $target[40];
				$iptdata['MA_fbi']= $target[41];
			
				$iptdata['year']= $year;
				
				$this->manchor->insert_ws($iptdata, $kind);
			
				$iptdata2['WM_vol']= $target[42];
				$iptdata2['WM_nii']= $target[43];
				$iptdata2['DPLK_vol']= $target[44];
				$iptdata2['DPLK_fbi']= $target[45];
				$iptdata2['PCD_vol']= $target[46];
				$iptdata2['PCD_nii']= $target[47];
				$iptdata2['VCCD_vol']= $target[48];
				$iptdata2['VCCD_nii']= $target[49];
				$iptdata2['VCCD_fbi']= $target[50];
				$iptdata2['VCL_vol']= $target[51];
				$iptdata2['VCL_nii']= $target[52];
				$iptdata2['VCL_fbi']= $target[53];
				$iptdata2['VCLnDF_vol']= $target[54];
				$iptdata2['VCLnDF_nii']= $target[55];
				$iptdata2['VCLnDF_fbi']= $target[56];
				$iptdata2['Micro_Loan_vol']= $target[57];
				$iptdata2['Micro_Loan_nii']= $target[58];
				$iptdata2['Micro_Loan_fbi']= $target[59];
				$iptdata2['MKM_vol']= $target[60];
				$iptdata2['MKM_nii']= $target[61];
				$iptdata2['KPR_vol']= $target[62];
				$iptdata2['KPR_nii']= $target[63];
				$iptdata2['Auto_vol']= $target[64];
				$iptdata2['Auto_nii']= $target[65];
				$iptdata2['CC_vol']= $target[66];
				$iptdata2['CC_nii']= $target[67];
				$iptdata2['EDC_vol']= $target[68];
				$iptdata2['EDC_fbi']= $target[69];
				$iptdata2['ATM_vol']= $target[70];
				$iptdata2['ATM_fbi']= $target[71];
				$iptdata2['AXA_vol']= $target[72];
				$iptdata2['AXA_fbi']= $target[73];
				$iptdata2['MAGI_vol']= $target[74];
				$iptdata2['MAGI_fbi']= $target[75];
				$iptdata2['retail_vol']= $target[76];
				$iptdata2['retail_fbi']= $target[77];
				$iptdata2['cicil_Emas_vol']= $target[78];
				$iptdata2['cicil_Emas_fbi']= $target[79];
				$iptdata2['OA_vol']= $target[80];
				$iptdata2['OA_nii']= $target[81];
				$iptdata2['OA_fbi']= $target[82];
			
				$iptdata2['year']= $year;
				
				$this->manchor->insert_al($iptdata2, $kind);
			}
    		
    	}
    }
	
	public function input_data_vc(){
		$exel = $this->read_excel("Daftar VC.xlsx",1);
    	$arrres = array(); $s=0;
		for ($row = 2; $row <= $exel['row']; ++$row) {
			$data = "";
			for ($col = 0; $col < $exel['col']; ++$col) {
				$arrres[$row][$col] = $exel['wrksheet']->getCellByColumnAndRow($col, $row)->getValue();
			}
			
			$data['name'] = $arrres[$row][5];
			$data['relationship'] = $arrres[$row][3];
			$data['cif'] = $arrres[$row][4];
			$data['address'] = $arrres[$row][6];
			$data['kanwil'] = $arrres[$row][7];
			$data['area'] = $arrres[$row][8];
			$data['contact_person'] = $arrres[$row][9];
			$data['telp'] = $arrres[$row][10];
			$data['email'] = $arrres[$row][11];
			$data['omzet'] = $arrres[$row][12];
			$data['sector'] = $arrres[$row][13];
			$data['anchor_id'] = 164;
			
			$this->mvalue_chain->insert_value_chain($data);
			/*if($anchor){
				$this->manchor->update_anchor($data,$anchor->id);
			}
			else{
				$this->manchor->insert_anchor_only($data);
			}*/	
		}
	}
	
	public function input_data_anchor(){
		$exel = $this->read_excel("Data Anchor.xlsx",1);
    	$arrres = array(); $s=0;
		for ($row = 2; $row <= $exel['row']; ++$row) {
			$data = "";
			for ($col = 0; $col < $exel['col']; ++$col) {
				$arrres[$row][$col] = $exel['wrksheet']->getCellByColumnAndRow($col, $row)->getValue();
			}
			
			$data['name'] = $arrres[$row][0];
			$data['group'] = $arrres[$row][1];
			$data['code_dept'] = $arrres[$row][2];
			$data['dept'] = $arrres[$row][3];
			$data['show_anc'] = 1;
			
			$anchor = $this->manchor->get_anchor_by_name($data['name']);
			
			if($anchor){
				$this->manchor->update_anchor($data,$anchor->id);
			}
			else{
				$this->manchor->insert_anchor_only($data);
			}	
		}
	}
    
    private function read_excel($file,$sheet){
    	$arrres = array();
    	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objReader->setReadDataOnly(TRUE);
		$objPHPExcel = $objReader->load("assets/upload/".$file);
		
		$arrres['wrksheet'] = $objPHPExcel->getActiveSheet();
		// Get the highest row and column numbers referenced in the worksheet
		$arrres['row'] = $arrres['wrksheet']->getHighestRow(); // e.g. 10
		$highestColumn = $arrres['wrksheet']->getHighestColumn(); // e.g 'F'
		$arrres['col'] = PHPExcel_Cell::columnIndexFromString($highestColumn);
		
		return $arrres;
    }
    
    public function get_excel($filename, $file_type, $kind){
    	if($file_type == "realisasi"){$jumcol = 82;}
    	elseif($file_type == "detail"){$jumcol = 15;}
    	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$objReader->setReadDataOnly(TRUE);
		$objPHPExcel = $objReader->load("assets/".$filename);

		$objWorksheet = $objPHPExcel->getActiveSheet();
		// Get the highest row and column numbers referenced in the worksheet
		$highestRow = $objWorksheet->getHighestRow(); // e.g. 10
		$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		
		$rachel = array();
		$i=1;
		if($kind!="realization_company"){
			$same='';
			for ($row = 1; $row <= $highestRow; ++$row) {
				$agatha = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
				if($agatha != $same){
					for ($col = 0; $col < $highestColumnIndex; ++$col) {
						$rachel[$i][$col] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
					}
					$same = $agatha;
					$i++;
				}
				else{
					for ($ar=4;$ar<=$jumcol;$ar++){
						$rachel[$i-1][$ar] = $rachel[$i-1][$ar]+$objWorksheet->getCellByColumnAndRow($ar, $row)->getValue();	
					}
				}
			}
		}
		else{
			for ($row = 1; $row <= $highestRow; ++$row) {
				for ($col = 0; $col < $highestColumnIndex; ++$col) {
					$rachel[$row][$col] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
				}
			}
		}
		return $rachel;
    }
    
}
