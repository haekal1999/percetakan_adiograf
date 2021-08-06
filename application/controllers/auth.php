<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'username', 'required', [
            'required' => 'Username harus diisi !'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Password harus diisi !'

        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->model_auth->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Username atau Password Anda Salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');

                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('nama', $auth->nama);
                $this->session->set_userdata('alamat', $auth->alamat);
                $this->session->set_userdata('no_hp', $auth->ho_hp);
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('id_role', $auth->id_role);
                $this->session->set_userdata('id', $auth->id);


                switch ($auth->id_role) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;
                    case 2:
                        redirect('dashboard/index');
                        break;
                    case 3:
                        redirect('operator/OperatorController');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
