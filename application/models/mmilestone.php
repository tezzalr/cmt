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
class Mmilestone extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    function insert_milestone($milestone){
        return $this->db->insert('milestone', $milestone);
    }
    
    function insert_revised($milestone,$wb){
        $pack = $this->get_initiative_program_by_wb_id($wb);
        $initiative = $pack['init'];
        $program = $pack['prog'];
        $gh = $this->get_gh_id_by_initiative($initiative->code);
        $session = $this->session->userdata('user');
        $milestone['GH_id']=$gh;
        $milestone['PMO_id']=$program->segment;
        $milestone['user_id']=$session['id'];
        $milestone['date_update']=date('Y-m-d h:i:s');
        return $this->db->insert('revised', $milestone);
    }
    
    //GET FUNCTION
    
    function get_all_workblock_milestone($workblock_id){
    	$this->db->where('workblock_id', $workblock_id);
    	$this->db->order_by('id', 'asc');
    	$query = $this->db->get('milestone');
        $res = $query->result(); $arr = array(); $i=0;
        foreach($res as $re){
        	$arr[$i]['ms'] = $re;
        	$arr[$i]['revise'] = $this->get_milestone_revise($re->id);
        	$i++;
        }
        return $arr;
    }
    
    function get_milestone_revise($id){
    	$this->db->join('user as usergh', 'usergh.id = revised.GH_id');
    	$this->db->join('user as userpmo', 'userpmo.segment = revised.PMO_id');
    	$this->db->select('revised.*, usergh.name as GH, userpmo.name as PMO, userpmo.id as PMOid');
    	$this->db->where('milestone_id', $id);
    	$this->db->where("(desc_PMO != 'Approved' OR desc_GH != 'Approved')");
    	$this->db->order_by('revised.id', 'desc');
    	$this->db->limit(1);
    	$query = $this->db->get('revised');
    	return $query->row(0);
    }
    
    function get_workblock_by_id($id){
        $this->db->where('id',$id);
        $result = $this->db->get('workblock');
        if($result->num_rows==1){
            return $result->row(0);
        }else{
            return false;
        }
    }
    
    function get_initiative_program_by_wb_id($wb_id){
		$this->db->select('initiative.*');
		$this->db->join('workblock', 'initiative.id = workblock.initiative_id');
        $this->db->where('workblock.id',$wb_id);
        $result = $this->db->get('initiative');
        $arr = array();
        if($result->num_rows==1){
            $arr['init'] = $result->row(0);
            $this->db->select('program.*');
			$this->db->join('initiative', 'program.id = initiative.program_id');
        	$this->db->where('initiative.id',$arr['init']->id);
        	$result = $this->db->get('program');
        	$arr['prog'] = $result->row(0);
        	return $arr;
        }else{
            return false;
        }
    }
    
    function get_gh_id_by_initiative($code){
    	$this->db->like('initiative',$code);
    	$this->db->where('jabatan','GH');
    	$query = $this->db->get('user');
        return $query->row(0)->id;
    }
    
    function get_pending_aprv($id,$role){
    	if($role == 'PIC'){$aut = 'GH';}
    	else{$aut = 'PMO';}
    	
    	$this->db->select('*,milestone.title as milestone,workblock.title as workblock,initiative.title as initiative, initiative.code as code');
		$this->db->join('milestone', 'milestone.id = revised.milestone_id');    	
		$this->db->join('workblock', 'workblock.id = milestone.workblock_id');
    	$this->db->join('initiative', 'initiative.id = workblock.initiative_id');

    	$this->db->where($aut.'_id',$id);
    	$this->db->where('desc_'.$aut,'Not Yet');
    	$query = $this->db->get('revised');
    	
    	return $query->result();
    }
    
    //UPDATE FUNCTION
    function update_milestone($ms, $id){
        $this->db->where('id',$id);
        return $this->db->update('milestone', $ms);
    }
    
    function update_revised($ms, $id){
        $this->db->where('id',$id);
        return $this->db->update('revised', $ms);
    }
    
    //DELETE FUNCTION
    
    function delete_milestone(){
    	$id = $this->input->post('id');
    	$this->db->where('id',$id);
    	$this->db->delete('milestone');
    	if($this->db->affected_rows()>0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    // OTHER FUNCTION
}
