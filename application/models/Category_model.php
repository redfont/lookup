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
    
    public function get_categories() {
        $query = $this->db->get('categories');
        return $query->result();
    }
}
