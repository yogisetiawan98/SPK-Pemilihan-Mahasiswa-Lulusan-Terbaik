<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Laporan extends CI_Controller {
    
        public function __construct()
        {
            parent ::__construct();
            $this->load->model('Perhitungan_model');
        }

		public function cetak_laporan_hasil()
		{
			$kriteria = $this->Perhitungan_model->get_kriteria();
            $alternatif = $this->Perhitungan_model->get_alternatif();
			
			$this->Perhitungan_model->hapus_hasil();
			foreach ($alternatif as $keys) {
				$nilai_total = 0;
				foreach ($kriteria as $key) {
					$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
					$min_max=$this->Perhitungan_model->get_max_min($key->id_kriteria);
					$hasil_normalisasi= @(round(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']),4));
					$bobot = $key->bobot;
					$nilai_total += $bobot*$hasil_normalisasi;
				}
				$hasil_akhir = [
					'id_alternatif' => $keys->id_alternatif,
					'nilai' => $nilai_total
				];
				$result = $this->Perhitungan_model->insert_nilai_hasil($hasil_akhir);
			}
			
			$data = [
					'hasil'=> $this->Perhitungan_model->get_hasil()
				];
			
			$this->load->library('pdf');

			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "Laporan_Hasil.pdf";
			$this->pdf->load_view('laporan_hasil', $data);
		} 
    }
    