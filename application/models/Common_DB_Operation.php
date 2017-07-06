<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author jrdumayag
 */
interface Common_DB_Operation {
    //put your code here
    public function get_all();
    public function get_by_key($key);
    public function add($data);
    public function update($data);
    public function delete($key);
}
