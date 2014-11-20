<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Nasabah extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('muser');
        $this->load->model('magenda');
        $this->load->model('mnasabah');
        $this->load->library('excel');
        
        $session = $this->session->userdata('user_cmt');
        
        if(!$session){
            redirect('user/login');
        }
    }
    /**
     * Method for page (public)
     */
    public function index()
    {
		$data['title'] = "Agenda";
		
		$user = $this->session->userdata('user_cmt');
		
		if($this->uri->segment(3) && $this->uri->segment(4)){$month = $this->uri->segment(3); $year = $this->uri->segment(4);}
		else{$month = date('m'); $year = date('Y');}
		$agendas = $this->magenda->get_all_agenda_month($month, $year);
		
		$datereq['month'] = $month; $datereq['year']=$year;
		
		$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('agenda/index_agenda',array('agendas' => $agendas,'datereq'=>$datereq),TRUE);

		$this->load->view('front',$data);
    }
    
    public function show_data(){
    	$group = $this->uri->segment(3);
    	$fac = $this->uri->segment(4);
    	
    	$nas = $this->mnasabah->get_nasabah_cib_fac($group,$fac);
    	$data['title'] = "Nasabah";
    	
    	$user = $this->session->userdata('user_cmt');
    	
    	$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('nasabah/show_nasabah',array('nas' => $nas,'fac'=>$fac),TRUE);

		$this->load->view('front',$data);
    }
    
    public function show_data_group(){
    	
    	$nas = $this->mnasabah->get_group_nasabah();
    	$data['title'] = "Group";
    	
    	$user = $this->session->userdata('user_cmt');
    	
    	$data['header'] = $this->load->view('shared/header',array('user' => $user),TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('nasabah/show_group',array('nas' => $nas),TRUE);

		$this->load->view('front',$data);
    }
    
    public function input_data_nasabah(){
    	$exel = $this->read_excel("Data Nasabah CIB.xlsx",1);
    	$arrres = array(); $s=0;
    	if($this->mnasabah->empty_table('nasabah')){
			for ($row = 2; $row <= $exel['row']; ++$row) {
				for ($col = 0; $col < $exel['col']; ++$col) {
					$arrres[$row][$col] = $exel['wrksheet']->getCellByColumnAndRow($col, $row)->getValue();
				}
				$nasabah['company'] = $arrres[$row][1];
				$nasabah['group'] = $arrres[$row][2];
				$nasabah['sector'] = $arrres[$row][3];
				$nasabah['gas'] = $arrres[$row][4];
				$nasabah['oldbuc'] = $arrres[$row][5];
				$nasabah['newbuc'] = $arrres[$row][6];
				$nasabah['rm'] = $arrres[$row][7];
				$nasabah['loan'] = $arrres[$row][8];
				$nasabah['dana'] = $arrres[$row][9];
				$nasabah['ncl'] = $arrres[$row][10];
				
				$this->mnasabah->insert_nasabah($nasabah);
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
