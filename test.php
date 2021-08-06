<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PesanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = array('PesanModel', 'BayarModel');
        $this->load->model($model);
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



    public function pesanBrosur()
    {
        if (isset($_POST['keranjang'])) {
            $brosurId = 'BSR-' . substr(time(), 5);
            $ukuran = $this->input->post('ukuran');
            $bahan = $this->input->post('bahan');
            $laminasi = $this->input->post('laminasi1');
            $harga_bhn = $this->input->post('harga');
            $harga_laminasi = $this->input->post('harga_laminasi');
            $sisi = $this->input->post('finishing1');
            $jumlah = $this->input->post('jumlah');
            $total = 0;
            if ($sisi == 'satu sisi') {
                $total = ($harga_bhn + $harga_laminasi) * $jumlah * 1;
            } elseif ($sisi == 'dua sisi') {
                $total = ($harga_bhn + $harga_laminasi) * $jumlah * 2;
            }

            $config['upload_path'] = './uploads/Brosur/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            } else {
                $foto = $this->upload->data('file_name');

                $dataBrosur = array(
                    'brosur_id' => $brosurId,
                    'brosur_bahan' => $bahan,
                    'brosur_ukuran' => $ukuran,
                    'brosur_jumlah' => $jumlah,
                    'brosur_finishing' => $sisi,
                    'brosur_laminasi' => $laminasi,
                    'brosur_total' => $total,
                    'brosur_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataBrosur['brosur_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_brosur($dataBrosur);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataBrosur['brosur_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_brosur($dataBrosur);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataBrosur['brosur_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_brosur($dataBrosur);
                        $this->BayarModel->simpan_keranjang($dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    }
                }
            }
        }

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        $this->load->view('pesanan/pesan_brosur');
        $this->load->view('templates/footer');
    }
}
