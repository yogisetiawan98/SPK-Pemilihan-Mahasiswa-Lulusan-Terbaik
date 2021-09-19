<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Perhitungan_model');
        }

        public function index()
        {
            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			$data = [
                'page' => "Perhitungan",
                'kriteria'=> $this->Perhitungan_model->get_kriteria(),
                'alternatif'=> $this->Perhitungan_model->get_alternatif()
            ];
			
            $this->load->view('Perhitungan/perhitungan', $data);
        }
		
		public function hasil()
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
                'page' => "Hasil",
				'hasil'=> $this->Perhitungan_model->get_hasil()
            ];
			
            $this->load->view('Perhitungan/hasil', $data);
        }
    
    }
    
    