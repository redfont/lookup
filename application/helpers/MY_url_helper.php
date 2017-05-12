<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_url_helper
 *
 * @author dumaja01
 */
if( ! function_exists('asset_url')) {
    function asset_url(){
        return base_url() . "assets/";
    }
}