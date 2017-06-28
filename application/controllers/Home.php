<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->session->unset_userdata('user');
        $this->load->helper('url');
        $this->load->view('landingpage');
    }
}
