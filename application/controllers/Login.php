<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function authenticate(){
        $this->load->model('user_model');
        $post = $this->input->raw_input_stream;
        $data = (object)json_decode($post);
        $user = $this->user_model->get_user_by_username($data->user->username);
        if(password_verify($data->user->password, $user['data']->password)){
            echo 'ok';
        } else {
            echo 'fail';
        }
    }
}
