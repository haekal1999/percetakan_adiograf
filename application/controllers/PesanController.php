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

    public function pesanSpandukIndoor()
    {
        if (isset($_POST['keranjang'])) {
            $spandukId = 'SDK-' . substr(time(), 5);
            $panjang = $this->input->post('panjang');
            $lebar = $this->input->post('lebar');
            $bahan = $this->input->post('bahan');
            $jumlah = $this->input->post('jumlah');
            $harga = $this->input->post('harga');
            $finishing = $this->input->post('finishing');

            $total = ($panjang * $lebar) * $jumlah * $harga;


            $config['upload_path'] = './uploads/Spanduk/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pesan_spanduk_indoor');
            } else {
                $foto = $this->upload->data('file_name');

                $dataSpanduk = array(
                    'spanduk_id' => $spandukId,
                    'spanduk_panjang' => $panjang,
                    'spanduk_lebar' => $lebar,
                    'spanduk_bahan' => $bahan,
                    'spanduk_jumlah' => $jumlah,
                    'spanduk_finishing' => $finishing,
                    'spanduk_total' => $total,
                    'spanduk_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataSpanduk['spanduk_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_spanduk($dataSpanduk);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataSpanduk['spanduk_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_spanduk($dataSpanduk);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataSpanduk['spanduk_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_spanduk($dataSpanduk);
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
        $this->load->view('pesanan/pesan_spanduk_indoor');
        $this->load->view('templates/footer');
    }

    public function pesanXBanner()
    {

        if (isset($_POST['keranjang'])) {
            $xbannerId = 'XBR-' . substr(time(), 5);
            $ukuran = $this->input->post('ukuran');
            $bahan = $this->input->post('bahan');
            $harga = $this->input->post('harga');
            $jumlah = $this->input->post('jumlah');
            $total = 0;
            if ($ukuran == 'kecil') {
                $total = $harga * $jumlah + 50000;
            } elseif ($ukuran == 'sedang') {
                $total = $harga * $jumlah + 75000;
            }

            $config['upload_path'] = './uploads/Xbanner/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pesan_xbanner');
            } else {
                $foto = $this->upload->data('file_name');

                $dataXbanner = array(
                    'xbanner_id' => $xbannerId,
                    'xbanner_ukuran' => $ukuran,
                    'xbanner_bahan' => $bahan,
                    'xbanner_jumlah' => $jumlah,
                    'xbanner_total' => $total,
                    'xbanner_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataXbanner['xbanner_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_xbanner($dataXbanner);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataXbanner['xbanner_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_xbanner($dataXbanner);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataXbanner['xbanner_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_xbanner($dataXbanner);
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
        $this->load->view('pesanan/pesan_xbanner');
        $this->load->view('templates/footer');
    }

    public function pesanSpandukOutdoor()
    {
        if (isset($_POST['keranjang'])) {
            $spanduk_outdoorId = 'SDKI-' . substr(time(), 5);
            $panjang = $this->input->post('panjang');
            $lebar = $this->input->post('lebar');
            $bahan = $this->input->post('bahan');
            $jumlah = $this->input->post('jumlah');
            $harga = $this->input->post('harga');
            $finishing = $this->input->post('finishing');

            $total = ($panjang * $lebar) * $jumlah * $harga;


            $config['upload_path'] = './uploads/Spanduk_Outdoor/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pesan_spanduk_outdoor');
            } else {
                $foto = $this->upload->data('file_name');

                $dataSpandukOutdoor = array(
                    'spanduk_outdoor_id' => $spanduk_outdoorId,
                    'spanduk_outdoor_panjang' => $panjang,
                    'spanduk_outdoor_lebar' => $lebar,
                    'spanduk_outdoor_bahan' => $bahan,
                    'spanduk_outdoor_jumlah' => $jumlah,
                    'spanduk_outdoor_finishing' => $finishing,
                    'spanduk_outdoor_total' => $total,
                    'spanduk_outdoor_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataSpandukOutdoor['spanduk_outdoor_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_spanduk_outdoor($dataSpandukOutdoor);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataSpandukOutdoor['spanduk_outdoor_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_spanduk_outdoor($dataSpandukOutdoor);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataSpandukOutdoor['spanduk_outdoor_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_spanduk_outdoor($dataSpandukOutdoor);
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
        $this->load->view('pesanan/pesan_spanduk_outdoor');
        $this->load->view('templates/footer');
    }

    public function pesanFlyer()
    {

        if (isset($_POST['keranjang'])) {
            $flyerId = 'FYR-' . substr(time(), 5);
            $bahan = $this->input->post('bahan');
            $finishing = $this->input->post('finishing1');
            $harga = $this->input->post('harga');
            $ukuran = $this->input->post('ukuran');


            $jumlah = $this->input->post('jumlah');
            $total = 0;
            if ($finishing == 'satu sisi') {
                $total =  $jumlah * $harga * 1;
            } elseif ($finishing == 'dua sisi') {
                $total =  $jumlah * $harga * 2;
            }

            $config['upload_path'] = './uploads/Flyer/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pesan_flyer');
            } else {
                $foto = $this->upload->data('file_name');

                $dataFlyer = array(
                    'flyer_id' => $flyerId,
                    'flyer_bahan' => $bahan,
                    'flyer_finishing' => $finishing,
                    'flyer_jumlah' => $jumlah,
                    'flyer_ukuran' => $ukuran,

                    'flyer_total' => $total,
                    'flyer_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataFlyer['flyer_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_flyer($dataFlyer);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataFlyer['flyer_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_flyer($dataFlyer);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataFlyer['flyer_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_flyer($dataFlyer);
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
        $this->load->view('pesanan/pesan_flyer');
        $this->load->view('templates/footer');
    }
    public function pesanBrosur()
    {
        if (isset($_POST['keranjang'])) {
            $brosurId = 'BSR-' . substr(time(), 5);
            $ukuran = $this->input->post('ukuran');
            $bahan = $this->input->post('bahan');
            $laminasi = $this->input->post('laminasi1');
            $finishing = $this->input->post('lipatan');

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
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pesan_brosur');
            } else {
                $foto = $this->upload->data('file_name');

                $dataBrosur = array(
                    'brosur_id' => $brosurId,
                    'brosur_bahan' => $bahan,
                    'brosur_ukuran' => $ukuran,
                    'brosur_jumlah' => $jumlah,
                    'brosur_finishing' => $sisi,
                    'brosur_laminasi' => $laminasi,
                    'brosur_lipatan' => $finishing,
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

    public function pesanKartuNama()
    {
        if (isset($_POST['keranjang'])) {
            $kartunamaId = 'KTN-' . substr(time(), 5);
            $ukuran = $this->input->post('ukuran');
            $bahan = $this->input->post('bahan');
            $hrg_bahan = $this->input->post('harga');
            $sisi = $this->input->post('finishing1');
            $sudut = $this->input->post('sudut');
            $laminasi = $this->input->post('laminasi1');
            $hrg_laminasi = $this->input->post('harga_laminasi');

            $jumlah = $this->input->post('jumlah');
            $total = 0;
            if ($sisi == 'satu sisi') {
                $total = ($hrg_bahan + $hrg_laminasi) * $jumlah * 1;
            } elseif ($sisi == 'dua sisi') {
                $total = ($hrg_bahan + $hrg_laminasi) * $jumlah * 2;
            }

            $config['upload_path'] = './uploads/KartuNama/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pesan_kartu_nama');
            } else {
                $foto = $this->upload->data('file_name');

                $dataKartuNama = array(
                    'kartu_nama_id' => $kartunamaId,
                    'kartu_nama_bahan' => $bahan,
                    'kartu_nama_ukuran' => $ukuran,
                    'kartu_nama_jumlah' => $jumlah,
                    'kartu_nama_sisi' => $sisi,
                    'kartu_nama_sudut' => $sudut,
                    'kartu_nama_jumlah' => $jumlah,
                    'kartu_nama_laminasi' => $laminasi,
                    'kartu_nama_total' => $total,
                    'kartu_nama_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataKartuNama['kartu_nama_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_kartu_nama($dataKartuNama);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataKartuNama['kartu_nama_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_kartu_nama($dataKartuNama);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataKartuNama['kartu_nama_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_kartu_nama($dataKartuNama);
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
        $this->load->view('pesanan/pesan_kartu_nama');
        $this->load->view('templates/footer');
    }

    public function pesanKartuUndangan()
    {
        if (isset($_POST['keranjang'])) {
            $kartuUndanganId = 'KTU-' . substr(time(), 5);
            $ukuran = $this->input->post('ukuran');
            $bahan = $this->input->post('bahan');
            $hrg_bahan = $this->input->post('harga');
            $sisi = $this->input->post('finishing1');
            $orientasi = $this->input->post('orientasi');
            $laminasi = $this->input->post('laminasi1');
            $hrg_laminasi = $this->input->post('harga_laminasi');
            if ($ukuran == 'A5') {
                $ukuran1 = '2000';
            } elseif ($ukuran == 'A6') {
                $ukuran1 = '0';
            }
            $jumlah = $this->input->post('jumlah');
            $total = 0;
            if ($sisi == 'satu sisi') {
                $total = ($hrg_bahan + $hrg_laminasi + $ukuran1) * $jumlah * 1;
            } elseif ($sisi == 'dua sisi') {
                $total = ($hrg_bahan + $hrg_laminasi + $ukuran1) * $jumlah * 2;
            }

            $config['upload_path'] = './uploads/Undangan/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pesan_kartu_undangan');
            } else {
                $foto = $this->upload->data('file_name');

                $dataKartuUndangan = array(
                    'undangan_id' => $kartuUndanganId,
                    'undangan_bahan' => $bahan,
                    'undangan_ukuran' => $ukuran,
                    'undangan_jumlah' => $jumlah,
                    'undangan_sisi' => $sisi,
                    'undangan_orientasi' => $orientasi,
                    'undangan_laminasi' => $laminasi,
                    'undangan_total' => $total,
                    'undangan_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataKartuUndangan['undangan_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_kartu_undangan($dataKartuUndangan);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataKartuUndangan['undangan_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_kartu_undangan($dataKartuUndangan);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataKartuUndangan['undangan_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_kartu_undangan($dataKartuUndangan);
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
        $this->load->view('pesanan/pesan_kartu_undangan');
        $this->load->view('templates/footer');
    }

    public function pesanKalenderMeja()
    {
        if (isset($_POST['keranjang'])) {
            $kalenderId = 'KLM-' . substr(time(), 5);
            $ukuran = $this->input->post('ukuran');
            $bahan = $this->input->post('bahan');
            $hrg_bahan = $this->input->post('harga');
            $sisi = $this->input->post('finishing1');
            $finishing = $this->input->post('finishing');
            $dudukan = $this->input->post('dudukan');

            $laminasi = $this->input->post('laminasi1');
            $hrg_laminasi = $this->input->post('harga_laminasi');

            $jumlah = $this->input->post('jumlah');
            $total = 0;
            if ($sisi == 'satu sisi') {
                $total = ($hrg_bahan + $hrg_laminasi) * $jumlah * 1;
            } elseif ($sisi == 'dua sisi') {
                $total = ($hrg_bahan + $hrg_laminasi) * $jumlah * 1;
            }

            $config['upload_path'] = './uploads/Kalender/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('dashboard/pesan_kalender');
            } else {
                $foto = $this->upload->data('file_name');

                $dataKalender = array(
                    'kalender_id' => $kalenderId,
                    'kalender_bahan' => $bahan,
                    'kalender_ukuran' => $ukuran,
                    'kalender_jumlah' => $jumlah,
                    'kalender_finishing' => $finishing,
                    'kalender_dudukan' => $dudukan,

                    'kalender_sisi' => $sisi,
                    'kalender_jumlah' => $jumlah,
                    'kalender_laminasi' => $laminasi,
                    'kalender_total' => $total,
                    'kalender_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataKalender['kalender_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_kalender($dataKalender);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataKalender['kalender_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_kalender($dataKalender);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataKalender['kalender_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_kalender($dataKalender);
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
        $this->load->view('pesanan/pesan_kalender');
        $this->load->view('templates/footer');
    }

    public function pesanSertifikat()
    {
        if (isset($_POST['keranjang'])) {
            $sertifikatId = 'SRF-' . substr(time(), 5);
            $ukuran = $this->input->post('ukuran');
            $bahan = $this->input->post('bahan');
            $hrg_bahan = $this->input->post('harga');
            $sisi = $this->input->post('finishing1');
            $laminasi = $this->input->post('laminasi1');
            $hrg_laminasi = $this->input->post('harga_laminasi');

            $jumlah = $this->input->post('jumlah');
            $total = 0;

            if ($ukuran == 'A4') {
                $ukuran1 = '0';
            } elseif ($ukuran == 'F4') {
                $ukuran1 = '3000';
            }
            if ($sisi == 'satu sisi') {
                $total = ($hrg_bahan + $hrg_laminasi + $ukuran1) * $jumlah * 1;
            } elseif ($sisi == 'dua sisi') {
                $total = ($hrg_bahan + $hrg_laminasi + $ukuran1) * $jumlah * 2;
            }

            $config['upload_path'] = './uploads/Sertifikat/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upload')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Desain/Gambar Harus Berformat JPG/JPEG/PNG</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('dashboard/pesan_sertifikat');
            } else {
                $foto = $this->upload->data('file_name');

                $dataSertifikat = array(
                    'sertifikat_id' => $sertifikatId,
                    'sertifikat_bahan' => $bahan,
                    'sertifikat_ukuran' => $ukuran,
                    'sertifikat_jumlah' => $jumlah,
                    'sertifikat_sisi' => $sisi,
                    'sertifikat_laminasi' => $laminasi,
                    'sertifikat_total' => $total,
                    'sertifikat_foto' => $foto,
                );

                $allCart = $this->BayarModel->lihat_keranjang();
                $undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('id'), 'belum')->row_array();

                if ($allCart == null) {
                    $cartId = 'CRT-' . substr(time(), 5);
                    $dataSertifikat['sertifikat_keranjang_id'] = $cartId;
                    $dataCart = array(
                        'keranjang_id' => $cartId,
                        'keranjang_pengguna_id' => $this->session->userdata('id'),
                        'keranjang_total' => $total,
                    );
                    $this->PesanModel->simpan_sertifikat($dataSertifikat);
                    $this->BayarModel->simpan_keranjang($dataCart);
                    $this->session->set_flashdata('alert', 'pesan_sukses');
                    redirect('keranjang');
                } else {
                    if ($undoneCart != null) {
                        $cartId = $undoneCart['keranjang_id'];
                        $cartTotal = $undoneCart['keranjang_total'];
                        $dataSertifikat['sertifikat_keranjang_id'] = $cartId;
                        $dataCart['keranjang_total'] = $cartTotal + $total;

                        $this->PesanModel->simpan_sertifikat($dataSertifikat);
                        $this->BayarModel->update_keranjang($cartId, $dataCart);
                        $this->session->set_flashdata('alert', 'pesan_sukses');
                        redirect('keranjang');
                    } else {
                        $cartId = 'CRT-' . substr(time(), 5);
                        $dataSertifikat['sertifikat_keranjang_id'] = $cartId;
                        $dataCart = array(
                            'keranjang_id' => $cartId,
                            'keranjang_pengguna_id' => $this->session->userdata('id'),
                            'keranjang_total' => $total,
                        );
                        $this->PesanModel->simpan_sertifikat($dataSertifikat);
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
        $this->load->view('pesanan/pesan_kartu_undangan');
        $this->load->view('templates/footer');
    }

    public function hapusFlyer($id)
    {
        $flyer = $this->PesanModel->lihat_flyer_by_id($id);
        $keranjang_id = $flyer['flyer_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $flyer['flyer_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('flyer_id', $id, 'pesan_flyer');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }

    public function hapusSpanduk($id)
    {
        $spanduk = $this->PesanModel->lihat_spanduk_by_id($id);
        $keranjang_id = $spanduk['spanduk_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $spanduk['spanduk_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('spanduk_id', $id, 'pesan_spanduk_indoor');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }

    public function hapusXbanner($id)
    {
        $xbanner = $this->PesanModel->lihat_xbanner_by_id($id);
        $keranjang_id = $xbanner['xbanner_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $xbanner['xbanner_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('xbanner_id', $id, 'pesan_xbanner');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }

    public function hapusBrosur($id)
    {
        $brosur = $this->PesanModel->lihat_brosur_by_id($id);
        $keranjang_id = $brosur['brosur_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $brosur['brosur_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('brosur_id', $id, 'pesan_brosur');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }

    public function hapusSpandukOutdoor($id)
    {
        $spanduk_outdoor = $this->PesanModel->lihat_spanduk_outdoor_by_id($id);
        $keranjang_id = $spanduk_outdoor['spanduk_outdoor_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $spanduk_outdoor['spanduk_outdoor_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('spanduk_outdoor_id', $id, 'pesan_spanduk_outdoor');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }

    public function hapusSertifikat($id)
    {
        $sertifikat = $this->PesanModel->lihat_sertifikat_by_id($id);
        $keranjang_id = $sertifikat['sertifikat_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $sertifikat['sertifikat_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('sertifikat_id', $id, 'pesan_sertifikat');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }

    public function hapusKalender($id)
    {
        $kalender = $this->PesanModel->lihat_kalender_by_id($id);
        $keranjang_id = $kalender['kalender_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $kalender['kalender_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('kalender_id', $id, 'pesan_kalender');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }

    public function hapusKartuNama($id)
    {
        $kartunama = $this->PesanModel->lihat_kartu_nama_by_id($id);
        $keranjang_id = $kartunama['kartu_nama_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $kartunama['kartu_nama_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('kartu_nama_id', $id, 'pesan_kartu_nama');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }

    public function hapusUndangan($id)
    {
        $undangan = $this->PesanModel->lihat_kartu_undangan_by_id($id);
        $keranjang_id = $undangan['undangan_keranjang_id'];
        $keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
        $total = $undangan['undangan_total'];
        $data = array(
            'keranjang_total' => $keranjang['keranjang_total'] - $total
        );
        $this->PesanModel->delete('undangan_id', $id, 'pesan_kartu_undangan');
        $this->PesanModel->delete('keranjang_pengguna_id', $id, 'tbl_keranjang');
        $this->BayarModel->update_keranjang($keranjang_id, $data);
        $this->session->set_flashdata('alert', 'pesan_hapus');
        redirect('keranjang');
    }
}
