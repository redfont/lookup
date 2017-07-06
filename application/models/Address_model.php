<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Address_model
 *
 * @author jrdumayag
 */
class Address_model extends CI_Model implements Common_DB_Operation {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add($data) {
        $response = array(
            'success' => false,
            'message' => ''
        );
        
        try {
            $response['success'] = $this->db->insert('addresses', array(
                'person_id' => $data->address->person_id,
                'address_1' => $data->address->address_1,
                'address_2' => $data->address->address_2,
                'barangay' => $data->address->barangay,
                'city_or_municipality' => $data->address->city_or_municipality, 
                'province' => $data->address->province,
                'postal_code' => $data->address->postal_code,
                'created_by' => $data->address->created_by
            ));
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
            $response['success'] = $this->db->delete('addresses',array('address_id'=>$key));
        } catch (Exception $ex) {
            $response['success'] = false;
            $response['message'] = $ex->getMessage();
        }
        return $response;
    }

    public function get_all() {
        $this->db->order_by('date_created', 'DESC');
        $query = $this->db->get('addresses');
        return $query->result();
    }

    public function get_by_key($key) {
        $query = $this->db->get_where('addresses',array('address_id'=>$key));
        return $query->result();
    }

    public function update($data) {
        $response = array(
           'success' => false,
           'message' => ''
        );
       
       try{
            $address = array(
                'updated_by' => $data->address->updated_by
            );
            if(isset($data->address->address_1)){
                $address['address_1'] = $data->address->address_1;
            }
            if(isset($data->address->address_2)){
                $address['address_2'] = $data->address->address_2;
            }
            if(isset($data->address->barangay)){
                $address['barangay'] = $data->address->barangay;
            }
            if(isset($data->address->city_or_municipality)){
                $address['city_or_municipality'] = $data->address->city_or_municipality;
            }
            if(isset($data->address->province)){
                $address['province'] = $data->address->province;
            }
            if(isset($data->address->postal_code)){
                 $address['postal_code'] = $data->address->postal_code;
            }
            $response['success'] = $this->db->update('addresses', $address, 
                    array('address_id'=>$data->address->address_id));
       } catch (Exception $ex) {
           $response['success'] = false;
           $response['message'] = $ex->getMessage();
       }
       return $response;
    }

//put your code here
}
