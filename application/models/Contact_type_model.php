<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact_type_model
 *
 * @author jrdumayag
 */
class Contact_type_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all(){
        $this->db->order_by('date_created', 'DESC');
        $query = $this->db->get('contact_types');
        return $query->result();
    }
    
    public function get_by_key($code) {
        $query = $this->db->get_where('contact_types',array('code'=>$code));
        return $query->result();
    }
    
    public function add($data){
        $response = array(
            'success' => false,
            'message' => ''
        );
        $expense_type = array(
            'code' => $data->contactType->code,
            'description' => $data->contactType->description,
            'created_by' => $data->contactType->created_by
        );
        
        try {
            $response['success'] = $this->db->insert('contact_types', $expense_type);
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex.getMessage();
        }
        return $response;
    }
    
    public function update($data) {
        $response = array(
           'success' => false,
           'message' => ''
       );
       
       try{
            $this->db->set('description', $data->contactType->description);
            $this->db->set('updated_by', $data->contactType->updated_by);
            $this->db->where('code', $data->contactType->code);
            $response['success'] = $this->db->update('contact_types');
       } catch (Exception $ex) {
           $response['success'] = false;
           $response['message'] = $ex->getMessage();
       }
       return $response;
    }
    
    public function delete($code) {
        $response = array(
         'success' => false,
         'message' => ''
       );
        
        try{
            $response['success'] = $this->db->delete('contact_types',array('code'=>$code));
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex->getMessage();
        }
        
        return $response;
    }
}
