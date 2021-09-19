<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class User_model extends CI_Model {

        public function tampil()
        {
            $query = $this->db->get('user');
            return $query->result();
        }

        public function getTotal()
        {
            return $this->db->count_all('user');
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('user', $data);
            return $result;
        }

        public function show($id_user)
        {
            $this->db->where('id_user', $id_user);
            $query = $this->db->get('user');
            return $query->row();
        }

        public function update($id_user, $data = [])
        {
            $ubah = array(
                'id_user_level' => $data['id_user_level'],
                'email' => $data['email'],
				'nama'  => $data['nama'],
                'username'  => $data['username'],
                'password'  => $data['password']
            );

            $this->db->where('id_user', $id_user);
            $this->db->update('user', $ubah);
        }

        public function delete($id_user)
        {
            $this->db->where('id_user', $id_user);
            $this->db->delete('user');
        }

        public function get_user()
        {
            $query = $this->db->get('user');
            return $query->result();
        }
        public function user_level()
        {
            $query = $this->db->get('user_level');
            return $query->result();
        }             
    }
    
    /* End of file Kategori_model.php */
    