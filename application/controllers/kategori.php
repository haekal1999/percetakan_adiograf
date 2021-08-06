<?php

class Kategori extends CI_Controller
{
    public function spanduk()
    {
        $data['spanduk'] = $this->model_kategori->data_spanduk()->result();

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('spanduk', $data);
        $this->load->view('templates/footer');
    }

    public function brosur()
    {
        $data['brosur'] = $this->model_kategori->data_brosur()->result();

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('brosur', $data);
        $this->load->view('templates/footer');
    }
    public function kartu_undangan()
    {
        $data['kartu_undangan'] = $this->model_kategori->data_kartu_undangan()->result();

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kartu_undangan', $data);
        $this->load->view('templates/footer');
    }
}
