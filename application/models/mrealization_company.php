<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admins
 *
 * @author Maulnick
 */
class Mrealization_company extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('manchor');
    }
    
    //INSERT or CREATE FUNCTION
        
    
    //GET FUNCTION
    
    /*Anchor Function*/
    
    function get_company_realization($anchor_name,$type_prod){
    	$time = $this->session->userdata('rpttime');
    	$this->db->where('anchor_name',$anchor_name);
    	$this->db->where('month',$time['month']);
    	$this->db->where('year',$time['year']);
    	$db = $type_prod."_realization_company";
    	$result = $this->db->get($db);
    	$query = $result->result();
        return $query;
    }
}
