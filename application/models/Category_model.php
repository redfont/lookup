<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category_model
 *
 * @author jrdumayag
 */
class Category_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_all() {
        $this->db->order_by('date_created', 'DESC');
        $query = $this->db->get('categories');
        return $query->result();
    }
    
    public function get_by_key ($code) {
        $query = $this->db->get_where('categories',array('code'=>$code));
        return $query->result();
    }
    
    public function add ($data) {
        $response = array(
            'success' => false,
            'message' => ''
        );
        $category = array(
            'code' => $data->category->code,
            'description' => $data->category->description,
            'created_by' => $data->category->created_by    
        );
        
        try {
            $response['success'] = $this->db->insert('categories', $category);
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex.getMessage();
        }
        return $response;
    }
    
    public function update ($data) {
       $response = array(
           'success' => false,
           'message' => ''
       );
       
       try{
            $this->db->set('description', $data->category->description);
            $this->db->set('updated_by', $data->category->updated_by);
            $this->db->where('code', $data->category->code);
            $response['success'] = $this->db->update('categories');
       } catch (Exception $ex) {
           $response['success'] = false;
           $response['message'] = $ex->getMessage();
       }
       return $response;
    }
    
    public function delete ($code) {
       $response = array(
         'success' => false,
         'message' => ''
       );
        
        try{
            $response['success'] = $this->db->delete('categories',array('code'=>$code));
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex->getMessage();
        }
        
        return $response;
    }
}
