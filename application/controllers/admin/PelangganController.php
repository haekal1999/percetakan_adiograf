<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PelangganController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel');
		$this->load->model($model);
		if ($this->session->userdata('id_role') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
			redirect('auth/login');
		}
	}
	public function index()
	{
		$data = array(
			'pelanggan' => $this->PenggunaModel->get_pelanggan()
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/pelanggan/index', $data);
		$this->load->view('backend/templates/footer');
	}
}
