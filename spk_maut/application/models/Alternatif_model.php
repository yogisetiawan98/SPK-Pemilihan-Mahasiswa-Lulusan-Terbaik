<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Alternatif_model extends CI_Model {

        public function tampil()
        {
            $query = $this->db->get('alternatif');
            return $query->result();
        }

        public function getTotal()
        {
            return $this->db->count_all('alternatif');
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('alternatif', $data);
            return $result;
        }

        public function show($id_alternatif)
        {
            $this->db->where('id_alternatif', $id_alternatif);
            $query = $this->db->get('alternatif');
            return $query->row();
        }

        public function update($id_alternatif, $data = [])
        {
            $ubah = array(
                'keterangan'  => $data['keterangan'],
                'angkatan'  => $data['angkatan'],
                'nim'  => $data['nim'],
				'nama'  => $data['nama'],
				'jenis_kelamin'  => $data['jenis_kelamin'],
				'jurusan'  => $data['jurusan'],
				'email'  => $data['email'],
				'no_telp'  => $data['no_telp'],
				'alamat'  => $data['alamat']
            );

            $this->db->where('id_alternatif', $id_alternatif);
            $this->db->update('alternatif', $ubah);
        }


        public function delete($id_alternatif)
        {
            $this->db->where('id_alternatif', $id_alternatif);
            $this->db->delete('alternatif');
        }
    }
    
    