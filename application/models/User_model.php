<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function add_user($data) {
        $user = array(
            'username' => $data->user->username,
            'password' => password_hash($data->user->password,PASSWORD_BCRYPT),
            'email' => $data->user->emailAddress  
        );
        try{
            $success = $this->db->insert('users',$user);
        } catch (Exception $ex) {
             $success = false;
             $ex->getMessage();
        }
        return $success;
    }
    
    public function get_users() {
        $this->db->select('user_id,username,email,date_created as dateCreated,date_updated as dateUpdated');
        $query = $this->db->get('users');
        return $query->result();
    }
    
    public function get_user_by_username($username) {
       $this->db->select('*');
       $this->db->from('users');
       $this->db->where('username',$username);
       $this->db->limit(1);
       $query = $this->db->get();
       //$query = $this->db->get_where('user',array('username'=>$username),0,1);
       return array('num_rows'=>$query->num_rows(), 'data' => $query->row());
    }
    
    public function get_user_by_id($id){
        $this->db->select('user_id,username,email as emailAddress,date_created as dateCreated, date_updated as dateUpdated');
        $this->db->from('users');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function delete($id){
        $response = array(
         'success' => false,
         'message' => ''
       );
        
        try{
            $response['success'] = $this->db->delete('users',array('user_id'=>$id));
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }
    
    public function update ($data) {
       $response = array(
           'success' => false,
           'message' => ''
       );
       
       try{
            if(isset($data->user->emailAddress)){
                $this->db->set('email', $data->user->emailAddress);
            }
            
            if(isset($data->user->password)){
                $this->db->set('password', password_hash($data->user->password,PASSWORD_BCRYPT));
            }
            
            $this->db->where('user_id', $data->user->user_id);
            $response['success'] = $this->db->update('users');
       } catch (Exception $ex) {
           $response['success'] = false;
           $response['message'] = $ex->getMessage();
       }
       return $response;
    }
}
