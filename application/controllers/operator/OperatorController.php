<?php
class OperatorController extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_role') != '3') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda belum login ! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
            redirect('auth/login');
        }
    }


    public function index()

    {
        $data = array(
            'pesanan_masuk' => $this->db->where('faktur_status', 'sudah')->count_all_results('tbl_faktur'),
            'pesanan_dicetak' => $this->db->where('faktur_status', 'cetak')->count_all_results('tbl_faktur'),
            'pesanan_selesai' => $this->db->where('faktur_status', 'selesai')->count_all_results('tbl_faktur')

        );
        $this->load->view('templates_operator/header');
        $this->load->view('templates_operator/sidebar');
        $this->load->view('operator/dashboard', $data);
        $this->load->view('templates_operator/footer');
    }
}
