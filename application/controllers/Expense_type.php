<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExpenseType
 *
 * @author jrdumayag
 */
class Expense_type extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    function get_all(){
        $this->load->model('expense_type_model');
        $result['expenseTypes'] = $this->expense_type_model->get_all();
        
        $user = $this->session->userdata['user'];
        $result['in_session'] = false;
        if(isset($user['userId'])) {
            $result['in_session'] = true;
        }
        
        echo json_encode($result);
    }
    
    function get_by_key($code) {
        $this->load->model('expense_type_model');
        $result = $this->expense_type_model->get_by_key($code);
        echo json_encode($result);
    }
    
    function add() {
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        
        //do add here
        $this->load->model('expense_type_model'); 
        $response = $this->expense_type_model->add($data);
        
        echo json_encode($response);
    }
    
    function update() {
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        
        $this->load->model('expense_type_model'); 
        $response = $this->expense_type_model->update($data);
        echo json_encode($response);
    }
    
    function delete($code) {
        $this->load->model('expense_type_model');
        $response = $this->expense_type_model->delete($code);
        echo json_encode($response);
    }
}
