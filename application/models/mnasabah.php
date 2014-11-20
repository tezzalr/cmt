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
class Mnasabah extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    
    function insert_nasabah($nasabah){ 
    	return $this->db->insert('nasabah', $nasabah);
    }
    
    function get_nasabah_cib_fac($group,$fac){
    	$this->db->where($fac.' > ',0);
    	$this->db->like('newbuc', $group, 'after'); 
    	$this->db->order_by('newbuc','asc');
    	$this->db->order_by('group','asc');
    	$this->db->order_by('company','asc');
    	$result = $this->db->get('nasabah');
    	$query = $result->result();
    	return $query;
    }
    
    function get_group_nasabah(){
    	$arr = array(); $i=0;
    	$this->db->select('nasabah.group');
    	$this->db->distinct();
    	$this->db->order_by('group','asc');
    	$this->db->order_by('company','asc');
    	$result = $this->db->get('nasabah');
    	$query = $result->result();
    	foreach ($query as $nas){
    		$arr[$i]['group'] = $nas->group;
    		$arr[$i]['rm'] = $this->get_distinct('rm',$nas->group);
    		$arr[$i]['sector'] = $this->get_distinct('sector',$nas->group);
    		$arr[$i]['gas'] = $this->get_distinct('gas',$nas->group);
    		$i++;
    	}
    	return $arr;
    }
    
    function get_distinct($par,$group){
    	$this->db->select('nasabah.'.$par);
    	$this->db->distinct();
    	$this->db->where('group',$group);
    	$this->db->order_by('group','asc');
    	$result = $this->db->get('nasabah');
    	$query = $result->result();
    	return $query;
    }
    
    //DELETE FUNCTION
    function empty_table($table){
    	return $this->db->empty_table($table);
    }
}
