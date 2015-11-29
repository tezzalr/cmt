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
class Mscoring extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
        
    
    //GET FUNCTION
    
    /*Anchor Function*/
    
    function get_anchor_with_wallet($db,$year,$month,$prod){
    	$this->db->select('anchor.id, anchor.name');
    	$this->db->select($prod."_vol");
    	$this->db->join('anchor', 'anchor.id = wholesale_'.$db.'.anchor_id');
    	$this->db->where('year',$year);
    	if($db == "realization" ){
    		$this->db->where('month',$month);
    	}
    	$this->db->where($prod."_vol <> 0");
    	$this->db->where('show_anc',1);
    	$this->db->where('holding', "");
    	$this->db->order_by($prod."_vol", "desc"); 
    	$result = $this->db->get('wholesale_'.$db);
    	$query = $result->result();
    	return $query;
    }
    
    function get_scoring_comp($group, $id_comp){
    	$this->db->where('id_comp',$id_comp);
    	if($group){
    		$this->db->where('group_scor',$group);
    	}
    	$result = $this->db->get('scoring_comp');
    	$query = $result->result();
        return $query[0];
    }
    
    function get_scoring_comp_by_group($group){
    	if($group){
    		$this->db->where('group_scor',$group);
    	}
    	$result = $this->db->get('scoring_comp');
    	$query = $result->result();
        return $query;
    }
    
    function get_anchor_comp_val($anchor_id,$comp_id){
    	$this->db->where('anchor_id',$anchor_id);
    	$this->db->where('scoring_comp_id',$comp_id);
    	$result = $this->db->get('anchor_comp_val');
    	$query = $result->result();
        if($query){return $query[0];}
        else{return false;}
    }
	
	function get_anchor_scoring_detail_by_id($anchor_id){
		$this->db->where('anchor_id',$anchor_id);
    	$this->db->where('bobot <> 0');
		$this->db->join('anchor', 'anchor.id = anchor_comp_val.anchor_id');
		$this->db->join('scoring_comp', 'anchor_comp_val.scoring_comp_id = scoring_comp.id');
		$result = $this->db->get('anchor_comp_val');
    	$query = $result->result();
        if($query){return $query;}
        else{return false;}
	}
    
    function insert_scoring($iptdata){ 
    	return $this->db->insert('anchor_comp_val', $iptdata);
    }
    
    function update_scoring_comp($data, $id){
        $this->db->where('id',$id);
        return $this->db->update('scoring_comp', $data);
    }
	
	function truncate_table_anchor_comp_val(){
		$this->db->truncate('anchor_comp_val'); 
	}
}
