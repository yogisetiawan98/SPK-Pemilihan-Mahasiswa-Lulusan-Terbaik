<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Profile extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Profile_model');
        }

        public function index()
        {
            $id_user = $this->session->userdata('id_user');
			$profile = $this->Profile_model->show($id_user);
            $data = [
                'page' => "Profile",
				'profile' => $profile
            ];
            $this->load->view('Profile/index', $data);
        }
    
        public function update($id_user)
        {
            $id_user = $this->input->post('id_user');
            $data = array(
				'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );

            $this->Profile_model->update($id_user, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('Profile');
        }
    
        
    
    }
    