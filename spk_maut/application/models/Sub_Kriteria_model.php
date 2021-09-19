<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Sub_Kriteria_model extends CI_Model {

        public function tampil()
        {
            $query = $this->db->get('sub_kriteria');
            return $query->result();
        }

        public function getTotal()
        {
            return $this->db->count_all('sub_kriteria');
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('sub_kriteria', $data);
            return $result;
        }

        public function show($id_sub_kriteria)
        {
            $this->db->where('id_sub_kriteria', $id_sub_kriteria);
            $query = $this->db->get('sub_kriteria');
            return $query->row();
        }

        public function update($id_sub_kriteria, $data = [])
        {
            $ubah = array(
                'id_kriteria' => $data['id_kriteria'],
                'deskripsi' => $data['deskripsi'],
                'nilai'  => $data['nilai']
            );

            $this->db->where('id_sub_kriteria', $id_sub_kriteria);
            $this->db->update('sub_kriteria', $ubah);
        }

        public function delete($id_sub_kriteria)
        {
            $this->db->where('id_sub_kriteria', $id_sub_kriteria);
            $this->db->delete('sub_kriteria');
        }

        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }

        public function count_kriteria(){
            $query =  $this->db->query("SELECT id_kriteria,COUNT(deskripsi) AS jml_setoran FROM sub_kriteria GROUP BY id_kriteria")->result();
            return $query;
        }

        public function data_sub_kriteria($id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria'  ORDER BY nilai DESC;");
			return $query->result_array();
		}
    }
    
    /* End of file Kategori_model.php */
    