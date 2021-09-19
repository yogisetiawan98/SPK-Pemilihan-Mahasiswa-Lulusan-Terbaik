<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Penilaian_model extends CI_Model {

        public function tampil()
        {
            $query = $this->db->get('penilaian');
            return $query->result();
        }

      
        public function tambah_penilaian($id_alternatif,$id_kriteria,$nilai)
        {
            $query = $this->db->simple_query("INSERT INTO penilaian VALUES (DEFAULT,'$id_alternatif','$id_kriteria',$nilai);");
            return $query;	
        }
       
        public function edit_penilaian($id_alternatif,$id_kriteria,$nilai)
        {
            $query = $this->db->simple_query("UPDATE penilaian SET nilai=$nilai WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");
            return $query;	
        }


        public function delete($id_penilaian)
        {
            $this->db->where('id_penilaian', $id_penilaian);
            $this->db->delete('penilaian');
        }

       
        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }
        public function get_alternatif()
        {
            $query = $this->db->query("SELECT * FROM alternatif");
            return $query->result();
        }
        public function get_sub_kriteria()
        {
            $query = $this->db->get('sub_kriteria');
            return $query->result();
        }

        public function data_penilaian($id_alternatif,$id_kriteria)
        {
            $query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");
            return $query->row_array();
        }
        public function untuk_tombol($id_alternatif)
		{
			$query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif';");
			return $query->num_rows();
		}
		public function data_sub_kriteria($id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria' ORDER BY nilai DESC;");
			return $query->result_array();
		}
		public function data_nilai($id_alternatif,$id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.nilai=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");
			return $query->row_array();
		}
    
    }
    
    