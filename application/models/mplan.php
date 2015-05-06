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
class Mplan extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    function insert_strategy($program){
        return $this->db->insert('strategy', $program);
    }
    
    function insert_plan($program){
        return $this->db->insert('plan', $program);
    }
    
    function insert_plan_update($program){
        return $this->db->insert('plan_update', $program);
    }
    
    //UPDATE FUNCTION
    
    function update_strategy($program,$prod,$anchor_id){
        $this->db->where('product',$prod);
        $this->db->where('anchor_id',$anchor_id);
        return $this->db->update('strategy', $program);
    }
    
    function update_plan($program,$id){
        $this->db->where('id',$id);
        return $this->db->update('plan', $program);
    }
        
    //GET FUNCTION
    function get_plan($anchor_id,$product){
    	$this->db->select('plan.*,user.name as name');
    	$this->db->where('anchor_id', $anchor_id);
    	$this->db->where('plan.product', $product);
    	$this->db->join('user', 'user.id = plan.user_id');
    	$this->db->order_by('plan.id', 'asc');
    	$query = $this->db->get('plan');
        return $query->result();
    }
    
    function get_strategy_by_prod($product,$anchor_id){
    	$this->db->select('strategy.*,user.name as name');
    	$this->db->where('anchor_id', $anchor_id);
    	$this->db->where('strategy.product', $product);
    	$this->db->join('user', 'user.id = strategy.user_id');
    	$query = $this->db->get('strategy');
        return $query->row(0);
    }
    
    function get_plan_by_id($id){
        $this->db->where('plan.id',$id);
        $result = $this->db->get('plan');
        if($result->num_rows==1){
            return $result->row(0);
        }else{
            return false;
        }
    }
    
    function get_plan_update($plan_id){
    	$this->db->where('plan_id', $plan_id);
    	$this->db->join('user', 'user.id = plan_update.user_id');
    	$this->db->order_by('plan_update.id', 'desc');
    	$query = $this->db->get('plan_update');
        return $query->result();
    }
    
    //DELETE FUNCTION
    
    function delete_plan($id){
    	$this->db->where('id',$id);
    	$this->db->delete('plan');
    	if($this->db->affected_rows()>0){
    		$this->delete_plan_plan_update($id);
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_plan_plan_update($plan_id){
    	$this->db->where('plan_id',$plan_id);
    	$this->db->delete('plan_update');
    	if($this->db->affected_rows()>0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_strategy($prod,$anchor_id){
    	$this->db->where('product',$prod);
        $this->db->where('anchor_id',$anchor_id);
    	$this->db->delete('strategy');
    	if($this->db->affected_rows()>0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
}
