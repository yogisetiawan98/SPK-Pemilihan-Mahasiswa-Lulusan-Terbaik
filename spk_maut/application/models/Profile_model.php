<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Profile_model extends CI_Model {

        public function show($id_user)
        {
            $this->db->where('id_user', $id_user);
            $query = $this->db->get('user');
            return $query->row();
        }

        public function update($id_user, $data = [])
        {
            $ubah = array(
                'email' => $data['email'],
				'nama'  => $data['nama'],
                'username'  => $data['username'],
                'password'  => $data['password']
            );

            $this->db->where('id_user', $id_user);
            $this->db->update('user', $ubah);
        }         
    }
    