<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_Filter extends CI_Controller {

 public function index()
 {
  $data['title'] = "Cetak laporan berdasarkan filter data di PHP Codeigniter";
  $data['angkatan'] = $this->db->get('alternatif')->result();
  $this->load->view('filter', $data);  
 }

 public function filter($id)
 {
  if ($id == 0) {
   $data = $this->db->get('alternatif')->result();
  }
  else
  {
   $data = $this->db->get_where('alternatif', ['id_alternatif'=>$id])->result();
  }
  $dt['hasil'] = $data;
  $dt['id_alternatif'] = $id;
  $this->load->view('laporan/result', $dt);
 }

 public function cetak($id)
 {
  if ($id == 0) {
   $data = $this->db->get('alternatif')->result();
  }
  else
  {
   $data = $this->db->get_where('alternatif', ['id_alternatif'=>$id])->result();
  }
  $dt['hasil'] = $data;
  $this->load->library('pdf');
  $this->pdf->filename = "Laporan_Hasil.pdf";
  $this->pdf->generate('cetak', $dt, 'laporan_hasil', 'A4', 'portrait');
 }

}

/* End of file Cetak_Filter.php */
/* Location: ./application/controllers/Cetak_Filter.php */