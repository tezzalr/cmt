<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Extfile extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('manchor');
        $this->load->model('muser');
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
		redirect('program/list_programs');
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
    
}
