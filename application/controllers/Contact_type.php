<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact_type
 *
 * @author jrdumayag
 */
class Contact_type extends CI_Controller {
    
    private $user;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->user = $this->session->userdata['user'];
    }
    
    function get_all(){
        $this->load->model('contact_type_model');
        $result['contactTypes'] = $this->contact_type_model->get_all();
        
       
        $result['in_session'] = false;
        if(isset($this->user['userId'])) {
            $result['in_session'] = true;
        }
        
        echo json_encode($result);
    }
    
    function get_by_key($code) {
        $this->load->model('contact_type_model');
        $result = $this->contact_type_model->get_by_key($code);
        echo json_encode($result);
    }
    
    function add() {
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        $data->contactType->created_by = $this->user['username'];
        
        $this->load->model('contact_type_model'); 
        $response = $this->contact_type_model->add($data);
        
        echo json_encode($response);
    }
    
    function update() {
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        $data->contactType->updated_by = $this->user['username'];
        
        $this->load->model('contact_type_model'); 
        $response = $this->contact_type_model->update($data);
        echo json_encode($response);
    }
    
    function delete($code) {
        $this->load->model('contact_type_model');
        $response = $this->contact_type_model->delete($code);
        echo json_encode($response);
    }
}
