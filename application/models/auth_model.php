<?php
class auth_model extends CI_Model{
    public function create($formArray){
        $this->db->insert('employee',$formArray);
    }
    
    public function checkUser($email) {
        $this->db->where('email',$email);
        return $row = $this->db->get('employee')->row_array();
    }
    // create a function to fetch the data for login credentials check
   
    // check user Authorization
    public function authorized(){
        $user =$this->session->userdata('user');
        if(!empty($user)){
            return true;
        }
        else{
            return false; 
        }
    }

    // public function
}