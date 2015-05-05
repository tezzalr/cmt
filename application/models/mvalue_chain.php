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
class Mvalue_chain extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    function insert_value_chain($program){
        return $this->db->insert('value_chain', $program);
    }
    
    //GET FUNCTION
    
    function get_value_chain($anchor_id){
    	$this->db->where('anchor_id', $anchor_id);
    	$this->db->order_by('omzet', 'desc');
    	$query = $this->db->get('value_chain');
        return $query->result();
    }
    
    function get_value_chain_by_id($id){
    	$this->db->where('id', $id);
    	$query = $this->db->get('value_chain');
        return $query->row(0);
    }
    
    //DELETE FUNCTION
    
    
    
    //UPDATE FUNCTION
    
    
}
