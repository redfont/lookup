<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person_model
 *
 * @author jrdumayag
 */
require_once 'Common_DB_Operation.php';
class Person_model extends CI_Model implements Common_DB_Operation {
    //put your code here
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }

    public function add($data) {
        $response = array(
            'success' => false,
            'message' => '',
            'id' => null
        );
        
        try {
            $response['success'] = $this->db->insert('persons', array(
                'firstname' => $data->person->firstname,
                'middlename' => $data->person->middlename,
                'lastname' => $data->person->lastname,
                'email' => $data->person->email, 
                'birthdate' => $data->person->birthdate,
                'created_by' => $data->person->created_by
            ));
            $response['id'] = $this->db->insert_id();
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex.getMessage();
        }
        return $response;
    }

    public function delete($key) {
        $response = array(
         'success' => false,
         'message' => ''
       );
        
        try {
            $response['success'] = $this->db->delete('persons',array('person_id'=>$key));
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex->getMessage();
        }
        
        return $response;
    }

    public function get_all() {
        $this->db->order_by('date_created', 'DESC');
        $query = $this->db->get('persons');
        return $query->result();
    }

    public function get_by_key($key) {
        $query = $this->db->get_where('persons',array('person_id'=>$key));
        return $query->result();
    }

    public function update($data) {
        $response = array(
           'success' => false,
           'message' => ''
        );
       
       try{
            $person = array(
                'updated_by' => $data->person->update_by
            );
            if(isset($data->person->firstname)){
                $person['firstname'] = $data->person->firstname;
            }
            if(isset($data->person->middlename)){
                $person['middlename'] = $data->person->middlename;
            }
            if(isset($data->person->lastname)){
                $person['lastname'] = $data->person->lastname;
            }
            if(isset($data->person->email)){
                $person['email'] = $data->person->email;
            }
            if(isset($data->person->birthdate)){
                $person['birthdate'] = $data->person->birthdate;
            }
            $response['success'] = $this->db->update('persons', $person, 
                    array('person_id'=>$data->person->person_id));
       } catch (Exception $ex) {
           $response['success'] = false;
           $response['message'] = $ex->getMessage();
       }
       return $response;
    }

}
