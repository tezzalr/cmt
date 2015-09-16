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
class Msummary_desc extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    
    function insert_summary_desc($program){
        return $this->db->insert('summary_desc', $program);
    }
    
    //GET FUNCTION
    
    function get_summary_desc($month,$year,$for_what,$comp_id){
    	$this->db->where('month',$month);
    	$this->db->where('year',$year);
    	$this->db->where('for_what',$for_what);
    	$this->db->where('comp_id',$comp_id);
    	$result = $this->db->get('summary_desc');
    	$query = $result->result();
    	if($query){
    		return $query[0];
    	}else{
    		return "";
    	}
    }
    
    //UPDATE FUNCTION
    function update_summary_desc($program,$id){
        $this->db->where('id',$id);
        return $this->db->update('summary_desc', $program);
    }
    
    
    //DELETE FUNCTION
    function delete_summary_desc($id){
    	$this->db->where('id',$id);
    	$this->db->delete('summary_desc');
    	if($this->db->affected_rows()>0){
    		return true;
    	}
    	else{
    		return true;
    	}
    }
    
    // OTHER FUNCTION
}
