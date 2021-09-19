<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Sub_kriteria extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Sub_Kriteria_model');

            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
        }

        public function index()
        {
            $data = [
				'page' => "Sub Kriteria",
                'list' => $this->Sub_Kriteria_model->tampil(),
                'kriteria'=> $this->Sub_Kriteria_model->get_kriteria(),
                'count_kriteria'=> $this->Sub_Kriteria_model->count_kriteria(),
                'sub_kriteria' => $this->Sub_Kriteria_model->tampil()
                
            ];
            $this->load->view('sub_kriteria/index', $data);
        }

        //menambahkan data ke database
        public function store()
        {
                $data = [
                    'id_kriteria' => $this->input->post('id_kriteria'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'nilai' => $this->input->post('nilai')
                ];
                
                $this->form_validation->set_rules('id_kriteria', 'ID Kriteria', 'required');
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
                $this->form_validation->set_rules('nilai', 'Nilai', 'required');

                if ($this->form_validation->run() != false) {
                    $result = $this->Sub_Kriteria_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
						redirect('sub_kriteria');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
                    redirect('sub_kriteria/create'); 
                }
        }
    
        public function update($id_sub_kriteria)
        {
            // TODO: implementasi update data berdasarkan $id_sub_kriteria
            $id_sub_kriteria = $this->input->post('id_sub_kriteria');
            $data = array(
                'id_kriteria' => $this->input->post('id_kriteria'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'nilai' => $this->input->post('nilai')
            );

            $this->Sub_Kriteria_model->update($id_sub_kriteria, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('sub_kriteria');
        }
    
        public function destroy($id_sub_kriteria)
        {
            $this->Sub_Kriteria_model->delete($id_sub_kriteria);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('sub_kriteria');
        }
    
    }
    