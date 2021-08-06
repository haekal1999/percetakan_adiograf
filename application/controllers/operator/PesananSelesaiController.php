<?php


class PesananSelesaiController extends CI_Controller
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
        $this->load->view('operator/pesanan_selesai/index', $data);
        $this->load->view('templates_operator/footer');
    }
}
