<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Expense_type_model
 *
 * @author jrdumayag
 */
class Expense_type_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all(){
        $this->db->order_by('date_created', 'DESC');
        $query = $this->db->get('expense_types');
        return $query->result();
    }
    
    public function get_by_key($code) {
        $query = $this->db->get_where('expense_types',array('code'=>$code));
        return $query->result();
    }
    
    public function add($data){
        $response = array(
            'success' => false,
            'message' => ''
        );
        $expense_type = array(
            'code' => $data->expenseType->code,
            'description' => $data->expenseType->description
        );
        
        try {
            $response['success'] = $this->db->insert('expense_types', $expense_type);
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
            $this->db->set('description', $data->expenseType->description);
            $this->db->where('code', $data->expenseType->code);
            $response['success'] = $this->db->update('expense_types');
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
            $response['success'] = $this->db->delete('expense_types',array('code'=>$code));
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex->getMessage();
        }
        
        return $response;
    }
}
