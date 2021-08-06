<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BayarController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = array('BayarModel');
        $helper = array('nominal');
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
    public function keranjang()
    {
        $keranjang = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();
        $data = array(
            'keranjang' => $keranjang,
            'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),
            'xbanner' => $this->BayarModel->lihat_keranjang_xbanner($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),
            'spanduk_outdoor' => $this->BayarModel->lihat_keranjang_spanduk_outdoor($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),
            'flyer' => $this->BayarModel->lihat_keranjang_flyer($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),

            'brosur' => $this->BayarModel->lihat_keranjang_brosur($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),
            'kartu_nama' => $this->BayarModel->lihat_keranjang_kartu_nama($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),
            'undangan' => $this->BayarModel->lihat_keranjang_kartu_undangan($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),
            'sertifikat' => $this->BayarModel->lihat_keranjang_sertifikat($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),
            'kalender' => $this->BayarModel->lihat_keranjang_kalender($this->session->userdata('id'), 'belum', $keranjang['keranjang_id'])->result_array(),

        );
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        $this->load->view('pembayaran/keranjang', $data);
        $this->load->view('templates/footer');
    }
    public function bayar($id)
    {
        if (isset($_POST['selesai'])) {
            $fakturId = 'INV-' . substr(time(), 5);
            $bank = $this->input->post('tipebayar');
            $deadline = $this->input->post('estimasi');
            $dataBayar = array(
                'keranjang_status' => 'bayar_menunggu'
            );
            $dataFaktur = array(
                'faktur_id' => $fakturId,
                'faktur_keranjang_id' => $id,
                'faktur_bank' => $bank,
                'deadline_pesanan' => $deadline

            );
            $this->BayarModel->update_keranjang($id, $dataBayar);
            $this->BayarModel->simpan_faktur($dataFaktur);
            $this->session->set_flashdata('alert', 'bayar_sukses');
            redirect('selesai/' . $bank . '/' . $id);
        }
        $pesanan = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();
        $data = array(
            'pesanan' => $pesanan,
            'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),
            'xbanner' => $this->BayarModel->lihat_keranjang_xbanner($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),
            'spanduk_outdoor' => $this->BayarModel->lihat_keranjang_spanduk_outdoor($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),
            'flyer' => $this->BayarModel->lihat_keranjang_flyer($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),
            'brosur' => $this->BayarModel->lihat_keranjang_brosur($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),

            'rekening' => $this->BayarModel->lihat_rekening()->result(),

            'kartu_nama' => $this->BayarModel->lihat_keranjang_kartu_nama($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),
            'undangan' => $this->BayarModel->lihat_keranjang_kartu_undangan($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),
            'sertifikat' => $this->BayarModel->lihat_keranjang_sertifikat($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),
            'kalender' => $this->BayarModel->lihat_keranjang_kalender($this->session->userdata('id'), 'belum', $pesanan['keranjang_id'])->result_array(),

        );
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pembayaran/bayar', $data);
        $this->load->view('templates/footer');
    }
    public function selesai($bank, $id)
    {
        $where = array('rekening' => $bank);
        $data = array(
            'bank' => $bank,
            'rekening' =>  $this->BayarModel->lihat_rekening_bank($where, 'tbl_pembayaran')->result(),
            'pesanan' => $this->BayarModel->lihat_keranjang_status_selesai($this->session->userdata('id'), 'bayar_menunggu', $id)->row_array(),
        );
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pembayaran/selesai', $data);
        $this->load->view('templates/footer');
    }
    public function konfirmasi($id)
    {
        if (isset($_POST['konfirmasi'])) {
            $konfirmasiId = 'CFM-' . substr(time(), 5);
            $rekening = $this->input->post('rekening');
            $atas_nama = $this->input->post('atas_nama');
            $nominal = $this->input->post('nominal');


            $config['upload_path'] = './assets/img/struk/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('struk')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('konfirmasi_eror', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Konfirmasi Gagal </strong> Struk Harus Berformat JPG/JPEG/PNG
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('pesanan');
            } else {
                $struk = $this->upload->data('file_name');

                $data = array(
                    'konfirmasi_id' => $konfirmasiId,
                    'konfirmasi_faktur_id' => $id,
                    'konfirmasi_rekening' => $rekening,
                    'konfirmasi_atas_nama' => $atas_nama,
                    'konfirmasi_nominal' => $nominal,
                    'konfirmasi_struk' => $struk
                );

                $dataFaktur = array(
                    'faktur_status' => 'tunggu'
                );

                $this->BayarModel->simpan_konfirmasi($data);
                $this->BayarModel->update_faktur($id, $dataFaktur);
                $this->session->set_flashdata('alert', 'konfirmasi_sukses');
                redirect('pesanan');
            }
        } else {
            $data = array(
                'pesanan' => $this->BayarModel->lihat_keranjang_faktur_by_id($id, $this->session->userdata('id'), 'belum')->row_array(),
            );

            $this->load->view('templates/topbar');
            $this->load->view('templates/header');
            $this->load->view('pembayaran/konfirmasi', $data);
            $this->load->view('templates/footer');
        }
    }


    public function pesanan()
    {
        $data = array(
            'pesanan' => $this->BayarModel->lihat_keranjang_faktur($this->session->userdata('id'))->result_array(),
        );
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pembayaran/selesai', $data);
        $this->load->view('templates/footer');
    }
}
