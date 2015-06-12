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
class Muser extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //INSERT or CREATE FUNCTION
    
    
    
    function verify($username, $password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $result = $this->db->get('user');
        if($result->num_rows==1){
            return true;
        }else{
            return false;
        }
    }
    
    function insert_profil($profil){
        return $this->db->insert('profil', $profil);
    }
    
    function insert_user($user){
        return $this->db->insert('user', $user);
    }
    function insert_user_log($user_id){
        $user['user_id'] = $user_id;
        $user['login_time'] = date("Y-m-d H:i:s");
        return $this->db->insert('user_log', $user);
    }
    
    function insert_payment($payment){
        return $this->db->insert('payment', $payment);
    }
    
    function insert_shipping($shipping){
        return $this->db->insert('shipping', $shipping);
    }
    
    function register($user){
    	return $this->db->insert('user', $user);
    }
    
    function insert_get_new_address($profil){
    	if($this->insert_profil($profil)){
    		return $this->get_address_by_id($this->get_last_profil_id());
    	}
    }
    
    function insert_photo_slider($photo_slider){
        return $this->db->insert('photo_slider', $photo_slider);
    }
    
    //GET FUNCTION
    
    function get_all_user(){
    	$this->db->order_by('name', 'asc');
    	$query = $this->db->get('user');
        return $query->result();
    }
    
    function get_all_user_log(){
    	$this->db->join('user', 'user.id = user_log.user_id');
    	$this->db->order_by('login_time', 'desc');
    	$query = $this->db->get('user_log');
        return $query->result();
    }
    
    function get_user_login(){
        $user = $this->session->userdata('user');
    	$this->db->where('id',$user['user_id']);
        $result = $this->db->get('user');
        if($result->num_rows==1){
            return $result->row(0);
        }else{
        	$this->session->unset_userdata('user');
            return false;
        }
    }
    
    function get_user_id_by_username($username){
        $this->db->where('username',$username);
        $result = $this->db->get('user');
        if($result->num_rows==1){
            return $result->row(0);
        }else{
            return false;
        }
    }
    
    function get_user_by_id($id){
        $this->db->where('id',$id);
        $result = $this->db->get('user');
        if($result->num_rows==1){
            return $result->row(0);
        }else{
            return false;
        }
    }
    
    function get_user_password($password){
    	$user = $this->session->userdata('userdb');
    	$this->db->where('id',$user['id']);
        $result = $this->db->get('user');
        if($result->num_rows==1){
            $user = $result->row(0);
        }
    	//$user = $this->get_user_login();
    	$m = md5($password);
    	if($m == $user->password){return true;}
    	else{return false;}
    }
    
    function get_user_name_header(){
    	$user = $this->session->userdata('user');
        if($user){
        	$user = $this->get_user_login();
        	if(!$user){redirect('home');}
        	$user_first_name = explode(' ',$user->name);
        	return $user_first_name[0];
        }else{
        	return null;
        }
    }
    
    function get_existing_email($email){
        // return true jika ada email di tabel user_temp atau user
        $this->db->where('username',$email);
        $result = $this->db->get('user');
        if($result->num_rows>0){
            return true;
        }else{
            return false;
        }
    }
    
    //UPDATE FUNCTION
    function update_profil($profil,$id){
        $this->db->where('id',$id);
        return $this->db->update('profil', $profil);
    }
    
    function update_user($user){
    	$usr = $this->session->userdata('userdb');
        $this->db->where('id', $usr['id']);
        return $this->db->update('user', $user);
    }
    
    function update_user_general($user,$id){
        $this->db->where('id', $id);
        return $this->db->update('user', $user);
    }
    
    function update_user_with_username($user,$username){
        $this->db->where('username', $username);
        return $this->db->update('user', $user);
    }
    
    //DELETE FUNCTION
}
