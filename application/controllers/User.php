<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author DumaJa01
 */
class User extends CI_Controller{
    //put your code here
    private $user;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->user = $this->session->userdata['user'];
    }
    
    function add_user(){
        $this->load->model('user_model');
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        $trans = $this->user_model->add_user($data);
        
        if($trans) {
            $success = "OK";
        }
        $message = [
            'success' => $success,
            'message'=> ''
        ];
        
        echo json_encode($message);
    }
    
    function get_users(){
        $this->load->model('user_model');
        $users['users'] = $this->user_model->get_users();
        $users['in_session'] = false;
        if(isset($this->user['userId'])) {
            $users['in_session'] = true;
        }
        echo json_encode($users);
    }
    
    public function get_user($id) {
        $this->load->model('user_model');
        $result = $this->user_model->get_user_by_id($id);
        echo json_encode(array('user'=>$result));
    }
}
