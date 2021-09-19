<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login_model extends CI_Model {
		
		function logged_id()
		{
			return $this->session->userdata('id_user');
		}
		
        public function login($username, $passwordx)
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $passwordx);
            return $this->db->get()->row();
        }
    
    }
