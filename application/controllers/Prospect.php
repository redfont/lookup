<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prospect
 *
 * @author jrdumayag
 */
require_once 'Common_Controller_Operation.php';
class Prospect extends CI_Controller implements Common_Controller_Operation {
    
    private $user;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->user = $this->session->userdata['user'];
    }
    
    function get_all() {
        
        $this->load->model('person_model');
        
        $result['prospects']['persons'] = $this->person_model->get_all();
        if(isset($this->user['userId'])) {
            $result['in_session'] = true;
        }
        
        echo json_encode($result);
        
    }
    
    function get_by_key($id) {
        echo $id;
    }
    
    function add() {
        
    }
    
    function update() {
        
    }
    
    function delete($id) {
        
    }
}
