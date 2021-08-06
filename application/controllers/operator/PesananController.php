<?php


class PesananController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel', 'BayarModel', 'PesanModel');
		$helper = array('nominal', 'tgl_indo');
		$this->load->helper($helper);
		$this->load->model($model);
		if ($this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda belum login ! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$status = $this->input->post('status');
		$data = array(
			'status' => $status,
			'transaksi' => $this->BayarModel->lihat_keranjang_faktur_admin()->result_array()

		);
		$this->load->view('templates_operator/header');
		$this->load->view('templates_operator/sidebar');
		$this->load->view('operator/pesanan/index', $data);
		$this->load->view('templates_operator/footer');
	}

	public function edit_status($id)
	{
		$transaksi = $this->BayarModel->lihat_keranjang_faktur_admin_by_id($id)->row_array();
		$konfirmasi = $this->BayarModel->lihat_keranjang_faktur_konfirmasi_admin_by_id($id)->row_array();
		//		echo '<pre>';
		//		var_dump($konfirmasi);die;


		$data = array(
			'transaksi' => $transaksi,
			'konfirmasi' => $konfirmasi,
			'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'xbanner' => $this->BayarModel->lihat_keranjang_xbanner($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'spanduk_outdoor' => $this->BayarModel->lihat_keranjang_spanduk_outdoor($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'flyer' => $this->BayarModel->lihat_keranjang_flyer($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),

			'brosur' => $this->BayarModel->lihat_keranjang_brosur($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'kartu_nama' => $this->BayarModel->lihat_keranjang_kartu_nama($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'undangan' => $this->BayarModel->lihat_keranjang_kartu_undangan($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'sertifikat' => $this->BayarModel->lihat_keranjang_sertifikat($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'kalender' => $this->BayarModel->lihat_keranjang_kalender($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),

		);
		$this->load->view('templates_operator/header');
		$this->load->view('templates_operator/sidebar');
		$this->load->view('operator/pesanan/edit_status', $data);
		$this->load->view('templates_operator/footer');
	}

	public function update_status()
	{
		$status = $this->input->post('status');
		$tgl_selesai = $this->input->post('tgl_selesai');

		$id_faktur  =  $this->input->post('id_faktur');
		$where = array('faktur_id' => $id_faktur);
		$data_status = array(
			'faktur_status' => $status,
			'pesanan_dicetak' => $tgl_selesai,

		);
		$this->BayarModel->update_status($data_status, $where);
		redirect('operator/pesanan');
	}



	public function lihat($id)
	{
		$transaksi = $this->BayarModel->lihat_keranjang_faktur_admin_by_id($id)->row_array();
		$konfirmasi = $this->BayarModel->lihat_keranjang_faktur_konfirmasi_admin_by_id($id)->row_array();
		//		echo '<pre>';
		//		var_dump($konfirmasi);die;


		$data = array(
			'transaksi' => $transaksi,
			'konfirmasi' => $konfirmasi,
			'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'xbanner' => $this->BayarModel->lihat_keranjang_xbanner($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'spanduk_outdoor' => $this->BayarModel->lihat_keranjang_spanduk_outdoor($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'flyer' => $this->BayarModel->lihat_keranjang_flyer($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),

			'brosur' => $this->BayarModel->lihat_keranjang_brosur($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'kartu_nama' => $this->BayarModel->lihat_keranjang_kartu_nama($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'undangan' => $this->BayarModel->lihat_keranjang_kartu_undangan($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'sertifikat' => $this->BayarModel->lihat_keranjang_sertifikat($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'kalender' => $this->BayarModel->lihat_keranjang_kalender($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),

		);
		$this->load->view('templates_operator/header');
		$this->load->view('templates_operator/sidebar');
		$this->load->view('operator/pesanan/lihat', $data);
		$this->load->view('templates_operator/footer');
	}
	public function foto($id)
	{
		$data = array(
			'spanduk' => $this->PesanModel->lihat_spanduk_by_id($id),
			'xbanner' => $this->PesanModel->lihat_xbanner_by_id($id),
			'spanduk_outdoor' => $this->PesanModel->lihat_spanduk_outdoor_by_id($id),
			'flyer' => $this->PesanModel->lihat_flyer_by_id($id),

			'brosur' => $this->PesanModel->lihat_brosur_by_id($id),
			'kartu_nama' => $this->PesanModel->lihat_kartu_nama_by_id($id),
			'undangan' => $this->PesanModel->lihat_kartu_undangan_by_id($id),
			'sertifikat' => $this->PesanModel->lihat_sertifikat_by_id($id),
			'kalender' => $this->PesanModel->lihat_kalender_by_id($id),

		);
		$this->load->view('templates_operator/header');
		$this->load->view('templates_operator/sidebar');
		$this->load->view('operator/pesanan/foto', $data);
		$this->load->view('templates_operator/footer');
	}

	public function selesai($id)
	{
		$data = array(
			'desain_status' => 'selesai'
		);
		$this->PesanModel->update('sipesan_desain', 'desain_produk_id', $id, $data);
		redirect('operator/pesanan/desain/' . $id);
	}

	public function hapus($id)
	{
		$where = array('faktur_id' => $id);
		$this->m_produk->hapus_data($where, 'tbl_faktur');
		redirect('operator/pesanan');
	}
}
