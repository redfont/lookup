<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logout
 *
 * @author jrdumayag
 */
class Logout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function logout(){
        $this->session->unset_userdata('user');
        $response['success'] = true;
        $response['message'] = '';
        echo json_encode($response);
    }
}
