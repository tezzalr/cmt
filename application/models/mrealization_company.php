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
    	$this->get_company_child_holding($anchor_name);
    	//$this->db->where('anchor_name',$anchor_name);
    	$this->db->where('month',$time['month']);
    	$this->db->where('year',$time['year']);
    	$db = $type_prod."_realization_company";
    	$result = $this->db->get($db);
    	$query = $result->result();
        return $query;
    }
    
	function get_company_child_holding($anchor_name){
    	$anchor = $this->manchor->get_anchor_by_name($anchor_name);
    	if($anchor->is_group_holding){
			$holding = $this->manchor->get_anchor_by_holding_name($anchor->name);
			$where_sent = "";
			foreach($holding as $hold){
				if($where_sent){$where_sent = $where_sent." OR ";}
				$where_sent = $where_sent." `anchor_name` = '".$hold->name."' ";
			}
			$where_sent = $where_sent."OR `anchor_name` = '".$anchor_name."' ";
			$this->db->where("(".$where_sent.")");
		}else{
			$this->db->where('anchor_name',$anchor->name);
		}
	} 
}
