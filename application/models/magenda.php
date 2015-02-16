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
class Magenda extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    
    function insert_agenda($program){
        return $this->db->insert('agenda', $program);
    }
    
    //GET FUNCTION
    
    function get_all_agenda_month($month, $year){
    	$sumdate = date("t", mktime(0,0,0, $month, 1, $year));
    	$arragenda = array();
    	for($i=1;$i<=$sumdate;$i++){
    		$datetoget = $year."-".$month."-".$i;
    		$arragenda[$i] = $this->get_agenda_by_date($datetoget);
    	}
    	return $arragenda;
    }
    
    function get_agenda_by_date($date){
    	$this->db->select('*');
    	$this->db->where('DATE(start)',$date);
    	$this->db->order_by('start','desc');
    	$result = $this->db->get('agenda');
    	return $result->result();
    }
    
    function get_agenda_by_id($id){
    	$this->db->select('agenda.*,user.name as maker');
    	$this->db->join('user', 'agenda.maker_id = user.id');
    	$this->db->where('agenda.id',$id);
    	$res = $this->db->get('agenda'); 
    	$result = $res->row(0);
    	$agenda = array(); $user = explode(',',$result->required);
    	$agenda['agenda'] = $result;
    	$agenda['people'] = $this->get_agenda_required($user);
    	$agenda['arr_user'] = $user;
    	return $agenda;
    }
    
    function get_agenda_required($arr_people){
    	$this->db->where_in('id',$arr_people);
    	$result = $this->db->get('user');
    	return $result->result();
    }
    
    //UPDATE FUNCTION
    function update_agenda($program,$id){
        $this->db->where('id',$id);
        return $this->db->update('agenda', $program);
    }
    
    
    //DELETE FUNCTION
    function delete_agenda($id){
    	$this->db->where('id',$id);
    	$this->db->delete('agenda');
    	if($this->db->affected_rows()>0){
    		return true;
    	}
    	else{
    		return true;
    	}
    }
    
    // OTHER FUNCTION
}
