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
class Manchor extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    function check_group($anchor_id,$month,$db,$type){
    	$list_group = array("CB1","CB2","CB3","CB4","CB5","CB6","CB7","CB");
    	if(in_array($anchor_id,$list_group)){
    		if($month){get_type_select_month($type,$this);}
			else{get_type_select($type,$this);}
    		get_direktorat_where($anchor_id,$this);
    		$this->db->join('anchor', 'anchor.id = '.$type.'_'.$db.'.anchor_id');
    	}
    	else{
			$anchor = $this->get_anchor_by_id($anchor_id);
			if($anchor->is_group_holding){
				$holding = $this->get_anchor_by_holding_name($anchor->name);
				$where_sent = "";
				foreach($holding as $hold){
					if($where_sent){$where_sent = $where_sent." OR ";}
					$where_sent = $where_sent." `anchor_id` = ".$hold->id." ";
				}
				$this->db->where("(".$where_sent.")");
				if($month){get_type_select_month('wholesale',$this);}
				else{get_type_select('wholesale',$this);}
			}
			else{
				$this->db->where('anchor_id',$anchor_id);
			}
    	}
    }
    
    function insert_anchor($anchor){
    	if($this->db->insert('anchor', $anchor)){
    		$result = $this->db->query('SELECT MAX(id) as id FROM anchor');
        	if($result->num_rows>0){return $result->row(0)->id;}
            else{return false;}
    	}
    }
    
    function insert_anchor_only($data){
    	return $this->db->insert('anchor', $data);
    }
    
    function insert_company($company){
    	if($this->db->insert('company', $company)){
    		$result = $this->db->query('SELECT MAX(id) as id FROM company');
        	if($result->num_rows>0){return $result->row(0)->id;}
            else{return false;}
    	}
    }
    
    function insert_ws($iptdata, $kind){ 
    	return $this->db->insert('wholesale_'.$kind, $iptdata);
    }
    
    function insert_al($iptdata, $kind){ 
    	return $this->db->insert('alliance_'.$kind, $iptdata);
    }
    
    function insert_detail($iptdata){
    	return $this->db->insert('detail_realization', $iptdata);
    }
    
    
    //GET FUNCTION
    
    /*Anchor Function*/
    function get_anchor_sc($dir){
		$this->db->where('show_anc', 1);
    	$this->db->where('holding', "");
		get_direktorat_where($dir,$this);
		
    	$this->db->order_by('gas','desc');
    	//$this->db->order_by('name','asc');
    	$result = $this->db->get('anchor');
    	return $result->result();
    }
    
    function get_anchor_id($name,$group){
    	$this->db->where('name',$name);
    	//$this->db->where('group',$group);
    	
    	$result = $this->db->get('anchor');
        if($result->num_rows>0){return $result->row(0)->id;}
        else{return false;}
    }
        
    function get_anchor_by_id($anchor_id){
    	$this->db->where('id',$anchor_id);
    	$result = $this->db->get('anchor');
    	$query = $result->result();
        return $query[0];
    }
    
    function get_anchor_by_name($anchor_name){
    	$this->db->where('name',$anchor_name);
    	$result = $this->db->get('anchor');
    	$query = $result->result();
        return $query[0];
    }
    
    function get_anchor_by_holding_name($holding){
    	$this->db->where('holding',$holding);
    	$result = $this->db->get('anchor');
    	$query = $result->result();
        return $query;
    }
    
    function get_anchor_by_group($group){
    	$this->db->where('group', $group);
    	$this->db->where('show_anc', 1);
    	$this->db->where('holding', "");
    	$this->db->order_by('dept','asc');
    	$this->db->order_by('name','asc');
    	$result = $this->db->get('anchor');
    	$anchors = $result->result();
    	$arr_anc = array(); $i=0;
    	foreach($anchors as $anc){
    		$arr_anc[$i]['anc'] = $anc;
    		if($anc->is_group_holding){
    			$arr_anc[$i]['member'] = $this->get_anchor_by_holding($anc->name);
    		}
    		$i++;
    	}
    	return $arr_anc;
    }
    
    function get_anchor_by_group_where($group){
    	get_direktorat_where($group,$this);
    	$this->db->where('show_anc', 1);
    	$this->db->where('holding', "");
    	$this->db->order_by('dept','asc');
    	$this->db->order_by('name','asc');
    	$result = $this->db->get('anchor');
    	$anchors = $result->result();
    	$arr_anc = array(); $i=0;
    	foreach($anchors as $anc){
    		$arr_anc[$i]['anc'] = $anc;
    		if($anc->is_group_holding){
    			$arr_anc[$i]['member'] = $this->get_anchor_by_holding($anc->name);
    		}
    		$i++;
    	}
    	return $arr_anc;
    }
    
    function get_anchor_by_holding($holding){
    	$this->db->where('show_anc', 1);
    	$this->db->where('holding', $holding);
    	$this->db->order_by('name','asc');
    	$result = $this->db->get('anchor');
    	return $result->result();
    }
    
    function get_anchor_by_direktorat($direktorat){
    	if($direktorat == 'corporate' || $direktorat == 'CB'){
    		$this->db->where('group', 'CORPORATE BANKING IV');
    		$this->db->or_where('group', 'CORPORATE BANKING I');
    		$this->db->or_where('group', 'CORPORATE BANKING II');
    		$this->db->or_where('group', 'CORPORATE BANKING III');
    		$this->db->or_where('group', 'CORPORATE BANKING V');
    		$this->db->or_where('group', 'CORPORATE BANKING VI');
    		$this->db->or_where('group', 'CORPORATE BANKING VII');
    	}
    	elseif($direktorat == 'institutional' || $direktorat == 'IB'){
    		$this->db->where('group', 'INSTITUTIONAL BANKING I');
    		$this->db->or_where('group', 'INSTITUTIONAL BANKING II');
    	}
    	elseif($direktorat == 'commercial' || $direktorat == 'CBB'){
    		$this->db->where('group', 'JAKARTA COMMERCIAL SALES');
    		$this->db->or_where('group', 'REGIONAL COMMERCIAL SALES I');
    		$this->db->or_where('group', 'REGIONAL COMMERCIAL SALES II');
    	}
    	elseif($direktorat == 'CIB'){
    		$this->db->where('group', 'CORPORATE BANKING IV');
    		$this->db->or_where('group', 'CORPORATE BANKING I');
    		$this->db->or_where('group', 'CORPORATE BANKING II');
    		$this->db->or_where('group', 'CORPORATE BANKING III');
    		$this->db->or_where('group', 'CORPORATE BANKING V');
    		$this->db->or_where('group', 'CORPORATE BANKING VI');
    		$this->db->or_where('group', 'CORPORATE BANKING VII');
    	}
    	$this->db->order_by('group','asc');
    	$this->db->order_by('name','asc');
    	$result = $this->db->get('anchor');
    	return $result->result();	
    }
    
    /*Bank Wide Function*/
    function get_total_vol_prd($product, $month, $year, $db, $dir){
    	$this->db->select_sum($product.'_vol');
    	if($month!=0){$this->db->where('month',$month);}
    	$this->db->where('year',$year);
    	get_direktorat_where($dir,$this);
    	$this->db->join('anchor', 'anchor.id ='.$db.'.anchor_id');
    	$result = $this->db->get($db);
    	$query = $result->result();
        return $query[0];
    }
    
    function get_total_anything($product, $month, $year, $db, $dir){
    	$this->db->select_sum($product);
    	if($month!=0){$this->db->where('month',$month);}
    	$this->db->where('year',$year);
    	get_direktorat_where($dir,$this);
    	$this->db->join('anchor', 'anchor.id ='.$db.'.anchor_id');
    	$result = $this->db->get($db);
    	$query = $result->result();
        return $query[0];
    }
    
    function get_top_anchor_kredit($month, $year){
    	
    	$this->db->select('(ws_main.IL_vol + ws_main.WCL_vol) as kredit_vol, ws_main.month as month, ws_main.year as year, anchor.name, (ws_ly.IL_vol + ws_ly.WCL_vol) as kredit_vol_ly');
    	$this->db->join('anchor', 'anchor.id = ws_main.anchor_id');
    	$this->db->join('wholesale_realization as ws_ly', 'anchor.id = ws_ly.anchor_id');
    	$this->db->where('ws_main.month',$month);
    	$this->db->where('ws_main.year',$year);
    	$this->db->where('ws_ly.month',12);
    	//$this->db->where("(`group` = 'CORPORATE BANKING AGRO BASED' OR `group` = 'CORPORATE BANKING I' OR `group` = 'CORPORATE BANKING II' OR `group` = 'CORPORATE BANKING III' OR `group` = 'SYNDICATION, OIL & GAS')");
    	$this->db->where('ws_ly.year',2013);
    	$this->db->order_by('kredit_vol', 'desc');
    	$result = $this->db->get('wholesale_realization as ws_main');
    	return $result->result();
    }
    
    function get_top_anchor_valas($month, $year, $direktorat){
    	
    	$this->db->select('ws_main.CASA_vol as CASA_vol, ws_main.month as month, ws_main.year as year, anchor.name, ws_ly.CASA_vol as CASA_vol_ly, dr_main.CASA_idr as idr_tm, dr_main.CASA_val as val_tm, dr_ly.CASA_idr as idr_ly, dr_ly.CASA_val as val_ly');
    	$this->db->join('anchor', 'anchor.id = ws_main.anchor_id');
    	$this->db->join('wholesale_realization as ws_ly', 'anchor.id = ws_ly.anchor_id');
    	$this->db->join('detail_realization as dr_main', 'anchor.id = dr_main.anchor_id');
    	$this->db->join('detail_realization as dr_ly', 'anchor.id = dr_ly.anchor_id');
    	$this->db->where('ws_main.month',$month);
    	$this->db->where('ws_main.year',$year);
    	$this->db->where('ws_ly.month',12);
    	$this->db->where('ws_ly.year',2013);
    	$this->db->where('dr_main.month',$month);
    	$this->db->where('dr_main.year',$year);
    	$this->db->where('dr_ly.month',12);
    	$this->db->where('dr_ly.year',2013);
    	get_direktorat_where($direktorat,$this);
    	$this->db->order_by('CASA_vol', 'desc');
    	$result = $this->db->get('wholesale_realization as ws_main');
    	return $result->result();
    }
    
    function get_top_anchor_prd($product, $month, $year,$id,$type){
    	
    	$this->db->select('ws_main.'.$product.'_vol as '.$product.'_vol, ws_main.month as month, ws_main.year as year, anchor.name, ws_ly.'.$product.'_vol as '.$product.'_vol_ly, '.$type.'_target.'.$product.'_vol as '.$product.'_vol_target');
    	$this->db->join('anchor', 'anchor.id = ws_main.anchor_id');
    	$this->db->join($type.'_realization as ws_ly', 'anchor.id = ws_ly.anchor_id');
    	$this->db->join($type.'_target', 'anchor.id = '.$type.'_target.anchor_id');
    	$this->db->where('ws_main.month',$month);
    	get_direktorat_where($id,$this);
    	$this->db->where('ws_main.year',$year);
    	$this->db->where($type.'_target.year',$year);
    	$this->db->where('ws_ly.month',12);
    	//$this->db->where("(`group` = 'CORPORATE BANKING AGRO BASED' OR `group` = 'CORPORATE BANKING I' OR `group` = 'CORPORATE BANKING II' OR `group` = 'CORPORATE BANKING III' OR `group` = 'SYNDICATION, OIL & GAS')");
    	$this->db->where('ws_ly.year',($year-1));
    	$this->db->order_by('ws_main.'.$product.'_vol', 'desc');
    	$result = $this->db->get($type.'_realization as ws_main');
    	return $result->result();
    }
    
    function get_top_anchor_prd_grw($product, $month, $year, $ly_month, $sort,$id,$type){
    	$this->db->select('((ws_main.'.$product.'_vol/'.$month.'*12) - (ws_ly.'.$product.'_vol/'.$ly_month.'*12))/ (ws_ly.'.$product.'_vol/'.$ly_month.'*12) as grow,  (ws_main.'.$product.'_vol/'.$month.'*12) - (ws_ly.'.$product.'_vol/'.$ly_month.'*12) as nom_grow, ws_main.'.$product.'_vol as '.$product.'_vol, ws_main.month as month, ws_main.year as year, anchor.name, ws_ly.'.$product.'_vol as '.$product.'_vol_ly, '.$type.'_target.'.$product.'_vol as '.$product.'_vol_target');
    	$this->db->join('anchor', 'anchor.id = ws_main.anchor_id');
    	$this->db->join($type.'_realization as ws_ly', 'anchor.id = ws_ly.anchor_id');
    	$this->db->join($type.'_target', 'anchor.id = '.$type.'_target.anchor_id');
    	$this->db->where('ws_main.month',$month);
    	get_direktorat_where($id,$this);
    	$this->db->where('ws_main.year',$year);
    	$this->db->where($type.'_target.year',$year);
    	$this->db->where('ws_ly.month',$ly_month);
    	$this->db->where('ws_ly.'.$product.'_vol <>',0);
    	$this->db->where('ws_ly.year',($year-1));
    	$this->db->order_by('grow', $sort);
    	$this->db->order_by('nom_grow', 'asc');
    	$this->db->limit(5);
    	$result = $this->db->get($type.'_realization as ws_main');
    	return $result->result();
    }
    
    function get_top_anchor_prd_nml_grw($product, $month, $year, $ly_month, $sort,$id,$type){
    	$arr_avb = array("CASA","TD","WCL","IL");
    	if(in_array($product,$arr_avb)){
    		$nom_grow_set= '((ws_main.'.$product.'_vol) - (ws_ly.'.$product.'_vol)) as nom_grow,';
    	}
    	else{
    		$nom_grow_set= '((ws_main.'.$product.'_vol/'.$month.'*12) - (ws_ly.'.$product.'_vol/'.$ly_month.'*12))/12*'.$ly_month.' as nom_grow,';
    	}
    	$this->db->select($nom_grow_set.'ws_main.'.$product.'_vol as '.$product.'_vol, ws_main.month as month, ws_main.year as year, anchor.name, ws_ly.'.$product.'_vol as '.$product.'_vol_ly, '.$type.'_target.'.$product.'_vol as '.$product.'_vol_target');
    	$this->db->join('anchor', 'anchor.id = ws_main.anchor_id');
    	$this->db->join($type.'_realization as ws_ly', 'anchor.id = ws_ly.anchor_id');
    	$this->db->join($type.'_target', 'anchor.id = '.$type.'_target.anchor_id');
    	$this->db->where('ws_main.month',$month);
    	get_direktorat_where($id,$this);
    	$this->db->where('ws_main.year',$year);
    	$this->db->where('ws_ly.'.$product.'_vol <>',0);
    	$this->db->where($type.'_target.year',$year);
    	//$this->db->where("(`group` = 'CORPORATE BANKING AGRO BASED' OR `group` = 'CORPORATE BANKING I' OR `group` = 'CORPORATE BANKING II' OR `group` = 'CORPORATE BANKING III' OR `group` = 'SYNDICATION, OIL & GAS')");
    	$this->db->where('ws_ly.month',$ly_month);
    	$this->db->where('ws_ly.year',($year-1));
    	$this->db->order_by('nom_grow', $sort);
    	$this->db->limit(5);
    	$result = $this->db->get($type.'_realization as ws_main');
    	return $result->result();
    } 
    
    function get_product_name_by_inisial($inisial){
    	$name = '';
    	if($inisial == 'FX'){$name = 'FX & Derivatives';}
    	elseif($inisial == 'CASA'){$name = 'CASA';}
    	elseif($inisial == 'TD'){$name = 'Time Deposit';}
    	elseif($inisial == 'BG'){$name = 'Bank Guarantee';}
    	elseif($inisial == 'Trade'){$name = 'Trade Services';}
    	elseif($inisial == 'WCL'){$name = 'Working Capital Loan';}
    	elseif($inisial == 'IL'){$name = 'Investment Loan';}
    	
    	return $name;
    }
    
    function get_anchor_dir($a){
    	$this->db->where('name',$a);
    	$result = $this->db->get('anchor');
    	$query = $result->result();
    	if($query){return $query[0]->group;}
    }
    
    //DELETE FUNCTION
    
    function delete_detail($year,$month){
    	$this->db->where('month',$month);
    	$this->db->where('year',$year);
    	$this->db->delete('detail_realization');
    }
    function delete_ws($type,$year,$month){
    	if($type=="realization" || $type=="realization_company"){
    		$this->db->where('month',$month);
    	}
    	$this->db->where('year',$year);
    	$this->db->delete('wholesale_'.$type);
    }
    function delete_al($type,$year,$month){
    	if($type=="realization" || $type=="realization_company"){
    		$this->db->where('month',$month);
    	}
    	$this->db->where('year',$year);
    	$this->db->delete('alliance_'.$type);
    }
    
    //UPDATE FUNCTION
    
    function update_anchor($anchor, $id){
        $this->db->where('id',$id);
        return $this->db->update('anchor', $anchor);
    }
}
