<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function authenticate(){
        $this->load->model('user_model');
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        $user = $this->user_model->get_user_by_username($data->user->username);
        if(password_verify($data->user->password, $user['data']->password)){
            $arr = array(
              'userId' => $user['data']->user_id,
              'username' =>$user['data']->username,
              'email' => $user['data']->email  
            );
            $this->session->set_userdata('user',$arr);
            echo 'ok';
        } else {
            echo 'fail';
        }
    }
    
    public function check_session() {
        $user = $this->session->user;
        
        $response['message'] = '';
        $response['in_session'] = false;
        
        if(isset($user)) {
            $response['in_session'] = true;
        }
        echo json_encode($response);
    }
}
