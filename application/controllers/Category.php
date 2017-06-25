<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author jrdumayag
 */
class Category extends CI_Controller {
    //put your code here
    
    function get_categories() {
        $this->load->model('category_model');
        $result = $this->category_model->get_categories();
        echo json_encode($result);
    }
    
    function get_category($code) {
        $this->load->model('category_model');
        $result = $this->category_model->get_category($code);
        echo json_encode($result);
    }
    
    function add_category(){
     
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        
        //do add here
        $this->load->model('category_model'); 
        $response = $this->category_model->add_category($data);
        
        echo json_encode($response);
    }
    
    function update_category() {
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        
        $this->load->model('category_model'); 
        $response = $this->category_model->update_category($data);
        echo json_encode($response);
    }
    
    function delete_category($code){
        $this->load->model('category_model');
        $response = $this->category_model->delete_category($code);
        echo json_encode($response);
    }
}
