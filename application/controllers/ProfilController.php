<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProfilController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('BayarModel', 'PesanModel');
		$helper = array('nominal', 'tgl_indo');
		$this->load->model($model);
		$this->load->helper($helper);
		if ($this->session->userdata('id_role') != '2') {
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

		$this->load->view('templates/topbar');
		$this->load->view('templates/header');
		$this->load->view('profil/pesanan');
		$this->load->view('templates/footer');
	}

	public function profil()
	{
		$id = array(
			'id' => $this->session->userdata('id')

		);
		$data['edit_user'] = $this->BayarModel->edit_user($id)->row();
		$this->load->view('templates/topbar');
		$this->load->view('templates/header');
		$this->load->view('profil/edit_profil', $data);
		$this->load->view('templates/footer');
	}

	public function update_user()
	{
		$id  = $this->session->userdata('id');
		$where = array('id' => $id);
		$data_konfirmasi = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')


		);
		$this->BayarModel->update_user($data_konfirmasi, $where);
		redirect('pesanan');
	}

	public function pesanan()
	{

		$data = array(
			'pesanan' => $this->BayarModel->lihat_keranjang_faktur($this->session->userdata('id'))->result_array(),

		);

		$this->load->view('templates/topbar');
		$this->load->view('templates/header');
		$this->load->view('profil/pesanan', $data);
		$this->load->view('templates/footer');
	}
	public function detailPesanan($id)
	{
		$pesanan = $this->BayarModel->lihat_keranjang_faktur_by_id($id, $this->session->userdata('id'))->row_array();
		$data = array(
			'pesanan' => $pesanan,
			'spanduk' => $this->BayarModel->lihat_keranjang_spanduk(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),
			'xbanner' => $this->BayarModel->lihat_keranjang_xbanner(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),
			'spanduk_outdoor' => $this->BayarModel->lihat_keranjang_spanduk_outdoor(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),
			'flyer' => $this->BayarModel->lihat_keranjang_flyer(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),

			'brosur' => $this->BayarModel->lihat_keranjang_brosur(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),
			'kartu_nama' => $this->BayarModel->lihat_keranjang_kartu_nama(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),
			'undangan' => $this->BayarModel->lihat_keranjang_kartu_undangan(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),
			'sertifikat' => $this->BayarModel->lihat_keranjang_sertifikat(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),
			'kalender' => $this->BayarModel->lihat_keranjang_kalender(
				$this->session->userdata('id'),
				'bayar_menunggu',
				$pesanan['keranjang_id']
			)->result_array(),

		);
		$this->load->view('templates/topbar');
		$this->load->view('templates/header');
		$this->load->view('profil/detail_pesanan', $data);
		$this->load->view('templates/footer');
	}


	public function edit_konfirmasi($konfirmasiId)
	{
		$id = array(
			'konfirmasi_faktur_id' => $konfirmasiId
		);

		$data['edit_konfirmasi'] = $this->BayarModel->edit_konfirmasi($id)->row();
		$this->load->view('templates/topbar');
		$this->load->view('templates/header');
		$this->load->view('pembayaran/edit_konfirmasi', $data);
		$this->load->view('templates/footer');
	}

	public function update_konfirmasi()
	{
		$id_faktur  = $this->input->post('konfirmasi_faktur_id');
		$where = array('konfirmasi_faktur_id' => $id_faktur);
		$data_konfirmasi = array(
			'konfirmasi_rekening' => $this->input->post('rekening'),
			'konfirmasi_atas_nama' => $this->input->post('atas_nama'),
			'konfirmasi_nominal' => $this->input->post('nominal'),
			'konfirmasi_struk' => $this->input->post('struk')

		);
		$this->BayarModel->update_konfirmasi($data_konfirmasi, $where);
		redirect('pesanan');
	}

	public function desain($id)
	{
		$pesanan = $this->BayarModel->lihat_keranjang_faktur_by_id($id, $this->session->userdata('id'))->row_array();
		$data = array(
			'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($this->session->userdata('session_id'), 'bayar_menunggu', $pesanan['keranjang_id'])->result_array(),
			'stiker' => $this->BayarModel->lihat_keranjang_stiker($this->session->userdata('session_id'), 'bayar_menunggu', $pesanan['keranjang_id'])->result_array(),
			'kartu' => $this->BayarModel->lihat_keranjang_kartu($this->session->userdata('session_id'), 'bayar_menunggu', $pesanan['keranjang_id'])->result_array(),
		);
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/profil/desain', $data);
		$this->load->view('frontend/templates/footer');
	}
	public function detailDesain($id)
	{
		if (isset($_POST['desain'])) {
			$desainId = $this->input->post('id');
			$komentar = $this->input->post('komentar');
			$data = array(
				'desain_komentar' => $komentar,
				'desain_status' => 'tunggu'
			);
			$this->PesanModel->update('sipesan_desain', 'desain_id', $desainId, $data);
			$this->session->set_flashdata('alert', 'komentar_sukses');
			redirect('pesanan');
		} else {
			$data = array(
				'title' => 'Detail Desain | Surya Madani Digital Printing',
				'produk' => $this->PesanModel->lihat_desain('sipesan_desain', 'desain_produk_id', $id),
				'id' => $id
			);
			$this->load->view('frontend/templates/header', $data);
			$this->load->view('frontend/profil/detail_desain', $data);
			$this->load->view('frontend/templates/footer');
		}
	}
}
