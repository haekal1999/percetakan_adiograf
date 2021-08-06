<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['produk'] = $this->m_produk->tampil_data()->result();
		$data['spanduk_indoor'] = $this->m_produk->spanduk_indoor()->result();
		$data['xbanner'] = $this->m_produk->xbanner()->result();
		$data['spanduk_outdoor'] = $this->m_produk->spanduk_outdoor()->result();
		$data['flyer'] = $this->m_produk->flyer()->result();
		$data['brosur'] = $this->m_produk->brosur()->result();
		$data['kartu_nama'] = $this->m_produk->kartu_nama()->result();
		$data['undangan'] = $this->m_produk->undangan()->result();
		$data['kalender'] = $this->m_produk->kalender()->result();
		$data['sertifikat'] = $this->m_produk->sertifikat()->result();





		//$data['produk'] = $this->m_produk->detail_keranjang()->result();

		$this->load->view('templates/topbar_dashboard');
		$this->load->view('templates/header');
		//$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}
}
