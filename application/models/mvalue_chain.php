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
    
    //DELETE FUNCTION
    
    
    
    //UPDATE FUNCTION
    
    
}
